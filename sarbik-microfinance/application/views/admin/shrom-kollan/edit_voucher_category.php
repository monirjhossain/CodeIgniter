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
   
    <div class="box-header with-border">
        <h3 class="box-title">Voucher Category</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    
    
    <form method="POST" action="<?php echo base_url() ?>super_admin/updateVoucherCategory" enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label for="name">Voucher Category</label>
			<input type="hidden" value="<?php echo $selectVoucherCat->voucher_cat_id; ?>" name="voucher_cat_id">
            <input type="text" value="<?php echo $selectVoucherCat->voucher_category; ?>" name="voucher_category" class="form-control" id="name" placeholder="Enter Voucher Category">
        </div>
        

        <div class="form-group">
            <label for="voucher_type">Type</label>
            <select name="voucher_type" class="form-control">
                <option <?php if ($selectVoucherCat->voucher_type=='debit'){echo 'selected';}?> value="debit">Debit</option>
                <option <?php if ($selectVoucherCat->voucher_type=='credit'){echo 'selected';}?> value="credit">Credit</option>
                

            </select>
        </div>

    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>

</div>
<div class="clearfix"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">List</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>

                    <th>Serial</th>
					<th>Voucher Category</th>
                    <th>Voucher Category Type</th>    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($listVoucherCategory as $v_content) {
                    $i++;
                    ?>	
                    <tr class="odd gradeX">

                        <td><?php echo $i; ?></td>
					
                        <td><?php echo $v_content->voucher_category; ?></td>
                        <td><?php echo $v_content->voucher_type; ?></td>
                      

                        <td>
                            <a href="<?php echo base_url() ?>super_admin/editVoucherCategory/<?php echo $v_content->voucher_cat_id; ?>" class="<?php if($sessionUserDetails->admin_type=='field_officer'){echo ' hide';}?>"">
                                <i class="entypo-pencil"></i>
                                Edit
                            </a>
                           
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                   
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>