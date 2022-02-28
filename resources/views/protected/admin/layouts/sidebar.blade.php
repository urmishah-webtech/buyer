<?php
//$file1 = basename(URL::current()); 
//$file_name = urldecode($file1);
$data = Session::all();
$file_name = Session::get('content');
//print_r($data);
//echo $value;
?>
<style>
     li a.active{
        background: #369bff;
        color: white;
    }
</style>
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
   <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
   <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
   <div class="sidebar-logo">
      <a href="{{URL('admin/dashboard')}}">
         <!-- <img src="http://127.0.0.1:8000/assets/logo.png"> -->
         <img src="{{ url('assets/logo.png') }}">
      </a>
   </div>
   <div class="page-sidebar navbar-collapse collapse">
      <form class="navbar-form sidebar-search">
         <input type="text" class="form-control" placeholder="Search in menu">
      </form>
      <!-- BEGIN SIDEBAR MENU -->
      <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
      <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
      <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
      <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
      <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
      <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
      <ul class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
         <!-- <li class="start active">
            <a href="{{URL::route('admin_dashboard')}}">
               <i class="icon-home" aria-hidden="true"></i>
               <span class="title">Dashboard</span>
               <span class="selected"></span>
            </a>
         </li> -->
         <li>
            <a <?php if($file_name=='Dashboard' ){ echo 'class="active"'; } ?> href="{{URL('/admin/dashboard')}}">
               <i class="fa fa-home" aria-hidden="true"></i>
               <span class="title">Dashboard</span>
               <span class="selected "></span>
            </a>
         </li>
         <li>
            <a <?php if($file_name=='User' ){ echo 'class="active"'; } ?>>

               <i class="fa fa-user" aria-hidden="true"></i>
               <span class="title">User</span>
               <span class="arrow "></span>
            </a>
            <ul class="sidebar-sub-menu">
               <li><a href="{{URL('admin/dashboard/Add Users')}}">Add Users</a></li>
               <li><a href="{{URL('/admin/profiles')}}">Manage Users</a></li>
               <li><a href="{{URL('/admin/profiles/listarchiveuser')}}">Archive User</a></li>
            </ul>
         </li>
         <li>
            <a <?php if($file_name=='Content Management' ){ echo 'class="active"'; } ?>>
               <i class="fa fa-file-text" aria-hidden="true"></i>
               <span class="title">Content Management</span>
               <span class="arrow "></span>
            </a>
            <ul class="sidebar-sub-menu">
               <li><a href="{{URL('/admin/profiles')}}">Content Description</a></li>
               <li><a href="{{URL('/admin/content-add')}}">Content Categories</a></li>
               <li><a href="{{URL('/admin/content-manage')}}">Categories Lists</a></li>
               <li><a href="{{URL('/page_content/create')}}">Add Page</a></li>
               <li><a href="{{URL('/page_content')}}">Manage Page</a></li>
               <li><a href="{{URL('/admin/manage-seo')}}">Manage SEO</a></li>
               <li><a href="{{URL('/admin/add-seo')}}">Add SEO</a></li>
            </ul>
         </li>
         <li>
            <a <?php if($file_name=='Classifieds (B2b)' ){ echo 'class="active"'; } ?>>
               <i class="fa fa-shopping-cart" aria-hidden="true"></i>
               <span class="title">Products</span>
               <span class="arrow "></span>
            </a>
            <ul class="sidebar-sub-menu">
               <li><a href="{{URL('/admin/product')}}">All products</a></li>
               <!-- <li><a href="{{URL('/admin/tradeshow-show')}}">Manage Tradeshow</a></li> -->
               <!-- <li><a href="{{URL('/admin/Category-add')}}">Add Product Category</a></li> -->
               <li><a href="{{URL('/admin/category-list')}}">Category</a></li>
            </ul>
         </li>
         <li>
            <a <?php if($file_name=='Manage TradeShow' ){ echo 'class="active"'; } ?> href="{{URL('/admin/tradeshow-show')}}">
               <i class="fa fa-tag" aria-hidden="true"></i>
               <span class="title">Manage Tradeshow</span>
               <span class="arrow "></span>
            </a>
         </li>
         <li>
            <a <?php if($file_name=='Menu' ){ echo 'class="active"'; } ?>>
               <i class="fa fa-bars" aria-hidden="true"></i>
               <span class="title">Menu</span>
               <span class="arrow "></span>
            </a>
            <ul class="sidebar-sub-menu">
               <li><a href="{{URL('/admin/manage-inquiry')}}">Manage Inquiry</a></li>
               <li><a href="{{URL('/admin/manage-home-products')}}">Manage Home Products</a></li>
            </ul>
         </li>

         <!-- @foreach($modules as $module)
         <li>
            <a href="javascript:;">
               {!! $module->icon1 !!}
               <span class="title">{{ $module->name }}</span>
               <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
               @foreach($module->childrens as $children)   
                  <li>
                     <a href="{{URL::to($children->slug)}}">
                     {!! $children->icon2 !!}
                     {{ $children->name }}</a>
                  </li>
               @endforeach
            </ul>
         </li>
         @endforeach -->
         <li>
            <a <?php if($file_name=='noticeList' ){ echo 'class="active"'; } ?> href="{{URL::route('admin.notice_list')}}">
               <i class="fa fa-newspaper-o" aria-hidden="true"></i>
               <span class="title">Notice Board</span>
               <span class="arrow "></span>
            </a>
         </li>
         <li>
            <a <?php if($file_name=='sliderSetting' ){ echo 'class="active"'; } ?> href="{{URL::route('admin.slider_setting')}}">
               <i class="fa fa-sliders" aria-hidden="true"></i>
               <span class="title">Slider Setting</span>
               <span class="arrow "></span>
            </a>
         </li>
         
         <li>
            <a <?php if($file_name=='My B2B' ){ echo 'class="active"'; } ?> href="{{URL('admin/dashboard/My B2B')}}">
               <i class="fa fa-handshake-o" aria-hidden="true"></i>
               <span class="title">My B2B</span>
               <span class="arrow "></span>
            </a>
         </li>
         
         <li>
            <a <?php if($file_name=='Modules' ){ echo 'class="active"'; } ?> href="{{URL('admin/dashboard/Modules')}}">
               <i class="fa fa-thumbs-up" aria-hidden="true"></i>
               <span class="title">Modules</span>
               <span class="arrow "></span>
            </a>
         </li>
      </ul>
      <!-- END SIDEBAR MENU -->
   </div>
</div>
        <!-- END SIDEBAR -->
<!-- <script type="text/javascript">
   $( document ).ready(function($) {
      $('.page-sidebar-menu').each(function() {
         $(this).find('.sidebar-sub-menu').addClass('strike');
      });
   });
</script> -->