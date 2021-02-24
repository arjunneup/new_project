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
                <h1 class="mt-4">Add New User</h1>
                <form action="{{route('users.store')}}" method='post'>
                    @csrf
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" name="title" id="title">
                        <label for="title">Last Name</label>
                        <input type="text" name="lastname" id="lastname">
                        <!--<label for="title">Username</label>
                        <input type="text" name="username" id="username">-->
                        <label for="title">Email</label>
                        <input type="text" name="email" id="email">
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>

    </div>
</body>

</html>