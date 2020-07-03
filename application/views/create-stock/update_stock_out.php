
                <div class="card-body">
                    <label style="text-align: center;color:orange;font-family:Lato;font-size:1.5rem;">Update Item</label>

                    <div class=" row table-responsive">
                        <div class=" col-md-3">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="background-color: lightyellow;color:grey">
                                        <th>Material used</th>
                                    </tr>
                                </thead>
                                <form method="post" action="<?php echo site_url('user/Createstock/updatestock_out/' . $data->serial_no) ?>" enctype="multipart/form-data">
                                    <tr>
                                        <?php
                                        if (validation_errors()) {
                                        ?>
                                            <div style="text-align: center" class="alert alert-danger" role="alert">
                                                <?php echo validation_errors(); ?>
                                            </div>
                                        <?php } ?>

                                        <th> <input type="number" placeholder="Enter quantity" name="quantity_out" style="width: 100%; border:0px;font-size:11px; "></th>
                                    </tr>
                                    <th style="border:0px"><input style="width: 100%;padding:10px 10px 10px 10px;border:0px;background-color:skyblue;color:white;" type="submit" value="Submit "></th>
                                </form>
                            </table>
                        </div>



                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
