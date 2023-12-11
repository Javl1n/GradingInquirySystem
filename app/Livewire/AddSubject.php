<?php

namespace App\Livewire;

use App\Models\Subject;
use Livewire\Component;

class AddSubject extends Component
{
    public $subjectCode;

    public $description;

    public function submit()
    {
        Subject::create([
            'code' => $this->subjectCode,
            'description' => $this->description,
        ]);

        return redirect()->route('admin.subjects.index');
    }

    public function render()
    {
        return view('livewire.add-subject');
    }
}
