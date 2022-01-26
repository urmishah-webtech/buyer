<?php $__env->startSection('title', 'View Profile'); ?>

<?php $__env->startSection('content'); ?>
<div class="card user-prof">
    <h3><?php echo e($user->first_name); ?>'s Profile</h3>
        <table class="profile-table" style="width:100%">
            <tr>
                <td>Account Type:</td>
                <td><?php echo e($user_role); ?></td>
            </tr>
            <tr>
                <td>Email Address:</td>
                <td><?php echo e($user->email); ?></td>
            </tr>
            <tr>
                <td>First Name:</td>
                <td><?php echo e($user->first_name); ?></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><?php echo e($user->last_name); ?></td>
            </tr>           
            <tr>
                <td>Contact:</td>
                <td><?php echo e($user_details->customers?$user_details->customers->telephone:''); ?></td>
            </tr>
            <tr>
                <td>Owner email:</td>
                <td><?php echo e($user_details->companies?$user_details->companies->owner_email:''); ?></td>
            </tr>
            <tr>
                <td>Owner Contact:</td>
                <td><?php echo e($user_details->companies?$user_details->companies->owner_contact:''); ?></td>
            </tr>
        </table>
        

    <?php if(Sentinel::check()): ?>
        <div class="edit-btn">
            <a href='<?php echo e($user->id); ?>/edit' class='btn btn-primary'>Edit Profile</a>
        </div>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('protected.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>