<?php
	if (getenv('REQUEST_METHOD') === 'POST') {
		$data = [
			"name" => '',
			"lastname" => '',
			"email" => '',
			"phone" => '',
			"theme" => '',
			"money" => '',
			"mailing" => '',
			"processing" => '',
		];

		$errors = [];
		//получаем данные, проверяем наличие значений
		foreach ($_POST as $key => $value)
		{
			if (!empty($value)) 
			{
				if (strpos($value, '|') !== false)
				{
					$errors[] = "Укажите ". $key . " без символа |";
				}
				else 
				{
					$data[$key] = strip_tags($value);
				}
			} 
			else 
			{
				$errors[] = "Не указано ". $key;
			};
		}
		$data["phone"] = preg_replace("/[^+0-9]/", "", $data["phone"]);

		//выводим сообщение при ошибке
		if (!empty($errors))
		{
			echo '<div class="error_message">';
			foreach ($errors as $err)
			{
				echo $err;
			}
			echo '</div>';
		};
	};

	//форматируем данные под запись в файил
	function creating_row ($data)
	{
		$id = uniqid();
		$time = date("d-m-Y");
		$message = 'id '. $id . '|';
		foreach ($data as $key => $value)
		{
			$message .= $key. ' ' . $value . '|';
		}
		$message .= 'reg_date '. $time . '|deleted 0' ;
		return $message;
	};
	//если нет ошибок и данные не пусты, записываем их в фаил
	if (empty($errors) & ($data != [])) 
	{
		$file = 'applications/list.txt';
		$message = creating_row ($data);
		file_put_contents($file, PHP_EOL . $message, FILE_APPEND);
	}
?>