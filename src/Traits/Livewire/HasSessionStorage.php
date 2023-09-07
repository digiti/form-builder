<?php

namespace Digiti\FormBuilder\Traits\Livewire;

use Illuminate\Support\Facades\Cookie;

trait HasSessionStorage
{
    public function storeSession($key, $value): void
    {
        if(is_array($value)){
            $value = json_encode($value);
        }

        session()->put($key, $value);
    }

    public function getCookie($key): mixed
    {
        $result = session()->get($key);
        if($this->isJson($result)){
            $result = json_decode($result);
        }

        return $result;
    }

    protected function isJson($string): bool
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }
}
