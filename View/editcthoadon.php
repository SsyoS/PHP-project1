<div class="card mt-3">
<script type="text/javascript">

function calcRate(r) {
    const f = ~~r,//Tương tự Math.floor(r)      
        id = 'star' + f + (r % f ? 'half' : '')
    id && (document.getElementById(id).checked = !0)
}
</script>
  <div class="card-header info" style="text-align:center;">
    EDIT chi tiết hóa đơn
  </div>
  <?php
        $mahd = $_GET['ma'];
        $maxe = $_GET['maxe'];
        $hh = new hanghoa();
        $result = $hh->getcthoadon1($mahd,$maxe);
        while ($set = $result->fetch()):
          ?>
  <div >
    <form action="index.php?action=cthoadon&act=update&ma=<?php  echo($set['masohd']);  ?>&maxe=<?php echo $set['maxe'] ?>"  method="post">
      <table class="table" style="border: 0px;">
          <tr>
            <td>mã số hóa đơn</td>
            <td><input type="text" readonly  class="form-control" name="masohd"  value="<?php echo($set['masohd']); ?>"></td>
          </tr>
          <tr>
            <td>mã xe</td>
            <td><input type="text"    readonly class="form-control" name="maxe"  value="<?php echo($set['maxe']); ?>"></td>
          </tr>
          <tr>
            <td>số ngày thuê</td>
            <td><input type="text"h class="form-control" name="soluongmua" id="soluongmua"  value="<?php echo($set['songaythue']);?>">
            </td>
          </tr>
          <tr>
            <td ><h3 id='price1'></h3>thành tiền</td>
      
            <td><input type="text"  readonly class="form-control" name="thanhtien"  value="<?php echo($set['thanhtien']);?>">
            </td>
          </tr>
          <tr>
            <td colspan="2" style="text-align: center;">
              <input class="btn btn-success" type="submit"  value="cập nhật">
          <?php
        endwhile;
        ?>
      </table>
    </form>
    
      </div>

</div>