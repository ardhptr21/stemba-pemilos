<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Stemba Pemilos' }}</title>
    @include('partials.styles')
</head>

<body>

    <main class="font-sans antialiased">
        @include('partials.aside')
        <div class="ml-auto lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
            <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
                <div class="flex items-center justify-between px-6 space-x-4 2xl:container">
                    <h5 hidden class="text-2xl font-medium text-gray-600 lg:block">{{ $admin_title ?? 'Dashboard' }}
                    </h5>
                    <button class="w-12 h-16 -mr-2 border-r lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 my-auto" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="min-h-screen p-10 bg-texture">
                @yield('content')
            </div>
        </div>
    </main>

    @include('partials.scripts')
</body>

</html>
