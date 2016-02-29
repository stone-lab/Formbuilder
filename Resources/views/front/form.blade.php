@include('flash::message')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<?php $currentLocale    = LaravelLocalization::getCurrentLocale(); ?>
<?php $formContent        = $form->getFormContent($currentLocale)->content ?>
{!! Form::open(['route' => ['front.formbuilder.formbuilder.send'], 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}
	{!! Form::hidden("formbuilder_id", $form->id) !!}
	{!! Form::hidden("formbuilder_locale", $currentLocale) !!}
	{!! Shortcode::compile($formContent) !!}
{!! Form::close() !!}
