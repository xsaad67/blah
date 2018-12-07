@extends('layouts.main')

@section('css')

<style>

.avatar-upload {
  position: relative;
  max-width: 205px;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 6px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "\f040";
  font-family: 'FontAwesome';
  color: #757575;
  position: absolute;
  top: 10px;
  left: 0;
  right: 0;
  text-align: center;
}
.avatar-upload .avatar-preview {
  width: 192px;
  height: 192px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

</style>

@endsection

@section('content')
   <div class="container">

    <div class="row">
      <div class="col-md-4 offset-md-4">
        <h2>Edit Your Profile</h2>
      </div>
    </div>

  <form action="{{ action("UserController@updateProfile")}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
    <div class="row">

        <div class="col-md-7">

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"  style="margin-top:50px;">

                            <div class="col-md-6 offset-6">
                                      @include('messages.message')
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
          </div>

          <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">

                            <div class="col-md-6 offset-6">
                              <textarea rows="10" placeholder="Short Bio" class="form-control" name="bio" required>{{ $user->bio or old('bio') }}</textarea>

                                @if ($errors->has('bio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>
          </div>

        </div>

        <div class="col-md-4">

          <div class="avatar-upload">
              <div class="avatar-edit">
                  <input type='file' id="imageUpload" name="profileImage" accept=".png, .jpg, .jpeg" />
                  <label for="imageUpload"></label>
              </div>
              <div class="avatar-preview">
                  <div id="imagePreview" style="background-image: url({{ is_null($user->image) ? asset("wp-content/uploads/user/default.png") :  asset("wp-content/uploads/user/".$user->image) }} );">
                  </div>
              </div>
          </div>

        </div>

        <div class="col-md-6 offset-5">
          <button type="submit" class="btn btn-primary">Save Profile</button>
          
        </div>
   
    </div>

 </form>
    </div>





</div>
@endsection


@section('footer')
    <script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            jQuery('#imagePreview').css('background-image', 'url('+e.target.result +')');
            jQuery('#imagePreview').hide();
            jQuery('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
jQuery("#imageUpload").change(function() {
    readURL(this);
});
    </script>

    @endsection
