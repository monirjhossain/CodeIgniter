<!-- general form elements -->
<style>
    table tr td{
        padding-left: 0px;
    }
</style>

  <style>
    @media print{
        h1,h2,h3,h4,h5,h6,p,center,mark,sub,sup{
          color:blue !important;
          -webkit-print-coloradjust:exact;
        }
        div.none{
          display: none;
        }
		div.dt-buttons{
			display: none;
		}
		div#example1_filter{
			display: none;
		}
a.none{
          display: none;
        }
		th.none{
          display: none;
        }
		td.none{
          display: none;
        }
         b.blue{
          color:blue !important;
          -webkit-print-coloradjust:exact;
        }
    }
</style>

<div class="clearfix"></div>

<div id="printarea" class="blue" style="text-align:left;width:100%;padding: 0px;background-color: white;height: auto;float: left">
<a class="none" style="cursor: pointer;font-size: 36px; margin-top:-25px" id='btn'>Print</a>
<div class="">
<div>

 <center><p>বিসমিল্লাহির রাহমানির রাহিম</p></center>
  <center><h3 style="margin-top:-5px">শ্রম কল্যান সঞ্চয় ও ঋণ দান সমবায় সমিতি লি : </h3></center>
  <center><p>মধুখালি , ফরিদপুর ।</p></center>
  <center><p>রেজি নং  : ৪৫</p></center>
  </div>

    <div class="box-header" style="color:green">
	<table>
	<tr>
	<td style="width:80%;">
	<p> Invoice No :<?php echo ' '. $v_content->collection_id ?></p>
  <p> Voucher No :<?php echo $v_content->voucher_no ?></p>
	<p> নাম  :<?php echo ' '. $ac_holder_info->name ?></p>
	<p> পিতা  :<?php echo ' '. $ac_holder_info->father_name ?></p>
	<p> গ্রাম  :<?php echo ' '. $ac_holder_info->village ?></p>
	<p> মোবাইল নং :<?php echo $ac_holder_info->mobile ?></p>
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

     <p> Paid To :<?php echo $v_content->paid_to ?></p>
     <p> Paid To Mobile :<?php echo $v_content->paid_to_mobile ?></p>
     <p> Bank Name & Account No :<?php echo $v_content->bank_name.' '.'AC#'.$v_content->account_number ?></p>
     <p> Details :<?php echo $v_content->details ?></p>
		 </td>

		 <td>
		<img height="150px" width="150px" src="<?php  echo base_url() .  $ac_holder_info->member_picture_path ; ?>" class="user-image" alt="শ্রম কল্যাণ ঋণ দান সমবায়  সমিতি ">
		</td>
	</tr>


	</table>

    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
				    <th> তারিখ </th>
					<th> জমা </th>
					<th> উত্তোলোন </th>
                </tr>
            </thead>
            <tbody>
                    <tr class="odd gradeX">
						<td>
						<?php
						$from = $v_content->collected_date ;
						$phpdate=$from;
						$fromdate = date("d-m-Y", strtotime($phpdate));

						echo $fromdate;

						?>
						</td>
						<td><?php echo $v_content->collected_money; ?></td>
						<td><?php echo $v_content->uttolon_money; ?></td>
                    </tr>


            </tbody>

        </table>
		<br>
		<table class="table table-bordered table-striped">

            <tbody>
                    <tr class="odd gradeX">
						<td>
							<br><br><br><br>
						</td>
						<td>
							<br><br><br><br>
						</td>
						<td>
							<br><br><br><br>
						</td>
						<td>
							<br><br><br><br>
						</td>

                    </tr>


            </tbody>
            <tfoot>

				<tr>
					<th> গ্রাহক  এর স্বাক্ষর </th>
				    <th> ফিল্ড অফিসার এর স্বাক্ষর </th>
					<th> হিসাব রক্ষকের  স্বাক্ষর</th>
					<th> ব্যবস্থাপকের স্বাক্ষর </th>
                </tr>

            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
</div>
