<?php

namespace App\Livewire;

use Livewire\Component;

class AllResearchFunds extends Component
{
    public $search;
    public $page = 1;

    # HELPER FUNCTION TO SET BACKGROUND COLOUR OF BADGES BASED ON STATUSES
    protected function status_color($status)
    {
        return match ($status) {
            'published' => 'bg-success',
            'draft' => 'bg-warning',
            'private' => 'bg-danger',
            'rejected' => 'bg-danger',
            'pending' => 'bg-info',
            'approved' => 'bg-success',
        };
    }
    public function getApplicationsProperty()
    {
        if ($this->search) {
            return \App\Models\ResearchFund::where('status', 'like', '%' . $this->search . '%')
                ->orWhere('title', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('amount', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            return \App\Models\ResearchFund::paginate(5);
        }
    }
    public function render()
    {
        return view('livewire.all-research-funds');
    }
}