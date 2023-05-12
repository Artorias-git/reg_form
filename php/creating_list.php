<?php

Class Applications 
{
    public $id = '';
    public $name = '';
    public $lastname = '';
    public $email = '';
    public $phone = '';
    public $theme = '';
    public $money = '';
    public $mailing = '';
    public $processing = '';
    public $reg_date = '';
    public $deleted;

    public function __construct( $id, $name, $lastname, $email, $phone, $theme, $money, $mailing, $processing,  $reg_date, $deleted) {
        $this->id = $id;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->phone =  $phone;
        $this->theme = $theme;
        $this->money = $money;
        $this->mailing = $mailing;
        $this->processing = $processing;
        $this->reg_date = $reg_date;
        $this->deleted = preg_replace('/[^01]/', '', $deleted);
    }
}



//создание обектов из файла
$file = @fopen('applications/list.txt', "r");
$application = []; //массив обектов
if ($file) 
{
    while (($str = fgets($file, 4096)) !== false) 
    {
        if (!preg_match("/^[^ ]$/", $str))
        { 
            $str = explode("|", $str);
            $row = [];

            foreach ($str as $par)
            {
                $par = explode(" ", $par);
                $row[] =  $par[1];
            }
            $myClass = "Applications";
            $refl = new ReflectionClass($myClass);
            $instance = $refl->newInstanceArgs($row);
            $application[$row[0]] = $instance;
        }
    }
    if (!feof($file)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($file);
}


//создание таблицы из не удалённых обектов
foreach ($application as $app)
{
    if ($app->deleted == '0')
    echo "
    <tr>
        <td><input class='checkbox_row' name='$app->id' type='checkbox' value='$app->id'> </td>
        <td><div class='row' id='$app->id'>Имя: $app->name Фамилия: $app->lastname<br>
            Номер: $app->phone E-mail $app->email</br> 
            Тема: $app->theme Способ оплаты: $app->money</br> 
            Рассылка: $app->mailing Дата заявки: $app->reg_date</br> 
        </div></td>
    </tr>";   
}

?>
