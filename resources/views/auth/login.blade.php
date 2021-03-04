@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="text-center m-2">
                        <a href="/auth/google" class="btn btn-outline-info"> Google With Login </a>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
