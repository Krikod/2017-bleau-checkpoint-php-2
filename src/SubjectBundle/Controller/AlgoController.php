<?php

namespace SubjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlgoController extends Controller
{
$string = "";
$word = '';
$i = 0;
$word_length = 0;
$words = [];
$max = -1;

    public function strlenOrder($string, $order)
    {
        $this->string = "";
        $this->word = "";
        $this->words = words();


        while( isset($string[$i]) ) {
            if( $string[$i] !== ' ' ){
                $word .= $string[$i];
                $word_length++;
            }else{

                $max = ($word_length > $max) ? $word_length : $max;

                $words[$word_length][] = $word;
                $word = '';
                $word_length = 0;
            }
            $i++;
        }

        $order = "DESC";
        $res = '';
        if( $order === "DESC") {
            for( $i = $max; $i>=0 ; $i--) {
                if( ! isset($words[$i]) ) { continue; }
                foreach($words[$i] as $word){
                    $res .= $word . ' ';
                }
            }
        }else {

            for( $i = 0; $i<=$max; $i++) {
                if( ! isset($words[$i]) ) { continue; }
                foreach($words[$i] as $word){
                    $res .= $word . ' ';
                }
            }
        }

        echo $res . "\n";
    }
}

