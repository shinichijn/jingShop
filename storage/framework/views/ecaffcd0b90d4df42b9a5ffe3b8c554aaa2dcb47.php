<div class="breadcrumbs">
    <div class="breadcrumbs-container container">
        <div>
            <?php echo e($slot); ?>

        </div>
        <div>
            <?php echo $__env->make('partials.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div> <!-- end breadcrumbs -->
<?php /**PATH C:\Users\chris\Desktop\PHP\laravel-ecommerce-example-master\laravel-ecommerce-example-master\resources\views/components/breadcrumbs.blade.php ENDPATH**/ ?>