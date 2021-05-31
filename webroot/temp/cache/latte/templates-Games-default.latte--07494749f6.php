<?php
// source: /var/www/matprace/app/AdminModule/templates/Games/default.latte

use Latte\Runtime as LR;

final class Template07494749f6 extends Latte\Runtime\Template
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
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['genre2' => '3', 'game' => '25'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		echo '	
	Žánry: ';
		$iterations = 0;
		foreach ($genres2 as $genre2) {
			echo ' <a href="?genreId=';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($genre2->id)) /* line 3 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($genre2->desc) /* line 3 */;
			echo '</a> ';
			$iterations++;
		}
		echo '  <br> 
	  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Výpis her</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Genre</th>
                    <th>Release Date</th>
                  </tr>
                  </thead>
                  <tbody>

';
		$iterations = 0;
		foreach ($games as $game) {
			echo '	
	                <tr>
                    <td><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("games:show", [$game->id]));
			echo '">';
			echo LR\Filters::escapeHtmlText($game->name) /* line 28 */;
			echo '</a></td>
                    <td>';
			echo LR\Filters::escapeHtmlText($game->description) /* line 29 */;
			echo '
                    </td>
                    <td>';
			echo LR\Filters::escapeHtmlText($game->genre->desc) /* line 31 */;
			echo '</td>
                    <td>';
			echo LR\Filters::escapeHtmlText(($this->filters->date)($game->release_date, 'F j, Y')) /* line 32 */;
			echo '</td>
					</tr>

';
			$iterations++;
		}
		echo '	</tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
';
	}

}
