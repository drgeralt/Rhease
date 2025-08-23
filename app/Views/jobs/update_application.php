<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Candidatura</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; padding: 20px; }
        form { margin-top: 30px; }
        label { display: block; margin-top: 10px; }
        input, textarea { width: 300px; padding: 8px; }
        button { padding: 10px 20px; margin-top: 20px; cursor: pointer; }
    </style>
</head>
<body>

<hr>
<h2>Candidate-se para esta vaga</h2>
<form action="/Rhease/public/application/update/<?php echo htmlspecialchars($application['id']); ?>" method="post">
    <label for="name">Nome:</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($application['name']); ?>" required>
    <br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($application['email']); ?>" required>
    <br>

    <label for="phone">Telefone:</label>
    <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($application['phone']); ?>" required>
    <br>

    <label for="years_experience">Anos de Experiência:</label>
    <input type="number" id="years_experience" name="years_experience" value="<?php echo htmlspecialchars($application['years_experience']); ?>" required>
    <br>

    <label for="expected_salary">Salário esperado:</label>
    <input type="number" id="expected_salary" name="expected_salary" value="<?php echo htmlspecialchars($application['expected_salary']); ?>" required>
    <br>

    <label for="bio">Apresentação:</label>
    <textarea id="bio" name="bio" rows="4" required><?php echo htmlspecialchars($application['bio']); ?></textarea>
    <br>

    <button type="submit">Atualizar Candidatura</button>
</form>

</body>
</html>
