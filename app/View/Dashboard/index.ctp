<?php $this->Html->css('dashboard.css', null, array('inline' => false)); ?>

<div class="container-fluid">

	<div class="row-fluid">
		<div class="span10 offset1 dashboard-block dashboard-title" style="text-align: center">
			<img src="img/dashboard_ico_kanri.png" width="70" height="34" />
			<h3 style="margin: 0">Kanri</h3>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span10 offset1 dashboard-block">
			<h3>Candidatos aniversariantes</h3>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Nome do candidato</th>
						<th>Idade</th>
						<th>E-mail</th>
						<th style="width: 150px">Enviar e-mail padrão?</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a href="#">João Silva</a></td>
						<td>25 anos</td>
						<td>joaosilva@exemplo.com</td>
						<td style="text-align: center">
							<a href="#" class="btn btn-primary btn-mini">Enviar</a>
							<a href="#" class="btn btn-danger btn-mini">Ignorar</a>
						</td>
					</tr>
					<tr>
						<td><a href="#">Ricardo Mendes</a></td>
						<td>43 anos</td>
						<td>ricardomendes@exemplo.com</td>
						<td style="text-align: center">
							<a href="#" class="btn btn-primary btn-mini">Enviar</a>
							<a href="#" class="btn btn-danger btn-mini">Ignorar</a>
						</td>
					</tr>
					<tr>
						<td><a href="#">Alfredo Siqueira</a></td>
						<td>32 anos</td>
						<td>alfredosiqueira@exemplo.com</td>
						<td style="text-align: center">
							<a href="#" class="btn btn-primary btn-mini">Enviar</a>
							<a href="#" class="btn btn-danger btn-mini">Ignorar</a>
						</td>
					</tr>
					<tr>
						<td><a href="#">Jorge Mattos</a></td>
						<td>28 anos</td>
						<td>jorgemattos@exemplo.com</td>
						<td style="text-align: center">
							<a href="#" class="btn btn-primary btn-mini">Enviar</a>
							<a href="#" class="btn btn-danger btn-mini">Ignorar</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span10 offset1 dashboard-block">
			<h3>Eventos recentes</h3>
			<table class="table table-striped table-bordered">
				<tbody>
					<tr>
						<td class="event-cell">
							<p>
								<strong class="event-day">Dia: </strong>18 de maio de 2013
								<strong class="event-hour">Horário: </strong>15:30
							</p>
							<p>
								<strong>Processo:</strong>
								Candidato <a href="#">Jorge Mattos</a> e empresa <a href="#">Banco Santander</a>
							</p>
							<p>
								<strong>Evento:</strong>
								Entrevista na empresa
							</p>
						</td>
						<td style="width: 150px; vertical-align: middle">
							<a href="#" class="btn pull-right event-btn">Ver detalhes >></a>
						</td>
					</tr>
					<tr>
						<td class="event-cell">
							<p>
								<strong class="event-day">Dia: </strong>16 de maio de 2013
								<strong class="event-hour">Horário: </strong>17:30
							</p>
							<p>
								<strong>Processo:</strong>
								Candidato <a href="#">Ricardo Mendes</a> e empresa <a href="#">Sony</a>
							</p>
							<p>
								<strong>Evento:</strong>
								Conclusão do processo
							</p>
						</td>
						<td style="width: 150px; vertical-align: middle">
							<a href="#" class="btn pull-right event-btn">Ver detalhes >></a>
						</td>
					</tr>
					<tr>
						<td class="event-cell">
							<p>
								<strong class="event-day">Dia: </strong>15 de maio de 2013
								<strong class="event-hour">Horário: </strong>12:30
							</p>
							<p>
								<strong>Processo:</strong>
								Candidato <a href="#">João Silva</a> e empresa <a href="#">Banco Itaú</a>
							</p>
							<p>
								<strong>Evento:</strong>
								Contato com candidato
							</p>
						</td>
						<td style="width: 150px; vertical-align: middle">
							<a href="#" class="btn pull-right event-btn">Ver detalhes >></a>
						</td>
					</tr>
					<tr>
						<td class="event-cell">
							<p>
								<strong class="event-day">Dia: </strong>11 de maio de 2013
								<strong class="event-hour">Horário: </strong>11:30
							</p>
							<p>
								<strong>Processo:</strong>
								Candidato <a href="#">Alfredo Siqueira</a> e empresa <a href="#">Nokia</a>
							</p>
							<p>
								<strong>Evento:</strong>
								Feedback do candidato
							</p>
						</td>
						<td style="width: 150px; vertical-align: middle">
							<a href="#" class="btn pull-right event-btn">Ver detalhes >></a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

</div>
