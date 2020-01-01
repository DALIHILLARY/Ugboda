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

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::text('gender', null, ['class' => 'form-control']) !!}
</div>

<!-- Nin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NIN', 'Nin:') !!}
    {!! Form::text('NIN', null, ['class' => 'form-control']) !!}
</div>

<!-- Next Of Kin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Next of Kin', 'Next Of Kin:') !!}
    {!! Form::text('Next of Kin', null, ['class' => 'form-control']) !!}
</div>

<!-- District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('District_Id', 'District Id:') !!}
    {!! Form::number('District_Id', null, ['class' => 'form-control']) !!}
</div>

<!-- Region Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Region_Id', 'Region Id:') !!}
    {!! Form::number('Region_Id', null, ['class' => 'form-control']) !!}
</div>

<!-- Plate Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plate_id', 'Plate Id:') !!}
    {!! Form::text('plate_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('riders.index') }}" class="btn btn-default">Cancel</a>
</div>
