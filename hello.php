<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .container{
        background-color: grey;
        max-width: 70%;
        margin: auto;
        padding: 23px;
    }
</style>
<body>
    <div class="container">
        <h1>Let's learn PHP</h1>
        <p>Hey Everyone!!!</p>
        <?php
            //give age as a prompt
            echo "<br>";
            echo $age;
            if($age>18){
                echo "<br>";
                echo "You can vote";
            }else{
                echo "<br>";
                echo "You can't vote";
            }
            echo "<br>";
            echo "Hello World";
            ?>
            <?php
            $languages = array("HTML", "CSS", "PHP", "JavaScript");
            // for($i = 0 ; $i<count($languages) ; $i++){
            //     echo $languages[$i];
            // }
            // Loops

            // $a = 0 ; 
            // while($a<10){
            //     echo "<br>";
            //     echo $a;
            //     $a++;
            // }

            // $a = 0 ; 
            // while($a<count($languages)){
            //     echo "<br>";
            //     echo "The value of a is ".$languages[$a];
            //     $a++;
            // }
            // for($a=0;$a<16;$a++){
            //     echo "<br>The value of a is ".$a;
            // }
            $favBike = array('Ujjwal'=>'HarleyDavidson' , 'Vansh'=>'Ferrari');
            echo $favBike['Ujjwal'];
            echo "<br>";
            echo $favBike['Vansh'];
            echo "<br>";
            
            
        ?>
    </div>
</body>
</html>


