<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo app('translator')->get('english.TEST_PROJECT'); ?></title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->

    <link href="<?php echo e(asset('frontend/css/custom.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('frontend/css/bootstrap5.css')); ?>" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">


    
</head>

<body>

    <?php echo $__env->make('layouts.frontend.include.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>


    <!--   JS Files   -->
    <script src="<?php echo e(asset('frontend/js/bootstrap.bundle.min.js')); ?>"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
        </script>
</body>

</html>
<?php /**PATH E:\xampp_8\htdocs\test\resources\views/layouts/frontend/include/master.blade.php ENDPATH**/ ?>