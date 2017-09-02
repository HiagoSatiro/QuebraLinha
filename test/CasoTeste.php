<?php

  require_once("../TextWrapExerciseInterface.class.php"); //Classe Interface fornecida pela Galoa
  require_once("../QuebraLinha.class.php"); //Classe criada para implementar a classe Interface

  class QuebraLinhaTest extends PHPUnit\Framework\TestCase {

    function test01(){
      //Confirma se o retorno é um array
      $q = new QuebraLinha();
      $textoBruto = "essaPalavraéMuitoMuitoGrande = Texto Digitado por Gabriel Mazurco Ribeiro";
      $retornoTeste =  $q->textWrap($textoBruto, 20);
      $this->assertInternalType('array',$retornoTeste);
    }

    function test02(){
      //Confirma se o retorno é um array denovo mas dessa vez diminuindo tamanho linear para 5
      $q = new QuebraLinha();
      $textoBruto = "essaPalavraéMuitoMuitoGrande = Texto Digitado por Gabriel Mazurco Ribeiro";
      $retornoTeste =  $q->textWrap($textoBruto, 5);
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
      //Verifica se a string de uma linha contem pelo menos 1 ou mais caracteres
      $q = new QuebraLinha();
      $textoBruto = "essaPalavraéMuitoMuitoGrande = Texto Digitado por Gabriel Mazurco Ribeiro";
      $retornoTeste =  $q->textWrap($textoBruto, 5);
      foreach ($retornoTeste as $key => $value) {
        $this->assertStringMatchesFormat('%s', $value);
      }
    }


  }

 ?>
