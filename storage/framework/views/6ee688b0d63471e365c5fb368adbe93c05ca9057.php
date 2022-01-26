<?php $__env->startSection('content'); ?>
<?php echo $__env->make('mobile-view.country-product.template-header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php
   $customer=App\Model\BdtdcCompany::with('customers','users')->where('id',Route::current()->parameters()['profile_id'])->first();
   use App\Model\User;
?>
<div class="row padding_0" style="background: #fff;">
   <div style="padding: 26px 20px 125px 80px; position: relative;">
      <div class="contact-picture">
         <img class="contact-picture-photo img-circle" src="
            <?php if($contact_data->pro_pic): ?>
            <?php echo e(URL::to('uploads',$contact_data->pro_pic)); ?>

            <?php else: ?>
            <?php echo e(URL::to('uploads/no_image.jpg')); ?>

            <?php endif; ?>
            " alt="contact person">
         <!-- <img class="contact-picture-photo img-circle" src="<?php echo asset('resources/assets/mobile-images/contact-person.jpg'); ?>" alt="contact person"> -->
      </div>
      <div class="contact-brief">
         <dt class="person-nm"><?php echo e($customer->users->first_name); ?> <?php echo e($customer->users->last_name); ?></dt>
         <?php if($contact_data->department): ?>
         <dt class="dpt-nm">Department:</dt>
         <dd class="dpt-posi"><?php echo e((($contact_data) ? $contact_data->department : $not_available)); ?></dd>
         <?php endif; ?>
         <?php if($contact_data->job_title): ?>
         <dt class="dpt-nm">Job Title:</dt>
         <dd class="dpt-posi"><?php echo e((($contact_data) ? $contact_data->job_title : $not_available)); ?></dd>
         <?php endif; ?>
      </div>
   </div>
</div>
<div class="row padding_0" style="background: #fff;border-bottom: 1px solid #ddd; padding-bottom: 40px; margin-bottom: 20px;">
   <div class="col-xs-12 padding_0" style="padding-bottom: 20px;">
      <div class="col-xs-4 padding_0">
         <div class="comp-charct">
            <div class="comp-charct-char">
               <dt class="comp-charct-char-dt">Telephone:</dt>
            </div>
            <div class="comp-charct-char">
               <dt class="comp-charct-char-dt">Mobile Phone:</dt>
            </div>
            <?php if($contact_data->fax): ?>
            <div class="comp-charct-char">
               <dt class="comp-charct-char-dt">Fax:</dt>
            </div>
            <?php endif; ?>
            <div class="comp-charct-char">
               <dt class="comp-charct-char-dt">Address:</dt>
            </div>
            <div class="comp-charct-char">
               <dt class="comp-charct-char-dt">Zip:</dt>
            </div>
            <div class="comp-charct-char">
               <dt class="comp-charct-char-dt">Country/Region:</dt>
            </div>
            <div class="comp-charct-char">
               <dt class="comp-charct-char-dt">City:</dt>
            </div>
         </div>
      </div>
      <div class="col-xs-8">
         <div class="comp-charct">
            <?php $not_available = "Not Available"; ?>
            <div class="comp-charct-char">
               <dd class="comp-charct-dd">
                  <?php echo e((($contact_data) ? $contact_data->telephone : $not_available)); ?>

               </dd>
            </div>
            <div class="comp-charct-char">
               <dd class="comp-charct-dd">
                  <?php echo e((($contact_data) ? $contact_data->telephone : $not_available)); ?>

               </dd>
            </div>
            <?php if($contact_data->fax): ?>
            <div class="comp-charct-char">
               <dd class="comp-charct-dd">
                  <?php echo e((($contact_data) ? $contact_data->fax : $not_available)); ?>

               </dd>
            </div>
            <?php endif; ?>
            <div class="comp-charct-char">
               <dd class="comp-charct-dd">
                  <?php echo e((($contact_data) ? $contact_data->region : $not_available)); ?>.Tel: <?php echo e((($contact_data) ? $contact_data->telephone : $not_available)); ?>,  <?php echo e((($contact_data) ? $contact_data->city : $not_available)); ?>

               </dd>
            </div>
            <div class="comp-charct-char">
               <dd class="comp-charct-dd">
                  <?php echo e((($contact_data) ? $contact_data->zip: $not_available)); ?>

               </dd>
            </div>
            <div class="comp-charct-char">
               <dd class="comp-charct-dd"><?php echo e((($contact_data) ? $contact_data->region : $not_available)); ?></dd>
            </div>
            <div class="comp-charct-char">
               <dd class="comp-charct-dd"><?php echo e((($contact_data) ? $contact_data->city : $not_available)); ?></dd>
            </div>
         </div>
      </div>
   </div>
</div>
<?php echo $__env->make('mobile-view.country-product.chat-supplier', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mobile-view.layout.master-profile-m', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>