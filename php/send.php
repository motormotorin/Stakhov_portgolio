<?php

//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "5747834724:AAFUj0woQit-w3NZo7iFxyLJZkVGhE_ub9M";

//Сюда вставляем chat_id
$chat_id = "-836418200";

//Определяем переменные для передачи данных из нашей формы
if ($_POST['act'] == 'order') {
    $phone = ($_POST['phone']);
	$name = ($_POST['name']);
	$lastname = ($_POST['lastname']);

//Собираем в массив то, что будет передаваться боту
    $arr = array(
		'Телефон:' => $phone,
        'Имя:' => $name,
        'Фамилия:' => $lastname
    );

//Настраиваем внешний вид сообщения в телеграме
    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    };

//Передаем данные боту
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

//Выводим сообщение об успешной отправке
    if ($sendToTelegram) {
        alert('Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.');
    }

//А здесь сообщение об ошибке при отправке
    else {
        alert('Что-то пошло не так. ПОпробуйте отправить форму ещё раз.');
    }
}

?>