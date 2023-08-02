# Conversion-tool

TODO: write intro for the package


# Forms

TODO: write documentation for forms

### Methods
****

**schema()** 
Define your chapters and inputs here in an array. This will be automagically be converted in a functional form.

```
public  function  schema()
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

> **Note:** The **make($string)** method is required to construct a fieldtype object

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

### Methods
****

**type($string)** 
Changes the text input type to the value provided in  ` $string `

```
	Text::make('firstname')->type("text"),
```

**email()** 
Changes the text input type to email

```
	Text::make('email')->email(),
```

**integer()** 
Changes the text input type to integer

```
	Text::make('quantity')->integer(),
```

**password()** 
Changes the text input type to password

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

**label**
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
**label**
Will overwrite the name with the given label
```
    Range::make('amount')->label('Slide for the correct amount')
```

**min**
Set minimum value of slider
```
    Range::make('amount')->min(10)
```

**max**
Set maximum value of slider
```
    Range::make('amount')->max(200)
```

**step**
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
            ],
        ]),
```

**multiple()** 
This method enables you to select multiple options

```
	Select::make('Multi select')->options([...])->multiple(),
```

# Chapters

TODO: write documentation for chapters and their use
