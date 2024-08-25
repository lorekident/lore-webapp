<?php

namespace App\Livewire;
use App\Models\CourtCase;

use Livewire\Component;

class CampaignForm extends Component
{
    public $caseId;
    public $caseNumber;
    public $plaintiff = 'The People';
    public $defendant;
    public $assets = [];

    public function updatedCaseId($caseId)
    {
        if ($caseId) {
            $case = CourtCase::with('defendant', 'assets')->find($caseId);
            if ($case) {
                $this->caseNumber = $case->case_title;
                $this->defendant = $case->case_status;
                //$this->assets = $case->assets->pluck('id')->toArray();
            }
        }
    }

    public function render()
    {
        return view('livewire.campaign-form', [
            'allCases' => CourtCase::all() // Adjust this query as needed
        ]);
    }
}
