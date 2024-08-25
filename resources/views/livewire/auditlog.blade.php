<?php

use Livewire\Volt\Component;
use App\Models\Audit;

new class extends Component {
    public $auditLogs;

    public function mount()
    {
        $this->auditLogs = Audit::all();
    }
}; ?>

<div class="card-body">
    <div class="table-responsive">
       <table id="datatable" class="table table-striped" data-toggle="data-table">
          <thead>
             <tr>
                <th>#</th>
                <th>User</th>
                <th>Email</th>
                <th>Position</th>
                <th class="text-center">Message</th>
                <th>Action</th>
                <th>Date</th>
             </tr>
          </thead>
          <tbody>
             @forelse ($auditLogs as $log)
                <tr>
                    <td>LOG00{{$loop->iteration}}</td>
                    <td><span class="text-capitalize">{{$log?->user?->getFullNameAttribute()}}</span></td>
                    <td>{{$log?->user?->email}}</td>
                    <td><span class="badge bg-info text-uppercase">{{$log?->user?->getRoleNames()->first()}}</span></td>
                    <td style="vertical-align: top;">
                        <div style="max-width: 300px;">
                           <p style="
                                max-width: 300px;
                                word-wrap: break-word;
                                overflow-wrap: break-word;
                                white-space: pre-wrap;
                                text-align: left;
                                margin: 0;
                                padding: 0; "
                            >
{{$log?->message}}
                           </p>
                        </div>
                    </td>
                    <td>
                        @if ($log?->event == 'view')
                            <span class="badge bg-primary text-capitalize">{{$log?->event}}</span>
                        @elseif ($log?->event == 'update')
                            <span class="badge bg-warning text-capitalize">{{$log?->event}}</span>
                        @elseif ($log?->event == 'delete')
                            <span class="badge bg-danger text-capitalize">{{$log?->event}}</span>
                        @elseif ($log?->event == 'create')
                            <span class="badge bg-success text-capitalize">{{$log?->event}}</span>
                        @elseif ($log?->event == 'restore')
                            <span class="badge bg-success text-capitalize">{{$log?->event}}</span>
                        @else
                            <span class="badge bg-info text-capitalize">{{$log?->event}}</span>
                        @endif
                    </td>
                    <td>{{date('d F, Y H:i:s', strtotime($log?->created_at))}}</td>
                </tr>
             @empty
                <tr>
                    <td colspan="6" class="text-center">No audit logs found</td>
                </tr>
             @endforelse
       </table>
    </div>
 </div>
