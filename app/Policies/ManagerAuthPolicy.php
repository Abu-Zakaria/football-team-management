<?php

namespace App\Policies;

use App\Manager;

class ManagerAuthPolicy
{
	public static function handle($username, $password)
	{

		$manager = Manager::where('username', $username)->first();

		return !empty($manager);

	}
}