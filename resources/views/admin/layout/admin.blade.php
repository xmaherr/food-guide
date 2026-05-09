<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#F28604',
                        secondary: '#FFA033',
                        active: '#a85f08',
                        text: '#FFF4E2',
                        surface: '#FFFDF9',
                        wheat: '#f5deb3',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-[#FFFAF5] flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-primary text-text min-h-screen flex flex-col">
        <div class="h-16 flex items-center justify-center border-b border-secondary/30">
            <h1 class="text-xl font-bold">Food Guide</h1>
        </div>
        @php
            $baseClasses = 'block px-4 py-2 rounded transition-colors duration-200';
        @endphp

        <nav class="flex-1 px-4 py-6 space-y-2">

            <a href="{{ route('admin.dashboard') }}"
                class="{{ $baseClasses }} {{ request()->routeIs('admin.dashboard') ? 'bg-active text-white font-semibold shadow-md' : 'hover:bg-active/70' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.home-sections.index') }}"
                class="{{ $baseClasses }} {{ request()->routeIs('admin.home-sections.*') ? 'bg-active text-white font-semibold shadow-md' : 'hover:bg-active/70' }}">
                Home Sections
            </a>

            <a href="{{ route('admin.services.index') }}"
                class="{{ $baseClasses }} {{ request()->routeIs('admin.services.*') ? 'bg-active text-white font-semibold shadow-md' : 'hover:bg-active/70' }}">
                Services
            </a>

            <a href="{{ route('admin.contacts.index') }}"
                class="{{ $baseClasses }} {{ request()->routeIs('admin.contacts.*') ? 'bg-active text-white font-semibold shadow-md' : 'hover:bg-active/70' }}">
                Contacts
            </a>

            <a href="{{ route('admin.consultations.index') }}"
                class="{{ $baseClasses }} {{ request()->routeIs('admin.consultations.*') ? 'bg-active text-white font-semibold shadow-md' : 'hover:bg-active/70' }}">
                Consultations
            </a>

            <a href="{{ route('admin.settings.index') }}"
                class="{{ $baseClasses }} {{ request()->routeIs('admin.settings.*') ? 'bg-active text-white font-semibold shadow-md' : 'hover:bg-active/70' }}">
                Settings
            </a>

            <a href="{{ route('admin.statistics.index') }}"
                class="{{ $baseClasses }} {{ request()->routeIs('admin.statistics.*') ? 'bg-active text-white font-semibold shadow-md' : 'hover:bg-active/70' }}">
                Statistics
            </a>

            <a href="{{ route('admin.users.index') }}"
                class="{{ $baseClasses }} {{ request()->routeIs('admin.users.*') ? 'bg-active text-white font-semibold shadow-md' : 'hover:bg-active/70' }}">
                Users
            </a>

        </nav>
        <div class="px-4 py-6">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit"
                    class="w-full bg-wheat text-primary font-bold py-2 px-4 rounded hover:bg-wheat transition-colors">Logout</button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col">
        <header class="h-16 bg-[#FFFAF5] shadow flex items-center px-6 justify-end">
            <span class="text-gray-600">Logged in as {{ auth()->user()->name }}</span>
        </header>

        <div class="p-6 flex-1 overflow-auto">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>
</body>

</html>