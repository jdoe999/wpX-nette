<?php

namespace App\Model;

use Nette;
use Nette\Database\Explorer;


class ArticleManager
{
	use Nette\SmartObject;

	private Nette\Database\Context $database;

	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}

	public function getPublicArticles()
	{
		return $this->database->table('posts')
			->where('created_at < ', new \DateTime)
			->order('created_at DESC');
	}
}
