<?php
session_start();
include "config.php";
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
$my_id = $_SESSION['user_id'];

$users = $conn->query("SELECT id, username FROM users WHERE id != $my_id");
$chat_with = $_GET['chat_with'] ?? '';
?>
<style>
body { font-family: sans-serif; background: #f0f0f0; padding: 20px; }
#chat-box { height: 300px; overflow-y: scroll; background: #fff; padding: 10px; border: 1px solid #ccc; }
.you { background: #dcf8c6; margin: 5px; padding: 5px; border-radius: 6px; text-align: right; }
.them { background: #fff; margin: 5px; padding: 5px; border-radius: 6px; text-align: left; }
</style>
<h2>Welcome, <?= $_SESSION['username'] ?> | <a href="logout.php">Logout</a></h2>
<div style="display:flex;">
<div style="width:30%;">
<h3>Contacts</h3>
<ul>
<?php while($row = $users->fetch_assoc()): ?>
<li><a href="?chat_with=<?= $row['id'] ?>"><?= $row['username'] ?></a></li>
<?php endwhile; ?>
</ul>
</div>
<div style="width:70%;">
<?php if ($chat_with): ?>
<h3>Chat with <?= $conn->query("SELECT username FROM users WHERE id=$chat_with")->fetch_assoc()['username'] ?></h3>
<div id="chat-box"></div>
<form onsubmit="sendMessage(); return false;">
  <input id="msg" placeholder="Type..." required>
  <button>Send</button>
</form>
<script>
let contactId = <?= $chat_with ?>;
function loadMessages() {
  fetch(`receive_messages.php?contact_id=${contactId}`)
    .then(res => res.json())
    .then(data => {
        let box = document.getElementById("chat-box");
        box.innerHTML = '';
        data.forEach(m => {
          let div = document.createElement("div");
          div.className = m.sender_id == <?= $my_id ?> ? 'you' : 'them';
          div.textContent = m.message;
          box.appendChild(div);
        });
        box.scrollTop = box.scrollHeight;
    });
}
function sendMessage() {
  let msg = document.getElementById("msg").value;
  fetch("send_message.php", {
    method: "POST",
    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    body: `receiver_id=${contactId}&message=${encodeURIComponent(msg)}`
  }).then(() => {
    document.getElementById("msg").value = '';
    loadMessages();
  });
}
setInterval(loadMessages, 2000);
loadMessages();
</script>
<?php else: ?>
<p>Select a contact to start chat.</p>
<?php endif; ?>
</div>
</div>
