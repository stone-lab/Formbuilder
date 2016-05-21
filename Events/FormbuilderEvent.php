<?php

namespace Modules\Formbuilder\Events;

class FormbuilderEvent
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var int
     */
    public $name;

    public function __construct($name, array $data)
    {
        $this->data = $data;
        $this->name = $name;
    }
}
