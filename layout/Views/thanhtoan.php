<?php
$ThanhToanController = new ThanhToanController();
$html_thanhtoan = $ThanhToanController->showthanhtoan_html();
?>
<div class="container" id="thanhtoan">
    <div class="form-section summary-section promo-code total" >
        <?php
        echo $html_thanhtoan;
        ?>
    </div>
    
</div>