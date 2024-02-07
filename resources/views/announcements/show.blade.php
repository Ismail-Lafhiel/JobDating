<x-guest-layout>
    @if (Route::has('login'))
        <x-nav-bar />
    @endif
    <section class="bg-white dark:bg-gray-900 mt-20">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    {{ $announcement->title }}</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    {!! $announcement->description !!}</p>
                <hr class="h-px my-8 bg-gray-300 border-0 dark:bg-gray-700">
                <div class="flex justify-between align-middle">
                    <div>
                        <h3
                            class="max-w-2xl mb-4 text-md font-medium tracking-tight leading-none md:text-lg xl:text-xl dark:text-white">
                            Company name:</h3>
                        <p class="font-medium text-gray-700 dark:text-white">
                            {{ $announcement->company->name }}</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 dark:text-white">
                            Industry field</h3>
                        @foreach ($announcement->company->industry_fields as $industryField)
                            <p
                                class="inline-flex items-center justify-center mt-3 px-3 py-2 mr-1 font-light text-sm text-center text-white rounded-full bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                                {{ $industryField->industry_field }}
                            </p>
                        @endforeach

                    </div>
                    <div>
                        <h3
                            class="max-w-2xl mb-4 text-md font-medium tracking-tight leading-none md:text-lg xl:text-xl dark:text-white">
                            Contact number</h3>
                        <p
                            class="font-semibold text-gray-700 dark:text-white underline cursor-pointer">
                            {{ $announcement->company->contact_info }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ $announcement->announcement_img }}" alt="announcement img">
            </div>
        </div>
    </section>
</x-guest-layout>
