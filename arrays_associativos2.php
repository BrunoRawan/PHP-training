<?php

$carros = array (
    'vw' => "Fusca",
    0 => "Passat",
    'chevrolet' => "Monza",
    1 => "Chevette",
    'fiat' => "Tempra",
    2 => "Uno"

);

// A impressão desse array gera a seguinte saída

// Faça você mesmo: utilize a função print_r($carros); e veja o resultado em sua tela.

print_r($carros);
echo "O tamanho atual do array é: " . count($carros);
echo "\n\n";

// Definindo o valor do índice 0 como vazio

$carros[0] = '';

print_r($carros);
echo "O tamanho do array é: " . count($carros);
echo "\n\n";

// Removendo dois elementos so array com unset

unset($carros['fiat'], $carros[1]);
print_r($carros);
echo "O tamanho atual do array é: " . count($carros);
echo "\n\n";

// Removwndo elementos do array com array_splice

array_splice($carros, 1, 2);
print_r($carros);
echo "O tamanho atual do array é:" . count($carros);
