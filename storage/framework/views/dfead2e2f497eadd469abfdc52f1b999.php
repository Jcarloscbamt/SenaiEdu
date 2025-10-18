<nav class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            
            <div class="flex-shrink-0">
                <a href="<?php echo e(route('home')); ?>" class="text-lg font-semibold">Meu App</a>
            </div>

            
            <div class="sm:hidden">
                <button @click="open = !open" class="text-gray-400 hover:text-white focus:outline-none focus:text-white" aria-label="Menu">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            
            <div class="hidden sm:flex sm:items-center space-x-6">
                <a href="<?php echo e(route('home')); ?>" class="hover:text-gray-300 <?php echo e(request()->routeIs('home') ? 'text-blue-400 font-bold' : ''); ?>">Home</a>
                <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(route('colaboradores')); ?>" class="hover:text-gray-300 <?php echo e(request()->routeIs('colaboradores') ? 'text-blue-400 font-bold' : ''); ?>">Colaboradores</a>
                <a href="<?php echo e(route('cargos')); ?>" class="hover:text-gray-300 <?php echo e(request()->routeIs('cargos') ? 'text-blue-400 font-bold' : ''); ?>">Cargos</a>
                <a href="<?php echo e(route('profile')); ?>" class="hover:text-gray-300 <?php echo e(request()->routeIs('profile') ? 'text-blue-400 font-bold' : ''); ?>">
                    Perfil
                </a>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <a href="<?php echo e(route('logout')); ?>"
                    onclick="event.preventDefault(); this.closest('form').submit();"
                    class="text-red-600 hover:underline">
                        Sair
                    </a>
                </form>
                <?php endif; ?>
                <?php if(auth()->guard()->guest()): ?>
                <a href="<?php echo e(route('login')); ?>" class="hover:text-gray-300 <?php echo e(request()->routeIs('login') ? 'text-blue-400 font-bold' : ''); ?>">Login</a>
                <a href="<?php echo e(route('register')); ?>" class="hover:text-gray-300 <?php echo e(request()->routeIs('register') ? 'text-blue-400 font-bold' : ''); ?>">Cadastre-se</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    
    <div x-data="{ open: false }" x-show="open" class="sm:hidden px-4 pb-4">
        <a href="<?php echo e(route('home')); ?>" class="block py-2 hover:text-gray-300 <?php echo e(request()->routeIs('home') ? 'text-blue-400 font-bold' : ''); ?>">Home</a>
        <a href="<?php echo e(route('colaboradores')); ?>" class="block py-2 hover:text-gray-300 <?php echo e(request()->routeIs('colaboradores') ? 'text-blue-400 font-bold' : ''); ?>">Colaboradores</a>
        <a href="<?php echo e(route('cargos')); ?>" class="block py-2 hover:text-gray-300 <?php echo e(request()->routeIs('cargos') ? 'text-blue-400 font-bold' : ''); ?>">Cargos</a>
        <a href="<?php echo e(route('login')); ?>" class="block py-2 hover:text-gray-300 <?php echo e(request()->routeIs('login') ? 'text-blue-400 font-bold' : ''); ?>">Login</a>
        <a href="<?php echo e(route('register')); ?>" class="block py-2 hover:text-gray-300 <?php echo e(request()->routeIs('register') ? 'text-blue-400 font-bold' : ''); ?>">Cadastre-se</a>
    </div>
</nav>
<?php /**PATH D:\repositoriosLsv\laravel12-livewire-crud\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>