<!-- Rider Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rider_Id', 'Rider Id:') !!}
    {!! Form::number('rider_Id', null, ['class' => 'form-control']) !!}
</div>

<!-- Plate Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plate_Id', 'Plate Id:') !!}
    {!! Form::text('plate_Id', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Catergory Field -->
<div class="form-group col-sm-6">
    {!! Form::label('catergory', 'Catergory:') !!}
    {!! Form::text('catergory', null, ['class' => 'form-control']) !!}
</div>

<!-- Progress Field -->
<div class="form-group col-sm-6">
    {!! Form::label('progress', 'Progress:') !!}
    {!! Form::text('progress', null, ['class' => 'form-control']) !!}
</div>

<!-- Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location', 'Location:') !!}
    {!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('reports.index') }}" class="btn btn-default">Cancel</a>
</div>
