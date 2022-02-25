-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Fev-2022 às 16:53
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projlib`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acervo`
--

CREATE TABLE `acervo` (
  `ItemId` int(10) NOT NULL,
  `Titulo` varchar(50) DEFAULT NULL,
  `Autor` varchar(50) DEFAULT NULL,
  `Genero` varchar(50) DEFAULT NULL,
  `Descricao` varchar(2000) DEFAULT NULL,
  `Isbn` varchar(50) DEFAULT NULL,
  `Disponibilidade` int(5) DEFAULT NULL,
  `Paginas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acervo`
--

INSERT INTO `acervo` (`ItemId`, `Titulo`, `Autor`, `Genero`, `Descricao`, `Isbn`, `Disponibilidade`, `Paginas`) VALUES
(1, 'E não sobrou nenhum', 'Agatha Christie', 'Suspense, Mistério', 'Na ilha do Soldado, antiga propriedade de um milionário norte-americano, dez pessoas sem nenhuma ligação aparente são confrontadas por uma voz misteriosa com fatos marcantes de seus passados.\r\nConvidados pelo misterioso mr. Owen, nenhum dos presentes tem muita certeza de por que estão ali, a despeito de conjecturas pouco convincentes que os leva a crer que passariam um agradável período de descanso em mordomia. Entretanto, já na primeira noite, o mistério e o suspense se abatem sobre eles e, num instante, todos são suspeitos, todos são vítimas e todos são culpados.\r\nÉ neste clima de tensão e desconforto que as mortes inexplicáveis começam e, sem comunicação com o continente devido a uma forte tempestade, a estadia transforma-se em um pesadelo. Todos se perguntam: quem é o misterioso anfitrião, mr. Owen? Existe mais alguém na ilha? O assassino pode ser um dos convidados? Que mente ardilosa teria preparado um crime tão complexo? E, sobretudo, por quê?\r\nSão essas e outras perguntas que o leitor será desafiado a resolver neste fabuloso romance de Agatha Christie, que envolve os espíritos mais perspicazes num complexo emaranhado de situações, lembranças e acusações na busca deste sagaz assassino. Medo, confinamento e angústia: que o leitor descubra por si mesmo porque E não sobrou nenhum foi eleito o melhor romance policial de todos os tempos.', '8525057010', 5, '400'),
(2, 'Arsène Lupin: O Ladrão de Casaca', 'Maurice Leblanc.', 'Mistério', 'Arsène Lupin, o ladrão de Casaca é uma coletânea de nove histórias do escritor francês Maurice Leblanc que constituem as primeiras aventuras de Arsène Lupin. O editor da revista francesa Je sais tout encomendou a Maurice uma novela policial, cujo herói fosse para França o que era para a Inglaterra o detetive Sherlock Holmes, de Sir Arthur Conan Doyle. Nasceu assim Arsène Lupin, personagem vivo, audacioso, impertinente, desafiando sem cessar o Inspetor Ganimard, arrastando corações atrás de si, zombando das posições conquistadas e ridicularizando os burgueses, socorrendo os fracos, Arsène Lupin é um Robin Hood da Belle Époque. Nessa edição especial em capa dura, o leitor encontrará a versão integral do texto, traduzido diretamente do francês.', '6555790687.', 2, '320'),
(3, 'O guia do mochileiro das galáxias – Livro 1', 'Douglas Adams', 'Ficção', 'NÃO ENTRE EM PÂNICO.\r\nArthur Dent já estava tendo um dia péssimo antes mesmo de a Terra ser demolida para abrir espaço para uma via expressa hiperespacial.\r\nE depois disso as coisas ficaram muito, muito piores.\r\nCom apenas uma toalha, um peixinho amarelo e um livro, Arthur vai ser obrigado a navegar por um universo hostil na companhia de alienígenas pouco confiáveis e viver as mais estranhas aventuras. Sua sorte é que o livro em questão é O Guia do Mochileiro das Galáxias...', '9788599296578', 3, '208'),
(4, 'O labirinto do Fauno', 'Guillermo Del Toro, Cornelia Funke', 'Fantasia, Horror, Ficção-Científica', 'No ano de 1944, Ofélia e a mãe cruzam uma estrada de terra que corta uma floresta longínqua ao norte da Espanha, um lugar que guarda histórias já esquecidas pelos homens. O novo lar é um moinho de vento tomado pela escuridão e pela crueldade do capitão Vidal e seus soldados, dispostos a tudo para exterminar os rebeldes que se escondem na mata.\r\nMas o que eles não sabem é que a floresta que tanto odeiam também abriga criaturas mágicas e poderosas, habitantes de um reino subterrâneo repleto de encantos e horrores, súditos em busca de sua princesa há muito perdida. Uma princesa que, segundo os sussurros das árvores, finalmente retornou ao lar.\r\n', '8551005197', 1, '320'),
(5, 'Não conte a ninguém', 'Harlan Coben', 'Thriller, Suspense', 'Enquanto comemoravam o aniversário de seu primeiro beijo, o Dr. David Beck e sua esposa, Elizabeth, sofreram um terrível ataque. Ele foi golpeado e caiu no lago, inconsciente. Ela foi raptada e brutalmente assassinada por um serial killer.\r\nO caso volta à tona oito anos depois, quando a polícia encontra dois corpos enterrados perto do local do crime, junto com o taco de beisebol usado para nocautear David. Ao mesmo tempo, o médico recebe um misterioso e-mail que aparentemente só pode ter sido enviado por sua esposa.\r\nEsses acontecimentos fazem ressurgir inúmeras perguntas sem resposta: como David conseguiu sair do lago? Elizabeth está viva? Por que ela demorou tanto para entrar em contato com o marido?\r\nNa mira do FBI como principal suspeito da morte da esposa e caçado por um perigosíssimo assassino de aluguel, David só conta com o apoio de sua melhor amiga, da sua advogada e de um traficante de drogas para descobrir toda a verdade e provar sua inocência.', '8580419689', 2, '256'),
(6, 'O homem mais inteligente da história', 'Augusto Cury', 'Ficção', 'A épica jornada de Marco Polo, um cientista ateu, para desvendar a fascinante mente de Jesus.\r\nO psiquiatra Marco Polo é um cientista respeitadíssimo, especialista no funcionamento da mente e autor do primeiro programa mundial de gestão da emoção.\r\nQuando vai a Jerusalém participar de uma reunião na ONU, é desafiado a estudar a inteligência do homem mais famoso da história: Jesus. Mas ele é um dos maiores ateus da atualidade e se recusa a fazê-lo. Todavia, a plateia de intelectuais o instiga a realizar essa empreitada.\r\nDepois de muita resistência, Marco Polo aceita o desafio. Monta uma mesa-redonda composta de brilhantes profissionais para analisar a mente de Jesus sob os ângulos da ciência e não da religião. Ele parte em uma jornada épica para saber se Jesus era um mestre em ter autocontrole, gerir sua emoção, trabalhar perdas e frustrações, libertar sua criatividade, contemplar o belo e formar pensadores.\r\nMarco Polo esperava encontrar um homem comum, sem grandes habilidades intelectuais, mas pouco a pouco fica abalado e conclui que a mente do personagem mais conhecido da humanidade permanece um mistério, inclusive para os bilhões de pessoas que o admiram. Tanto as universidades como as religiões falharam em não estudar o homem mais inteligente da história.', '8543104351', 3, '272'),
(7, 'O corvo e outras histórias', 'Edgar Alan Poe', 'Horror, ficção', 'ONDE O HORROR SE MANIFESTA? Para Edgar Allan Poe, se manifesta na morte em suas mais diversas facetas. Poe tematiza o que de mais tenebroso a precede: a ira, a tortura, a vingança, o engano, a ganância. Toda essa aura sepulcral perpassa as obras selecionadas para esta edição em cada dura, com fitilho e ilustrações originais de Gustave Doré. Da tradução do poeta português, Fernando Pessoa, para o cadenciado poema “O corvo”, até a sufocante e angustiante atmosfera da residência do conto “A queda da casa de Usher”, passando ainda pela presença do primeiro detetive criminal na história da literatura em “Os assassinatos da Rua Morgue”, todas essas obras, de alguma forma, cedem morbidamente à envergadura de Poe e convergem, submissas, ao gênio macabro de seu criador e mestre do terror.', '6555791179', 2, '176');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `Matricula` varchar(50) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Tipo` varchar(50) DEFAULT NULL,
  `Categoria` varchar(50) DEFAULT NULL,
  `EmailId` varchar(50) DEFAULT NULL,
  `Telefone` bigint(11) DEFAULT NULL,
  `Senha` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`Matricula`, `Nome`, `Tipo`, `Categoria`, `EmailId`, `Telefone`, `Senha`) VALUES
('2020123', 'admin', 'Admin', NULL, 'admin@gmail.com', 912345678, 'admin123'),
('20201893030013', 'Maria de Souza', 'Usuario', 'AL', 'maria_s@gmail.com', 987654573, 'aluno001'),
('20202345', 'José Silva', 'Bibliotecario', 'FUNC', 'jose_s@gmail.com', 987653456, 'biblio123'),
('2020987623', 'João C.', 'Usuario', 'PROF', 'joaoC@gmail.com', 987623456, 'prof001');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acervo`
--
ALTER TABLE `acervo`
  ADD PRIMARY KEY (`ItemId`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Matricula`),
  ADD UNIQUE KEY `EmailId` (`EmailId`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acervo`
--
ALTER TABLE `acervo`
  MODIFY `ItemId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
