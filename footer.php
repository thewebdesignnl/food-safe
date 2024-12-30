  

<?php 
 $statement_color = $pdo->prepare("SELECT * FROM styling");
        $statement_color->execute();
        $result_color = $statement_color->fetchAll(PDO::FETCH_ASSOC);   
         foreach ($result_color as $row) {	 
		 $themecolor_1 = $row['themecolor'];	
			 	 
        }
 
?>

    <script>
        document.body.style.setProperty("--theme-color", "<?php echo $themecolor_1; ?>");
       
    </script> 
                <!-- footer start-->
                <div class="container-fluid">
                    <footer class="footer">
                        <div class="row">
                            <div class="col-md-12 footer-copyright text-center">
                                <p class="mb-0"><?php echo $footer_copyright; ?></p>
                            </div>
                        </div>
                    </footer>
                </div>
                <!-- footer End-->
            </div>
            <!-- index body end -->

        </div>
        <!-- Page Body End -->
    </div>
    <!-- page-wrapper End-->

    <!-- Modal Start -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title" id="staticBackdropLabel">Logging Out</h5>
                    <p>Are you sure you want to log out?</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="button-box">
                        <button type="button" class="btn btn--no" data-bs-dismiss="modal">No</button>
                        <button type="button" onclick="location.href = 'login.html';"
                            class="btn  btn--yes btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

   <!-- latest js -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- feather icon js -->
    <script src="assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="assets/js/icons/feather-icon/feather-icon.js"></script>

    <!-- scrollbar simplebar js -->
    <script src="assets/js/scrollbar/simplebar.js"></script>
    <script src="assets/js/scrollbar/custom.js"></script>

    <!-- Sidebar jquery -->
    <script src="assets/js/config.js"></script>

    <!-- tooltip init js -->
    <script src="assets/js/tooltip-init.js"></script>

    <!-- Plugins JS -->
    <script src="assets/js/sidebar-menu.js"></script>
    <script src="assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/notify/index.js"></script>

    <!-- Apexchar js -->
    <script src="assets/js/chart/apex-chart/apex-chart1.js"></script>
    <script src="assets/js/chart/apex-chart/moment.min.js"></script>
    <script src="assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="assets/js/chart/apex-chart/chart-custom1.js"></script>


    <!-- ck editor js -->
   <!-- <script src="assets/js/ckeditor.js"></script>
    <script src="assets/js/ckeditor-custom.js"></script>-->

<!-- select2 js -->
<script src="assets/js/select2.min.js"></script>
    <script src="assets/js/select2-custom.js"></script>


    <!-- slick slider js -->
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/custom-slick.js"></script>

    <!-- customizer js -->
    <script src="assets/js/customizer.js"></script>

    <!-- ratio js -->
    <script src="assets/js/ratio.js"></script>
    <!-- sidebar effect -->
    <script src="assets/js/sidebareffect.js"></script>
    <!-- Theme js -->
 
    <script src="assets/js/summernote.js"></script>

    <script src="assets/js/script.js"></script>

  <script type='text/javascript'>
 jQuery( document ).ready(function($) {
	 $(".pricefun").on("keypress keyup blur",function (event) {
        $(this).val($(this).val().replace(/[^0-9\.|\,]/g,''));
        debugger;
        if(event.which == 44)
        {
        return true;
        }
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57  )) {
        
          event.preventDefault();
        }
      });

    $(document).on('click', '.delete-btn', function(){
        var delettype =$(this).attr('data-type');
        var delid =$(this).attr('data-id');

        $('.delete-action').attr('href', 'delete.php?id=' + delid+'&type=' + delettype);

    });
 

	 
	 
  });	
</script>

</body>

</html>