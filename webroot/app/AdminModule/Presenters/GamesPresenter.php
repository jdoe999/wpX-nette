<?php

declare(strict_types=1);

namespace App\AdminModule\Presenters;

use Nette;
use App\Model\GamesRepository;
use Nette\Application\UI\Form;

class GamesPresenter extends Nette\Application\UI\Presenter
{
    private GamesRepository $gamesRepository;

    private $database;

    public function __construct(Nette\Database\Context $database, GamesRepository $gamesRepository)
    {
        
        $this->database = $database;
        $this->gamesRepository = $gamesRepository;
    }


    public function renderDefault($genreId): void
    {
        $this->template->headline = "Výpis her";
        if(!empty($genreId)){
            $this->template->games = $this->gamesRepository->getGamesByGenreId($genreId);
        }else{
            $this->template->games = $this->gamesRepository->getGames();
        }
        $this->template->genres2 = $this->gamesRepository->getGenres();

    }

    public function renderShow(int $gameId): void
    {
        $this->template->headline = "Detail hry";
		$game = $this->gamesRepository->get($gameId);
		if (!$game) {
			$this->errror('Stránka nebyla nalezena');
		}
		$this->template->game = $game;

        $genres = $this->gamesRepository->getGenre($game->id);
        $this->template->genres = $genres;
    }


    protected function createComponentPostForm(): Form
	{
        $genres = array("play with friends", "hra pro jednoho", "simulator jizdy", "kockoholky");

		$form = new Form;
		$form->addText('name', 'Název')
			->setRequired();
        $form->addSelect('genre_id', 'Žánr:', $genres)
            ->setPrompt('Vyber žánr');
        $form->addText('price', 'Cena v KČ:')
			->setRequired();
        $form->addText('release_date', 'Datum vydání:')
			->setRequired();
        $form->addText('distributor', 'Distributor:')
			->setRequired();
        $form->addTextArea('description', 'Popis:')
			->setRequired();

		$form->addSubmit('send', 'Uložit a publikovat');
		$form->onSuccess[] = [$this, 'postFormSucceeded'];

		return $form;
	}


    public function postFormSucceeded(Form $form, array $values): void
	{
		if (!$this->getUser()->isLoggedIn()) {
			$this->error('Pro přidaní hry se musíte přihlásit.');
		}
		
		if ($gameId) {
			$game = $this->database->table('game')->get($gameId);
			$game->update($values);
		} else {
			$game = $this->gamesRepository->add($values);
		}
		
	
		$this->flashMessage('Hra byla publikována', 'success');
		$this->redirect('Games:');
	}

    public function actionEdit(int $gameId): void
	{
		if (!$this->getUser()->isLoggedIn()) {
			$this->redirect('Sign:in');
		}

		$game = $this->gamesRepository->get($gameId);
		if (!$game) {
			$this->error('Příspěvek nebyl nalezen');
		}
		$this['postForm']->setDefaults($game->toArray());
	}
}
