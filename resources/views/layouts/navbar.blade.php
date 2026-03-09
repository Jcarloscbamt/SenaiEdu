<nav class="bg-gray-900 text-white [&_a]:text-white [&_a:hover]:text-gray-300 [&_a]:no-underline">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            {{-- Logo / Marca --}}
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="text-lg font-semibold">EDUSENAI</a>
            </div>

            {{-- Botão do menu mobile --}}
            <div class="sm:hidden" x-data="{ open: false }">
                <button @click="open = !open" 
                        class="text-gray-400 hover:text-white focus:outline-none focus:text-white" 
                        aria-label="Menu">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" 
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            {{-- Menu Desktop --}}
            <div class="hidden sm:flex sm:items-center space-x-6">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'font-bold' : '' }}">Home</a>

                @auth
                    <a href="{{ route('professor') }}" class="{{ request()->routeIs('professor') ? 'font-bold' : '' }}">Professor</a>
                    <a href="{{ route('feriados') }}" class="{{ request()->routeIs('feriados') ? 'font-bold' : '' }}">Feriados</a>
                    <a href="{{ route('turma') }}" class="{{ request()->routeIs('turma') ? 'font-bold' : '' }}">Turma</a>
                    <a href="{{ route('disciplina') }}" class="{{ request()->routeIs('disciplina') ? 'font-bold' : '' }}">Disciplina</a>
                    <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'font-bold' : '' }}">Perfil</a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); this.closest('form').submit();"
                           class="text-red-500 hover:text-red-400 font-semibold">
                            Sair
                        </a>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'font-bold' : '' }}">Login</a>
                    <a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'font-bold' : '' }}">Cadastre-se</a>
                @endguest
            </div>
        </div>
    </div>

    {{-- Menu Mobile Responsivo --}}
    <div x-data="{ open: false }" x-show="open" class="sm:hidden px-4 pb-4 space-y-2">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'font-bold' : '' }}">Home</a>
        @auth
            <a href="{{ route('colaboradores') }}" class="{{ request()->routeIs('colaboradores') ? 'font-bold' : '' }}">Colaboradores</a>
            <a href="{{ route('cargos') }}" class="{{ request()->routeIs('cargos') ? 'font-bold' : '' }}">Cargos</a>
            <a href="{{ route('professor') }}" class="{{ request()->routeIs('professor') ? 'font-bold' : '' }}">Professor</a>
            <a href="{{ route('feriados') }}" class="{{ request()->routeIs('feriados') ? 'font-bold' : '' }}">Feriados</a>
            <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'font-bold' : '' }}">Perfil</a>
            <a href="{{ route('turma') }}" class="{{ request()->routeIs('turma') ? 'font-bold' : '' }}">Turma</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); this.closest('form').submit();"
                   class="text-red-500 hover:text-red-400 font-semibold block">
                    Sair
                </a>
            </form>
        @endauth

        @guest
            <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'font-bold' : '' }}">Login</a>
            <a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'font-bold' : '' }}">Cadastre-se</a>
        @endguest
    </div>
</nav>
