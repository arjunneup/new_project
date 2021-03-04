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
                            <label for="title">Name</label>
                            <input type="text" class="form-control" placeholder="First name" name="title" id="title">
                        </div>
                        <div class="col">
                            <label for="email">Email Address</label>
                            <input type="text" class="form-control" placeholder="Email Address" name="email" id="email">
                        </div>
                        <div class="col">
                            <label for="role">Select Role</label>
                            <select class="custom-select my-1 mr-sm-2" name="role" id="role">
                                <option selected>Select Role</option>
                                @foreach($roles as $role)
                                    <option value="{{$role}}">{{$role}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col d-none" id="company-select-block">
                            <label for="company_id">Select Company</label>
                            <select class="custom-select my-1 mr-sm-2" name="company_id" id="company_id">
                                <option selected>Select Company</option>
                                @foreach($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
    </div>

    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     var input = document.getElementById('role');
        //     if (localStorage['role']) { // if job is set
        //         input.value = localStorage['role']; // set the value
        //     }
        //     input.onchange = function() {
        //         localStorage['role'] = this.value; // change localStorage on change
        //     }
        // });

        document.getElementById('role').onchange = function(e){
            if(e.target.value == 'company' || e.target.value == 'user'){
                document.getElementById('company-select-block').classList.remove("d-none");
            }else{
                document.getElementById('company-select-block').classList.add("d-none");
            }
        };
    </script>
</body>

</html>