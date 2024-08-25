<div>
    @push('scripts')
        <script src="{{ URL::asset('vendor/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
        <script src="{{ URL::asset('vendor/quill/quill.min.js') }}"></script>
        <script src="{{ URL::asset('js/pages/form-editor.init.js') }}"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    @endpush

    <x-app-layout :assets="$assets ?? []">
        <div>
            <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data" data-toggle="validator">
                {{ csrf_field() }}
                <div class="row h-100">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Add New Event</h4>
                                </div>
                            </div>
                            <div class="card-body px-4">

                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group py-2">
                                            <label for="title" class="form-label">Event Title</label>
                                            <input id="title" type="text" name="title" class="form-control"
                                                placeholder="Event Title" required autofocus>
                                        </div>
                                    </div>
                                    <div class="row align-items-center bg-light mx-auto p-3 rounded my-2">
                                        <div class="col-lg-6 d-flex justify-content-center bg-light p-3 rounded"
                                            id="previewContainer"
                                            style="background-image: url({{ URL::asset('images/unicef_botswana.jpeg') }}); background-size: cover; background-repeat: no-repeat; height: 160px;">
                                        </div>
                                        <div class="col-lg-6 ">
                                            <label for="featured_image" class="form-label">Change Featured Image</label>
                                            <input type="file" class="form-control" id="featured_image"
                                                name="featured_image" onchange="previewAvatar(event)">
                                        </div>
                                    </div>
                                    <script>
                                        function previewAvatar(event) {
                                            var input = event.target;
                                            var reader = new FileReader();
                                            reader.onload = function() {
                                                var dataURL = reader.result;
                                                var previewContainer = document.getElementById('previewContainer');
                                                previewContainer.style.backgroundImage = "url('" + dataURL + "')";
                                            };
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    </script>

                                    <div class="col-lg-12 mt-3">
                                        <textarea class="ckeditor-classic border border-primary" id="description" name="description"
                                            placeholder="Write down your message">
                                        
                                     </textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 h-100">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Event Times</h4>
                                </div>
                            </div>
                            <div class="card-body px-4">
                                <div class="col-lg-12">
                                    <div class="form-group py-2">
                                        <label for="title" class="form-label">Event Start Date</label>
                                        <input id="date" type="date" name="start_date" class="form-control"
                                            placeholder="Event Start Date" required autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group py-2">
                                        <label for="title" class="form-label">Event End Date</label>
                                        <input id="date" type="date" name="end_date" class="form-control"
                                            placeholder="Event End Date" required autofocus>
                                    </div>
                                </div>
                                <hr class="bg-soft-dark" />
                                <div class="col-lg-12">
                                    <div class="form-group py-2">
                                        <label for="title" class="form-label">Event Start Time</label>
                                        <input id="date" type="time" name="start_time" class="form-control"
                                            placeholder="Event Start Time" required autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group py-2">
                                        <label for="title" class="form-label">Event End Time</label>
                                        <input id="date" type="time" name="end_time" class="form-control"
                                            placeholder="Event Start Time" required autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" id="login_btn"
                                        class="btn btn-primary">{{ __('Add Event') }}</button>
                                    <button class="btn btn-dark w-100 fw-bold" style="display: none;" id="attempt_btn"
                                        type="button" disabled>
                                        {{-- <span class="spinner-border spinner-border-sm w-100" role="status" aria-hidden="true"></span> --}}
                                        Saving...
                                    </button>
                                    <a href="{{ route('events.index') }}" class="btn btn-danger">Cancel</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </x-app-layout>

</div>
