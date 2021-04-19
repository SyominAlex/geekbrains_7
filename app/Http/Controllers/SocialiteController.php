<?php

namespace App\Http\Controllers;

use App\Services\SocialiteService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function init()
	{
		return Socialite::driver('vkontakte')->redirect();
	}

	public function callback(SocialiteService $service)
	{
		$user = Socialite::driver('vkontakte')->user();
		$service->userLogin($user);

		return redirect()->route('admin.news.index');
	}
}
