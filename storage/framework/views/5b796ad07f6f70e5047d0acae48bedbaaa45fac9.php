
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">

                    <div class="card-header card-header-primary">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title mt-0">Role List

                                    <a class="btn btn-default btn-sm create-new" href="<?php echo e(URL::to('/admin/role/create')); ?>">
                                        Add
                                        New
                                        <i class="fa fa-plus create-new"></i>
                                    </a>
                                </h4>
                            </div>
                            <div class="col-md-4">
                                <?php echo $__env->make('layouts.include.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>

                    </div>
                    <!-- Begin Filter-->
                    <?php echo Form::open(['group' => 'form', 'url' => '/admin/role/filter', 'class' => 'form-horizontal']); ?>

                    <div class="row margin-top-10">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="card-title col-md-4 bold" for="search">Search</label>
                                <div class="col-md-8">
                                    <?php echo Form::text('search', Request::get('search'), [
                                        'class' => 'form-control tooltips',
                                        'title' => 'Title',
                                        'placeholder' => 'Title',
                                        'list' => 'search',
                                        'autocomplete' => 'off',
                                    ]); ?>

                                    <datalist id="search">
                                        <?php if(!empty($titleArr)): ?>
                                            <?php $__currentLoopData = $titleArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $titles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($titles->title); ?>"></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </datalist>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form">
                                <button type="submit" class="btn btn-md green btn-outline filter-submit margin-bottom-20">
                                    <i class="fa fa-search"></i> Filter
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                    <!-- End Filter -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="center">
                                        <th>Sl No.</th>
                                        <th>Title</th>
                                        <th class="td-actions text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if(!empty($targetArr)): ?>
                                        <?php
                                        $sl = 0;
                                        ?>
                                        <?php $__currentLoopData = $targetArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $target): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(++$sl); ?></td>
                                                <td><?php echo e($target->title ?? ''); ?></td>

                                                <td class="td-actions text-center vcenter">
                                                    <div class="width-inherit">
                                                        <a class="btn btn-xs btn-primary tooltips" title="Edit"
                                                            href="<?php echo e(URL::to('/admin/role/' . $target->id . '/edit')); ?>">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                        <?php echo e(Form::open(['url' => '/admin/role/' . $target->id, 'class' => 'delete-form-inline','id' => 'delete'])); ?>

                                                        <?php echo e(Form::hidden('_method', 'DELETE')); ?>

                                                        <button class="btn btn-xs btn-danger delete tooltips" title="Delete"
                                                            type="submit" data-placement="top" data-rel="tooltip"
                                                            data-original-title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                        <?php echo e(Form::close()); ?>


                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="8">No Blog Found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).on("submit", '#delete', function(e) {
        alert
        //This function use for sweetalert confirm message
        e.preventDefault();
        var form = this;
        swal({
                title: 'Are you sure you want to Delete?',
                text: '',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete",
                closeOnConfirm: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    toastr.info("Loading...", "Please Wait.", {
                        "closeButton": true
                    });
                    form.submit();
                } else {
                    //swal(sa_popupTitleCancel, sa_popupMessageCancel, "error");

                }
            });
    });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp_8\htdocs\test\resources\views/admin/role/index.blade.php ENDPATH**/ ?>