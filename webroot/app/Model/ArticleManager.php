<?php

namespace App\Model;

use Nette;
use Nette\Database\Explorer;


class ArticleManager
{
	use Nette\SmartObject;

	private Explorer $database;

	public function __construct(Explorer $database)
	{
		$this->database = $database;
	}

	public function getPublicArticles()
	{
		return $this->database->table('post')
			->where('created_at < ', new \DateTime)
			->order('created_at DESC');
	}

	public function get(int $postId)
	{
		return $this->database->table('post')
			->$get($postId);
	}
}
