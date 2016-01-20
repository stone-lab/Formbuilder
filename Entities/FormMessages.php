<?php

namespace Modules\Formbuilder\Entities;

use Illuminate\Database\Eloquent\Model;

class FormMessages extends Model
{
    protected $table = 'formbuilder__form_messages';
    public $translatedAttributes = [];
    protected $fillable = ['form_id',
                            'success',
                            'failure',
                            'validation_error',
                            'invalid_required',
                            'invalid_too_long',
                            'invalid_too_short',
                            'invalid_date',
                            'invalid_date_too_early',
                            'invalid_date_too_late',
                            'upload_failed',
                            'invalid_file_type',
                            'invalid_file_size',
                            'invalid_number',
                            'invalid_number_too_small',
                            'invalid_number_too_large',
                            'invalid_email',
                            'invalid_url',
                            'invalid_phone',
                            ];
}
