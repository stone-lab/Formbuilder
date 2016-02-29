<?php $formMail = $form->getFormMail($lang) ?>
<div class="box-body">
	<h3>{{ trans('formbuilder::mail.title.mail') }}</h3>
	<!--<p>{{ trans('formbuilder::mail.text.edit mail') }}</p>-->
	<div class='form-group{{ $errors->has("{$lang}.mail.to") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[mail][to]", trans('formbuilder::mail.form.to')) !!}
		<?php $old = $formMail->to ?>
		{!! Form::text("{$lang}[mail][to]", old("{$lang}.mail.to",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::mail.form.to')]) !!}
		{!! $errors->first("{$lang}.mail.to", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("{$lang}.mail.from") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[mail][from]", trans('formbuilder::mail.form.from')) !!}
		<?php $old = $formMail->from ?>
		{!! Form::text("{$lang}[mail][from]", old("{$lang}.mail.from",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::mail.form.from')]) !!}
		{!! $errors->first("{$lang}.mail.from", '<span class="help-block">:message</span>') !!}
	</div>
	<div class='form-group{{ $errors->has("{$lang}.mail.subject") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[mail][subject]", trans('formbuilder::mail.form.subject')) !!}
		<?php $old = $formMail->subject ?>
		{!! Form::text("{$lang}[mail][subject]", old("{$lang}.mail.subject",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::mail.form.subject')]) !!}
		{!! $errors->first("{$lang}.mail.subject", '<span class="help-block">:message</span>') !!}
	</div>
	<!--<div class='form-group{{ $errors->has("mail.additional_headers") ? ' has-error' : '' }}'>
		{!! Form::label("mail[additional_headers]", trans('formbuilder::mail.form.additional_headers')) !!}
		<?php $old = $formMail->additional_headers ?>
		{!! Form::textarea("mail[additional_headers]", old("mail.additional_headers",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::mail.form.additional_headers')]) !!}
		{!! $errors->first("mail.additional_headers", '<span class="help-block">:message</span>') !!}
	</div>-->
	<div class='form-group{{ $errors->has("{$lang}.mail.body") ? ' has-error' : '' }}'>
		{!! Form::label("{$lang}[mail][body]", trans('formbuilder::mail.form.body')) !!}
		<?php $old = $formMail->body ?>
		{!! Form::textarea("{$lang}[mail][body]", old("{$lang}.mail.body",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::mail.form.body')]) !!}
		{!! $errors->first("{$lang}.mail.body", '<span class="help-block">:message</span>') !!}
	</div>
	<!--<div class='form-group{{ $errors->has("mail.attachments") ? ' has-error' : '' }}'>
		{!! Form::label("mail[attachments]", trans('formbuilder::mail.form.attachments')) !!}
		<?php $old = $formMail->attachments ?>
		{!! Form::textarea("mail[attachments]", old("mail.attachments",$old), ['class' => "form-control", 'placeholder' => trans('formbuilder::mail.form.attachments')]) !!}
		{!! $errors->first("mail.attachments", '<span class="help-block">:message</span>') !!}
	</div>-->
</div>
