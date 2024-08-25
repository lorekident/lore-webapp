<x-app-layout :pageTitle="'Campaigns'" :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col col-lg-3 col-md-6">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="rounded-circle p-2 bg-soft-primary">
                                <svg width="50" height="50" viewBox="0 0 24 24" fill="#00CB72"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H18C19.1 22 20 21.1 20 20V8L14 2ZM14 17H10V15H14V17ZM14 14H10V12H14V14ZM13 9V3.5L18.5 9H13Z" />
                                </svg>
                            </div>
                            <div class="text-end fw-bold h6 text-muted">
                                Published
                                <h4 class="fw-bold text-muted">
                                    {{ $campaigns->where('campaign_status', 'published')->count()}}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col col-lg-3 col-md-6">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="rounded-circle p-2 bg-soft-primary">
                                <svg width="50" height="50" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H18C19.1 22 20 21.1 20 20V8L14 2ZM14 17H10V15H14V17ZM14 14H10V12H14V14ZM13 9V3.5L18.5 9H13Z" />
                                </svg>
                            </div>
                            <div class="text-end fw-bold h6 text-muted">
                                Drafts
                                <h4 class="fw-bold text-muted">
                                    {{ $campaigns->where('campaign_status', 'draft')->count()}}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3 col-md-6">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="rounded-circle p-2 bg-soft-primary">
                                <svg width="50" height="50" viewBox="0 0 24 24" fill="#FFC107"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h2v2H11v-2zm1-13c3.31 0 6 2.69 6 6s-2.69 6-6 6-6-2.69-6-6 2.69-6 6-6zM6 12c0-2.53 1.97-4.58 4.47-4.95L10 7H8c-.55 0-1 .45-1 1v4H5.67c-.46 0-.67-.58-.33-.89L9 8l.92.92c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41L8.41 6.7C8.17 6.45 8 6.22 8 6H6V5c0-.55.45-1 1-1h2.34l1-1H7c-2.21 0-4 1.79-4 4s1.79 4 4 4h1c.55 0 1-.45 1-1v-1.28C7.41 12.48 6 13.62 6 15z" />
                                </svg>
                            </div>
                            <div class="text-end fw-bold h6 text-muted">
                                Public Awareness
                                <h4 class="fw-bold text-muted">
                                    {{ $campaigns->where('campaign_status', 'public_awareness')->count()}}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3 col-md-6">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="rounded-circle p-2 bg-soft-primary">
                                <svg width="50" height="50" viewBox="0 0 24 24" fill="#FF5722"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9 3H15V4H18C19.1 4 20 4.9 20 6V7H4V6C4 4.9 4.9 4 6 4H9V3M6 8H18C18.55 8 19 8.45 19 9V11H5V9C5 8.45 5.45 8 6 8M7 12V21H8V13H16V21H17V12H7Z" />
                                </svg>
                            </div>
                            <div class="text-end fw-bold h6 text-muted">
                                Asset Disposal
                                <h4 class="fw-bold text-muted">
                                    {{ $campaigns->where('campaign_status', 'asset_disposal')->count()}}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="col-12 card rounded-1">
            <div class="col-12 px-3 py-2 d-flex align-items-center">
                <div class="col-4 h6 fw-bold text-muted py-3">
                    Campaigns
                </div>
                <div class="col-4">
                    <input type="text" class="form-control border-light rounded-1" name="" id=""
                        placeholder="Search here...">
                </div>
                <div class="col-4 d-flex justify-content-end align-items-end text-end">
                    <div class="col-6">
                        <a href="{{ route('campaigns.create') }}" class="btn btn-primary fw-bold rounded-pill px-3">Add
                            Campaign</a>
                    </div>
                </div>
            </div>
            <table class="table align-middle table-nowrap table-striped-columns mb-0">
                <thead class="bg-light p-0 m-0">
                    <tr class="fw-bold">
                        <th scope="col" class="text-muted fw-bold">No.</th>
                        <th scope="col" class="text-muted fw-bold">Campaign Type</th>
                        <th scope="col" class="text-muted fw-bold">Case N0.</th>
                        <th scope="col" class="text-muted fw-bold">Heading</th>
                        <th scope="col" class="text-muted fw-bold">Created Date</th>
                        <th scope="col" class="text-muted fw-bold">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($campaigns as $index => $campaign)
                    <tr>
                        <td class="text-muted fw-bold">{{ $campaigns->firstItem() + $index }}</td>
                        <td class="text-muted fw-bold">{{ formatName($campaign->campaign_type) }}</td>
                        <td class="text-muted fw-bold text-wrap">{{ $campaign->courtCase->case_title ?? 'null' }}</td>
                        <td class="text-muted fw-bold text-wrap">{{ $campaign->heading }}</td>
                        <td class="text-muted fw-bold">{{ formatDate($campaign->created_at) }}</td>
                        <td class="text-muted fw-bold">
                            <!-- <a href="{{ route('campaigns.view', $campaign->id) }}"
                                class="btn btn-primary btn-sm">View</a> -->
                            <a href="{{ route('campaigns.view', $campaign->id) }}" title="View" class="mx-2">
                                <i>
                                    <x-icons.view-icon height="30" width="30" />
                                </i>
                            </a>
                            @if($campaign->campaign_status === 'published')
                            <a href="#" class="mx-2" title="Already Posted">
                                <i>
                                    <x-icons.post-icon height="30" width="30" color="#CCCCCC"/>
                                </i>
                            </a>
                            @else
                            <a href="{{ route('campaigns.postCampaign', $campaign->id) }}" title="Post" class="mx-2">
                                <i>
                                    <x-icons.post-icon height="30" width="30" color="#00CB72" />
                                </i>
                            </a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">No Campaigns Found...</td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
        {{ $campaigns->links() }}
        <!-- Pagination links -->
    </div>
</x-app-layout>

@push('styles')
<style>
.text-wrap {
    white-space: normal;
    /* Allow text to wrap */
    word-wrap: break-word;
    /* Break long words */
    max-width: 200px;
    /* Optional: limit the width of the column */
}
</style>
@endpush


@push('scripts')
<script>
document.getElementById('login_btn').addEventListener('click', function() {
    document.getElementById('login_btn').style.display = 'none';
    document.getElementById('attempt_btn').style.display = 'block';
});
</script>
@endpush