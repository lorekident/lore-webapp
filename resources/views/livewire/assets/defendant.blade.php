<?php

use Livewire\Volt\Component;
use Livewire\Attributes\{On};

new class extends Component {
    public $applicant_levels = ['company', 'citizen'],
        $gender_types = ['male', 'female', 'others'];
    public $applicant_level = 'citizen',
        $omang_no = '',
        $firstname = '',
        $add = false,
        $read_only = false,
        $middlename = '',
        $surname = '',
        $email_address = '',
        $name = '',
        $dob = '',
        $gender = '',
        $court_case = '',
        $cellphone = '';

    #[On('case-created')]
    public function handle_case_created($court_case)
    {
        $this->court_case = $court_case;
    }

    public function save_defendant($defendants)
    {
        foreach ($defendants as $defendant) {
            $defendant = \App\Models\Defendant::forceCreate([
                'name' => $defendant['firstname'],
                'surname' => $defendant['surname'],
                'defendant_level' => $defendant['defendant_level'],
                'email' => $defendant['email_address'] ?? '',
                'cellphone' => $defendant['cellphone'] ?? '',
                'gender' => $defendant['gender_type'],
                'omang_no' => $defendant['omang_no'] ?? '',
                'dob' => $defendant['dob'] ?? '',
                'court_case_id' => $this->court_case['id'] ?? null,
                'company_name' => $defendant['company_name'] ?? '',
                'company_uin' => $defendant['company_uin'] ?? '',
                'place_of_operation' => $defendant['place_of_operation'] ?? '',
            ]);
        }
        return redirect()->route('admin.assets.index')->with('success', 'Case, Assets and Defendants have been created successfully');
    }
}; ?>

<div x-data="defendantForm()">
    <x-flash-messages />
    <div class="row">
        <div class="row bg-light p-0 rounded-3 mb-2 p-2">
            <div class="p-0 m-0">
                <div>
                    <h5 class="mb-1 fw-bold text-dark">Defendants Information</h5>
                    <p class="text-muted">Fill all Information as below</p>
                </div>
            </div>
        </div>
        @if (!$read_only)
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-end p-0 m-0">
                    <button
                        class="btn @if ($add) btn-danger
            @else
                btn-primary @endif rounded-circle btn-sm"
                        @click="add_defendant()">
                        @if ($add)
                            <i class="mdi mdi-close fs-14"></i>
                        @else
                            <svg viewBox="0 0 24 24" width="25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM12.75 9C12.75 8.58579 12.4142 8.25 12 8.25C11.5858 8.25 11.25 8.58579 11.25 9L11.25 11.25H9C8.58579 11.25 8.25 11.5858 8.25 12C8.25 12.4142 8.58579 12.75 9 12.75H11.25V15C11.25 15.4142 11.5858 15.75 12 15.75C12.4142 15.75 12.75 15.4142 12.75 15L12.75 12.75H15C15.4142 12.75 15.75 12.4142 15.75 12C15.75 11.5858 15.4142 11.25 15 11.25H12.75V9Z"
                                        fill="currentColor"></path>
                                </g>
                            </svg>
                        @endif
                    </button>
                </div>
            </div>
        @endif

        <template x-for="(defendant, index) in defendants" :key="index">
            <div class="row bg-light rounded-3 py-3 mt-3">
                <div class="col-lg-6">
                    <label class="fw-bold text-dark" for="name">Defendant Level <span
                            class="text-danger">*</span></label>
                    <select class="form-control border-none fw-bold text-capitalize"
                        x-model="defendant.defendant_level">
                        <option value="">Select Defendant Level</option>
                        <template x-for="level in defendant_levels">
                            <option x-text="level" x-bind:value="level"></option>
                        </template>
                    </select>
                </div>

                <div class="col-lg-6" x-show="defendant.defendant_level == 'citizen'">
                    <label class="fw-bold text-dark" for="name">Defendant Omang No <span
                            class="text-danger">*</span></label>
                    <input type="number" class="form-control border-none fw-bold" x-model="defendant.omang_no"
                        placeholder="Omang No">
                </div>

                <div class="col-lg-6 mt-3" x-show="defendant.defendant_level == 'citizen'">
                    <label class="fw-bold text-dark" for="name">Defendant Full Name(s)<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control border-none fw-bold" x-model="defendant.firstname"
                        placeholder="Firstname">
                </div>

                <div class="col-lg-6 mt-3" x-show="defendant.defendant_level == 'citizen'">
                    <label class="fw-bold text-dark" for="name">Defendant Surname <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control border-none fw-bold" x-model="defendant.surname"
                        placeholder="Surname">
                </div>

                <div class="col-lg-6 mt-3" x-show="defendant.defendant_level == 'citizen'">
                    <label class="fw-bold text-dark" for="name">Gender <span class="text-danger">*</span></label>
                    <select name="" id="" class="form-control border-none fw-bold text-capitalize"
                        x-model="defendant.gender_type">
                        <option value="">Select Gender Type</option>
                        <template x-for="gender in gender_types" :key="gender">
                            <option x-bind:value="gender"x-text="gender"></option>
                        </template>
                    </select>
                </div>

                <div class="col-lg-6 mt-3" x-show="defendant.defendant_level == 'citizen'">
                    <label class="fw-bold text-dark" for="name">Defendant Date of Birth </label>
                    <input type="date" class="form-control border-none fw-bold" x-model="defendant.dob"
                        placeholder="Date of Birth">
                </div>

                <div class="col-lg-6 mt-3" x-show="defendant.defendant_level == 'citizen'">
                    <label class="fw-bold text-dark" for="name">Defendant Email Address </label>
                    <input type="text" class="form-control border-none fw-bold" x-model="defendant.email_address"
                        placeholder="Email Address">
                </div>

                <div class="col-lg-6 mt-3" x-show="defendant.defendant_level == 'citizen'">
                    <label class="fw-bold text-dark" for="name">Defendant Cellphone <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control border-none fw-bold" x-model="defendant.cellphone"
                        placeholder="Cellphone">
                </div>


                <div class="col-lg-6" x-show="defendant.defendant_level == 'company'">
                    <label class="fw-bold text-dark" for="name">Company Name <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control border-none fw-bold" x-model="defendant.company_name"
                        placeholder="Company Name">
                </div>

                <div class="col-lg-6 mt-3" x-show="defendant.defendant_level == 'company'">
                    <label class="fw-bold text-dark" for="name">Company UIN <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control border-none fw-bold" x-model="defendant.company_uin"
                        placeholder="Company UIN">
                </div>

                <div class="col-lg-6 mt-3" x-show="defendant.defendant_level == 'company'">
                    <label class="fw-bold text-dark" for="name">Place of Operation <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control border-none fw-bold"
                        x-model="defendant.place_of_operation" placeholder="Place of Operation">
                </div>

            </div>
        </template>

        <template x-if="defendants.length > 0">
            <div class="row">
                <div class="col-12 text-end p-0 m-0 mt-3">
                    <button class="btn btn-primary fw-bold rounded-pill" wire:loading.remove
                        @click="save_defendant()">Save Defendant</button>
                    <div class="" wire:loading wire:target="save_defendant">
                        <x-btn-loader />
                    </div>
                </div>
            </div>
        </template>
    </div>
    <div class="col-12 text-center fw-bold">Step 3 / 3</div>
</div>


<script>
    function defendantForm() {
        return {
            defendant_levels: @json($applicant_levels),
            gender_types: @json($gender_types),
            defendants: [],

            add_defendant() {
                this.defendants.push({
                    defendant_level: '',
                    omang_no: '',
                    firstname: '',
                    surname: '',
                    dob: '',
                    email_address: '',
                    cellphone: '',
                    gender_type: '',

                    company_name: '',
                    company_uin: '',
                    place_of_operation: '',
                })
            },

            save_defendant() {
                this.$wire.save_defendant(this.defendants);
            }

        }
    }
</script>
