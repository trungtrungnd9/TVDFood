<?php
session_start();
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/cart.php";
include "../model/thongke.php";
include "../model/baiviet.php";


include "header.php";
if((isset($_GET['act']))&&($_GET['act']!="")){
    $act=$_GET['act'];
switch ($act) {
    // danh muc
    case 'adddm':
        if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
            $tendm=$_POST['tendm'];
            insert_danhmuc($tendm);
            $thongbao="them thanh cong";
        }
        include "danhmuc/add.php";
        break;

    case 'listdm':

        $listdm=loadall_danhmuc();
        include "danhmuc/list.php";
        break;

    case 'suadm':
        if(isset($_GET['id'])&&($_GET['id']>0)){
            $danhmuc=add_danhmuc($_GET['id']);
        }
        include "danhmuc/update.php";
        break;

    case 'updatedm':
        if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
            $tendm=$_POST['tendm'];
            $id=$_POST['id'];
            update_danhmuc($tendm,$id);
        }
        $listdm=loadall_danhmuc();
        include "danhmuc/list.php";
        break;
    case 'xoadm':
        if(isset($_GET['id'])&&($_GET['id']>0)){
            delete_danhmuc($_GET['id']);
        }
            $listdm=loadall_danhmuc();
            include "danhmuc/list.php";
            break;   
    //san pham

    case 'addsp':
        if(isset($_POST['themsp'])&&($_POST['themsp'])){
            $tensp=$_POST['tensp'];
            $gia=$_POST['gia'];
            $dungluong=$_POST['dungluong'];
            $soluong=$_POST['soluong'];
            $mota=$_POST['mota'];
            $iddm=$_POST['iddm'];

            $file=$_FILES['hinh'];
            $img=$file['name'];
            move_uploaded_file($file['tmp_name'],"../upload/".$img);

            insert_sanpham($tensp,$img,$gia,$dungluong,$soluong,$mota,$iddm);
            $thongbao="them thanh cong";
        }
        $listdm=loadall_danhmuc();
        include "sanpham/add.php";
        break;

        case 'listsp':
            if(isset($_POST['listok'])&&($_POST['listok'])){
                $kyw=$_POST['kyw'];
                $iddm=$_POST['iddm'];
            }else{
                $kyw='';
                $iddm=0;
            }    
            $listdm=loadall_danhmuc();
            $listsp=loadall_sanpham($kyw,$iddm);
        include "sanpham/list.php";
        break;

        case 'suasp':
            if(isset($_GET['id'])&&($_GET['id']>0)){
                $sanpham=loadone_sanpham($_GET['id']);
            }
            $listdm=loadall_danhmuc();
            include "sanpham/update.php";
            break;

        case 'updatesp':
            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                $id=$_POST['id'];
                $iddm=$_POST['iddm'];
                $tensp=$_POST['tensp'];
                $gia=$_POST['gia'];
                $dungluong=$_POST['dungluong'];
                $soluong=$_POST['soluong'];
                $mota=$_POST['mota'];

                $file=$_FILES['hinh'];
                $img=$file['name'];
                move_uploaded_file($file['tmp_name'],"../upload/".$img);
                update_sanpham($id,$tensp,$img,$gia,$dungluong,$soluong,$mota,$iddm);
                $thongbao="cap nhat thanh cong";
            }
            $listdm=loadall_danhmuc();
            $listsp=loadall_sanpham('',0);
            include "sanpham/list.php";
            break;
                
            case 'xoasp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_sanpham($_GET['id']);
                }
                $listsp=loadall_sanpham('',0);
            include "sanpham/list.php";
            break;

            // tai khoan
            case 'dskh':
                $listtk = loadall_taikhoan();
            include "taikhoan/list.php";
            break;

            //binh luan
            case 'dsbl':
                $listbl = loadall_bladmin();
                include "binhluan/list.php";
                break;

            case 'xoabl':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_binhluan($_GET['id']);
                }
                    $listbl = loadall_bladmin();
                    include "binhluan/list.php";
                    break;
            // don hang
            case 'dsdh':
                $dsbill=loadall_bill();
                include "donhang/list.php";
                break;

                case 'suadh':
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        $id=$_GET['id'];
                        $donhang=loadone_billadmin($id);
                        $idbill=$id;
                        $billcart=loadall_cartadmin($idbill);
                    }
                    include "donhang/update.php";
                    break;

                case 'updatedh':
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        $id=$_POST['id'];
                        $trangthai=$_POST['trangthai'];
                        
                        update_bill($trangthai,$id);
                    }
                    $dsbill=loadall_bill();
                    include "donhang/list.php";
                    break;

                case 'xoadh':
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        delete_bill($_GET['id']); 
                    }
                    $dsbill=loadall_bill();
                    include "donhang/list.php";
                    break;  


                // thong ke
                case 'thongke':
                    $list_thongke = loadall_thongke();
                    include "thongke/list.php";
                    break;
    
                case 'bieudo':
                    $list_thongke = loadall_thongke();
                include "thongke/bieudo.php";
                break;

                //baiviet
                case 'baiviet':
                    $list_baiviet = load_all_baiviet();
                    $listds=loadall_dsbv();
                    include "baiviet/listbv.php";
                     break;

                case 'addbv';
                    if(isset($_POST['thembv'])&&($_POST['thembv'])){
                        $id= '';
                        $tieu_de=$_POST['tieude'];
                        $gioi_thieu=$_POST['gioithieu'];
                        $noi_dung=$_POST['noidung'];
            
                        $file=$_FILES['hinhanh'];
                        $hinhanh=$file['name'];
                        move_uploaded_file($file['tmp_name'],"../upload/".$hinhanh);
            
                        insert_baiviet( $id, $tieu_de, $gioi_thieu, $hinhanh, $noi_dung);
                        $thongbao="them thanh cong";
                        $list_baiviet = load_all_baiviet();
                    $listds=loadall_dsbv();
                    include "baiviet/listbv.php";
                    break;
                    }
                    $list_ds=loadall_dsbv();
                    include "baiviet/addbv.php";
                    break;

                          
                    case 'xoabv':
                        if(isset($_GET['id'])&&($_GET['id']>0)){
                            delete_baiviet($_GET['id']);
                        }
                        $list_baiviet=load_all_baiviet('',0);
                    include "baiviet/listbv.php";
                    break;


                    case 'suabv':
                        if(isset($_GET['id'])&&($_GET['id']>0)){
                            $baiviet=loadone_baiviet($_GET['id']);
                        }
                        $list_baiviet=load_all_baiviet();
                        include "baiviet/update.php";
                        break;
            
        
                    case 'updatebv':
                        if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                            $id='';
                            $tieu_de=$_POST['tieude'];
                            $gioi_thieu=$_POST['gioithieu'];
                            $noi_dung=$_POST['noidung'];
            
                            $file=$_FILES['hinhanh'];
                            $hinhanh=$file['name'];

                            move_uploaded_file($file['tmp_name'],"../upload/".$hinhanh);
                            update_baiviet($id, $tieu_de, $gioi_thieu, $hinhanh, $noi_dung);
                            $thongbao="cap nhat thanh cong";
                           

                        //  $list_ds=loadall_dsbv();
                        //  include "baiviet/listbv.php";
                        //  break;
                        }
                        $list_baiviet = load_all_baiviet();
                        $list_ds=loadall_dsbv();
                        include "baiviet/update.php";
                        break;
            
                      

                
    
    default:
        include "home.php";
        break;
}
}else{
    include "home.php";
}




include "footer.php";

?>