
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles & Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="font-sans text-gray-900 antialiased bg-light">
    <?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div class="min-h-screen d-flex flex-column justify-content-center align-items-center pt-4 sm:pt-0 bg-light">

        
        <div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-[420px] mt-4 px-4 py-5 shadow rounded bg-white">
        <?php echo e($slot); ?>

    </div>
</div>
    </div>
</body>
</html><?php /**PATH D:\repositoriosLsv\laravel12-livewire-crud\resources\views/layouts/guest.blade.php ENDPATH**/ ?>