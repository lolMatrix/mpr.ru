<script>
    $(document).ready(function () {
       $("input[name='act']").on('click', function () {
           if($("input[name='login']").val() != '' && $("input[name='password']").val() != '' && $("input[name='email']").val() != '') {
               $.ajax({
                   url: '/registr',
                   type: 'POST',
                   data: ({
                       login: $("input[name='login']").val(),
                       password: $("input[name='password']").val(),
                       email: $("input[name='email']").val(),
                       act: $("input[name='act']").val()
                   }),
                   success: s_reg
               });
           }else
               $("#mg").html('Введите данные');
       });
    });
    function s_reg(data) {
        if(data == 'ok'){
            location.href = '/';
        }
        else {
            $('#mg').html(data);
        }
    }
</script>
<div class="enter">
    <a href="/">aut</a>
    <div id="mg"></div>
        <input type="text"  name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
        <input type="email" name="email" placeholder="e-mail">
        <input type="submit" name="act" value="Регистрация">
</div>