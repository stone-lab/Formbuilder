<style>
	.checkbox label{
		padding-left: 20px;
	}
	label.checkbox {
		padding-left: 20px;
	}
</style>
<div class="box-body">
	<div class='form-group{{ $errors->has("form.name") ? ' has-error' : '' }}'>
		<h2>{{ trans('formbuilder::formbuilder.form.name') }}</h2>
		<?php $old = $form->name ?>
		{!! Form::text("form[name]", old("form.name",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::formbuilder.form.name')]) !!}
		{!! $errors->first("form.name", '<span class="help-block">:message</span>') !!}
	</div>
	<div class="row" style="margin-bottom:20px;">
		<div class="col-md-3">
			<a href="javascript:void(0)" onclick="showEditTextarea()" class="btn btn-primary pull-left btn-flat">{{ trans('formbuilder::formbuilder.form.generate_to_edit') }}</a>
		</div>
	</div>
	<div class='form-group' id="content_edited" <?php if (!$form->edited): ?>style="display:none;"<?php endif; ?> >
		<?php if ($form->edited): ?>
			<?php $old = $form->content ?>
		<?php else: ?>
			<?php $old = '' ?>
		<?php endif; ?>
		{!! Form::textarea("form[content_edited]", old("form.content_edited",$old), ['id' => "render_edited", 'class' => "form-control"]) !!}
	</div>
	{!! Form::hidden("form[id]", $form->id) !!}
	<?php $oldContent = $form->content ?>
	{!! Form::textarea("form[content]", old("form.content",$oldContent), ['id' => "render_shortcode", 'class' => "form-control"]) !!}
	<?php $oldJson = $form->json ?>
	{!! Form::textarea("form[json]", old("form.json",$oldJson), ['id' => "render_json", 'class' => "form-control"]) !!}
	<div class="row">
        <!-- Building Form. -->
        <div class="col-md-6">
          <div class="clearfix">
            <h2>{{ trans('formbuilder::formbuilder.form.your_form') }}</h2>
            <hr>
            <div id="build">
              <div id="target" class="form-horizontal">
              </div>
            </div>
          </div>
        </div>
        <!-- / Building Form. -->

        <!-- Components -->
        <div class="col-md-6">

          <h2>{{ trans('formbuilder::formbuilder.form.drag_drop_components') }}</h2>
          <hr>
          <div class="tabbable">
            <ul class="nav nav-tabs" id="formtabs">
              <!-- Tab nav -->
            </ul>
            <div id="components" class="form-horizontal">
              <fieldset>
                <div class="tab-content">
                  <!-- Tabs of snippets go here -->
                </div>
              </fieldset>
            </div>
          </div>
        </div>
        <!-- / Components -->

      </div>
</div>
@section('scripts')
	@parent
	<script type="text/javascript">
		<?php if (old('form.json', $oldJson)): ?>
		var jsonStringFormbuilder = {!! old("form.json",$oldJson) !!};
		<?php else: ?>
		var jsonStringFormbuilder = [
									  { "title" : "Form Name"
										, "fields": {
										  "name" : {
											"label"   : "Form Name"
											, "type"  : "input"
											, "value" : "Form Name"
										  }
										}
									  }
									];
		<?php endif; ?>
	</script>
	<script data-main="js/main" src="{!! Module::asset('formbuilder:js/lib/require.js?v=3') !!}" ></script>
	<script type="text/javascript">
		require.config({
		  baseUrl: "{!! Module::asset('formbuilder:js/lib/') !!}"
		  , shim: {
			'backbone': {
			  deps: ['underscore', 'jquery'],
			  exports: 'Backbone'
			},
			'underscore': {
			  exports: '_'
			},
			'bootstrap': {
			  deps: ['jquery'],
			  exports: '$.fn.popover'
			}
		  }
		  , paths: {
			app         : ".."
			, collections : "../collections"
			, data        : "../data"
			, models      : "../models"
			, helper      : "../helper"
			, templates   : "../templates"
			, views       : "../views"
		  }
		});
		require([ 'app/app'], function(app){
		  app.initialize(jsonStringFormbuilder);
		});

	</script>

@stop