<?php

use Livewire\Volt\Component;
use Livewire\Attributes\{On};

new class extends Component {
    #[On('asset-added-move-to-next-step')]
    public function handle_asset_created()
    {
        $this->dispatch('move-to-defendant-step');
    }
}; ?>

<div x-data="add_confiscated_asset()" x-on:next-tab="handle_next_tab($event)">
    <x-flash-messages />
    <div class="container px-5">
        <div class="card">
            <div class="card-body">
                <div class="navbar-brand text-center mb-4 text-primary">
                    <div class="col-12 text-center mb-2">
                        <div class="logo-main">
                            <img src="{{ asset('images/brands/LORE_LOGO.png') }}" class="img-fluid gradient-main"
                                style="width:100px;" alt="images">
                        </div>
                    </div>
                    <div class="fw-bold h5 py-1 text-uppercase text-muted">Add Confiscated Asset</div>
                </div>
                {{-- <div class="d-flex align-items-center bg-light mb-3 p-2 rounded-3 justify-content-center">
                    <ul wire:ignore class="nav nav-pills mb-0  bg-light p-0 m-0 profile-tab"
                        data-toggle="slider-tab" id="profile-pills-tab" role="tablist">


                        <li class="nav-item">
                            <a class="nav-link rounded-3 fw-bold d-flex align-items-center active show" id="" data-bs-toggle="tab" href="#court-information" role="tab" aria-selected="false">
                                <span class="text-uppercase">Case Details</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link rounded-3 fw-bold d-flex align-items-center" data-bs-toggle="tab" href="#assets-details" role="tab" aria-selected="false">
                                <span class="text-uppercase">Asset & Seizure Details</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link rounded-3 fw-bold" data-bs-toggle="tab" href="#defendant-information" role="tab" aria-selected="false">
                                <span class="text-uppercase">Defendant</span>
                            </a>
                        </li>

                    </ul>
                </div> --}}
                <div class="container mt-4 px-5">
                    <div class="container-body px-4">
                        <div class="col-lg-12 col-sm-12 col-md-9">
                            <flash-messages></flash-messages>
                            <div wire:ignore class="profile-content tab-content iq-tabactive show-fade-up">

                                <div id="court-information" class="tab-pane fade active show">

                                    <livewire:assets.case-details />
                                </div>

                                <div id="assets-details" class="tab-pane fade">
                                    <livewire:assets.asset-form />
                                </div>

                                <div id="defendant-information" class="tab-pane fade">
                                    <livewire:assets.defendant />
                                </div>

                                <div id="related-defendants" class="tab-pane fade">
                                    related defendants
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function add_confiscated_asset() {
        return {
            handle_next_tab(event){
                document.getElementById(event.detail.prev).classList.remove('active', 'show');
                document.getElementById(event.detail.next).classList.add('active', 'show');

                if(event?.detail?.asset){
                    console.log('========================')
                    console.log('asset')
                    console.log(event.detail.asset)
                    console.log('========================')
                }
            }
        }
    }
</script>
