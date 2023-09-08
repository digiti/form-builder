<?php

namespace Digiti\FormBuilder\Traits\Livewire;

use Illuminate\Support\Facades\Cookie;

trait HasSessionStorage
{
    public function setStorage($key, $value): void
    {
        session()->put($key, $value);
    }

    public function getStorage($key): mixed
    {
        return session()->get($key);
    }
}
