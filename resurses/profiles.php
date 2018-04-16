<script>
    $(document).ready(function () {
        $(document).on('click', "input[name='send']" , function () {
            if($("#art").val() != '') {
                $.ajax({
                    url: '/id<? echo $_SESSION['c_id'];?>',
                    type: 'POST',
                    data: ({
                        article: $("#art").val()
                    }),
                    success: s_send
                });
            }
            else{
                show();
            }
        });
        $(document).on('click', ".exit" , function () {
            $.ajax({
                url: '/id<? echo $_SESSION['c_id'];?>',
                type: 'POST',
                data: ({
                    exit: 'yes'
                }),
                success: exit
            });
    });
    });
    function exit() {
        location.reload();
    }
    function s_send(data) {
        $('#articles').prepend(data);
        show();
    }
</script>

<div class="container">
    <div class="row">
<?if($_SESSION['c_id'] == $id_page){?>
<div id="show" style="display: none" class="col-12">
    <div class="row">
    <textarea id="art" class="col-12"></textarea>
    <input name="send" class="button" type="button" value="Сохранить">
    </div>
    </div>
<button name="create" class="button" onclick="show();">
    Создать запись
</button>
<?}?>
<div id="articles" class="row">

<? foreach ($arr as $a){
    $name = get_inform_akk($connect, 'name', $id_page);
    ?>
<div class="article col-12 container">
    <div class="row col-6 ">
        <div class="container">
        <p class="col-12"><?php echo $name[0];?></p>
        <p class="col-12"> <?php echo $a['text'];?></p>
    </div>
    </div>
</div>
<?}?>
</div>
</div>
</div>
</div>