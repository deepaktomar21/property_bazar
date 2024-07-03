<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Property Bazar</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->

      <link rel="icon" href="https://textcode.co.in/propertybazar/public/assets/images/fevicon.png" type="image/png">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="https://textcode.co.in/propertybazar/public/assets/css/bootstrap.min.css" >
      <!-- site css -->
      <link rel="stylesheet" href="https://textcode.co.in/propertybazar/public/assets/css/style.css" >
      <!-- responsive css -->
      <link rel="stylesheet" href="https://textcode.co.in/propertybazar/public/assets/css/responsive.css">
      <!-- color css -->
      <link rel="stylesheet" href="https://textcode.co.in/propertybazar/public/assets/css/color_2.css">
      <!-- select bootstrap -->
      <link rel="stylesheet" href="https://textcode.co.in/propertybazar/public/assets/css/bootstrap-select.css">
      <!-- scrollbar css -->
      <link rel="stylesheet" href="https://textcode.co.in/propertybazar/public/assets/css/perfect-scrollbar.css">
      <!-- custom css -->
      <link rel="stylesheet" href="https://textcode.co.in/propertybazar/public/assets/css/custom.css">
      <!-- calendar file css -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="inner_page login">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                  <div class="center">
                        <img width="110" src="https://textcode.co.in/propertybazar/public/assets/images/logo/estate_logo.jpeg" alt="#" />

                     </div>
                  </div>
                  <h5 class="center" style="color:#0f0f0f;">Property Bazar Admin Login</h5>
                  <div class="login_form">

                     <form action="{{ route('authenticate') }}" method="post">
                     @csrf
                        <fieldset>
                           <div class="field">
                              <label class="label_field">Email Address</label>
                              <input type="email" name="email" placeholder="E-mail">
                           </div>
                           <div class="field">
                              <label class="label_field">Password</label>
                              <input type="password" name="password" placeholder="Password" />
                           </div>
                           <div class="field">
                              <label class="label_field hidden">hidden label</label>
                              <label class="form-check-label"><input type="checkbox" class="form-check-input"> Remember Me</label>
                              <a class="forgot" href="">Forgotten Password?</a>
                           </div>
                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button class="main_bt">Sing In</button>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="https://textcode.co.in/propertybazar/public/assets/js/jquery.min.js"></script>
      <script src="https://textcode.co.in/propertybazar/public/assets/js/popper.min.js"></script>
      <script src="https://textcode.co.in/propertybazar/public/assets/js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="https://textcode.co.in/propertybazar/public/assets/js/animate.js"></script>
      <!-- select country -->
      <script src="https://textcode.co.in/propertybazar/public/assets/js/bootstrap-select.js"></script>
      <!-- nice scrollbar -->
      <script src="https://textcode.co.in/propertybazar/public/assets/js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="https://textcode.co.in/propertybazar/public/assets/js/custom.js"></script>
   </body>
</html>
