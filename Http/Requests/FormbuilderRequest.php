<?php

namespace Modules\Formbuilder\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormbuilderRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        $rules = [
            'form.name' => 'required',
            'mail.to' => 'required',
            'mail.from' => 'required',
            'mail.subject' => 'required',
            'mail.body' => 'required',
        ];

        return $rules;
    }

    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'form.name' => trans('formbuilder::formbuilder.message.form_name_required'),
            'mail.to' => trans('formbuilder::formbuilder.message.mail_to_required'),
            'mail.from' => trans('formbuilder::formbuilder.message.mail_from_required'),
            'mail.subject' => trans('formbuilder::formbuilder.message.mail_subject_required'),
            'mail.body' => trans('formbuilder::formbuilder.message.mail_body_required'),
        ];
    }
}
