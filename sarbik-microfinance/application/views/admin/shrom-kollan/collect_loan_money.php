<!-- general form elements -->

<div class="box box-primary">

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
	<div>


     <form method="POST" action="<?php echo base_url()?>super_admin/store_loan_collection" enctype="multipart/form-data">
    <div class="box-body">


        <div class="form-group">
            <label for=""> প্রদানকৃত তারিখ ( আজকের   তারিখ )  ( Year-Day-Month ) </label>
            <input type="text"  name="today" autocomplete="off" class="form-control datepicker">
        </div>
		<div class="form-group">
            <label for=""> গ্রহনকৃত তারিখ ( ইন্সটলমেন্ট  তারিখ )  ( Month-Day-Year )</label>
            <input type="text"  name="installment_date" autocomplete="off" class="form-control datepicker">
        </div>
        <div class="form-group">
             <input type="hidden" name="ac_id"  class="form-control" value="<?php echo $ac_info->loan_id?>">

            <label for=""> ইন্সটলমেন্ট  ফি ( In English )  </label>

            <input type="text" name="installment_fee"  class="form-control" value="<?php echo $ac_info->installment_fee?>" placeholder=" ইন্সটলমেন্ট  ফি">
        </div>
		<hr>
		<div class="form-group">
            <label for=""> সঞ্চয় ফি--Savings Money ( In English )  </label>
            <input type="text" name="soncoy" value="<?php echo $ac_info->sc_money?>"  class="form-control">

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
    <div class="box-header" style="color:green">
	    <p> নাম  :<?php echo ' '. $ac_holder_info->name ?></p>
		<p> পিতা  :<?php echo ' '. $ac_holder_info->father_name ?></p>
		<p> গ্রাম  :<?php echo ' '. $ac_holder_info->pa_gram ?></p>
		<p>সদস্য নং :<?php echo $ac_holder_info->member_no ?></p>
		<p>একাউন্ট নং  :
		<?php
		echo $ac_info->loan_account;
		?></p>
		<p>লোন  এর পরিমান  :<?php echo $ac_info->approved_loan_amount.' '.'টাকা'; ?></p>
		<p>মুনাফার  ( %  ):
		<?php
		$interest= $ac_info->interestPercent;
		echo $interest.'%';
		?>

		</p>
		<p>মুনাফার পরিমান  :

		<?php
		$interest=($ac_info->approved_loan_amount*$ac_info->interestPercent)/100;
		echo $interest.' '.'টাকা';
		?>
		</p>
		<p style="color:red">মোট টাকার পরিমান  :

		<?php
		$interest=($ac_info->approved_loan_amount*$ac_info->interestPercent)/100;
		$grandTotalAmount=$ac_info->approved_loan_amount+$interest;
		echo $grandTotalAmount.' '.'টাকা';
		?>
		</p>
		<p>লোন প্রদান  এর তারিখ  :
		            <?php
						$ofrom = $ac_info->disburse_date;
						$ophpdate=$ofrom;
						$ofromdate = date("d-m-Y", strtotime($ophpdate));

						echo $ofromdate;

						?>
		 </p>
		 <p> আজকের তারিখঃ  <?php echo $today=date("d-m-Y") ;?> </p>



    </div>


  <div class="box-body table-responsive">
    <table id="example1" class="table table-bordered table-striped">
     <thead>
      <tr>
      <th>Serial</th>
      <th>Id</th>
      <th>প্রদানকৃত তারিখ</th>
      <th>গ্রহনকৃত তারিখ</th>
      <th>Installment Amount</th>
      <th>Installment Fine</th>
      <th>Savings Money</th>
      <th>Profit</th>
      <th>Cash Out</th>
      <th>Action</th>
      </tr>
      </thead>
        <tbody>


            <?php
            $i=0;
            if($loan_collect_info){
                foreach($loan_collect_info as $loan){
                $i++;
                ?>
                <tr class="odd gradeX">

                    <td><?php echo $i?></td>
                    <td>
                      <?php echo $loan->id?>
                      <a href="<?php echo base_url() ?>super_admin/editLoanCollection/<?php echo $loan->id; ?>">
                          <i class="entypo-pencil"></i>
                      Edit
                      </a>
                    </td>
                    <td>
                        <?php
                        $today = $loan->today;
                                $phptoday=$today;
                                $finaltoday = date("d-m-Y", strtotime($phptoday));
                        echo $finaltoday;
                     ?>
                    </td>
                    <td>
                     <?php
                        $from = $loan->installment_date;
                                $phpdate=$from;
                                $fromdate = date("d-m-Y", strtotime($phpdate));
                        echo $fromdate;
                     ?>
                    </td>


                    <td>
                      <?php echo $loan->per_installment_fee?>
                     </td>
                     <td>
                      <?php echo $loan->per_installment_fine?>
                     </td>
                      <td><?php echo $loan->soncoy?>  </td>
                      <td><?php echo $loan->sc_profit?> </td>
                      <td><?php echo $loan->sc_cash_out?></td>
                    <td>
                        <a href="<?php echo base_url() ?>super_admin/editLoanCollection/<?php echo $loan->id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
                            <i class="entypo-pencil"></i>
                        Edit
                        </a>
                    </td>
                </tr>
  <?php } }?>


        </tbody>
        <tfoot>
            <tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
                <th>&nbsp;</th>
                 <th>&nbsp;</th>
                <th><p style="font-size:12px;color:green">Total :</p><?php echo $sumCollectLoanAmount?> </th>

                <th><p style="font-size:12px;color:red">Total :</p><?php echo $sumInstallmentFineAmount ; ?></th>
      <th><p style="font-size:12px;color:green">Total :</p><?php echo $sum_soncoy ; ?> </th>
                <th>	<p style="font-size:12px;color:green">Total :</p> <?php echo $sum_soncoy_profit?></th>
      <th>&nbsp;</th>
         <th>&nbsp;</th>

            </tr>

    <tr>

                <th colspan="4">Total Due Amount (Loan Amount + Interest + Fine)-(Total Collect  Loan Amount) </th>

                <th colspan="2">
                    <p style="font-size:20px;color:blue">

                         <?php
                    $dueAmount = ($grandTotalAmount+$sumInstallmentFineAmount)-$sumCollectLoanAmount;
                    echo $dueAmount;
                    ?>
                    </p>

                     </th>
      <th colspan="4">


                        <?php
                        $soncoy=$sum_soncoy;
                        $profit= $sum_soncoy_profit;
                        $grand_soncoy =$soncoy+$profit;
                       echo $grand_soncoy;

                        ?>


      </th>




            </tr>
    <tr>
        <th colspan="4">Total Savings Balance: </th>


                <th colspan="2">


                    <?php

                        if($dueAmount==0){
            $savings=$grand_soncoy-$total_uttolon_money;
                         echo $savings;
                        }else{
          $savings = $soncoy;
                        echo $savings;
                        }
                    ?>


                    </th>
      <th colspan="3" class="alert alert-danger">
     যদি লোন এর	 টাকা  পরিশোধ হয় তাহলে  সঞ্চয় এর লভ্যাংশ পাবে ।
      </th>
               <th>
       <?php
       if($dueAmount==0 && $savings > 0){
       ?>
      <a href="<?php echo base_url()?>super_admin/cashOutFromLoanAccount/<?php echo $ac_info->loan_id?>" class="btn btn-default btn-sm btn-icon icon-left">
                            <i class="entypo-pencil"></i>
            Cash Out
                        </a>
       <?php }?>
      </th>



            </tr>

        </tfoot>
    </table>
    </div>
</div>
