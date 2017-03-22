<!DOCTYPE html>
<html lang="en">
    <?php
      $this->load->view("pages/layout/Head");
    ?>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="<?php echo base_url().'AdminLogin/LoginCheck'?>">
              <h1>Authorized login</h1>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" autofocus="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Login</button>
              </div>
              <?php if(isset($_SESSION['msg'])){?>
              <div class="alert alert-success" id="alertbox">
                <?php echo $_SESSION['msg'];?>
              </div>
              <?php }?>
              <div class="clearfix"></div>
              <div class="separator">
                <div class="clearfix"></div>
                  <p>This page is only for authorised person, if you are <strong>not an authorized</strong> user please visit <a href="http://www.fofopic.com"><u>fofopic.com</u></a></p>
                <br />
                <div>
                  <h1><i class="fa fa-paw"></i> fofopic</h1>
                  <p>©<?php echo date("Y");?> All Rights Reserved : <a href="http://www.fofopic.com">fofopic.com</a></p>
                </div>
              </div>
              </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a    member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <?php $this->load->view("pages/layout/Js");?>
    <script>
      $(document).ready(function(){
        $("#alertbox").slideUp(1500);
      });
    </script>
  </body>
</html>
