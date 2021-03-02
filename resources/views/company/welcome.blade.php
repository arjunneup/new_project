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
                <h1 class="mt-4">Add New User</h1>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif
                <form action="{{route('users.store')}}" method='post'>
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="title">First Name</label>
                            <input type="text" class="form-control" placeholder="First name" name="title" id="title">
                        </div>
                        <div class="col">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" placeholder="Last name" name="lastname" id="lastname">
                        </div>
                        <div class="col">
                            <label for="email">Email Address</label>
                            <input type="text" class="form-control" placeholder="Email Address" name="email" id="email">
                        </div>
                        <div class="col">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Role</label>
                            <select class="custom-select my-1 mr-sm-2" name="role" id="role">
                                <option value="user">user</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var input = document.getElementById('role');
            if (localStorage['role']) { // if job is set
                input.value = localStorage['role']; // set the value
            }
            input.onchange = function() {
                localStorage['role'] = this.value; // change localStorage on change
            }
        });
    </script>
</body>

</html>