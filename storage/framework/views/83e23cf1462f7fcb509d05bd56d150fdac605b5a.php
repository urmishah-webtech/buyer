<?php $__env->startSection('title', 'Edit Profile'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Edit Profile</h1>

    <?php if(session()->has('flash_message')): ?>
        <div class="alert alert-success"><?php echo e(session()->get('flash_message')); ?></div>
    <?php endif; ?>

    <?php echo Form::model($user, ['method' => 'POST', 'route' => ['admin.profiles.update', $user->id]]); ?>

        <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
        <div class="form-group">
            <select   class="form-control" name ="account_type">
                <?php $__currentLoopData = $roles_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($element['id']); ?>"  <?php echo e($element['name'] == $user_role? 'selected' : ''); ?>><?php echo e($element['name']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </select> 
        </div>

        <!-- email Field -->
        <div class="form-group">
            <?php echo Form::label('email', 'Email:'); ?>

            <?php echo Form::email('email', null, ['class' => 'form-control']); ?>

            
        </div>


        <!-- first_name Field -->
        <div class="form-group">
            <?php echo Form::label('first_name', 'First Name:'); ?>

            <?php echo Form::text('first_name', null, ['class' => 'form-control']); ?>

            
        </div>

        <!-- last_name Field -->
        <div class="form-group">
            <?php echo Form::label('last_name', 'Last Name:'); ?>

            <?php echo Form::text('last_name', null, ['class' => 'form-control']); ?>

            

        </div>

        <!-- Password field -->
        <!-- <div class="form-group">
            <?php echo Form::label('password', 'Password:'); ?>

            <?php echo Form::password('password', ['class' => 'form-control']); ?>

            <p class="help-block">Leave password blank to NOT edit the password.</p>
            
        </div> -->

        <!-- Password Confirmation field -->
        <!-- <div class="form-group">
            <?php echo Form::label('password_confirmation', 'Repeat Password:'); ?>

            <?php echo Form::password('password_confirmation', ['class' => 'form-control'] ); ?>

        </div> -->


        <!-- Update Profile Field -->
        <div class="form-group">
            <?php echo Form::submit('Update Profile', ['class' => 'btn btn-primary']); ?>

        </div>
    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('protected.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>