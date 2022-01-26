		<?php $__env->startSection('page_css'); ?>
    <link property='stylesheet' href="<?php echo asset('css/policies-rules.css'); ?>" rel="stylesheet">
    <?php $__env->stopSection(); ?>
  <?php $__env->startSection('content'); ?>
   <div class="row">
  			<div class="col-sm-12 col-md-12 col-lg-12">
  					<ul class="top-path" itemscope itemtype="http://schema.org/BreadcrumbList">
  						<li class="top-path-li" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="<?php echo e(URL::to('/',null)); ?>" class="top-path-li-a" itemprop="url">Home <i class="fa fa-angle-right top-path-icon"></i></a></li>
  						<li class="top-path-li" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="<?php echo e(URL::to('FooterPage/pages/Rules_center',22)); ?>" class="top-path-li-a" itemprop="url">Rules Center <i class="fa fa-angle-right top-path-icon"></i></a></li>
  						
  					</ul>
  			</div>
  	
  </div>
<?php echo $__env->make('fontend.footerpage.rules_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


	      <div class="col-sm-9 padding_0" style="padding-left:6%;">
	           <!-- <div class="col-sm-12 padding_0">
	                  <div class="input-group" style="height: 40px;border-radius: 3px;border: 2px solid #1D4772;box-sizing: content-box;">
                          <input type="text" style="height: 45px;" class="form-control" placeholder="What are you looking for.." >
                          <span class="input-group-addon" id="basic-addon2"style="height:40px;background-color:#1D4772;color:#fff!important;">
                          search
                          </span>
                      </div>
	            </div> -->
	           <!--  <div class="col-sm-12 padding_0" style="padding-top: 25px;">
	            <div class="col-xs-10 col-md-10 padding_0">
					<i class="fa fa-search" style="font-size: 20px; color: #999; position: absolute;top:40%; left: 20px;">
					</i><input style="height:44px;border-radius: 5px!important; padding-left: 10%;" name="key" class="form-control" type="text" placeholder="What are you looking for. . ." required="required">
				</div>
	               <div class="col-md-2 col-sm-2 col-xs-2 padding_0">
					<input type="submit" style="background:#19446F;border-radius:0 5px 5px 0 !important; position: absolute;top: 0px;" class="btn btn-primary btn-lg pull-left" value="Search">
					</div>
	            </div> -->
	            <div class="col-sm-12 padding_0">
	                  <img style="height:20%;width:100%;padding-right:0px;padding-left:0px;margin-top:20px;margin-bottom:20px;" src="<?php echo asset('assets/helpcenter/images/secure-safe.jpg'); ?>" alt="secure safe" />
	            </div>
	            <div class="col-sm-12" style="margin-top:20px;border-bottom: 1px solid #dae2ed;padding-bottom: 20px;padding-left:0px;">
	      			<div class="col-sm-6" style="padding-bottom:20px;">
	      				<div class="col-sm-12" style="border: 1px solid #dae2ed;margin-right:30px;padding-bottom:20px;padding-left:0px;">
	      						<p style="font-size: 18px;padding: 20px 23px;margin-bottom: 0;display: inline-block;position: relative;">Rules</p>
								<ul style=" list-style-type: disc !important; line-height:25px;">
									<li class="policy-list">
										<a href="<?php echo e(URL::to('BuyerChannel/pages/trade_assurance',5)); ?>" style="color: #666;font-size:14px;">Buyer Protection Service Rules</a>
									</li>
									<li class="policy-list">
										<a href="<?php echo e(URL::to('displaying-prohibited',null)); ?>" style="color: #666;font-size:14px;">Enforcement Actions for Displaying Prohibited and Controlled Items</a>
									</li>
									<!-- <li class="policy-list">
										<a href="#" style="color: #666;font-size:14px;">Rules for Enforcement Action against Non-Compliance of Transactions on bdtdc.com</a>
									</li>
									<li class="policy-list">
										<a href="#" style="color: #666;font-size:14px;">Sourcing Transactions General Rules</a>
									</li> -->
									<li class="policy-list">
										<a href="<?php echo e(URL::to('Intellectual',null)); ?>" style="color: #666;font-size:14px;">Enforcement Actions for Intellectual Property Right Infringement Claims</a>
									</li>
								</ul>
	      					
	      				</div>
						
							
					</div>
					  <div class="col-sm-6" style="padding-bottom:12%;padding-right:0px;">
							<div class="col-sm-12 padding_0" style="border: 1px solid #dae2ed;padding-bottom:12%;padding-right:0px;">
								<p style="font-size: 18px;padding: 20px 13px;margin-bottom: 0;display: inline-block;position: relative;">Announcement</p>
								<ul style=" list-style-type: disc !important; line-height:25px;">
								<?php if($parent_cat_nam): ?>
					             <?php $__currentLoopData = $parent_cat_nam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li class="policy-list">
										<a href="<?php echo e(URL::to('faq-detail',$data->id)); ?>" style="color: #666;font-size:14px;"><?php echo e($data->name); ?></a>
									</li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					           <?php endif; ?>
									
								</ul>
								
							</div>			
					  </div>	  
				</div>
				<div class="col-sm-12 padding_0" style="padding-bottom:60px;">
					<div class="col-sm-6 padding_0">
						<p style="font-size: 18px;padding: 20px 0;margin-bottom: 0;display: inline-block;position: relative;">Learning</p>
							<ul style=" list-style-type: disc !important; line-height:25px;">
							<?php if($parent_cat_name): ?>
					             <?php $__currentLoopData = $parent_cat_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					           <li><a itemprop="url" href="<?php echo e(URL::to('faq-detail',$data->id)); ?>" style="text-decoration: none;color: #333;font-size: 14px;"><?php echo e($data->name); ?></a></li>
				         	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					    <?php endif; ?>
							
							</ul>
						<!-- <a href="#" style="color: #06c;padding-left:40px;">More</a> -->
						
					</div>
					<div class="col-sm-6 padding_0" style="padding-top:67px;">
						
					</div>
				</div>
	      
	</div>
</div>

   <?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.master_dynamic', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>