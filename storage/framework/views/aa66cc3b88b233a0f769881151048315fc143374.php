
<script type="text/javascript" src="<?php echo asset('assets/global/plugins/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/global/plugins/jquery-migrate.min.js' ); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/global/plugins/jquery-ui/jquery-ui.min.js' ); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/global/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js' ); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js' ); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/global/plugins/jquery.blockui.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/global/plugins/jquery.cokie.min.js' ); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/global/plugins/uniform/jquery.uniform.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js' ); ?>"></script>

<script type="text/javascript" src="<?php echo asset('assets/global/plugins/flot/jquery.flot.min.js' ); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/global/plugins/flot/jquery.flot.resize.min.js' ); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/global/plugins/flot/jquery.flot.categories.min.js'); ?>"></script>
<script src="<?php echo asset('assets/global/scripts/metronic.js'); ?>" type="text/javascript"></script>
<script src="<?php echo asset('assets/admin/layout2/scripts/layout.js'); ?>" type="text/javascript"></script>
<script src="<?php echo asset('assets/admin/layout2/scripts/demo.js'); ?>" type="text/javascript"></script>
<script src="<?php echo asset('assets/admin/pages/scripts/table-managed.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/global/plugins/jquery.pulsate.min.js' ); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/global/plugins/bootstrap-daterangepicker/moment.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js' ); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/global/plugins/fullcalendar/fullcalendar.min.js' ); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/global/plugins/jquery.sparkline.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/admin/layout2/scripts/quick-sidebar.js'); ?>"></script>



<script type="text/javascript" src="<?php echo asset('assets/admin/pages/scripts/index.js' ); ?>"></script>

<script type="text/javascript" src="<?php echo asset('assets/admin/pages/scripts/tasks.js'); ?>"></script>

 
<script type="text/javascript" src="<?php echo asset('assets/global/plugins/select2/select2.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/dashboard/js/front_custom.js'); ?>"></script>
<script src="<?php echo e(URL::asset('assets/fontend/js/animatedModal.min.js')); ?>"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->





<?php echo $__env->yieldContent('shortlistJS'); ?>

<?php echo $__env->make('fontend.layouts.scripts-notification', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   Demo.init(); // init demo features 
   QuickSidebar.init(); // init quick sidebar
   // TableManaged.init();
     
   // Index.initDashboardDaterange();
  // Index.initJQVMAP(); // init index page's custom scripts
   // Index.initCalendar(); // init index page's custom scripts
   // Index.initCharts(); // init index page's custom scripts
   // Index.initChat();
   // Index.initMiniCharts();
   // Tasks.initDashboardWidget();

   
});
</script>
<?php echo $__env->yieldContent('script'); ?>
<?php $__env->startSection('scripts'); ?>
    
<?php echo $__env->yieldSection(); ?>