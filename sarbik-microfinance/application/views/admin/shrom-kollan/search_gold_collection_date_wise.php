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
<a href="<?php echo base_url() ?>super_admin/searchForEditGoldCollectionDateWise"><i class="fa fa-circle-o"></i> Edit</a>
    <form action="<?php echo base_url() ?>super_admin/searchGoldCollectionDateWise" method="POST">
    <div class="box-body">



        <div class="form-group">
            <label for="opening_date">তারিখ</label>
            <input type="text" autocomplete="off" name="collected_date" class="form-control datepicker">
        </div>

		<div class="box-footer">
        <center><button type="submit" class="btn btn-primary">Search</button></center>
		</div>

    </div>
    <!-- /.box-body -->


</form>
</div>
</div>
<div class="clearfix"></div>
