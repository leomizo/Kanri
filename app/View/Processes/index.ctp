<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2>Processos</h2>
	</div>

	<div class="row-fluid">
		<div class="span12">
			<form class="form-search well search-box">
			  	<label class="control-label" for="inputUserSearch">Buscar candidato/empresa: </label>
			  	<input type="text" id="inputUserSearch" class="input-medium search-query" />
				<button type="submit" class="btn">Buscar</button>
				<a class="btn btn-success pull-right" data-toggle="modal" data-target="#add-modal"><i class="icon-plus icon-white"></i> Abrir novo processo</a>
			</form>
		</div>
	</div>

	<div class="row-fluid">
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Empresa</th>
					<th>Candidato</th>
					<th>Data do último evento</th>
					<th style="width: 140px">Opções</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><a href="company_show.html">Banco Santander</a></td>
					<td><a href="candidate_show.html">Jorge Mattos</a></td>
					<td>18 de maio de 2013 às 15:00</td>
					<td>
						<a href="process_show.html" class="btn btn-mini btn-primary">Ver eventos</a>
						<button class="btn btn-mini btn-danger">Remover</button>
					</td>
				</tr>
				<tr>
					<td><a href="company_show.html">Sony</a></td>
					<td><a href="candidate_show.html">Ricardo Mendes</a></td>
					<td>16 de maio de 2013 às 17:30</td>
					<td>
						<a href="process_show.html" class="btn btn-mini btn-primary">Ver eventos</a>
						<button class="btn btn-mini btn-danger">Remover</button>
					</td>
				</tr>
				<tr>
					<td><a href="company_show.html">Banco Itaú</a></td>
					<td><a href="candidate_show.html">João Silva</a></td>
					<td>15 de maio de 2013 às 12:30</td>
					<td>
						<a href="process_show.html" class="btn btn-mini btn-primary">Ver eventos</a>
						<button class="btn btn-mini btn-danger">Remover</button>
					</td>
				</tr>
				<tr>
					<td><a href="company_show.html">Nokia</a></td>
					<td><a href="candidate_show.html">Alfredo Siqueira</a></td>
					<td>11 de maio de 2013 às 11:30</td>
					<td>
						<a href="process_show.html" class="btn btn-mini btn-primary">Ver eventos</a>
						<button class="btn btn-mini btn-danger">Remover</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div id="add-modal" class="modal hide fade" tabindex="-1" role="dialog" data-backdrop="static">
  	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3 id="add-modal-title">Selecione uma empresa</h3>
    	<form class="form-search" style="margin: 10px 0 0 0">
		  	<input type="text" class="input-medium search-query" style="width: 415px">
		  	<button type="submit" class="btn" style="margin-left: 5px">Buscar</button>
		</form>
  	</div>
  	<div class="modal-body">
		<table id="company-table" class="table table-striped" style="position: relative">
			<tbody>
				<tr><td><a class="company-selector">Banco Itaú</a></td></tr>
				<tr><td><a class="company-selector">Nokia</a></td></tr>
				<tr><td><a class="company-selector">Banco Santander</a></td></tr>
				<tr><td><a class="company-selector">Sony</a></td></tr>
			</tbody>
		</table>
		<table id="candidate-table" class="table table-striped" style="display: none; position: relative; opacity: 0; left: 100px">
			<tbody>
				<tr><td><a class="candidate-selector">Ricardo Mendes</a></td></tr>
				<tr><td><a class="candidate-selector">João Silva</a></td></tr>
				<tr><td><a class="candidate-selector">Alfredo Siqueira</a></td></tr>
				<tr><td><a class="candidate-selector">Jorge Mattos</a></td></tr>
			</tbody>
		</table>
  	</div>
  	<div class="modal-footer">
  		<dl class="dl-horizontal pull-left">
  			<dt style="width: 80px">Empresa:</dt>
  			<dd id="company-add" style="margin-left: 100px; text-align: left"></dd>
  			<dt style="width: 80px">Candidato:</dt>
  			<dd id="candidate-add" style="margin-left: 100px; text-align: left"></dd>
  		</dl>
  		<a id="add-modal-return-btn" class="btn" style="position: relative; top: 20px; display: none">Voltar</a>
  		<a id="add-modal-ok-btn" class="btn btn-primary" style="position: relative; top: 20px; display: none">OK</a>
    	<button class="btn" data-dismiss="modal" aria-hidden="true" style="position: relative; top: 20px">Cancelar</button>
  	</div>
</div>