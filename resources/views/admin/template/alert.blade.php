
@if(count($errors) > 0)
    @foreach($errors->all() as $error)

        <div class="alert alert-danger alert-styled-left">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
            {{ $error }}
        </div>
    @endforeach
@endif


@if(Session::has('mOk'))

    <div class="alert alert-success alert-styled-left">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
        {{ Session::get('mOk') }}
    </div>
@endif

@if(Session::has('mNo'))

    <div class="alert alert-warning alert-styled-left">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
        {{ Session::get('mNo') }}
    </div>

@endif



