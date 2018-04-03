<?php
@require_once("init.php");
$key = "banle";
$header["subtitle"] = "Danh sách phiếu bán lẻ";

/* Nhan du lieu dau vao */
$func = "";
$filter = array();
if (!empty($_POST["submit"])) $submit = true;
else $submit = false;

{
    $id = empty($_GET["id"])?0:intval($_GET["id"]);
    
    if (isset($_GET["thoigian_from"])) {
        $thoigian_from = empty($_GET["thoigian_from"])?"0000-00-00":$_GET["thoigian_from"];
    } else $thoigian_from = empty($_GET["thoigian_from"])?date("Y-m-") . "01":$_GET["thoigian_from"];
    $thoigian_to = empty($_GET["thoigian_to"])?date("Y-m-d"):$_GET["thoigian_to"];
    $func = empty($_GET["func"])?"view":$_GET["func"];
    
    
    $filter["thoigian_from"] = $thoigian_from;
    $filter["thoigian_to"] = $thoigian_to;
}

/* Tien xu ly du lieu */
if (empty($thoigian_to)) $thoigian_to = date("Y-m-d");
/* Thuc hien cac chuc nang */
$nhacungcap_list = $util->cache_data_array($table_nhacungcap, "id");
$nhanvien_list = $util->cache_data_array($table_nhanvien, "id");

//Xu ly du lieu
$banleid_arr[] = 0;
$banle_list = array();
$rs = $util->db_view($table_banle, "*", "trangthai = 1 AND (DATE(timestamp) BETWEEN \"$thoigian_from\" AND \"$thoigian_to\") ", array("timestamp"=>"DESC"));

while ($row = $db->sql_fetchrow($rs))
{

    $banleid_arr[] = $row["id"];
    $banle_list[$row["id"]] = $row;
}
$rs = $util->db_total($table_banle_chitiet, "banleid, sum(soluong*giaban) as thanhtien", "banleid", "banleid in (".implode(",", $banleid_arr).")");
while ($row = $db->sql_fetchrow($rs))
{
    $banle_list[$row["banleid"]]["thanhtien"] = $row["thanhtien"];
}
$array_data["view"] = $banle_list;


/* Xu ly hien thi du lieu */
$file = "banle.html"; $folder = "tpl";
if (!empty($customer_key) && file_exists($customer_key . "/" . $file)) $folder = $customer_key;
$xtpl = new XTemplate( $file, $folder );
//$xtpl = new XTemplate( "banle.html", "tpl" );
if (!empty($error_message))
{
    $xtpl->assign( "error_message", $error_message);
    $xtpl->parse( "main.error" );
}
$xtpl->assign( "data", $company_info );
$xtpl->assign( "thoigian_from_ten", date("d/m/Y", strtotime($thoigian_from)) );
$xtpl->assign( "thoigian_to_ten", date("d/m/Y", strtotime($thoigian_to)) );
$xtpl->assign( "header", $header );
$xtpl->assign( "filter", $filter );
$stt = 0; $total = 0;
foreach ($array_data["view"] as $value)
{
    $stt++;
    $value["stt"] = $stt;
    $total += $value["thanhtien"];
    $value["thanhtien_ten"] = $util->format($value["thanhtien"], $_thapphan);
   
    $value["timestamp_ten"] = str_replace(date(""), "", date("d/m/Y", strtotime($value["timestamp"])));
    $xtpl->assign( "row", $value );
    $xtpl->parse( "main.$func.row" );
}

$xtpl->assign( "total", $total );
$xtpl->assign( "total_ten", $util->format($total, $_thapphan) );
if (permission_check("manager", $user_info["groupid"])) $xtpl->parse( "main.$func.manager" );
$xtpl->parse( "main." . $func );

$xtpl->parse( "main" );
$content = $xtpl->text( "main" );

if ($func == "print") echo $content;
else {
    include("header.php");
    echo $content;
    include("footer.php");
}
?>