<?php

namespace App\Livewire;

use Livewire\Component;

class ShowResearchFundApplication extends Component
{
    public $key, $application, $fund, $research, $applicant, $permit;

    public function mount()
    {
        $this->key = request()->key;
        $this->application = \App\Models\ResearchFundApplication::with('fund', 'research', 'applicant', 'permit')->where('key', $this->key)->firstOrFail();
        $this->fund = $this->application->fund;
        $this->research = $this->application->research;
        $this->applicant = $this->application->applicant;
        $this->permit = $this->application->permit;

    }

    # HELPER FUNCTION TO SET BACKGROUND COLOUR OF BADGES BASED ON STATUSES
    protected function status_color($status)
    {
        return match ($status) {
            'approved' => 'bg-success',
            'pending' => 'bg-warning',
            'rejected' => 'bg-danger',
        };
    }

    //approve the application
    public function approve()
    {
        try {
            //update the application status
            $this->application->update([
                'status' => 'approved',
            ]);
            //return a success message
            session()->flash('success', 'Research fund application approved successfully.');
            //redirect to the research fund application index page
            return redirect()->route('research-fund-application.index');
        } catch (\Exception $e) {
            //return an error message
            session()->flash('error', 'Research fund application could not be approved.');
            //redirect to the research fund application index page
            // return redirect()->route('research-fund-application.index');
        }
    }
    public function render()
    {
        return view('livewire.show-research-fund-application');
    }
}