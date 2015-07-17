
<form method="post" action="" enctype="multipart/form-data">
    <label>File Input: <input type="file" name="file" id="demo1" /></label>
</form>

<button class="menu-submit">添加</button>
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/jquery.ajaxfileupload.js"></script>
<script type="text/javascript">



    $(document).ready(function() {

        var fname = null;
        var interval;

        $("button.menu-submit").click(function(){
            alert(fname);
//            fname: the addr. of img

            fname = null;
        });

        function applyAjaxFileUpload(element) {
            $(element).AjaxFileUpload({
                action: "func-upload.php",

                onChange: function(filename) {
                    var $span = $("<span />")
                        .attr("class", $(this).attr("id"))
                        .text("Uploading")
                        .insertAfter($(this));

                    $(this).remove();

                    interval = window.setInterval(function() {
                        var text = $span.text();
                        if (text.length < 13) {
                            $span.text(text + ".");
                        } else {
                            $span.text("Uploading");
                        }
                    }, 200);
                },
                onSubmit: function(filename) {
                    return true;
                },
                onComplete: function(filename, response) {
                    fname = response['name'];
                    window.clearInterval(interval);
                    var $span = $("span." + $(this).attr("id")).text(filename + " "),
                        $fileInput = $("<input />")
                            .attr({
                                type: "file",
                                name: $(this).attr("name"),
                                id: $(this).attr("id")
                            });

                    if (typeof(response.error) === "string") {
                        $span.replaceWith($fileInput);

                        applyAjaxFileUpload($fileInput);

                        alert(response.error);

                        return;
                    }

                    $("<a />")
                        .attr("href", "#")
                        .text("x")
                        .bind("click", function(e) {
                            $span.replaceWith($fileInput);

                            applyAjaxFileUpload($fileInput);
                        })
                        .appendTo($span);
                }
            });
        }

        applyAjaxFileUpload("#demo1");
    });

</script>
</body>
</html>
