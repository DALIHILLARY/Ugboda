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

<!-- Gender Field -->
<div class="form-group">
    {!! Form::label('gender', 'Gender:') !!}
    <p>{{ $rider->gender }}</p>
</div>

<!-- Nin Field -->
<div class="form-group">
    {!! Form::label('NIN', 'Nin:') !!}
    <p>{{ $rider->NIN }}</p>
</div>

<!-- District Id Field -->
<div class="form-group">
    {!! Form::label('District_Id', 'District Id:') !!}
    <p>{{ $rider->District_Id }}</p>
</div>

<!-- Plate Id Field -->
<div class="form-group">
    {!! Form::label('plate_Id', 'Plate Id:') !!}
    <p>{{ $rider->plate_Id }}</p>
</div>

