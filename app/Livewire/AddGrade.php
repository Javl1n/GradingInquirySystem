<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

class AddGrade extends Component
{
    public Student $student;

    public $subject = '1';

    public $schoolYear = '2022';

    public $semester = '1';

    public $midterm;

    public $finals;

    public function mount(Student $student)
    {
        $this->student = $student;
    }

    public function submit()
    {
        $this->student->grades()->create([
            'subject_id' => $this->subject,
            'school_year' => $this->schoolYear,
            'semester' => $this->semester,
            'midterm' => $this->midterm,
            'finals' => $this->finals
        ]);

        return redirect()->route('admin.users.show', [$this->student->school_id]);
    }

    public function render()
    {
        return view('livewire.add-grade');
    }
}
