@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('formbuilder::formbuilder.title.submission') }} <small>{{ trans('formbuilder::formbuilder.title.forms') }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ URL::route('admin.formbuilder.formbuilder.index') }}">{{ trans('formbuilder::formbuilder.title.form builder') }}</a></li>
        <li class="active">{{ trans('formbuilder::formbuilder.title.submissions') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>{{ trans('formbuilder::formbuilder.table.id') }}</th>
                            <th>{{ trans('formbuilder::formbuilder.table.name') }}</th>
                            <th>{{ trans('formbuilder::formbuilder.table.submissions') }}</th>
                            <th>{{ trans('formbuilder::formbuilder.table.shortcode') }}</th>
                            <th>{{ trans('formbuilder::formbuilder.table.created at') }}</th>
                            <th>{{ trans('formbuilder::formbuilder.table.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($forms)): ?>
                        <?php foreach ($forms as $form): ?>
                        <tr>
                            <td>
                                <a href="{{ URL::route('admin.formbuilder.submissions.form', [$form->id]) }}">
                                    {{ $form->id }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ URL::route('admin.formbuilder.submissions.form', [$form->id]) }}">
                                    <?php $currentLocale    = LaravelLocalization::getCurrentLocale(); ?>
                                    <?php $formName    = $form->getFormContent($currentLocale)->name ?>
                                    {{ $formName }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ URL::route('admin.formbuilder.submissions.form', [$form->id]) }}">
                                    {!! count($form->formSubmits) !!}
                                </a>
                            </td>
                            <td>
                                [form id={{ $form->id }}]
                            </td>
                            <td>
                                <a href="{{ URL::route('admin.formbuilder.submissions.form', [$form->id]) }}">
                                    {{ $form->created_at }}
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <!--<a href="{{ URL::route('admin.formbuilder.submissions.form', [$form->id]) }}" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#confirmation-{{ $form->id }}"><i class="glyphicon glyphicon-trash"></i></button>!-->
                                    <a href="{{ URL::route('admin.formbuilder.submissions.form', [$form->id]) }}" class="btn btn-primary btn-flat">{{ trans('formbuilder::formbuilder.button.view submission') }}</a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ trans('formbuilder::formbuilder.table.id') }}</th>
                            <th>{{ trans('formbuilder::formbuilder.table.name') }}</th>
                            <th>{{ trans('formbuilder::formbuilder.table.submissions') }}</th>
                            <th>{{ trans('formbuilder::formbuilder.table.shortcode') }}</th>
                            <th>{{ trans('formbuilder::formbuilder.table.created at') }}</th>
                            <th>{{ trans('formbuilder::formbuilder.table.actions') }}</th>
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
                    {!! Form::open(['route' => ['admin.formbuilder.submissions.destroy', $form->id], 'method' => 'delete', 'class' => 'pull-left']) !!}
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
                    null,
                    null,
                    { "sortable": false },
                    { "sortable": false }
                ]
            });
        });
    </script>
@stop
