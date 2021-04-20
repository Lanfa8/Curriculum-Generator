<!DOCTYPE html>
<html>
<head>
	<title>Curriculo</title>
	<style type="">
		div > div{
			margin-bottom: 20px;
		}
		.quasetitulo{
			font-size: 14pt;
			font-weight: bold;
      margin-right: 70px;
      width:90px !important;
		}
    .cabecalho{
      display:flex;
      justify-content: space-between;
    }
    .container1{
      display:flex;
      flex-direction: column;
    }
    .centralizar{
      text-align: center !important;
    }
    .primeironome{
      color:#1e9e9e;
    }
    .nomedapessoa{
      font-size: 35pt;
    }
    body{
      padding:30px;
      color: #666666;
    }
    .minicontainer{
      display:flex;
      flex-direction:row;
    }
    .bolinha::before{
      content: '• ';
      font-size: 14pt;
      margin-right: 5px;
      color: black;
    }
    .miniminicontainer{
      display:flex;
      flex-direction:row;
    }
    .cabecalhohistoricoprofissional{
      margin-bottom:5px;
    }
    .cargo{
      font-weight:bold;
    }
    .nomedaempresa{
      font-style:italic;
    }
    .quadradobrancopraarrumar{
      width:160px;
      visibility:hidden;
    }
    .tocansado{
      margin-bottom:0px;
    }
    .miniminiminicontainer{
      display:flex;
      flex-direction:column; 
    }
	</style>
</head>
<body>
<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

  $estadosBrasileiros = array(
    'AC'=>'Acre',
    'AL'=>'Alagoas',
    'AP'=>'Amapá',
    'AM'=>'Amazonas',
    'BA'=>'Bahia',
    'CE'=>'Ceará',
    'DF'=>'Distrito Federal',
    'ES'=>'Espírito Santo',
    'GO'=>'Goiás',
    'MA'=>'Maranhão',
    'MT'=>'Mato Grosso',
    'MS'=>'Mato Grosso do Sul',
    'MG'=>'Minas Gerais',
    'PA'=>'Pará',
    'PB'=>'Paraíba',
    'PR'=>'Paraná',
    'PE'=>'Pernambuco',
    'PI'=>'Piauí',
    'RJ'=>'Rio de Janeiro',
    'RN'=>'Rio Grande do Norte',
    'RS'=>'Rio Grande do Sul',
    'RO'=>'Rondônia',
    'RR'=>'Roraima',
    'SC'=>'Santa Catarina',
    'SP'=>'São Paulo',
    'SE'=>'Sergipe',
    'TO'=>'Tocantins'
    );
    foreach ($estadosBrasileiros as $key => $value) {
      if($_POST['estado'] == $value){
        $_POST['estado'] = $key;
        break;
      }
    }
 	//require_once __DIR__ . '/vendor/autoload.php';
    $nomeMaiusculo = strtoupper($_POST['nomecompleto']);
    $nomeSeparado = explode(" ", $nomeMaiusculo);
    $novoNome = "<span class='primeironome'>" .  $nomeSeparado[0] . "</span><br>";
    for ($i=1; $i < count($nomeSeparado); $i++) {   
      $novoNome = $novoNome . $nomeSeparado[$i] . "&nbsp;";
    }
    
    
    $informacoesbase = "<div class='cabecalho'>
    <div class='nomedapessoa'><span>{$novoNome}</span></div>
      <div class='container1'>
        <div class='centralizar'>{$_POST['telefone']}</div>  
        <div class='centralizar'><span>{$_POST['endereco']}</span>,&nbsp;<span>{$_POST['cidade']}</span>,&nbsp;<span>{$_POST['estado']}</div>
        <div class='centralizar'><span>{$_POST['email']}</span></div>
      </div>
    </div>
    <hr>";

    $resumoprofissional = "<div class='minicontainer'><div class='quasetitulo'>Resumo profissional</div>
    <div class='textinho'>{$_POST['resumoprofissional']}</div>
    </div>
    ";

    $qualificacoesprofissionais = "<div class='minicontainer'><div class='quasetitulo'>Qualificações <br>profissionais</div><div class='miniminiminicontainer'>";

    for($i = 0; $i < count($_POST['qualificacoesprofissionais']); $i++){
      $qualificacoesprofissionais = $qualificacoesprofissionais . "<div class='bolinha'> <span>{$_POST['qualificacoesprofissionais'][$i]}</span> </div>";
    }

    $qualificacoesprofissionais = $qualificacoesprofissionais . "</div></div>";

    $historico = "<div class='minicontainer'> <div class='quasetitulo'>Histórico profissional</div>";

    for($i = 0; $i < count($_POST['cargonaempresa']); $i++){
      $historico = $historico . "<div class='tocansado'><div class='cabecalhohistoricoprofissional'><span class='cargo'>{$_POST['cargonaempresa'][$i]}</span> - <span class='nomedaempresa'>{$_POST['nomedaempresa'][$i]}</span></div>
      <div><span>{$_POST['cidadedaempresa'][$i]} - </span> {$_POST['anodeingressonaempresa'][$i]}</div></div></div>";
      for ($i=0; $i < count($_POST['feitosdapessoa']) ; $i++){ 
        $historico = $historico . "<div class='miniminicontainer'><div class='quadradobrancopraarrumar'></div><div class='bolinha esquerda'>{$_POST['feitosdapessoa'][$i]}</div></div>";
      }
    }

    $historico = $historico . "";

    $educacao = "<div class='minicontainer'><div class='quasetitulo'> Educação </div><div>";

    for($i = 0; $i < count($_POST['nomedaformacao'])-1; $i++){
      $educacao = $educacao . "<div class=''> <span>{$_POST['nomedaformacao'][$i]}</span> - <span>{$_POST['instituicaodaformacao'][$i]}</span></div>";
    }
    
    $educacao = $educacao . "</div></div>";
    

    $paginafinal = $informacoesbase . $resumoprofissional . $qualificacoesprofissionais . $historico . $educacao;
    print($paginafinal)
    /*$nomedoarquivo = "curriculo1.pdf";
  	$mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($paginafinal);
    
    $mpdf->Output ($nomedoarquivo, 'I');*/

 ?>
 <script type="">
 	
 </script>
</body>
</html>


