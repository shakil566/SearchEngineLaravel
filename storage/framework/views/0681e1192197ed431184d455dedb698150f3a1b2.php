<div class="table-responsive table-bg margin-top-20">
    <h4 class="text-center"><strong>This details are already searched !</strong></h4><br>

    <table class="table table-hover" id="myTable">
        <thead>
            <tr class="center">
                <th class="text-center"><?php echo app('translator')->get('english.SL_NO'); ?></th>
                <th class="text-center"><?php echo app('translator')->get('english.NAME'); ?></th>
                <th class="text-center"><?php echo app('translator')->get('english.EMAIL'); ?></th>
            </tr>
        </thead>
        <tbody>
            
            
            <?php if(!empty($userArr)): ?>
                <?php
                $sl = 0;
                ?>

                <?php $__currentLoopData = $userArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $target): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr class="text-center">
                        <td><?php echo e(++$sl); ?></td>
                        <td><?php echo e($target->name ?? ''); ?></td>
                        <td><?php echo e($target->email ?? ''); ?></td>
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
<?php /**PATH F:\xampp\htdocs\SearchEngineLaravel\resources\views/frontend/searchedUserDetails.blade.php ENDPATH**/ ?>