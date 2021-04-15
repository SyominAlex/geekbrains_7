<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class FakeNewsController extends Controller
{
    public function __invoke(News $news)
	{
       dd(session());
	}
}
