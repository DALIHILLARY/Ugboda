<li class="{{ Request::is('riders*') ? 'active' : '' }}">
    <a href="{{ route('riders.index') }}"><i class="fa fa-edit"></i><span>Riders</span></a>
</li>

<li class="{{ Request::is('logs*') ? 'active' : '' }}">
    <a href="{{ route('logs.index') }}"><i class="fa fa-edit"></i><span>Logs</span></a>
</li>

<li class="{{ Request::is('phones*') ? 'active' : '' }}">
    <a href="{{ route('phones.index') }}"><i class="fa fa-edit"></i><span>Phones</span></a>
</li>

<li class="{{ Request::is('reports*') ? 'active' : '' }}">
    <a href="{{ route('reports.index') }}"><i class="fa fa-edit"></i><span>Reports</span></a>
</li>

