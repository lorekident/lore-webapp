@push('styles')
<style>
.form-control-plaintext {
    display: block;
    width: 100%;
    padding: 0.5rem 0;
    margin-bottom: 0;
    line-height: 1.5;
    color: #8A92A6;
    border: solid;
    border-width: 1px 0;
}

.form-group label {
    margin-bottom: 0.2rem;
    /* Reduced space between label and input */
}

.form-group {
    margin-bottom: 0.75rem;
    /* Reduced space between form groups */
}

.card-header,
.card-body {
    padding: 1rem;
    /* Reduced padding for a tighter layout */
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endpush

<x-app-layout :pageTitle="'Campaign Details'">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <h3>Campaign Details:</h3>
                        <div class="d-flex justify-content-end align-items-center">
                            <span class="badge badge-secondary mr-3"
                                style="color: green">{{ ucfirst($campaign->campaign_status) }}</span>
                            <a href="{{ route('campaigns.previewPdf', $campaign->id) }}" class="btn btn-primary btn-sm"
                                target="_blank">Preview Pdf</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row bg-light-1 rounded-3 py-3">
                        <div class="form-group col-lg-6">
                            <label class="fw-bold text-dark"><strong>Created Date:</strong></label>
                            <input type="text" class="form-control-plaintext"
                                value="{{  formatDate($campaign->created_at) }}" disabled>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="fw-bold text-dark"><strong>Updated Date:</strong></label>
                            <input type="text" class="form-control-plaintext"
                                value="{{  formatDate($campaign->created_at) }}" disabled>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="fw-bold text-dark"><strong>Case Title:</strong></label>
                            <input type="text" class="form-control-plaintext"
                                value="{{ $campaign->courtCase->case_title ?? '' }}" disabled>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="fw-bold text-dark"><strong>Campaign Type:</strong></label>
                            <input type="text" class="form-control-plaintext"
                                value="{{ formatName($campaign->campaign_type) }}" disabled>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="fw-bold text-dark"><strong>Defendant:</strong></label>
                            <input type="text" class="form-control-plaintext"
                                value="{{ $campaign->courtCase->defendant->name ?? '' }}" disabled>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="fw-bold text-dark"><strong>Heading:</strong></label>
                            <input type="text" class="form-control-plaintext" value="{{ $campaign->heading }}" disabled>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="fw-bold text-dark"><strong>SubHeading:</strong></label>
                            <input type="text" class="form-control-plaintext" value="{{ $campaign->sub_heading }}"
                                disabled>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="fw-bold text-dark"><strong>Description:</strong></label>
                            <textarea class="form-control-plaintext" rows="3"
                                disabled>{{ $campaign->description }}</textarea>
                        </div>
                        @if($campaign->campaign_type == 'asset_disposal')
                        <div class="form-group col-lg-4">
                            <label class="fw-bold text-dark"><strong>Date of Disposal:</strong></label>
                            <input type="text" class="form-control-plaintext" value="{{ $campaign->date_of_disposal }}"
                                disabled>
                        </div>
                        @endif
                        {{--<div class="form-group col-lg-12">
                            <label class="fw-bold text-dark"><strong>Assets:</strong></label>
                            <ul>
                                @foreach($campaign->assets as $asset)
                                    <li>{{ $asset->id }} - {{ $asset->asset_name }}</li>
                        @endforeach
                        </ul>
                    </div>--}}
                    <div class="form-group col-lg-4">
                        <label class="fw-bold text-dark"><strong>Venue:</strong></label>
                        <input type="text" class="form-control-plaintext" value="{{ $campaign->venue }}" disabled>
                    </div>
                    <div class="form-group col-lg-4">
                        <label class="fw-bold text-dark"><strong>Time:</strong></label>
                        <input type="text" class="form-control-plaintext" value="{{ $campaign->time_of_disposal }}"
                            disabled>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="fw-bold text-dark"><strong>Conditions of Sale:</strong></label>
                        <textarea class="form-control-plaintext" rows="3"
                            disabled>{{ $campaign->conditions_of_sale }}</textarea>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="fw-bold text-dark"><strong>Terms of Sale:</strong></label>
                        <textarea class="form-control-plaintext" rows="3"
                            disabled>{{ $campaign->terms_of_sale }}</textarea>
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="fw-bold text-dark"><strong>Contact Person:</strong></label>
                        <input type="text" class="form-control-plaintext" value="{{ $campaign->contact_person }}"
                            disabled>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="fw-bold text-dark"><strong>Address Line 1:</strong></label>
                        <input type="text" class="form-control-plaintext" value="{{ $campaign->address_line_1 }}"
                            disabled>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="fw-bold text-dark"><strong>Address Line 2:</strong></label>
                        <input type="text" class="form-control-plaintext" value="{{ $campaign->address_line_2 }}"
                            disabled>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="fw-bold text-dark"><strong>City/Town:</strong></label>
                        <input type="text" class="form-control-plaintext" value="{{ $campaign->city_town }}" disabled>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="fw-bold text-dark"><strong>Tel:</strong></label>
                        <input type="text" class="form-control-plaintext" value="{{ $campaign->tel }}" disabled>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    @if($campaign->campaign_status === 'published')
                    <a href="#" title="Already Posted" class="mx-2">
                        <i>
                            <x-icons.post-icon height="30" width="30" color="#CCCCCC" />
                        </i>
                    </a>
                    <a href="#" title="Can't edit" class="mx-2">
                        <i>
                            <x-icons.edit-icon height="30" width="30" color="#CCCCCC" />
                        </i>
                    </a>
                    @else
                    <a href="{{ route('campaigns.postCampaign', $campaign->id) }}" title="Post"  class="mx-2">
                        <i>
                            <x-icons.post-icon height="35" width="35" color="#00CB72" />
                        </i>
                    </a>
                    <a href="{{ route('campaigns.edit', $campaign->id) }}" title="Edit" class="mx-2">
                        <i>
                            <x-icons.edit-icon height="30" width="30" color="#21aae0" />
                        </i>
                    </a>
                    @endif
                    <a href="{{ route('campaigns.index') }}" title="Back" class="mx-2">
                        <i>
                            <x-icons.back-icon height="30" width="30" color="#21aae0" />
                        </i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>