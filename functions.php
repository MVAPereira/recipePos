<?php 

session_start(); 

if (!isset($_SESSION['my_array'])) {
    $_SESSION['my_array'] = array([]); 
}

if(isset($_POST['btn-submit'])){

    $quantity = $_POST['quantity'];
    $food = $_POST['food'];
    $carb = $_POST['carb'];
    $protein = $_POST['protein'];
    $fat = $_POST['fat'];

    $calories = ($carb*4) + ($protein*4) + ($fat*9);

    array_push($_SESSION['my_array'], [$quantity, $food, $carb, $protein, $fat]);
}

if(isset($_POST['btn-delete'])){
    $_SESSION['my_array'] = array([]);
    $_SESSION['calories'] = 0;
    $_SESSION['carbTotal'] = 0;
    $_SESSION['proteinTotal'] = 0;
    $_SESSION['fatTotal'] = 0;
}

if(isset($_POST['btn-submit'])){

    $carbTotal = 0;
    $proteinTotal = 0;
    $fatTotal = 0;



    foreach ($_SESSION['my_array']  as $x) {
        if(isset($x[2])){
            $carbTotal = $carbTotal + $x[2];
            $proteinTotal =  $proteinTotal+ $x[3];
            $fatTotal =  $fatTotal+ $x[4];
        }
    }

    $calories = ($carbTotal*4) + ($proteinTotal*4) + ($fatTotal*9);

    $_SESSION['calories'] = $calories;
    $_SESSION['carbTotal'] = $carbTotal;
    $_SESSION['proteinTotal'] = $proteinTotal;
    $_SESSION['fatTotal'] = $fatTotal;

}

if(isset($_POST['btn-generate'])){

    if(isset($_SESSION['calories'])){
        $calories = $_SESSION['calories'];
        
        $im = imagecreatefromjpeg('sample.jpg');
        if (!$im) {
            die('Failed to load image');
        }
    }

    if(isset($_SESSION['carbTotal'])){
        $carbTotal = $_SESSION['carbTotal'];
        
    }
    if(isset($_SESSION['proteinTotal'])){
        $proteinTotal = $_SESSION['proteinTotal'];
        
    }
    if(isset($_SESSION['carbTotal'])){
        $carbTotal = $_SESSION['carbTotal'];
        
    }
    if(isset($_SESSION['fatTotal'])){
        $fatTotal = $_SESSION['fatTotal'];
        
    }
    
    if (isset($_POST['recipe'])) {
        $_SESSION['recipe'] = $_POST['recipe'];
    }



    $textCalories = $calories . " kcal";
    $textProtein = $proteinTotal . "g" . " protein";
    $textCarb = $carbTotal . "g" . " carb";
    $textFat = $fatTotal . "g" . " fat";


    $title = $_SESSION['recipe'] . ":";

    $text_color = imagecolorallocate($im, 214, 77, 39);
    $font_path_bold = 'fonts/Aleo-ExtraBoldItalic.ttf'; 

    $font_path_light = 'fonts/Aleo-Light.ttf'; 

    $font_path_Extralight = 'fonts/Aleo-ExtraLight.ttf'; 



    imagettftext($im, 40, 0, 100, 185, $text_color, $font_path_light, $title);

    imagettftext($im, 80, 0, 105, 335, $text_color, $font_path_bold, $textCalories);

    imagettftext($im, 27, 0, 110, 430, $text_color, $font_path_Extralight, $textProtein);
    imagettftext($im, 27, 0, 110, 475, $text_color, $font_path_Extralight, $textCarb);
    imagettftext($im, 27, 0, 110, 520, $text_color, $font_path_Extralight, $textFat);

    $yPosition = 710; 
    foreach ($_SESSION['my_array'] as $x) {
        if (isset($x[0]) && isset($x[1])) {
            $lineText = $x[0] . " " . $x[1];
            imagettftext($im, 27, 0, 450, $yPosition, $text_color, $font_path_Extralight, $lineText);
            $yPosition += 45; 
        }
    }


    header('Content-Type: image/jpeg');
    header('Content-Disposition: attachment; filename="output.jpg"');
    imagejpeg($im);

    imagedestroy($im);

    exit();
}



?>