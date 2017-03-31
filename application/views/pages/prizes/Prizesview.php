<?php $this->load->view('pages/layout/Head');
?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
          <?php $this->load->view('pages/layout/Leftside');?>
          <?php $this->load->view('pages/layout/Navbar');?>
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Prizes</h3>
              </div>
            </div>
            <div class="clearfix"></div>
              <div class="row">
                  <div class="col-md-12 col-xs-12">
                      <div class="x_panel">
                          <div class="x_content">
                            <form method="post" action="<?php echo base_url();?>index.php/Dashboard/addPrize" enctype="multipart/form-data">
                                  <textarea id="title" name="title" class="form-control" placeholder="Prize description"></textarea>
                                  <br/>
                                  <span>Choose prize image</span>
                                  <input type="file" name="prize" accept="image/*">
                                  <br>
                                  <input type="submit" class="btn btn-primary" value="ADD"></span>
                            </form>
                            <?php if(isset($_SESSION['msg'])){?>
                              <div class="alert alert-success" id="alertbox">
                                <?php echo $_SESSION['msg']; ?>
                              </div>
                              <?php }?>
                            </div>  
                          </div>
                          <div class="x_panel">
                              <h3>Prizes of the week</h3>
                              <table class="table table-hover">
                                <tr>
                                  <td>week</td>
                                  <td>Title</td>
                                  <td>img</td>
                                  <td>delete</td>
                                </tr>
                                <?php if(isset($prizes)){ 
                                    foreach ($prizes as $value) {
                                      $week_no = substr($value['week'], 0,-5);
                                      $date_added = $value['date_added'];

                              $date = $date_added;
                              $day = date('N', strtotime($date));
                              $week_start = date('d M, Y', strtotime('-'.($day-1).' days', strtotime($date)));
                              $week_end = date('d M, Y', strtotime('+'.(7-$day).' days', strtotime($date)));
                                ?>
                                <tr>
                                  <td><?php echo $week_start.' TO '.$week_end;?></td>
                                  <td><?php echo $value['title'];?></td>
                                  <td><img src="<?php echo base_url().$value['image'];?>" width="100" height="100"></td>
                                  <td><a href="<?php echo base_url();?>index.php/Dashboard/deletePrize/<?php echo $value['prize_id']?>">delete</td>
                                </tr>
                                <?php }}?>
                              </table>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
          </div>
        <?php $this->load->view('pages/layout/Footer');?>
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>assets/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url();?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url();?>assets/vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url();?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo base_url();?>assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="<?php echo base_url();?>assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="<?php echo base_url();?>assets/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url();?>assets/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="<?php echo base_url();?>assets/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="<?php echo base_url();?>assets/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="<?php echo base_url();?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="<?php echo base_url();?>assets/vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>assets/build/js/custom.min.js"></script>
	
  </body>
</html>
