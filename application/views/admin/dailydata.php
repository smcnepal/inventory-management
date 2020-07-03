				<div class="card-body">
				    <!-- <label style="text-align: center;color:orange;font-family:Lato;font-size:1.5rem;">Current Report</label> -->
				    <!-- <button onclick="window.print()">Print this page</button> -->
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
				        </div>
				        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				            <thead>
				                <!-- <tr style="background-color:lightblue;color:grey">
				                    <th>Serial No.</th>
				                    <th>Item</th>
				                    <th>Material In</th>
				                    <th>Material Used</th>
				                    <th>Stock</th>
				                </tr> -->
				                <?php foreach ($data as $key) { ?>
									<tr>
										<td><?php echo $key->product_id; ?></td>
										<td><?php echo $key->item; ?></td>
										<td><?php echo $key->total_in; ?></td>
										<td><?php echo $key->total_out; ?></td>
										<td><?php echo $key->quantity; ?></td>
									</tr>
								<?php } ?>
				            </thead>
				        </table>
				    </div>
				</div>