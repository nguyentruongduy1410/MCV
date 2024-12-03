<?php
$ThanhToanController = new ThanhToanController();
$html_thanhtoan = $ThanhToanController->showthanhtoan_html();
?>
<style>
    
</style>
<div class="container" id="thanhtoan">
    
        <?php
        echo $html_thanhtoan;
        ?>
    
</div>