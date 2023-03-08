<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">

                    <div class="card-header card-header-primary">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title mt-0">User List

                                    
                                </h4>
                            </div>
                            <div class="col-md-4">
                                <?php echo $__env->make('layouts.include.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>

                    </div>
                    <!-- Begin Filter-->
                    <?php echo Form::open(['group' => 'form', 'url' => '/admin/user/filter', 'class' => 'form-horizontal']); ?>

                    <div class="row margin-top-10">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="card-title col-md-4 bold" for="search">Search</label>
                                <div class="col-md-8">
                                    <?php echo Form::text('search', Request::get('search'), [
                                        'class' => 'form-control tooltips',
                                        'title' => 'Name',
                                        'placeholder' => 'name',
                                        'list' => 'search',
                                        'autocomplete' => 'off',
                                    ]); ?>

                                    <datalist id="search">
                                        <?php if(!empty($titleArr)): ?>
                                            <?php $__currentLoopData = $titleArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($data->name); ?>"></option>
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
                                        <th>Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="td-actions text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if(!empty($targetArr)): ?>
                                        <?php
                                        $sl = 0;
                                        ?>
                                        <?php $__currentLoopData = $targetArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $target): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="text-center">
                                                <td><?php echo e(++$sl); ?></td>
                                                <td><?php echo e($target->name ?? ''); ?></td>
                                                <td><?php echo e($target->email ?? ''); ?></td>

                                                <td class="td-actions text-center vcenter">
                                                    
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="8">No User Found</td>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp_8\htdocs\test\resources\views/admin/user/index.blade.php ENDPATH**/ ?>