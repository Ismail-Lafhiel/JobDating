@props(['announcementId', 'announcementImg', 'announcementDescription', 'announcementTitle'])
<a href="{{ route('announcements.show', $announcementId) }}"
    class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-blue-500">
    <div>
        <div class="flex items-center justify-center">
            <img class="rounded-t-lg" src="{{ $announcementImg }}" alt="announcement img" />
        </div>

        <h2 class="mt-6 text-xl font-semibold text-gray-900">{{ $announcementTitle }}</h2>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
            {{ $announcementDescription }}
        </p>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
        class="self-center shrink-0 stroke-blue-500 w-6 h-6 mx-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
    </svg>
</a>
