<div>
    @if ($message = Session::get('error'))
    <div class="mt-2 alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
      <i class="ri-error-warning-line me-3 align-middle"></i> <strong>Problem Detected</strong> - {{{$message}}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($message = Session::get('success'))
    <div class="mt-2 alert alert-success alert-border-left alert-dismissible fade show" role="alert">
      <i class="ri-check-double-line me-3 align-middle"></i> <strong>Everything's Fine</strong> - {{$message}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($message = Session::get('warning'))
    <div class=" mt-2 alert alert-warning alert-border-left alert-dismissible fade show" role="alert">
      <i class="ri-alert-line me-3 align-middle"></i> <strong>Be Informed</strong> - {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($message = Session::get('info'))
    <div class="mt-2 alert alert-info alert-border-left alert-dismissible fade show" role="alert">
      <i class="ri-error-warning-line me-3 align-middle"></i> <strong>Attention</strong> - {{{$message}}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>