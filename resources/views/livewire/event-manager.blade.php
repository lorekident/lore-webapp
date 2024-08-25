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
                                <h4 class="card-title">All Events</h4>
                            </div>

                        </div>
                        <div class="d-flex justify-content-between p-3">
                            <div>
                                <input wire:model.live.debounce.300ms="search" type="text" class="form-control"
                                    placeholder="Search Events...">

                            </div>
                            <div class="header-action">
                                <a href="{{ route('events.create') }}" class="btn btn-sm btn-primary">Add Event</a>
                            </div>
                        </div>
                        <div class="card-body px-0">
                            <div class="table-responsive">
                                <table class="table  table-nowrap mb-0" id="tasksTable">
                                    <thead class="table-light text-muted">
                                        <tr >
                                            {{-- <th scope="col" style="width: 40px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="checkAll"
                                                    value="option">
                                            </div>
                                        </th> --}}
                                            <th class="sort" data-sort="id">ID</th>
                                            <th class="sort" data-sort="title">Title</th>
                                            <th class="sort" data-sort="client_name">Start Date</th>
                                            <th class="sort" data-sort="client_name">End Date</th>
                                            <th class="sort" data-sort="client_name">Event Time</th>
                                            <th class="sort" data-sort="client_name">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @forelse ($events as $event)
                                            <tr wire:key="{{ $event->id }}">
                                                <td>{{ $event->id }}</td>
                                                <td>{{ $event->title }}</td>
                                                {{-- <td class="text-truncate">{!!$event->description!!}</td> --}}
                                                <td>{{ \Carbon\Carbon::parse($event->start_date)->format('F j, Y') }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($event->end_date)->format('F j, Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($event->start_time)->format('h:m a') }} -
                                                    {{ \Carbon\Carbon::parse($event->end_time)->format('h:m a') }}</td>
                                                {{-- <td>{{$event->start_time-}} - {{$event->end_time}}</td> --}}
                                                <td class="text-center">
                                                    <div class="dropdown">
                                                        <a href="#" role="button" id="dropdownMenuLink"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="bi bi-list-ul"
                                                                viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                                            </svg>
                                                        </a>

                                                        <ul class="dropdown-menu p-3"
                                                            aria-labelledby="dropdownMenuLink">
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('events.show', ['id' => \Illuminate\Support\Facades\Crypt::encrypt($event->id)]) }}">View</a>

                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('events.edit', ['id' => \Illuminate\Support\Facades\Crypt::encrypt($event->id)]) }}">Edit</a>

                                                            </li>
            
                                                                    <li><button class="dropdown-item text-danger" wire:click="deleteEvent({{$event->id}})">Delete
                                                    </button></li>
                                                                    {{-- <li><a class="dropdown-item text-danger" href=""
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#delete_event_{{ $event->id }}">Delete
                                                    </a></li> --}}
                                            <x-modal class="bg-danger"
                                                id="delete_event_{{ $event->id }}"
                                                modalsize="modal-dialog-centered" title="Confirm Delete Action">
                                                <div class="card">
                                                    <div class="card-title">
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <p class="text-danger">Are you sure you want to delete
                                                                employee for {{ $event->title }} Department?</p>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="hstack gap-2 justify-content-end">
                                                                    <button type="button" class="btn btn-light"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <form
                                                                        action="{{ route('events.destroy', ['id' => \Illuminate\Support\Facades\Crypt::encrypt($event->id)]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </x-modal>


                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>

                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">No Events Found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                            </div>
                        </div>
                            <div class="d-flex mt-4">
                                    {{ $events->links() }}
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

</div>
