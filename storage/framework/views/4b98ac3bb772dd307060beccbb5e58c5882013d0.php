<?php 
      $product_groups=DB::table('bdtdc_supplier_product_groups')->where('company_id',Route::current()->parameters()['profile_id'])->get();
      //print_r(Route::current()->parameters());
?>
<div style="margin-bottom:5%;margin-top:1%" class="col-sm-12 padding_left_0">
      <form class="form" method="post" action="<?php echo e(URL::to('profile/search_',Route::current()->parameters()['profile_id'],null)); ?>">
            <?php echo e(csrf_field()); ?>

      <div class="input-group">
            <input type="text" placeholder="Search item" class="form-control" name="key">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search-plus"></i></button>
            </span>
      </div>
      </form>
</div>
<div class="col-sm-12 padding_left_0">
      <p style="background:#F5F5F5;padding-left:9%;padding-top:4%;padding-bottom:4%"><a href="<?php echo e(URL::to('profile/product_/'.Route::current()->parameters()['profile_id'] )); ?>" class="logo_color">Product Showcase &nbsp;<i class="fa fa-caret-right"></i></a></p>
</div>
<div class="col-md-12 padding_left_0">
      <?php 
            $nav_menus=\App\Model\BdtdcPage::where('prefix','Templete')->get();
            $product_groups=DB::table('bdtdc_supplier_product_groups')->where('company_id',Route::current()->parameters()['profile_id'])->where('active',1)->get();
            //print_r(Route::current()->parameters());
            // dd($product_groups);
      ?>
      <ul class="list-group product_category">
            <li style="border-bottom:1px solid #32AFD4;background:#F5F5F5;" class="list-group-item"><span class="capability_list logo_color">Product Categories</span></li>
            <?php $__currentLoopData = $product_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="list-group-item"><a href="<?php echo e(URL::to('profile/template_/'.Route::current()->parameters()['profile_id'].'/'.$product_group->name,null)); ?>"><?php echo e($product_group->name); ?></a></li>
           
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
      </ul>
</div>
<!-- <div class="col-sm-12 padding_left_0">
      <p style="background:#F5F5F5;padding-left:9%;padding-top:4%;padding-bottom:4%;font-weight:bold;border-bottom:1px solid #32AFD4" class="logo_color">Related Product &nbsp;<i class="fa fa-hand-o-down"></i></p>
      <div style="padding:6%;margin-top:0%;padding-bottom:0%" class="col-md-12">
            <div class="col-md-12">
                  <img class="img-responsive" alt="" style="widht:100%;border:1px solid #DDDDDD;height:113px" src="<?php echo e(URL::asset('resources/assets/images/template/bedroom_1.jpg')); ?>">
            </div>
            <div class="col-md-12">
                  <p style="font-size:13px;font-weight:bold" class="text-muted">Latest style designer bag...</p>
            </div>
      </div>
      <div style="padding:6%;margin-top:0%;padding-bottom:0%" class="col-md-12">
            <div class="col-md-12">
                  <img class="img-responsive" alt="" style="widht:100%;border:1px solid #DDDDDD;height:113px" src="<?php echo e(URL::asset('resources/assets/images/template/bedroom_3.jpg')); ?>">
            </div>
            <div class="col-md-12">
                  <p style="font-size:13px;font-weight:bold" class="text-muted">2016 New designer hand bag...</p>
            </div>
      </div>
      <div style="padding:6%;margin-top:0%;padding-bottom:0%" class="col-md-12">
            <div class="col-md-12">
                  <img class="img-responsive" alt="" style="widht:100%;border:1px solid #DDDDDD;height:113px" src="<?php echo e(URL::asset('resources/assets/images/template/bedroom_4.jpg')); ?>">
            </div>
            <div class="col-md-12">
                  <p style="font-size:13px;font-weight:bold" class="text-muted">Stock style one more company...</p>
            </div>
      </div>
      <div style="padding:6%;margin-top:0%;padding-bottom:0%" class="col-md-12">
            <div class="col-md-12">
                  <img class="img-responsive" alt="" style="widht:100%;border:1px solid #DDDDDD;height:113px" src="<?php echo e(URL::asset('resources/assets/images/template/bedroom_8.jpg')); ?>">
            </div>
            <div class="col-md-12">
                  <p style="font-size:13px;font-weight:bold" class="text-muted">Lady metal frme iron...</p>
            </div>
      </div>
</div> -->