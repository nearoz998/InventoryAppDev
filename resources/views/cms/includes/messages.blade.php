@if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{-- <ul> --}}
        {{-- <li> --}}
        <div class="row">
            <div class="col text-left">{!! \Session::get('success') !!}</div>
            <div class="col text-right"><button type="button" class="btn-xs btn-close" data-bs-dismiss="alert"
                    aria-label="Close">&times;</button></div>
        </div>
        {{-- </li> --}}

        {{-- </ul> --}}
    </div>
@endif
@if (\Session::has('info'))
    <div class="alert alert-info alert-dismissible fade show">
        {{-- <ul> --}}
        {{-- <li> --}}
        <div class="row">
            <div class="col text-left">{!! \Session::get('info') !!}</div>
            <div class="col text-right"><button type="button" class="btn-xs btn-close" data-bs-dismiss="alert"
                    aria-label="Close">&times;</button></div>
        </div>
        {{-- </li> --}}

        {{-- </ul> --}}
    </div>
@endif
@if (\Session::has('warning'))
    <div class="alert alert-warning alert-dismissible fade show">
        {{-- <ul> --}}
        {{-- <li> --}}
        <div class="row">
            <div class="col text-left">{!! \Session::get('warning') !!}</div>
            <div class="col text-right"><button type="button" class="btn-xs btn-close" data-bs-dismiss="alert"
                    aria-label="Close">&times;</button></div>
        </div>
        {{-- </li> --}}

        {{-- </ul> --}}
    </div>
@endif
@if (\Session::has('danger'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{-- <ul> --}}
        {{-- <li> --}}
        <div class="row">
            <div class="col text-left">{!! \Session::get('danger') !!}</div>
            <div class="col text-right"><button type="button" class="btn-xs btn-close" data-bs-dismiss="alert"
                    aria-label="Close">&times;</button></div>
        </div>
        {{-- </li> --}}

        {{-- </ul> --}}
    </div>
@endif
@if (\Session::has('script'))
    <script type="text/javascript">{!! \Session::get('script') !!}</script>
@endif
<script>
    setTimeout(function() {
        $('.alert').slideUp();
    }, 3000);
</script>
