  <?php $__env->startSection('content'); ?>
  <?php
  $customer=App\Model\BdtdcCompany::with('customers','users')->where('id',Route::current()->parameters()['profile_id'])->first();
          //print_r($customer->location_of_reg);
        use App\Model\User;
         $profile_id=Route::current()->parameters()['profile_id'];
    ?>
<?php echo $__env->make('mobile-view.country-product.template-header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="row" style="background: #fff;">
    <div class="col-xs-12 padding_0" style="padding-bottom: 20px; border-bottom: 1px solid #ddd;">

          <div class="col-xs-4 padding_0">
              <div class="comp-charct">
                  <div class="comp-charct-char"><dt class="comp-charct-char-dt">Business Type:</dt></div>
                  <div class="comp-charct-char"><dt class="comp-charct-char-dt">Year Established:</dt></div>
                  <div class="comp-charct-char"><dt class="comp-charct-char-dt">Main Products:</dt></div>
                  <div class="comp-charct-char"><dt class="comp-charct-char-dt">Main Markets:</dt></div>
              </div>
          </div>
          <div class="col-xs-8">
              <div class="comp-charct">
                  <div class="comp-charct-char"><dd class="comp-charct-dd"><?php echo e(($company_info) ? $company_info->busines_type_id :""); ?></dd></div>
                  <div class="comp-charct-char"><dd class="comp-charct-dd"><?php echo e($company_info->establish_date ?? ''); ?></dd></div>
                  <div class="comp-charct-char"><dd class="comp-charct-dd"><?php $__currentLoopData = $main_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php echo e($data->product_name); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></dd></div>
                  <div class="comp-charct-char"><dd class="comp-charct-dd">Domestic Market, North America, Western Europe, Eastern Asia, Oceania</dd></div>
              </div>
          </div>
      </div>
  </div>
<!--   <div class="row padding_0" style="padding-bottom: 40px; background: #fff;">
            <div class="col-xs-12">
                <a href="#">
                <div class="sup-ttyp"><img style="width: 25px;" src="<?php echo asset('resources/assets/mobile-images/Buyer-protection-home.png'); ?>" alt="bdtdc"><span style="margin-left: 12px; color:#666;">Trade Assurance</span></div>
                </a>
                <div class="cont-inf">Order quality and on-time shipment safeguards
                       </div>
                       <div class="cont-inf" style="margin-top: 5px;">
                          Trade Assurance Amount: <span style="color: #F60;">US $56,000</span>
                       </div>
            </div>
</div> -->
<div class="row" style="background: #fff;padding-bottom: 50px; margin-bottom: 20px; border-bottom: 1px solid #ddd;">
            <div class="col-xs-12 padding_0">
              <div class="product-block">
            <div style="float: left;font-size: 24px; color:#666; clear: both;"><h2 class="con-h2">Latest Product Of This Supplier</h2>
            </div>
            <div itemscope itemtype="http://schema.org/Product">
               <?php if($products_lists): ?>
                <ul class="hot-pr-list" style="float: left; display: block;clear: both;max-width: 767px;">
                   <?php $__currentLoopData = $products_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   
                    <li class="hot-pr-list-li" style="width: 50%;">
                       <?php if($pro->pro_to_cat_name): ?>
                       <a itemprop="url" class="hot-pr-list-li-a" title="<?php echo e($pro->pro_to_cat_name->name ?? ''); ?>" target="_blank" href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $pro->pro_to_cat_name->name).'='.mt_rand(100000000, 999999999).$pro->product_id)); ?>">
                        <?php else: ?>
                        <a itemprop="url" class="hot-pr-list-li-a" title="" target="_blank" href="<?php echo e(URL::to('product-details/'.'='.mt_rand(100000000, 999999999).$pro->product_id)); ?>">
                        <?php endif; ?>
                        
                        <?php if($pro->pro_images_new): ?>
                           
                                    <img itemprop="image" src="<?php echo e(URL::to((isset($pro->pro_images_new)) ? $pro->pro_images_new->image : 'no_image.jpg')); ?>" class="hot-pr-list-li-img" alt="<?php echo e($pro->pro_to_cat_name->name ?? ''); ?>" />
                             
                        <?php else: ?>
                            <img itemprop="image" src="<?php echo e(URL::to('uploads/no_image.jpg')); ?>" class="hot-pr-list-li-img" alt="<?php echo e($pro->pro_to_cat_name->name ?? ''); ?>" />
                        <?php endif; ?>
                        <?php if($pro->pro_to_cat_name): ?>
                    <span class="hot-pr-list-li-span"><?php echo e(substr($pro->pro_to_cat_name->name, 0, 24)); ?></span>
                    <?php else: ?>
                    <span class="hot-pr-list-li-span">need to add product name</span>
                    </a>
                    <?php endif; ?>

                    </li>
                  
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </ul>
          
      
       </div>

           <?php if($customer): ?>
      <div style="margin: 0 auto;"><a itemprop="url" href="<?php echo e(URL::to('product-template',$customer->id)); ?>">View All Products
                 <span style="float: right;"><i style="font-size:30px;color:#666; padding-right:30px;" class="fa fa-angle-right" aria-hidden="true"></i></span></a>
          </div>
          <?php endif; ?>  
     </div>
</div>
</div>
<div class="row" style="background: #fff;">
      <div style="padding: 26px 20px 80px 80px; position: relative;">
          <div class="contact-picture">
            <img class="contact-picture-photo img-circle" src="<?php if($customer->pro_pic): ?><?php echo e(URL::to('uploads',$customer->pro_pic)); ?> <?php elseif($customer->users): ?> <?php echo e(URL::to('uploads',$customer->users->profile_picture)); ?> <?php else: ?> <?php echo e(URL::to('uploads/no_image.jpg')); ?> <?php endif; ?>" alt="">
          </div>
          <div class="contact-brief">
                 <?php if($customer): ?>
                    <?php if($customer->users): ?>
                    <dt class="person-nm"><?php echo e($customer->users->first_name); ?> <?php echo e($customer->users->last_name); ?></dt>
                    <p>Department:
                    <span><?php echo e($customer->users->department); ?></span></p>
                    <?php endif; ?>
                <?php endif; ?> 
          </div>
      </div>
</div>
<?php echo $__env->make('mobile-view.country-product.chat-supplier', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
      $(document).ready(function(){
          $(".nav-tabs a").click(function(){
               $(this).tab('show');
         });
        $('.nav-tabs a').on('shown.bs.tab', function(event){
            var x = $(event.target).text();         // active tab
            var y = $(event.relatedTarget).text();  // previous tab
            $(".act span").text(x);
            $(".prev span").text(y);
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mobile-view.layout.master-profile-m', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>