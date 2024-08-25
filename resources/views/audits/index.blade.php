<x-app-layout :assets="$assets ?? []" :page-title="'Security - Audit Logs'">
    <div class="row">
        <div class="card">
            <div class="bd-example d-flex justify-content-between">
                <p class="h2 p-5">System Audit Logs </p>
                <div class="p-5">
                    <a href="{{route('audit-logs.print')}}">
                        <button type="button" class="btn btn-md btn-info">
                            <x-icons.pdf-icon height="20" width="20" />
                            Print Report
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <livewire:auditlog />
            </div>
        </div>

    </div>

</x-app-layout>
