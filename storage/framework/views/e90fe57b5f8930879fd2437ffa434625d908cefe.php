<?php $__env->startSection('title', 'Products'); ?>

<?php $__env->startSection('extra-css'); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumbs'); ?>
        <a href="/">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>Shop</span>
    <?php echo $__env->renderComponent(); ?>

    <div class="container">
        <?php if(session()->has('success_message')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('success_message')); ?>

            </div>
        <?php endif; ?>

        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>

    <div class="products-section container">
        <div class="sidebar">
            <h3>By Category</h3>
            <ul>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="<?php echo e(setActiveCategory($category->slug)); ?>"><a href="<?php echo e(route('shop.index', ['category' => $category->slug])); ?>"><?php echo e($category->name); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div> <!-- end sidebar -->
        <div>
            <div class="products-header">
                <h1 class="stylish-heading"><?php echo e($categoryName); ?></h1>
                <div>
                    <strong>Price: </strong>
                    <a href="<?php echo e(route('shop.index', ['category'=> request()->category, 'sort' => 'low_high'])); ?>">Low to High</a> |
                    <a href="<?php echo e(route('shop.index', ['category'=> request()->category, 'sort' => 'high_low'])); ?>">High to Low</a>

                </div>
            </div>

            <div class="products text-center">
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="product">
                        <a href="<?php echo e(route('shop.show', $product->slug)); ?>"><img src="<?php echo e(productImage($product->image)); ?>" alt="product"></a>
                        <a href="<?php echo e(route('shop.show', $product->slug)); ?>"><div class="product-name"><?php echo e($product->name); ?></div></a>
                        <div class="product-price"><?php echo e($product->presentPrice()); ?></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div style="text-align: left">No items found</div>
                <?php endif; ?>
            </div> <!-- end products -->

            <div class="spacer"></div>
            <?php echo e($products->appends(request()->input())->links()); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\chris\Desktop\PHP\laravel-ecommerce-example-master\laravel-ecommerce-example-master\resources\views/shop.blade.php ENDPATH**/ ?>