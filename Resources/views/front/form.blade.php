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
{!! Form::open(['route' => ['front.formbuilder.formbuilder.send'], 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}
	{!! Form::hidden("formbuilder_id", $form->id) !!}
	{!! $form->content !!}
{!! Form::close() !!}
