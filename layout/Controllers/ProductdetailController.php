<?php
class ProductdetailController {
    public function __construct($lenh, $noi_dung, $id, $iddm, $id_user) {
        include_once 'Models/ProductdetailModel.php';
        $productdetailmodel = new ProductdetailModel();
        if ($lenh == 'cmt') {
            $productdetailmodel->slbl($id, $id_user, $noi_dung);
            header("Location: index.php?trang=productdetail&id=$id&iddm=$iddm");
            exit();


        }
        $productdetailmodel->onesp($id);
        $productdetailmodel->splienquan($id, $iddm);
        $productdetailmodel->chitiethinhanh($id);
        $chitiethinhanh = $productdetailmodel->chitiethinhanh;
        $productdetailmodel->loadcmt($id, $id_user);
        include './Views/productdetails.php';
    }
}

?>
