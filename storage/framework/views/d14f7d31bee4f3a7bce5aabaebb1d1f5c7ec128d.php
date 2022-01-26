<style type="text/css">
    .notification-icon:after {
        position: relative;
        margin-left: 0px;
    }
</style>
<div class="page-header navbar navbar-fixed-top col-lg-12 col-12 p-0 flex-row">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner navbar-menu-wrapper bg-white d-flex align-center justify-content-between" style="padding:0px 30px;">
        <ul class="navbar-nav mr-lg-2 d-none d-flex align-center flex-row" style="display:none;">
            <li class="nav-item nav-toggler-item">
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
            </li>
            <li class="nav-item nav-search d-none d-lg-flex">
                <!-- BEGIN HEADER SEARCH BOX -->
                <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                <form class="search-form search-form-expanded" action="" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="query">
                        <span class="input-group-btn">
                        <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
                        </span>
                    </div>
                </form>
                <!-- END HEADER SEARCH BOX -->
            </li>
        </ul>
        
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="<?php echo e(URL::to('/',null)); ?>">
            <img src="<?php echo asset('assets/logo.png'); ?>" height="50px"  alt="logo" class="logo-default"/>
            </a>

            
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            
        </div>
        <!-- END LOGO -->
        
        <!-- BEGIN PAGE ACTIONS -->
        <!-- DOC: Remove "hide" class to enable the page header actions -->
        <?php if(Sentinel::check()): ?>
        <div class="page-actions hide">
            <div class="btn-group">
                <button type="button" class="btn btn-circle green-haze dropdown-toggle" data-toggle="dropdown">
                <i class="icon-bell"></i>&nbsp;<span class="hidden-sm hidden-xs">Post&nbsp;</span>&nbsp;<i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="javascript:;">
                        <i class="icon-docs"></i> New Post </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-tag"></i> New Comment </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-share"></i> Share </a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-flag"></i> Comments <span class="badge badge-success">4</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-users"></i> Feedbacks <span class="badge badge-danger">2</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-circle green-haze dropdown-toggle" data-toggle="dropdown">
                <i class="icon-bell"></i>&nbsp;<span class="hidden-sm hidden-xs">Post&nbsp;</span>&nbsp;<i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="javascript:;">
                        <i class="icon-docs"></i> New Post </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-tag"></i> New Comment </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-share"></i> Share </a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-flag"></i> Comments <span class="badge badge-success">4</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-users"></i> Feedbacks <span class="badge badge-danger">2</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <?php endif; ?>
        <!-- END PAGE ACTIONS -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right flex-row">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN INBOX DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    
                    <!-- END INBOX DROPDOWN -->
                    <!-- BEGIN TODO DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    
                    <!-- END TODO DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <?php if(Sentinel::check()): ?>
                    <?php
                        $notifications = getAdminNotification();
                        $all_notifications = $notifications['all_notifications'];
                        $inquiry_notifications = $notifications['inquiry_notifications'];
                        $quote_notifications = $notifications['quote_notifications'];
                        $order_notifications = $notifications['order_notifications'];
                        $new_user_notifications = $notifications['new_user_notifications'];
                    ?>
                    <div class="page-actions ">
                        <div class="btn-group">
                            <button type="button" class="btn btn-circle dropdown-toggle" data-toggle="dropdown">
                            <span id="all_notification"><i class="fa fa-globe" aria-hidden="true"></i><i data-count="<?php echo e($all_notifications); ?>" class="glyphicon notification-icon"></i></span>&nbsp;<i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li id="pusher_notification_4">
                                    <a href="<?php echo e(URL::to('admin/profiles',null)); ?>">
                                        <i class="icon-user"></i> New User <span><i data-count="<?php echo e($new_user_notifications); ?>" class="glyphicon notification-icon"></i></span>
                                    </a>
                                </li>
                                <li id="pusher_notification_1">
                                    <a href="<?php echo e(URL::to('admin/manage-inquiry',null)); ?>">
                                    <i class="icon-present"></i> New Inquery <span><i data-count="<?php echo e($inquiry_notifications); ?>" class="glyphicon notification-icon"></i></span>
                                    </a>
                                </li>
                                <li id="pusher_notification_2">
                                    <a href="javascript:;">
                                        <i class="icon-basket"></i> New Quote <span><i data-count="<?php echo e($quote_notifications); ?>" class="glyphicon notification-icon"></i></span>
                                    </a>
                                </li>
                                <li id="pusher_notification_3">
                                    <a href="javascript:;">
                                        <i class="icon-basket"></i> New order <span><i data-count="<?php echo e($order_notifications); ?>" class="glyphicon notification-icon"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
  
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="<?php echo e(asset('assets/admin/profile/',Sentinel::getUser()->profile_pic)); ?>"/>
                        <span class="username username-hide-on-mobile">
                         <?php echo e(Sentinel::getUser()->first_name); ?></span>
                        <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                             <li>
                                <a href="<?php echo e(URL::to('admin/profiles',Sentinel::getUser()->id )); ?>">
                                <i class="icon-user"></i> My Profile </a>
                            </li>
                        
                            <li>
                                <a href="<?php echo e(URL::to('logout')); ?>">
                                <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                   
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>

<?php if(Sentinel::check()): ?>
<input type="hidden" id="user_id" value="admin">
<?php endif; ?>