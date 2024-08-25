<?php

use Livewire\Volt\Component;
use Livewire\Attributes\{On};
use Livewire\WithFileUploads;

new class extends Component {
    use WithFileUploads;
    public $judgment_types = ['pending-investigation', 'court-order'],
        $statuses = ['pending', 'completed', 'under-appeal', 'seizured'],
        $add = false,
        $read_only = false,
        $asset_sub_categories = [],
        $asset_categories = [],
        $asset_types = [],
        $locations = [],
        $location = '',
        $assets = [],
        $asset,
        $court_case;

    #[On('case-created')]
    public function handle_case_created($court_case)
    {
        $this->court_case = $court_case;
        //dd($this->court_case);
    }

    public function mount()
    {
        $this->locations = \App\Models\Village::all();
        $this->asset_types = \App\Models\AssetType::all();
        $this->asset_categories = \App\Models\AssetCategory::all();
        $this->asset_sub_categories = \App\Models\AssetSubCategory::all();
    }

    public function save_asset($assets)
    {
        try {
            foreach ($assets as $asset) {

            $vendor = \App\Models\Vendor::firstOrCreate(['name' => $asset['vendor']]);

            $this->asset = \App\Models\Asset::forceCreate([
                'asset_name' => $asset['asset_name'],
                'model' => $asset['model_name'],
                'status' => $asset['status'],
                'vendor_id' => $vendor->id,
                'asset_type' => $asset['asset_type'],
                'category_id' => $asset['category'],
                'sub_category_id' => $asset['asset_sub_category'],
                'court_case_id' => $this->court_case['id'],
                'model' => $asset['model_name'],
                'judgment_type' => $asset['judgment_type'],
                'serial_number' => $asset['serial_number'] ?? null,
                'reasons' => $asset['confiscation_reasons'],
                'confiscation_location' => $asset['confiscation_location'],
            ]);

            // logger()->info($this->asset);
            if ($this->asset) {
                foreach ($asset['images'] as $image) {
                    $contentType = explode(';', $image['url'])[0];
                    $extension = explode('/', $contentType)[1];
                    $imageData = base64_decode(explode(',', $image['url'])[1]);
                    $filename = uniqid('img_', true) . '.' . $extension;
                    $path = public_path('assets_images/' . $filename);
                    file_put_contents($path, $imageData);

                    \App\Models\Filable::forceCreate([
                        'filable_id' => $this->asset->id,
                        'filable_type' => 'App\Models\Asset',
                        'filename' => $filename,
                        'path' => 'assets_images/' . $filename,
                    ]);
                }
            }
        }

        $this->dispatch('next-tab', next: 'defendant-information', prev: 'assets-details');
        } catch (\Throwable $th) {
            logger()->error($th);
        }
    }

    public function removeImage($index)
    {
        unset($this->images[$index]);
        $this->images = array_values($this->images);
    }
}; ?>

<div x-data="assetForm()">
    <div class="row bg-light p-0 rounded-3 mb-2 p-2">
        <div class="p-0 m-0">
            <div>
                <h5 class="mb-1 fw-bold text-dark">Assets & Seizure Information</h5>
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
                    @click="add_asset()">
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

    <template x-for="(asset, index) in assets" :key="index">
        <div class="row bg-light rounded-3 py-3 mt-3">
            <div class="form-group col-lg-6">
                <label class="fw-bold text-dark" for="name">Asset Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control text-dark fw-bold" x-model="asset.asset_name"
                    placeholder="Enter Asset Name">
                <span x-show="errors[index].asset_name" class="text-danger p-0 m-0 fw-medium"
                    x-text="errors[index].asset_name"></span>
            </div>

            <div class="form-group col-lg-6">
                <label class="fw-bold text-dark" for="name">Asset Type <span class="text-danger">*</span></label>
                <select name="" class="form-control fw-bold" x-model="asset.asset_type"
                    @change="get_asset_categories(index)">
                    <option value="">Select Asset Type</option>
                    <template x-for="asset_type in asset_types" :key="asset_type.id">
                        <option x-bind:value="asset_type.id" x-text="asset_type.name"></option>
                    </template>
                </select>
                <span x-show="errors[index].asset_type" class="text-danger p-0 m-0 fw-medium"
                    x-text="errors[index].asset_type"></span>
            </div>

            <div class="form-group col-lg-6">
                <label class="fw-bold text-dark" for="name">Asset Type Category <span
                        class="text-danger">*</span></label>
                <select name="" class="form-control fw-bold" x-model="asset.category"
                    @change="get_asset_sub_categories(index)">
                    <option value="">Select Asset Type</option>
                    <template x-for="asset_category in assets[index].asset_categories" :key="asset_category.id">
                        <option x-bind:value="asset_category.id" x-text="asset_category.name"></option>
                        {{-- <option x-bind:value="asset_category.uuid" x-text="asset_category.name"></option> --}}
                    </template>
                </select>
                <span x-show="errors[index].asset_category" class="text-danger p-0 m-0 fw-medium"
                    x-text="errors[index].asset_category"></span>
            </div>

            <div class="form-group col-lg-6">
                <label class="fw-bold text-dark" for="name">Asset Sub Category Type<span
                        class="text-danger">*</span></label>
                <select name="" class="form-control fw-bold" x-model="asset.asset_sub_category">
                    <option value="">Select Asset Type</option>
                    <template x-for="asset_sub_category in assets[index].asset_sub_categories"
                        :key="asset_sub_category.id">
                        <option x-bind:value="asset_sub_category.id" x-text="asset_sub_category.name "></option>
                    </template>
                </select>
                <span x-show="errors[index].asset_sub_category" class="text-danger p-0 m-0 fw-medium"
                    x-text="errors[index].asset_sub_category"></span>
            </div>


            <div class="form-group col-lg-6">
                <label class="fw-bold text-dark" for="name">Judgement Type <span
                        class="text-danger">*</span></label>
                <select name="" class="form-control fw-bold" x-model="asset.judgment_type" id="">
                    <option value="">Select Judgement Type</option>
                    <template x-for="judgment_type in judgment_types" :key="judgment_type">
                        <option x-bind:value="judgment_type" x-text="judgment_type"></option>
                    </template>
                </select>
                <span x-show="errors[index].judgment_type" class="text-danger p-0 m-0 fw-medium"
                    x-text="errors[index].judgment_type"></span>
            </div>

            <div class="form-group col-lg-6">
                <label class="fw-bold text-dark" for="name">Model Name</label>
                <input type="text" class="form-control text-dark fw-bold" x-model="asset.model_name"
                    placeholder="Enter Asset Model Name">
                <span x-show="errors[index].model_name" class="text-danger p-0 m-0 fw-medium"
                    x-text="errors[index].model_name"></span>
            </div>

            <div class="form-group col-lg-6">
                <label for="" class="fw-bold text-dark">Confiscation Status <span
                        class="text-danger fw-bold">*</span></label>
                <select name="" id="" class="form-control fw-bold" x-model="asset.status">
                    <option value="">Select Status</option>
                    <template x-for="status in statuses" :key="status">
                        <option x-bind:value="status" x-text="status"></option>
                    </template>
                </select>
                <span x-show="errors[index].status" class="text-danger p-0 m-0 fw-medium"
                    x-text="errors[index].status"></span>
            </div>

            <div class="form-group col-lg-6">
                <label for="" class="fw-bold text-dark">Serial Number </label>
                <input type="text" class="form-control fw-bold" x-model="asset.serial_number"
                    placeholder="Enter Serial Number">
            </div>

            <div class="form-group col-lg-6">
                <label for="" class="fw-bold text-dark">Confiscation Location <span
                        class="text-danger">*</span></label>
                <input type="text" class="form-control fw-bold" x-model="asset.confiscation_location"
                    placeholder="Enter Confiscation Location">
                <span x-show="errors[index].confiscation_location" class="text-danger p-0 m-0 fw-medium"
                    x-text="errors[index].confiscation_location"></span>
            </div>

            <div class="form-group col-lg-6">
                <label for="" class="fw-bold text-dark">Asset Vendor/Manufacturer </label>
                <input type="text" class="form-control fw-bold" x-model="asset.vendor"
                    placeholder="Enter Asset Vendor">
                <span x-show="errors[index].vendor" class="text-danger p-0 m-0 fw-medium"
                    x-text="errors[index].vendor"></span>
            </div>

            <div class="form-group">
                <label for="" class="fw-bold text-dark text-capitalize">Asset description <span
                        class="text-danger">*</span></label>
                <textarea name="" id="" cols="30" rows="5" class="form-control fw-bold text-dark"
                    x-model="asset.confiscation_reasons" placeholder="Enter Asset Description"></textarea>
                <span x-show="errors[index].confiscation_reasons" class="text-danger p-0 m-0 fw-medium"
                    x-text="errors[index].confiscation_reasons"></span>
            </div>

            <div class="form-group">
                <label for="" class="fw-bold text-dark">Upload Asset Images</label>
                <input type="file" @change="handleFileUpload($event, index)" multiple
                    class="form-control fw-bold">
            </div>

            <div class="form-group">
                <div class="col-lg-12 d-flex align-items-center" x-show="asset.images.length > 0">
                    <template x-for="(image, imgIndex) in asset.images" :key="imgIndex">
                        <div class="text-center card me-2">
                            <div class="px-3 py-2">
                                <img :src="image.url" height="50">
                            </div>
                            <span @click="removeImage(index, imgIndex)"
                                class="text-danger bg-soft-danger mx-3 mb-3 text-center rounded-pill"
                                style="cursor:pointer;">remove</span>
                        </div>
                    </template>
                </div>
            </div>


            <div class="col-lg-12 d-flex mt-3 justify-content-end">
                <button class="btn btn-danger rounded-circle btn-sm" @click="remove_asset(index)">
                    <svg viewBox="0 0 24 24" width="25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                            </path>
                            <path d="M9.17065 4C9.58249 2.83481 10.6937 2 11.9999 2C13.3062 2 14.4174 2.83481 14.8292 4"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path
                                d="M18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5M18.8334 8.5L18.6334 11.5"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        </g>
                    </svg>
                </button>
            </div>

        </div>
    </template>

    <template x-if="assets.length > 0">
        <div class="row">
            <div class="col-12 text-end p-0 m-0 mt-3">
                <button class="btn btn-primary fw-bold rounded-pill" wire:loading.remove @click="validate()">Save
                    Asset Details</button>
                <div class="" wire:loading wire:target="save_asset">
                    <x-btn-loader />
                </div>
            </div>
        </div>
    </template>

    <div class="col-12 text-center fw-bold">Step 2 / 3</div>

    {{-- <div class="row">

        @if ($asset_type != 'movable' && $asset_type != 'intangible' && $asset_type != null)
            <div class="form-group col-lg-6">
                <label class="fw-bold text-dark" for="name">Serial Number <span class="text-danger">*</span></label>
                <input type="text" class="form-control border-dark fw-bold" wire:model="serial_number"
                    placeholder="Enter Asset Serial Number">
            </div>

            @error('serial_number')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        @endif

        <div class="form-group col-lg-6">
            <label class="fw-bold text-dark" for="name">Purchase Price (BWP) <span
                    class="text-danger">*</span></label>
            <input type="number" class="form-control border-dark fw-bold" wire:model="purchase_price"
                placeholder="Enter Purchase Price">

            @error('purchase_price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-lg-6">
            <label class="fw-bold text-dark" for="name">Date Purchased <span class="text-danger">*</span></label>
            <input type="date" class="form-control border-dark fw-bold" wire:model="purchase_date">

            @error('purchase_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-lg-6">
            <label class="fw-bold text-dark" for="name">Warrant Expiry Date <span
                    class="text-danger">*</span></label>
            <input type="date" class="form-control border-dark fw-bold" wire:model="warranty_expiry_date">

            @error('warranty_expiry_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror

        </div>

        <div class="form-group col-lg-6">
            <label class="fw-bold text-dark" for="name">Asset Condition <span class="text-danger">*</span></label>
            <input type="text" class="form-control border-dark fw-bold" wire:model="asset_condition"
                placeholder="Enter Asset Condition">

            @error('asset_condition')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-lg-6">
            <label class="fw-bold text-dark" for="name">Confiscation Location <span
                    class="text-danger">*</span></label>
            <select name="" id="" class="form-control border-dark fw-bold" wire:model="location">
                <option value="0" selected>Confiscation Location</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select>

            @error('location')
                <span class="text-danger">{{ $message }}</span>
            @enderror

        </div>

        <div class="form-group col-lg-6">
            <label class="fw-bold text-dark" for="name">Vendor <span class="text-danger">*</span></label>
            <input type="text" class="form-control border-dark fw-bold" wire:model="vendor"
                placeholder="Enter Asset Vendor">

            @error('vendor')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-lg-12">
            <label class="fw-bold text-dark" for="name">Confiscation Reasons<span class="text-danger">
                    *</span></label>
            <textarea name="" class="form-control border-dark" id="" cols="30" rows="5"
                placeholder="Confiscation Reasons" wire:model="confiscation_reasons"></textarea>

            @error('confiscation_reasons')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-12 text-end">
            <button class="btn btn-primary fw-bold rounded-2 px-3" wire:loading.remove wire:target="save_asset"
                wire:click="save_asset">Next Step</button>
            <div class="" wire:loading wire:target="save_asset">
                <x-btn-loader />
            </div>
        </div>
    </div> --}}

</div>

<script>
    function assetForm() {
        return {
            assets: [],
            errors: [],
            loading: false,
            asset_types: @json($asset_types),
            asset_categories: @json($asset_categories),
            asset_sub_categories: @json($asset_sub_categories),
            locations: @json($locations),
            judgment_types: @json($judgment_types),
            statuses: @json($statuses),

            add_asset() {
                this.assets.push({
                    vendor: '',
                    status: '',
                    asset_name: '',
                    model_name: '',
                    asset_type: '',
                    category: '',
                    asset_sub_category: '',
                    court_case: '',
                    judgment_type: '',
                    serial_number: '',
                    confiscation_reasons: '',
                    images: [],
                    confiscation_location: '',
                })

                this.errors.push({
                    status: '',
                    asset_name: '',
                    asset_type: '',
                    category: '',
                    asset_sub_category: '',
                    purchase_date: '',
                    judgment_type: '',
                    purchase_price: '',
                    warranty_expiry_date: '',
                    confiscation_reasons: '',
                    confiscation_location: '',
                });
            },

            handleFileUpload(event, index) {
                const files = event.target.files;
                for (let i = 0; i < files.length; i++) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.assets[index].images.push({
                            url: e.target.result
                        });
                    };
                    reader.readAsDataURL(files[i]);
                }
            },

            removeImage(assetIndex, imageIndex) {
                this.assets[assetIndex].images.splice(imageIndex, 1);
            },

            get_asset_categories(index) {
                this.assets[index].asset_categories = this.asset_categories.filter(category => category.asset_type_id ==
                    this.assets[index].asset_type);
            },

            get_asset_sub_categories(index) {
                console.log('===============================')
                console.log(this.assets[index].category)
                console.log('===============================')
                this.assets[index].asset_sub_categories = this.asset_sub_categories.filter(sub_category => sub_category.asset_category_id == this.assets[index].category);
                console.log(this.assets[index].asset_sub_categories)
            },

            remove_asset(index) {
                this.assets.splice(index, 1);
            },

            validate() {
                this.errors = [];
                this.assets.forEach((asset, index) => {
                    this.errors.push({
                        status: '',
                        asset_name: '',
                        asset_type: '',
                        category: '',
                        asset_sub_category: '',
                        purchase_date: '',
                        judgment_type: '',
                        confiscation_reasons: '',
                        confiscation_location: '',
                    });

                    // Validate each asset
                    if (asset.asset_name.trim() === '') {
                        this.errors[index].asset_name = 'Asset name is required';
                    }

                    if (asset.status.trim() === '') {
                        this.errors[index].status = 'Status is required';
                    }

                    if (asset.asset_type.trim() === '') {
                        this.errors[index].asset_type = 'Asset type is required';
                    }

                    if (asset.category.trim() === '') {
                        this.errors[index].asset_category = 'Asset category is required';
                    }

                    if (asset.asset_sub_category.trim() === '') {
                        this.errors[index].asset_sub_category = 'Asset sub category is required';
                    }

                    if (asset.judgment_type.trim() === '') {
                        this.errors[index].judgment_type = 'Judgment type is required';
                    }

                    if (asset.confiscation_location.trim() === '') {
                        this.errors[index].confiscation_location = 'Confiscation location is required';
                    }

                    if (asset.confiscation_reasons.trim() === '') {
                        this.errors[index].confiscation_reasons = 'Confiscation reasons is required';
                    }
                });

                if (this.errors.some(error => Object.values(error).some(value => value !== ''))) {
                    return;
                } else {
                    this.$wire.save_asset(this.assets);
                }
            }

        }
    }
</script>
