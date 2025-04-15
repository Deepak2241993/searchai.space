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

    /* Hero Section */
    .hero-section {
        background: linear-gradient(to right, #4a4a4a, #7a7a7a);
        color: white;
        padding: 40px 0;
        position: relative;
        overflow: hidden;
    }

    .hero-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 2;
    }

    .hero-content {
        max-width: 600px;
    }

    .hero-badge {
        display: inline-block;
        background-color: #f5a15d;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.9rem;
        margin-bottom: 20px;
    }

    .hero-title {
        font-size: 2.8rem;
        line-height: 1.2;
        margin-bottom: 20px;
    }

    .hero-description {
        font-size: 1.1rem;
        margin-bottom: 30px;
        opacity: 0.9;
    }

    /* Main Content Styles */
    .main-content {
        max-width: 1200px;
        margin: -40px auto 60px;
        padding: 0 20px;
        position: relative;
        z-index: 3;
    }

    .service-container {
        display: grid;
        grid-template-columns: 1fr;
        gap: 30px;
    }

    /* Service Details Card */
    .service-details-card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .service-image {
        height: 250px;
        position: relative;
        overflow: hidden;
    }

    .service-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .service-image::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.4));
    }

    .service-image .verification-badge {
        position: absolute;
        bottom: 20px;
        right: 20px;
        background-color: #4caf50;
        color: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        z-index: 2;
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
    }

    .service-content {
        padding: 25px 20px;
    }

    .service-title {
        font-size: 1.8rem;
        color: #333;
        margin-bottom: 15px;
    }

    .service-description {
        color: #666;
        margin-bottom: 25px;
    }

    /* Features Section */
    .features-section {
        margin-top: 30px;
        border-top: 1px solid #eee;
        padding-top: 30px;
    }

    .features-title {
        font-size: 1.4rem;
        margin-bottom: 20px;
        color: #333;
    }

    .features-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .feature-item {
        display: flex;
        align-items: flex-start;
    }

    .feature-icon {
        width: 40px;
        height: 40px;
        background-color: #e6f7e6;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        color: #4caf50;
        flex-shrink: 0;
    }

    .feature-text h4 {
        font-size: 1.1rem;
        margin-bottom: 5px;
        color: #333;
    }

    .feature-text p {
        font-size: 0.9rem;
        color: #666;
    }

    /* How It Works Section */
    .how-it-works {
        margin-top: 30px;
        border-top: 1px solid #eee;
        padding-top: 30px;
    }

    .how-it-works-title {
        font-size: 1.4rem;
        margin-bottom: 20px;
        color: #333;
    }

    .steps {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .step {
        display: flex;
        align-items: flex-start;
    }

    .step-number {
        width: 30px;
        height: 30px;
        background-color: #f5a15d;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin-right: 15px;
        flex-shrink: 0;
    }

    .step-content h4 {
        font-size: 1.1rem;
        margin-bottom: 5px;
        color: #333;
    }

    .step-content p {
        font-size: 0.9rem;
        color: #666;
    }

    /* Add to Cart Card */
    .add-to-cart-card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        padding: 25px 20px;
    }

    .card-header {
        border-bottom: 1px solid #eee;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }

    .card-title {
        font-size: 1.4rem;
        color: #333;
        margin-bottom: 5px;
    }

    .card-subtitle {
        color: #888;
        font-size: 0.9rem;
    }

    .quantity-selector {
        margin-bottom: 25px;
    }

    .quantity-label {
        display: block;
        margin-bottom: 10px;
        font-weight: 500;
        color: #333;
    }

    .quantity-controls {
        display: flex;
        align-items: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
        max-width: 200px;
    }

    .quantity-btn {
        width: 40px;
        height: 40px;
        background-color: #f5f5f5;
        border: none;
        font-size: 1.2rem;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .quantity-btn:hover {
        background-color: #e5e5e5;
    }

    .quantity-input {
        width: 60px;
        height: 40px;
        border: none;
        border-left: 1px solid #ddd;
        border-right: 1px solid #ddd;
        text-align: center;
        font-size: 1rem;
    }

    .total-section {
        margin-bottom: 25px;
        padding-top: 15px;
        border-top: 1px solid #eee;
    }

    .total-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .total-label {
        color: #666;
    }

    .total-value {
        font-weight: 500;
    }

    .total-price {
        font-size: 1.4rem;
        font-weight: bold;
        color: #333;
    }

    .add-to-cart-btn {
        background-color: #f5a15d;
        color: white;
        border: none;
        padding: 15px;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        display: block;
        width: 100%;
        text-align: center;
        text-decoration: none;
    }

    .add-to-cart-btn:hover {
        background-color: #e08e45;
    }

    .secure-note {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 15px;
        color: #888;
        font-size: 0.9rem;
    }

    .secure-note i {
        margin-right: 5px;
    }

    /* Responsive Styles */
    @media (min-width: 576px) {
        .service-content {
            padding: 30px;
        }
        
        .add-to-cart-card {
            padding: 30px;
        }
        
        .features-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 768px) {
        .hero-section {
            padding: 60px 0;
        }
        
        .main-content {
            margin: -60px auto 60px;
        }
        
        .service-image {
            height: 300px;
        }
    }

    @media (min-width: 992px) {
        .service-container {
            grid-template-columns: 2fr 1fr;
        }
        
        .add-to-cart-card {
            position: sticky;
            top: 20px;
        }
    }

    @media (max-width: 767px) {
        .hero-title {
            font-size: 1.8rem;
        }
        
        .hero-description {
            font-size: 1rem;
        }
        
        .service-title {
            font-size: 1.5rem;
        }
        
        .service-image .verification-badge {
            width: 40px;
            height: 40px;
            font-size: 16px;
        }
    }

    @media (max-width: 575px) {
        .plan-option {
            padding: 10px;
        }
        
        .plan-name {
            font-size: 0.9rem;
        }
        
        .plan-description {
            font-size: 0.8rem;
        }
        
        .plan-price {
            font-size: 0.9rem;
        }
        
        .feature-icon {
            width: 30px;
            height: 30px;
        }
        
        .feature-text h4 {
            font-size: 1rem;
        }
        
        .feature-text p {
            font-size: 0.8rem;
        }
    }
</style>
<main id="content">

        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-container">
                <div class="hero-content">
                    <span class="hero-badge">Verification Service</span>
                    <h1 class="hero-title"><?php echo e($services->name); ?></h1>
                    <p class="hero-description">
                        <?php echo $services->description; ?>

                    </p>
                </div>
            </div>
        </section>
    
        <!-- Main Content -->
        <main class="main-content">
            <div class="service-container">
                <!-- Service Details -->
                <div class="service-details-card">
                    <div class="service-image">
                        <img src="<?php echo e($services->images); ?>?height=500&width=800" alt="<?php echo $services->name; ?>">
                        <div class="verification-badge">✓</div>
                    </div>
                    <div class="service-content">
                        <h2 class="service-title"> <?php echo $services->name; ?></h2>
                        <p class="service-description">
                            <?php echo $services->long_description; ?>

                        </p>
                     
                        <!-- Features Section -->
                        <div class="features-section">
                            <h3 class="features-title">Key Features</h3>
                            <div class="features-grid">
                                <?php
                                $keyFeatures = isset($services->key_feature) ? json_decode($services->key_feature, true) : [['title' => '', 'description' => '']];
                            ?>
                            <?php $__currentLoopData = $keyFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="feature-item">
                                    <div class="feature-icon">✓</div>
                                    <div class="feature-text">
                                        <h4><?php echo e($feature['title'] ?? ''); ?></h4>
                                        <p><?php echo e($feature['description'] ?? ''); ?></p>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </div>
                        </div>
                        
                        <!-- How It Works Section -->
                        <div class="how-it-works">
                            <h3 class="how-it-works-title">How It Works</h3>
                            <div class="steps">
                                <?php
                                $howItWorks = isset($services->how_to_work) ? json_decode($services->how_to_work, true) : [['question' => '', 'answer' => '']];
                            ?>
                            <?php $__currentLoopData = $howItWorks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="step">
                                    <div class="step-number"><?php echo e($key+1); ?></div>
                                    <div class="step-content">
                                        <h4><?php echo e($step['question'] ?? ''); ?></h4>
                                        <p><?php echo e($step['answer'] ?? ''); ?></p>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Add to Cart Card -->
                <div class="add-to-cart-card" id="service-<?php echo e($services->id); ?>">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo $services->name; ?></h3>
                    </div>
                
                    <div class="quantity-selector">
                        <label class="quantity-label">Quantity</label>
                        <div class="quantity-controls">
                            <button class="quantity-btn minus" data-id="<?php echo e($services->id); ?>">-</button>
                            <input type="number" 
                                   class="quantity-input" 
                                   id="quantity-<?php echo e($services->id); ?>" 
                                   value="1" 
                                   min="1" 
                                   data-id="<?php echo e($services->id); ?>">
                            <button class="quantity-btn plus" data-id="<?php echo e($services->id); ?>">+</button>
                        </div>
                    </div>
                
                    <div class="total-section" data-id="<?php echo e($services->id); ?>">
                        <div class="total-row">
                            <span class="total-label">Plan Price</span>
                            <span class="total-value" id="unit-price-<?php echo e($services->id); ?>">₹<?php echo e(number_format($services->price, 2)); ?></span>
                        </div>
                        <div class="total-row">
                            <span class="total-label">Quantity</span>
                            <span class="total-value" id="quantity-text-<?php echo e($services->id); ?>">1</span>
                        </div>
                        <div class="total-row">
                            <span class="total-label">Total</span>
                            <span class="total-price" id="total-price-<?php echo e($services->id); ?>">₹<?php echo e(number_format($services->price, 2)); ?></span>
                        </div>
                    </div>
                
                    <a href="javascript:void(0);" 
                       class="add-to-cart-btn" 
                       data-id="<?php echo e($services->id); ?>" 
                       data-price="<?php echo e($services->price); ?>">
                       Add to Cart
                    </a>
                
                    <div class="secure-note">
                        <i>🔒</i> Secure checkout
                    </div>
                </div>
                
            </div>
        </main>
    
        <!-- JavaScript for Plan Selection and Quantity -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Attach click handlers to plus and minus buttons
                document.querySelectorAll('.quantity-btn').forEach(function(button) {
                    button.addEventListener('click', function() {
                        const serviceId = this.dataset.id;
                        const input = document.getElementById(`quantity-${serviceId}`);
                        let quantity = parseInt(input.value) || 1;
            
                        if (this.classList.contains('minus')) {
                            quantity = Math.max(1, quantity - 1);
                        } else if (this.classList.contains('plus')) {
                            quantity += 1;
                        }
            
                        input.value = quantity;
                        updateTotals(serviceId, quantity);
                    });
                });
            
                // Attach input change listener
                document.querySelectorAll('.quantity-input').forEach(function(input) {
                    input.addEventListener('change', function() {
                        const serviceId = this.dataset.id;
                        let quantity = Math.max(1, parseInt(this.value) || 1);
                        this.value = quantity;
                        updateTotals(serviceId, quantity);
                    });
                });
            
                function updateTotals(serviceId, quantity) {
                    const price = parseFloat(document.querySelector(`.add-to-cart-btn[data-id="${serviceId}"]`).dataset.price);
            
                    const total = price * quantity;
            
                    document.getElementById(`quantity-text-${serviceId}`).textContent = quantity;
                    document.getElementById(`total-price-${serviceId}`).textContent = '₹' + total.toLocaleString('en-IN', { minimumFractionDigits: 2 });
                    document.getElementById(`unit-price-${serviceId}`).textContent = '₹' + price.toLocaleString('en-IN', { minimumFractionDigits: 2 });
                }
            });
            </script>
            


    </main>
    
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script>
    $(document).ready(function () {
        $('.add-to-cart-btn').on('click', function (e) {
            e.preventDefault();
    
            let button = $(this);
            let serviceId = button.data('id');
            let price = button.data('price');
    
            // Find the quantity input in the same .add-to-cart-card
            let quantity = button.closest('.add-to-cart-card').find('.quantity-input').val();
    
            $.ajax({
                url: '<?php echo e(route("cart.add")); ?>',
                method: 'POST',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    service_id: serviceId,
                    tokens: quantity,
                    pricePerItem: price
                },
                success: function (response) {
                    // Redirect to cart page
                    window.location.href = '<?php echo e(route("cart.index")); ?>';
                },
                error: function (xhr) {
                    alert('Something went wrong. Please try again!');
                }
            });
        });
    });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\searchai.space\resources\views/frontend/services.blade.php ENDPATH**/ ?>