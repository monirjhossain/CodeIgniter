<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Super_admin_model extends CI_Model {
	public function cash_out_gold_collection($data) {
	        $this->db->insert('sk_depositor_collection_by_account_open', $data);
	    }
	public function save_gold_colection($data) {
		 $is_exits = $this->db->query("SELECT * FROM `sk_depositor_collection_by_account_open` WHERE `collected_date` = '{$data['collected_date']}' AND `accountId` = '{$data['accountId']}' ");

        if ($is_exits->result()) {
            return true;
        } else {
            $this->db->insert('sk_depositor_collection_by_account_open', $data);
            return true;
        }

    }

 public function saveBatchGoldCollectionDateWise($data) {
        $is_exits = $this->db->query("SELECT * FROM `sk_depositor_collection_by_account_open` WHERE `collected_date` = '{$data['collected_date']}' AND `accountId` = '{$data['accountId']}' ");

        if ($is_exits->result()) {
            return true;
        } else {
            $this->db->insert('sk_depositor_collection_by_account_open', $data);
            return true;
        }
    }
public function selectAllGoldCollection($collected_date){
        $this->db->select('*');
        $this->db->from('sk_depositor_collection_by_account_open');
				$this->db->join('sk_depositor_account_open', 'sk_depositor_account_open.account_id=sk_depositor_collection_by_account_open.accountId','left');
				$this->db->join('sk_dipositor_member', 'sk_dipositor_member.member_no=sk_depositor_account_open.memberId','left');
				$this->db->join('tbl_admin', 'tbl_admin.admin_id=sk_depositor_collection_by_account_open.collected_by','left');
        $this->db->where('collected_date', $collected_date);
        $query_result = $this->db->get();
	    	$result = $query_result->result();
        return $result;
    }
public function selectAllGoldCollectionDateToDate($date1,$date2){
        $this->db->select('*');
        $this->db->from('sk_depositor_collection_by_account_open');
				$this->db->join('sk_depositor_account_open', 'sk_depositor_account_open.account_id=sk_depositor_collection_by_account_open.accountId','left');
				$this->db->join('sk_dipositor_member', 'sk_dipositor_member.member_no=sk_depositor_account_open.memberId','left');
				$this->db->where('collected_date >=', $date1);
				$this->db->where('collected_date <=', $date2);
		   	$query_result = $this->db->get();
	    	$result = $query_result->result();
        return $result;
    }

public function selectSingleMemberAllGoldCollectionDateToDate($date1,$date2,$accountId){
      $this->db->select('*');
      $this->db->from('sk_depositor_collection_by_account_open');
			$this->db->join('sk_depositor_account_open', 'sk_depositor_account_open.account_id=sk_depositor_collection_by_account_open.accountId','left');
			$this->db->join('sk_dipositor_member', 'sk_dipositor_member.member_no=sk_depositor_account_open.memberId','left');
			$this->db->where('collected_date >=', $date1);
			$this->db->where('collected_date <=', $date2);
			$this->db->where('accountId', $accountId);
      $this->db->order_by('collected_date','ASC');

	   	$query_result = $this->db->get();
    	$result = $query_result->result();
      return $result;
  }

public function selectCollectedByAllGoldCollectionDateToDate($date1,$date2,$userId){
      $this->db->select('*');
      $this->db->from('sk_depositor_collection_by_account_open');
			$this->db->join('sk_depositor_account_open', 'sk_depositor_account_open.account_id=sk_depositor_collection_by_account_open.accountId','left');
			$this->db->join('sk_dipositor_member', 'sk_dipositor_member.member_no=sk_depositor_account_open.memberId','left');
			$this->db->where('collected_date >=', $date1);
			$this->db->where('collected_date <=', $date2);
			$this->db->where('collected_by', $userId);
      $this->db->order_by('collected_date','ASC');

	   	$query_result = $this->db->get();
    	$result = $query_result->result();
      return $result;
  }
public function sumOfTotalGoldCollectionBetweenTwoDate($date1,$date2){
        $this->db->select_sum('collected_money');
        $this->db->from('sk_depositor_collection_by_account_open');
        $this->db->where('collected_date >=', $date1);
				$this->db->where('collected_date <=', $date2);
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }

public function sumOfTotalSingleGoldCollectionBetweenTwoDate($date1,$date2,$accountId){
        $this->db->select_sum('collected_money');
        $this->db->from('sk_depositor_collection_by_account_open');
        $this->db->where('collected_date >=', $date1);
				$this->db->where('collected_date <=', $date2);
				$this->db->where('accountId', $accountId);
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }
public function sumOfTotalCollectedByGoldCollectionBetweenTwoDate($date1,$date2,$userId){

				$this->db->select_sum('collected_money');
        $this->db->from('sk_depositor_collection_by_account_open');
        $this->db->where('collected_date >=', $date1);
				$this->db->where('collected_date <=', $date2);
				$this->db->where('collected_by', $userId);
        $query_result = $this->db->get();
	    	$result = $query_result->row();

        return $result;
    }

public function save_employee_info($data) {
        $this->db->insert('tbl_employee', $data);
    }
public function save_depositor_info($data) {
        $this->db->insert('sk_dipositor_member', $data);
    }
public function selectAllActiveGoldAccount(){
        $this->db->select('*');
        $this->db->from('sk_depositor_account_open');
				$this->db->join('sk_dipositor_member', 'sk_dipositor_member.member_no=sk_depositor_account_open.memberId','left');
				$this->db->where('ac_status', 'running');
        $query_result = $this->db->get();
	    	$result = $query_result->result();
        return $result;
    }

  public function selectAccountIdbyCollectionId($collection_id){
        $this->db->select('*');
        $this->db->from('sk_depositor_collection_by_account_open');
				$this->db->join('sk_bank_account', 'sk_bank_account.account_id=sk_depositor_collection_by_account_open.paid_bank_account_id','left');
				$this->db->join('sk_bank', 'sk_bank.bank_id=sk_bank_account.bankId','left');
        $this->db->where('collection_id', $collection_id);
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }


public function deleteGoldCollection($collection_id){
         $this->db->where('collection_id', $collection_id);
         $this->db->delete('sk_depositor_collection_by_account_open');
    }
    public function store_loan_collection($savedData) {
        $this->db->insert('sk_loan_collection', $savedData);
    }
    public function totalUttolonFromSoncoy($loan_id){
        $this->db->select_sum('sc_cash_out');
        $this->db->from('sk_loan_collection');
        $this->db->where('sk_loan_collection.acc_id', $loan_id);
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }
  public function select_sum_loan_collection($loan_id){
        $this->db->select_sum('per_installment_fee');
        $this->db->from('sk_loan_collection');
        $this->db->where('sk_loan_collection.acc_id', $loan_id);
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }
  public function select_soncoy_collection($loan_id){
        $this->db->select_sum('soncoy');
        $this->db->from('sk_loan_collection');
        $this->db->where('sk_loan_collection.acc_id', $loan_id);
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }
    public function select_soncoy_profit_collection($loan_id){
        $this->db->select_sum('sc_profit');
        $this->db->from('sk_loan_collection');
        $this->db->where('sk_loan_collection.acc_id', $loan_id);
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }
    public function select_sum_fine_loan_collection($loan_id){
        $this->db->select_sum('per_installment_fine');
        $this->db->from('sk_loan_collection');
        $this->db->where('sk_loan_collection.acc_id', $loan_id);
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }
    public function slect_loan_collect_info($loan_id){
        $this->db->select('*');
        $this->db->from('sk_loan_collection');
        $this->db->where('sk_loan_collection.acc_id', $loan_id);
        $this->db->order_by('id','ASC');
        $query_result = $this->db->get();
	    	$result = $query_result->result();
        return $result;
    }

public function selectAllEmployee(){
        $this->db->select('*');
        $this->db->from('tbl_employee');
				$this->db->join('tbl_designation', 'tbl_designation.designation_id=tbl_employee.emp_type','left');
				$this->db->join('tbl_department', 'tbl_department.department_id=tbl_designation.departmentId','left');
				$this->db->join('tbl_project', 'tbl_project.project_id=tbl_employee.projectId','left');
				$this->db->where('project_id',1);
				$query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
public function selectAllDepositorInfo(){
        $this->db->select('*');
        $this->db->from('sk_dipositor_member');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

public function selectAllDepositorAcInfo(){
        $this->db->select('*');
				$this->db->from('sk_depositor_account_open');
				$this->db->join('sk_dipositor_member', 'sk_dipositor_member.member_no=sk_depositor_account_open.memberId','left');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

public function select_depositor_info_by_id($depositor_id){
        $this->db->select('*');
        $this->db->from('sk_dipositor_member');
        $this->db->where('sk_dipositor_member.depositor_id', $depositor_id);
				$this->db->join('tbl_employee', 'tbl_employee.emp_id=sk_dipositor_member.field_officer','left');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

public function selectMaximumMemberNo(){
        $this->db->select_max('member_no');
        $this->db->from('sk_dipositor_member');
	    	$query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
public function selectMaximumMemberNoLoan(){
        $this->db->select_max('member_no');
        $this->db->from('sk_loan_member');
	    	$query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
public function updateDepositorInfoById($savedData, $depositor_id) {
        $this->db->where('depositor_id', $depositor_id);
        $this->db->update('sk_dipositor_member', $savedData);
    }

public function selectEmployeeById($emp_id){
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('emp_id', $emp_id);
				$this->db->join('tbl_designation', 'tbl_designation.designation_id=tbl_employee.emp_type','left');
				$this->db->join('tbl_department', 'tbl_department.department_id=tbl_designation.departmentId','left');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

	public function selectAllDepositAccountInfo(){
        $this->db->select('*');
        $this->db->from('sk_depositor_account_open');
				$this->db->join('sk_dipositor_member', 'sk_dipositor_member.member_no=sk_depositor_account_open.memberId','left');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

	public function selectMaxDepositAccountNo(){
        $this->db->select_max('account_no');
        $this->db->from('sk_depositor_account_open');
	    	$query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

	public function save_depositor_acccount_info($data) {
        $this->db->insert('sk_depositor_account_open', $data);
    }

	public function update_depositor_acccount_info($savedData, $account_id) {
        $this->db->where('account_id', $account_id);
        $this->db->update('sk_depositor_account_open', $savedData);
    }

	public function update_gold_colection($savedData, $collection_id) {
        $this->db->where('collection_id', $collection_id);
        $this->db->update('sk_depositor_collection_by_account_open', $savedData);
    }


	public function selectAllDepositorTodayCollection($today) {
        $this->db->select('*');
        $this->db->from('sk_depositor_collection_by_account_open');
				$this->db->join('sk_depositor_account_open', 'sk_depositor_account_open.account_id=sk_depositor_collection_by_account_open.accountId','left');
	    	$this->db->join('sk_dipositor_member', 'sk_dipositor_member.member_no=sk_depositor_account_open.memberId','left');
				$this->db->where('collected_date', $today);
				$this->db->order_by('accountId','ASC');
	    	$query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

public function selectAllTodayLoanCollection($today) {
        $this->db->select('*');
        $this->db->from('sk_loan_collection');
				$this->db->join('sk_loan_account', 'sk_loan_account.loan_id=sk_loan_collection.acc_id','left');
	    	$this->db->join('sk_loan_member', 'sk_loan_member.loan_member_id=sk_loan_account.loanMemberId','left');
				$this->db->where('today', $today);
				$this->db->order_by('acc_id','ASC');
	    	$query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

	public function saveHolyDay($data) {
        $this->db->insert('sk_govt_holy_day_calender', $data);
    }
	public function updateHolyDay($savedData,$date_id) {
        $this->db->where('date_id', $date_id);
        $this->db->update('sk_govt_holy_day_calender', $savedData);
    }
	public function selectAllHolyDay(){
        $this->db->select('*');
        $this->db->from('sk_govt_holy_day_calender');
				$this->db->order_by('date','ASC');
	    	$query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
	public function selectAllHolyDayInfoById($date_id){
        $this->db->select('*');
        $this->db->from('sk_govt_holy_day_calender');
		 		$this->db->where('sk_govt_holy_day_calender.date_id', $date_id);
	    	$query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
	public function collectionListByAccountId($account_id){
        $this->db->select('*');
        $this->db->from('sk_depositor_collection_by_account_open');
        $this->db->where('sk_depositor_collection_by_account_open.accountId', $account_id);
        $this->db->order_by('collected_date','ASC');
				$query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
	public function selectAcInfoByACId($account_id){
        $this->db->select('*');
        $this->db->from('sk_depositor_account_open');
        $this->db->where('sk_depositor_account_open.account_id', $account_id);
				$query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
	public function selectAcHolderInfoByACId($memberId){
        $this->db->select('*');
        $this->db->from('sk_dipositor_member');
        $this->db->where('sk_dipositor_member.member_no', $memberId);
				$query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }



	public function slectDataByColletionId($collection_id){
        $this->db->select('*');
        $this->db->from('sk_depositor_collection_by_account_open');
        $this->db->where('sk_depositor_collection_by_account_open.collection_id', $collection_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
	public function totalCollectionByAccountId($account_id){
        $this->db->select_sum('collected_money');
        $this->db->from('sk_depositor_collection_by_account_open');
        $this->db->where('sk_depositor_collection_by_account_open.accountId', $account_id);
        $query_result = $this->db->get();

	    $result = $query_result->row();
        return $result;
    }

public function totalCollectionByAccountIdToday($today){
        $this->db->select_sum('collected_money');
        $this->db->from('sk_depositor_collection_by_account_open');
        $this->db->where('sk_depositor_collection_by_account_open.collected_date', $today);
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }
public function totalUttolonByAccountIdToday($today){
        $this->db->select_sum('uttolon_money');
        $this->db->from('sk_depositor_collection_by_account_open');
        $this->db->where('sk_depositor_collection_by_account_open.collected_date', $today);
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }
	public function totalUttolonByAccountId($account_id){
        $this->db->select_sum('uttolon_money');
        $this->db->from('sk_depositor_collection_by_account_open');
        $this->db->where('sk_depositor_collection_by_account_open.accountId', $account_id);
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }
	public function totalProfitByAccountId($account_id){
        $this->db->select_sum('profit');
        $this->db->from('sk_depositor_collection_by_account_open');
        $this->db->where('sk_depositor_collection_by_account_open.accountId', $account_id);
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }
    public function delete_depositor_info_by_id($depositor_id){
         $this->db->where('depositor_id', $depositor_id);
         $this->db->delete('sk_dipositor_member');
    }

public function selectAllLoanMember(){
        $this->db->select('*');
        $this->db->from('sk_loan_member');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function updateEmpByUserId($savedData, $emp_id) {
        $this->db->where('emp_id', $emp_id);
        $this->db->update('tbl_employee', $savedData);
    }


public function save_loanMember_info($data) {
        $this->db->insert('sk_loan_member', $data);
    }

public function select_loan_member_info_by_id($loan_id) {
        $this->db->select('*');
        $this->db->from('sk_loan_account');
				$this->db->join('sk_loan_member', 'sk_loan_member.loan_member_id=sk_loan_account.loanMemberId','left');
        $this->db->where('sk_loan_account.loan_id', $loan_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
public function select_loan_member_info_by_member_id($loan_member_id) {
		        $this->db->select('*');
		        $this->db->from('sk_loan_member');
					  $this->db->where('loan_member_id', $loan_member_id);
		        $query_result = $this->db->get();
		        $result = $query_result->row();
		        return $result;
		    }
	public function updateLoanMemberById($savedData, $loan_member_id) {
        $this->db->where('loan_member_id', $loan_member_id);
        $this->db->update('sk_loan_member', $savedData);
    }


	public function deleteLoanMemberInfo($loan_member_id){
         $this->db->where('loan_member_id', $loan_member_id);
         $this->db->delete('sk_loan_member');
    }




	public function selectAllLoanAccountInfo(){
        $this->db->select('*');
        $this->db->from('sk_loan_account');
				$this->db->join('sk_loan_member', 'sk_loan_member.loan_member_id=sk_loan_account.loanMemberId','left');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

	public function selectMaxLoanAccountNo(){
        $this->db->select_max('loan_account');
        $this->db->from('sk_loan_account');
	    	$query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }


	public function save_loan_acccount_info($data) {
        $this->db->insert('sk_loan_account', $data);
    }
	public function selectLoanAcInfoByACId($loan_id){
        $this->db->select('*');
        $this->db->from('sk_loan_account');
        $this->db->where('sk_loan_account.loan_id', $loan_id);
				$query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
	 public function selectLoanInfoById($loan_id){
        $this->db->select('*');
        $this->db->from('sk_loan_account');
        $this->db->where('sk_loan_account.loan_id', $loan_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

	public function selectLoanAcHolderInfoByACId($loan_member){
        $this->db->select('*');
        $this->db->from('sk_loan_member');
        $this->db->where('sk_loan_member.loan_member_id', $loan_member);
				$query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

	public function update_loan_acccount_info($savedData, $loan_id) {
        $this->db->where('loan_id', $loan_id);
        $this->db->update('sk_loan_account', $savedData);
    }

public function save_adminUser_info($data) {
        $this->db->insert('tbl_admin', $data);
    }
    public function updateUserByUserId($savedData, $admin_id) {
        $this->db->where('admin_id', $admin_id);
        $this->db->update('tbl_admin', $savedData);
    }

	 public function selectUserByUserId($userId){
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('tbl_admin.admin_id', $userId);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }


    public function sessionUserDetails($sessionUser) {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('tbl_admin.admin_id', $sessionUser);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function select_user_info_by_id($userId) {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_id', $userId);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }


     public function selectAllUser() {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }
		public function selectAllGoldCollectedBy() {
			 $this->db->select('*');
			 $this->db->from('tbl_admin');
			 $query_result = $this->db->get();
			 $result = $query_result->result();

			 return $result;
	 }
public function save_voucher_cat_info($data) {
        $this->db->insert('tbl_voucher_category', $data);
    }

 public function selectAllVoucherCategory() {
        $this->db->select('*');
        $this->db->from('tbl_voucher_category');
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }
public function selectVoucherCatByCatId($voucher_cat_id){
        $this->db->select('*');
        $this->db->from('tbl_voucher_category');
        $this->db->where('tbl_voucher_category.voucher_cat_id', $voucher_cat_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
public function updateVoucherCategoryById($savedData, $voucher_cat_id) {
        $this->db->where('voucher_cat_id', $voucher_cat_id);
        $this->db->update('tbl_voucher_category', $savedData);
    }
	public function save_asset_cat_info($data) {
        $this->db->insert('tbl_asset_category',$data);
    }
	public function selectAllAssetCategory() {
        $this->db->select('*');
        $this->db->from('tbl_asset_category');
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }
	 public function selectAssetCatByCatId($asset_category_id){
        $this->db->select('*');
        $this->db->from('tbl_asset_category');
        $this->db->where('tbl_asset_category.asset_category_id', $asset_category_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
	public function updateAssetCategoryById($savedData, $asset_category_id) {
        $this->db->where('asset_category_id', $asset_category_id);
        $this->db->update('tbl_asset_category', $savedData);
    }

	public function selectAllGoldCashBookCollection() {
        $this->db->select('*');
        $this->db->from('sk_depositor_collection_by_account_open');
				$this->db->join('sk_depositor_account_open', 'sk_depositor_account_open.account_id=sk_depositor_collection_by_account_open.accountId','left');
	    	$this->db->join('sk_dipositor_member', 'sk_dipositor_member.member_no=sk_depositor_account_open.memberId','left');
				$this->db->order_by('collected_date','DESC');
	    	$query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

	public function selectAllLoanCashBookCollection() {
        $this->db->select('*');
        $this->db->from('sk_loan_collection');
				$this->db->join('sk_loan_account', 'sk_loan_account.loan_id=sk_loan_collection.acc_id','left');
	    	$this->db->join('sk_loan_member', 'sk_loan_member.member_no=sk_loan_account.loan_member','left');
				$this->db->order_by('today','DESC');
	    	$query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

	public function selectAllpaidLoanCashBookCollection() {
        $this->db->select('*');
        $this->db->from('sk_loan_account');
	    	$this->db->join('sk_loan_member', 'sk_loan_member.member_no=sk_loan_account.loan_member','left');
				$this->db->order_by('disburse_date','DESC');
	    	$query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

	public function selectsumOfgoldCollection(){
        $this->db->select_sum('collected_money');
        $this->db->from('sk_depositor_collection_by_account_open');
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }

	public function selectsumOfgoldUttolon(){
        $this->db->select_sum('uttolon_money');
        $this->db->from('sk_depositor_collection_by_account_open');
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }

	public function selectsumOfLoanCollection(){
        $this->db->select_sum('per_installment_fee');
        $this->db->from('sk_loan_collection');
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }
	public function selectsumOfLoanSoncoyCollection(){
        $this->db->select_sum('soncoy');
        $this->db->from('sk_loan_collection');
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }
	public function selectsumOfLoanSoncoyUttolon(){
        $this->db->select_sum('sc_cash_out');
        $this->db->from('sk_loan_collection');
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }

	public function selectsumOfLoanPaid(){
        $this->db->select_sum('approved_loan_amount');
        $this->db->from('sk_loan_account');
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }

	public function save_asset_info($data) {
        $this->db->insert('sk_asset', $data);
    }
	public function selectAllAsset() {
        $this->db->select('*');
        $this->db->from('sk_asset');
				$this->db->join('tbl_asset_category', 'tbl_asset_category.asset_category_id=sk_asset.asset_cat_id','left');
				$this->db->order_by('date','DESC');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

	public function selectsumOfassetAmount(){
        $this->db->select_sum('cost');
        $this->db->from('sk_asset');
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }

	public function save_voucher_info($data) {
        $this->db->insert('sk_voucher', $data);
    }
	public function selectAllVoucher() {
        $this->db->select('*');
        $this->db->from('sk_voucher');
				$this->db->join('tbl_voucher_category', 'tbl_voucher_category.voucher_cat_id=sk_voucher.voucher_category_id','left');
				$this->db->order_by('voucher_date','DESC');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

	public function selectSumOfAmountCreditVoucher(){
        $this->db->select_sum('voucher_money');
        $this->db->from('sk_voucher');
				$this->db->join('tbl_voucher_category', 'tbl_voucher_category.voucher_cat_id=sk_voucher.voucher_category_id','left');
				$this->db->order_by('voucher_date','DESC');
				$this->db->where('voucher_type', 'credit');
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }

	public function selectSumOfAmountDebitVoucher(){
        $this->db->select_sum('voucher_money');
        $this->db->from('sk_voucher');
				$this->db->join('tbl_voucher_category', 'tbl_voucher_category.voucher_cat_id=sk_voucher.voucher_category_id','left');
				$this->db->order_by('voucher_date','DESC');
				$this->db->where('voucher_type', 'debit');
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }

	public function selectAllDebitVoucher() {
        $this->db->select('*');
        $this->db->from('sk_voucher');
				$this->db->join('tbl_voucher_category', 'tbl_voucher_category.voucher_cat_id=sk_voucher.voucher_category_id','left');
				$this->db->order_by('voucher_date','DESC');
				$this->db->where('voucher_type', 'debit');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
	public function selectAllCreditVoucher() {
        $this->db->select('*');
        $this->db->from('sk_voucher');
				$this->db->join('tbl_voucher_category', 'tbl_voucher_category.voucher_cat_id=sk_voucher.voucher_category_id','left');
				$this->db->order_by('voucher_date','DESC');
				$this->db->where('voucher_type', 'credit');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

	public function selectAllGoldCollectionCashReport($date1,$date2) {
        $this->db->select('*');
        $this->db->from('sk_depositor_collection_by_account_open');
				$this->db->join('sk_depositor_account_open', 'sk_depositor_account_open.account_id=sk_depositor_collection_by_account_open.accountId','left');
	    	$this->db->join('sk_dipositor_member', 'sk_dipositor_member.member_no=sk_depositor_account_open.memberId','left');
				$this->db->where('collected_date >=', $date1);
				$this->db->where('collected_date <=', $date2);
				$this->db->order_by('collected_date','DESC');
	    	$query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

	public function selectAllLoanReport($date1,$date2) {
        $this->db->select('*');
        $this->db->from('sk_loan_collection');
				$this->db->join('sk_loan_account', 'sk_loan_account.loan_id=sk_loan_collection.acc_id','left');
	    	$this->db->join('sk_loan_member', 'sk_loan_member.member_no=sk_loan_account.loan_member','left');
				$this->db->where('today >=', $date1);
				$this->db->where('today <=', $date2);
				$this->db->order_by('today','DESC');
	    	$query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }


	public function selectAllDebitVoucherReport($date1,$date2) {
        $this->db->select('*');
        $this->db->from('sk_voucher');
				$this->db->join('tbl_voucher_category', 'tbl_voucher_category.voucher_cat_id=sk_voucher.voucher_category_id','left');
				$this->db->where('voucher_date >=', $date1);
				$this->db->where('voucher_date <=', $date2);
				$this->db->where('voucher_type', 'debit');
				$this->db->order_by('voucher_date','DESC');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

	public function selectAllpaidLoanCashReport($date1,$date2) {
        $this->db->select('*');
        $this->db->from('sk_loan_account');
	    	$this->db->join('sk_loan_member', 'sk_loan_member.member_no=sk_loan_account.loan_member','left');
				$this->db->where('disburse_date >=', $date1);
				$this->db->where('disburse_date <=', $date2);
				$this->db->order_by('disburse_date','DESC');
	    	$query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
	public function selectAllAssetReport($date1,$date2) {
        $this->db->select('*');
        $this->db->from('sk_asset');
				$this->db->join('tbl_asset_category', 'tbl_asset_category.asset_category_id=sk_asset.asset_cat_id','left');
				$this->db->where('date >=', $date1);
				$this->db->where('date <=', $date2);
				$this->db->order_by('date','DESC');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

	public function selectAllCreditVoucherReport($date1,$date2) {
        $this->db->select('*');
        $this->db->from('sk_voucher');
				$this->db->join('tbl_voucher_category', 'tbl_voucher_category.voucher_cat_id=sk_voucher.voucher_category_id','left');

				$this->db->where('voucher_date >=', $date1);
				$this->db->where('voucher_date <=', $date2);
				$this->db->where('voucher_type', 'credit');
				$this->db->order_by('voucher_date','DESC');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
	public function selectsumOfgoldCollectionReport($date1,$date2){
        $this->db->select_sum('collected_money');
        $this->db->from('sk_depositor_collection_by_account_open');
				$this->db->where('collected_date >=', $date1);
				$this->db->where('collected_date <=', $date2);
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }
		public function selectsumOfLoanCollectionReport($date1,$date2){
        $this->db->select_sum('per_installment_fee');
        $this->db->from('sk_loan_collection');
				$this->db->where('today >=', $date1);
				$this->db->where('today <=', $date2);
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }
	public function selectsumOfLoanSoncoyCollectionReport($date1,$date2){
        $this->db->select_sum('soncoy');
        $this->db->from('sk_loan_collection');
				$this->db->where('today >=', $date1);
				$this->db->where('today <=', $date2);
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }
	public function selectsumOfgoldUttolonReport($date1,$date2){
        $this->db->select_sum('uttolon_money');
        $this->db->from('sk_depositor_collection_by_account_open');
				$this->db->where('collected_date >=', $date1);
				$this->db->where('collected_date <=', $date2);
        $query_result = $this->db->get();
		    $result = $query_result->row();
        return $result;
    }
	public function selectsumOfLoanSoncoyUttolonReport($date1,$date2){
        $this->db->select_sum('sc_cash_out');
        $this->db->from('sk_loan_collection');
				$this->db->where('today >=', $date1);
				$this->db->where('today <=', $date2);
        $query_result = $this->db->get();
		    $result = $query_result->row();
        return $result;
    }
	public function selectsumOfLoanPaidReportReport($date1,$date2){
        $this->db->select_sum('approved_loan_amount');
        $this->db->from('sk_loan_account');
				$this->db->where('disburse_date >=', $date1);
				$this->db->where('disburse_date <=', $date2);
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }
	public function selectsumOfassetAmountReport($date1,$date2){
        $this->db->select_sum('cost');
        $this->db->from('sk_asset');
				$this->db->where('date >=', $date1);
				$this->db->where('date <=', $date2);
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }
	public function selectSumOfAmountCreditVoucherReport($date1,$date2){
        $this->db->select_sum('voucher_money');
        $this->db->from('sk_voucher');
				$this->db->join('tbl_voucher_category', 'tbl_voucher_category.voucher_cat_id=sk_voucher.voucher_category_id','left');
				$this->db->where('voucher_date >=', $date1);
				$this->db->where('voucher_date <=', $date2);
				$this->db->order_by('voucher_date','DESC');
				$this->db->where('voucher_type', 'credit');
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }

public function selectSumOfAmountDebitVoucherReport($date1,$date2){
        $this->db->select_sum('voucher_money');
        $this->db->from('sk_voucher');
				$this->db->join('tbl_voucher_category', 'tbl_voucher_category.voucher_cat_id=sk_voucher.voucher_category_id','left');
				$this->db->where('voucher_date >=', $date1);
				$this->db->where('voucher_date <=', $date2);
				$this->db->order_by('voucher_date','DESC');
				$this->db->where('voucher_type', 'debit');
        $query_result = $this->db->get();
	    	$result = $query_result->row();
        return $result;
    }
public function selectAllVoucherLedgerReportByCategory($date1,$date2,$voucher_cat_id) {
      $this->db->select('*');
      $this->db->from('sk_voucher');
			$this->db->join('tbl_voucher_category', 'tbl_voucher_category.voucher_cat_id=sk_voucher.voucher_category_id','left');
			$this->db->where('voucher_date >=', $date1);
			$this->db->where('voucher_date <=', $date2);
			$this->db->where('sk_voucher.voucher_category_id', $voucher_cat_id);
			$this->db->order_by('voucher_date','DESC');
      $query_result = $this->db->get();
      $result = $query_result->result();
      return $result;
	    }
public function selectSumOfAmountVoucherLedgerReport($date1,$date2, $voucher_cat_id){
			$this->db->select_sum('voucher_money');
			$this->db->from('sk_voucher');
			$this->db->join('tbl_voucher_category', 'tbl_voucher_category.voucher_cat_id=sk_voucher.voucher_category_id','left');
			$this->db->where('voucher_date >=', $date1);
			$this->db->where('voucher_date <=', $date2);
			$this->db->order_by('voucher_date','DESC');
			$this->db->where('sk_voucher.voucher_category_id', $voucher_cat_id);
			$query_result = $this->db->get();
			$result = $query_result->row();
			return $result;
				}

public function selectAllAssetLedgerReportByCategory($date1,$date2,$asset_category_id) {
      $this->db->select('*');
      $this->db->from('sk_asset');
			$this->db->join('tbl_asset_category', 'tbl_asset_category.asset_category_id=sk_asset.asset_cat_id','left');
			$this->db->where('date >=', $date1);
			$this->db->where('date <=', $date2);
			$this->db->where('sk_asset.asset_cat_id', $asset_category_id);
			$this->db->order_by('date','DESC');
      $query_result = $this->db->get();
      $result = $query_result->result();
      return $result;
			}
public function selectSumOfAmountAssetLedgerReport($date1,$date2, $asset_category_id){
			$this->db->select_sum('cost');
			$this->db->from('sk_asset');
			$this->db->join('tbl_asset_category', 'tbl_asset_category.asset_category_id=sk_asset.asset_cat_id','left');
			$this->db->where('date >=', $date1);
			$this->db->where('date <=', $date2);
			$this->db->where('sk_asset.asset_cat_id', $asset_category_id);
			$this->db->order_by('date','DESC');
			$query_result = $this->db->get();
			$result = $query_result->row();
			return $result;
		}
	public function selectAllDesignation(){
      $this->db->select('*');
      $this->db->from('tbl_designation');
	  	$this->db->join('tbl_department', 'tbl_department.department_id=tbl_designation.departmentId','left');
      $query_result = $this->db->get();
      $result = $query_result->result();
      return $result;
	 		}
public function save_designation_info($data) {
	         $this->db->insert('tbl_designation', $data);
	     }
public function selectAllDepartment(){
     $this->db->select('*');
     $this->db->from('tbl_department');
     $query_result = $this->db->get();
     $result = $query_result->result();
     return $result;
			}
public function save_department_info($data) {
		 $this->db->insert('tbl_department', $data);
		}
public function selectAllproject(){
				$this->db->select('*');
				$this->db->from('tbl_project');
				$query_result = $this->db->get();
				$result = $query_result->result();
				return $result;
	 }
public function save_project_info($data) {
	 		 $this->db->insert('tbl_project', $data);
	 		}
public function save_salary_voucher_info($data) {
		        $this->db->insert('tbl_salary_voucher', $data);
		    }
public function selectAllsalaryVoucher() {
			$this->db->select('*');
			$this->db->from('tbl_salary_voucher');
			$this->db->join('tbl_employee', 'tbl_employee.emp_id=tbl_salary_voucher.employee_id','left');
			$this->db->join('tbl_designation', 'tbl_designation.designation_id=tbl_employee.emp_type','left');
			$this->db->join('tbl_department', 'tbl_department.department_id=tbl_designation.departmentId','left');
			$this->db->join('tbl_project', 'tbl_project.project_id=tbl_employee.projectId','left');
			$this->db->where('project_id',1);

			$this->db->order_by('svoucher_date','DESC');

			$query_result = $this->db->get();
			$result = $query_result->result();
			return $result;
	}
	public function selectSumOfAmountSalaryVoucher(){
				$this->db->select_sum('svoucher_money');
				$this->db->from('tbl_salary_voucher');
				$this->db->join('tbl_employee', 'tbl_employee.emp_id=tbl_salary_voucher.employee_id','left');
				$this->db->order_by('svoucher_date','DESC');
				$this->db->where('projectId', 1);
				$query_result = $this->db->get();
				$result = $query_result->row();
				return $result;
		}

		public function selectAllsalaryVoucherReport($date1,$date2) {
					$this->db->select('*');
					$this->db->from('tbl_salary_voucher');
					$this->db->join('tbl_employee', 'tbl_employee.emp_id=tbl_salary_voucher.employee_id','left');
					$this->db->join('tbl_designation', 'tbl_designation.designation_id=tbl_employee.emp_type','left');
					$this->db->join('tbl_department', 'tbl_department.department_id=tbl_designation.departmentId','left');
					$this->db->join('tbl_project', 'tbl_project.project_id=tbl_employee.projectId','left');
					$this->db->where('project_id',1);
					$this->db->where('svoucher_date >=', $date1);
					$this->db->where('svoucher_date <=', $date2);
					$this->db->order_by('svoucher_date','DESC');
					$query_result = $this->db->get();
					$result = $query_result->result();
					return $result;
			}
		public function selectSumOfAmountSalaryVoucherReport($date1,$date2){
					$this->db->select_sum('svoucher_money');
					$this->db->from('tbl_salary_voucher');
					$this->db->join('tbl_employee', 'tbl_employee.emp_id=tbl_salary_voucher.employee_id','left');
					$this->db->where('projectId', 1);
					$this->db->where('svoucher_date >=', $date1);
					$this->db->where('svoucher_date <=', $date2);
					$this->db->order_by('svoucher_date','DESC');
					$query_result = $this->db->get();
					$result = $query_result->row();
					return $result;
			}

		public function selectAllsallaryLedgerReportByEmpId($date1,$date2,$emp_id) {
					$this->db->select('*');
					$this->db->from('tbl_salary_voucher');
					$this->db->join('tbl_employee', 'tbl_employee.emp_id=tbl_salary_voucher.employee_id','left');
					$this->db->join('tbl_designation', 'tbl_designation.designation_id=tbl_employee.emp_type','left');
					$this->db->join('tbl_department', 'tbl_department.department_id=tbl_designation.departmentId','left');
					$this->db->join('tbl_project', 'tbl_project.project_id=tbl_employee.projectId','left');
					$this->db->where('project_id',1);
					$this->db->where('emp_id',$emp_id);
					$this->db->where('svoucher_date >=', $date1);
					$this->db->where('svoucher_date <=', $date2);
					$this->db->order_by('svoucher_date','DESC');
					$query_result = $this->db->get();
					$result = $query_result->result();
					return $result;
			}

		public function selectSumOfAmountSalaryVoucherLedgerReport($date1,$date2,$emp_id){
					$this->db->select_sum('svoucher_money');
					$this->db->from('tbl_salary_voucher');
					$this->db->join('tbl_employee', 'tbl_employee.emp_id=tbl_salary_voucher.employee_id','left');
					$this->db->where('projectId', 1);
					$this->db->where('emp_id',$emp_id);
					$this->db->where('svoucher_date >=', $date1);
					$this->db->where('svoucher_date <=', $date2);
					$this->db->order_by('svoucher_date','DESC');
					$query_result = $this->db->get();
					$result = $query_result->row();
					return $result;
			}
			public function selectAllBankAccount(){
							$this->db->select('*');
							$this->db->from('sk_bank_account');
							$this->db->join('sk_bank', 'sk_bank.bank_id=sk_bank_account.bankId','left');
							$query_result = $this->db->get();
							$result = $query_result->result();
							return $result;
					}
			public function selectCollectLoandId($id){
								$this->db->select('*');
								$this->db->from('sk_loan_collection');
								$this->db->where('sk_loan_collection.id', $id);
								$this->db->join('sk_loan_account', 'sk_loan_account.loan_id=sk_loan_collection.acc_id','left');
								$this->db->join('sk_loan_member', 'sk_loan_member.loan_member_id=sk_loan_account.loanMemberId','left');
								$query_result = $this->db->get();
								$result = $query_result->row();
								return $result;
						}
		public function updateLoanCollection($savedData, $id) {
									$this->db->where('id', $id);
									$this->db->update('sk_loan_collection', $savedData);

							}



//Battery Project
		public function selectAllBatteryBrand(){
					$this->db->select('*');
					$this->db->from('battery_brand');
					$query_result = $this->db->get();
					$result = $query_result->result();
					return $result;
			}
		public function selectAllBatteryWareHouse(){
					$this->db->select('*');
					$this->db->from('battery_warehouse');
					$query_result = $this->db->get();
					$result = $query_result->result();
					return $result;
			}
		public function selectAllBatterySupplier(){
					$this->db->select('*');
					$this->db->from('battery_supplier');
					$query_result = $this->db->get();
					$result = $query_result->result();
					return $result;
			}
		public function save_battery_info($data) {
			    $this->db->insert('battery_stock', $data);
		}
		public function selectAllBatteryStock() {
					$this->db->select('*');
					$this->db->from('battery_stock');
					$this->db->join('battery_warehouse', 'battery_warehouse.warehouse_id=battery_stock.wareHouseId','left');
					$this->db->join('battery_brand', 'battery_brand.brand_id=battery_stock.brandId','left');
					$this->db->join('battery_supplier', 'battery_supplier.supplier_id=battery_stock.supplierId','left');
					$this->db->order_by('purchase_date','DESC');
					$query_result = $this->db->get();
					$result = $query_result->result();
					return $result;
			}
		public function select_batteryStock_info_by_id($stock_id){
			        $this->db->select('*');
			        $this->db->from('battery_stock');
							$this->db->join('battery_warehouse', 'battery_warehouse.warehouse_id=battery_stock.wareHouseId','left');
							$this->db->join('battery_brand', 'battery_brand.brand_id=battery_stock.brandId','left');
							$this->db->join('battery_supplier', 'battery_supplier.supplier_id=battery_stock.supplierId','left');
							$this->db->where('stock_id', $stock_id);
			        $query_result = $this->db->get();
				    	$result = $query_result->row();
			        return $result;
			    }

	 public function updateBatteryStockById($savedData, $stock_id) {
						 $this->db->where('stock_id', $stock_id);
						 $this->db->update('battery_stock', $savedData);
		}

public function selectMaximumCustomerNoBatteryCustomer(){
		        $this->db->select_max('member_no');
		        $this->db->from('battery_customer');
			    	$query_result = $this->db->get();
		        $result = $query_result->row();
		        return $result;
		    }
	public function save_batteryCustomer_info($data) {
	        $this->db->insert('battery_customer', $data);
	    }
	public function selectAllCustomer(){
	        $this->db->select('*');
	        $this->db->from('battery_customer');
	        $query_result = $this->db->get();
	        $result = $query_result->result();
	        return $result;
	    }
	public function select_battery_customer_by_id($customer_id) {
			        $this->db->select('*');
			        $this->db->from('battery_customer');
						  $this->db->where('customer_id', $customer_id);
			        $query_result = $this->db->get();
			        $result = $query_result->row();
			        return $result;
			    }
public function updateBatteryCustomerById($savedData, $customer_id) {
      $this->db->where('customer_id', $customer_id);
      $this->db->update('battery_customer', $savedData);
  }

public function save_batteryRent_info($data) {
				$this->db->insert('battery_rent', $data);
		}

public function selectAllrentCustomer(){
				$this->db->select('*');
				$this->db->from('battery_rent');
				$this->db->join('battery_customer', 'battery_customer.customer_id=battery_rent.customerId','left');
				$this->db->join('battery_warehouse', 'battery_warehouse.warehouse_id=battery_rent.wareHouseId','left');
				$this->db->join('battery_brand', 'battery_brand.brand_id=battery_rent.brandId','left');
				$this->db->join('battery_supplier', 'battery_supplier.supplier_id=battery_rent.supplierId','left');
				$query_result = $this->db->get();
				$result = $query_result->result();
				return $result;
		}

public function select_battery_rent_by_id($rent_id) {
					$this->db->select('*');
					$this->db->from('battery_rent');
					$this->db->join('battery_customer', 'battery_customer.customer_id=battery_rent.customerId','left');
					$this->db->join('battery_warehouse', 'battery_warehouse.warehouse_id=battery_rent.wareHouseId','left');
					$this->db->join('battery_brand', 'battery_brand.brand_id=battery_rent.brandId','left');
					$this->db->join('battery_supplier', 'battery_supplier.supplier_id=battery_rent.supplierId','left');
					$this->db->where('rent_id', $rent_id);
					$query_result = $this->db->get();
					$result = $query_result->row();
					return $result;
			}
public function updateBatteryRentInfoById($savedData, $rent_id) {
      $this->db->where('rent_id', $rent_id);
      $this->db->update('battery_rent', $savedData);
  }
public function save_battery_rent_money($data) {
        $this->db->insert('battery_rent_money', $data);
    }
public function select_all_collection_by_rent_id($rent_id){
					$this->db->select('*');
					$this->db->from('battery_rent_money');
					$this->db->where('rentId', $rent_id);
					$query_result = $this->db->get();
					$result = $query_result->result();
					return $result;
			}
public function select_batteryRentCollection_info_by_collection_id($collection_id){
					$this->db->select('*');
					$this->db->from('battery_rent_money');
					$this->db->where('collection_id', $collection_id);
					$query_result = $this->db->get();
					$result = $query_result->row();
					return $result;
			}
	public function totalBatteryRentPaymentCollectionByrentId($rent_id){
				$this->db->select_sum('collected_money');
				$this->db->from('battery_rent_money');
				$this->db->where('battery_rent_money.rentId', $rent_id);
				$query_result = $this->db->get();
			  $result = $query_result->row();
				return $result;
		}
public function update_battery_rent_money($savedData, $collection_id) {
      $this->db->where('collection_id', $collection_id);
      $this->db->update('battery_rent_money', $savedData);
  }


public function saveBatterySalesRecord($savedData){
	   $this->db->insert('battery_sales', $savedData);
	   $insert_id = $this->db->insert_id();
	   return  $insert_id;
	}
	public function saveBatterySalesPriceToDueCollection($savedPrice){
		   $this->db->insert('battery_sales_due_collection', $savedPrice);

		}

public function selectAllsalesCustomer(){
				$this->db->select('*');
				$this->db->from('battery_sales');
				$this->db->join('battery_sales_due_collection', 'battery_sales_due_collection.salesId=battery_sales.selling_id','left');
				$this->db->join('battery_customer', 'battery_customer.customer_id=battery_sales.customerId','left');
				$this->db->join('battery_warehouse', 'battery_warehouse.warehouse_id=battery_sales.wareHouseId','left');
				$this->db->join('battery_brand', 'battery_brand.brand_id=battery_sales.brandId','left');
				$this->db->join('battery_supplier', 'battery_supplier.supplier_id=battery_sales.supplierId','left');
				$query_result = $this->db->get();
				$result = $query_result->result();
				return $result;
		}
	public function select_sales_info_by_id($selling_id) {
						$this->db->select('*');
						$this->db->from('battery_sales');
						$this->db->join('battery_customer', 'battery_customer.customer_id=battery_sales.customerId','left');
						$this->db->join('battery_warehouse', 'battery_warehouse.warehouse_id=battery_sales.wareHouseId','left');
						$this->db->join('battery_brand', 'battery_brand.brand_id=battery_sales.brandId','left');
						$this->db->join('battery_supplier', 'battery_supplier.supplier_id=battery_sales.supplierId','left');
						$this->db->where('selling_id', $selling_id);
						$query_result = $this->db->get();
						$result = $query_result->row();
						return $result;
				}
	public function select_all_duecollection_by_sales_id($selling_id){
						$this->db->select('*');
						$this->db->from('battery_sales_due_collection');
						$this->db->where('salesId', $selling_id);
						$query_result = $this->db->get();
						$result = $query_result->result();
						return $result;
				}
	public function totalBatterySalesCollectionSalesId($selling_id){
				$this->db->select_sum('received_money');
				$this->db->from('battery_sales_due_collection');
				$this->db->where('battery_sales_due_collection.salesId', $selling_id);
				$query_result = $this->db->get();
				$result = $query_result->row();
				return $result;
		}
	public function save_battery_sales_due_money($data) {
	        $this->db->insert('battery_sales_due_collection', $data);
	    }

public function select_salesCollection_info_by_id($collection_id) {
				$this->db->select('*');
				$this->db->from('battery_sales_due_collection');
				$this->db->join('battery_sales', 'battery_sales.selling_id=battery_sales_due_collection.salesId','left');
				$this->db->join('battery_customer', 'battery_customer.customer_id=battery_sales.customerId','left');
				$this->db->join('battery_warehouse', 'battery_warehouse.warehouse_id=battery_sales.wareHouseId','left');
				$this->db->join('battery_brand', 'battery_brand.brand_id=battery_sales.brandId','left');
				$this->db->join('battery_supplier', 'battery_supplier.supplier_id=battery_sales.supplierId','left');
				$this->db->where('collection_id', $collection_id);
				$query_result = $this->db->get();
				$result = $query_result->row();
				return $result;
		}
		public function update_battery_sales_due_money($savedData, $collection_id) {
		      $this->db->where('collection_id', $collection_id);
		      $this->db->update('battery_sales_due_collection', $savedData);
		  }

/*online shopping */
public function save_product_cat_info($data) {
					$this->db->insert('shopping_product_category', $data);	
	}

	public function selectAllProductCategory() {
				$this->db->select('*');
				$this->db->from('shopping_product_category');
				$query_result = $this->db->get();
				$result = $query_result->result();

				return $result;
		}

}
