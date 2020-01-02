<!-- Passphone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('passPhone', 'Passphone:') !!}
    {!! Form::text('passPhone', null, ['class' => 'form-control']) !!}
</div>

<!-- Riderphone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('riderPhone', 'Riderphone:') !!}
    {!! Form::text('riderPhone', null, ['class' => 'form-control']) !!}
</div>

<!-- Plate Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plate_Id', 'Plate Id:') !!}
    {!! Form::text('plate_Id', null, ['class' => 'form-control']) !!}
</div>

<!-- Approved Field -->
<div class="form-group col-sm-6">
    {!! Form::label('approved', 'Approved:') !!}
    {!! Form::text('approved', null, ['class' => 'form-control']) !!}
</div>

<!-- Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location', 'Location:') !!}
    {!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('logs.index') }}" class="btn btn-default">Cancel</a>
</div>
