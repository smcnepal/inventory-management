				<div class="card-body">
					<label style="text-align: center;color:orange;font-family:Lato;font-size:1.5rem;">Add New Item</label>

					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr style="background-color: lightyellow;color:grey">
									<th>Serial No.</th>
									<th>Item</th>
									<th>Description</th>
									<th>Photo</th>
									<th>Max Stock  capacity</th>
								</tr>
							</thead>
							<form method="post" action="<?php echo site_url('admin/Admincontrol/submitstoke/') ?>" enctype="multipart/form-data">
								<tr>
									<?php
									if (validation_errors()) {
									?>
										<div style="text-align: center" class="alert alert-danger" role="alert">
											<?php echo validation_errors(); ?>
										</div>
									<?php } ?>
									<th> <input type="text" name="serial_no" placeholder="Enter serial no." style="width: 100%; border:0px;font-size:11px; "></th>
									<th> <input type="text" name="item" placeholder="Enter item name" style="width: 100%; border:0px;font-size:11px;"></th>
									<th> <input type="text" name="description" placeholder=" Enter Description" style="width: 100%; border:0px;font-size:11px;"></th>
									<th> <input type="file" name="userfile" placeholder="Upload quotation" style="width: 100%; border:0px;font-size:11px;"></th>
									<th> <input type="number" name="max_stock_value" placeholder=" Enter Max stock capacity" style="width: 100%; border:0px;font-size:11px;"></th>
								</tr>
								<th style="border:0px"><input style="width: 100%;padding:10px 10px 10px 10px;border:0px;background-color:skyblue;color:white;" type="submit" value="Submit "></th>
							</form>
						</table>


					</div>
				</div>