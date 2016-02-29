<?php

namespace Modules\Formbuilder\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Formbuilder\Entities\Forms;
use Modules\Formbuilder\Http\Requests\FormbuilderRequest;

class FormbuilderController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $forms = Forms::all();

        return view('formbuilder::admin.forms.index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $form = Forms::firstOrNew(array('id' => -1));

        return view('formbuilder::admin.forms.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(FormbuilderRequest $request)
    {
        $data = $request->all();

        $result = Forms::storeForm($data);
        flash()->success(trans('core::core.messages.resource created', ['name' => trans('formbuilder::formbuilder.title.form')]));

        return redirect()->route('admin.formbuilder.formbuilder.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Paused $paused
     *
     * @return Response
     */
    public function edit($id)
    {
        $form = Forms::findOrFail($id);

        return view('formbuilder::admin.forms.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Paused  $paused
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, FormbuilderRequest $request)
    {
        $data = $request->all();
        /* print_r($data);exit; */

        $result = Forms::storeForm($data);
        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('formbuilder::formbuilder.title.form')]));

        return redirect()->route('admin.formbuilder.formbuilder.index');
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
