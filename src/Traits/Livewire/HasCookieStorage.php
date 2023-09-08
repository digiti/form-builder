<?php

namespace Digiti\FormBuilder\Traits\Livewire;

use Illuminate\Support\Facades\Cookie;

trait HasCookieStorage
{
    public function setStorage($key, $value): void
    {
        if(is_array($value)){
            $value = json_encode($value);
        }
        Cookie::queue(Cookie::make($key, $value));
    }

    public function getStorage($key): mixed
    {
        $cookie = Cookie::get($key);
        if($this->isJson($cookie)){
            $cookie = json_decode($cookie);
        }

        return $cookie;
    }

    protected function isJson($string): bool
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
     }
}
