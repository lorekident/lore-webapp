<?php

namespace App\Livewire;

use Livewire\Component;

class ResearchFundApplication extends Component
{
    public $search;
    public $page = 1;

    # HELPER FUNCTION TO SET BACKGROUND COLOUR OF BADGES BASED ON STATUSES
    protected function status_color($status)
    {
        return match ($status) {
            'approved' => 'bg-success',
            'pending' => 'bg-warning',
            'rejected' => 'bg-danger',
        };
    }
    public function getApplicationsProperty()
    {
        if ($this->search) {
            return \App\Models\ResearchFundApplication::with('applicant')->where('status', 'like', '%' . $this->search . '%')
                ->orWhere('fund_id', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            return \App\Models\ResearchFundApplication::with('applicant')->paginate(5);
        }
    }
    
    public function render()
    {
        return view('livewire.research-fund-application');
    }
}