<?php

namespace App\Livewire;

use App\Builder\Fieldtypes\Text;
use App\Builder\Fieldtypes\Select;
use App\Builder\Fieldtypes\Radio;
use App\Builder\Fieldtypes\Check;
use App\Builder\Fieldtypes\Range;

use App\Builder\Layout\Chapter;
use App\Builder\Layout\Step;

use App\Builder\Content\Column;
use App\Builder\Content\Row;
use App\Builder\Content\Image;
use App\Builder\Content\Paragraph;
use App\Builder\Content\Heading;
use App\Builder\Content\Html;
use App\Builder\Content\Anchor;

use App\Interfaces\FormInterface;
use App\Livewire\Framework\FormBase;

class LeadGenChecker extends FormBase implements FormInterface
{
    public bool $hasConclusion = true;
    public bool $hasStepCounters = true;

    public string $name = 'FormExample';

    public function schema()
    {
        return [
            // $this->personalDataStep()[0],
            $this->servicesStep()[0],
            $this->contentStep()[0],
            $this->objectivesStep()[0],
            $this->pricingStep()[0],
        ];
    }

    //
    // Steps
    //

    /**
     * @return Step[]
     */
    protected function contentStep()
    {
        return [
            Step::make([
                Row::make([
                    Column::make([
                        Range::make('LEFT')
                            ->label('What is your budget?')
                            ->min(1000)
                            ->max(100000)
                            ->step(1000),
                        Image::make('/assets/color-icon-automation-dark.svg'),
                        Paragraph::make('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec semper quam. Maecenas ut orci dapibus, sodales quam quis, tincidunt nunc. Sed ultricies dui turpis, id finibus eros tincidunt ac. Nunc ullamcorper nisi velit, id aliquam mi feugiat at. Suspendisse et bibendum purus, nec feugiat lectus. Nulla posuere, orci eu fringilla maximus, nibh massa volutpat diam, ut tempor risus diam nec erat. Quisque sed convallis ex, a tempor augue. Vivamus ut massa ac leo gravida pharetra a ac lorem. Morbi vitae quam ex. Nam venenatis ultricies mauris vitae porta. Praesent sollicitudin quam purus, vitae consequat arcu semper non. Integer aliquet mattis pellentesque. Nam quis finibus est, vel tempor lectus. Curabitur viverra est vel imperdiet fringilla. Curabitur eu sodales tellus.'),
                        Heading::make('Im a header')->level(3),
                        Html::make('<div class="bg-primary"><h1>Test title</h1></div>'),
                        Anchor::make('http://www.google.com'),
                    ])->classes('col'),
                    Column::make([
                        Range::make('RIGHT')
                            ->label('What is your budget?')
                            ->min(1000)
                            ->max(100000)
                            ->step(1000),
                    ])->classes('col-6')
                ]),

            ])
                ->title('Html title')
            // ->reactive(function () {
            //     return isset($this->result['company']) && $this->result['company'] == 'react' ? true : false;
            //     // return true;
            // })
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
