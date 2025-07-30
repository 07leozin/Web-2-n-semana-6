<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Comprar Chá Gelado</title>
  <link rel="shortcut icon" href="img/page.jfif" type="image/x-icon">
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <header>
    <div class="container">
      <h1>🍹 Café & Bar Premium</h1>
    </div>
  </header>

  <main class="container">
    <section class="produto-detalhe">
      <img src="img/cha.webp" alt="Chá Gelado" />
      <div>
        <h2>Chá Gelado</h2>
        <p>Chá natural servido gelado com um toque refrescante de limão. Perfeito para os dias quentes.</p>
        <p class="preco-detalhe">R$ 7,00</p>
        <button id="confirmarPedido" class="btn">Confirmar Pedido</button>
      </div>
    </section>
    <a href="index.html" class="voltar">← Voltar ao cardápio</a>
  </main>

 
  <div id="modalConfirm" class="modal">
    <div class="modal-content">
      <p>Deseja realmente confirmar o pedido?</p>
      <div class="modal-buttons">
        <button id="btnSim" class="btn">Sim</button>
        <button id="btnNao" class="btn btn-cancel">Não</button>
      </div>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 - Café & Bar Premium</p>
  </footer>

  <script src="js/pedido.js"></script>
</body>
</html>
