				<div class="card-body">
					<label style="text-align: center;color:orange;font-family:Lato;font-size:1.5rem;">View Stock</label>
					<div class="table-responsive">
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
							<?php if ($this->input->get('keyword')){?>
								<p>Search result for  <span style="color: tomato;font-weight:1500px;text-transform: uppercase"><?php echo $this->input->get('keyword')?></span>  are listed below. </p>
							<?php }?>
						</div>
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr style="background-color: lightyellow;color:grey">
									<th>Serial No.</th>
									<th>File</th>
									<th>Item</th>
									<th>Percentage [%]</th>
									<th>Description</th>
									<th>Quantity</th>
									<th>Operation</th>
								</tr>
								<?php foreach ($data as $key) { ?>
									<tr>
										<td><?php echo $key->serial_no; ?></td>
										<td> <a href="<?php echo base_url('assets/uploads/' . $key->files); ?>"><img style="width:100px;height:auto;" src="<?php echo base_url('assets/uploads/' . $key->files); ?>" </a> </td> <td><?php echo $key->item; ?></td>
										<td><?php echo $key->percentage; ?> %</td>
										<td><?php echo $key->description; ?></td>
										<td><?php echo $key->quantity; ?></td>
										<td> <a class="edit-button" href="<?php echo site_url('user/Createstock/editstock/' . $key->serial_no) ?>"><i class='far fa-edit' style='font-size:20px'></i></a> </td>
									</tr>
								<?php } ?>
							</thead>
						</table>


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
