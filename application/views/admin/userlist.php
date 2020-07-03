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
	<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr style="background-color: lightyellow;color:grey">
					<!-- <th>Serial No.</th> -->
					<th>First Name</th>
					<th>Username</th>
					<th>Contact No.</th>
					<th> Created Date</th>
					<th>Operation</th>
				</tr>
				<?php foreach ($data as $key) { ?>
					<tr>
						<!-- <td><?php echo $key->_id; ?></td> -->
						<td><?php echo $key->first_name; ?></td>
						<td><?php echo $key->email_id; ?></td>
						<td><?php echo $key->contact_number; ?></td>
						<td><?php echo $key->created_date; ?></td>
						<td> <a class="edit-button" href="<?php echo base_url('admin/Admincontrol/edituser/' . $key->_id) ?>"><i class='far fa-edit' style='font-size:20px'></i></a><a class="delete-button" href="<?php echo site_url('admin/Admincontrol/delete_user/' . $key->_id) ?>"><i class='far fa-trash-alt' style='font-size:20px'></i></a> </td>
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