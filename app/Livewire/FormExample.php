<?php

namespace App\Livewire;

use App\Builder\Fieldtypes\Text;
use App\Builder\Fieldtypes\Select;
use App\Builder\Fieldtypes\Radio;
use App\Builder\Fieldtypes\Check;
use App\Builder\Layout\Step;
use App\Interfaces\FormInterface;
use App\Livewire\Framework\FormBase;

class FormExample extends FormBase implements FormInterface
{
    public function schema()
    {
        return [
            Step::make([
                Check::make('Consent'),
                Check::make('Options')
                ->label('Select multiple options')
                ->options([
                    "option-1" => "Option one",
                    "option-2" => "Option two",
                    "option-3" => "Option three"
                ])
            ])
            ->title('Step 1')
            ->description('This is step 1'),
            Step::make([
                Radio::make('radio')
                ->label('Select one option')
                ->options([
                    "yes" => "Yes please",
                    "no" => "God no!",
                ])
            ])
            ->title('Step 1')
            ->description('This is step 1'),
            Step::make([
                Text::make('name')
                    ->type('text')
                    ->required(),
                Text::make('email')
                    ->email()
                    ->label('LABEL 2'),
            ])
            ->title('Step 2')
            ->description('This is step 2'),
            Step::make([
                Select::make('role')
                    ->label('Select all options you wish to select')
                    ->options([
                        "option-1" => "Option one",
                        "option-2" => "Option two",
                        "option-3" => "Option three"
                    ])
                    ->multiple()
                    ->required()
            ])
            ->title('Step 3')
            ->description('This is step 3. This is only visible when you completed step 2')
        ];
    }
}
