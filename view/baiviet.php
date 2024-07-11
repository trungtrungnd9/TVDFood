<!-- Shop Start -->
<div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                
                <!-- Price End -->
                
                <!-- Color Start -->
                
                <!-- Color End -->

                <!-- Size Start -->
               
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3 class="font-weight-semi-bold">Bài viết </h3>
                            
                        </div>
                    </div>

                    <?php

                        foreach ($list_baiviet as $baiviet) {
                            extract($baiviet);
                            $anh=$image.$hinhanh;

                            $idbv="index.php?act=baivietct&idbv=".$id;
                            echo'<div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                            <input type="hidden" name="id" value="'.$id.'">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <a href="'.$idbv.'"><img class="img-fluid w-60" src="'.$anh.'" alt=""></a>
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">'.$tieu_de.'</h6>
                                  
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                  
                                </div>
                            </div>
                        </div>';
                        }
                    ?>


                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                          <ul class="pagination justify-content-center mb-3">
                            <li class="page-item disabled">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->