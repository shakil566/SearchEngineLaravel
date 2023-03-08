
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <h1>Hello <?php echo e(Auth::user()->name); ?></h1>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <a href="/admin/user">
                            <div class="card-icon">
                                <i class="fa fa-user"></i>
                            </div>
                        </a>
                        <p class="card-category">Total User</p>
                        <h3 class="card-title"><?php echo e($totalUser ?? ''); ?>

                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-danger"></i>
                            <a href="javascript:;"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <a href="/admin/role">
                            <div class="card-icon">
                                <i class="fa fa-bookmark"></i>
                            </div>
                        </a>
                        <p class="card-category">Total Role</p>
                        <h3 class="card-title"><?php echo e($totalRole ?? ''); ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp_8\htdocs\test\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>