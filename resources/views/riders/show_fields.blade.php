<!-- Firstname Field -->
<div class="form-group">
    {!! Form::label('FirstName', 'Firstname:') !!}
    <p>{{ $rider->FirstName }}</p>
</div>

<!-- Lastname Field -->
<div class="form-group">
    {!! Form::label('LastName', 'Lastname:') !!}
    <p>{{ $rider->LastName }}</p>
</div>

<!-- District Field -->
<div class="form-group">
    {!! Form::label('District', 'District:') !!}
    <p>{{ $rider->District }}</p>
</div>

<!-- Plate Field -->
<div class="form-group">
    {!! Form::label('Plate', 'Plate:') !!}
    <p>{{ $rider->Plate }}</p>
</div>

