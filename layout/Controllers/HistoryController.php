<?php
class HistoryController{
    Public function __construct(){
        include_once 'Models/HistoryModel.php';
            $historymodel = new HistoryModel();
            $historymodel->dsuser();
    }
}
?>