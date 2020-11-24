 <!-- /.row -->
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border"style="padding:0">
              <h3  style="text-align:center;fontsize:20px;"> আজকের  লেন দেন  :
<?php
						$from = $today;
						$phpdate=$from;
						$fromdate = date("d-m-Y", strtotime($phpdate));

						echo $fromdate;

						?>
			  </h3>

            </div>
			<div>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1"> গোল্ড </a></li>
    <li><a href="#tabs-2"> লোন </a></li>

  </ul>
  <div id="tabs-1">
    <div class="box-body table-responsive">
        <table id="example1" class="display">
            <thead>
                <tr>

                    <th> সিরিয়াল </th>
					<th> নাম </th>
					<th> একাউন্ট </th>
				    <th> সদস্য নং  </th>
					<th> মোবাইল </th>

					<th>Cash In</th>

					<th>Cash Out</th>

                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($todayGoldCollection as $v_content) {
                    $i++;
                    ?>
                    <tr class="odd gradeX">

                        <td><?php echo $i; ?></td>
						<td><?php echo $v_content->name; ?></td>
						<td><?php echo $v_content->account_no; ?></td>
						<td><?php echo $v_content->memberId; ?></td>
						<td><?php echo $v_content->mobile; ?></td>
						<td><?php echo $v_content->collected_money; ?></td>
						<td><?php echo $v_content->uttolon_money; ?></td>

                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
				    <th colspan="5"> আজকের গোল্ড সদস্যের মোট  লেন দেন  </th>

                    <th><h1> <?php echo $total_gold_collection_today ?> </h1></th>
                    <th><h1><?php echo $total_uttolon_money_today ?></h1> </th>
                </tr>



            </tfoot>
        </table>
    </div>
  </div>
  <div id="tabs-2">
    <div class="box-body">
        <a href="#">Clik Here</a>
    </div>
  </div>

</div>

			</div>
            <!-- /.box-header -->

            <!-- ./box-body -->

            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
