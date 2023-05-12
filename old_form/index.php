<html>
	<head>
		<meta charset="utf-8">
		<link href="css/index.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="form-conference--outer">
			<!-- TITLE -->
			<div class="form-conference--inner">
			<?
			include ("php/code.php");
			?>
			<div class="form-place">
				<span class="title">
					<h1>Форма участника конференции</h1>
					<p>
						Заполните форму для участия в конференции (это обязательно)!
					</p>
				</span>
				<!-- HEAD ID -->
				<form action="" method="post">
					<div class="input-content">
						<label for="Name">Имя:<br></label>
						<input type="txt" class="form-control" name="name" id="Name" value="<?= htmlspecialchars($_POST["name"] ?? "") ?>" required placeholder="введите имя"><br>
									
						<label for="SurName">Фамилия:<br></label>
						<input type="txt" class="form-control" name="lastname" id="lastname" value="<?= htmlspecialchars($_POST["lastname"] ?? "") ?>" required placeholder="Введите фамилию"><br>

						<label for="E-mail">E-mail:<br></label>
						<input type="email" class="form-control" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required placeholder="example@gmail.com"><br>

						<label for="ID">Телефон<br></label>
						<input type="txt" class="form-control" name="phone" id="ID" value="<?= htmlspecialchars($_POST["phone"] ?? "") ?>" required placeholder="88005553535"><br>
					</div>
					
					<div class="input-content">
						<label for="theme">Выберите интересующую тематику:</label>
						<select class="form-control" name="theme" value="<?= htmlspecialchars($_POST["theme"] ?? "") ?>">
							<option value="Бизнес" <?= htmlspecialchars($_POST["theme"] === "Бизнес" ? "selected" : "") ?> >Бизнес </option>
							<option value="Технологии" <?= htmlspecialchars($_POST["theme"] === "Технологии" ? "selected" : "") ?> >Технологии</option>
							<option value="Реклама и Маркетинг" <?= htmlspecialchars($_POST["theme"] === "Реклама и Маркетинг" ? "selected" : "") ?> >Реклама и Маркетинг</option>
						</select><br>
									
						<label for="money">Выберите способ оплаты:</label>
						<select class="form-control" name="money" placeholder="<?= htmlspecialchars($_POST["money"] ?? "") ?>">
							<option value="WebMoney" <?= htmlspecialchars($_POST["theme"] === "WebMoney" ? "selected" : "") ?> >WebMoney</option>
							<option value="Iandex" <?= htmlspecialchars($_POST["theme"] === "Iandex" ? "selected" : "") ?> >Яндекс.Деньги</option>
							<option value="PayPal" <?= htmlspecialchars($_POST["theme"] === "PayPal" ? "selected" : "") ?> >PayPal</option>
							<option value="Кредитная карта" <?= htmlspecialchars($_POST["theme"] === "Кредитная карта" ? "selected" : "") ?> >Кредитная карта</option>
						</select><br>

						<label for="Sure"> Согласшаюсь на рассылку о конференции</label>
						<input class="form-control" type="checkbox" name="mailing" id="Sure" checked required><br>

						<label for="Sure2">Подтверждаю обработку данных</label>
						<input class="form-control" type="checkbox" name="processing" id="Sure2" checked required><br>

						</div>
						<button class="btn btn-success" type="submit">Отправить</button>
				</form>

			</div>
			</div>
		</div>
	</body>

</html>
