<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * @var array|string[]
	 */
	protected array $newsList = [
		'News 1',
		'News 2',
		'<strong>News 3</strong>',
		'News 4',
		'<em>News 5</em>',
		'News 6',
		'News 7'
	];
}
