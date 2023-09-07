# Form Builder

[![Latest Version on Packagist](https://img.shields.io/packagist/v/digiti/form-builder.svg?style=flat-square)](https://packagist.org/packages/digiti/form-builder) 
[![Total Downloads](https://img.shields.io/packagist/dt/digiti/form-builder.svg?style=flat-square)](https://packagist.org/packages/digiti/form-builder)

This is a minimalist form builder build on Livewire V3. This is mainly used to create multi-step forms with reactive fields and content.

## Installation
In order for this package to work you need to have completed the [Livewire v3 installation guide](https://livewire.laravel.com/docs/installation). Once you have done that you include this package in your composer file.

```
composer require digiti/form-builder
```

To include the basic styling you need to add the import below in the main css file of your project.

`@import '/vendor/digiti/form-builder/dist/build/assets/main.css';`

# Forms

Once you completed the installation you can immediatly start creating forms with the handy command below:

```
php artisan make:form YourFormName
```

This will generate the base file structure which is needed to use the existing form component of this package.

A form needs a name. This name will be used to link the results to the form. So it has to be unique.
By default all results will be stored in as a cookie.

```
public string $name = 'FormExample';
```

This is where you create the whole schema for your new form:

```
public function schema(): array
    {
        return [
            ...
        ];
    }
```

With the submit method you do whatever with your data on a form submit

```
public function submit(): void
    {
        //OnFormSubmitted::dispatch($this->result);
    }
```

A form can show an overview/conclusion of all data related to the form.
To activate this you have to provide the following public variable in your form class.

```
public bool $hasConclusion = true
```

When Submitted it fires a event `OnFormSubmitted` which can be used to hook on your custom logic for saving or sending the results somewhere.
Other available events:
- `OnStepCompleted`
- `OnChapterCompleted`

### Methods:

**schema()**
Define your chapters and inputs here in an array. This will be automagically be converted in a functional form.

```
public function schema()
{
	return [
		Text::make('firstname')
			->type('text'),
		Text::make('lastname')
			->type('text'),
		Text::make('lastname')
			->email()
	];
}
```

# Fieldtypes

When constructing your form you make use of these fieldtype classes to build each input.

They can be nested in 'Chapters' but more on that later.
>  **Note:** The **make($string)** method is required to construct a fieldtype object

Fieldtype options:
* ->label(): Label for the input. If not provide we will create a label with the name of the field.
* ->required(): Makes field required.

## Text

First of all you have the Text fieldtype.

A example:

```
use App\Fieldtypes\Text;

Text::make('firstname')->type('text')->required()
```

### Methods:

**type($string)**
Changes the text input type to the value provided in ` $string `
```
Text::make('firstname')->type("text"),
```

**email()**
Changes the text input type to email

> Validation: email
```
Text::make('email')->email(),
```

**integer()**
Changes the text input type to integer

> Validation: integer
```
Text::make('quantity')->integer(),
```

**password()**
Changes the text input type to password

> Validation: password
```
Text::make('password_confirmation')->password(),
```

**tel()**
Changes the text input type to tel
```
Text::make('phone')->tel(),
```

**url()**
Changes the text input type to url
> Validation: url
```
Text::make('website')->url(),
```

## Radiobuttons

A example:

```
use App\Fieldtypes\Radio;

Radio::make('radio')
    ->label('Select one option')
    ->options([
        "yes" => "Yes please",
        "no" => "God no!",
    ])
```

### Methods

**label**
Will overwrite the name with the given label
```
Radio::make('radio')->label('Select one option')
```

**options(array())**
Constructs the options of your select input. The key will be the value that is being stored.
When you only provide a label, radiobuttons will be shown.
If you add an asset, this will hide the radiobutton and only show the assets

```
Radio::make('radio')
    ->options([
        "app" => [
            "label" => "App",
            "asset" => "https://media.giphy.com/media/9ohlKnRDAmotG/giphy.gif"
        ],
        "website" => [
            "label" => "Website",
            "asset" => "https://media.giphy.com/media/rGuYfsb6WlKyk/giphy.gif"
        ],
        "webshop" => [
            "label" => "Webshop",
            "asset" => "https://media.giphy.com/media/Lq0h93752f6J9tijrh/giphy.gif"
        ],
    ]),
```

## Checkboxes

A example:
```
use App\Fieldtypes\Check;

Check::make('Options')
    ->label('Select multiple options')
    ->options([
        "option-1" => "Option one",
        "option-2" => "Option two",
        "option-3" => "Option three"
    ])
```

### Methods

**single checkbox**
Creates 1 checkbox. The value will the name.
If this needs to be overwritten check the 'label' option

```
Check::make('Consent')
```

**label(string)**
Will overwrite the name with the given label

```
Check::make('Consent')->label('I agree with the terms and conditions')
```

**options(array())**
Constructs the options of your select input. The key will be the value that is being stored.
When you only provide a label, radiobuttons will be shown.
If you add an asset, this will hide the radiobutton and only show the assets

```
Check::make('platform')
    ->options([
        "app" => [
            "label" => "App",
            "asset" => "https://media.giphy.com/media/9ohlKnRDAmotG/giphy.gif"
        ],
        "website" => [
            "label" => "Website",
            "asset" => "https://media.giphy.com/media/rGuYfsb6WlKyk/giphy.gif"
        ],
        "webshop" => [
            "label" => "Webshop",
            "asset" => "https://media.giphy.com/media/Lq0h93752f6J9tijrh/giphy.gif"
        ],
    ]),
```

## Range slider

A example:
```
use App\Fieldtypes\Range;
Range::make('amount')
    ->min(10)
    ->max(200)
    ->step(50)
```

### Methods

**label(string)**
Will overwrite the name with the given label

```
Range::make('amount')->label('Slide for the correct amount')
```

**min(integer)**
Set minimum value of slider

> Validation: min:{amount}
```
Range::make('amount')->min(10)
```

**max(integer)**
Set maximum value of slider

> Validation: max:{amount}
```
Range::make('amount')->max(200)
```

**step(integer)**
Set the step of slider

```
Range::make('amount')->step(50)
```

## Select

A example:
```
use App\Fieldtypes\Select;

Select::make('role')
    ->options([
        "option-1" => "Option one",
        "option-2" => "Option two",
        "option-3" => "Option three"
    ])
    ->multiple()
```

### Methods

**options(array())**
Constructs the options of your select input. The key will be the value that is being stored.
When you only provide a label, radiobuttons will be shown.
If you add an asset, this will hide the radiobutton and only show the assets

```
Select::make('platform')
    ->options([
        "app" => [
            "label" => "App",
            "asset" => "https://media.giphy.com/media/9ohlKnRDAmotG/giphy.gif"
        ],
        "website" => [
            "label" => "Website",
            "asset" => "https://media.giphy.com/media/rGuYfsb6WlKyk/giphy.gif"
        ],
        "webshop" => [
            "label" => "Webshop",
            "asset" => "https://media.giphy.com/media/Lq0h93752f6J9tijrh/giphy.gif"
        ]
    ]),
```

**multiple()**
This method enables you to select multiple options
```
Select::make('Multi select')->options([...])->multiple(),
```

## Validation
Validation plays a crucial role in the construction of your form. Each fieldtype is equipped with a set of general accessible methods designed to assist you in validating user inputs.

> Furthermore, certain specific fieldtype methods automatically incorporate fundamental validation rules. We have included the validation rule within each method where applicable.

**Required()**
```
Text::make('first-name')->required()
```

**rawRule(string, bool)**
With rawRule() you can add your own validation rules. all validation rules you define will be added to already defined rules in other methods. If you want to overwrite all automaticlly set validation rules you can switch the optional $overwrite attribute to true

```
Text::make('email')->email()->rawRule('required|min:4') // email|required|min:4
Text::make('email')->email()->rawRule('required|min:4', true) // required|min:4
```

> You can add your own custom validations with the method above. Check out the Laravel documentation on [Custom validation rules](https://laravel.com/docs/10.x/validation#custom-validation-rules) to create your own.

# Layout

# Steps
You can think of steps like screens. A step can have multiple fieldtypes and will show them step per step.

A example:
```
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
```

### Methods

**title**
Adds a title to the step
```
Step::make([])->title('Please provide us with your contact details')
```

**description**
Adds a description to step
```
Step::make([])->desccription('Please provide us with your contact details')
```

**reactive**
Makes a step conditional. The function should return a boolean. This wil result in hiding/showing of the step based on input
In the example you see this step will only be shown when the 'company' field exists and is 'Digiti'

```
Step::make([])->reactive(function () {
    return isset($this->result['company']) && $this->result['company'] == 'Digiti' ? true : false;
})
```

# Chapters

Chapter have multiple steps and can be reactive

A example:
```
Chapter::make([
    Step::make([
        Text::make('first-name')
            ->type('text')
            ->label('First name')
            ->required(),
    ]),
    Step::make([
        Text::make('last-name')
            ->type('text')
            ->label('Last name')
            ->required(),
    ])
])
```

### Methods

**title**
Adds a title to the step

```
Chapter::make([])->title('Please provide us with your contact details')
```
**description**
Adds a description to step

```
Chapter::make([])->desccription('Please provide us with your contact details')
```

**reactive**
Makes a step conditional. The function should return a boolean. This wil result in hiding/showing of the step based on input

In the example you see this step will only be shown when the 'company' field exists and is 'Digiti'

```
Chapter::make([])->reactive(function () {
    return isset($this->result['company']) && $this->result['company'] == 'Digiti' ? true : false;
})
```

**conclusion**
A chapter can show an overview of all data related to the chapter.

## Row
A row is used to wrap Columns. The behaviour is the same as in Bootstrap.
Row is not dynamic is html only. You can overwrite default classes to overwrite default styling

```
Row::make([
Column::make([
// Coulmn stuff
])
Column::make([
// other Coulmn stuff
])
])

```

**classes()**
This methods lets you overwrite classes.

```
Row::make([])->classes('custom-class')
```

## Column
A Column needs a Row as parent. The behaviour is the same as in Bootstrap.
```
Row::make([
    Column::make([
        // Column stuff
    ]),
    Column::make([
        // other Column stuff
    ])
])
```

**classes()**
This methods lets you overwrite classes.
```
Column::make([])->classes('custom-class')
```

## Heading
Let's you create a html heading.
Use the level function to select the heading type
```
Heading::make('This is a title')->level(1)
// This example will result in:
// <h1>This is a title</h1>
```

**classes()**
This methods lets you overwrite classes.

```
Heading::make('Heading')->classes('custom-class')
```

## Paragraph

```
Paragraph::make('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec semper quam. Maecenas ut orci dapibus, sodales quam quis, tincidunt nunc. Sed ultricies dui turpis, id finibus eros tincidunt ac.')

// This example will result in:

// <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec semper quam. Maecenas ut orci dapibus, sodales quam quis, tincidunt nunc. Sed ultricies dui turpis, id finibus eros tincidunt ac.</p>
```

**classes()**
This methods lets you overwrite classes.
```
Paragraph::make('paragraph')->classes('custom-class')
```

## Anchor
```
Anchor::make('http://www.google.com')->label('Google it')
// This example will result in:
// <a href="http://www.google.com">Google it</a>
```

**classes()**
This methods lets you overwrite classes.
```
Anchor::make('http://www.google.com')->classes('custom-class')
```

**target()**
This methods let's you set the target of a link.
```
Anchor::make('http://www.google.com')->target('_blank')
```

**rel()**
This methods let's you set the relationship between a linked resource and the current document.
```
Anchor::make('http://www.google.com')->target('_blank')->rel('noopener noreferrer')
```

## Html
```
Html::make('<div class="bg-primary"><h1>Test title</h1></div>')
```

## Image
```
Image::make('/assets/color-icon-automation-dark.svg')
```

**classes()**
This methods lets you overwrite classes.
```
Image::make('/assets/color-icon-automation-dark.svg')->classes('custom-class')
```
