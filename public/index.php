<?php
// Подключаем пакеты которые установили через composer
require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../views');

// Создаем экземпляр twig
$twig = new \Twig\Environment($loader);
$url = $_SERVER["REQUEST_URI"];

// Переменные
$title = "";
$template = "";
$context = [];
// Заполняем значение переменных
if ($url == "/") {
    $title = "Главная";
    $template = "main.twig";
} elseif (preg_match("#/aang#", $url)) {
    $title = "Аанг";
    $template = "base_image.twig";
     
    $context['image'] = "/img/aang.jpg"; 
} elseif (preg_match("#/korra#", $url)) {
    $title = "Корра";
    $template = "base_image.twig"; 
    $image = "/img/korra.jpg"; 

    $context['image'] = "/img/korra.jpg";
}

$context['title'] = $title;

echo $twig->render($template, $context);