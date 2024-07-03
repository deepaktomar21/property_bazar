<nav class="navbar navbar-expand-lg navbar-light">
    <div class="full">
    <button type="button" id="sidebarCollapse" class="sidebar_toggle">
       <i class="fa fa-bars"></i>
   </button>


          <a href="index.html" class="admin-logo">
           <img width="60"  class="img-responsive" src="https://textcode.co.in/propertybazar/public/assets/images/logo/estate_logo.jpeg" alt="#" /></a>


       <div class="right_topbar">
          <div class="icon_info">
             <ul>
                <li><a href="#"><i class="fa fa-bell"></i><span class="badge">2</span></a></li>
                <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
             </ul>
             <ul class="user_profile_dd">
                <li>
                    @php
                    use App\Models\User;

                    $role = 3; // Example role ID
                    $users = User::where('role', $role)->pluck('name');
                @endphp


<div class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown">
        <img class="img-responsive rounded-circle" src="https://textcode.co.in/propertybazar/public/assets/images/layout_img/user_img.jpg" alt="#" />

    </a>
    <div class="dropdown-menu">
        @foreach ($users as $username)
            <a class="dropdown-item">{{ $username }}</a>
        @endforeach
    </div>
</div>
                   <div class="dropdown-menu">
                      <a class="dropdown-item" href="profile.html">My Profile</a>
                      <a class="dropdown-item" href="settings.html">Settings</a>
                      <a class="dropdown-item" href="help.html">Help</a>
                      <a class="dropdown-item" href="#"> <i class="fa fa-sign-out">Log Out</i></a>


                   </div>
                </li>
             </ul>
          </div>
       </div>
    </div>
 </nav>
