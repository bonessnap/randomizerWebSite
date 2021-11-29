var min, max, average, sigma1, sigma2, sigma3, middle, curId;
var numbers = [];

// функция генерирует числа
function generate_numbers() {
    let range_min = parseInt(document.getElementById('range_min').value);   //минимальное
    let range_max = parseInt(document.getElementById('range_max').value);   // максимальное
    let count = parseInt(document.getElementById('count').value);           // количество чисел
    let parent = document.getElementById('results');                        // куда записываются числа

    // если в инпуте было пусто
    if (isNaN(range_min))
        range_min = 0;
    if (isNaN(range_max))
        range_max = 100;

    // в цикле добавляем новые числа в массив
    for (; count > 0; count--) {
        let rand = (Math.random(range_min, range_max)) * (range_max - range_min) + range_min;
        numbers.push(rand.toFixed(2));
    }

    // очищаем блок с числами
    while (parent.lastChild.id != 'statistic') {
        parent.removeChild(parent.lastChild);
    }

    // ищем минимум, максимум, среднее и среднее между min + max
    min = Math.min.apply(null, numbers);
    max = Math.max.apply(null, numbers);
    middle = (range_min + range_max) / 2;

    // сигмы    // диапазон от центра
    sigma1 = 0; // 68,2%
    sigma2 = 0; // 95%
    sigma3 = 0; // 100%

    // айди элемента для цикла
    curId = 0;
    average = 0;

    // вызываем цикл вывода чисел
    setTimeout(f_numbersDisplayCycle, (500 / numbers.length));

    // записываем все данные в соответствующие блоки
    parent = document.getElementById('min');
    parent.innerHTML = 'Минимум: ' + min;

    parent = document.getElementById('max');
    parent.innerHTML = 'Максимум: ' + max;
}

// функция в цикле выводит все числа
function f_numbersDisplayCycle() {
    const span = document.createElement('span');
    let item = numbers[curId];
    let parent = document.getElementById('results');
    // Поиск сигм
    if (item < middle * 1.682 && item > middle * 0.378) {
        span.style.backgroundColor = '#797979';
        sigma1++;
    }
    else if (item < middle * 1.95 && item > middle * 0.05) {
        span.style.backgroundColor = '#646464';
        sigma2++;
    }
    else {
        span.style.backgroundColor = '#494949';
        sigma3++;
    }

    // выделяем минимум и максимум соответствующими цветами
    if (item == max)
        span.style.backgroundColor = 'red';
    if (item == min)
        span.style.backgroundColor = 'blue';

    // выделяем значение в среднем
    average += (item / numbers.length);
    // добавляем текущее число в спан
    span.innerHTML = item;
    // добавляем спан к блоку с числами
    parent.appendChild(span);

    parent = document.getElementById('average');
    parent.innerHTML = 'Среднее: ' + average.toFixed(2);

    parent = document.getElementById('sigma1');
    parent.innerHTML = 'Сигма 1: ' + (sigma1 / numbers.length * 100).toFixed(2) + '%';

    parent = document.getElementById('sigma2');
    parent.innerHTML = 'Сигма 2: ' + (sigma2 / numbers.length * 100).toFixed(2) + '%';

    parent = document.getElementById('sigma3');
    parent.innerHTML = 'Сигма 3: ' + (sigma3 / numbers.length * 100).toFixed(2) + '%';

    curId++;
    if (numbers.length > curId)
        setTimeout(f_numbersDisplayCycle, (500 / numbers.length));
}

// функция очищает массив чисел и блок с числами
function clear_results() {
    numbers = [];
    const parent = document.getElementById('results');

    while (parent.lastChild.id != 'statistic') {
        parent.removeChild(parent.lastChild);
    }
}