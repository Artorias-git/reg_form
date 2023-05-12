<?php
    if (getenv('REQUEST_METHOD') === 'POST') 
    {
        $filename ="applications/list.txt";
        $out = [];

        //получаем id удалённых записей, построчно находим их в файле, меняем значение deleted на 1, и записываем все строки в новый массив
        $del_id = [];
        foreach ($_POST as &$value)
        {
            $del_id[] = $value;
        }
        $data = file($filename);
        $count = 0;
        foreach($data as $line) {
            $id =  explode(" ", explode("|", $line)[0])[1];
            if (!in_array($id, $del_id))
            {
                $out[] = $line;
                $count++;
            }
            elseif ($line == $data[sizeof($data)-1])
            {
                $line[strlen($line)-1] = '1'; 
                $out[] = $line;
            }
            else
            {
                $line[strlen($line)-3] = '1';
                $out[] = $line;
            }
        }

        //меняем содержимое файла на новый массив с изменёнными данными, если есть хотябы одна запись
        if ($count >= 1)
        {
            $fp = fopen($filename, "w+");
            flock($fp, LOCK_EX);
            foreach($out as $line) {
                fwrite($fp, $line);
            }
            flock($fp, LOCK_UN);
            fclose($fp); 
            $count = 0;
            header("Refresh:0");
        }
    }
?>