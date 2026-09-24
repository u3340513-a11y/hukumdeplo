<?php

/*
|--------------------------------------------------------------------------
| Yasal Metinler
|--------------------------------------------------------------------------
| Kullanıcı/Gizlilik Sözleşmesi, K.V.K.K. ve İade Şartları / Mesafeli Satış Sözleşmeleri.
| Kaynak: https://hukumdar.com.tr/
*/

$brand = 'Hükümdar Bilişim';
$domain = 'hukumdar.com.tr';
$email = 'info@hukumdar.com.tr';
$phone = '+90 532 696 21 20';
$address = 'Yenibosna Kuyumcukent A.V.M. Blogu Kat:1 No: 403 Bahçelievler / İSTANBUL';

return [

    'footer' => [
        ['label' => 'Kullanıcı & Gizlilik Sözleşmesi', 'slug' => 'gizlilik-sozlesmesi'],
        ['label' => 'K.V.K.K. Aydınlatma Metni', 'slug' => 'kvkk-aydinlatma-metni'],
        ['label' => 'İade Şartları & Mesafeli Satış', 'slug' => 'mesafeli-satis-sozlesmesi'],
    ],

    'pages' => [

        'gizlilik-sozlesmesi' => [
            'title' => 'Kullanıcı & Gizlilik Sözleşmesi',
            'description' => 'Hükümdar Bilişim kullanıcı sözleşmesi, gizlilik politikası ve kişisel verilerin korunmasına ilişkin esaslar.',
            'updated_at' => '23 Eylül 2026',
            'sections' => [
                [
                    'heading' => '1. Giriş ve Taraflar',
                    'body' => [
                        "{$brand} ({$domain}) olarak tüm müşterilerimize, potansiyel müşterilerimize ve internet sitesi ziyaretçilerimize özen ve önem göstermekteyiz. Bu Kullanıcı ve Gizlilik Sözleşmesi; web sitemizi ziyaret ettiğinizde, proje talep formu doldurduğunuzda veya yazılım/tasarım hizmetlerimizden yararlandığınızda geçerli olan esasları düzenler.",
                    ],
                ],
                [
                    'heading' => '2. Toplanan Veriler',
                    'body' => [
                        'Hükümdar Bilişim tüm firmalara ve şahıslara birebir hizmet sağladığından dolayı sizden asla kişisel şifre istemez. Hizmetlerimizi sunabilmek için yalnızca form doldurmanız veya hizmet talep etmeniz üzerine aşağıdaki veriler işlenir:',
                    ],
                    'list' => [
                        'Adınız, soyadınız ve iletişim bilgileriniz (telefon numarası, e-posta adresi)',
                        'Şirketiniz hakkındaki bilgiler, adres ve proje talebi mesajları',
                        'Hizmet satın almanız durumunda fatura bilgileri (T.C. Kimlik No / Vergi No) ve banka havale/IBAN bilgileri',
                        'Barındırma (hosting) ve yönetim paneli kurulumunda size özel oluşturulan erişim bilgileri',
                    ],
                ],
                [
                    'heading' => '3. Elektronik Ticari İletiler',
                    'body' => [
                        "Elektronik Ticaretin Düzenlenmesi Hakkında Kanun’un 6. maddesi gereğince {$brand}, onayınız olmadan ticari ileti göndermez. Esnaf ve tacirlere yönelik bilgilendirmeler ilgili kanunun 2. fıkrası çerçevesinde yürütülür.",
                    ],
                ],
                [
                    'heading' => '4. Veri Güvenliği ve Barındırma',
                    'body' => [
                        'Verileriniz; SSL güvenlik sertifikası, yüksek kapasiteli sunucu altyapısı ve erişim kontrolü gibi teknik ve idari tedbirlerle korunur. Kişisel verileriniz yasal zorunluluklar dışında üçüncü şahıslarla paylaşılmaz.',
                    ],
                ],
                [
                    'heading' => '5. İletişim',
                    'body' => [
                        "Sorularınız ve talepleriniz için {$email} adresine e-posta gönderebilir, {$phone} numarasından veya {$address} adresimizden bize ulaşabilirsiniz.",
                    ],
                ],
            ],
        ],

        'kvkk-aydinlatma-metni' => [
            'title' => 'K.V.K.K. Aydınlatma Metni',
            'description' => '6698 sayılı Kişisel Verilerin Korunması Kanunu (KVKK) kapsamında Hükümdar Bilişim aydınlatma metni.',
            'updated_at' => '23 Eylül 2026',
            'sections' => [
                [
                    'heading' => 'Veri Sorumlusu',
                    'body' => [
                        "6698 sayılı Kişisel Verilerin Korunması Kanunu (“KVKK”) uyarınca veri sorumlusu ünvanı ile {$brand} ({$domain}) kişisel verileriniz ve işleme süreçleri hakkında tüm detayları şeffaflıkla açıklamaktadır.",
                        "Adres: {$address} · E-Posta: {$email} · Telefon: {$phone}",
                    ],
                ],
                [
                    'heading' => 'İşlenen Kişisel Veriler',
                    'list' => [
                        'Adınız, soyadınız, telefon numaranız ve e-posta adresiniz (form doldurmanız üzerine)',
                        'Konu ve mesaj alanında paylaştığınız proje ve şirket bilgileri',
                        'Hizmet satın almanız durumunda fatura bilgileriniz (T.C. Kimlik No / Vergi Numarası)',
                        'Ödemeyi havale/EFT olarak yapmanız durumunda banka bilgileriniz (Ad, IBAN)',
                        'Hosting ve yönetim paneli kurulumunda yalnızca size ait olan giriş ve sistem bilgileri',
                    ],
                ],
                [
                    'heading' => 'Kişisel Verilerin İşlenme Amaçları',
                    'list' => [
                        'İletişim formu, telefon araması veya WhatsApp aracılığıyla oluşturduğunuz talep, öneri ve teklif isteklerine dönüş sağlamak',
                        'Web tasarım, e-ticaret, mobil uygulama, özel yazılım ve SEO sözleşme süreçlerini yürütmek',
                        'Hizmetler nedeniyle mevzuata uygun olarak ödemeleriniz için fatura oluşturmak',
                        'Olası uyuşmazlık süreçlerinde yasal mercilere bilgi sunmak ve bilgi güvenliği süreçlerini yürütmek',
                    ],
                ],
                [
                    'heading' => 'Haklarınız (KVKK md. 11) ve Başvuru',
                    'body' => [
                        '6698 sayılı KVKK kapsamında kişisel verilerinizin işlenip işlenmediğini öğrenme, düzeltilmesini veya silinmesini talep etme haklarına sahipsiniz.',
                        "Taleplerinizi {$email} adresine yazılı olarak iletebilirsiniz. Başvurularınız mevzuat kapsamında en geç 30 gün içinde sonuçlandırılır.",
                    ],
                ],
            ],
        ],

        'mesafeli-satis-sozlesmesi' => [
            'title' => 'İade Şartları & Mesafeli Satış Sözleşmesi',
            'description' => 'Hükümdar Bilişim yazılım, web tasarım ve e-ticaret paketleri iade şartları ve mesafeli satış sözleşmesi.',
            'updated_at' => '23 Eylül 2026',
            'sections' => [
                [
                    'heading' => '1. Taraflar',
                    'body' => [
                        "Hizmet Sağlayıcı: {$brand} — {$address}",
                        "E-posta: {$email} · Telefon: {$phone}",
                        'Alıcı: Web sitesi veya dijital kanallar üzerinden web tasarım, e-ticaret paketi, özel yazılım veya dijital pazarlama hizmeti satın alan gerçek veya tüzel kişi.',
                    ],
                ],
                [
                    'heading' => '2. Sözleşmenin Konusu ve Kapsamı',
                    'body' => [
                        'Bu sözleşme; Hükümdar Bilişim tarafından sunulan web tasarım, yıllık e-ticaret paketleri, mobil uygulama, özel yazılım geliştirme, SEO, Google Ads ve hosting/domain hizmetlerinin satış ve teslim şartlarını düzenler.',
                    ],
                ],
                [
                    'heading' => '3. Teslimat ve Teknik Garanti',
                    'body' => [
                        'Projeler, sözleşme ve teklif onayında belirtilen süre içerisinde yönetici paneli eğitimleriyle birlikte teslim edilir. İnternet sitelerinin herhangi bir çökme veya teknik bozulma durumunda Hükümdar Bilişim, 24 saat içerisinde sistemi eski haline getirme garantisi sunar.',
                    ],
                ],
                [
                    'heading' => '4. İade Şartları ve Cayma Hakkı',
                    'body' => [
                        'Mesafeli Sözleşmeler Yönetmeliği uyarınca; müşterinin özel istek ve talepleri doğrultusunda kişiye/markaya özel olarak üretilen yazılımlarda, alan adı (domain) tescillerinde, SSL sertifikalarında ve ifasına başlanmış elektronik ortamdaki anında ifa edilen dijital hizmetlerde cayma ve iade hakkı kapsam dışındadır.',
                        'Standart paketlerde ise proje kurulumuna ve lisans/domain tahsisine başlanmamış olması kaydıyla, 14 gün içerisinde yazılı bildirimle iptal ve iade talebinde bulunulabilir.',
                    ],
                ],
                [
                    'heading' => '5. Yetkili Mahkemeler',
                    'body' => [
                        'İşbu sözleşmeden doğabilecek uyuşmazlıklarda İstanbul (Bakırköy) Mahkemeleri, İcra Daireleri ve Tüketici Hakem Heyetleri yetkilidir.',
                    ],
                ],
            ],
        ],

    ],

];
