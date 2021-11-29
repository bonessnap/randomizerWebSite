<?php
$username = "bonessnap";
$_SESSION['username'] = $username;
include_once 'lib/include.php';
?>

<form action="/debug/ajax/to.php" method="GET" onsubmit="return onChatFormSubmit.call(this)">
    <input type="text" name="message" require>
    <button>Send</button>
</form>

<div id="messages">

</div>

<script>
    const messagesParent = document.getElementById('messages');

    window.onload = async () => {
        await updateChat();

        setInterval(updateChat, 1000)
    }

    async function updateChat() {
        const response = await fetch('/debug/ajax/get-chat.php');
        const messages = await response.json();

        messagesParent.innerHTML = '';

        console.log(messages);

        messages.forEach(message => addMessageToChat(message['username'], message['message_text']));
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