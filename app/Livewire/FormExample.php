<?php

namespace App\Livewire;

use App\Builder\Fieldtypes\Text;
use App\Builder\Fieldtypes\Select;
use App\Builder\Layout\Step;
use App\Interfaces\FormInterface;
use App\Livewire\Framework\FormBase;
use Closure;

class FormExample extends FormBase implements FormInterface
{
    public function schema()
    {
        return [
            Step::make([
                Text::make('name')
                    ->type('text')
                    ->required(),
                Text::make('email')
                    ->email()
                    ->label('LABEL 2'),
            ])
            ->title('Step 1')
            ->description('This is step 1'),
            Step::make([
                Select::make('role')
                    ->label('LABEL 3')
                    ->options([
                        "option-1" => "Option one",
                        "option-2" => "Option two",
                        "option-3" => "Option three"
                    ])
                    ->multiple()
                    ->required()
            ])
            ->title('Step 2')
            ->description('This is step 2. This is only visible when you completed step 1')
        ];
    }
}
