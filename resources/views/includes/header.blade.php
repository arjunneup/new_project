<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">

  <div class="sidebar-heading">Admin Dashboard </div>
  <div class="list-group list-group-flush">
    <a href="/user" class="list-group-item list-group-item-action bg-light">Users</a>

    <a href="{{route('user.create')}}" class="list-group-item list-group-item-action bg-light">Add</a>
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