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
    <div class = 'result'>

    </div>
    <div class = 'list'>

    </div>
    <script>
        $(document).ready(function () {
            $('.submit').on('click',function () {
                linkVal = $('.link').val();
                $.ajax({
                    type: "POST",
                    url: "/../helpers/addLink.php",
                    data: {link:linkVal},
                    success:function () {
                        alert(linkVal);
                    }
                });
            })
        });
    </script>
</body>
</html>