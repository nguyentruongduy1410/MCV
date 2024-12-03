
<?php
   $ThanhToanController = new ThanhToanController();
   $html_thanhtoan = $ThanhToanController->showthanhtoan_html();
?>
<div class="container" id="thanhtoan">
    <?php 
    
    echo $html_thanhtoan;
    ?>
  
</div>