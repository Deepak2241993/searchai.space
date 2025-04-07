

<?php $__env->startSection('title', 'User List'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card container">
        <div class="card-header bg-primary text-white">
            <h5>Assign Token For User</h5>
        </div>
        <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session('error')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
        <div class="card-body">
            <form action="<?php echo e(route('admin.assign-tokens')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo e($user->name ?? ''); ?>" readonly>
                    </div>
            
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo e($user->email ?? ''); ?>" readonly>
                    </div>
            
                    <div class="mb-3 col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo e($address['address'] ?? ''); ?>" readonly>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="service" class="form-label">Service</label>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Service Name</th>
                                <th>Token Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($service->name); ?></td>
                                <td>
                                    <input type="hidden" name="service_names[]" value="<?php echo e($service->name); ?>" />
                                    <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>" />
                                    <input type="number" min="0" class="form-control" name="tokens_purchased[]" />
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\searchai.space\resources\views/admin/user/tokenassign.blade.php ENDPATH**/ ?>