<!-- Contact Start -->

<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2"> ĐẶT HÀNG THÀNH CÔNG</span></h2>
        <h5 style="color:red">Cảm ơn quý khách đã mua hàng</h5>
    </div>
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-5">
        
        </div>
            <div class="col-lg-12 mb-5">
            <div class="contact-form">
                <div id="success"></div>
                <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tiền</th>
                        
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php
                    $tong=0;
                    $i=0;
                    foreach($_SESSION['mycart'] as $cart){
                        $hinh=$image.$cart[3];
                        $ttien= intval($cart[2]) * $cart[4];
                        $tong+=$ttien;
                        echo '<tr>
                        <td class="align-middle"><img src="'.$hinh.'" alt="" style="width: 50px;">'.$cart[1].'</td>
                        <td class="align-middle">'.$cart[2].'</td>
                        <td class="align-middle">'.$cart[4].'</td>
                        <td class="align-middle">'.$cart[5].'đ</td>
                        
                    </tr>';
                        $i+=1;   
                    }
                    ?>  
                </tbody>
                </table>
                <?php
        echo '<div class="">
            <div >
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Số tiền cần phải trả:</h5>
                        <h5 class="font-weight-bold">'.$tong.' VND</h5>
                    </div>
                </div>
            </div>
        </div>';
        ?>

                </div>
                    
                    <a href="index.php" class="btn btn-block btn-primary my-3 py-3" >Quay lại trang chủ</a>
                </div>
            
            </div> 
        </form>

        
        
        
</div>
    <!-- Contact End -->