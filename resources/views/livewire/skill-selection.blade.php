<x-form-section submit="saveSkills">
    <x-slot name="title">
        {{ __('Select Skills') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Choose your skills') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="selectedSkills" value="{{ __('Skills') }}" />
            <select id="selectedSkills" name="skills[]" multiple wire:model="selectedSkills"
                class="form-multiselect mt-1 block w-full" autocomplete="off">
                @foreach ($skills as $skill)
                    <option value="{{ $skill->id }}">{{ $skill->skill_name }}</option>
                @endforeach
            </select>
            <x-input-error for="selectedSkills" class="mt-2" />
        </div>

        <div>
            <x-button type="submit" wire:loading.attr="disabled">
                {{ __('Save Skills') }}
            </x-button>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Skills Saved.') }}
        </x-action-message>
    </x-slot>
</x-form-section>
