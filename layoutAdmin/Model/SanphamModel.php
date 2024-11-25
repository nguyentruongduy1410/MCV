<?php
class SanphamModel{
    public function dssp(): void{
         include_once("Model/connectmodel.php");
         $data = new ConnectModel();
         $sql = "SELECT * FROM san_pham ";
         $this->tcsp=$data->selectall(sql: $sql);
    }
}




?>