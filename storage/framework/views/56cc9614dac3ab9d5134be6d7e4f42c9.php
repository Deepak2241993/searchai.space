<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dilabs - Creative Digital Agency Template">

    <!-- ========== Page Title ========== -->
    <title>Search Ai</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="<?php echo e(url('/front-assets')); ?>/assets/img/logofavicon.png" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="<?php echo e(url('/front-assets')); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(url('/front-assets')); ?>/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo e(url('/front-assets')); ?>/assets/css/themify-icons.css" rel="stylesheet">
    <link href="<?php echo e(url('/front-assets')); ?>/assets/css/elegant-icons.css" rel="stylesheet">
    <link href="<?php echo e(url('/front-assets')); ?>/assets/css/flaticon-set.css" rel="stylesheet">
    <link href="<?php echo e(url('/front-assets')); ?>/assets/css/magnific-popup.css" rel="stylesheet">
    <link href="<?php echo e(url('/front-assets')); ?>/assets/css/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?php echo e(url('/front-assets')); ?>/assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo e(url('/front-assets')); ?>/assets/css/validnavs.css" rel="stylesheet">
    <link href="<?php echo e(url('/front-assets')); ?>/assets/css/helper.css" rel="stylesheet">
    <link href="<?php echo e(url('/front-assets')); ?>/assets/css/unit-test.css" rel="stylesheet">
    <link href="<?php echo e(url('/front-assets')); ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo e(url('/front-assets')); ?>/style.css" rel="stylesheet">
    <!-- ========== End Stylesheet ========== -->

</head>

<body>

    <!-- Preloader Start -->
    <?php if(route('checkout') != url()->current()): ?>
    <div class="se-pre-con"></div>
    <?php endif; ?>
    <!-- Preloader Ends -->


    <!-- Start Header Top 
    ============================================= -->
    <?php if (isset($component)) { $__componentOriginale280ba8d55bbd76e5ea71c9ba0fc94c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale280ba8d55bbd76e5ea71c9ba0fc94c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale280ba8d55bbd76e5ea71c9ba0fc94c5)): ?>
<?php $attributes = $__attributesOriginale280ba8d55bbd76e5ea71c9ba0fc94c5; ?>
<?php unset($__attributesOriginale280ba8d55bbd76e5ea71c9ba0fc94c5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale280ba8d55bbd76e5ea71c9ba0fc94c5)): ?>
<?php $component = $__componentOriginale280ba8d55bbd76e5ea71c9ba0fc94c5; ?>
<?php unset($__componentOriginale280ba8d55bbd76e5ea71c9ba0fc94c5); ?>
<?php endif; ?>
    <!-- End Header -->
			<?php echo $__env->yieldContent('main-body'); ?>
    <!-- Start Footer 
    ============================================= -->
    <?php if (isset($component)) { $__componentOriginal3c480fe32eca01afa89706656753ba58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3c480fe32eca01afa89706656753ba58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3c480fe32eca01afa89706656753ba58)): ?>
<?php $attributes = $__attributesOriginal3c480fe32eca01afa89706656753ba58; ?>
<?php unset($__attributesOriginal3c480fe32eca01afa89706656753ba58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3c480fe32eca01afa89706656753ba58)): ?>
<?php $component = $__componentOriginal3c480fe32eca01afa89706656753ba58; ?>
<?php unset($__componentOriginal3c480fe32eca01afa89706656753ba58); ?>
<?php endif; ?>
    <!-- End Footer -->
    
    <!-- jQuery Frameworks
    ============================================= -->
    
    <?php if (isset($component)) { $__componentOriginal1d30095d9a31623de772bc1c5e5aff6f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1d30095d9a31623de772bc1c5e5aff6f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front.front_footer_js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front.front_footer_js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1d30095d9a31623de772bc1c5e5aff6f)): ?>
<?php $attributes = $__attributesOriginal1d30095d9a31623de772bc1c5e5aff6f; ?>
<?php unset($__attributesOriginal1d30095d9a31623de772bc1c5e5aff6f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1d30095d9a31623de772bc1c5e5aff6f)): ?>
<?php $component = $__componentOriginal1d30095d9a31623de772bc1c5e5aff6f; ?>
<?php unset($__componentOriginal1d30095d9a31623de772bc1c5e5aff6f); ?>
<?php endif; ?>
    <?php echo $__env->yieldPushContent('script'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\searchai.space\resources\views/layouts/master.blade.php ENDPATH**/ ?>