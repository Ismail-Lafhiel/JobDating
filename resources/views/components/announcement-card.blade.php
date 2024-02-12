@props([
    'announcementId',
    'announcementImg',
    'announcementDescription',
    'announcementTitle',
    'industryFields',
    'skills',
    'matchPercentage',
    'isMatchAboveThreshold',
])

<a href="{{ route('announcements.show', $announcementId) }}"
    class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-blue-500">

    <div>
        <h2 class="mt-6 text-xl font-semibold text-gray-900">{{ $announcementTitle }}</h2>

        <div class="flex space-x-10 align-middle mt-10 justify-between">

            @if ($skills->count() > 0)
                <ul class="flex space-x-2 self-center">
                    @foreach ($skills as $skill)
                        <li class="text-sm font-semibold text-gray-900 dark:text-white">
                            {{ $skill->skill_name }}
                        </li>
                    @endforeach
                </ul>
            @else
                <div>No Skills Fields Assigned.</div>
            @endif

            <form class="self-center" method="post" action="{{ route('apply.announcement', $announcementId) }}">
                @csrf
                <button type="submit"
                    class="py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Apply Now
                </button>
            </form>

            {{-- Display match information --}}
            <div class="mt-2">
                @if ($isMatchAboveThreshold)
                    <div class="text-green-600 font-semibold">
                        Matched: {{ $matchPercentage }}%
                    </div>
                @else
                    <div class="text-red-600 font-semibold">
                        Not Enough Skills Matched
                    </div>
                @endif
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
        class="self-center shrink-0 stroke-blue-500 w-6 h-6 mx-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
    </svg>
</a>
