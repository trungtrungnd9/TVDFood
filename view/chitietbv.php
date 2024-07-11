
<!-- Shop Detail Start -->
<div class="container-fluid py-5">
                    <?php
                        extract($onebv);
                    ?>
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="border">
                        <div class="carousel-item active">
                            <?php
                            $hinhanh=$image.$hinhanh;
                            echo '<img class="w-50 h-50" src="'.$hinhanh.'" alt="Image">';
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <?php
                echo '<h3 class="font-weight-semi-bold">'.$tieu_de.'</h3>';
                ?>
                
                
                <?php
                echo '<h5 class="font-weight-semi-bold mb-4">'.$gioi_thieu.'</h5>';
                echo '<h6 class="mb-4">'.$noi_dung.'</h6>
                <form action="index.php?act=addtocart" method="post">
                    <div class="d-flex mb-3">
                        
                       
                        
                        <input type="hidden" name="tieude" value="'.$tieu_de.'">
                        <input type="hidden" name="id" value="'.$id.'">
                        <input type="hidden" name="gioithieu" value="'.$gioi_thieu.'">
                        <input type="hidden" name="hinhanh" value="'.$hinhanh.'">
                    </div>
                        
                </form>
                
                ';
                ?>
               
               


                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid pt-5">
        <div class="row px-xl-5">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        
                         $("#binhluan").load("view/binhluan/binhluanform.php",{idpro:<?=$id?>});
                    
                    });
                </script>

        <div class="card-header bg-secondary border-0 col-lg-12  ">
                        <h4 class="font-weight-semi-bold m-0">Noi dung binh luan</h4>
                    </div>                   
            <div class="col-lg-12 card border-secondary"  >
                <div class="card-body" id="binhluan">
                        

                </div>
            </div>
        </div>
    </div>

   

            
    

        

        </div>


</div>
    <!-- Shop Detail End -->


    
    
