<!-- Parent Field -->
<div class="form-group">
    {!! Form::label('parent', 'Parent:') !!}
    <p>{{ $submenu->parent }}</p>
</div>

<!-- Child Field -->
<div class="form-group">
    {!! Form::label('child', 'Child:') !!}
    <p>{{ $submenu->child }}</p>
</div>

