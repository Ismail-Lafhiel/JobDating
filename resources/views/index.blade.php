<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'JobDating') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <main
        class="min-h-screen bg-dots-darker bg-center bg-gray-100 selection:bg-blue-500 selection:text-white dark:bg-gray-900">
        @if (session('success'))
            <div id="alert-3"
                class="mt-20 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @else
            @if (session('error'))
                <div id="alert-3"
                    class="mt-20 flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <div class="ms-3 text-sm font-medium">
                        {{ session('error') }}
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-3" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif
        @endif
        <x-hero />
        <div>
            @if (Route::has('login'))
                <x-nav-bar />
            @endif

            <div class="max-w-7xl mx-auto px-6 py-10 lg:p-8">
                <h2
                    class="mb-8 text-2xl text-center font-bold tracking-tight leading-none text-gray-900 md:text-3xl lg:text-4xl dark:text-white">
                    Discover Announcements</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    @foreach ($announcements as $announcement)
                        <x-announcement-card :announcementId="$announcement->id" :announcementTitle="$announcement->title" :announcementDescription="$announcement->description" :announcementImg="$announcement->announcement_img"
                            :industryFields="$announcement->company->industry_fields" :skills="$announcement->skills" />
                    @endforeach
                </div>
                <button type="button" onclick="window.location='{{ route('announcements.index') }}'"
                    class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 block text-center mx-auto mt-8">Discover
                    more</button>
            </div>

            <div class="max-w-7xl mx-auto px-6 py-10 lg:px-10 lg:py-14">
                <h2
                    class="mb-8 text-2xl text-center font-bold tracking-tight leading-none text-gray-900 md:text-3xl lg:text-4xl dark:text-white">
                    Discover Companies</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    @foreach ($companies as $company)
                        <x-company-card :companyId="$company->id" :companyTitle="$company->name" :companyDescription="$company->description" :companyImg="$company->company_img"
                            :industryFields="$company->industry_fields" />
                    @endforeach
                </div>
                <button type="button" onclick="window.location='{{ route('companies.index') }}'"
                    class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 block text-center mx-auto mt-8">Discover
                    more</button>
            </div>
        </div>
    </main>

</body>

</html>
