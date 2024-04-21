<?php
$weight=$_GET['weight'];
$height=$_GET['height'];
    $bmi=$weight/(($height)*($height));
    echo 'The BMI is '.$bmi."<br>";
    if($bmi <18.5)
    {
        echo 'You are UnderWeight';
    }
    else if($bmi >18.5 && $bmi <24.9)
    {
        echo 'You are in Normal Weight';
    }
    else if($bmi >25 && $bmi <29.9)
    {
        echo 'You are Overweight';
    }
    else if($bmi >30)
    {
        echo 'You are Obese';
    }
    else{
        echo 'Invalid';
    }
?>