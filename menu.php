
<script src="js/jquery-2.1.4.min.js"></script>
<script>
    $(document).ready(function(){
        $(".menu_items").on("click",function(){

            $(this).css("background-color","#FFCC99").find("[name='menu']").attr("checked","true");
            $(this).find(".glyphicon-ok").removeClass("hide");
            $(this).siblings(".menu_items").css("background-color","#FFFFFF").find(".glyphicon-ok").addClass("hide");

        }).on("mouseover",function() {
            $(this).css({"cursor":"hand"});
        }).on("mouseout",function(){
            $(this).css({"cursor":"pointer"});
        });

    });
</script>
<div class="menu_title">
    <h1 style="text-align: center;color:#000033">今日菜单</h1><hr/>
</div>
<div class="row">
    <form>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="table-bordered menu_items">
                <div class="row">
                    <div class="col-md-3">
                        <input type="radio" name="menu" value="option1" class="hide"/>
                        <img src="src/青椒肉丝.jpg" class="food_pic"/>
                    </div>
                    <div class="col-md-7">
                        <h4>青椒肉丝饭</h4><br/>
                        <p>青椒肉丝是一道色香味俱全的汉族名菜，属于川菜系。以青椒为主要食材，口味香辣，色香味俱全，营养价值丰富</p>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-primary comment"><span class="glyphicon glyphicon-comment"></span></button>
                    </div>
                    <div class="col-md-1">
                        <span class="glyphicon glyphicon-ok hide" style="color:green;margin:10px;"></span>
                    </div>
                </div>
            </div>
            <div class="table-bordered menu_items">
                <div class="row">
                    <div class="col-md-3">
                        <input type="radio" name="menu" value="option1" class="hide"/>
                        <img src="src/青椒肉丝.jpg" class="food_pic"/>
                    </div>
                    <div class="col-md-7">
                        <h4>青椒肉丝饭</h4><br/>
                        <p>青椒肉丝是一道色香味俱全的汉族名菜，属于川菜系。以青椒为主要食材，口味香辣，色香味俱全，营养价值丰富</p>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-primary comment"><span class="glyphicon glyphicon-comment"></span></button>
                    </div>
                    <div class="col-md-1">
                        <span class="glyphicon glyphicon-ok hide" style="color:green;margin:10px;"></span>
                    </div>
                </div>
            </div>
                <div class="table-bordered menu_items">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="radio" name="menu" value="option1" class="hide"/>
                            <img src="src/青椒肉丝.jpg" class="food_pic"/>
                        </div>
                        <div class="col-md-7">
                            <h4>青椒肉丝饭</h4><br/>
                            <p>青椒肉丝是一道色香味俱全的汉族名菜，属于川菜系。以青椒为主要食材，口味香辣，色香味俱全，营养价值丰富</p>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-primary comment"><span class="glyphicon glyphicon-comment"></span></button>
                        </div>
                        <div class="col-md-1">
                            <span class="glyphicon glyphicon-ok hide" style="color:green;margin:10px;"></span>
                        </div>
                     </div>
                </div>
            <div class="table-bordered menu_items">
                <div class="row">
                    <div class="col-md-3">
                        <input type="radio" name="menu" value="option1" class="hide"/>
                        <img src="src/青椒肉丝.jpg" class="food_pic"/>
                    </div>
                    <div class="col-md-7">
                        <h4>青椒肉丝饭</h4><br/>
                        <p>青椒肉丝是一道色香味俱全的汉族名菜，属于川菜系。以青椒为主要食材，口味香辣，色香味俱全，营养价值丰富</p>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-primary comment"><span class="glyphicon glyphicon-comment"></span></button>
                    </div>
                    <div class="col-md-1">
                        <span class="glyphicon glyphicon-ok hide" style="color:green;margin:10px;"></span>
                    </div>
                </div>
            </div>
            <div class="table-bordered menu_items">
                <div class="row">
                    <div class="col-md-3">
                        <input type="radio" name="menu" value="option1" class="hide"/>
                        <img src="src/青椒肉丝.jpg" class="food_pic"/>
                    </div>
                    <div class="col-md-7">
                        <h4>青椒肉丝饭</h4><br/>
                        <p>青椒肉丝是一道色香味俱全的汉族名菜，属于川菜系。以青椒为主要食材，口味香辣，色香味俱全，营养价值丰富</p>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-primary comment"><span class="glyphicon glyphicon-comment"></span></button>
                    </div>
                    <div class="col-md-1">
                        <span class="glyphicon glyphicon-ok hide" style="color:green;margin:10px;"></span>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-md-2">
                <button class="btn btn-warning" type="submit" style="position: fixed;margin-top:200px;">就吃这个了！</button>
            </div>
    </form>
</div>