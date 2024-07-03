<nav id="sidebar">
    <div class="sidebar_blog_1">
        <div class="sidebar-header">
            <div class="logo_section">
                <a href="index.html">
                    <img class="logo_icon img-responsive"
                        src="https://textcode.co.in/propertybazar/public/assets/images/logo/logo_icon.png" alt="#">
                </a>
            </div>
        </div>
        <div class="sidebar_user_info">
            <div class="icon_setting"></div>
            <div class="user_profle_side">
                <div class="user_img">
                    <img class="img-responsive"
                        src="https://textcode.co.in/propertybazar/public/assets/images/logo/estate_logo.jpeg"
                        alt="#">
                </div>
                <div class="user_info">
                    <h6>Property Bazar</h6>
                    <h7>Seller DashBoard</h7>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar_blog_2">
        <ul class="list-unstyled components">
            <li class="active">
                <a href="{{ route('seller.dashboard') }}"><i class="fa fa-dashboard yellow_color"></i>
                    <span>Dashboard</span></a>
            </li>

            <li><a href="{{ route('seller.management') }}"><i class="fa fa-gift red_color" aria-hidden="true"></i>
                    <span>Seller Management
                    </span></a></li>
            <li><a href="{{ route('seller.offers') }}"><i class="fa fa-asterisk green_color" aria-hidden="true"></i>
                    <span>Offers/Schemes</span></a></li>
            {{-- <li><a href=""><i class="fa fa-search yellow_color" aria-hidden="true"></i> <span>Broker
                        Search</span></a></li>
            <li><a href=""><i class="fa fa-asterisk green_color" aria-hidden="true"></i> <span>Hot
                        Deals</span></a></li>
            <li>
                <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                        class="fa fa-money red_color" aria-hidden="true"></i> <span>Loans</span></a>
                <ul class="collapse list-unstyled" id="element">
                    <li><a href=""> <span>Home Loans</span></a></li>
                    <li><a href=""> <span>Client Details</span></a></li>
                </ul>
            </li>
            <li><a href=""><i class="fa fa-newspaper-o green_color" aria-hidden="true"></i> <span>News</span></a>
            </li>
            <li>
                <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                        class="fa fa-calendar blue2_color" aria-hidden="true"></i> <span>Events</span></a>
                <ul class="collapse list-unstyled" id="apps">
                    <li><a href=""> <span>Add Events</span></a></li>
                    <li><a href=""> <span>User Join Details</span></a></li>
                </ul>
            </li>
            <li><a href=""><i class="fa fa-asterisk green_color" aria-hidden="true"></i> <span>My
                        Requirements/Inventory</span></a></li>
            <li><a href=""><i class="fa fa-bullhorn purple_color" aria-hidden="true"></i> <span>My
                        Lead</span></a></li>
            <li><a href=""><i class="fa fa-comments-o green_color" aria-hidden="true"></i> <span>Chats</span></a>
            </li>
            <li><a href=""><i class="fa fa-clock-o blue1_color" aria-hidden="true"></i> <span>My
                        Visits</span></a></li>
            <li><a href=""><i class="fa fa-bookmark purple_color2" aria-hidden="true"></i>
                    <span>Bookmarks</span></a></li>
            <li><a href=""><i class="fa fa-bell green_color" aria-hidden="true"></i>
                    <span>Notification</span></a></li>
            <li><a href=""><i class="fa fa-cog yellow_color" aria-hidden="true"></i> <span>Settings</span></a>
            </li> --}}
            <li><a href="{{ route('seller.logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>
                    <span>Logout</span></a></li>
        </ul>
    </div>
</nav>
