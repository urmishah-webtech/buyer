  <?php $__env->startSection('page_css'); ?>
    <link property='stylesheet' href="<?php echo asset('css/footer-bottom/supplier-products.css'); ?>" rel="stylesheet">
    <link property='stylesheet' href="<?php echo asset('css/mega-menu.css'); ?>" rel="stylesheet">    
    <?php $__env->stopSection(); ?>
	<?php $__env->startSection('content'); ?>
<br>
  <div class="row" style="margin-bottom: 10px">
    <div class="col-md-12 padding_0" style="padding-bottom: 0%">
      <ul style="margin-left: -2%" itemscope itemtype="http://schema.org/BreadcrumbList">
      <li style="float: left" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" href="<?php echo e(URL::to('/',null)); ?>" style="color: #000"> Home &nbsp;</a></li>
      <li style="float: left" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" href="#" style="color: #000"> <i class="fa fa-angle-right"></i> Hot Products <i class="fa fa-angle-right"></i></a></li></ul>
    </div>
  </div>
</div>

<div style="background: white;">
<div class="container">
      <div class="row" style="position: relative;">
      <div  class="col-sm-3 mobo-categories hr-gap all-cate-pro" style="padding-left: 0px;padding-bottom: 9px; position: absolute; top: 0; left: 15px; background: rgba(255, 255, 255, 0.64); z-index: 1;">
            <h3 style="padding-top: 12px"><a itemprop="url" style="height: 8px;" href="<?php echo e(URL::to('online-marketplace',null)); ?>"><i class="fa fa-list-ul"></i> CATEGORIES</a></h3>
            <?php if($cat_products): ?> 
           <?php $__currentLoopData = $cat_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <ul  class="pull-left bazar-list" itemscope itemtype="http://data-vocabulary.org/Product">
                <li  data-id="market-<?php echo e($category['parent_id']); ?>" style="border-color: transparent;">
                    <?php if($category->pro_parent_cat): ?>
                        <?php if($category->pro_parent_cat->name): ?>
                    <a style="color: black" itemprop="url"  rel="category" href="<?php echo e(URL::to(strtolower(preg_replace('/[^A-Za-z0-9\.-]/','',preg_replace('/[^A-Za-z0-9\.,&-]/','-',$category->pro_parent_cat->name))).'-product/0',$category['parent_id'])); ?>" >
                        <?php echo e($category->pro_parent_cat->name); ?> </a>
                    <span style="padding:0;" class="pull-right"><i class="fa fa-angle-right"></i></span>
                        <?php endif; ?>
                    <?php endif; ?>
                </li>
            </ul>
          
          <?php if($category->pro_parent): ?>
            
            <div style="padding-top:0px; margin-top: -38px;margin-left: 88%;" class="col-lg-offset-12 col-md-offset-12 col-sm-offset-12 cacostos util-clearfix" id="market-<?php echo e($category['parent_id']); ?>">
                <ul class="cacostos-list" itemscope itemtype="http://data-vocabulary.org/Product">
                    <li>
                        <div class="prothom-cacostos">
                    <?php echo e($category->pro_parent_cat->name); ?></div>
                        <div style="margin-top:10px" class="ditio-cacostos">

                           
                            <?php $__currentLoopData = $category->pro_parent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($cat->column==1): ?>
                              <a itemprop="url" rel="category" href="<?php echo e(URL::to(strtolower(preg_replace('/[^A-Za-z0-9\.-]/','',preg_replace('/[^A-Za-z0-9\.,&-]/','-',$cat->slug))).'-product/18',$cat['id'])); ?>">
                                  <span itemprop="name"><?php echo e($cat->name); ?></span>
                              </a>
                              <?php endif; ?>
                          
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          </div>
                    </li>
                </ul>
                 <ul class="cacostos-list" style="margin-top:30px" itemscope itemtype="http://data-vocabulary.org/Product">
                    <li>
                        <a itemprop="url" href="#" class="prothom-cacostos"></a>
                        <div class="ditio-cacostos">
                            <?php 
                            $stop_loop = 0
                            ?>
                             <?php $__currentLoopData = $category->pro_parent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($cat->column==2): ?>
                                <?php if($stop_loop <= 15): ?>
                              <a itemprop="url" rel="category" href="<?php echo e(URL::to(strtolower(preg_replace('/[^A-Za-z0-9\.-]/','',preg_replace('/[^A-Za-z0-9\.,&-]/','-',$cat->slug))).'-product/18',$cat['id'])); ?>">
                                 <span itemprop="name"> <?php echo e($cat->name); ?></span>
                              </a>
                              <?php else: ?>
                              <?php
                              break
                              ?>
                             <?php endif; ?>
                            <?php 
                            $stop_loop++
                            ?>
                              <?php endif; ?>
                          
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </div>

                    </li>
                </ul>
            </div>

            <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>
            <div id="bazar-list" class="pull-left" style="padding-left: 1.3%;;padding-right: 8%;font-weight: 600;">
                <a itemprop="url" href="<?php echo e(URL::to('online-marketplace',null)); ?>">
                   All Categories </a>
                <span class="pull-right"><i style="margin-left: 5px" class="fa fa-angle-right"></i></span>
            </div>
            </div>

              <div class="col-sm-12" style="">

               <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active" style="border-radius:10px !important; border:0 none;"></li>
                    <li data-target="#myCarousel" data-slide-to="1" style="border-radius:10px !important; border:0 none;"></li>
                    <li data-target="#myCarousel" data-slide-to="2" style="border-radius:10px !important; border:0 none;"></li>
                    <li data-target="#myCarousel" data-slide-to="3" style="border-radius:10px !important; border:0 none;"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  

                 
                  <div class="carousel-inner" role="listbox">


                    <div class="item active">
                      <img itemprop="image" style=" float: none;height:400px;" src="<?php echo asset('assets/country-images/supplier-evaluation.jpg'); ?>" alt="supplier evaluation">
                      <div class="carousel-caption">
                      <a itemprop="url" href="#" target="_blank">
                        </a>
                       
                      </div>
                    </div> 
                  
                    <div class="item">
                      <img itemprop="image" style=" float: none;height:400px;" src="<?php echo asset('assets/country-images/Selected-Suppliers-1170x400.jpg'); ?>" alt="Selected suppliers">
                      <div class="carousel-caption">
                      <a itemprop="url" href="#" target="_blank">
                      
                        </a>
                       
                      </div>
                    </div>  
                    <div class="item">
                      <img itemprop="image" style="float: none;height:400px;    width: 100%;" src="<?php echo asset('assets/country-images/Sellected-Suppliers.jpg'); ?>" alt="trade assurance">
                      <div class="carousel-caption">
                      <a itemprop="url" href="#" target="_blank">
                       </a>
                     
                    </div> 
                
                  </div>
                  <div class="item">
                      <img itemprop="image" style="float: none;height:400px;    width: 100%;" src="<?php echo asset('assets/country-images/bangladesh-leather.png'); ?>" alt="trade assurance">
                      <div class="carousel-caption">
                      <a itemprop="url" href="#" target="_blank">
                       </a>
                     
                    </div> 
                
                  </div>  
              </div>

                  
              </div>

              </div>

        </div>
      </div>
     </div>


    <div style="min-height: 250px;background-color: #1686cc;display: block;">
        <div class="container">
            <div class="row padding_0" >
                <div class="col-sm-12 col-md-12 padding_0">
                    <h2 style="margin-top: 6%;margin-left: 14px;text-align: center" class="country-trade-title">Effective sourcing from Selected Supplier.</h2>
                </div>
              
            </div>
            <div class="row get-q">
               <button class="btn btn-primary btn-join">
                <a itemprop="url" href="<?php echo e(URL::to('get-quotations',null)); ?>" target="_blank"   style="height:47px;border-radius:5px;font-size:18px;color:#fff!important;padding-top: 4px; ">Get Quotations Now</a>
                </button>
            </div>
          
        </div>
    </div>

<div class="container">

<?php if($cat_products): ?> 

    <?php $__currentLoopData = $cat_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<div class="row" id="cat<?php echo e($pro_category->pro_parent_cat->id); ?>"  style="background-color: #f6f7fb; margin-top:20px;margin-bottom: 2%;padding-bottom: 3%; border-left:1px solid #ddd;border-bottom:1px solid #ddd;border-right:1px solid #ddd;">
<div class="col-md-3 col-sm-3" style="padding:0; width:20%;">
	<div class="cate-details" style="background-color: #fff3fc;">
		<div id="cat<?php echo e($pro_category->pro_parent_cat->id); ?>" class="cat<?php echo e($pro_category->pro_parent_cat->id); ?> cate-d-title"  style="border:none ;">
			<?php echo e($pro_category->pro_parent_cat->name); ?>

		</div>
		<ul class="cate-ul-list" itemscope itemtype="http://data-vocabulary.org/Product">
    		<?php if($pro_category->most_view_category): ?>
    		    <?php $__currentLoopData = $pro_category->most_view_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>				
    				<li class="cat-li choice-cat">
                        <a itemprop="url" rel="category" href="<?php echo e(URL::to(strtolower(preg_replace('/[^A-Za-z0-9\.-]/','',preg_replace('/[^A-Za-z0-9\.,&-]/','-',$cat->cat_name->slug))).'-product/18',$cat['category_id'])); ?>">
                            <?php echo e($cat->cat_name->name); ?>

                        </a>
                    </li>
    		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>								
				
		</ul>

	</div>
</div>
<div class="col-md-9 col-sm-9" style="padding-left:15px;padding-right:15px;width: 80%">		
    <?php if($pro_category->selected_suppliers): ?>         
			<?php $__currentLoopData = $pro_category->selected_suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
				<div class="col-sm-3 col-xs-6 padding_0  sup-head-col" style="margin-bottom: 1%;height: 360px" itemscope itemtype="http://schema.org/Product">
					<div class="img-hilight  product-hover">
                        <?php if($data->pro_name_string): ?>
            				<a itemprop="url" target="_blank" href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$data->pro_name_string->name).'=232942253'.$data->product_id,null)); ?>" class="slidebox-item-list" style="box-shadow: none; border:0 none;width: 100%">
                     <?php else: ?>
                   <a itemprop="url" target="_blank" href="#" class="slidebox-item-list" style="box-shadow: none; border:0 none;width: 100%">
                    <?php endif; ?>
            <div>

            <?php if($data->select_product_images): ?>
            <img itemprop="image" title="<?php echo e($data->pro_name_string->name); ?>" style="height:220px;width:100%;" class="img-thumbnail" src="<?php echo e(URL::to((isset($data->select_product_images)) ? ''.$data->select_product_images->image : 'no_image.jpg',null)); ?>" alt="<?php echo e($data->pro_name_string->name); ?>" />
            <?php else: ?>
            <img itemprop="image" style="height: 220px;width: 200px;" title="No image" class="img-responsive  col-sup-img" src="<?php echo e(URL::to('uploads/no_image.jpg',null)); ?>" alt="bdtdc" />
            <?php endif; ?>
			    </div>
					<div class="product-head-cont">
					<div class="brand-year" style="padding-left:10px;padding-right:10px;padding-top: 30px;height:70px;">
							<div  class="brand-year16">
                <?php if($data->pro_name_string): ?>
					<div itemprop="name" class="pp-title" style="overflow: hidden; height: auto; text-overflow: ellipsis; white-space: nowrap;">
                        <?php echo e($data->pro_name_string->name, 0, 30); ?>

                    </div>
               <?php else: ?>
               Unknown Product
               <?php endif; ?>
			</div>
		</div>
            <?php if($data->cat_pro_price): ?>
				<p class="brand-favorable" style="text-align:left;padding-left:10px;padding-bottom:3; height:40px;">
					<span class="doller-product-price" itemprop="offers" itemscope itemtype="http://schema.org/AggregateOffer" style="font-size: 14px;">
                        <span itemprop="priceCurrency" content="USD">US $</span> <span itemprop="lowPrice">
                            <?php echo e($data->cat_pro_price->product_FOB); ?>

                        </span> 
                    </span>
                    <span itemprop="name">
                        <?php echo e($data->BdtdcSelectedSupplier_products->ProductUnit->name); ?>

                    </span>
				</p>
            <?php else: ?>
                <p class="brand-favorable" style="text-align:left;padding-left:10px;padding-bottom:3; height:40px;">
                    Latest price
                </p>

            <?php endif; ?>

				<div class="brand-favorable" style="text-align:left;margin-left:10px; padding-top:0; padding-bottom:0;">
					MOQ: <span style="color:#333;">
            <?php if($data->cat_pro_price): ?>
            <?php echo e($data->cat_pro_price->product_MOQ); ?> <?php echo e($data->BdtdcSelectedSupplier_products->ProductUnit->name); ?>

            <?php else: ?>
            <?php endif; ?>
          </span> 
				</div>
			</div>
		</a>
	</div>	
</div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
		
</div>
			
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.master_dynamic', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>