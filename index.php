<?php

// INCLUI O AUTOLOADER DO COMPOSER
require __DIR__ . '/vendor/autoload.php';

use App\HarryPotter;

// CRIA UMA INSTÂNCIA DA CLASSE
$hp = new HarryPotter();

// CHAMA O MÉTODO QUE BUSCA O PERSONAGEM ALEATÓRIO
$personagem = $hp->getRandomHpPerson();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harry Potter API</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>CONSULTA API HARRY POTTER</h1>

        <button onclick="updatePage()" type="submit">ATUALIZAR</button>

        <?php if ($personagem): ?>
            <div class="resultado">
                <h2><?= htmlspecialchars($personagem['fullName'] ?? 'Nome desconhecido') ?></h2>

                <?php if (!empty($personagem['image'])): ?>
                    <img src="<?= htmlspecialchars($personagem['image']) ?>"
                        alt="<?= htmlspecialchars($personagem['fullName'] ?? 'Personagem') ?>"
                        width="200"><br>
                <?php endif; ?>

                <div class="info">
                    <p><strong>Casa:</strong> <?= htmlspecialchars($personagem['hogwartsHouse'] ?? 'Desconhecida') ?></p>
                    <p><strong>Ator:</strong> <?= htmlspecialchars($personagem['interpretedBy'] ?? 'Desconhecida') ?></p>
                    <p><strong>Apelido:</strong> <?= htmlspecialchars($personagem['nickname'] ?? 'Desconhecida') ?></p>
                    <?php if (!empty($personagem['children'])): ?>
                        <p><strong>Filhos:</strong> <?= htmlspecialchars(implode(', '['children'])) ?></p>
                    <?php endif; ?>
                    <p><strong>Nascimento:</strong> <?= htmlspecialchars($personagem['birthdate'] ?? 'Desconhecida') ?></p>
                </div>
            </div>
        <?php else: ?>
            <div class="erro">
                <p>Não foi possível buscar o personagem.</p>
            </div>
        <?php endif; ?>
    </div>

    <script src="../script.js"></script>
</body>

</html>