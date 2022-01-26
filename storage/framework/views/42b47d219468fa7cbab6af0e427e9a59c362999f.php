<?php $__env->startSection('content'); ?>

<div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12" style=" padding-bottom: 8px;">
                    <ul class="top-path" style="padding-bottom: 8px;" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        <li class="top-path-li" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo e(URL::to('/',null)); ?>" class="top-path-li-a"><span itemprop="name">Home</span> <i class="fa fa-angle-right top-path-icon"></i></a></li>
                        <li class="top-path-li" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo e(URL::to('ServiceChannel/pages/for_buyer',35)); ?>" class="top-path-li-a"><span itemprop="name">Help Center</span><i class="fa fa-angle-right top-path-icon"></i></a></li>
                        <li class="top-path-li" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo e(URL::to('SupplierChannel/pages/learning_center',33)); ?>" class="top-path-li-a"><span itemprop="name">Learning Center</span><i class="fa fa-angle-right top-path-icon"></i></a></li>
                        <li class="top-path-li" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" href="" class="top-path-li-a"><span itemprop="name">Country Search</span></a></li>
                    </ul>
            </div>
    
  </div>


<div class="row padding_0" style="background:#ffffff; border-bottom:1px solid rgba(0,0,0,.1)">
	
	<div class="col-sm-12" id="country_region">
		<p id="c1">Welcome to <a itemprop="url" href="#" style="color:#666;">BuyerSeller.Asia</a>'s Country Channel</p>
		<p style="color:#000066;padding-left:18px;font-size:46px;font-weight:bold;">Trade with Suppliers Worldwide</p>
	</div>
	<div class="col-sm-12" style="margin-top:20px;margin-bottom:20px;">
		  <ul class="nav nav-tabs" itemscope itemtype="http://schema.org/SiteNavigationElement">
		    <li class="active"><a data-toggle="tab" href="#home" itemprop="url" style="">All regions</a></li>
		    <?php $menu_number = 1; ?>
		    <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    <li><a data-toggle="tab" itemprop="url" href="#menu<?php echo e($menu_number); ?>"><?php echo e($data->name); ?></a></li>
		    <?php $menu_number++; ?>
		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  </ul>

		  <div class="tab-content">
		    <div id="home" class="tab-pane fade in active">
		    <?php if($country): ?>
			<?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    <div class="col-sm-12" style="margin-top:6%;">
	    		<div class="col-sm-3" style="padding-top:3%;">
	    			<img itemprop="image" style="height:175px;width:201px;" src="<?php echo asset('assets/buyer-security/Asia.jpg'); ?>" alt="" />
	    		</div>
	    		
	    		<div class="col-sm-9">
	    		
	    		 <p id="c2"><?php echo e($data->name); ?></p>
			      <!-- <?php $__currentLoopData = $data->country_region; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			      <p><?php echo e($c->name); ?></p>
			      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
			      <?php 
			      $country_region_array = $data->country_region;
			      
					$j=1;
					for ($i=0; $i < count($country_region_array); $i++) 
					{
						$div_var = $i%2;
						if($div_var == 0){
							echo '<div class="col-sm-12" style="margin-top:6%;">';
					}
					?>

					<div class="col-sm-6" style="margin-left:-30px;">
					<?php if($country_region_array[$i]->name): ?>
						<?php if($section=="Find-Suppliers"): ?>
					<a itemprop="url" href="<?php echo e(URL::to('selected-suppliers/'.$country_region_array[$i]->name,$country_region_array[$i]->id)); ?>">
						<?php elseif($section=="source"): ?>
						<a itemprop="url" href="<?php echo e(URL::to('selected-suppliers/'.$country_region_array[$i]->name,$country_region_array[$i]->id)); ?>">

						<?php endif; ?>
		      			<div class="col-sm-12">
		      				<div class="col-sm-2">
		      					<a itemprop="url" href="<?php echo e(URL::to('selected-suppliers/'.$country_region_array[$i]->name,$country_region_array[$i]->id)); ?>">
		      					  <img itemprop="image" style="height:29px;width:46px;" src="<?php echo e(asset('assets/global/img/flags/'.strtolower ($country_region_array[$i]->iso_code_2).'.png')); ?>"  alt="<?php echo e($country_region_array[$i]->name); ?>" />
		      					</a>
		      				</div>
		      				<div class="col-sm-10">
		      					<?php echo $country_region_array[$i]->name; ?>
		      					<ul style="font-size: 11px; padding:0;">
		      					    <li style="float:left;"><a itemprop="url" href="#" style="color: #999;">Industry Hubs :</a> </li>
		      						<li style="float:left;"><a itemprop="url" href="#">Saree ,</a></li> 
		      						<li style="float:left;"><a itemprop="url" href="#">Neckware</a></li>
		      						<li style="float:left;"><a itemprop="url" href="#">Textiles</a></li>
		      					</ul>
		      				</div>
		      			</div> 
		      		<?php endif; ?>
		      		
		      		</div>

		      		<?php
					// echo $country_region_array[$i]->name."<br>";
					$div_var = $j%2;
					if($div_var == 0 || $i == count($country_region_array)-1){
						echo "</div>";
					}
					$j++;
					}
			       ?>
					      	      	
			    		</div>
			    	</div>
			    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    	<?php endif; ?>
			    	
		    </div>
		    <div id="menu1" class="tab-pane fade in">
		    	<?php if($country): ?>
		    	<?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    	<?php if($data->name == 'Asia'): ?>

		    		<div class="col-sm-12" style="margin-top:6%;">
	    		<div class="col-sm-3" style="padding-top:3%;">
	    			<img itemprop="image" style="height:175px;width:201px;" src="<?php echo asset('assets/buyer-security/Asia.jpg'); ?>" alt="Asia" />
	    		</div>
	    		
	    		<div class="col-sm-9">
	    		
	    		 <p id="c2"><?php echo e($data->name); ?></p>
			      <!-- <?php $__currentLoopData = $data->country_region; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			      <p><?php echo e($c->name); ?></p>
			      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
			      <?php 
			      $country_region_array = $data->country_region;
			      
					$j=1;
					for ($i=0; $i < count($country_region_array); $i++) 
					{
						$div_var = $i%2;
						if($div_var == 0){
							echo '<div class="col-sm-12" style="margin-top:6%;">';
					}
					?>

					<div class="col-sm-6" style="margin-left:-30px;">
					<?php if($country_region_array[$i]->name): ?>
					
		      			<div class="col-sm-12">
		      				<div class="col-sm-2">
		      				<a itemprop="url" href="<?php echo e(URL::to('selected-suppliers/'.$country_region_array[$i]->name,$country_region_array[$i]->id)); ?>">
		      				<img itemprop="image" style="height:29px;width:46px;" src="<?php echo asset('assets/global/img/flags/'.strtolower ($country_region_array[$i]->iso_code_2).'.png'); ?>" alt="" />
		      					</a>
		      				</div>
		      				<div class="col-sm-10">
		      					<?php echo $country_region_array[$i]->name; ?>
		      					<ul style="font-size: 11px; padding:0;">
		      					    <li style="float:left;"><a itemprop="url" href="#" style="color: #999;">Industry Hubs :</a> </li>
		      						<li style="float:left;"><a itemprop="url" href="#">Saree ,</a></li> 
		      						<li style="float:left;"><a itemprop="url" href="#">Neckware</a></li>
		      						<li style="float:left;"><a itemprop="url" href="#">Textiles</a></li>
		      					</ul>
		      				</div>
		      			</div> 
		      		
		      		<?php endif; ?>
		      		</div>

		      		<?php
					// echo $country_region_array[$i]->name."<br>";
					$div_var = $j%2;
					if($div_var == 0 || $i == count($country_region_array)-1){
						echo "</div>";
					}
					$j++;
					}
			       ?>
					      	      	
			    		</div>
		    	</div>



		    	<?php endif; ?>
		    
	    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    	<?php endif; ?>
		    </div>
		    <div id="menu2" class="tab-pane fade in">
		    	
		    	<?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    	<?php if($data->name == 'Americas'): ?>

		    		<div class="col-sm-12" style="margin-top:6%;">
	    		<div class="col-sm-3" style="padding-top:3%;">
	    			<img itemprop="image" style="height:175px;width:201px;" src="<?php echo asset('assets/buyer-security/Americas.png'); ?>" alt="" />
	    		</div>
	    		
	    		<div class="col-sm-9">
	    		
	    		 <p id="c2"><?php echo e($data->name); ?></p>
			      <!-- <?php $__currentLoopData = $data->country_region; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			      <p><?php echo e($c->name); ?></p>
			      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
			      <?php 
			      $country_region_array = $data->country_region;
			      
					$j=1;
					for ($i=0; $i < count($country_region_array); $i++) 
					{
						$div_var = $i%2;
						if($div_var == 0){
							echo '<div class="col-sm-12" style="margin-top:6%;">';
					}
					?>

					<div class="col-sm-6" style="margin-left:-30px;">
					
		      			<div class="col-sm-12">
		      				<div class="col-sm-2">
		      					<a itemprop="url" href="<?php echo e(URL::to('selected-suppliers/'.$country_region_array[$i]->name,$country_region_array[$i]->id)); ?>">
		      					<img itemprop="image" style="height:29px;width:46px;" src="<?php echo asset('assets/global/img/flags/'.strtolower ($country_region_array[$i]->iso_code_2).'.png'); ?>" alt="" />
		      					</a>
		      				</div>
		      				<div class="col-sm-10">
		      					<?php if($country_region_array[$i]->name): ?>
		      						<?php echo $country_region_array[$i]->name; ?>
		      					<?php endif; ?>
		      					<ul style="font-size: 11px; padding:0;">
		      					    <li style="float:left;"><a itemprop="url" href="#" style="color: #999;">Industry Hubs :</a> </li>
		      						<li style="float:left;"><a itemprop="url" href="#">Saree ,</a></li> 
		      						<li style="float:left;"><a itemprop="url" href="#">Neckware</a></li>
		      						<li style="float:left;"><a itemprop="url" href="#">Textiles</a></li>
		      					</ul>
		      				</div>
		      			</div> 
		      		</div>

		      		<?php
					// echo $country_region_array[$i]->name."<br>";
					$div_var = $j%2;
					if($div_var == 0 || $i == count($country_region_array)-1){
						echo "</div>";
					}
					$j++;
					}
			       ?>
					      	      	
			    		</div>
		    	</div>



		    	<?php endif; ?>
		    
			    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    </div>
		    <div id="menu3" class="tab-pane fade in">
		    	

		    	<?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    	<?php if($data->name == 'Middle East'): ?>

		    		<div class="col-sm-12" style="margin-top:6%;">
	    		<div class="col-sm-3" style="padding-top:3%;">
	    			<img itemprop="image" style="height:175px;width:201px;" src="<?php echo asset('assets/buyer-security/Middle East.png'); ?>" alt="" />
	    		</div>
	    		
	    		<div class="col-sm-9">
	    		
	    		 <p id="c2"><?php echo e($data->name); ?></p>
			      <!-- <?php $__currentLoopData = $data->country_region; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			      <p><?php echo e($c->name); ?></p>
			      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
			      <?php 
			      $country_region_array = $data->country_region;
			      
					$j=1;
					for ($i=0; $i < count($country_region_array); $i++) 
					{
						$div_var = $i%2;
						if($div_var == 0){
							echo '<div class="col-sm-12" style="margin-top:6%;">';
					}
					?>

					<div class="col-sm-6" style="margin-left:-30px;">
					
		      			<div class="col-sm-12">
		      				<div class="col-sm-2">
		      					<a itemprop="url"  href="<?php echo e(URL::to('selected-suppliers/'.$country_region_array[$i]->name,$country_region_array[$i]->id)); ?>">
		      					<img itemprop="image" style="height:29px;width:46px;" src="<?php echo asset('assets/global/img/flags/'.strtolower ($country_region_array[$i]->iso_code_2).'.png'); ?>" alt="" />
		      					</a>
		      				</div>
		      				<div class="col-sm-10">
		      					<?php echo $country_region_array[$i]->name; ?>
		      						<ul style="font-size: 11px; padding:0;">
		      					    <li style="float:left;"><a itemprop="url" href="#" style="color: #999;">Industry Hubs :</a> </li>
		      						<li style="float:left;"><a itemprop="url" href="#">Saree ,</a></li> 
		      						<li style="float:left;"><a itemprop="url" href="#">Neckware</a></li>
		      						<li style="float:left;"><a itemprop="url" href="#">Textiles</a></li>
		      					</ul>
		      				</div>
		      			</div> 
		      		
		      		</div>

		      		<?php
					// echo $country_region_array[$i]->name."<br>";
					$div_var = $j%2;
					if($div_var == 0 || $i == count($country_region_array)-1){
						echo "</div>";
					}
					$j++;
					}
			       ?>
					      	      	
			    		</div>
		    	</div>



		    	<?php endif; ?>
		    
			    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    </div>
		    <div id="menu4" class="tab-pane fade in">
		    	

		    	<?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    	<?php if($data->name == 'Africa'): ?>

		    		<div class="col-sm-12" style="margin-top:6%;">
	    		<div class="col-sm-3" style="padding-top:3%;">
	    			<img itemprop="image" style="height:175px;width:201px;" src="<?php echo asset('assets/buyer-security/Africa.png'); ?>" alt="" />
	    		</div>
	    		
	    		<div class="col-sm-9">
	    		
	    		 <p id="c2"><?php echo e($data->name); ?></p>
			      <!-- <?php $__currentLoopData = $data->country_region; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			      <p><?php echo e($c->name); ?></p>
			      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
			      <?php 
			      $country_region_array = $data->country_region;
			      
					$j=1;
					for ($i=0; $i < count($country_region_array); $i++) 
					{
						$div_var = $i%2;
						if($div_var == 0){
							echo '<div class="col-sm-12" style="margin-top:6%;">';
					}
					?>

					<div class="col-sm-6" style="margin-left:-30px;">
						
		      			<div class="col-sm-12">
		      				<div class="col-sm-2">
		      				<a itemprop="url" href="<?php echo e(URL::to('selected-suppliers/'.$country_region_array[$i]->name,$country_region_array[$i]->id)); ?>">
		      					<img itemprop="image" style="height:29px;width:46px;" src="<?php echo asset('assets/global/img/flags/'.strtolower ($country_region_array[$i]->iso_code_2).'.png'); ?>" alt="" />
		      					</a>
		      				</div>
		      				<div class="col-sm-10">
		      					<?php echo $country_region_array[$i]->name; ?>
		      					<ul style="font-size: 11px; padding:0;">
		      					    <li style="float:left;"><a itemprop="url" href="#" style="color: #999;">Industry Hubs :</a> </li>
		      						<li style="float:left;"><a itemprop="url" href="#">Saree ,</a></li> 
		      						<li style="float:left;"><a itemprop="url" href="#">Neckware</a></li>
		      						<li style="float:left;"><a itemprop="url" href="#">Textiles</a></li>
		      					</ul>
		      				</div>
		      			</div>
		      		</div>

		      		<?php
					// echo $country_region_array[$i]->name."<br>";
					$div_var = $j%2;
					if($div_var == 0 || $i == count($country_region_array)-1){
						echo "</div>";
					}
					$j++;
					}
			       ?>
					      	      	
			    		</div>
		    	</div>



		    	<?php endif; ?>
		    
			    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    </div>
		    <div id="menu5" class="tab-pane fade in">
		    	

		    	<?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    	<?php if($data->name == 'Europe'): ?>

		   <div class="col-sm-12" style="margin-top:6%;">
	    		<div class="col-sm-3" style="padding-top:3%;">
	    			<img itemprop="image" style="height:175px;width:201px;" src="<?php echo asset('assets/buyer-security/Euorope.png'); ?>" alt="" />
	    		</div>
	    		
	    		<div class="col-sm-9">
	    		
	    		 <p id="c2"><?php echo e($data->name); ?></p>
			      <!-- <?php $__currentLoopData = $data->country_region; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			      <p><?php echo e($c->name); ?></p>
			      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
			      <?php 
			      $country_region_array = $data->country_region;
			      
					$j=1;
					for ($i=0; $i < count($country_region_array); $i++) 
					{
						$div_var = $i%2;
						if($div_var == 0){
							echo '<div class="col-sm-12" style="margin-top:6%;">';
					}
					?>

					<div class="col-sm-6" style="margin-left:-30px;">
						
		      			<div class="col-sm-12">

		      				<div class="col-sm-2">
		      					<a itemprop="url" href="<?php echo e(URL::to('selected-suppliers/'.$country_region_array[$i]->name,$country_region_array[$i]->id)); ?>">
		      					<img itemprop="image" style="height:29px;width:46px;" src="<?php echo asset('assets/global/img/flags/'.strtolower ($country_region_array[$i]->iso_code_2).'.png' ); ?>" alt="" />
		      					</a>
		      					
		      				</div>
		      				<div class="col-sm-10">
		      					
		      					<?php echo 
		      					
		      					$country_region_array[$i]->name; 
		      					
		      					?>
		      				
		      					<ul style="font-size: 11px; padding:0;">
		      					    <li style="float:left;"><a itemprop="url" href="#" style="color: #999;">Industry Hubs :</a> </li>
		      						<li style="float:left;"><a itemprop="url" href="#">Saree ,</a></li> 
		      						<li style="float:left;"><a itemprop="url" href="#">Neckware</a></li>
		      						<li style="float:left;"><a itemprop="url" href="#">Textiles</a></li>
		      					</ul>
		      				</div>
		      			</div> 
		      		</div>

		      		<?php
					// echo $country_region_array[$i]->name."<br>";
					$div_var = $j%2;
					if($div_var == 0 || $i == count($country_region_array)-1){
						echo "</div>";
					}
					$j++;
					}
			       ?>
					      	      	
			    		</div>
		    	</div>



		    	<?php endif; ?>
		    
			    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    </div>
		</div>
		    
		   
		    
		    
		  </div>

	</div>


 <?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.master_dynamic', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>