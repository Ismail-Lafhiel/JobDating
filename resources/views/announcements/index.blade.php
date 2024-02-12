<x-guest-layout>
    <x-nav-bar />
    <div class="max-w-7xl mx-auto px-6 py-10 lg:p-8">
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
        <h1
            class="mb-8 text-2xl text-center font-bold tracking-tight leading-none text-gray-900 md:text-3xl lg:text-4xl dark:text-white my-24">
            Discover Announcements</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
            @foreach ($announcementsWithMatchInfo as $info)
                <x-announcement-card :announcementId="$info['announcement']->id" :announcementTitle="$info['announcement']->title" :announcementDescription="$info['announcement']->description" :announcementImg="$info['announcement']->announcement_img"
                    :industryFields="$info['announcement']->company->industry_fields" :skills="$info['announcement']->skills" :matchPercentage="$info['matchPercentage']" :isMatchAboveThreshold="$info['isMatchAboveThreshold']" />
            @endforeach
        </div>

        {{-- <div class="row">
            <div class="col-md-12 mt-5">
                {{ $announcementsWithMatchInfo->links('pagination::tailwind') }}
            </div>
        </div> --}}
    </div>
</x-guest-layout>
