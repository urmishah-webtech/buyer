<?php
   $ul_li_color = false;
   $background_img_found = false;
   $header_img_found = false;
   $header_logo_title_show = false;
   $header_logo_title_id = 1;
   $header_background_color_show = false;
   $header_image_show = false;
?>
   <?php $__currentLoopData = $template_setting_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts_databg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($ts_databg->template_section): ?>
         <?php if($ts_databg->template_section->slug == "Templatebackground"): ?>
            <?php if($ts_databg->back_image != ''): ?>
               <?php
               $background_img_found = true;
               $ul_li_color = true;
               break;
               ?>
            <?php endif; ?>
         <?php endif; ?>
      <?php endif; ?>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


   <?php $__currentLoopData = $template_setting_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts_dataltshow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($ts_dataltshow->template_section): ?>
         <?php if($ts_dataltshow->template_section->slug == "header"): ?>
            <?php if($ts_dataltshow->is_show_color == '1'): ?>
               <?php
               $header_background_color_show = true;
               break;
               ?>
            <?php endif; ?>
         <?php endif; ?>
      <?php endif; ?>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

   <?php $__currentLoopData = $template_setting_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts_datahbcshow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($ts_datahbcshow->template_section): ?>
         <?php if($ts_datahbcshow->template_section->slug == "header"): ?>
            <?php $header_logo_title_id = $ts_datahbcshow->title_logo; ?>
            <?php if($ts_datahbcshow->title_logo == '1' || $ts_datahbcshow->title_logo == '2' || $ts_datahbcshow->title_logo == '3'): ?>
               <?php
               $header_logo_title_show = true;
               break;
               ?>
            <?php endif; ?>
         <?php endif; ?>
      <?php endif; ?>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

   <?php $__currentLoopData = $template_setting_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts_datahimgshow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($ts_datahimgshow->template_section): ?>
         <?php if($ts_datahimgshow->template_section->slug == "header"): ?>
            <?php if($ts_datahimgshow->is_show_image == '1'): ?>
               <?php
               $header_image_show = true;
               break;
               ?>
            <?php endif; ?>
         <?php endif; ?>
      <?php endif; ?>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

   <?php $__currentLoopData = $template_setting_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts_datahf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($ts_datahf->template_section): ?>
         <?php if($ts_datahf->template_section->slug == "header"): ?>
            <?php if($ts_datahf->back_image != ''): ?>
               <?php
               $header_img_found = true;
               break;
               ?>
            <?php endif; ?>
         <?php endif; ?>
      <?php endif; ?>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div style="background-color:
   <?php if(empty($template_setting_data)): ?>
        #fff
   <?php else: ?>
      <?php $__currentLoopData = $template_setting_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts_databgcol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php if($ts_databgcol->template_section): ?>
            <?php if($ts_databgcol->template_section->slug == 'Templatebackground'): ?>
               <?php if($ts_databgcol->is_show_color == 1): ?>
                  <?php echo e($ts_databgcol->back_color); ?>

                  <?php break; ?>
               <?php endif; ?>
            <?php endif; ?>
         <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php endif; ?>
   ;background-image:
   <?php if(!empty($template_setting_data)): ?>
      <?php $__currentLoopData = $template_setting_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts_databgimg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php if($ts_databgimg->template_section): ?>
            <?php if($ts_databgimg->template_section->slug == 'Templatebackground'): ?>
               <?php if($ts_databgimg->is_show_image == 1): ?>
                  <?php echo e('url('.URL::to('uploads', $ts_databgimg->back_image).')'); ?>

                  <?php break; ?>
               <?php endif; ?>
            <?php endif; ?>
         <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php endif; ?>

   ;background-position: center top;background-repeat:no-repeat;">

<div class="container" style="background-color:transparent;">
   <div class="row">
      <div class="col-md-1 hidden_collum"></div>
      <div  style="height:
         <?php if(!empty($template_setting_data)): ?>
            <?php $__currentLoopData = $template_setting_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts_datahh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php if($ts_datahh->template_section): ?>
                  <?php if($ts_datahh->template_section->slug == 'header'): ?>
                     <?php if($ts_datahh->height != '' || $ts_datahh->height != 0): ?>
                        22
                        <?php break; ?>
                     <?php else: ?>
                        0
                     <?php endif; ?>
                  <?php endif; ?>
               <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php endif; ?>
         px;background-image:
         <?php if(!empty($template_setting_data)): ?>
            <?php if($header_image_show == 1): ?>
               <?php $__currentLoopData = $template_setting_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts_datah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($ts_datah->template_section): ?>
                     <?php if($ts_datah->template_section->slug == 'header'): ?>
                        <?php echo e('url('.URL::to('uploads', $ts_datah->back_image).');'); ?>

                        <?php break; ?>
                     <?php endif; ?>
                  <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
               
            <?php endif; ?>
         <?php endif; ?>
         ;background-color:
            <?php if(empty($template_setting_data)): ?>
               #E4E4E4
            <?php else: ?>
               <?php if($header_background_color_show == 1): ?>
                  <?php $__currentLoopData = $template_setting_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts_datahbcshowf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if($ts_datahbcshowf->template_section): ?>
                        <?php if($ts_datahbcshowf->template_section->slug == 'header'): ?>
                           <?php echo e($ts_datahbcshowf->back_color); ?>

                           <?php break; ?>
                        <?php endif; ?>
                     <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php else: ?>
                  transparent
               <?php endif; ?>
            <?php endif; ?>
            ;background-size:100% 100%; background-repeat: no-repeat; padding-bottom: 3.6%;" class="col-md-10">
         <?php if($header_logo_title_id == 1 || $header_logo_title_id == 3): ?>
         <div class="col-md-1" style="padding-left: 1%; padding-top: 3.5%;">
            <?php if(empty($template_setting_data)): ?>
               <img class="header_logo_img img-responsive col-md-4 pull-right" style="height:55px;width:80px;margin-top:20px;" src="<?php echo e(URL::to('uploads/no_image.jpg',null)); ?>"/>
            <?php else: ?>
               <?php if($header_logo_title_id == 1 || $header_logo_title_id == 3): ?>
                  <img class="header_logo_img" style="height:55px;width:80px;margin-top:20px;" src="<?php echo e(URL::to('uploads/no_image.jpg',null)); ?>" class="img-responsive  col-md-4 pull-right" />
               <?php else: ?>
                  ''
               <?php endif; ?>
            <?php endif; ?>
         </div>
         <?php endif; ?>
         <div class="col-md-<?php if($header_logo_title_id == 1 || $header_logo_title_id == 3): ?>10 <?php else: ?> 11 <?php endif; ?> col-xs-12 padding_0" style="padding-top: 5%" >
            <h1 style="color:
               <?php if(empty($template_setting_data)): ?>
                  #06c
               <?php else: ?>
                  <?php $__currentLoopData = $template_setting_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts_datahfc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if($ts_datahfc->template_section): ?>
                        <?php if($ts_datahfc->template_section->slug == 'header'): ?>
                           <?php if($ts_datahfc->font_color != ''): ?>
                              <?php echo e($ts_datahfc->font_color); ?>

                              <?php break; ?>
                           <?php endif; ?>
                        <?php endif; ?>
                     <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php endif; ?>
               ;"> 
               <?php if(empty($template_setting_data)): ?>
                    echo '<span style="color: #06c;font-family: verdana;" class="header_company_name header-company-title"></span>';
               <?php else: ?>
                  <?php if($header_logo_title_id == 1 || $header_logo_title_id == 2): ?>
                     <?php if($header_logo_title_id == 2): ?>
                        <span style="color:inherit;font-family: verdana;padding:0;" class="header_company_name header-company-title"></span>
                     <?php else: ?>
                        <span style="color:inherit;font-family: verdana;" class="header_company_name header-company-title"></span>
                     <?php endif; ?>
                  <?php else: ?>
                     <span style="color:inherit;font-family:verdana;display:inline-block;margin-top:10px;" class="header-company-title">&nbsp;</span>
                  <?php endif; ?>
               <?php endif; ?>
            </h1>
         </div>
         <div class="col-md-1">
            
         </div>
      </div>
      <div class="col-md-1 hidden_collum"></div>
   </div>
   <div class="row" style="margin-top:
      <?php if(empty($template_setting_data)): ?>
        ''
      <?php else: ?>
         <?php $__currentLoopData = $template_setting_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts_datahight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($ts_datahight->template_section): ?>
               <?php if($ts_datahight->template_section->slug == 'navbar'): ?>
                  <?php if($ts_datahight->height == '' || $ts_datahight->height != 0): ?>
                     <?php echo e($ts_datahight->height); ?>

                     <?php break; ?>
                  <?php endif; ?>
               <?php endif; ?>
            <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
      px;background-image:
      <?php if(!empty($template_setting_data)): ?>
         <?php $__currentLoopData = $template_setting_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts_datanavbg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($ts_datanavbg->template_section): ?>
               <?php if($ts_datanavbg->template_section->slug == 'navbar'): ?>
                  <?php if($ts_datanavbg->is_show_image == 1): ?>
                     <?php echo e('url('.URL::to('uploads', $ts_datanavbg->back_image).');'); ?>

                     <?php break; ?>
                  <?php endif; ?>
               <?php endif; ?>
            <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
      ;clear:both;float:none;">
      <div class="col-md-1 hidden_collum"></div>
      <!-- <div style="background-color:#28a4c9;height:40px" class="col-md-10 padding_0"> -->
      <div style="background-color:
         <?php if(empty($template_setting_data)): ?>
            #cecece;
         <?php else: ?>
            <?php $__currentLoopData = $template_setting_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts_datanvc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php if($ts_datanvc->template_section): ?>
                  <?php if($ts_datanvc->template_section->slug == 'navbar'): ?>
                     <?php if($ts_datanvc->is_show_color == 1): ?>
                        <?php echo e($ts_datanvc->back_color); ?>

                        <?php break; ?>
                     <?php else: ?>
                        transparent
                        <?php break; ?>
                     <?php endif; ?>
                  <?php endif; ?>
               <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php endif; ?>
         ;margin-top: -1px;" class="col-md-10 padding_0">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
         </div>
         <div class="mainmenu color_changer pull-left" style="width: 100%;" data-color_changer="
            <?php if($background_img_found == true): ?>
               1
            <?php else: ?>
               0
            <?php endif; ?>">
            <?php
               $nav_color_data = '#363432';
               $nav_back_color_data = '#ddd';
            ?>
            <?php if(empty($template_setting_data)): ?>
               <?php 
                  $nav_color_data = '#363432';
                  $nav_back_color_data = '#ddd';
               ?>
            <?php else: ?>
               <?php $__currentLoopData = $template_setting_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts_datanavfcolor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($ts_datanavfcolor->template_section): ?>
                     <?php if($ts_datanavfcolor->template_section->slug == "navbar"): ?>
                        <?php if($ts_datanavfcolor->font_color != ""): ?>
                           <?php
                              $nav_color_data = $ts_datanavfcolor->font_color;
                              $nav_back_color_data = $ts_datanavfcolor->back_color;
                              break;
                           ?>
                        <?php endif; ?>
                     <?php endif; ?>
                  <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <ul class="nav comp-pro-menu navbar-nav collapse navbar-collapse pull-right" style="width: 100%; padding-left: 0; background: <?php echo e($nav_back_color_data); ?>;margin:0;">
               <li style="background: rgba(0, 0, 0, 0); padding: 0 15px;"><a style="font-size: 18px;padding: 1%;font-size: 14px;height: 33px;_height: auto;line-height: 33px;_line-height: 32px;border: none;color:<?php $nav_color_data; ?>;font-weight: 700;padding: 0 15px;position: relative;cursor: pointer;display: block;text-decoration: none;" href="<?php echo e(URL::to('Home/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$company_no_name),Route::current()->parameters()['profile_id'])); ?>">Home</a></li>
               <li class="dropdown" style="z-index: 999 !important;background: rgba(0, 0, 0, 0); padding: 0 15px;">
                  <span style="font-size: 18px;padding: 1%;font-size: 14px;height: 33px;_height: auto;line-height: 33px;border: none;color: <?php $nav_color_data; ?>;font-weight: 700;padding: 0 1px;position: relative;cursor: pointer;display: block;text-decoration: none;">Product Category<i class="fa fa-angle-down"></i></span>
                  <ul role="menu" class="sub-menu">
                     <?php $__currentLoopData = $product_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if($product_group->active == 1): ?>
                     <li style="padding: 5px 10px"><a style="color: #000;" href="<?php echo e(URL::to('profile/template_/'.Route::current()->parameters()['profile_id'].'/'.$product_group->name,null)); ?>"><?php echo e($product_group->name); ?></a></li>
                     <?php endif; ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
               </li>
               <li class="dropdown" style="background: rgba(0, 0, 0, 0); padding: 0 15px;">
                  <span style="font-size: 18px;padding: 1%;font-size: 14px;height: 33px; height: auto;line-height: 33px;border: none;color:<?php $nav_color_data; ?>;font-weight: 700;padding: 0 1px;position: relative;cursor: pointer;display: block;text-decoration: none;">Company Profile<i class="fa fa-angle-down"></i></span>
                  <ul role="menu" class="sub-menu">
                     <li style="padding: 5px 10px"><a style="color: #000;" href="<?php echo e(URL::to(preg_replace('/[^A-Za-z0-9\-]/', '-',$company_no_name).'/company-overview',Route::current()->parameters()['profile_id'])); ?>">Company Overview</a></li>
                     <li style="padding: 5px 10px"><a style="color: #000;" href="<?php echo e(URL::to('trade-capacity/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$company_no_name),Route::current()->parameters()['profile_id'])); ?>">Trade Capacity</a></li>
                     <li style="padding: 5px 10px"><a style="color: #000;" href="<?php echo e(URL::to('production-capacity/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$company_no_name),Route::current()->parameters()['profile_id'])); ?>">Company Capability</a></li>
                     <li style="padding: 5px 10px"><a style="color: #000;" href="<?php echo e(URL::to('industrial-certification/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$company_no_name),Route::current()->parameters()['profile_id'])); ?>">Industrial Certification</a></li>
                  </ul>
               </li>
               <li style="background: rgba(0, 0, 0, 0); padding: 0 15px;" ><a style="font-size: 18px;padding: 1%;font-size: 14px;height: 33px;_height: auto;line-height: 33px;_line-height: 32px;border: none;color:<?php $nav_color_data; ?>;font-weight: 700;padding: 0 1px;position: relative;cursor: pointer;display: block;text-decoration: none;" href="<?php echo e(URL::to('contact/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$company_no_name),Route::current()->parameters()['profile_id'])); ?>" >Contact</a></li>
            </ul>
         </div>
      </div>
      <div class="col-md-1 hidden_collum"></div>
   </div>
</div>