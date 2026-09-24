<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactInquiry;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    public function store(ContactFormRequest $request): JsonResponse
    {
        $data = $request->validated();

        try {
            Mail::to(config('site.mail_to'))
                ->send(new ContactInquiry($data));
        } catch (Throwable $e) {
            Log::error('İletişim formu mail gönderimi başarısız.', [
                'error' => $e->getMessage(),
                'email' => $data['email'] ?? null,
            ]);

            return response()->json([
                'message' => 'Mesajınız şu an gönderilemedi. Lütfen telefon veya WhatsApp ile ulaşın.',
            ], 500);
        }

        return response()->json([
            'message' => 'Talebiniz başarıyla iletildi.',
        ]);
    }
}
