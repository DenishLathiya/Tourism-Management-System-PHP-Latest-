<script>
  $(document).ready(function(){
    $('#p_use').click(function(){
      uni_modal("Privacy Policy","policy.php","mid-large")
    })
     window.viewer_modal = function($src = ''){
      start_loader()
      var t = $src.split('.')
      t = t[1]
      if(t =='mp4'){
        var view = $("<video src='"+$src+"' controls autoplay></video>")
      }else{
        var view = $("<img src='"+$src+"' />")
      }
      $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
      $('#viewer_modal .modal-content').append(view)
      $('#viewer_modal').modal({
              show:true,
              backdrop:'static',
              keyboard:false,
              focus:true
            })
            end_loader()  

  }
    window.uni_modal = function($title = '' , $url='',$size=""){
        start_loader()
        $.ajax({
            url:$url,
            error:err=>{
                console.log()
                alert("An error occured")
            },
            success:function(resp){
                if(resp){
                    $('#uni_modal .modal-title').html($title)
                    $('#uni_modal .modal-body').html(resp)
                    if($size != ''){
                        $('#uni_modal .modal-dialog').addClass($size+'  modal-dialog-centered')
                    }else{
                        $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md modal-dialog-centered")
                    }
                    $('#uni_modal').modal({
                      show:true,
                      backdrop:'static',
                      keyboard:false,
                      focus:true
                    })
                    end_loader()
                }
            }
        })
    }
    window._conf = function($msg='',$func='',$params = []){
       $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
       $('#confirm_modal .modal-body').html($msg)
       $('#confirm_modal').modal('show')
    }
  })
</script>
<!-- Footer-->
<!-- Modern Footer -->
<footer style="background:#121f4d; color:white; padding:50px 0; font-family:'Poppins', sans-serif;">
  <div style="max-width:1200px; margin:0 auto; padding:0 20px; display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:30px;">
    
    <!-- About Section -->
    <div>
      <h3 style="color:#60B5FF; font-size:20px; margin-bottom:15px;">GlobalTrip</h3>
      <p style="line-height:1.8; font-size:14px;">
        GlobalTrip is your trusted tour booking system, making travel planning simple, secure, and enjoyable. 
        Explore the world with ease and confidence.
      </p>
    </div>

    <!-- Quick Links -->
    <div>
      <h3 style="color:#60B5FF; font-size:20px; margin-bottom:15px;">Quick Links</h3>
      <ul style="list-style:none; padding:0; font-size:14px; line-height:2;">
        <li><a href="index.php" style="color:#ddd; text-decoration:none;">Home</a></li>
        <li><a href="about.php" style="color:#ddd; text-decoration:none;">About Us</a></li>
        <li><a href="tours.php" style="color:#ddd; text-decoration:none;">Tours</a></li>
        <li><a href="contact.php" style="color:#ddd; text-decoration:none;">Contact</a></li>
        <li><a href="javascript:void(0)" id="p_use" style="color:#ddd; text-decoration:none;">Privacy Policy</a></li>
      </ul>
    </div>

    <!-- Contact Info -->
    <div>
      <h3 style="color:#60B5FF; font-size:20px; margin-bottom:15px;">Contact Us</h3>
      <p style="font-size:14px; line-height:1.8;">
        📍 Surat, Gujarat <br>
        📞 +91 98765 43210 <br>
        ✉ support@globaltrip.com
      </p>
    </div>

    <!-- Social Media -->
    <div>
      <h3 style="color:#60B5FF; font-size:20px; margin-bottom:15px;">Follow Us</h3>
      <div style="display:flex; gap:15px;">
        <a href="#!" style="color:white; font-size:18px;"><i class="fab fa-facebook-f"></i></a>
        <a href="#!" style="color:white; font-size:18px;"><i class="fab fa-twitter"></i></a>
        <a href="#!" style="color:white; font-size:18px;"><i class="fab fa-linkedin-in"></i></a>
        <a href="#!" style="color:white; font-size:18px;"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </div>

  <!-- Bottom Bar -->
  <div style="text-align:center; margin-top:30px; padding-top:20px; border-top:1px solid rgba(255,255,255,0.2); font-size:14px; color:#fff; ">
    Copyright © <?php echo date("Y"); ?>  GlobalTrip All rights reserved.
  </div>
</footer>


   
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo base_url ?>plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url ?>plugins/sparklines/sparkline.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url ?>plugins/select2/js/select2.full.min.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url ?>plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url ?>plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url ?>plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url ?>plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?php echo base_url ?>plugins/summernote/summernote-bs4.min.js"></script>
    <script src="<?php echo base_url ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- overlayScrollbars -->
    <!-- <script src="<?php echo base_url ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
    <!-- AdminLTE App -->
    <script src="<?php echo base_url ?>dist/js/adminlte.js"></script>
    <div class="daterangepicker ltr show-ranges opensright">
      <div class="ranges">
        <ul>
          <li data-range-key="Today">Today</li>
          <li data-range-key="Yesterday">Yesterday</li>
          <li data-range-key="Last 7 Days">Last 7 Days</li>
          <li data-range-key="Last 30 Days">Last 30 Days</li>
          <li data-range-key="This Month">This Month</li>
          <li data-range-key="Last Month">Last Month</li>
          <li data-range-key="Custom Range">Custom Range</li>
        </ul>
      </div>
      <div class="drp-calendar left">
        <div class="calendar-table"></div>
        <div class="calendar-time" style="display: none;"></div>
      </div>
      <div class="drp-calendar right">
        <div class="calendar-table"></div>
        <div class="calendar-time" style="display: none;"></div>
      </div>
      <div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled" type="button">Apply</button> </div>
    </div>
    <div class="jqvmap-label" style="display: none; left: 1093.83px; top: 394.361px;">Idaho</div>