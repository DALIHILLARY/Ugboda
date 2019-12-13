<!-- Rider Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rider', 'Rider:') !!}
    {!! Form::number('rider', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Pin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pin', 'Pin:') !!}
    {!! Form::text('pin', null, ['class' => 'form-control']) !!}
</div>

<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('active', 'Active:') !!}
    {!! Form::text('active', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('phones.index') }}" class="btn btn-default">Cancel</a>
</div>
