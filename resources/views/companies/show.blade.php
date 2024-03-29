<x-guest-layout>
    @if (Route::has('login'))
        <x-nav-bar />
    @endif
    <section class="bg-white dark:bg-gray-900 mt-20">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    {{ $company->name }}</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    {!! $company->description !!}</p>
                <hr class="h-px my-8 bg-gray-300 border-0 dark:bg-gray-700">
                <div class="flex align-middle justify-between">
                    <div>
                        <h3
                            class="max-w-2xl mb-4 text-md font-medium tracking-tight leading-none md:text-lg xl:text-xl dark:text-white">
                            Industry fields: </h3>
                        @foreach ($company->industry_fields as $industryField)
                            <p
                                class="inline-flex items-center justify-center px-3 py-2 mr-1 font-light text-sm text-center text-white rounded-full bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                                {{ $industryField->industry_field }}
                            </p>
                        @endforeach
                    </div>
                    <div>
                        <h3
                            class="max-w-2xl mb-4 text-md font-medium tracking-tight leading-none md:text-lg xl:text-xl dark:text-white">
                            Conatct info: </h3>
                        <p
                            class="font-semibold text-gray-700 dark:text-white underline">
                            {{ $company->contact_info }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ $company->company_img }}" alt="company img">
            </div>
        </div>
    </section>
</x-guest-layout>
