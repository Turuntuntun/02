<!DOCTYPE html>
<html>
<head>
    <title>Укорачиватель ссылок на файлах</title>
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <link rel="stylesheet" href = '/layouts/style.css'>
    <script src =/layouts/script.js></script>
</head>
<body>
    <form>
        <input class = 'link' placeholder="Введите ссылку">
        <input type="button" value="Ввести" class = 'submit'>
    </form>
    <form>
        <input type = button value="Показать список ссылок" class = 'list'>
    </form>
    <div class = 'result'>

    </div>
    <div class = 'list'>

    </div>
    <script>
        $(document).ready(function () {
            function get_cookie ( cookie_name )
            {
                var results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );

                if ( results )
                    return ( unescape ( results[2] ) );
                else
                    return null;
            }
            $('.submit').on('click',function () {
                let linkVal = $('.link').val();
                let validate = /(^https?:\/\/)?[a-z0-9~_\-\.]+\.[a-z]{2,9}(\/|:|\?[!-~]*)?$/i;
                if (validate.test(linkVal)) {
                    $.ajax({
                        type: "POST",
                        url: "/../helpers/addLink.php",
                        data: {link:linkVal,id:get_cookie('ID')},
                        success:function () {
                            $('.result').html('<p>Ссылка успешно добавлена</p>');
                        }
                    });
                } else {
                    $('.result').html('<p>Некоректная ссылка, напишите корректную ссылку</p>');
                    console.log();
                }

            });
            $('.list').on('click',function () {
                $.ajax({
                    type: "POST",
                    url: "/../helpers/showLinks.php",
                    data: {id:get_cookie('ID')},
                    success:function () {
                    }
                });

            });
        });
    </script>
</body>
</html>