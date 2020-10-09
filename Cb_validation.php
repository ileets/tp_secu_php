
<?php
/*---------------------------------------------------------------*/
/*
    Titre : Validité d'une Carte Bleue (CB)

    URL   : https://phpsources.net/code_s.php?id=690
    Auteur           : KOogar
    Date édition     : 12 Oct 2013
    Date mise à jour : 06 Aout 2019
    Rapport de la maj:
    - refactoring du code en PHP 7
    - fonctionnement du code vérifié
    - maintenance du code
    - amélioration du code
    - modification de la description
*/
/*---------------------------------------------------------------*/

/*****************************************************/
/******************************
ALGORITHME DE LA CLEF DE LUHN
 ********************************/
function Luhn($numero,$longueur){
    // On passe à  la fonction la variable contenant le numéro à  vérifier

    // et la longueur qu'il doit impérativement avoir
    if ( strlen($numero) == $longueur)  {

        /* on décompose le numéro dans un tableau  */
        for ($i=0;$i<$longueur;$i++){
            $tableauChiffresNumero[$i]=substr($numero,$i,1);
        }
        /* on parcours le tableau pour additionner les chiffres */
        $luhn=0; // clef de luhn à Â  tester
        for ($i=0;$i<$longueur;$i++){
            if ($i%2==0){ // si le rang est pair (0,2,4 etc.)
                if(($tableauChiffresNumero[$i]*2) > 9){
// On regarde si son double est > à?Â  9
                    $tableauChiffresNumero[$i]=(
                            $tableauChiffresNumero[$i]*2)-9; //si oui on lui retire 9


// et on remplace la valeur


// par ce double corrigé
                }
                else{
                    $tableauChiffresNumero[$i]=
                        $tableauChiffresNumero[$i]*2; // si non on remplace la valeur


// par le double
                }
            }
            $luhn=$luhn+$tableauChiffresNumero[$i];
// on additionne le chiffre à Â  la clef de luhn
        }
        /* test de la divition par 10 */
        if($luhn%10==0){
            return true;
        }
        else{
            return false;
        }
    }
    else{
        return false;
// la valeur fournie n'est pas conforme (caractère non numérique ou mauvaise
// longueur)
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php

if (isset ($_POST['mode']) ) $mode = $_POST['mode'];
if (isset ($_POST['numero']) )$numero=$_POST['numero'];
if (isset ($_POST['longueur']) )$longueur=$_POST['longueur'];

if( isset($mode)  and $mode == "verifier"){
    if(Luhn($numero,$longueur)){
        echo
            "<font color=\"#21449c\" face=\"helveticat, arial, sans-serif\">Le" .
            " numero est bon</font><br>";
    }
    else{
        echo
            "<font color=\"#c00000\" face=\"helveticat, arial, sans-serif\">Le" .
            " numero n'est pas bon</font><br>";
    }
    echo "<form action=\"\" method=\"POST\">\n";
    echo "\r\r<input type=\"submit\" value=\"tester un autre nombre\">\n";
    echo "</form>";
}
else{
    ?>
    <form action="" method="POST">
        Longueur attendue : <input type="text" name="longueur" size="3"> (14 pour
        un
        siret, 16 pour une CB etc.)<br>
        numero a vérifier : <input type="text" name="numero" size="16"
                                   maxlength="16"><br><br>
        <input type="hidden" name="mode" value="verifier">
        <input type="submit" value="verifier">
    </form>
    <?php
}
?>
</body>
</html>

