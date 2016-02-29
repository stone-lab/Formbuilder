<?php $formMessages = $form->getFormMessages($lang) ?>
<div class="box-body">
	<h3>{{ trans('formbuilder::messages.title.messages') }}</h3>
	<p>{{ trans('formbuilder::messages.text.edit messages') }}</p>
	<div class='form-group{{ $errors->has("{$lang}.messages.success") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[messages][success]", trans('formbuilder::messages.form.success')) !!}
		<?php $old = $formMessages->success ?>
		{!! Form::text("{$lang}[messages][success]", old("{$lang}.messages.success",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.success')]) !!}
		{!! $errors->first("{$lang}.messages.success", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("{$lang}.messages.failure") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[messages][failure]", trans('formbuilder::messages.form.failure')) !!}
		<?php $old = $formMessages->failure ?>
		{!! Form::text("{$lang}[messages][failure]", old("{$lang}.messages.failure",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.failure')]) !!}
		{!! $errors->first("{$lang}.messages.failure", '<span class="help-block">:message</span>') !!}
	</div>
	<!--<div class='form-group{{ $errors->has("{$lang}.messages.validation_error") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[messages][validation_error]", trans('formbuilder::messages.form.validation_error')) !!}
		<?php $old = $formMessages->validation_error ?>
		{!! Form::text("{$lang}[messages][validation_error]", old("{$lang}.messages.validation_error",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.validation_error')]) !!}
		{!! $errors->first("{$lang}.messages.validation_error", '<span class="help-block">:message</span>') !!}
	</div>-->
	<div class='form-group{{ $errors->has("{$lang}.messages.invalid_required") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[messages][invalid_required]", trans('formbuilder::messages.form.invalid_required')) !!}
		<?php $old = $formMessages->invalid_required ?>
		{!! Form::text("{$lang}[messages][invalid_required]", old("{$lang}.messages.invalid_required",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_required')]) !!}
		{!! $errors->first("{$lang}.messages.invalid_required", '<span class="help-block">:message</span>') !!}
	</div>
	<!--<div class='form-group{{ $errors->has("{$lang}.messages.invalid_too_long") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[messages][invalid_too_long]", trans('formbuilder::messages.form.invalid_too_long')) !!}
		<?php $old = $formMessages->invalid_too_long ?>
		{!! Form::text("{$lang}[messages][invalid_too_long]", old("{$lang}.messages.invalid_too_long",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_too_long')]) !!}
		{!! $errors->first("{$lang}.messages.invalid_too_long", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("{$lang}.messages.invalid_too_short") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[messages][invalid_too_short]", trans('formbuilder::messages.form.invalid_too_short')) !!}
		<?php $old = $formMessages->invalid_too_short ?>
		{!! Form::text("{$lang}[messages][invalid_too_short]", old("{$lang}.messages.invalid_too_short",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_too_short')]) !!}
		{!! $errors->first("{$lang}.messages.invalid_too_short", '<span class="help-block">:message</span>') !!}
	</div>-->
	<div class='form-group{{ $errors->has("{$lang}.messages.invalid_date") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[messages][invalid_date]", trans('formbuilder::messages.form.invalid_date')) !!}
		<?php $old = $formMessages->invalid_date ?>
		{!! Form::text("{$lang}[messages][invalid_date]", old("{$lang}.messages.invalid_date",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_date')]) !!}
		{!! $errors->first("{$lang}.messages.invalid_date", '<span class="help-block">:message</span>') !!}
	</div>
	<!--<div class='form-group{{ $errors->has("{$lang}.messages.invalid_date_too_early") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[messages][invalid_date_too_early]", trans('formbuilder::messages.form.invalid_date_too_early')) !!}
		<?php $old = $formMessages->invalid_date_too_early ?>
		{!! Form::text("{$lang}[messages][invalid_date_too_early]", old("{$lang}.messages.invalid_date_too_early",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_date_too_early')]) !!}
		{!! $errors->first("{$lang}.messages.invalid_date_too_early", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("{$lang}.messages.invalid_date_too_late") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[messages][invalid_date_too_late]", trans('formbuilder::messages.form.invalid_date_too_late')) !!}
		<?php $old = $formMessages->invalid_date_too_late ?>
		{!! Form::text("{$lang}[messages][invalid_date_too_late]", old("{$lang}.messages.invalid_date_too_late",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_date_too_late')]) !!}
		{!! $errors->first("{$lang}.messages.invalid_date_too_late", '<span class="help-block">:message</span>') !!}
	</div>-->
	<!--<div class='form-group{{ $errors->has("{$lang}.messages.upload_failed") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[messages][upload_failed]", trans('formbuilder::messages.form.upload_failed')) !!}
		<?php $old = $formMessages->upload_failed ?>
		{!! Form::text("{$lang}[messages][upload_failed]", old("{$lang}.messages.upload_failed",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.upload_failed')]) !!}
		{!! $errors->first("{$lang}.messages.upload_failed", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("{$lang}.messages.invalid_file_type") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[messages][invalid_file_type]", trans('formbuilder::messages.form.invalid_file_type')) !!}
		<?php $old = $formMessages->invalid_file_type ?>
		{!! Form::text("{$lang}[messages][invalid_file_type]", old("{$lang}.messages.invalid_file_type",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_file_type')]) !!}
		{!! $errors->first("{$lang}.messages.invalid_file_type", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("{$lang}.messages.invalid_file_size") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[messages][invalid_file_size]", trans('formbuilder::messages.form.invalid_file_size')) !!}
		<?php $old = $formMessages->invalid_file_size ?>
		{!! Form::text("{$lang}[messages][invalid_file_size]", old("{$lang}.messages.invalid_file_size",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_file_size')]) !!}
		{!! $errors->first("{$lang}.messages.invalid_file_size", '<span class="help-block">:message</span>') !!}
	</div>-->
	<div class='form-group{{ $errors->has("{$lang}.messages.invalid_number") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[messages][invalid_number]", trans('formbuilder::messages.form.invalid_number')) !!}
		<?php $old = $formMessages->invalid_number ?>
		{!! Form::text("{$lang}[messages][invalid_number]", old("{$lang}.messages.invalid_number",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_number')]) !!}
		{!! $errors->first("{$lang}.messages.invalid_number", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("{$lang}.messages.invalid_number_too_small") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[messages][invalid_number_too_small]", trans('formbuilder::messages.form.invalid_number_too_small')) !!}
		<?php $old = $formMessages->invalid_number_too_small ?>
		{!! Form::text("{$lang}[messages][invalid_number_too_small]", old("{$lang}.messages.invalid_number_too_small",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_number_too_small')]) !!}
		{!! $errors->first("{$lang}.messages.invalid_number_too_small", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("{$lang}.messages.invalid_number_too_large") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[messages][invalid_number_too_large]", trans('formbuilder::messages.form.invalid_number_too_large')) !!}
		<?php $old = $formMessages->invalid_number_too_large ?>
		{!! Form::text("{$lang}[messages][invalid_number_too_large]", old("{$lang}.messages.invalid_number_too_large",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_number_too_large')]) !!}
		{!! $errors->first("{$lang}.messages.invalid_number_too_large", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("{$lang}.messages.invalid_email") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[messages][invalid_email]", trans('formbuilder::messages.form.invalid_email')) !!}
		<?php $old = $formMessages->invalid_email ?>
		{!! Form::text("{$lang}[messages][invalid_email]", old("{$lang}.messages.invalid_email",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_email')]) !!}
		{!! $errors->first("{$lang}.messages.invalid_email", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("{$lang}.messages.invalid_url") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[messages][invalid_url]", trans('formbuilder::messages.form.invalid_url')) !!}
		<?php $old = $formMessages->invalid_url ?>
		{!! Form::text("{$lang}[messages][invalid_url]", old("{$lang}.messages.invalid_url",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_url')]) !!}
		{!! $errors->first("{$lang}.messages.invalid_url", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("{$lang}.messages.invalid_phone") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[messages][invalid_phone]", trans('formbuilder::messages.form.invalid_phone')) !!}
		<?php $old = $formMessages->invalid_phone ?>
		{!! Form::text("{$lang}[messages][invalid_phone]", old("{$lang}.messages.invalid_phone",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::messages.form.invalid_phone')]) !!}
		{!! $errors->first("{$lang}.messages.invalid_phone", '<span class="help-block">:message</span>') !!}
	</div>
</div>
