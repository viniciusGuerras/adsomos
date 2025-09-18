<!DOCTYPE html>
<html lang="en">

<?php $imagePaths = [
    "teste.jpg",
    "nokia.jpg",
    "xiaomi.jpeg",
    "samsung.jpeg"
];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include 'components/header.php'; ?>
    <main>
        <div class="main-container">
            <!-- first part -->
            <section class="main-section">
                <div class="main-image">
                    <img src="images/teste.jpg" id="main-image" alt="">
                    <div class="thumbnails">
                        <img src="images/teste.jpg" alt="thumb0" class="thumb active" c>
                        <img src="images/segurado.jpeg" alt="thumb1" class="thumb">
                        <img src="images/athand.jpeg" alt="thumb2" class="thumb">
                        <img src="images/athome.jpeg" alt="thumb3" class="thumb">
                    </div>
                </div>
                <!-- Product Details -->
                <div class="main-content">
                    <h1>iPhone 15 Pro Max</h1>
                    <div class="money-related">
                        <p class="price">R$ 7.299,00</p>
                        <p class="installments">12x R$ 608,25 sem juros</p>
                    </div>
                    <!-- Color Options -->
                    <div class="color-related">
                        <p>Cor: <span id="selected-color"></span></p>
                        <div class="color-options">
                        </div>
                    </div>

                    <!-- Storage -->
                    <p>Armazenamento: 256 GB</p>

                    <!-- Quantity -->
                    <div class="quantity-related">
                        <label for="quantity">Quantidade:</label>
                        <select id="quantity" name="quantity">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <!-- Buttons -->
                    <div class="product-buttons">
                        <button class="add-to-cart">ADICIONAR AO CARRINHO</button>
                        <button class="buy-now">COMPRAR AGORA</button>
                    </div>
                </div>
            </section>

            <section class="info-review-container">
                <!-- Description and Specifications -->
                <div class="titles">
                    <div class="info-container">
                        <h2 class="description-title tab-title" data-target="description-content">Descrição</h2>
                        <h2 class="details-title tab-title" data-target="details-content">Especificações</h2>
                    </div>
                    <!-- Reviews -->
                    <h2 class="review-title tab-title" data-target="reviews-content">Avaliações (127)</h2>
                </div>

                <!-- Content containers -->
                <div id="description-content" class="tab-content toggled-hidden">
                    <p>
                        O iPhone 15 Pro Max apresenta design em titânio natural, tela Super Retina XDR de alta
                        resolução, desempenho incomparável com o chip A17 Pro e sistema avançado de câmeras para fotos e
                        vídeos profissionais.
                    </p>
                </div>

                <div id="details-content" class="tab-content toggled-hidden">
                    <ul>
                        <li>Tela: 6,7" Super Retina XDR</li>
                        <li>Processador: A17 Pro</li>
                        <li>Câmeras: Traseira tripla 48MP + 12MP + 12MP</li>
                        <li>Bateria: Até 29h de reprodução de vídeo</li>
                        <li>Armazenamento: 256 GB</li>
                        <li>Sistema Operacional: iOS 17</li>
                    </ul>
                </div>

                <div id="reviews-content" class="tab-content toggled-hidden">
                    <div class="review">
                        <p><strong>Maria S.</strong> </p>
                        <p>Excelente desempenho e design premium. Vale cada centavo!</p>
                    </div>
                    <div class="review">
                        <p><strong>João P.</strong> </p>
                        <p>Bateria dura bastante e câmera impressiona. Recomendo!</p>
                    </div>
                    <div class="review">
                        <p><strong>Ana L.</strong> </p>
                        <p>Ótimo aparelho, muito rápido e elegante.</p>
                    </div>
                </div>
            </section>

            <section class="related-container">
                <h2>Produtos Relacionados</h2>
                <div class="carousel">
                    <?php
                    foreach ($imagePaths as $path) {
                        echo "<img src='images/$path' alt='Produto relacionado'>";
                    }
                    ?>
                </div>
            </section>
        </div>
        <?php include 'components/footer.php'; ?>
    </main>

    <script src="script.js"></script>
</body>

</html>