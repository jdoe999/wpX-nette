<?php

declare(strict_types=1);

namespace App\FrontModule\Presenters;
use Nette;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{

	private ArticleManager $articleManager;

	public function __construct(ArticleManager $articleManager)
	{
		$this->articleManager = $articleManager;
	}

	public function renderDefault(): void
	{
		$this->template->posts = $this->articleManager
			->getPublicArticles()
			->limit(5);
	}

}
