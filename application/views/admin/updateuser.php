<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">update user account</h3>
                    </div>
                    <div class="card-body">
                        <div>
                            <?php
                            if ($this->session->flashdata('success')) {
                            ?>
                                <div style="text-align: center" class="alert alert-success" role="alert">
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <form class="user" action="<?php echo site_url('admin/Admincontrol/updateuser/' . $data->_id); ?>" method="post">

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control " name="firstName" placeholder="First Name" value="<?php echo $data->first_name; ?>" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control " name="lastName" placeholder="Last Name" value="<?php echo $data->last_name; ?>" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="email" class="form-control " name="emailId" placeholder="Email Address" value="<?php echo $data->email_id; ?>" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="tel" class="form-control " name="contactDetails" placeholder="Contact Number" value="<?php echo $data->contact_number; ?>" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select name="role" class="form-control">
                                        <option style="background-color:skyblue;color:white;" value=" <?php echo $data->role; ?>" selected="selected">Current role:<?php echo $data->role; ?></option>
                                        <option value="addstock">addstock</option>
                                        <option value="viewstock">view stock</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control"  name="password" placeholder="Update password">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn custom-button btn-user btn-block " name="contactNumber" value="Update Account">
                            </div>


                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>