@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Submenu
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($submenu, ['route' => ['submenus.update', $submenu->id], 'method' => 'patch']) !!}

                        @include('submenus.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection