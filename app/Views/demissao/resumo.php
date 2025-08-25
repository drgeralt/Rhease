<?php require_once BASE_PATH . '/app/views/templates/header.php'; ?>

<h2>Resumo da Rescisão</h2>
<h2>Resumo da Rescisão</h2>
<p>O processo de demissão para <strong><?= htmlspecialchars($data['resumo']['nome_completo']) ?></strong> foi concluído.</p>

<div style="margin-bottom: 20px; padding: 10px; border: 1px solid #eee; border-radius: 5px;">
    <p style="margin: 5px 0;"><strong>Cargo:</strong> <?= htmlspecialchars($data['resumo']['cargo']) ?></p>
    <p style="margin: 5px 0;"><strong>Data de Admissão:</strong> <?= date('d/m/Y', strtotime($data['resumo']['data_admissao'])) ?></p>
</div>

<div class="resumo-box">
    <h3>Detalhes do Cálculo</h3>
    <div class="resumo-item">
        <p>Saldo de Salário:</p>
        <span>R$ <?= number_format($data['resumo']['saldo_salario'], 2, ',', '.') ?></span>
    </div>
    <div class="resumo-item">
        <p>Aviso Prévio:</p>
        <span>R$ <?= number_format($data['resumo']['aviso_previo'], 2, ',', '.') ?></span>
    </div>
    <div class="resumo-item">
        <p>13º Salário Proporcional:</p>
        <span>R$ <?= number_format($data['resumo']['decimo_terceiro_proporcional'], 2, ',', '.') ?></span>
    </div>
    <div class="resumo-item">
        <p>Férias Vencidas + 1/3:</p>
        <span>R$ <?= number_format($data['resumo']['ferias_vencidas'], 2, ',', '.') ?></span>
    </div>
    <div class="resumo-item">
        <p>Férias Proporcionais:</p>
        <span>R$ <?= number_format($data['resumo']['ferias_proporcionais'], 2, ',', '.') ?></span>
    </div>
    <div class="resumo-item">
        <p>Adicional de 1/3 sobre Férias Prop.:</p>
        <span>R$ <?= number_format($data['resumo']['terco_ferias'], 2, ',', '.') ?></span>
    </div>
    <div class="total">
        <span>TOTAL DA RESCISÃO:</span>
        <span>R$ <?= number_format($data['resumo']['valor_total_rescisao'], 2, ',', '.') ?></span>
    </div>
</div>

<p style="margin-top: 20px; text-align: center; font-style: italic; color: #777;">
    <strong>Aviso:</strong> O status do funcionário foi alterado para "inativo". Este é um cálculo simplificado.
</p>

<?php require_once BASE_PATH . '/app/views/templates/footer.php'; ?>