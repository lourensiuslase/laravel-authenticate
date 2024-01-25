<div class="row align-items-center">
    <div class="col-2">
        @if($data->photos === null)
            <img src="https://www.w3schools.com/howto/img_avatar.png" width="100%" alt="Avatar"
                 style="border-radius: 50%;">
        @else
            <img src="{{$data->photos}}" width="100%" alt="Avatar"
                 style="border-radius: 50%;">
        @endif
    </div>
    <div class="col-10">
        <div class="row">
            <div class="col-3">
                <span class="mb-0">Username</span>
                <h6>{{ $data->username }}</h6>
            </div>
            <div class="col-3">
                <span class="mb-0">Role</span>
                <h6>{{ $data->role_name }}</h6>
            </div>
            <div class="col-3">
                <span class="mb-0">Email</span>
                <h6>{{ $data->email }}</h6>
            </div>
        </div>
    </div>
</div>
