<?php

declare(strict_types=1);

namespace App\AdminModule\Presenters;

use Nette;


class AdminBasePresenter extends Nette\Application\UI\Presenter
{
	public function startup() {
		parent::startup();
		if (!$this->getUser()->isLoggedIn()) {
			$this->redirect('Sign:in');
		}
	}

}

