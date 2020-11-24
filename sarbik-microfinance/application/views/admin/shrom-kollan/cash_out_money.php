<!-- general form elements -->
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
<div class="box box-primary">


	<div>

    <div class="box-header with-border">
        <h3 class="box-title">একটি একাউন্ট খুলুন</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->


     <form method="POST" action="<?php echo base_url() ?>super_admin/cashOutFromGoldSavingAccount" enctype="multipart/form-data">
    <div class="box-body">
	   <div class="form-group">
            <label for="accountId">একাউন্ট নং</label>
            <input type="text" readonly value="<?php echo $finalMax?>" name="accountId" class="form-control">
        </div>

        <div class="form-group">
            <label for="collected_date"> তারিখ</label>
            <input id="collected_date" type="text" autocomplete="off"  name="collected_date" class="form-control datepicker">
        </div>
		<p> আজ পর্যন্ত আপনার ব্যালেঞ্চ এ টাকা জমা আছেঃ

		<?php

                  $ofrom = $ac_info->opening_date ;
				  $ophpdate=$ofrom;
				  $ofromdate = date("d-m-Y", strtotime($ophpdate));


			        $today=date("d-m-Y") ;

					$date1=date_create($ofromdate);
					$date2=date_create($today);
					$diff=date_diff($date1,$date2);
					$dateDiff= $diff->format("%R%a");

					$profit=($toal_collection*$ac_info->interestPercent)/100;
          $subTotal=$toal_collection-$toal_uttolon_money;
					$profit=($subTotal*$ac_info->interestPercent)/100;
          echo $subTotal.' '.'টাকা'.'<br>';
          echo 'আপনি মুনাফা পেয়েছেন'.' '.$profit.' '.'টাকা'.'<br>';
          $subTotal=$subTotal+$profit;
          echo 'আপনার ব্যালেঞ্চ এ টাকা রয়েছে'.' '.$subTotal.' '.'টাকা';
/*
					if($dateDiff>364){
					$subTotal=($toal_collection+$total_profit)-$toal_uttolon_money;
					echo $subTotal.' '.'টাকা';
					}else{
					$subTotal=$toal_collection-$toal_uttolon_money;
					echo $subTotal.' '.'টাকা';
					}
*/



						?>
		</p>
        <div class="form-group">
            <label for="collected_money"> টাকা ( In English )  </label>
			<input type="hidden" name="subtotal"   class="form-control" value="<?php echo $subTotal; ?>">
            <input type="number" name="uttolon_money"   class="form-control" placeholder="Cash Out Money">
        </div>

        <div class="form-group">
            <label for="paid_to"> Paid To </label>
            <input type="paid_to" name="paid_to"   class="form-control" placeholder="Paid To">
        </div>
        <div class="form-group">
            <label for="paid_to_mobile"> Paid To Mobile </label>
            <input type="paid_to_mobile" name="paid_to_mobile"   class="form-control" placeholder="Paid To Mobile">
        </div>
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
          <div class="form-group">
              <label for="paid_check_no">Voucher NO</label>
              <input type="text" name="voucher_no" class="form-control">
          </div>
          <div class="form-group">
              <label for="paid_check_no">Detaills</label>

              <textarea rows="4" class="form-control"  name="details"> Details </textarea>
          </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <center><button type="submit" onClick="clearform(); class="btn btn-primary">Cash Out</button></center>
    </div>
</form>
</div>
<script>
function clearform()
{
    document.getElementById("collected_date").value=""; //don't forget to set the textbox ID

}
</script>
</div>
<div class="clearfix"></div>
<div class="box">
    <div class="box-header" style="color:green">
	   <center>
		<p>সদস্য নং :<?php echo $ac_info->memberId ?></p>
		<p>একাউন্ট নং  :
		<?php
		echo $ac_info->account_no;
		?></p>
		<p>একাউন্ট  ওপে্নিং এর তারিখ  :
		            <?php
						$ofrom = $ac_info->opening_date ;
						$ophpdate=$ofrom;
						$ofromdate = date("d-m-Y", strtotime($ophpdate));

						echo $ofromdate;

						?>
		 </p>
		 <p> আজকের তারিখঃ  <?php echo $today=date("d-m-Y") ;?> </p>
		<p> শতকরা মুনাফা  দেবার কথা ছিল যদি একাউন্ট এর মেয়াদ  সর্ব নিম্ন ১ বছর হয়  ( প্রতি বছর  )  :
		<?php
		$interet=$ac_info->interestPercent;
		echo
		$interet.'%';
		?>
		</p>

		</center>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>

                    <th>Serial</th>
					<th>Id</th>
					<th>AC Id</th>
				    <th>Date</th>
					<th>Cash In</th>
					<th>Profit</th>
					<th>Cash Out</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($dailyGoldCollection as $v_content) {
                    $i++;
                    ?>
                    <tr class="odd gradeX">

                        <td><?php echo $i; ?></td>
						 <td><?php echo $v_content->collection_id; ?></td>
						<td><?php echo $v_content->accountId; ?></td>

						<td>
						<?php
						$from = $v_content->collected_date ;
						$phpdate=$from;
						$fromdate = date("d-m-Y", strtotime($phpdate));

						echo $fromdate;

						?>

						</td>

						<td><?php echo $v_content->collected_money; ?></td>
						<td><?php echo $v_content->profit; ?></td>
						<td><?php echo $v_content->uttolon_money; ?></td>
                        <td>

                            <a href="<?php echo base_url() ?>super_admin/editCollectionByCollectionId/<?php echo $v_content->collection_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
                                <i class="entypo-pencil"></i>
									Edit
                            </a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
				    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>Total Cash In: <?php echo $toal_collection.' ';?>টাকা</th>
					<th>Total Profit: <?php echo ' '. $total_profit ;?></th>
                    <th>Total Cash Out: <?php echo $toal_uttolon_money.' ';?>টাকা</th>
				    <th>&nbsp;</th>

                </tr>

				<tr>
				    <th colspan="4">আজ পর্যন্ত আপনার একাউন্ট এ টাকা আছে</th>

                    <th>


					<?php
					$today=date("d-m-Y") ;

					$date1=date_create($ofromdate);
					$date2=date_create($today);
					$diff=date_diff($date1,$date2);
					$dateDiff= $diff->format("%R%a");

					if($dateDiff>364){


					$subTotal=$toal_collection+$total_profit-$toal_uttolon_money;
					echo $subTotal.' '.'টাকা';
					}else{
					$subTotal=$toal_collection-$toal_uttolon_money;
					echo $subTotal.' '.'টাকা';
					}

					?>

					</th>


					 <th><p style="font-size:12px; color:red;"> আপনার একাউন্ট এর মেয়াদ যদি ১ বছর পূরণ হয় তাহলে আপনার ব্যালেঞ্চ এ মুনাফা স্বয়ংক্রিয় ভাবে যোগ হয়ে যাবে ।  </p></th>
					 <th>&nbsp;</th>
					 <th>
					 <?php
					 if($subTotal>0){?>
					 <a href="<?php echo base_url() ?>super_admin/cashOutByAccountId/<?php echo $finalMax; ?>" class="btn btn-default btn-sm btn-icon icon-left">
                                <i class="entypo-pencil"></i>
									উত্তোলোন করুন
                     </a>
					 <?php }?>
					 </th>

                </tr>

            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
