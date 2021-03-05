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
                <h1 class="mt-4">Add New Company</h1>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif
                <form action="{{route('company.store')}}" method='post'>
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="title">Company Name</label>
                            <input type="text" class="form-control" placeholder="Company Name" name="name" id="name">
                        </div>    
                        <div class="col">
                            <label for="email">Admin Email</label>
                            <input type="email" class="form-control" placeholder="Admin Email" name="email" id="email">
                        </div>    
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">Save</button>
            </div>
        </div>
    </div>
</body>

</html>