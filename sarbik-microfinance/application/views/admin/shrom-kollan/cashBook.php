<?php
$drsumOfgoldCollection=$sumOfgoldCollection;
$drsumOfLoanCollection=$sumOfLoanCollection;
$drsumOfLoanSoncoyCollection=$sumOfLoanSoncoyCollection;
$drsumOfAmountDebitVoucher=$sumOfAmountDebitVoucher;

$crsumOfLoanSoncoyUttolon=$sumOfLoanSoncoyUttolon;
$crsumOfgoldUttolon=$sumOfgoldUttolon;
$crsumOfLoanPaid=$sumOfLoanPaid;
$crsumOfAmountAssetPurchase=$sumOfAmountAssetPurchase;
$crsumOfAmountCreditVoucher=$sumOfAmountCreditVoucher;
$totalDebit=$drsumOfgoldCollection+$drsumOfLoanCollection+$drsumOfLoanSoncoyCollection+$drsumOfAmountDebitVoucher;
$totalCredit=$crsumOfLoanSoncoyUttolon+$crsumOfgoldUttolon+$crsumOfLoanPaid+$crsumOfAmountAssetPurchase+$crsumOfAmountCreditVoucher;
?>

<div class="box">
    <div class="box-header">
	<h1><center>Cash Book</center></h1>
        <div class="row">
		<div class="col-md-6 col-md-offset-3">
		<table class="table table-dark">
		<thead>
			<tr>
     
				<th scope="col">Total Debit</th>
				<th scope="col"><?php echo $totalDebit;?></th>
    
			</tr>
		</thead>
		<tbody>
		<tr>
		  
		  <td>Total Credit</td>
		  <td><?php echo $totalCredit;?></td>
		 
		</tr>
		<tr>
		  
		  <td>Present Balance</td>
		  <td><?php echo $totalDebit-$totalCredit;?></td>
		 
		</tr>
    
		</tbody>
		</table>
		</div>
		</div>
       
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>

                    <th>Serial</th>
                    <th>Type</th>
					<th>Date</th>
                    <th>Cash In (Debit)</th>
                    <th>Cash Out (Credit)</th>                
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($totalGoldCollection as $g_content) {
                    $i++;
                    ?>	
                    <tr class="odd gradeX">

                        <td><?php echo $i; ?></td>
                        <td>Gold :Id-><?php echo $g_content->collection_id; ?></td>
						<td><?php echo $g_content->collected_date;?></td>
						<td><?php echo $g_content->collected_money+0; ?></td>
						<td><?php echo $g_content->uttolon_money; ?></td>
                        <td>
                            <a href="<?php echo base_url() ?>super_admin/invoiceGoldCollectionByCollectionId/<?php echo $g_content->collection_id; ?>" >Invoice</a>
                        </td>
                    </tr>
                <?php } ?>
				<?php
                $j = $i;
                foreach ($totalLoanCollection as $l_content) {
                    $j++;
                    ?>	
                    <tr class="odd gradeX">

                        <td><?php echo $j; ?></td>
                        <td>Loan-Collect :Id-><?php echo $l_content->id; ?></td>
						<td><?php echo $l_content->today;?></td>
						<td><?php echo $l_content->per_installment_fee+$l_content->soncoy; ?></td>
						<td><?php echo $l_content->sc_cash_out; ?></td>
                        <td>
                           
                             
							<a href="#">
                              
                                Invoice
                            </a>

                        </td>
                    </tr>
                <?php } ?>
				<?php
                $k = $j;
                foreach ($totalLoanPaid as $lp_content) {
                    $k++;
                    ?>	
                    <tr class="odd gradeX">

                        <td><?php echo $k; ?></td>
                        <td>Loan-Paid :Id-><?php echo $lp_content->loan_id; ?></td>
						<td><?php echo $lp_content->disburse_date;?></td>
						<td><?php echo 0; ?></td>
						<td><?php echo $lp_content->approved_loan_amount; ?></td>
                        <td>
                           
                             
							<a href="#">
                                
                                Invoice
                            </a>

                        </td>
                    </tr>
                <?php } ?>
				<?php
                $l = $k;
                foreach ($listAsset as $asset_content) {
                    $l++;
                    ?>	
                    <tr class="odd gradeX">

                        <td><?php echo $l; ?></td>
                        <td>Asset :Id-><?php echo $asset_content->asset_id; ?></td>
						<td><?php echo $asset_content->date;?></td>
						<td><?php echo 0; ?></td>
						<td><?php echo $asset_content->cost; ?></td>
                        <td>
                           
                             
							<a href="#">
                                
                                Invoice
                            </a>

                        </td>
                    </tr>
                <?php } ?>
				<?php
                $m = $l;
                foreach ($listDebitVoucher as $debitVoucher) {
                    $m++;
                    ?>	
                    <tr class="odd gradeX">

                        <td><?php echo $m; ?></td>
                        <td>Debit Voucher :Id-><?php echo $debitVoucher->voucher_id; ?></td>
						<td><?php echo $debitVoucher->voucher_date;?></td>
						<td><?php echo $debitVoucher->voucher_money; ?></td>
						<td><?php echo 0; ?></td>
                        <td>
                           
                             
							<a href="#">
                              
                                Invoice
                            </a>

                        </td>
                    </tr>
                <?php } ?>
				<?php
                $n = $m;
                foreach ($listCreditVoucher as $creditVoucher) {
                    $n++;
                    ?>	
                    <tr class="odd gradeX">

                        <td><?php echo $n; ?></td>
                        <td>Credit Voucher :Id-><?php echo $creditVoucher->voucher_id; ?></td>
						<td><?php echo $creditVoucher->voucher_date;?></td>
						<td><?php echo 0; ?></td>
						<td><?php echo $creditVoucher->voucher_money; ?></td>
                        <td>
                           
                             
							<a href="#">
                                
                                Invoice
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
					
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>