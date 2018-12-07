@extends('layouts.app')

@section('content')



<div class="container">


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Post</div>

                <div class="panel-body">
                    @include('messages.message')
                    <form class="form-horizontal" method="POST" action="{{ action('BookmarkController@store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Post Id</label>

                        <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="id" >
                            </div>
                        </div>

                     
                       

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('footer')

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<script>
     CKEDITOR.replace( 'body' );
</script>

@endsection
