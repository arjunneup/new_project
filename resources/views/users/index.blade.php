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
        <h1 class="mt-4">User Table</h1>

        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Names in Table..">
        <div style="overflow-x:auto">
          <table class="table" id="usersTable">
            <thead class="thead-dark">
              <tr>
                <th scope="col">id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <!--<th scope="col">Username</th>-->
                <th scope="col">Email</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach($users as $user)
                <form action="{{route('users.delete',[$user->id])}}" method="post">
                  <th>{{$user->id}}</th>
                  <td>{{$user->title}}</td>
                  <td>{{$user->lastname}}</td>
                  <!--<td>{{$user->username}}</td>-->
                  <td>{{$user->email}}</td>
                  <td>{{$user->created_at}}</td>
                  <td>{{$user->updated_at}}</td>
                  <td>
                    <a href="/users/{{$user->id}}" class="btn btn-primary">Edit</a>
                    <button class="btn btn-danger" type="submit">Delete</button>
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
          <a href="/users" class="btn btn-success">Add new User</a>
      </div>
    </div>
    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->
</body>

</html>