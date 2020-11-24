<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="<?php echo base_url() ?>admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_asset/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_asset/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_asset/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_asset/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_asset/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_asset/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_asset/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href=".<?php echo base_url() ?>admin_asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_asset/css/jquery-ui.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
    <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script type="text/javascript">
        function checkDelete() {
            var chk = confirm('Are You Sure To Delete This ?');
            if (chk) {
                return true;
            } else {
                return false;
            }
        }
    </script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url()?>super_admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SARBIK</b>FINANCE</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url() ?>admin_asset/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url() ?>admin_asset/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url() ?>admin_asset/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url() ?>admin_asset/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url() ?>admin_asset/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url().$sessionUserDetails->img_path?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $sessionUserDetails->admin_name;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url().$sessionUserDetails->img_path?>" class="img-circle" alt="User Image">

                <p>
                 <?php echo $sessionUserDetails->admin_name;?>
                  <small>Member since <?php echo $sessionUserDetails->created_at;?></small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url()?>super_admin/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url().$sessionUserDetails->img_path?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> <?php echo $sessionUserDetails->admin_name;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        
     
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>ধোপাডাঙ্গা সার্বিক গ্রাম উন্নয়ন সমবায় সমিতি লিঃ  </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        		  <li><a href="<?php echo base_url() ?>super_admin/addUser"><i class="fa fa-circle-o"></i>   ইউজার  যোগ করুন</a></li>
              <li><a href="<?php echo base_url() ?>super_admin/addDepartment"><i class="fa fa-circle-o"></i> ডিপার্টমেন্ট তালিকা</a></li>
              <li><a href="<?php echo base_url() ?>super_admin/addDesignation"><i class="fa fa-circle-o"></i> পদবী তালিকা</a></li>
        		  <li><a style="font-size:12px;" href="<?php echo base_url() ?>super_admin/addGovtHolyDayCalendar"><i class="fa fa-circle-o"></i> সরকারি  ছুটির ক্যালেন্ডার তৈরি করুন  </a></li>
              <li><a href="<?php echo base_url() ?>super_admin/addEmployee"><i class="fa fa-circle-o"></i>অফিসিয়াল কর্মকর্তা </a></li>

              <li><a href="<?php echo base_url() ?>super_admin/addDepositorMember"><i class="fa fa-circle-o"></i> গোল্ড সদস্য / সদস্যা ভর্তি  ফরম</a></li>
        			<li><a style="font-size:12px;" href="<?php echo base_url() ?>super_admin/accountOpenForDepositorMember"><i class="fa fa-circle-o"></i>একাউন্ট খুলুন - গোল্ড সদস্য / সদস্যা </a></li>
        			<li><a style="font-size:12px;" href="<?php echo base_url() ?>super_admin/goldCollectionDateWise"><i class="fa fa-circle-o"></i>  কালেকশন করুন - গোল্ড  একাউন্ট </a></li>
        			<li><a style="font-size:12px;" href="<?php echo base_url() ?>super_admin/searchGoldCollectionByDateToDate"><i class="fa fa-circle-o"></i>  Search করুন - গোল্ড  কালেকশন </a></li>

        			<li><a href="<?php echo base_url() ?>super_admin/addLoanMember"><i class="fa fa-circle-o"></i>ঋণ সদস্য / সদস্যা ভর্তি  ফরম</a></li>
        			<li><a style="font-size:12px;" href="<?php echo base_url() ?>super_admin/accountOpenForLoanMember"><i class="fa fa-circle-o"></i>একাউন্ট খুলুন - ঋণ সদস্য / সদস্যা  </a></li>
              <hr style="margin-top: 2px;
              margin-bottom: -2px;
              border: 0;
              border-top: 5px solid #ecf0f5;">
        			<li>
        		  <a href="<?php echo base_url() ?>super_admin/addAssetCategory"><i class="fa fa-circle-o"></i>
        		      সম্পদ ধরন  যোগ করুন
        		  </a>
        		  </li>

        		  <li>
        		  <a href="<?php echo base_url() ?>super_admin/addAsset"><i class="fa fa-circle-o"></i>
        		      সম্পদ যোগ করুন
        		  </a>
        		  </li>
              <li>
              <a href="<?php echo base_url() ?>super_admin/ledgerAssetSearch"><i class="fa fa-circle-o"></i>
                লেজার বই ( সম্পদ )
              </a>
              </li>
        		  <li>
        		  <a href="<?php echo base_url() ?>super_admin/addVoucherCategory"><i class="fa fa-circle-o"></i>
        		      ভাউচার ধরন  যোগ করুন
        		  </a>
        		  </li>

        		  <li>
        		  <a href="<?php echo base_url() ?>super_admin/addVoucher"><i class="fa fa-circle-o"></i>
        		      ভাউচার  যোগ করুন
        		  </a>
        		  </li>
              <li>
              <a href="<?php echo base_url() ?>super_admin/ledgerVoucherSearch"><i class="fa fa-circle-o"></i>
             	  লেজার বই ( ভাউচার )
              </a>
              </li>
              <li>
              <a href="<?php echo base_url() ?>super_admin/addSalaryVoucher"><i class="fa fa-circle-o"></i>
                বেতনের  ভাউচার  যোগ করুন
              </a>
              </li>

          		  <li>
                  <!--
          		  <a href="<?php echo base_url() ?>super_admin/cashBook"><i class="fa fa-circle-o"></i>
          	    	 ক্যাশবুক
          		  </a>
              -->
          		   <a href="<?php echo base_url() ?>super_admin/cashBalance"><i class="fa fa-circle-o"></i>
          	    	 ক্যাশ ব্যলেঞ্চ & Search Report
          		  </a>
          		  </li>
          </ul>
        </li>

	  </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <button onclick="goBack()">Go Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>
        <button onclick="myFunction()">Reload page</button>

<script>
function myFunction() {
  location.reload();
}
</script>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>super_admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->



 <section class="content">

<?php echo $admin_content ?>

</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="border-top:0">
   <center>
    <strong>Copyright  &copy; <?php echo date('Y')?> Developed By RAUD. Cell : 01715224239</strong> All rights
    reserved.
  </center>

  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="<?php echo base_url() ?>admin_asset/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>admin_asset/bower_components/jquery/dist/jquery-ui.js"></script>
<script src="<?php echo base_url() ?>admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>admin_asset/bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>admin_asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>admin_asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>admin_asset/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url() ?>admin_asset/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url() ?>admin_asset/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src=<?php echo base_url() ?>admin_asset/"plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>admin_asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/admin_asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url() ?>admin_asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url() ?>admin_asset/bower_components/chart.js/Chart.js"></script>
<script src="<?php echo base_url() ?>admin_asset/dist/js/pages/dashboard2.js"></script>
<script src="<?php echo base_url() ?>admin_asset/dist/js/demo.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/admin_asset/bower_components/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/admin_asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>



<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script>
$(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            'print',
			'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
	   lengthMenu: [[10,20,50,100,200,500,1000,2000,5000,-1], [10,20,50,100,200,500,1000,2000,5000,"All"]],
    } );

} );
</script>


<script>
$('document').ready(function()
{
    $('textarea').each(function(){
            $(this).val($(this).val().trim());
        }
    );
});
</script>
<script>
    $(function () {
        $('.select2').select2()
    })
</script>

<script>
    $(function () {
        $("#tabs").tabs();
    });
</script>
<script>
    $('.datepicker').datepicker({
        autoclose: true,

    })
</script>
<script>
    $('#print').click(function () {
        window.print();
    });
</script>
<script>
    $("#btn").click(function () {

        $("#printarea").show();
        window.print();

    });
</script>

<script>
    $(function () {
        CKEDITOR.replace('editor1')
        $('.textarea').wysihtml5()
    })
</script>
<script>
    $(function () {
        CKEDITOR.replace('editor2')
        $('.textarea').wysihtml5()

    })
</script>
<script>
    $(function () {
        CKEDITOR.replace('editor3')
        $('.textarea').wysihtml5({height: 300})
    })
</script>
<script>
    $(function () {
        CKEDITOR.replace('editor4')
        $('.textarea').wysihtml5()
    })
</script>
<!--
<script>
    $(function () {
        $('#example1').DataTable({
            "lengthMenu": [[100,200, -1], [100, 200, "All"]],
        });

    })
</script>
-->


</body>
</html>
