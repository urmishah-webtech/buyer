	<?php $__env->startSection('dashboard_content'); ?>
<?php if(Sentinel::check()): ?>
	<?php echo $__env->make('fontend.layouts.header-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php else: ?>
	<?php echo $__env->make('fontend.layouts.header-home', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
	<?php echo $__env->yieldContent('content'); ?>
	<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='https://embed.tawk.to/f9789200ea56c64f14d8e8db4d860d9eeee15c16/default';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.layouts.dashboard-home', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>