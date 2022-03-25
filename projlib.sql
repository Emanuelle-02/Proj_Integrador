-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Mar-2022 às 17:23
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.3.7

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
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `data_emprestimo` date NOT NULL,
  `data_devolucao` date NOT NULL,
  `status` enum('aprovado','renovado','aguardando','rejeitado','renovando','devolvendo','finalizado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aguardando',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `emprestimo`
--

INSERT INTO `emprestimo` (`id`, `user_id`, `book_id`, `data_emprestimo`, `data_devolucao`, `status`, `created_at`, `updated_at`) VALUES
(23, 54, 2, '2022-03-24', '2022-04-02', 'devolvendo', '2022-03-24 21:11:57', '2022-03-25 17:18:08'),
(35, 60, 20, '2022-03-25', '2022-04-01', 'aprovado', '2022-03-25 04:57:00', '2022-03-25 14:29:24'),
(36, 54, 20, '2022-03-25', '2022-04-02', 'aguardando', '2022-03-25 15:12:14', '2022-03-25 15:12:14'),
(38, 54, 8, '2022-03-25', '2022-04-01', 'renovando', '2022-03-25 15:12:33', '2022-03-25 17:18:15'),
(41, 3, 19, '2022-03-25', '2022-04-02', 'renovado', '2022-03-25 16:23:36', '2022-03-25 16:24:27'),
(45, 3, 15, '2022-03-25', '2022-04-01', 'finalizado', '2022-03-25 16:34:55', '2022-03-25 17:02:12'),
(51, 3, 20, '2022-03-25', '2022-04-02', 'finalizado', '2022-03-25 17:51:30', '2022-03-25 17:52:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(2500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disponibilidade` int(11) NOT NULL,
  `paginas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `titulo`, `autor`, `genero`, `descricao`, `isbn`, `disponibilidade`, `paginas`, `created_at`, `updated_at`) VALUES
(2, 'Arsène Lupin: O Ladrão de Casaca', 'Maurice Leblanc', 'Mistério', 'Arsène Lupin, o ladrão de Casaca é uma coletânea de nove histórias do escritor francês Maurice Leblanc que constituem as primeiras aventuras de Arsène Lupin. O editor da revista francesa Je sais tout encomendou a Maurice uma novela policial, cujo herói fosse para França o que era para a Inglaterra o detetive Sherlock Holmes, de Sir Arthur Conan Doyle. Nasceu assim Arsène Lupin, personagem vivo, audacioso, impertinente, desafiando sem cessar o Inspetor Ganimard, arrastando corações atrás de si, zombando das posições conquistadas e ridicularizando os burgueses, socorrendo os fracos, Arsène Lupin é um Robin Hood da Belle Époque. Nessa edição especial em capa dura, o leitor encontrará a versão integral do texto, traduzido diretamente do francês.', '6555790687', 5, '320', '2022-03-16 02:15:39', '2022-03-25 01:04:49'),
(5, 'E não sobrou nenhum', 'Agatha Christie', 'Suspense, Mistério', 'Na ilha do Soldado, antiga propriedade de um milionário norte-americano, dez pessoas sem nenhuma ligação aparente são confrontadas por uma voz misteriosa com fatos marcantes de seus passados. Convidados pelo misterioso mr. Owen, nenhum dos presentes tem muita certeza de por que estão ali, a despeito de conjecturas pouco convincentes que os leva a crer que passariam um agradável período de descanso em mordomia. Entretanto, já na primeira noite, o mistério e o suspense se abatem sobre eles e, num instante, todos são suspeitos, todos são vítimas e todos são culpados. É neste clima de tensão e desconforto que as mortes inexplicáveis começam e, sem comunicação com o continente devido a uma forte tempestade, a estadia transforma-se em um pesadelo. Todos se perguntam: quem é o misterioso anfitrião, mr. Owen? Existe mais alguém na ilha? O assassino pode ser um dos convidados? Que mente ardilosa teria preparado um crime tão complexo? E, sobretudo, por quê? São essas e outras perguntas que o leitor será desafiado a resolver neste fabuloso romance de Agatha Christie, que envolve os espíritos mais perspicazes num complexo emaranhado de situações, lembranças e acusações na busca deste sagaz assassino. Medo, confinamento e angústia: que o leitor descubra por si mesmo porque E não sobrou nenhum foi eleito o melhor romance policial de todos os tempos.', '8525057010', 7, '400', '2022-03-25 01:09:07', '2022-03-25 01:09:07'),
(6, 'O guia do mochileiro das galáxias – Livro 1', 'Douglas Adams', 'Ficção', 'NÃO ENTRE EM PÂNICO. \r\nArthur Dent já estava tendo um dia péssimo antes mesmo de a Terra ser demolida para abrir espaço para uma via expressa hiperespacial.\r\nE depois disso as coisas ficaram muito, muito piores. Com apenas uma toalha, um peixinho amarelo e um livro, Arthur vai ser obrigado a navegar por um universo hostil na companhia de alienígenas pouco confiáveis e viver as mais estranhas aventuras. Sua sorte é que o livro em questão é O Guia do Mochileiro das Galáxias...', '9788599296578', 3, '208', '2022-03-25 01:12:33', '2022-03-25 01:12:33'),
(7, 'O labirinto do Fauno', 'Guillermo Del Toro, Cornelia Funke', 'Fantasia, Horror, Ficção-Científica', 'No ano de 1944, Ofélia e a mãe cruzam uma estrada de terra que corta uma floresta longínqua ao norte da Espanha, um lugar que guarda histórias já esquecidas pelos homens. O novo lar é um moinho de vento tomado pela escuridão e pela crueldade do capitão Vidal e seus soldados, dispostos a tudo para exterminar os rebeldes que se escondem na mata. Mas o que eles não sabem é que a floresta que tanto odeiam também abriga criaturas mágicas e poderosas, habitantes de um reino subterrâneo repleto de encantos e horrores, súditos em busca de sua princesa há muito perdida. Uma princesa que, segundo os sussurros das árvores, finalmente retornou ao lar.', '8551005197', 1, '320', '2022-03-25 01:14:20', '2022-03-25 01:14:20'),
(8, 'Não conte a ninguém', 'Harlan Coben', 'Thriller, Suspense', 'Enquanto comemoravam o aniversário de seu primeiro beijo, o Dr. David Beck e sua esposa, Elizabeth, sofreram um terrível ataque. Ele foi golpeado e caiu no lago, inconsciente. Ela foi raptada e brutalmente assassinada por um serial killer.\r\nO caso volta à tona oito anos depois, quando a polícia encontra dois corpos enterrados perto do local do crime, junto com o taco de beisebol usado para nocautear David. Ao mesmo tempo, o médico recebe um misterioso e-mail que aparentemente só pode ter sido enviado por sua esposa.\r\nEsses acontecimentos fazem ressurgir inúmeras perguntas sem resposta: como David conseguiu sair do lago? Elizabeth está viva? Por que ela demorou tanto para entrar em contato com o marido?Na mira do FBI como principal suspeito da morte da esposa e caçado por um perigosíssimo assassino de aluguel, David só conta com o apoio de sua melhor amiga, da sua advogada e de um traficante de drogas para descobrir toda a verdade e provar sua inocência', '8580419689', 1, '256', '2022-03-25 02:47:26', '2022-03-25 17:17:18'),
(9, 'O homem mais inteligente da história', 'Augusto Cury', 'Ficção', 'A épica jornada de Marco Polo, um cientista ateu, para desvendar a fascinante mente de Jesus. O psiquiatra Marco Polo é um cientista respeitadíssimo, especialista no funcionamento da mente e autor do primeiro programa mundial de gestão da emoção. Quando vai a Jerusalém participar de uma reunião na ONU, é desafiado a estudar a inteligência do homem mais famoso da história: Jesus. Mas ele é um dos maiores ateus da atualidade e se recusa a fazê-lo. Todavia, a plateia de intelectuais o instiga a realizar essa empreitada. Depois de muita resistência, Marco Polo aceita o desafio. Monta uma mesa-redonda composta de brilhantes profissionais para analisar a mente de Jesus sob os ângulos da ciência e não da religião. Ele parte em uma jornada épica para saber se Jesus era um mestre em ter autocontrole, gerir sua emoção, trabalhar perdas e frustrações, libertar sua criatividade, contemplar o belo e formar pensadores. Marco Polo esperava encontrar um homem comum, sem grandes habilidades intelectuais, mas pouco a pouco fica abalado e conclui que a mente do personagem mais conhecido da humanidade permanece um mistério, inclusive para os bilhões de pessoas que o admiram. Tanto as universidades como as religiões falharam em não estudar o homem mais inteligente da história.', '8543104351', 3, '272', '2022-03-25 02:49:25', '2022-03-25 02:49:25'),
(10, 'O corvo e outras histórias', 'Edgar Alan Poe', 'Horror, ficção', 'ONDE O HORROR SE MANIFESTA? Para Edgar Allan Poe, se manifesta na morte em suas mais diversas facetas. Poe tematiza o que de mais tenebroso a precede: a ira, a tortura, a vingança, o engano, a ganância. Toda essa aura sepulcral perpassa as obras selecionadas para esta edição em cada dura, com fitilho e ilustrações originais de Gustave Doré. Da tradução do poeta português, Fernando Pessoa, para o cadenciado poema “O corvo”, até a sufocante e angustiante atmosfera da residência do conto “A queda da casa de Usher”, passando ainda pela presença do primeiro detetive criminal na história da literatura em “Os assassinatos da Rua Morgue”, todas essas obras, de alguma forma, cedem morbidamente à envergadura de Poe e convergem, submissas, ao gênio macabro de seu criador e mestre do terror.', '6555791179', 2, '176', '2022-03-25 02:50:38', '2022-03-25 02:50:38'),
(11, 'O Diário de Anne Frank', 'Anne Frank', 'Biografia', 'É a história real de uma garota judia de 13 anos que ficou escondida com a família durante a ocupação nazista da Holanda. O nome dela era Annelies Marie Frank, nasceu em 12 de junho de 1929 em Frankfurt, na Alemanha, e morreu em um campo de concentração, pouco antes do fim da Segunda Guerra Mundial, em 1945. Foi escondida, no último andar de um prédio, que Anne Frank escreveu durante mais de 2 anos em dos registros mais detalhados do dia a dia daquela fase em que os nazistas, liderados por Hitler, espalharam o horror entre seus perseguidos.', '6550970407', 4, '244', '2022-03-25 02:54:23', '2022-03-25 17:07:03'),
(12, 'Orgulho e preconceito', 'Jane Austen', 'Romance', 'A história de Orgulho e Preconceito gira em torno das cinco irmãs Bennet, que viviam na área rural do interior da Inglaterra, no século XVIII. Aborda a questão da sucessão em uma família sem homens, dentro de uma sociedade patriarcal, onde o casamento era fundamental para as mulheres. Assim, quando um homem rico e solteiro se muda para os arredores, a vida pacata da família entra em ebulição.', '6550970431', 3, '288', '2022-03-25 02:55:54', '2022-03-25 02:55:54'),
(13, 'Drácula', 'Bram Stoker', 'Romance, Terror', 'Drácula é um clássico da literatura de terror e apresenta por meio de cartas, diários e notícias os ataques do vampiro Conde Drácula a moradores de Londres e da Transilvânia. O romance epistolar marcou o gênero e, mesmo não sendo a primeira obra a retratar esse mito literário, definiu o que conhecemos hoje como vampiro, influenciando a literatura, cinema e teatro.', '6555520000', 2, '368', '2022-03-25 02:57:44', '2022-03-25 02:57:44'),
(15, 'Viagem ao centro da Terra', 'Júlio Verne', 'Aventura e Ficção Científica', 'O professor Lidenbrock consegue decifrar um enigma do pergaminho de um cientista do século XII e se junta ao seu sobrinho, o jovem Áxel, para checar a possibilidade de chegar ao centro da Terra seguindo o relato decifrado.', '8594318154', 3, '304', '2022-03-25 02:59:13', '2022-03-25 17:02:12'),
(16, 'O homem invisível', 'H. G. Wells', 'Ficção Científica', 'A pacata Iping recebe um estranho visitante acompanhado de seu laboratório portátil. Ele se aloja na hospedaria da cidade e pede para não ser incomodado, despertando a curiosidade dos que o atendem. Uma onda de roubos na cidade faz os habitantes levantarem suspeitas contra o forasteiro misterioso que está sempre coberto da cabeça aos pés.O homem invisível é um clássico da ficção científica,que combina humor e questionamentos sobre a sociedade e solidão', '6550970032', 2, '176', '2022-03-25 03:01:35', '2022-03-25 03:01:35'),
(19, 'Assassinato no Expresso do Oriente', 'Agatha Christie', 'Suspense, Mistério', 'Em meio a uma viagem, Hercule Poirot é surpreendido por um telegrama solicitando seu retorno a Londres. Então, o famoso detetive belga embarca no Expresso do Oriente, que está inesperadamente cheio para aquela época do ano. Pouco tempo após a meia-noite, o excesso de neve nos trilhos obriga o trem a parar. Na manhã seguinte, o corpo de um dos passageiros é encontrado, golpeado por múltiplas facadas. Com os passageiros isolados por conta da neve, e tendo um assassino entre eles, a única solução é que Poirot inicie uma investigação para descobrir quem é o criminoso ― antes que se faça mais uma vítima.', '8595086788', 4, '240', '2022-03-25 03:20:37', '2022-03-25 16:23:55'),
(20, 'Um estudo em Vermelho', 'Arthur Conan Doyle', 'Suspense, Mistério', 'Publicado originalmente em 1887, Um estudo em vermelho chegou a ser considerado uma espécie de \"livro do Gênesis\" para os casos de Sherlock Holmes, pois marca não só a primeira aparição pública do detetive mais popular da literatura universal como o primeiro encontro entre Holmes e Watson. Ao buscar conhecer melhor seu novo amigo, em pouco tempo Watson vê-se envolvido numa história sinistra de vingança e assassinato...', '8595086788', 2, '240', '2022-03-25 03:23:05', '2022-03-25 18:02:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_03_12_165134_laratrust_setup_tables', 1),
(5, '2022_03_12_120539_create_livros_table', 2),
(8, '2022_03_12_160121_add_matricula_table_users', 3),
(9, '2022_03_12_160354_add_telefone_table_users', 3),
(10, '2022_03_12_160121_create_emprestimo_table', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create-users', 'Create Users', 'Create Users', '2022-03-12 20:33:59', '2022-03-12 20:33:59'),
(2, 'read-users', 'Read Users', 'Read Users', '2022-03-12 20:33:59', '2022-03-12 20:33:59'),
(3, 'update-users', 'Update Users', 'Update Users', '2022-03-12 20:33:59', '2022-03-12 20:33:59'),
(4, 'delete-users', 'Delete Users', 'Delete Users', '2022-03-12 20:33:59', '2022-03-12 20:33:59'),
(5, 'create-acl', 'Create Acl', 'Create Acl', '2022-03-12 20:33:59', '2022-03-12 20:33:59'),
(6, 'read-acl', 'Read Acl', 'Read Acl', '2022-03-12 20:33:59', '2022-03-12 20:33:59'),
(7, 'update-acl', 'Update Acl', 'Update Acl', '2022-03-12 20:33:59', '2022-03-12 20:33:59'),
(8, 'delete-acl', 'Delete Acl', 'Delete Acl', '2022-03-12 20:33:59', '2022-03-12 20:33:59'),
(9, 'read-profile', 'Read Profile', 'Read Profile', '2022-03-12 20:33:59', '2022-03-12 20:33:59'),
(10, 'update-profile', 'Update Profile', 'Update Profile', '2022-03-12 20:33:59', '2022-03-12 20:33:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'administrador', 'Administrador', 'Administrador', '2022-03-12 20:33:59', '2022-03-12 20:33:59'),
(2, 'bibliotecario', 'Bibliotecario', 'Bibliotecario', '2022-03-12 20:34:00', '2022-03-12 20:34:00'),
(3, 'usuario', 'Usuario', 'Usuario', '2022-03-12 20:34:01', '2022-03-12 20:34:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User'),
(3, 3, 'App\\User'),
(1, 53, 'App\\User'),
(3, 54, 'App\\User'),
(2, 55, 'App\\User'),
(2, 56, 'App\\User'),
(3, 57, 'App\\User'),
(3, 58, 'App\\User'),
(3, 59, 'App\\User'),
(3, 60, 'App\\User'),
(3, 65, 'App\\User');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matricula` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `matricula`, `telefone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'administrador@app.com', '20203232445465', '(84) 98768-7687', NULL, '$2y$10$rN.dXRKSo7EXOzr8XuLRwur4wHdQCvtLpTjvHI0TDwYzh/3r5Y2zm', '1iYM6nQ73u6OI1XgnSOHzJtaU9aQYXoMVBfRsWOXhtdbHDUg1TQFfQHoU7Na', '2022-03-12 20:34:00', '2022-03-23 16:38:06'),
(2, 'Bibliotecario', 'bibliotecario@app.com', '20208976755453', '(84) 98765-4432', NULL, '$2y$10$dc5UxdE.VJBYJsx4.ei5Q.7fmW5D8FfSi.dZ4fMtkFnx6bK65xtaK', 'J9ibr5WScz2x58zkhc72RRZ4g9ORARuuGmkU8iiEb7mtGLVQNMp05U22MoIo', '2022-03-12 20:34:01', '2022-03-23 16:37:54'),
(3, 'Usuario', 'usuario@app.com', '20205768776876', '(84) 91234-3768', NULL, '$2y$10$qWoUCv6M4NtrdDm/pLRY/eNyWgd94wxtXzPXNV3EAXm7uxRiy.gCi', NULL, '2022-03-12 20:34:01', '2022-03-23 16:37:41'),
(53, 'Administrador_2', 'adm2@gmail.com', '20205456576877', '(84) 91234-4353', NULL, '$2y$10$a/GEgpVYp8mtpQulRglFKOZHrvnE3mKUm8Gxq/m/zTc.u8DnG4cVC', NULL, '2022-03-19 17:37:05', '2022-03-23 16:37:27'),
(54, 'usuario_2', 'usuario_2@gmail.com', '20202343435454', '(84) 91234-3433', NULL, '$2y$10$b/V.mMKm6v/irf.CEKbmguaGL2d/9ZWD1CxIwsApYHwaIJC7Nb9mS', NULL, '2022-03-19 20:24:49', '2022-03-23 16:37:04'),
(55, 'Bibliotecario_2', 'bibliotecario2@gmail.com', '20220989878767', '(88) 92634-4765', NULL, '$2y$10$MXplRP9iBU9YbxqZRn53m.XE0D4ZDut8q9.Ps6.t.dmT2m.dth8Ui', NULL, '2022-03-19 20:32:32', '2022-03-23 16:36:45'),
(56, 'Maria Lima', 'bibliotecario.novo@gmail.com', '20222074969928', '(84) 99754-7892', NULL, '$2y$10$eEcsIkCquEZ6sQ1Fszg9geZUoBNLK2pGaKc8LxIlCdpeeUwuO7sTi', NULL, '2022-03-25 03:32:57', '2022-03-25 03:32:57'),
(57, 'José da Silva', 'jose_n_silva@gmail.com', '2022745089551', '(84) 99539-4637', NULL, '$2y$10$jQQK19/b0w1NXgtVUEdthOZ912lYzKFJDKCRruqEeR5xgjXupNCwe', NULL, '2022-03-25 03:36:12', '2022-03-25 03:36:12'),
(58, 'João Bezerra', 'joao_bezerra.jb@gmail.com', '202273454897566', '(84) 99764-3568', NULL, '$2y$10$v8V7MF6fmh.SBY6kCYMA7OmmRdzBH8Cs1MluNtpbpI8ufMfHj23b6', NULL, '2022-03-25 03:38:51', '2022-03-25 03:38:51'),
(59, 'Maria de Fátima de Souza', 'maria_fatima2022@gmail.com', '202227632445667', '(84) 99656-4324', NULL, '$2y$10$bH.bxrFF9teXgUNtEBp6F.BPqJeCZyGKJFbT1pLcTpFJovD82rS.K', NULL, '2022-03-25 03:50:45', '2022-03-25 03:50:45'),
(60, 'Davi Lucas Ferreira', 'davi_lucas2022@gmail.com', '202289095846486', '(84) 99800-9887', NULL, '$2y$10$4L2OiniUT4hC/eeLKdiTnu8vH0VrldQ8BPKDCXrm6Ttg/6IfIwMwi', NULL, '2022-03-25 03:52:00', '2022-03-25 03:52:00'),
(65, 'outro usuario', 'novo101@gmail.com', '202209808979876', '(84) 98765-4323', NULL, '$2y$10$Zddsnn9HNo0HP0hWGamyPOzaaS56HDuyAiwM4STDSiYu8OL5PRPNe', NULL, '2022-03-25 16:13:24', '2022-03-25 16:13:24');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emprestimo_user_id_foreign` (`user_id`),
  ADD KEY `emprestimo_book_id_foreign` (`book_id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Índices para tabela `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Índices para tabela `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Índices para tabela `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Índices para tabela `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `emprestimo_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `livros` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `emprestimo_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
