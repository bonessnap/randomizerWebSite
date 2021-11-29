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
    <link rel="stylesheet" href="css/random_between.css">
    <title>Randomizer</title>
    <link rel="shortcut icon" href="img/icon.png" type="image/png">
    <meta name="viewport" content="device-width">
    <script src="/js/random-between.js"></script>
</head>
    <body>
    <?php include 'components/header.php' ?>
    <main>
        
    <?php include 'components/aside_left.php' ?>
    
    <section id="content_block">   
            <section id="input_block">
                    <span>От</span>
                    <input type="number" name="min" value="0"  id="range_min" placeholder="Минимум">
                    
                    <span>До</span>
                    <input type="number" name="max" value="20"  id="range_max" placeholder="Максимум">
                    
                    <span>Количество</span>
                    <input type="number" name="count" value="9" id="count" placeholder="Кол-во">
            </section>

            <div>
                <button onclick="generate_numbers()">Сгенерировать</button>
                <button onclick="clear_results()">Очистить</button>
            </div>

        <section id="results">
            <section id="statistic">
                <div id="min">
                    Минимум: 
                </div>

                <div id="average">
                    Среднее: 
                </div>

                <div id="max">
                    Максимум: 
                </div>
                
                <div id="sigma1">
                    Сигма 1: 
                </div>

                <div id="sigma2">
                    Сигма 2: 
                </div>

                <div id="sigma3">
                    Сигма 3: 
                </div>
            </section>
        </section>
    </section>

    <?php include 'components/aside_right.php' ?>
    </main>
    </body>
</html>