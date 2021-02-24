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
                <h1 class="mt-4">Edit User</h1>
                <form action="{{route('users.update', [$users->id])}}" method='post'>
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="title">First Name</label>
                        <input type="text" name="title" id="title" value="{{$users->title}}">
                        <label for="title">Last Name</label>
                        <input type="text" name="lastname" id="lastname" value="{{$users->lastname}}">
                        <label for="title">Username</label>
                        <input type="text" name="username" id="username" value="{{$users->username}}">
                        <label for="title">Email</label>
                        <input type="text" name="email" id="email" value="{{$users->email}}">
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </div>
    </div>
</body>

</html>