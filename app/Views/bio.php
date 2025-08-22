<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Bio do Candidato</title>
    <style>
        body { font-family: sans-serif; text-align: center; margin-top: 50px; }
        .candidate-card { border: 1px solid #ccc; padding: 20px; margin-bottom: 20px; max-width:600px; margin-left: auto; margin-right: auto; text-align: left; }
        .button2 { display: inline-block; border: 2px solid darkslategray; padding: 9px 20px; margin: 10px; background-color: white; color: #038262; text-decoration: none; border-radius: 5px; }
        .button2:hover { background-color: #30403e; }
    </style>

</head>
<body action="/Rhease/public/view-bio" method="post">
    <h1><?php echo htmlspecialchars($application['name']); ?></h1>
    <div class="candidate-card">
    <p><?php echo htmlspecialchars($application['bio']); ?></p>
    </div>
    <a href="/Rhease/public/applications" class="button2">Voltar aos Candidatos</a>
</body>
</html>
