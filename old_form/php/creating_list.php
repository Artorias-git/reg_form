<?php
    $dir = "applications";   
    if(is_dir($dir)) {   
        $files = scandir($dir);
        array_shift($files);
        array_shift($files);
        for($i=0; $i<sizeof($files); $i++){

            $filename = "applications/".$files[$i];

            $json_string = file_get_contents($filename);

            $date = json_decode($json_string, true, 512, JSON_INVALID_UTF8_IGNORE);

            $name = $date["name"];
            $lastname = $date["lastname"];
            $email = $date["email"];
            $phone = $date["phone"];
            $theme = $date["theme"];
            $money = $date["money"];
            $mailing = $date["mailing"];

            echo "
                <tr>
                    <td><input class='checkbox_row' name='$files[$i]' type='checkbox' value='$files[$i]'> </td>
                    <td><div class='row' id='$files[$i]'>Имя: $name Фамилия: $lastname<br>
                        Номер: $phone E-mail $email</br> 
                        Тема: $theme Способ оплаты: $money</br> 
                        Рассылка: $mailing</br> 
                    </div></td>
                </tr>";
        };
    } 
    else echo $dir.' -такой директории нет;<br>';
?>