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
    <div class="box-header with-border">
        <h3 class="box-title">Edit Battery Info</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <!--<form role="form">-->
<form method="POST" action="<?php echo base_url() ?>super_admin/updateBatteryStock" enctype="multipart/form-data">
<div class="box-body">
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <input type="text" name="stock_id" class="form-control" value="<?php echo $battery_info->stock_id?>">
        <label for="purchase_date">Purchase Date--<?php echo $battery_info->purchase_date?></label>
        <input type="text" autocomplete="off" name="purchase_date" class="form-control datepicker" id="purchase_date" placeholder="Enter purchase_date">
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
        <label for="product_title">Product Title</label>
        <input type="text"  name="product_title" value="<?php echo $battery_info->product_title?>" class="form-control" id="product_title">
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
            <label for="details">Details</label>
            <textarea id="detail" name="details" class="form-control" maxlength="300" rows="5"><?php echo $battery_info->details?></textarea>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
        <label for="mfg_date">Mfg. Date-<?php echo $battery_info->mfg_date;?></label>
        <input type="text" autocomplete="off" value="" name="mfg_date" class="form-control datepicker" id="mfg_date" placeholder="mfg_date">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
        <label for="exp_date">Exp. Date--<?php echo $battery_info->exp_date?></label>
        <input type="text" autocomplete="off" value="" name="exp_date" class="form-control datepicker" id="exp_date" placeholder="exp_date">
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
            <label for="brandId">Brand</label>
            <select name="brandId" class="form-control ">
      <?php
      if($listBatteryBrand){
        foreach($listBatteryBrand as $brand){
      ?>
                <option <?php if($battery_info->brandId==$brand->brand_id){echo 'selected';}?> value="<?php echo $brand->brand_id;?>"><?php echo $brand->brand_name;?></option>
      <?php } }?>

            </select>
        </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
            <label for="wareHouseId">Warehouse</label>
            <select name="wareHouseId" class="form-control ">
      <?php
      if($listWareHouse){
        foreach($listWareHouse as $ware_house){
      ?>
                <option <?php if($battery_info->wareHouseId==$ware_house->warehouse_id){echo 'selected';}?> value="<?php echo $ware_house->warehouse_id;?>"><?php echo $ware_house->warehouse_name;?></option>
      <?php } }?>
            </select>
    </div>
  </div>
</div>
<div class="row">
								<div class="col-md-12">
                  <table class="table table-bordered mb-0">
										<thead>
											<tr>
												<th>Quantity <i class="text-danger">*</i></th>
												<th>Sell Price <i class="text-danger">*</i></th>
												<th>Supplier Price <i class="text-danger">*</i></th>
												<th>Model <i class="text-danger">*</i></th>
                        <th>SKU <i class="text-danger">*</i></th>
												<th>Suppliers <i class="text-danger">*</i></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
                          <div class="form-group row">
                          <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $battery_info->quantity?>" id="quantity" name="quantity" autocomplete="off" required="">
                          </div>
                     		 </div>
                    		</td>
												<td>
                          <div class="form-group row">
                          <div class="col-sm-10">
                          <input type="text" class="form-control"  value="<?php echo $battery_info->sell_price?>" id="sell_price" name="sell_price" autocomplete="off" required="">
                          </div>
                     		 </div>
                    		</td>
												<td>
                          <div class="form-group row">
                          <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $battery_info->supplier_price?>" id="supplier_price" name="supplier_price" autocomplete="off" required="">
                          </div>
                     		 </div>
                    		</td>
												<td>
                          <div class="form-group row">
                          <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $battery_info->model?>" id="model" name="model" autocomplete="off">
                          </div>
                     		 </div>
                    		</td>
                          <td>
                          <div class="form-group row">
                          <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $battery_info->sku?>" id="sku" name="sku" autocomplete="off">
                          </div>
                     		 </div>
                    		</td>
                        <td>
                          <select id="supplierId" name="supplierId" class="form-control" data-plugin="select2">

                            <?php
                            if($listSupplier){
                              foreach($listSupplier as $supplier){
                            ?>
                                      <option <?php if($battery_info->supplierId==$supplier->supplier_id){echo 'selected';}?> value="<?php echo $supplier->supplier_id;?>"><?php echo $supplier->supplier_name;?></option>
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
<div class="clearfix"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">List Battery</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>ID</th>
                    <th>Action</th>
                    <th>Brand</th>
                    <th>Supplier</th>
                    <th>Warehouse</th>
                    <th>Purchase Date</th>
                    <th>Mfg. Date</th>
                    <th>Exp. Date</th>
                    <th>Quantity</th>
                    <th>Model</th>
                    <th>SKU</th>
                    <th>Sell Price</th>
                    <th>Supplier Price</th>

                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($listBatteryStock as $v_content) {
                    $i++;
                    ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $v_content->stock_id; ?></td>
                        <td>
                          <a href="<?php echo base_url() ?>super_admin/editBatteryStock/<?php echo $v_content->stock_id; ?>" class="<?php if($sessionUserDetails->admin_type=='field_officer'){echo ' hide';}?>">
                          Edit
                        </a>
                        </td>
                        <td><?php echo $v_content->brand_name; ?></td>
                        <td><?php echo $v_content->supplier_name; ?></td>
                        <td><?php echo $v_content->warehouse_name; ?></td>
                        <td><?php echo $v_content->purchase_date; ?></td>
                        <td><?php echo $v_content->mfg_date; ?></td>
                        <td><?php echo $v_content->exp_date; ?></td>
                        <td><?php echo $v_content->quantity; ?></td>
                        <td><?php echo $v_content->model; ?></td>
                        <td><?php echo $v_content->sku; ?></td>
                        <td><?php echo $v_content->sell_price; ?></td>
                        <td><?php echo $v_content->supplier_price; ?></td>
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
