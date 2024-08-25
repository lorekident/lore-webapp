@push('scripts')
@endpush


<x-app-layout :pageTitle="'Payments'" :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col col-lg-3 col-md-6">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="rounded-circle p-2 bg-soft-primary">
                                <svg fill="currentColor" class="p-1" width="50" version="1.1" id="Layer_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 496 496" xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M456,0H40C17.944,0,0,17.944,0,40v272c0,22.056,17.944,40,40,40h80v48H88v16h158.672 c4.472,14.904,11.144,29.144,19.912,42.296l5.416,8.128V496h16v-34.424l-8.104-12.16C264.264,425.976,256,398.68,256,370.504 c0-11.616,1.432-23.224,4.24-34.512l11.512-46.048L272,217.496c0-9.656,7.84-17.496,17.488-17.496 c8.808,0,16.264,6.584,17.36,15.32L320.936,328h22.224l9.088-81.8L328,205.784v-44.696l80,66.664v75.216L368.264,453.96L368,496 h16v-38.968L394.8,416H408v-16h-8.992l12.632-48H456c22.056,0,40-17.944,40-40V40C496,17.944,478.056,0,456,0z M136,400.008V400 v-48h105.104c-0.72,6.144-1.104,12.32-1.104,18.504c0,9.976,1.032,19.832,2.864,29.504H136z M244.712,332.112 c-0.32,1.288-0.552,2.592-0.848,3.888H40c-13.232,0-24-10.768-24-24v-8h137.472c3.312,9.288,12.112,16,22.528,16h71.744 L244.712,332.112z M168,296V104h16v200h-8C171.584,304,168,300.416,168,296z M200,304V104h16v200H200z M312,192.824 c-5.992-5.464-13.888-8.824-22.512-8.824C271.024,184,256,199.024,256,217.496v69.52L251.752,304H232V104h80V192.824z M335.752,249.8l-3.984,35.848L328,255.536v-18.648L335.752,249.8z M120,88v16h32v32H80c-4.416,0-8-3.584-8-8V64 c0-4.416,3.584-8,8-8h320c4.416,0,8,3.584,8,8v64c0,4.416-3.584,8-8,8h-72v-32h32V88H120z M480,312c0,13.232-10.768,24-24,24 h-40.152l7.888-29.96l0.008-2.04H480V312z M480,288h-56.208L424,220.248L342.104,152H400c13.232,0,24-10.768,24-24V64 c0-13.232-10.768-24-24-24H80c-13.232,0-24,10.768-24,24v64c0,13.232,10.768,24,24,24h72v136H16V40c0-13.232,10.768-24,24-24h416 c13.232,0,24,10.768,24,24V288z">
                                                    </path>
                                                    <path
                                                        d="M272,168c13.232,0,24-10.768,24-24s-10.768-24-24-24s-24,10.768-24,24S258.768,168,272,168z M272,136 c4.416,0,8,3.584,8,8s-3.584,8-8,8c-4.416,0-8-3.584-8-8S267.584,136,272,136z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="text-end fw-bold h6 text-muted"> Transactions <h4 class="fw-bold text-muted">
                                    <span>{{ 1 }}</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3 col-md-6">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="rounded-circle p-2 bg-soft-success">
                                <svg viewBox="0 0 24 24" fill="currentColor" width="50"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M19 15C16.79 15 15 16.79 15 19C15 19.75 15.21 20.46 15.58 21.06C16.27 22.22 17.54 23 19 23C20.46 23 21.73 22.22 22.42 21.06C22.79 20.46 23 19.75 23 19C23 16.79 21.21 15 19 15ZM21.07 18.57L18.94 20.54C18.8 20.67 18.61 20.74 18.43 20.74C18.24 20.74 18.05 20.67 17.9 20.52L16.91 19.53C16.62 19.24 16.62 18.76 16.91 18.47C17.2 18.18 17.68 18.18 17.97 18.47L18.45 18.95L20.05 17.47C20.35 17.19 20.83 17.21 21.11 17.51C21.39 17.81 21.37 18.28 21.07 18.57Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M22 7.54844V7.99844C22 8.54844 21.55 8.99844 21 8.99844H3C2.45 8.99844 2 8.54844 2 7.99844V7.53844C2 5.24844 3.85 3.39844 6.14 3.39844H17.85C20.14 3.39844 22 5.25844 22 7.54844Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M2 11.4983V16.4583C2 18.7483 3.85 20.5983 6.14 20.5983H12.4C12.98 20.5983 13.48 20.1083 13.43 19.5283C13.29 17.9983 13.78 16.3383 15.14 15.0183C15.7 14.4683 16.39 14.0483 17.14 13.8083C18.39 13.4083 19.6 13.4583 20.67 13.8183C21.32 14.0383 22 13.5683 22 12.8783V11.4883C22 10.9383 21.55 10.4883 21 10.4883H3C2.45 10.4983 2 10.9483 2 11.4983ZM8 17.2483H6C5.59 17.2483 5.25 16.9083 5.25 16.4983C5.25 16.0883 5.59 15.7483 6 15.7483H8C8.41 15.7483 8.75 16.0883 8.75 16.4983C8.75 16.9083 8.41 17.2483 8 17.2483Z"
                                            fill="currentColor"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="text-end fw-bold h6 text-muted"> Confiscated Asset Trust Fund <h4 class="fw-bold text-muted">
                                    <span>BWP 7520012.85</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3 col-md-6">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="rounded-circle p-2 bg-soft-warning">
                                <svg viewBox="0 0 24 24" version="1.1" xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    fill="currentColor" width="50">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <style type="text/css">
                                            .st0 {
                                                opacity: 0.2;
                                                fill: none;
                                                stroke: #000000;
                                                stroke-width: 5.000000e-02;
                                                stroke-miterlimit: 10;
                                            }
                                        </style>
                                        <g id="grid_system"></g>
                                        <g id="_icons">
                                            <path
                                                d="M17,2c-1.3,0-2.4,0.5-3.3,1.2c0,0-0.1,0-0.1-0.1C11.9,2.8,10,3.1,8.5,3.9C6.3,5.2,5,7.5,5,10v5.5c-0.6,0.5-1,1.2-1,2 C4,18.9,5.1,20,6.5,20h2.7c0.4,1.2,1.5,2,2.8,2s2.4-0.8,2.8-2h2.7c1.4,0,2.5-1.1,2.5-2.5c0-0.8-0.4-1.5-1-2v-3.9c0,0,0,0,0,0 c1.8-0.8,3-2.5,3-4.6C22,4.2,19.8,2,17,2z M17.5,18H14h-4H6.5C6.2,18,6,17.8,6,17.5S6.2,17,6.5,17h11c0.3,0,0.5,0.2,0.5,0.5 S17.8,18,17.5,18z M17,15H7v-5c0-1.8,1-3.4,2.5-4.3C10.4,5.2,11.4,5,12.4,5C12.1,5.6,12,6.3,12,7c0,2.8,2.2,5,5,5V15z M17,10 c-1.7,0-3-1.3-3-3s1.3-3,3-3s3,1.3,3,3S18.7,10,17,10z">
                                            </path>
                                            <path
                                                d="M18.7,5.3c-0.4-0.4-1-0.4-1.4,0L17,5.6l-0.3-0.3c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4L15.6,7l-0.3,0.3c-0.4,0.4-0.4,1,0,1.4 C15.5,8.9,15.7,9,16,9s0.5-0.1,0.7-0.3L17,8.4l0.3,0.3C17.5,8.9,17.7,9,18,9s0.5-0.1,0.7-0.3c0.4-0.4,0.4-1,0-1.4L18.4,7l0.3-0.3 C19.1,6.3,19.1,5.7,18.7,5.3z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="text-end fw-bold h6 text-muted"> Pending <h4 class="fw-bold text-muted">
                                    <span>{{ $payments->where('payment_status', 'pending')->count() }}</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3 col-md-6">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="rounded-circle p-2 bg-soft-danger">
                                <svg fill="currentColor" class="p-1" width="50" version="1.2" baseProfile="tiny"
                                    id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 256 256"
                                    xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g id="XMLID_3_">
                                            <path id="XMLID_4_"
                                                d="M233.3,187.3c-4.2-2.1-7.3-6.5-7.3-11.5v-119c0-5.9-4.9-10.7-10.8-10.7c-0.8,0-1.2,0-2.2,0.2v81.2 c0,2.3-1.7,4.2-4,4.2s-4-1.9-4-4.2V39.7c0-5.9-4.6-10.7-10.5-10.7c-5.9,0-10.5,4.8-10.5,10.7v7.5c0,0.8,1.9,1.5,2.7,2.5 c3.6,3.6,5.3,8.4,5.3,13.6v64.3c0,2.3-1.7,4.2-4,4.2c-2.3,0-4-1.9-4-4.2V63.3c0-5.9-5.1-10.7-11-10.7c-5.9,0-11,4.8-11,10.7v92.1 c0,2.3-1.7,4.2-4,4.2s-4-1.9-4-4.2v-30.1c0-5.9-5.1-10.7-11-10.7c-5.9,0-11,4.8-11,10.7V183c0,14.8,8.5,27.8,20.8,34.2L246,256h10 v-57.9L233.3,187.3z">
                                            </path>
                                            <path id="XMLID_11_"
                                                d="M81.9,88H31.1c-18.8,13-31.7,30.7-31.7,63.3c0,45.9,25.6,66.4,57.2,66.4c31.6,0,57.2-20.5,57.2-66.4 C113.7,118.7,100.7,101,81.9,88z M61.4,181.9l0,7.5l-8.6,0l0-7.1c-4.3,0-11.6-1.7-14.4-3l2.6-9.9c3.2,1.7,8.4,3.5,13.6,3.5 c5.4,0,8.6-2.4,8.6-5.8c0-3.4-2.4-5.2-8.8-7.6c-9-3-15.3-7.8-15.3-15.8c0-7.5,5-13.3,13.6-15.5l0-7.3l8.6,0l0,7.1 c4.3,0,9.3,1.5,12.3,2.8l-3,9.7c-2.2-1.1-6-2.4-11.2-2.4c-5.2,0-8,2.4-8,5.2c0,3.4,3,4.7,9.9,7.6c9.3,3.5,14.2,8.2,14.2,15.7 C75.4,174.2,69.6,180.2,61.4,181.9z">
                                            </path>
                                            <polygon id="XMLID_12_"
                                                points="37,82 76.2,82 76.2,82 91.6,36 21.7,36 37,82 "></polygon>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="text-end fw-bold h6 text-muted"> Rejected <h4 class="fw-bold text-muted">
                                    <span>{{ $payments->where('payment_status', 'failed')->count() }}</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 card rounded-1">
            <div class="col-12 px-3 py-2 d-flex align-items-center">
                <div class="col-6 h6 fw-bold text-muted py-3">
                    Payments
                </div>
                <div class="col-6 d-flex justify-content-end align-items-end text-end">
                    <div class="col-6">
                        <input type="text" class="form-control border-light rounded-1" name=""
                            id="" placeholder="Search here...">
                    </div>
                </div>
            </div>
            <table class="table align-middle table-nowrap table-striped-columns mb-0">
                <thead class="bg-light p-0 m-0">
                    <tr class="fw-bold">
                        <th scope="col" class="text-muted fw-bold">Payment No</th>
                        <th scope="col" class="text-muted fw-bold">Amount(BWP)</th>
                        <th scope="col" class="text-muted fw-bold">Description</th>
                        <th scope="col" class="text-muted fw-bold">Payment Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($payments as $payment)
                        <tr>
                            <td class="text-muted fw-bold">{{ $payment->payment_no }}</td>
                            <td class="text-muted fw-bold">
                                {{ $payment->payment_currency . ' ' . number_format($payment->payment_amount, 2) }}</td>
                            <td class="text-muted fw-bold">{{ $payment->payment_description }}</td>
                            <td class="text-muted fw-bold">
                                @if ($payment->payment_status == 'pending')
                                    <span class="badge bg-warning px-2 py-1 rounded-pill">
                                        {{ $payment->payment_status }}
                                    </span>
                                @endif
                                @if ($payment->payment_status == 'paid')
                                    <span class="badge bg-success px-2 py-1 rounded-pill">
                                        {{ $payment->payment_status }}
                                    </span>
                                @endif
                                @if ($payment->payment_status == 'rejected')
                                    <span class="alert bg-danger px-2 py-1 rounded-pill">
                                        {{ $payment->payment_status }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        {{-- <tr>
                            <td colspan="5" class="text-center text-muted">No Payments Found...</td>
                        </tr> --}}
                        <tr>
                            <td class="text-muted fw-bold">PMT-041</td>
                            <td class="text-muted fw-bold">632.80</td>
                            <td class="text-muted fw-bold">Bid Resevation Payment for the Asset# AST-00231</td>
                            <td class="text-muted fw-bold">
                                <span class="badge bg-warning px-2 py-1 rounded-pill">
                                    Pending
                                </span>
                            </td>

                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</x-app-layout>
