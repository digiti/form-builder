<?php

namespace App\Livewire;

use App\Builder\Fieldtypes\Text;
use App\Builder\Fieldtypes\Select;
use App\Builder\Fieldtypes\Radio;
use App\Builder\Fieldtypes\Check;
use App\Builder\Fieldtypes\Range;
use App\Builder\Layout\Chapter;
use App\Builder\Layout\Step;
use App\Interfaces\FormInterface;
use App\Livewire\Framework\FormBase;

class FormExample extends FormBase implements FormInterface
{
    public bool $hasConclusion = true;
    public bool $hasStepCounters = true;

    public string $name = 'FormExample';

    public function schema()
    {
        return [
            $this->personalDataChapter()[0],
            $this->personalDataStep()[0],
            $this->personalDataChapter()[0]->showConclusion(),
            $this->servicesStep()[0],
            $this->objectivesStep()[0],
            $this->pricingStep()[0],
        ];
    }

    //
    // Chapters
    //

    /**
     * @return Chapter[]
     */
    protected function personalDataChapter()
    {
        return [
            Chapter::make([
                $this->personalDataStep()[0]->title('Step 1'),
                $this->servicesStep()[0]->title('Step 2'),
                $this->objectivesStep()[0]->title('Step 3'),
            ])
            ->title('Chapter title')
            ->description('Chapter description')
        ];
    }

    //
    // Steps
    //

    /**
     * @return Step[]
     */
    protected function personalDataStep()
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
        ];
    }

    /**
     * @return Step[]
     */
    protected function servicesStep()
    {
        return [
            Step::make([
                Radio::make('service')
                    ->label('Select one of our services')
                    ->options([
                        "app" => [
                            "label" => "App",
                            // "asset" => "https://media.giphy.com/media/9ohlKnRDAmotG/giphy.gif"
                        ],
                        "website" => [
                            "label" => "Website",
                            // "asset" => "https://media.giphy.com/media/rGuYfsb6WlKyk/giphy.gif"
                        ],
                        "webshop" => [
                            "label" => "Webshop",
                            // "asset" => "https://media.giphy.com/media/Lq0h93752f6J9tijrh/giphy.gif"
                        ],
                    ])
            ])
                ->title('What can we help you with?')
                ->reactive(function () {
                    return isset($this->result['company']) && $this->result['company'] == 'react' ? true : false;
                    // return true;
                })
        ];
    }

    /**
     * @return Step[]
     */
    protected function objectivesStep()
    {
        return [
            Step::make([
                Check::make('objectives')
                    ->multiple()
                    ->label('Select all options you wish to select')
                    ->options([
                        "boost" => [
                            "label" => "Boost business growth and increase sales",
                            "asset" => "/assets/color-icon-automation-dark.svg"
                        ],
                        "digitize" => [
                            "label" => "Digitize my business to enhance efficiency and productivity",
                            "asset" => "/assets/color-icon-growbusiness-dark.svg"
                        ],
                        "scale" => [
                            "label" => "Scale and expand my offering",
                            "asset" => "/assets/color-icon-growth-dark-1687180023.svg"
                        ],
                    ]),
            ])
                ->title('What do you want to achieve?')
        ];
    }

    /**
     * @return Step[]
     */
    protected function pricingStep()
    {
        return [
            Step::make([
                Range::make('budget')
                    ->label('What is your budget?')
                    ->min(1000)
                    ->max(100000)
                    ->step(1000),
                Range::make('time')
                    ->label('What is your investment timeline? (in months)')
                    ->min(0)
                    ->max(36)
            ])
                ->title('Time for some numbers')
        ];
    }
}
