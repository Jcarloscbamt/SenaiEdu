<nav class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            {{-- Logo / Brand --}}
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="text-lg font-semibold">Meu App</a>
            </div>

            {{-- Botão de menu mobile --}}
            <div class="sm:hidden">
                <button @click="open = !open" class="text-gray-400 hover:text-white focus:outline-none focus:text-white" aria-label="Menu">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            {{-- Menu Desktop --}}
            <div class="hidden sm:flex sm:items-center space-x-6">
                <a href="{{ route('home') }}" class="hover:text-gray-300 {{ request()->routeIs('home') ? 'text-blue-400 font-bold' : '' }}">Home</a>
                @auth
                <a href="{{ route('colaboradores') }}" class="hover:text-gray-300 {{ request()->routeIs('colaboradores') ? 'text-blue-400 font-bold' : '' }}">Colaboradores</a>
                <a href="{{ route('cargos') }}" class="hover:text-gray-300 {{ request()->routeIs('cargos') ? 'text-blue-400 font-bold' : '' }}">Cargos</a>
                <a href="{{ route('Professor') }}" class="hover:text-gray-300 {{ request()->routeIs('cargos') ? 'text-blue-400 font-bold' : '' }}">Professor</a>
                <a href="{{ route('profile') }}" class="hover:text-gray-300 {{ request()->routeIs('profile') ? 'text-blue-400 font-bold' : '' }}">
                    Perfil
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); this.closest('form').submit();"
                    class="text-red-600 hover:underline">
                        Sair
                    </a>
                </form>
                @endauth
                @guest
                <a href="{{ route('login') }}" class="hover:text-gray-300 {{ request()->routeIs('login') ? 'text-blue-400 font-bold' : '' }}">Login</a>
                <a href="{{ route('register') }}" class="hover:text-gray-300 {{ request()->routeIs('register') ? 'text-blue-400 font-bold' : '' }}">Cadastre-se</a>
                @endguest
            </div>
        </div>
    </div>

    {{-- Menu Mobile Responsivo --}}
    <div x-data="{ open: false }" x-show="open" class="sm:hidden px-4 pb-4">
        <a href="{{ route('home') }}" class="block py-2 hover:text-gray-300 {{ request()->routeIs('home') ? 'text-blue-400 font-bold' : '' }}">Home</a>
        <a href="{{ route('colaboradores') }}" class="block py-2 hover:text-gray-300 {{ request()->routeIs('colaboradores') ? 'text-blue-400 font-bold' : '' }}">Colaboradores</a>
        <a href="{{ route('cargos') }}" class="block py-2 hover:text-gray-300 {{ request()->routeIs('cargos') ? 'text-blue-400 font-bold' : '' }}">Cargos</a>
        <a href="{{ route('login') }}" class="block py-2 hover:text-gray-300 {{ request()->routeIs('login') ? 'text-blue-400 font-bold' : '' }}">Login</a>
        <a href="{{ route('register') }}" class="block py-2 hover:text-gray-300 {{ request()->routeIs('register') ? 'text-blue-400 font-bold' : '' }}">Cadastre-se</a>
    </div>
</nav>
