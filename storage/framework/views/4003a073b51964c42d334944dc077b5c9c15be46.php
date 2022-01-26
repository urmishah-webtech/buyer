<?php $__env->startSection('content'); ?>
<div class="container">
   <div style="margin-top:1%" class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10 padding_0" style="background-color: #fff;padding: 1%">
         <div class="col-md-3 padding_left_0" >
            <?php echo $__env->make('fontend.template.product_category_nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
         </div>
         <div class="col-md-9">
            <div class="row" style="border-bottom:1px solid #32AFD4;margin-bottom:2%">
               <div class="col-md-4 padding_left_0">
                  <p style="font-weight:bold;font-size:18px;line-height:0px;margin-top:9%" class="logo_color">All Products</p>
               </div>
               <div class="col-md-8 text-right padding_right_0"> </div>
            </div>
            <div class="row" style="margin-bottom:2%">
               <div class="col-md-9 col-xs-12 padding_0">
                  <p style="font-weight:bold;margin-top:4%;line-height:0px" class="logo_color text-muted">Selected Products (<?php echo count($products_results) ?>/20)</p>
               </div>
               <div class="col-md-3 padding_right_0">
                  <a class="btn btn-primary btn-block contact_supplier" href="#" data-product_id="#" data-supplier_id=""><i class="fa fa-envelope"></i>&nbsp; Contact-Supplier</a>
               </div>
            </div>
            <div class="col-md-12 padding_0">
               <?php $__currentLoopData = $products_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <div class="col-md-4 product_box mkn_edit_wrapper">
                  <a target="_blank" href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $p->category_product_name->name).'='.mt_rand(100000000, 999999999).$p->bdtdcProduct->id,null)); ?>">
                     <div style="border:1px solid #ddd;padding:5%" class="">
                        <?php if($p->bdtdcProduct->product_image_new->image != null && trim($p->bdtdcProduct->product_image_new->image) != ''): ?>
                        <img class="img-responsive" alt="" style="height:189px;width:100%" src="<?php echo e(URL::asset($p->bdtdcProduct->product_image_new->image,null)); ?>">
                        <?php else: ?>
                        <img class="img-responsive" alt="" style="height:189px;width:100%" src="<?php echo e(URL::asset('uploads/no_image.jpg',null)); ?>">
                        <?php endif; ?>
                     </div>
                     <p class="text-muted hot_title product_title" style="font-size:14px; display: block;overflow: hidden;text-overflow: ellipsis;text-align: left; white-space: nowrap;"><?php echo e($p->category_product_name->name, 0, 20); ?></p>
                  </a>
                  <div class="col-md-9 padding_0 text-muted">
                     <p style="font-size:11px;line-height:0px;margin-top:5%;font-weight:bold">MOQ: <?php echo e($p->bdtdcProduct->product_prices->product_MOQ); ?> </p>
                     <p style="font-size:11px;line-height:11px;margin-top:6%;font-weight:bold">FOB Price: <?php echo e($p->bdtdcProduct->product_prices->product_FOB); ?> </p>
                  </div>
                  <div class="col-md-3 padding_0">
                     <p class="text-right padding_0">
                        <!--  <i class="fa fa-shopping-basket btn btn-primary"></i> -->
                     </p>
                  </div>
                  <?php if(Sentinel::getUser()): ?>
                  <?php if(Sentinel::inRole('admins')): ?>
                  <div class="mkn_edit_wrapper_single">
                     <a target="_blank" href="<?php echo e(URL::to('admin/make-me-login-redirect/'.$p->bdtdcProduct->supplier_product->users->id.'?redirect=supplier/product_edit/'.$p->bdtdcProduct->id)); ?>" class="btn btn-warning">Edit</a> <button data-product_id="<?php echo e($p->bdtdcProduct->id); ?>" target="_blank" class="btn btn-danger delete_product">Delete</button>
                  </div>
                  <?php endif; ?>
                  <?php endif; ?>
               </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row" style="background:#F5F5F5;margin-bottom:3%;padding-top:.8%;padding-left:1%;margin-top: 2%">
               <div class="col-md-12 padding_left_0" style="padding-top: 15px">
                  <?php echo $products_results->render(); ?>

               </div>
               
            </div>
            <div class="row" style="border-bottom:1px solid #32AFD4;margin-bottom:2%;margin-top:5%">
               <div class="col-md-12 padding_0">
                  <p class="logo_color" style="font-size:16px;font-weight:bold;line-height:5px">Main Products</p>
               </div>
            </div>
            <div class="row" style="margin-bottom:2%">
               <div class="col-md-12 padding_0">
                  <?php if(sizeof($main_products_results)>0): ?>
                  <?php $__currentLoopData = $main_products_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-md-3 mkn_edit_wrapper">
                     <a target="_blank" href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $products->name).'='.mt_rand(100000000, 999999999).$products->product_id,null)); ?>">
                        <div  style="border:1px solid #ddd;padding:5%">
                           <?php if(trim($products->product_image_new->image) != ''): ?>
                           <img class="com-list-img" alt="" style="height:126px;width:100%" src="<?php echo e(URL::asset($products->product_image_new->image,null)); ?>">
                           <?php else: ?>
                           <img class="com-list-img" alt="" style="height:126px;width:100%" src="<?php echo e(URL::asset('uploads/no_image.jpg')); ?>">
                           <?php endif; ?>
                        </div>
                        <div class="col-md-12 padding_0 text-muted">
                           <div class="col-md-12 padding_0">
                              <p class="hot_title product_title" style="font-size: 12px; margin-top: 10px; text-align: center; display: block;"><?php echo substr($products->name,0,20); ?></p>
                           </div>
                        </div>
                     </a>
                     <?php if(Sentinel::getUser()): ?>
                     <?php if(Sentinel::inRole('admins')): ?>
                     <div class="mkn_edit_wrapper_single">
                        <a target="_blank" href="<?php echo e(URL::to('admin/make-me-login-redirect/'.$products->supplierrr->supplier_id.'?redirect=supplier/product_edit/'.$products->product_id)); ?>" class="btn btn-warning">Edit</a> <button data-product_id="<?php echo e($products->product_id); ?>" target="_blank" class="btn btn-danger delete_product">Delete</button>
                     </div>
                     <?php endif; ?>
                     <?php endif; ?>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php echo $main_products_results->render(); ?>

                  <?php else: ?>
                  <h2 class="text-success text-muted text-center">Main products is not added yet....</h2>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-1"></div>
   </div>
</div>
      
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
   var nav_url = window.location.href;
   var nav_url_array = nav_url.split("/");
   var decoded_url = decodeURIComponent(nav_url);

   if(nav_url_array[3] == 'profile' && nav_url_array[4] == 'template_'){
      $('.color_changer>ul li:nth-child(2)').css('background','white');
      $('.color_changer>ul li:nth-child(2) span').css('color','black');
       
      $('ul.product_category li.list-group-item a[href="'+decoded_url+'"]').parent().css('padding','5px');
      $('ul.product_category li.list-group-item a[href="'+decoded_url+'"]').parent().css('background-color','#2e6da4');
      $('ul.product_category li.list-group-item a[href="'+decoded_url+'"]').parent().css('padding-left','15px');
      $('ul.product_category li.list-group-item a[href="'+decoded_url+'"]').parent().css('border-radius','5px');
      $('ul.product_category li.list-group-item a[href="'+decoded_url+'"]').css('color','#ffffff');
   }

   $(document).on({
      click: function(e) {
         e.preventDefault();
         if(confirm('Are you sure?')){
            var _this = $(this);
            var product_id = $(this).data('product_id');
            $.post(window.location.origin + '/x_product/' + product_id,{'_token':'<?php echo e(csrf_token()); ?>'},function(r) {
               if(r == 'deleted'){
                  _this.parent().parent().remove();
                  var relode_url = window.location.href;
                  window.location.href = relode_url;
               }else if(parseInt(r) == 'login'){
                  alert ('Please Login First.');
               }else{
                  alert ('Query failed. Please Login first.');
               }
            });
         }
      }
   }, '.delete_product');
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.template.layout_dynamic', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>