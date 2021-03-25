<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
	{
		dump($this->newsList, 'Hello');
		return view('news', ['newsList' => $this->newsList]);
	}

	public function show(int $id)
	{
		return "<h2>Отобразить запись с ID={$id}</h2>";
	}
}
