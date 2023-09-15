<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tables - Windmill Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('js/init-alpine.js') }}"></script>
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        @include('admin.partials.sidebar')

        <div class="flex flex-col flex-1 w-full">

            @include('admin.partials.navbar')

            <main class="h-full pb-16 overflow-y-auto">
                <div class="container grid px-6 mx-auto">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Usuarios
                    </h2>


                    <!-- With avatar -->
                    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">


                        <!-- With actions -->
                        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                            Table with actions
                        </h4>
                        @livewire('show-users')
                </div>
            </main>
        </div>
    </div>
</body>

</html>
