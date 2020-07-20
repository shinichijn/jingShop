<?php $__env->startSection('title', $product->name); ?>

<?php $__env->startSection('extra-css'); ?>
 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumbs'); ?>
        <a href="/">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span><a href="<?php echo e(route('shop.index')); ?>">Shop</a></span>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span><?php echo e($product->name); ?></span>
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

    <div class="product-section container">
        <div>
            <div class="product-section-image">
                <img src="<?php echo e(productImage($product->image)); ?>" alt="product" class="active" id="currentImage">
            </div>
            <div class="product-section-images">
                <div class="product-section-thumbnail selected">
                    <img src="<?php echo e(productImage($product->image)); ?>" alt="product">
                </div>

                <?php if($product->images): ?>
                    <?php $__currentLoopData = json_decode($product->images, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="product-section-thumbnail">
                        <img src="<?php echo e(productImage($image)); ?>" alt="product">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="product-section-information">
            <h1 class="product-section-title"><?php echo e($product->name); ?></h1>
            <div class="product-section-subtitle"><?php echo e($product->details); ?></div>
            <div><?php echo $stockLevel; ?></div>
            <div class="product-section-price"><?php echo e($product->presentPrice()); ?></div>

            <p>
                <?php echo $product->description; ?>

            </p>

            <p>&nbsp;</p>

            <?php if($product->quantity > 0): ?>
                <form action="<?php echo e(route('cart.store', $product)); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <button type="submit" class="button button-plain">Add to Cart</button>
                </form>
            <?php endif; ?>
        </div>
    </div> <!-- end product-section -->

    <?php echo $__env->make('partials.might-like', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <script>
        (function(){
            const currentImage = document.querySelector('#currentImage');
            const images = document.querySelectorAll('.product-section-thumbnail');

            images.forEach((element) => element.addEventListener('click', thumbnailClick));

            function thumbnailClick(e) {
                currentImage.classList.remove('active');

                currentImage.addEventListener('transitionend', () => {
                    currentImage.src = this.querySelector('img').src;
                    currentImage.classList.add('active');
                })

                images.forEach((element) => element.classList.remove('selected'));
                this.classList.add('selected');
            }

        })();
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\chris\Desktop\PHP\laravel-ecommerce-example-master\laravel-ecommerce-example-master\resources\views/product.blade.php ENDPATH**/ ?>