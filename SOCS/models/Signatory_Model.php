<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Signatory_Model
 *
 * @author ronversa09
 */
class Signatory_Model extends Model{
    private $query;
    private $itemsPerPage = 30;
    private $filter_ID;
    private $filter_Name;
    private $filter_Desc;
    
    private $sign_name;
    private $sign_desc;
    
    public function __construct() {        
        parent::__construct();
        
        $this->query = "";
    }
    
    public function getFilter_ID(){
        return $this->filter_ID;
    }
    
    public function getFilter_Name(){
        return $this->filter_Name;
    }
    
    public function getFilter_Desc(){
        return $this->filter_Desc;
    }
    
    public function getSign_Name(){
        return $this->sign_name;
    }
    
    public function getSign_Desc(){
        return $this->sign_desc;
    }
    
    /*-----------------------------------------------*/
    
    public function filter($Tsign_name ,$Tpage){
        $this->query = mysql_query("select * from signatories
                                    where Signatory_Name like '%$Tsign_name%' order by Signatory_Name 
                                    LIMIT " . (($Tpage - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        $this->filter_ID = array();
        $this->filter_Name = array();
        $this->filter_Desc = array(); 
        while($row = mysql_fetch_array($this->query)){
            array_push($this->filter_ID, $row['0']);
            array_push($this->filter_Name, $row['1']);
            array_push($this->filter_Desc, $row['2']);
        }
        
    }
    /* ----------------------------------------*/
//    public function filter_ID($Tsign_name ,$Tpage){
//        $filter = array();
//        $this->query = mysql_query("select Signatory_ID from signatories
//                                    where Signatory_Name like '%$Tsign_name%' order by Signatory_Name 
//                                    LIMIT " . (($Tpage - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
//        
//        while($row = mysql_fetch_array($this->query)){
//            array_push($filter, $row['Signatory_ID']);
//        }
//        
//        return $filter;
//    }
//    
//    public function filter_SignName($Tsign_name, $Tpage){
//        $filter = array();
//        $this->query = mysql_query("select Signatory_Name from signatories
//                                    where Signatory_Name like '%$Tsign_name%' order by Signatory_Name 
//                                    LIMIT " . (($Tpage - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage );
//        
//        while($row = mysql_fetch_array($this->query)){
//            array_push($filter, $row['Signatory_Name']);
//        }
//        
//        return $filter;
//    }
//    
    /*-----------------------------------------*/
    
    public function getQueryPageSize($searchName) {
        $this->query = mysql_query("select Signatory_Name from signatories 
                        where Signatory_Name like '%$searchName%'");
        
        return mysql_num_rows($this->query) / $this->itemsPerPage;
    }
    
    public function deleteSignatory($key){
        $delete = mysql_query("delete from signatories where Signatory_ID = '$key'");
        if(!$delete){return "false";}
    }
    
    public function insert($sign_name, $description){
        mysql_query("INSERT INTO `socs`.`signatories` (`Signatory_ID`, `Signatory_Name`, `Description`) 
                    VALUES (NULL, '$sign_name', '$description')");
    }
    
    public function update($key, $newSignName, $newSignDesc){
        mysql_query("UPDATE `socs`.`signatories` SET `Signatory_Name` = '$newSignName',
                    `Description` = '$newSignDesc' WHERE `signatories`.`Signatory_ID` ='$key'");
    }
    
    public function getSign_Info($key){
        $this->query = mysql_query("select * from signatories where Signatory_ID = '$key'");
        
        $row = mysql_fetch_array($this->query);
        $this->sign_name = $row['Signatory_Name'];
        $this->sign_desc = $row['Description'];
    }
    
    public function updateSignature($signatoryID, $imgpath){ 
        mysql_query("update signatories set signature_image='$imgpath' where signatory_id='$signatoryID'");
    }
    
    public function getSignature($signatoryID){
        $this->query = mysql_query("select signature_image from signatories where signatory_id='$signatoryID'");
        $row = mysql_fetch_array($this->query);

        return $row[0];
    }
    
    public function resetSignature($signatoryID){
        mysql_query("update signatories set signature_image=NULL where signatory_id='$signatoryID'");
    }
    
//    public function getSign_Name($key){
//        $this->query = mysql_query("select Signatory_Name from signatories where Signatory_ID = '$key'");
//        $row = mysql_fetch_array($this->query);
//        
//        return $row['Signatory_Name'];
//    }
//    
//    public function getSign_Desc($key){
//        $this->query = mysql_query("select Description from signatories where Signatory_ID = '$key'");
//        $row = mysql_fetch_array($this->query);
//        
//        return $row['Description'];
//    }
    
    public function getListofSignatoryName() {
        $rowInfo = array();
        $this->query = mysql_query("select signatory_name from signatories order by signatory_name");

        while ($row = mysql_fetch_array($this->query)) {
            array_push($rowInfo, $row['signatory_name']);
        }

        return $rowInfo;
    }
    
    /*------- for testing existing name --------*/
    
    public function isExist($sign_name, $description, $use_for){
        $this->query = mysql_query("select count(Signatory_Name) from signatories where (Signatory_Name = '$sign_name' OR 
                                    description = '$description') and Used_For = '$use_for'");
        
        $row = mysql_fetch_array($this->query);
        
        return $row['0'] > 0 ? true : false;
    }
}

?>
