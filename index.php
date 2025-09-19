<!DOCTYPE html>
<html lang="en">


<?php
$product_name = "iPhone 15 Pro Max";
$product_price = 7299;
$product_storage = 256;
$installments = "12x R$ 608,25 sem juros";
$max_installment = 12;
$tax_amount = 0.0;
$taxes = true;
$main_image = "images/teste.jpg";
$thumbnails = ["images/teste.jpg", "images/segurado.jpeg", "images/athand.jpeg", "images/athome.jpeg"];
$imagePaths = ["teste.jpg", "nokia.jpg", "xiaomi.jpeg", "samsung.jpeg", "cell.jpeg", "samsung.jpeg"];
$available_colors = [
    ["Bege estranho", "#B0A18F"],
    ["Titânio", "#FFFFFF"],
    ["outro1", "#784242"],
    ["outro2", "#2e2e36"],
    ["terceiro", "#8d4050ff"]
];

$specs = [
    "Tela" => '6,7" Super Retina XDR',
    "Processador" => "A17 Pro",
    "Câmeras" => "Traseira tripla 48MP + 12MP + 12MP",
    "Bateria" => "Até 29h de reprodução de vídeo",
    "Armazenamento" => "256 GB",
    "Sistema Operacional" => "iOS 17"
];

$reviews = [
    ["author" => "Maria S.", "comment" => "Excelente desempenho e design premium. Vale cada centavo!"],
    ["author" => "João P.", "comment" => "Bateria dura bastante e câmera impressiona. Recomendo!"],
    ["author" => "Ana L.", "comment" => "Ótimo aparelho, muito rápido e elegante."]
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
            <!-- pictures and thumbnails -->
            <section class="product-section">
                <div class="product-gallery">
                    <img src="<?php echo $main_image?>" id="main-image" alt="">
                    <div class="thumbnails">
                        <?php foreach ($thumbnails as $index => $thumb): ?>
                            <img src="<?php echo $thumb; ?>" alt="thumb<?php echo $index; ?>"
                                class="thumb <?php echo $index === 0 ? 'active' : ''; ?>">
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- Product Details -->
                <div class="product-details">
                    <h1>
                        <?php echo $product_name ?>
                    </h1>

                    <div class="pricing">
                        <p class="price">
                            R$ <?php echo number_format($product_price, 2, ',', '.'); ?>
                        </p>
                        <p class="installments">
                            <?php
                            $installment_value = $product_price / $max_installment;
                            if ($taxes) {
                                $installment_value += $installment_value * $tax_amount;
                            }
                            $installment_value = number_format($installment_value, 2, ',', '.');

                            echo $max_installment . "x de R$ " . $installment_value . ($taxes ? " com juros." : " sem juros.");
                            ?>
                        </p>
                    </div>

                    <!-- Color Options -->
                    <div class="products-colors">
                        <p>Cor: <span id="selected-color"><?php echo $available_colors[0][0]; ?></span></p>
                        <div class="color-options">
                            <?php foreach ($available_colors as $index => $color): ?>
                                <label class="color-swatch <?php echo $index == 0 ? 'selected' : ''; ?>"
                                    data-color="<?php echo $color[0]; ?>"
                                    style="background-color: <?php echo $color[1]; ?>;">
                                    <input type="radio" name="color" value="<?php echo $color[0]; ?>" <?php echo $index === 0 ? 'checked' : ''; ?> style="display:none;">
                                </label>
                            <?php endforeach ?>
                        </div>
                    </div>

                    <!-- Storage -->
                    <p>Armazenamento: <?php echo $product_storage ?> GB</p>

                    <!-- Buttons -->
                    <div class="product-actions">
                        <div class="quantity">
                            <label for="quantity">Quantidade:</label>
                            <select id="quantity" name="quantity">
                                <!-- dynamically populated by JS -->
                            </select>
                        </div>

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
                    <h2 class="review-title tab-title" data-target="reviews-content">Avaliações (<?php echo count($reviews); ?>)</h2>
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
                        <?php foreach ($specs as $label => $value): ?>
                            <li><?php echo $label . ": " . $value; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div id="reviews-content" class="tab-content toggled-hidden">
                    <?php foreach ($reviews as $review): ?>
                        <div class="review">
                            <p><strong><?php echo $review["author"]; ?></strong></p>
                            <p><?php echo $review["comment"]; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="related-container">
                <h2>Produtos Relacionados</h2>
                <div class="carousel">
                    <?php
                    foreach ($imagePaths as $path) {
                        echo "<img class='carousel-item'  src='images/$path' alt='Produto relacionado'>";
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
