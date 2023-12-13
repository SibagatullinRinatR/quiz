<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    // Получаем имя файла
    $file_name = $_FILES['fileToUpload']['name'] ?? '';

    // Создаем текст для записи в файл
    $data = "Имя: $name\nEmail: $email\n";

    // Если файл прикреплен, добавляем информацию о нем
    if (!empty($file_name)) {
        $data .= "Прикрепленный файл: $file_name\n";
    }

    // Путь к файлу, в который будет записана информация из формы
    $file_path = './upload/data.txt';

    // Записываем данные в файл (добавляем или создаем новый файл)
    file_put_contents($file_path, $data, FILE_APPEND | LOCK_EX);

    // Подтверждение успешной записи в файл
    echo 'Данные успешно записаны в файл.';
}
?>

