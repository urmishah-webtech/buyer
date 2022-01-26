<?php $__env->startSection('title', 'List Users'); ?>
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
         <div class="portlet-title" style="background-color:#082154;">
            <div class="caption">
               <i class="fa fa-globe"></i>Manage Users
            </div>
            <div class="tools">
               <a href="javascript:;" class="collapse">
               </a>
               <!-- <a href="javascript:;" class="remove">
               </a> -->
            </div>
         </div>
         <div class="portlet-body">
            <div class="table-toolbar">

               <div class="row">
                  <div class="col-md-6">
                     
                  </div>
                  <div class="col-md-6">
                     
                  </div>
               </div>

               <div>
                  <?php echo $users->render(); ?>

               </div>

               <div>
                  <input type="hidden" name="url" value="<?php echo e(URL::to('/')); ?>">
                  <form class="navbar-form navbar-left trade_search_form form-inline" method="POST" action="<?php echo e(URL::to('admin/company/search',null)); ?>" role="search" style="padding:0;">
                     <div class="form-group">
                        <select name="country" class="form-control">
                           <option value="0">Select all</option>
                           <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                     </div>
                     <div class="form-group">
                        <select name="type" class="form-control">
                           <option value="0">Select all</option>
                           <option value="3">Supplier</option>
                           <option value="4">Buyer</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <select name="business_type" class="form-control">
                           <option value="0">Select all</option>
                           <?php $__currentLoopData = $business_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                     </div>

                     <div class="form-group">
                        <select name="category_name" class="form-control">
                           <option value="0">Select all</option>
                           <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                     </div>
                     <div class="form-group">
                        <?php echo Form::text('company',$company_search,['class'=>'form-control text-primary','placeholder'=>'Search By company']); ?>

                     </div>
                     <div class="form-group">
                        <?php echo Form::text('email',$email_search,['class'=>'form-control text-primary','placeholder'=>'Search By Email']); ?>

                     </div>
                     <?php echo Form::token(); ?>

                     <div class="form-group">
                        <input type="submit" class="btn btn-success trade_search_btn " value="SEARCH"/>
                     </div>
                     <div class="form-group">
                        <button type="button" class="btn btn-success resetval">RESET</button>
                     </div>
                    
                  </form>
                  
                  
               </div>
            </div>
            <table class="table table-striped table-bordered table-hover th-bg" id="sample_1">
               <thead>
                  <tr>
                     <th class="table-checkbox">
                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                     </th>
                     <th>User name</th>
                     <th>Seller Products</th>
                     <th>Email</th>
                     <th>User type</th>
                     <th>Company</th>
                     <th>Business type</th>
                     <!-- <th>category</th -->
                     <th>Join Date</th>
                     <th>Sort order</th>
                     <th>Status</th>
                     <th>Action</th>

                  </tr>
               </thead>
               <tbody>
                  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr class="odd gradeX">
                     <td><input type="checkbox" class="checkboxes" value="1" /></td>
                     <td>
                        <a title="login as <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>" href="<?php echo e(URL::to('admin/make-me-login',$user->id)); ?>"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></a>
                     </td><td>
                        <a href="<?php echo e(URL::to('admin/profiles/sellerproduct/'.$user->id)); ?>">List Seller Product</a> <br>
                     </td>
                     <td>
                        <a href="<?php echo e(URL::to('admin/profiles/'.$user->id)); ?>"><?php echo e($user->email); ?></a> <br>
                        <?php if($user->inRole($admin)): ?>
                        <span class="label label-success">Admin</span>
                        <?php endif; ?>
                     </td>
                     <td class="center">
                        <?php if($user->inRole($supplier)): ?>
                           Supplier
                        <?php else: ?>
                           Buyer
                        <?php endif; ?>
                     </td>
                     <td class="center">
                        <?php if($user->companies): ?>
                        <?php if($user->companies->name_string && (trim($user->companies->name_string->name) != '')): ?>
                        <a target="_blank" href="<?php echo e(URL::to('Home/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$user->companies->name_string->name),$user->companies->id)); ?>"> <?php echo e($user->companies->name_string->name); ?></a>
                        <?php else: ?>
                        <a target="_blank" href="<?php echo e(URL::to('Home/'.preg_replace('/[^A-Za-z0-9\-]/', '-','Not Available'),$user->companies->id)); ?>"> <?php echo e('Not Available'); ?></a>
                        <?php endif; ?>
                        <?php else: ?>
                        Not Available
                        <?php endif; ?>
                     </td>
                     <td class="center">
                        <?php if($user->suppliers): ?>
                        <?php if($user->suppliers->business_types): ?>
                           <?php echo e($user->suppliers->business_types->name); ?>

                        <?php endif; ?>
                        <?php endif; ?>
                     </td>
                     <td><?php echo e($user->created_at ?? ''); ?></td>

                     <td class="sortproduct_td text-center">
                        <select name="sortproduct_option" data-id="<?php echo e($user->id); ?>" class="sortproduct_option">
                           <?php if($total_u > 0): ?>
                              <?php for($hi=0; $hi < $total_u; $hi++): ?>
                                 <option value="'.$hi.'"><?php echo e($hi); ?></option>
                              <?php endfor; ?>
                           <?php endif; ?>
                        </select>
                     </td>

                     <td>
                        <?php if($user->activated==1): ?>
                        <a type="button" class="" href="<?php echo e(URL::to('admin/profiles/deactive/'. $user->id)); ?>">Deactive</a>
                        <?php else: ?>
                        <a type="button" class="" href="<?php echo e(URL::to('admin/profiles/active/'. $user->id)); ?>">Active</a>
                        <?php endif; ?>
                     </td>
                     <td>
                        <a onclick="return confirm('Are you sure want to delete the user?')" type="button" class="btn btn-danger btn-xs delete_product" href="<?php echo e(URL::to('admin/profiles/deletuser/'. $user->id)); ?>"><i class="fa fa-times"></i></a>
                     </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tbody>

            </table>
            <?php echo $users->render(); ?>

         </div>
      </div>
      <!-- END EXAMPLE TABLE PORTLET-->
   </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
   $('.resetval').click(function(){
      var base_url = '<?php echo e(URL::to("/")); ?>';
      window.location.replace(base_url + '/admin/profiles');

   });
   jQuery(document).ready(function() {
      $(document).on({
         change: function() {
            var _this = $(this);
            var s_value = _this.val();
            var update_id = _this.attr('data-id');
            $('.mkn_loader').css('display', 'block');
            $.post(base_url + '/admin/edit-company-sort/sort_check/' + s_value + '/' + update_id, {
               _token: '<?php echo e(csrf_token()); ?>',
               section: 'sort_check',
               s_value: s_value,
               update_id: update_id,
            }, function(result) {
               if (parseInt(result) == 1) {
                  $('.mkn_loader').css('display', 'none');
               } else {
                  alert('Unkonwn Error Occured.');
                  $('.mkn_loader').css('display', 'none');
               }
            });
         }
      }, '.sortproduct_option');

      $('[name="country"]').val('<?php echo e($country_search?$country_search:0); ?>');
      $('[name="type"]').val('<?php echo e($type?$type:0); ?>');
      $('[name="business_type"]').val('<?php echo e($business_type_id?$business_type_id:0); ?>');
      $('[name="category_name"]').val('<?php echo e($category_name?$category_name:0); ?>');
      $(document).on({
         click: function(e) {
            e.preventDefault();
            var base_url = '<?php echo e(URL::to("/")); ?>';
            var country = $('[name="country"]').val();
            var type = $('[name="type"]').val();
            var business_type = $('[name="business_type"]').val();
            var category_name = $('[name="category_name"]').val();
            var company = $('[name="company"]').val();
            var email = $('[name="email"]').val();
            window.location.href = base_url + '/admin/profiles?c=' + country + '&t=' + type + '&bt=' + business_type + '&cn=' + category_name + '&co=' + company + '&e=' + email;
         }
      }, '.trade_search_btn');
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('protected.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>