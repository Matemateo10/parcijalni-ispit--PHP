<?php
    include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcijalni ispit PHP</title>
</head>
<body>
    <div style="width: 50%; float:left;"> 
    <form action="" method="POST">
        <label for="verbum">Upišite riječ: </label>
        <br>
        <br>
        <input type="text" name="verbum">
        <br>
        <br>
        <input type="submit" vale="pošalji">
    </form>
    </div>
    <div style="width: 50%; float:right;">
        <table border="1" cellpadding = "10">
            <tr>
                <th>Riječ</th>
                <th>Broj slova</th>
                <th>Broj suglasnika</th>
                <th>Broj samoglasnika</th>
            </tr>
           <?php
                $verbumsJson = file_get_contents(__DIR__."/words.json");
                $slova = json_decode($verbumsJson, true);
                // var_dump($letters);
                if(empty($_POST)){

                    echo "upišite željenu riječ";

                } elseif (empty($_POST["verbum"])){
                    
                    echo "polje ne smije biti prazno";

                } elseif (!empty($_POST["verbum"]) && ctype_alpha($_POST["verbum"])){
                    
                    echo "upišite željenu riječ";
                    $verbum = $_POST["verbum"];
                    $slova[] = $_POST["verbum"];

                } else {
                    echo "upišite riječ";
                }

                $verbumsJson = json_encode($slova);
                file_put_contents(__DIR__."/words.json", $verbumsJson);

                foreach($slova as $character)
                {
                    $characterCount = strlen($character);
                    $samoglasnikCount = brojacZnakova($character)[0];
                    $suglasnikCount = brojacZnakova($character)[1];
                
                    echo '<tr>';

                    echo '<td>'.$character.'</td>';
                    echo '<td>'.$characterCount.'</td>';
                    echo '<td>'.$samoglasnikCount.'</td>';
                    echo '<td>'.$suglasnikCount.'</td>';

                    echo '</tr>';

                }
            ?>

        </table>

    </div>    

</body>
</html>