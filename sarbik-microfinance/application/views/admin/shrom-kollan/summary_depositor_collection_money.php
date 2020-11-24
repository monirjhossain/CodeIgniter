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
    <div class="box-header" style="color:green">
	<div>

 <center><p>বিসমিল্লাহির রাহমানির রাহিম</p></center>
  <center><h3 style="margin-top:-5px">শ্রম কল্যান সঞ্চয় ও ঋণ দান সমবায় সমিতি লি : </h3></center>
  <center><p>মধুখালি , ফরিদপুর ।</p></center>
  <center><p>রেজি নং  : ৪৫</p></center>
  </div>
	<table>
	<tr>
	<td style="width:80%;">
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
		 </td>
		 <td>
		<img height="150px" width="150px" src="<?php  echo base_url() .  $ac_holder_info->member_picture_path ; ?>" class="user-image" alt="শ্রম কল্যাণ ঋণ দান সমবায়  সমিতি ">
		</td>
	</tr>


	</table>

    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="display table table-bordered table-striped">
            <thead>
                <tr>

                    <th>সিরিয়াল</th>
				            <th> তারিখ </th>
          					<th> জমা </th>
          					<th> মুনাফা পেয়েছে </th>
          					<th> উত্তোলোন </th>
                    <th> Invoice </th>
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
                        <td class="none">




							<a  href="<?php echo base_url() ?>super_admin/invoiceGoldCollectionByCollectionId/<?php echo $v_content->collection_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
                                <i class="entypo-pencil"></i>
									Invoice
                            </a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Cash In: <?php echo $toal_collection.' ';?>টাকা</th>
					<th>Total Profit: <?php echo ' '. $total_profit ;?></th>
                    <th colspan="2">Total Cash Out: <?php echo $toal_uttolon_money.' ';?>টাকা</th>


                </tr>

				<tr>
				    <th colspan="2">আজ পর্যন্ত আপনার একাউন্ট এ টাকা আছে</th>
                    <th>

					<?php
					$today=date("d-m-Y") ;

					$date1=date_create($ofromdate);
					$date2=date_create($today);
					$diff=date_diff($date1,$date2);
					$dateDiff= $diff->format("%R%a");
					$profit=($toal_collection*$ac_info->interestPercent)/100;

          $subTotal=$toal_collection-$toal_uttolon_money;
					$profit=($subTotal*$ac_info->interestPercent)/100;
          if($toal_collection>=$toal_uttolon_money){
          echo $subTotal.' '.'টাকা'.'<br>';
          echo 'আপনি মুনাফা পেয়েছেন'.' '.$profit.' '.'টাকা'.'<br>';
          $subTotal=$subTotal+$profit;
          echo 'আপনার ব্যালেঞ্চ এ টাকা রয়েছে'.' '.$subTotal.' '.'টাকা';
        }else{
          $profit=$toal_uttolon_money-$toal_collection;
          echo 'আপনার ব্যালেঞ্চ জমা হয়েছে'.' '.$toal_collection.' '.'টাকা';
          echo 'আপনি মুনাফা পেয়েছেন'.' '.$profit.' '.'টাকা'.'<br>';

        }
          /*
					if($dateDiff>364){
					$subTotal=($toal_collection-$toal_uttolon_money)+$profit;
					echo $subTotal.' '.'টাকা';
					}else{
					$subTotal=$toal_collection-$toal_uttolon_money;
					echo $subTotal.' '.'টাকা';
					}
          */
					?>

					</th>


					 <th colspan="2"><p style="font-size:12px; color:red;"> আপনার একাউন্ট এর মেয়াদ যদি ১ বছর পূরণ হয় তাহলে আপনার ব্যালেঞ্চ এ মুনাফা স্বয়ংক্রিয় ভাবে যোগ হয়ে যাবে ।  </p></th>

					 <th class="none">
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
</div>
<div class="clearfix"></div>
