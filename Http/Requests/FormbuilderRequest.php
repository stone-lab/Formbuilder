<?php

namespace Modules\Formbuilder\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class FormbuilderRequest extends BaseFormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        $rules = [];

        return $rules;
    }

    /**
     * @return array
     */
    public function translationRules()
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
        return [];
    }

    /**
     * @return array
     */
    public function translationMessages()
    {
        return [
            'form.name.required' => trans('formbuilder::formbuilder.message.form_name_required'),
            'mail.to.required' => trans('formbuilder::formbuilder.message.mail_to_required'),
            'mail.from.required' => trans('formbuilder::formbuilder.message.mail_from_required'),
            'mail.subject.required' => trans('formbuilder::formbuilder.message.mail_subject_required'),
            'mail.body.required' => trans('formbuilder::formbuilder.message.mail_body_required'),
        ];
    }
}
