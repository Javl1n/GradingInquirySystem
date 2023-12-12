<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class AddCourse extends Component
{
    public $name;

    public function submit()
    {
        Course::create([
            'name' => $this->name,
        ]);

        return redirect()->route('admin.courses.index');
    }

    public function render()
    {
        return view('livewire.add-course');
    }
}
