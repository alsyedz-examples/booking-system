<nav
    class="flex w-full justify-between items-center space-x-2">
    <div class="grow md:flex-none justify-between items-center">
        <a href="{{ route('home') }}" class="no-underline flex items-center">
            <img src="{{ asset('/favicon-96x96.png') }}" alt="{{ config('app.name') }}" class="h-12 py-1">
            <span class="ml-2 text-lg">{{ config('app.name') }}</span>
        </a>
    </div>
    <div class="md:grow justify-between items-center hidden md:block space-x-2">
        <div class="flex flex-row justify-center p-4 md:p-0 mt-0 font-medium border border-gray-100 rounded-lg">
            <x-nav-link :href="route('home')" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="#">Services</x-nav-link>
            <x-nav-link href="#">Contact</x-nav-link>
        </div>
    </div>
    <div class="flex justify-between items-center space-x-2">
        @auth
            <x-nav-link href="{{ route('profile.show') }}" :active="request()->is('profile')">Profile</x-nav-link>
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout.attempt') }}">
                @csrf
                <x-nav-link type="submit" class="border border-indigo-800 rounded-full hover:shadow-md px-6">Logout</x-nav-link>
            </form>
        @endauth
        @guest
            <x-nav-link href="{{ route('login.form') }}" :active="request()->is('login')">Login</x-nav-link>
        @endguest
    </div>
</nav>
