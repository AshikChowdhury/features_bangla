@if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@elseif(session('danger'))
    <div class="alert alert-danger">
        {{session('danger')}}
    </div>
@elseif(session('info'))
    <div class="alert alert-info">
        {{session('info')}}
    </div>
@endif