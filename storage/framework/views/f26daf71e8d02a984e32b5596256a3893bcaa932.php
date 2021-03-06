	<?php $__env->startSection('content'); ?>
<?php echo $__env->make('mobile-view.country-product.template-header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $id = Route::current()->parameters()['profile_id'];?>
<div class="row padding_0" style="background: #fff">
     <div style="padding: 14px 0 0; width: 100%;">
        <div class="viewport">
         <?php if($company_images): ?>
   
        <img src="<?php echo e(URL::to('uploads',$company_images->image)); ?>" class="comp-pro-img">
        <?php else: ?>
        <img src="<?php echo e(URL::to('uploads','company_logo_pLCIz2kPL3.jpg')); ?>" class="comp-pro-img">
        <img src="<?php echo e(URL::to('uploads','company_logo_pLCIz2kPL3.jpg')); ?>" class="comp-pro-img">
       
        <?php endif; ?>
     </div>
    </div>  
</div>
<div class="row padding_0" style="background: #fff;">
    <div class="col-xs-12" style="padding-bottom: 20px; border-bottom: 1px solid #ddd;">

      		<div class="col-xs-5 padding_0">
      				<div class="comp-charct" style="padding-left: 0;">
      						<div class="comp-charct-char"><dt class="comp-charct-char-dt">Business Type:</dt></div>
      						<div class="comp-charct-char"><dt class="comp-charct-char-dt">Year Established:</dt></div>
      						<div class="comp-charct-char"><dt class="comp-charct-char-dt">Total Annual Revenue :</dt></div>
      						<div class="comp-charct-char"><dt class="comp-charct-char-dt">Main Markets:</dt></div>
                  <!-- <div class="comp-charct-char"><dt class="comp-charct-char-dt">Registration No.:</dt></div> -->
      				</div>
      		</div>
      		<div class="col-xs-7">
      				<div class="comp-charct">
      						<div class="comp-charct-char">
                                <dd class="comp-charct-dd">
                                    <?php echo e(($company) ? $company->busines_type_id : ""); ?>

                                </dd>
                            </div>
                                                                
      						<div class="comp-charct-char">
                                <?php if($company->establish_date): ?>
                                    <dd class="comp-charct-dd">
                                        <?php echo e($company->establish_date or ''); ?>

                                    </dd>
                                  <?php endif; ?>
                            </div>
      						<div class="comp-charct-char">
                                <dd class="comp-charct-dd">
                                    <?php echo e(($company) ? $company->annoual_value : ""); ?>

                                </dd>
                            </div>

      						<div class="comp-charct-char">
                                <dd class="comp-charct-dd">
                                 <?php
                                  $main_market = DB::table('bdtdc_company_main_markets as mm')
                                              ->join('bdtdc_form_values as fv','fv.id','=','mm.main_market_zone')
                                              ->where('mm.company_id',Route::current()->parameters()['profile_id'])
                                              ->get(['fv.value']);
                                  $i=0;
                                  foreach($main_market as $m)
                                  {
                                        if($i<4){
                                              echo $m->value .', ';
                                        }else{
                                              echo "<span class='btn-link'></span>..";
                                              break;
                                        }
                                        $i++;
                                  } 
                            ?></dd>
                            </div>
                  <!-- <div class="comp-charct-char"><dd class="comp-charct-dd">38554865</dd></div> -->
      				</div>
      		</div>
      </div>
  </div>
<div class="row padding_0" style="background: #fff; padding-bottom: 40px; margin-bottom: 20px; border-bottom: 1px solid #ddd;">
  <div class="col-xs-12 padding_0">
   <h2 class="con-h2" style="margin: 0;">Company Description</h2>
   </div>
  <div class="col-xs-12 padding_0">
  <div class="descript-block" style="padding-bottom: 26px;">
        
        <div id="description-content">
            <?php
                  $c_description = DB::table('bdtdc_company_descriptions')->where('company_id',Route::current()->parameters()['profile_id'])->first();
                  //dd($c_description);
                  echo (isset($c_description)) ? $c_description->description : "";
            ?> 
        </div>
    </div> 
  </div> 
</div>
<?php echo $__env->make('mobile-view.country-product.chat-supplier', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mobile-view.layout.master-profile-m', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>