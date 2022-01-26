<?php $__env->startSection('content'); ?>
<!---------COMPANY INTRODUCTION TITLE WITH BORDER BOTTOM-------------->
<div class="container">
   <div style="margin-top:1%" class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10 padding_0" style="background-color: #fff;padding: 1%">
         <div class="col-md-3 padding_left_0">
            <?php echo $__env->make('fontend.template.company_nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
         </div>
         <div class="col-md-9">
            <div style="border-bottom:1px solid #32AFD4;margin-bottom:2%" class="row">
               <?php echo $__env->make('fontend.template.company_title_tab', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div style="border-bottom:1px solid #E8E8E8;margin-bottom:2%" class="row">
               <div class="col-md-12 col-xs-12 padding_0">
                  <div class="table-responsive">
                     <h4 style="font-weight:bold;font-size:15px;line-height:0px" class="logo_color">Factory Information</h4>
                     <table class="table company_information_table">
                        <tbody>
                           <?php if($product_capacity): ?>
                           <tr>
                              <td style="width:31%;color:#666">Factory Size:</td>
                              <td><?php echo e(($product_capacity) ? $product_capacity->form_factory_size->value : ""); ?></td>
                           </tr>
                           <tr>
                              <td style="color:#666">Factory Location:</td>
                              <td><?php echo e(($product_capacity) ? $product_capacity->factory_location : ""); ?></td>
                           </tr>
                           <tr>
                              <td style="color:#666">No. of Production Lines</td>
                              <td><?php echo e(($product_capacity->form_no_of_production_line) ? $product_capacity->form_no_of_production_line->value : ""); ?></td>
                           </tr>
                           <tr>
                              <td style="color:#666">Contract Manufacturing</td>
                              <td><?php echo e(($product_capacity) ? $product_capacity->contact_manufacturing : ""); ?> </td>
                           </tr>
                           <tr>
                              <td style="color:#666">Annual Output Value:</td>
                              <td><?php echo e(($product_capacity) ? $product_capacity->form_anual_value->value : ""); ?> </td>
                           </tr>
                           <?php endif; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div style="border-bottom:1px solid #E8E8E8;margin-bottom:2%" class="row">
               <div class="col-md-12 col-xs-12 padding_0">
                  <div class="table-responsive">
                     <h4 style="font-weight:bold;font-size:15px;line-height:0px" class="logo_color">Factory Information</h4>
                     <table class="table company_information_table">
                        <thead>
                           <tr style="color:#666">
                              <td>Product Name</td>
                              <td>Units Produced(Previous Year)</td>
                              <td>Highest Ever(Annual Output)</td>
                              <td>Unit Type</td>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>Evening bag</td>
                              <td>100000</td>
                              <td>150000</td>
                              <td>Piece/Pieces</td>
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
   if(nav_url_array[3] == 'production-capacity'){
      $('.color_changer>ul li:nth-child(3)').css('background','white');
      $('.color_changer>ul li:nth-child(3) span').css('color','black');

      $('ul.overview li:nth-child(3)').css('padding','5px');
      $('ul.overview li:nth-child(3)').css('background-color','#2e6da4');
      $('ul.overview li:nth-child(3)').css('padding-left','15px');
      $('ul.overview li:nth-child(3)').css('border-radius','5px');
      $('ul.overview li:nth-child(3) a').css('color','#ffffff');
   }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.template.layout_dynamic', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>