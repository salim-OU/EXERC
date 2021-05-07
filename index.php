<?php
                                                   // FUNCTION***************************************
                                             /*function Hello ($prenom, $nom){
                                                 echo 'key '.$prenom.' '.$nom.'<br />';
                                             }
                                                Hello("nicola","dupant");*/

                                                //function qui retourne une valeur ******************

                                                /* function Formule ($x,$y){
                                                     $temp = $x * $y;
                                                     $temp /= 2;
                                                     $temp = $x + $temp - ($x+$y);
                                                     return$temp;
                                                 }
                                                  $resultat = Formule(7,2);
                                                    echo $resultat;*/
                                             //******************************************************************
                                                 // 1- function pour calculer  racines d'une equation
                                                 //2- ax² + bx+c
                                                 //3- delta = b² - 4*a*c
                                                // 4-<0 => pas de solution
                                                // 5-=0 => une seul solution -b/2*a
                                                //6- >0 => deux solution (-b -racine(delta))/2*a
                                                // 7-(-b + racine (delta)/2*a
function racines ($a,$b,$c)

{
      // equation 0?
     if ($a==0){
         echo "cette equation est invalide.";
         exit();
     }
        $delta = $b*$b - (4*$a*$c);
      // condition
    if($delta <0 ){
        echo " il n'y a pas de solution ";
    }
    else if ($delta==0){
        $result = -$b/(2*$a);
        echo " il a une solution :"  .$result;
    }
    else if ($delta>0){
        $racineA=(-$b - sqrt($delta))/(2*$a);
        $racineB= (-$b + sqrt($delta))/(2*$a);
        echo"il ya deux solution ,x1 = ".$racineA.", x2 = ".$racineB;
    }

} racines(0,1,7);
