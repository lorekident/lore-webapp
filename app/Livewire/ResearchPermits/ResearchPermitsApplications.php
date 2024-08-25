<?php

namespace App\Livewire\ResearchPermits;

use Livewire\Component;

class ResearchPermitsApplications extends Component
{
    public function render()
    {
        return view(
            'livewire.research-permits.research-permits-applications',
            [
                'applications' => \App\Models\PermitApplication::with('user', 'agent')->get()
            ]
        );
    }
}

