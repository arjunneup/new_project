<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.head')
</head>

<body>
    <div class="d-flex" id="wrapper">
        @include('includes.header')
        <div id="page-content-wrapper">
            @include('includes.navbar')
            <div class="container-fluid">
                <h1 class="mt-4">Edit User Status</h1>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif
                <form action="{{route('user.status.update', [$user->id])}}" method='post'>
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-row">
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="status-checkbox" name="status" value="1" @if($user->status_id) checked @endif>
                            <label class="custom-control-label" for="status-checkbox">Approve</label>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </div>
</body>

</html>