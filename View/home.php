<div class="container" style="margin-top:30px;">
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./Content/hinhanh/content3.jpg" alt="" height="500px" width="100%" class="d-block ">
            </div>
            <div class="carousel-item">
                <img src="./Content/hinhanh/content4.jpg" alt="" height="500px" width="100%" class="d-block ">
            </div>
            <div class="carousel-item">
                <img src="./Content/hinhanh/content5.jpg" alt="" height="500px" width="100%" class="d-block ">
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <div style="padding-bottom: 50px;  text-align: center">

        <div class="container">
            <h1 style="text-align: center; font-size: 50px;">Xe Dành Cho Bạn</h1>
            <!-- sản phẩm-->
            <?php
    $hh = new hanghoa();
    $nhom = $hh->getHangHoaall();
    $result = $hh->getHangHoa2();
    $count = $result->rowCount();
    $limit = 3;
    $p = new page();
    $page = $p->findPage($count, $limit);
    $start = $p->findStart($limit);
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    ?>
            <form action="?action=timkiem" method="post">
                <table class="shadow-lg rounded-3" align="center" style="margin-bottom: 10px;">
                    <tr>
                        <th>
                            <div style="display: flex;">
                                <div>
                                    <p style="color:#767676;font-size:20px;">Địa điểm</p>
                                    <?php
           
            ?>
                                    <select name="diadiem" class="form-control" style="width:150px; margin-left: 20px;">
                                        <?php
                $hh = new hanghoa();
                $result10 = $hh->getmaloai();
                while ($set10 = $result10->fetch()):
                 
                  ?>
                                        <option value="<?php echo ($set10['tendiadiem']) ?> ">

                                            <?php
                    echo ($set10['tendiadiem'])
                      ?>
                                            <?php
                endwhile;

                ?>
                                        </option>

                                    </select>
                                </div>
                                <div>
                                    <p style="color:#767676;font-size:20px;">Hãng xe</p>
                                    <?php
           
            ?>
                                    <select name="hangxe" class="form-control" style="width:150px; margin-left: 20px;">
                                        <?php
                $hh = new hanghoa();
                $result11 = $hh->gethangxe1();
                while ($set11 = $result11->fetch()):
                 
                  ?>
                                        <option value="<?php echo ($set11['tenhangxe']) ?> ">

                                            <?php
                    echo ($set11['tenhangxe'])
                      ?>
                                            <?php
                endwhile;

                ?>
                                        </option>

                                    </select>
                                </div>
                                <div>
                                    <p style="color:#767676;font-size:20px;">Loại xe</p>
                                    <?php
           
            ?>
                                    <select name="loaixe" class="form-control" style="width:150px; margin-left: 20px;">
                                        <option value="0">
                                            Tất cả
                                        </option>
                                        <?php
                $hh = new hanghoa();
                $result12 = $hh->getloaixe1();
                while ($set12 = $result12->fetch()):
                 
                  ?>
                                        <option value="<?php echo ($set12['tenloaixe']) ?> ">

                                            <?php
                    echo ($set12['tenloaixe'])
                      ?>
                                            <?php
                endwhile;

                ?>
                                        </option>

                                    </select>
                                </div>
                                <div class="action">
                                    <button class="add-to-cart btn btn-success" type="submit"
                                        style="margin-left: 40px ;margin-top: 20px; margin-right: 20px;background-color:#198754;"> Tìm xe
                                    </button>
                                </div>
                            </div>
                        </th>
                    </tr>
                </table>
            </form>
            <section id="examples" class="text-center">
            <div class="container">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                <!--Grid row-->
                <div class="row row-cols-3" >
                    <?php

    $result = $hh->getlistpage3($start, $limit);

    while ($set = $result->fetch()):

        ?>
                    <!--Grid column-->
                    <div class="col-lg-4" style="width:30%;border: 2px solid gainsboro;border-radius: 10px;margin-left: 20px;margin-top: 20px;padding-top: 15px;padding-bottom: 15px;padding-left: 15px;padding-right: 15px;">
                        <div class="view overlay z-depth-1-half" style="margin-bottom: 15px;">
                        <img src="./Content/hinhanh/<?php echo $set['hinh'] ?>" class="img-fluid rounded-3">     
                            <div class="mask rgba-white-slight"></div>
                        </div>

                        <a href="index.php?action=sanpham&act=detail&id=<?php echo $set["maxe"] ?>">
                            <span style="color: black;"><B>

                                    <!-- <?php echo $set['tenxe'] ?> -->
                                    <?php
                        $result1 = $hh->gethangxe1();
                        while ($set1 = $result1->fetch()):
                            if ($set['hangxe'] == $set1['mahangxe']) {
                                echo ($set1['tenhangxe']);
                            }
                        endwhile
                        ?>
                                    -
                                    <?php
                        $result2 = $hh->getloaixe1();
                        while ($set2 = $result2->fetch()):
                            if ($set['loaixe'] == $set2['maloaixe']) {
                                echo ($set2['tenloaixe']);
                            }
                        endwhile
                        ?>
                        -
                                    <?php echo $nhom ?>
                                </B></span></br></a>
                        <p style="text-align: justify;">
                            <?php echo $set['mota'] ?>
                        </p>

                        <div class="row">
                            <div class="col-lg-6">

                                <h2 style="color:gray; font-size:25px;">
                                    <?php echo number_format($set['dongia']); ?>
                                    <sup><u>đ</u></sup><br>
                                </h2>
                            </div>

                            <div class="col-lg-6" style="text-align: right;">
                                <a href="index.php?action=sanpham&act=detail&id=<?php echo $set["maxe"] ?>"> <button
                                        class="btn btn-success" id="may4" value="lap 4"
                                        style="width: 150px; height: 50px;">
                                        <span style="font-size:20px;font-weight: bold;">Chọn</span>
                                    </button></a>
                            </div>
                        </div>
                    </div>
                    <?php
    endwhile
    ?>
                </div>

                <!--Grid row-->
                </div>
            </section>
        </div>
        <!-- <hr>
<h1 style="text-align: center; font-size: 50px;">ĐỊA ĐIỂM NỔI BẬT</h1>
<img src="./Content/hinhanh/content3.jpg" alt="da" > -->
    </div>