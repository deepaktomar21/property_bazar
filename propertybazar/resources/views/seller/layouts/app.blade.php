<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Property Bazar</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="https://textcode.co.in/propertybazar/public/assets/images/fevicon.png" type="image/png">
    <link rel="stylesheet" href="https://textcode.co.in/propertybazar/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://textcode.co.in/propertybazar/public/assets/css/style.css">
    <link rel="stylesheet" href="https://textcode.co.in/propertybazar/public/assets/css/responsive.css">
    <link rel="stylesheet" href="https://textcode.co.in/propertybazar/public/assets/css/colors.css">
    <link rel="stylesheet" href="https://textcode.co.in/propertybazar/public/assets/css/bootstrap-select.css">
    <link rel="stylesheet" href="https://textcode.co.in/propertybazar/public/assets/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="https://textcode.co.in/propertybazar/public/assets/css/custom.css">
</head>
<body class="dashboard dashboard_1">
<div class="full_container">
    <div class="inner_container">
        @include('seller.layouts.sidebar')
        <div id="content">
            <div class="topbar">
                @include('seller.layouts.navbar')
            </div>
            @yield('content')
        </div>
    </div>
</div>
@include('seller.layouts.footer')
</body>
</html>
