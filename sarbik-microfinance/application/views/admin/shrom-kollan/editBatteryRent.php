<!-- general form elements -->
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
<div class="box box-primary <?php if($sessionUserDetails->admin_type=='field_officer'){echo ' hide';}?>">


  <div >

    <!-- /.box-header -->
    <!-- form start -->
<form method="POST" action="<?php echo base_url() ?>super_admin/updateBatteryRentInfo" enctype="multipart/form-data">

    <!--<form role="form">-->
    <div class="box-body">
        <div class="form-group">
            <label for="name"> Customer </label>
<input type="hidden" autocomplete="off" name="rent_id" value="<?php echo $rent_info->rent_id;?>" class="form-control">
            <select name="customerId"  class="form-control select2" style="width:100%">


              <?php
              if($listCustomer){
                foreach($listCustomer as $content){

              ?>
                <option <?php if($content->customer_id==$rent_info->customerId){echo 'selected';}?> value="<?php echo $content->customer_id;?>"><?php echo $content->name.'-'.$content->customer_id.'-'.$content->mobile_no; ?></option>
              <?php } }?>
            </select>
        </div>


		<div class="form-group">
            <label for="user">Type</label>
            <select name="rentType"  class="form-control">
                <option <?php if($rent_info->rentType==1){echo 'selected';}?> value="1">Daily</option>
                <option <?php if($rent_info->rentType==7){echo 'selected';}?> value="7">Weekly</option>
                <option <?php if($rent_info->rentType==30){echo 'selected';}?> value="30">Monthly</option>
            </select>
    </div>
    <div class="form-group">
            <label for="name">Rent Money (In English)	</label>
            <input type="number" autocomplete="off"  name="rent_money" value="<?php echo $rent_info->rent_money;?>"  class="form-control">
    </div>
    <div class="form-group">
            <label for="name">Paid Date--<?php echo $rent_info->paid_date;?></label>
            <input type="text" autocomplete="off" name="paid_date" class="form-control datepicker">
    </div>
    <div class="form-group">
            <label for="name">Rent Start Date--<?php echo $rent_info->rent_start_date;?></label>
            <input type="text" autocomplete="off" name="rent_start_date" class="form-control datepicker">
    </div>

    <div class="form-group">
            <label for="rent_status">Status</label>
            <select name="rent_status"  class="form-control">
                <option <?php if($rent_info->rentType==1){echo 'selected';}?> value="1">Start</option>
                <option <?php if($rent_info->rentType==0){echo 'selected';}?> value="0">Back</option>

            </select>
    </div>
    <div class="row">
    								<div class="col-md-12">
                      <table class="table table-bordered mb-0">
    										<thead>
    											<tr>

    												<th>WareHouse <i class="text-danger">*</i></th>
                            <th>Brand <i class="text-danger">*</i></th>
    												<th>Model <i class="text-danger">*</i></th>
                            <th>Serial <i class="text-danger">*</i></th>
    												<th>Suppliers <i class="text-danger">*</i></th>
    											</tr>
    										</thead>
    										<tbody>
    											<tr>

    												<td>
                              <div class="form-group row">
                              <div class="col-sm-10">

                                <select name="wareHouseId" class="form-control ">
                          <?php
                          if($listWareHouse){
                            foreach($listWareHouse as $ware_house){
                          ?>
                                    <option <?php if($ware_house->warehouse_id==$rent_info->wareHouseId){echo 'selected';}?> value="<?php echo $ware_house->warehouse_id;?>"><?php echo $ware_house->warehouse_name;?></option>
                          <?php } }?>
                                </select>

                              </div>
                         		 </div>
                        		</td>
                            <td>
                              <div class="form-group row">
                              <div class="col-sm-10">

                                <select name="brandId" class="form-control ">
                          <?php
                          if($listBatteryBrand){
                            foreach($listBatteryBrand as $brand){
                          ?>
                                    <option <?php if($brand->brand_id==$rent_info->brandId){echo 'selected';}?> value="<?php echo $brand->brand_id;?>"><?php echo $brand->brand_name;?></option>
                          <?php } }?>

                                </select>

                              </div>
                         		 </div>

                        		</td>
    												<td>
                              <div class="form-group row">
                              <div class="col-sm-10">
                              <input type="text" class="form-control"  id="model" name="model" value="<?php echo $rent_info->model?>" autocomplete="off">
                              </div>
                         		 </div>
                        		</td>
                              <td>
                              <div class="form-group row">
                              <div class="col-sm-10">
                              <input type="text" class="form-control"  id="serial" name="serial" value="<?php echo $rent_info->serial?>" autocomplete="off">
                              </div>
                         		 </div>
                        		</td>
                            <td>
                              <select id="supplierId" name="supplierId" class="form-control" data-plugin="select2">

                                <?php
                                if($listSupplier){
                                  foreach($listSupplier as $supplier){
                                ?>
                                          <option <?php if($supplier->supplier_id==$rent_info->supplierId){echo 'selected';}?> value="<?php echo $supplier->supplier_id;?>"><?php echo $supplier->supplier_name;?></option>
                                <?php } }?>

                              </select>
                      		</td>
    											</tr>
    										</tbody>
    									</table>
                    </div>
              </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <center><button type="submit" class="btn btn-primary">সংরক্ষন করুন</button></center>
    </div>
</form>
</div>
</div>
<div class="clearfix"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">List User</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>SL</th>
                    <th>Customer Name</th>
                    <th>Phone</th>
                    <th>Present Address</th>
                    <th>Permanent Address</th>
                    <th>Rent Money</th>
                    <th>Paid Date</th>
                    <th>Rent Start Date</th>
                    <th>WareHouse</th>
                    <th>Supplier</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Serial</th>

                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
				if($rentList){
                foreach ($rentList as $v_content) {
                    $i++;
                    ?>
                    <tr class="odd gradeX">
                      <td>
                          <a href="<?php echo base_url() ?>super_admin/editBatteryRent/<?php echo $v_content->rent_id; ?>" class="btn btn-default btn-sm btn-icon icon-left <?php if($sessionUserDetails->admin_type=='field_officer'){echo ' hide';}?>">
                              <i class="entypo-pencil"></i>
                              Edit
                          </a>

                      </td>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $v_content->name; ?></td>
                        <td><?php echo '880'.$v_content->mobile_no; ?></td>
                        <td><?php echo $v_content->pa_gram.','.$v_content->pa_dak.','.$v_content->pa_upojela.','.$v_content->pa_jela; ?></td>
                        <td><?php echo $v_content->pra_gram.','.$v_content->pra_dak.','.$v_content->pra_upojela.','.$v_content->pra_jela;; ?></td>
                        <td><?php echo $v_content->rent_money; ?></td>
                        <td><?php echo $v_content->paid_date; ?></td>
                        <td><?php echo $v_content->rent_start_date ?></td>
                        <td><?php echo $v_content->warehouse_name ?></td>
                        <td><?php echo $v_content->supplier_name; ?></td>
                        <td><?php echo $v_content->brand_name; ?></td>
                        <td><?php echo $v_content->model; ?></td>
                        <td><?php echo $v_content->serial; ?></td>

                    </tr>
                <?php } } ?>
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
