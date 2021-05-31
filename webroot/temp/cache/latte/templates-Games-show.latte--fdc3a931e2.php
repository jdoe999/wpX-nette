<?php
// source: /var/www/matprace/app/AdminModule/templates/Games/show.latte

use Latte\Runtime as LR;

final class Templatefdc3a931e2 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['content' => 'blockContent', 'name' => 'blockName'],
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
		$this->renderBlock('name', get_defined_vars());
		echo '
<p>';
		echo LR\Filters::escapeHtmlText($game->description) /* line 4 */;
		echo '</p>
<h3> Distributor </h3> ';
		echo LR\Filters::escapeHtmlText($game->distributor) /* line 5 */;
		echo '
<h3> ŽÁNR: </h3> ';
		echo LR\Filters::escapeHtmlText($genres->desc) /* line 6 */;
		echo ' !!!';
	}


	public function blockName(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		echo '<h1>';
		echo LR\Filters::escapeHtmlText($game->name) /* line 2 */;
		echo '</h1>
';
	}

}
