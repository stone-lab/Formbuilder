@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('formbuilder::formbuilder.title.create form') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ URL::route('admin.formbuilder.formbuilder.index') }}">{{ trans('formbuilder::formbuilder.title.form builder') }}</a></li>
        <li class="active">{{ trans('formbuilder::formbuilder.title.create form') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
    {!! Theme::style('css/vendor/iCheck/flat/blue.css') !!}
    <style>
        .checkbox label {
            padding-left: 0;
        }
    </style>
	<link href="{{{ Module::asset('formbuilder:css/styles.css') }}}" rel="stylesheet" type="text/css" />
@stop

@section('content')
	{!! Form::open(['route' => ['admin.formbuilder.formbuilder.store'], 'method' => 'post', 'files' => true]) !!}
	{!! Form::hidden("id", $form->id) !!}
    <div class="row">
        <div class="col-xs-12">
			<div class="nav-tabs-custom">
                @include('partials.form-tab-headers', ['fields' => ['title', 'body']])
                <div class="tab-content">
                    <?php $i = 0; ?>
                    <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                    <?php ++$i; ?>
                    <div class="tab-pane {{ App::getLocale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                        <div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
								<li class="active">
									<a data-toggle="tab" href="#tab_form_{{ $i }}" aria-expanded="false" onclick="">{!! trans('formbuilder::formbuilder.tab.form') !!}</a>
									
								</li>
								<li class="">
									<a data-toggle="tab" href="#tab_mail_{{ $i }}" aria-expanded="false" onclick="">{!! trans('formbuilder::formbuilder.tab.mail') !!}</a>
								</li>
								<li class="">
									<a data-toggle="tab" href="#tab_messages_{{ $i }}" aria-expanded="false" onclick="">{!! trans('formbuilder::formbuilder.tab.messages') !!}</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab_form_{{ $i }}">
									@include('formbuilder::admin.forms.partials.create.tabs.form', ['lang' => $locale])
								</div>
								<div class="tab-pane" id="tab_mail_{{ $i }}">
									@include('formbuilder::admin.forms.partials.create.tabs.mail', ['lang' => $locale])
								</div>
								<div class="tab-pane" id="tab_messages_{{ $i }}">
									@include('formbuilder::admin.forms.partials.create.tabs.messages', ['lang' => $locale])
								</div>
							</div>
						</div> {{-- end nav-tabs-custom --}}
                    </div>
                    <?php endforeach; ?>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('formbuilder::formbuilder.button.create') }}</button>
                        <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('formbuilder::formbuilder.button.reset') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ URL::route('admin.formbuilder.formbuilder.index')}}"><i class="fa fa-times"></i> {{ trans('formbuilder::formbuilder.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
    </div>
	{!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('formbuilder::formbuilder.navigation.back to index') }}</dd>
    </dl>
@stop

@section('scripts')
	@parent
	{!! Theme::script('js/vendor/jquery-ui-1.10.3.min.js') !!}
	<script src="{{{ Module::asset('formbuilder:js/custom.js') }}}"></script>
    <script type="text/javascript">
        $(function() {
            /*CKEDITOR.replaceAll(function( textarea, config ) {
                if (!$(textarea).hasClass('ckeditor')) {
                    return false;
                }
                config.language = '<?php echo App::getLocale() ?>';
            } );*/
        });
    </script>
    <script>
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.page.page.index') ?>" }
                ]
            });
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });

            $('input[type="checkbox"]').on('ifChecked', function(){
                $(this).parent().find('input[type=hidden]').remove();
            });

            $('input[type="checkbox"]').on('ifUnchecked', function(){
                var name = $(this).attr('name'),
                    input = '<input type="hidden" name="' + name + '" value="0" />';
                $(this).parent().append(input);
            });
        });
    </script>
@stop
