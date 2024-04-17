<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public $name;
    public $label;
    public $options;
    public $valueKey;
    public $nameKey;
    public $class;
    public function __construct($name='', $label='', $options=[], $valueKey='', $nameKey='', $class='')
    {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->valueKey = $valueKey;
        $this->nameKey = $nameKey;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select');
    }
}
