@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('formbuilder::formbuilder.title.form submitted') }} <small>{{ $form->name }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ URL::route('admin.formbuilder.formbuilder.index') }}">{{ trans('formbuilder::formbuilder.title.form builder') }}</a></li>
        <li class="active">{{ trans('formbuilder::formbuilder.title.form submitted') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
				<?php 
                    $formFields = $form->getFields();
                    $formSubmitteds = $form->formSubmit;
                ?>
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>{{ trans('formbuilder::formbuilder.table.submitted') }}</th>
							<?php if (count($formFields)): ?>
							<?php foreach ($formFields as $field): ?>
								<th>{{ $field['label'] }}</th>
							<?php endforeach; ?>
							<?php endif; ?>
							<th>{{ trans('formbuilder::formbuilder.table.client_ip') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($formSubmitteds)): ?>
                        <?php foreach ($formSubmitteds as $submitted): ?>
						<?php $data = $submitted->formSubmitData(); ?>
                        <tr>
                            <td>
								{{ $submitted->created_at }}
                            </td>
							<?php if (count($formFields)): ?>
							<?php foreach ($formFields as $field): ?>
							<?php $data = $submitted->formSubmitData(); ?>
							<td>
								<?php $fieldData = $data->firstOrNew(['field_name' => $field['name'], 'submit_id' => $submitted->id]); ?>
								{{ $fieldData->field_value }}
							</td>
							<?php endforeach; ?>
							<?php endif; ?>
							<th>{{ $submitted->client_ip }}</th>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ trans('formbuilder::formbuilder.table.submitted') }}</th>
							<?php if (count($formFields)): ?>
							<?php foreach ($formFields as $field): ?>
								<th>{{ $field['label'] }}</th>
							<?php endforeach; ?>
							<?php endif; ?>
							<th>{{ trans('formbuilder::formbuilder.table.client_ip') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    <?php if (isset($forms)): ?>
    <?php foreach ($forms as $form): ?>
    <!-- Modal -->
    <div class="modal fade modal-danger" id="confirmation-{{ $form->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ trans('core::core.modal.title') }}</h4>
                </div>
                <div class="modal-body">
                    {{ trans('core::core.modal.confirmation-message') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline btn-flat" data-dismiss="modal">{{ trans('core::core.button.cancel') }}</button>
                    {!! Form::open(['route' => ['admin.formbuilder.formbuilder.destroy', $form->id], 'method' => 'delete', 'class' => 'pull-left']) !!}
                    <button type="submit" class="btn btn-outline btn-flat"><i class="glyphicon glyphicon-trash"></i> {{ trans('core::core.button.delete') }}</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('formbuilder::formbuilder.title.create form') }}</dd>
    </dl>
@stop

@section('scripts')
    <?php $locale = App::getLocale(); ?>
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.formbuilder.formbuilder.create') ?>" }
                ]
            });
        });
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                },
                "columns": [
                    null,
					<?php if (count($formFields)): ?>
					<?php foreach ($formFields as $field): ?>
					null,
					<?php endforeach; ?>
					<?php endif; ?>
					null,
                ]
            });
        });
    </script>
@stop
