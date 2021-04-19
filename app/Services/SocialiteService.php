<?php declare(strict_types=1);

namespace App\Services;

use App\Models\User as Model;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User;

class SocialiteService
{
   public function userLogin(User $user): void
   {
      $email = $user->getEmail();
      $userData = Model::where('email', $email)->first();
      if($userData) {
      	 $userData->fill([
      	 	 'name' => $user->getName(),
			 'avatar' => $user->getAvatar()
		 ])->save();
      	 Auth::loginUsingId($userData->id);
	  }
   }
}