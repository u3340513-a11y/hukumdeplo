<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>Yeni Proje Talebi</title>
</head>
<body style="margin:0;padding:0;background:#f8fafc;font-family:Inter,Arial,sans-serif;color:#0f172a;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f8fafc;padding:32px 16px;">
        <tr>
            <td align="center">
                <table width="100%" cellpadding="0" cellspacing="0" style="max-width:560px;background:#ffffff;border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;">
                    <tr>
                        <td style="background:#2563eb;padding:24px 28px;color:#ffffff;">
                            <h1 style="margin:0;font-size:20px;line-height:1.3;">Yeni Proje Talebi</h1>
                            <p style="margin:8px 0 0;font-size:14px;opacity:0.9;">{{ config('site.brand.name') }} iletişim formu</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:28px;">
                            <h2 style="margin:0 0 16px;font-size:16px;">İletişim Bilgileri</h2>
                            <p style="margin:0 0 8px;font-size:14px;line-height:1.6;"><strong>Ad Soyad:</strong> {{ $data['name'] }}</p>
                            @if (! empty($data['company']))
                                <p style="margin:0 0 8px;font-size:14px;line-height:1.6;"><strong>Şirket:</strong> {{ $data['company'] }}</p>
                            @endif
                            <p style="margin:0 0 8px;font-size:14px;line-height:1.6;"><strong>E-posta:</strong> {{ $data['email'] }}</p>
                            <p style="margin:0 0 20px;font-size:14px;line-height:1.6;"><strong>Telefon:</strong> {{ $data['phone'] }}</p>

                            <h2 style="margin:0 0 16px;font-size:16px;">Proje Detayları</h2>
                            @if (! empty($data['services']))
                                <p style="margin:0 0 8px;font-size:14px;line-height:1.6;"><strong>Hizmetler:</strong> {{ implode(', ', $data['services']) }}</p>
                            @endif
                            @if (! empty($data['budget']))
                                <p style="margin:0 0 8px;font-size:14px;line-height:1.6;"><strong>Bütçe:</strong> {{ $data['budget'] }}</p>
                            @endif
                            @if (! empty($data['timeline']))
                                <p style="margin:0 0 8px;font-size:14px;line-height:1.6;"><strong>Zaman planı:</strong> {{ $data['timeline'] }}</p>
                            @endif
                            @if (! empty($data['website']))
                                <p style="margin:0 0 8px;font-size:14px;line-height:1.6;"><strong>Mevcut site:</strong> {{ $data['website'] }}</p>
                            @endif
                            @if (! empty($data['message']))
                                <p style="margin:16px 0 0;font-size:14px;line-height:1.7;"><strong>Mesaj:</strong><br>{!! nl2br(e($data['message'])) !!}</p>
                            @endif
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
