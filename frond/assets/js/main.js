/* global.js — Hükümdar Front-end */
(function () {
  'use strict';

  /* ── 1. Sticky Header ─────────────────────────────── */
  const hd = document.querySelector('.site-hd');
  function onScroll() { hd && hd.classList.toggle('scrolled', window.scrollY > 70); }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  /* ── 2. Mobile Nav ────────────────────────────────── */
  const hamburger  = document.getElementById('hamburger');
  const mobNav     = document.getElementById('mob-nav');
  hamburger?.addEventListener('click', () => {
    const open = mobNav.classList.toggle('open');
    hamburger.classList.toggle('open', open);
    document.body.style.overflow = open ? 'hidden' : '';
  });
  document.querySelectorAll('.mob-nav a').forEach(a =>
    a.addEventListener('click', () => {
      mobNav?.classList.remove('open');
      hamburger?.classList.remove('open');
      document.body.style.overflow = '';
    })
  );

  /* Mobile accordion */
  document.querySelectorAll('.mob-lnk[data-sub]').forEach(btn => {
    btn.addEventListener('click', e => {
      e.preventDefault();
      const sub = document.getElementById(btn.dataset.sub);
      if (!sub) return;
      const open = sub.classList.toggle('open');
      const arr  = btn.querySelector('.arr');
      if (arr) arr.textContent = open ? '▲' : '▼';
    });
  });

  /* ── 3. Animate on Scroll ─────────────────────────── */
  const animEls = document.querySelectorAll('[data-anim]');
  const animObs = new IntersectionObserver(entries => {
    entries.forEach(en => {
      if (!en.isIntersecting) return;
      const el    = en.target;
      const delay = parseInt(el.dataset.delay || 0, 10);
      const dur   = parseInt(el.dataset.dur   || 600, 10);
      el.style.transitionDuration = dur + 'ms';
      setTimeout(() => el.classList.add('visible'), delay);
      animObs.unobserve(el);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
  animEls.forEach(el => animObs.observe(el));

  /* ── 4. Counter Animation ─────────────────────────── */
  const counters = document.querySelectorAll('[data-count]');
  const cntObs   = new IntersectionObserver(entries => {
    entries.forEach(en => {
      if (!en.isIntersecting) return;
      const el     = en.target;
      const target = parseInt(el.dataset.count, 10);
      const sfx    = el.dataset.suffix || '';
      const dur    = 1800;
      const step   = target / (dur / 14);
      let cur      = 0;
      const tick   = setInterval(() => {
        cur += step;
        if (cur >= target) { cur = target; clearInterval(tick); }
        el.textContent = Math.floor(cur) + sfx;
      }, 14);
      cntObs.unobserve(el);
    });
  }, { threshold: 0.5 });
  counters.forEach(el => cntObs.observe(el));

  /* ── 5. Smooth anchor scroll ──────────────────────── */
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const href = a.getAttribute('href');
      if (href === '#') return;
      const target = document.querySelector(href);
      if (!target) return;
      e.preventDefault();
      window.scrollTo({ top: target.getBoundingClientRect().top + window.scrollY - 80, behavior: 'smooth' });
    });
  });

  /* ── 6. Hero Slider ───────────────────────────────── */
  if (typeof Swiper !== 'undefined' && document.querySelector('.swiper-hero')) {
    new Swiper('.swiper-hero', {
      slidesPerView : 'auto',
      centeredSlides: true,
      spaceBetween  : 20,
      loop          : true,
      speed         : 650,
      autoplay      : { delay: 3200, disableOnInteraction: false, pauseOnMouseEnter: true },
      navigation    : { nextEl: '.hero-next' },
      grabCursor    : true,
    });
  }

  /* ── 7. Services Coverflow ────────────────────────── */
  if (typeof Swiper !== 'undefined' && document.querySelector('.swiper-srv')) {
    new Swiper('.swiper-srv', {
      effect        : 'coverflow',
      grabCursor    : true,
      centeredSlides: true,
      slidesPerView : 'auto',
      loop          : true,
      speed         : 700,
      coverflowEffect: { rotate: 28, stretch: 0, depth: 220, modifier: 1, slideShadows: true },
      pagination    : { el: '.srv-pg', clickable: true },
      autoplay      : { delay: 3500, disableOnInteraction: false, pauseOnMouseEnter: true },
    });
  }

  /* ── 8. Referanslar Coverflow ──────────────────────── */
  if (typeof Swiper !== 'undefined' && document.querySelector('.swiper-pf2')) {
    new Swiper('.swiper-pf2', {
      effect        : 'coverflow',
      grabCursor    : true,
      centeredSlides: true,
      slidesPerView : 'auto',
      loop          : true,
      speed         : 700,
      coverflowEffect: { rotate: 28, stretch: 0, depth: 220, modifier: 1, slideShadows: true },
      pagination    : { el: '.pf-pg', clickable: true },
      autoplay      : { delay: 3800, disableOnInteraction: false, pauseOnMouseEnter: true },
    });
  }

  /* ── 9. Swiper Portfolio (eski .swiper-pf) ─────────── */
  if (typeof Swiper !== 'undefined' && document.querySelector('.swiper-pf')) {
    new Swiper('.swiper-pf', {
      slidesPerView : 'auto',
      centeredSlides: true,
      spaceBetween  : 22,
      loop          : true,
      loopedSlides  : 4,
      speed         : 750,
      autoplay      : { delay: 4200, disableOnInteraction: false, pauseOnMouseEnter: true },
      pagination    : { el: '.swiper-pagination', clickable: true },
      keyboard      : { enabled: true },
      grabCursor    : true,
      breakpoints   : { 0: { spaceBetween: 12 }, 768: { spaceBetween: 22 } },
    });
  }

})();
