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
</head>
<body>
<style>
    html, body {
            height: 100%;
            margin: 0;
    }
    body {
        display: flex;
        flex-direction: column;
        /* background-image:  url( 'bg.svg' ); */
    }
    
</style>
</body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <form method="post">
            <label for="exampleInputPassword1" class="form-label">Recipe</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="recipe">
            <button type="submit" class="btn btn-primary" name="btn-generate" >Generate</button> 
        </form>
        
        <div class="mx-auto m-2 p-4 border border-2 rounded bg-light shadow-lg">
            <form method="post">
                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <div><?php if(isset($carbTotal)){echo $carbTotal . ' carb';}?></div>       
                </div>

                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <div><?php if(isset($proteinTotal)){echo $proteinTotal. ' protein';}?></div>       
                </div>

                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <div><?php if(isset($fatTotal)){echo $fatTotal. ' fat';}?></div>       
                </div>

                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <div><?php if(isset($calories)){echo $calories. ' calories';}?></div>       
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="quantity">

                    <label for="exampleInputPassword1" class="form-label">Food</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="food">

                    <label for="exampleInputPassword1" class="form-label">Carb</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="carb">

                    <label for="exampleInputPassword1" class="form-label">Protein</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="protein">

                    <label for="exampleInputPassword1" class="form-label">Fat</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="fat">
                </div>

                <button type="submit" class="btn btn-primary" name="btn-submit" >Submit</button>
                <button type="submit" class="btn btn-primary" name="btn-delete" >Restart</button>
                               
            </form>     
        </div>
        <div class="container m-2 d-flex align-items-start">

            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Quantaty</th>
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
                                <td>'.$x[2].'</td>
                                <td>'.$x[3].'</td>
                                <td>'.$x[4].'</td>
                                <td>'.($x[2]*4) + ($x[3]*4) + ($x[4]*9).'</td>
                            </tr>
                        ';
                        }
                    }
                       
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</html>