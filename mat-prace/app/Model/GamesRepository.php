<?php
namespace App\Model;

use Nette;
use Nette\Database\Explorer;

class GamesRepository
{
	use Nette\SmartObject;

	private Nette\Database\Explorer $database;

	public function __construct(Nette\Database\Explorer $database)
	{
		$this->database = $database;
	}

	public function getGames()
	{
		return $this->database->table('games')
			->where('created_at < ', new \DateTime)
			->order('created_at DESC');
    }

	public function getGenres()
	{
		return $this->database->query('SELECT ge.id_genre FROM genres ge LEFT JOIN games ga ON ge.id_genre = ga.id_genre');
	}
    
    public function get(int $gameId) {
        return $this->database->table('games')
            ->get($gameId);
    } 
}