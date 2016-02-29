<?php

namespace Modules\Formbuilder\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Formbuilder\Entities\Forms;

class FormcustomRequest extends FormRequest
{
    protected $fieldsDatas = [];
    /**
     * @return array
     */
    public function rules()
    {
        $rules = [];
        $data = $this->request->all();
        $formId = array_get($data, 'formbuilder_id');
        $formBuilder = Forms::find($formId);
        if ($formBuilder->id) {
            $fields = $formBuilder->getFields();
            foreach ($data as $key => $value) {
                if (array_key_exists($key, $fields)) {
                    $dataField = $fields[$key];
                    $validates = $this->getValidates($dataField);
                    $textValidate = '';
                    if (count($validates)) {
                        foreach ($validates as $validate) {
                            if ($textValidate == '') {
                                $textValidate = $validate;
                            } else {
                                $textValidate = $textValidate . '|' . $validate;
                            }
                        }
                    }
                    if ($textValidate != '') {
                        $rules[$key] = $textValidate;
                    }
                }
            }
        }

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
        $messages = [];
        $data = $this->request->all();
        $formId = array_get($data, 'formbuilder_id');
        $locale = array_get($data, 'formbuilder_locale');
        $formBuilder = Forms::find($formId);
        if ($formBuilder->id) {
            $formMessages = $formBuilder->getFormMessages($locale);
            if ($formMessages->invalid_required != '') {
                $messages['required'] = $formMessages->invalid_required;
            }
            if ($formMessages->invalid_email != '') {
                $messages['email'] = $formMessages->invalid_email;
            }
            if ($formMessages->invalid_url != '') {
                $messages['url'] = $formMessages->invalid_url;
            }
            if ($formMessages->invalid_date != '') {
                $messages['date_format'] = $formMessages->invalid_date;
            }
            if ($formMessages->invalid_number != '') {
                $messages['numeric'] = $formMessages->invalid_number;
            }
            if ($formMessages->invalid_number_too_small != '') {
                $messages['min'] = $formMessages->invalid_number_too_small;
            }
            if ($formMessages->invalid_number_too_large != '') {
                $messages['max'] = $formMessages->invalid_number_too_large;
            }
            if ($formMessages->invalid_phone != '') {
                $messages['regex'] = $formMessages->invalid_phone;
            }
        }

        return $messages;
    }

    protected function getValidates($dataField)
    {
        $validates = [];
        $required = array_get($dataField, 'required', 0);
        $type = array_get($dataField, 'type');
        if ($required == 1) {
            $validates[] = 'required';
        }
        switch ($type) {
            case 'emailinput':
                $validates[] = 'email';
                break;
            case 'urlinput':
                $validates[] = 'url';
                break;
            case 'telinput':
                $validates[] = 'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/';
                break;
            case 'dateinput':
                $validates[] = 'date_format:d/m/Y';
                break;
            case 'numberinput':
                $min = (int) array_get($dataField, 'min');
                $max = (int) array_get($dataField, 'max');
                if ($min) {
                    $validates[] = 'min:' . $min;
                }
                if ($max) {
                    $validates[] = 'max:' . $max;
                }
                $validates[] = 'numeric';
                break;
        }

        return $validates;
    }
}
