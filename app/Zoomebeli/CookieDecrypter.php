<?php

namespace App\Zoomebeli;

use Illuminate\Cookie\CookieValuePrefix;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Http\Request;

class CookieDecrypter extends EncryptCookies
{
    public function public_decryptCookie($key, $cookie)
    {

        $value = $this->decryptCookie($key, $cookie);

        $hasValidPrefix = strpos($value, CookieValuePrefix::create($key, $this->encrypter->getKey())) === 0;
        return $hasValidPrefix ? CookieValuePrefix::remove($value) : null;
    }
}
