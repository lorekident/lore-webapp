@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // const assets = @json($allAssets);

    // $('#asset_id').select2({
    //     data: assets.map(asset => ({
    //         id: asset.id,
    //         text: asset.id + ' - ' + asset.asset_name
    //     }))
    // });

    // Fetch data for the selected case and populate the form fields
    document.getElementById('case_id').addEventListener('change', function() {
        const caseId = this.value;
        if (caseId) {
            fetch(`/api/cases/${caseId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('caseNumber').value = data.case_title || '';
                    document.getElementById('defendant').value = 'King Solomon' || '';
                    // Populate assets
                    // const assetsSelect = document.getElementById('assets');
                    // assetsSelect.innerHTML = ''; // Clear existing options
                    // data.assets.forEach(asset => {
                    //     const option = document.createElement('option');
                    //     option.value = asset.id;
                    //     option.textContent = `${asset.id} - ${asset.asset_name}`;
                    //     option.selected = true;
                    //     assetsSelect.appendChild(option);
                    // });
                })
                .catch(error => console.error('Error fetching case data:', error));
        }
    });

    const headingInput = document.getElementById('heading');

    headingInput.addEventListener('focus', function() {
        this.removeAttribute('placeholder');
    });
    headingInput.addEventListener('blur', function() {
        if (this.value === '') {
            this.setAttribute('placeholder', 'IN THE HIGH COURT OF THE REPUBLIC OF...');
        }
    });
    const subHeadingInput = document.getElementById('subHeading');

    subHeadingInput.addEventListener('focus', function() {
        this.removeAttribute('placeholder');
    });
    subHeadingInput.addEventListener('blur', function() {
        if (this.value === '') {
            this.setAttribute('placeholder', 'BE PLEASED TO TAKE NOTICE that pursuant to the judgment of the above...');
        }
    });

    // const campaignTypeElement = document.getElementById('campaign_type');
    // const dateOfDisposalElement = document.getElementById('date_of_disposal');

    // campaignTypeElement.addEventListener('change', function() {
    //     if (campaignTypeElement.value != null) {
    //         dateOfDisposalElement.parentElement.style.display = 'block';
    //     } else {
    //         dateOfDisposalElement.parentElement.style.display = 'none';
    //     }
    // });

    campaignTypeElement.dispatchEvent(new Event('change'));

    // Select/Deselect All functionality for assets
    document.getElementById('select-all').addEventListener('click', function() {
        const options = document.getElementById('assets').options;
        for (let i = 0; i < options.length; i++) {
            options[i].selected = true;
        }
    });

    document.getElementById('deselect-all').addEventListener('click', function() {
        const options = document.getElementById('assets').options;
        for (let i = 0; i < options.length; i++) {
            options[i].selected = false;
        }
    });
});
</script>
@endpush

<x-app-layout :pageTitle="'Create Campaign'" :assets="$assets ?? []">
    <div class="row">
        <form action="{{ route('campaigns.saveCampaign') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row bg-light rounded-3 py-3">
                <div class="form-group col-lg-6">
                    <label class="fw-bold text-dark" for="case_id">Select Case<span class="text-danger">*</span></label>
                    <select class="form-control" id="case_id" name="case_id" required>
                        <option value="">Select Case</option>
                        @foreach($allCases as $case)
                        <option value="{{ $case->id }}">{{ $case->case_title }}</option>
                        @endforeach
                    </select>

                    @error('case_title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label for="caseNumber" class="fw-bold text-dark">Case Number</label>
                    <input type="text" class="form-control" id="caseNumber" name="caseNumber" disabled>
                </div>
                <div class="form-group col-lg-6">
                    <label for="defendant" class="fw-bold text-dark">Defendant</label>
                    <input type="text" class="form-control" id="defendant" name="defendant" disabled>
                </div>
                <div class="form-group col-lg-6">
                    <label for="campaign_type" class="fw-bold text-dark">Campaign Type<span
                            class="text-danger">*</span></label>
                    <select class="form-control" id="campaign_type" name="campaign_type" required>
                        <option value="">Select Campaign Type</option>
                        <option value="asset_disposal">Asset Disposal</option>
                    </select>
                </div>
                <div class="form-group col-lg-6" id="date_of_disposal_container" style="display: block;">
                    <label for="date_of_disposal" class="fw-bold text-dark">Date of Disposal</label>
                    <input type="date" class="form-control" id="date_of_disposal" name="date_of_disposal">
                </div>
                <!-- <div class="form-group col-lg-8">
                    <label class="fw-bold text-dark" for="assets">Select Assets<span
                            class="text-danger">*</span></label>
                    <select class="form-control" id="assets" name="assets[]" multiple>
                        <option value="">Select Assets</option>
                        {{-- @foreach($allAssets as $asset)
                        <option value="{{ $asset->id }}">{{ $asset->title }}</option>
                        @endforeach --}}
                    </select>

                    <button type="button" id="select-all" class="btn btn-primary mt-2">Select All</button>
                    <button type="button" id="deselect-all" class="btn btn-secondary mt-2">Deselect All</button>

                    @error('asset_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> -->
                <div class="form-group col-lg-12">
                    <label for="heading" class="fw-bold text-dark">Heading</label>
                    <input type="text" class="form-control" id="heading" name="heading"
                        Placeholder="IN THE HIGH COURT OF THE REPUBLIC OF..." required>
                </div>
                <div class="form-group col-lg-12">
                    <label for="heading" class="fw-bold text-dark">SubHeading</label>
                    <input type="text" class="form-control" id="subHeading" name="subHeading"
                        placeholder="BE PLEASED TO TAKE NOTICE that pursuant to the judgment of the above..." required
                        required>
                </div>
                <div class="form-group col-lg-6">
                    <label for="venue" class="fw-bold text-dark">Venue</label>
                    <input type="text" class="form-control" id="venue" name="venue">
                </div>
                <div class="form-group col-lg-6">
                    <label for="time" class="fw-bold text-dark">Time</label>
                    <input type="text" class="form-control" id="time" name="time">
                </div>
                <div class="form-group col-lg-12">
                    <label for="description" class="fw-bold text-dark">Description<span style="font-size:10px">(Property
                            Details)</span></label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group col-lg-12">
                    <label for="conditions" class="fw-bold text-dark">Conditions of Sale</label>
                    <input type="text" class="form-control" id="conditions" name="conditions">
                </div>
                <div class="form-group col-lg-6">
                    <label for="terms" class="fw-bold text-dark">Terms of Sale</label>
                    <input type="text" class="form-control" id="terms" name="terms">
                </div>
                <div class="form-group col-lg-6">
                    <label for="contactPerson" class="fw-bold text-dark">Contact Person</label>
                    <input type="text" class="form-control" id="contactPerson" name="contactPerson">
                </div>
                <div class="form-group col-lg-6">
                    <label for="address" class="fw-bold text-dark">Address line 1</label>
                    <input type="text" class="form-control" id="addressLine1" name="addressLine1">
                </div>
                <div class="form-group col-lg-6">
                    <label for="address" class="fw-bold text-dark">City/Town</label>
                    <input type="text" class="form-control" id="cityTown" name="cityTown">
                </div>
                <div class="form-group col-lg-6">
                    <label for="address" class="fw-bold text-dark">Address line 2</label>
                    <input type="text" class="form-control" id="addressLine2" name="addressLine2">
                </div>
                <div class="form-group col-lg-6">
                    <label for="address" class="fw-bold text-dark">Tel</label>
                    <input type="text" class="form-control" id="tel" name="tel">
                </div>
            </div>
            <div class="col-12 mt-3 text-end">
                <button type="submit" class="btn btn-primary fw-bold rounded-5 px-3">Create Campaign</button>
            </div>
        </form>
    </div>
    <script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error("ISSUE",error);
        });

        document.getElementById('myForm').addEventListener('submit', function(event) {
            // Get the editor data
            const editorData = editorInstance.getData();

            // Check if the editor data is empty
            if (!editorData.trim()) {
                // Prevent form submission
                event.preventDefault();
                // Focus the CKEditor
                editorInstance.editing.view.focus();
                // Optionally, show an error message
                alert('Description is required.');
            }
        });
    </script>
</x-app-layout>