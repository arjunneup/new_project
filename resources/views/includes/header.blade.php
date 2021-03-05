<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
  @if(auth()->user()->role =='admin')
  <div class="sidebar-heading">Admin Dashboard </div>
  @endif
  @if(auth()->user()->role =='company' || auth()->user()->role =='user')
  <div class="sidebar-heading">Company Dashboard </div>
  @endif
  <div class="list-group list-group-flush">
    <a href="/user" class="list-group-item list-group-item-action bg-light">Users</a>
    
    <a href="{{route('user.create')}}" class="list-group-item list-group-item-action bg-light">Add New Users</a>
    @if(auth()->user()->role =='admin')
    <a href="{{route('company.create')}}" class="list-group-item list-group-item-action bg-light">Add Company</a>
    <a href="{{route('company.index')}}" class="list-group-item list-group-item-action bg-light">Company List</a>
    @endif
    <!--
    @if(auth()->user()->role == 'admin' )
    <a href="">Root setting</a>
    <a href="">Role setting</a>
    <a href="">Access Logs</a>
    <a href="">System Status</a>
    @endif

    @if(auth()->user()->role == 'admin' || auth()->user()->role == 'company')
      <a href="/company" class="list-group-item list-group-item-action bg-light">Company</a>
      <a href="">company status</a>
      <a href="">Billing</a>
    @endif

    @if(auth()->user()->role == 'user')
      <a href="#" class="list-group-item list-group-item-action bg-light">Only User Accissble</a>
    @endif
-->
    <!-- Sidebar 
        <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
        -->
  </div>
</div>