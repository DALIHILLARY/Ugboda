<!-- Rider Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rider_Id', 'Rider Id:') !!}
    {!! Form::number('rider_Id', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_No', 'Phone No:') !!}
    {!! Form::text('phone_No', null, ['class' => 'form-control']) !!}
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
