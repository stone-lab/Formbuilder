<?php

namespace Modules\Formbuilder\Http\Controllers;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Formbuilder\Entities\Forms;
use Modules\Formbuilder\Entities\FormsSubmits;
use Modules\Formbuilder\Http\Requests\FormcustomRequest;

class FormController extends BasePublicController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function send(FormcustomRequest $request)
    {
        $data = $request->all();
        $data['client_ip'] = $request->ip();
        $files = $request->file();
        $formId = array_get($data, 'formbuilder_id');
        if (is_array($files)) {
            $dataFiles = array();
            foreach ($files as $key => $file) {
                if ($file->isValid()) {
                    $pathStructur = '/media/' . $formId . '/';
                    $destinationPath = public_path() . $pathStructur;
                    $fileName = rand(11111, 99999) . '.' . $file->getClientOriginalName();
                    if (!is_dir($destinationPath)) {
                        \File::makeDirectory($destinationPath, 0777, true, true);
                    }
                    $file->move($destinationPath, $fileName);
                    $dataFiles[$key] = $pathStructur . $fileName;
                    unset($data[$key]);
                }
            }
        }
        $formId = array_get($data, 'formbuilder_id');
        $formBuilder = Forms::find($formId);
        $successMsg = trans('formbuilder::formbuilder.message.success_submit');
        $errorMsg = trans('formbuilder::formbuilder.message.error_submit');
        if ($formBuilder->id) {
            $formMessages = $formBuilder->messages;
            if ($formMessages->success != '') {
                $successMsg = $formMessages->success;
            }
            if ($formMessages->failure != '') {
                $errorMsg = $formMessages->failure;
            }
        }
        $result = FormsSubmits::submitData($data, $dataFiles);
        if ($result) {
            flash()->success($successMsg);
        } else {
            flash()->error($errorMsg);
        }

        return redirect()->back();
    }
}
