<div class="menu_title">
    <h1 style="text-align: center;color:red">今日菜单</h1>
    <hr/>
</div>
<div class="row">
    <form>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
            try {
                $dbh = new PDO('mysql:host=localhost;dbname=neptune', "root", "");
                $dbh->query("set names utf8");
                foreach ($dbh->query('SELECT * from menu where flag = 0') as $tmp) :
                    ?>
                    <div class="radio table-bordered menu_items">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="radio" name="menu" value="option1" class="sr-only">
                                <?php
                                if (!empty($tmp[2])) {
                                    ?>
                                    <img src="<?php echo $tmp[2] ?>" class="food_pic"/>
                                    <?php
                                } else {
                                    ?>
                                    <img src="jpg\0.gif" class="food_pic"/>
                                    <?php
                                } 
                                ?>
                            </div>
                            <div class="col-md-7">
                                <h4><?php echo $tmp[1] ?></h4><br/>

                                <p><?php echo $tmp[4] ?></p>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-primary comment"><span
                                        class="glyphicon glyphicon-comment"></span></button>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
                $dbh = null;
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage();
                die();
            }

            ?>
        </div>

        <div class="col-md-2">
            <button class="btn btn-warning" type="submit" style="position: fixed;margin-top:200px;">就吃这个了！</button>
        </div>
    </form>
</div>
