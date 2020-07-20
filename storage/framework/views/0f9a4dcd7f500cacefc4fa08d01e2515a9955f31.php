<ul>
    <?php if(auth()->guard()->guest()): ?>
    <li><a href="<?php echo e(route('register')); ?>">Sign Up</a></li>
    <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
    <?php else: ?>
    <li>
        <a href="<?php echo e(route('users.edit')); ?>">My Account</a>
    </li>
    <li>
        <a href="<?php echo e(route('logout')); ?>"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>
    </li>

    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
        <?php echo e(csrf_field()); ?>

    </form>
    <?php endif; ?>
    <li><a href="<?php echo e(route('cart.index')); ?>">Cart
    <?php if(Cart::instance('default')->count() > 0): ?>
    <span class="cart-count"><span><?php echo e(Cart::instance('default')->count()); ?></span></span>
    <?php endif; ?>
    </a></li>
    
</ul>
<?php /**PATH C:\Users\chris\Desktop\PHP\laravel-ecommerce-example-master\laravel-ecommerce-example-master\resources\views/partials/menus/main-right.blade.php ENDPATH**/ ?>