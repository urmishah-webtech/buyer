<?php $__env->startSection('page_css'); ?>
<link property='stylesheet' href="<?php echo asset('css/single-product-category.css'); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<br>

<?php
	use App\Model\BdtdcCountry;
	?>
<div class="container">
   <div class="row">
      <div class="col-lg-12 col-md-12 padding_0">
         <ul style="margin-left: -2%;float: left;">
            <li style="float: left">
               <a itemprop="url" href="<?php echo e(URL::to('/',null)); ?>" style="color: #000">
                  Home &nbsp;</a>
               <i class="fa fa-angle-right"></i>
               <?php if($countryid): ?>
               <a itemprop="url" href="<?php echo e(URL::to('selected-suppliers/bangladesh-products',$countryid)); ?>" style="color: #000">
               <?php echo e($country_name->name); ?> products
               <?php else: ?>
               <a itemprop="url" href="<?php echo e(URL::to($parent_cats['slug'],$parent_cats['id'])); ?>" style="color: #000">
                  <?php echo e($parent_cats->name); ?>

                  <?php endif; ?> &nbsp;
               </a>
            </li>
            <li style="float: left">
               <?php if($countryid): ?>
               <a itemprop="url" href="<?php echo e(URL::to(strtolower($country_name->name).'-'.strtolower(preg_replace('/[^A-Za-z0-9\.-]/', '-',$category_id->slug)).'/'.$countryid,$category_id['id'])); ?>" style="color: #000;font-weight: 700">
               <?php else: ?>
               <a itemprop="url" href="<?php echo e(URL::to(preg_replace('/[^A-Za-z0-9\.-]/','-',$category_id->slug).'/'.$countryid,$category_id['id'])); ?>" style="color: #000;font-weight: 700">
                  <?php endif; ?>
                  <i class="fa fa-angle-right"></i>
                  <?php if($name_combination): ?>
                  <?php echo e(ucfirst($name_combination)); ?>

                  <?php else: ?>
                  <?php echo e($category_id->name); ?>

                  <?php endif; ?> <i class="fa fa-angle-right"></i>
               </a>
            </li>
         </ul>
         <div style="float:right;margin-left: -2%" itemscope itemtype="http://schema.org/BreadcrumbList">
            <button class="goBack" onclick="goBack()" style="padding: 0;"><span>Go Back</span></button>
         </div>
      </div>
   </div>
   <div class="row item_sha" style=" margin-bottom: 2%; padding-top: 0; ">
      <div class="col-sm-2 col-md-2 hidden-sm" style="padding: 0px">
         <div class="padding_0 bottom-space">
            <div class="cat-height hr-gap no-padding">
               <h3 itemprop="name" style="margin-bottom: 10%; margin-top: 10px; padding-left: 15px;">
               	<a itemprop="url" href="" style="font-size:13px; font-family: verdana;"><i class="fa fa-list-ul" style="font-size: 12px; padding-right: 0;"></i>
                     <?php echo e($category_id->name); ?>

                  </a>
               </h3>
               <ul itemscope itemtype="http://data-vocabulary.org/Product" class="bazar-list pull-left" style="padding:0; width: 100%;">
                  <?php $__currentLoopData = $parent_cats->parent_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li style=" padding-left: 15px;;width: 100%; margin: 0; overflow: hidden; display: block;line-height: 20px;">
                     <?php if($countryid): ?>
                     <a itemprop="url" style="font-size: 12px; line-height: 15px; font-family: verdana;color: #333;" href="<?php echo e(URL::to(strtolower(preg_replace('/[^A-Za-z0-9\.-]/','',preg_replace('/[^A-Za-z0-9\.,&-]/','-',$country_name->name.'-'.$data['slug']))).'/'.$countryid,$data['id'],null)); ?>">
                     <?php else: ?>
                     <a itemprop="url" style="font-size: 12px; line-height: 15px; font-family: verdana;color: #333;" href="<?php echo e(URL::to(strtolower(preg_replace('/[^A-Za-z0-9\.-]/','',preg_replace('/[^A-Za-z0-9\.,&-]/','-',$data['slug']))).'/'.$countryid,$data['id'])); ?>">
                     <?php endif; ?>

                     <span itemprop="name" style="font-size:12px; text-align:left; line-height:15px; padding:0;">
                        <?php echo $data[ 'name']; ?>
                     </span>
                     </a>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <li class="bazar-list-li" style="padding-left: 15px;;padding-right: 8%;padding-top: 3%;font-weight: 600;">
                     <a itemprop="url" style="font-size: 11px;" href="<?php echo e(URL::to('online-marketplace',null)); ?>">
                        All Categories
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <!--/brands_products-->
      <div style="border: none; border-left: 1px solid #ddd; padding-top: 10px;" class="col-xs-12 col-sm-12 col-md-8 col-lg-8 item_sha padding-right">
         <div class="col-sm-12 col-md-12">
            <form method="post" action="<?php echo e(URL::to('country/products',null)); ?>" class="filter_by_cat_pro_form">
               <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
               <input type="hidden" name="categoryid" value="<?php echo e($categoryid); ?>">
               <input type="hidden" name="countery" value="<?php echo e($countryid); ?>">
               <input type="hidden" name="buyer_protection_input_data" value="<?php echo e($buyer_protection); ?>">
               <input type="hidden" name="gold_supplier_input" value="<?php echo e($gold_supplier); ?>">
               <input type="hidden" name="assessed_supplier_input" value="<?php echo e($assessed_supplier); ?>">
               <input type="hidden" name="search_str" value="<?php echo e($search_str); ?>">
               <input type="hidden" name="origin" value="<?php echo e($origin); ?>">
               <div class="col-sm-7 col-md-7 col-xs-12 res-coun padding_0 ">
                  <div style="font-size:12px;line-height: 32px; float:left;" class="title_home padding_0">Supplier Location: &nbsp;&nbsp; &nbsp;
                  </div>
                  <div style="margin-top:6px;padding-left:6px; margin-bottom: 10px;">
                     <div style="background-color: #fff;border: 1px solid #dae2ed;   display: inline-block;height: 22px;    line-height: 22px;padding: 0 0 0 5px;    width: 191px;    vertical-align: middle;color: #333;" class="country_tab">
                        <span class="replace_name">
                           <?php if($countryid != 0): ?>
                           <?php $__currentLoopData = $bdtdc_country_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php if($countryid == $value->id): ?>
                           <?php echo e($value->name. " Selected"); ?>

                           <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                           <?php else: ?>
                           <?php echo e("All Countries & Regions"); ?>

                           <?php endif; ?>
                        </span>
                        <i style="padding-right:5px;" class="fa fa-angle-down fa_down_show" aria-hidden="true"></i>
                        <i style="padding-left:5px;padding-right:5px;display:none;" class="fa fa-angle-up fa_up_show" aria-hidden="true"></i>

                     </div>
                     <div class="container country_tab_show" style="display: none;">
                        <div class="select_count" style="width:200%;">
                           <div style="border-bottom: 1px dotted #dae2ed;    padding-bottom: 10px;">
                              <div class="replace_name" style="background: #7d8ca1;color: #fff;font-size: 12px;    line-height: 26px;width: 162px;padding-left: 7px;    border-radius: 5px !important;">
                                 <?php if($countryid != 0): ?>
                                 <?php $__currentLoopData = $bdtdc_country_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($countryid == $value->id): ?>
                                 <?php echo e($value->name. " Selected"); ?>

                                 <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                 <?php else: ?>
                                 <?php echo e("All Countries & Regions"); ?>

                                 <?php endif; ?>
                              </div>
                           </div>

                           <select style="box-sizing: border-box;border: 1px solid #dae2ed;color: #333;box-shadow: inset 0 1px 2px rgba(0,0,0,.1);height: 29px;font-size: 12px;width: 29%;padding-left: 24px;margin-top: 10px;margin-bottom: 10px;" class="form-control filter_by_cat_pro_input" name="country_id_data">
                              <option value="0">Select Country</option>

                              <?php $__currentLoopData = $bdtdc_country_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bdtdc_country_list_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($countryid == $bdtdc_country_list_data->id): ?>
                              <option value="<?php echo e($bdtdc_country_list_data->id); ?>" selected> <?php echo e($bdtdc_country_list_data->name); ?> </option>

                              <?php else: ?>
                              <option value="<?php echo e($bdtdc_country_list_data->id); ?>"><?php echo e($bdtdc_country_list_data->name); ?></option>
                              <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                           </select>
                           <ul class="nav nav-tabs">
                              <li class="active"><a itemprop="url" data-toggle="tab" href="#all-con">All Countries</a></li>

                              <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Countries): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li><a itemprop="url" data-toggle="tab" href="#<?php echo e(explode(' ', $Countries->name)[0]); ?>"><?php echo e($Countries->name); ?> </a></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                           </ul>

                           <div class="tab-content">
                              <div id="all-con" class="tab-pane fade in active">
                                 <div class="col-md-3 col-xs-3 padding_0">
                                    <label class="country_select" style="cursor:pointer;" data-countryid="0"> All</label>
                                 </div>
                                 <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Countries): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php $__currentLoopData = $Countries->country_region; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <div class="col-md-3 col-xs-3 padding_0"><label class="country_select" style="cursor:pointer;" data-countryid="<?php echo e($p->id); ?>"><?php echo e($p->name); ?>

                                    </label>
                                 </div>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                              </div>
                              <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Countries): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <div id="<?php echo e(explode(' ', $Countries->name)[0]); ?>" class="tab-pane fade">
                                 <?php $__currentLoopData = $Countries->country_region; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <div class="col-md-3 col-xs-3 padding_0"><label class="country_select" style="cursor:pointer;" data-countryid="<?php echo e($p->id); ?>"><?php echo e($p->name); ?></label></div>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-5 col-md-5 col-xs-12 padding_0" style="">
                  <label style="font-size:12px; float: left;" class="ui2-checkbox-customize-label">
                     <span class="ui2-checkbox-customize-txt" style="padding-right: 5px;">Supplier Types: </span>
                  </label>
                  <label title="Buyer Protection: Ensures on-time shipment and pre-shipment product quality" style="" class="ui2-checkbox-customize-label typr">
                     <span style="position: relative;top: 1px;"><input style="margin: 2px 0 0;" type="checkbox" class="ui2-checkbox-customize-val cat_filter_check_box" name="buyer_protection" value="false" <?php if($buyer_protection == 'true'){echo 'checked';} ?>>
                     </span>
                     <span class="ui2-checkbox-customize-txt" style="padding-right: 5px; position: relative;top: -1px;"><img itemprop="image" title="Buyer Protection: Ensures on-time shipment and pre-shipment product quality" style="height:24px;width:24px;" src="<?php echo asset('assets/gold/Buyer-protection-home.png'); ?>" alt="Buyer protection"><!-- Buyer Protection --></span>
                  </label>
                  

                  <label title="Gold Suppliers:pre-qualified suppliers" style="font-size:12px;float: left;" class="ui2-checkbox-customize-label">
                     <span style="position: relative;top: 1px;">
                        <input style="margin: 2px 0 0;" type="checkbox" class="ui2-checkbox-customize-val cat_filter_check_box" name="gold_supplier" value="false" <?php if($gold_supplier == 'true'){echo 'checked';} ?>>
                     </span>
                     <span class="ui2-checkbox-customize-txt" style="padding-right: 5px;position: relative;top: -2px;"><img itemprop="image" title="Gold Suppliers: pre-qualified suppliers" style="height:24px;width:24px;" src="<?php echo asset('assets/gold/gold-com-icon.png'); ?>" alt="Gold membership"><!-- Gold Supplier --></span>
                  </label>
                  <label title="Assessed Supplier: Supplier assessed by a world-leading inspection company (i.e SGS, Bureau Veritas)." style="font-size:12px;float: left;" class="ui2-checkbox-customize-label ">
                     <span style="position: relative;top: 1px;">
                        <input style="margin: 2px 0 0;" type="checkbox" class="ui2-checkbox-customize-val cat_filter_check_box" name="assessed_supplier" value="false" <?php if($assessed_supplier == 'true'){echo 'checked';} ?>>
                     </span>

                     <span class="ui2-checkbox-customize-txt" style="position: relative;top: -2px;"><img itemprop="image" title="Assessed Supplier: Supplier assessed by a world-leading inspection company (i.e SGS, Bureau Veritas)." style="height:24px;width:24px;" src="<?php echo asset('assets/helpcenter/verified-supplier.png'); ?>" alt="Supplier assessed by a world-leading inspection company"><!-- Assessed Supplier --></span>
                  </label>
               </div>
            </form>
         </div>
         <div class="col-sm-12">

            <?php if(($search_str != null && $search_str !='') || ($origin != null && $origin != '')): ?>
            <div style="z-index: 0;">
               <p style="padding-top:10px;padding-right:10px;">
                  <?php if($search_str != null && $search_str !=''): ?>
                  <a title="Remove Brand search '<?php echo e($search_str); ?>'" style="padding: 3px 7px;background-color: #ddd;border-radius: 5px !important;" class="cancel_custom_search" href="brandname">x&nbsp;<?php echo e($search_str); ?></a>
                  <?php endif; ?>
                  <?php if(($search_str != null && $search_str !='') && ($origin != null && $origin != '')): ?>
                  |
                  <?php endif; ?>
                  <?php if($origin != null && $origin != ''): ?>
                  <?php $country_name_d = BdtdcCountry::where('id',$origin)->first(); ?>
                  <a title="Remove Origin '<?php echo e($country_name_d->name); ?>'" style="padding: 3px 7px;background-color: #ddd;border-radius: 5px !important;" class="cancel_custom_search" href="country-origin">x&nbsp;<?php echo e($country_name_d->name); ?></a></p>
               <?php endif; ?>
            </div>
            <?php endif; ?>
         </div>
         <div class="col-sm-12 col-md-12 col-lg-12 pro-total-div" style=" ">
            <div id="pro_v" class="padding-right">
               <div id="pro_view" class="padding-right" data-spm="57">
                  <div class="col-sm-4 col-md-4" style=" ">
                     <div class="view-label" style="padding: 8px; float: left;">View
                        <?php if(count($products)>=1): ?>
                        <strong><?php echo count($products); ?></strong>
                        <?php else: ?>
                        <strong>0</strong>
                        <?php endif; ?>
                        Product(s) below
                     </div>
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <div class="view-label text-center" style="padding: 8px; float: left;">Total <?php if(isset($products)): ?>
                        <strong><?php echo e($products->total()); ?></strong> <?php else: ?>
                        <strong>0</strong> <?php endif; ?> Result(s) found
                     </div>
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <div class="view-label text-right" style="padding: 8px; float: left;">Page no. <?php if(isset($products)): ?>
                        <strong><?php echo e($products->currentPage()); ?></strong> <?php if($products->lastPage() >0 ): ?>
                        of <strong><?php echo e($products->lastPage()); ?></strong>
                        <?php endif; ?> &nbsp;
                        <span style="white-space: nowrap;">
                        <?php if($products->currentPage()==1): ?>
                        < prev <?php else: ?> <a href="<?php echo e($products->previousPageUrl()); ?>">
                           < prev</a> <?php endif; ?> | <a href="<?php echo e($products->nextPageUrl()); ?>">next ></a>
                              <?php else: ?>
                              <strong>0</strong>
                              <?php endif; ?>
                        </span>
                     </div>
                  </div>

               </div>
            </div>
         </div>
         <div class="col-sm-12 padding_0" style="">
            <div class="padding-right" data-spm="57">
               <input type="hidden" name="base_url" value="<?php echo e(URL::to('/',null)); ?>">
               <div class="features_items row" style=" margin: 0px ;overflow: visible;">
                  <?php if(count($products)>0): ?>
                  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                  <div class="list_product col-xs-12" style="width: 100%; margin-bottom: 1%; border-bottom: 1px solid #ddd ">
                     <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 padding_0" style="">
                        <div class="col-md-3 col-sm-3 col-xs-6 padding_0">
                           <div>
                              <?php
                              $pname = 'not available'
                              ?>
                              <?php if($p->pro_to_cat_name): ?>
                              <?php
                              $pname = $p->pro_to_cat_name->name
                              ?>
                              <?php endif; ?>


                              <a itemprop="url" target="_blank" href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $pname).'='.mt_rand(100000000, 999999999).$p->product_id,null)); ?>">


                                 <?php if($p->pro_images_new): ?>
                                 <img itemprop="image" title="<?php echo e($pname); ?>" style="width:100%;min-height:auto!important;" class="img-thumbnail pro-imges" src="<?php echo asset(''.$p->pro_images_new->image); ?>" alt="<?php echo e($pname); ?>" />
                                 <?php else: ?>
                                 <img itemprop="image" title="<?php echo e($pname); ?>" style="width:100%;min-height:auto!important;" class="img-thumbnail pro-imges" src="<?php echo asset('uploads/no-image.jpg'); ?>" alt="<?php echo e($pname); ?>" />
                                 <?php endif; ?>
                              </a>
                           </div>

                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-12">

                           <?php if($p->pro_to_cat_name): ?>
                           <div>
                              <a itemprop="url" style="font-size:18px; width:100%;" target="_blank" href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $p->pro_to_cat_name->name).'='.mt_rand(100000000, 999999999).$p->product_id,null)); ?>"><span itemprop="name"><?php echo e($p->pro_to_cat_name->name); ?></span>
                                 <?php else: ?>
                                 <?php endif; ?>
                              </a>

                           </div>
                           <div style="line-height: 24px; padding-top: 10px;">
                              <span style="width:50%; float:left;line-height:1!important;">

                                 <?php if($p->bdtdcProduct): ?>
                                 <?php if($p->bdtdcProduct->product_prices): ?>

                                 <?php if($p->bdtdcProduct->product_prices->product_FOB): ?>

                                 <?php if($p->bdtdcProduct->product_prices->product_FOB=='N/A'): ?>
                                 ask current price
                                 <?php else: ?>

                                 <strong> US $</strong>
                                 <?php echo e($p->bdtdcProduct->product_prices->product_FOB); ?>


                                 <?php endif; ?>

                                 <?php endif; ?>

                                 <?php else: ?>
                                 Price not available
                                 <?php endif; ?>
                                 <?php else: ?>
                                 product not available
                                 <?php endif; ?>
                                 /
                                 <?php if($p->bdtdcProduct): ?>
                                 <?php if($p->bdtdcProduct->ProductUnit): ?>
                                 <?php echo e($p->bdtdcProduct->ProductUnit->name); ?>

                                 <?php else: ?>
                                 pieces
                                 <?php endif; ?>
                                 <?php else: ?>
                                 price not available
                                 <?php endif; ?>
                              </span>
                              <span style="width:50%; float:left;line-height:1!important;">
                                 <?php if($p->bdtdcProduct): ?>
                                 <?php if($p->bdtdcProduct->product_prices): ?>
                                 <?php echo e($p->bdtdcProduct->product_prices->product_MOQ); ?>

                                 <?php else: ?>
                                 none
                                 <?php endif; ?>
                                 <?php else: ?>
                                 product not available

                                 <?php endif; ?>
                                 (Min. Order)</span>
                           </div>
                           <div style="line-height: 24px; padding-top: 10px; clear:both;">
                              <span style="margin:0 0 0px;display:block;width:50%; float:left;line-height:1!important;" class="summary_pro">Product Type:</span>
                              <span style="display:block;width:50%; float:left;line-height:1!important;"> <a style="line-height: 1!important;" class="custom_click_search" data-id-type="category" data-tid="<?php echo e($p->bdtdcCategory->id); ?>" href="<?php echo e($p->bdtdcCategory->id); ?>"><?php echo e($p->bdtdcCategory->name); ?></a>
                              </span>
                           </div>

                           <div style="line-height: 24px; padding-top: 5px; clear:both;">
                              <span class="summary_pro" style="width:50%; float:left;">Place of Origin:</span>
                              <span style="width:50%;line-height:1!important;">
                              	<a style="line-height: 1!important;" class="custom_click_search" data-id-type="country-origin" href="" data-tid="<?php if($p->bdtdcProduct): ?> <?php if($p->bdtdcProduct->product_country): ?> <?php echo e($p->bdtdcProduct->product_country->id); ?> <?php else: ?> 0 <?php endif; ?> <?php else: ?> 0 <?php endif; ?> ">
                                    <?php if($p->bdtdcProduct): ?>
                                    <?php if($p->bdtdcProduct->product_country): ?>
                                    <?php echo e($p->bdtdcProduct->product_country->name); ?>


                                    <?php else: ?>
                                    not available
                                    <?php endif; ?>
                                    <?php else: ?>
                                    product not available
                                    <?php endif; ?>
                                 </a>
                              </span>
                           </div>
                           <div style="line-height: 24px; padding-top: 5px; clear:both;">
                              <span class="summary_pro" style="width:50%; float:left;line-height:1!important;">Brand Name:</span><span style="width:48%; float:left;line-height:1!important;"> <a style="line-height: 1!important;" class="custom_click_search" data-id-type="brandname" href="" data-tid="<?php echo e($p->bdtdcProduct->brandname); ?>"><?php echo e($p->bdtdcProduct->brandname); ?></a></span>
                           </div>
                        </div>
                        <div class="col-xs-12 col-md-4 col-sm-4 padding_0" style="border-left: 1px solid #ddd;">
                           <div style="padding-left: 15px;" class=" col-md-10 left_sh padding_0">
                              <div class="heading_sup" style="width:220px;">

                                 <?php if($p->supp_pro_company_name): ?>
                                 <a itemprop="url" target="_blank" href="<?php echo e(URL::to('Home/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$p->supp_pro_company_name->name)).'/'.$p->company_id); ?>">
                                    <?php else: ?>
                                    company not available
                                    <?php endif; ?>
                                    <?php if($p->supp_pro_company_name): ?>
                                    <?php echo e($p->supp_pro_company_name->name); ?>

                                    <?php else: ?>
                                    company not available
                                    <?php endif; ?>
                                 </a>
                              </div>
                              <div class="summary" style="padding:5px 0;">
                                 <a class="custom_click_search" data-id-type="country" href="" data-tid="<?php if($p->cat_country): ?> <?php if($p->cat_country->name): ?> <?php echo e($p->cat_country->id); ?>	<?php else: ?>	0 <?php endif; ?>	<?php else: ?>	0 <?php endif; ?>	">

                                    <?php if($p->cat_country): ?>
                                    <?php if($p->cat_country->name): ?>
                                    <?php echo e($p->cat_country->name); ?>

                                    <?php else: ?>
                                    no country
                                    <?php endif; ?>
                                    <?php else: ?>
                                    no country
                                    <?php endif; ?>
                                 </a>

                                 |
                                 <a itemprop="url" style="white-space: nowrap;" href="<?php echo e(URL::to('BuyerChannel/pages/trade_assurance',5)); ?>" target="_blank">
                                    <!-- <i class="fa fa-pie-chart"></i> -->
                                    <span><img title="Buyer Protection" style="width: 20px;" src="<?php echo e(asset('bdtdc-product-image/home-page/Buyer-protection-home.png')); ?>" alt="Buyer Protection"></span>
                                    Buyer Protection
                                 </a>
                              </div>
                              <div class="summary">
                                 Membership Type: Free<br>
                              </div>
                              <div class="summary">
                                 Buyer Assurance: NA<br>
                              </div>
                              <div class="summary">
                                 Verified Information: <span>
                                    <?php if($p->supp_pro_company_name): ?>
                                    <a itemprop="url" style="white-space: nowrap;" target="_blank" href="<?php echo e(URL::to('industrial-certification/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$p->supp_pro_company_name->name)).'/'.$p->company_id); ?>">
                                       <?php else: ?>
                                       company not available"
                                       <?php endif; ?>
                                       View details
                                    </a>
                                 </span><br>
                              </div>
                              <div itemscope itemtype="http://schema.org/Rating" class="summary">
                                 <span itemprop="ratingValue">Avg Response Time: NA<br>
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-12 add-comp padding_0" style=" padding-top: 2%; width: 98.5%;">
                        <div class="col-sm-3 col-md-3">
                           <div>
                              <?php $url='http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>
                              <?php if(Sentinel::check()): ?>
                              <form action="" method="post">
                                 <?php echo csrf_field(); ?>

                                 <?php if($p->bdtdcProduct): ?>
                                 <?php if($p->bdtdcProduct->customer_activity): ?>
                                 <?php if(count($p->bdtdcProduct->customer_activity)>0): ?>
                                 <a style="padding: 0px 7px 0px 0px;" class="fa fa-minus-square  btn favorite" itemprop="url" data-key="<?php echo e($p->pro_to_cat_name->name ?? ''); ?>" data-id="<?php echo e($p->product_id); ?>" data-type="1"> Remove from favorite</a>
                                 <?php else: ?>

                                 <a style="padding: 0px 7px 0px 0px;" class="fa fa-plus-square  btn favorite" itemprop="url" data-key="<?php echo e($p->pro_to_cat_name->name ?? ''); ?>" data-id="<?php echo e($p->product_id); ?>" data-type="1"> Add to favorite</a>

                                 <?php endif; ?>
                                 <?php else: ?>

                                 <?php endif; ?>
                                 <?php else: ?>
                                 <?php endif; ?>

                              </form>
                              <?php else: ?>
                              <a href="<?php echo e(URL::to('ServiceLogin?continue='.$url)); ?>" class="fa fa-plus-square  btn" itemprop="url" style="line-height: 28px;padding: 0px 7px 0px 0px;"> Add to favorite</a>

                              <?php endif; ?>
                           </div>
                        </div>
                        <!-- <div class="col-sm-5 col-md-5">
					<div>
						<a itemprop="url" style="line-height: 28px" href="<?php echo e(URL::to('login')); ?>"><i class="fa fa-plus-square"></i>Add to compare</a>
					</div>
			</div> -->
                        <div class="col-sm-4 col-md-4">
                           <div style="float:left;" class="">
                              <ul style="float:left;" class="list-inline">
                                 <li style="float:left;"><a itemprop="url" href="#" data-product_id="<?php echo e($p->product_id ?? ''); ?>" data-supplier_id="<?php echo e($p->bdtdcProduct->supplier_product->supplier_id); ?>" class="btn btn-primary btn-sm contact_supplier"><i class="fa fa-envelope-o"></i>Contact Supplier</a></li>

                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  <?php else: ?>
                  <div class="col-sm-12 col-md-12 padding_0 head-query text-center" style="padding: 40px;margin-right: 0px; margin-left: 0px">

                     No entry found!

                  </div>

                  <?php endif; ?>
               </div>
               <?php echo $products->render(); ?>


            </div>
            <div class="col-md-12" style="padding-top: 15px; padding-bottom: 20px;">
               <p>See more <strong><?php echo e(ucfirst($name_combination)); ?> </strong>at <a target="_blank" href="<?php echo e(URL::to('online-marketplace')); ?>">All Categories.</a></p>
               <p>Unable to find your desired<strong> <?php echo e(ucfirst($name_combination)); ?> </strong>?</p>
               <p> <a target="_blank" href="<?php echo e(URL::to('get-quotations')); ?>">Get Quotations</a> of top quality <?php echo e(ucfirst($name_combination)); ?> from verified suppliers today!</p>
            </div>
         </div>
      </div>
      <div class="col-md-2 relate .d-none .d-md-block">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="padding: 18px 0;background: white; margin-bottom: 2px">
	         <div class="title_home" style="line-height: 1.2;">Premium related products</div>
	      </div>
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 25px 0;background: white; margin-bottom: 2px">
            <div class="bdpro-hovereffect2">
               <a href="<?php echo e(URL::to('product-details/Ladies-Blank-Tank-Top=3586698671034')); ?>">
                  <img itemprop="image" title="Ladies Blank Tank Top" style="width:100%;height: auto;min-height:auto;padding: 0" class="img-thumbnail pro-imges" src="<?php echo asset('bdtdc-product-image/apparel-textile/ladies-blouses-tops/Ladies-Blank-Tank-Top_1_247_8GAuTblgOM.jpg'); ?>" alt="Ladies Blank Tank Top">
               </a><a href="<?php echo e(URL::to('product-details/Ladies-Blank-Tank-Top=3586698671034')); ?>">
               </a>
            </div>
            <div style="padding: 5%;background-color: #fff">
               <div class="fea-info-tit" style="padding: 1%;    height: auto;font-size: 12px;margin: 0px;padding-top: 4%;">
                  <h4 style="font-size: 16px;margin: 0px">
                     <a href="<?php echo e(URL::to('product-details/Ladies-Blank-Tank-Top=3586698671034')); ?>">
                        Ladies Blank Tank ..
                     </a>
                  </h4>
                  <div class="fea-info-tit" style="line-height: 20px;    height: auto;font-size: 11px;opacity: .7">
                     <a itemprop="url" target="_blank" href="<?php echo e(URL::to('Home/FAM-FASHION/788')); ?>">

                        FAM FASHION </a>
                  </div>
                  <strong> US $</strong>1.00-6.00/pieces
                  <p style="width:100%; text-align: center;margin: 0px;line-height: 21px;">5000(Min. Order)</p>
               </div>
               <div class="fea-info-tit" style="padding: 2%;    height: auto;">
                  <a itemprop="url" href="<?php echo e(URL::to('product-details/Ladies-Blank-Tank-Top=3586698671034')); ?>" class="btn btn-primary btn-sm">View Details</a>
               </div>
            </div>
         </div>
      </div>
   </div>
	
	
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
	$.ajaxSetup({
	   headers: {
	      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   }
	});
	var get_cat_filtered_product_list;

	get_cat_filtered_product_list = function() {

	   $.ajax({
	      type: "get",
	      url: "<?php echo e(URL::to('country/products',null)); ?>",
	      data: $('.filter_by_cat_pro_input').serialize(),
	      success: function(result) {
	         $("#product_view").html(result);
	         $("#product_view").focus();

	      }
	   })

	}

	// $.getJSON( 
	// 			function(data) 
	//  			{
	//  			 $('#product_view').html(data.view);
	//  			}
	// );



	$(function() {

	   var $ui = $('#ui_element');

	   /**
	    * on focus and on click display the dropdown, 
	    * and change the arrow image
	    */
	   $ui.find('.sb_input').bind('focus click', function() {
	      $ui.find('.sb_down')
	         .addClass('sb_up')
	         .removeClass('sb_down')
	         .andSelf()
	         .find('.sb_dropdown')
	         .show();
	   });
	   /**
	    * on mouse leave hide the dropdown, 
	    * and change the arrow image
	    */
	   $ui.bind('mouseleave', function() {
	      $ui.find('.sb_up')
	         .addClass('sb_down')
	         .removeClass('sb_up')
	         .andSelf()
	         .find('.sb_dropdown')
	         .hide();
	   });
	   /**
	    * selecting all checkboxes
	    */
	   $ui.find('.sb_dropdown').find('label[for="all"]').prev().bind('click', function() {
	      $(this).parent().siblings().find(':checkbox').attr('checked', this.checked).attr('disabled', this.checked);
	   });

	   $(document).on({
	      click: function(e) {
	         e.preventDefault();
	         $('.modal-content').html('<span class="btn btn-block btn-lg"><i class="fa fa-spinner fa-pulse loading_icon text-primary"></i></span>');
	         // var base_url = $('[name="base_url"]').val();
	         var base_url = window.location.origin;
	         var supplier_id = $(this).data('supplier_id');
	         var product_id = $(this).data('product_id');
	         var url = base_url + "/byer/contact_supplier/" + supplier_id + "/" + product_id;
	         //$('.modal-content').html(" ");
	         /*$.get(url, function(r) {
	         	$('.modal-content').html(r);
	         	// $('#animatedModal').modal('show', {backdrop: 'static'});
	         })*/
	         window.location.href = url;
	      }
	   }, '.contact_supplier');


	});

	$(function() {
	   $(".link").button({
	      icons: {
	         secondary: "ui-icon-carat-1-e"
	      }
	   });
	   // $(".next, input:submit").button({
	   //     icons:{
	   //     secondary:"ui-icon-circle-arrow-e"
	   //     }
	   // });



	   function search_data() {
	      var categoryid = $('input[name="categoryid"]').val();
	      var country = $('input[name="countery"]').val();
	      var buyer_protection = $('input[name="buyer_protection_input_data"]').val();
	      var gold_supplier = $('input[name="gold_supplier_input"]').val();
	      var assessed_supplier = $('input[name="assessed_supplier_input"]').val();
	      var search_str = $('input[name="search_str"]').val();
	      var origin = $('input[name="origin"]').val();
	      var url = window.location.origin + '/category/product/category==' + categoryid + '+..+country==' + country + '+..+buyer_protection==' + buyer_protection + '+..+gold_supplier==' + gold_supplier + '+..+assessed_supplier==' + assessed_supplier + '?search_str=' + search_str + '&origin=' + origin;
	      window.location.href = url;
	   }

	   $(document).on({
	      change: function() {
	         $('input[name="countery"]').val($(this).val());
	         $('.fa_down_show').show();
	         $('.fa_up_show').hide();
	         $('.country_tab_show').hide();
	         search_data();

	      }
	   }, '.filter_by_cat_pro_input');

	   $(document).on({
	      click: function() {
	         var countryid = $(this).attr('data-countryid');
	         $('[name="countery"]').val(countryid);

	         $('.fa_down_show').show();
	         $('.fa_up_show').hide();
	         $('.country_tab_show').hide();
	         search_data();
	      }
	   }, '.country_select');


	   $(".country_tab").hover(function() {
	      $(".country_tab_show").css("display", "block");
	      $(".country_tab_show").hover(function() {
	         $(".country_tab_show").css("display", "block");

	      }, function() {
	         $(".country_tab_show").css("display", "none");
	      });

	   }, function() {
	      $(".country_tab_show").css("display", "none");
	   });

	   $(document).on({
	      click: function(e) {
	         e.preventDefault();
	         // other_filter_search_func();
	         $('.fa_down_show').show();
	         $('.fa_up_show').hide();
	         $('.country_tab_show').hide();
	         var selected = $(this).val();
	         var selected_name = $(this).attr('name');
	         if (selected_name == 'buyer_protection') {
	            if ($('input[name="buyer_protection"]').is(':checked')) {
	               $('input[name="buyer_protection_input_data"]').val('true');
	            } else {
	               $('input[name="buyer_protection_input_data"]').val('false');
	            }
	         } else if (selected_name == 'gold_supplier') {
	            if ($('input[name="gold_supplier"]').is(':checked')) {
	               $('input[name="gold_supplier_input"]').val('true');
	            } else {
	               $('input[name="gold_supplier_input"]').val('false');
	            }
	         } else if (selected_name == 'assessed_supplier') {
	            if ($('input[name="assessed_supplier"]').is(':checked')) {
	               $('input[name="assessed_supplier_input"]').val('true');
	            } else {
	               $('input[name="assessed_supplier_input"]').val('false');
	            }
	         }
	         search_data();
	      }
	   }, '.cat_filter_check_box');

	   $(document).on({
	      click: function(e) {
	         e.preventDefault();
	         var id = $.trim($(this).attr('data-tid'));
	         var type = $(this).attr('data-id-type');
	         if (type == 'category') {
	            $('input[name="categoryid"]').val(id);
	            search_data();
	         }
	         if (type == 'country-origin') {
	            $('input[name="origin"]').val(id);
	            search_data();
	         }
	         if (type == 'brandname') {
	            $('input[name="search_str"]').val(id);
	            search_data();
	         }
	         if (type == 'country') {
	            $('input[name="countery"]').val(id);
	            search_data();
	         }
	      }
	   }, '.custom_click_search');

	   $(document).on({
	      click: function(e) {
	         e.preventDefault();
	         var type = $.trim($(this).attr('href'));
	         if (type == 'country-origin') {
	            $('input[name="origin"]').val('');
	            search_data();
	         }
	         if (type == 'brandname') {
	            $('input[name="search_str"]').val('');
	            search_data();
	         }
	      }
	   }, '.cancel_custom_search');


	   $('ul.pagination').css('margin-top', '5px');
	   $('ul.pagination').css('margin-bottom', '5px');
	   $('ul.pagination').css('margin-right', '10px');

	});

	/*favorite*/
	$(document).on({
	   click: function(e) {
	      e.preventDefault();
	      var _this = $(this);
	      var base_url = '<?php echo e(URL::to("/")); ?>';
	      var key = $(this).attr('data-key');
	      var data = $(this).attr('data-id');
	      var type = $(this).attr('data-type');
	      $.post(base_url + '/make-favorite', {
	         '_token': '<?php echo e(csrf_token()); ?>',
	         'key': key,
	         'data': data,
	         'type': type
	      }, function(result) {
	         if (parseInt(result) == 1) {
	            /*var redirected_url = window.location.href;
	            window.location.href = redirected_url;*/
	            if (_this.hasClass('fa-plus-square')) {
	               _this.removeClass('fa-plus-square');
	               _this.addClass('fa-minus-square');
	               _this.text(' Remove from Favorite');
	            } else {
	               _this.removeClass('fa-minus-square');
	               _this.addClass('fa-plus-square');
	               _this.text(' Add to Favorite');
	            }
	         }
	      });

	   }
	}, '.favorite');

	$(document).ready(function() {
	   $('.text_container').addClass("hidden");

	   $('.text_container').click(function() {
	      var $this = $(this);

	      if ($this.hasClass("hidden")) {
	         $(this).removeClass("hidden").addClass("visible");

	      } else {
	         $(this).removeClass("visible").addClass("hidden");
	      }
	   });
	});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.master-home', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>