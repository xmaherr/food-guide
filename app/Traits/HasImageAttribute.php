<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait HasImageAttribute
{
    protected function image(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (!$value)
                    return null;

                if (Str::startsWith($value, ['http://', 'https://'])) {
                    return $value;
                }

                // ✅ Storage::url() بيرجع full URL لوحده من غير ما تضيف app.url
                return Storage::disk('public')->url($value);
            },
        );
    }

    protected function icon(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (!$value)
                    return null;

                if (Str::startsWith($value, ['http://', 'https://'])) {
                    return $value;
                }

                if (preg_match('/\.(jpg|jpeg|png|gif|svg|webp)$/i', $value)) {
                    // ✅ نفس الإصلاح هنا
                    return Storage::disk('public')->url($value);
                }

                return $value;
            },
        );
    }
}