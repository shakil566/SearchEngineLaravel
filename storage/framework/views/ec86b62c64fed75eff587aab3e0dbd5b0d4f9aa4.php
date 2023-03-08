
<?php $__env->startSection('title'); ?>
    <?php echo $__env->yieldContent('Welcome to Test - Project'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="margin-top-10 margin-bottom-10">

        <?php echo $__env->make('layouts.frontend.include.userDetails', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.include.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp_8\htdocs\test\resources\views/frontend/index.blade.php ENDPATH**/ ?>