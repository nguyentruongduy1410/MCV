<?php
class NewsdetailController
{
    public function __construct()
    {
        include_once 'Models/NewsdetailModel.php';
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        $newsdetailModel = new NewsdetailModel();
        $newsdetailModel->getNewsDetail($id);
        $newsDetail = $newsdetailModel->newsDetail;

        include_once 'Views/newsdetail.php';
    }
}
?>
