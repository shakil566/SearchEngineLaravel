<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Admin Test Project</title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->

    <link href="<?php echo e(asset('admin/css/material-dashboard.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/custom.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/bootstrap-fileinput.css')); ?>" rel="stylesheet">

    
</head>

<body>
    <div class="wrapper ">
        <?php echo $__env->make('layouts.include.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="main-panel">
            <?php echo $__env->make('layouts.include.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="content">
                <?php echo $__env->yieldContent('content'); ?>
            </div>

            <?php echo $__env->make('layouts.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="<?php echo e(asset('admin/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/bootstrap-material-design.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/perfect-scrollbar.jquery.min.js')); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
</body>

</html>
<?php /**PATH E:\xampp_8\htdocs\test\resources\views/layouts/admin.blade.php ENDPATH**/ ?>