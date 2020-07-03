				<div class="card-body">
					<label style="text-align: center;color:orange;font-family:Lato;font-size:1.5rem;">Update Item</label>

					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr style="background-color: lightyellow;color:grey">
									<th>Serial No</th>
									<th>Item</th>
									<th>Description</th>
									<th>Photo</th>
									<th>Total Quantity</th>
									<th>Stock capacity</th>
									<th>Material In</th>
								</tr>
							</thead>
							<form method="post" action="<?php echo site_url('user/Createstock/updatestock/' . $data->serial_no) ?>" enctype="multipart/form-data">
								<tr>
									<?php
									if (validation_errors()) {
									?>
										<div style="text-align: center" class="alert alert-danger" role="alert">
											<?php echo validation_errors(); ?>
										</div>
									<?php } ?>
									<!-- <th><span> <?php echo $data->serial_no; ?></span></th> -->
									<th> <input type="number" name="serial_no"  placeholder="Enter serial no" value="<?php echo $data->serial_no; ?>" style="width: 100%; border:0px;font-size:11px; "></th>
									<th> <input type="text" name="item" placeholder="Enter item name" value="<?php echo $data->item; ?>" style="width: 100%; border:0px;font-size:11px; "></th>
									<th> <input type="text" name="description" placeholder="Description" value="<?php echo $data->description; ?>" style="width: 100%; border:0px;font-size:11px;"></th>
									<th> <input type="file" name="userfile" placeholder="Upload file" style="width: 100%; border:0px;font-size:11px; background:rgb(247,247,247)"></th>
									<th> <input type="number" name="quantity" placeholder="Enter quantity" value="<?php echo $data->quantity; ?>" style="width: 100%; border:0px;font-size:11px; "></th>
									<th> <input type="text" name="max_stock_value" placeholder="Enter stock capacity" value="<?php echo $data->stock_capacity; ?>" style="width: 100%; border:0px;font-size:11px; "></th>
									<!-- <th><span> <?php echo $data->quantity; ?></span></th>
									<th><span> <?php echo $data->stock_capacity; ?></span></th> -->
									<th> <input type="number" placeholder="Enter quantity" name="quantity_in" style="width: 100%; border:0px;font-size:11px; "></th>
								</tr>
								<th style="border:0px"><input style="width: 100%;padding:10px 10px 10px 10px;border:0px;background-color:skyblue;color:white;" type="submit" value="Submit "></th>
							</form>
						</table>

						<div class="col-md-2">
							<?php if ($data->files) { ?>
								<img style="width:200px;" src="<?php echo site_url('assets/uploads/' . $data->files); ?>" alt="">
							<?php } ?>
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
