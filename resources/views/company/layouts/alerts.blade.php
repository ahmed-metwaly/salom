
@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            {{ $error }}
        </div>
    @endforeach
@endif


@if(Session::has('mOk'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        {{ Session::get('mOk') }}
    </div>
@endif

@if(Session::has('mNo'))
    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        {{ Session::get('mNo') }}
    </div>
@endif

@if(Session::has('mDanger'))
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        {{ Session::get('mDanger') }}
    </div>
@endif



