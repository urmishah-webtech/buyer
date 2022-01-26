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
               <h4 style="font-weight:bold;font-size:16px;">Trade Market</h4>
               <div style="height:350px;border:1px solid #E8E8E8;background-image: url(<?php echo e(URL::asset('assets/images/background-big.png')); ?>);" class="col-md-12 smallworld_map">
               </div>
            </div>
            <div class="row">
               <div class="col-md-12 col-xs-12 padding_0">
                  <div class="table-responsive">
                     <table style="border-left:1px solid #E8E8E8;border-top:1px solid #E8E8E8;padding:1%;border-bottom:1px solid #E8E8E8" class="table capability_table">
                        <thead>
                           <tr style="background:#F5F5F5">
                              <td>Main Market</td>
                              <td>Total Revenue ( % )</td>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $__currentLoopData = $market_destribution; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                              <?php if($v->form_value): ?>
                                 <td style="color:#666"><?php echo e($v->form_value->value); ?></td>
                              <?php endif; ?>
                              <td><?php echo e($v->distribution_value); ?>%</td>
                           </tr>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div style="border-bottom:1px solid #E8E8E8;margin-bottom:2%" class="row">
               <div class="col-md-12 col-xs-12 padding_0">
                  <div class="table-responsive">
                     <h4 style="font-weight:bold;font-size:15px;line-height:0px">Business Terms</h4>
                     <table class="table company_information_table">
                        <tbody>
                           <tr>
                              <td style="color:#666">Total Annual Sales Volume:</td>
                              <td><?php echo e(($trade_data) ? $trade_data->BdtdcFormValue->value : ""); ?></td>
                           </tr>
                           <tr>
                              <td style="color:#666">Export Percentage:</td>
                              <td><?php echo e(($trade_data) ? $trade_data->form_export_percentage->value : ""); ?></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div style="border-bottom:1px solid #E8E8E8;margin-bottom:2%" class="row">
               <div class="col-md-12 col-xs-12 padding_0">
                  <div class="table-responsive">
                     <h4 style="font-weight:bold;font-size:15px;line-height:0px">Trade Ability</h4>
                     <table class="table company_information_table">
                        <tbody>
                           <tr>
                              <td style="width:31%;color:#666">Language Spoken</td>
                              <td>
                                 <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                 <?php echo e($l->language->name); ?>,
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </td>
                           </tr>
                           <tr>
                              <?php if($trade_data): ?>
                                 <?php if($trade_data->emp_trade_dept): ?>
                                    <td style="color:#666">No. of Employees in Trade Department:</td>
                                    <td><?php echo e(($trade_data) ? $trade_data->emp_trade_dept->value : ""); ?></td>
                                 <?php endif; ?>
                              <?php endif; ?>
                           </tr>
                           <tr>
                              <td style="color:#666">Average Lead Time:</td>
                              <td><?php echo e(($trade_data) ? $trade_data->avarage_lead_time : ""); ?> (day's)</td>
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
if(nav_url_array[3] == 'trade-capacity'){
    $('.color_changer>ul li:nth-child(3)').css('background','white');
    $('.color_changer>ul li:nth-child(3) span').css('color','black');

    $('ul.overview li:nth-child(2)').css('padding','5px');
    $('ul.overview li:nth-child(2)').css('background-color','#2e6da4');
    $('ul.overview li:nth-child(2)').css('padding-left','15px');
    $('ul.overview li:nth-child(2)').css('border-radius','5px');
    $('ul.overview li:nth-child(2) a').css('color','#ffffff');
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.template.layout_dynamic', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>