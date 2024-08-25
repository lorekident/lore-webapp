<div>
    @push('scripts')
    @endpush

    <x-app-layout :assets="$assets ?? []">
        <div>
            <div class="row mb-3">
                <x-flash-messages />
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">All posts</h4>
                            </div>

                        </div>
                        <div class="d-flex justify-content-between p-3">
                            <div>
                                <input wire:model.live.debounce.300ms="search" type="text" class="form-control"
                                    placeholder="Search Events...">

                            </div>
                            <div class="header-action">
                                <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary">Add Post</a>
                            </div>
                        </div>
                        <div class="card-body px-0">
                            <div class="table-responsive">
                                <table class="table  table-nowrap mb-0" id="tasksTable">
                                    <thead class="table-light text-muted">
                                        <tr>
                                            {{-- <th scope="col" style="width: 40px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="checkAll"
                                                    value="option">
                                            </div>
                                        </th> --}}
                                            <th class="sort" data-sort="id">ID</th>
                                            <th class="sort" data-sort="title">Title</th>
                                            <th class="sort" data-sort="created_at">Posted By</th>
                                            <th class="sort" data-sort="created_at">Publication Status</th>
                                            <th class="sort" data-sort="created_at">Date of Publication</th>
                                            <th class="sort" data-sort="created_at">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @forelse ($posts as $post)
                                            <tr wire:key="{{ $post->id }}">
                                                <td>{{ $post->id }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>
                                                    <img src="{{ @asset('images/avatars/avtar_1.png') }}" alt=""
                                                        class="rounded-circle me-1" width="24" height="24">
                                                    {{ $post->user->full_name }}
                                                </td>
                                                <td>
                                                    @if ($post->status == 'published')
                                                        <span class="badge bg-success p-1">Published</span>
                                                    @elseif($post->status == 'draft')
                                                        <span class="badge bg-warning p-1">Draft</span>
                                                    @elseif($post->status == 'private')
                                                        <span class="badge bg-info p-1">private</span>
                                                    @else
                                                        <span class="badge bg-danger p-1">Not Assigned</span>
                                                    @endif
                                                </td>
                                                <td>{{ $post->created_at->format('F j, Y') }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm dropdown-toggle" type="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                                            </svg> Manage
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('posts.show', ['id' => \Illuminate\Support\Facades\Crypt::encrypt($post->id)]) }})">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-eye"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                                    <path
                                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                                </svg>
                                                                <span>View/Edit</span>
                                                            </a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('posts.destroy', ['id' => \Illuminate\Support\Facades\Crypt::encrypt($post->id)]) }}"
                                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $post->id }}').submit();">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-trash3" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                                </svg>
                                                                <span>Delete</span>
                                                            </a>
                                                            <form id="delete-form-{{ $post->id }}"
                                                                action="{{ route('posts.destroy', ['id' => \Illuminate\Support\Facades\Crypt::encrypt($post->id)]) }}"
                                                                method="POST" class="d-none">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">No posts Found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="d-flex mt-4">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

</div>
