-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 10-Jan-2025 às 14:18
-- Versão do servidor: 8.0.36
-- versão do PHP: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `domes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id` int NOT NULL,
  `trabalhador_id` int NOT NULL,
  `avaliador_id` int NOT NULL,
  `nota` int NOT NULL,
  `comentario` text,
  `data_avaliacao` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id`, `trabalhador_id`, `avaliador_id`, `nota`, `comentario`, `data_avaliacao`) VALUES
(1, 1, 2, 4, 'Bom trabalho!', '2024-12-04 16:02:43'),
(2, 1, 3, 5, 'Excelente serviço!', '2024-12-04 16:02:43'),
(3, 1, 2, 5, 'Ótimo trabalho, bem feito!', '2024-12-05 17:00:00'),
(4, 2, 1, 4, 'Bom serviço, mas poderia melhorar um pouco.', '2024-12-05 17:00:00'),
(5, 3, 2, 5, 'Excelente desempenho, muito atencioso.', '2024-12-05 17:00:00'),
(6, 4, 3, 4, 'Serviço razoável, atende bem ao básico.', '2024-12-05 17:00:00'),
(7, 5, 6, 5, 'Trabalho perfeito, sou muito grato!', '2024-12-05 17:00:00'),
(8, 6, 5, 4, 'Bom trabalho, mas levou mais tempo do que o esperado.', '2024-12-05 17:00:00'),
(9, 7, 8, 5, 'Trabalhou com muito profissionalismo e dedicação.', '2024-12-05 17:00:00'),
(10, 8, 7, 4, 'Satisfeito, mas poderia ser mais rápido.', '2024-12-05 17:00:00'),
(11, 9, 10, 5, 'Excelente qualidade no serviço, recomendo muito.', '2024-12-05 17:00:00'),
(12, 10, 9, 3, 'O trabalho não ficou como eu esperava, mas ainda sim ok.', '2024-12-05 17:00:00'),
(13, 1, 2, 5, 'Ótimo trabalho, bem feito!', '2024-12-05 17:00:00'),
(14, 2, 1, 4, 'Bom serviço, mas poderia melhorar um pouco.', '2024-12-05 17:00:00'),
(15, 3, 2, 5, 'Excelente desempenho, muito atencioso.', '2024-12-05 17:00:00'),
(16, 4, 3, 4, 'Serviço razoável, atende bem ao básico.', '2024-12-05 17:00:00'),
(17, 5, 6, 5, 'Trabalho perfeito, sou muito grato!', '2024-12-05 17:00:00'),
(18, 6, 5, 4, 'Bom trabalho, mas levou mais tempo do que o esperado.', '2024-12-05 17:00:00'),
(19, 7, 8, 5, 'Trabalhou com muito profissionalismo e dedicação.', '2024-12-05 17:00:00'),
(20, 8, 7, 4, 'Satisfeito, mas poderia ser mais rápido.', '2024-12-05 17:00:00'),
(21, 9, 10, 5, 'Excelente qualidade no serviço, recomendo muito.', '2024-12-05 17:00:00'),
(22, 10, 9, 3, 'O trabalho não ficou como eu esperava, mas ainda sim ok.', '2024-12-05 17:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `telefone`, `endereco`) VALUES
(1, 'Carlos Silva', 'carlos@exemplo.com', '(27) 99999-0000', 'Rua A, nº 10, Itaguaçu, ES'),
(2, 'Maria Souza', 'maria@exemplo.com', '(27) 98888-0000', 'Rua B, nº 20, Itaguaçu, ES'),
(3, 'João Pereira', 'joao@exemplo.com', '(27) 97777-0000', 'Rua C, nº 30, Itaguaçu, ES'),
(4, 'Ana Costa', 'ana@exemplo.com', '(27) 96666-0000', 'Rua D, nº 40, Itaguaçu, ES'),
(5, 'Lucas Almeida', 'lucas@exemplo.com', '(27) 95555-0000', 'Rua E, nº 50, Itaguaçu, ES'),
(6, 'Cliente 6', 'cliente6@example.com', '944444444', NULL),
(7, 'Cliente 7', 'cliente7@example.com', '933333333', NULL),
(8, 'Cliente 8', 'cliente8@example.com', '922222222', NULL),
(9, 'Cliente 9', 'cliente9@example.com', '911111111', NULL),
(10, 'Cliente 10', 'cliente10@example.com', '900000000', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int NOT NULL,
  `trabalhador_id` int NOT NULL,
  `comentario` text NOT NULL,
  `data_comentario` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `trabalhador_id`, `comentario`, `data_comentario`) VALUES
(1, 1, 'Excelente serviço!', '2024-12-05 14:18:39'),
(2, 2, 'Muito atencioso.', '2024-12-05 14:18:39'),
(3, 3, 'Recomendo para todos!', '2024-12-05 14:18:39'),
(4, 1, 'Muito bom trabalhar com ela, recomendo!', '2024-12-05 17:00:00'),
(5, 2, 'Atendeu minhas expectativas, nada a reclamar.', '2024-12-05 17:00:00'),
(6, 3, 'Excelente profissional, fez o trabalho com muita competência.', '2024-12-05 17:00:00'),
(7, 4, 'Satisfeito com o serviço, mas poderia ser mais rápido.', '2024-12-05 17:00:00'),
(8, 5, 'Muito profissional, recomendo sem dúvidas!', '2024-12-05 17:00:00'),
(9, 6, 'Excelente entrega, muito satisfeita.', '2024-12-05 17:00:00'),
(10, 7, 'Bom trabalho, dentro do esperado.', '2024-12-05 17:00:00'),
(11, 8, 'Profissional competente, faria novamente.', '2024-12-05 17:00:00'),
(12, 9, 'Apesar do prazo estourado, a qualidade foi boa.', '2024-12-05 17:00:00'),
(13, 10, 'Não atendeu completamente o que eu pedi, mas foi ok.', '2024-12-05 17:00:00'),
(14, 1, 'Muito bom trabalhar com ela, recomendo!', '2024-12-05 17:00:00'),
(15, 2, 'Atendeu minhas expectativas, nada a reclamar.', '2024-12-05 17:00:00'),
(16, 3, 'Excelente profissional, fez o trabalho com muita competência.', '2024-12-05 17:00:00'),
(17, 4, 'Satisfeito com o serviço, mas poderia ser mais rápido.', '2024-12-05 17:00:00'),
(18, 5, 'Muito profissional, recomendo sem dúvidas!', '2024-12-05 17:00:00'),
(19, 6, 'Excelente entrega, muito satisfeita.', '2024-12-05 17:00:00'),
(20, 7, 'Bom trabalho, dentro do esperado.', '2024-12-05 17:00:00'),
(21, 8, 'Profissional competente, faria novamente.', '2024-12-05 17:00:00'),
(22, 9, 'Apesar do prazo estourado, a qualidade foi boa.', '2024-12-05 17:00:00'),
(23, 10, 'Não atendeu completamente o que eu pedi, mas foi ok.', '2024-12-05 17:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_contratacoes`
--

CREATE TABLE `historico_contratacoes` (
  `id` int NOT NULL,
  `trabalhador_id` int NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `servico` varchar(255) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `status` enum('realizado','cancelado','pendente') NOT NULL,
  `data` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `historico_contratacoes`
--

INSERT INTO `historico_contratacoes` (`id`, `trabalhador_id`, `cliente`, `servico`, `valor`, `status`, `data`) VALUES
(1, 1, 'Alice Alves', 'Limpeza', '120.00', 'realizado', '2024-12-04 16:02:43'),
(2, 1, 'Pedro Pereira', 'Reforma', '100.00', 'cancelado', '2024-12-04 16:02:43'),
(3, 1, 'Carlos Almeida', 'Limpeza de fachada', '150.00', 'realizado', '2024-12-05 17:00:00'),
(4, 2, 'Paula Santos', 'Pintura de sala', '200.00', 'realizado', '2024-12-05 17:00:00'),
(5, 3, 'Marcos Silva', 'Reforma do banheiro', '500.00', 'pendente', '2024-12-05 17:00:00'),
(6, 4, 'Raquel Moreira', 'Troca de telhado', '1000.00', 'cancelado', '2024-12-05 17:00:00'),
(7, 5, 'Juliana Costa', 'Pintura externa', '750.00', 'realizado', '2024-12-05 17:00:00'),
(8, 6, 'Ricardo Lima', 'Troca de piso', '1200.00', 'realizado', '2024-12-05 17:00:00'),
(9, 7, 'Renata Martins', 'Instalação elétrica', '650.00', 'pendente', '2024-12-05 17:00:00'),
(10, 8, 'João Pereira', 'Instalação de ar-condicionado', '950.00', 'cancelado', '2024-12-05 17:00:00'),
(11, 9, 'Fernanda Oliveira', 'Reformas gerais', '2000.00', 'realizado', '2024-12-05 17:00:00'),
(12, 10, 'Eduardo Souza', 'Reformas de cozinha', '1700.00', 'pendente', '2024-12-05 17:00:00'),
(13, 1, 'Carlos Almeida', 'Limpeza de fachada', '150.00', 'realizado', '2024-12-05 17:00:00'),
(14, 2, 'Paula Santos', 'Pintura de sala', '200.00', 'realizado', '2024-12-05 17:00:00'),
(15, 3, 'Marcos Silva', 'Reforma do banheiro', '500.00', 'pendente', '2024-12-05 17:00:00'),
(16, 4, 'Raquel Moreira', 'Troca de telhado', '1000.00', 'cancelado', '2024-12-05 17:00:00'),
(17, 5, 'Juliana Costa', 'Pintura externa', '750.00', 'realizado', '2024-12-05 17:00:00'),
(18, 6, 'Ricardo Lima', 'Troca de piso', '1200.00', 'realizado', '2024-12-05 17:00:00'),
(19, 7, 'Renata Martins', 'Instalação elétrica', '650.00', 'pendente', '2024-12-05 17:00:00'),
(20, 8, 'João Pereira', 'Instalação de ar-condicionado', '950.00', 'cancelado', '2024-12-05 17:00:00'),
(21, 9, 'Fernanda Oliveira', 'Reformas gerais', '2000.00', 'realizado', '2024-12-05 17:00:00'),
(22, 10, 'Eduardo Souza', 'Reformas de cozinha', '1700.00', 'pendente', '2024-12-05 17:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id` int NOT NULL,
  `trabalhador_id` int NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `data_pagamento` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `pagamentos`
--

INSERT INTO `pagamentos` (`id`, `trabalhador_id`, `valor`, `data_pagamento`) VALUES
(1, 1, '2500.00', '2024-12-04 16:02:44'),
(2, 1, '300.00', '2024-12-04 16:02:44'),
(3, 1, '1000.00', '2024-12-05 17:00:00'),
(4, 2, '500.00', '2024-12-05 17:00:00'),
(5, 3, '1200.00', '2024-12-05 17:00:00'),
(6, 4, '1500.00', '2024-12-05 17:00:00'),
(7, 5, '800.00', '2024-12-05 17:00:00'),
(8, 6, '600.00', '2024-12-05 17:00:00'),
(9, 7, '450.00', '2024-12-05 17:00:00'),
(10, 8, '750.00', '2024-12-05 17:00:00'),
(11, 9, '1200.00', '2024-12-05 17:00:00'),
(12, 10, '900.00', '2024-12-05 17:00:00'),
(13, 1, '1000.00', '2024-12-05 17:00:00'),
(14, 2, '500.00', '2024-12-05 17:00:00'),
(15, 3, '1200.00', '2024-12-05 17:00:00'),
(16, 4, '1500.00', '2024-12-05 17:00:00'),
(17, 5, '800.00', '2024-12-05 17:00:00'),
(18, 6, '600.00', '2024-12-05 17:00:00'),
(19, 7, '450.00', '2024-12-05 17:00:00'),
(20, 8, '750.00', '2024-12-05 17:00:00'),
(21, 9, '1200.00', '2024-12-05 17:00:00'),
(22, 10, '900.00', '2024-12-05 17:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `trabalhos`
--

CREATE TABLE `trabalhos` (
  `id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `descricao` text,
  `data_trabalho` datetime DEFAULT CURRENT_TIMESTAMP,
  `valor` decimal(10,2) DEFAULT NULL,
  `id_cliente` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `trabalhos`
--

INSERT INTO `trabalhos` (`id`, `usuario_id`, `descricao`, `data_trabalho`, `valor`, `id_cliente`) VALUES
(1, 1, 'Reforma da cozinha', '2024-12-04 17:03:30', '500.00', 1),
(2, 2, 'Pintura da sala', '2024-12-04 17:03:30', '200.00', 2),
(3, 3, 'Troca de telhado', '2024-12-04 17:03:30', '1000.00', 3),
(4, 1, 'Reforma de escritório', '2024-12-05 17:00:00', '800.00', 1),
(5, 2, 'Instalação de ar-condicionado', '2024-12-05 17:00:00', '1200.00', 2),
(6, 3, 'Montagem de móveis', '2024-12-05 17:00:00', '300.00', 3),
(7, 4, 'Troca de piso', '2024-12-05 17:00:00', '1000.00', 4),
(8, 5, 'Instalação elétrica', '2024-12-05 17:00:00', '1500.00', 5),
(9, 6, 'Pintura de garagem', '2024-12-05 17:00:00', '500.00', 6),
(10, 7, 'Reforma de banheiro', '2024-12-05 17:00:00', '600.00', 7),
(11, 8, 'Reforma de cozinha', '2024-12-05 17:00:00', '1100.00', 8),
(12, 9, 'Troca de telhado', '2024-12-05 17:00:00', '2000.00', 9),
(13, 10, 'Reforma de jardim', '2024-12-05 17:00:00', '700.00', 10),
(14, 1, 'Reforma de escritório', '2024-12-05 17:00:00', '800.00', 1),
(15, 2, 'Instalação de ar-condicionado', '2024-12-05 17:00:00', '1200.00', 2),
(16, 3, 'Montagem de móveis', '2024-12-05 17:00:00', '300.00', 3),
(17, 4, 'Troca de piso', '2024-12-05 17:00:00', '1000.00', 4),
(18, 5, 'Instalação elétrica', '2024-12-05 17:00:00', '1500.00', 5),
(19, 6, 'Pintura de garagem', '2024-12-05 17:00:00', '500.00', 6),
(20, 7, 'Reforma de banheiro', '2024-12-05 17:00:00', '600.00', 7),
(21, 8, 'Reforma de cozinha', '2024-12-05 17:00:00', '1100.00', 8),
(22, 9, 'Troca de telhado', '2024-12-05 17:00:00', '2000.00', 9),
(23, 10, 'Reforma de jardim', '2024-12-05 17:00:00', '700.00', 10),
(24, 1, 'Reforma de escritório', '2024-12-05 17:00:00', '800.00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `primeiro_nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `genero` enum('Feminino','Masculino','Outros') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `cep` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `estado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `municipio` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bairro` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `numero` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `foto_perfil` longblob,
  `biografia` text,
  `aniversario` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `primeiro_nome`, `sobrenome`, `email`, `celular`, `senha`, `genero`, `cep`, `estado`, `municipio`, `bairro`, `numero`, `complemento`, `foto_perfil`, `biografia`, `aniversario`) VALUES
(1, 'Marta', 'Mendes', 'martamendes@gmail.com', '12345678', '$2y$10$r8QKKdcbny3Zv3LnPZoahuvdXpVbovuoGJNdaFu1YVHulQfvd2BIm', 'Feminino', '29300000', 'Espírito Santo', 'Cariacica', 'Bela Aurora', '400', '4', NULL, 'Olá, mundo!', NULL),
(2, 'Carlos', 'Almeida', 'carlos.almeida@example.com', '4444444444', '$2y$10$U6ShijzM.wGETELpz4zl2upTdh.Dp6sny7vVuLizLKg/BtCWnugYi', 'Masculino', '29400000', 'Espírito Santo', 'Guarapari', 'Ipiranga', '500', 'Bloco B', NULL, NULL, NULL),
(3, 'Paula', 'Santos', 'paula.santos@example.com', '5555555555', '$2y$10$jd711p2qUDacMszopDnQbOCvSxpjTNS5Lt3YWPAhbvE2sI3.JwByu', 'Feminino', '29500000', 'Espírito Santo', 'Anchieta', 'Centro', '600', 'Apto 203', NULL, NULL, NULL),
(4, 'Marcos', 'Silva', 'marcos.silva@example.com', '6666666666', '$2y$10$MYKkDuVufY1nt0AIi5btV.ijtlODDpb1h1gIl2i5FbMd/FiW9Dhi.', 'Masculino', '29600000', 'Espírito Santo', 'Linhares', 'Três Barras', '700', NULL, NULL, NULL, NULL),
(5, 'Juliana', 'Costa', 'juliana.costa@example.com', '7777777777', '$2y$10$fbARgY3reNY62J7m30jKN.eMCZnCiFQ8c1rcV3K80nGJqJXkVL0q6', 'Feminino', '29700000', 'Espírito Santo', 'Colatina', 'Maria das Graças', '800', 'Casa 2', NULL, NULL, NULL),
(6, 'Eduardo', 'Martins', 'eduardo.martins@example.com', '8888888888', '$2y$10$gH6jbVsiCoiRNi8d09o62ekd7Zn0/E15qMeOD0LLslmxbAtomqqSy', 'Masculino', '29800000', 'Espírito Santo', 'Nova Venécia', 'Centro', '900', NULL, NULL, NULL, NULL),
(7, 'Fernanda', 'Rodrigues', 'fernanda.rodrigues@example.com', '9999999999', '$2y$10$M6W1CPfuuCghb8p1vgT/eeRxYRg/CwYaI8q87Qqt0QURfnySxB0XK', 'Feminino', '29900000', 'Espírito Santo', 'São Mateus', 'Guriri', '1000', 'Apto 405', NULL, NULL, NULL),
(8, 'Lucas', 'Oliveira', 'lucas.oliveira@example.com', '1010101010', '$2y$10$6GeHMY1JpK80OI4UYoSXoOh9kMopTCaIS.y2ZoJCYJ1G.PQrMB0ia', 'Masculino', '30000000', 'Espírito Santo', 'Viana', 'Marcílio de Noronha', '1100', NULL, NULL, NULL, NULL),
(9, 'Raquel', 'Moreira', 'raquel.moreira@example.com', '1111111111', '$2y$10$QDvsqhcucM1oDhaUL1ohqOFKSuZ8nDGHkB.OoD2PzQID9MO0eEw42', 'Feminino', '30100000', 'Espírito Santo', 'Afonso Cláudio', 'Centro', '1200', 'Casa', NULL, NULL, NULL),
(10, 'Pedro', 'Gomes', 'pedro.gomes@example.com', '1212121212', '$2y$10$qc7bkpfJCEJw20FktC8QNuX1qRe5V5AxJt.31Y2FdNwAbGFiXzEaO', 'Masculino', '30200000', 'Espírito Santo', 'Santa Teresa', 'Centro', '1300', 'Apto 305', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitacoes`
--

CREATE TABLE `visitacoes` (
  `id` int NOT NULL,
  `trabalhador_id` int NOT NULL,
  `data_visita` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `visitacoes`
--

INSERT INTO `visitacoes` (`id`, `trabalhador_id`, `data_visita`) VALUES
(1, 1, '2024-12-04 16:02:43'),
(2, 1, '2024-12-04 16:02:43'),
(3, 1, '2024-12-01 09:00:00'),
(4, 2, '2024-12-02 10:00:00'),
(5, 3, '2024-12-03 11:00:00'),
(6, 4, '2024-12-04 12:00:00'),
(7, 5, '2024-12-05 13:00:00'),
(8, 1, '2024-12-05 17:00:00'),
(9, 2, '2024-12-05 17:00:00'),
(10, 3, '2024-12-05 17:00:00'),
(11, 4, '2024-12-05 17:00:00'),
(12, 5, '2024-12-05 17:00:00'),
(13, 6, '2024-12-05 17:00:00'),
(14, 7, '2024-12-05 17:00:00'),
(15, 8, '2024-12-05 17:00:00'),
(16, 9, '2024-12-05 17:00:00'),
(17, 10, '2024-12-05 17:00:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trabalhador_id` (`trabalhador_id`),
  ADD KEY `avaliador_id` (`avaliador_id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trabalhador_id` (`trabalhador_id`);

--
-- Índices para tabela `historico_contratacoes`
--
ALTER TABLE `historico_contratacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trabalhador_id` (`trabalhador_id`);

--
-- Índices para tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trabalhador_id` (`trabalhador_id`);

--
-- Índices para tabela `trabalhos`
--
ALTER TABLE `trabalhos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `visitacoes`
--
ALTER TABLE `visitacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trabalhador_id` (`trabalhador_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `historico_contratacoes`
--
ALTER TABLE `historico_contratacoes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `trabalhos`
--
ALTER TABLE `trabalhos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `visitacoes`
--
ALTER TABLE `visitacoes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`trabalhador_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `avaliacoes_ibfk_2` FOREIGN KEY (`avaliador_id`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`trabalhador_id`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `historico_contratacoes`
--
ALTER TABLE `historico_contratacoes`
  ADD CONSTRAINT `historico_contratacoes_ibfk_1` FOREIGN KEY (`trabalhador_id`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `pagamentos_ibfk_1` FOREIGN KEY (`trabalhador_id`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `trabalhos`
--
ALTER TABLE `trabalhos`
  ADD CONSTRAINT `trabalhos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `visitacoes`
--
ALTER TABLE `visitacoes`
  ADD CONSTRAINT `visitacoes_ibfk_1` FOREIGN KEY (`trabalhador_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
