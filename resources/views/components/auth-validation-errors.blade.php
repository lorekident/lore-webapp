@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="alert alert-danger border-0 fw-bold" role="alert">
            {{ $errors->first() }}
        </div>
    </div>
@endif
