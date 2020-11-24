

<div class="box">

    <!-- /.box-header -->
  <h1><center><?php echo $categoryName->voucher_category?><center></h1>
	<h3><center><?php echo $date1.'থেকে'.$date2.' '.'পরযন্ত ডাটা উত্তোলন করা হয়েছে';?><center></h3>

    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>

                    <th>Serial</th>
                    <th>Type</th>
					          <th>Date</th>
                    <th>Category</th>
                    <th>Cash</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

				        <?php
                $i = 0;
                foreach ($listVoucher as $voucher) {
                    $i++;
                    ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td>Type-Id-><?php echo $voucher->voucher_type.'-'. $voucher->voucher_id; ?></td>
            						<td><?php echo $voucher->voucher_date;?></td>
                        <td><?php echo $voucher->voucher_category;?></td>
            						<td><?php echo $voucher->voucher_money; ?></td>
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
                    <th>Total Amount</th>
                    <th><?php echo $sumOfAmountVoucher?></th>
                    <th></th>

                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
