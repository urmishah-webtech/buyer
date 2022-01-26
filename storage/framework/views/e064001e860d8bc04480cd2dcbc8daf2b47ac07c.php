<?php $__env->startSection('content'); ?>
<?php $id = Route::current()->parameters()['profile_id'];?>
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
            <div class="row">
               <div class="col-md-4 col-xs-6 padding_0">
                  <?php if($company_images): ?>
                  <img src="<?php echo e(URL::to('uploads',$company_images->image)); ?>" style="width:99%;height:254px;margin-top: 5%" alt="" class="img-thumbnail">
                  <?php else: ?>
                  <img src="<?php echo e(URL::to('uploads','company_logo_pLCIz2kPL3.jpg',null)); ?>" style="width:99%;height:254px;margin-top: 5%" alt="" class="img-thumbnail">
                  <img src="<?php echo e(URL::to('uploads','company_logo_pLCIz2kPL3.jpg',null)); ?>" style="width:80%" alt="" class="img-thumbnail">
                  <?php endif; ?>
               </div>
               <div style="padding-left:2%" class="col-md-8 col-xs-12 padding_0">
                  <div class="table-responsive">
                     <table class="table company_information_table">
                        <tbody>
                           <?php if($company): ?>
                           <tr>
                              <td style="border-top:none;color:#999999;width:38%">Year Established:</td>
                              <td style="border-top:none"><?php if($company): ?> <?php echo e($company->year_of_reg ?? ''); ?> <?php endif; ?></td>
                           </tr>
                           <tr>
                              <td style="border-top:none;color:#999999">Location:</td>
                              <td style="border-top:none"> <?php echo e(($company) ? $company->location_of_reg_string->name : ""); ?></td>
                           </tr>
                           <tr>
                              <td style="border-top:none;color:#999999">Business Type:</td>
                              <td style="border-top:none"> <?php echo e(($company) ? $company->customers->suppliers->business_types->name : ""); ?> </td>
                           </tr>
                           <tr>
                              <?php if($company->tradeinfo): ?>
                                 <?php if($company->tradeinfo->BdtdcFormValue): ?>
                                    <td style="border-top:none;color:#999999">Annual Sales Volume:</td>
                                    <td style="border-top:none"><?php echo e(($company) ? $company->tradeinfo->BdtdcFormValue->value : ""); ?></td>
                                 <?php endif; ?>
                              <?php endif; ?>
                           </tr>
                           <tr>
                              <?php if($company->tradeinfo): ?>
                                 <?php if($company->tradeinfo->form_export_percentage): ?>
                                    <td style="border-top:none;color:#999999">Year start exporting:</td>
                                    <td style="border-top:none"><?php echo e(($company) ? $company->tradeinfo->form_export_percentage->value : ""); ?></td>
                                 <?php endif; ?>
                              <?php endif; ?>
                           </tr>
                           <tr>
                              <td style="border-top:none;color:#999999">Main Products:</td>
                              <td style="border-top:none"> 
                                 <?php
                                    echo ($main_products) ?  $main_products->main_products->product_name_1 . ", " . $main_products->main_products->product_name_2.", ". $main_products->main_products->product_name_3 : "";
                                    ?>
                              </td>
                           </tr>
                           <tr>
                              <td style="border-top:none;color:#999999">Total Employee:</td>
                              <?php
                                 $data = DB::table('bdtdc_companies as c')
                                             ->join('bdtdc_form_values as fv','fv.id','=','c.total_employe')
                                             ->where('c.id',Route::current()->parameters()['profile_id'])
                                             ->first(['fv.value']);
                                 ?>
                              <td style="border-top:none"><?php echo e(($data) ? $data->value : ""); ?> </td>
                           </tr>
                           <tr>
                              <td style="border-top:none;color:#999999">Main Markets:</td>
                              <td style="border-top:none">
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
                                                echo "<span class='btn-link'>more</span>..";
                                                break;
                                          }
                                          $i++;
                                    } 
                                    ?>
                              </td>
                           </tr>
                           <tr>
                              <td style="border-top:none;color:#999999">Average Lead Time:</td>
                              <td style="border-top:none">
                                 <?php
                                    $trade_info = DB::table('bdtdc_company_trade_info as ti')->where('company_id',Route::current()->parameters()['profile_id'])->first(['avarage_lead_time']);
                                    echo ($trade_info) ? $trade_info->avarage_lead_time . " day(s)"  : "0" . " day(s)";
                                    ?>
                              </td>
                           </tr>
                           <tr>
                              <td colspan="3" id="com_des">
                                 <?php
                                    $c_description = DB::table('bdtdc_company_descriptions')->where('company_id',Route::current()->parameters()['profile_id'])->first();
                                    //dd($c_description);
                                    echo (isset($c_description)) ? $c_description->description : "";
                                    ?>
                                 <span class="pull-right more" style="cursor: pointer;">More &nbsp;<i class="fa fa-caret-right"></i></span>
                              </td>
                              <td></td>
                           </tr>
                           <?php endif; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div style="border-bottom:1px solid #797979;margin-bottom:2%" class="row">
               <div class="col-md-12 padding_0">
                  <span style="font-size:18px;font-weight:bold;line-height:35px;color:#1A4570">Company Capability</span>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12 col-xs-12 padding_0">
                  <div class="table-responsive">
                     <table class="table capability_table">
                        <thead>
                           <tr>
                              <td style="font-weight:bold">Trade Capacity</td>
                              <?php
                                 $distribution = DB::table('bdtdc_company_main_markets as mk')
                                       ->join('bdtdc_form_values as fv','fv.id','=','mk.main_market_zone')
                                       ->where('mk.company_id',Route::current()->parameters('profile_id'))
                                       ->limit(2)
                                       ->get(['mk.distribution_value','fv.value']);
                                 if($distribution){
                                 if(count($distribution)>0){
                                       foreach($distribution as $v){
                                             if($v){
                                                   ?>
                              <td><?php echo e($v->value); ?> : <?php echo e($v->distribution_value); ?> % </td>
                              <?php
                                 }
                                       
                                 }
                                 }
                                 }
                                 
                                 
                                 ?>
                              <td class="text-right"><a href="<?php echo e(URL::to('trade-capacity/'.preg_replace('/[^A-Za-z0-9\-]/', '-',Route::current()->parameters('name')['name']),$id)); ?>" class="more">more &nbsp;<i class="fa fa-caret-right"></i></a></td>
                           </tr>
                           <tr>
                              <td style="font-weight:bold">Production Capacity</td>
                              <?php
                                 $data = DB::table('bdtdc_company_factory_info as fi')
                                       ->join('bdtdc_form_values as fv','fv.id','=','fi.factory_size')
                                       ->where('fi.company_id',Route::current()->parameters('profile_id'))
                                       ->first(['fi.no_of_production_line','fv.value']);
                                 ?>
                              <td>Factory Size : <?php echo e(($data) ? $data->value : ""); ?> </td>
                              <td>No. of Production Lines : <?php echo e(($data) ? $data->no_of_production_line : ""); ?> </td>
                              <?php
                                 ?>
                              <td class="text-right"><a href="<?php echo e(URL::to('production-capacity/'.preg_replace('/[^A-Za-z0-9\-]/', '-',Route::current()->parameters('name')['name']),$id)); ?>" class="more">more &nbsp;<i class="fa fa-caret-right"></i></a></td>
                           </tr>
                           <tr>
                              <td style="font-weight:bold">R&D Capacity</td>
                              <?php
                                 $data = DB::table('bdtdc_company_factory_info as fi')
                                       ->join('bdtdc_form_values as fv','fv.id','=','fi.no_of_rd_staf')
                                       ->where('fi.company_id',Route::current()->parameters('profile_id'))
                                       ->first(['fi.no_of_rd_staf','fv.value']);
                                 ?>
                              <td>No. of R&D Staff : <?php echo e(($data) ? $data->value : ""); ?>  </td>
                              <td></td>
                              <?php
                                 ?>
                              <td class="text-right"><a href="<?php echo e(URL::to('rd-capacity/'.preg_replace('/[^A-Za-z0-9\-]/', '-',Route::current()->parameters('name')['name']),$id)); ?>" class="more">more &nbsp;<i class="fa fa-caret-right"></i></a></td>
                           </tr>
                           <tr>
                              <td colspan="4" class="text-right">
                                 <a href="" class="text-success btn-link"><i class="fa fa-exclamation-triangle"></i>&nbsp; Report Suspicious Content on this Page </a>
                              </td>
                           </tr>
                        </thead>
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
            var maintext = document.getElementById('com_des').innerText;
            maintext = maintext.slice(0, -6);
            var longtext = maintext+'<span class="pull-right more"  style="cursor: pointer;" onclick="moretext();">Less &nbsp;<i class="fa fa-caret-right"></i></span>';
            if(maintext == '' || maintext == null){
                  var shorttext = maintext.substr(0,100)+'<span class="pull-right more"  style="cursor: pointer;" onclick="lesstext();">More &nbsp;<i class="fa fa-caret-right"></i></span>';
            }else{
                  var shorttext = maintext.substr(0,100)+'...'+'<span class="pull-right more"  style="cursor: pointer;" onclick="lesstext();">More &nbsp;<i class="fa fa-caret-right"></i></span>';
            }
            document.getElementById('com_des').innerHTML = shorttext;
            function lesstext(){
                  document.getElementById('com_des').innerHTML = longtext;
            }
            function moretext(){
                  document.getElementById('com_des').innerHTML = shorttext;
            }

            var nav_url = window.location.href;
            var nav_url_array = nav_url.split("/");
            if(nav_url_array[4] == 'company-overview'){
                $('.color_changer>ul li:nth-child(3)').css('background','white');
                $('.color_changer>ul li:nth-child(3) span').css('color','black');
            }

      </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.template.layout_dynamic', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>