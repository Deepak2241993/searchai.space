<!DOCTYPE html>
<html>
<head>
    <title>Token Purchase Details</title>
    <style>
        .token-table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            margin-top: 20px;
        }
        .token-table th, .token-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        .token-table th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }
        .token-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .token-table tr:hover {
            background-color: #ddd;
        }
        .token-table td {
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Token Purchase Details</h1>
    <p><strong>Name:</strong> <?php echo e($user->name); ?></p>
    <p><strong>Email:</strong> <?php echo e($user->email); ?></p>

    <h3>Tokens Purchased:</h3>
    
    
    <table class="token-table">
        <thead>
            <tr>
                <th>Token</th>
                <th>Service</th>
                <th>Expiry</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $tokens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $token): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($token->token); ?></td>
                    <td><?php echo e($token->service_type); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($token->expires_at)->format('d-m-Y')); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    
    
</body>
</html>
<?php /**PATH /home/gbalz51c0wat/public_html/searchai.space/resources/views/emails/tokens.blade.php ENDPATH**/ ?>