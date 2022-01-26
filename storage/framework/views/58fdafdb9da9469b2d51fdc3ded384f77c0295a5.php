<div class="category-bdt" style="height:auto;padding:5px;width:146px;float:left;text-align:left;border:1px solid transparent">
<a target="_blank" itemprop="url" href="<?php echo e(URL::to('online-marketplace',null)); ?>" class="top-categy" style="text-align:left;font-size:14px"><i class="fa fa-list-ul" style=""></i> Categories</a>
<div class="row padding_0 show-ct-list" style="display:none;border-top:none">
<p style="float:right;width:154px;margin:0;border-top:1px solid #ddd;margin-top:-1px"></p>
<div class="mobo-categories">
<?php if($categorys): ?>
<?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div style="width:100%;float:left">
<ul class="bazar-top-list">
<li>
<span class="<?php echo e($category['image']); ?>"></span><a target="_blank" itemprop="url" rel="category" href="<?php echo e(URL::to($category['slug'],$category['id'])); ?>">
<span style="padding:0;font-size:13px" itemprop="name"><?php echo e($category['name']); ?></span> </a>
<span><i class="fa fa-angle-right"></i></span>
<?php if($category->sub_cat): ?>
<div class="row child-ct-list">
<h3 class="catgory-head-tle" style="padding-left:30px;text-align:left"><?php echo e($category['name']); ?></h3>
<ul style="padding-top:15px">
<?php $__currentLoopData = array_slice($category->sub_cat->toArray(),0,40); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li>
<a target="_blank" href="<?php echo e(URL::to(strtolower(preg_replace('/[^A-Za-z0-9\.-]/','-',preg_replace('/[^A-Za-z0-9\. -]/','',$category_children['slug']))).'/0',$category_children['id'])); ?>">
<?php echo e($category_children[ 'name']); ?>

</a>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<div style="max-width:235px;float:left;display:block;padding-top:30px">
</div>
</div>
<?php endif; ?>
</li>
</ul>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
</div>
<div style="padding-left:20px;padding-bottom:30px"><a target="_blank" href="<?php echo e(URL::to('online-marketplace')); ?>" style="font-size:15px;color:#000;font-weight:600;line-height:40px;float:left">All Categories</a></div>
</div>
</div>