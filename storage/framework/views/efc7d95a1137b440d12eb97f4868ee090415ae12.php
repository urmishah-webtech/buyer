<?php $__env->startSection('content'); ?>
<?php use App\Model\User; ?>
<!---------COMPANY INTRODUCTION TITLE WITH BORDER BOTTOM-------------->
<div class="container">
   <div style="margin-top:1%" class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10 padding_0" style="background-color: #fff;padding: 1%">
         <div class="col-md-3 padding_left_0" >
            <?php echo $__env->make('fontend.template.company_nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
         </div>
         <div class="col-md-9">
            <div style="border-bottom:1px solid #32AFD4;padding-bottom:1%;margin-bottom:2%" class="row">
               <div class="col-md-12 col-xs-12 padding_0">
                  <div class="table-responsive">
                     <h4 style="font-weight:bold;font-size:15px;line-height:0px" class="logo_color">Contact Information</h4>
                  </div>
               </div>
            </div>
            <div style="padding-bottom:3%" class="row">
               <div class="col-md-12 col-xs-12 padding_0">
                  <div class="col-sm-7 col-xs-12 padding_0">
                     <div style="padding-right:1%" class="col-xs-12 col-sm-4 padding_0">
                        <img style="padding:3%;border:1px solid #32AFD4; width: 120px; height: 140px;" src="
                           <?php if($contact_data->users->profile_picture): ?>
                           <?php echo e(URL::to('uploads',$contact_data->users->profile_picture)); ?>

                           <?php else: ?>
                           <?php echo e(URL::to('uploads/no_image.jpg')); ?>

                           <?php endif; ?>
                           " alt="" class="img-responsive">
                     </div>
                     <div style="border-right:1px solid #32AFD4;padding-right:5%;font-size:13px" class="col-xs-12 col-sm-8 padding_left_0">
                        <table class="table">
                           <tbody>
                              <tr>
                                 <td style="border:none;padding:0;font-weight:bold;font-size:15px" class="logo_color" colspan="2"><span class="header_first_name"></span> <span class="header_last_name"></span></td>
                              </tr>
                              <tr class="text-muted">
                                 <td style="border:none;padding:0">Depertment:</td>
                                 <td style="border:none;padding:0"><?php echo e((($contact_data) ? $contact_data->users->department : $not_available)); ?></td>
                              </tr>
                              <tr class="text-muted">
                                 <td style="border:none;padding:0">Job Title:</td>
                                 <td style="border:none;padding:0"><?php echo e((($contact_data) ? $contact_data->users->job_title : $not_available)); ?></td>
                              </tr>
                           </tbody>
                        </table>
                        <?php
                           if($profile_owner_id){
                                       $user_active_data = User::where('id',$profile_owner_id)->first();
                                       $user_active = $user_active_data->active;
                           }else{
                                 $user_active = 0;
                           }
                           ?>
                        <a style="width:150px; font-size: 13px;" class="btn btn-primary contact_supplier" href="#animatedModal" data-product_id="#" data-supplier_id=""><i class="fa fa-envelope"></i>&nbsp; Get-Contact</a>
                     </div>
                  </div>
                  <div style="padding-left: 2%;" class="col-sm-5 col-xs-12 padding_0">
                     <table style="font-size:13px" class="table text-muted">
                        <?php $not_available = "Not Available"; ?>
                        <tbody>
                           <tr>
                              <td style="border:none;padding:0">Telephone:</td>
                              <td style="border:none;padding:0">
                                 <?php if(Sentinel::check()): ?>
                                 <?php if($contact_data->gold==1): ?>
                                 <?php echo e((($contact_data) ? $contact_data->customers->telephone : $not_available)); ?>

                                 <?php endif; ?>
                                 <?php endif; ?>
                              </td>
                           </tr>
                           <tr>
                              <td style="border:none;padding:0">Mobile Phone:</td>
                              <td style="border:none;padding:0">
                                 <?php if(Sentinel::check()): ?>
                                 <?php if($contact_data->gold==1): ?>
                                 <?php echo e((($contact_data) ? $contact_data->customers->telephone : $not_available)); ?>

                                 <?php endif; ?>
                                 <?php endif; ?>
                              </td>
                           </tr>
                           <?php if($contact_data): ?>
                           <?php if(trim($contact_data->customers->fax) != ''): ?>
                           <tr>
                              <td style="border:none;padding:0">Fax:</td>
                              <td style="border:none;padding:0"><?php echo e((($contact_data) ? $contact_data->customers->fax : $not_available)); ?></td>
                           </tr>
                           <?php endif; ?>
                           <?php endif; ?>
                           <?php if($contact_data): ?>
                           <?php if(trim($contact_data->zip_code) != ''): ?>
                           <tr>
                              <td style="border:none;padding:0">Zip:</td>
                              <td style="border:none;padding:0"><?php echo e((($contact_data) ? $contact_data->zip_code: $not_available)); ?></td>
                           </tr>
                           <?php endif; ?>
                           <?php endif; ?>
                           <tr>
                              <td style="border:none;padding:0">Country/Region:</td>
                              <td style="border:none;padding:0"><?php echo e((($contact_data) ? $contact_data->region : $not_available)); ?></td>
                           </tr>
                           <?php if($contact_data): ?>
                           <?php if(trim($contact_data->postal_code) != ''): ?>
                           <tr>
                              <td style="border:none;padding:0">Postal Code:</td>
                              <td style="border:none;padding:0"><?php echo e((($contact_data) ? $contact_data->postal_code : $not_available)); ?></td>
                           </tr>
                           <?php endif; ?>
                           <?php endif; ?>
                           <tr>
                              <td style="border:none;padding:0">City:</td>
                              <td style="border:none;padding:0"><?php echo e((($contact_data) ? $contact_data->city : $not_available)); ?></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div style="border-bottom:1px solid #32AFD4; padding-bottom:1%;margin-top:2%;" class="row">
               <div class="col-md-12 col-xs-12 padding_0">
                  <h4 style="font-weight:bold;font-size:15px;line-height:0px" class="logo_color">Company Contact Information</h4>
               </div>
            </div>
            <div class="row">
               <div style="padding-left:2%;border-bottom:1px solid #32AFD4;margin-bottom:2%" class="col-md-12 col-xs-12 padding_0">
                  <div class="table-responsive">
                     <table class="table company_information_table text-muted">
                        <tbody>
                           <tr>
                              <td><i style="font-weight: bold" class="fa fa-check text-primary"></i></td>
                              <td style="border-top:none;width:38%">Company Name:</td>
                              <td style="border-top:none"><span class="header_company_name"></span></td>
                           </tr>
                           <tr>
                              <td><i style="font-weight: bold" class="fa fa-check text-primary"></i></td>
                              <td style="border-top:none">Operational Address:</td>
                              <td style="border-top:none"><?php echo e(($contact_data->factory_info) ? $contact_data->factory_info->factory_location : ""); ?></td>
                           </tr>
                           <?php if(Sentinel::check()): ?>
                           <tr>
                              <td><i style="font-weight: bold" class="fa fa-check text-primary"></i></td>
                              <td style="border-top:none">Website:</td>
                              <td style="border-top:none"><?php echo e(($contact_data) ? $contact_data->company_website : ""); ?> </td>
                           </tr>
                           <?php endif; ?>
                           <tr>
                              <td><i style="font-weight: bold" class="fa fa-check text-primary"></i></td>
                              <td style="border-top:none">Website on BuyerSeller:</td>
                              <td style="border-top:none"> <a style="color: #777;" target="_blank" href="<?php echo e(URL::to('Home/'.$name,$profile_id)); ?>"><?php echo e(URL::to('Home/'.$name,$profile_id)); ?></a> </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <?php echo $__env->make('fontend.template.contact_supplier_form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
   if(nav_url_array[3] == 'contact'){
      $('.color_changer>ul li:nth-child(4)').css('background','white');
      $('.color_changer>ul li:nth-child(4) a').css('color','black');
   }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.template.layout_dynamic', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>