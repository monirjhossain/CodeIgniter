<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Super_Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $admin_id = $this->session->userdata('admin_id');

        if ($admin_id == NULL) {
            redirect('admin_login', 'refresh');
        }
    }

    function index() {
        $data = array();
        $data['title'] = 'Milon Corporation';
		$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
		$today=date('Y-m-d');
	//	$today='2018-12-04';
		$data['today']=$today;
		$todayGoldCollection=$this->super_admin_model->selectAllDepositorTodayCollection($today);
		$data['todayGoldCollection']=$todayGoldCollection;
		
		$toal_collection=$this->super_admin_model->totalCollectionByAccountIdToday($today);		
		$cash_in_money=$toal_collection->collected_money;
		$data['total_gold_collection_today']=$cash_in_money;
		
		$todayLoanCollection=$this->super_admin_model->selectAllTodayLoanCollection($today);
		$data['todayLoanCollection']=$todayLoanCollection;	
		
		$toal_uttolon=$this->super_admin_model->totalUttolonByAccountIdToday($today);
		$cash_out_money=$toal_uttolon->uttolon_money;
		$data['total_uttolon_money_today']=$cash_out_money;
				
		$data['admin_content'] = $this->load->view('admin/shrom-kollan/home', $data, TRUE);
        $this->load->view('admin/shrom-kollan/master', $data);
    }


public function goldCollectionDateWise() {
        $data = array();
         $data['title'] = 'Milon Corporation';  
        $sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
		
		$allActiveGoldAccount=$this->super_admin_model->selectAllActiveGoldAccount();		
		$data['allActiveGoldAccount']=$allActiveGoldAccount;
		
		
        $data['admin_content'] = $this->load->view('admin/shrom-kollan/add_gold_collection_date_wise', $data, TRUE);
        $this->load->view('admin/shrom-kollan/master', $data);
    }
	
	
	
	 public function saveGoldCollectionDateWise() {

        $collected_date = $this->input->post('collected_date', TRUE);
        $collected_date = date_create($collected_date);
        $collected_date = date_format($collected_date, "Y-m-d");
        $collected_date = $collected_date;
		
        $account_id = $this->input->post('account_id[]', TRUE);
        $collected_money = $this->input->post('collected_money[]', TRUE);

		$interestPercent = $this->input->post('interestPercent[]', TRUE);
    
		$money = $this->input->post('collected_money');
	

        $created_at = date('Y-m-d');
        $update_at = date('Y-m-d');
		$created_by = $this->session->userdata('admin_id');      
        $updated_by = $this->session->userdata('admin_id');         

        $count = count($account_id);
        $value = array();
        for ($i = 0; $i < $count; $i++) {
			$profit = ((int)$collected_money[$i]*(int)$interestPercent[$i])/(100*365);
			$profit =$profit*365;
            $value = array(
                'collected_date' => $collected_date,
                'accountId' => $account_id[$i],
                'collected_money' => $collected_money[$i],
                'profit' => $profit,               
                'created_at' => $created_at,
                'updated_at' => $update_at,
				'created_by' => $created_by,
                'updated_by' => $updated_by
            );
			
			   $this->super_admin_model->saveBatchGoldCollectionDateWise($value);
        }

        $sdata = array();
        $sdata['message'] = "Save Information Successfully!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/goldCollectionDateWise');
    }

public function searchForEditGoldCollectionDateWise() {
        $data = array();
		$data['title']='Edit Gold Collection Date Wise';
			 
		
		$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
		
		$data['admin_content'] = $this->load->view('admin/shrom-kollan/search_gold_collection_date_wise', $data, TRUE);
        $this->load->view('admin/shrom-kollan/master', $data);
    }
public function searchGoldCollectionDateWise() {
		$data = array();
		$data['title']='Edit Gold Collection Date Wise';
		
        $collected_date = $this->input->post('collected_date', TRUE);
        $collected_date = date_create($collected_date);
        $collected_date = date_format($collected_date, "Y-m-d");
        $collected_date = $collected_date;

		$collectionData=$this->super_admin_model->selectAllGoldCollection($collected_date);

        $data['collectionData']=$collectionData;
			 
		
		$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
		
		$data['collected_date']=$collected_date;
		
		
		$toal_collection=$this->super_admin_model->totalCollectionByAccountIdToday($collected_date);		
		$cash_in_money=$toal_collection->collected_money;
		$data['total_gold_collection_today']=$cash_in_money;
		
		$data['admin_content'] = $this->load->view('admin/shrom-kollan/edit_gold_collection_date_wise', $data, TRUE);
        $this->load->view('admin/shrom-kollan/master', $data);
    }
	
	 public function updateBatchGoldCollectionDateWise() {
/*
        $collected_date = $this->input->post('collected_date', TRUE);
        $collected_date = date_create($collected_date);
        $collected_date = date_format($collected_date, "Y-m-d");
        $collected_date = $collected_date;
	*/	
        $collection_id = $this->input->post('collection_id[]', TRUE);
        $collected_money = $this->input->post('collected_money[]', TRUE);

		$interestPercent = $this->input->post('interestPercent[]', TRUE);
    
		$money = $this->input->post('collected_money');
	

        $update_at = date('Y-m-d');
		
        $updated_by = $this->session->userdata('admin_id');         

        $count = count($collection_id);
         $updateArray = array();
		
		
        for ($i = 0; $i < $count; $i++) {
			$profit = ((int)$collected_money[$i]*(int)$interestPercent[$i])/(100*365);
			$profit =$profit*365;
            $updateArray[] = array(
 //               'collected_date' => $collected_date,
                'collection_id' => $collection_id[$i],
                'collected_money' => $collected_money[$i],
                'profit' => $profit,               
                'updated_at' => $update_at,
                'updated_by' => $updated_by
            );
					   
        }
		$this->db->update_batch('sk_depositor_collection_by_account_open', $updateArray, 'collection_id');
		

        $sdata = array();
        $sdata['message'] = "Update Information Successfully!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/searchGoldCollectionDateWise');
    }
	
	public function searchGoldCollectionByDateToDate() {
		$data = array();
		$data['title']='Edit Gold Collection Date Wise';
		
		$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;

		$data['admin_content'] = $this->load->view('admin/shrom-kollan/searchGoldCollectionByDateToDate', $data, TRUE);
        $this->load->view('admin/shrom-kollan/master', $data);
    }
public function getGoldCollectionByDateToDate() {
		$data = array();
		$data['title']='Search Gold Collection Date Wise';
		
        $date1 = $this->input->post('search_date_one', TRUE);
        $date1 = date_create($date1);
        $date1 = date_format($date1, "Y-m-d");
        $date1 = $date1;
		
		$date2 = $this->input->post('search_date_two', TRUE);
        $date2 = date_create($date2);
        $date2 = date_format($date2, "Y-m-d");
        $date2 = $date2;

		$collectionData=$this->super_admin_model->selectAllGoldCollectionDateToDate($date1,$date2); 	 
        $data['collectionData']=$collectionData;
		

        $todayGoldCollection=$this->super_admin_model->sumOfTotalGoldCollectionBetweenTwoDate($date1,$date2);
		$total=$todayGoldCollection->collected_money;
		
		$data['total']=$total;	
		
		$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
		
		
		$data['admin_content'] = $this->load->view('admin/shrom-kollan/get_gold_collection_date_to_date_wise', $data, TRUE);
        $this->load->view('admin/shrom-kollan/master', $data);
    }	
	
    public function addEmployee() {
        $this->load->library('form_validation');
        $postdata = array(
            array(
                'field' => 'emp_name',
                'label' => 'Employe Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'emp_type',
                'label' => 'Type (Ex. Admin/ Manager / Executive)',
                'rules' => 'required'
            ),
            array(
                'field' => 'emp_email',
                'label' => 'Employee Email',
                'rules' => 'required|is_unique[sk_employee.emp_email]'
            ),         
            array(
                'field' => 'emp_password',
                'label' => 'Password',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($postdata);

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['title'] = 'add Employee'; 
			$sessionUser = $this->session->userdata('admin_id');
			$sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
			$data['sessionUserDetails']=$sessionUserDetails;
            $data['listEmployee']=$this->super_admin_model->selectAllEmployee();       
            $data['admin_content'] = $this->load->view('admin/shrom-kollan/add_employee', $data, TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
        } else {
            $savedData = array();
            $savedData['emp_type'] = $this->input->post('emp_type', TRUE);
            $savedData['emp_name'] = $this->input->post('emp_name', TRUE);
            $savedData['emp_email'] = $this->input->post('emp_email', TRUE);
            $password = $this->input->post('emp_password', TRUE);
            $savedData['emp_password'] = md5($password);
            $savedData['emp_address'] = $this->input->post('emp_address', TRUE);  
            $savedData['emp_details'] = $this->input->post('emp_details', TRUE);  
            $savedData['created_at'] = date('Y-m-d');
            $savedData['updated_at'] = date('Y-m-d');


            $created_by = $this->session->userdata('admin_id');
            $savedData['created_by'] = $created_by;
            $updated_by = $this->session->userdata('admin_id');
            $savedData['updated_by'] = $updated_by;




            $config['upload_path'] = 'shrom-kollan/emp_img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '102400';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';
            $error = '';
            $fdata = array();

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('emp_picture_path')) {
                $savedData['emp_picture_path'] = 'NULL';               
            } else {
                $fdata = $this->upload->data();
                $savedData['emp_picture_path'] = $config['upload_path'] . $fdata['file_name'];
                $savedData['emp_picture_name'] = $fdata['file_name'];
            }


            $this->super_admin_model->save_employee_info($savedData);

            $data = array();      
            $data['title'] = 'add Employee';         
            $data['admin_content'] = $this->load->view('admin/shrom-kollan/add_employee_success_message', '', TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
        }
    }

public function editEmploye($emp_id) {
        $data = array();
        $data['selectEmployee']=$this->super_admin_model->selectEmployeeById($emp_id);      
        $data['title'] = 'Edit Employee';      
        $sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
         $data['listEmployee']=$this->super_admin_model->selectAllEmployee();  
        $data['admin_content'] = $this->load->view('admin/shrom-kollan/edit_employee', $data, TRUE);
        $this->load->view('admin/shrom-kollan/master', $data);
    }
	
    public function updateEmployeInfo() {
	     	$savedData = array();
		    $emp_id = $this->input->post('emp_id', TRUE);
			$savedData['emp_id'] =$emp_id;
            $savedData['emp_type'] = $this->input->post('emp_type', TRUE);
            $savedData['emp_name'] = $this->input->post('emp_name', TRUE);
            $savedData['emp_email'] = $this->input->post('emp_email', TRUE);         
            $savedData['emp_address'] = $this->input->post('emp_address', TRUE);  
            $savedData['emp_details'] = $this->input->post('emp_details', TRUE);  
            $savedData['updated_at'] = date('Y-m-d');
           
            $updated_by = $this->session->userdata('admin_id');
            $savedData['updated_by'] = $updated_by;
		

        $this->super_admin_model->updateEmpByUserId($savedData, $emp_id);

        $sdata = array();
        $sdata['message'] = "Update Successfully!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/editEmploye/'.$emp_id);
    }
    
     public function addDepositorMember() {
        $this->load->library('form_validation');
        $postdata = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ),
			array(
                'field' => 'nid',
                'label' => 'NID/Birth Certificate',
                'rules' => 'required|is_unique[sk_dipositor_member.nid]'
            ), 
            array(
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'required'
            )
            
        );

        $this->form_validation->set_rules($postdata);

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['title'] = 'গোল্ড সদস্যের তালিকা'; 
            $data['listDepositor']=$this->super_admin_model->selectAllDepositorInfo();
			
			$max_member_id=$this->super_admin_model->selectMaximumMemberNo();
			$finalMax= ($max_member_id->member_no)+1;
			$data['finalMax']=$finalMax;
			
			$sessionUser = $this->session->userdata('admin_id');
			$sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
			$data['sessionUserDetails']=$sessionUserDetails;
			
			$data['listEmployee']=$this->super_admin_model->selectAllEmployee();
            $data['admin_content'] = $this->load->view('admin/shrom-kollan/add_depositor_member', $data, TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
        } else {
            $savedData = array();
			$savedData['member_no'] = $this->input->post('member_no');
			$savedData['nid'] = $this->input->post('nid');
            $savedData['field_officer'] = $this->input->post('field_officer');
            $from = $this->input->post('date', TRUE);
            $phpdate=$from;
            $fromdate = date("Y-m-d", strtotime($phpdate)); 
            $savedData['date'] = $fromdate ;
            $savedData['name'] = $this->input->post('name', TRUE);
            $savedData['gender'] = $this->input->post('gender', TRUE);
            $savedData['father_name'] = $this->input->post('father_name', TRUE);
            $savedData['mother_name'] = $this->input->post('mother_name', TRUE);  
            $savedData['husband_name'] = $this->input->post('husband_name', TRUE);
            $savedData['village'] = $this->input->post('village', TRUE);
            $savedData['union_name'] = $this->input->post('union_name', TRUE);
			$savedData['upojela'] = $this->input->post('upojela', TRUE);
            $savedData['district'] = $this->input->post('district', TRUE);
            $savedData['mobile'] = $this->input->post('mobile', TRUE);  
            $savedData['member_fee'] = $this->input->post('member_fee', TRUE); 
            $savedData['details'] = $this->input->post('details', TRUE);
            $savedData['total_installment'] = $this->input->post('total_installment', TRUE);
           
            $savedData['created_at'] = date('Y-m-d');
            $savedData['updated_at'] = date('Y-m-d');
            $created_by = $this->session->userdata('admin_id');
            $savedData['created_by'] = $created_by;
            $updated_by = $this->session->userdata('admin_id');
            $savedData['updated_by'] = $updated_by;

            $config['upload_path'] = 'shrom-kollan/depositor_img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '102400';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';
            $error = '';
            $fdata = array();

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('member_picture_path')) {
                $savedData['member_picture_path'] = 'NULL';               
            } else {
                $fdata = $this->upload->data();
                $savedData['member_picture_path'] = $config['upload_path'] . $fdata['file_name'];
                $savedData['member_picture_name'] = $fdata['file_name'];
            }
            $this->super_admin_model->save_depositor_info($savedData);

            $data = array();      
            $data['title'] = 'গোল্ড সদস্যের তালিকা';         
            $data['admin_content'] = $this->load->view('admin/shrom-kollan/add_depositor_member_success_message', '', TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
        }
    }

public function showDepositorInfo($depositor_id) {
        $data = array();
		$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
        $data['depositor_info'] = $this->super_admin_model->select_depositor_info_by_id($depositor_id); 
	   $data['admin_content'] = $this->load->view('admin/shrom-kollan/show_depositor_info', $data, TRUE);
        $this->load->view('admin/shrom-kollan/master', $data);
    }

public function editDepositorInfo($depositor_id) {
        $data = array();
		$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
        $data['depositor_info'] = $this->super_admin_model->select_depositor_info_by_id($depositor_id); 
	    $data['listDepositor']=$this->super_admin_model->selectAllDepositorInfo();
	    $data['listEmployee']=$this->super_admin_model->selectAllEmployee();
		$data['admin_content'] = $this->load->view('admin/shrom-kollan/edit_depositor_info', $data, TRUE);
        $this->load->view('admin/shrom-kollan/master', $data);
    }

    public function updateDepositorInfo() {
		
            $savedData = array();
		    $depositor_id=$this->input->post('depositor_id');
			$savedData['depositor_id'] = $depositor_id;
			$savedData['member_no'] = $this->input->post('member_no');
			$savedData['nid'] = $this->input->post('nid');
            $savedData['field_officer'] = $this->input->post('field_officer');
            $from = $this->input->post('date', TRUE);
            $phpdate=$from;
            $fromdate = date("Y-m-d", strtotime($phpdate)); 
            $savedData['date'] = $fromdate ;
            $savedData['name'] = $this->input->post('name', TRUE);
            $savedData['gender'] = $this->input->post('gender', TRUE);
            $savedData['father_name'] = $this->input->post('father_name', TRUE);
            $savedData['mother_name'] = $this->input->post('mother_name', TRUE);  
            $savedData['husband_name'] = $this->input->post('husband_name', TRUE);
            $savedData['village'] = $this->input->post('village', TRUE);
            $savedData['union_name'] = $this->input->post('union_name', TRUE);
			$savedData['upojela'] = $this->input->post('upojela', TRUE);
            $savedData['district'] = $this->input->post('district', TRUE);
            $savedData['mobile'] = $this->input->post('mobile', TRUE);  
            $savedData['member_fee'] = $this->input->post('member_fee', TRUE); 
            $savedData['details'] = $this->input->post('details', TRUE);
            $savedData['total_installment'] = $this->input->post('total_installment', TRUE);
           
            $savedData['updated_at'] = date('Y-m-d');
        
            $updated_by = $this->session->userdata('admin_id');
            $savedData['updated_by'] = $updated_by;
		
        $this->super_admin_model->updateDepositorInfoById($savedData, $depositor_id);

        $sdata = array();
        $sdata['message'] = "Update Successfully!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/editDepositorInfo/' . $depositor_id);
    } 
    
     public function updateMemberPicture() {
        $savedData = array();
        $depositor_id = $this->input->post('depositor_id', TRUE);
        $savedData['depositor_id'] = $this->input->post('depositor_id', TRUE);
        $savedData['updated_at'] = date('Y-m-d');

        $config['upload_path'] = 'shrom-kollan/depositor_img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10240000';
        $config['max_width'] = '1024000';
        $config['max_height'] = '768000';
        $error = '';
        $fdata = array();
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('member_picture_path')) {
            $error = $this->upload->display_errors();
            echo $error;
            exit();
        } else {
            $fdata = $this->upload->data();
            $savedData['member_picture_path'] = $config['upload_path'] . $fdata['file_name'];
            $savedData['member_picture_name'] = $fdata['file_name'];
        }

        $this->super_admin_model->updateDepositorInfoById($savedData, $depositor_id);
		
        $sdata = array();
        $sdata['message'] = "Update Successfully!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/editDepositorInfo/' . $depositor_id);
    }
	
	
	public function deleteDepositorInfo($depositor_id) {
		
		$data = $this->super_admin_model->select_depositor_info_by_id($depositor_id);
		$name = $data->member_picture_name;
		$path = 'shrom-kollan/depositor_img/';
        @unlink($path.$name);
        $this->super_admin_model->delete_depositor_info_by_id($depositor_id);
       
	    $sdata = array();
        $sdata['message'] = "Delete Information Successfully!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/addDepositorMember');
    }
	
	
     public function accountOpenForDepositorMember() {
        $this->load->library('form_validation');
        $postdata = array(
            array(
                'field' => 'memberId',
                'label' => 'Name',
                'rules' => 'required'
            ),
			array(
                'field' => 'opening_date',
                'label' => 'Opening Money',
                'rules' => 'required'
            ), 
            array(
                'field' => 'opening_money',
                'label' => 'Opening Money',
                'rules' => 'required'
            )
            
        );

        $this->form_validation->set_rules($postdata);

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['title'] = 'গোল্ড একাউন্ট এর তালিকা'; 
			
			
			$data['listDepositor']=$this->super_admin_model->selectAllDepositorInfo();
            $data['list_account']=$this->super_admin_model->selectAllDepositAccountInfo();	 
		    $max_acount_no=$this->super_admin_model->selectMaxDepositAccountNo();
			$finalMax= ($max_acount_no->account_no)+1;
			$data['finalMax']=$finalMax;


			$sessionUser = $this->session->userdata('admin_id');
			$sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
			$data['sessionUserDetails']=$sessionUserDetails;
			$data['admin_content'] = $this->load->view('admin/shrom-kollan/add_depositor_account', $data, TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
        } else {
            $savedData = array();
			$savedData['account_no'] = $this->input->post('account_no');
			$savedData['memberId'] = $this->input->post('memberId');
			
			$from = $this->input->post('opening_date', TRUE);
            $phpdate=$from;
            $fromdate = date("Y-m-d", strtotime($phpdate)); 
            $savedData['opening_date'] = $fromdate ;
			
            $savedData['opening_money'] = $this->input->post('opening_money');
			$savedData['interestPercent'] = $this->input->post('interestPercent');
            $savedData['deposit_type'] = $this->input->post('deposit_type', TRUE);
			$savedData['ac_status'] = $this->input->post('ac_status');
			
			
			
            $savedData['created_at'] = date('Y-m-d');
            $savedData['updated_at'] = date('Y-m-d');
            $created_by = $this->session->userdata('admin_id');
            $savedData['created_by'] = $created_by;
            $updated_by = $this->session->userdata('admin_id');
            $savedData['updated_by'] = $updated_by;
			

            $this->super_admin_model->save_depositor_acccount_info($savedData);

            $data = array(); 
			$sessionUser = $this->session->userdata('admin_id');
			$sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
			$data['sessionUserDetails']=$sessionUserDetails;			
            $data['title'] = 'add Depositor Account';         
            $data['admin_content'] = $this->load->view('admin/shrom-kollan/add_depositor_account_success_message', '', TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
        }
    }
	
	
	
public function editDepositorAccountInfo($account_id) {
        $data = array();
		
		$data['ac_info']=$this->super_admin_model->selectAcInfoByACId($account_id);
		$data['listDepositor']=$this->super_admin_model->selectAllDepositorInfo();
        $data['list_account']=$this->super_admin_model->selectAllDepositAccountInfo();	 
		
		$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
		
		$data['admin_content'] = $this->load->view('admin/shrom-kollan/edit_depositor_account', $data, TRUE);
        $this->load->view('admin/shrom-kollan/master', $data);
    }
	
public function updateGoldAcInfo() {
		
		$savedData = array();
		$account_id = $this->input->post('account_id');
		$savedData['account_id']=$account_id;
		
		$savedData['account_no'] = $this->input->post('account_no');
		$savedData['memberId'] = $this->input->post('memberId');
			
		$from = $this->input->post('opening_date', TRUE);
		$phpdate=$from;
		$fromdate = date("Y-m-d", strtotime($phpdate)); 
		$savedData['opening_date'] = $fromdate ;
		
		$savedData['opening_money'] = $this->input->post('opening_money');
		$savedData['interestPercent'] = $this->input->post('interestPercent');
		$savedData['deposit_type'] = $this->input->post('deposit_type', TRUE);
		$savedData['ac_status'] = $this->input->post('ac_status');

		$savedData['updated_at'] = date('Y-m-d');
	   
		$updated_by = $this->session->userdata('admin_id');
		$savedData['updated_by'] = $updated_by;
		
        $this->super_admin_model->update_depositor_acccount_info($savedData,$account_id);	

        $sdata = array();
        $sdata['message'] = "Update Successfully!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/editDepositorAccountInfo/'.$account_id );
    }	
	
	
	
	
	
	public function cashOutByAccountId($account_id) {
		
            $data = array();
            $data['title'] = 'Account Open'; 
			$data['ac_info']=$this->super_admin_model->selectAcInfoByACId($account_id);
			$data['listDepositor']=$this->super_admin_model->selectAllDepositorInfo();
            $data['list_account']=$this->super_admin_model->selectAllDepositAccountInfo();	 
			$data['finalMax']=$account_id;
			
			$data['dailyGoldCollection']=$this->super_admin_model->collectionListByAccountId($account_id);
		   
		    $toal_collection=$this->super_admin_model->totalCollectionByAccountId($account_id);
			$cash_in_money=$toal_collection->collected_money;
			$data['toal_collection']=$cash_in_money;
			
		   $toal_uttolon=$this->super_admin_model->totalUttolonByAccountId($account_id);
		   $cash_out_money=$toal_uttolon->uttolon_money;
		   $data['toal_uttolon_money']=$cash_out_money;
		   
		   $total_profit=$this->super_admin_model->totalProfitByAccountId($account_id);
		   $toal_profit=$total_profit->profit;
		   $data['total_profit']=$toal_profit;
			
			$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
			
 		    $data['admin_content'] = $this->load->view('admin/shrom-kollan/cash_out_money', $data, TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
    }
	
public function cashOutFromGoldSavingAccount() {
		
		$savedData = array();
		$account_id = $this->input->post('accountId');
		$savedData['accountId']=$account_id;
		
		$from = $this->input->post('collected_date', TRUE);
		$phpdate=$from;
		$fromdate = date("Y-m-d", strtotime($phpdate)); 
		$savedData['collected_date'] = $fromdate ;
		
		$balanceMoney= $this->input->post('subtotal');
		$cashOutmoney = $this->input->post('uttolon_money');
		$savedData['uttolon_money']=$this->input->post('uttolon_money');
		
		
		
		$savedData['created_at'] = date('Y-m-d');
		$savedData['updated_at'] = date('Y-m-d');
		$created_by = $this->session->userdata('admin_id');
		$savedData['created_by'] = $created_by;
		$updated_by = $this->session->userdata('admin_id');
		$savedData['updated_by'] = $updated_by;
		
		if($balanceMoney>=$cashOutmoney){
        $this->super_admin_model->save_gold_colection($savedData);	
        $sdata = array();
        $sdata['message'] = "Successfully Cash Out!";
        $this->session->set_userdata($sdata);
		}else{
			
        $sdata = array();
        $sdata['message'] = "Not Successfully!";
        $this->session->set_userdata($sdata);
		}	
        
        redirect('super_admin/cashOutByAccountId/'.$account_id );
    }	
	
public function addGoldCollectionByAccountById($account_id) {
		
            $data = array();
			$sessionUser = $this->session->userdata('admin_id');
			$sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
			$data['sessionUserDetails']=$sessionUserDetails;
			
            
			$data['ac_info']=$this->super_admin_model->selectAcInfoByACId($account_id);			
			$data['ac_holder_info']=$this->super_admin_model->selectAcHolderInfoByACId($data['ac_info']->memberId);
			$ac_holder_info=$data['ac_holder_info'];
			
			$data['title'] =
			$ac_holder_info->name.'</br>'.
			'সদস্য নং :'.$ac_holder_info->member_no.'<br>'.
			'একাউন্ট নং :'.$data['ac_info']->account_no.'<br>'.
			'পিতা :'.$ac_holder_info->father_name.'<br>'.
			'গ্রাম :'.$ac_holder_info->village.'<br>'.
			'মোবাইল :'.$ac_holder_info->mobile.'<br>'.
			'একাউন্ট ওপে্নিং এর তারিখ  :'.$data['ac_info']->opening_date.'<br>'.
			'আজকের তারিখ  :'.date('Y-m-d'); 
			$data['listDepositor']=$this->super_admin_model->selectAllDepositorInfo();
            $data['list_account']=$this->super_admin_model->selectAllDepositAccountInfo();	 
			$data['finalMax']=$account_id;
			
			$data['dailyGoldCollection']=$this->super_admin_model->collectionListByAccountId($account_id);
		   
		    $toal_collection=$this->super_admin_model->totalCollectionByAccountId($account_id);
			$cash_in_money=$toal_collection->collected_money;
			$data['toal_collection']=$cash_in_money;
			
		   $toal_uttolon=$this->super_admin_model->totalUttolonByAccountId($account_id);
		   $cash_out_money=$toal_uttolon->uttolon_money;
		   $data['toal_uttolon_money']=$cash_out_money;
		   
		   $total_profit=$this->super_admin_model->totalProfitByAccountId($account_id);
		   $toal_profit=$total_profit->profit;
		   $data['total_profit']=$toal_profit;
			
 		    $data['admin_content'] = $this->load->view('admin/shrom-kollan/add_depositor_collection_money', $data, TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
    }
public function invoiceGoldCollectionByCollectionId($collection_id) {
		
            $data = array();
			$sessionUser = $this->session->userdata('admin_id');
			$sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
			$data['sessionUserDetails']=$sessionUserDetails;
			
            $accountId=$this->super_admin_model->selectAccountIdbyCollectionId($collection_id);
			$account_id=$accountId->accountId;
			
			$data['ac_info']=$this->super_admin_model->selectAcInfoByACId($account_id);			
			$data['ac_holder_info']=$this->super_admin_model->selectAcHolderInfoByACId($data['ac_info']->memberId);
			$ac_holder_info=$data['ac_holder_info'];
			
			$data['title'] =
			$ac_holder_info->name.'</br>'.
			'সদস্য নং :'.$ac_holder_info->member_no.'<br>'.
			'একাউন্ট নং :'.$data['ac_info']->account_no.'<br>'.
			'পিতা :'.$ac_holder_info->father_name.'<br>'.
			'গ্রাম :'.$ac_holder_info->village.'<br>'.
			'মোবাইল :'.$ac_holder_info->mobile.'<br>'.
			'একাউন্ট ওপে্নিং এর তারিখ  :'.$data['ac_info']->opening_date.'<br>'.
			'আজকের তারিখ  :'.date('Y-m-d'); 
			$data['listDepositor']=$this->super_admin_model->selectAllDepositorInfo();
            $data['list_account']=$this->super_admin_model->selectAllDepositAccountInfo();	 
			$data['finalMax']=$account_id;
			
			$data['v_content']=$this->super_admin_model->selectAccountIdbyCollectionId($collection_id);
		 
			
 		    $data['admin_content'] = $this->load->view('admin/shrom-kollan/invoice_gold_collection_by_id', $data, TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
    }		
public function saveDipostiorCollectionMoney() {
		
		$savedData = array();
		$account_id = $this->input->post('accountId');
		$savedData['accountId']=$account_id;
		$ac_info=$this->super_admin_model->selectAcInfoByACId($account_id);
		
		$from = $this->input->post('collected_date', TRUE);
		$phpdate=$from;
		$fromdate = date("Y-m-d", strtotime($phpdate)); 
		$savedData['collected_date'] = $fromdate ;
		
		$money = $this->input->post('collected_money');
		$savedData['collected_money']=$money ;
		
		if($ac_info->deposit_type==1){
		$profit= ($money*$ac_info->interestPercent)/(100*365);
		$profit=$profit*365;
        $savedData['profit']=$profit;
		
		}
		
		$savedData['created_at'] = date('Y-m-d');
		$savedData['updated_at'] = date('Y-m-d');
		$created_by = $this->session->userdata('admin_id');
		$savedData['created_by'] = $created_by;
		$updated_by = $this->session->userdata('admin_id');
		$savedData['updated_by'] = $updated_by;
			
        $this->super_admin_model->save_gold_colection($savedData);	

        $sdata = array();
        $sdata['message'] = "Collection Successfully!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/accountOpenForDepositorMember/');
    }	
	
	
public function addGovtHolyDayCalendar() {
		
            $data = array();
           $sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
		   
			$data['listHolyDay']=$this->super_admin_model->selectAllHolyDay();
 		    $data['admin_content'] = $this->load->view('admin/shrom-kollan/add_govt_holy_day_calender', $data, TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
    }
		
	
public function saveGovtHolyDayCalender() {
		
		$savedData = array();
		
		$savedData['year']=$this->input->post('year', TRUE);
		$from = $this->input->post('date', TRUE);
		$phpdate=$from;
		$fromdate = date("Y-m-d", strtotime($phpdate)); 
		$savedData['date'] = $fromdate ;
		
		$savedData['cause']=$this->input->post('cause', TRUE);
		
		
		$savedData['created_at'] = date('Y-m-d');
		$savedData['updated_at'] = date('Y-m-d');
		$created_by = $this->session->userdata('admin_id');
		$savedData['created_by'] = $created_by;
		$updated_by = $this->session->userdata('admin_id');
		$savedData['updated_by'] = $updated_by;
			
        $this->super_admin_model->saveHolyDay($savedData);	

        $sdata = array();
        $sdata['message'] = "Holy Day Insert Successfully!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/addGovtHolyDayCalendar');
    }
	
	
	public function editHolyDay($date_id) {
		
            $data = array();
			$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
			
			$data['holy_day_info']=$this->super_admin_model->selectAllHolyDayInfoById($date_id);
			$data['listHolyDay']=$this->super_admin_model->selectAllHolyDay();
 		    $data['admin_content'] = $this->load->view('admin/shrom-kollan/edit_govt_holy_day_calender', $data, TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
    }
	
	
	
	public function updateGovtHolyDayCalender() {
		
		$savedData = array();

		$date_id = $this->input->post('date_id');
		$savedData['date_id']=$date_id;
		$savedData['year']=$this->input->post('year', TRUE);
		
		$from = $this->input->post('date', TRUE);
		$phpdate=$from;
		$fromdate = date("Y-m-d", strtotime($phpdate)); 
		$savedData['date'] = $fromdate ;
		
		$savedData['cause']=$this->input->post('cause', TRUE);
		
		$savedData['updated_at'] = date('Y-m-d');
	
		$updated_by = $this->session->userdata('admin_id');
		$savedData['updated_by'] = $updated_by;
			
        $this->super_admin_model->updateHolyDay($savedData,$date_id);	

        $sdata = array();
        $sdata['message'] = "Holy Day Update Successfully!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/editHolyDay/'.$date_id);
    }
	
	
	public function editCollectionByCollectionId($collection_id) {
            $data = array();
			
			$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
			
            $data['title'] = 'Edit Collection'; 
			$data['listDepositor']=$this->super_admin_model->selectAllDepositorInfo();
            $data['list_account']=$this->super_admin_model->selectAllDepositAccountInfo();
			
			$getData=$this->super_admin_model->slectDataByColletionId($collection_id);
			$account_id=$getData->accountId;
			$data['dailyGoldCollection']=$this->super_admin_model->collectionListByAccountId($account_id);
		    $data['getData']=$getData;
 		    $data['admin_content'] = $this->load->view('admin/shrom-kollan/edit_depositor_collection_money', $data, TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
    }
	public function deleteGoldCollectionByCollectionId($collection_id) {
        $this->super_admin_model->deleteGoldCollection($collection_id);
        $sdata = array();
        $sdata['message'] = "Delete Information Successfully!";
        $this->session->set_userdata($sdata);
       redirect('super_admin/accountOpenForDepositorMember');
    }
	
public function updateDipostiorCollectionMoney() {
		
		$savedData = array();
		$collection_id=$this->input->post('collection_id');	
		$savedData['collection_id']=$collection_id;
		
		
		$from = $this->input->post('collected_date', TRUE);
		$phpdate=$from;
		$fromdate = date("Y-m-d", strtotime($phpdate)); 
		$savedData['collected_date'] = $fromdate ;
    	$getData=$this->super_admin_model->slectDataByColletionId($collection_id);
    	$account_id = $getData->accountId;
    	$ac_info=$this->super_admin_model->selectAcInfoByACId($account_id);
		$money = $this->input->post('collected_money', TRUE);
		$savedData['collected_money']=$money ;
		
		if($ac_info->deposit_type==1){
		$profit= ($money*$ac_info->interestPercent)/(100*365);
		$profit=$profit*365;
        $savedData['profit']=$profit;
		
		}
		
		
		$savedData['updated_at'] = date('Y-m-d');
		$updated_by = $this->session->userdata('admin_id');
		$savedData['updated_by'] = $updated_by;
			
        $this->super_admin_model->update_gold_colection($savedData,$collection_id);	

        $sdata = array();
        $sdata['message'] = "Collection Update Successfully!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/editCollectionByCollectionId/'.$collection_id);
    }	
	
	
	public function addLoanMember() {
        $this->load->library('form_validation');
        $postdata = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ),
			array(
                'field' => 'nid_no',
                'label' => 'NID/Birth Certificate',
                'rules' => 'required|is_unique[sk_loan_member.nid_no]'
            ),
            array(
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'required'
            )
            
        );

        $this->form_validation->set_rules($postdata);

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['title'] = 'add Deposior Name'; 
			
			$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
			
            $data['listDepositor']=$this->super_admin_model->selectAllDepositorInfo();
			$max_member_id=$this->super_admin_model->selectMaximumMemberNoLoan();
			$finalMax= ($max_member_id->member_no)+1;
			$data['finalMax']=$finalMax;
			$data['listLoanMember']=$this->super_admin_model->selectAllLoanMember();
			
			$data['listEmployee']=$this->super_admin_model->selectAllEmployee();
            $data['admin_content'] = $this->load->view('admin/shrom-kollan/add_loan_member', $data, TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
        } else {
            $savedData = array();
			
			$savedData['field_officer'] = $this->input->post('field_officer');
			$savedData['member_no'] = $this->input->post('member_no');
            $savedData['name'] = $this->input->post('name');
			
          
			
            $savedData['gender'] = $this->input->post('gender', TRUE);
            $savedData['father_name'] = $this->input->post('father_name', TRUE);
            $savedData['mother_name'] = $this->input->post('mother_name', TRUE);
            $savedData['husband_name'] = $this->input->post('husband_name', TRUE);  
            $savedData['pesha'] = $this->input->post('pesha', TRUE);
            $savedData['nid_no'] = $this->input->post('nid_no', TRUE);
            $savedData['mobile_no'] = $this->input->post('mobile_no', TRUE);
			$savedData['age'] = $this->input->post('age', TRUE);
            $savedData['pa_gram'] = $this->input->post('pa_gram', TRUE);
            $savedData['pa_dak'] = $this->input->post('pa_dak', TRUE);  
            $savedData['pa_upojela'] = $this->input->post('pa_upojela', TRUE); 
            $savedData['pa_jela'] = $this->input->post('pa_jela', TRUE);
            $savedData['pra_gram'] = $this->input->post('pra_gram', TRUE);
			
			$savedData['pra_dak'] = $this->input->post('pra_dak', TRUE);
            $savedData['pra_upojela'] = $this->input->post('pra_upojela', TRUE);
            $savedData['pra_jela'] = $this->input->post('pra_jela', TRUE);
			
			$savedData['bank_name'] = $this->input->post('bank_name', TRUE);
            $savedData['check_no'] = $this->input->post('check_no', TRUE);
			
            $savedData['loan_amount'] = $this->input->post('loan_amount', TRUE);  
            $savedData['kothai'] = $this->input->post('kothai', TRUE);
            $savedData['service_charge'] = $this->input->post('service_charge', TRUE);
            $savedData['loan_type'] = $this->input->post('loan_type', TRUE);
			$savedData['total_installment'] = $this->input->post('total_installment', TRUE);
            $savedData['kistir_poriman'] = $this->input->post('kistir_poriman', TRUE);
			$from = $this->input->post('bitoron_date', TRUE);
            $phpdate=$from;
            $fromdate = date("Y-m-d", strtotime($phpdate)); 
            $savedData['bitoron_date'] = $fromdate ;
			
			$from = $this->input->post('grohon_date', TRUE);
            $phpdate=$from;
            $fromdate = date("Y-m-d", strtotime($phpdate)); 
            $savedData['grohon_date'] = $fromdate ;
			
			$from = $this->input->post('installment_start_date', TRUE);
            $phpdate=$from;
            $fromdate = date("Y-m-d", strtotime($phpdate)); 
            $savedData['installment_start_date'] = $fromdate ;
			
            $savedData['jamindar_name_one'] = $this->input->post('jamindar_name_one', TRUE);
            $savedData['relation_one'] = $this->input->post('relation_one', TRUE);
            $savedData['jamindar_name_two'] = $this->input->post('jamindar_name_two', TRUE);
            $savedData['relation_two'] = $this->input->post('relation_two', TRUE);  
            
		   
            $config['upload_path'] = 'shrom-kollan/loan_member_img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '102400';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';
            $error = '';
            $fdata = array();

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('picture_path')) {
                $savedData['picture_path'] = 'NULL';               
            } else {
                $fdata = $this->upload->data();
                $savedData['picture_path'] = $config['upload_path'] . $fdata['file_name'];
                $savedData['picture_name'] = $fdata['file_name'];
            }
		   
		   
		   
            $savedData['created_at'] = date('Y-m-d');
            $savedData['updated_at'] = date('Y-m-d');
            $created_by = $this->session->userdata('admin_id');
            $savedData['created_by'] = $created_by;
            $updated_by = $this->session->userdata('admin_id');
            $savedData['updated_by'] = $updated_by;



            $this->super_admin_model->save_loanMember_info($savedData);

            $data = array();   
$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;			
            $data['title'] = 'add Depositor Member';         
            $data['admin_content'] = $this->load->view('admin/shrom-kollan/add_depositor_member_success_message', '', TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
        }
    }
public function editLoanMember($loan_member_id) {
        $data = array();
		
		$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
		
        $data['loan_member_info'] = $this->super_admin_model->select_loan_member_info_by_id($loan_member_id);
        $data['listLoanMember']=$this->super_admin_model->selectAllLoanMember();		
		$data['listEmployee']=$this->super_admin_model->selectAllEmployee();
		$data['title'] = 'Edit Loan Member';
        $data['admin_content'] = $this->load->view('admin/shrom-kollan/edit_loan_member', $data, TRUE);
        $this->load->view('admin/shrom-kollan/master', $data);
    }
	
	
public function updateLonaMemberInfo() {
		
            $savedData = array();
			$loan_member_id=$this->input->post('loan_member_id', TRUE);
			$savedData['loan_member_id'] = $loan_member_id;
			
			$savedData['field_officer'] = $this->input->post('field_officer', TRUE);
			$savedData['member_no'] = $this->input->post('member_no', TRUE);
            $savedData['name'] = $this->input->post('name');
            $savedData['gender'] = $this->input->post('gender', TRUE);
            $savedData['father_name'] = $this->input->post('father_name', TRUE);
            $savedData['mother_name'] = $this->input->post('mother_name', TRUE);
            $savedData['husband_name'] = $this->input->post('husband_name', TRUE);  
            $savedData['pesha'] = $this->input->post('pesha', TRUE);
            $savedData['nid_no'] = $this->input->post('nid_no', TRUE);
            $savedData['mobile_no'] = $this->input->post('mobile_no', TRUE);
			$savedData['age'] = $this->input->post('age', TRUE);
            $savedData['pa_gram'] = $this->input->post('pa_gram', TRUE);
            $savedData['pa_dak'] = $this->input->post('pa_dak', TRUE);  
            $savedData['pa_upojela'] = $this->input->post('pa_upojela', TRUE); 
            $savedData['pa_jela'] = $this->input->post('pa_jela', TRUE);
            $savedData['pra_gram'] = $this->input->post('pra_gram', TRUE);
			
			$savedData['pra_dak'] = $this->input->post('pra_dak', TRUE);
            $savedData['pra_upojela'] = $this->input->post('pra_upojela', TRUE);
            $savedData['pra_jela'] = $this->input->post('pra_jela', TRUE);
			
			$savedData['bank_name'] = $this->input->post('bank_name', TRUE);
            $savedData['check_no'] = $this->input->post('check_no', TRUE);
			
            $savedData['loan_amount'] = $this->input->post('loan_amount', TRUE);  
            $savedData['kothai'] = $this->input->post('kothai', TRUE);
            $savedData['service_charge'] = $this->input->post('service_charge', TRUE);
            $savedData['loan_type'] = $this->input->post('loan_type', TRUE);
			$savedData['total_installment'] = $this->input->post('total_installment', TRUE);
            $savedData['kistir_poriman'] = $this->input->post('kistir_poriman', TRUE);
			
			$from = $this->input->post('bitoron_date', TRUE);
            $phpdate=$from;
            $fromdate = date("Y-m-d", strtotime($phpdate)); 
            $savedData['bitoron_date'] = $fromdate ;
			
			$from = $this->input->post('grohon_date', TRUE);
            $phpdate=$from;
            $fromdate = date("Y-m-d", strtotime($phpdate)); 
            $savedData['grohon_date'] = $fromdate ;
			
			$from = $this->input->post('installment_start_date', TRUE);
            $phpdate=$from;
            $fromdate = date("Y-m-d", strtotime($phpdate)); 
            $savedData['installment_start_date'] = $fromdate ;
			
            $savedData['jamindar_name_one'] = $this->input->post('jamindar_name_one', TRUE);
            $savedData['relation_one'] = $this->input->post('relation_one', TRUE);
            $savedData['jamindar_name_two'] = $this->input->post('jamindar_name_two', TRUE);
            $savedData['relation_two'] = $this->input->post('relation_two', TRUE);  
		 
            $savedData['updated_at'] = date('Y-m-d');
           
            $updated_by = $this->session->userdata('admin_id');
            $savedData['updated_by'] = $updated_by;
		
        $this->super_admin_model->updateLoanMemberById($savedData, $loan_member_id);

        $sdata = array();
        $sdata['message'] = "Update Successfully!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/editLoanMember/' . $loan_member_id);
    }	
	
	
	public function updateLoanMemberPicture() {
        $savedData = array();
        $laon_member_id = $this->input->post('loan_member_id', TRUE);
        $savedData['loan_member_id'] = $laon_member_id;
        $savedData['updated_at'] = date('Y-m-d');

        $config['upload_path'] = 'shrom-kollan/loan_member_img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10240000';
        $config['max_width'] = '1024000';
        $config['max_height'] = '768000';
        $error = '';
        $fdata = array();
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('picture_path')) {
            $error = $this->upload->display_errors();
            echo $error;
            exit();
        } else {
            $fdata = $this->upload->data();
            $savedData['picture_path'] = $config['upload_path'] . $fdata['file_name'];
            $savedData['picture_name'] = $fdata['file_name'];
        }

        $this->super_admin_model->updateLoanMemberById($savedData, $laon_member_id);
		
        $sdata = array();
        $sdata['message'] = "Update Successfully!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/editLoanMember/' . $laon_member_id);
    }
	
	public function updateLoanMemberBankCheckPicture() {
        $savedData = array();
        $laon_member_id = $this->input->post('loan_member_id', TRUE);
        $savedData['loan_member_id'] = $laon_member_id;
        $savedData['updated_at'] = date('Y-m-d');

        $config['upload_path'] = 'shrom-kollan/loan_member_img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10240000';
        $config['max_width'] = '1024000';
        $config['max_height'] = '768000';
        $error = '';
        $fdata = array();
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('bank_check_img_path')) {
            $error = $this->upload->display_errors();
            echo $error;
            exit();
        } else {
            $fdata = $this->upload->data();
            $savedData['bank_check_img_path'] = $config['upload_path'] . $fdata['file_name'];
            $savedData['bank_check_img_name'] = $fdata['file_name'];
        }

        $this->super_admin_model->updateLoanMemberById($savedData, $laon_member_id);
		
        $sdata = array();
        $sdata['message'] = "Update Successfully!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/editLoanMember/' . $laon_member_id);
    }
	
	public function showLoanMember($loan_member_id) {
        $data = array();
		
		$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
		
        $data['loan_member_info'] = $this->super_admin_model->select_loan_member_info_by_id($loan_member_id);
	    $data['admin_content'] = $this->load->view('admin/shrom-kollan/show_loan_member_info', $data, TRUE);
        $this->load->view('admin/shrom-kollan/master', $data);
    }
	
	
	
	 public function deleteLoanMemberInfo($laon_member_id) {
        $this->super_admin_model->deleteLoanMemberInfo($laon_member_id);
        $sdata = array();
        $sdata['message'] = "Delete Information Successfully!";
        $this->session->set_userdata($sdata);
       redirect('super_admin/addLoanMember');
    }

	
	
	
     public function accountOpenForLoanMember() {
        $this->load->library('form_validation');
        $postdata = array(
            array(
                'field' => 'loan_member',
                'label' => 'Name',
                'rules' => 'required'
            ),
			array(
                'field' => 'disburse_date',
                'label' => 'Opening Money',
                'rules' => 'required'
            ), 
            array(
                'field' => 'loan_amount',
                'label' => 'Loan Money',
                'rules' => 'required'
            )
            
        );

        $this->form_validation->set_rules($postdata);

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['title'] = 'Account Open'; 
			$data['listLoanMemmber']=$this->super_admin_model->selectAllLoanMember();
            $data['list_account']=$this->super_admin_model->selectAllLoanAccountInfo();	
			
		    $max_acount_no=$this->super_admin_model->selectMaxLoanAccountNo();
			$finalMax= ($max_acount_no->loan_account)+1;
			$data['finalMax']=$finalMax;

			$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;

		   $data['admin_content'] = $this->load->view('admin/shrom-kollan/add_loan_account', $data, TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
        } else {
            $savedData = array();
			$savedData['loan_account'] = $this->input->post('loan_account');
			$savedData['loan_member'] = $this->input->post('loan_member');
			
			$from = $this->input->post('disburse_date', TRUE);
            $phpdate=$from;
            $fromdate = date("Y-m-d", strtotime($phpdate)); 
            $savedData['disburse_date'] = $fromdate ;
			
            $savedData['approved_loan_amount'] = $this->input->post('loan_amount');
			$savedData['interestPercent'] = $this->input->post('interestPercent');
            $savedData['deposit_type'] = $this->input->post('deposit_type', TRUE);
			$savedData['ac_status'] = $this->input->post('ac_status');
			
			$savedData['sc_money'] = $this->input->post('sc_money');
            
			
			if($savedData['deposit_type']==1){
			$total_installmet=110;
			$savedData['total_installment'] = $total_installmet;
			
			$money=$savedData['approved_loan_amount'];
			$interest=$savedData['interestPercent'];
			$interest_money= ($money*$interest)/(100);

			$installment_fee=($money+$interest_money)/$total_installmet;
			$savedData['installment_fee']=$installment_fee;
		      }
            $savedData['created_at'] = date('Y-m-d');
            $savedData['updated_at'] = date('Y-m-d');
            $created_by = $this->session->userdata('admin_id');
            $savedData['created_by'] = $created_by;
            $updated_by = $this->session->userdata('admin_id');
            $savedData['updated_by'] = $updated_by;
			

            $this->super_admin_model->save_loan_acccount_info($savedData);

            $data = array();      
            $data['title'] = 'add Loan Account'; 
$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;			
            $data['admin_content'] = $this->load->view('admin/shrom-kollan/add_loan_account_success_message', '', TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
        }
    }
	
	
	
	
	
	public function editLoanAccount($loan_id) {
		
            $data = array();
			$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
			
            $data['loan_info']=$this->super_admin_model->selectLoanInfoById($loan_id);
			$data['listLoanMemmber']=$this->super_admin_model->selectAllLoanMember();
			$data['list_loan_account']=$this->super_admin_model->selectAllLoanAccountInfo();	
 		    $data['admin_content'] = $this->load->view('admin/shrom-kollan/edit_loan_account', $data, TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
    }
	public function updateLoanAcInfo() {
		
		$savedData = array();
		$loan_id=$this->input->post('loan_id',TRUE);
		$savedData['loan_id']=$loan_id;
		$savedData['loan_account'] = $this->input->post('loan_account',TRUE);
		$savedData['loan_member'] = $this->input->post('loan_member',TRUE);
			
		$from = $this->input->post('disburse_date', TRUE);
		$phpdate=$from;
		$fromdate = date("Y-m-d", strtotime($phpdate)); 
		$savedData['disburse_date'] = $fromdate ;
		
		$savedData['approved_loan_amount'] = $this->input->post('loan_amount');
		$savedData['interestPercent'] = $this->input->post('interestPercent');
		$savedData['deposit_type'] = $this->input->post('deposit_type', TRUE);
		$savedData['ac_status'] = $this->input->post('ac_status',TRUE);
		$savedData['sc_money'] = $this->input->post('sc_money');
		
		$savedData['total_installment'] = $this->input->post('total_installment',TRUE);
		$savedData['installment_fee']=$this->input->post('installment_fee',TRUE);
		    
        $savedData['updated_at'] = date('Y-m-d');
          
		$updated_by = $this->session->userdata('admin_id');
		$savedData['updated_by'] = $updated_by;
		

        $this->super_admin_model->update_loan_acccount_info($savedData,$loan_id);

        $sdata = array();
        $sdata['message'] = "Update Successfully!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/editLoanAccount/'.$loan_id);
    }	
	
	public function collectLoan($loan_id) {
		
            $data = array();
           
		   $sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
		   
		    $data['ac_info']=$this->super_admin_model->selectLoanAcInfoByACId($loan_id);
			$loan_member=$data['ac_info']->loan_member;
			$data['ac_holder_info']=$this->super_admin_model->selectLoanAcHolderInfoByACId($loan_member);
			
			$data['loan_collect_info']=$this->super_admin_model->slect_loan_collect_info($loan_id);
			
			 $sum_collect_loan_amount = $this->super_admin_model->select_sum_loan_collection($loan_id);
             $sumCollectLoanAmount= $sum_collect_loan_amount->installment_fee;
             $data['sumCollectLoanAmount'] = $sumCollectLoanAmount;
     
     
            $sum_installment_fine_amount = $this->super_admin_model->select_sum_fine_loan_collection($loan_id);
             $sumInstallmentFineAmount = $sum_installment_fine_amount->per_installment_fine;
			 $data['sumInstallmentFineAmount'] = $sumInstallmentFineAmount;
			 
			  $sum_soncoy = $this->super_admin_model->select_soncoy_collection($loan_id);
             $soncoy = $sum_soncoy->soncoy;
			 $data['sum_soncoy'] = $soncoy;
			 
			  $sum_soncoy_profit = $this->super_admin_model->select_soncoy_profit_collection($loan_id);
             $soncoy_profit = $sum_soncoy_profit->sc_profit;
			 $data['sum_soncoy_profit'] = $soncoy_profit;
			 
			 $toal_uttolon=$this->super_admin_model->totalUttolonFromSoncoy($loan_id);
		   $cash_out_money=$toal_uttolon->sc_cash_out;
		   $data['total_uttolon_money']=$cash_out_money;
			 
 		    $data['admin_content'] = $this->load->view('admin/shrom-kollan/collect_loan_money', $data, TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
    }
    
    public function store_loan_collection(){
        
    	$savedData = array();
    	$loan_id=$this->input->post('ac_id',TRUE);
        $savedData['acc_id']=$this->input->post('ac_id',TRUE);
        
        $today=$this->input->post('today',TRUE);
        $savedData['today']=$today;
			
		$from = $this->input->post('installment_date', TRUE);
		$phpdate=$from;
		$installment_date = date("Y-m-d", strtotime($phpdate)); 
		$savedData['installment_date'] = $installment_date ;
		
        $installment_fee=$this->input->post('installment_fee',TRUE);
        $savedData['per_installment_fee']=$installment_fee;
        
        
        $soncoy=$this->input->post('soncoy',TRUE);
        $savedData['soncoy']=$soncoy;
        
        $savedData['created_at'] = date('Y-m-d');
        $savedData['updated_at'] = date('Y-m-d');
        $created_by = $this->session->userdata('admin_id');
        $savedData['created_by'] = $created_by;
        $updated_by = $this->session->userdata('admin_id');
        $savedData['updated_by'] = $updated_by;
        
        $ac_info=$this->super_admin_model->selectLoanAcInfoByACId($loan_id);
        
        
        
     	if($ac_info->deposit_type==1){
		$sc_profit= $soncoy/100;
        $savedData['sc_profit']=$sc_profit;
		}
     
     if($installment_date<$today){
       if($ac_info->deposit_type==1){
		$fine= ($installment_fee*1)/100;
        $savedData['per_installment_fine']=$fine;
		}
     }else{
         $savedData['per_installment_fine']=0;
     }
     
     $loan_amount = $ac_info->approved_loan_amount;
     $interest_amount = ($loan_amount*$ac_info->interestPercent)/100;
     
     $total_amount = $loan_amount+$interest_amount;
     
     $sum_collect_loan_amount = $this->super_admin_model->select_sum_loan_collection($loan_id);
     $sumCollectLoanAmount= $sum_collect_loan_amount->per_installment_fee;
     
     
     
     $sum_installment_fine_amount = $this->super_admin_model->select_sum_fine_loan_collection($loan_id);
     $sumInstallmentFineAmount = $sum_installment_fine_amount->per_installment_fine;
     
	 $due_amount = round ($total_amount + $sumInstallmentFineAmount )- $sumCollectLoanAmount ;
      
     if($due_amount<$installment_fee){
         $sdata = array();
        $sdata['message'] = "Sorry You Are Try To Use Wrong Information";
        $this->session->set_userdata($sdata);
     }else{
        $this->super_admin_model->store_loan_collection($savedData);
        $sdata = array();
        $sdata['message'] = "Successfully Insert";
        $this->session->set_userdata($sdata);
     }
        redirect('super_admin/collectLoan/'.$loan_id);
        
        
    }
	
	
	
	public function cashOutFromLoanAccount($loan_id) {
            $data = array();
			
			$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
			
            $data['title'] = 'Account Open'; 
			$data['ac_info']=$this->super_admin_model->selectLoanAcInfoByACId($loan_id);
			$loan_member=$data['ac_info']->loan_member;
			$data['ac_holder_info']=$this->super_admin_model->selectLoanAcHolderInfoByACId($loan_member);
			
			$data['loan_collect_info']=$this->super_admin_model->slect_loan_collect_info($loan_id);
			
			 $sum_collect_loan_amount = $this->super_admin_model->select_sum_loan_collection($loan_id);
             $sumCollectLoanAmount= $sum_collect_loan_amount->installment_fee;
             $data['sumCollectLoanAmount'] = $sumCollectLoanAmount;
     
     
            $sum_installment_fine_amount = $this->super_admin_model->select_sum_fine_loan_collection($loan_id);
             $sumInstallmentFineAmount = $sum_installment_fine_amount->per_installment_fine;
			 $data['sumInstallmentFineAmount'] = $sumInstallmentFineAmount;
			 
			  $sum_soncoy = $this->super_admin_model->select_soncoy_collection($loan_id);
             $soncoy = $sum_soncoy->soncoy;
			 $data['sum_soncoy'] = $soncoy;
			 
			  $sum_soncoy_profit = $this->super_admin_model->select_soncoy_profit_collection($loan_id);
             $soncoy_profit = $sum_soncoy_profit->sc_profit;
			 $data['sum_soncoy_profit'] = $soncoy_profit;
			$totalSoncoy=$soncoy+$soncoy_profit;
			
			
		   $toal_uttolon=$this->super_admin_model->totalUttolonFromSoncoy($loan_id);
		   $cash_out_money=$toal_uttolon->sc_cash_out;
		   $data['total_uttolon_money']=$cash_out_money;
		  
		  $presentBalance = $totalSoncoy-$cash_out_money;
		  $data['presentBalance']= $presentBalance;
			
			$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
			
 		    $data['admin_content'] = $this->load->view('admin/shrom-kollan/cash_out_loan_money', $data, TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
    }
	public function saveCashOutFromLoanAccount() {
		
		$savedData = array();
		$loan_id=$this->input->post('ac_id',TRUE);
        $savedData['acc_id']=$this->input->post('ac_id',TRUE);
        
        
		
		$from = $this->input->post('today', TRUE);
		$phpdate=$from;
		$fromdate = date("Y-m-d", strtotime($phpdate)); 
		$savedData['today'] = $fromdate ;
        $savedData['installment_date']= $fromdate ;
		
		
		$balanceMoney= $this->input->post('presentBalance');
		$cashOutmoney = $this->input->post('sc_cash_out');
		$savedData['sc_cash_out']=$cashOutmoney;
		
		
		
		$savedData['created_at'] = date('Y-m-d');
		$savedData['updated_at'] = date('Y-m-d');
		$created_by = $this->session->userdata('admin_id');
		$savedData['created_by'] = $created_by;
		$updated_by = $this->session->userdata('admin_id');
		$savedData['updated_by'] = $updated_by;
		
	    if($balanceMoney>=$cashOutmoney){
			
        $this->super_admin_model->store_loan_collection($savedData);
		$sdata = array();
        $sdata['message'] = "Successfully Paid!";
        $this->session->set_userdata($sdata);
		}else{
		$sdata = array();
        $sdata['message'] = "You Are Try To Use Wrong Information";
        $this->session->set_userdata($sdata);
		}

        redirect('super_admin/cashOutFromLoanAccount/'.$loan_id);
    }
	
public function addVoucherCategory() {
        $this->load->library('form_validation');
        $postdata = array(
            array(
                'field' => 'voucher_category',
                'label' => 'Voucher Category',
                'rules' => 'required'
            ),
            array(
                'field' => 'voucher_type',
                'label' => 'Type',
                'rules' => 'required'
            )           
        );

        $this->form_validation->set_rules($postdata);

        if ($this->form_validation->run() == FALSE) {
            $data = array();
			
			$sessionUser = $this->session->userdata('admin_id');
            $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
            $data['sessionUserDetails']=$sessionUserDetails;
			
            $data['title'] = 'add Voucher Category';
            $data['listVoucherCategory'] = $this->super_admin_model->selectAllVoucherCategory();
           
			$data['admin_content'] = $this->load->view('admin/shrom-kollan/add_voucher_category', $data, TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
        } else {
            $savedData = array();
            $savedData['voucher_category'] = $this->input->post('voucher_category', TRUE);
            $savedData['voucher_type'] = $this->input->post('voucher_type', TRUE);
			
            $savedData['created_at'] = date('Y-m-d');
            $savedData['updated_at'] = date('Y-m-d');
            $created_by = $this->session->userdata('admin_id');
            $savedData['created_by'] = $created_by;
            $updated_by = $this->session->userdata('admin_id');
            $savedData['updated_by'] = $updated_by;


            $this->super_admin_model->save_voucher_cat_info($savedData);

            $data = array();      
            $data['title'] = 'add User';
			$sessionUser = $this->session->userdata('admin_id');
			$sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
			$data['sessionUserDetails']=$sessionUserDetails;
			$sessionUser = $this->session->userdata('admin_id');
            $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
            $data['sessionUserDetails']=$sessionUserDetails;
		    $data['admin_content'] = $this->load->view('admin/shrom-kollan/add_voucher_cat_success_message', '', TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
			
			
        }
    }	
public function editVoucherCategory($voucher_category_id) {
        $data = array();
		$data['title'] = 'Edit Voucher Category';  
		$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
		
        $data['selectVoucherCat']=$this->super_admin_model->selectVoucherCatByCatId($voucher_category_id);
		 $data['listVoucherCategory'] = $this->super_admin_model->selectAllVoucherCategory();  
          
      
       $data['admin_content'] = $this->load->view('admin/shrom-kollan/edit_voucher_category', $data, TRUE);
       $this->load->view('admin/shrom-kollan/master', $data);
    }	
 public function updateVoucherCategory() {
        $savedData = array();
        $voucher_cat_id = $this->input->post('voucher_cat_id', TRUE);
        $savedData['voucher_cat_id'] = $this->input->post(voucher_cat_id);
        $savedData['voucher_category'] = $this->input->post('voucher_category', TRUE);	
        $savedData['voucher_type'] = $this->input->post('voucher_type', TRUE);         
           
                 
		$savedData['updated_at'] = date('Y-m-d');
		$updated_by = $this->session->userdata('admin_id');
		$savedData['updated_by'] = $updated_by;
	   
        $this->super_admin_model->updateVoucherCategoryById($savedData, $voucher_cat_id);

        $sdata = array();
        $sdata['message'] = "Update Successfully!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/editVoucherCategory/' . $voucher_cat_id);
    }	
public function addAssetCategory() {
        $this->load->library('form_validation');
        $postdata = array(
            array(
                'field' => 'asset_category',
                'label' => 'Voucher Category',
                'rules' => 'required'
            )          
        );

        $this->form_validation->set_rules($postdata);

        if ($this->form_validation->run() == FALSE) {
            $data = array();
			
			$sessionUser = $this->session->userdata('admin_id');
            $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
            $data['sessionUserDetails']=$sessionUserDetails;
			
            $data['title'] = 'add Asset Category';
            $data['listAssetCategory'] = $this->super_admin_model->selectAllAssetCategory();
           
			$data['admin_content'] = $this->load->view('admin/shrom-kollan/add_asset_category', $data, TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
        } else {
            $savedData = array();
            $savedData['asset_category'] = $this->input->post('asset_category', TRUE);
            $savedData['asset_type'] = $this->input->post('asset_type');
			
            $savedData['created_at'] = date('Y-m-d');
            $savedData['updated_at'] = date('Y-m-d');
            $created_by = $this->session->userdata('admin_id');
            $savedData['created_by'] = $created_by;
            $updated_by = $this->session->userdata('admin_id');
            $savedData['updated_by'] = $updated_by;


            $this->super_admin_model->save_asset_cat_info($savedData);

            $data = array();      
            $data['title'] = 'add User';
			$sessionUser = $this->session->userdata('admin_id');
			$sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
			$data['sessionUserDetails']=$sessionUserDetails;
			$sessionUser = $this->session->userdata('admin_id');
            $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
            $data['sessionUserDetails']=$sessionUserDetails;
		    $data['admin_content'] = $this->load->view('admin/shrom-kollan/add_asset_cat_success_message', '', TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
			
			
        }
    }	
	
	
	public function editAssetCategory($asset_category_id) {
        $data = array();
		$data['title'] = 'Edit Asset Category';  
		$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
		
        $data['selectAssetCat']=$this->super_admin_model->selectAssetCatByCatId($asset_category_id); $data['listAssetCategory'] = $this->super_admin_model->selectAllAssetCategory();      
          
      
       $data['admin_content'] = $this->load->view('admin/shrom-kollan/edit_asset_category', $data, TRUE);
       $this->load->view('admin/shrom-kollan/master', $data);
    }
	 public function updateAssetCategory() {
        $savedData = array();
        $asset_category_id = $this->input->post('asset_category_id', TRUE);
        $savedData['asset_category_id'] = $this->input->post('asset_category_id', TRUE);
        $savedData['asset_category'] = $this->input->post('asset_category', TRUE);	
        $savedData['asset_type'] = $this->input->post('asset_type', TRUE);         
           
                 
		$savedData['updated_at'] = date('Y-m-d');
		$updated_by = $this->session->userdata('admin_id');
		$savedData['updated_by'] = $updated_by;
	   
        $this->super_admin_model->updateAssetCategoryById($savedData, $asset_category_id);

        $sdata = array();
        $sdata['message'] = "Update Successfully!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/editAssetCategory/' . $asset_category_id);
    }
   
public function addAsset() {
        $this->load->library('form_validation');
        $postdata = array(
            array(
                'field' => 'asset_cat_id',
                'label' => 'Asset Category',
                'rules' => 'required'
            ),  
			array(
                'field' => 'date',
                'label' => 'Date',
                'rules' => 'required'
            ),
			array(
                'field' => 'quantity',
                'label' => 'Quantity',
                'rules' => 'required'
            ),	
			array(
                'field' => 'item',
                'label' => 'Item Name',
                'rules' => 'required'
            ),
			array(
                'field' => 'cost',
                'label' => 'Cost',
                'rules' => 'required'
            ),			
        );

        $this->form_validation->set_rules($postdata);

        if ($this->form_validation->run() == FALSE) {
            $data = array();
			
			$sessionUser = $this->session->userdata('admin_id');
            $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
            $data['sessionUserDetails']=$sessionUserDetails;
			
            $data['title'] = 'Asset List';
            $data['listAssetCategory'] = $this->super_admin_model->selectAllAssetCategory();
			$data['listAsset'] = $this->super_admin_model->selectAllAsset();
			
			$sumOfAmountAssetPurchase=$this->super_admin_model->selectsumOfassetAmount();		
			$data['sumOfAmountAssetPurchase']=$sumOfAmountAssetPurchase->cost;	
           
			$data['admin_content'] = $this->load->view('admin/shrom-kollan/add_asset', $data, TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
        } else {
            $savedData = array();
			
			
			$from = $this->input->post('date', TRUE);
			$phpdate=$from;
			$fromdate = date("Y-m-d", strtotime($phpdate)); 
			$savedData['date'] = $fromdate ;
			
            $savedData['asset_cat_id'] = $this->input->post('asset_cat_id', TRUE);
			$savedData['quantity'] = $this->input->post('quantity');
            $savedData['item'] = $this->input->post('item', TRUE);
			$savedData['purchase_by'] = $this->input->post('purchase_by');
            $savedData['supplier'] = $this->input->post('supplier', TRUE);
			$savedData['asset_condition'] = $this->input->post('asset_condition');
            $savedData['cost'] = $this->input->post('cost', TRUE);
			$savedData['warranty'] = $this->input->post('warranty');
            $savedData['yearly_depreciation_increase_decrease'] = $this->input->post('yearly_depreciation_increase_decrease', TRUE);
			$savedData['depreciation_percent'] = $this->input->post('depreciation_percent');
          
            
			
            $savedData['created_at'] = date('Y-m-d');
            $savedData['updated_at'] = date('Y-m-d');
            $created_by = $this->session->userdata('admin_id');
            $savedData['created_by'] = $created_by;
            $updated_by = $this->session->userdata('admin_id');
            $savedData['updated_by'] = $updated_by;


            $this->super_admin_model->save_asset_info($savedData);

            $data = array();      
            $data['title'] = 'Asset Insert';
			$sessionUser = $this->session->userdata('admin_id');
			$sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
			$data['sessionUserDetails']=$sessionUserDetails;
			$sessionUser = $this->session->userdata('admin_id');
            $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
            $data['sessionUserDetails']=$sessionUserDetails;
		    $data['admin_content'] = $this->load->view('admin/shrom-kollan/add_asset_success_message', '', TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
			
			
        }
    }	   
   
 public function addVoucher() {
        $this->load->library('form_validation');
        $postdata = array(
            array(
                'field' => 'voucher_category_id',
                'label' => 'Voucher Category',
                'rules' => 'required'
            ),  
			array(
                'field' => 'voucher_date',
                'label' => 'Date',
                'rules' => 'required'
            ),
			array(
                'field' => 'voucher_money',
                'label' => 'Amount',
                'rules' => 'required'
            ),	
			array(
                'field' => 'voucher_by',
                'label' => 'Voucher By',
                'rules' => 'required'
            )			
        );

        $this->form_validation->set_rules($postdata);

        if ($this->form_validation->run() == FALSE) {
            $data = array();
			
			$sessionUser = $this->session->userdata('admin_id');
            $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
            $data['sessionUserDetails']=$sessionUserDetails;
			
            $data['title'] = 'Voucher List';
			
			$data['listVoucherCategory'] = $this->super_admin_model->selectAllVoucherCategory();  
			$data['listVoucher'] = $this->super_admin_model->selectAllVoucher();
			
			$sumOfAmountCreditVoucher=$this->super_admin_model->selectSumOfAmountCreditVoucher();	$data['sumOfAmountCreditVoucher']=$sumOfAmountCreditVoucher->voucher_money;
			$sumOfAmountDebitVoucher=$this->super_admin_model->selectSumOfAmountDebitVoucher();	
			$data['sumOfAmountDebitVoucher']=$sumOfAmountDebitVoucher->voucher_money;				
           
			$data['admin_content'] = $this->load->view('admin/shrom-kollan/add_voucher', $data, TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
        } else {
            $savedData = array();
			
			
			$from = $this->input->post('voucher_date', TRUE);
			$phpdate=$from;
			$fromdate = date("Y-m-d", strtotime($phpdate)); 
			$savedData['voucher_date'] = $fromdate ;
			
            $savedData['voucher_category_id'] = $this->input->post('voucher_category_id', TRUE);
			$savedData['memo_no'] = $this->input->post('memo_no');
            $savedData['voucher_money'] = $this->input->post('voucher_money', TRUE);
			$savedData['voucher_by'] = $this->input->post('voucher_by');
            $savedData['details'] = $this->input->post('details', TRUE);
			
          
            
			
            $savedData['created_at'] = date('Y-m-d');
            $savedData['updated_at'] = date('Y-m-d');
            $created_by = $this->session->userdata('admin_id');
            $savedData['created_by'] = $created_by;
            $updated_by = $this->session->userdata('admin_id');
            $savedData['updated_by'] = $updated_by;


            $this->super_admin_model->save_voucher_info($savedData);

            $data = array();      
            $data['title'] = 'Voucher Insert';
			$sessionUser = $this->session->userdata('admin_id');
			$sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
			$data['sessionUserDetails']=$sessionUserDetails;
			$sessionUser = $this->session->userdata('admin_id');
            $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
            $data['sessionUserDetails']=$sessionUserDetails;
		    $data['admin_content'] = $this->load->view('admin/shrom-kollan/add_voucher_success_message', '', TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
			
			
        }
    }	
 
public function cashBook() {

        $data = array();
		
		$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
       
        $data['title'] = 'CashBook';
       
		$data['totalGoldCollection']=$this->super_admin_model->selectAllGoldCashBookCollection();	
		$data['totalLoanCollection']=$this->super_admin_model->selectAllLoanCashBookCollection();	$data['totalLoanPaid']=$this->super_admin_model->selectAllpaidLoanCashBookCollection();		
		$data['listAsset'] = $this->super_admin_model->selectAllAsset();
		$data['listDebitVoucher'] = $this->super_admin_model->selectAllDebitVoucher();
		$data['listCreditVoucher'] = $this->super_admin_model->selectAllCreditVoucher();
		
		
		

		$sumOfgoldCollection=$this->super_admin_model->selectsumOfgoldCollection();
		$data['sumOfgoldCollection']=$sumOfgoldCollection->collected_money;

		$sumOfLoanCollection=$this->super_admin_model->selectsumOfLoanCollection();		
		$data['sumOfLoanCollection']=$sumOfLoanCollection->per_installment_fee;
		
		$sumOfLoanSoncoyCollection=$this->super_admin_model->selectsumOfLoanSoncoyCollection();		
		$data['sumOfLoanSoncoyCollection']=$sumOfLoanSoncoyCollection->soncoy;
		
		
		$sumOfgoldUttolon=$this->super_admin_model->selectsumOfgoldUttolon();
		$data['sumOfgoldUttolon']=$sumOfgoldUttolon->uttolon_money;
		
		$sumOfLoanSoncoyUttolon=$this->super_admin_model->selectsumOfLoanSoncoyUttolon();		
		$data['sumOfLoanSoncoyUttolon']=$sumOfLoanSoncoyUttolon->sc_cash_out;
		
		$sumOfLoanPaid=$this->super_admin_model->selectsumOfLoanPaid();		
		$data['sumOfLoanPaid']=$sumOfLoanPaid->approved_loan_amount;
		
		$sumOfAmountAssetPurchase=$this->super_admin_model->selectsumOfassetAmount();		
		$data['sumOfAmountAssetPurchase']=$sumOfAmountAssetPurchase->cost;	
		
		$sumOfAmountCreditVoucher=$this->super_admin_model->selectSumOfAmountCreditVoucher();
		$data['sumOfAmountCreditVoucher']=$sumOfAmountCreditVoucher->voucher_money;
		$sumOfAmountDebitVoucher=$this->super_admin_model->selectSumOfAmountDebitVoucher();	
		$data['sumOfAmountDebitVoucher']=$sumOfAmountDebitVoucher->voucher_money;
		
        $data['admin_content'] = $this->load->view('admin/shrom-kollan/cashBook', $data, TRUE);
        $this->load->view('admin/shrom-kollan/master', $data);
    }
public function cashBalance() {

        $data = array();
		
		$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
       
        $data['title'] = 'CashBook';
       

		$sumOfgoldCollection=$this->super_admin_model->selectsumOfgoldCollection();
		$data['sumOfgoldCollection']=$sumOfgoldCollection->collected_money;

		$sumOfLoanCollection=$this->super_admin_model->selectsumOfLoanCollection();		
		$data['sumOfLoanCollection']=$sumOfLoanCollection->per_installment_fee;
		
		$sumOfLoanSoncoyCollection=$this->super_admin_model->selectsumOfLoanSoncoyCollection();		
		$data['sumOfLoanSoncoyCollection']=$sumOfLoanSoncoyCollection->soncoy;
		
		
		$sumOfgoldUttolon=$this->super_admin_model->selectsumOfgoldUttolon();
		$data['sumOfgoldUttolon']=$sumOfgoldUttolon->uttolon_money;
		
		$sumOfLoanSoncoyUttolon=$this->super_admin_model->selectsumOfLoanSoncoyUttolon();		
		$data['sumOfLoanSoncoyUttolon']=$sumOfLoanSoncoyUttolon->sc_cash_out;
		
		$sumOfLoanPaid=$this->super_admin_model->selectsumOfLoanPaid();		
		$data['sumOfLoanPaid']=$sumOfLoanPaid->approved_loan_amount;
		
		$sumOfAmountAssetPurchase=$this->super_admin_model->selectsumOfassetAmount();		
		$data['sumOfAmountAssetPurchase']=$sumOfAmountAssetPurchase->cost;	
		
		$sumOfAmountCreditVoucher=$this->super_admin_model->selectSumOfAmountCreditVoucher();
		$data['sumOfAmountCreditVoucher']=$sumOfAmountCreditVoucher->voucher_money;
		$sumOfAmountDebitVoucher=$this->super_admin_model->selectSumOfAmountDebitVoucher();	
		$data['sumOfAmountDebitVoucher']=$sumOfAmountDebitVoucher->voucher_money;
		
        $data['admin_content'] = $this->load->view('admin/shrom-kollan/cashBalance', $data, TRUE);
        $this->load->view('admin/shrom-kollan/master', $data);
    }
   
   
   
   public function getCashReport() {
		$data = array();
		$data['title']='Cash Report';
		
        $date1 = $this->input->post('search_date_one', TRUE);
        $date1 = date_create($date1);
        $date1 = date_format($date1, "Y-m-d");
        $date1 = $date1;
		
		$data['date1']= $date1;
		
		$date2 = $this->input->post('search_date_two', TRUE);
        $date2 = date_create($date2);
        $date2 = date_format($date2, "Y-m-d");
        $date2 = $date2;
		$data['date2']= $date2;
      

		$data['totalGoldCollection']=$this->super_admin_model->selectAllGoldCollectionCashReport($date1,$date2);	
				
		$data['totalLoanCollection']=$this->super_admin_model->selectAllLoanReport($date1,$date2);	
	
		$data['listDebitVoucher'] = $this->super_admin_model->selectAllDebitVoucherReport($date1,$date2);
				
		$data['totalLoanPaid']=$this->super_admin_model->selectAllpaidLoanCashReport($date1,$date2);
		
		$data['listAsset'] = $this->super_admin_model->selectAllAssetReport($date1,$date2);
		
	
		
		$data['listCreditVoucher'] = $this->super_admin_model->selectAllCreditVoucher($date1,$date2);
		
			
		

		$sumOfgoldCollection=$this->super_admin_model->selectsumOfgoldCollectionReport($date1,$date2);
		$data['sumOfgoldCollection']=$sumOfgoldCollection->collected_money;



		$sumOfLoanCollection=$this->super_admin_model->selectsumOfLoanCollectionReport($date1,$date2);$data['sumOfLoanCollection']=$sumOfLoanCollection->per_installment_fee;
		
		$sumOfLoanSoncoyCollection=$this->super_admin_model->selectsumOfLoanSoncoyCollectionReport($date1,$date2);		
		$data['sumOfLoanSoncoyCollection']=$sumOfLoanSoncoyCollection->soncoy;
		
		
		$sumOfgoldUttolon=$this->super_admin_model->selectsumOfgoldUttolonReport($date1,$date2);
		$data['sumOfgoldUttolon']=$sumOfgoldUttolon->uttolon_money;
		
		$sumOfLoanSoncoyUttolon=$this->super_admin_model->selectsumOfLoanSoncoyUttolonReport($date1,$date2);		
		$data['sumOfLoanSoncoyUttolon']=$sumOfLoanSoncoyUttolon->sc_cash_out;
		
		$sumOfLoanPaid=$this->super_admin_model->selectsumOfLoanPaidReportReport($date1,$date2);		
		$data['sumOfLoanPaid']=$sumOfLoanPaid->approved_loan_amount;
		
		$sumOfAmountAssetPurchase=$this->super_admin_model->selectsumOfassetAmountReport($date1,$date2);		
		$data['sumOfAmountAssetPurchase']=$sumOfAmountAssetPurchase->cost;	
		
		$sumOfAmountCreditVoucher=$this->super_admin_model->selectSumOfAmountCreditVoucherReport($date1,$date2);
		$data['sumOfAmountCreditVoucher']=$sumOfAmountCreditVoucher->voucher_money;
		$sumOfAmountDebitVoucher=$this->super_admin_model->selectSumOfAmountDebitVoucherReport($date1,$date2);	
		$data['sumOfAmountDebitVoucher']=$sumOfAmountDebitVoucher->voucher_money;


		/*
		$collectionData=$this->super_admin_model->selectAllGoldCollectionDateToDate($date1,$date2) 	 
        $data['collectionData']=$collectionData;		
        $todayGoldCollection=$this->super_admin_model->sumOfTotalGoldCollectionBetweenTwoDate($date1,$date2);
		$total=$todayGoldCollection->collected_money;		
		$data['total']=$total;	
		*/
		
		$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
		
		
		$data['admin_content'] = $this->load->view('admin/shrom-kollan/getCashReport', $data, TRUE);
        $this->load->view('admin/shrom-kollan/master', $data);
    }	
   
    public function addUser() {
        $this->load->library('form_validation');
        $postdata = array(
            array(
                'field' => 'admin_name',
                'label' => 'Admin Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'admin_type',
                'label' => 'Admin Type',
                'rules' => 'required'
            ),
            array(
                'field' => 'admin_email_address',
                'label' => 'Admin Email',
                'rules' => 'required|is_unique[tbl_admin.admin_email_address]'
            ),         
            array(
                'field' => 'admin_password',
                'label' => 'Password',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($postdata);

        if ($this->form_validation->run() == FALSE) {
            $data = array();
			
			$sessionUser = $this->session->userdata('admin_id');
            $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
            $data['sessionUserDetails']=$sessionUserDetails;
			
            $data['title'] = 'add user';
            $data['listUser'] = $this->super_admin_model->selectAllUser();
           
			$data['admin_content'] = $this->load->view('admin/shrom-kollan/add_user', $data, TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
        } else {
            $savedData = array();
            $savedData['admin_name'] = $this->input->post('admin_name', TRUE);
            $savedData['admin_email_address'] = $this->input->post('admin_email_address', TRUE);
            $password = $this->input->post('admin_password', TRUE);
            $savedData['admin_password'] = md5($password);
            $savedData['admin_type'] = $this->input->post('admin_type', TRUE);
            $savedData['contact_address'] = $this->input->post('contact_address', TRUE);  
            $savedData['user_details'] = $this->input->post('user_details', TRUE);  
            
            $savedData['created_at'] = date('Y-m-d');
            $savedData['updated_at'] = date('Y-m-d');
            $created_by = $this->session->userdata('admin_id');
            $savedData['created_by'] = $created_by;
            $updated_by = $this->session->userdata('admin_id');
            $savedData['updated_by'] = $updated_by;



            $config['upload_path'] = 'admin_img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '102400';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';
            $error = '';
            $fdata = array();

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('img_path')) {
                $savedData['img_path'] = 'NULL';               
            } else {
                $fdata = $this->upload->data();
                $savedData['img_path'] = $config['upload_path'] . $fdata['file_name'];
                $savedData['img_name'] = $fdata['file_name'];
            }


            $this->super_admin_model->save_adminUser_info($savedData);

            $data = array();      
            $data['title'] = 'add User';
			$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
			$sessionUser = $this->session->userdata('admin_id');
            $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
            $data['sessionUserDetails']=$sessionUserDetails;
		    $data['admin_content'] = $this->load->view('admin/shrom-kollan/add_user_success_message', '', TRUE);
            $this->load->view('admin/shrom-kollan/master', $data);
			
			
        }
    }
public function editUser($userId) {
        $data = array();
		$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
		
        $data['selectUser']=$this->super_admin_model->selectUserByUserId($userId);      
        $data['title'] = 'Edit User';      
      
	   $data['listUser'] = $this->super_admin_model->selectAllUser();
        $data['admin_content'] = $this->load->view('admin/shrom-kollan/editUser', $data, TRUE);
          $this->load->view('admin/shrom-kollan/master', $data);
    }
    public function updateUser() {
        $savedData = array();
        $admin_id = $this->input->post('admin_id', TRUE);
        $savedData['admin_id'] = $this->input->post('admin_id', TRUE);
        $savedData['admin_name'] = $this->input->post('admin_name', TRUE);	
        $savedData['admin_email_address'] = $this->input->post('admin_email_address', TRUE);         
        $savedData['admin_type'] = $this->input->post('admin_type', TRUE);  
        $savedData['contact_address'] = $this->input->post('contact_address', TRUE); 
        $savedData['mobile'] = $this->input->post('mobile', TRUE);
		$savedData['user_details'] = $this->input->post('user_details', TRUE);     
                 
		$savedData['updated_at'] = date('Y-m-d');
		$updated_by = $this->session->userdata('admin_id');
		$savedData['updated_by'] = $updated_by;
	   
        $this->super_admin_model->updateUserByUserId($savedData, $admin_id);

        $sdata = array();
        $sdata['message'] = "Update Successfully!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/editUser/' . $admin_id);
    }
    


     public function updateUserPicture() {
        $savedData = array();
        $admin_id = $this->input->post('admin_id', TRUE);
        $savedData['admin_id'] = $this->input->post('admin_id', TRUE);
        $savedData['updated_at'] = date('Y-m-d');


        $config['upload_path'] = 'admin_img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10240000';
        $config['max_width'] = '1024000';
        $config['max_height'] = '768000';
        $error = '';
        $fdata = array();
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('img_path')) {
            $error = $this->upload->display_errors();
            echo $error;
            exit();
        } else {
            $fdata = $this->upload->data();
            $savedData['img_path'] = $config['upload_path'] . $fdata['file_name'];
            $savedData['img_name'] = $fdata['file_name'];
        }



        
        $this->super_admin_model->updateUserByUserId($savedData, $admin_id);

        $sdata = array();
        $sdata['message'] = "Update Successfully!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/editUser/' . $admin_id);
    }
    
    
    public function listUser() {

        $data = array();
		
		$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
       
        $data['title'] = 'List User';
       
		$data['listUser'] = $this->super_admin_model->selectAllUser();
        $data['admin_content'] = $this->load->view('super_admin/listUser', $data, TRUE);
        $this->load->view('super_admin/super_master', $data);
    }
    
    public function deleteAdmin($admin_id) {
        $this->super_admin_model->delete_admin_info_by_id($admin_id);
        $sdata = array();
        $sdata['message'] = "Delete Information Successfully!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/listUser');
    }

    public function editLogo() {

        $data = array();
        $sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
        $data['title'] = 'Edit Logo';
        $data['print_title'] = $this->super_admin_model->select_title_info_by_id();   
        $data['admin_content'] = $this->load->view('super_admin/editLogo', $data, TRUE);
        $this->load->view('super_admin/super_master', $data);
    }
	
public function updateUserLogo() {
        $savedData = array();
        $title_id = $this->input->post('title_id', TRUE);
        $savedData['title_id'] = $this->input->post('title_id', TRUE);

        $config['upload_path'] = 'admin_img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10240000';
        $config['max_width'] = '1024000';
        $config['max_height'] = '768000';
        $error = '';
        $fdata = array();
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('logo')) {
            $error = $this->upload->display_errors();
            echo $error;
            exit();
        } else {
            $fdata = $this->upload->data();
            $savedData['logo'] = $config['upload_path'] . $fdata['file_name'];
            $savedData['logo_name'] = $fdata['file_name'];
        } $this->super_admin_model->update_title_info($savedData, $title_id);

        $sdata = array();
        $sdata['message'] = "Update Successfully!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/editLogo/' . $title_id);
    }


    public function showUser($userId) {
        $data = array();
		$sessionUser = $this->session->userdata('admin_id');
        $sessionUserDetails=$this->super_admin_model->sessionUserDetails($sessionUser);
        $data['sessionUserDetails']=$sessionUserDetails;
		
        $data['user_info'] = $this->super_admin_model->select_user_info_by_id($userId);
        $data['title'] = $data['user_info']->admin_name;

        $data['admin_content'] = $this->load->view('admin/shrom-kollan/showUser', $data, TRUE);
        $this->load->view('admin/shrom-kollan/master', $data);
    }




public function logout() {
        $sdata = array();
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_id');
        $sdata['message'] = 'You are Successfully Logout !';
        $this->session->set_userdata($sdata);
        redirect('admin_login', 'refresh');
    }
}

?>