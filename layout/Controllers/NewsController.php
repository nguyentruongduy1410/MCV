<?php
class NewsController {
    public function __construct($page) {
        include_once 'Models/NewsModel.php';
        $newsModel = new NewsModel();

        // Lấy dữ liệu bài viết
        $newsModel->getAllNews($page);
        $newsList = $newsModel->newsList;

        // Tính số trang
        $totalNews = $newsModel->getTotalNews();
        $newsPerPage = 5;
        $totalPages = ceil($totalNews / $newsPerPage);

        // Gọi view
        include_once 'Views/news.php';
    }
}
?>
