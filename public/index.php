<?php
// подключаем пакеты которые установили через composer
require_once '../vendor/autoload.php';

// создаем загрузчик шаблонов, и указываем папку с шаблонами
$loader = new \Twig\Loader\FilesystemLoader('../views');

// создаем собственно экземпляр Twig с помощью которого будет рендерить
$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];

if ($url == "/") {
    echo $twig->render("main.html");
} elseif (preg_match("#/aang#", $url)) {
    echo $twig->render("aang.html");
} elseif (preg_match("#/korra#", $url)) {
    echo $twig->render("korra.html");
}