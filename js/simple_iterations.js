
function calculateMatrix() {
    const form = document.getElementById('matrix_form');
    const elements = Array.from(form.elements).map(e => parseFloat(e.value) || 0);

    elements.forEach(e => console.log(e.value))
}

window.onload = () => {
    addEventToCells();
}

function addEventToCells() {
    const table = document.getElementById('matrix_table');
    const rows = Array.from(table.getElementsByTagName('tr'));

    // обнуляем события
    rows.forEach(tr => {
        Array.from(tr.children).forEach(td => {
            td.children[0].removeEventListener('keyup', addColToMatrix);
            td.children[0].removeEventListener('keyup', addRowToMatrix);
        });
    });

    // правым добавляем событие добавления СТОЛБЦОВ
    Array.from(rows).forEach(tr => {
        tr.children[tr.children.length - 2].children[0].addEventListener('keyup', addColToMatrix);
    });

    // нижним добавляем событие добавления СТРОК
    Array.from(rows[rows.length - 1].children).forEach(td => {
        td.children[0].addEventListener('keyup', addRowToMatrix);
    });

    console.log("Привязка 2х событий сработа!");

    var col = rows[0].length - 2;
    var row = rows.length - 1;
}

function both() {
    addColToMatrix();
    addRowToMatrix();
}

// добавляет столбец
function addColToMatrix() {
    console.log("Я событие 1 отработал");
    const table = document.getElementById('matrix_table');
    const rows = Array.from(table.getElementsByTagName('tr'));

    rows.forEach(row => {
        const input = document.createElement('input');
        const tds = Array.from(row.children);
        const td = document.createElement('td');

        input.type = "number";
        input.step = "0.1";
        input.placeholder = `x${tds.length}`;

        td.appendChild(input);
        row.insertBefore(td, tds[tds.length - 1]);
    });
}

// добавляет строк
function addRowToMatrix() {
    console.log("Я событие 2 отработал");
    const table = document.getElementById('matrix_table');
    const rows = Array.from(table.getElementsByTagName('tr'));
    const newRow = rows[rows.length - 1].cloneNode(true);

    Array.from(newRow.children).forEach(td => {
        td.children[0].value = '';
    });

    table.appendChild(newRow);
    addEventToCells();
}


// ПОШЛА КАША САНЯ СПАСАЙСЯ ТУТ ЖЕСТЬ

var numbers = [[2.6, -3.4, -4.6, 12.6],
[-5.6, 9.2, -5.8, -5.2],
[-9.3, -6.5, 6.4, 14.3],
[7.3, -4.7, 3.9, 10.2]];

function f_findNumbers()
{
    
    var max_count = 50;
    var out_count = 0;
    
    var result = new Array(numbers[0].length);
    var whats_added = new Array(numbers[0].length);
    
    do {
        // количество внутренних итераций
        var count = 0;
        // каждую итерацию обнуляем данные
        for (var i = 0; i < numbers.length; i++) {
            result[i] = 0;
            whats_added[i] = 0;
        }

        do{
            var selected_row_index = Math.round(rand(0, numbers[0].length - 1))
        
            if(Math.random(0, 100) > 50)
            {
                console.log(selected_row_index + "+++: Result: ");
                for(var i = 0; i < result.length; i++)
                {
                    result[i] += numbers[selected_row_index][i];
                    console.log(parseFloat(result[i] + " "));
                }
                whats_added[selected_row_index]++;
            }
            else{
                console.log(selected_row_index + "---: Result: ");
                for(var i = 0; i < result.length; i++)
                {
                    result[i] -= numbers[selected_row_index][i];
                    console.log(parseFloat(result[i] + " "));
                }
                whats_added[selected_row_index]--;
            }
            count++;
            console.log('\n');
        }while(!_isBigger(result, 1) && count < max_count);
        out_count++;
    } while (!_isBigger(result, 1) && out_count < 10);
    console.log("УРА ПОБЕДА!!!!!!!!");

    for(var i = 0; i < whats_added.length; i++)
    {
        console.log("Строка: " + (i+1) + " добавлена: " + whats_added[i] + " раз!");
    }
}

function _isBigger(numbers, position)
{
    var sum = 0;
    var number = 0;

    for(var i = 0; i < numbers.length; i++)
    {
        if(i !== position)
            sum += Math.abs(numbers[i]);
        else number = Math.abs(numbers[i]);
    }
    if(number > sum)
        return true;
    else return false;
}

function rand(min, max)
{
    return Math.random() * (max - min) + min;
}
function kek(){
    console.log(numbers[0]);
    console.log(numbers[1]);
    var result = new Array(numbers[0].length);
    for(var i = 0; i < result.length; i++)
    {
        result[i] = numbers[0][i] - numbers[1][i];
    }
    console.log(result);
    
}