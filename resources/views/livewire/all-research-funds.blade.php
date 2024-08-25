<div class="row">
           <div class="card rounded-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">Fund ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Amount (in BWP)</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Datw</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->applications as $application)
                                <tr>
                                    <td>BW/{{str_pad($application->id, 4, '0', STR_PAD_LEFT)}}RFUND</td>
                                    <td>{{ $application->title }}</td>
                                    <td>
                                        @if ($application->amount)
                                            {{ number_format($application->amount, 2) }}
                                        @else
                                            <span class="badge bg-danger">Not Set</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($application->start_date)
                                            {{ \Carbon\Carbon::parse($application->start_date)->format('d M Y') }}
                                        @else
                                            <span class="badge bg-danger">Not Set</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($application->end_date)
                                            {{ \Carbon\Carbon::parse($application->end_date)->format('d M Y') }}
                                        @else
                                            <span class="badge bg-danger">Not Set</span>
                                        @endif
                                    </td>
                                    <td><span class="badge {{$this->status_color($application->status)}} px-2 py-1 rounded-pill text-uppercase">{{$application->status}}</span></td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#0798f8" width="28px"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3 12C3 4.5885 4.5885 3 12 3C19.4115 3 21 4.5885 21 12C21 19.4115 19.4115 21 12 21C4.5885 21 3 19.4115 3 12Z" stroke="#0596ba" stroke-width="2"></path> <path d="M12.0049 16.005L12.0049 15.995" stroke="#0596ba" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12.0049 12.005L12.0049 11.995" stroke="#0596ba" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12.0049 8.005L12.0049 7.995" stroke="#0596ba" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                            </a>
                                          
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a  class="dropdown-item" href="{{route('research-fund-application.show', ['key' => $application->key])}}">
                                                    <svg width="28px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#0080c0" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9ZM11 12C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12Z" fill="#0791b8"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M21.83 11.2807C19.542 7.15186 15.8122 5 12 5C8.18777 5 4.45796 7.15186 2.17003 11.2807C1.94637 11.6844 1.94361 12.1821 2.16029 12.5876C4.41183 16.8013 8.1628 19 12 19C15.8372 19 19.5882 16.8013 21.8397 12.5876C22.0564 12.1821 22.0536 11.6844 21.83 11.2807ZM12 17C9.06097 17 6.04052 15.3724 4.09173 11.9487C6.06862 8.59614 9.07319 7 12 7C14.9268 7 17.9314 8.59614 19.9083 11.9487C17.9595 15.3724 14.939 17 12 17Z" fill="#0791b8"></path> </g></svg>
                                                    View</a></li>
                                                <li><a  class="dropdown-item" href="javascript:voide(0)">Deactivate</a></li>
                                            </ul> 
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No funds available...</td>
                                </tr>
                            @endforelse
    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
