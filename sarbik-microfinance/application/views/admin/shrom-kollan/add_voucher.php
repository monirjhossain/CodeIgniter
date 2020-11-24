<!-- general form elements -->
<div style="text-align: center;color: red"><?php echo validation_errors(); ?></div>
<div class="box box-primary">

    <button class="btn btn-info <?php if($sessionUserDetails->admin_type=='field_officer'){echo ' hide';}?>"  type="button" data-toggle="collapse" data-target="#demo">+ ADD</button>

	<div id="demo" class="collapse">

    <div class="box-header with-border">
        <h3 class="box-title">General Voucher</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->

    <?php
    $attributes = array('enctype' => 'multipart/form-data');
    echo form_open_multipart('super_admin/addVoucher', $attributes);
    ?>
    <!--<form role="form">-->
    <div class="box-body">
      <div class="row">
        <div class="col-md-4">
        <div class="form-group">
                <label for="name">Paid To:</label>
                <input type="text" value="<?php echo set_value('paid_to'); ?>" name="paid_to" class="form-control" autocomplete="off" id="paid_to" placeholder="Paid To">
            </div>
        </div>

        <div class="col-md-2">
        <div class="form-group">
          <label>
            Payment Type
          </label>
          <style>
    .boxx{
        color: #fff;
        padding: 20px;
        display: none;
        margin-top: 20px;
    }
    .check{ background: white; }
    .cash{ background: #228B22; }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".boxx").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>
<div>
       <label><input type="radio" name="payment_type" value="check"> Check</label>
       <label><input type="radio" name="payment_type" value="cash"> Cash</label>

   </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
          <div class="check boxx">
                  <input type="text" value="<?php echo set_value('bank_name'); ?>" name="bank_name" class="form-control" autocomplete="off" id="bank_name" placeholder="Bank Name">
                  <input type="text" value="<?php echo set_value('account_name'); ?>" name="account_name" class="form-control" autocomplete="off" id="account_name" placeholder="Account Name">
                  <input type="text" value="<?php echo set_value('account_name'); ?>" name="account_no" class="form-control" autocomplete="off" id="account_no" placeholder="Account No">
                  <input type="text" value="<?php echo set_value('check_no'); ?>" name="check_no" class="form-control" autocomplete="off" id="check_no" placeholder="Check No">
           </div>
          <div class="cash boxx">You have selected <strong>Cash</strong> so i am here</div>
          </div>
        </div>
      </div>


        <div class="row">
      		<div class="col-md-4">
      		<div class="form-group">
                  <label for="name">Date</label>
                  <input type="text" value="<?php echo set_value('voucher_date'); ?>" name="voucher_date" class="form-control datepicker" autocomplete="off" id="voucher_date" placeholder="Select Date">
          </div>
      		</div>

      		<div class="col-md-4">
      		<div class="form-group">
                  <label for="voucher_category_id">Voucher Category</label>
                  <select name="voucher_category_id" class="form-control ">
      			<?php
      			if($listVoucherCategory){
      				foreach($listVoucherCategory as $catVoucher){
      			?>
                      <option value="<?php echo $catVoucher->voucher_cat_id;?>"><?php echo $catVoucher->voucher_category;?></option>
      			<?php } }?>

                  </select>
              </div>
      		</div>
      		<div class="col-md-4">
      		<div class="form-group">
                  <label for="name">Memo/Voucher No</label>
                  <input type="text" value="<?php echo set_value('memo_no'); ?>" name="memo_no" class="form-control" id="memo_no" placeholder="Enter Memo No">
              </div>
      		</div>
		  </div>

		<div class="row">
		<div class="col-md-4">
		<div class="form-group">
            <label for="item">Amount ( In English )</label>
            <input type="text" value="<?php echo set_value('voucher_money'); ?>" name="voucher_money" class="form-control" id="voucher_money" placeholder="Enter Amount">
        </div>
		</div>

		<div class="col-md-4">
		<div class="form-group">
            <label for="asset_cat">Voucher By </label>
            <input type="text" value="<?php echo set_value('voucher_by'); ?>" name="voucher_by" class="form-control" id="voucher_by" placeholder="Enter Supplier">
        </div>
		</div>
		<div class="col-md-4">
		<div class="form-group">
            <label for="name">Details</label>
            <input type="text" value="<?php echo set_value('details'); ?>" name="details" class="form-control" id="details" placeholder="Details">
        </div>
		</div>
		</div>



		</div>




    <!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
</div>
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
                    <th>Invoice</th>
                    <th>Memo/Voucher No</th>
					          <th>Date</th>
                    <th>Paid To</th>
                    <th>Payment Type</th>
                    <th>Bank Name</th>
                    <th>Account Name</th>
                    <th>Account No</th>
                    <th>Check No</th>
					          <th>Category</th>
                    <th>Type</th>
					          <th>Amount</th>
					          <th>Voucher By</th>
					          <th>Details</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($listVoucher as $v_content) {
                    $i++;
                    ?>
                    <tr class="odd gradeX">

                      <td><?php echo $i; ?></td>
                      <td><?php echo 'GV-'.$v_content->voucher_id; ?></td>
					            <td><?php echo $v_content->memo_no; ?></td>
                      <td><?php
                      $date2 = $v_content->voucher_date;
                      $date2 = date_create($date2);
                      $date2 = date_format($date2, "d-m-Y");
                      $date2 = $date2;
                       echo $date2;

                        ?>
                      </td>
                      <td><?php echo $v_content->paid_to; ?></td>
                      <td><?php echo $v_content->payment_type; ?></td>
                      <td><?php echo $v_content->bank_name; ?></td>
                      <td><?php echo $v_content->account_name; ?></td>
                      <td><?php echo $v_content->account_no; ?></td>
                      <td><?php echo $v_content->check_no; ?></td>
                      <td><?php echo $v_content->voucher_category; ?></td>
                      <td><?php echo $v_content->voucher_type; ?></td>
                      <td><?php echo $v_content->voucher_money; ?></td>
                      <td><?php echo $v_content->voucher_by; ?></td>
						          <td><?php echo $v_content->details; ?></td>



                        <td>
                            <a href="<?php echo base_url() ?>super_admin/editVoucher/<?php echo $v_content->voucher_id; ?>" class="<?php if($sessionUserDetails->admin_type=='field_officer'){echo ' hide';}?>"">
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
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Total Debit:</th>
					          <th><?php echo $sumOfAmountDebitVoucher?></th>
                    <th></th>
                    <th></th>
					          <th></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Total Credit:</th>
					<th><?php echo $sumOfAmountCreditVoucher?></th>
                    <th></th>
                    <th></th>
					<th></th>


                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
