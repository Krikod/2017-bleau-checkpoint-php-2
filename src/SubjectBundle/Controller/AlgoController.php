<?php

namespace SubjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlgoController extends Controller
{
    //////////////////////////////////////
    // Complète la fonction suivante //
    //////////////////////////////////////
    //
    public function strlenOrder($string, $order)
    {
        // On explose la string en tableau, le caractère de séparation est un espace
        // ex:
        // $str = 'Il fait chaud'
        // explode(' ', $str) renvéra ['Il', 'fait', 'chaud']
        $words = explode(' ', $string);

        // Parcours du tableau
        foreach ($words as $word) {
            // Compte le nombre de cacrtères de chaque élément du tableau
            $length = strlen($word);

            // Définition d'un nouveau tableau avec pour clé le nombre de caractère du mot, et pour valeur le mot
            // Ex:
            // $word = 'chaud'
            // strlen($word) = 5
            // $tabLength[5] = 'chaud'
            $tabLength[$length] = $word;
        }

        // En fonction de l'ordre de trie reçu en argument, on trie en ASC ou en DESC
        if ($order == 'ASC') {
            // ksort — Trie un tableau suivant les clés en ASC ==> http://php.net/manual/fr/function.ksort.php
            // Ex:
            // $tabLength = [5 => 'chaud', 2 => 'il', 4 => 'fait'
            // ksort($tabLength) renvéra [2 => 'il', 4 => 'fait', 5 => 'chaud']
            ksort($tabLength);
        } elseif ($order=='DESC') {
            // krsort — Trie un tableau suivant les clés en DESC ==> http://php.net/manual/fr/function.krsort.php
            krsort($tabLength);
        }

        // On renvoie la string
        // implode — Rassemble les éléments d'un tableau en une chaîne ==> http://php.net/manual/fr/function.implode.php
        // Ex:
        // $tab = [2 => 'il', 4 => 'fait', 5 => 'chaud']
        // implode(' ', $tab) renvéra 'Il fait chaud'
        return implode (' ', $tabLength);
    }

    //Autre solution =
//$stringSliced = explode(" ", $string);
//
//if($order == "ASC" )
//{
//array_multisort(array_map('strlen', $stringSliced),SORT_ASC, $stringSliced);
//return $stringreturned = implode(" ", $stringSliced);
//}
//if($order == "DESC" )
//{
//    array_multisort(array_map('strlen', $stringSliced),SORT_DESC, $stringSliced);
//    return $stringreturned = implode(" ", $stringSliced);
//}
}
