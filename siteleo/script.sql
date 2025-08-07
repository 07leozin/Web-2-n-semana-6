-- Criação do banco
CREATE DATABASE pagebebidas CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE pagebebidas;

-- Tabela de categorias (bebidas, comidas, etc.)
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL UNIQUE,
    descricao TEXT
) ENGINE=InnoDB;

-- Tabela de produtos
CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    preco DECIMAL(10,2) NOT NULL CHECK (preco >= 0),
    imagem VARCHAR(255) NOT NULL,
    estoque INT NOT NULL DEFAULT 0,
    categoria_id INT,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Tabela de clientes
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    telefone VARCHAR(20),
    endereco TEXT,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Tabela de pedidos
CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pendente', 'em_preparacao', 'finalizado', 'cancelado') DEFAULT 'pendente',
    total DECIMAL(10,2) NOT NULL DEFAULT 0,
    FOREIGN KEY (cliente_id) REFERENCES clientes(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Tabela de itens do pedido
CREATE TABLE pedido_itens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT NOT NULL,
    produto_id INT NOT NULL,
    quantidade INT NOT NULL CHECK (quantidade > 0),
    preco_unitario DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id) ON DELETE CASCADE,
    FOREIGN KEY (produto_id) REFERENCES produtos(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Inserindo categorias
INSERT INTO categorias (nome, descricao) VALUES
('Bebidas Quentes', 'Cafés, chás e outras bebidas servidas quentes.'),
('Bebidas Frias', 'Sucos, refrigerantes e outras bebidas geladas.');

-- Inserindo produtos
INSERT INTO produtos (nome, descricao, preco, imagem, estoque, categoria_id) VALUES
('Suco Natural', 'Delicioso suco de frutas frescas, 100% natural e sem açúcar.', 8.00, 'img/suco-novo.jpg', 50, 2),
('Refrigerante', 'Lata de refrigerante gelado, disponível nas versões tradicional ou zero açúcar.', 6.00, 'img/coca.jpg', 100, 2),
('Café Espresso', 'Café espresso forte, encorpado e com aroma marcante, ideal para energizar seu dia.', 5.00, 'img/cafe-novo.jpg', 40, 1),
('Chá Gelado', 'Chá natural servido gelado com um toque refrescante de limão.', 7.00, 'img/cha-novo.jpg', 30, 2);
