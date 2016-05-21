@extends('layouts.master')

@section('content-header')
    <?php $currentLocale    = LaravelLocalization::getCurrentLocale(); ?>
    <?php $formName    = $form->getFormContent($currentLocale)->name ?>
    <h1>
        {{ $formName }} <small>{{ trans('formbuilder::formbuilder.title.submission') }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ URL::route('admin.formbuilder.formbuilder.index') }}">{{ trans('formbuilder::formbuilder.title.form builder') }}</a></li>
        <li><a href="{{ URL::route('admin.formbuilder.submissions.index') }}">{{ trans('formbuilder::formbuilder.title.submissions') }}</a></li>
        <li class="active">{{ $formName }}</li>
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
                    $formSubmissions = $form->formSubmits;
                ?>
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>{{ trans('formbuilder::formbuilder.table.submission') }}</th>
							<?php if (count($formFields)): ?>
							<?php foreach ($formFields as $field): ?>
								<th>{{ $field['label'] }}</th>
							<?php endforeach; ?>
							<?php endif; ?>
							<th>{{ trans('formbuilder::formbuilder.table.client_ip') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($formSubmissions)): ?>
                        <?php foreach ($formSubmissions as $submission): ?>
						<?php $data = $submission->formSubmitData(); ?>
                        <tr>
                            <td>
								{{ $submission->created_at }}
                            </td>
							<?php if (count($formFields)): ?>
							<?php foreach ($formFields as $field): ?>
							<?php $data = $submission->formSubmitData(); ?>
							<td>
								<?php $fieldData = $data->firstOrNew(['field_name' => $field['name'], 'submit_id' => $submission->id]); ?>
								{{ $fieldData->field_value }}
							</td>
							<?php endforeach; ?>
							<?php endif; ?>
							<th>{{ $submission->client_ip }}</th>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ trans('formbuilder::formbuilder.table.submission') }}</th>
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
