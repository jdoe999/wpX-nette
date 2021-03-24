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

	public function getGames(){
		return $this->database->table('game')
			->where('created_at < ', new \DateTime)
			->order('created_at DESC');
    }

    public function get(int $gameId) {
        return $this->database->table('game')
            ->get($gameId);
    } 

	public function getGenres() {
        return $this->database->table('genre');
    } 

	public function getGenre(int $genreId) {
        return $this->database->table('genre')
            ->get($genreId);
    } 

}