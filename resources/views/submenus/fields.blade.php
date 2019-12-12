<!-- Parent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent', 'Parent:') !!}
    {!! Form::number('parent', null, ['class' => 'form-control']) !!}
</div>

<!-- Child Field -->
<div class="form-group col-sm-6">
    {!! Form::label('child', 'Child:') !!}
    {!! Form::number('child', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('submenus.index') }}" class="btn btn-default">Cancel</a>
</div>
