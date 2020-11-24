<!-- general form elements -->

<div class="box box-primary <?php if($sessionUserDetails->admin_type=='field_officer'){echo ' hide';}?>">
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
    <div style="text-align: center;color: red"><?php echo validation_errors(); ?></div>
    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">+ ADD</button>
    <div id="demo" class="collapse">

    <div class="box-header with-border">
        <h3 class="box-title">একটি একাউন্ট খুলুন</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->

    <?php
    $attributes = array('enctype' => 'multipart/form-data');
    echo form_open_multipart('super_admin/accountOpenForLoanMember', $attributes);
    ?>
    <!--<form role="form">-->
    <div class="box-body">
	   <div class="form-group">
            <label for="loan_account">একাউন্ট নং</label>
            <input type="text" readonly value="<?php echo $finalMax?>" name="loan_account" class="form-control">
        </div>
	    <div class="form-group">
            <label for="loan_member">সদস্য  সিলেকশন  করুন  ( নাম -সদস্য নং )</label><br>

            <select name="loan_member_id"  class="form-control select2" style="width:100%">
							<option value="0"> &nbsp;</option>

							<?php
							if($listLoanMemmber){
								foreach($listLoanMemmber as $content){

							?>
							                <option value="<?php echo $content->loan_member_id;?>"><?php echo $content->name.'-'.$content->member_no; ?></option>
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
            <label for="disburse_date">লোন প্রদান   এর তারিখ</label>
            <input type="text" autocomplete="off"  name="disburse_date" class="form-control datepicker">
        </div>

        <div class="form-group">
            <label for="">লোন  এর পরিমান ( In English )  </label>
            <input type="text" name="loan_amount"  class="form-control" placeholder="লোন  এর পরিমান">
        </div>

				<div class="form-group">
								<label for="name"> কথায় </label>
								<input type="text" name="kothai" class="form-control">
						</div>
		 <div class="form-group">
            <label for=""> মুনাফা  প্রতি বছর  (  % )  </label>
            <input type="text" name="interestPercent" value="10"  class="form-control" placeholder="Opening Money">
        </div>

		<div class="form-group">
            <label for=""> ইন্সটল্মেন্ট সঞ্চয় </label>
            <input type="text" name="sc_money"  class="form-control" placeholder="Savings Money">
        </div>



				<div class="form-group">
								<label for="name"> সারভিচ চার্জ  (  In English )</label>
								<input type="text" name="service_charge" class="form-control">
						</div>


				<div class="form-group">
								<label for="name"> ইন্সটলমেন্ট সংখ্যা  </label>
								<input type="text" name="total_installment" value="110"  class="form-control">
						</div>
				<div class="form-group">
								<label for="name">আবেদনকারীর চেক প্রদত্ত ব্যংক নাম   </label>
								<input type="text" name="bank_name"  class="form-control">
						</div>
				<div class="form-group">
								<label for="name"> চেক নং  </label>
								<input type="text" name="check_no"  class="form-control">
						</div>
				<div class="form-group">
								<label for="name">বিতরনের তারিখ</label>
								<input type="text" autocomplete="off" name="bitoron_date" class="form-control datepicker">
						</div>
				<div class="form-group">
								<label for="name">গ্রহনের আরিখ </label>
								<input type="text" autocomplete="off" name="grohon_date" class="form-control datepicker">
						</div>
				<div class="form-group">
								<label for="name">কিস্তি শুরুর তারিখ </label>
								<input type="text" autocomplete="off" name="installment_start_date" class="form-control datepicker">
						</div>
				<div class="form-group">
								<label for="name">কিস্তির পরিমাণ</label>
								<input type="text" name="kistir_poriman" class="form-control">
						</div>
				<div class="form-group">
								<label for="name">জামিনদার  নাম ১ </label>
								<input type="text" name="jamindar_name_one" class="form-control">
						</div>
				<div class="form-group">
								<label for="name"> সম্পর্ক </label>
								<input type="text" name="relation_one" class="form-control">
						</div>
						<div class="form-group">
								<label for="name">জামিনদার  নাম ২</label>
								<input type="text" name="jamindar_name_two" class="form-control">
						</div>
						<div class="form-group">
								<label for="name"> সম্পর্ক </label>
								<input type="text" name="relation_two" class="form-control">
						</div>








		<div class="form-group">
            <label for="ac_status"> AC Status </label>
            <select name="ac_status"  class="form-control">
                <option value="running"> Running </option>
            </select>
      </div>
			<hr>
			<div class="form-group">
							<label for="paid_bank_account_id"> যে ব্যংকের মাধমে টাকা প্রদান করা হল </label>
							<select name="paid_bank_account_id"  class="form-control">
									<option value="0"> Select A Account </option>
									<?php
									if($allBankAccount){
										foreach($allBankAccount as $v_content){	?>

									<option value="<?php echo $v_content->account_id?>"> <?php echo $v_content->bank_name.'-'.$v_content->account_name.'-'.$v_content->account_number ;?> </option>
								<?php } } ?>
							</select>
				</div>
				<div class="form-group">
						<label for="paid_check_no">Paid Bank Check No </label>
						<input type="text" name="paid_check_no" class="form-control">
				</div>


    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <center><button type="submit" class="btn btn-primary">Save</button></center>
    </div>
</form>
</div>
</div>
<div class="clearfix"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">List Loan Account</h3>
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
										<th>Instalment Savings</th>
                    <th>Picture</th>

                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($list_account as $v_content) {
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
														<a style="background-color:green;color:white" href="<?php echo base_url() ?>super_admin/showLoanMember/<?php echo $v_content->loan_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
																<i class="entypo-pencil"></i>
																Print
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
													<td>
													<?php
													if($v_content->deposit_type==1){
													echo 'Daily';
													}
													?>
													</td>
													<td><?php echo $v_content->ac_status; ?></td>

													<td><?php echo $v_content->total_installment; ?></td>
													<td><?php echo $v_content->installment_fee; ?></td>

													<td><?php echo $v_content->interestPercent; ?></td>

													<td><?php echo $v_content->sc_money; ?></td>

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
