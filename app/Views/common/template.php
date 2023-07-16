<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Controle de Equipamentos Hospitalar</title>
    <!-- Adicione seus estilos CSS e scripts JS aqui -->
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css') ?>">
    <script src="<?= base_url('assets/js/scripts.js') ?>"></script>
</head>
<body>
    <!-- Inclua o cabeçalho -->
    <?php include 'cabecalho.php'; ?>

    <!-- Conteúdo dinâmico da view será adicionado aqui -->
    <?= $content ?>

    <!-- Inclua o rodapé -->
    <?php include 'rodape.php'; ?>

    <!-- Adicione outros elementos comuns, se necessário -->
    <?php include 'footer.php'; ?>
    <!-- Adicione seus scripts JS adicionais aqui -->
    <script src="<?= base_url('assets/js/custom.js') ?>"></script>
</body>
</html>
