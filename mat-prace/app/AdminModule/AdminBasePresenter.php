<?php

declare(strict_types=1);

namespace App\AdminModule\Presenters;

use Nette;


class AdminBasePresenter extends Nette\Application\UI\Presenter
{
	protected $database;

	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}

}
