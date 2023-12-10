<?php

namespace App\Livewire;

use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AddStudent extends Component
{
    public $firstName = '';

    public $middleName = '';

    public $lastName = '';

    public $password = '';

    public $course = '1';

    public $schoolId;

    public function submit()
    {
        // ddd($this->password);
        Student::create([
            'school_id' => $this->schoolId,
            'Name' => $this->firstName . ' ' . strtoupper(substr($this->middleName, 0, 1)) . '. ' . $this->lastName,
            'course_id' => $this->course,
            'password' => Hash::make($this->password)
        ]);

        return redirect()->route('admin.users.index');
    }

    public function render()
    {   
        if(!empty($this->lastName)){
            $firstName = explode(' ', $this->firstName);

            $initials = '';
            foreach ($firstName as $name)
            {
                if(isset($name))
                {
                    $initials .= strtolower(substr($name, 0, 1));
                }
            }
            $this->password = strtolower($this->lastName) . '_' . $initials; 
        } else {
            $this->password = '';
        }
        return view('livewire.add-student');
    }
}
