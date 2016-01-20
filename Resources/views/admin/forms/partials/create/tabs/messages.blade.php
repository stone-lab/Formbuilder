<?php $formMessages = $form->getFormMessages() ?>
<div class="box-body">
	<h3>{{ trans('formbuilder::messages.title.messages') }}</h3>
	<p>{{ trans('formbuilder::messages.text.edit messages') }}</p>
	<div class='form-group{{ $errors->has("messages.success") ? ' has-error' : '' }}'>
		{!! Form::label("messages[success]", trans('formbuilder::messages.form.success')) !!}
		<?php $old = $formMessages->success ?>
		{!! Form::text("messages[success]", old("messages.success",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.success')]) !!}
		{!! $errors->first("messages.success", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("messages.failure") ? ' has-error' : '' }}'>
		{!! Form::label("messages[failure]", trans('formbuilder::messages.form.failure')) !!}
		<?php $old = $formMessages->failure ?>
		{!! Form::text("messages[failure]", old("messages.failure",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.failure')]) !!}
		{!! $errors->first("messages.failure", '<span class="help-block">:message</span>') !!}
	</div>
	<!--<div class='form-group{{ $errors->has("messages.validation_error") ? ' has-error' : '' }}'>
		{!! Form::label("messages[validation_error]", trans('formbuilder::messages.form.validation_error')) !!}
		<?php $old = $formMessages->validation_error ?>
		{!! Form::text("messages[validation_error]", old("messages.validation_error",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.validation_error')]) !!}
		{!! $errors->first("messages.validation_error", '<span class="help-block">:message</span>') !!}
	</div>-->
	<div class='form-group{{ $errors->has("messages.invalid_required") ? ' has-error' : '' }}'>
		{!! Form::label("messages[invalid_required]", trans('formbuilder::messages.form.invalid_required')) !!}
		<?php $old = $formMessages->invalid_required ?>
		{!! Form::text("messages[invalid_required]", old("messages.invalid_required",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_required')]) !!}
		{!! $errors->first("messages.invalid_required", '<span class="help-block">:message</span>') !!}
	</div>
	<!--<div class='form-group{{ $errors->has("messages.invalid_too_long") ? ' has-error' : '' }}'>
		{!! Form::label("messages[invalid_too_long]", trans('formbuilder::messages.form.invalid_too_long')) !!}
		<?php $old = $formMessages->invalid_too_long ?>
		{!! Form::text("messages[invalid_too_long]", old("messages.invalid_too_long",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_too_long')]) !!}
		{!! $errors->first("messages.invalid_too_long", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("messages.invalid_too_short") ? ' has-error' : '' }}'>
		{!! Form::label("messages[invalid_too_short]", trans('formbuilder::messages.form.invalid_too_short')) !!}
		<?php $old = $formMessages->invalid_too_short ?>
		{!! Form::text("messages[invalid_too_short]", old("messages.invalid_too_short",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_too_short')]) !!}
		{!! $errors->first("messages.invalid_too_short", '<span class="help-block">:message</span>') !!}
	</div>-->
	<div class='form-group{{ $errors->has("messages.invalid_date") ? ' has-error' : '' }}'>
		{!! Form::label("messages[invalid_date]", trans('formbuilder::messages.form.invalid_date')) !!}
		<?php $old = $formMessages->invalid_date ?>
		{!! Form::text("messages[invalid_date]", old("messages.invalid_date",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_date')]) !!}
		{!! $errors->first("messages.invalid_date", '<span class="help-block">:message</span>') !!}
	</div>
	<!--<div class='form-group{{ $errors->has("messages.invalid_date_too_early") ? ' has-error' : '' }}'>
		{!! Form::label("messages[invalid_date_too_early]", trans('formbuilder::messages.form.invalid_date_too_early')) !!}
		<?php $old = $formMessages->invalid_date_too_early ?>
		{!! Form::text("messages[invalid_date_too_early]", old("messages.invalid_date_too_early",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_date_too_early')]) !!}
		{!! $errors->first("messages.invalid_date_too_early", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("messages.invalid_date_too_late") ? ' has-error' : '' }}'>
		{!! Form::label("messages[invalid_date_too_late]", trans('formbuilder::messages.form.invalid_date_too_late')) !!}
		<?php $old = $formMessages->invalid_date_too_late ?>
		{!! Form::text("messages[invalid_date_too_late]", old("messages.invalid_date_too_late",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_date_too_late')]) !!}
		{!! $errors->first("messages.invalid_date_too_late", '<span class="help-block">:message</span>') !!}
	</div>-->
	<!--<div class='form-group{{ $errors->has("messages.upload_failed") ? ' has-error' : '' }}'>
		{!! Form::label("messages[upload_failed]", trans('formbuilder::messages.form.upload_failed')) !!}
		<?php $old = $formMessages->upload_failed ?>
		{!! Form::text("messages[upload_failed]", old("messages.upload_failed",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.upload_failed')]) !!}
		{!! $errors->first("messages.upload_failed", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("messages.invalid_file_type") ? ' has-error' : '' }}'>
		{!! Form::label("messages[invalid_file_type]", trans('formbuilder::messages.form.invalid_file_type')) !!}
		<?php $old = $formMessages->invalid_file_type ?>
		{!! Form::text("messages[invalid_file_type]", old("messages.invalid_file_type",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_file_type')]) !!}
		{!! $errors->first("messages.invalid_file_type", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("messages.invalid_file_size") ? ' has-error' : '' }}'>
		{!! Form::label("messages[invalid_file_size]", trans('formbuilder::messages.form.invalid_file_size')) !!}
		<?php $old = $formMessages->invalid_file_size ?>
		{!! Form::text("messages[invalid_file_size]", old("messages.invalid_file_size",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_file_size')]) !!}
		{!! $errors->first("messages.invalid_file_size", '<span class="help-block">:message</span>') !!}
	</div>-->
	<div class='form-group{{ $errors->has("messages.invalid_number") ? ' has-error' : '' }}'>
		{!! Form::label("messages[invalid_number]", trans('formbuilder::messages.form.invalid_number')) !!}
		<?php $old = $formMessages->invalid_number ?>
		{!! Form::text("messages[invalid_number]", old("messages.invalid_number",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_number')]) !!}
		{!! $errors->first("messages.invalid_number", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("messages.invalid_number_too_small") ? ' has-error' : '' }}'>
		{!! Form::label("messages[invalid_number_too_small]", trans('formbuilder::messages.form.invalid_number_too_small')) !!}
		<?php $old = $formMessages->invalid_number_too_small ?>
		{!! Form::text("messages[invalid_number_too_small]", old("messages.invalid_number_too_small",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_number_too_small')]) !!}
		{!! $errors->first("messages.invalid_number_too_small", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("messages.invalid_number_too_large") ? ' has-error' : '' }}'>
		{!! Form::label("messages[invalid_number_too_large]", trans('formbuilder::messages.form.invalid_number_too_large')) !!}
		<?php $old = $formMessages->invalid_number_too_large ?>
		{!! Form::text("messages[invalid_number_too_large]", old("messages.invalid_number_too_large",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_number_too_large')]) !!}
		{!! $errors->first("messages.invalid_number_too_large", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("messages.invalid_email") ? ' has-error' : '' }}'>
		{!! Form::label("messages[invalid_email]", trans('formbuilder::messages.form.invalid_email')) !!}
		<?php $old = $formMessages->invalid_email ?>
		{!! Form::text("messages[invalid_email]", old("messages.invalid_email",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_email')]) !!}
		{!! $errors->first("messages.invalid_email", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("messages.invalid_url") ? ' has-error' : '' }}'>
		{!! Form::label("messages[invalid_url]", trans('formbuilder::messages.form.invalid_url')) !!}
		<?php $old = $formMessages->invalid_url ?>
		{!! Form::text("messages[invalid_url]", old("messages.invalid_url",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_url')]) !!}
		{!! $errors->first("messages.invalid_url", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("messages.invalid_phone") ? ' has-error' : '' }}'>
		{!! Form::label("messages[invalid_phone]", trans('formbuilder::messages.form.invalid_phone')) !!}
		<?php $old = $formMessages->invalid_phone ?>
		{!! Form::text("messages[invalid_phone]", old("messages.invalid_phone",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_phone')]) !!}
		{!! $errors->first("messages.invalid_phone", '<span class="help-block">:message</span>') !!}
	</div>
</div>
