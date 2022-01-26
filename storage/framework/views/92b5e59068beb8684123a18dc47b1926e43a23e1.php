<?php $__env->startSection('maincontent'); ?>
<?php echo $__env->make('protected.admin.layouts.notify', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- BEGIN HEADER -->
<div class="clearfix"></div>
<!-- BEGIN CONTAINER -->
<div class="test">
   <div class="page-container">
      <?php echo $__env->yieldContent('dashboard_content'); ?>
      </div>
      <div class="page-footer">
         <div class="page-footer-inner">
            <?php echo e(date('Y')); ?> &copy; BuyerSeller.CO <a href="http://www.buyerseller.asia" title="" target="_blank"></a>
         </div>
         <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
         </div>
      </div>
   
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('protected.admin.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>