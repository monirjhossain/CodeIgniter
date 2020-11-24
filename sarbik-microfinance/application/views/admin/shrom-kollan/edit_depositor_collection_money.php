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

	<div>


    <!-- /.box-header -->
    <!-- form start -->


     <form method="POST" action="<?php echo base_url() ?>super_admin/updateDipostiorCollectionMoney" enctype="multipart/form-data">
    <div class="box-body">
	   <div class="form-group">

			<input type="hidden" value="<?php echo $getData->collection_id ?>" name="collection_id" class="form-control">

        </div>

        <div class="form-group">
            <label for="collected_date"> তারিখ</label>
            <?php
            $from =  $getData->collected_date;
            $phpdate=$from;
            $fromdate = date("m-d-Y", strtotime($phpdate));
            ?>
            <input type="text"  value="<?php echo $fromdate?>" name="collected_date" class="form-control datepicker">
        </div>

        <div class="form-group">
            <label for="collected_money">  কালেকশন  টাকা ( In English )  </label>
            <input type="number" value="<?php echo $getData->collected_money?>" name="collected_money"   class="form-control">
        </div>
        <div class="form-group">
            <label for="collected_money">  উত্তোলন  টাকা ( In English )  </label>
            <input type="number" value="<?php echo $getData->uttolon_money?>" name="uttolon_money"   class="form-control">
        </div>
		<!--
		<div class="form-group">
            <label for="uttolon_money">  উত্তোলোন  টাকা ( In English )  </label>
            <input type="text" value="<?php echo $getData->uttolon_money?>" name="uttolon_money"   class="form-control">
        </div>
-->

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
        <h3 class="box-title">List Of Collection</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>

                    <th>Serial</th>
					<th>Collection Id</th>
					<th>Account Id</th>
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
