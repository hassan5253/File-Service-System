
@if(isset(Auth::user()->acc_type))
<?php
$acc_type = Auth::user()->acc_type;
?>
<link href="{{ URL::asset('assets/custom/css/style.css') }}" rel="stylesheet" />
   <nav class="navbar">
     <!-- LOGO -->
     <div class="logo">Block-List Service</div>
     <!-- NAVIGATION MENU -->
     <ul class="nav-links">
       <!-- NAVIGATION MENUS -->
       <div class="menu">
        {{-- <li><a href="{{ url('/') }}/usersList">Users</a></li> --}}
        <li><a href="{{ url('/') }}/logout">Logout</a></li>
        @if($acc_type == 'admin')  <li><a href="{{ url('/') }}/usersList">Users</a></li> @endif
       </div>
     </ul>
   </nav>
  @endif