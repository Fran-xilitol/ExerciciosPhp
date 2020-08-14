<?php

namespace Galoa\ExerciciosPhp\TextWrap;

/**
 * Implemente sua resolução nessa classe.
 *
 * Depois disso:
 * - Crie um PR no github com seu código
 * - Veja o resultado da correção automática do seu código
 * - Commit até os testes passarem
 * - Passou tudo, melhore a cobertura dos testes
 * - Ficou satisfeito, envie seu exercício para a gente! <3
 *
 * Boa sorte :D
 */
class Resolucao implements TextWrapInterface {

  /**
   * {@inheritdoc}
   *
   * Apague o conteúdo do método abaixo e escreva sua própria implementação,
   * nós colocamos esse mock para poder rodar a análise de cobertura dos
   * testes unitários.
   */
  public function textWrap($text, $length): array {

    $cut = "";
    // String para vazio que será preenchido.

    $words = explode(" ", $text);
    // Separar as palavras do string de entrada em um array de palavras.

    // Preenchendo o string de saída:

    $l = $length;
    // Espaço disponível de cada linha.

    for ($i = 0; $i < count($words); $i++){
        // Observar cada palavra do array.

        if (strlen($words[$i]) < $l){
          // Ao adicionar uma palavra, já adicionamos o espaçamento (exceto para a primeira palavra do texto).
          if (i=0){
            $cut.=$words[$i];}
          else{
            $cut.=" ".$words[$i];
            $l -= strlen($words[$i]);
            }
        }
        elseif (strlen($words[$i]) <= $length){
            $cut.="\n".$words[$i];
            $l = $length - strlen($words[$i]);
        }
        // Caso extremo: palavra maior que a linha:
        else {
            if($l < $length){
                $cut.="\n";
            }
            // Garantindo que essa palavra estará iniciando uma linha.
            $parte1="";
            for($j = 0; $j < $length; $j++){
                $parte1.=$words[$i][$j];
            }
            $parte2="";
            for($k = $length; $k < strlen($words[$i]); $k++){
                $parte2.=$words[$i][$k];
            }
          if (i=0){
            $cut.=$parte1;}
          else{
            $cut.=" ".$parte1;}
          $l = 0;
          // A palavra em questão pode ser mais extensa que 2 linhas, tendo que ser dividida em mais partes...
          // Então para garantir que seja dividida em quantas partes necessárias, o resto da palavra volta para ser analisada novamente.
          $words[$i]=$parte2;
          $i--;
        } 
    }
    $lista = explode("\n",$cut);
    return $lista;
  }

}
