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
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif
                <form action="{{route('users.update', [$users->id])}}" method='post'>
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-row">
                        <div class="col">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$users->title}}">
                        </div>
                        <div class="col">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email" value="{{$users->email}}">
                        </div>
                        <div class="col">
                            <label for="role">Select Role</label>
                            <select class="form-control" id="type" name="role">
                                @if($users->role)
                                <option value="{{$users->role}}" selected>{{$users->role}} </option>
                                <option value="user">user</option>
                                <option value ="company">company</option>
                                <option value="admin">admin</option>  
                               
                                @else
                                <option value="">Select Role</option>
                                <option value="user">admin</option>
                                <option value="company">company</option>
                                <option value="admin">admin</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </div>
</body>

</html>