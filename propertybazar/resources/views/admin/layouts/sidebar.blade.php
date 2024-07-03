<nav id="sidebar">
    <div class="sidebar_blog_1">
        <div class="sidebar-header">
            <div class="logo_section">
                <a href="index.html">
                    <img class="logo_icon img-responsive" src="https://textcode.co.in/propertybazar/public/assets/images/logo/logo_icon.png" alt="#">
                </a>
            </div>
        </div>
        <div class="sidebar_user_info">
            <div class="icon_setting"></div>
            <div class="user_profle_side">
                <div class="user_img">
                    <img class="img-responsive" src="https://textcode.co.in/propertybazar/public/assets/images/logo/estate_logo.jpeg" alt="#">
                </div>
                <div class="user_info">
                    <h6>Property Bazar</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar_blog_2">
        <ul class="list-unstyled components">
            <li class="active">
                <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
            </li>
            <li class="active">
                <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Register Pages</span></a>
                <ul class="collapse list-unstyled" id="additional_page">
                    <li><a href="{{ route('admin.userregister.list') }}">> <span>User</span></a></li>
                    <li><a href="{{ route('admin.userregister.buyerlist') }}">> <span>Buyer</span></a></li>
                    <li><a href="{{ route('admin.userregister.sellerlist') }}">> <span>Seller</span></a></li>
                    <li><a href="{{ route('admin.userregister.ownerlist') }}">> <span>Owner</span></a></li>
                    <li><a href="{{ route('admin.userregister.agentlist') }}">> <span>Agent</span></a></li>
                    <li><a href="{{ route('admin.userregister.builderlist') }}">> <span>Builders</span></a></li>
                </ul>
            </li>
            <li class="active">
                <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-tasks green_color" aria-hidden="true"></i><span>Management</span></a>
                <ul class="collapse list-unstyled" id="dashboard">
                    <li><a href="{{ route('admin.user.select') }}"><i class="fa fa-user orange_color" aria-hidden="true"></i><span>User Management</span></a></li>
                    <li><a href="{{ route('admin.agent.list') }}"><i class="fa fa-user orange_color" aria-hidden="true"></i><span>Agent Management</span></a></li>
                    <li><a href="{{ route('admin.builder.list') }}"><i class="fa fa-user orange_color" aria-hidden="true"></i><span>Builder Management</span></a></li>
                </ul>
            </li>
            <li><a href="{{ route('admin.offer.list') }}"><i class="fa fa-gift red_color" aria-hidden="true"></i> <span>Latest offers/schemes</span></a></li>
            <li><a href="{{ route('admin.require.list') }}"><i class="fa fa-asterisk green_color" aria-hidden="true"></i> <span>Requirements/Inventory</span></a></li>
            <li><a href="{{ route('admin.broker.list') }}"><i class="fa fa-search yellow_color" aria-hidden="true"></i> <span>Broker Search</span></a></li>
            <li><a href="{{ route('admin.hotdeals.list') }}"><i class="fa fa-asterisk green_color" aria-hidden="true"></i> <span>Hot Deals</span></a></li>
            <li>
                <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-money red_color" aria-hidden="true"></i> <span>Loans</span></a>
                <ul class="collapse list-unstyled" id="element">
                    <li><a href="{{ route('admin.home_loan.list') }}">> <span>Home Loans</span></a></li>
                    <li><a href="{{ route('admin.client.list') }}">> <span>Client Details</span></a></li>
                </ul>
            </li>
            <li><a href="{{ route('admin.news.list') }}"><i class="fa fa-newspaper-o green_color" aria-hidden="true"></i> <span>News</span></a></li>
            <li>
                <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-calendar blue2_color" aria-hidden="true"></i> <span>Events</span></a>
                <ul class="collapse list-unstyled" id="apps">
                    <li><a href="{{ route('admin.event.list') }}">> <span>Add Events</span></a></li>
                    <li><a href="">> <span>User Join Details</span></a></li>
                </ul>
            </li>
            <li><a href="{{ route('admin.myrequire.list') }}"><i class="fa fa-asterisk green_color" aria-hidden="true"></i> <span>My Requirements/Inventory</span></a></li>
            <li><a href="{{ route('admin.myrequire.list') }}"><i class="fa fa-bullhorn purple_color" aria-hidden="true"></i> <span>My Lead</span></a></li>
            <li><a href="{{ route('admin.myrequire.list') }}"><i class="fa fa-comments-o green_color" aria-hidden="true"></i> <span>Chats</span></a></li>
            <li><a href="{{ route('admin.myrequire.list') }}"><i class="fa fa-clock-o blue1_color" aria-hidden="true"></i> <span>My Visits</span></a></li>
            <li><a href="{{ route('admin.bookmark.list') }}"><i class="fa fa-bookmark purple_color2" aria-hidden="true"></i> <span>Bookmarks</span></a></li>
            <li><a href="{{ route('notificationindex') }}"><i class="fa fa-bell green_color" aria-hidden="true"></i> <span>Notification</span></a></li>
            <li><a href="{{ route('admin.myrequire.list') }}"><i class="fa fa-cog yellow_color" aria-hidden="true"></i> <span>Settings</span></a></li>
            <li><a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> <span>Logout</span></a></li>
        </ul>
    </div>
</nav>
