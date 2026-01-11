<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e($title ?? 'NORDEAN - Isolgomma Türkiye Distribütörü | Ses ve Titreşim Yalıtımı'); ?></title>
    <meta name="description" content="İtalyan Isolgomma ses ve titreşim yalıtım malzemelerinin Türkiye'deki tek yetkili ithalatçısı ve distribütörü.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/icon-light-32x32.png')); ?>" media="(prefers-color-scheme: light)">
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/icon-dark-32x32.png')); ?>" media="(prefers-color-scheme: dark)">
    <link rel="icon" type="image/svg+xml" href="<?php echo e(asset('images/icon.svg')); ?>">

    <!-- Styles -->
    <?php if(config('app.env') === 'local' && !file_exists(public_path('build/manifest.json'))): ?>
        <!-- Development CDN fallback -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: {
                                DEFAULT: '#B83226',
                                foreground: '#ffffff',
                            },
                            secondary: {
                                DEFAULT: '#1e293b',
                                foreground: '#ffffff',
                            },
                        }
                    }
                }
            }
        </script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <!-- Pristine.js for form validation -->
        <script src="https://cdn.jsdelivr.net/npm/pristinejs@0.1.9/dist/pristine.min.js"></script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
            body { font-family: 'Inter', sans-serif; }

            /* Pristine validation styles */
            .form-field {
                position: relative;
            }
            .pristine-error {
                color: #dc2626;
                font-size: 0.875rem;
                margin-top: 0.5rem;
                display: block;
            }
            .has-danger input,
            .has-danger select,
            .has-danger textarea {
                border-color: #dc2626 !important;
                background-color: #fef2f2 !important;
            }
            .has-success input,
            .has-success select,
            .has-success textarea {
                border-color: #16a34a !important;
            }
        </style>
    <?php else: ?>
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="antialiased bg-white text-gray-900">
    <!-- Header -->
    <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Main Content -->
    <main class="pt-16">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer -->
    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>

    <!-- Smooth Scroll Navigation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle smooth scroll for all navigation links
            document.querySelectorAll('a.nav-link[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);

                    if (targetElement) {
                        const headerOffset = 64; // Height of fixed header
                        const elementPosition = targetElement.getBoundingClientRect().top;
                        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                        window.scrollTo({
                            top: offsetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\nordean.com.tr\resources\views/layouts/app.blade.php ENDPATH**/ ?>