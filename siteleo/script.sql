CREATE DATABASE cardapio CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE cardapio;

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    preco DECIMAL(6,2) NOT NULL,
    imagem VARCHAR(255) NOT NULL
);

INSERT INTO produtos (nome, descricao, preco, imagem) VALUES
('Suco Natural', 'Delicioso suco de frutas frescas, 100% natural e sem açúcar.', 8.00, 'img/suco-novo.jpg'),
('Refrigerante', 'Lata de refrigerante gelado, disponível nas versões tradicional ou zero açúcar.', 6.00, 'img/coca.jpg'),
('Café Espresso', 'Café espresso forte, encorpado e com aroma marcante, ideal para energizar seu dia.', 5.00, 'img/cafe-novo.jpg'),
('Chá Gelado', 'Chá natural servido gelado com um toque refrescante de limão. Perfeito para os dias quentes.', 7.00, 'img/cha-novo.jpg');