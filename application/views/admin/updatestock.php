<div class="card-body">
	<label style="text-align: center;color:orange;font-family:Lato;font-size:1.5rem;">Update item</label>


	<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr style="background-color: lightyellow;color:grey">
					<th>Serial No.</th>
					<th>Item</th>
					<th>Description</th>
					<th>Photo</th>
					<th>Total Stock</th>
					<th>Material In</th>
					<th>Material used</th>
					<th>Stock Capacity</th>
				</tr>
			</thead>
			<form method="post" action="<?php echo site_url('admin/Admincontrol/updatestock/' . $data->serial_no) ?>" enctype="multipart/form-data">
				<tr>
					<th> <input type="text" name="serial_no" placeholder="Enter serial no" value="<?php echo $data->serial_no; ?>" style="width: 100%; border:0px;font-size:11px; "></th>
					<th> <input type="text" name="item" placeholder="Enter item name" value="<?php echo $data->item; ?>" style="width: 100%; border:0px;font-size:11px; " required></th>
					<th> <input type="text" name="description" placeholder="Description" value="<?php echo $data->description; ?>" style="width: 100%; border:0px;font-size:11px;" required></th>
					<th> <input type="file" name="userfile" placeholder="Upload file" style="width: 100%; border:0px;font-size:11px;"></th>
					<th> <input type="number" name="quantity" disabled value="<?php echo $data->quantity; ?>" style="width: 100%; border:0px;font-size:11px;"></th>
					<th> <input type="number" name="quantity_in" placeholder="Quantity In" value="" style="width: 100%; border:0px;font-size:11px;"></th>
					<th> <input type="number" name="quantity_out" placeholder="Quantity Out" value="" style="width: 100%; border:0px;font-size:11px;"></th>
					<th> <input type="number" name="max_stock_value" value="<?php echo $data->stock_capacity; ?>" style="width: 100%; border:0px;font-size:11px;"></th>

				</tr>
				<th style="border:0px"><input style="width: 100%;padding:10px 10px 10px 10px;border:0px;background-color:skyblue;color:white;" type="submit" value="Submit "></th>
			</form>
		</table>

		<div class="col-md-2">
			<?php if ($data->files) { ?>
				<img style="width:200px; border:3px solid grey;margin-top:1rem" src="<?php echo site_url('assets/uploads/' . $data->files); ?>" alt="no photo">
			<?php } ?>
		</div>
	</div>
</div>