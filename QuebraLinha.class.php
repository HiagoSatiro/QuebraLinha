<?php

      /**
        * @author Mazurco066
        */
      class QuebraLinha implements TextWrapExerciseInterface {

        /**
          * @param string $text
          *   O texto que será utilizado como entrada.
          * @param int $length
          *   Em quantos caracteres a linha deverá ser quebrada.
          *
          * @return array
          *   Um array de strings equivalente ao texto recebido por parâmetro porém
          *   respeitando o comprimento de linha e as regras especificadas acima.
          */
        public static function textWrap(string $text, int $length): array{

          //Definindo Variáveis de uso geral
          $limiteLinha = 0; //Contador que armazena a posicao atual da linha que está
          $palavraGrande = 0; //Armazena o tamanho de uma palavra grande quando há uma
          $retorno = array(); //Vetor de retorno da função, sera adicionado palavras nele ao decorrer do método

          $text = explode(" ", $text);  //Método que divide uma string bruta palavra por palavra
          foreach($text as $key => $value) $text[$key] = $value." "; //Adicionando novamente os espaços removidos pelo médoto explode

          foreach ($text as $palavra) { //Verifica palavra por palavra do Texto Recebido

            $lenghtPalavra = $limiteLinha + strlen($palavra) - 1; //Recebe a posicao quea palavra ocuparia

            switch ($lenghtPalavra) {

              case ($lenghtPalavra < $length): //Se a palavra se encaixa dentro do limite definido
                $limiteLinha += strlen($palavra); //Incrementa o tamanho da palavra ao contador
                array_push($retorno, $palavra); //Adiciona ao vetor de retorno a palavra
              break;

              case ($lenghtPalavra == $length):  //Se a palavra se encaixa ainda dentro do limite mais exatamente dentro do limite
                array_push($retorno, $palavra."<br>");  //Adiciona ao vetor de retorno a palavra
                $limiteLinha = 0; //Zera o contador pois ja deu o limite dessa linha
              break;

              case ($lenghtPalavra > $length):   //Se a palavra for grande e ultrapassar o limite

                if (strlen($palavra) - 1 > $length){  //Se for grande o suficiente a ponto de necessitar mais de 1 linha

                  $palavraGrande = (strlen($palavra) - 1) / $length; //Calcula o tamanho que a palavra ira ocupar

                  for ($i = 0; $i <= $palavraGrande; $i++){ //Percorre a palavra grande caracter por caracter

                    $lengthPalavraGrande = strlen(substr($palavra, ($length * $i) - $limiteLinha, $length - 1));
                    $caracteresDisponiveis = $length - $limiteLinha;  //Armazena os caracteres disponiveis
                    $linha = substr($palavra, ($length * $i), $length); //Conteúdo que encaixara na linha

                    if ($i == $palavraGrande ){ //Se chegar na ultima posição

                        switch ($lengthPalavraGrande){

                          case ($lengthPalavraGrande > $caracteresDisponiveis):
                            //Se necessitar de mais uma linha
                            array_push($retorno, "<br>".$linha); //Adiciona ao vetor de retorno a palavra
                            $limiteLinha = strlen(substr($palavra, ($length * $i), $length)); //Quebra a linha na posição que parou
                          break;

                          case ($lengthPalavraGrande < $caracteresDisponiveis):
                            //Se encaixar na linha
                            array_push($retorno, $linha);  //Adiciona ao vetor de retorno a palavra
                            $limiteLinha = strlen(substr($palavra, ($length * $i) - $limiteLinha, $length)); //Define a posição d alinha que parou e prossegue para proxima palavra
                          break;

                          case ($lengthPalavraGrande == $caracteresDisponiveis):
                            //Se encaixar exatamente no limite da linha
                            array_push($retorno, $linha);  //Adiciona ao vetor de retorno a palavra
                            $limiteLinha = 0; //Zera o contador
                          break;
                        }

                    }
                    else{

                      if ($limiteLinha - 1 != 0 || $limiteLinha - 1 != -1){
                        //Se tiver alguma palavra na linha
                        array_push($retorno, "<br>".$linha);  //Adiciona ao vetor de retorno a palavra
                        $limiteLinha = strlen(substr($palavra, ($length * $i) , $length));  //Retoma o contaddor
                      }
                      else{
                        //Se estiver vazia
                        array_push($retorno, $linha."<br>"); //Adiciona ao vetor de retorno a palavra
                        $limiteLinha = 0; //Zera o contador
                      }

                    }

                  }

                }
                else{ //Se for grande e caber somente em uma linha

                  array_push($retorno, "<br>".$palavra);  //Adiciona ao vetor de retorno a palavra
                  $limiteLinha = strlen($palavra);  //Incrementa o tamanho da palavra no contador
                }
              break;

              default:
                //Nada Acontece
              break;
            }

          }

          //Testanto outro retorno especificado nos requisitos
          $retorno2 = array();
          $pal = 0;
          $lin = 0;
          foreach($retorno as $key => $value){

            if (strpos($retorno[$pal], "<br>") === false){

              $retorno2[$lin] .= $retorno[$pal];
              $pal++;
            }
            else{
              $lin++;
              $retorno2[$lin] .= $retorno[$pal];
              $pal++;

            }

          }

          return $retorno2;
        }

        /**
          * Imprime na tela o texto formatado recebe como parametro o vetor de palavras
          * que foi formatado pela função textWrap
          *
          * @param array $text
          *   O texto ja formatado pela função textWrap
          */
        public static function showText(array $text){

          foreach ($text as $key => $value) {
            print($value);  //Para cada elemento do vetor imprime-o na tela
          }

        }
      }
 ?>
