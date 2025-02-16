<div class="col-md-2"><br><br>
    <img width="100" height="100" id="showImage" style="border-radius: 50%"
        src="{{!empty(Auth::user()->image)?asset('upload/user_image/'.Auth::user()->image):asset('upload/no_image.jpg')}}"
        alt="User Avatar">
    <br><br>
    <ul class="list-group kist-group-flush">
        <a href="{{route('profile')}}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{route('edit.profile')}}" class="btn btn-primary btn-sm btn-block">profile update</a>
        <a href="{{route('profile.edit_password')}}" class="btn btn-primary btn-sm btn-block">Change password</a>
        <a href="{{ route('my.orders') }}" class="btn btn-primary btn-sm btn-block">My Orders</a>
        
        <a href="{{ route('return.order.list') }}" class="btn btn-primary btn-sm btn-block">Return Orders</a>
        
        <a href="{{ route('cancel.orders') }}" class="btn btn-primary btn-sm btn-block">Cancel Orders</a>
        <a href="{{route('logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>

    </ul>
</div>
