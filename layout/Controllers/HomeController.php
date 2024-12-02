<?php
    class HomeController{
        public function __construct($id, $iddb, $iddm){
            include_once 'Models/HomeModel.php';
            $homemodel = new HomeModel();
            if($id != ''){
                include_once 'Views/productdetails.php';

            }else{
                $homemodel->dssp();
                $homemodel->spdb($iddb);
                $homemodel->dmsp(iddm:$iddm);
                $iddm1 = 1;
                $homemodel->spdm($iddm1);
                $iddm2 = 2;
                $homemodel -> spdm($iddm2);
                include_once 'Views/home.php';
            }
        }
    };
?>