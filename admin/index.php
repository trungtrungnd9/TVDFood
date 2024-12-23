<?php
session_start();
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/cart.php";


include "header.php";
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tendm = $_POST['tendm'];
                insert_danhmuc($tendm);
                $thongbao = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;

        case 'listdm':

            $listdm = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $danhmuc = add_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;

        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tendm = $_POST['tendm'];
                $id = $_POST['id'];
                update_danhmuc($tendm, $id);
            }
            $listdm = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }
            $listdm = loadall_danhmuc();
            include "danhmuc/list.php";


        case 'addsp':
            if (isset($_POST['themsp']) && ($_POST['themsp'])) {
                $tensp = $_POST['tensp'];
                $gia = $_POST['gia'];
                $size = $_POST['size'];
                $soluong = $_POST['soluong'];
                $mota = $_POST['mota'];
                $luotxem = $_POST['luotxem'];
                $iddm = $_POST['iddm'];

                $file = $_FILES['hinhanh'];
                $img = $file['name'];
                move_uploaded_file($file['tmp_name'], "../upload/" . $img);

                insert_sanpham($tensp, $img, $gia, $size, $soluong, $mota, $iddm);

                $thongbao = "Thêm thành công";
            }
            $listdm = loadall_danhmuc();
            include "sanpham/add.php";
            break;

        case 'listsp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdm = loadall_danhmuc();
            $listsp = loadall_sanpham($kyw, $iddm);
            include "sanpham/list.php";
            break;

        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdm = loadall_danhmuc();
            include "sanpham/update.php";
            break;

        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $gia = $_POST['gia'];
                $size = $_POST['size'];
                $soluong = $_POST['soluong'];
                $mota = $_POST['mota'];
                $luotxem = $_POST['luotxem'];

                $file = $_FILES['hinh'];
                $img = $file['name'];
                move_uploaded_file($file['tmp_name'], "../upload/" . $img);
                update_sanpham($id, $tensp, $img, $gia, $dungluong, $soluong, $mota, $iddm);
                $thongbao = "cap nhat thanh cong";
            }
            $listdm = loadall_danhmuc();
            $listsp = loadall_sanpham('', 0);
            include "sanpham/list.php";
            break;

        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $listsp = loadall_sanpham('', 0);
            include "sanpham/list.php";
            break;

        case 'dsdh':
            $dsbill = loadall_bill();
            include "donhang/list.php";
            break;

        case 'suadh':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $donhang = loadone_billadmin($id);
                $idbill = $id;
                $billcart = loadall_cartadmin($idbill);
            }
            include "donhang/update.php";
            break;

        case 'updatedh':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $trangthai = $_POST['trangthai'];

                update_bill($trangthai, $id);
            }
            $dsbill = loadall_bill();
            include "donhang/list.php";
            break;

        case 'dskh':
            $listtk = loadall_taikhoan();

            include "taikhoan/list.php";
            break;






        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}




include "footer.php";
