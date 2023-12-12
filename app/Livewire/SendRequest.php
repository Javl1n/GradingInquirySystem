<?php

namespace App\Livewire;

use App\Models\Student;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Livewire\Component;

class SendRequest extends Component
{
    use WithFileUploads;

    public Student $student;

    public $schoolYear = '2022';

    public $semester = '1';

    public $subjectLoad;

    public function mount()
    {
        $this->student = auth()->guard('student')->user();
    }

    public function submit()
    {
        // ddd( $this->subjectLoad->store('subjectLoad'));

        $this->student->requests()->create([
            'school_year' => $this->schoolYear,
            'semester' => $this->semester,
            'subject_load_url' => $this->subjectLoad->store('subjectLoad')
        ]);


        return redirect()->route('student.requests.index');

    }

    public function render()
    {   
        return view('livewire.send-request');
    }
}
