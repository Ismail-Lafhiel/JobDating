<x-guest-layout>
    <x-nav-bar />
    <div class="max-w-7xl mx-auto px-6 py-10 lg:p-8">
        <h1
            class="mb-8 text-2xl text-center font-bold tracking-tight leading-none text-gray-900 md:text-3xl lg:text-4xl dark:text-white my-24">
            Discover Announcements</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
            @foreach ($announcements as $announcement)
                <x-announcement-card :announcementId="$announcement->id" :announcementTitle="$announcement->title" :announcementDescription="$announcement->description" :announcementImg="$announcement->announcement_img" />
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 mt-5">
                {{ $announcements->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
    
</x-guest-layout>
