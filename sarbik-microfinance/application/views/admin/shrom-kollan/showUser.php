<style>
    table tr td{
        padding: 10px;
    }
</style>
<div id="printarea" style="width:96%;margin-left:2%;margin-right: 2%;padding: 10px;background-color: white">
    <div class="center-block" style="text-align: center">
        <h3>User Information</h3>
    </div>
    <div style="float:right;position: relative;right:0;">
        <a style="cursor: pointer" id='btn'>Print</a>
    </div>

    <table border="1" style="width:100%">
        <tr>
            <td colspan="" style="width:80%"><?php echo $user_info->user_details ?></td>

            <td style="width:80%">
                <div class="pull-right">
                    <img src="<?php echo base_url() . $user_info->img_path ?>" width="150" height=150">
                </div>
            </td>
        </tr>

    </table>
    <br>
    <table style="width:100%" border="1">
        <tr>
            <td><b>নাম</b></td>
            <td>  <?php echo $user_info->admin_name ?></td>
        </tr>

        <tr>
            <td><b>Email</b> </td>
            <td> <?php echo $user_info->admin_email_address ?></td>
        </tr>
     
        
        <tr>
            <td><b>Admin Type</b></td>
            <td>
                <?php
                 echo $user_info->admin_type;
                    ?>
            </td>
        </tr>
        <tr>
            <td><b>Contact Adress</b></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><b>Contact Number</b></td>
            <td><?php echo $user_info->mobile ?></td>
        </tr>
         
        
    </table>

</div>
<br>


