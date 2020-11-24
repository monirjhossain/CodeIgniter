<!-- general form elements -->
<div style="text-align: center;color: red"><?php echo validation_errors(); ?></div>
<div class="box box-primary">

    <button class="btn btn-info <?php if($sessionUserDetails->admin_type=='field_officer'){echo ' hide';}?>"  type="button" data-toggle="collapse" data-target="#demo">+ ADD</button>

	<div id="demo" class="collapse">

    <div class="box-header with-border">
        <h3 class="box-title">Asset</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->

    <?php
    $attributes = array('enctype' => 'multipart/form-data');
    echo form_open_multipart('super_admin/addSalaryVoucher', $attributes);
    ?>
    <!--<form role="form">-->
    <div class="box-body">
        <div class="row">
		<div class="col-md-4">
		<div class="form-group">
            <label for="name">Date</label>
            <input type="text" value="<?php echo set_value('voucher_date'); ?>" name="voucher_date" class="form-control datepicker" id="name" placeholder="Select Date">
        </div>
		</div>

		<div class="col-md-4">
		<div class="form-group">
            <label for="employee_id">Employee</label>
            <select name="employee_id" class="form-control ">
			<?php
			if($listEmployee){
				foreach($listEmployee as $v_content){
			?>
                <option value="<?php echo $v_content->emp_id;?>"><?php echo $v_content->emp_name.'-'.$v_content->emp_id;?></option>
			<?php } }?>

            </select>
        </div>
		</div>
		<div class="col-md-4">
		<div class="form-group">
            <label for="name">Memo Ref</label>
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

  <div class="row">

  <div class="col-md-4 col-md-offset-4">
      <form action="<?php echo base_url() ?>super_admin/getEmployeeSalaryLedgerReport" method="POST">

        <div class="form-group">
        <label for="asset_category_id">Select  A Employee</label>
        <select name="employee_id" class="form-control ">
  <?php
  if($listEmployee){
    foreach($listEmployee as $v_content){
  ?>
            <option value="<?php echo $v_content->emp_id;?>"><?php echo $v_content->emp_name.'-'.$v_content->emp_id;?></option>
  <?php } }?>

        </select>
        </div>

          <div class="form-group">
              <div class="clearfix"></div>
              <div class="input-group date col-md-12">
                  <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" placeholder="Start Date" name="search_date_one" class="form-control datepicker" >
                  <input type="text" placeholder="Ending Date" name="search_date_two" class="form-control datepicker">
                  <input type="submit"   class="btn btn-primary form-control" value="Search">
              </div>
          </div>
      </form>
  </div>


  </div>
    <div class="box-header">
        <h3 class="box-title">List</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Serial</th>
          					<th>Date</th>
                    <th>Project</th>
                    <th>Emp_id</th>
          					<th>Name</th>
                    <th>Designation</th>
          					<th>Department</th>
                    <th>Money</th>
          					<th>Voucher By</th>
          					<th>Details</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($listSaleryVoucher as $v_content) {
                    $i++;
                    ?>
                    <tr class="odd gradeX">

                      <td><?php echo $i; ?></td>
					            <td><?php echo $v_content->svoucher_date; ?></td>
                      <td><?php echo $v_content->project_name; ?></td>
                      <td><?php echo $v_content->emp_id; ?></td>
                      <td><?php echo $v_content->emp_name; ?></td>
                      <td><?php echo $v_content->designation; ?></td>
                      <td><?php echo $v_content->department; ?></td>
						          <td><?php echo $v_content->svoucher_money; ?></td>
                      <td><?php echo $v_content->svoucher_by; ?></td>
                      <td><?php echo $v_content->sdetails; ?></td>

                        <td>
                            <a href="<?php echo base_url() ?>super_admin/editSalaryVoucher/<?php echo $v_content->svoucher_id; ?>" class="<?php if($sessionUserDetails->admin_type=='field_officer'){echo 'hide';}?>"">
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
                    <th>Total</th>
                    <th><?php echo $sumOfAmountSalaryoucher;?></th>
                    <th></th
                   <th></th>
                   <th></th>
                   <th></th>

                 </tr>

            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
