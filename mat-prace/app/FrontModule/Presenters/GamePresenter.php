<?php

declare(strict_types=1);

namespace App\FrontModule\Presenters;

use Nette;
use App\Model\GamesRepository;

class GamesPresenter extends Nette\Application\UI\Presenter
{
    private GamesRepository $gamesRepository;

    private $database;

    public function __construct(Nette\Database\Context $database, GamesRepository $gamesRepository)
    {
        $this->database = $database;
        $this->gamesRepository = $gamesRepository;
    }


    public function renderDefault(): void
    {
        $this->template->games = $this->gamesRepository->getGames();
        $this->template->genres2 = $this->gamesRepository->getGenres();
        //->limit(5);
    }

    public function renderShow(int $gameId): void
    {
		$game = $this->gamesRepository->get($gameId);
		if (!$game) {
			$this->errror('Stránka nebyla nalezena');
		}
		$this->template->game = $game;

        $genres = $this->gamesRepository->getGenre($game->id);
        $this->template->genres = $genres;
    }
}
