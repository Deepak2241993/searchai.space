<?php $__env->startSection('title'); ?>
Verify OTP
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="app-content-header bg-light py-3 shadow-sm">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="mb-0">Verify OTP</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Verify OTP</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content py-4">
    <div class="container-fluid">
       
        
        <form action="<?php echo e(route('aadhaar.submit')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-6">
                    <label for="otp">OTP:</label>
                    <input class= "form-control" type="text" name="otp" id="otp" required>
                    <input type="hidden" name="transaction_id" value="<?php echo e($transactionId); ?>" required>
                    <input type="hidden" name="token_share_code" value="<?php echo e($tokenShareCode); ?>" required>
                    <input type="hidden" name="aadhaar_number" value="<?php echo e($aadhaarNumber); ?>">
                    <input type="hidden" name="service_type" value="KYC VERIFICATION">
                </div>
                <div class="col-md-6 mt-4">
                    <button type="submit" class="btn btn-success">Verify OTP</button>
                </div>
            </div>
           

           
           
        </form>

    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gbalz51c0wat/public_html/searchai.space/resources/views/aadhaar/verify.blade.php ENDPATH**/ ?>