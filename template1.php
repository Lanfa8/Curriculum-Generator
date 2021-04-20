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
    .nomedapessoa{
      font-weight: bold;
      font-size: 32pt;
    }
    .flex{
      display: flex;
      margin-bottom: 20px;
    }
    .container{
      padding: 5%;
    }
    div > div{
      margin-bottom: 0px;
    }
    .informacoesgerais{
      margin-bottom: 15px;
    }
    .bold{
      font-weight:bold;
    }
    li{
      font-weight:none; 
    }
    body{
      color: #666666;
    }
	</style>
</head>
<body>
 <?php

  error_reporting(0);
  ini_set(“display_errors”, 0 );

  $destino = 'imagens/' . $_FILES['fotodapessoa']['name'];
 
 $arquivo_tmp = $_FILES['fotodapessoa']['tmp_name'];
  
 move_uploaded_file( $arquivo_tmp, $destino  );
 	//require_once __DIR__ . '/vendor/autoload.php';
  print("<div class='container'>");
   $fotinea = "<div class='flex' style='
   flex-direction: row;
   justify-content: flex-start;'> <img style='width:142.5px;
   height:190px;' src='imagens/" . $_FILES['fotodapessoa']['name'] . "'/>";

    $informacoesbase = "<div class='' style='
    flex-direction:;
    justify-content:;
    text-align:left;
    padding-left: 30px;'>

    <div class='informacoesgerais'><span class='nomedapessoa'>{$_POST['nomecompleto']}</span></div>

    <div class='informacoesgerais'><span>{$_POST['nacionalidade']}</span>, <span>{$_POST['estadocivil']}</span>, <span>{$_POST['idade']} anos</span>
    </div>

    <div class='informacoesgerais'>Endereço - <span>{$_POST['endereco']}</span> </div>

    <div class='informacoesgerais'>Bairro <span>{$_POST['bairro']}</span> - <span>{$_POST['cidade']}</span> - <span>{$_POST['estado']}</span></div>

    <div class='informacoesgerais'>Telefone: <span>{$_POST['telefone']}</span> / E-mail: <span>{$_POST['email']}</span> </div>

    <div></div>
    </div></div>";

    $objetivo = "<div><span class='quasetitulo'>01 - OBJETIVO</span> <div>
    <hr/>
    <div><span>{$_POST['objetivo']}</span><div><br>
    ";
    
    $formacaoacademica = "<div><span class='quasetitulo'>02 - FORMAÇÃO</span> <div>
    <hr/>
    <ul>
    ";

    for($i = 0; $i < count($_POST['formacaoacademica']); $i++){
      $formacaoacademica = $formacaoacademica . "<li> <span>{$_POST['formacaoacademica'][$i]}</span> - <span>{$_POST['anodeformacao'][$i]}</span></li>";
    }

    $formacaoacademica = $formacaoacademica . "</ul>";

    $experienciasprofissionais = "<div><span class='quasetitulo'>03 - EXPERIENCIAS PROFISSIONAIS </span><div>
    <hr>
    <ul>
    ";

    for($i = 0; $i < count($_POST['nomedoestabelecimento']); $i++){
      $experienciasprofissionais = $experienciasprofissionais . "<li><span class='bold'> <span>{$_POST['nomedoestabelecimento'][$i]}</span> - (<span>{$_POST['anodeingresso'][$i]}</span> a <span>{$_POST['anodesaida'][$i]}</span>) </span><br>
      Cargo: <span>{$_POST['cargo'][$i]}</span><br>
      Principais atribuições:";
      switch ($i) {
        case '0':
          for ($c=0; $c < count($_POST['principaisatribuicoes1']) ; $c++) {
          if($c === count($_POST['principaisatribuicoes1'])-1){
              $experienciasprofissionais = $experienciasprofissionais . "<span>" . lcfirst($_POST['principaisatribuicoes1'][$c]) . "</span>. ";
            }
          else if($c===0){
              $experienciasprofissionais = $experienciasprofissionais . "<span>" . ucfirst($_POST['principaisatribuicoes1'][$c]) . "</span>. ";
          }else{
            $experienciasprofissionais = $experienciasprofissionais . "<span>" . lcfirst($_POST['principaisatribuicoes1'][$c]) . "</span>, ";
          }
          }
          break;
        case '1':
        for ($c=0; $c < count($_POST['principaisatribuicoes2']) ; $c++) {
          if($c === count($_POST['principaisatribuicoes2'])-1){
            $experienciasprofissionais = $experienciasprofissionais . "<span>" . lcfirst($_POST['principaisatribuicoes2'][$c]) . "</span>. ";
          }
        else if($c===0){
            $experienciasprofissionais = $experienciasprofissionais . "<span>" . ucfirst($_POST['principaisatribuicoes2'][$c]) . "</span>. ";
        }else{
          $experienciasprofissionais = $experienciasprofissionais . "<span>" . lcfirst($_POST['principaisatribuicoes2'][$c]) . "</span>, ";
        }
      }
          break;
        default:
        for ($c=0; $c < count($_POST['principaisatribuicoes3']) ; $c++) {
          if($c === count($_POST['principaisatribuicoes3'])-1){
            $experienciasprofissionais = $experienciasprofissionais . "<span>" . lcfirst($_POST['principaisatribuicoes3'][$c]) . "</span>. ";
          }
        else if($c===0){
            $experienciasprofissionais = $experienciasprofissionais . "<span>" . ucfirst($_POST['principaisatribuicoes3'][$c]) . "</span>. ";
        }else{
          $experienciasprofissionais = $experienciasprofissionais . "<span>" . lcfirst($_POST['principaisatribuicoes3'][$c]) . "</span>, ";
        }
      }
      $experienciasprofissionais = $experienciasprofissionais . "</li>";
    }
  }
    $experienciasprofissionais = $experienciasprofissionais . "</ul>";

    $aperfeicoamentospessoais = "<div><span class='quasetitulo'> 04 - APERFEIÇOAMENTOS PESSOAIS</span> <div>
    <hr>
    <ul>
    ";

    for($i = 0; $i < count($_POST['formacaoacademica']); $i++){
      $aperfeicoamentospessoais = $aperfeicoamentospessoais . "<li> <span>{$_POST['nomedocurso'][$i]}</span> - <span>{$_POST['localondeaprendeu'][$i]} (<span>{$_POST['quandoentrou'][$i]}</span> a <span>{$_POST['quandosaiu'][$i]}</span>) </li>";
    }

    $aperfeicoamentospessoais = $aperfeicoamentospessoais . "</ul>";

    $referencias = "<div ><span class='quasetitulo'> 05 - REFERENCIAS </span> <div>
    <hr>
    <ul>
    ";

    for($i = 0; $i < count($_POST['nomedoreferente']); $i++){
      $referencias = $referencias . "<li> <span>{$_POST['nomedoreferente'][$i]}</span> - <span>{$_POST['quemeoreferente'][$i]} - <span>{$_POST['telefonedoreferente'][$i]}</span></li>";
    }

    $referencias = $referencias . "</ul>";
    

    //print ($_FILES['fotodapessoa']['tmp_name']);
    $paginafinal = $fotinea . $informacoesbase . $objetivo . $formacaoacademica . $experienciasprofissionais . $aperfeicoamentospessoais . $referencias;
    print($paginafinal);
    print('</div>');
    /*$nomedoarquivo = "curriculo1.pdf";
  	$mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($paginafinal);
    
    $mpdf->Output ($nomedoarquivo, 'I');*/
 ?>
</body>
</html>