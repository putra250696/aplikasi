

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title></title>

  <link rel="stylesheet" href="style.css">

</head>


<header id="masthead" class="site-header">
    <div class="container-login">
        <center>
        <div class="card-form">
              <div class="header-form-login">
                <h1>Login</h1>
                    <hr class="separate-base">
              </div>

              <div class="form-login-content">
                <form id="form-login" name="login" method="post" action="cek_login.php"  onSubmit="return validasi(this)">
                        <div class="margin-field">
                            <input type="text" placeholder="Username" name="username" id="input"  required>
                        </div>
                        <div class="margin-field">
                            <input type="password" placeholder="Password" name="password" id="input"  required>
                        </div>

                        <div class="button-form">
                            <div class="button-login">
                                <input type="submit" name="submit" value=Login>
                            </div>
                            <div class="button-reset">
                                <input type="reset"  value=Reset>
                            </div>
                        </div>
 <div class="button-form"><a href='registrasi.php'><img src="images/images_login/Capture.png"></div>
                </form>
              </div>
            </div>
    </center>
    </div>
</header><!-- #masthead -->

<body>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script>
      $( function() {
        $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
      } );
      $( function() {
        $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' });
      } );
    </script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/additional-methods.js"></script>
    <script src="js/script.js"></script>
</body>

</html>