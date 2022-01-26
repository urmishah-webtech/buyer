<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-xs-12">
   <?php if(session()->has('flash_message')): ?>
   <p><?php echo e(session()->get('flash_message')); ?></p>
   <?php endif; ?>
</div>
<style>
   #selectedFiles img {
      max-width: 100px;
      max-height: 100px;
      float: left;
      margin-bottom:10px;
   }
   .close {
      float:left;
      display:inline-block;
      padding:2px 5px;
      background:#ccc;
   }
   .close:hover {
      float:left;
      display:inline-block;
      padding:2px 5px;
      background:#ccc;
      color:#fff;
   }
</style>

<h3 class="page-title">
   Notice List
</h3>
<div class="page-bar">
   <ul class="page-breadcrumb">
      <li>
         <i class="fa fa-home"></i>
         <a href="<?php echo e(URL::route('admin_dashboard')); ?>">Home</a>
         <i class="fa fa-angle-right"></i>
      </li>
      <li>
         <a href="#">Notice List</a>
      </li>
   </ul>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
   <div class="col-md-12">
      <div class="portlet light" style="height:320px">
         <div class="portlet-title">
            <div class="caption">
               <i class="icon-basket font-green-sharp"></i>
               <span class="caption-subject font-green-sharp bold uppercase">
                  Notice List</span>
            </div>
            <div class="actions btn-set">
               <!-- <button class="btn green-haze btn-circle" type="submit"><i class="fa fa-check"></i> Save</button> -->
               <a href="<?php echo e(URL::route('admin.notice_create')); ?>" class="btn green-haze btn-circle">Create Notice</a>
               <!-- <button class="btn green-haze btn-circle"><i class="fa fa-check-circle"></i> Save & Continue Edit</button> -->
            </div>
         </div>
         <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
               <tr class="test-center">
                  <td>Sl</td>
                  <td>Title</td>
                  <td>Details</td>
                  <td>Created Time</td>
                  <td>Action</td>
               </tr>
            </thead>
            <tbody class="trade_table_body">
               <?php $i=1; ?>
               <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <tr>
                  <td><?php echo e($i++); ?></td>
                  <td><?php echo e($notice->title); ?></td>
                  <td><?php echo e(substr($notice->details, 0, 100)); ?> <?php if(strlen($notice->details) > 100): ?>... <?php endif; ?></td>
                  <td><?php echo e(date('d-M-Y',strtotime($notice->created_at))); ?> </td>
                  <td>
                     <a href="<?php echo e(URL::to('admin/noticeView',$notice->id)); ?>" class="btn btn-xs btn-primary">View</a>
                     <a href="<?php echo e(URL::to('admin/noticeEdit',$notice->id)); ?>" class="btn btn-xs btn-info">Edit</a>
                     <a href="<?php echo e(URL::to('admin/noticeDelete',$notice->id)); ?>" class="btn btn-xs btn-danger">Delete</a>
                  </td>
               </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
         </table>
         <?php echo e($notices->links()); ?>

      </div>
   </div>
</div>
</div>

<!-- END PAGE CONTENT-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
   $(document).ready(function() {
       $('#example').DataTable();
   } );
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('protected.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>