<?php
use App\Model\BdtdcProduct;
use App\Model\BdtdcSupplierInquery;
use App\Model\BdtdcJoinQuotation;
use App\Model\BdtdcInqueryMessage;
?>
<?php if(count($inquery) > 0): ?>
<?php $__currentLoopData = $inquery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inq_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php if($inq_value->is_join_quotation == 1): ?>
	<?php
	$inq_id_array = explode(',', $inq_value->product_id);
	?>
		<div class="col-sm-12 col-md-12 padding_0 head-query" style="margin-right: 0px; margin-left: 0px">

						<div class="col-sm-12 col-md-12 padding_0 head-query-top">
									<div class="col-sm-4 padding_0">

											<span style="display: block;float: left;padding: 5px 10px;">
											<span class="lf-dots">
													<i style="font-size: 15px; position: relative; top: 1.5px; color: #1f5d9d;" class="fa fa-ellipsis-v" aria-hidden="true"></i>
														<ul style="min-width: 140px;" class="lf-d-inner" >
      														<li >
      															<a class=""  href="#">Move to <i class="fa fa-angle-right pull-right"></i></a>
      															<ul class="lf-drop">
      																<li role="presentation" data-remove="0"><a class="add_to" style="" role="menuitem" tabindex="-1" href="#">Ungroup</a></li>
														      	<?php if($bdtdc_custom_folder): ?>
																	<?php $__currentLoopData = $bdtdc_custom_folder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $folder_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																		<li role="presentation" data-remove="<?php echo e($folder_name->id); ?>"><a class="add_to" style="" role="menuitem" tabindex="-1" href="#"><?php echo e($folder_name->name); ?></a></li>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																<?php endif; ?>
      															</ul>
      														</li>
      														<li><a href="#" class="all_inquery_action" targeted="flag">Set flag</a></li>
														      <li><a href="#" class="mark_action" data-target_action="mark_read">Mark as Read</a></li>
														      <li><a href="#" class="mark_action" data-target_action="mark_unread">Mark as Unread</a></li>
														      <li><a href="#" class="mark_action" data-target_action="add_contact">Add Contacts</a></li>
															<li ><a class=""  href="#">Report Spam</a></li>
					    								</ul>
												</span>
												<input type="checkbox" inquery_id_data="<?php echo e($inq_value->id); ?>" data_quotation_type="join" class="inq_select_single mail_check" name="dtata" style="margin-right: 3px">
												<input class="star <?php if($inq_value->flag == 1){echo "reverse_action_inquery";}else{echo "inquery_action";} ?>" type="checkbox" title="bookmark page" ca_inquery_id="<?php echo e($inq_value->id); ?>" ca_action="join_flag" ca_reverse_from="flag" style="margin-right: 3px" <?php if($inq_value->flag == 1){echo "checked";}?>>

								<?php
									$inq_total_count = 0
								?>
									<?php if($inq_value->views == 0): ?>
									<?php
										$inq_total_count++
									?>
									<?php endif; ?>
								
								<?php $__currentLoopData = $inq_id_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inq_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php
									$inq_mess_count = BdtdcInqueryMessage::where('inquery_id',$inq_value->id)
													->where('product_id',$inq_id)
													->where('sender','!=',Sentinel::getUser()->id)
													->where('is_view',0)
													->get();
									$inq_total_count += count($inq_mess_count);
								?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php if($inq_total_count > 0): ?>
									<i class="fa fa-envelope" title="<?php echo e($inq_total_count); ?> unread message" aria-hidden="true" style="color: #4ad44a; font-size: 17px; top: 1px; position: relative;"></i>(<?php if($inq_total_count > 0){
									echo $inq_total_count;
								} ?>)
								<?php endif; ?>
											</span>
											<div style="display: block;float: left; padding: 9px 25px;padding-right: 0px">Inquiry ID:</div>
											<div style="display: block;float: left; padding: 9px 5px;"><?php echo e($inq_value->id); ?></div>
											<div style="display: block;float: left; padding: 9px 15px;"><?php echo e(date('d/m/Y',strtotime($inq_value->created_at))); ?></div>
									</div>
									<div class="col-sm-3" style="    padding: 9px 0px;">
										<i class="icon-p manpower-pro-icon" style="margin-top: -6px;"></i>
										<?php if($inq_value->inq_sender_user): ?>
										<?php
											$full_name = $inq_value->inq_sender_user->first_name.' '.$inq_value->inq_sender_user->last_name;
										?>
										<?php else: ?>
										<?php
											$full_name = "not available"
										?>
										<?php endif; ?>
										<span title="<?php echo e($full_name); ?>" style="padding-left: 20px;margin-left: 20px; padding-top: 9px;">
										<?php echo e($full_name); ?></span>
									</div>
									<?php
										$sender_comp_name = 'Not Available';
									?>
										<?php if($inq_value->sender_company): ?>{
											<?php if($inq_value->sender_company->name_string): ?>
												<?php
													$sender_comp_name = $inq_value->sender_company->name_string->name;
												?>
											<?php endif; ?>
										<?php endif; ?>
									<div title="<?php echo e($sender_comp_name); ?>" class="col-sm-3" style="padding: 9px 0px;">
										<a style="font-weight:600;" target="_blank" href="<?php echo e(URL::to('Home/'.$sender_comp_name,$inq_value->sender_company->id)); ?>"><?php echo e($sender_comp_name); ?></a>
									</div>
									<div class="col-sm-2 padding_0" style="padding-left: 20px;">
										<div style="display:block; float: left;">
										<i style="    margin-right: 7px;float: right; margin-top: 7px;" class="ui2-flag ui2-flag-
										<?php if($inq_value->sender_company->location_of_reg_string): ?>
											<?php echo e(strtolower($inq_value->sender_company->location_of_reg_string->iso_code_2)); ?>

											<?php endif; ?> u-inline-block flag-country"></i>
										</div>
										<div style="display: inline-block;">
                                       		<img title="gold" style="width: 35px; height: 35px; " src=" <?php echo e(asset('bdtdc-product-image/home-page/Gold-membership.png')); ?>">
                                     	</div>
                                     	<div style="display: inline-block;">
                                     			<img style="margin-top: 2px; width: 35px; height: 35px;" itemprop="image"  src="<?php echo asset('assets/images/Buyer-protection-home.png'); ?>" alt="Buyer protection">
                                     	</div> 
									</div>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-12 padding_0">
									<div class="col-sm-4">
										<div style="padding: 25px 0px;">

										<?php $__currentLoopData = $inq_id_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inq_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php 
											$join_inquiry_product = BdtdcProduct::where('id',trim($inq_id))->first()
											?>
					
											<?php if($join_inquiry_product->product_name): ?>
												<a style="color: #333;font-size: 14px;font-weight: 400;margin-left: 7px;" title="<?php echo e($join_inquiry_product->product_name->name); ?>" target="_blank" href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$join_inquiry_product->product_name->name).'='.mt_rand(100000000, 999999999).$join_inquiry_product->id)); ?>"><?php echo e(substr($join_inquiry_product->product_name->name,0,35)); ?>..</a>
											<?php else: ?>
												<a style="color: #333;font-size: 14px;font-weight: 400;margin-left: 7px;" target="_blank" href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-','product name not available').'='.mt_rand(100000000, 999999999).$join_inquiry_product->id)); ?>">product name not available</a>
											<?php endif; ?>
											<br>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</div>
										
									</div>
									<div class="col-sm-3 padding_0" style="padding-top: 4.6%;">
														<!-- <div class="rat">30</div>
														<div class="rat">Sets</div>
														<div class="rat">US $</div> -->
									</div>
									<div class="col-sm-1 padding_0" style="padding-top: 4.6%;">
												<div class="aui2-grid-quo-status-col" style="color: #FF751A">
														<!-- <span style="color: #FF751A;">US $</span> -->
												</div>
									</div>
									<div class="col-sm-2 padding_0" style="padding-top: 4.6%;">
												<div class="aui2-grid-quo-status-col">
													<?php if($inq_value->views == 1): ?>
														<span>Ongoing</span>
													<?php else: ?>
														<span>New Inquiry</span>
													<?php endif; ?>
												</div>
									</div>
									<div class="col-sm-2" style="padding-top: 4.6%;">
											<div>
												<a  href="#" data-inquery_id="<?php echo e($inq_value->id); ?>" ca_quotation_type="join" data-toggle="modal" data-target="#chat_modal" class="pp-detail go_to_conversation ui2-button-primary" style="padding: 6px 7px;color: #fff !important;"> View details</a>
											</div>
									</div>
						</div>
					
					</div>
					<?php else: ?>
					<div class="col-sm-12 col-md-12 padding_0 head-query" style="margin-right: 0px; margin-left: 0px">

						<div class=" col-sm-12 col-md-12 padding_0 head-query-top">
									<div class="col-sm-4 padding_0">

											<span style="display: block;float: left;padding: 5px 10px;">
												<input type="checkbox" inquery_id_data="<?php echo e($inq_value->id); ?>" data_quotation_type="single" class="inq_select_single mail_check" name="dtata" style="margin-right: 5px">
												
												<input class="star <?php if($inq_value->flag == 1): ?>
												reverse_action_inquery
												<?php else: ?>
												inquery_action
												<?php endif; ?>
												" type="checkbox" title="bookmark page" ca_inquery_id="<?php echo e($inq_value->id); ?>" ca_action="single_flag" ca_reverse_from="flag" style="margin-right: 5px" 
												<?php if($inq_value->flag == 1): ?>
												checked
												<?php endif; ?>
												>
								<?php
									$inq_total_count = 0;
								?>
									<?php if($inq_value->views == 0): ?>
									<?php
										$inq_total_count++
									?>
									<?php endif; ?>
									<?php
									$inq_mess_count = BdtdcInqueryMessage::where('inquery_id',$inq_value->id)
													->where('product_id',$inq_value->product_id)
													->where('sender','!=',Sentinel::getUser()->id)
													->where('is_view',0)
													->get();
									$inq_total_count += count($inq_mess_count);
								
									?>
								<?php if($inq_total_count > 0): ?>
									<i class="fa fa-envelope" title="<?php echo e($inq_total_count); ?> unread message" aria-hidden="true" style="color: #4ad44a; font-size: 17px; top: 1px; position: relative;"></i>(<?php if($inq_total_count > 0): ?>
									<?php echo e($inq_total_count); ?>

								<?php endif; ?>)

								<?php endif; ?>
											</span>

											<div style="display: block;float: left; padding: 9px;padding-right: 0px">Inquiry ID:</div>
											<div style="display: block;float: left; padding: 9px 5px;"><?php echo e($inq_value->id); ?></div>
											<div style="display: block;float: left; padding: 9px;"><?php echo e(date('d/m/Y',strtotime($inq_value->created_at))); ?></div>
									</div>
									<div class="col-sm-3" style="padding: 9px 0px;">
										<i class="icon-p manpower-pro-icon" style="margin-top: -6px;"></i>
										<?php if($inq_value->inq_sender_user): ?>
											<?php
											$full_name = $inq_value->inq_sender_user->first_name.' '.$inq_value->inq_sender_user->last_name;
											?>
										<?php else: ?>
										<?php
											$full_name = "not available"
										?>
										<?php endif; ?>
										<span title="<?php echo e($full_name); ?>" style="padding-left: 20px; padding-top: 9px; margin-left: 20px;">
										<?php echo e($full_name,0,15); ?></span>
									</div>
									<?php
										$sender_comp_name = 'Not Available'
									?>
										<?php if($inq_value->sender_company): ?>
											<?php if($inq_value->sender_company->name_string): ?>
											<?php
												$sender_comp_name = $inq_value->sender_company->name_string->name
											?>
											<?php endif; ?>
										<?php endif; ?>
									<div title="<?php echo e($sender_comp_name); ?>" class="col-sm-3 padding_0" style="padding: 9px 0px;">
											<a style="font-weight:600;" target="_blank" href="<?php echo e(URL::to('Home/'.$sender_comp_name,($inq_value->sender_company?$inq_value->sender_company->id:0))); ?>"><?php echo e($sender_comp_name); ?></a>
									</div>
										<div class="col-sm-2 padding_0" style="padding-left: 20px;">
										<div title="Sender Country" style="display:block; float: left;">
										<i title="Sender From <?php echo e($inq_value->sender_company?$inq_value->sender_company->location_of_reg_string->name:''); ?>" style="    margin-right: 7px;float: right; margin-top: 7px;" class="ui2-flag ui2-flag-
											<?php if($inq_value->sender_company): ?>
												<?php if($inq_value->sender_company->location_of_reg_string): ?>
												<?php echo e(strtolower($inq_value->sender_company->location_of_reg_string->iso_code_2)); ?>

												<?php else: ?>
												<?php endif; ?>
												<?php endif; ?> u-inline-block flag-country"></i>
										</div>
										<div style="display: inline-block;">
										<a href="<?php echo e(URL::to('Gold-supplier',null)); ?>" target="_blank">
                                       		<img title="Gold Suppliers:pre-qualified suppliers" style="width: 35px; height: 35px; " src=" <?php echo e(asset('bdtdc-product-image/home-page/Gold-membership.png')); ?>"></a>
                                     	</div>
                                     	<div style="display: inline-block;">
                                     	<a href="<?php echo e(URL::to('BuyerChannel/pages/trade_assurance',5)); ?>" target="_blank">
                                     			<img title="Buyer Protection: Ensures on-time shipment and pre-shipment product quality" style="margin-top: 2px; width: 35px; height: 35px;" itemprop="image"  src="<?php echo asset('assets/images/Buyer-protection-home.png'); ?>" alt="Buyer protection"></a>
                                     	</div> 
									</div>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-12 padding_0">
									<div class="col-sm-4">
											<div style="padding: 25px 0px;">
											<?php if($inq_value->bdtdc_product): ?>
											<?php if($inq_value->bdtdc_product->product_image_new): ?>
												<img itemprop="image" title="<?php echo e($inq_value->bdtdc_product->product_name->name); ?>" class="unit-img-wrap" src="<?php echo asset($inq_value->bdtdc_product->product_image_new->image); ?>" alt="<?php echo e(substr($inq_value->bdtdc_product->product_name->name, 0, 50)); ?>">
											<?php else: ?>
												<img itemprop="image" title="Product name not available" class="unit-img-wrap" src="<?php echo asset('uploads/no-image.jpg'); ?>" alt="Product name not available">
											<?php endif; ?>
												<?php if($inq_value->bdtdc_product->product_name): ?>
													<a style="color: #333;font-size: 14px;font-weight: 400;margin-left: 7px;flex:1" title="<?php echo e($inq_value->bdtdc_product->product_name->name); ?>" target="_blank" href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$inq_value->bdtdc_product->product_name->name).'='.mt_rand(100000000, 999999999).$inq_value->product_id,null)); ?>"><?php echo e(substr($inq_value->bdtdc_product->product_name->name,0,25)); ?></a>
												<?php else: ?>
													<a style="color: #333;font-size: 14px;font-weight: 400;margin-left: 7px;flex:1" target="_blank" href="<?php echo e(URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-','product name not available').'='.mt_rand(100000000, 999999999).$inq_value->product_id,null)); ?>">product name not available</a>
												<?php endif; ?>
												<?php endif; ?>
											</div>
										
									</div>
									<div class="col-sm-3 padding_0" style="padding-top:4.2%;">
														<div class="rat" style="padding-right: 0px">
														<?php if($inq_value->quantity == 0 || $inq_value->quantity == '' || $inq_value->quantity == null): ?>
															<?php if($inq_value->p_price): ?>
																<?php echo e($inq_value->p_price->product_MOQ); ?>

															<?php else: ?>
															0
															<?php endif; ?>
														<?php else: ?>
															<?php echo e($inq_value->quantity); ?>

														<?php endif; ?>
														</div>
														<div class="rat" style="padding-right: 0px">
														<?php if($inq_value->inq_unit_id): ?>
															<?php echo e($inq_value->inq_unit_id->name); ?>

														<?php else: ?>
														<?php if($inq_value->bdtdc_product): ?>
															<?php if($inq_value->bdtdc_product->product_unit): ?>
															<?php echo e($inq_value->bdtdc_product->product_unit->name); ?>

															<?php else: ?>
															Pieces
															<?php endif; ?>
														<?php else: ?>
														Pieces
														<?php endif; ?>
														<?php endif; ?>
														</div>
														
									</div>
									<div class="col-sm-1 padding_0" style="padding-top: 4.6%;">
												<div class="aui2-grid-quo-status-col" style="color: #FF751A">
														<span style="color: #FF751A;">
														<?php if($inq_value->p_price): ?>
															<?php if(trim($inq_value->p_price->currency) == '' ): ?>
															USD
															<?php else: ?>
															<?php echo e($inq_value->p_price->currency); ?>

															<?php endif; ?>
														<?php else: ?>
														USD
														<?php endif; ?>
														</span>
												</div>
									</div>
									<div class="col-sm-2 padding_0" style="padding-top: 4.6%;">
												<div class="aui2-grid-quo-status-col">
														<?php if($inq_value->views == 1): ?>
															<span>Ongoing</span>
														<?php else: ?>
															<span>New</span>
														<?php endif; ?>
												</div>
									</div>
									<div class="col-sm-2 col-md-2 col-lg-2" style=" padding-top: 4.6%;">
											<div>
												<a  href="#" data-inquery_id="<?php echo e($inq_value->id); ?>" ca_quotation_type="single" data-toggle="modal" data-target="#chat_modal" class="pp-detail go_to_conversation ui2-button-primary" style="padding: 6px 7px;color: #fff !important;"> View details</a>
											</div>
									</div>
						</div>
					
				</div>
	<?php endif; ?>
	
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php else: ?>

<div class="col-sm-12 col-md-12 padding_0 head-query text-center" style="padding: 40px;margin-right: 0px; margin-left: 0px">
	
	No entry found!

</div>
<?php endif; ?>
