<div>
    @push('scripts')
        <script src="{{ URL::asset('vendor/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
        <script src="{{ URL::asset('vendor/quill/quill.min.js') }}"></script>
        <script src="{{ URL::asset('js/pages/form-editor.init.js') }}"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    @endpush

    <x-app-layout :assets="$assets ?? []">
        <div>
            <form method="POST"
                action="{{ route('events.edit', ['id' => \Illuminate\Support\Facades\Crypt::encrypt($event->id)]) }}"
                enctype="multipart/form-data" data-toggle="validator">
                {{ csrf_field() }}
                <div class="row ">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">{{ $event->title }}</h4>
                                </div>
                            </div>
                            <div class="card-body px-4">

                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group py-2">
                                            <label for="title" class="form-label">Event Title</label>
                                            <input id="title" type="text" name="title" class="form-control"
                                                placeholder="Event Title" value="{{ $event->title }}" required
                                                autofocus>
                                        </div>
                                    </div>
                                    <div class="row align-items-center bg-light mx-auto p-3 rounded my-2">
                                        <div class="col-lg-6 d-flex justify-content-center bg-light p-3 rounded"
                                            style="background-image: url(@if ($event->featured_image != '') {{ URL::asset('images/events/' . $event->featured_image) }}@else{{ URL::asset('images/events/unicef_botswana.jpeg') }} @endif); background-size:cover; background-repeat:no-repeat;height:160px">
                                            {{-- <img id="avatarPreview"
                                                                    src="@if ($event->featured_image != ''){{URL::asset('images/'.$event->featured_image)}}@else{{URL::asset('images/unicef_botswana.jpeg')}} @endif"
                                                                    alt="user-img" width=250 /> --}}
                                        </div>
                                        <div class="col-lg-6 ">
                                            <label for="avatar" class="form-label">Change Featured Image</label>
                                            <input type="file" class="form-control" id="featured_image"
                                                name="featured_image" onchange="previewAvatar(event)">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mt-3">
                                        <textarea class="ckeditor-classic border border-primary" id="description" name="description"
                                            placeholder="Write down your message">
                                        {{ $event->description }}
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
                                            placeholder="Event Start Date" value="{{ $event->start_date }}" required
                                            autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group py-2">
                                        <label for="title" class="form-label">Event End Date</label>
                                        <input id="date" type="date" name="end_date" class="form-control"
                                            placeholder="Event End Date" value="{{ $event->end_date }}" required
                                            autofocus>
                                    </div>
                                </div>
                                <hr class="bg-soft-dark" />
                                <div class="col-lg-12">
                                    <div class="form-group py-2">
                                        <label for="title" class="form-label">Event Start Time</label>
                                        <input id="date" type="time" name="start_time" class="form-control"
                                            placeholder="Event Start Time" value="{{ $event->start_time }}" required
                                            autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group py-2">
                                        <label for="title" class="form-label">Event End Time</label>
                                        <input id="date" type="time" name="end_time" class="form-control"
                                            placeholder="Event Start Time" value="{{ $event->start_time }}" required
                                            autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" id="login_btn"
                                        class="btn btn-primary">{{ __('Update Event') }}</button>
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

            <div class="row">

                <div class="col-lg-8 h-100">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Speakers</h4>
                            </div>
                        </div>
                        <div class="card-body px-4">
                            <div class="col-lg-12">
                                @foreach ($speakers as $speaker)
                                    <div class="speaker-avatar">
                                        <img src="{{ asset('/images/speakers/' . $speaker->image) }}"
                                            class="img-thumbnail" alt="SPK" width=80 data-bs-toggle="modal"
                                            data-bs-target="#speakerModal{{ $speaker->id }}">

                                    </div>
                                @endforeach

                                <!-- Modal -->
                                @foreach ($speakers as $speaker)
                                    <div class="modal fade" id="speakerModal{{ $speaker->id }}" tabindex="-1"
                                        aria-labelledby="speakerModalLabel" aria-hidden="true"
                                        data-bs-backdrop="static" data-bs-keyboard="false">
                                        <div class="modal-dialog modal-lg modal-fullscreen-sm-down">
                                                                                            <form method="POST"
                                                    action="{{ route('events.speaker-edit', ['id' => \Illuminate\Support\Facades\Crypt::encrypt($speaker->id)]) }}"
                                                    enctype="multipart/form-data" data-toggle="validator">
                                                    {{ csrf_field() }}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="speakerModalLabel">
                                                        View/Update Speaker</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                    <div class="modal-body">
                                                        {{-- <img src="{{ asset('/images/speakers/' . $speaker->image) }}" class="img-thumbnail" alt="Speaker Image"> --}}
                                                        <div
                                                            class="row align-items-center bg-light mx-auto p-3 rounded my-2">
                                                            <div class="col-lg-6 d-flex justify-content-center bg-light p-3 rounded"
                                                                style="background-image: url(@if ($speaker->image != '') {{ URL::asset('/images/speakers/' . $speaker->image) }}@else{{ URL::asset('images/speakers/default-guest-speaker.jpg') }} @endif); background-size:cover; background-repeat:no-repeat;height:160px">
                                                                {{-- <img id="avatarPreview"
                                                                    src="@if ($event->featured_image != ''){{URL::asset('images/'.$event->featured_image)}}@else{{URL::asset('images/unicef_botswana.jpeg')}} @endif"
                                                                    alt="user-img" width=250 /> --}}
                                                            </div>
                                                            <div class="col-lg-6 ">
                                                                <label for="avatar" class="form-label">Change
                                                                    Image</label>
                                                                <input type="file" class="form-control"
                                                                    id="guest_image" name="guest_image"
                                                                    onchange="previewGuestImage(event)">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 mt-3">
                                                            <textarea class="border border-primary w-100" id="description" name="description"
                                                                placeholder="Write down speakers biography" value={{ $speaker->bio }}>
                                                            {{ $speaker->bio }}
                                                        </textarea>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group py-2">
                                                                    <label for="title" class="form-label">Speaker
                                                                        Names</label>
                                                                    <input type="text" name="name"
                                                                        class="form-control"
                                                                        placeholder="Speaker Names"
                                                                        value="{{ $speaker->name }}" required
                                                                        autofocus>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group py-2">
                                                                    <label for="title" class="form-label">Speaker
                                                                        Email</label>
                                                                    <input type="text" name="email"
                                                                        class="form-control"
                                                                        placeholder="Speaker Names"
                                                                        value="{{ $speaker->email }}" required
                                                                        autofocus>
                                                                </div>
                                                            </div>
                                                            <hr class="border border-primary" />
                                                            <h6>Socials</h6>
                                                            <div class="col-lg-6">
                                                                <div class="form-group py-2">
                                                                    <label for="title"
                                                                        class="form-label">Facebook</label>
                                                                    <input type="text" name="facebook"
                                                                        class="form-control" placeholder="Facebook"
                                                                        value="{{ $speaker->facebook }}" autofocus>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group py-2">
                                                                    <label for="title"
                                                                        class="form-label">Twitter</label>
                                                                    <input type="text" name="twitter"
                                                                        class="form-control" placeholder="Twitter"
                                                                        value="{{ $speaker->twitter }}" autofocus>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group py-2">
                                                                    <label for="title"
                                                                        class="form-label">Instagram</label>
                                                                    <input type="text" name="instagram"
                                                                        class="form-control" placeholder="Instagram"
                                                                        value="{{ $speaker->instagram }}" autofocus>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group py-2">
                                                                    <label for="title"
                                                                        class="form-label">LindedIn</label>
                                                                    <input type="text" name="lindedIn"
                                                                        class="form-control" placeholder="LindedIn"
                                                                        value="{{ $speaker->lindedIn }}" autofocus>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group py-2">
                                                                    <label for="title"
                                                                        class="form-label">Website</label>
                                                                    <input type="text" name="website"
                                                                        class="form-control" placeholder="Website"
                                                                        value="{{ $speaker->website }}" autofocus>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>
            </div>
    </x-app-layout>

</div>
