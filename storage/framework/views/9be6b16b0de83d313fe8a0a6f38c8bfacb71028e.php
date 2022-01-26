<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('page_content_title','Login'); ?>
<?php $__env->startSection('page_css'); ?>
<link property='stylesheet' href="<?php echo asset('css/signin.css'); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
<div class="row" style="background: #fff!important;margin-top: .5%;">
    <div class="col-md-12 box" style="margin: 0px;padding-bottom: 4%">
        <div id="log_img" class="col-md-7">
            <div class="col-md-10">
            <img itemprop="image" class="img-responsive" style="margin-top:9%;padding-left:10%;padding-bottom:0%;" src="<?php echo e(asset('assets/service/login.jpg')); ?>">
        </div>
        </div>
            <div  style="margin-top:5%;padding-bottom:5%;"id="shodow" class="col-md-4 padding_0" >
                <form method="POST" action="<?php echo e(route('ServiceLoginPost')); ?>">
                <?php echo e(csrf_field()); ?>

    			<input type="hidden" name="continue" value="<?php echo e($return_url); ?>">
                    <?php if(session()->has('flash_message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session()->get('flash_message')); ?>

                        </div>
                    <?php endif; ?>
    
                    <?php if(session()->has('error_message')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session()->get('error_message')); ?>

                        </div>
                    <?php endif; ?>
                    <!-- Email field -->
                    <div id="login_field" class="col-md-12">
                    <div class="form-group">
                    <label>Account</label>
                        <?php echo Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control productview', 'required' => 'required']); ?>

                    </div>

                    <!-- Password field -->
                    <div align="" class="form-group">
                        <label>Password</label>              
                        <?php echo Form::password('password', ['placeholder' => 'Password','class' => 'form-control productview', 'required' => 'required']); ?>

                    </div>

                    <div class="checkbox">
                        <!-- Remember me field -->
                        <div class="form-group">
                            <label>
                                <?php echo Form::hidden('remember', 'remember'); ?> 
                                <?php if(isset($return_url)): ?>
                                <?php echo Form::hidden('return_url', $return_url); ?>

                                <?php endif; ?>
                            </label>
                        </div>
                    </div>
                  

                    <!-- Submit field -->
                    <div class="form-group">
                    <!-- <a class="btn btn btn-lg btn-primary btn-block" href="">Sign in</a> -->
                        <?php echo Form::submit('Sign In', ['class' => 'btn btn btn-lg btn-primary btn-block','style'=>'padding-bottom: 26px;border-radius: 5px!important;']); ?>

                    </div>
                     <div style="padding:10px 0px 5px 2px; text-align:left;">
                        <div class="col-md-8"> <a itemprop="url" href="<?php echo e(URL::to('forgot_password',null)); ?>" id="forget-password">
        Forgot password? </a> </div>
                     <div class="col-md-4"><a itemprop="url" href="<?php echo e(URL::to('join',null)); ?>"><b>Join Free</b></a></div>
                    </div>
                    <div class="shad"></div>
                    
                        </div>
                </form>

            </div>
        </div>       
        </div>
        <br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.master-login', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>