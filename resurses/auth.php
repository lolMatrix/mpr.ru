<script>
    $(document).ready(function () {
        $(document).on('click', "input[name='act']", function () {

            $.ajax({
                url: '/',
                type: 'POST',
                data: ({
                    login: $("input[name='login']").val(),
                    password: $("input[name='password']").val(),
                    act: $("input[name='act']").val()
                }),
                dataType: "html",
                success: su
            });
        });
    });
    function su(data) {
        if (data == ''){
            location.reload();
        }
        else {
            $('#message').html(data);
        }
    }

</script>
<div class="container-fluid">
<div class="enter">
        <a href="/registr">reg</a>
        <div id="message"></div>
        <div id="auth">
            <input type="text"  name="login" placeholder="Логин">
            <input type="password" name="password" placeholder="Пароль">
            <input type="submit" name="act" value="Вход">
        </div>
    </div>
</div>