<?php $__env->startSection('page_css'); ?>
<link property='stylesheet' href="<?php echo asset('assets/fontend/bdtdccss/online-market-place.css'); ?>" rel="stylesheet">
<link property='stylesheet' href="<?php echo asset('assets/fontend/css/stikynav.css'); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
   <div class="col-sm-12 col-md-12 col-lg-12">
      <ul class="top-path" style="padding-bottom: 8px;" itemscope itemtype="http://schema.org/BreadcrumbList">
         <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="top-path-li"><a itemprop="item" href="<?php echo e(URL::to('/',null)); ?>" class="top-path-li-a"><span itemprop="name">Home</span> <i class="fa fa-angle-right top-path-icon"></i></a>
            <meta itemprop="position" content="1" />
         </li>
         <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="top-path-li"><a itemprop="item" href="<?php echo e(URL::to('online-marketplace',null)); ?>" class="top-path-li-a"><span itemprop="name">All Categories</span><i class="fa fa-angle-right top-path-icon"></i></a>
            <meta itemprop="position" content="2" />
         </li>
      </ul>
   </div>
</div>
<div class="row" id="navbar">
   <?php if($categorys): ?>
   <div class="category-tab" style="background-color:#fff;">
      <div class="cat-title">
         <h3 class="cg-title" style="margin-left:20px; margin-top: 10px;"> Products by Category</h3>
      </div>
      <div class="navbar-header">
         <button type="button" class="navbar-toggle" style="margin-right: 12%;" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
      </div>
      <div id="nav" class="col-md-12 col-sm-12 col-xs-12 col-lg-12 nav navbar-nav collapse navbar-collapse pull-right" style="width:auto;background-color: #F5F5F5; padding-right: 0">
         <?php $spy_id = 1 ?>
         <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="td-cont own_spy_<?php echo e($spy_id); ?> col-lg-3 col-md-3 col-sm-4 col-xs-6">
            <a itemprop="url" class="td-cont-a" href="#tab-<?php echo e($category['id']); ?>">
               <i class="icon-p <?php echo e($category['image']); ?>"></i>
               <div style="margin-left:24%;padding-top: 0px; padding-left:2px;font-size: 12px;font-weight: 600;"><?php echo e($category['name']); ?></div>
            </a><br>
         </div>
         <?php $spy_id++ ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="">
            <?php
            $spy_target_id = 1
            ?>
            <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="" id="tab-<?php echo e($category['id']); ?>" style="display: block;overflow: hidden;">
               <div class="cat-name own_target_spy_<?php echo e($spy_target_id); ?>">
                  <div class="icon">
                     <i class="icon-pp <?php echo e($category['image']); ?>"></i>
                  </div><a itemprop="url" href="<?php echo e(URL::to(strtolower($category['slug']),$category['id'])); ?>">
                     <h3 style="margin-left:30px; padding:0;padding-left:2.4%;font-size:20px;"><?php echo e($category['name']); ?></h3>
                  </a>
               </div>
               <?php if($category->sub_cat): ?>
               <div class="total-row all-categy">
                  <ul class="sub-content">
                     <?php $__currentLoopData = array_slice($category->sub_cat->toArray(),0,22); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <li class="sub-cont-li">
                        <a itemprop="url" style="font-size:12px" class="sub-cont-li-a" href="<?php echo e(URL::to(strtolower(preg_replace('/[^A-Za-z0-9\.-]/','',preg_replace('/[^A-Za-z0-9\.,&-]/','-',$category_children['slug']))).'/0',$category_children['id'])); ?>">
                           <?php echo e($category_children['name']); ?>

                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </li>
                  </ul>
               </div>
               <?php endif; ?>
            </div>
            <?php
            $spy_target_id++
            ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
      </div>
   </div>
   <?php endif; ?>

</div>
<br>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
	$('#nav').affix({
	   offset: {
	      top: $('#nav').offset().top
	   }
	});

	if ($(window).width() < 1100) {
	   $('#nav').css('position', 'static');
      $('#nav').css('width', '100%');
	}

	$(document).on({
	   click: function() {
	      if ($(this).val() == "app") {
	         $('.business_type_row,.main_product_row').hide();
	      } else {
	         $('.business_type_row,.main_product_row').show();
	      }
	   }
	}, '.customer_type');

	//////////////////////////////////////////////////////////////////////////////////////////////////////////

	$(document).ready(function() {

	   var navHeight = $('#nav').outerHeight();
	   $('#nav').wrap('<div class="nv-wrp"></div>');
	   $('.nv-wrp').outerHeight(navHeight + 50);

	   var navw = $('.nv-wrp').outerWidth();
	   $('#nav').outerWidth(navw);

	   var lastId,
	      topMenu = $("#nav"),
	      topMenuHeight = topMenu.outerHeight() + 15,
	      // All list items
	      menuItems = topMenu.find("a"),
	      // Anchors corresponding to menu items
	      scrollItems = menuItems.map(function() {
	         var item = $($(this).attr("href"));
	         if (item.length) {
	            return item;
	         }
	      });

	   // Bind click handler to menu items
	   // so we can get a fancy scroll animation
	   menuItems.click(function(e) {
	      var href = $(this).attr("href"),
	         offsetTop = href === "#" ? 0 : $(href).offset().top - topMenuHeight + 1;
	      $('html, body').stop().animate({
	         scrollTop: offsetTop
	      }, 300);
	      e.preventDefault();
	   });

	   // Bind to scroll
	   $(window).scroll(function() {
	      // Get container scroll position
	      var fromTop = $(this).scrollTop() + topMenuHeight;

	      // Get id of current scroll item
	      var cur = scrollItems.map(function() {
	         if ($(this).offset().top < fromTop)
	            return this;
	      });
	      // Get the id of the current element
	      cur = cur[cur.length - 1];
	      var id = cur && cur.length ? cur[0].id : "";

	      if (lastId !== id) {
	         lastId = id;
	         // Set/remove active class
	         menuItems
	            .parent().removeClass("spy-on")
	            .end().filter("[href='#" + id + "']").parent().addClass("spy-on");
	      }
	   });
	});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.master_dynamic', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>