import './bootstrap';

import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import focus from '@alpinejs/focus';
import intersect from '@alpinejs/intersect';

Alpine.plugin(collapse);
Alpine.plugin(focus);
Alpine.plugin(intersect);

/*
| Sayfa scroll kilidi — mobil menü, popup vb. tek noktadan yönetilir.
| x-trap.noscroll KULLANILMAZ (Alpine ile çakışıp overflow'u geri yükler).
*/
const pageScrollLock = {
    _locked: false,
    _scrollY: 0,

    sync(shouldLock) {
        if (shouldLock === this._locked) {
            return;
        }

        if (shouldLock) {
            this._scrollY = window.scrollY;
            this._locked = true;
            document.documentElement.style.overflow = 'hidden';
            document.body.style.overflow = 'hidden';
            return;
        }

        this._locked = false;
        this.clear();
        window.scrollTo(0, this._scrollY);
    },

    clear() {
        document.documentElement.style.removeProperty('overflow');
        document.documentElement.style.removeProperty('padding-right');
        document.body.style.removeProperty('overflow');
        document.body.style.removeProperty('padding-right');
        document.body.style.removeProperty('position');
        document.body.style.removeProperty('top');
        document.body.style.removeProperty('left');
        document.body.style.removeProperty('right');
        document.body.style.removeProperty('width');
    },

    forceUnlock() {
        this._locked = false;
        this.clear();
    },
};

/*
| Header durumu — scroll'da küçülme + arkaplan, mobil menü kilidi.
| Tüm header bileşenleri tarafından paylaşılan global store.
*/
Alpine.store('ui', {
    scrolled: false,
    mobileOpen: false,
    popupOpen: false,

    init() {
        this.scrolled = window.scrollY > 8;
        window.addEventListener(
            'scroll',
            () => {
                this.scrolled = window.scrollY > 8;
            },
            { passive: true }
        );

        document.addEventListener('visibilitychange', () => {
            if (document.visibilityState === 'visible') {
                this.syncScroll();
            }
        });
    },

    syncScroll() {
        pageScrollLock.sync(this.mobileOpen || this.popupOpen);
    },

    scheduleScrollSync() {
        requestAnimationFrame(() => this.syncScroll());
        setTimeout(() => this.syncScroll(), 280);
    },

    toggleMobile() {
        this.mobileOpen = !this.mobileOpen;
        this.syncScroll();
        if (!this.mobileOpen) {
            this.scheduleScrollSync();
        }
    },

    closeMobile() {
        this.mobileOpen = false;
        this.syncScroll();
        this.scheduleScrollSync();
    },

    setPopupOpen(open) {
        this.popupOpen = open;
        this.syncScroll();
        if (!open) {
            this.scheduleScrollSync();
        }
    },
});

/*
| Teklif popup — oturum başına bir kez, gecikmeli açılır.
*/
Alpine.data('quotePopup', (options = {}) => ({
    open: false,
    delay: options.delay ?? 1200,
    storageKey: 'dwt-quote-popup-seen',

    init() {
        if (sessionStorage.getItem(this.storageKey)) return;

        this.$watch('open', (value) => {
            Alpine.store('ui').setPopupOpen(value);
        });

        const show = () => {
            this.open = true;
        };

        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            show();
            return;
        }

        setTimeout(show, this.delay);
    },

    close() {
        this.open = false;
        sessionStorage.setItem(this.storageKey, '1');
    },
}));

/*
| WhatsApp bildirim sesi — Web Audio API, tarayıcı engeline karşı unlock.
*/
const waNotificationSound = (() => {
    let ctx = null;
    let pending = false;

    const getCtx = () => {
        if (ctx) return ctx;
        const AudioCtx = window.AudioContext || window.webkitAudioContext;
        if (!AudioCtx) return null;
        ctx = new AudioCtx();
        return ctx;
    };

    const tone = (audioCtx, frequency, start, duration, volume = 0.07) => {
        const osc = audioCtx.createOscillator();
        const gain = audioCtx.createGain();
        osc.type = 'sine';
        osc.frequency.setValueAtTime(frequency, start);
        gain.gain.setValueAtTime(0.0001, start);
        gain.gain.exponentialRampToValueAtTime(volume, start + 0.015);
        gain.gain.exponentialRampToValueAtTime(0.0001, start + duration);
        osc.connect(gain);
        gain.connect(audioCtx.destination);
        osc.start(start);
        osc.stop(start + duration + 0.02);
    };

    const playNow = () => {
        const audioCtx = getCtx();
        if (!audioCtx || audioCtx.state !== 'running') return false;

        const t = audioCtx.currentTime;
        tone(audioCtx, 880, t, 0.11, 0.065);
        tone(audioCtx, 1318.5, t + 0.09, 0.14, 0.055);
        return true;
    };

    const unlockAndPlay = async () => {
        const audioCtx = getCtx();
        if (!audioCtx) return;

        try {
            await audioCtx.resume();
        } catch {
            return;
        }

        if (pending && audioCtx.state === 'running') {
            pending = false;
            playNow();
        }
    };

    document.addEventListener('pointerdown', unlockAndPlay, { capture: true, passive: true });
    document.addEventListener('keydown', unlockAndPlay, { capture: true, passive: true });

    return {
        play() {
            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

            if (playNow()) return;

            pending = true;
            unlockAndPlay();
        },
    };
})();

/*
| WhatsApp floating widget — sol alt mesaj kutusu.
*/
Alpine.data('whatsappWidget', (options = {}) => ({
    open: false,
    typing: false,
    hasUnread: false,
    ready: false,
    delay: options.delay ?? 2800,
    soundEnabled: options.soundEnabled !== false,
    storageKey: 'dwt-wa-widget-closed',

    playNotification() {
        if (!this.soundEnabled) return;
        waNotificationSound.play();
    },

    finishTyping(onComplete, duration = null) {
        const typingDuration = duration ?? (
            window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 0 : 1600
        );

        setTimeout(() => {
            this.typing = false;
            this.playNotification();
            onComplete?.();
        }, typingDuration);
    },

    init() {
        const wasClosed = sessionStorage.getItem(this.storageKey);

        if (wasClosed) {
            this.hasUnread = true;
            this.ready = true;
            return;
        }

        const show = () => {
            this.ready = true;
            this.open = true;
            this.typing = true;
            this.finishTyping();
        };

        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            show();
            return;
        }

        setTimeout(show, this.delay);
    },

    toggle() {
        this.open = !this.open;
        this.hasUnread = false;

        if (this.open && !this.typing) {
            this.typing = true;
            this.finishTyping(null, 1200);
        }
    },

    close() {
        this.open = false;
        this.hasUnread = true;
        sessionStorage.setItem(this.storageKey, '1');
    },
}));

/*
| Sayaç animasyonu — istatistik bölümünde görünür olunca 0'dan hedefe sayar.
*/
Alpine.data('counter', (target = 0, duration = 1800) => ({
    display: 0,
    done: false,

    start() {
        if (this.done) return;
        this.done = true;

        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            this.display = target;
            return;
        }

        const startTime = performance.now();
        const step = (now) => {
            const progress = Math.min((now - startTime) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            this.display = Math.round(eased * target);
            if (progress < 1) requestAnimationFrame(step);
        };
        requestAnimationFrame(step);
    },
}));

/*
| Gelişmiş iletişim formu — çok adımlı sihirbaz (hizmet, bütçe, detay, iletişim).
| URL parametrelerinden (hizmet, paket) ön doldurma yapar.
*/
Alpine.data('contactForm', () => ({
    step: 1,
    total: 3,
    sent: false,
    sending: false,
    submitError: '',
    stepLabels: ['Hizmet & Bütçe', 'Detaylar', 'İletişim'],
    errors: { name: false, email: false, phone: false, kvkk: false },
    form: {
        services: [],
        budget: '',
        timeline: '',
        website: '',
        message: '',
        name: '',
        company: '',
        email: '',
        phone: '',
        kvkk: false,
    },

    init() {
        const params = new URLSearchParams(window.location.search);
        const hizmet = params.get('hizmet');
        if (hizmet && !this.form.services.includes(hizmet)) {
            this.form.services.push(hizmet);
        }
        const paket = params.get('paket');
        if (paket) {
            this.form.message = `İlgilendiğim paket: ${paket} Paket.`;
        }
    },

    get progress() {
        return Math.round((this.step / this.total) * 100);
    },

    next() {
        if (this.step < this.total) {
            this.step++;
        }
    },

    prev() {
        if (this.step > 1) {
            this.step--;
        }
    },

    validate() {
        this.errors.name = this.form.name.trim() === '';
        this.errors.email = !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.form.email);
        this.errors.phone = this.form.phone.trim() === '';
        this.errors.kvkk = !this.form.kvkk;
        return !Object.values(this.errors).some(Boolean);
    },

    async submit() {
        if (!this.validate()) return;

        this.sending = true;
        this.submitError = '';

        try {
            const response = await fetch('/iletisim', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ?? '',
                },
                body: JSON.stringify(this.form),
            });

            const data = await response.json().catch(() => ({}));

            if (!response.ok) {
                if (response.status === 422 && data.errors) {
                    const firstError = Object.values(data.errors).flat()[0];
                    throw new Error(firstError || 'Lütfen formu kontrol edin.');
                }

                throw new Error(data.message || 'Gönderim başarısız oldu.');
            }

            this.sent = true;
        } catch (error) {
            this.submitError = error.message || 'Bir hata oluştu. Lütfen tekrar deneyin.';
        } finally {
            this.sending = false;
        }
    },
}));

window.Alpine = Alpine;

Alpine.start();

/*
| Hero video — tarayıcı autoplay engeline karşı güvenli başlatma.
*/
(() => {
    const startHeroVideo = () => {
        const video = document.getElementById('hero-video');
        if (!video || window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

        video.muted = true;
        video.defaultMuted = true;

        const play = () => video.play().catch(() => {});

        if (video.readyState >= 2) {
            play();
        } else {
            video.addEventListener('loadeddata', play, { once: true });
        }

        document.addEventListener('visibilitychange', () => {
            if (!document.hidden && video.paused) play();
        });
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', startHeroVideo);
    } else {
        startHeroVideo();
    }
})();

/*
| Scroll ile ortaya çıkma (reveal) — sağlam IntersectionObserver.
| Viewport'a giren VEYA üstünde kalmış (zıplama/derin bağlantı) elemanları
| görünür yapar; böylece hiçbir bölüm opacity:0 takılı kalmaz.
*/
(() => {
    const selector = '.reveal, .reveal-left, .reveal-right, .reveal-scale';

    const revealAll = (els) => els.forEach((el) => el.classList.add('in'));

    const init = () => {
        const els = [...document.querySelectorAll(selector)];
        if (!els.length) return;

        if (
            !('IntersectionObserver' in window) ||
            window.matchMedia('(prefers-reduced-motion: reduce)').matches
        ) {
            revealAll(els);
            return;
        }

        const io = new IntersectionObserver(
            (entries, obs) => {
                entries.forEach((entry) => {
                    const el = entry.target;
                    // Görünüyorsa ya da viewport'un üstünde kaldıysa göster.
                    if (entry.isIntersecting || entry.boundingClientRect.top < 0) {
                        el.classList.add('in');
                        obs.unobserve(el);
                    }
                });
            },
            { rootMargin: '0px 0px -8% 0px', threshold: 0.05 }
        );

        els.forEach((el) => io.observe(el));
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
