<?php
function insert_baiviet($id, $tieu_de, $gioi_thieu, $hinhanh, $noi_dung){
    $sql="INSERT INTO baiviet(id, tieu_de, gioi_thieu, hinhanh, noi_dung) 
    VALUES('$id', '$tieu_de','$gioi_thieu','$hinhanh','$noi_dung')";
    
    pdo_execute($sql);
}


function load_all_baiviet(){
    
    $sql="SELECT * FROM baiviet where 1";
    $list_baiviet=pdo_query($sql);
   
    return $list_baiviet;

 
};


function load_baiviet_tt($id,$id_baiviet){
    $sql="SELECT * FROM baiviet WHERE id=".$id_baiviet." AND id <> ".$id;
    $list_baiviet=pdo_query($sql);
    return $list_baiviet;
 }
 

function delete_baiviet($id){
    $sql="DELETE FROM baiviet WHERE id=".$id;
    pdo_execute($sql);
}


function loadone_baiviet($id){
    $sql="SELECT * FROM baiviet WHERE id=".$id;
    $baiviet=pdo_query_one($sql);
    return $baiviet;
 }

function update_baiviet($id, $tieu_de, $gioi_thieu, $hinhanh, $noi_dung){
    if($hinhanh!=""){
       $sql="UPDATE baiviet SET tieude='".$tieu_de."',gioithieu='".$gioi_thieu."',hinhanh='".$hinhanh."',noidung='".$noi_dung."' WHERE id=".$id;
     } //else{
    //     $sql="UPDATE baiviet SET  tieude='".$tieu_de."',gioithieu='".$gioi_thieu."',noidung='".$noi_dung."' WHERE id=".$id;
    // }
     
     pdo_execute($sql);
  }
    

  function loadall_dsbv(){
    $sql="SELECT * FROM baiviet where 1 ORDER BY id DESC LIMIT 0,6";
    $list_baiviet=pdo_query($sql);
    return $list_baiviet;
 }

?>

