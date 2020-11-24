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


    <div >

    <div class="box-header with-border">
        <h3 class="box-title">Edit</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->


  <form method="POST" action="<?php echo base_url() ?>super_admin/updateLoanAcInfo" enctype="multipart/form-data">
    <div class="box-body">
	   <div class="form-group">
            <label for="loan_account">একাউন্ট নং</label>
			<input type="hidden"  value="<?php echo $loan_info->loan_id?>" name="loan_id" class="form-control">
            <input type="text" readonly value="<?php echo $loan_info->loan_account?>" name="loan_account" class="form-control">
        </div>
	    <div class="form-group">
            <label for="loan_member">সদস্য  সিলেকশন  করুন  ( নাম -সদস্য নং )</label><br>

            <select name="loan_member"  class="form-control select2" style="width:100%">
							<option value="0"> &nbsp;</option>

							<?php
							if($listLoanMemmber){
								foreach($listLoanMemmber as $content){

							?>
                <option  <?php if($content->loan_member_id==$loan_info->loanMemberId){echo 'selected';}?> value="<?php echo $content->loan_member_id;?>"><?php echo $content->name.'-'.$content->member_no; ?></option>
							<?php } }?>
            </select>
        </div>

		<div class="form-group">
            <label for="deposit_type"> ধরন </label>
           <select name="deposit_type"  class="form-control">
                <option value="1"> Daily </option>
                <option value="7"> 7 Days After </option>
								<option value="15"> 15 Days After </option>
								<option value="30"> 1 Month After (30 days) </option>
								<option value="90"> 3 Month After (90 days) </option>
				        <option value="180"> 6 Month After (180 Days After) </option>
								<option value="365"> 1 years After (365 Days After) </option>
            </select>
        </div>


        <div class="form-group">
            <label for="">লোন  এর পরিমান ( In English )  </label>
            <input type="text" name="loan_amount" value="<?php echo $loan_info->approved_loan_amount?>"  class="form-control">
        </div>

					<div class="form-group">
									<label for="name"> কথায় </label>
									<input type="text" value="<?php echo $loan_info->kothai ;?>" name="kothai" class="form-control">
							</div>
		 <div class="form-group">
            <label for=""> মুনাফা  প্রতি বছর  (  % )  </label>
            <input type="text" name="interestPercent" value="<?php echo $loan_info->interestPercent?>"  class="form-control" >
        </div>
		<div class="form-group">
            <label for=""> ইন্সটলমেন্ট সংখ্যা </label>
            <input type="text" name="total_installment" value="<?php echo $loan_info->total_installment?>"  class="form-control" >
        </div>
		<div class="form-group">
            <label for=""> ইন্সটলমেন্ট ফিঃ </label>
            <input type="text" name="installment_fee" value="<?php echo $loan_info->installment_fee?>"  class="form-control" >
        </div>
        <div class="form-group">
            <label for=""> ইন্সটল্মেন্ট সঞ্চয় </label>
            <input type="text" name="sc_money"  value="<?php echo $loan_info->sc_money?>" class="form-control" >
        </div>

		<div class="form-group">
            <label for="ac_status"> ধরন </label>
           <select name="ac_status"  class="form-control">
                <option value="running"> Running </option>
                <option value="closed"> Closed </option>
            </select>
        </div>



		<div class="form-group">
						<label for="name"> সারভিচ চার্জ (  In English ) </label>
						<input type="text" value="<?php echo $loan_info->service_charge ;?>" name="service_charge" class="form-control">
				</div>



		<div class="form-group">
						<label for="name"> ব্যংক নাম   </label>
						<input type="text" value="<?php echo $loan_info->bank_name ;?>" name="bank_name"  class="form-control">
				</div>
		<div class="form-group">
						<label for="name"> চেক নং  </label>
						<input type="text" value="<?php echo $loan_info->check_no ;?>" name="check_no"  class="form-control">
				</div>
				<div class="form-group">
						<label for="disburse_date">লোন প্রদান   এর তারিখ</label>
						<input type="text"  name="disburse_date" value="<?php echo $loan_info->disburse_date?>" class="form-control datepicker">
				</div>
		<div class="form-group">
						<label for="name">গ্রহনের আরিখ </label>
						<input type="text" value="<?php echo $loan_info->grohon_date ;?>" name="grohon_date" class="form-control">
				</div>
		<div class="form-group">
						<label for="name">কিস্তি শুরুর তারিখ </label>
						<input type="text" value="<?php echo $loan_info->installment_start_date ;?>" name="installment_start_date" class="form-control">
				</div>
		<div class="form-group">
						<label for="name">কিস্তির পরিমাণ </label>
						<input type="text" value="<?php echo $loan_info->kistir_poriman ;?>" name="kistir_poriman" class="form-control">
				</div>
		<div class="form-group">
						<label for="name">জামিনদার  নাম ১ </label>
						<input type="text" value="<?php echo $loan_info->jamindar_name_one ;?>" name="jamindar_name_one" class="form-control">
				</div>
		<div class="form-group">
						<label for="name"> সম্পর্ক </label>
						<input type="text" value="<?php echo $loan_info->relation_one ;?>" name="relation_one" class="form-control">
				</div>
				<div class="form-group">
						<label for="name">জামিনদার  নাম ২</label>
						<input type="text" value="<?php echo $loan_info->jamindar_name_two ;?>" name="jamindar_name_two" class="form-control">
				</div>
				<div class="form-group">
						<label for="name"> সম্পর্ক </label>
						<input type="text" value="<?php echo $loan_info->relation_two ;?>" name="relation_two" class="form-control">
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
<div class="box">
    <div class="box-header">
        <h3 class="box-title">List User</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>

                    <th>Sl</th>
					<th>Action</th>
					<th>Name</th>
					<th>Member No</th>
					<th>AC No</th>
					<th>Disburse Date</th>

					<th>Loan Money</th>
					<th>Loan Type</th>
					<th>Status</th>
					<th>Total Instalment</th>
					<th>Instalment Fee</th>
					<th>InterestPercent (%)</th>
                    <th>Picture</th>

                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($list_loan_account as $v_content) {
                    $i++;
                    ?>
                    <tr class="odd gradeX">

                        <td><?php echo $i; ?></td>
						<td>

							<?php
							if($v_content->ac_status=='running'){
							?>
	                            <a style="background-color:green;color:white" href="<?php echo base_url() ?>super_admin/collectLoan/<?php echo $v_content->loan_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
	                                <i class="entypo-pencil"></i>
										কালেকশন /  উত্তোলোন করুন
	                            </a>

							<?php }?>

	                            <a style="background-color:green;color:white" href="#" class="btn btn-default btn-sm btn-icon icon-left">
	                                <i class="entypo-pencil"></i>
										বিস্তারিত দেখুন
	                            </a>
								<a style="background-color:green;color:white" href="<?php echo base_url() ?>super_admin/editLoanAccount/<?php echo $v_content->loan_id; ?>" class="btn btn-default btn-sm btn-icon icon-left <?php if($sessionUserDetails->admin_type=='field_officer'){echo ' hide';}?>">
	                                <i class="entypo-pencil"></i>
										Edit
	                            </a>
															<a href="<?php echo base_url() ?>super_admin/showLoanMember/<?php echo $v_content->loan_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
																	<i class="entypo-pencil"></i>
																	Show
															</a>
                        </td>
						<td><?php echo $v_content->name; ?></td>
						<td><?php echo $v_content->member_no; ?></td>
						<td>
						<?php echo $v_content->loan_account; ?>
						</td>


						<td>
						<?php

						$from = $v_content->disburse_date ;
						$phpdate=$from;
						$fromdate = date("d-m-Y", strtotime($phpdate));

						echo $fromdate;

						?>
						</td>

						<td><?php echo $v_content->approved_loan_amount; ?></td>
						<td><?php echo $v_content->deposit_type; ?></td>
						<td><?php echo $v_content->ac_status; ?></td>

						<td><?php echo $v_content->total_installment; ?></td>
						<td><?php echo $v_content->installment_fee; ?></td>

						<td><?php echo $v_content->interestPercent; ?></td>



                        <td>

                            <img height="50px" width="50px" src="<?php echo base_url() . $v_content->picture_path ?>" class="img-circle" alt="User Image">
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
                    <th></th>
										<th></th>
	                  <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
