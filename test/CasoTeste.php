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

    //TESTES DE VALOR LIMITE INFERIOR (NO CASO SÓ VAI TER INFERIOR MSM POR QUE NÃO É DEFINIDO NOS REQUISITOS VALOR LIMITE MAXIMO)
    function test04(){
      //Verifica se Retorna valor inválido com tamanho inválido
      $q = new QuebraLinha();
      $textoBruto = "Texto Digitado por Gabriel Mazurco Ribeiro";
      $retornoTeste =  $q->textWrap($textoBruto, 0);
      $this->assertEquals("Por favor entre com algum limite válido", $retornoTeste[0]);
    }

    function test05(){
      //Verifica se todos retornos sao strings com teste de limite inferior
      $q = new QuebraLinha();
      $textoBruto = "Texto Digitado por Gabriel Mazurco Ribeiro";
      $retornoTeste =  $q->textWrap($textoBruto, 1);
      foreach ($retornoTeste as $key => $value) {
        $this->assertInternalType('string',$value);
      }
    }

    function test06(){
      //Verifica se formato do retorno esta como especificado nos requisitos mas com analise de valor limite e palavra grande
      $q = new QuebraLinha();
      $textoBruto = "Isso e um teste";
      $retornoTeste =  $q->textWrap($textoBruto, 2);
      //'Isso' palavra grande demais entao pula uma linha e começa com metade dela e termina na segunda linha
      //O mesmo vale para a palavra Teste
      $this->assertEquals(array('', 'Is', 'so ', 'e ', 'um ', '', 'te', 'st', 'e '), $retornoTeste);
    }

    //FINALMENTE O TESTE PARA VALIDAR SE O RETORNO ESTA DE ACORDO COM O REQUISITO ESPECIFICADO
    function test07(){
      //Verifica se formato do retorno esta como especificado nos requisitos
      $q = new QuebraLinha();
      $textoBruto = "Isso e um teste";
      $retornoTeste =  $q->textWrap($textoBruto, 5);
      $this->assertEquals(array('Isso ', 'e um ', 'teste '), $retornoTeste);
    }


  }

 ?>
