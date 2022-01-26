	<?php $__env->startSection('page_css'); ?>
    <link property='stylesheet' href="<?php echo asset('css/sell-on/qoute-list.css'); ?>" rel="stylesheet">
    <?php $__env->stopSection(); ?>
	<?php $__env->startSection('content'); ?>
	<br>
<div class="row">
		<div class="col-md-10 padding_0" style="padding-bottom: 1%">
			<ul style="margin-left: -2%" itemscope itemtype="http://schema.org/BreadcrumbList">
			<li style="float: left" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo e(URL::to('/',null)); ?>" style="color: #000"><span itemprop="name">Home &nbsp;</span> </a></li><li style="float: left"><a itemprop="item" href="" style="color: #000"> <i class="fa fa-angle-right"></i><span itemprop="name"> Buying Requests </span> <i class="fa fa-angle-right"></i></a></li></ul>
		</div>
		<div class="col-md-2" style="padding: 0px">
			<ul style="margin-left: 2%"><li style="float: right;"><a itemprop="url" href="<?php echo e(URL::to('Sourcing/Requests/info/buyer',null)); ?>" style="color: #000"> I am Buyer &nbsp;</a>
			</li>
			</ul>
		</div>
	</div>
<div class="row" style="padding-top:0px; background-color: #fff;">
    <img  itemprop="image" class="img-responsive header_img_fix" src="<?php echo asset('assets/service/invoice-management.jpg'); ?>" alt="invoice management" />

</div>
	<div  class="row item_sha" style="padding-top:2%;padding-bottom: 5%">
				 <div style="padding-right:0px" class="col-sm-4 col-md-3 col-xs-12">
					        <div style="#margin-bottom: 225%;" class="col-sm-12 col-xs-12 mobo-categories hr-gap no-padding">
			
            <h3><a itemprop="url" href="<?php echo e(URL::to('Sourcing/Requests/info',null)); ?>" style="font-size: 12px;"><i class="fa fa-list-ul"></i>
            	<?php if($categoryid == '0'): ?>
            	All
            	<?php else: ?>
	            	<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
	            		<?php if($val->cat_id == $categoryid): ?>
	            		<?php echo e($val->cat_name); ?>

	            		<?php
	            		break;
	            		?>
	            	<?php endif; ?>
	            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        <?php endif; ?>
            </a></h3>
            <input type="hidden" id="active_category_id" value="info">
            	
                       
            <ul  class="pull-left bazar-list" style="height:100%;overflow: auto;" itemscope itemtype="http://data-vocabulary.org/Product">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            	<li>               	
                     <a itemprop="url" class="cat_menu" data-catid="<?php echo e($cat->cat_id); ?>" rel="category">
                               <span itemprop="name" style="color: #333; padding:0; font-size:13px;"><?php echo e($cat->cat_name); ?></span>
                     </a>
                </li>
           	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <li class="more" style="padding-left: 1.3%;;padding-right: 8%;padding-top: 6%;font-weight: 600;">
                	
                	
                     <a itemprop="url" class="more" href="<?php echo e(URL::to('Popular-product-trends',null)); ?>">
                                All Categories
                            </a>
                </li>                              
            </ul>
        </div>
					</div>
            <div class="col-sm-8 col-md-9 col-xs-12 padding-right item_sha" style="padding-bottom:5px;">
            	<input type="hidden" name="categoryid" value="<?php echo e($categoryid); ?>">
            	<input type="hidden" name="country" value="<?php echo e($countryid); ?>">
            	<input type="hidden" name="search_key" value="<?php echo e($key); ?>">
            	<input type="hidden" name="order" value="<?php echo e($order); ?>">
            	<div class="col-sm-8 col-md-12" style="padding-top:15px;padding-bottom:15px;padding-right: 0px;">

            					<div class="price-whole-sale1" style="width:18%;"><!-- <span style="width:35px;float:left;font-size:12px;padding-top:3px;">Select Country: </span> -->
            						<select name="countery" class="form-control padding_0 others_filter_select" style="height: 24px;font-size: 12px;width: 93%;">
										<option value="0">All Country</option>
										<?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($c->id); ?>" 
												<?php if($c->id == $countryid): ?>
												selected
												<?php endif; ?>
												><?php echo e($c->name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										
									</select>
            					</div>
            					<div class="price-whole-sale1" style="width:24%;"><span style="width:115px; float:left; margin-left:3px;font-size:12px;padding-top:3px;">Min. Order under: </span><input class="sale-input" style="float:left;text-align:center;" type="text" name="p-price" value="<?php echo e($order); ?>"><button class="order_submit" style="margin-left:5px;background-color: #fff;border: 1px solid #ddd;">Ok</button></div>	
            						<div class="price-whole-sale1"><button style="font-size:12px;background-color: #fff;border: 1px solid #ddd;">Online</button> <button style="font-size:12px;background-color: #fff;border: 1px solid #ddd;">Free Shipping</button>
            						</div>
            						<div style="text-align: right;margin-top: -1.2%;">
            							<a itemprop="url" href="<?php echo e(URL::to('get-quotations')); ?>" target="_blank" class="btn btn-primary btn-join" style="height:47px;border-radius:5px;font-size:18px; color:#fff!important;padding-top: 4px">Submit Buying Request</a>
            						</div>	 
           </div>
		<div id="pro_view" class="col-sm-8 col-md-12 col-xs-12 padding-right" data-spm="57">
          	<div class="col-sm-12 col-md-12 padding_0" style="border-bottom:1px solid #e6e6e6;">
	            <div class="view-label" style="padding: 8px;">
    		        Buyers like you are purchasing these hot designs
				</div>
            </div>
            <div class="col-sm-12 col-md-12 padding_0">
	            <div class="view-label" style="padding: 8px;">
    		        <div class="col-sm-4 col-md-4 padding_0">
    		        	View <strong>
    		        	<?php if(isset($quotations)): ?>
						<?php echo e($quotations->count()); ?>

						<?php else: ?>
						0
						<?php endif; ?>
						</strong> Request(s) below
    		        </div>
    		        <div class="col-sm-4 col-md-4 text-center padding_0">
    		        	Total <?php if(isset($quotations)): ?>
						<strong><?php echo e($quotations->total()); ?></strong> <?php else: ?>
						<strong>0</strong> <?php endif; ?> Result(s) found
    		        </div>
    		        <div class="col-sm-4 col-md-4 text-right padding_0" style="padding-bottom: 8px;">
    		        	Page No <?php if(isset($quotations)): ?>
						<strong><?php echo e($quotations->currentPage()); ?></strong> <?php if($quotations->lastPage() >0 ): ?>
						of <strong><?php echo e($quotations->lastPage()); ?></strong> 
						<?php endif; ?> | 
						<a href="<?php echo e($quotations->previousPageUrl()); ?>">prev</a> | 
						<a href="<?php echo e($quotations->nextPageUrl()); ?>">next</a>
						<?php else: ?>
						<strong>0</strong>
						<?php endif; ?>
    		        </div>
				</div>
            </div>
        </div>
                            <br>
                  
      <div class="col-sm-8 col-md-12 col-xs-12 padding-right" data-spm="57">

			<div class="col-sm-12 padding_0 replace_area" >
			<?php if(count($quotations) > 0): ?>
			<?php $__currentLoopData = $quotations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quotation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			<?php
			$inq_product_name = '';
			$inq_product_img = URL::to('uploads/no_image.jpg');
			?>
			<?php if($quotation->inq_products_description): ?>
			<?php
				$inq_product_name = trim($quotation->inq_products_description->name);
			?>
			<?php else: ?>
				<?php if($quotation->inquery_title): ?>
					<?php
					$inq_product_name = trim($quotation->inquery_title)
					?>
				<?php endif; ?>
				
			<?php endif; ?>
			<?php if($quotation->inq_products_images): ?>
				<?php
				$inq_product_img = URL::to(''.$quotation->inq_products_images->image)
				?>
			<?php elseif($quotation->inq_docs_one): ?>
				<?php
				$inq_product_img = URL::to('buying-request-docs',$quotation->inq_docs_one->docs)
				?>
			<?php endif; ?>
			
			<?php if($inq_product_name != ''): ?>
			<div class="col-sm-3 padding_0 product-hover" style="padding-top:10px; padding-left:10px;">
			<div style="margin:0 auto; width:98%;position:relative;" itemscope itemtype="http://schema.org/Product">
				<a itemprop="url" title="<?php echo e($inq_product_name); ?>" href="<?php echo e(URL::to('product-sourcing/view',$quotation->id)); ?>" class="slidebox-item-list" style="box-shadow: none;">

					<img title="<?php echo e($inq_product_name); ?>" alt="<?php echo e($inq_product_name); ?>" itemprop="image" style="height:182px;width:182px;margin-left:10px;margin-right:10px;" class="img-responsive" src="<?php echo e($inq_product_img); ?>" />
					
					<div class="quotation-head-cont" style="height:130px;">
					<div class="brand-year" style="padding-left:10px;padding-right:10px;padding-top: 0px;">
							<div  class="brand-year16">
							<span itemprop="name">
							<?php echo e(substr($inq_product_name, 0, 40).'...'); ?>

							</span>
					</div>
					</div>					
					<p class="brand-favorable" style="text-align:left;padding-left:10px;padding-bottom:3px;height:auto;">
						<span class="doller-quotation-price" itemprop="price">$
						<?php if($quotation->p_price): ?>
							<?php echo e($quotation->p_price->product_FOB); ?>

						<?php else: ?>
							N/A
						<?php endif; ?> </span>/ 
						<?php if($quotation->inq_unit_id): ?>
							<?php echo e($quotation->inq_unit_id->name); ?>

						<?php else: ?>
							pieces
						<?php endif; ?>
					</p>
					<p class="brand-favorable" style="text-align:left;margin-left:10px; padding-top:0px; padding-bottom:0px;height:auto;">
						MOQ: <span style="color:#333;"><?php echo e($quotation->quantity); ?> 
							
							<?php if($quotation->inq_unit_id): ?>
								<?php echo e($quotation->inq_unit_id->name); ?>

							<?php else: ?>
								pieces
							<?php endif; ?>
						</span> 
					</p>
					
				</div>
				</a>
				<div class="padding_0 get_quote_link" style="text-align:center;margin:0;padding-top: 10px;padding-bottom:10px;display:none;position:absolute;    z-index: 3;    background: #fff;width: 107%;left: -12px;box-shadow: 2px 4px 6px #aaa;"><a itemprop="url" href="<?php echo e(URL::to('product-sourcing/view',$quotation->id)); ?>" target="_blank" style="width: 80%;font-size: 14px;padding: 0;" class="btn btn-primary btn-join">Get Instant Quotes</a></div>	
			</div>
			</div>
			<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php else: ?>
			<p style="font-size:25px;color:green;margin-left: 43px;margin-top: 14px;">No Product to show...</p>
			<?php endif; ?>
			
			</div>

			<?php echo $quotations->render(); ?>


   		</div>
	</div>
</div>
<br>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
	$('input[name="key"]').val($('input[name="search_key"]').val());
	function search_data(){
		var categoryid = $('input[name="categoryid"]').val();
        var country = $('input[name="country"]').val();
        var key = $('input[name="search_key"]').val();
        var order = $('input[name="order"]').val();
        var url = window.location.origin+'/Sourcing/Requests/info/category=='+categoryid+'+..+country=='+country+'+..+key=='+key+'+..+order=='+order;
        window.location.href = url;
	}

	$(document).on({
		change:function(e){
			e.preventDefault();
			$(".replace_area").html('<div style="text-align:center;margin-top:50px;margin-bottom:50px;"><img src="<?php echo asset('assets/images/circle_preloader.gif'); ?>" alt="Loading..." /></div>');
			$('input[name="country"]').val($(this).val());
			search_data();

			/*var href = window.location.href;
            var cat_id = $('#active_category_id').val();
            var base_url = window.location.origin;
            var url = base_url+'/Sourcing/Requests_search/'+cat_id+'/'+$(this).val();
            // alert (url);
            $.get(url,{},function(result){
            	// alert (result);
            	if(result == ''){
                        $(".replace_area").html('<p style="font-size:25px;color:green;margin-left: 43px;margin-top: 14px;">No Product to show...</p>');
                    }else{
                        $(".replace_area").html(result);
                    }
            });*/
		}
	},'[name="countery"]');

	$(document).on({
		click:function(e){
			e.preventDefault();
			$(".replace_area").html('<div style="text-align:center;margin-top:50px;margin-bottom:50px;"><img src="<?php echo asset('assets/images/circle_preloader.gif'); ?>" alt="Loading..." /></div>');
			var cat_id = $(this).attr('data-catid');
			$('input[name="categoryid"]').val(cat_id);
			search_data();

			/*$('.cat_menu').parent().css('background-color','');
			$('.cat_menu').parent().css('padding-left','');
			$('.cat_menu').parent().css('border-radius','');
			$('.cat_menu').css('color','#666');
			$(this).parent().css('background-color','#1A4570');
			$(this).parent().css('padding-left','14px');
			$(this).parent().css('border-radius','11px !important');
			$(this).css('color','white');
			var cat_id = $(this).attr('catid');
			$('#active_category_id').val(cat_id);
			var country_id = $('[name="countery"]').val();
            var base_url = window.location.origin;
            var url = base_url+'/Sourcing/Requests_search/'+cat_id+'/'+country_id;
            // alert (url);
            $.get(url,{},function(result){
            	if(result == ''){
                        $(".replace_area").html('<p style="font-size:25px;color:green;margin-left: 43px;margin-top: 14px;">No Product to show...</p>');
                    }else{
                        $(".replace_area").html(result);
                    }
            });*/
		}
	},'.cat_menu');
	$('.order_submit').click(function(e){
		e.preventDefault();
		$(".replace_area").html('<div style="text-align:center;margin-top:50px;margin-bottom:50px;"><img src="<?php echo asset('assets/images/circle_preloader.gif'); ?>" alt="Loading..." /></div>');
		$('input[name="order"]').val($('input[name="p-price"]').val());
		search_data();
	});
	$('input[name="p-price"]').keyup(function(event){
	    if(event.keyCode == 13){
	        $('.order_submit').click();
	    }
	});
	$('[name="search"]').val('news');
	var cid = $('input[name="categoryid"]').val();
	$('[data-catid="'+cid+'"]').parent().css('background-color','#E8E8E8');
	$('[data-catid="'+cid+'"]').parent().css('padding-left','14px');
	$('[data-catid="'+cid+'"]').parent().css('border-radius','11px !important');
	$('[data-catid="'+cid+'"]').css('color','white !important');

	$('ul.pagination').css('margin-top','10px');
	$('ul.pagination').css('margin-right','25px');

	$(document).on({
		mouseover:function(e){
			$('.get_quote_link').hide();
			$(this).children().children('.get_quote_link').show();
		}
	},'.product-hover');
	$(document).on({
		mouseout:function(e){
			$('.get_quote_link').hide();
		}
	},'.product-hover');

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.master_dynamic', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>