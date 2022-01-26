<?php $__env->startSection('title', 'List Product'); ?>
<?php $__env->startSection('content'); ?>
<style>
   form.navbar-form .form-group {
      margin-bottom: 30px;
   }
</style>
<!-- BEGIN PAGE CONTENT-->
<div class="row">
   <div class="col-md-12">
      <!-- BEGIN EXAMPLE TABLE PORTLET-->
      <div class="portlet box grey-cascade">
         <div class="portlet-title">
            <div class="caption">
               <i class="fa fa-globe"></i>Manage Seller Product
            </div>
            <div class="tools">
               <a href="javascript:;" class="collapse">
               </a>
               <a href="javascript:;" class="remove">
               </a>
            </div>
         </div>
         <div class="portlet-body">
            <div class="table-toolbar">
               <?php if($message = Session::get('success')): ?>
                     <div class="alert alert-success" style="font-color:white">
                        <p><?php echo e($message); ?></p>
                     </div>
               <?php endif; ?>

               <div class="row">
                  <div class="col-md-6">
                     
                  </div>
                  <div class="col-md-6">  
                     
                  </div>
               </div>
               <div>
               </div>
            </div>
            <table style="margin-top:5%;background: #fff;" class="table ">
                              <thead>
                                 <tr class="" style="background-color:#E4EAF1; font-weight:bold">
                                    <td><label style="font-weight:bold;padding: 0px; margin-top: -5px;" title="Select all products"> Product Name</label></td>
                                    <td>Model</td>
                                    <td>Brand Name</td>
                                    <td>Category Name</td>
                                    <td>Live Status</td>
                                    <td>Action</td>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php if($supplier_product): ?>
                                    <?php $__currentLoopData = $supplier_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <tr class="text-muted" style="border-bottom:1px solid #ddd!important">
                                          <?php if($sp->pro_to_cat_name): ?>
                                             <td class="text-left"> <a title="<?php echo e($sp->pro_to_cat_name->name); ?>" itemprop="url" class="text-muted" target="_blank" href="<?php echo URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$sp->pro_to_cat_name->name).'='.mt_rand(100000000, 999999999).$sp->product_id); ?>"><?php echo e(substr($sp->pro_to_cat_name->name,0,30)); ?></a></td>
                                          <?php else: ?>
                                             <td class="text-left"><input type="checkbox" data-product_id ="<?php echo e($sp->product_id); ?>" class="selected_product" name="selected_product"> <a itemprop="url" class="text-muted" target="_blank" href="<?php echo URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-','name not available').'='.mt_rand(100000000, 999999999).$sp->product_id); ?>">name not available</a></td>
                                          <?php endif; ?>
                                          <?php if($sp->bdtdcProduct): ?>
                                             <td><?php echo e($sp->bdtdcProduct->model); ?></td>
                                          <?php else: ?>
                                             <td>not available</td>
                                          <?php endif; ?>
                                          <?php if($sp->bdtdcProduct): ?>
                                             <td><?php echo e($sp->bdtdcProduct->brandname); ?></td>
                                          <?php else: ?>
                                             <td>not available</td>
                                          <?php endif; ?>
                                          <?php if($sp->BdtdcCategoryDescription): ?>
                                             <td><?php echo e($sp->BdtdcCategoryDescription->name); ?></td>
                                          <?php else: ?>
                                             <td>not available</td>
                                          <?php endif; ?>
                                          <td><?php if($sp->bdtdcProduct): ?>
                                             <?php if($sp->bdtdcProduct->is_active == 0): ?>
                                                <i title="Make Publish" class="fa fa-lock fa-lg btn btn-danger btn-xs live_status" data-product_status ="<?php echo e($sp->bdtdcProduct->is_active); ?>" data-product_id ="<?php echo e($sp->product_id); ?>"></i>
                                             <?php elseif($sp->bdtdcProduct->is_active == 1): ?>
                                                <i title="Make Unpublish" class="fa fa-unlock fa-lg btn btn-success btn-xs live_status" data-product_status ="<?php echo e($sp->bdtdcProduct->is_active); ?>" data-product_id ="<?php echo e($sp->product_id); ?>"></i>
                                             <?php endif; ?>
                                             <?php else: ?>
                                                i title="Make Publish" class="fa fa-lock fa-lg btn btn-danger btn-xs"></i>
                                             <?php endif; ?>
                                          </td>
                                          <td>
                                             <a title="Edit product"  itemprop="url"  href="<?php echo e(URL::to('/admin/profiles/sellerproduct_edit',$sp->product_id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i></a>
                                             <a onclick="return confirm('Are you sure want to delete the Product?')" title="Delete product"  itemprop="url" href="<?php echo e(URL::to('/admin/profiles/sellerproduct_delete',$sp->product_id)); ?>" class="btn btn-danger btn-xs delete_product"><i class="fa fa-times"></i></a>
                                             <!-- <a itemprop="url"  href="#animatedModal" data-url ="<?php echo e(URL::to('supplier/product_edit',$sp->id)); ?>" class="btn btn-primary btn-xs product_edit"><i class="fa fa-pencil-square-o"></i></a> -->
                                             <!-- <a title="Delete product"  itemprop="url" data-product_id ="<?php echo e($sp->product_id); ?>" class="btn btn-danger btn-xs delete_product"><i class="fa fa-times"></i></a> -->
                                          </td>
                                       </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>
                              </tbody>
                           </table>
                           <?php echo $supplier_product->render(); ?> 
         </div>
      </div>
      <!-- END EXAMPLE TABLE PORTLET-->
   </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('protected.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>