<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Registro de Folha de Pagamento</title>
    <style>
        body { font-family: sans-serif; }
        .container { max-width: 800px; margin: 0 auto; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input { width: 100%; padding: 8px; }
        button { padding: 10px 15px; background-color: #28a745; color: #fff; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Adicionar Novo Registro de Folha de Pagamento</h1>
        <form action="/Rhease/public/payroll" method="POST">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="position">Cargo:</label>
                <input type="text" id="position" name="position" required>
            </div>
            <div class="form-group">
                <label for="salary">Salário:</label>
                <input type="number" id="salary" name="salary" step="0.01" required>
            </div>
            <button type="submit">Salvar Registro</button>
        </form>
    </div>
</body>
</html>
