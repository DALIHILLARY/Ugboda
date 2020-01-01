<!-- Plate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plate', 'Plate:') !!}
    {!! Form::text('plate', null, ['class' => 'form-control']) !!}
</div>

<!-- Firstname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('FirstName', 'Firstname:') !!}
    {!! Form::text('FirstName', null, ['class' => 'form-control']) !!}
</div>

<!-- Lastname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('LastName', 'Lastname:') !!}
    {!! Form::text('LastName', null, ['class' => 'form-control']) !!}
</div>

<!-- Phoneno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('PhoneNo', 'Phoneno:') !!}
    {!! Form::text('PhoneNo', null, ['class' => 'form-control']) !!}
</div>

<!-- Nin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NIN', 'Nin:') !!}
    {!! Form::text('NIN', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('bodas.index') }}" class="btn btn-default">Cancel</a>
</div>
