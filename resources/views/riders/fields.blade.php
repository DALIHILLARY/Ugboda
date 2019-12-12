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

<!-- District Field -->
<div class="form-group col-sm-6">
    {!! Form::label('District', 'District:') !!}
    {!! Form::text('District', null, ['class' => 'form-control']) !!}
</div>

<!-- Plate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Plate', 'Plate:') !!}
    {!! Form::text('Plate', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('riders.index') }}" class="btn btn-default">Cancel</a>
</div>
