	<?php $__env->startSection('dashboard_content'); ?>
		<?php echo $__env->make('fontend.layouts.header-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                
                    <?php echo $__env->yieldContent('content'); ?>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.layouts.dashboard-latest', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>