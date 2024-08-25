<div class="row">
    <div class="col-lg-8">
        <div class="card rounded-4">
            <div class="card-body">
                <div class="card-title">
                    <h6 class="mb-0">Research Fund Application</h6>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6">
                        @if ($applicant)
                            <h6 class="mb-3">Applicantion Details</h6>
                            <div class="card bg-soft-info">
                                <div class="card-body">
                                    <div class="d-block justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="mb-0">
                                                    BW/{{ str_pad($application->id, 4, '0', STR_PAD_LEFT) }}RFA</h6>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <medium>
                                            <span class="fw-bold">Submitted:</span>
                                            {{ \Carbon\Carbon::parse($application->created_at)->format('F d, Y h:i A') }}
                                        </medium>
                                    </div>
                                    <div class="mt-3">
                                        <medium>
                                            <span class="fw-bold">Status:</span>
                                            <span
                                                class="badge {{ $this->status_color($application->status) }} px-2 py-1 rounded-pill text-uppercase">{{ $application->status }}</span>
                                        </medium>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        @if ($applicant)
                            <h6 class="mb-3">Applicant Details</h6>
                            <div class="card bg-soft-info">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center"><img
                                                class="img-fluid me-3 avatar-50 rounded-circle"
                                                src="data:image/png;base64,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"
                                                alt="01">
                                            <div>
                                                <h6 class="mb-0">{{ $applicant->first_name }}
                                                    {{ $applicant->last_name }}</h6>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="mt-3">
                                    <medium>
                                        <span class="fw-bold">Email:</span>
                                        {{ $applicant->email }}
                                    </medium>
                                </div>
                                <div class="mt-3">
                                    <medium>
                                        <span class="fw-bold">Phone Number:</span>
                                        {{ $applicant->phone_number }}
                                    </medium>
                                </div>
                            </div>
                            @endif
                    </div>
                </div>
            </div>
            @if ($fund)
                <h6 class="mb-3">Fund Details</h6>
                <div class="card bg-soft-info">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center"><img class="img-fluid me-3 avatar-50 rounded-circle"
                                    src="data:image/png;base64,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"
                                    alt="01">
                                <div>
                                    <h6 class="mb-0">{{ $fund->title }}</h6><small
                                        class="text-ellipsis short-1">{{ $fund->description }}</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2">@
                                <h6 class="mb-0">P{{ number_format($fund->amount, 2) }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($research)
                <h6 class="mb-3">Research Details</h6>
                <div class="card bg-soft-info">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center"><img class="img-fluid me-3 avatar-50 rounded-circle"
                                    src="data:image/png;base64,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"
                                    alt="01">
                                <div>
                                    <h6 class="mb-0">{{ $research->title }}</h6><small </div>
                                </div>
                                <div class="d-flex align-items-center gap-2">@
                                    {{-- <h6 class="mb-0">P{{number_format($fund->amount, 2)}}</h6> --}}
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <medium>
                                {{ $research->description }}
                            </medium>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
    <div class="col-lg-4">
        <div class="card rounded-4 border border-info">
            <div class="card-body">
                <div class="card-title">
                    <h6 class="mb-0">Actions</h6>
                    <p class="mb-0 text-muted">Actions to be taken on this application</p>
                </div>
                <hr>
    
            </div>
        </div>
    </div>
</div>

