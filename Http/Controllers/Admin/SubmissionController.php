<?php

namespace Modules\Formbuilder\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Formbuilder\Entities\Forms;

class SubmissionController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $forms = Forms::all();

        return view('formbuilder::admin.submissions.index', compact('forms'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function form($id)
    {
        $form = Forms::findOrFail($id);

        return view('formbuilder::admin.submissions.form', compact('form'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Paused $paused
     *
     * @return Response
     */
    public function destroy($id)
    {
        Forms::findOrFail($id)->delete();
        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('formbuilder::formbuilder.title.form')]));

        return redirect()->route('admin.formbuilder.formbuilder.index');
    }
}
