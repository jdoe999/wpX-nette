<?php
// source: /var/www/matprace/app/AdminModule/templates/Games/edit.latte

use Latte\Runtime as LR;

final class Template5c0ab56c8a extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['content' => 'blockContent'],
	];


	public function main(): array
	{
		extract($this->params);
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		echo '<h1>Upravit příspěvek</h1>

';
		/* line 4 */ $_tmp = $this->global->uiControl->getComponent("postForm");
		if ($_tmp instanceof Nette\Application\UI\Renderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
		
	}

}
