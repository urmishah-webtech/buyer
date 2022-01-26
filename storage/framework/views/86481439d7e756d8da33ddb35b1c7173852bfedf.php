<?php echo $__env->make('fontend.layouts.topbar-home', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
<div class="row topbar_sha" style="box-shadow:none;margin-bottom:10px;padding:0">
<div class="col-md-2 col-sm-2" style="padding-top:">
<?php echo $__env->make('fontend.layouts.all-category-list', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="col-md-1 col-sm-1" style="padding-top:">
</div>
<div class="mn-rit col-md-9 col-sm-9" style="float:left;padding-left:0">
<?php if(isset($toplink)): ?>
<div style="position:relative;float:left;min-width:120px;padding:5px 0;margin-left:5px" class="hotproduct_menutitle"><span style="font-size:1em;font-weight:600">Hot Products:</span>
</div>
<ul class="list-inline hotproduct_menu" itemscope itemtype="http://schema.org/SiteNavigationElement" style="padding:5px 0;margin:0;margin-left:125px;">
<?php $__currentLoopData = $toplink; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li itemscope itemtype="http://data-vocabulary.org/Product"><a rel="category" itemprop="url" href="<?php echo e(URL::to(strtolower(preg_replace('/[^A-Za-z0-9\.-]/','',preg_replace('/[^A-Za-z0-9\.,&-]/','-',$link->name))).'-products/0',$link->id)); ?>"><span itemprop="name"><?php echo e($link->name); ?></span></a></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php else: ?>
<?php endif; ?>
</div>
</div>
</div>
</section>