<?php

namespace App\Livewire;

use App\Builder\Fieldtypes\Text;
use App\Builder\Fieldtypes\Select;
use App\Builder\Fieldtypes\Radio;
use App\Builder\Fieldtypes\Check;
use App\Builder\Fieldtypes\Range;
use App\Builder\Layout\Step;
use App\Interfaces\FormInterface;
use App\Livewire\Framework\FormBase;

class FormExample extends FormBase implements FormInterface
{
    public bool $hasConclusion = true;

    public function schema()
    {
        return [
            Step::make([
                Text::make('first-name')
                    ->type('text')
                    ->label('First name')
                    ->required(),
                Text::make('last-name')
                    ->type('text')
                    ->label('Last name')
                    ->required(),
                Text::make('email')
                    ->type('email')
                    ->required(),
                Text::make('company')
                    ->type('text')
                    ->required(),
            ])
                ->title('Please provide us with your contact details'),
            Step::make([
                Radio::make('service')
                    ->label('Select one of our services')
                    ->options([
                        "app" => "App",
                        "website" => "Website",
                        "webshop" => "Webshop",
                    ]),
            ])
                ->title('What can we help you with?'),
            Step::make([
                Check::make('objectives')
                    ->multiple()
                    ->label('Select all options you wish to select')
                    ->options([
                        "boost" => "Boost business growth and increase sales",
                        "digitize" => "Digitize my business to enhance efficiency and productivity",
                        "scale" => "Scale and expand my offering",
                    ]),
            ])
                ->title('What do you want to achieve?'),
            Step::make([
                Range::make('budget')
                    ->label('What is your budget?')
                    ->min(0)
                    ->max(100000)
                    ->step(1000),
                Range::make('time')
                    ->label('What is your investment timeline? (in months)')
                    ->min(0)
                    ->max(36)
            ])
                ->title('Time for some numbers'),
        ];
    }
}
