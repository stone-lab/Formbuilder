<?php

namespace Modules\Formbuilder\Entities;

use Illuminate\Database\Eloquent\Model;

class FormContent extends Model
{
    protected $table = 'formbuilder__form_contents';
    protected $fillable = ['form_id', 'locale', 'name', 'content', 'json', 'edited'];
    protected $fieldsDatas = [];
}
