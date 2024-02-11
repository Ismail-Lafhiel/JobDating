<x-guest-layout>
    @if (Route::has('login'))
        <x-nav-bar />
    @endif
    <section class="bg-white dark:bg-gray-900 mt-20">
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
                        <p class="font-semibold text-gray-700 dark:text-white underline cursor-pointer">
                            {{ $announcement->company->contact_info }}
                        </p>
                    </div>
                </div>
                <hr class="h-px my-8 bg-gray-300 border-0 dark:bg-gray-700">
                <div class="flex align-middle justify-between">
                    <div>
                        <h3 class="font-semibold text-gray-900 dark:text-white">
                            Required Skills</h3>
                        @foreach ($announcement->skills as $skill)
                            <p
                                class="inline-flex items-center justify-center mt-3 px-3 py-2 mr-1 font-light text-sm text-center text-white rounded-full bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                                {{ $skill->skill_name }}
                            </p>
                            {{-- <p>No skills atxtached to this announcement.</p> --}}
                        @endforeach
                    </div>
                    <form class=self-center method="post"
                        action="{{ route('apply.announcement', $announcement->id) }}">
                        @csrf
                        <button type="submit"
                            class="py-2.5 px-5 text-md font-bold text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Apply
                            Now</button>
                    </form>
                </div>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ $announcement->announcement_img }}" alt="announcement img">
            </div>
        </div>
    </section>
</x-guest-layout>
