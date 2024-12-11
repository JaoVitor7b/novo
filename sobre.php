<div class="content">
    <div class="text-center">
        <?php
        $lista = $pdo->query("SELECT * FROM sobre");
        while ($linha = $lista->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <div class="company-info-container p-5 mx-auto my-4 bg-light shadow-sm rounded">
            <h4 class="text-primary mb-4">Informações da Empresa</h4>
            
            <h5 class="text-secondary">Nome da Empresa</h5>
            <p class="text-muted mb-4"><?php echo htmlspecialchars($linha['nome']); ?></p>

            <h5 class="text-secondary">História da Empresa</h5>
            <p class="text-muted mb-4"><?php echo htmlspecialchars($linha['descricao1']); ?></p>

            <h5 class="text-secondary">Missão da Empresa</h5>
            <p class="text-muted mb-4"><?php echo htmlspecialchars($linha['descricao2']); ?></p>

            <h5 class="text-secondary">Visão da Empresa</h5>
            <p class="text-muted mb-4"><?php echo htmlspecialchars($linha['descricao3']); ?></p>

            <h5 class="text-secondary">Localização</h5>
            <p class="text-muted mb-4"><?php echo htmlspecialchars($linha['localizacao']); ?></p>

            <h5 class="text-secondary">Telefone</h5>
            <p class="text-muted"><?php echo htmlspecialchars($linha['telefone']); ?></p>
        </div>
        <?php } ?>  
    </div>
</div>