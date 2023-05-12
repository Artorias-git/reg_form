<html>
    <head>
        <meta charset="utf-8">
        <link href="css/admin.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="outer">
            <div class="inner">
            <div class="list_lable"><p>Список заявок</p></div>
                <form action="" method="POST">
                    <div class="list">
                        <table>
                            <?
                                include ("php/creating_list.php");
                            ?>
                        </table>
                        <button class="btn btn-success" type="submit">Удалить выделенные записи</button>
                        <?
                            include ("php/deleting_file.php");
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
