	<?php $__env->startSection('content'); ?>
<?php //echo "<pre>"; print_r($trade_show_menu); echo "</pre>";?>


<div class="row" style="padding-top: 10px">
    <div class="col-md-10 padding_0" style="padding-bottom: 1%">
      <ul style="margin-left: -2%" itemscope itemtype="http://schema.org/BreadcrumbList"><li style="float: left" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"   href="<?php echo e(URL::to('/')); ?>" ><span itemprop="name" style="color: #000"> Home &nbsp;</span></a></li>
      <li style="float: left" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"  href="<?php echo e(URL::to('tradeshow',null)); ?>" style="color: #000"> <i class="fa fa-angle-right"></i><span itemprop="name" style="color: #000" >Tradeshows </span><i class="fa fa-angle-right"></i></a></li>
      <li style="float: left" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"  href="" style="color: #000"> <span itemprop="name" style="color: #000" >Tradeshow Details</span><i class="fa fa-angle-right"></i></a></li>

      </ul>
    </div>
  
  </div>


		<div class="row padding_0" style="background-color: #fff; margin-bottom: 25px;">

				<div class="col-sm-3 padding_0">
					<div class="col-sm-12" style="padding-left: 0">
							<div style="width: 100%; background-color: #4F74B3;font-size: 14px;height: 150px;overflow: hidden;">
								<!-- <span class="circle-img">Global Expo</span> -->
								<!-- <span class="circle-follow">Follow</span> -->
								<img  itemprop="image" class="" style="width: 100%; height: 100%" src="<?php echo asset('assets/fontend/bdtdc-images/trade-circle.jpg'); ?>" alt="trade answer">
							</div>
					</div>
					<div class="col-sm-12" style="padding-left: 0">

							<div style="background:#404040;">
								<ul class="bd-trad-list">

										<?php $__currentLoopData = $trade_show_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li class="bd-trad-list-li" style="height: auto"><a  itemprop="url" href="<?php echo e(URL::to('tradeshow/info-details',$trade_title->tradeshow_id)); ?>" style="width: 100%;">
												<span class="dta-span" style="padding-top: 20px; display: block;"><?php echo e($trade_title->date); ?></span>
												<span class="title-span" style="width: 100%; border-bottom: 1px dotted #ddd;"><?php echo e($trade_title->title); ?></span>
												
										       </a>
										</li>

										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

										
									
								</ul>
							</div>
					</div>
				</div>
				
				<div class="col-sm-9 ">
						<div class="col-sm-12 padding_0">
						
							<h3 class="trade-h3"><?php echo e($trade_show[0]->title); ?></h3>
						    <span class="global-time"><?php echo e($trade_show[0]->created_at.$trade_show[0]->venue); ?></span>
						</div>
						
						<div class="co--sm-12  padding_0">
								<p class="trade-p">
									<?php echo e($trade_show[0]->description); ?>

								</p>
								<!-- <span><a href="" class="ex-pro">Exhibitors and Products >></a></span> -->
						</div>
						
							  <img itemprop="image" class="bg-img-td"   src="<?php echo e(URL::to('uploads',$trade_show[0]->images)); ?>" alt="trade show events">

						
					
				</div>
		</div>
		<?php //echo "<pre>"; print_r($trade_show); echo "</pre>";?>
		<?php //echo "<pre>"; print_r($trade_show_menu); echo "</pre>";?>
 <?php $__env->stopSection(); ?>	
<?php echo $__env->make('fontend.master_dynamic', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>