<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Create New Role</h4>
                    </div>
                    <div class="card-body">
                        <?php echo Form::open([
                            'group' => 'form',
                            'url' => '/admin/role',
                            'class' => 'form-horizontal',
                            'enctype' => 'multipart/form-data',
                        ]); ?>

                        <?php echo e(csrf_field()); ?>

                        <div class="form-body">
                            <div class="row margin-left-40">
                                <div class="col-md-offset-1 col-md-12">

                                    <div class="row  margin-bottom-10">
                                        <label class="control-label col-md-2" for="title">Title :<span
                                                class="text-danger"> *</span></label>
                                        <div class="col-md-4">
                                            <?php echo Form::text('title', null, ['id' => 'title', 'class' => 'form-control', 'placeholder' => 'Enter title']); ?>

                                            <span class="text-danger"><?php echo e($errors->first('title')); ?></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-8">
                                        <button class="btn btn-circle green" type="submit">
                                            <i class="fa fa-check"></i>SUBMIT
                                        </button>
                                        <a href="<?php echo e(URL::to('/admin/role')); ?>" class="btn btn-circle btn-outline grey-salsa">
                                            CANCEL</a>
                                    </div>
                                </div>
                            
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp_8\htdocs\test\resources\views/admin/role/create.blade.php ENDPATH**/ ?>