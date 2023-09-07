<?php

namespace Digiti\FormBuilder\Traits\Builder\Fieldtypes;

use Digiti\FormBuilder\Traits\Builder\HasName;

trait HasValidation
{
    protected string $defaultRule = "";
    protected string $rawRule = "";
    protected bool $ruleOverwrite = false;
    protected string $errors;

    public function getRules(): string
    {
        $rules = $this->defaultRule;

        if($this->ruleOverwrite){
            return $this->rawRule;
        }

        $rules .= isset($this->required) ? "required|" : "";

        $rules .= isset($this->min) ? "min:".$this->min."|" : "";

        $rules .= isset($this->max) ? "max:".$this->max."|": "";

        $rules .= isset($this->isEmail) && $this->isEmail ? "email|" : "";

        $rules .= isset($this->isNumeric) && $this->isNumeric ? "integer|" : "";

        $rules .= isset($this->isPassword) && $this->isPassword ? "password|" : "";

        //TODO: Probably needs a custom validation
        //$rules .= isset($this->isTel) && $this->isTel ? "integer|" : "";

        $rules .= isset($this->isUrl) && $this->isUrl ? "url|" : "";

        $rules .= !empty($this->rawRule) ? $this->rawRule."|" : "";

        return trim($rules, "|");
    }

    public function rawRule($rule, $overwrite = false): static
    {
        $this->rawRule = trim($rule, "|");
        $this->ruleOverwrite = $overwrite;
        return $this;
    }

    public function hasValidation()
    {
        return !empty($this->getRules());
    }
}
