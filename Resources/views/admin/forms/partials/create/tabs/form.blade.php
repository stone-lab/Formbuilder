<?php $formContent = $form->getFormContent($lang) ?>
<style>
	.checkbox label{
		padding-left: 20px;
	}
	label.checkbox {
		padding-left: 20px;
	}
</style>
<div class="box-body">
	<div class='form-group{{ $errors->has("{$lang}.form.name") ? ' has-error' : '' }}'>
		<h2>{{ trans('formbuilder::formbuilder.form.name') }}</h2>
		<?php $old = $formContent->name ?>
		{!! Form::text("{$lang}[form][name]", old("{$lang}.form.name",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::formbuilder.form.name')]) !!}
		{!! $errors->first("{$lang}.form.name", '<span class="help-block">:message</span>') !!}
	</div>
	<div class="row" style="margin-bottom:20px;">
		<div class="col-md-3">
			<a href="javascript:void(0)" onclick="showEditTextarea('<?php echo $lang ?>')" class="btn btn-primary pull-left btn-flat">{{ trans('formbuilder::formbuilder.form.generate_to_edit') }}</a>
		</div>
		<div class="col-md-3">
			<button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#copy-form-builder-{{ $lang }}">{{ trans('formbuilder::formbuilder.form.copy_form_builder') }}</button>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="copy-form-builder-{{ $lang }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title" id="myModalLabel">{{ trans('core::core.modal.title') }}</h4>
					</div>
					<div class="modal-body">
						 <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
							<?php if ($locale != $lang): ?>
								<a data-dismiss="modal" href="javascript:void(0)" onclick="copyFormbuilder<?php echo $lang ?>('<?php echo $locale ?>')" class="btn btn-primary">{{ $language['name'] }}</a>
							<?php endif; ?>
						 <?php endforeach; ?>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">{{ trans('core::core.button.cancel') }}</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class='form-group content-edited' id="content_edited_<?php echo $lang ?>" <?php if (!$formContent->edited): ?>style="display:none;"<?php endif; ?> >
		<?php if ($formContent->edited): ?>
			<?php $old = $formContent->content ?>
		<?php else: ?>
			<?php $old = '' ?>
		<?php endif; ?>
		{!! Form::textarea("{$lang}[form][content_edited]", old("form.content_edited",$old), ['id' => "render_edited_" . $lang, 'class' => "form-control render-edited render-edited-" . $i]) !!}
	</div>
	<?php $oldContent = $formContent->content ?>
	{!! Form::textarea("{$lang}[form][content]", old("form.content",$oldContent), ['id' => "render_shortcode_"  . $lang, 'class' => "form-control render-shortcode"]) !!}
	<?php $oldJson = $formContent->json ?>
	{!! Form::textarea("{$lang}[form][json]", old("form.json",$oldJson), ['id' => "render_json_" . $lang, 'class' => "form-control render-json render-json-" . $i]) !!}
	<div class="row">
        <!-- Building Form. -->
        <div class="col-md-6">
          <div class="clearfix">
            <h2>{{ trans('formbuilder::formbuilder.form.your_form') }}</h2>
            <hr>
            <div id="build_<?php echo $lang ?>">
              <div id="target_<?php echo $lang ?>" class="form-horizontal form-target">
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
            <ul class="nav nav-tabs" id="formtabs_<?php echo $lang ?>">
              <!-- Tab nav -->
            </ul>
            <div id="components_<?php echo $lang ?>" class="form-horizontal form-components">
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
{!! Form::hidden("form_init_" . $lang, 1, ['id' => "form_init_" . $lang]) !!}
{!! Form::hidden("form_render_" . $lang, 1, ['id' => "form_render_" . $lang]) !!}
@section('scripts')
	@parent
	<script type="text/javascript">
		<?php if (old('form.json', $oldJson)): ?>
		var jsonStringFormbuilder<?php echo $lang ?> = {!! old("form.json",$oldJson) !!};
		<?php else: ?>
		var jsonStringFormbuilder<?php echo $lang ?> = [
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
		  app.initialize(jsonStringFormbuilder<?php echo $lang ?>, '<?php echo $lang ?>');
		});
		
		function copyFormbuilder<?php echo $lang ?>(locale){
			$('#target_<?php echo $lang ?>').html('');
			$('#formtabs_<?php echo $lang ?>').html('');
			$('#components_<?php echo $lang ?> > .tab-content').html('');
			var jsonStringFormbuilder = $('#render_json_' + locale).val();
			jsonStringFormbuilder = JSON.parse(jsonStringFormbuilder);
			var number_init		= parseInt($('#form_init_<?php echo $lang ?>').val());
			number_init			= number_init + 1;
			$('#form_init_<?php echo $lang ?>').val(number_init);
			require([ 'app/app'], function(app){
			  app.initialize(jsonStringFormbuilder, '<?php echo $lang ?>');
			});
		}
	</script>

@stop