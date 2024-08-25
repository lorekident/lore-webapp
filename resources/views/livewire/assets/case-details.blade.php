<?php

use Livewire\Volt\Component;

new class extends Component {
    public $administrations = ['court-of-appeal', 'high-court', 'magistrate-court', 'industrial-court'],
        $case_statuses = ['open', 'closed', 'pending', 'resolved'],
        $case_title = '',
        $assigned_to = '',
        $case_status = '',
        $case_description = '',
        $administration = '';

    public function create_case()
    {
        // try {
        $this->validate(
            [
                'case_title' => 'required',
                'case_description' => 'required',
                'case_status' => 'required',
            ],
            [
                'case_title.required' => 'Please enter case title',
                'case_status.required' => 'Please select case status',
                'case_description.required' => 'Please enter case description',
            ],
        );

        $case = \App\Models\CourtCase::Create([
            'user_id' => auth()->user()->id,
            'case_title' => $this->case_title,
            'case_status' => $this->case_status,
            'assigned_to' => $this->assigned_to ?? auth()->user()->name,
            'administration' => $this->administration,
        ]);

        $this->dispatch('case-created', court_case: $case)->to('assets.asset-form');
        $this->dispatch('case-created', court_case: $case)->to('assets.defendant');
        $this->dispatch('next-tab', next: 'assets-details', prev: 'court-information');

        // } catch (\Throwable $th) {
        //     session()->flash('error', $th->getMessage());
        // }
    }
}; ?>

<div x-data="caseDetails()" x-on:remount_editor="load_editor($event)">

    <div class="row">
        <div class="row bg-light rounded-3 py-3">
            <div class="mb-2 p-0 m-0">
                <div>
                    <h5 class="mb-1 fw-bold text-dark">Court Case Information</h5>
                    <p class="text-muted">Fill all Information as below</p>
                </div>
            </div>
            <div class="form-group col-lg-6">
                <label class="fw-bold text-dark" for="name">Case Number <span class="text-danger">*</span></label>
                <input type="text" class="form-control text-dark fw-bold" wire:model="case_title"
                    placeholder="Case Number">

                @error('case_title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-lg-6">
                <label class="fw-bold text-dark" for="name">Administration <span
                        class="text-danger">*</span></label>
                <select name="" id="" class="form-control text-dark fw-bold" wire:model="administration">
                    <option value="">Select Administration</option>
                    @foreach ($administrations as $administration)
                        <option class="text-capitalize" value="{{ $administration }}">{{ $administration }}</option>
                    @endforeach
                </select>
                @error('administration')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-lg-6">
                <label class="fw-bold text-dark" for="name">Assigned To</label>
                <input type="text" class="form-control text-dark fw-bold" wire:model="assigned_to"
                    placeholder="Assigned To">
                @error('assigned_to')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-lg-6">
                <label class="fw-bold text-dark" for="name">Case Status <span class="text-danger">*</span></label>
                <select name="" class="form-control text-dark fw-bold" id="" wire:model="case_status">
                    <option value="">Select Case Status</option>
                    @foreach ($case_statuses as $status)
                        <option value="{{ $status }}">{{ $status }}</option>
                    @endforeach
                </select>

                @error('case_status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-12 mb-2 mt-2">
                <label class="fw-bold text-dark" for="name">Case Description <span
                        class="text-danger">*</span></label>
                <textarea name="" wire:model="case_description" id="" class="form-control text-dark fw-bold"
                    placeholder="Case Description" cols="30" rows="5"></textarea>

                @error('case_description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <div class="col-12 mt-3 text-end">
            <button class="btn btn-primary fw-bold rounded-5 px-3" wire:loading.remove wire:target="create_case"
                wire:click="create_case">Create Case </button>
            <div class="" wire:loading wire:target="create_case">
                <x-btn-loader />
            </div>
        </div>
    <div class="col-12 text-center fw-bold">Step 1 / 3</div>
    </div>
</div>

<script>
    function caseDetails() {
        return {
            init() {
                // this.load_editor();
            },

            load_editor(event) {
                console.log(event?.detail?.editor);
                ClassicEditor
                    .create(document.querySelector('#editor'))
                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                            @this.set('case_description', editor.getData());
                        });
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        }
    }
</script>
