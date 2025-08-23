<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Folha de Pagamento</title>
    <style>
        body { font-family: sans-serif; }
        .container { max-width: 800px; margin: 0 auto; padding: 20px; }
        .filter-form { margin-bottom: 20px; padding: 15px; border: 1px solid #eee; background-color: #f9f9f9; }
        .filter-form label { margin-right: 10px; }
        .filter-form input, .filter-form select, .filter-form button { padding: 8px; margin-right: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 8px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f2f2f2; }
        .sort-link { text-decoration: none; color: inherit; }
        .sort-indicator { margin-left: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registros de Folha de Pagamento</h1>
        <a href="/Rhease/public/payroll/add">Adicionar Novo Registro</a>
        <br>
        <a href="/Rhease/public/">Voltar para o menu</a>

        <div class="filter-form">
            <form action="/Rhease/public/payrolls" method="GET">
                <label for="search_name">Procurar por Nome:</label>
                <input type="text" id="search_name" name="search_name" value="<?php echo htmlspecialchars($currentNameSearch ?? ''); ?>">

                <label for="position">Cargo:</label>
                <input type="text" id="position" name="position" value="<?php echo htmlspecialchars($currentPositionFilter ?? ''); ?>">

                <label for="order_by">Ordenar por:</label>
                <select id="order_by" name="order_by">
                    <option value="id" <?php echo ($currentOrderBy === 'id') ? 'selected' : ''; ?>>ID</option>
                    <option value="name" <?php echo ($currentOrderBy === 'name') ? 'selected' : ''; ?>>Nome</option>
                    <option value="position" <?php echo ($currentOrderBy === 'position') ? 'selected' : ''; ?>>Cargo</option>
                    <option value="salary" <?php echo ($currentOrderBy === 'salary') ? 'selected' : ''; ?>>Salário</option>
                </select>

                <label for="order_direction">Direção:</label>
                <select id="order_direction" name="order_direction">
                    <option value="ASC" <?php echo ($currentOrderDirection === 'ASC') ? 'selected' : ''; ?>>Crescente</option>
                    <option value="DESC" <?php echo ($currentOrderDirection === 'DESC') ? 'selected' : ''; ?>>Decrescente</option>
                </select>

                <button type="submit">Aplicar Filtros</button>
            </form>
        </div>

        <?php if (empty($payrolls)): ?>
            <p>Nenhum registro de folha de pagamento encontrado.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th><a href="?order_by=id&order_direction=<?php echo ($currentOrderBy === 'id' && $currentOrderDirection === 'ASC') ? 'DESC' : 'ASC'; ?>&position=<?php echo htmlspecialchars($currentPositionFilter ?? ''); ?>&search_name=<?php echo htmlspecialchars($currentNameSearch ?? ''); ?>" class="sort-link">ID<?php echo ($currentOrderBy === 'id') ? (($currentOrderDirection === 'ASC') ? ' &#9650;' : ' &#9660;') : ''; ?></a></th>
                        <th><a href="?order_by=name&order_direction=<?php echo ($currentOrderBy === 'name' && $currentOrderDirection === 'ASC') ? 'DESC' : 'ASC'; ?>&position=<?php echo htmlspecialchars($currentPositionFilter ?? ''); ?>&search_name=<?php echo htmlspecialchars($currentNameSearch ?? ''); ?>" class="sort-link">Nome<?php echo ($currentOrderBy === 'name') ? (($currentOrderDirection === 'ASC') ? ' &#9650;' : ' &#9660;') : ''; ?></a></th>
                        <th>Email</th>
                        <th><a href="?order_by=position&order_direction=<?php echo ($currentOrderBy === 'position' && $currentOrderDirection === 'ASC') ? 'DESC' : 'ASC'; ?>&position=<?php echo htmlspecialchars($currentPositionFilter ?? ''); ?>&search_name=<?php echo htmlspecialchars($currentNameSearch ?? ''); ?>" class="sort-link">Cargo<?php echo ($currentOrderBy === 'position') ? (($currentOrderDirection === 'ASC') ? ' &#9650;' : ' &#9660;') : ''; ?></a></th>
                        <th><a href="?order_by=salary&order_direction=<?php echo ($currentOrderBy === 'salary' && $currentOrderDirection === 'ASC') ? 'DESC' : 'ASC'; ?>&position=<?php echo htmlspecialchars($currentPositionFilter ?? ''); ?>&search_name=<?php echo htmlspecialchars($currentNameSearch ?? ''); ?>" class="sort-link">Salário<?php echo ($currentOrderBy === 'salary') ? (($currentOrderDirection === 'ASC') ? ' &#9650;' : ' &#9660;') : ''; ?></a></th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($payrolls as $payroll): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($payroll['id']); ?></td>
                            <td><?php echo htmlspecialchars($payroll['name']); ?></td>
                            <td><?php echo htmlspecialchars($payroll['email']); ?></td>
                            <td><?php echo htmlspecialchars($payroll['position']); ?></td>
                            <td><?php echo htmlspecialchars(number_format($payroll['salary'], 2, ',', '.')); ?></td>
                            <td>
                                <form action="/Rhease/public/payroll/remove" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $payroll['id']; ?>">
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja remover este registro?');">Remover</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>