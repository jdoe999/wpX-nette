<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{

	private $database;

	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}

	public function renderDefault(): void
	{
	$this->template->posts = $this->database->table('posts')
		->order('created_at DESC')
		->limit(5);
	}

}
