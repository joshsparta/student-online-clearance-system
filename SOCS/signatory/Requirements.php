<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Requirements
 *
 * @author ronversa09
 */
require_once '../config/config.php';

class Requirements extends Controller{
    private $template;
    private $schoolYearSem_model;
    
    
    public function __construct() {
        parent::__construct();
        $this->template = new Template();
        $this->schoolYearSem_model = new SchoolYearSem();
        
        $listOfSchoolYear = $this->schoolYearSem_model->getSchool_Year();
            
        $this->template->setPageName('Requirements Page');
        
        $this->template->set_username(Session::get_user());
        $this->template->set_surname(Session::get_Surname());
        $this->template->set_firstname(Session::get_Firstname());
        $this->template->set_middlename(Session::get_Middlename());
        $this->template->set_account_type(Session::get_Account_type() . " in Charge -");

        $this->template->setContent('RequirementsPage.tpl');
        $this->template->assign('assign_sign', ", " . Session::get_AssignSignatory());
        $this->template->assign('mySchool_Year', $listOfSchoolYear);
        
    }
    
     /*----------- For Adding Requirements Page ------------*/

    public function viewAdd_Requirements(){
        $this->template->setPageName("Adding Requirements Page");
        $this->template->setContent("Add_Requirements.tpl"); 
        
        if(isset($_POST['Next'])){
            if(trim($_POST['requirement_title']) != "" && trim($_POST['requirement_description']) != ""){
                /// procceed to the next page
                header('Location: ../signatory/requirements.php?action=viewNext_Add_Requirements&T_title=' .trim($_POST['requirement_title']) .'&T_desc=' .trim($_POST['requirement_description']));
            }else{
                $this->template->setAlert("Cannot Procceed if a field is empty!... ", Template::ALERT_ERROR);
            }
        }
    }
    
    /*----------- For the next page for Adding Requirements ------------*/
    
    public function viewNext_Add_Requirements($T_title, $T_desc){
        $this->template->setPageName("Adding Requirements Page");
        $this->template->setContent("Next_Add_Requirements.tpl"); 
              
        
    }
    
    /*------------ Display UI -----------------*/
    public function display() {
        $this->template->display('bootstrap.tpl');
    }
}

$controller = new Requirements();
$controller->perform_actions();
$controller->display();
?>