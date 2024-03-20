<?php
date_default_timezone_set("Asia/Taipei");
session_start();
class DB
{
    // protected $dsn = "mysql:host=localhost;charset=utf8;dbname=s1120412";
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=dbhw";
    protected $pdo;
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
        // $this->pdo = new PDO($this->dsn, 's1120412', 's1120412');
    }

    function all($where = '', $other = '')
    {
        $sql = "select * from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function count($where = '', $other = '')
    {
        $sql = "select count(*) from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        // echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }
    private function math($math, $col, $array = '', $other = '')
    {
        $sql = "select $math(`$col`) from `$this->table`";
        $sql = $this->sql_all($sql, $array, $other);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function sum($col = '', $where = '', $other = '')
    {
        return  $this->math('sum', $col, $where, $other);
    }
    function max($col, $where = '', $other = '')
    {
        return  $this->math('max', $col, $where, $other);
    }
    function min($col, $where = '', $other = '')
    {
        return  $this->math('min', $col, $where, $other);
    }


    function find($id)
    {

        $sql = "select * from `$this->table` ";

        if (is_array($id)) {
            $tmp = $this->a2s($id);
            $sql .= " where " . join(" && ", $tmp);
        } else if (is_numeric($id)) {
            $sql .= " where `id`='$id'";
        }
        //echo 'find=>'.$sql;
        $row = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    // 判斷是否有id欄位有id更新資料，指定where條件的id，沒有id就是新增資料
    function save($array)
    {
        if (isset($array['id'])) {
            $sql = "update `$this->table` set ";

            if (!empty($array)) {
                $tmp = $this->a2s($array);
            }
            $sql .= join(",", $tmp);
            $sql .= " where `id`='{$array['id']}'";
        } else {
            $sql = "insert into `$this->table` ";
            $cols = "(`" . join("`,`", array_keys($array)) . "`)";
            $vals = "('" . join("','", $array) . "')";

            $sql = $sql . $cols . " values " . $vals;
        }
        return $this->pdo->exec($sql);
    }


    function del($id)
    {

        $sql = "delete from `$this->table` where ";

        if (is_array($id)) {

            $tmp = $this->a2s($id);
            $sql .= join(" && ", $tmp);
        } else if (is_numeric($id)) {
            $sql .= " `id`='$id'";
        }
        //echo $sql;

        return $this->pdo->exec($sql);
    }
    // 用來查找沒有在上述自訂function，查找其他的可以使用
    function q($sql)
    {
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    //轉換陣列顯示的方式`$col`='$value'存放在新的$tmp陣列，這個值在用各個語法的方式取用
    private function a2s($array)
    {
        foreach ($array as $col => $value) {
            $tmp[] = "`$col`='$value'";
        }
        return $tmp;
    }

    private function sql_all($sql, $array, $other)
    {
        if (isset($this->table) && !empty($this->table)) {

            if (is_array($array)) {
                if (!empty($array)) {
                    $tmp = $this->a2s($array);
                    $sql .= " where " . join(" && ", $tmp);
                }
            } else {
                $sql .= " $array";
            }

            $sql .= $other;
            //echo 'all=>'.$sql;
            // $rows = $this->pdo->query($sql)->fetchColumn();
            return $sql;
        }
    }
}
function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url)
{
    header("location:$url");
}
$Title = new DB('titles');
$Total = new DB('total');
$Bottom = new DB('bottom');
$Ad = new DB('ad');
$Mvim = new DB('mvim');
$Image = new DB('image');
$News = new DB('news');
$Admin = new DB('admin');
$Mem = new DB('mem');
$Menu = new DB('menu');
$Book = new DB('book');
$Address = new DB('address');
$Room = new DB('room');
$Goods = new DB('goods');
$Order = new DB('orders');
$Type = new DB('type');
//$tables=array_keys(get_defined_vars());
/* dd($tables); */
// 如果網址存在do變數，用此變數轉換為首字大寫ucfirst
// 如果存在首字大寫變數名稱，就賦予$DB，否則以$Title賦予
if (isset($_GET['do'])) {
    //$key=ucfirst($_GET['do']);

    if (isset(${ucfirst($_GET['do'])})) {
        $DB = ${ucfirst($_GET['do'])};
    } else {
        $DB = $Title;
    }
    /* if(in_array($key,$tables)){
        $DB=$$key;
    } */
} else {
    $DB = $Title;
}

// 紀錄進站人數，如果不存在SESSION的visited，資料庫的total加1，並賦予SESSION的visited存在值
// 直到關掉瀏覽器都不會再加1

// if(!isset($_SESSION['visited'])){
//     $Total->q("update `total` set `total`=`total`+1 where `id`=1");
//     $_SESSION['visited']=1;

// }
if (!isset($_SESSION['visited'])) {
    $Total->q("update `total` set `total` = `total`+1 where `id`=1");
    $_SESSION['visited'] = 1;
}


function code(...$length)
{

    //使用亂數來產生驗證碼長度，判斷是否帶有參數來決定長度變數的產生方式
    $length = $length[0] ?? rand(4, 8);

    //宣告一個空字串，用來存放驗證碼字串
    $gstr = "";

    //使用for迴圈來產生符合$length的驗證碼
    for ($i = 0; $i < $length; $i++) {

        //使用while迴圈來判斷字串是否有重覆的字元
        while (mb_strlen($gstr) < $i + 1) {

            //使用亂數來決定這一次迴圈的字元類型
            $type = rand(1, 3);
            switch ($type) {
                case 1:
                    $t = rand(0, 9);       //使用rand()來產生0~9的任一數字
                    break;
                case 2:
                    $t = chr(rand(65, 90)); //使用chr()函式根據ASCII碼產生大寫字母
                    break;
                case 3:
                    $t = chr(rand(97, 122)); //使用chr()函式根據ASCII碼產生小寫字母
                    break;
            }

            //判斷亂數產生的字元是否已在$gstr字串中，不存在則加入，已存在則重新產生
            if (!mb_strpos($gstr, $t)) {
                $gstr .= $t;
            }
        }
    }
    return $gstr;
}

function captcha($str)
{
    $gstr = $str;

    //定義字型大小
    $fontsize = 24;

    //建立一個陣列用來儲存每一個字元的圖形資訊
    $text_info = [];

    //建立兩個變數用來計算所有字元的總寬度及最大高度
    $dst_w = 0;
    $dst_h = 0;

    //使用迴圈來逐一分析每個字元的圖形資訊
    for ($i = 0; $i < mb_strlen($gstr); $i++) {

        //使用mb_substr()順序取出每一個字元
        $char = mb_substr($gstr, $i, 1);

        //使用亂數產生一個正負之間的傾斜的角度
        $text_info[$char]['angle'] = rand(-25, 25);

        //使用imagettfbbox()來取得單一字元在大小,角度和字型的影響下，字元圖形的四個角的坐標資訊陣列
        $tmp = imagettfbbox($fontsize, $text_info[$char]['angle'], realpath('./fonts/arial.ttf'), $char);

        //利用字元的資訊，使用x坐標的最大值減最小值來計算出字元寬度，使用y坐標的最大值-最小值來計出字元高度
        //因坐標特性，需要加上1才能得到正確的寬度及高度
        $text_info[$char]['width'] = max($tmp[0], $tmp[2], $tmp[4], $tmp[6]) - min($tmp[0], $tmp[2], $tmp[4], $tmp[6]) + 1;
        $text_info[$char]['height'] = max($tmp[1], $tmp[3], $tmp[5], $tmp[7]) - min($tmp[1], $tmp[3], $tmp[5], $tmp[7]) + 1;

        //累加每個字元的寬度來計算總寬度
        $dst_w += $text_info[$char]['width'];

        //比較每一次字元的高度來決定最大高度
        $dst_h = ($dst_h >= $text_info[$char]['height']) ? $dst_h : $text_info[$char]['height'];

        //根據字型的資訊來取得字元的左上角坐標
        $text_info[$char]['x'] = min($tmp[0], $tmp[2], $tmp[4], $tmp[6]);
        $text_info[$char]['y'] = min($tmp[1], $tmp[3], $tmp[5], $tmp[7]);
    }

    //建立一個邊框的厚度變數
    $border = 10;

    //使用計算出來的總寬度和最大高度加上邊框厚度來計算驗證碼圖形的完整寬高
    $base_w = $dst_w + ($border * 2);
    $base_h = $dst_h + ($border * 2);

    //根據計算出來的驗證碼圖形完整寬高來建立一個全彩圖形資源
    $dst_img = imagecreatetruecolor($base_w, $base_h);

    //顏色定義區
    $white = imagecolorallocate($dst_img, 255, 255, 255);
    $black = imagecolorallocate($dst_img, 0, 0, 0);
    $blue = imagecolorallocate($dst_img, 0, 0, 255);
    $red = imagecolorallocate($dst_img, 255, 0, 0);
    $green = imagecolorallocate($dst_img, 0, 255, 0);

    //顏色陣列
    $colors = [
        imagecolorallocate($dst_img, 255, 127, 80),
        imagecolorallocate($dst_img, 204, 85, 0),
        imagecolorallocate($dst_img, 184, 115, 51),
        imagecolorallocate($dst_img, 204, 119, 34),
        imagecolorallocate($dst_img, 112, 66, 20),
        imagecolorallocate($dst_img, 80, 200, 120),
        imagecolorallocate($dst_img, 222, 49, 99),
        imagecolorallocate($dst_img, 128, 0, 0),
        imagecolorallocate($dst_img, 255, 204, 0),
        imagecolorallocate($dst_img, 128, 128, 0),
        imagecolorallocate($dst_img, 0, 255, 128),
        imagecolorallocate($dst_img, 0, 128, 128),
        imagecolorallocate($dst_img, 0, 0, 128),
        imagecolorallocate($dst_img, 75, 0, 128),
        imagecolorallocate($dst_img, 255, 140, 105),
        imagecolorallocate($dst_img, 218, 112, 214),
        imagecolorallocate($dst_img, 255, 128, 51),
    ];

    //填入底色        
    imagefill($dst_img, 0, 0, $white);

    //建立一個開始繪製文字圖形的起始坐標，由邊框的厚度開始繪製
    $x_pointer = $border;

    //使用迴圈把驗證碼文字逐一寫入到圖片中
    foreach ($text_info as $char => $info) {

        //計算放置的y坐標範圍，字元的高度加上邊框起始點(5)及總高度-底部坐標終點的限制(5)
        $y = rand($info['height'] + 5, $info['height'] + ($border * 2 - 5 * 2));

        //將字元依照大小，角度，坐標，顏色，字型等資訊畫在畫布上
        imagettftext($dst_img, $fontsize, $info['angle'], $x_pointer, $y, $colors[rand(0, count($colors) - 1)], realpath('./fonts/arial.ttf'), $char);

        //依照字元的寬度及字元的x坐標來產生下一個字元的x坐標起點
        $x_pointer = $x_pointer + $info['width'] + $info['x'] + 1;
    }

    //建立一個線條範圍亂數，決定圖形驗證碼上的干擾線數量
    $lines = rand(3, 6);

    //使用迴圈來產生每一條干擾線
    for ($i = 0; $i < $lines; $i++) {

        //使用亂數來產生起點x坐標，限定範圍為5開始到邊框厚度—5*2之間
        $left_x = rand(5, $border - (5 * 2));

        //使用亂數來產生起點y坐標，限定範圍為5開始到總高度—5之間
        $left_y = rand(5, $base_h - 5);

        //使用亂數來產生終點x坐標，限定範圍為邊框厚度開始到邊框厚度—5*2之間
        $right_x = rand($base_w - $border + 5, $base_w - 5);

        //使用亂數來產生終點y坐標，限定範圍為5開始到總高度—5之間
        $right_y = rand(5, $base_h - 5);

        //根據計算出來的起點和終點坐標來畫出干擾線
        imageline($dst_img, $left_x, $left_y, $right_x, $right_y, $colors[rand(0, count($colors) - 1)]);
    }

    //開啟輸出緩衝區(output buffer)
    ob_start();

    //產生png格式的圖片，此時會先暫時存放在緩衝區中不送出去
    imagepng($dst_img);

    //將緩衝區中的圖形圖片資料取回來指定給變數$output
    $output = ob_get_clean();

    //刪除處理完畢的圖形資源資料
    imagedestroy($dst_img);

    //使用base64的方式把緩衝區中的二進位圖形資料轉成base64的字串格式回傳出去
    //前方的data:image/png:base64, 是資料格式的宣告,讓瀏灠器可以知道這一段文字的功能是什麼
    return "data:image/png;base64," . base64_encode($output);
}
