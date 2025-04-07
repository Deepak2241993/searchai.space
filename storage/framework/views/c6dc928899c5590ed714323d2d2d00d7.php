<?php $__env->startSection('title'); ?>
    User Edit
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">User Edit</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            User Edit
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content"> 
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">User Table</h3>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <form action="<?php echo e(route('admin.user.update', $userResult->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" value="<?php echo e($userResult->name); ?>" id="name"
                                            name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" value="<?php echo e($userResult->email); ?>"
                                            name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">New Password</label>
                                        <input type="password" class="form-control" id="password" name="password" 
                                            placeholder="Enter new password (leave blank to keep current password)">
                                    </div>                                    
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\searchai.space\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>