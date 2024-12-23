<!-- Contact Start -->
<div class="container-fluid pt-5">
<div class="row">
        <table class="table table-bordered text-center mb-0">
                                <div class="card-header bg-secondary border-0">
                                <h5 class="font-weight-semi-bold m-0">Thông tin khách hàng</h5>
                                </div>
                                <br>
                    <?php
                            extract($donhang);
                    ?>

                            <li><strong> Tên khách hàng:</strong>  <?=$user ?></li>
                            <li><strong>Email:</strong>  <?=$email?></li>
                            <li><strong>Địa chỉ:</strong>  <?=$diachi?></li>
                            <li><strong>Số điện thoại:</strong>  <?=$sdt?></li>
                            <li><strong>Mã đơn hàng:</strong>   DH-<?=$id?></li>
                            <li><strong>Ngày đặt hàng:</strong>  <?=$ngaydathang?></li>
                            <li><strong>Tổng tiền:</strong>  <?=$tongdonhang?> VND</li>
                            
                            <li><strong>Phương thức thanh toán:</strong>  
                                <?php
                                switch ($pttt) {
                                    case '0':
                                        $txtmess="Thanh toán khi nhận hàng";
                                        break;

                                        case '1':
                                            $txtmess="Thanh toán online";
                                            break;
                                            case '2':
                                                $txtmess="Thanh toán qua QRcode";
                                                break;
                                    
                                    default:
                                        $txtmess="quý khách chưa chọn phương thức thanh toán";
                                        break;
                                }
                                ?>
                                <?= $txtmess?>
                        
                        </li>

                        <li><strong>Trạng thái:</strong>  
                                <?php
                                switch ($trangthai) {
                                    case '0':
                                        $tt="Chờ xác nhận";
                                        break;

                                    case '1':
                                        $tt="Đã xác nhận";
                                        break;
                                    case '2':
                                        $tt="Đang giao";
                                        break;
                                    case '3':
                                        $tt="Giao thành công";
                                        break;
                                        case '4':
                                            $tt="Giao thất bại";
                                            break;
                                    default:
                                        $tt="";
                                        break;
                                }
                                ?>
                                <?= $tt?>
                        
                        </li>             
        </table>

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
                        $ttien= intval($cart[2]) * $cart[4];
                        $tong+=$ttien;
                        echo '<tr>
                        <td class="align-middle"><img src="" alt="" style="width: 50px;">'.$cart[1].'</td>
                        <td class="align-middle">'.$cart[2].'</td>
                        <td class="align-middle">'.$cart[4].'</td>
                        
                        <td class="align-middle">'.$cart[5].'</td>
                        
                    </tr>';
                        $i+=1;   
                    }
                    ?>  
                </tbody>
                    </table>
                    
            
                    <div class="card-footer alert-secondary">
                        <div class="d-flex justify-content-between mt-2 ">
                            <h5 class="font-weight-bold">Số tiền cần phải trả:</h5>
                            <h5 class="font-weight-bold"><?=$tong?> VND</h5>
                        </div>
                    </div>
               
                    <div class="row pt-5">
                    <?php
                            extract($donhang);
                    ?>
                    
                    

                    

                    
                   

                    <form action="index.php?act=updatedh" method="post">
                        <h5 class="font-weight-bold">Cập nhật trạng thái</h5>
                        
                        <div>
           
                            <?php if($trangthai === "0") {?>
                                <select name="trangthai" id="">
                                    <option value="0" selected>Chờ Xác Nhận</option>
                                    <option value="1" >Đã Xác Nhận</option>
                                    <option value="2" disabled>Đang Giao</option>
                                    <option value="3" disabled>Giao Thành Công</option>
                                    <option value="4" disabled>Giao Thất Bại</option>
                                    <option value="5" >Đã Hủy</option>
                                </select>
                            
                           
                            <?php } ?>
                            <?php if($trangthai === "1") {?>
                                <select name="trangthai" id="">
                                    <option value="0" disabled >Chờ Xác Nhận</option>
                                    <option value="1" selected>Đã Xác Nhận</option>
                                    <option value="2">Đang Giao</option>
                                    <option value="3" disabled>Giao Thành Công</option>
                                    <option value="4" disabled>Giao Thất Bại</option>
                                    <option value="5" disabled>Đã Hủy</option>
                                </select>
                            
                           
                            <?php } ?>
                            <?php if($trangthai === "2") {?>
                                <select name="trangthai" id="">
                                    <option value="0" disabled >Chờ Xác Nhận</option>
                                    <option value="1" disabled>Đã Xác Nhận</option>
                                    <option value="2" selected>Đang Giao</option>
                                    <option value="3" >Giao Thành Công</option>
                                    <option value="4" >Giao Thất Bại</option>
                                    <option value="5" disabled>Đã Hủy</option>
                                </select>
                            
                           
                            <?php } ?>
                            <?php if($trangthai === "3") {?>
                                <select name="trangthai" id="">
                                    <option value="0" disabled >Chờ Xác Nhận</option>
                                    <option value="1" disabled>Đã Xác Nhận</option>
                                    <option value="2" disabled>Đang Giao</option>
                                    <option value="3" selected>Giao Thành Công</option>
                                    <option value="4" disabled>Giao Thất Bại</option>
                                    <option value="5" disabled>Đã Hủy</option>
                                </select>
                            
                           
                            <?php } ?>
                            <?php if($trangthai === "4") {?>
                                <select name="trangthai" id="">
                                    <option value="0" disabled >Chờ Xác Nhận</option>
                                    <option value="1" disabled>Đã Xác Nhận</option>
                                    <option value="2" disabled>Đang Giao</option>
                                    <option value="3" disabled>Giao Thành Công</option>
                                    <option value="4" selected>Giao Thất Bại</option>
                                    <option value="5" disabled>Đã Hủy</option>
                                </select>
                            
                           
                            <?php } ?>
                            <?php if($trangthai === "5") {?>
                                <select name="trangthai" id="">
                                    <option value="0" disabled >Chờ Xác Nhận</option>
                                    <option value="1" disabled>Đã Xác Nhận</option>
                                    <option value="2" disabled>Đang Giao</option>
                                    <option value="3" disabled>Giao Thành Công</option>
                                    <option value="4" disabled>Giao Thất Bại</option>
                                    <option value="5" selected>Đã Hủy</option>
                                </select>
                            
                           
                            <?php } ?>
                            

                            <input type="hidden" name="id" value="<?= $id?>">
                            <input class="btn btn-primary" type="submit" name="capnhat" value="Cập nhật">
                          
                        </div>
                        
                    </form>
                  

                               
                   
                    
            </div>
</div>
    </div>
    <!-- Contact End -->