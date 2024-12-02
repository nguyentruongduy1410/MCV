        <!-- giỏ hàng -->
        <div id="cart-gh">
            <h3>Giỏ hàng của bạn</h3>
            <?php 
                // echo var_dump($_SESSION['giohang']);
                
            ?>
            <div class="table-cart" id="giohang">
                <?=$cart_html?>
            </div>
            <a href="index.php?trang=cart&delcart=1">Xóa rỗng giỏ hàng</a>
    </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    $("#giohang").on("click",".up", function(){
                        // alert("The paragraph was clicked.");

                 
                        var soluong= parseInt($(".up").prev().prev().val()) + 1;
                        var key=$(".up").prev().val() ;
                        // alert(soluong+'---'+key);
                        $.post("changesoluong.php",
                            {
                                key: key,
                                soluong: soluong
                            },
                            function(data,status){
                            // alert("Data: " + data + "\nStatus: " + status);
                            $("#giohang").html("");
                            $("#giohang").html(data);
                        });
                    });
                });

                $("#giohang").on("click", ".down", function(){
            var soluong = parseInt($(this).next().val()) - 1;
            var key = $(this).next().next().val();
            
            if (soluong > 0) {
                $.post("changesoluong.php", {
                    key: key,
                    soluong: soluong
                }, function(data, status){
                    $("#giohang").html(data);
                });
            } 
        });

            </script>