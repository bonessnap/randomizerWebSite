<aside id="aside_right">
              <div class="random_block">
                    <span>Случайное число: </span>
                    <?php echo rand(0, 100);
                    ?>
              </div>
              <div class="random_block">
                <?php
                  $users = $mysql->query("SELECT * FROM users");
                  $count = 0;
                  foreach($users as $user)
                  {
                      $count += 1;
                  }
                  echo '<span>Количество пользователей: </span>' . $count;
                ?>
              </div>
              <div class="random_block">
                <button onclick="randomNumber()" style="height: 100px;">Сгенерить рандом</button>
              </div>
              <div class="random_block">
                <span>Удивительно, но вы видите эти блоки на всех страницах</span>
              </div>
        </aside>

<script>
  function randomNumber()
  {
    let parents = document.getElementsByClassName('random_block');

    for(parent of parents)
    {
      let rand = Math.floor(Math.random() * 1000);
      let span = document.createElement('span');
      span.innerHTML = rand;
      parent.appendChild(span)
    }
  }
</script>