<?php

namespace App\Livewire;

use App\Models\Skill;
use Livewire\Component;

class SkillSelection extends Component
{
    public $selectedSkills = [];

    public function render()
    {
        $skills = Skill::all();

        return view('livewire.skill-selection', ['skills' => $skills]);
    }

    public function saveSkills()
    {
        // dd($this->selectedSkills);

        $this->validate([
            'selectedSkills.*' => 'exists:skills,id',
        ]);

        $user = auth()->user();

        // dd($this->selectedSkills);
        // Sync selected skills with the user's skills relationship
        $user->skills()->sync($this->selectedSkills);
        session()->flash('message', 'Skills updated successfully!');
    }
}
