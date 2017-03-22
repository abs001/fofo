<!DOCTYPE html>
<html lang="en">
    <?php
    	$this->load->view("pages/layout/Head");
    ?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">	
		<?php		
        $this->load->view("pages/layout/Leftside");
        $this->load->view("pages/layout/Navbar");
        $this->load->view("pages/layout/Container");
        $this->load->view("pages/layout/Footer");
		?>
      </div>
    </div>
    <?php
      $this->load->view("pages/layout/Js");
    ?>
  </body>
</html>