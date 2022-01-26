<nav class="navbar navbar-default navbar-fixed-top about-hdr" style="height: 100px; background: #fff;">
      <div class="container">
        <div class="navbar-header">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" style="padding: 0;" href="<?php echo e(URL::to('/',null)); ?>">
    <a style="margin-left: 0; background-image: none; height: auto; display: block;width: 100%; " rel="home" itemprop="url" title="Manufacturers-Suppliers"  href="<?php echo e(URL::to('/',null)); ?>">
      <img alt="logo" style="  width: 200px;   height: auto;margin-top: 18px;" itemprop="logo" class="loggg" src="<?php echo e(asset('assets/logo.png')); ?>" />
     
    </a>
    <!-- <div class="main-name-hold">
      <a  rel="home" itemprop="url" title="Manufacturers-Suppliers" class="bd-trade" href="<?php echo e(URL::to('/',null)); ?>" ></a>
    </div> -->
				<!-- <div><a href="<?php echo e(URL::to('/',null)); ?>" id="back-home" onMouseOut="hide_home()">Back to Homepage</a></div> -->

          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" style="padding-top: 20px; background: #fff;">
          <ul class="nav navbar-nav navbar-right abt-top-menu">
            <li class="active"><a href="<?php echo URL::to('about-us',null); ?>">About BuyerSeller</a></li>
            <li><a href="<?php echo URL::to('media/room',null); ?>">Media Room</a></li>
            <li><a href="<?php echo URL::to('FooterPage/pages/Contact_Us',20); ?>">Contact BuyerSeller</a></li>
            <li><a href="<?php echo URL::to('join',null); ?>">Register Now</a></li>
            
              <?php if(Sentinel::check()): ?>
          <li>
          <div aria-label="Navigation" itemscope itemtype="http://schema.org/SiteNavigationElement" class="mainmenu pull-right padding_0">
         <ul class="nav navbar-nav collapse navbar-collapse padding_0" itemscope itemtype="http://schema.org/SiteNavigationElement">
        <?php if(Sentinel::check()): ?>
         <li><a style="padding: 15px;" itemprop="url" href="<?php echo e(URL::to('ServiceChannel/pages/for_buyer/35',null)); ?>">Help Center</a> </li> 
        <?php else: ?>
        <li style=""><a itemprop="url" href="<?php echo e(URL::to('login',null)); ?>" class="" data-toggle="">Sign In</a></li>
        <li style="margin-left: 0%;padding: 0px;border-left: 1px solid #cecece;height: 12px;top: 8px;"></li>
        <li style=" margin-left: 0%;"><a itemprop="url" href="<?php echo e(URL::to('join',null)); ?>" class="join_btn">Join Free</a></li>
        
        <?php endif; ?>

        <?php if(Sentinel::check()): ?>
            <?php
              $role = App\Model\Role_user::where('user_id',Sentinel::getUser()->id)->first();
              $dashboard_route = ($role->role_id ==3) ? "company/dashboard" : 'buyer/dashbord';
            ?>
        <?php endif; ?>
        <?php if(Sentinel::check()): ?>
     
        <li class="dropdown" style="z-index: 999 !important;"><a  style="padding: 15px;" itemprop="url" href="#">My BuyerSeller 
        <?php if(Sentinel::check()): ?>
        <span id="total_notification" title=""></span>
        <?php endif; ?>
        <i class="fa fa-angle-down"></i></a> 
          <ul role="menu" class="sub-menu submenu2" style="background-color: #fff" itemscope itemtype="http://schema.org/SiteNavigationElement">
             <?php if(Sentinel::check()): ?>
            
            <li class="dropdown" style="z-index: 999 !important;">
        Welcome back<br> <?php echo e(Sentinel::getUser()->first_name); ?> 
            <?php endif; ?>
          <?php if(Sentinel::check()): ?>
            <li><a itemprop="url" href="<?php echo e(URL::to($dashboard_route,null)); ?>">Dashboard</a></li>
          <?php endif; ?>

            <li title=""><a itemprop="url" href="<?php echo e(URL::to('default','message')); ?>">New Inquiry 
              
            </a></li>
            <li title="" style="margin-bottom: 10px"><a itemprop="url" href="<?php echo e(URL::to('Mybuying-Request',null)); ?>">New Quote 
             
            </a></li>
              <li style=" margin-left: 0%;"><a itemprop="url" href="<?php echo e(URL::to('order-list',null)); ?>" class="join_btn"><i class="fa fa-users" aria-hidden="true"></i> Order 
       </a></li>
            
            <li class="sub-split" style=" background-color: #fff;   border-top: 1px solid #ddd;
    list-style: none outside none;padding-top: 5px;line-height: 22px;color: #333;font-weight: 700;white-space: nowrap;box-shadow: none">
                For Buyer</li>
              <li><a itemprop="url" href="<?php echo e(URL::to('get-quotations',null)); ?>" target="_blank" class="" style="">Get Quotations Now</a>
              </li>
               <li class="navigation-menu-list-li"><a itemprop="url" href="<?php echo e(URL::to('Mybuying-Request',null)); ?>" class="navigation-menu-list-li-a">Manage Buying Requests</a></li>
               <li style="margin-bottom: 10px" class="navigation-menu-list-li"><a itemprop="url" href="<?php echo e(URL::to('list/view/requested/sample',null)); ?>" class="navigation-menu-list-li-a">Manage Sample Requests</a></li>
               <li class="sub-split" style="background-color: #fff;   border-top: 1px solid #ddd;
               list-style: none outside none;padding-top: 5px;line-height: 22px;color: #333;font-weight: 700;white-space: nowrap;box-shadow: none">For Supplier</li>
               <li class="navigation-menu-list-li"><a itemprop="url" target="_blank" href="<?php echo e(URL::to('dashboard','product',null)); ?>" class="navigation-menu-list-li-a">Display New Products</a></li>
               <li class="navigation-menu-list-li"><a itemprop="url" target="_blank" href="<?php echo e(URL::to('dashboard','company_site')); ?>" class="navigation-menu-list-li-a">Company & Site</a></li>
               <li class="navigation-menu-list-li"><a itemprop="url" target="_blank" href="<?php echo e(URL::to('quotation/management',null)); ?>" class="navigation-menu-list-li-a">Quotes Management</a></li>
               <?php endif; ?>
              <?php if(Sentinel::check()): ?>
             <li class="navigation-menu-list-li"><a style="font-size: 14px;color: #000 !important;font-weight: 600;letter-spacing: .5px;" class="btn" href="<?php echo e(URL::to('logout',null)); ?>"> Logout </a> </li>
              <?php endif; ?>

          </ul>
        </li>
       
      </ul>
    </div>
    </li>
            <?php else: ?>
            <li style=""><a itemprop="url" href="<?php echo e(URL::to('login',null)); ?>" class="" data-toggle="">Sign In</a></li>
              <?php endif; ?>
           
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


