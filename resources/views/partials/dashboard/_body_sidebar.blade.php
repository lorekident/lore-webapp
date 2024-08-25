{{-- <aside class="sidebar sidebar-default sidebar-base sidebar-color navs-pill-all"> --}}
{{-- <aside class="sidebar sidebar-default sidebar-base navs-rounded sidebar-color navs-pill-all"> --}}
<aside class="sidebar sidebar-default sidebar-base sidebar-color navs-pill-all">
    <div class="sidebar-header rounded py-2 d-flex align-items-center justify-content-start" >
        <div class="col-12">
            <a href="{{ route('home') }}" class="navbar-brand text-center mt-3 p-0 m-0 justify-content-center">
                <img src="{{ asset('images/brands/LORE_LOGO.png') }}" class="img-fluid gradient-main w-50" alt="images">
            </a>
            <div class="text-center text-white fw-bold mt-4">LORE KID ENTERPRENEURSHIP SYSTEM</div>
        </div>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
    </div>
    <div class="sidebar-body pt-4 data-scrollbar">
        <div class="sidebar-list" id="sidebar">
            @include('partials.dashboard.vertical-nav')
        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside>
