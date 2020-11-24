<style>
    table tr td{
        padding-left: 10px;
        padding-bottom: 0px;
        padding-top: 0px;
    }
</style>

  <style>
    @media print{
        h1,h2,h3,h4,h5,h6,p,center,mark,sub,sup{
          color:blue !important;
          -webkit-print-coloradjust:exact;
        }
       a.none{
		   display:none;
	   } 
	  
	   body * { visibility: hidden; }
#printarea * { visibility: visible; }
.main-footer * { visibility: visible; }
    }
</style>
<style type="text/css">
    .result{ height:200px;overflow:auto;}
    </style>
    <style type="text/css" media="print">
    @media print{ .result{ height:100%;overflow:visible;} } 
    </style>

   
<div id="printarea" class="blue result" style="padding:20px;text-align:left;width:96%;margin-left:2%;margin-right: 2%;background-color: white;height: auto;float: left">
<a class="none" style="cursor: pointer;font-size: 36px; margin-top:-25px" id='btn'>Print</a>
            
<div style="width: 100%;margin-top: 20px;min-height:930px;">
  <div>
  <center><p style="text-align:right;font-size:18px">সদস্য নং :  <?php echo $depositor_info->member_no; ?></p></center>
  <center><p>বিসমিল্লাহির রাহমানির রাহিম</p></center>
  <center><h3 style="margin-top:-5px">ধোপাডাঙ্গা সার্বিক গ্রাম উন্নয়ন সমবায় সমিতি লিঃ  </h3></center>
  <center><p>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার অনুমোদিত। </p></center>
  <center><p>ফরিদপুর সদর, ফরিদপুর।</p></center>
  <center><p>নিবন্ধন নং : ফরিদপুর সদর ৫৩</p></center>
  </div>
  
  <div style="width:100%;float:left">
  <div style="width:30%;float:left">
  &nbsp;
  </div>
  <div style="width:40%;float:left;background-color:green;text;padding:10px;color:white;">
  <center>সদস্য / সদস্যা ভর্তি ফরম</center>
  </div>
  <div style="width:30%;float:left">
   &nbsp;
  </div>
  </div>
  
  <div style="width:100%;float:left">
  <p>বরাবর ,</p>
  <div style="float:left;width:5%;">
  &nbsp;
  </div>
  <div style="float:left;width:80%;">
  <p>সভাপতি/সাধারন সম্পাদক</p>
  <p>ধোপাডাঙ্গা সার্বিক গ্রাম উন্নয়ন সমবায় সমিতি লিঃ : </p>
  <p>ফরিদপুর সদর, ফরিদপুর।</p>
  </div>
  <div style="float:left;width:15%;">
  <img height="100" width="100" src=<?php echo base_url().$depositor_info->member_picture_path?>>
  </div>
  <p>জনাব ,</p>
  <p>আমি  : <?php echo $depositor_info->name .' '.','.' '; ?>
      পিতা  : <?php echo $depositor_info->father_name .' '.','.' '; ?>
     মাতা : <?php echo $depositor_info->mother_name .' '.','.' '; ?>
    <?php if($depositor_info->husband_name){echo ' স্বামী :  '. $depositor_info->husband_name .' ';} ; ?>
  আমার  এন আই ডি / জন্ম সনদ :  <?php echo $depositor_info->nid .' '.' '; ?>
	  </p>
	  <p>
	  গ্রাম  : <?php echo $depositor_info->village .' '.','.' '; ?>
	  ইউনিয়ন  : <?php echo $depositor_info->union_name .' '.','.' '; ?>
	 উপজেলা  : <?php echo $depositor_info->upojela .' '.','.' '; ?>
	 জেলা  : <?php echo $depositor_info->district .'।'; ?>
     
	  </p>
	  <p>আপনার সমিতির সকল নিয়ম মানিয়া সদস্য হইতে ইচ্ছুক , সদস্য ফি বাবদ   <?php echo $depositor_info->member_fee .' '; ?>
	  টাকা  এই আবেদন পত্রে সংযুক্ত করিলাম । 
	  
	  </p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>
	  অতএব , আমাকে আপনার সমিতির একজন সদস্য করতে মর্জি হন ।
	  </p>
	  <div style="width:75%;float:left">
	 <P style="font-size:18px"> জরিপ কারীর স্বাক্ষর  <p>
	<p> নাম : <?php echo $depositor_info->emp_name .' '; ?></p>
	<p> পদবী : <?php echo $depositor_info->emp_designation .' '; ?></p>
	  </div>
	  <div style="width:25%;float:left;">
	 <P style="font-size:18px"> আবেদন কারীর স্বাক্ষর<p>
	<p> নাম : <?php echo $depositor_info->name .' '; ?></p>
	<p> তারিখ : <?php echo $depositor_info->date .' '; ?></p>
	  </div>
	  <p>আপনাকে  ধোপাডাঙ্গা সার্বিক গ্রাম উন্নয়ন সমবায় সমিতি লিঃ- এ সদস্য করা হল ।<p>
	  <p style="text-align:right">সভাপতি/সাধারন সম্পাদক এর সীল ও স্বাক্ষর  । </p>
	  <p style="text-align:right">মোঃ রাকিব সেক</p>
  </div>

</div>

</div>
<br>


