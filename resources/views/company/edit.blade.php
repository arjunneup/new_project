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
                <form action="{{route('company.update', [$company->id])}}" method='post'>
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-row">
                        <div class="col">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$company->name}}">
                        </div>
                        
                        
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </div>
</body>

</html>