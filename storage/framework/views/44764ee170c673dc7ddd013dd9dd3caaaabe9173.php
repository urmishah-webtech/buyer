<?php $__env->startSection('page_css'); ?>
    <link property='stylesheet' href="<?php echo asset('css/dashboard.css'); ?>" rel="stylesheet">
    <link property='stylesheet' href="<?php echo asset('assets/fontend/bdtdccss/why-bdtdc.css'); ?>" rel="stylesheet">

  <?php $__env->stopSection(); ?>
<?php $__env->startSection('own_styles'); ?>
<style type="text/css">
	.buying-line2{
		padding-left: 0;
	    padding-top: 10%;
	    padding-bottom: 5%;
	}
	.add-c{
		border: 0 none; width: 110px;position: relative;
	}
	.add-p .fa{padding:0;}
	.add-p {
	    width: 110px;
	    display: block;
	    padding-left: 0;
	    text-align: center;
	    border: 1px solid #ddd;
	    border-radius: 10px !important;
	}
	span.add-details-list {
	    display: none;
	    position: absolute;
	    top: 10px;
	    border-radius: 10px !important;
	    width: 100%;
	    left: 0px;
	    z-index: 999;
	    border: 1px solid #ddd;
	    background: #fff;
	    transition: all .3s ease;
	}
	span.add-details-list ul li a{
		display: block;
		padding: 3px 0;
		padding-left: 15px; 

	}
	.add-c:hover span.add-details-list{
		display: block !important;
		top: 0 !important;
		transition: all .3s ease;
	}
	span.add-details-list ul li a:hover{
		background: #ddd;
	}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="ajax_status" style="position: fixed;left: 40%;top: 40%;" class="text-center">
    <img src="<?php echo e(URL::asset('uploads/ajax_loading.gif')); ?>" class="img-responsive" alt="" >
</div>
<div class="container">


<div class="row" style="padding-top: 1%;padding-bottom: 0.5%">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <ul style="margin-left:-2% ;float: left;">
                  <?php if(Sentinel::check()): ?>
            <?php
              $role = App\Model\Role_user::where('user_id',Sentinel::getUser()->id)->first();
              $dashboard_route = ($role->role_id ==3) ? "company/dashboard" : 'buyer/dashbord';
            ?>
        <?php endif; ?>
                    <li style="float: left"><a href="<?php echo e(URL::to($dashboard_route,null)); ?>" class="top-path-li-a">My Dashboard <i class="fa fa-angle-right top-path-icon"></i></a></li>
                    <li style="float: left"><a href="" class="top-path-li-a"><strong> My Buying Request </strong><i class="fa fa-angle-right top-path-icon"></i></a></li>
                </ul>
                 <ul style="float:right;margin-left: -2%" itemscope itemtype="http://schema.org/BreadcrumbList">
        <button class="goBack" onclick="goBack()" style="padding: 0;"><span>Go Back</span></button>
      </ul>



            </div>
    
  </div>
  <div class="row padding_0" style="background: #fff; padding-bottom: 5%;margin-bottom:25px;">
			<input type="hidden" id="selected_status" name="selected_status" value="<?php echo e($current_status); ?>">
			<input type="hidden" id="selected_view" name="selected_view" value="<?php echo e($unread); ?>">
			<input type="hidden" name="search_val" value="<?php echo e($search_str); ?>">
			<input type="hidden" name="date_val" value="<?php echo e($search_date); ?>">
			<div class="col-sm-12 col-lg-12 padding_0">
						<div class="col-xs-12 col-sm-2 col-lg-2 padding_0" style="">
							
							<?php echo $__env->make('fontend.layouts.dashboard-aside', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							
							
						</div>
						<div class="col-sm-10 col-lg-10">
						<div class="col-sm-12">
							<h2 class="" style="float: left; color: #000; padding-bottom: 2%; font-size: 2em;line-height: 1;margin-top: .75em;">My Buying Requests</h2>
							<a href="<?php echo e(URL::to('get-quotations')); ?>" target="_blank" style="float: right;font-size: 14px; font-weight: bold; color: #000; text-decoration: underline;margin-right: 20px; position: absolute;right: 0; margin-top: 1%;">Post a buying request</a>

						</div>

				<div class="col-sm-12 padding_0" style="padding-top: 15px; padding-bottom: 15px;">
							<?php
							App\Model\BdtdcSupplierQuery::where('status',0)->update(['status'=>1]);

						    $all_status = 0;
							$unread_quote = 0;
							$pending = 0;
							$approved = 0;
							$rejected = 0;
							$completed = 0;
							$closed = 0;
							?>
							<?php if(count($bdtdc_supllier_inqueries) > 0): ?> 
								<?php
								$all_status = count($bdtdc_supllier_inqueries)
								?>
								<?php $__currentLoopData = $bdtdc_supllier_inqueries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inq_all): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
									<?php if($inq_all->BdtdcInqueryMessage): ?>
										<?php if(count($inq_all->BdtdcInqueryMessage) > 0): ?>
											<?php $__currentLoopData = $inq_all->BdtdcInqueryMessage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inq_mess): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
												<?php if($inq_mess->is_view == 0): ?>
													<?php
													$unread_quote++
													?>
												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php if($inq_all->status == 0): ?>
										<?php
										App\Model\BdtdcSupplierQuery::where('id',$inq_all->id)->update(['status'=>1])
										?>
									<?php endif; ?>
									<?php if($inq_all->status == 1): ?>
										<?php
										$pending++
										?>
									<?php elseif($inq_all->status == 2): ?>
										<?php
										$approved++
										?>
									<?php elseif($inq_all->status == 3): ?>
										<?php
										$rejected++
										?>
									<?php elseif($inq_all->status == 4): ?>
										<?php
										$completed++
										?>
									<?php elseif($inq_all->status == 5): ?>
										<?php
										$closed++
										?>
									<?php endif; ?>
							<?php endif; ?>
							
							<div class="col-sm-8 padding_0">

							     <input name="search_all_inq" class="search_all_inq" type="text" placeholder="Search" value="<?php echo e($search_str); ?>"><span class="all_inq_search_btn" style=""><i class="fa fa-search" aria-hidden="true" style="color: #728398;padding: 3px;"></i></span>
								<select id="rfq-manage-select" class="buyer-rq-select">
							          <option value="0" selected="&quot;selected&quot;">All Status <?php echo e($all_status>0?'('.$all_status.')':''); ?></option>
							          <option value="1">Pending <?php echo e($pending>0?'('.$pending.')':''); ?></option>
							          <option value="2">Approved <?php echo e($approved>0?'('.$approved.')':''); ?></option>
							          <option value="3">Rejected <?php echo e($rejected>0?'('.$rejected.')':''); ?></option>
							          <option value="4">Completed <?php echo e($completed>0?'('.$completed.')':''); ?></option>
							          <option value="5">Closed <?php echo e($closed>0?'('.$closed.')':''); ?></option>
	        					</select>

	        					<div style="display:inline-block;margin-left: 1%;" class="dropdown">
								    <button class="btn btn-default btn-md dropdown-toggle" style="border-radius: 3px !important;height:30px;font-size: 13px;" type="button" id="menu3" data-toggle="dropdown">Date
								    <span class="caret"></span></button>
								    <ul style="min-width: 140px;" class="dropdown-menu" role="menu" aria-labelledby="menu3">
								      <li role="presentation"><a class="all_inq_date" data-date_target="0" style="padding:2px 14px;" role="menuitem" tabindex="-1" href="#">All</a></li>
								      <li role="presentation"><a class="all_inq_date" data-date_target="3" style="padding:2px 14px;" role="menuitem" tabindex="-1" href="#">3 days ago</a></li>
								      <li role="presentation"><a class="all_inq_date" data-date_target="7" style="padding:2px 14px;" role="menuitem" tabindex="-1" href="#">7 days ago</a></li>
								      <li role="presentation"><a class="all_inq_date" data-date_target="30" style="padding:2px 14px;" role="menuitem" tabindex="-1" href="#">30 days ago</a></li>
								    </ul>
								</div>
								<label class="" style="margin-left: 1%;"><input type="checkbox" id="show-unread-btn" <?php if($unread == 'true'){echo 'checked';}else{echo '';} ?>> Unread quotes <?php echo e($unread_quote>0?'('.$unread_quote.')':''); ?></label>
							</div>
							<div class="col-sm-4 padding_0">
								<?php if(isset($bdtdc_supllier_inqueries)): ?>
								<div class="ui-pagination ui-pagination-pager util-clearfix rfq-manage-list-pagination" style="    float: right;">
									            
									              <a title="previous" href="<?php echo e($bdtdc_supllier_inqueries->previousPageUrl()); ?>"><span class="ui-pagination-prev ui-pagination-disabled" style=" background-position: -44px 3px;cursor:pointer;">previous</span></a>
									            
									            
									              <a title="next" href="<?php echo e($bdtdc_supllier_inqueries->nextPageUrl()); ?>"><span class="ui-pagination-next ui-pagination-disabled" style=" background-position:-27px 3px;cursor:pointer;">next</span></a>
									            
									            <label class="ui-label">
									            	<?php if($bdtdc_supllier_inqueries->lastPage() > 0): ?>
									                <?php echo e($bdtdc_supllier_inqueries->currentPage()); ?>

									                <?php else: ?>
														<?php echo e($bdtdc_supllier_inqueries->lastPage()); ?>

									                <?php endif; ?>
									                 of <?php echo e($bdtdc_supllier_inqueries->lastPage()); ?> Page
									            </label>
								</div>
								<?php endif; ?>
								
							</div>
					</div>
					<?php
					// echo "<pre>";
			  //       print_r($quotations[0]);
			  //       echo "</pre>";
			        ?>
			        <?php if($bdtdc_supllier_inqueries): ?>
			        <?php if(count($bdtdc_supllier_inqueries) > 0): ?>
			        <?php $__currentLoopData = $bdtdc_supllier_inqueries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inquery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-sm-12" style="border:1px solid #999; margin-bottom: 12px;">
						<?php
							$product_name_title = 'No title found';
							$product_image_url = 'uploads/no_image.jpg';
						?>
							<?php if($inquery->queryproduct): ?>
							<?php
								$product_name_title = $inquery->queryproduct->name;
							?>
							<?php elseif($inquery->inquery_title): ?>
							<?php
								$product_name_title = $inquery->inquery_title;
							?>
							<?php endif; ?>
							<?php if($inquery->BdtdcSupplierQueryProductImages): ?>
								<?php if($inquery->bdtdcProductToCategory): ?>
								<?php
									$product_image_url = $inquery->BdtdcSupplierQueryProductImages->image;
								?>
								<?php endif; ?>
							<?php elseif($inquery->BdtdcSupplierQueryProductImage): ?>
							<?php
								$product_image_url = 'uploads/'.$inquery->BdtdcSupplierQueryProductImage->image;
							?>
							<?php elseif($inquery->BdtdcSupplierQueryProductDocs): ?>
							<?php
								$product_image_url = 'buying-request-docs/'.$inquery->BdtdcSupplierQueryProductDocs->docs;
							?>
							<?php endif; ?>
							<div class="col-sm-12 head-query-top">
								<div class="col-sm-8">
									<a href="<?php echo e(URL::to('mysource/inq',$inquery->id)); ?>"  class="rfq-detail-title" title="<?php echo e($product_name_title); ?>" target="_blank">
									<?php echo e($product_name_title, 0, 60); ?>

									</a>
								</div>
								<div class="col-sm-4 padding_0">
											<div class="detail-advanced">
														<div class="brq-pp-img">
													
														<img title="<?php echo e($product_name_title); ?>" style="width: 38px; height: 38px; border:1px solid #999;" src="<?php echo e(URL::to($product_image_url)); ?>" alt="<?php echo e($product_name_title); ?>">
													
																<ul class="brq-ti-aside">
																	<li class="ul-time-li">Last Updated: <?php echo e(date('Y-m-d', strtotime($inquery->updated_at))); ?></li>
																	<li class="ul-time-li">Expired Time: <?php echo e(date('Y-m-d', strtotime($inquery->updated_at . ' +15 day'))); ?></li>
															
														</ul>
														</div>
														
											</div>
									
								</div>
							</div>
							<div class="col-sm-12">
								<div class="col-sm-6">
									<span><i class="fa fa-circle" aria-hidden="true" style="color: #a0a0a0; position: absolute; top: -6px; left: -15px;"></i></span>
									<div style="border:1px solid #a0a0a0;"></div>
								</div>
								<div class="col-sm-6">
								<?php
										$total_quote = 0;
										$total_unread_quote = 0;
								?>
										<?php if($inquery->BdtdcInqueryMessage): ?>
											<?php if(count($inquery->BdtdcInqueryMessage) > 0): ?>
												<?php $__currentLoopData = $inquery->BdtdcInqueryMessage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inq_messa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
													<?php
													$total_quote++
													?>
													<?php if($inq_messa->is_view == 0): ?>
														<?php
														$total_unread_quote++
														?>
													<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										<?php endif; ?>
										
									<span><i class="fa fa-circle" aria-hidden="true" style="color:
									<?php if($total_unread_quote > 0): ?>
									green
									<?php else: ?>
									#ff751a
									<?php endif; ?>; position: absolute; top: -6px; left: -7px;"></i></span>
										<div style="border:1px dotted #a0a0a0;"></div>
										<span><i class="fa fa-circle" aria-hidden="true" style="color: #ff751a; position: absolute; top: -6px; right: -15px;"></i></span>
								</div>
							
								<div class="col-sm-4">
											
											<div class="buying-line2">
													<p style="font-size: 16px">Buying Request</p>
													<p>Status: <span>
														<?php if($inquery->status == 1): ?>
															Pending
														<?php elseif($inquery->status == 2): ?>
														Approved
														<?php elseif($inquery->status == 3): ?>
														Rejected
														<?php elseif($inquery->status == 4): ?>
														Completed
														<?php elseif($inquery->status == 5): ?>
														<?php endif; ?>
												</span></p>
													<div class="add-c" style="">
														<a href="#"  class="add-p">Add Details <i class="fa fa-angle-down"></i></a> 
														<span class="add-details-list" >
															<ul style="padding: 0; padding-left: 0; padding-top: 5px; margin-bottom: 5px; line-height: 15px;">
																<li><a href="<?php echo e(URL::to('mysource/inq',$inquery->id)); ?>" class="" data-inqID="<?php echo e($inquery->id); ?>">View Details</a></li>
																<li><a href="#" class="post_again" data-inqID="<?php echo e($inquery->id); ?>">Post Again</a></li>
																<li><a href="#" class="query_close" data-inqID="<?php echo e($inquery->id); ?>">Close</a></li>
															</ul>
														</span>
													</div>
											</div>
									
								</div>
								<div class="col-sm-4 text-center">
										
										
										<div class="buying-line" style="padding-left: 0; display: inline-block;">
													<p  class='text-center' style="font-size: 16px" >Quotations </p>
													<ul style="padding: 0; line-height: 25px;">
														<li class='text-center'><a href="<?php echo e(URL::to('mysource_quotations/inq',$inquery->id)); ?>" target="_blank">
															<?php if($total_unread_quote > 0): ?>
																Quotations <span style="position: relative; background: green; color: white; padding: 0px 5px; border-radius: 4px !important; font-size: 10px;"><?php echo e($total_unread_quote); ?> New</span>
															<?php else: ?>
																<?php if($total_quote > 0): ?>
																	Quotations <span style="position: relative; background: #0087cf; color: white; padding: 1px 5px; border-radius: 10px !important; font-size: 10px;"><?php echo e($total_quote); ?></span>
																<?php else: ?>
																Quotations
																<?php endif; ?>
															<?php endif; ?>
														</a>
													</li>
													    
													</ul>
													
													
										</div>
										
									
								</div>
								<div class="col-sm-4" style="position: relative;">
									<div style=";position: absolute; top: 30px; right: 0; font-size: 16px;">
											<a href="<?php echo e(URL::to('mysource_quotations/inq',$inquery->id)); ?>" class="pp-detail go_to_conversation ui2-button-primary" style="padding: 6px 7px;color: #fff !important;"> Details</a>
										</div>
								</div>
							</div>

					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
					<p style="border: 1px solid #ddd; padding: 30px 0; overflow: hidden;" class="text-center ">No entry found</p>
					<?php endif; ?>
					<?php else: ?>
					<p style="border: 1px solid #ddd; padding: 30px 0; overflow: hidden;" class="text-center ">No entry found</p>
					<?php endif; ?>
					<div class="col-sm-12">
								<?php if(isset($bdtdc_supllier_inqueries)): ?>
								<div class="ui-pagination ui-pagination-pager util-clearfix rfq-manage-list-pagination">
									            
									              <a title="previous" href="<?php echo e($bdtdc_supllier_inqueries->previousPageUrl()); ?>"><span class="ui-pagination-prev ui-pagination-disabled" style=" background-position: -44px 3px;cursor:pointer;">previous</span></a>
									            
									            
									              <a title="next" href="<?php echo e($bdtdc_supllier_inqueries->nextPageUrl()); ?>"><span class="ui-pagination-next ui-pagination-disabled" style=" background-position:-27px 3px;cursor:pointer;">next</span></a>
									            
									            <label class="ui-label">
									                <?php if($bdtdc_supllier_inqueries->lastPage() > 0): ?>
									                <?php echo e($bdtdc_supllier_inqueries->currentPage()); ?>

									                <?php else: ?>
														<?php echo e($bdtdc_supllier_inqueries->lastPage()); ?>

									                <?php endif; ?>
									                 of <?php echo e($bdtdc_supllier_inqueries->lastPage()); ?> Page
									            </label>
								</div>
								<?php endif; ?>
						
					</div>	
				<div class="col-sm-12">
				<?php if(isset($quotations)): ?>
					<?php $__currentLoopData = $quotations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quotation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
					<div class="col-sm-3 padding_0">
							<div class="product-box" style="width: 100%;">
			                       <div class="cat-product-img-box">
			                            <a title="
			                            <?php if($quotation->BdtdcSupplierQueryProduct): ?>
			                            	<?php if($quotation->BdtdcSupplierQueryProduct->product_name): ?>
			                            	<?php echo e($quotation->BdtdcSupplierQueryProduct->product_name->name); ?>

			                            	<?php else: ?>
			                            	Product name not available
			                            	<?php endif; ?>
			                            <?php else: ?>
			                            Product name not available
			                            <?php endif; ?>
			                            " target="_blank" href="
			                            <?php if($quotation->BdtdcSupplierQueryProduct): ?>
			                            <?php if($quotation->BdtdcSupplierQueryProduct->product_name): ?>
			                             <?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\. -]/', ' ', $quotation->BdtdcSupplierQueryProduct->product_name->name).'='.mt_rand(100000000, 999999999).$quotation->product_id)); ?>

			                             <?php else: ?>
			                             <?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\. -]/', ' ', 'no product name').'='.mt_rand(100000000, 999999999).$quotation->product_id)); ?>

			                             <?php endif; ?>
			                             <?php else: ?>
			                             <?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\. -]/', ' ', 'no product name').'='.mt_rand(100000000, 999999999).$quotation->product_id)); ?>

			                             <?php endif; ?>">
			                            <?php if($quotation->BdtdcSupplierQueryProduct): ?>
			                              <?php if(trim($quotation->BdtdcSupplierQueryProduct->product_image_new['image']) == ''): ?>
			                                <img style="height: 225px;max-height: 220px;" class="product-fassion-img" src="<?php echo e(URL::asset('uploads/'.$quotation->BdtdcSupplierQueryProduct->product_image['image'])); ?>" alt="<?php echo $quotation->BdtdcSupplierQueryProduct->product_name->name; ?>">
		                                  <?php elseif(trim($quotation->BdtdcSupplierQueryProduct->product_image_new['image']) != ''): ?>
		                                    <img style="height: 225px;max-height: 220px;" class="product-fassion-img" src="<?php echo e(URL::asset('bdtdc-product-image/'.trim($quotation->BdtdcSupplierQueryProduct->bdtdcProductToCategory->pro_parent_cat['name']).'/'.trim($quotation->BdtdcSupplierQueryProduct->bdtdcProductToCategory->bdtdcCategory['name']).'/'.$quotation->BdtdcSupplierQueryProduct->product_image_new['image'])); ?>" alt="<?php echo $quotation->BdtdcSupplierQueryProduct->product_name->name; ?>">
		                                   <?php else: ?>
		                                     <img style="height: 225px;max-height: 220px;" class="product-fassion-img" src="<?php echo e(URL::asset('uploads/no-image.jpg')); ?>" alt="<?php echo $quotation->BdtdcSupplierQueryProduct->product_name->name; ?>">
		                                  <?php endif; ?>
		                                <?php else: ?>
		                                	<img style="height: 225px;max-height: 220px;" class="product-fassion-img" src="<?php echo e(URL::asset('uploads/no-image.jpg')); ?>" alt="no product name">
		                                <?php endif; ?>
			                            </a>
			                       </div>
			                       <?php if($quotation->BdtdcSupplierQueryProduct): ?>
			                       <a target="_blank" href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\. -]/', ' ', $quotation->BdtdcSupplierQueryProduct->product_name->name).'='.mt_rand(100000000, 999999999).$quotation->product_id)); ?>">
			                             <div class="cat-item-title"><?php echo $quotation->BdtdcSupplierQueryProduct->product_name->name; ?></div>

			                       </a>
			                       <?php else: ?>
			                       <a target="_blank" href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\. -]/', ' ', 'no product name').'='.mt_rand(100000000, 999999999).$quotation->product_id)); ?>">
			                             <div class="cat-item-title">no product name</div>

			                       </a>
			                       <?php endif; ?>
			                       
			                       <?php if($quotation->BdtdcSupplierQueryProduct): ?>
			                       <div class="dollar-price"><span class="dollar">
			                       <?php if(trim($quotation->BdtdcSupplierQueryProduct->product_prices['currency']) == ''): ?>
			                       US
			                       <?php else: ?>
			                       <?php echo $quotation->BdtdcSupplierQueryProduct->product_prices['currency']; ?>

			                       <?php endif; ?>
			                        <?php echo $quotation->BdtdcSupplierQueryProduct->product_prices['product_FOB']; ?></span> / <?php echo $quotation->BdtdcSupplierQueryProduct->product_prices['product_MOQ']; ?> <?php echo $quotation->BdtdcSupplierQueryProduct->ProductUnit['name']; ?></div>
			                        <?php else: ?>
			                        <div class="dollar-price"><span class="dollar">
			                       
			                       US
			                       
			                        no FOB</span> / No MOQ no unit</div>
			                        <?php endif; ?>
			                       <div class="item-views"><span class="online-view">1000+ </span>views 
			                        
			                       </div>
			                      
			                       <div style="padding-left: 10px;padding-bottom: 1%" class="product-view-extend">
			                            <a style="padding: 0px 10px;" data-product_id="<?php echo $quotation->product_id; ?>" data-supplier_id="<?php echo $quotation->product_owner_id; ?>" class="btn btn-primary btn-join contact_supplier"><i class="fa fa-envelope-o"></i> Contact Supplier</a>
			                       </div>                      
			                </div>
						
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
					
				</div>
					
			</div>
			

				
		</div>  	
  </div>
 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('fontend.layouts.dashboard_aside_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript">
$(document).ready(function(){

		$('#ajax_status').hide();

		function change_action(){
			var selected_status = $('#selected_status').val();
			var selected_view = $('#selected_view').val();
			var search_val = $('[name="search_val"]').val();
			var date_val = $('[name="date_val"]').val();
			var base_url = "<?php echo e(URL::to('Mybuying-Request')); ?>";
			var redirect_url = base_url+'?status='+selected_status+'&unread='+selected_view+'&search='+search_val+'&d='+date_val;
			window.location.href = redirect_url;
		}

		function ajax_success_message(str){
			$('#ajax_status').html(str);
			$('#ajax_status').show();
		    /*$('#ajax_status').show().html(str).fadeOut(1500,function(){
		        $('#ajax_status').addClass('hide_this_loading');
		        $('#ajax_status').html('<img src="'+window.location.origin+'/uploads/ajax_loading.gif" class="img-responsive" alt="" >');
		    });*/
		}

		
		$(document).on({
			mouseover:function(){
				$(this).css('display','block');
			}
		},'.add-details-list');
		$(document).on({
			mouseleave:function(){
				$('span.add-details-list').css('display','none');
			}
		},'.add-details-list');

		$(document).on({
            click: function(e) {
                e.preventDefault();
                var base_url = window.location.origin;
                var supplier_id = $(this).data('supplier_id');
                var product_id = $(this).data('product_id');
                var url = base_url + "/byer/contact_supplier/" + supplier_id + "/" + product_id;
                window.location.href = url;
            }
        }, '.contact_supplier');

        $('#show-unread-btn').click(function(){
        	if ($('#show-unread-btn').is(':checked')) {
				$('#selected_view').val('true');
			}else{
				$('#selected_view').val('false');
			}
			change_action();
        });

        $('#rfq-manage-select').change(function(){
        	var selected_status = $(this).val();
        	$('#selected_status').val(selected_status);
        	change_action();
        });

        $(document).on({click:function(e){
			e.preventDefault();
			var search_text =  $('[name="search_all_inq"]').val();
			$('[name="search_val"]').val(search_text);
			change_action();
		}},'.all_inq_search_btn');

		$(document).on({keypress:function(e){
			var key = e.which;
			 if(key == 13)  // the enter key code
			  {
			  	$('.all_inq_search_btn').click();
			    return false;  
			  }
		}}, '[name="search_all_inq"]');

		$(document).on({click:function(e){
			e.preventDefault();
			$('[name="date_val"]').val($(this).attr('data-date_target'));
			change_action();
		}},'.all_inq_date');

        $(document).on({click:function(e){
        	e.preventDefault();
        	var inqID = $(this).attr('data-inqID');
        	var post_url = '<?php echo e(URL::to("all-action/post_again")); ?>';
        	$.post(post_url,{
        		'_token':'<?php echo e(csrf_token()); ?>',
        		'inqID': inqID,
        	},function(result){
        		if(parseInt(result) == 1){
        			ajax_success_message("<p style='font-size:20px;color:#ffffff;margin-top:5px;'><b>Action Performed!!!</b></p>");
        			var url = window.location.href;
        			window.location.href = url;
        		}else{
        			alert ("error");
        		}
        	});
        }},'.post_again');

        $(document).on({click:function(e){
        	e.preventDefault();
        	var inqID = $(this).attr('data-inqID');
        	var post_url = '<?php echo e(URL::to("all-action/query_close")); ?>';
        	$.post(post_url,{
        		'_token':'<?php echo e(csrf_token()); ?>',
        		'inqID': inqID,
        	},function(result){
        		if(parseInt(result) == 1){
        			ajax_success_message("<p style='font-size:20px;color:#ffffff;margin-top:5px;'><b>Action Performed!!!</b></p>");
        			var url = window.location.href;
        			window.location.href = url;
        		}else{
        			alert ("error");
        		}
        	});
        }},'.query_close');

        $('#rfq-manage-select').val('<?php echo e($current_status); ?>');
});
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('fontend.master-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>