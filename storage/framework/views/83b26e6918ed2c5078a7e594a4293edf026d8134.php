<?php $__env->startSection('page_css'); ?>
    <link rel="stylesheet" property='stylesheet' href="<?php echo asset('css/special-page.css'); ?>" media="all"  hreflang="en" type="text/css">
    <link rel="stylesheet" property='stylesheet' href="<?php echo asset('assets/helpcenter/help.css'); ?>" media="all"  hreflang="en" type="text/css">
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('content'); ?>
    </div>

    <div class="container-fluid padding_0">
        <div class="slider-choise <?php echo e($bg_image ?? ''); ?>">
            <div class="container">
                <div class="row">

                </div>
            </div>
        </div>
        <div style="min-height: 200px;background-color: #1686cc;display: block;">
            <div class="container">
                <div class="row padding_0">
                    <div class="col-sm-12 col-md-12 padding_0" style="">
                        <h1 style="margin-top: 2.5%;margin-left: 14px;text-align: center" class="country-trade-title">Effective sourcing from <?php echo e($page_name); ?> suppliers.</h1>
                    </div>

                </div>
                <div class="row get-q">
                    <a itemprop="url" href="<?php echo e(URL::to('get-quotations')); ?>" target="_blank" class="btn btn-primary btn-join" style="height:47px;border-radius:5px;font-size:18px;color:#fff!important;padding-top: 4px;">Get Quotations Now</a>
                </div>

            </div>
        </div>

    </div>
    <div class="container">

        <br>
        <div class="row">
            <div class="col-md-12 padding_0" style="padding-bottom: 1%;padding-left: 2%">
                <ul style="margin-left: -2%" itemscope itemtype="http://schema.org/BreadcrumbList">
                    <li style="float: left;" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" href="<?php echo e(URL::to('/',null)); ?>" style="color: #000"> Home &nbsp;</a></li>
                    <li style="float: left" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" href="" style="color: #000"> <i class="fa fa-angle-right"></i> <?php echo e($page_name); ?> Products <i class="fa fa-angle-right"></i></a></li></ul>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-3"  >
                <div class="col-sm-12 padding_0" style=" background-color: #fff;padding-left: 5%;padding-top: 3%;
">
                    <div class="sh-cat" id="ct-btn" style="width: 70px; padding-bottom: 10px;">
                        <span style="font-size: 14px; font-weight: bold; color: #333;">Related Category</span>
                    </div>
                    <div class="sb-ct-lst">
                        <div  class="hr-gap no-padding">

                            <h3 style="padding-left:0; margin-top: 0;"><a itemprop="url" href="#" style="font-size: 14px;font-weight: bold"><i class="fa fa-list-ul"></i>  Categories</a></h3>

                            <ul id="bazar-list" class="pull-left" style="padding:0;    width: 80%;">

                                <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li class="" style="padding: 4%;">
                                        <a itemprop="url" href="<?php echo e(URL::to('wholesale/category/product',$data['category_id'])); ?>" style="color:#666;" >
                                            <?php echo e($data->bdtdcCategory->name); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li class="more" style="padding-left: .5%;;padding-right: 8%;padding-top: 6%;font-weight: 600;">


                                    <a itemprop="url" class="more" href="<?php echo e(URL::to('online-marketplace',null)); ?>">
                                        All Categories
                                    </a>

                                    <span class="pull-right"><i class="fa fa-angle-right"></i></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 padding_0">

                    <a class="more" itemprop="url" href="#" style="padding-left: 25px; margin-top: 10px; margin-bottom: 10px; display: block;"><i class="fa fa-list-ul"></i> Premium Rated Products</a>


                    <?php $__currentLoopData = $primium; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $pname = 'not available';
                            if($p->pro_to_cat_name){
                                $pname = $p->pro_to_cat_name->name ?? 'Unknown';
                            }
                        ?>
                        <div class="col-lg-12col-md-12 col-sm-12 col-xs-12" style="padding: 25px 0;background: white; margin-bottom: 2px">
                            <div class="bdpro-hovereffect2">
                                <a href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $p->pro_to_cat_name->name).'='.mt_rand(100000000, 999999999).$p->product_id,null)); ?>">
                                    <?php if($p->pro_images_new): ?>
                                        <img itemprop="image"  title="<?php echo e($p->pro_to_cat_name->name ?? "Unknown"); ?>" style="padding: 0" class="img-thumbnail pro-imges" src="<?php echo asset(''.$p->pro_images_new->image); ?>" alt="<?php echo e($p->pro_to_cat_name->name ?? "Unknown"); ?>" />

                                    <?php else: ?>
                                        <img itemprop="image" title="<?php echo e($p->pro_to_cat_name->name ?? "Unknown"); ?>" style="padding: 0" class="img-thumbnail pro-imges" src="<?php echo asset('uploads/no-image.jpg'); ?>" alt="<?php echo e($p->pro_to_cat_name->name ?? "Unknown"); ?>" />
                                    <?php endif; ?>
                                    <a href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $p->pro_to_cat_name->name).'='.mt_rand(100000000, 999999999).$p->product_id,null)); ?>">

                                    </a>
                                </a>
                            </div>
                            <div style="padding: 5%;background-color: #fff">
                                <div class="fea-info-tit" style="padding: 1%;    height: auto;font-size: 12px;margin: 0px;padding-top: 4%;">

                                    <h4 style="font-size: 16px;margin: 0px">
                                        <a href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $p->pro_to_cat_name->name).'='.mt_rand(100000000, 999999999).$p->product_id,null)); ?>">
                                            <?php echo e(substr($p->pro_to_cat_name->name,0,18)); ?>..
                                        </a>
                                    </h4>
                                    <div class="fea-info-tit" style="line-height: 20px;    height: auto;font-size: 11px;opacity: .7">

                                        <?php if($p->supp_pro_company): ?>
                                            <a itemprop="url" target="_blank" href="<?php echo e(URL::to('Home/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$p->supp_pro_company_name->name)).'/'.$p->company_id); ?>">
                                                <?php else: ?>
                                                    company not available
                                                <?php endif; ?>
                                                <?php if($p->supp_pro_company_name): ?>
                                                    <?php echo e(substr($p->supp_pro_company_name->name,0,20)); ?>

                                                <?php else: ?>
                                                    company not available
                                                <?php endif; ?>
                                            </a>
                                    </div>
                                    <?php if($p->bdtdcProduct): ?>
                                        <?php if($p->bdtdcProduct->product_prices): ?>
                                            <?php if($p->bdtdcProduct->product_prices->product_FOB): ?>
                                                <?php if($p->bdtdcProduct->product_prices->product_FOB=='N/A'): ?>
                                                    ask current price

                                                <?php else: ?>
                                                    <strong>  US $</strong>
                                                    <?php echo e($p->bdtdcProduct->product_prices->product_FOB); ?>

                                                <?php endif; ?>
                                            <?php else: ?>
                                                Price not available
                                            <?php endif; ?>
                                        <?php else: ?>
                                            product not available
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($p->bdtdcProduct): ?>
                                        <?php if($p->bdtdcProduct->ProductUnit): ?>
                                            <?php echo e($p->bdtdcProduct->ProductUnit->name); ?>

                                        <?php else: ?>
                                            pieces
                                        <?php endif; ?>
                                    <?php else: ?>
                                        price not available
                                    <?php endif; ?>

                                    <p style="width:100%; text-align: center;margin: 0px;line-height: 21px;">
                                        <?php if($p->bdtdcProduct): ?>
                                            <?php if($p->bdtdcProduct->product_prices): ?>
                                                <?php echo e($p->bdtdcProduct->product_prices->product_MOQ); ?>

                                            <?php else: ?>
                                                none
                                            <?php endif; ?>
                                        <?php else: ?>
                                            product not available
                                        <?php endif; ?>
                                    (Min. Order)</p>
                                </div>
                                <div class="fea-info-tit" style="padding: 2%;    height: auto;">
                                    <a href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $pname).'='.mt_rand(100000000, 999999999).$p->product_id,null)); ?>" type="button" class="btn btn-primary" style="border-radius: 4px !important;padding: 6px 10px;"><h2 class="summery"><span itemprop="name" style="color: #fbf4f4;font-size: 14px;"> Contact Supplier</span></h2>
                                    </a>
                                </div>



                            </div>



                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-sm-9 padding_0">

                <div class="" style="padding-bottom: 2%; padding-left: 7.5px; padding-right: 7.5px;">
                    <div class="row" style=" background: #fff; margin: 0; padding-top: 10px;">
                        <input type="hidden" name="categoryid" value="<?php echo e($categoryid); ?>">
                        <input type="hidden" name="page_title" value="<?php echo e($page_name); ?>">
                        <input type="hidden" name="countery" value="<?php echo e($countryid); ?>">
                        <input type="hidden" name="buyer_protection_input_data" value="<?php echo e($buyer_protection); ?>">
                        <input type="hidden" name="gold_supplier_input" value="<?php echo e($gold_supplier); ?>">
                        <input type="hidden" name="assessed_supplier_input" value="<?php echo e($assessed_supplier); ?>">

                        <div style="font-size:12px;padding-top: 6px;padding-left: 10px; float: left;" class="col-sm-3 col-md-2  title_home padding_0">
                            Supplier Location:
                        </div>
                        <div class="col-sm-9 col-md-10  padding_0 ">
                            <div class="col-md-12 padding_0">
                                <div style="background-color:#fff;border: 1px solid #dae2ed;cursor: pointer;    display: inline-block;height: 25px;    line-height: 22px;padding: 0 0 0 5px;    width: 92%;    vertical-align: middle;color: #333;margin-top: 8px;" class="country_tab">
                        <span style="display: inline-block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 153px;" class="replace_name">
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
                                    <i style="padding-left:0px;position: relative;top:-5px" class="fa fa-angle-down fa_down_show" aria-hidden="true"></i>
                                    <i style="padding-left:0px;display:none;position: relative;top:-5px" class="fa fa-angle-up fa_up_show" aria-hidden="true"></i>

                                </div>
                                <div class="container country_tab_show" style="display: none;">
                                    <div style="position:absolute;border: 1px solid #dae2ed;box-shadow: 2px 2px 3px rgba(0,0,0,.13);background-color: #fff;top: 29px;left: -120px;padding: 10px;overflow: auto;height: 250px;width: 325%;z-index: 1;" class="">
                                        <div style="border-bottom: 1px dotted #dae2ed;    padding-bottom: 10px;">
                                            <div class="replace_name" style="cursor: pointer; background: #7d8ca1; color: #fff; font-size: 12px; line-height: 26px; display: inline-block; padding: 0 7px; border-radius: 5px !important;">
                                                <?php if($countryid != 0): ?>
                                                    <?php $__currentLoopData = $bdtdc_country_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($countryid == $value->id): ?>
                                                            <?php echo e($value->name. " Selected"); ?>

                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <?php else: ?>
                                                    All Countries & Regions
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
                                            <li class="active"><a data-toggle="tab" href="#all-con">All Countries</a></li>
                                            <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Countries): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a itemprop="url" data-toggle="tab" href="#'<?php echo e(explode(' ', $Countries->name)[0]); ?>"><?php echo e($Countries->name); ?> </a></li>
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
                                                <div id="<?php echo e(explode(' ', $Countries->name)[0]); ?>" class="tab-pane fade">';
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
                        <div class="col-md-12 col-xs-12 padding_0">
                            <div class="col-md-2 col-sm-3" style="padding-left: 10px !important; padding-top: 15px;">
                                <label style="float: left;" class="ui2-checkbox-customize-label">
                                    <span style="font-size:12px;" class="ui2-checkbox-customize-txt title_home">Supplier Types: </span>
                                </label>
                            </div>
                            <div class="col-md-10 col-sm-9" style="padding-top: 15px;">
                                <label title="Buyer Protection: Ensures on-time shipment and pre-shipment product quality" style="padding: 5px;font-size:12px;float: left; cursor: pointer;" class="ui2-checkbox-customize-label">
                                    <input style="position: relative; top: 2px; cursor: pointer;" type="checkbox" class="ui2-checkbox-customize-val cat_filter_check_box" name="buyer_protection" value="false" <?php if($buyer_protection == 'true'){echo 'checked';} ?>>
                                    <span class="ui2-checkbox-customize-txt">
                        <img style="height: 29px;width: auto;padding: 0px 5px 5px 5px;" src="<?php echo asset('assets/gold/Buyer-protection-home.png'); ?>" alt="Buyer protection home">Buyer Protection</span>
                                </label>
                                <label title="Gold Suppliers:pre-qualified suppliers typr" style="padding: 5px;font-size:12px;float: left; cursor: pointer;" class="ui2-checkbox-customize-label">
                                    <input style="position: relative; top: 2px; cursor: pointer;" type="checkbox" class="ui2-checkbox-customize-val cat_filter_check_box" name="gold_supplier" value="false" <?php if($gold_supplier == 'true'){echo 'checked';} ?>>
                                    <span class="ui2-checkbox-customize-txt"><img style="height: 29px;width: auto;padding: 0px 5px 5px 5px;" src="<?php echo asset('assets/helpcenter/Gold-membership.png'); ?>" alt="Gold membership">Gold Supplier</span>
                                </label>
                                <label title="Assessed Supplier: Supplier assessed by a world-leading inspection company (i.e SGS, Bureau Veritas)." style="padding: 5px;font-size:12px;float: left; cursor: pointer;" class="ui2-checkbox-customize-label">
                                    <input style="position: relative; top: 2px; cursor: pointer;" type="checkbox" class="ui2-checkbox-customize-val cat_filter_check_box" name="assessed_supplier" value="false" <?php if($assessed_supplier == 'true'){echo 'checked';} ?>>
                                    <span class="ui2-checkbox-customize-txt"><img style="height: 29px;width: auto;padding: 0px 5px 5px 5px;" src="<?php echo asset('assets/helpcenter/verified-supplier.png'); ?>" alt="verified supplier">Assessed Supplier</span>
                                </label>
                            </div>
                        </div>
                        <div id="pro_view" class="col-sm-12 col-md-12 col-xs-12 padding-right" data-spm="57">
                            <div class="col-sm-4 col-md-4 padding_0 padding-right">
                                <div class="view-label" style="padding: 8px; float: left;">View  <?php if(count($products)>=1): ?>
                                        <strong><?php echo count($products); ?></strong>
                                    <?php else: ?>
                                        <strong>0</strong>
                                    <?php endif; ?>
                                    Product(s) below
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="view-label text-center" style="padding: 8px;">Total <?php if(isset($products)): ?>
                                        <strong><?php echo e($products->total()); ?></strong> <?php else: ?>
                                        <strong>0</strong> <?php endif; ?> Result(s) found
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 padding_0 padding-right">
                                <div class="view-label text-right" style="padding: 8px; float: left;">Page No <?php if(isset($products)): ?>
                                        <strong><?php echo e($products->currentPage()); ?></strong> <?php if($products->lastPage() >0 ): ?>
                                            of <strong><?php echo e($products->lastPage()); ?></strong>
                                        <?php endif; ?> |
                                        <a href="<?php echo e($products->previousPageUrl()); ?>">prev</a> |
                                        <a href="<?php echo e($products->nextPageUrl()); ?>">next</a>
                                    <?php else: ?>
                                        <strong>0</strong>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 padding_0">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $pname = 'not available';
                            if($p->pro_to_cat_name){
                                $pname = $p->pro_to_cat_name->name ?? 'Unknown';
                            }
                        ?>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12" style="padding: 7.5px">
                            <div class="bdpro-hovereffect">
                                <a href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $pname).'='.mt_rand(100000000, 999999999).$p->product_id,null)); ?>">




                                    <?php if($p->pro_images_new): ?>
                                        <img itemprop="image"  title="<?php echo e($pname); ?>" style="" class="img-responsive pro-imges" src="<?php echo asset(''.$p->pro_images_new->image); ?>" alt="<?php echo e($pname); ?>" />

                                    <?php else: ?>
                                        <img itemprop="image" title="<?php echo e($pname); ?>" style="" class="img-responsive pro-imges" src="<?php echo asset('uploads/no-image.jpg'); ?>" alt="<?php echo e($pname); ?>" />
                                    <?php endif; ?>
                                    <div class="bdpro-overlay" style="padding: 5px">
                                        <a href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $pname).'='.mt_rand(100000000, 999999999).$p->product_id,null)); ?>">
                                            <h2><?php echo e(substr($p->pro_to_cat_name->name,0,50)); ?></h2>
                                        </a>
                                        <p style="padding: 0px">
                                            <a style="color: white!important" href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $pname).'='.mt_rand(100000000, 999999999).$p->product_id,null)); ?>">
                                                <?php if($p->bdtdcProduct): ?>
                                                    <?php if($p->bdtdcProduct->product_prices): ?>
                                                        <?php if($p->bdtdcProduct->product_prices->product_FOB): ?>
                                                            <?php if($p->bdtdcProduct->product_prices->product_FOB=='N/A'): ?>
                                                                ask current price
                                                            <?php else: ?>
                                                                <strong>  US $</strong><?php echo e($p->bdtdcProduct->product_prices->product_FOB); ?>

                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            Price not available
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        product not available
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                /<?php if($p->bdtdcProduct): ?>
                                                    <?php if($p->bdtdcProduct->ProductUnit): ?>
                                                        <?php echo e($p->bdtdcProduct->ProductUnit->name); ?>

                                                    <?php else: ?>
                                                        pieces
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    price not available
                                                <?php endif; ?>
                                                <span style="width:100%; text-align: center">
                                <?php if($p->bdtdcProduct): ?>
                                                        <?php if($p->bdtdcProduct->product_prices): ?>
                                                            <?php echo e($p->bdtdcProduct->product_prices->product_MOQ); ?>

                                                        <?php else: ?>
                                                            none
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        product not available
                                                    <?php endif; ?>
                                                (Min. Order)</span></a>
                                        </p>
                                        <a href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $pname).'='.mt_rand(100000000, 999999999).$p->product_id,null)); ?>" type="button" class="btn btn-primary" style="border-radius: 4px !important;padding: 5%;">Source Now</a>
                                    </div>
                                </a>
                            </div>
                            <div class="sp-l-t-j" style="padding: 5%;background-color: #fff">
                                <div class="fea-info-tit" style="padding: 1%;    height: auto;font-size: 12px;margin: 0px;padding-top: 4%;">
                                    <a href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $pname).'='.mt_rand(100000000, 999999999).$p->product_id,null)); ?>">
                                        <h4 style="font-size: 16px;margin: 0px;white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
                                            <?php echo e($pname==''?'Not Available':$pname); ?>

                                        </h4>
                                    </a>
                                    <div class="fea-info-tit" style="line-height: 20px;    height: auto;font-size: 11px;opacity: .7">
                                        <?php if($p->supp_pro_company): ?>
                                            <a itemprop="url" target="_blank" href="<?php echo e(URL::to('Home/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$p->supp_pro_company_name->name)).'/'.$p->company_id); ?>">
                                                <?php else: ?>
                                                    company not available
                                                <?php endif; ?>
                                                <?php if($p->supp_pro_company_name): ?>
                                                    <?php echo e(substr($p->supp_pro_company_name->name,0,20)); ?>

                                                <?php else: ?>
                                                    company not available
                                                <?php endif; ?>
                                            </a>
                                    </div>
                                    <?php if($p->bdtdcProduct): ?>
                                        <?php if($p->bdtdcProduct->product_prices): ?>
                                            <?php if($p->bdtdcProduct->product_prices->product_FOB): ?>
                                                <?php if($p->bdtdcProduct->product_prices->product_FOB=='N/A'): ?>
                                                    ask current price
                                                <?php else: ?>
                                                    <strong>  US $</strong><?php echo e($p->bdtdcProduct->product_prices->product_FOB); ?>

                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            Price not available
                                        <?php endif; ?>
                                    <?php else: ?>
                                        product not available
                                    <?php endif; ?>
                                    /<?php if($p->bdtdcProduct): ?>
                                        <?php if($p->bdtdcProduct->ProductUnit): ?>
                                            <?php echo e($p->bdtdcProduct->ProductUnit->name); ?>

                                        <?php else: ?>
                                            pieces
                                        <?php endif; ?>
                                    <?php else: ?>
                                        price not available
                                    <?php endif; ?>
                                    <p style="width:100%; text-align: center;margin: 0px;line-height: 21px;">
                                        <?php if($p->bdtdcProduct): ?>
                                            <?php if($p->bdtdcProduct->product_prices): ?>
                                                <?php echo e($p->bdtdcProduct->product_prices->product_MOQ); ?>

                                            <?php else: ?>
                                                none
                                            <?php endif; ?>
                                        <?php else: ?>
                                            product not available
                                        <?php endif; ?></p>
                                </div>
                                <div class="fea-info-tit" style="padding: 2%;    height: auto;">
                                    <a href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $pname).'='.mt_rand(100000000, 999999999).$p->product_id,null)); ?>" type="button" class="btn btn-primary" style="border-radius: 4px !important;padding: 6px 10px;">
                                        <h2 class="summery">
                                            <span itemprop="name" style="color: #fbf4f4;font-size: 13px;"> Contact Supplier</span>
                                        </h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php echo $products->render(); ?>

                </div>
            </div>


        </div>

        <div class="row padding_0">
            <div class="col-sm-12 col-md-12 padding_0">
                <h1 style="margin-top: 3%;text-align: center;color: #000;font-size: 14px" class="country-trade-title">
                </h1>
            </div>

        </div>
        <div class="row get-q" style="padding-bottom: 2%;text-align: center;padding-left: 0px">
            <a itemprop="url" href="<?php echo e(URL::to('get-quotations',null)); ?>" target="_blank" class="btn btn-primary btn-join" style="height:47px;border-radius:5px;font-size:18px;color:#fff!important;padding-top: 4px;">Get Quotations Now</a>
        </div>

        <div class="row padding_0" style="padding-bottom: 2%;text-align: center;font-size: 14px">
            Do you want to show<strong> <?php echo e($page_name); ?></strong> or other products of your own company?        <a itemprop="url" href="<?php echo e(URL::to('dashboard','product')); ?>" target="_blank" class="" style="height:47px;border-radius:5px;font-size:14px;color:#000!important;padding-top: 4px; background-color: "><strong>Display your Products FREE now!</strong></a>
        </div>

        <div class="row" style="background-color: #ffffff;padding: 2%;margin-bottom: 2%">
            <div class="col-sm-12" style="padding: 0 0 0 5px;margin: 0 0 30px;font-size: 18px;line-height: 40px;color: #222;font-weight: bold;
border-bottom: 2px solid #999;">
                <h5 style="font-size: 16px"><b>Determined channel for genuine Suppliers</b></h5>
            </div>
            <hr>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <p style="font-size: 14px; text-align: left;font-weight: normal; padding:0; margin: 0;opacity: .7">BuyerSeller.Asia works with the world's most renowned brands and creates the golden opportunity for you to have the most  profitable deal in<strong> <?php echo e($page_name); ?></strong> Products Sector.
                </p>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <table style="width:100%;" class="mt20 logo-table">
                    <tbody class="supp-tbody">
                    <tr class="supp-row">
                        <td style="width:25%;" class="brandTb-td">
                            <img title="Each year Kmart supports hundreds of Bangladesh frozen food suppliers and agriculture companies and wholesale food suppliers" itemprop="image" class="" style="max-height: 125px; max-width: 85%;" src="<?php echo asset('assets/fontend/bdtdc-images/kmart-tyre-and-auto-service-logo.jpg'); ?>" alt="Kmart tyre and auto service logo">
                        </td>
                        <td style="width:25%;" class="brandTb-td">
                            <img title="Each year Tesco supports hundreds of Bangladesh frozen food suppliers and agriculture companies and wholesale food suppliers" itemprop="image" class="" style="max-height: 125px; max-width: 85%;" src="<?php echo asset('assets/fontend/bdtdc-images/tesco.jpg'); ?>" alt="Tesco logo">
                        </td>
                        <td style="width:25%;" class="brandTb-td">
                            <img title="Each year Sears supports hundreds of Bangladesh frozen food suppliers and agriculture companies and wholesale food suppliers" itemprop="image" class="" style="max-height: 125px; max-width: 85%;" src="<?php echo asset('assets/fontend/bdtdc-images/sears.jpg'); ?>" alt="Sears logo">
                        </td>
                        <td style="width:25%;" class="brandTb-td">

                            <img title="Each year Target supports hundreds of Bangladesh frozen food suppliers and agriculture companies and wholesale food suppliers" itemprop="image" style=" max-height: 125px; width: 85%;" src="<?php echo asset('assets/fontend/bdtdc-images/target.png'); ?>" alt="Target logo">
                        </td>
                    </tr>
                    <tr class="supp-row">
                        <td style="width:25%;" class="brandTb-td">
                            <img title="Each year TJX supports hundreds of Bangladesh frozen food suppliers and agriculture companies and wholesale food suppliers" itemprop="image" class="" style="max-height: 125px; max-width: 85%;" src="<?php echo asset('assets/fontend/bdtdc-images/logo_tjx_companies.gif'); ?>" alt="The TJX companies logo">
                        </td>
                        <td style="width:25%;" class="brandTb-td">
                            <img title="Each year Zara supports hundreds of Bangladesh frozen food suppliers and agriculture companies and wholesale food suppliers" itemprop="image" style=" max-height: 125px; max-width: 85%;" src="<?php echo asset('assets/fontend/bdtdc-images/zara_logo.jpg'); ?>" alt="Zara logo">
                        </td>
                        <td style="width:25%;" class="brandTb-td">
                            <img title="Each year Walmart supports hundreds of Bangladesh frozen food suppliers and agriculture companies and wholesale food suppliers" itemprop="image" class="" style="max-height: 125px; max-width: 85%;" src="<?php echo asset('assets/fontend/bdtdc-images/com-logo-picture27.jpg'); ?>" alt="Walmart logo">
                        </td>
                        <td style="width:25%;" class="brandTb-td">
                            <img title="Each year Carrefour supports hundreds of Bangladesh frozen food suppliers and agriculture companies and wholesale food suppliers" itemprop="image" class="" style="max-height: 125px; max-width: 85%;" src="<?php echo asset('assets/fontend/bdtdc-images/com-logo-picture21.jpg'); ?>" alt="Carrefour logo">
                        </td>
                    </tr>
                    </tbody>
                </table>

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

            </script>

            <script>

                $(function(){


                    function search_data(){
                        var categoryid = $('input[name="categoryid"]').val();
                        var key = $('input[name="page_title"]').val();
                        var country = $('input[name="countery"]').val();
                        var buyer_protection = $('input[name="buyer_protection_input_data"]').val();
                        var gold_supplier = $('input[name="gold_supplier_input"]').val();
                        var assessed_supplier = $('input[name="assessed_supplier_input"]').val();
                        var search_str = $('input[name="search_str"]').val();
                        var origin = $('input[name="origin"]').val();
                        if(key == ''){
                            var search_str = ' ';
                        }else{
                            var search_str = key.split(' ').join('-');
                            var search_str = search_str.split('/').join('-');
                        }
                        var url = window.location.origin+'/'+search_str+'/search?t='+'products'+'&c='+country+'&bp='+buyer_protection+'&gs='+gold_supplier+'&as='+assessed_supplier+'&ca='+categoryid;
                        window.location.href = url;
                    }

                    $(document).on({change:function(){
                            $('input[name="countery"]').val($(this).val());
                            $('.fa_down_show').show();
                            $('.fa_up_show').hide();
                            $('.country_tab_show').hide();
                            search_data();

                        }},'.filter_by_cat_pro_input');

                    $(document).on({click:function(){
                            var countryid = $(this).attr('data-countryid');
                            $('[name="countery"]').val(countryid);

                            $('.fa_down_show').show();
                            $('.fa_up_show').hide();
                            $('.country_tab_show').hide();
                            search_data();
                        }},'.country_select');


                    $(".country_tab").hover(function(){
                        $(".country_tab_show").css("display", "block");
                        $(".country_tab_show").hover(function(){
                            $(".country_tab_show").css("display", "block");

                        }, function(){
                            $(".country_tab_show").css("display", "none");});

                    }, function(){
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
                            if(selected_name == 'buyer_protection'){
                                if ($('input[name="buyer_protection"]').is(':checked')) {
                                    $('input[name="buyer_protection_input_data"]').val('true');
                                }else{
                                    $('input[name="buyer_protection_input_data"]').val('false');
                                }
                            }else if(selected_name == 'gold_supplier'){
                                if ($('input[name="gold_supplier"]').is(':checked')) {
                                    $('input[name="gold_supplier_input"]').val('true');
                                }else{
                                    $('input[name="gold_supplier_input"]').val('false');
                                }
                            }else if(selected_name == 'assessed_supplier'){
                                if ($('input[name="assessed_supplier"]').is(':checked')) {
                                    $('input[name="assessed_supplier_input"]').val('true');
                                }else{
                                    $('input[name="assessed_supplier_input"]').val('false');
                                }
                            }
                            search_data();
                        }
                    }, '.cat_filter_check_box');

                    $(document).on({click:function(e){
                            e.preventDefault();
                            var id = $.trim($(this).attr('data-tid'));
                            var type = $(this).attr('data-id-type');
                            if(type == 'category'){
                                $('input[name="categoryid"]').val(id);
                                search_data();
                            }
                            if(type == 'country-origin'){
                                $('input[name="origin"]').val(id);
                                search_data();
                            }
                            if(type == 'brandname'){
                                $('input[name="search_str"]').val(id);
                                search_data();
                            }
                            if(type == 'country'){
                                $('input[name="countery"]').val(id);
                                search_data();
                            }
                        }}, '.custom_click_search');

                    $(document).on({click:function(e){
                            e.preventDefault();
                            var type = $.trim($(this).attr('href'));
                            if(type == 'country-origin'){
                                $('input[name="origin"]').val('');
                                search_data();
                            }
                            if(type == 'brandname'){
                                $('input[name="search_str"]').val('');
                                search_data();
                            }
                        }}, '.cancel_custom_search');


                    $('ul.pagination').css('margin-top','5px');
                    $('ul.pagination').css('margin-bottom','5px');
                    $('ul.pagination').css('margin-right','10px');

                });

                /*favorite*/
                $(document).on({click:function(e){
                        e.preventDefault();
                        var _this = $(this);
                        var base_url='<?php echo e(URL::to("/")); ?>';
                        var key= $(this).attr('data-key');
                        var data= $(this).attr('data-id');
                        var type= $(this).attr('data-type');
                        $.post(base_url+'/make-favorite',{
                            '_token':'<?php echo e(csrf_token()); ?>',
                            'key':key,
                            'data':data,
                            'type':type
                        },function(result){
                            if(parseInt(result)==1)
                            {
                                /*var redirected_url = window.location.href;
                                window.location.href = redirected_url;*/
                                if(_this.hasClass('fa-plus-square')){
                                    _this.removeClass('fa-plus-square');
                                    _this.addClass('fa-minus-square');
                                    _this.text(' Remove from Favorite');
                                }else{
                                    _this.removeClass('fa-minus-square');
                                    _this.addClass('fa-plus-square');
                                    _this.text(' Add to Favorite');
                                }
                            }
                        });

                    }},'.favorite');
            </script>

            <script type="text/javascript">
                $(document).ready(function(){
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

            <script type="text/javascript">

                $(document).ready(function()
                {
                    $('img').bind('contextmenu', function(e){
                        return false;
                    });
                });
            </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.master-home', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>