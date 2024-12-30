<?php  include('header.php'); ?>	
<?php  include('sidebar.php'); ?>	

            <!-- Reports Section Start -->
            <div class="page-body">
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="row">
                        <!-- Salery Summy star-->
                        <div class="col-xl-8 col-lg-12 col-md-6">
                            <div class="card o-hidden">
                                <div class="card-header border-0 pb-1">
                                    <div class="card-header-title">
                                        <h4>Sales Summary</h4>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div id="saler-summary"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Salery Summy end-->

                        <!-- Employ Salary  start-->
                        <div class="col-xl-4 col-lg-12 col-md-6">
                            <div class="h-100">
                                <div class="card o-hidden">
                                    <div class="card-header border-0 pb-1">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="card-header-title">
                                                <h4>Employees Satisfied</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="pie-chart">
                                            <div id="employ-salary"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Employ Salary end-->

                        <!-- Expenses star-->
                        <div class="col-xl-4 col-lg-12 col-md-6">
                            <div class="card o-hidden">
                                <div class="card-header border-0 pb-1">
                                    <div class="card-header-title">
                                        <h4>Expenses</h4>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div id="expenses-cart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Expenses end-->

                        <!-- Sales / Purchase chart start -->
                        <div class="col-xl-8 col-lg-12 col-md-6">
                            <div class="card">
                                <div class="card-header border-0 pb-1">
                                    <div class="card-header-title">
                                        <h4>Sales / Purchase</h4>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div id="sales-purchase-chart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Sales / Purchase chart end -->

                        <!-- Sales / Purchase Return star-->
                        <div class="col-12">
                            <div class="card o-hidden">
                                <div class="card-header border-0 pb-1">
                                    <div class="card-header-title">
                                        <h4>Sales / Purchase Return</h4>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div id="sales-purchase-return-cart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Sales / Purchase Return end-->

                        <!-- Booking history start-->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-0 pb-1">
                                    <div class="card-header-title">
                                        <h4>Transfer History</h4>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div>
                                        <div class="table-responsive">
                                            <table class="user-table list-table table">
                                                <thead>
                                                    <tr>
                                                        <th>Transfer Id</th>
                                                        <th>Name</th>
                                                        <th>Date</th>
                                                        <th>Total</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>14783112</td>
                                                        <td>Gray Brody</td>
                                                        <td>20-05-2020</td>
                                                        <td>$369</td>
                                                        <td>
                                                            <ul>
                                                                <li>
                                                                    <a href="order-detail.html">
                                                                        <span class="ri-eye-line"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0)">
                                                                        <span class="lnr lnr-pencil"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0)">
                                                                        <span class="lnr lnr-trash"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>87541221</td>
                                                        <td>Perez Alonzo</td>
                                                        <td>07-12-2020</td>
                                                        <td>$546</td>
                                                        <td>
                                                            <ul>
                                                                <li>
                                                                    <a href="order-detail.html">
                                                                        <span class="ri-eye-line"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0)">
                                                                        <span class="lnr lnr-pencil"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0)">
                                                                        <span class="lnr lnr-trash"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>213514462</td>
                                                        <td>woters maxine</td>
                                                        <td>12-12-2020</td>
                                                        <td>$369</td>
                                                        <td>
                                                            <ul>
                                                                <li>
                                                                    <a href="order-detail.html">
                                                                        <span class="ri-eye-line"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0)">
                                                                        <span class="lnr lnr-pencil"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0)">
                                                                        <span class="lnr lnr-trash"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>235896144</td>
                                                        <td>christian</td>
                                                        <td>16-05-2020</td>
                                                        <td>$4699</td>
                                                        <td>
                                                            <ul>
                                                                <li>
                                                                    <a href="order-detail.html">
                                                                        <span class="ri-eye-line"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0)">
                                                                        <span class="lnr lnr-pencil"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0)">
                                                                        <span class="lnr lnr-trash"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>461178242</td>
                                                        <td>Lane Skylar</td>
                                                        <td>25-10-2020</td>
                                                        <td>$1342</td>
                                                        <td>
                                                            <ul>
                                                                <li>
                                                                    <a href="order-detail.html">
                                                                        <span class="ri-eye-line"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0)">
                                                                        <span class="lnr lnr-pencil"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0)">
                                                                        <span class="lnr lnr-trash"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Booking history  end-->
                    </div>
                </div>
                <!-- Container-fluid Ends-->

                <!-- footer start-->
                <div class="container-fluid">
                    <footer class="footer">
                        <div class="row">
                            <div class="col-md-12 footer-copyright text-center">
                                <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
            <!-- Reports Section End -->
        </div>
        <!-- Page Body End-->
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
    <!-- Modal End -->

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

    <!-- Sidebar js -->
    <script src="assets/js/config.js"></script>

    <!-- tooltip init js -->
    <script src="assets/js/tooltip-init.js"></script>

    <!-- Plugins js -->
    <script src="assets/js/sidebar-menu.js"></script>
    <script src="assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/notify/index.js"></script>

    <!-- Apexchar js -->
    <script src="assets/js/chart/apex-chart/apex-chart1.js"></script>
    <script src="assets/js/chart/apex-chart/moment.min.js"></script>
    <script src="assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="assets/js/chart/apex-chart/chart-custom.js"></script>

    <!-- customizer js -->
    <script src="assets/js/customizer.js"></script>

    <!-- ratio js -->
    <script src="assets/js/ratio.js"></script>

    <!-- sidebar effect -->
    <script src="assets/js/sidebareffect.js"></script>

    <!-- Theme js -->
    <script src="assets/js/script.js"></script>
</body>

</html>