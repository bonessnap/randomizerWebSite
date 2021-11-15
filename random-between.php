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

    <script>
        var min;
        var max;
        var average;
        var sigma1 = 0;
        var sigma2 = 0;
        var sigma3 = 0;
        var middle;
        var numbers = [];

        // функция генерирует числа
        function generate_numbers()
        {
            let range_min = parseInt(document.getElementById('range_min').value);   //минимальное
            let range_max = parseInt(document.getElementById('range_max').value);   // максимальное
            let count = parseInt(document.getElementById('count').value);           // количество чисел
            let parent = document.getElementById('results');                        // куда записываются числа

            // если в инпуте было пусто
            if (isNaN(range_min)) {
                range_min = 0;
            }
            if (isNaN(range_max)) {
                range_max = 100;
            }

            // в цикле добавляем числа в массив
            for(; count > 0; count--)
            {   
                let rand = (Math.random(range_min, range_max)) * (range_max - range_min) + range_min;
                numbers.push(rand.toFixed(2));
            }

            // очищаем блок с числами
            while (parent.lastChild.id != 'statistic') 
            {
                parent.removeChild(parent.lastChild);
            }

            // ищем минимум, максимум, среднее и среднее между min + max
            min = Math.min.apply(null, numbers);
            max = Math.max.apply(null, numbers);
            average = 0;
            middle = (range_min + range_max) / 2;
            // сигмы    // числа, которые в диапазоне 
            sigma1 = 0; // 68,2%
            sigma2 = 0; // 95%
            sigma3 = 0; // 5%

            // в цикле добавляем все числа в блок с числами
            numbers.forEach((item) => {
                const span = document.createElement('span');
                // Поиск сигм
                if(item < middle * 1.682 && item > middle * 0.378)
                {
                    span.style.backgroundColor = '#797979';
                    sigma1++;
                }
                else if(item < middle * 1.95 && item > middle * 0.05)
                {
                    span.style.backgroundColor = '#646464';
                    sigma2++;
                }
                else{
                    span.style.backgroundColor = '#494949';
                    sigma3++;
                }
                
                // выделяем минимум и максимум соответствующими цветами
                if(item == max)
                    span.style.backgroundColor = 'red';
                if(item == min)
                    span.style.backgroundColor = 'blue';
                
                // выделяем значение в среднем
                average += (item / numbers.length);

                // добавляем текущее число в спан
                span.innerHTML = item;
                // добавляем спан к блоку с числами
                parent.appendChild(span);
            });

            // записываем все данные в соответствующие блоки
            parent = document.getElementById('min');
            parent.innerHTML = 'Минимум: ' + min;

            parent = document.getElementById('max');
            parent.innerHTML = 'Максимум: ' + max;
            
            parent = document.getElementById('average');
            parent.innerHTML = 'Среднее: ' + average.toFixed(2);
            
            parent = document.getElementById('sigma1');
            parent.innerHTML = 'Сигма 1: ' + (sigma1 /numbers.length * 100).toFixed(2) + '%';
            
            parent = document.getElementById('sigma2');
            parent.innerHTML = 'Сигма 2: ' + (sigma2 /numbers.length * 100).toFixed(2) + '%';
            
            parent = document.getElementById('sigma3');
            parent.innerHTML = 'Сигма 3: ' + (sigma3 /numbers.length * 100).toFixed(2) + '%';
        }

        // функция очищает массив чисел и блок с числами
        function clear_results() 
        {
            numbers = [];
            const parent = document.getElementById('results');
            
            while (parent.lastChild.id != 'statistic') 
            {
                parent.removeChild(parent.lastChild);
            }
        }
    </script>
</html>