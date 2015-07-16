<link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>

<script src="js/jquery-2.1.4.min.js"></script>

<script type="application/javascript">
    $(document).ready(function(){
        $("button.test").click(function(){

            id = $("[name='id']").val();

            $.post("fetchComment.php",
                {
                    dish_id: id,
                },
                function (data, status) {
                    $( "div.test" ).html(data);
                });

        });

    });


</script>
<div>

    <div class="test"></div>
    <div>
        <label>id</label>
        <input class="test" name="id" type="text"/>
    </div>

    <div>
        <button type="submit" class="test">submit</button>
    </div>

</div>
