

<div class="container">
    <h1 class="header margin-bottom-10"><?php echo app('translator')->get('english.USER_DETAILS'); ?></h1>
    <button class="btn btn-sm btn-success mb-5">
        <a class="info-btn" href="<?php echo e(URL::to('api/userRole')); ?>" target="_blank"><?php echo app('translator')->get('english.ALL_DETAILS_API'); ?></a>
    </button>
    <div class="row">
        <div class="table-responsive table-bg">
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr class="center">
                        <th class="text-center"><?php echo app('translator')->get('english.SL_NO'); ?></th>
                        <th class="text-center"><?php echo app('translator')->get('english.NAME'); ?></th>
                        <th class="text-center"><?php echo app('translator')->get('english.EMAIL'); ?></th>
                        <th class="text-center"><?php echo app('translator')->get('english.ROLE'); ?></th>
                        <th class="text-center"><?php echo app('translator')->get('english.DETAILS_WITH_API'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    
                    
                    <?php if(!empty($targetArr)): ?>
                        <?php
                        $sl = 0;
                        ?>

                        
                        <?php
                        // print((new \App\Helpers\Helper)->stringToArrayToName('1,2', $roleArr));
                        // exit;
                        ?>
                        <?php $__currentLoopData = $targetArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $target): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $roleText = (new \App\Helpers\Helper())->stringToArrayToName($target->role_id, $roleArr);
                            ?>
                            <tr class="text-center">
                                <td><?php echo e(++$sl); ?></td>
                                <td><?php echo e($target->user->name ?? ''); ?></td>
                                <td><?php echo e($target->user->email ?? ''); ?></td>
                                <td><?php echo e($roleText ?? ''); ?></td>
                                <td>
                                    <button class="btn btn-sm btn-success">
                                        <a class="info-btn"
                                            href="<?php echo e(URL::to('api/userRole/show') . '/' . $target->user->id); ?>"
                                            target="_blank"><?php echo app('translator')->get('english.INFO'); ?></a>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8"><?php echo app('translator')->get('english.NO_USER_FOUND'); ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH E:\xampp_8\htdocs\test\resources\views/layouts/frontend/include/userDetails.blade.php ENDPATH**/ ?>