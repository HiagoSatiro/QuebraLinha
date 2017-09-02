<?php

  require_once("../TextWrapExerciseInterface.class.php"); //Classe Interface fornecida pela Galoa
  require_once("../QuebraLinha.class.php"); //Classe criada para implementar a classe Interface

  class QuebraLinhaTest extends PHPUnit\Framework\TestCase {

    function test01(){
      //Confirma se o retorno é um array
      $q = new QuebraLinha();
      $retornoTeste =  $q->textWrap("Isso é um teste", 5);
      $this->assertInternalType('array',$retornoTeste);
    }

  }

 ?>
