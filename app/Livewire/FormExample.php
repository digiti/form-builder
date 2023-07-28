<?php

namespace App\Livewire;

use App\Fieldtypes\Text;
use App\Fieldtypes\Select;
use App\Interfaces\FormInterface;
use App\Livewire\Framework\FormBase;
use Closure;

class FormExample extends FormBase implements FormInterface
{
    public function schema()
    {
        return [
            Text::make('name')
                ->type('text'),
            Text::make('email')
                ->email(),
            Select::make('role')
                ->options([
                    "option-1" => "Option one",
                    "option-2" => "Option two",
                    "option-3" => "Option three"
                ])
                ->multiple()
        ];
    }
}
