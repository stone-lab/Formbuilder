<?php

namespace Modules\Formbuilder\Entities;

use DB;
use Illuminate\Database\Eloquent\Model;
use Log;
use Modules\Formbuilder\Events\FormbuilderEvent;
use Modules\Formbuilder\Shortcodes\FormbuilderShortcode;

class FormsSubmits extends Model
{
    protected $table = 'formbuilder__form_submits';
    protected $fillable = ['form_id', 'locale', 'client_ip'];
    public $unSaveField = ['_token', 'formbuilder_id'];

    public function formSubmitData()
    {
        return $this->hasMany('Modules\Formbuilder\Entities\FormSubmitData', 'submit_id', 'id');
    }

    public static function submitData($data, $dataFiles)
    {
        $bResult = false;
        $formId = array_get($data, 'formbuilder_id');
        $locale = array_get($data, 'formbuilder_locale');
        $clientIp = array_get($data, 'client_ip');
        $formBuilder = Forms::find($formId);
        if ($formBuilder->id) {
            DB::beginTransaction();
            try {
                $formSubmit = new self();
                $formSubmit->form_id    = $formId;
                $formSubmit->locale    = $locale;
                $formSubmit->client_ip    = $clientIp;
                $formSubmit->save();
                $formSubmitId = $formSubmit->id;
                $order = 0;
                foreach ($data as $key => $value) {
                    if (!in_array($key, $formSubmit->unSaveField)) {
                        $formSubmitData = new FormSubmitData();
                        $formSubmitData->submit_id = $formSubmitId;
                        $formSubmitData->field_name = $key;
                        $formSubmitData->field_value = $value;
                        $formSubmitData->field_order = $order;
                        $formSubmitData->save();
                        ++$order;
                        FormbuilderShortcode::registerSubmitShortcode($key, $value);
                    }
                }
                foreach ($dataFiles as $key => $value) {
                    if (!in_array($key, $formSubmit->unSaveField)) {
                        $formSubmitData = new FormSubmitData();
                        $formSubmitData->submit_id = $formSubmitId;
                        $formSubmitData->field_name = $key;
                        $formSubmitData->field_value = $value;
                        $formSubmitData->field_order = $order;
                        $formSubmitData->is_file = 1;
                        $formSubmitData->save();
                        ++$order;
                        FormbuilderShortcode::registerSubmitShortcode($key, $value);
                    }
                }
                DB::commit();
                $formMail = new FormMail();
                $formMail->sendMail($formSubmitId, $locale);
                event(new FormbuilderEvent('submit_form', $data));
                $bResult = true;
            } catch (\Exception $ex) {
                Log::info($ex);
                DB::rollback();
            }
        }

        return $bResult;
    }
}
