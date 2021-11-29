<aside id="aside_right">
  <article class="random_block">
    <span>Случайное число: </span>
    <?php echo rand(0, 100);
    ?>
  </article>
  <article class="random_block">
    <?php
    $users = $mysql->query("SELECT * FROM users");
    $count = 0;
    foreach ($users as $user) {
      $count += 1;
    }
    echo '<span>Количество пользователей: </span>' . $count;
    ?>
  </article>
  <article class="random_block">
    <button onclick="randomNumber()" style="height: 100px;">Сгенерить рандом</button>
  </article>
  <article class="random_block">
    <a href="/chat.php">chat</a>
  </article>
  <article class="random_block">
    <a href="/debug/ajax/from.php">debug ajax</a>
  </article>
</aside>

<script>
  function randomNumber() {
    let parents = document.getElementsByClassName('random_block');

    for (parent of parents) {
      let rand = Math.floor(Math.random() * 1000);
      let span = document.createElement('span');
      span.innerHTML = rand;
      parent.appendChild(span)
    }
  }
</script>