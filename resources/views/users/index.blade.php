<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('includes.head')
</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    @include('includes.header')
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
      @include('includes.navbar')
      <div class="container-fluid">
        <h1 class="mt-4">Admin Table</h1>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Names in Table..">
        <div style="overflow-x:auto">
          <table class="table" id="usersTable">
            <thead class="thead-dark">
              <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <th scope="col">Company</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <form action="{{route('users.delete',[$user->id])}}" method="post">
                  <th>{{$user->id}}</th>
                  <td>{{$user->title}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->role}}</td>
                  <td>
                    @if($user->status_id)
                      <span class="badge-success badge">Approved</span>
                    @else
                      <span class="badge-danger badge">Not Approved</span>
                    @endif
                  </td>
                  <td>
                    {{optional($user->company)->name}}
                  </td>
                  <td>{{$user->created_at}}</td>
                  <td>{{$user->updated_at}}</td>
                  <td> 
                    @if(auth()->user()->role == 'admin')
                      <a href="{{ route('user.status', $user->id) }}" class="btn btn-info">Status</a>
                    @endif
                    <a href="/users/{{$user->id}}" class="btn btn-primary">Edit</a>
                    @if($user->role!='admin')
                    <button class="btn btn-danger" type="submit">Delete</button>
                    @endif
                  </td>
              </tr>
              @csrf
              @method("DELETE")
              </form>
              @endforeach
            </tbody>
          </table>
        </div>
        {{ $users->links() }}

        <button class="btn btn-sucess">
          <a href="{{route('user.create')}}" class="btn btn-success">Add new User</a>
      </div>
    </div>
    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->
</body>

</html>