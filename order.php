<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/neptune.css"/>
<style>
    td {
        text-align: center;
    }
</style>
<div class="menu_title">
    <h1 style="text-align: center;color:#000033">统计</h1>
    <hr/>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
            <table class="table table-striped table-hover table-bordered">
                <h3 style="text-align: center;color: black">按菜名统计</h3><hr/>
                <tr>
                    <td><b>菜名</b></td>
                    <td><b>数量</b></td>
                </tr>
                <?php
                include("conn.php");
                foreach ($dbh->query("SELECT dishname, count(*) as count FROM order_with_info GROUP BY dish_id ORDER BY count  DESC") as $row) {
                    echo '
                    <tr>
                    <td>'.$row['dishname'].'</td>
                    <td>'.$row['count'].'</td>
                    </tr>
                    ';
                }
                ?>
            </table>

            <table class="table table-striped table-hover table-bordered">
                <h3 style="text-align:center;color:black">按楼层统计</h3><hr/>
                <tr>
                    <td><b>楼层</b></td>
                    <td><b>菜名</b></td>
                    <td><b>数量</b></td>
                </tr>
                <?php
                $data = array();
                foreach ($dbh->query("SELECT `roomNo`,`dishname`,count(*) as count FROM `order_with_info` group by roomno, dish_id order by roomno DESC, count DESC") as $row) {
                    if( !isset($data[$row['roomNo']])  ) {
                        $data[$row['roomNo']] = array();
                        array_push( $data[$row['roomNo']], $row['roomNo'] );
                    }
                    array_push( $data[$row['roomNo']], array($row['dishname'], $row['count']) );
                }
                foreach( $data as $room ) {
                    $roomNo = $room[0];
                    $dishCnt = count($room) - 1;
                    echo '<tr>
                    <td style="text-align:center" rowspan='.$dishCnt.'><b>'.$roomNo.'</b></td>
                    <td>'.$room[1][0].'</td>
                    <td>'.$room[1][1].'</td>
                    </tr>';
                    for($i = 2; $i <= $dishCnt; $i++) {
                        echo '<tr>
                            <td>'.$room[$i][0].'</td>
                            <td>'.$room[$i][1].'</td>
                            </tr>';
                    }


                }
                ?>
            </table>

            <table class="table table-striped table-hover table-bordered">
                <h3 style="text-align: center;color:black">订餐详情</h3><hr/>
                <tr>
                    <td><b>订餐时间</b></td>
                    <td><b>用户名</b></td>
                    <td><b>楼层</b></td>
                    <td><b>菜名</b></td>
                </tr>
                <?php
                foreach ($dbh->query("SELECT * FROM `order_with_info` ORDER BY time DESC") as $row) {
                    echo '
                    <tr>
                    <td>'.$row['time'].'</td>
                    <td>'.$row['username'].'</td>
                    <td>'.$row['roomNo'].'</td>
                    <td>'.$row['dishname'].'</td>
                </tr>
                    ';
                }
                ?>
            </table>

</div>