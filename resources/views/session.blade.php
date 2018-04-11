@if(Session::has('UserCreated'))
    <div class="alert alert-success">
        {{Session::get('UserCreated')}}
    </div>
@endif