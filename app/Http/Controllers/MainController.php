<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LengthException;

class MainController extends Controller
{
   public function index(){
    $res = null;
    return view('welcome', ['res' => $res]);
   }

   public function conversor(Request $request){
    // I = 1, V = 5, X = 10, L = 50, C = 100, D = 500, M = 1000

    $numeros = $request->input('numbers');

    $numberString = strval($numeros); 
    $digits = str_split($numberString); 

    $t1 = isset($digits[0]) ? strval($digits[0]) : 0; // iniciando as variaveis com valor padrão
    $t2 = isset($digits[1]) ? strval($digits[1]) : 0;
    $t3 = isset($digits[2]) ? strval($digits[2]) : 0;
    $t4 = isset($digits[3]) ? strval($digits[3]) : 0;

    $resultado = ''; // inicia a variavel com um valor "vazio" para caso o codigo não inicie o bloco if
    
    $converterAlg = [ 0 => '', 1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V',6 => 'VI', 7 => 'VII', 8 => 'VIII', 9 => 'IX',
    ];
    $converterDez = [0 => '',1 => 'X', 2 => 'XX',3 => 'XXX',  4 => 'XL',  5 => 'L', 6 => 'LX', 7 => 'LXX', 8 => 'LXXX', 9 => 'XC',
    ];
    $converterCent = [0 => '',1 => 'C', 2 => 'CC', 3 => 'CCC', 4 => 'CD', 5 => 'D', 6 => 'DC', 7 => 'DCC', 8 => 'DCCC', 9 => 'CM'];
    $converterMil = [0 => '',1 => 'M', 2 => 'MM', 3 => 'MMM', 4 => '¯IV', 5 => '¯V', 6 => '¯VI', 7 => '¯VII', 8 => '¯VIII', 9 => '¯IX'];

    if(count($digits) == 1){
        $algorismo1 = $converterAlg[$t1]; // vai receber o valor do $t1 e vê qual índice ou chave é igual, então recebe seu valor

        $resultado = $algorismo1;
    }
    if(count($digits) == 2){
        $deze = $converterDez[$t1];
        $algorismo2 = $converterAlg[$t2];

        $resultado = $deze . $algorismo2;
    }
    if(count($digits) == 3){

        $cent = $converterCent[$t1];
        $deze = $converterDez[$t2];
        $algorismo3 = $converterAlg[$t3];
    
        $resultado = $cent . $deze . $algorismo3;
    }
    if(count($digits) == 4){

        $mil = $converterMil[$t1];
        $cent = $converterCent[$t2];
        $deze = $converterDez[$t3];
        $algorismo3 = $converterAlg[$t4];
    
        $resultado = $mil . $cent . $deze . $algorismo3;
    }
    $res = $resultado;
    return view('welcome', ['res' => $res]);
}
   
}
