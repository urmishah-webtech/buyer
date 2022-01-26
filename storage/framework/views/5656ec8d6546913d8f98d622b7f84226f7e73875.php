<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="language" content="english"> 
     <meta charset="utf-8">
    <meta name="googlebot" content="index, follow">
    <meta name="robots" content="index, follow" />
    <meta name="_token" content="<?php echo csrf_token(); ?>"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
          <meta name="viewport" content="width=device-width, initial-scale=1">         
          <link rel="icon" type="image/png" href="<?php echo asset('favicon-32x32.png'); ?>" sizes="32x32" />
          <link rel="icon" type="image/png" href="<?php echo asset('favicon-16x16.png'); ?>" sizes="16x16" />
          <link rel="icon" type="image/png" href="<?php echo asset('favicon-8x8.png'); ?>" sizes="16x16" />
          <?php
            $canonical_dynamic = 'http'.(isset($_SERVER['HTTPS']) ? 's' : '').'://'."{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
          ?>
          <link rel="canonical" href="<?php echo e($canonical_dynamic ?? ''); ?>"/>
          <link rel="alternate" href="http://buyerseller.asia" hreflang="en-us">
          <title><?php if(isset($title)): ?>
          <?php echo e(ucwords($title)); ?>

                  <?php else: ?>
                  Buyer Seller | Buyerseller.asia
                  <?php endif; ?></title>
<?php if(isset($title)): ?>
<meta name="title" content="<?php echo e(ucwords($title)); ?>" />
<?php else: ?>
<meta name="title" content="" />
<?php endif; ?>
<meta name="keywords" content="<?php echo e($keyword ?? 'Bangladesh B2B Marketplace,Bangladesh B2B online marketplace, B2B online marketplace in Bangladesh, B2B platform in Bangladesh, Bangladesh B2B online platform, B2B Suppliers in Bangladesh, Global b2b marketplace, B2B online marketplace, B2B online platform, b2b ecommerce platform'); ?>" />

<meta name="description" content="<?php echo e($description ?? 'Find out the best Manufacturers, Suppliers, Exporters, Wholesalers & Products on BuyerSeller, the largest b2b marketplace in South Asia'); ?>"/>

<meta property="og:title" content="<?php echo e($title ?? 'Bangladesh B2B marketplace for Suppliers, Manufacturers & Exporters'); ?>"/>
<meta name="Subject" content="<?php echo e($keyword ?? 'b2b marketplace, B2B portal, Online marketplace, b2b online marketplace, Bangladesh B2B marketplace, B2B online Marketplace in Bangladesh'); ?>" />
<meta name="page-topic" content="<?php echo e($description ?? 'Find out the best Manufacturers, Suppliers, Exporters, Wholesalers Products on BuyerSeller, the largest b2b marketplace in South Asia.'); ?>" />
<meta name="copyright" content="Copyright © Bangladesh Trade Development Council" />
<meta name="owner" content="Bangladesh Trade Development Council. (BuyerSeller)" />
<meta name="author" content="Name: Kazi Ahmed, Mobile: +8801751681223, Address: Baitush Shafqah, House: 818, Road: 12, Avinue: 06, Mirpur DOHS, Dhaka 1216, Bangladesh, E-mail: info@BuyerSeller.asia, Website: http://www.BuyerSeller.asia" />
<meta content="https://plus.google.com/+Bdtdc" name="author">
          <?php echo $__env->make('fontend.layouts.stylesheet-home', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php echo $__env->yieldContent('page_css'); ?>
          <?php echo $__env->yieldContent('own_styles'); ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>  
<body itemscope itemtype="http://schema.org/WebPage">
 <meta itemprop="accessibilityControl" content="fullKeyboardControl">
 <meta itemprop="accessibilityControl" content="fullMouseControl">
 <meta itemprop="accessibilityHazard" content="noFlashing">
 <meta itemprop="accessibilityHazard" content="noMotionSimulation">
 <meta itemprop="accessibilityHazard" content="noSound">
 <meta itemprop="accessibilityAPI" content="ARIA">
 <a href="https://plus.google.com/104450985808854201025" rel="publisher"></a>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<?php if(isset($homepage)): ?>
<div class="container-home">
<?php else: ?>
<div class="container-home">
<?php endif; ?>
<?php if(Sentinel::check()): ?>
<input type="hidden" id="user_id" value="<?php echo e(Sentinel::getUser()->id); ?>">
<?php endif; ?>
  <?php echo $__env->yieldContent('dashboard_content'); ?>
  
  <?php echo $__env->make('fontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


</div>
      <!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
  <?php echo $__env->make('fontend.layouts.scripts-home', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('fontend.layouts.scripts-notification', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

     <script type="text/javascript">  
         
      $(document).ready(function(){

        $(document).on({click:function(e){    

          e.preventDefault();      
          var url= location.origin;
          var search_options = $('select[name="search"].all_search_options').val();
          var search_key = $('input[name="key"].search_key').val();
          // window.location.href = window.location.origin+'/search-product/search=='+search_options+'+..+key=='+search_key+'+..+country==0+..+buyer_protection==false+..+gold_supplier==false+..+assessed_supplier==false+..+filter_by_main_market==0+..+filter_by_total_revanue==0+..+filter_by_employe==0';
 
          if(search_key == ''){
            var query_str = '';
            
            alert("You must enter keyword");
            return false;
          }else{
            var query_str = search_key.split(' ').join('-');
            var query_str = query_str.split('/').join('-');
          }
          window.location.href = url+'/'+query_str+'/search?t='+search_options;
        }},'input[value="Search"].all_search');

      });
       function goBack() {
    window.history.back();
      }

    </script>
    </body>
</html>