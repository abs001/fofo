<!DOCTYPE html>
<html lang="en">
    <?php
    	$this->load->view("pages/Head");
    ?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">	
		<?php		
        $this->load->view("pages/Leftside");
        $this->load->view("pages/Navbar");
        $this->load->view("pages/Container");
        $this->load->view("pages/Footer");
		?>
      </div>
    </div>
    <?php
      $this->load->view("pages/Js");
    ?>
  </body>
</html>