<main>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="card shadow-lg border-0 rounded-lg mt-5">
					<div class="card-header">
						<h3 class="text-center font-weight-light ">Create Account</h3>
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

							<?php
							if ($this->session->flashdata('error')) {
							?>
								<div style="text-align: center" class="alert alert-danger" role="alert">
									<?php echo $this->session->flashdata('error'); ?>
								</div>
							<?php
							}
							?>
						</div>
						<form class="user" action="<?php echo site_url('register/user'); ?>" method="post">

							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control  " name="firstName" placeholder="First Name" required>
								</div>
								<div class="col-sm-6">
									<input type="text" class="form-control " name="lastName" placeholder="Last Name" required>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="email" class="form-control " name="emailId" placeholder="Email Address" required>
								</div>
								<div class="col-sm-6">
									<input type="tel" class="form-control " name="contactDetails" placeholder="Contact Number" required>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<select name="role" class="form-control" required>
										<option value="#" disabled="disabled" selected="selected">Select a user role</option>
										<option value="addstock">add stock</option>
										<option value="viewstock">view stock</option>
									</select>
								</div>
								<div class="col-sm-6">
									<input type="password" class="form-control " name="password" placeholder="Password" required>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" class="btn custom-button btn-user btn-block " name="contactNumber" value="Register Account">
							</div>


						</form>
					</div>
					<div class="card-footer text-center">
						<div class="small"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>