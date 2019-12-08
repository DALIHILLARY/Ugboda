<li class="<?php echo e(Request::is('dashboard*') ? 'active' : ''); ?>">
    <a href="<?php echo route('dashboard.index'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span>  </a>
</li>

<li class="<?php echo e(Request::is('agents*') ? 'active' : ''); ?>">
    <a href="<?php echo route('agents.index'); ?>"><i class="fa fa-fw fa-user-secret"></i><span>Agents</span></a>
</li>

<li class="<?php echo e(Request::is('treasuries*') ? 'active' : ''); ?>">
    <a href="<?php echo route('treasuries.index'); ?>"><i class="fa fa-fw fa-university"></i><span>Treasuries</span></a>
</li>

<li class="<?php echo e(Request::is('districts*') ? 'active' : ''); ?>">
    <a href="<?php echo route('districts.index'); ?>"><i class="fa fa-fw fa-map-o"></i><span>Districts</span></a>
</li>

<li class="<?php echo e(Request::is('payments*') ? 'active' : ''); ?>">
    <a href="<?php echo route('payments.index'); ?>"><i class="ion ion-cash"></i><span>Payments</span></a>
</li>

<li class="<?php echo e(Request::is('members*') ? 'active' : ''); ?>">
    <a href="<?php echo e(url('/test')); ?>"><i class="fa fa-fw fa-users"></i><span>Members</span></a>
</li>

<li>
    <a href="<?php echo e(url('/bar')); ?>"><i class="fa fa-fw fa-bar-chart"></i><span>Charts</span></a>
</li>


<?php /**PATH /home/hix/laraussd/dry-beach-93173/resources/views/layouts/menu.blade.php ENDPATH**/ ?>