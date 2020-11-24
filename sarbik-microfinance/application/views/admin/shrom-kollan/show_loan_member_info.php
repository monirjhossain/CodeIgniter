<style>
    table tr td{
        padding-left: 10px;
        padding-bottom: 0px;
        padding-top: 0px;
    }
</style>

  <style>
    @media print{

       a.none{
		   display:none;
	   }
	  hr{
		  margin:0;
	  }

	   body * { visibility: hidden; }
#printarea * { visibility: visible; }
.main-footer * { visibility: visible; }
    }
</style>



<div id="printarea" class="blue result" style="padding:20px;text-align:left;width:96%;margin-left:2%;margin-right: 2%;background-color: white;height: auto;float: left">
<a class="none" style="cursor: pointer;font-size: 36px; margin-top:-25px" id='btn'>Print</a>

<div style="width: 100%;margin-top: 0px;min-height:930px;">
  <div>
  <center><p style="text-align:right;font-size:18px">সদস্য নং :  <?php echo $loan_member_info->member_no; ?></p></center>
  <center><p>বিসমিল্লাহির রাহমানির রাহীম</p></center>
  <center><h3 style="margin-top:-5px"> শ্রমকল্যাণ সঞ্চয় ও ঋণদান সমবায় সমিতি লি :  </h3></center>
   <center><p>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার অনুমোদিত সমবায় ভিত্তিক একটি আর্থিক প্রতিষ্ঠান </p></center>

  <center><p>মধুখালী  বাজার, মধুখালী , ফরিদপুর ।</p></center>
  <center><p>রেজি নং  : ৪৫  স্থাপিত  :   ২০১৬</p></center>
  </div>

  <div style="width:100%;float:left">
  <div style="width:30%;float:left">
  &nbsp;
  </div>
  <div style="width:40%;float:left;">
  <center><b>ঋণের আবেদন  পত্র </b></center>
  </div>



  <div style="width:100%;float:left">
  <p>বরাবর ,</p>

  <div style="width:100%;float:left">
  <p>সভাপতি</p>
  <p> শ্রমকল্যাণ সঞ্চয় ও ঋণদান সমবায় সমিতি লি :  </p>
  <p> মধুখালী , ফরিদপুর ।  </p>
  </div>

  <div style="width:100%;float:left">
  <p> ১. আমি  : <?php echo $loan_member_info->name .' '.','.' '; ?>
      পিতা  : <?php echo $loan_member_info->father_name .' '.','.' '; ?>
     মাতা : <?php echo $loan_member_info->mother_name .' '.','.' '; ?>
    <?php if($loan_member_info->husband_name){echo ' স্বামী :  '. $loan_member_info->husband_name .' ';} ; ?>
  আমার  এন আই ডি / জন্ম সনদ :  <?php echo $loan_member_info->nid_no .' '.','.' '; ?>
  পেশা:  <?php echo $loan_member_info->pesha .' '.'','. '; ?>
 মোবাইল :  <?php echo $loan_member_info->mobile_no .' '.','.' '; ?>
 বয়স :  <?php echo $loan_member_info->age .' '.' '; ?>
   </p>

   <p> ২. বর্তমান ঠিকানা   : <br>
   গ্রাম : <?php echo $loan_member_info->pa_gram .' '.','.' '; ?>
   ডাক : <?php echo $loan_member_info->pa_dak .' '.','.' '; ?>
   উপজেলা : <?php echo $loan_member_info->pa_upojela .' '.','.' '; ?>
   জেলা : <?php echo $loan_member_info->pa_jela .' '.' '; ?>
   </p>

   <p> ৩ . স্থায়ী ঠিকানা   : <br>
   গ্রাম : <?php echo $loan_member_info->pra_gram .' '.','.' '; ?>
   ডাক : <?php echo $loan_member_info->pra_dak .' '.','.' '; ?>
   উপজেলা :<?php echo $loan_member_info->pra_upojela .' '.','.' '; ?>
   জেলা :<?php echo $loan_member_info->pra_jela .' '.' '; ?>
   </p>

   <p> ৪ . (  ক )  ঋণের পরিমাণ   :<?php echo $loan_member_info->approved_loan_amount .' '.' '; ?>
   কথায় : <?php echo $loan_member_info->kothai .' '.' '; ?>
  (  খ ) সারভিচ চার্জ :<?php echo $loan_member_info->service_charge .' '.' '; ?>
  (  গ ) মোট প্রদেয় :<?php echo $loan_member_info->approved_loan_amount + $loan_member_info->service_charge .' '.' '; ?>
  ( ঘ ) কিস্তির ধরন :

  <?php
     if($loan_member_info->deposit_type==1){
	  echo 'Daily' .' '.' ';
	  }

	  if($loan_member_info->deposit_type==7){
	  echo 'Weekly' .' '.' ';
	  }
	  if($loan_member_info->deposit_type==15){
	  echo '15 Days After' .' '.' ';
	  }
	  if($loan_member_info->deposit_type==30){
	  echo '1 Month After' .' '.' ';
	  }
	  if($loan_member_info->deposit_type==90){
	  echo '3 Month After' .' '.' ';
	  }
	  if($loan_member_info->deposit_type==180){
	  echo '6 Month After' .' '.' ';
	  }
	  if($loan_member_info->deposit_type==365){
	  echo '1 Years After' .' '.' ';
	  }
  ?>

(  ঙ )  কিস্তির পরিমানঃ <?php echo $loan_member_info->kistir_poriman .' '.' '; ?>
( চ ) বিতরনের তারিখঃ<?php echo $loan_member_info->disburse_date .' '.' '; ?>
( ছ ) কিস্তির সংখাঃ<?php echo $loan_member_info->total_installment .' '.' '; ?>
   </p>

  <p>
  ৫ ।  ক )  আমি এই মর্মে অঙ্গিকার করিতেছি যে , উপরোক্ত ঋণের টাকা নিজ হাতে নগদ / চেক মারফত  <?php echo $loan_member_info->grohon_date .' '.' '; ?>
  তারিখে গ্রহন করিয়াছি  । এবং <?php echo $loan_member_info->installment_start_date .' '.' '; ?> তারিখ হইতে কিস্তি প্রদান করতে বাধ্য থাকিব ।
 <br>
 খ ) আমি এই মর্মে আরও অঙ্গিকার করিতেছি যে , গৃহীত অর্থ সঠিক উদ্দেশ্যে বিনিয়োগ করিব এবং সঠিক সময়ে ঋণের টাকা পরিশোধ করিব । পরিশোধে কোন প্রকার ব্যর্থ হলে আসল এবং সার্ভিস চার্জ সমুদয় টাকা প্রতিষ্ঠান চাহিবানাত্র পরিশোধ করিতে বাধ্য থাকিব । অন্যথায় প্রতিষ্ঠান যে কোন ব্যবস্থা নিলে তা মানিয়া  নিব ।
 <br>
 গ )  আমি স্বনির্ভর হওয়ার লক্ষে সমিতির নির্ধারিত হার অনুযায়ী সঞ্চয় করিব ।
<br>
ঘ ) ঋণের টাকা পরিশোধ না হওয়া পর্যন্ত সঞ্চয়ের টাকা ফেরত কিংবা সঞ্চয় কর্তন করে কিস্তি সমন্বয় করিব না এবং রিন পরিশোধ না  হওয়া পর্যন্ত নিয়মিত সঞ্চ্য দিতে বাধ্য থাকিব ।

 </p>
 <div style="width:60%;float:left">
 <p>
 ৬ ।  ( ক ) প্রথম জামিনদারের স্বাক্ষরঃ
<br>
নামঃ <?php echo $loan_member_info->jamindar_name_one .' '.' '; ?>
<br>
সম্পর্কঃ<?php echo $loan_member_info->relation_one .' '.' '; ?>
<br>
( খ ) দ্বীতীয় জামিনদারের স্বাক্ষরঃ
নামঃ<?php echo $loan_member_info->jamindar_name_two .' '.' '; ?>
<br>
সম্পর্কঃ<?php echo $loan_member_info->relation_two .' '.' '; ?>
 </p>
 </div>
 <div style="width:40%;float:left">
 <p>উপরোক্ত শর্ত মানিয়া স্বাক্ষর করিলাম
 <br>
 <?php echo $loan_member_info->name .' '.' '; ?>
 </p>
 <p>............................................................................</p>
 </div>


 <div style="float:left;width: 60%">
 <p>মাঠ সংগঠকের  স্বাক্ষরঃ  </p>
 <p>...................................</p>
 </div>
 <div style="width:40%;float:left">
 <p>............................................................................</p>
 <center>সভাপতির স্বাক্ষর ও সীল</center>

 </div>


 </div>
  </div>

  </div>



</div>
<br>
