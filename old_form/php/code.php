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


	function creating_row ($id, $data)
	{
		$time = date("d-m-Y");
		$message = '';
		foreach ($data as $key => $value)
		{
			$message .= $key. ' ' . $value . '|';
		}
		$message .= 'reg_date '. $time . '|deleted false' ;
		return $message;
	};
	
	if (empty($errors) & ($data != [])) 
	{
		$file = 'applications/list.txt';
		$id = uniqid();
		$message = creating_row ($id, $data);
		file_put_contents($file, PHP_EOL . $message, FILE_APPEND);
	}

    /*if (empty($errors) & ($data != [])) {
        $unic_id = uniqid();
        $filename = "applications/" . $unic_id;
        echo "<div class='success_message' > Ваша форма успешно сохронена, её уникальный id: $unic_id</div>";
        $data = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        file_put_contents( $filename, $data, $flags); 

    }*/
?>