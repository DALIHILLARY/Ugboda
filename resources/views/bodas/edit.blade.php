@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Boda
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($boda, ['route' => ['bodas.update', $boda->id], 'method' => 'patch']) !!}

                        @include('bodas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection