<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comunicação Interna - RH</title>
</head>
<body>
<h1>Página de Comunicação Interna</h1>

<h2>Nova Mensagem</h2>
<form action="/Rhease/public/comunicacao/enviar" method="POST">
    <div>
        <label for="content">Sua Mensagem:</label>
        <br>
        <textarea name="content" id="content" rows="4" cols="50" required></textarea>
    </div>
    <br>
    <button type="submit">Enviar Mensagem</button>
</form>

<hr>

<h2>Mensagens Recentes</h2>

<?php if (empty($messages)): ?>
    <p>Nenhuma mensagem encontrada.</p>
<?php else: ?>
    <?php foreach ($messages as $message): ?>
        <div>
            <p><strong>Enviado por:</strong> <?php echo htmlspecialchars($message['sender_id']); ?></p>
            <p><?php echo htmlspecialchars($message['content']); ?></p>
            <small>Em: <?php echo htmlspecialchars($message['created_at']); ?></small>
        </div>
        <hr>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>