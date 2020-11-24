<div style="margin-top: 40px;">
    &nbsp;
</div>
<div class="row">
  <div class="col-md-4">
      <form action="<?php echo base_url() ?>super_admin/getGoldCollectionBySingleMemberDateToDate" method="POST">
          <div class="form-group">
             <lebel>Single Gold Member Collection</lebel>
              <div class="clearfix"></div>
              <div class="input-group date col-md-12">
                  <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" autocomplete="off" name="search_date_one" class="form-control datepicker">
                  <input type="text" autocomplete="off" name="search_date_two" class="form-control datepicker">
                  <div class="form-group">
                        <label for="memberId">সদস্য  সিলেকশন  করুন  ( নাম -সদস্য নং )</label><br>
                        <select name="account_id"  class="form-control select2" style="width:100%">
            		        	   <option value="0"> &nbsp;</option>
                                  <?php
                                    if($listAccount){
                                    	foreach($listAccount as $content){

                                    ?>
                                   <option  value="<?php echo $content->account_id;?>"><?php echo $content->name.'-'.$content->member_no.'-'.$content->account_no; ?></option>
                                 <?php } }?>
                        </select>
                    </div>
                  <input type="submit"   class="btn btn-primary form-control" value="Search">
              </div>
          </div>
      </form>
  </div>

    <div class="col-md-4">
        <form action="<?php echo base_url() ?>super_admin/getGoldCollectionByDateToDate" method="POST">
            <div class="form-group">
               <lebel>Total Gold Member Collection</lebel>
                <div class="clearfix"></div>
                <div class="input-group date col-md-12">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" autocomplete="off" name="search_date_one" class="form-control datepicker">
                    <input type="text" autocomplete="off" name="search_date_two" class="form-control datepicker">
                    <input type="submit"   class="btn btn-primary form-control" value="Search">
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <form action="<?php echo base_url() ?>super_admin/getGoldCollectionByEmployeeDateToDate" method="POST">
            <div class="form-group">
               <lebel>Collected By</lebel>
                <div class="clearfix"></div>
                <div class="input-group date col-md-12">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" autocomplete="off" name="search_date_one" class="form-control datepicker">
                    <input type="text" autocomplete="off" name="search_date_two" class="form-control datepicker">
                    <div class="form-group">
                          <label for="memberId">সদস্য  সিলেকশন  করুন  ( নাম -সদস্য নং )</label><br>
                          <select name="admin_id"  class="form-control select2" style="width:100%">
                               <option value="0"> &nbsp;</option>
                                    <?php
                                      if($listUser){
                                        foreach($listUser as $content){

                                      ?>
                                     <option  value="<?php echo $content->admin_id;?>"><?php echo $content->admin_name.'-'.$content->admin_id.'-'.$content->admin_email_address; ?></option>
                                   <?php } }?>
                          </select>
                      </div>
                    <input type="submit"   class="btn btn-primary form-control" value="Search">
                </div>
            </div>
        </form>
    </div>

</div>

<div class="clearfix">

</div>
