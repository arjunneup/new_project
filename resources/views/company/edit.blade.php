<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.head')
</head>

<body>
    <div class="d-flex" id="wrapper">
        @include('includes.company_header')
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
                <form action="{{route('company.update', [$users->id])}}" method='post'>
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-row">
                        <div class="col">
                            <label for="title">First Name</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$users->title}}">
                        </div>
                        <div class="col">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" class="form-control" id="lastname" value="{{$users->lastname}}">
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
                                @endif
                            </select>
                        </div>
                    </div>
                   
                        <button class="btn btn-primary" type="submit">Update</button>
                    
            </div>
        </div>
</body>

</html>