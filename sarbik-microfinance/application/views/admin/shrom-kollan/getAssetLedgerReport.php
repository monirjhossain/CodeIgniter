

<div class="box">

    <!-- /.box-header -->
  <h1><center><?php echo $categoryName->asset_category?><center></h1>
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
                foreach ($listAsset as $asset) {
                    $i++;
                    ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td>Type-Id-><?php echo $asset->asset_type.'-'. $asset->asset_category_id; ?></td>
            						<td><?php echo $asset->date;?></td>
                        <td><?php echo $asset->asset_category;?></td>
            						<td><?php echo $asset->cost; ?></td>
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
                    <th><?php echo $sumOfAmountAsset?></th>
                    <th></th>

                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
