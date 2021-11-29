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
        <link rel="stylesheet" href="css/chat.css">
        <title>Randomizer</title>
        <link rel="shortcut icon" href="img/icon.png" type="image/png">
        <meta name="viewport" content="device-width">
</head>

<body>
        <?php include 'components/header.php' ?>
        <main>
                <?php include 'components/aside_left.php' ?>
                <section id="content_block">
                        <div id="chat">
                                
                        </div>

                        <form action="/lib/sendMessage.php" method="GET" onsubmit="return onChatFormSubmit.call(this)" id="text_field">
                                <input type="text" name="message" require>
                                <a href="#chat"><button>Отправить</button></a>
                        </form>
                </section>

                <?php include 'components/aside_right.php' ?>
        </main>
</body>

<script>
        const messagesParent = document.getElementById('chat');

        window.onload = async () => {
                await updateChat();

                setInterval(updateChat, 1000)
        }

        async function updateChat() {
                const response = await fetch('/lib/chatLoad.php');
                const messages = await response.json();

                messagesParent.innerHTML = '';

                messages.forEach(message => addMessageToChat(message['username'], message['message_text']));

                messagesParent.scrollTo(0, messagesParent.scrollHeight);
        }

        function addMessageToChat(username, message) {
                const articleElement = document.createElement('article');
                const usernameElement = document.createElement('h3');
                const messageElement = document.createElement('span');

                articleElement.classList.add('message_field');

                usernameElement.innerHTML = username;

                messageElement.innerHTML = message;

                articleElement.appendChild(usernameElement);
                articleElement.appendChild(messageElement);
                messagesParent.appendChild(articleElement);

        }

        function onChatFormSubmit() {
                const message = this.message.value;

                fetch(this.action + '?message=' + message)
                        .then(response => response.text())
                        .then(text => console.log(text));

                this.message.value = '';

                return false;
        }
</script>

</html>