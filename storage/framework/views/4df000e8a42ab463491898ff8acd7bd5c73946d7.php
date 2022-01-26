<div  class="row item_sha" style="padding-bottom:5px;padding-top: 0">
	 <div class="col-sm-3 col-md-2 col-xs-12" style="padding-top: 10px">
	     <div class="col-sm-12 col-xs-12 mobo-categories hr-gap no-padding" style="height:100%;">
	         <h3><a href="#"><i class="fa fa-list-ul"></i> Main Market</a></h3>
	         <form action="<?php echo e(URL::to('filter_by_main_market',null)); ?>" method="post" id="search_by_main_market_form" class="text-muted">
	         <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
	         	<input type="hidden" name="searched_on" value="<?php echo e($searched_on); ?>">
				<input type="hidden" name="search_str" value="<?php echo e($search_str); ?>">
    	         <?php $__currentLoopData = $main_market_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    	            <p class="p-inp" style="margin-bottom: 0px;font-size:11px">
    	            	<label style="margin-bottom: 0px; font-size: 11px; cursor: pointer;">
    	            		<input style="position: relative; top: 3px; cursor: pointer;" type="checkbox" name="filter_by_main_market[]" value="<?php echo e($m->main_market_zone_id); ?>">&nbsp;<span><?php echo e(trim($m->market_name)); ?></span>
    	            	</label>
    	            </p>  
    	         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    	         <div class="button_holder col-md-12 col-xs-12" style="display: block;padding-top: 10%;padding-bottom: 5%;padding-left: 0;">
    	             <input type="submit" value="Search" class="btn btn-xs btn-primary search_by_main_market_btn" style="margin-top: 2%;padding-bottom:1%">
    	             <a href="" class="btn btn-xs btn-danger cancel_search" style="margin-top: 2%">Cancel</a>
    	         </div>
	         </form>
	         <div class="col-md-12" style="padding-left: 0px">
	             <h4 style="margin-bottom:3%;margin-top:6%">Total Revenue</h4>
	             
    	         	<p style="margin-bottom:5px;font-size:11px"><a data-ca_revanue_id="0" href="<?php echo e(URL::to('filter_by_total_revanue',$searched_on.'_0')); ?>" class="text-muted filter_by_total_revanue_btn">All</a></p>
    	         <?php $__currentLoopData = $revanue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    	             <p style="margin-bottom:5px;font-size:11px"><a data-ca_revanue_id="<?php echo e($r->revanue_id); ?>" href="<?php echo e(URL::to('filter_by_total_revanue',$searched_on.'_'.$r->revanue_id)); ?>" class="text-muted filter_by_total_revanue_btn"><?php echo e(trim($r->revanue_name)); ?> </a></p>
    	         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    	         <h4 style="margin-bottom:3%;margin-top:6%">No Of Employe</h4>
    	         <p style="margin-bottom:5px;font-size:11px"><a data-total_employe_id="0" href="<?php echo e(URL::to('filter_by_employe',$searched_on.'_0')); ?>" class="text-muted filter_by_total_employe_btn">All </a></p>
    	         <?php $__currentLoopData = $total_employe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    	             <p style="margin-bottom:5px;font-size:11px"><a data-total_employe_id="<?php echo e($e->total_employe_id); ?>" href="<?php echo e(URL::to('filter_by_employe',$searched_on.'_'.$e->total_employe_id)); ?>" class="text-muted filter_by_total_employe_btn"><?php echo e(trim($e->total_employe)); ?></a></p>
    	         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	         </div>
	         
	     </div>
	     <br>
	     <br>
	     <br>
	     <div class="shipping text-center">
	       
	         <img src="<?php echo asset('assets/dashboard/images/home/shipping.jpg'); ?>" alt="">
	     </div>
	    
	 
	</div>

