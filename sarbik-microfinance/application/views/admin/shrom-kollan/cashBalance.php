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
$crsumOfAmountSalaryoucher=$sumOfAmountSalaryoucher;
$totalDebit=$drsumOfgoldCollection+$drsumOfLoanCollection+$drsumOfLoanSoncoyCollection+$drsumOfAmountDebitVoucher;
$totalCredit=$crsumOfLoanSoncoyUttolon+$crsumOfgoldUttolon+$crsumOfLoanPaid+$crsumOfAmountAssetPurchase+$crsumOfAmountCreditVoucher+$crsumOfAmountSalaryoucher;
?>

<div class="box">
    <div class="box-header">

        <div class="row">
		<div class="col-md-6">
      <h1><center>Cash Balance</center></h1>
		<table class="table table-dark">
		<thead>
			<tr style="background-color:green;color:white">
				<th scope="col">Total Debit</th>
				<th scope="col"><?php echo $totalDebit;?></th>
			</tr>
		</thead>
		<tbody>
		<tr style="background-color:red;color:white">
		  <td>Total Credit</td>
		  <td><?php echo $totalCredit;?></td>
		</tr>
		<tr style="background-color:black;color:white">
		  <td>Present Balance</td>
		  <td><?php echo $totalDebit-$totalCredit;?></td>
		</tr>

		</tbody>
		</table>
    <div class="">
        <form action="<?php echo base_url() ?>super_admin/getCashReport" method="POST">
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
    <div class="col-md-6">
      <h1><center>Details</center></h1>
    <table class="table table-dark">
    <thead>
      <tr style="background-color:black;color:white">
        <th scope="col">Topics</th>
        <th scope="col">Cost</th>
      </tr>
    </thead>
    <tbody>
    <tr style="background-color:green;color:white">
      <td>Gold Collection (Debit)</td>
      <td><?php echo $drsumOfgoldCollection;?></td>
    </tr>
    <tr style="background-color:green;color:white">
      <td>Loan Collection (Debit)</td>
      <td><?php echo $drsumOfLoanCollection;?></td>
    </tr>
    <tr style="background-color:green;color:white">
      <td>Loan Soncoy Collection (Debit)</td>
      <td><?php echo $drsumOfLoanSoncoyCollection;?></td>
    </tr>
    <tr style="background-color:green;color:white">
      <td>Debit Voucher (Debit)</td>
      <td><?php echo $drsumOfAmountDebitVoucher;?></td>
    </tr>

    <tr style="background-color:red;color:white">
      <td>Loan Soncoy Uttolon (Credit)</td>
      <td><?php echo $crsumOfLoanSoncoyUttolon;?></td>
    </tr>
    <tr style="background-color:red;color:white">
      <td>Gold User Money Uttolon (Credit)</td>
      <td><?php echo $crsumOfgoldUttolon;?></td>
    </tr>
    <tr style="background-color:red;color:white">
      <td>Loan Paid (Credit)</td>
      <td><?php echo $crsumOfLoanPaid;?></td>
    </tr>
    <tr style="background-color:red;color:white">
      <td>Asset Purchase (Credit)</td>
      <td><?php echo $crsumOfAmountAssetPurchase;?></td>
    </tr>
    <tr style="background-color:red;color:white">
      <td>Credit Voucher (Credit)</td>
      <td><?php echo $crsumOfAmountCreditVoucher;?></td>
    </tr>
    <tr style="background-color:red;color:white">
      <td>Salary Voucher (Credit)</td>
      <td><?php echo $crsumOfAmountSalaryoucher;?></td>
    </tr>
    </tbody>
    </table>
    </div>

		</div>

    </div>
    <!-- /.box-header -->
    <!-- /.box-body -->
</div>
