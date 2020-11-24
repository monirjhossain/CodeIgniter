<!-- general form elements -->

<div class="box box-primary">
<div style="text-align: center;color: red">
	<?php
    $message = $this->session->userdata('message');
    if ($message) {
        ?>
        <div class="alert alert-success">
            <?php echo $message; ?>
        </div>

        <?php
        $this->session->unset_userdata('message');
    }
    ?>


	</div>

    <div>

    <!-- /.box-header -->
    <!-- form start -->
<a href="<?php echo base_url() ?>super_admin/searchForEditGoldCollectionDateWise"><i class="fa fa-circle-o"></i> Edit</a>
    <form action="<?php echo base_url() ?>super_admin/updateBatchGoldCollectionDateWise" method="POST">
    <div class="box-body">


<div class="row">
	<div class="col-md-6">
		<div class="form-group">
				<label for="opening_date">তারিখ</label>
				<input type="text" readonly name="collected_date" value="<?php echo $collected_date?>" class="form-control">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
				<label for="collected_by">Collected By</label>
				<select name="collected_by"  class="form-control">
						<option value="0">Select</option>
						<?php
						if($listAllUser){
							foreach($listAllUser as $v_content){

													?>
														<option  value="<?php echo $v_content->admin_id?>"><?php echo $v_content->admin_name?></option>
						<?php } }?>
				</select>
		</div>
	</div>
</div>


		<table>
		</table>
        <div class="box-body table-responsive">
        <table id="example1" class="display">
            <thead>
                <tr>
                    <th> সিরিয়াল </th>
									  <th> সদস্য নং  </th>
										<th> মোবাইল  </th>
										<th> নাম </th>
										<th> একাউন্ট </th>
										<th>Cash In</th>
										<th>Collected By</th>
                </tr>
            </thead>
            <tbody>
			<?php
                $i = 0;
                foreach ($collectionData as $v_content) {
                    $i++;
                    ?>

                    <tr class="odd gradeX">
                        <td><?php echo $i;?></td>

						<td>
						<div class="form-group">
            <label for=""><?php echo $v_content->member_no?></label>
	   				</div>
						</td>
<td>
						<div class="form-group">
            <label for=""><?php echo $v_content->mobile?></label>

	   </div>
						</td>
<td>
						<div class="form-group">
            <label for=""><?php echo $v_content->name?></label>

	   </div>
						</td>
						<td>
						<div class="form-group">
            <label for="">
			 <input type="hidden" name="collection_id[]" value="<?php echo $v_content->collection_id?>">
			<?php echo $v_content->account_no?></label>

		</div>
						</td>
						<td>
						<div class="form-group">
            <input type="hidden" name="interestPercent[]" value="<?php echo $v_content->interestPercent?>">
            <input type="text" name="collected_money[]" value="<?php echo $v_content->collected_money?>"  class="form-control" >
        </div>
						</td>
						<td><?php echo $v_content->admin_name?></td>
                    </tr>
					   <?php } ?>


            </tbody>
            <tfoot>
                <tr>
				    <th colspan="5">Total Collection In This Day</th>
					  <th><?php echo $total_gold_collection_today.' '.'Tk' ;?></th>
						<th>&nbsp;</th>
                </tr>
            </tfoot>
        </table>

    </div>




    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <center><button type="submit" class="btn btn-primary">Update</button></center>
    </div>
</form>
</div>
</div>
<div class="clearfix"></div>
