<?php

declare(strict_types=1);

namespace App\FrontModule\Presenters;

use Nette;


class FrontBasePresenter extends Nette\Application\UI\Presenter
{
	protected $database;

	public function __construct(Nette\Database\Explorer $database)
	{
		$this->database = $database;
	}

}
