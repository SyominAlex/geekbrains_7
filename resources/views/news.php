<?php

foreach ($newsList as $key => $news) {
$key++;
echo $news . "<a href='".route('news.show', ['id' => $key])."'>Отобразить</a><br>";
}