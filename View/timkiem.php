<div class="container" style="margin-top: 25px;">
    <?php
    if ($loaixe != 0) {
        $hh = new hanghoa();
        $result = $hh->getHangh($diadiem, $hangxe, $loaixe);
        $count = $result->rowCount();
        $limit = 3;
        $p = new page();
        $page = $p->findPage($count, $limit);
        $start = $p->findStart($limit);

        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    }else{
        $hh = new hanghoa();
        $result = $hh->getHangh1($diadiem, $hangxe);
        $count = $result->rowCount();
        $limit = 3;
        $p = new page();
        $page = $p->findPage($count, $limit);
        $start = $p->findStart($limit);

        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;   
    }
    ?>
    <h1 style="text-align: center;">
        <?php echo ($hangxe) ?> -
        <?php echo ($loaixe) ?> -
        <?php echo ($diadiem) ?>
    </h1>
    <h1 style="text-align: center;"> Hiện có :
        <?php echo ($count) ?> xe
    </h1>
    <form action="?action=timkiem" method="post">
        <table class="shadow-lg rounded-3" align="center" style="margin-bottom: 10px;">
            <tr>
                <th>
                    <div style="display: flex;">
                        <div>
                            <p style="color:#767676;font-size:20px;"> Địa điểm</p>
                            <?php

                            ?>
                            <select name="diadiem" class="form-control" style="width:150px; margin-left: 20px;">
                                <?php
                                $hh = new hanghoa();
                                $result10 = $hh->getmaloai();
                                while ($set10 = $result10->fetch()):

                                    ?>
                                    <option value="<?php echo ($set10['tendiadiem']) ?> " <?php if (($set10['tendiadiem']) == $diadiem) {
                                            echo (" selected");
                                        } ?>>

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
                                    <option value="<?php echo ($set11['tenhangxe']) ?> " <?php if (($set11['tenhangxe']) == $hangxe) {
                                            echo ("selected");
                                        } ?>>

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
                                    <option value="<?php echo ($set12['tenloaixe']) ?> " <?php if (($set12['tenloaixe']) == $loaixe) {
                                            echo ("selected");
                                        } ?>>

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
                            <button class="add-to-cart btn btn-default" type="submit"
                                style="margin-left: 40px ;margin-top: 20px; margin-right: 20px;background-color:#198754;"> Tìm xe
                            </button>
                        </div>
                    </div>
                </th>
            </tr>
        </table>
    </form>
    <section id="examples" class="text-center">
    <div class="row row-cols-3" style="margin-bottom: 40px;">
            <?php
            if($loaixe !=0){
                $result = $hh->getlistpage1($start, $limit, $diadiem, $hangxe, $loaixe);
            }else{
                $result = $hh->getlistpage2($start, $limit, $diadiem, $hangxe);
            }
       

            while ($set = $result->fetch()):

                ?>

                <!--Grid column-->
                <div class="col-lg-4" style="width:30%;border: 2px solid gainsboro;border-radius: 10px;margin-left: 20px;margin-top: 20px;padding-top: 15px;padding-bottom: 15px;padding-left: 15px;padding-right: 15px;">
                    <div class="view overlay z-depth-1-half">
                        <img src="./Content/hinhanh/<?php echo $set['hinh'] ?>" class="img-fluid rounded-3">
                        <div class="mask rgba-white-slight"></div>
                    </div>

                    <a href="index.php?action=sanpham&act=detail&id=<?php echo $set["maxe"] ?>">
                        <span style="color: black;"><B>

                                <?php echo $set['tenxe'] ?>
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

                            </B></span></br></a>
                    <p style="text-align: left;">
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
                                    style="width: 150px; height: 50px; margin-bottom: 5px;">

                                    <span style="font-size:20px;font-weight: bold;">Chọn</span>
                                </button></a>
                        </div>
                    </div>
                </div>
                <?php
            endwhile
            ?>
        </div>
    </section>
</div>