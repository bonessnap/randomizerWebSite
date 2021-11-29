<?php 
  include_once 'lib/include.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom_nav.css">
    <link rel="stylesheet" href="css/simple_iterations.css">
    <title>Randomizer</title>
    <link rel="shortcut icon" href="img/icon.png" type="image/png">
    <meta name="viewport" content="device-width">
    <script src="/js/simple_iterations.js"></script>

</head>
    <body>
    <?php include 'components/header.php' ?>
    <main>
        
    <?php include 'components/aside_left.php' ?>
    
    <section id="content_block">
        <form id="matrix_form">            
            <table id="matrix_table">
                <tr>
                    <td>
                        <input type="number" step="0.1" placeholder="x1">
                    </td>
                    <td><input type="number" step="0.1" placeholder="x2"></td>
                    <td><input type="number" step="0.1"placeholder="F"></td>
                </tr>
                <tr>
                    <td><input type="number" step="0.1" placeholder="x1"></td>
                    <td><input type="number" step="0.1"placeholder="x2"></td>
                    <td><input type="number" step="0.1"placeholder="F"></td>
                </tr>
            </table>
        </form>

        <button onclick="updateMatrix()" type="button">Посчитать</button>

        <section id="resultsOutput">
            
        </section>
    </section>

    <?php include 'components/aside_right.php' ?>
    </main>
    </body>
</html>