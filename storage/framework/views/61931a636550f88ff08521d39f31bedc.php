
<?php $__env->startSection('main-body'); ?>
  <style>
    .thank-you-box {
      background: #ffffff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      text-align: center;
      width: 100%;
    }
    .thank-you-box img {
      max-width: 120px;
      margin-bottom: 20px;
    }
    .thank-you-box h1 {
      color: #333;
      margin-bottom: 10px;
    }
    .thank-you-box p {
      color: #666;
      font-size: 16px;
    }
    .thank-you-box a.button {
      display: inline-block;
      margin-top: 30px;
      padding: 12px 24px;
      background-color: #007bff;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      font-weight: bold;
    }
    .thank-you-box a.button:hover {
      background-color: #0056b3;
    }
  </style>

  <div class="thank-you-box">
    <!-- Company Logo -->

    <!-- Message -->
    <h1>Thank You for Subscribing!</h1>
    <p>You’ve successfully joined our newsletter. 🎉<br>
    We'll keep you updated with the latest news, offers, and exclusive content.</p>

  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\searchai.space\resources\views/frontend/thankyou.blade.php ENDPATH**/ ?>