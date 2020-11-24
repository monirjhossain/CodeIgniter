
<div class="box">
      <!-- /.box-header -->
    <div class="row">

    <div class="col-md-4 col-md-offset-4">
        <form action="<?php echo base_url() ?>super_admin/getAssetLedgerReport" method="POST">

          <div class="form-group">
          <label for="asset_category_id">Select  A Ledger</label>
          <select name="asset_category_id" class="form-control ">
            <?php
            if($listAssetCategory){
              foreach($listAssetCategory as $catAsset){
            ?>
                      <option value="<?php echo $catAsset->asset_category_id;?>"><?php echo $catAsset->asset_category.'-'.$catAsset->asset_type;?></option>
            <?php } }?>

          </select>
          </div>

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
    <!-- /.box-body -->
</div>
