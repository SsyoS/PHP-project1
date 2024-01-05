<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $hh = new hanghoa();
    $result = $hh->getHangHoaId($id);
    $diadiem = $hh->getHangHoaall();
    $hinh = $result["hinh"];
    $tenxe = $result["tenxe"];
    $dongia = $result["dongia"];
    $mota = $result["mota"];
    $nhom = $result["Nhom"];
    $hangxe = $result["hangxe"];
    $loaixe = $result["loaixe"];

}
?>
<script type="text/javascript">


    function calcRate(r) {
        const f = ~~r, //Tương tự Math.floor(r)      
            id = 'star' + f + (r % f ? 'half' : '')
        id && (document.getElementById(id).checked = !0)
    }
    function handler(e) {
        var message = document.getElementById('soluong');
        var value = e.target.value;
        var a = `'${value}'`;

        var ngay = document.getElementById('ngaythue').value;
        var b = `'${ngay}'`;
        var date1 = new Date(a);      
        var date2 = new Date(b);
     if(date1.getTime() >= date2.getTime()){
        var timeDifference = date1.getTime() - date2.getTime();
        var daysDifference = timeDifference / (1000 * 3600 * 24);
        message.value = daysDifference;
     }else{
        alert('ngày kết thúc phải lớn hơn ngày thuê');
        message.value = "0";
     }
    }
</script>
<section style="margin-top:50px;">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mb-5 font-weight-bold">CHI TIẾT SẢN PHẨM</h3>
        </div>

    </div>
    <article class="col-12">
        <!-- <div class="card"> -->
        <div class="container-fliud">
            <div class="wrapper row">
                <form action="index.php?action=giohang" method="post">
                    <div style="display: flex;">
                        <div class="preview col-md-6">
                            <div class="tab-content">


                                <div class="tab-pane active" id=""><img src="./Content/hinhanh/<?php echo $hinh; ?>"
                                        alt="" width="200px" height="350px">
                                </div>
                            </div>
                        </div>
                        <div class="details col-md-6">
                            <input type="hidden" name="maxe" value="<?php echo $id; ?>" />
                            <h3 class="product-title">
                                <?php echo $tenxe; ?>
                                <?php
                                $hh = new hanghoa;
                                $result1 = $hh->gethangxe1();
                                while ($set1 = $result1->fetch()):
                                    if ($hangxe == $set1['mahangxe']) {
                                        echo ($set1['tenhangxe']);
                                    }
                                endwhile
                                ?>
                                -
                                <?php
                                $result2 = $hh->getloaixe1();
                                while ($set2 = $result2->fetch()):
                                    if ($loaixe == $set2['maloaixe']) {
                                        echo ($set2['tenloaixe']);
                                    }
                                endwhile
                                ?>
                                -
                                <?php echo $diadiem; ?>
                            </h3>
                            <div id="rating" style="width: 200px; ">
                                <input type="radio" id="star5" name="rating" value="5" />
                                <label class="full" for="star5" title="Awesome - 5 stars"></label>

                                <input type="radio" id="star4half" name="rating" value="4 and a half" />
                                <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>

                                <input type="radio" id="star4" name="rating" value="4" />
                                <label class="full" for="star4" title="Pretty good - 4 stars"></label>

                                <input type="radio" id="star3half" name="rating" value="3 and a half" />
                                <label class="half" for="star3half" title="Meh - 3.5 stars"></label>

                                <input type="radio" id="star3" name="rating" value="3" />
                                <label class="full" for="star3" title="Meh - 3 stars"></label>

                                <input type="radio" id="star2half" name="rating" value="2 and a half" />
                                <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>

                                <input type="radio" id="star2" name="rating" value="2" />
                                <label class="full" for="star2" title="Kinda bad - 2 stars"></label>

                                <input type="radio" id="star1half" name="rating" value="1 and a half" />
                                <label class="half" for="star1half" title="Meh - 1.5 stars"></label>

                                <input type="radio" id="star1" name="rating" value="1" />
                                <label class="full" for="star1" title="Sucks big time - 1 star"></label>

                                <input type="radio" id="starhalf" name="rating" value="half" />
                                <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                            </div>
                            <p class="product-description">
                                <?php echo $mota; ?>
                            </p>

                            <div class="row">

                                <div class="col-lg-4">
                                    <label style="font-size:15px;color:black;">Ngày thuê</label>
                                    <input type="date" class="form-control" id="ngaythue" name="ngaythue" readonly
                                        value="<?php echo date("Y-m-d"); ?>" />
                                </div>
                                <?php
                                $date = date("Y-m-d");
                                $newdate = strtotime('+ 1 day', strtotime($date));
                                $newdate = date('Y-m-d', $newdate);
                                // $ngay = date('d', strtotime($newdate));
                                // $thang = date('m', strtotime($newdate));
                                // $nam = date('Y', strtotime($newdate));
                                // // $hom_nay = time();
                                // // $ngay_mai = time() + 24 * 3600;
                                // // $songay = (int) (($ngay_mai - $hom_nay) / 86400);
                                // $ngay = date('d', $newdate);
                                // $thang = date('m', $newdate);    
                                // $nam = date('Y', $newdate);
                                // $newdate = date('Y-m-d', $newdate);
                                // $hom_nay = time();
                                // $ngay_mai1 = mktime(0,0,0,$ngay,$thang,$nam);
                                // $ngay_mai1 = mktime(0,0,0,$ngay,$thang,$nam);
                                // $ngay_mai1 = date('Y-m-d', $ngay_mai1 );
                                // echo($ngay_mai1);
                                ?>
                                -
                                <div class="col-lg-4">
                                    <label style="font-size:15px;color:black;">Ngày kết thúc</label>
                                    <input type="date" class="form-control" name="ngayketthuc"
                                        value="<?php echo (date($newdate)) ?>" onchange="handler(event);" /><BR><BR>
                                </div>

                            </div>
                            <div class="row" style="margin-top:-50px;">
                                <div class="col-lg-3">
                                    <label for="inputPassword6" class="col-form-label">Số ngày thuê: </label>
                                </div>
                                <div class="col-lg-2">
                                    <input type="number" class="form-control" id="soluong" name="soluong" min="1"
                                        max="100" value="1" size="10" readonly />
                                </div>


                            </div>
                            <h4 id="price" style="color: red;">Giá Thuê:
                                <?php echo (number_format($dongia)) ?>
                                <sup><u>đ</u></sup>
                            </h4>
                            <div class="action">

                                <button class="add-to-cart btn btn-default" type="submit" data-toggle="modal"
                                    data-target="#myModal">THUÊ NGAY
                                </button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </article>
    <div style="margin-top:50px;">
        <?php
        $maxe = $_GET['id'];
        $bl = new binhluan();
        $tong = $bl->getCount($maxe);
        ?>
        <p class="float-left"><b>Bình luận
                <?php echo ($tong) ?>
            </b></p><BR>
        <hr>
        <form action="index.php?action=binhluan&act=detail&id=<?php echo ($id) ?>" method="post">
            <div class="row">

                <input type="hidden" name="txtmaxe" value="<?php echo ($id) ?>" />
                <textarea class="input-field form-control" type="text" name="comment" rows="2" cols="70" id="comment"
                    placeholder="Thêm bình luận">  </textarea>
                <?php
                if (isset($_SESSION['makh'])) {
                    echo ('  <input type="submit" class="btn btn-primary " id="submitButton" style="float: right;" value="Bình Luận" />');
                } else {
                    echo ("<a href='index.php?action=dangnhap&act=chuadangnhap 'class='btn btn-primary' style='height: 50px;' > Bình Luận</a>");
                }
                ?>


            </div>
            <section>
        </form>
        <div class="row">
            <p class="float-left"><b>Các bình luận</b></p>
            <hr>
        </div>
        <?php
        $hh = new hanghoa();
        $result = $hh->getbl($id);
        $count = $result->rowCount();
        $limit = 4;
        $b = new page();
        $page = $b->findPage($count, $limit);
        $start = $b->findStart($limit);
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        ?>
        <table border="1" style="width: 550px; margin-top: 10px; ">
            <tr>
                <th style="padding-left: 20px;">
                    <?PHP
                    $i = 0;
                    $result = $hh->getlistbinhluan($start, $limit, $id);
                    while ($set = $result->fetch()):
                        $i++;
                        ?>
                        <p style="text-align: left;">
                            <?PHP echo $set['tenkh'] ?><br>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </p>

                        <p style="text-align: left; font-size:17px;font-weight: normal;">
                            <?PHP echo $set['noidung'] ?>
                        </p>


                        <a href=""><i class="fa-solid fa-thumbs-up"></i>
                            <?php echo $set['solike'] ?>
                        </a>
                        <a href=""><i class="fa-solid fa-thumbs-down"></i>
                            <?php echo $set['sodislike'] ?>
                        </a>
                        <span style="text-align: left;">
                            <?PHP echo $set['ngaybl'] ?>
                        </span>
                        <hr>
                        <?PHP
                    endwhile;
                    ?>
                    <div class="row">
                        <br />
                    </div>
                </th>
            </tr>
        </table>
    </div>
    <div class="col-md-6 div col-md-offset-3">
        <ul class="pagination">
            <?php
            if ($current_page > 1 && $page > 1) {
                echo '<li ><a href=" index.php?action=sanpham&act=detail&id=' . $id . '&page=' . ($current_page - 1) . '">Prev</a></li>';
            }

            ?>
            <?php
            if (isset($_GET['page'])) {
                for ($i = 1; $i <= $page; $i++) {

                    ?>
                    <li><a href="index.php?action=sanpham&act=detail&id=<?php echo ($id) ?>&page=<?php echo $i; ?>"><?php echo $i ?></a>
                    </li>
                    <?php
                }
            } else {
                if ($count > $limit) {
                    echo ('<li><a href="index.php?action=sanpham&act=detail&id=' . $id . '&page=' . $current_page . '">' . $current_page . '</a></li>');
                }
            }

            ?>
            <?php
            if ($current_page < $page && $page > 1) {
                echo '<li ><a href=" index.php?action=sanpham&act=detail&id=' . $id . '&page=' . ($current_page + 1) . '">next</a></li>';
            }
            ?>
        </ul>
    </div>
</section>