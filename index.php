<!DOCTYPE html>
<html lang="en">


<?php
function calculateInstallments($product_price, $max_installment, $tax_amount, $taxes)
{
    $installment_value = $product_price / $max_installment;
    if ($taxes) {
        $installment_value += $installment_value * $tax_amount;
    }
    return $installment_value;
}

function formatCurrency($amount){
    return 'R$' . number_format($amount, 2, ',', '.');
}

$product_name = "iPhone 15 Pro Max";
$product_price = 7299;
$product_storage = 256;

$max_installment = 12;
$tax_amount = 0.0;
$taxes = true;

$main_image = "images/iphones.png";
$thumbnails = ["images/iphones.png", "images/phone3_4.png", "images/phonefront.png"];
$imagePaths = ["samsung.jpg", "thinkpad.jpg", "macbook.jpeg", "ipad.png"];
$available_colors = [
    ["Titânio preto", "#1C1C1C"],
    ["Titânio branco", "#ded6d6ff"],
    ["Titânio azul", "#232c40ff"],
    ["Titânio natural", "#A0A0A0"],
];

$description = "O iPhone 15 Pro Max apresenta design em titânio natural, tela Super Retina XDR de alta resolução, desempenho incomparável com o chip A17 Pro e sistema avançado de câmeras para fotos e vídeos profissionais.";
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <?php include 'components/header.php'; ?>
    <main>
        <div class="main-container">
            <!-- Pictures And Thumbnails -->
            <section class="product-section">
                <div class="product-gallery">
                    <img src="<?php echo $main_image ?>" id="main-image" alt="">
                    <div class="thumbnails">
                        <?php foreach ($thumbnails as $index => $thumb): ?>
                            <img src="<?= $thumb; ?>" alt="thumb<?= $index ?>" class="thumb <?= $index === 0 ? 'active' : '' ?>">
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="product-details">
                    <h1>
                        <?= htmlspecialchars($product_name) ?>
                    </h1>

                    <div class="pricing">
                        <p class="price">
                            <?= formatCurrency($product_price); ?>
                        </p>
                        <p class="installments">
                            <?php
                            $amount = calculateInstallments($product_price, $max_installment, $tax_amount, $taxes);
                            echo $max_installment . "x de " . formatCurrency($amount) . ($taxes ? " com juros." : " sem juros.");
                            ?>
                        </p>
                    </div>

                    <!-- Color Options -->
                    <div class="products-colors">
                        <p>Cor: <span id="selected-color"><?php echo $available_colors[0][0]; ?></span></p>
                        <div class="color-options">
                            <?php foreach ($available_colors as $index => $color): ?>
                                <label class="color-swatch <?php echo $index == 0 ? 'selected' : ''?>"
                                    data-color="<?= htmlspecialchars($color[0]) ?>"
                                    style="background-color: <?= $color[1] ?>;">
                                    <input type="radio" name="color" value="<?= $color[0]?>" <?= $index === 0 ? 'checked' : ''; ?> style="display:none">
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
                    <!-- desc -->
                    <h2 class="description-title tab-title" data-target="description-content">Descrição
                        <i class="fa-solid fa-angle-right"></i>
                    </h2>
                    <!-- specs -->
                    <h2 class="details-title tab-title" data-target="details-content">Especificações
                        <i class="fa-solid fa-angle-right"></i>
                    </h2>
                    <!-- Reviews -->
                    <h2 class="review-title tab-title" data-target="reviews-content">Avaliações
                        (<?= count($reviews)?>)
                        <i class="fa-solid fa-angle-right"></i>
                    </h2>
                </div>

                <!-- Content containers -->
                <div id="description-content" class="tab-content toggled-hidden">
                    <p>
                        <?php echo $description ?>
                    </p>
                </div>

                <div id="details-content" class="tab-content toggled-hidden">
                    <ul>
                        <?php foreach ($specs as $label => $value): ?>
                            <li><?= $label . ": " . $value?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div id="reviews-content" class="tab-content toggled-hidden">
                    <?php foreach ($reviews as $review): ?>
                        <div class="review">
                            <p><strong><?php echo $review["author"]; ?></strong></p>
                            <p><?= $review["comment"]?></p>
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