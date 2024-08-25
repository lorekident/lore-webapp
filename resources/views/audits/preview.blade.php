<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LORE KID ENTERPRENEURSHIP SYSTEM</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
            margin: 0;
        }
        .centered-div {
            text-align: center;
        }

        .badge {
        display: inline-block;
        padding: 0.25em 0.4em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25rem;
    }

    .badge.bg-primary {
        background-color: #007bff;
        color: #fff;
    }

    .badge.bg-warning {
        background-color: #ffc107;
        color: #212529;
    }

    .badge.bg-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .badge.bg-success {
        background-color: #28a745;
        color: #fff;
    }

    .badge.bg-info {
        background-color: #17a2b8;
        color: #fff;
    }

    .text-capitalize {
        text-transform: capitalize;
    }
    /* Base table styles */
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        border-collapse: collapse;
        table-layout: fixed; /* Fix the table layout */
        word-wrap: break-word; /* Ensure long text wraps */
        overflow: hidden; /* Hide overflow content */
        text-overflow: ellipsis; /* Show ellipsis for overflowing text */
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }

    .table tbody + tbody {
        border-top: 2px solid #dee2e6;
    }

    .table-sm th,
    .table-sm td {
        padding: 0.3rem;
    }

    .table-bordered {
        border: 1px solid #dee2e6;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
    }

    .table-bordered thead th,
    .table-bordered thead td {
        border-bottom-width: 2px;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table-primary,
    .table-primary > th,
    .table-primary > td {
        background-color: #b8daff;
    }

    .table-secondary,
    .table-secondary > th,
    .table-secondary > td {
        background-color: #d6d8db;
    }

    .table-success,
    .table-success > th,
    .table-success > td {
        background-color: #c3e6cb;
    }

    .table-info,
    .table-info > th,
    .table-info > td {
        background-color: #bee5eb;
    }

    .table-warning,
    .table-warning > th,
    .table-warning > td {
        background-color: #ffeeba;
    }

    .table-danger,
    .table-danger > th,
    .table-danger > td {
        background-color: #f5c6cb;
    }

    .table-light,
    .table-light > th,
    .table-light > td {
        background-color: #fdfdfe;
    }

    .table-dark,
    .table-dark > th,
    .table-dark > td {
        background-color: #c6c8ca;
    }

    .table-active,
    .table-active > th,
    .table-active > td {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table-hover .table-primary:hover {
        background-color: #9fcdff;
    }

    .table-hover .table-secondary:hover {
        background-color: #c8cbcf;
    }

    .table-hover .table-success:hover {
        background-color: #b1dfbb;
    }

    .table-hover .table-info:hover {
        background-color: #abdde5;
    }

    .table-hover .table-warning:hover {
        background-color: #ffe8a1;
    }

    .table-hover .table-danger:hover {
        background-color: #f1b0b7;
    }

    .table-hover .table-light:hover {
        background-color: #ececf6;
    }

    .table-hover .table-dark:hover {
        background-color: #b9bbbe;
    }

    .table-hover .table-active:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table .thead-dark th {
        color: #fff;
        background-color: #343a40;
        border-color: #454d55;
    }

    .table .thead-light th {
        color: #495057;
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

    .table-dark {
        color: #fff;
        background-color: #343a40;
    }

    .table-dark th,
    .table-dark td,
    .table-dark thead th {
        border-color: #454d55;
    }

    .table-dark.table-bordered {
        border: 0;
    }
    </style>
</head>
<body>
@php
        $armsPath = public_path('images/brands/LORE_LOGO.png');
        $armsData = file_get_contents($armsPath);
        $base64Arms = base64_encode($armsData);
        $armsMimeType = 'image/png';
        $coat_of_arms = 'data:' . $armsMimeType . ';base64,' . $base64Arms;

    @endphp
    <!-- <div style="margin-bottom: 2em;"> <img class="d-block mx-auto mt-3" width=150
        src={{$coat_of_arms}} alt="Coat Of Arms">
    </div> -->
    <div class="centered-div" style="margin-bottom: 2em;">
        <img class="d-block mx-auto mt-3" width=150 src="{{$coat_of_arms}}" alt="Coat Of Arms">
        <h3 style="text-align: center;">REPUBLIC OF BOTSWANA</h3>
    </div>
    <div style="border: 1px solid black; padding: 20px;">
        <h3 style="text-align: center;">The Office of the Receiver</h3>
        <p style="text-align: center;">Confisicated Assets Management System Audit Logs</p>
        <p>
            <strong class="text-capitalize">Printed By: {{auth()?->user()?->getFullNameAttribute()}}</strong><br>
        </p>
        <p>
            <span class="text-capitalize badge bg-info">Role: {{auth()?->user()?->getRoleNames()?->first()}}</span>
        </p>
        <p>Date:{{date('d, F Y H:i:s', strtotime(now()))}}</p>
        <table class="table table-striped">
            <thead>
               <tr>
                  <th>#</th>
                  <th>User Email</th>
                  <th>Position</th>
                  <th class="text-center">Message</th>
                  <th>Action</th>
                  <th>Date</th>
               </tr>
            </thead>
            <tbody>
               @forelse ($audit as $log)
                  <tr>
                      <td>LOG00{{$loop->iteration}}</td>
                      <td>{{$log?->user?->email}}</td>
                      <td><span class="badge bg-info text-capitalize">{{$log?->user?->getRoleNames()->first()}}</span></td>
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
                          @elseif ($log?->event == 'updated')
                              <span class="badge bg-warning text-capitalize">{{$log?->event}}</span>
                          @elseif ($log?->event == 'deleted')
                              <span class="badge bg-danger text-capitalize">{{$log?->event}}</span>
                          @elseif ($log?->event == 'created')
                              <span class="badge bg-success text-capitalize">{{$log?->event}}</span>
                          @elseif ($log?->event == 'restored')
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
    <h3 style="text-align: center;">END OF AUDIT LOG</h3>
</body>
</html>
