<!-- Plate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plate', 'Plate:') !!}
    {!! Form::text('plate', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::text('category', null, ['class' => 'form-control']) !!}
</div>

<!-- Progress Field -->
<div class="form-group col-sm-6">
    {!! Form::label('progress', 'Progress:') !!}
    {!! Form::text('progress', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('reports.index') }}" class="btn btn-default">Cancel</a>
</div>
