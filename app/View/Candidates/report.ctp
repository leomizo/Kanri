<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=relatorio_".createFileName($candidate['Candidate']['first_name']."_".$candidate['Candidate']['last_name']).".doc");

echo "<html>";
echo "<head>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Utf-8\">";
echo "</head>";
echo "<body style='font-family: Arial'>";
echo "<b style='font-size: 24px'>".$candidate['Candidate']['name']."</b>";
echo "<br /><br /><br />";
echo "<b style='font-size: 16px'>Dados pessoais</b>";
echo "<hr /><br />";
echo "<b style='font-size: 12px'>Primeiro nome: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['first_name'])."</span>";
echo "<br />";
echo "<b style='font-size: 12px'>Outros nomes: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['middle_names'])."</span>";
echo "<br />";
echo "<b style='font-size: 12px'>Sobrenome: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['last_name'])."</span>";
echo "<br />";
echo "<br />";
echo "<b style='font-size: 12px'>Sexo: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['gender_string'])."</span>";
echo "<br />";
echo "<b style='font-size: 12px'>Estado civil: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['civil_state_string'])."</span>";
echo "<br />";
echo "<br />";
echo "<b style='font-size: 12px'>Naturalidade: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['place_birth'])."</span>";
echo "<br />";
echo "<br />";
echo "<b style='font-size: 12px'>Dependentes: </b>";
echo "<table style='font-size: 12px; font-family: Arial'><thead><tr><th style='text-align: center'>Idade</th><th style='text-align: center'>Sexo</th></tr></thead><tbody>";
foreach ($candidate['Dependent'] as $dependent) {
	echo "<tr>";
	echo "<td style='text-align: center'>".$dependent['age']."</td>";
	echo "<td style='text-align: center'>".$dependent['gender_string']."</td>";
	echo "</tr>";
}
echo "</tbody></table><br />";
echo "<b style='font-size: 12px'>Data de nascimento: </b>";
echo "<span style='font-size: 12px'>".$candidate['Candidate']['birthdate'].' - '.$candidate['Candidate']['age']."</span>";
echo "<br />";
echo "<b style='font-size: 12px'>Endereço residencial: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['address'])."</span>";
echo "<br />";
echo "<b style='font-size: 12px'>Bairro: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['neighborhood'])."</span>";
echo "<br />";
echo "<b style='font-size: 12px'>CEP ou Zip Code: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['zip_code'])."</span>";
echo "<br />";
echo "<b style='font-size: 12px'>País: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['City']['State']['Country']['name'])."</span>";
echo "<br />";
echo "<b style='font-size: 12px'>Estado/Província: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['City']['State']['name'])."</span>";
echo "<br />";
echo "<b style='font-size: 12px'>Cidade: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['City']['name'])."</span>";
echo "<br />";
echo "<br />";
echo "<b style='font-size: 12px'>Telefone residencial: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['home_phone'])."</span>";
echo "<br />";
echo "<b style='font-size: 12px'>Telefone comercial: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['work_phone'])."</span>";
echo "<br />";
echo "<b style='font-size: 12px'>Telefone celular: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['mobile_phone'])."</span>";
echo "<br />";
echo "<br />";
echo "<b style='font-size: 12px'>E-mail pessoal: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['personal_email'])."</span>";
echo "<br />";
echo "<b style='font-size: 12px'>E-mail comercial: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['work_email'])."</span>";
echo "<br />";
echo "<b style='font-size: 12px'>Nome Skype: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['skype_name'])."</span>";
echo "<br />";
echo "<br /><br />";
echo "<b style='font-size: 16px'>Formação Acadêmica</b>";
echo "<hr /><br />";
echo "<ul>";
foreach ($candidate['CandidateFormation'] as $formation) {
	echo "<li>";
	echo "<b style='font-size: 12px'>".$formation['Formation']['name']."</b>";
	echo "<br />";
	echo "<span style='font-size: 12px'>".$formation['institution']."</span>";
	echo "<br />";
	echo "<span style='font-size: 12px'>Conclusão em ".$formation['conclusion_year']."</span>";
	echo "</li><br /><br />";
}
echo "</ul>";
echo "<b style='font-size: 16px'>Idiomas</b>";
echo "<hr /><br />";
echo "<ul>";
foreach ($candidate['CandidateLanguage'] as $language) {
	echo "<li>";
	echo "<b style='font-size: 12px'>".$language['Language']['name'].': </b>';
	echo "<span style='font-size: 12px'>".$language['level_string']."</span>";
	echo "</li>";
}
echo "</ul>";
echo "<br /><br />";
echo "<b style='font-size: 16px'>Cursos / especializações</b>";
echo "<hr /><br />";
echo "<ul>";
foreach ($candidate['CandidateCourse'] as $course) {
	echo "<li>";
	echo "<b style='font-size: 12px'>".$course['Course']['name']."</b>";
	echo "<br />";
	echo "<span style='font-size: 12px'>".$course['institution']."</span>";
	echo "<br />";
	echo "<span style='font-size: 12px'>Conclusão em ".$course['conclusion_year']."</span>";
	echo "</li><br /><br />";
}
echo "</ul>";
echo "<b style='font-size: 16px'>Experiência internacional</b>";
echo "<hr /><br />";
echo "<p style='font-size: 12px'>".$candidate['Candidate']['international_experience']."</p>";
echo "<br /><br />";
echo "<b style='font-size: 16px'>Remuneração</b>";
echo "<hr /><br />";
if ($candidate['Candidate']['income_type'] == 0 || $candidate['Candidate']['income_type'] == 2) {
	echo "<b style='font-size: 12px'>Salário CLT: </b>";
	echo "<span style='font-size: 12px'>".formatCurrency($candidate['Candidate']['income_clt'])."</span>";
}
echo "<br />";
if ($candidate['Candidate']['income_type'] == 1 || $candidate['Candidate']['income_type'] == 2) {
	echo "<b style='font-size: 12px'>Salário PJ: </b>";
	echo "<span style='font-size: 12px'>".formatCurrency($candidate['Candidate']['income_pj'])."</span>";
}
echo "<br />";
echo "<b style='font-size: 12px'>Bônus </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['income_bonus'])."</span>";
echo "<br />";
echo "<b style='font-size: 12px'>Seguro saúde: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['health_insurance_name'])."</span>";
echo "<br />";
echo "<b style='font-size: 12px'>Tipo de acomodação: </b>";
echo "<span style='font-size: 12px'>";
if ($candidate['Candidate']['health_insurance_name'] != '') echo avoid_blank($candidate['Candidate']['health_insurance_type_string']); else echo '-';
echo "</span>";
echo "<br />";
echo "<br />";
echo "<b style='font-size: 12px'>Seguro de vida: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['life_insurance_name'])."</span>";
echo "<br />";
echo "<b style='font-size: 12px'>Tipo: </b>";
echo "<span style='font-size: 12px'>";
if ($candidate['Candidate']['life_insurance_name'] != '') echo avoid_blank($candidate['Candidate']['life_insurance_type_string']); else echo '-';
echo "</span>";
echo "<br />";
echo "<b style='font-size: 12px'>Cobertura: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['life_insurance_coverage'])."</span>";
echo "<br />";
echo "<br />";
echo "<b style='font-size: 12px'>Seguro odontológico: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['dental_insurance'])."</span>";
echo "<br />";
echo "<b style='font-size: 12px'>Previdência privada: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['private_pension'])."</span>";
echo "<br />";
echo "<br />";
echo "<b style='font-size: 12px'>Vale Refeição: </b>";
echo "<span style='font-size: 12px'>";
if ($candidate['Candidate']['meal_ticket_value'] != '') echo formatCurrency($candidate['Candidate']['meal_ticket_value']).' '.$candidate['Candidate']['meal_ticket_type_string']; else echo '-';
echo "</span>";
echo "<br />";
echo "<br />";
echo "<b style='font-size: 12px'>Veículo: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['vehicle_description'])."</span>";
echo "<br />";
echo "<b style='font-size: 12px'>Tipo: </b>";
echo "<span style='font-size: 12px'>";
if ($candidate['Candidate']['vehicle_description'] != '') echo avoid_blank($candidate['Candidate']['vehicle_type_string']); else echo '-';
echo "</span>";
echo "<br />";
echo "<br />";
echo "<b style='font-size: 12px'>Vale combustível: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['fuel_voucher'])."</span>";
echo "<br />";
echo "<br />";
echo "<b style='font-size: 12px'>Cesta básica: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['market_basket'])."</span>";
echo "<br />";
echo "<br />";
echo "<b style='font-size: 12px'>Treinamentos: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['training_courses'])."</span>";
echo "<br />";
echo "<br />";
echo "<b style='font-size: 12px'>PLR: </b>";
echo "<span style='font-size: 12px'>".avoid_blank($candidate['Candidate']['profit_sharing'])."</span>";
echo "<br /><br />";
echo "<b style='font-size: 16px'>Comentários do consultor</b>";
echo "<hr /><br />";
echo "<p style='font-size: 12px'>".$candidate['Candidate']['comments']."</p>";
echo "<br /><br />";
echo "<b style='font-size: 16px'>Experiências profissionais</b>";
echo "<hr /><br />";
echo "<ul>";
foreach ($candidate['Experience'] as $workplace) {
	echo "<li>";
	echo "<b style='font-size: 12px'>Empresa: ".$workplace[0]['Workplace']['name']."</b>";
	echo "<br />";
	echo "<span style='font-size: 12px'> Empresa ".$workplace[0]['Workplace']['nationality'].' - Segmento '.$workplace[0]['Workplace']['MarketSector']['name']."</span>";
	echo "<ul>";
	foreach ($workplace as $experience) {
		echo "<li>";
		echo "<b style='font-size: 12px'>";
		if ($experience['final_date'] && $experience['final_date'] != '') echo $experience['start_date_string'].' a '.$experience['final_date_string']; else echo $experience['start_date_string'];
		echo "</b>";
		echo "<br />";
		echo "<b style='font-size: 12px'>".$experience['Job']['name']."</b>";
		echo "<br />";
		if ($experience['report'] != '') {
			echo "<span style='font-size: 12px'>Reporte: ".$experience['report']."</span>";
			echo "<br />";
		}
		if ($experience['team'] != '') {
			echo "<span style='font-size: 12px'>Equipe: ".$experience['team']."</span>";
			echo "<br />";
		}
		echo "</li>";
	}
	echo "</ul>";
	echo "</li>";
}
echo "</ul>";
echo "<br /><br />";
echo "</body>";
echo "</html>";
exit();
?>