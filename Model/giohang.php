<?php
class giohang
{
    function add_items($key, $quantity)
    {
        $prod = new hanghoa();
        $pros = $prod->getHangHoaId($key);
        $hinh = $pros["hinh"];
        $ten = $pros["tenxe"];
        $cost = $pros["dongia"];
        $bien = 0;
        if (isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
            foreach ($_SESSION['giohang'] as $key1 => $item) {
                echo ($item["quanty"]);
                if ($item["name"] == $ten ) {
                    $_SESSION['giohang'][$key1]["quanty"] += $quantity;
                    $_SESSION['giohang'][$key1]["total"] = $_SESSION['giohang'][$key1]["quanty"] * $item["cost"];
                    $bien = 1;
                    break;
                }
            }
        }
        $total = $cost * $quantity;
        $item = array(
            'maxe' => $key,
            'hinh' => $hinh,
            'name' => $ten,
            'cost' => $cost,
            'quanty' => $quantity,
            'total' => $total,
        );
        if ($bien == 0) {
            $_SESSION['giohang'][] = $item;
            $bien = 0;
        }

    }
    function getTotal()
    {
        $subtotal = 0;
        if (isset($_SESSION['giohang'])) {
            foreach ($_SESSION['giohang'] as $item) {
                $subtotal += $item['total'];
            }
        }
        return $subtotal;
    }
    function delete_items($vitri)
    {
        unset($_SESSION['giohang'][$vitri]);
    }
    function update_items($vitri, $soluong)
    {
        if ($soluong <= 0) {
            $this->delete_items($vitri);
        } else {
            $_SESSION['giohang'][$vitri]['quanty'] = $soluong;
            $total_new = $_SESSION['giohang'][$vitri]['quanty'] * $_SESSION['giohang'][$vitri]['cost'];
            $_SESSION['giohang'][$vitri]['total'] = $total_new;
        }

    }
}