<?php

  require_once("../TextWrapExerciseInterface.class.php"); //Classe Interface fornecida pela Galoa
  require_once("../QuebraLinha.class.php"); //Classe criada para implementar a classe Interface

  class QuebraLinhaTest extends PHPUnit\Framework\TestCase {

    //TESTES DE VERIFICAÇÃO DE TIPO DE RETORNO
    function test01(){
      //Confirma se o retorno é um array
      $q = new QuebraLinha();
      $textoBruto = "essaPalavraéMuitoMuitoGrande = Texto Digitado por Gabriel Mazurco Ribeiro";
      $retornoTeste =  $q->textWrap($textoBruto, 20);
      $this->assertInternalType('array',$retornoTeste);
    }

    function test02(){
      //Confirma se o retorno é um array denovo mas dessa vez diminuindo tamanho linear para 1
      $q = new QuebraLinha();
      $textoBruto = "essaPalavraéMuitoMuitoGrande = Texto Digitado por Gabriel Mazurco Ribeiro";
      $retornoTeste =  $q->textWrap($textoBruto, 1);
      $this->assertInternalType('array',$retornoTeste);
    }

    function test03(){
      //Verifica se todos elementos do vetor de retorno são strings
      $q = new QuebraLinha();
      $textoBruto = "essaPalavraéMuitoMuitoGrande = Texto Digitado por Gabriel Mazurco Ribeiro";
      $retornoTeste =  $q->textWrap($textoBruto, 5);
      foreach ($retornoTeste as $key => $value) {
        $this->assertInternalType('string',$value);
      }
    }

    function test04(){
      //Verifica se todos elementos do vetor de retorno são strings com um texto muito muito muito mais muito longo mesmo
      $q = new QuebraLinha();
      $textoBruto = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget enim at mi fermentum malesuada. Sed a nisi vitae quam sollicitudin eleifend in vel quam. Sed lobortis ut nibh vel lacinia. Duis nunc velit, placerat in tincidunt quis, pharetra at odio. Donec iaculis ultrices ultrices. Ut dictum arcu nisl, a vestibulum augue pharetra eu. Integer semper lorem sed elit laoreet egestas. Praesent scelerisque tempor lacus. Etiam mollis orci sapien, et scelerisque neque sodales a. Morbi imperdiet sed nunc nec aliquet. Proin semper, ex ut semper pretium, elit tellus consectetur orci, sed imperdiet tortor neque viverra diam. Pellentesque ex augue, mattis vitae fermentum in, euismod vel metus. Integer et pellentesque lacus. Mauris lacinia purus ut lacinia eleifend. Etiam pretium quam at tellus ornare, a mattis lorem gravida. Donec et mauris et diam accumsan tincidunt. Etiam suscipit nulla lectus, eu pretium leo varius vel. Praesent luctus, diam sed vestibulum facilisis, quam justo aliquam magna, at mattis ligula ex sed nulla. Integer commodo dolor a leo cursus, ac lacinia libero feugiat. Nam porttitor dignissim bibendum. Donec ullamcorper sed justo mattis aliquet. Quisque a pretium felis, eget mollis dolor. Fusce facilisis tempus luctus. Vestibulum mattis nulla eu suscipit viverra. Duis ac nulla non lacus feugiat luctus id sit amet mi. Nam aliquam lobortis ligula, eget hendrerit magna commodo pretium. Etiam iaculis leo quis ante vestibulum cursus. enean vitae lacinia orci, sit amet porttitor lorem. Quisque placerat turpis in leo tempor, in rutrum arcu aliquet. Cras consectetur, arcu sit amet vehicula pharetra, nisl diam faucibus ipsum, eget vulputate eros nisi sit amet ligula. Integer tristique dictum nisi at consequat. Morbi sed imperdiet eros. Curabitur ornare ornare turpis, a auctor lectus pellentesque nec. Phasellus ullamcorper sagittis orci in tempor. Integer at arcu lacus. Integer sit amet lorem metus. Praesent eget nisi placerat, tincidunt nibh sit amet, convallis urna. Morbi ac ipsum feugiat eros cursus consequat. Sed ante lorem, mollis vitae risus vel, accumsan tincidunt purus. Sed sed maximus magna.";
      $retornoTeste =  $q->textWrap($textoBruto, 20);
      foreach ($retornoTeste as $key => $value) {
        $this->assertInternalType('string',$value);
      }
    }

    //TESTES DE VALOR LIMITE INFERIOR (NO CASO SÓ VAI TER INFERIOR MSM POR QUE NÃO É DEFINIDO NOS REQUISITOS VALOR LIMITE MAXIMO)
    function test05(){
      //Verifica se Retorna valor inválido com tamanho inválido
      $q = new QuebraLinha();
      $textoBruto = "Texto Digitado por Gabriel Mazurco Ribeiro";
      $retornoTeste =  $q->textWrap($textoBruto, 0);
      $this->assertEquals("Por favor entre com algum limite válido", $retornoTeste[0]);
    }

    function test06(){
      //Verifica se todos retornos sao strings com teste de limite inferior
      $q = new QuebraLinha();
      $textoBruto = "Texto Digitado por Gabriel Mazurco Ribeiro";
      $retornoTeste =  $q->textWrap($textoBruto, 1);
      foreach ($retornoTeste as $key => $value) {
        $this->assertInternalType('string',$value);
      }
    }

    function test07(){
      //Verifica se formato do retorno esta como especificado nos requisitos mas com analise de valor limite e palavra grande
      $q = new QuebraLinha();
      $textoBruto = "Isso e um teste";
      $retornoTeste =  $q->textWrap($textoBruto, 2);
      //'Isso' palavra grande demais entao pula uma linha e começa com metade dela e termina na segunda linha
      //O mesmo vale para a palavra Teste
      $this->assertEquals(array('', 'Is', 'so ', 'e ', 'um ', '', 'te', 'st', 'e '), $retornoTeste);
    }

    //FINALMENTE O TESTE PARA VALIDAR SE O RETORNO ESTA DE ACORDO COM O REQUISITO ESPECIFICADO
    function test08(){
      //Verifica se formato do retorno esta como especificado nos requisitos
      $q = new QuebraLinha();
      $textoBruto = "Isso e um teste";
      $retornoTeste =  $q->textWrap($textoBruto, 5);
      $this->assertEquals(array('Isso ', 'e um ', 'teste '), $retornoTeste);
    }


  }

 ?>
