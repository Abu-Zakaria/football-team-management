<?php

namespace App\Presenters;

use App\Player;

class PlayersPresenter extends Presenter
{
	public function fullName()
	{
		return sprintf('%s %s',
			$this->model->first_name,
			$this->model->last_name
		);
	}
	
	public function __get($property)
	{
		if (method_exists($this, $property))
		{
			return call_user_func([$this, $property]);
		}
	}

}