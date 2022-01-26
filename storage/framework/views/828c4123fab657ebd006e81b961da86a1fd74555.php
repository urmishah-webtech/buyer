<?php $__env->startSection('dashboard_content'); ?>
<?php echo $__env->make('protected.admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="page-content-wrapper">
   <div class="page-content">
      	<?php echo $__env->make('protected.admin.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      	<?php echo $__env->yieldContent('content'); ?>
   </div>
</div>
<?php $__env->stopSection(); ?>







<?php echo $__env->make('protected.admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>