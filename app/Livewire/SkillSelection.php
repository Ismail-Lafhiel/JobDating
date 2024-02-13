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
        
        $user = auth()->user();

        // Sync selected skills with the user's skills relationship
        $user->skills()->sync($this->selectedSkills);
        dd($this->selectedSkills);
        session()->flash('message', 'Skills updated successfully!');
    }
}
