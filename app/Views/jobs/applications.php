<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Lista de Candidaturas</title>
    <style>
        body { font-family: sans-serif; text-align: center; margin-top: 50px; }
        h1 { text-align: center; }
        .actions { margin-top: 15px; }
        .candidate-card { border: 1px solid #ccc; padding: 20px; margin-bottom: 20px; max-width:600px; margin-left: auto; margin-right: auto; }

        .button1 { display: inline-block; padding: 10px 10px; margin: 1px; background-color: #038262; color: white; text-decoration: none; border-radius: 5px; }
        .button1:hover { background-color: #30403e; }

        .button2 { display: inline-block; border: 2px solid red; padding: 9px 10px; margin: 1px; background-color: white; color: red; text-decoration: none; border-radius: 5px; }
        .button2:hover { background-color: red; color: white; }

        .button3 { display: inline-block; border: 2px solid darkslategray; padding: 9px 20px; margin: 10px; background-color: white; color: #038262; text-decoration: none; border-radius: 5px; }
        .button3:hover { background-color: #30403e; }
    </style>

</head>

<body action="/Rhease/public/view-application" method="post">

    <h1>Candidatos</h1>

    <?php if (empty($applications)): ?>
        <p style="text-align: center">Nenhuma candidatura encontrada.</p>
    <?php else: ?>
    <?php foreach ($applications as $application): ?>
        <div class="candidate-card">
            <h2><?php echo htmlspecialchars($application['name']); ?></h2>

            <p><strong>Email:</strong> <?php echo htmlspecialchars($application['email']); ?></p>
            <p><strong>Telefone:</strong> <?php echo htmlspecialchars($application['phone']); ?></p>
            <p><strong>Anos de Experiência:</strong> <?php echo htmlspecialchars($application['years_experience']); ?></p>
            <p><strong>Salário Esperado:</strong><?php echo htmlspecialchars($application['expected_salary']); ?></p>

            <div class="actions">
                <a href="/Rhease/public/application/edit/<?php echo $application['id']; ?>" class="button1">Atualizar</a>
                <a href="/Rhease/public/view-bio/<?php echo $application['id']; ?>" class="button3">Bio</a>
                <a href="/Rhease/public/delete-application/<?php echo $application['id']; ?>" class="button2" onclick="return confirm('Tem certeza?')">Deletar</a>
            </div>
        </div>
    <?php endforeach; ?>
    <?php endif; ?>

</body>
</html>
