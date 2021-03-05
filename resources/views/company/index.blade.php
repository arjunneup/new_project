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
        <h1 class="mt-4">Company Table</h1>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Names in Table..">
        <div style="overflow-x:auto">
          <table class="table" id="CompanyTable">
            <thead class="thead-dark">
              <tr>
                <th scope="col">id</th>
                <th scope="col">Company Name</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($companies as $company)
              <tr>
                <form action="{{route('company.delete',[$company->id])}}" method="post">
                  <th>{{$company->id}}</th>
                  <td>{{$company->name}}</td>
                  <td>{{$company->created_at}}</td>
                  <td>{{$company->updated_at}}</td>
                  <td>
                    <a href="{{route('company.edit',[$company->id])}}" class="btn btn-primary">Edit</a>
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </td>
                  @endforeach
              </tr>
              @csrf
              @method("DELETE")
              </form>

            </tbody>
          </table>
        </div>


        <button class="btn btn-sucess">
          <a href="{{route('company.create')}}" class="btn btn-success">Add new Company</a>
      </div>
    </div>
    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->
</body>

</html>