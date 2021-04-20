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
		}
    .cabecalho{
      -webkit-box-shadow: 6px 6px 0px -2px rgba(0,0,0,1);
      -moz-box-shadow: 6px 6px 0px -2px rgba(0,0,0,1);
      box-shadow: 6px 6px 0px -2px rgba(0,0,0,1);
      border: black 3px solid;
      text-align: center;
      padding: 10px;
      margin-bottom: 20px;
    }.licabecalho{
      display:flex;
    }
    .container{
      display:flex;
      justify-content:space-between;
      flex-direction:row;
    }
    div > div{
      margin-bottom:0px;
    }
    .nomedapessoa{
      font-weight:bold;
      font-family:Impact,fantasy;
      margin: 20px;
      font-size:26pt;
    }
    .bolinha::before{
      content: '• ';
      font-size: 14pt;
      margin-right: 5px;
    }
    .quasetitulo{
      font-weight:bold;
      font-family:Impact,fantasy;
    }
    hr{
      border: black 1px solid;
    }
    .minicontainer{
      margin-bottom: 10px;
    }
    .esquerda{
      margin-left: 10px;
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
    
    $informacoesbase = "<div class='cabecalho'>
    <div class='nomedapessoa'><span>{$nomeMaiusculo}</span></div>
      <div class='container'>
        <div class='licabecalho'><span>{$_POST['endereco']}</span>,&nbsp;<span>{$_POST['cidade']}</span>,&nbsp;<span>{$_POST['estado']}</div>
        <div class='licabecalho bolinha'><span>{$_POST['telefone']}</span></div>
        <div class='licabecalho bolinha'><span>{$_POST['email']}</span></div>
      </div>
    </div>";

    $resumoprofissional = "<div class='minicontainer'><div class='quasetitulo'>Resumo profissional</div>
    <hr>
    <div class='textinho'>{$_POST['resumoprofissional']}</div>
    </div>
    ";

    $qualificacoesprofissionais = "<div class='minicontainer'><div class='quasetitulo'>Qualificações profissionais</div><hr>";

    for($i = 0; $i < count($_POST['qualificacoesprofissionais']); $i++){
      $qualificacoesprofissionais = $qualificacoesprofissionais . "<div class='bolinha'> <span>{$_POST['qualificacoesprofissionais'][$i]}</span> </div>";
    }

    $qualificacoesprofissionais = $qualificacoesprofissionais . "</div>";

    $historico = "<div class='minicontainer'> <div class='quasetitulo'>Histórico profissional</div><hr>";

    for($i = 0; $i < count($_POST['cargonaempresa']); $i++){
      $historico = $historico . "<div><span>{$_POST['cargonaempresa'][$i]}</span></div>
      <div><span>{$_POST['nomedaempresa'][$i]}</span> - <span>{$_POST['cidadedaempresa'][$i]}</span></div>";
      for ($i=0; $i < count($_POST['feitosdapessoa']) -1 ; $i++){ 
        $historico = $historico . "<div class='bolinha esquerda'>{$_POST['feitosdapessoa'][$i]}</div>";
      }
    }

    $historico = $historico . "</div>";

    $educacao = "<div class='minicontainer'><div class='quasetitulo'> Educação </div><hr>";

    for($i = 0; $i < count($_POST['nomedaformacao']); $i++){
      $educacao = $educacao . "<div class=''> <span>{$_POST['nomedaformacao'][$i]}</span> - <span>{$_POST['instituicaodaformacao'][$i]}</span></div>";
    }
    
    $educacao = $educacao . "</div>";
    

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


