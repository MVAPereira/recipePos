<?php 
    include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calorie Counter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aleo:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>
<body>
<style>
    html, body {
            height: 100%;
            margin: 0;
            font-family: 'Aleo', sans-serif;
    }
    body {
        display: flex;
        flex-direction: column;
        background-image:  url( 'bg.svg' ); */
    }

    .pink{
        background: #D2ADDE;
    }

    .orange{
        background: #D64D27;
        color: white;
    }
    .orange:hover{
        border: 1px solid #D64D27;
        color: #D64D27;
    }

    .table-rounded {
    border-radius: 10px; 
    overflow: hidden;*
    }   

</style>

<div class="container vh-100 d-flex justify-content-center align-items-center">
        
        <div class="container text-center pink p-4 rounded">
            <div class="row mb-2">
                <div class="d-flex">
                    <input class="form-control me-1" type="text" id="searchFood" placeholder="Search food">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mx-auto m-2 p-4 border border-2 rounded bg-light">
                        <form method="post">
                            <div class="mb-3">
                                <input type="text" class="form-control mb-1" id="quantity" name="quantity" placeholder="Quantity">
                                <input type="text" class="form-control mb-1" id="food" name="food" placeholder="Food">
                                <div class="d-flex text-center">
                                    <input type="text" class="form-control me-1" id="carb" name="carb" placeholder="Carb">
                                    <input type="text" class="form-control me-1" id="protein" name="protein" placeholder="Protein">
                                    <input type="text" class="form-control" id="fat" name="fat" placeholder="Fat">
                                </div>
                            </div>                                
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn orange" name="btn-submit">Submit</button>
                                <button type="submit" class="btn orange" name="btn-delete">Restart</button>
                            </div>
                        </form>     
                    </div>
                </div>
                <div class="col">
                    <div class="container m-2 d-flex align-items-start" style="overflow-y: auto; height: 31.5vh;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Food</th>
                                    <th scope="col">Carb</th>
                                    <th scope="col">Protein</th>
                                    <th scope="col">Fat</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                foreach ($_SESSION['my_array']  as $x) {
                                    if(isset($x[2])){
                                        echo '
                                        <tr>
                                            <td>'.$x[0].'</td>
                                            <td>'.$x[1].'</td>
                                            <td>'.$x[2].'g</td>
                                            <td>'.$x[3].'g</td>
                                            <td>'.$x[4].'g</td>
                                            <td>'.($x[2]*4) + ($x[3]*4) + ($x[4]*9).' kcal</td>
                                        </tr>
                                    ';
                                    }
                                }
                                
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mb-2"> 
                <form method="post">
                    <div class="d-flex">
                        <input type="text" class="form-control me-1" id="exampleInputPassword1" name="recipe" placeholder="Recipe tittle">
                        <button type="submit" class="btn orange" name="btn-generate" >Generate</button> 
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#searchFood').on("keyup", function(){
                var searchFood = $(this).val();
                $.ajax({
                    method: 'POST',
                    url: "search_food_ajax.php",
                    data: {foodName: searchFood},
                    success: function(response){

                        var data = JSON.parse(response);
        
                        if (data.length > 0) {
                            $('#quantity').val(data[0].quantity);
                            $('#food').val(data[0].foodName);
                            $('#carb').val(data[0].carb);
                            $('#protein').val(data[0].protein);
                            $('#fat').val(data[0].fat);
                        }
                    }
                })   
            });
        });

    </script>
</body>
</html>