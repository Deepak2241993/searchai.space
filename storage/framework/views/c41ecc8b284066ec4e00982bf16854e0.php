<?php $__env->startSection('title'); ?>
<?php echo e(isset($pageTitle) ? $pageTitle : 'Faq Create'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0"><?php echo e(isset($pageTitle) ? $pageTitle : 'Faq Create'); ?></h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(isset($pageTitle) ? $pageTitle : 'Faq Create'); ?>

                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content py-4"> 
        <div class="container-fluid">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body d-flex justify-content-between align-items-center rounded">
                    <h4 class="card-title mb-0"><?php echo e(isset($pageTitle) ? $pageTitle : 'Faq Create'); ?></h4>
                    <a href="<?php echo e(route('admin.faq.index')); ?>" class="btn btn-warning ms-auto">Back</a>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo e(isset($pageTitle) ? $pageTitle : 'Faq Create'); ?></h3>
                        </div>
                        <?php if(session('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo e(session('error')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <?php if(isset($faqData)): ?>
                                <form method="post" action="<?php echo e(route('admin.faq.update', $faqData->id)); ?>"
                                    enctype="multipart/form-data">
                                    <?php echo method_field('PUT'); ?>
                                <?php else: ?>
                                    <form method="post" action="<?php echo e(route('admin.faq.store')); ?>" enctype="multipart/form-data">
                            <?php endif; ?>
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="mb-3 col-lg-6 self">
                                    <label for="question" class="form-label">Question<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text required" name="question"
                                        value="<?php echo e(isset($faqData) ? $faqData->question : ''); ?>" placeholder="Question"
                                        id="question" required>
                                </div>
                                <div class="com-md-12 self">
                                    <label for="summernote" class="form-label">Answer<span class="text-danger">*</span></label>
                                    <textarea class="form-control"
                                        name="answer" id="summernote" required ><?php echo e(isset($faqData) ? $faqData->answer : ''); ?></textarea><br>
                                   
        
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-control" name="status" id='status'>
                                        <option
                                            value="1"<?php echo e(isset($faqData->status) && $faqData->status == 1 ? 'selected' : ''); ?>>
                                            Active</option>
                                        <option
                                            value="0"<?php echo e(isset($faqData->status) && $faqData->status == 0 ? 'selected' : ''); ?>>
                                            Inactive</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-lg-6 mt-4">
        
                                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                </div>
                            </div>
                            </form>
                            
                        </div> 
                        
                    </div>
                </div>
            </div>
        </div>
    </div>    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gbalz51c0wat/public_html/searchai.space/resources/views/admin/faq/create.blade.php ENDPATH**/ ?>