<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $type;
    public $name;
    public $value;
    public $label;
    public $class;
    public $placeholder;
    public $options;
    public function __construct($type='', $name='', $value='', $label='', $class='', $placeholder='', $options=[])
    {
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->class = $class;
        $this->placeholder = $placeholder;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input');
    }
}
