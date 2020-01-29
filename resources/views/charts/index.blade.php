    @extends('layouts.app')

    @section('content')
    <h1>Graphs</h1>
    
    <div style="width: 50%">
        {!! $usersChart->container() !!}
    </div>
    <div style="width: 50%">
        {!! $usersChart1->container() !!}
    </div>
    <div style="width: 50%">
        {!! $usersChart2->container() !!}
    </div>
    <div style="width: 50%">
        {!! $usersChart3->container() !!}
    </div>

    {!! $usersChart->script() !!}
    {!! $usersChart1->script() !!}
    {!! $usersChart2->script() !!}
    {!! $usersChart3->script() !!}
    @endsection