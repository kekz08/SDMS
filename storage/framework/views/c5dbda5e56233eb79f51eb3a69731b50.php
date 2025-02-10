<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        
        <title inertia><?php echo e(config('app.name', 'SDMS - Available Scholarships')); ?></title>

        <!-- App Favicon -->
        <link rel="shortcut icon" href="<?php echo e(asset('assets/images/SDMS.ico')); ?>">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

        <!-- Font Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icofont/1.0.1/css/icofont.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- Plugin Stylesheets -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/vendors.css')); ?>">

        <!-- App Style -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
        <link rel="stylesheet" href="assets/css/icofont.min.css">

        <!-- Additional Styles -->

        <!-- Laravel Breeze Scripts and Routes -->
        <?php echo app('Tighten\Ziggy\BladeRouteGenerator')->generate(); ?>
        <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"]); ?>
        <?php if (!isset($__inertiaSsrDispatched)) { $__inertiaSsrDispatched = true; $__inertiaSsrResponse = app(\Inertia\Ssr\Gateway::class)->dispatch($page); }  if ($__inertiaSsrResponse) { echo $__inertiaSsrResponse->head; } ?>
    </head>
    <body class="font-sans antialiased">
        <?php if (!isset($__inertiaSsrDispatched)) { $__inertiaSsrDispatched = true; $__inertiaSsrResponse = app(\Inertia\Ssr\Gateway::class)->dispatch($page); }  if ($__inertiaSsrResponse) { echo $__inertiaSsrResponse->body; } else { ?><div id="app" data-page="<?php echo e(json_encode($page)); ?>"></div><?php } ?>
            <!-- Bootstrap JavaScript and dependencies -->
    <!-- plugins -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/js/mychart.js"></script>
    <script src="assets/js/vendors.js"></script>
    <!-- custom app -->
    <script src="assets/js/app.js"></script>
    </body>
</html>
<?php /**PATH D:\xampp\htdocs\SDMS\SDMS\resources\views/app.blade.php ENDPATH**/ ?>