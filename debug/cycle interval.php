<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body id="body">
    <button onclick="start_loading()">Append</button>
</body>

<script>
    var numbers = [2, 3, 4, 5];
    var curId = 0;

    function start_loading() {
        setTimeout(loadSomething, 1000);
        curId = 0;
    }

    function loadSomething() {
        let parent = document.getElementById('body');
        let span = document.createElement('span');
        span.innerHTML = numbers[curId];
        parent.appendChild(span);
        curId++;
        if (numbers.length > curId) {
            setTimeout(loadSomething, 1000);
        }
    }
</script>

</html>