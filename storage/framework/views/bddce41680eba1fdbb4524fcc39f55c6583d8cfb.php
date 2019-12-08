<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Chart Demo</div>

                <div class="panel-body">
                    <?php echo $chart->html(); ?>

                    <?php echo $chart1->html(); ?>

                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo Charts::scripts(); ?>

<?php echo $chart->script(); ?>

<?php echo $chart1->script(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hix/laraussd/dry-beach-93173/resources/views/chart.blade.php ENDPATH**/ ?>