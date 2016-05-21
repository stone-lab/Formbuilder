<?php

namespace Modules\Formbuilder\Entities;

use Illuminate\Database\Eloquent\Model;

class FormSubmitData extends Model
{
    public $timestamps = false;
    protected $table = 'formbuilder__form_submit_data';
    protected $fillable = ['submit_id', 'field_name', 'field_value', 'field_order'];
}
