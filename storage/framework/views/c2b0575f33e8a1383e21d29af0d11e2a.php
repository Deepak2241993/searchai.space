<?php $__env->startSection('page-title'); ?>
    Cart
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-description'); ?>
    Cart
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('page-keywords'); ?>
    Cart
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-body'); ?>
<style>
    /* Reset and Base Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background-color: #f5f5f7;
        color: #333;
        line-height: 1.6;
    }

    /* Page Title */
    .page-title-section {
        background: linear-gradient(to right, #4a4a4a, #7a7a7a);
        color: white;
        padding: 30px 0;
    }

    .page-title-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .page-title {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .breadcrumbs {
        display: flex;
        align-items: center;
        font-size: 0.9rem;
        opacity: 0.8;
    }

    .breadcrumbs a {
        color: white;
        text-decoration: none;
    }

    .breadcrumbs a:hover {
        text-decoration: underline;
    }

    .breadcrumbs .separator {
        margin: 0 10px;
    }

    /* Main Content */
    .main-content {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .cart-container {
        display: grid;
        grid-template-columns: 1fr;
        gap: 30px;
    }

    /* Cart Items */
    .cart-items-card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .card-header {
        padding: 20px;
        border-bottom: 1px solid #eee;
    }

    .card-title {
        font-size: 1.4rem;
        color: #333;
        display: flex;
        align-items: center;
    }

    .card-content {
        padding: 0;
    }

    .cart-item {
        display: flex;
        padding: 20px;
        border-bottom: 1px solid #eee;
        position: relative;
    }

    .cart-item:last-child {
        border-bottom: none;
    }

    .item-image {
        width: 100px;
        height: 100px;
        border-radius: 5px;
        overflow: hidden;
        margin-right: 20px;
        flex-shrink: 0;
    }

    .item-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .item-details {
        flex-grow: 1;
    }

    .item-name {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .item-description {
        font-size: 0.9rem;
        color: #777;
        margin-bottom: 15px;
        max-width: 600px;
    }

    .item-actions {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .quantity-controls {
        display: flex;
        align-items: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
    }

    .quantity-btn {
        width: 36px;
        height: 36px;
        background-color: #f5f5f5;
        border: none;
        font-size: 1.1rem;
        cursor: pointer;
        transition: background-color 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .quantity-btn:hover {
        background-color: #e5e5e5;
    }

    .quantity-input {
        width: 50px;
        height: 36px;
        border: none;
        border-left: 1px solid #ddd;
        border-right: 1px solid #ddd;
        text-align: center;
        font-size: 0.95rem;
    }

    .remove-btn {
        background: none;
        border: none;
        color: #f5a15d;
        font-size: 0.9rem;
        cursor: pointer;
        display: flex;
        align-items: center;
    }

    .remove-btn:hover {
        text-decoration: underline;
    }

    .remove-icon {
        margin-right: 5px;
    }

    .item-price {
        font-size: 1.2rem;
        font-weight: 600;
        color: #333;
        margin-left: auto;
        align-self: center;
    }

    .empty-cart {
        padding: 40px 20px;
        text-align: center;
    }

    .empty-cart-icon {
        font-size: 3rem;
        color: #ddd;
        margin-bottom: 20px;
    }

    .empty-cart-message {
        font-size: 1.2rem;
        color: #777;
        margin-bottom: 30px;
    }

    /* Cart Summary */
    .cart-summary-card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .summary-content {
        padding: 20px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    .summary-row:last-of-type {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #eee;
    }

    .summary-label {
        color: #666;
    }

    .summary-value {
        font-weight: 500;
    }

    .grand-total {
        font-size: 1.3rem;
        font-weight: 700;
        color: #333;
    }

    .coupon-section {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #eee;
    }

    .coupon-title {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .coupon-form {
        display: flex;
    }

    .coupon-input {
        flex-grow: 1;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-right: none;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        font-size: 0.95rem;
    }

    .coupon-input:focus {
        outline: none;
        border-color: #5AACCE;
    }

    .coupon-btn {
        padding: 0 15px;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s;
    }

    .coupon-btn:hover {
        background-color: #e5e5e5;
    }

    /* Buttons */
    .btn {
        display: inline-block;
        padding: 12px 25px;
        font-size: 1rem;
        font-weight: 600;
        text-align: center;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s;
        border: none;
        text-decoration: none;
    }

    .btn-primary {
        background-color: #f5a15d;
        color: white;
    }

    .btn-primary:hover {
        background-color: #e08e45;
    }

    .btn-outline {
        background-color: transparent;
        border: 1px solid #ddd;
        color: #666;
    }

    .btn-outline:hover {
        border-color: #5AACCE;
        color: #5AACCE;
    }

    .btn-block {
        display: block;
        width: 100%;
    }

    .cart-actions {
        margin-top: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    /* Responsive Styles */
    @media (min-width: 992px) {
        .cart-container {
            grid-template-columns: 2fr 1fr;
        }
        
        .cart-summary-card {
            position: sticky;
            top: 20px;
            align-self: start;
        }
    }

    @media (max-width: 767px) {
        .page-title {
            font-size: 1.6rem;
        }
        
        .cart-item {
            flex-direction: column;
        }
        
        .item-image {
            width: 80px;
            height: 80px;
            margin-bottom: 15px;
        }
        
        .item-actions {
            margin-top: 15px;
            width: 100%;
            justify-content: space-between;
        }
        
        .item-price {
            position: absolute;
            top: 20px;
            right: 20px;
            margin-left: 0;
        }
        
        .cart-actions {
            flex-direction: column;
        }
        
        .cart-actions .btn {
            width: 100%;
        }
    }

    @media (max-width: 575px) {
        .card-title {
            font-size: 1.2rem;
        }
        
        .item-name {
            font-size: 1.1rem;
            padding-right: 70px;
        }
        
        .item-description {
            font-size: 0.85rem;
        }
    }
</style>
<!-- Page Title -->
<section class="page-title-section">
    <div class="page-title-container">
        <h1 class="page-title">Shopping Cart</h1>
        <div class="breadcrumbs">
            <a href="#">Home</a>
            <span class="separator">›</span>
            <a href="#">Services</a>
            <span class="separator">›</span>
            <span>Cart</span>
        </div>
    </div>
</section>

<!-- Main Content -->
<main class="main-content">
    <div class="cart-container">
        <!-- Cart Items -->
        <div class="cart-items-card">
            <div class="card-header">
                <h2 class="card-title">Your Cart (<?php echo e(count($cart)); ?> items)</h2>
            </div>
            <div class="card-content">
                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(is_array($item)): ?>
                        <?php
                            $service_data = App\Models\Service::find($item['service_id']);
                            $itemId = $item['id'];
                        ?>
                        <div class="cart-item" id="cart-item-<?php echo e($itemId); ?>">
                            <div class="item-image">
                                <img src="<?php echo e($service_data->images); ?>?height=100&width=100" alt="<?php echo e($service_data->name); ?>">
                            </div>
                            <div class="item-details">
                                <h3 class="item-name"><?php echo e($service_data->name); ?></h3>
                                <p class="item-description"><?php echo e($service_data->short_description); ?></p>
                                <div class="item-actions">
                                    <div class="quantity-controls">
                                        <button class="quantity-btn" onclick="updateQuantity('<?php echo e($itemId); ?>', -1)">-</button>
                                        <input type="number" class="quantity-input" value="<?php echo e($item['tokens']); ?>" min="1" id="quantity-<?php echo e($itemId); ?>" onchange="updateItemTotal('<?php echo e($itemId); ?>')">
                                        <button class="quantity-btn" onclick="updateQuantity('<?php echo e($itemId); ?>', 1)">+</button>
                                    </div>
                                    <button class="remove-btn" onclick="removeItem('<?php echo e($itemId); ?>')">
                                        <span class="remove-icon">🗑️</span> Remove
                                    </button>
                                </div>
                            </div>
                            <div class="item-price" id="price-<?php echo e($itemId); ?>">₹<?php echo e($item['tokens'] * $item['pricePerItem']); ?></div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                <!-- Empty Cart State -->
                <div class="empty-cart" style="display: none;" id="empty-cart">
                    <div class="empty-cart-icon">🛒</div>
                    <h3 class="empty-cart-message">Your cart is empty</h3>
                    <a href="#" class="btn btn-primary">Browse Services</a>
                </div>
            </div>
        </div>
        
        
        <!-- Cart Summary -->
        <div class="cart-summary-card">
            <div class="card-header">
                <h2 class="card-title">Order Summary</h2>
            </div>
            <div class="summary-content">
                <div class="summary-row">
                    <span class="summary-label">Subtotal</span>
                    <span class="summary-value" id="subtotal">₹<?php echo e(number_format($subtotal, 2)); ?></span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">GST (18%)</span>
                    <span class="summary-value" id="tax">₹<?php echo e(number_format($tax, 2)); ?></span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Grand Total</span>
                    <span class="summary-value grand-total" id="total">₹<?php echo e(number_format($total, 2)); ?></span>
                </div>
        
                <form id="place-order-form" action="<?php echo e(route('checkout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="cart" value="<?php echo e(json_encode($cart)); ?>">
                    <input type="hidden" name="subtotal" value="<?php echo e($subtotal); ?>">
                    <input type="hidden" name="tax" value="<?php echo e($subtotal * 0.18); ?>">
                    <input type="hidden" name="total" value="<?php echo e($total + $subtotal * 0.18); ?>">
                    <button type="submit" class="btn btn-success btn-block" style="margin-top: 20px;">Place Order</button>
                </form>
        
                <p style="margin-top: 15px; font-size: 0.9rem; color: #777; text-align: center;">
                    Need help? Contact us at <a href="mailto:care@searchai.com" style="color: #5AACCE;">care@searchai.com</a>
                </p>
            </div>
        </div>
        
    </div>
    
    <div class="cart-actions">
        <a href="<?php echo e(url('/')); ?>" class="btn btn-outline">← Continue Shopping </a>
        <form id="place-order-form" action="<?php echo e(route('checkout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="cart" value="<?php echo e(json_encode($cart)); ?>">
            <input type="hidden" name="subtotal" value="<?php echo e($subtotal); ?>">
            <input type="hidden" name="tax" value="<?php echo e($subtotal * 0.18); ?>">
            <input type="hidden" name="total" value="<?php echo e($total + $subtotal * 0.18); ?>">
            <button type="submit" class="btn btn-success btn-block" style="margin-top: 20px;">Place Order</button>
        </form>
        
    </div>
</main>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<!-- JavaScript for Cart Functionality -->
<script>
    // 1. Dynamically fetch item prices from Blade
    const itemPrices = {
        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(is_array($item)): ?>
                "<?php echo e($item['id']); ?>": <?php echo e($item['pricePerItem']); ?>,
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    };

    // 2. Update quantity with +/- buttons
    function updateQuantity(itemId, change) {
        const input = document.getElementById(`quantity-${itemId}`);
        let quantity = parseInt(input.value) || 1;
        quantity = Math.max(1, quantity + change);
        input.value = quantity;
        updateItemTotal(itemId);
    }

    // 3. Recalculate item total when quantity changes
    function updateItemTotal(itemId) {
        const input = document.getElementById(`quantity-${itemId}`);
        const quantity = parseInt(input.value) || 1;
        const unitPrice = itemPrices[itemId] || 0;
        const price = unitPrice * quantity;
        const priceElement = document.getElementById(`price-${itemId}`);
        priceElement.textContent = '₹' + price.toLocaleString('en-IN');
        updateCartTotals();
    }

    // 4. Remove item from cart with animation and backend update
    function removeItem(itemId) {
        const cartItem = document.getElementById(`cart-item-${itemId}`);
        cartItem.style.transition = 'all 0.3s ease';

        setTimeout(() => {
            cartItem.style.opacity = '0';
            cartItem.style.height = '0';
            cartItem.style.margin = '0';
            cartItem.style.padding = '0';
        }, 10);

        $.ajax({
            url: `<?php echo e(route('cart.remove', '')); ?>/${itemId}`,
            method: 'POST',
            data: {
                _token: '<?php echo e(csrf_token()); ?>'
            },
            success: function () {
                setTimeout(() => {
                    cartItem.remove();
                    updateCartCount();
                    updateCartTotals();

                    const remaining = document.querySelectorAll('.cart-item').length;
                    if (remaining === 0) {
                        document.getElementById('empty-cart').style.display = 'block';
                    }
                }, 300);
            },
            error: function () {
                alert('Failed to remove item from cart.');
            }
        });
    }

    // 5. Update total items count in header
    function updateCartCount() {
        const count = document.querySelectorAll('.cart-item').length;
        const cartTitle = document.querySelector('.card-title');
        cartTitle.textContent = `Your Cart (${count} item${count !== 1 ? 's' : ''})`;
    }

    // 6. Update subtotal, GST and grand total
    function updateCartTotals() {
        let subtotal = 0;
        document.querySelectorAll('.item-price').forEach(el => {
            const raw = el.textContent.replace(/[^\d]/g, '');
            subtotal += parseInt(raw) || 0;
        });

        const tax = subtotal * 0.18;
        const grandTotal = subtotal + tax;

        document.getElementById('subtotal').textContent = '₹' + subtotal.toLocaleString('en-IN');
        document.getElementById('tax').textContent = '₹' + tax.toFixed(2).toLocaleString('en-IN');
        document.getElementById('total').textContent = '₹' + grandTotal.toFixed(2).toLocaleString('en-IN');
    }

    // 7. Init: Update totals on load
    document.addEventListener('DOMContentLoaded', () => {
        updateCartTotals();
        updateCartCount();
    });


</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\searchai.space\resources\views/frontend/cart.blade.php ENDPATH**/ ?>