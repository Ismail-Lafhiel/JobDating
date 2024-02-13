<div class="col-span-6 sm:col-span-4">
    <p class="text-sm mt-2">Select Skills</p>

    <form wire:submit.prevent="saveSkills">
        @foreach ($skills as $skill)
            <label>
                <input type="checkbox" wire:model="selectedSkills" value="{{ $skill->id }}">
                {{ $skill->skill_name }}
            </label>
        @endforeach
        <button type="submit" class="ml-4 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Save Skills</button>
    </form>
</div>
