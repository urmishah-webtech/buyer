<?php $__env->startSection('page_css'); ?>
    <link property='stylesheet' href="<?php echo asset('assets/fontend/bdtdccss/source-view.css'); ?>" rel="stylesheet">
    <link property='stylesheet' href="<?php echo asset('assets/helpcenter/etalage.css'); ?>" rel="stylesheet">
  <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                    <ul class="top-path" style="padding-bottom: 8px;">
                        <li class="top-path-li"><a itemprop="url" href="<?php echo e(URL::to('/',null)); ?>" class="top-path-li-a">Home <i class="fa fa-angle-right top-path-icon"></i></a></li>
                         <li class="top-path-li"><a itemprop="url" href="<?php echo e(URL::to('Popular-product-trends',null)); ?>" class="top-path-li-a">Buying request <i class="fa fa-angle-right top-path-icon"></i></a></li>

                        <?php if($quotations->inq_products_description): ?>
                        <li class="top-path-li"><a title="<?php echo e($quotations->inq_products_description->name); ?>" itemprop="url" href="" class="top-path-li-a"><?php echo e(substr($quotations->inq_products_description->name,0,30)); ?> <i class="fa fa-angle-right top-path-icon"></i></a></li>
                       <?php else: ?>
                        <li class="top-path-li"><a title="<?php echo e($quotations->inquery_title); ?>" itemprop="url" href="" class="top-path-li-a"><?php echo e(substr($quotations->inquery_title,0,30)); ?> <i class="fa fa-angle-right top-path-icon"></i></a>
                        </li>
                        <?php endif; ?>
                    </ul>
            </div>
        </div>
        <div class="row" style="background-color:#fff; padding-bottom:0;margin-bottom:1%;">
                <div class="col-md-12 col-sm-12 col-lg-12" style="padding-top:3%;">               
             <div class="col-md-4 col-sm-6 col-lg-4 col-xs-6">
                <ul id="etalage">
                            <li>
                                <a itemprop="url" href="optionallink.html">
                                <?php if($quotations->inq_docs_one): ?>
                                    <img itemprop="image" class="etalage_thumb_image" src="<?php echo e(URL::to('buying-request-docs',$quotations->inq_docs_one->docs)); ?>" alt="$quotations->inq_products_images->image"/>

                                    <img itemprop="image" class="etalage_source_image" src="<?php echo e(URL::to('buying-request-docs',$quotations->inq_docs_one->docs)); ?>" alt="$quotations->inq_products_images->image"/>
                                <?php elseif($quotations->inq_products_images): ?>
                                    <img itemprop="image" class="etalage_thumb_image" src="<?php echo e(URL::to(''.$quotations->inq_products_images->image)); ?>" alt="$quotations->inq_products_images->image" />

                                    <img itemprop="image" class="etalage_source_image" src="<?php echo e(URL::to(''.$quotations->inq_products_images->image)); ?>" alt="$quotations->inq_products_images->image"/>

                                <?php endif; ?>
                                </a>

                            </li>
                            <?php if($quotations->inq_docs): ?>
                                <?php $__currentLoopData = $quotations->inq_docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <img itemprop="image" class="etalage_thumb_image" src="<?php echo e(URL::to('buying-request-docs',$image->docs)); ?>" alt="<?php echo e($image->docs ?? ''); ?>" />

                                    <img itemprop="image" class="etalage_source_image" src="<?php echo e(URL::to('buying-request-docs',$image->docs)); ?>" alt="<?php echo e($image->docs ?? ''); ?>" />
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <?php if($quotations->inq_products_images_all): ?>
                                <?php $__currentLoopData = $quotations->inq_products_images_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <img itemprop="image" class="etalage_thumb_image" src="<?php echo e(URL::to(''.$image->image)); ?>" alt="$image->docs ?? ''"/>

                                    <img itemprop="image" class="etalage_source_image" src="<?php echo e(URL::to(''.$image->image)); ?>" alt="$image->docs ?? ''"/>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
         </div>
         <?php //dd($quotations->bdtdc_product_attribute); ?>
         <div class="col-md-8 col-sm-6 col-lg-8 col-xs-12">
            <p style="padding-top:0px" class="p-name-heading">
            <?php if($quotations->inquery_title != ''): ?>
            <?php echo e($quotations->inquery_title); ?>

            <?php elseif($quotations->inq_products_description): ?>
                <a title="<?php echo e($quotations->inq_products_description->name); ?>" target="_blank" href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\. -]/', '-',$quotations->inq_products_description->name).'='.mt_rand(100000000, 999999999).$quotations->product_id)); ?>"><?php echo e($quotations->inq_products_description->name); ?></a>
            <?php else: ?>
            <?php echo e($quotations->inquery_title); ?>

            <?php endif; ?>
            </p>
            <p class="title-price">FOB <span style="font-size: 16px;font-weight: 600;color: #2192D9;">
            <?php if($quotations->product_id): ?>
                <?php echo e($quotations->pre_unit_price); ?>

                <?php echo e($quotations->currency ?? ''); ?> / <?php if($quotations->inq_unit_id): ?>
                <?php echo e($quotations->inq_unit_id->name); ?>

                <?php else: ?>
                <?php endif; ?>
            <?php else: ?>
                <?php if($quotations->p_price): ?>
                <?php if(trim($quotations->p_price->currency) != ''): ?>
                <?php echo e($quotations->p_price->currency); ?>

                <?php else: ?>
                USD
                <?php endif; ?>
            
            <?php else: ?>
            USD
            <?php endif; ?>
            <?php if($quotations->p_price): ?>
            <?php echo e($quotations->p_price->product_FOB); ?>

            <?php else: ?>
            FOB not available
            <?php endif; ?>
            </span> / <?php if($quotations->inq_unit_id): ?>
            <?php echo e($quotations->inq_unit_id->name); ?>

            <?php else: ?>
            Pieces
            <?php endif; ?>
            <?php endif; ?>

            </p>
            

            <?php
                $attr_count = count($quotations->bdtdc_product_attribute);
                $repeat_array = [];                
            ?>
            <div class="com-md-12 padding_0">
            <?php if($quotations->bdtdc_product_attribute): ?>
                <?php if(count($quotations->bdtdc_product_attribute) > 0): ?>
                <div class="col-md-6">
                        <ul class="attribute-list">
                        <?php for($i=0; $i < $attr_count; $i++,$i++): ?>
                            <?php if($quotations->bdtdc_product_attribute[$i]->bdtdcAttribute): ?>
                                <?php if(array_key_exists($quotations->bdtdc_product_attribute[$i]->bdtdcAttribute->name,$repeat_array)): ?>
                                  <?php else: ?>
                                  <?php endif; ?>
                            <li><span style="color:#999;height:40px;"><?php echo e($quotations->bdtdc_product_attribute[$i]->bdtdcAttribute->name); ?></span> <?php echo e($quotations->bdtdc_product_attribute[$i]->bdtdcAttribute->value); ?></li>
                        <?php 
                        $repeat_array[$quotations->bdtdc_product_attribute[$i]->bdtdcAttribute->name] = $quotations->bdtdc_product_attribute[$i]->bdtdcAttribute->value
                        ?> 
                        <?php endif; ?>
                        <?php endfor; ?>
                        </ul>
                </div>
                <div class="col-md-6">
                    <ul class="attribute-list" style="padding-left:5%;">
                    <?php for($i=1; $i < $attr_count; $i++,$i++): ?>
                        <?php if($quotations->bdtdc_product_attribute[$i]->bdtdcAttribute): ?>
                            <?php if(array_key_exists($quotations->bdtdc_product_attribute[$i]->bdtdcAttribute->name,$repeat_array)): ?>
                            <?php else: ?>
                            <?php endif; ?>
                        <li><span style="color:#999;"><?php echo e($quotations->bdtdc_product_attribute[$i]->bdtdcAttribute->name); ?></span> <?php echo e($quotations->bdtdc_product_attribute[$i]->bdtdcAttribute->value); ?></li>
                    <?php 
                    $repeat_array[$quotations->bdtdc_product_attribute[$i]->bdtdcAttribute->name] = $quotations->bdtdc_product_attribute[$i]->bdtdcAttribute->value
                    ?>
                    <?php endif; ?>
                    <?php endfor; ?>
                    </ul>
                </div>
                <?php endif; ?>
            <?php endif; ?>
                
            </div>
            <div class="com-md-12 col-sm-12 padding_0">
            
            <?php if($quotations->sender_company): ?>
                <?php if($quotations->sender_company->country): ?>
                    <p class="ppp-des" style="padding-left: 2.5%;">
                    Requesting form <img title="<?php echo e($quotations->sender_company->country->name); ?>" itemprop="image" style="height:18px;width:25px;" src="<?php echo e(asset('assets/global/img/flags/'.strtolower($quotations->sender_company->country->iso_code_2).'.png')); ?>" alt="<?php echo e($quotations->sender_company->country->name); ?>">
                    </p>
                <?php endif; ?>
            <?php endif; ?>
            
            <?php if(Sentinel::check()): ?>
                <?php
                $current_user_company = null;
                $current_user = Sentinel::getUser();
                ?>
                <?php if($current_user): ?>
                <?php
                    $current_user_company = \App\Model\BdtdcCompany::where('user_id',$current_user->id)->first();
                ?>
                <?php endif; ?>
            <?php if($current_user_company): ?>
            <?php if($current_user_company->is_gold): ?>
            <p class="ppp-des" style="padding-left: 2.5%;">Quantity Required : <?php echo e($quotations->quantity); ?> <?php echo e($quotations->BdtdcSupplierQueryProductUnit?$quotations->BdtdcSupplierQueryProductUnit->name:'Pieces'); ?></p>
            <p class="ppp-des" style="padding-left: 2.5%;">Unit Price : <?php echo e($quotations->pre_unit_price); ?> <?php echo e($quotations->currency); ?></p>
            <p class="ppp-des" style="padding-left: 2.5%;">Total Price : <?php echo e($quotations->quantity*$quotations->pre_unit_price); ?> <?php echo e($quotations->currency); ?></p>
            <p class="ppp-des" style="padding-left: 2.5%;">Payment Type : <?php echo e($quotations->payment_type); ?></p>
            <p class="ppp-des" style="padding-left: 2.5%;">Destination Port : <?php echo e($quotations->destination_port); ?></p>
            <p class="ppp-des" style="padding-left: 2.5%;">Payment Terms : <?php echo e($quotations->payment_terms); ?></p>

            <?php if($quotations->inq_sender_user): ?>
                    <?php
                    $ordered_full_name = $quotations->inq_sender_user->first_name.' '.$quotations->inq_sender_user->last_name
                    ?>
                <?php else: ?>
                    <?php
                    $ordered_full_name = "not available"
                    ?>
                <?php endif; ?>
                    <?php
                    $ordered_comp_name = 'Not Available'
                    ?>
                <?php if($quotations->sender_company): ?>
                    <?php if($quotations->sender_company->name_string): ?>
                        <?php
                        $ordered_comp_name = $quotations->sender_company->name_string->name
                        ?>
                    <?php endif; ?>
                <?php endif; ?>
            
            <p class="ppp-des" style="padding-left: 2.5%;">Quoted By : <?php echo e($ordered_full_name); ?> (<a style="font-weight:600;" target="_blank" href="<?php echo e(URL::to('Home/'.$ordered_comp_name,$quotations->sender_company->id)); ?>"><?php echo e($ordered_comp_name); ?></a>)</p>
            <p class="ppp-des" style="padding-left: 2.5%;">
            <b>Quote Details:</b><br>
             <?php echo $quotations->message; ?></p>
            <?php endif; ?>
            <?php endif; ?>
            <?php endif; ?>


            <p class="ppp-des" style="padding-left: 2.5%;"><span style="color: #1DC11D;line-height:18px;padding-right: 10px;"><b><?php echo e($supplier_count>5?$supplier_count:rand(200,1000)); ?></b></span> <span style="color:#000;font-weight:600;">Suppliers can give quotations</span></p>
            <p class="ppp-des" style="padding-left: 2.5%;"><span style="color: #1DC11D;line-height:18px;padding-right: 10px;"><b><?php echo e($quotations_no>0?$quotations_no:5); ?></b></span> <span style="color:#000;font-weight:600;"> Quotes have been received for this product</span></p>
            <?php echo csrf_field(); ?>

            <div style="width: 100%;">
               
                <div class="snt-qry" style=" width: 100px; float: left;padding-left: 3%;margin-left: 0px">               
                    <a itemprop="url" target="_blank" href="<?php echo e(URL::route('postQuote.form',$quotations->id)); ?>" id="" class="btn btn-primary btn-join filter_by_quote" style="width: 50px; font-size: 14px;padding: 0;">Send Quote</a>
                </div>
                 <div class="add-bq" style="width: 150px; float: left;padding-left: 3%;margin-left: 0px">
                    <a itemprop="url" target="_blank" href="<?php echo e(URL::route('postBuyRequest.form',$quotations->id)); ?>" id="" class="btn btn-primary btn-join filter_by_quote" style=" font-size: 14px;padding: 0 10px;">Add to Buying Request</a>
                </div>
            </div>
            
            </div>


         </div>
    
       
        
       </div> 
</div>

<div class="row" style="margin-top:5%; background: #fff; padding-top: 20px;"">
    <div class="col-sm-12 col-md-12">
    <h3> Selected buying request from top buyers</h3>
    </div>
<div class="col-sm-12 col-md-12" style="padding-bottom: 2%">
<!-- <div class="col-md-12">
<h3>Selected buying request from our top buyers</h3>
    
</div> -->
 <!-- <h3 style="width: 100%;font-size: 20px; padding-bottom: 20px;">Selected Brand</h3> -->

    
    
</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script type="text/javascript" src="<?php echo asset('assets/helpcenter/jquery.etalage.min.js'); ?>"></script>
<script type="text/javascript">

    jQuery(document).ready(function($){

            

                            $('#etalage').etalage({

                                thumb_image_width: 350,

                                thumb_image_height: 350,

                                

                                show_hint: true,

                                click_callback: function(image_anchor, instance_id){

                                    alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');

                                }

                            });

                            // This is for the dropdown list example:

                            $('.dropdownlist').change(function(){

                                etalage_show( $(this).find('option:selected').attr('class') );

                            });



                    });

    



</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('fontend.master_dynamic', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>