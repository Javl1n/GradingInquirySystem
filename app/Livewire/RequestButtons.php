<?php

namespace App\Livewire;

use App\Models\Request;
use Livewire\Component;

class RequestButtons extends Component
{
    public Request $request;

    public function mount(Request $request)
    {
        $this->request = $request;
    }

    public function accept()
    {
        $this->request->update([
            'accepted' => true,
            'date_decided' => now()
        ]);

        return redirect()->route('admin.requests.index');
    }
    public function decline()
    {
        $this->request->update([
            'accepted' => false,
            'date_decided' => now()
        ]);

        return redirect()->route('admin.requests.index');
    }

    public function render()
    {
        return view('livewire.request-buttons');
    }
}
