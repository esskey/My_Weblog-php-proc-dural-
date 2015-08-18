-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 21 Décembre 2014 à 03:41
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `web_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog_articles`
--

CREATE TABLE IF NOT EXISTS `blog_articles` (
  `id_articles` int(11) NOT NULL AUTO_INCREMENT,
  `id_membres` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contents` longtext NOT NULL,
  `tags` text NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_modification` datetime NOT NULL,
  PRIMARY KEY (`id_articles`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `blog_articles`
--

INSERT INTO `blog_articles` (`id_articles`, `id_membres`, `titre`, `contents`, `tags`, `date_creation`, `date_modification`) VALUES
(1, 1, 'LE PREMIER ARTICLE', 'Salut a tous je suis donc le premier blogger a laisser un article sur ce blog !! C''est gÃ©niale .. aurai-je droit a une recompense ?? ', 'prims, blog, nolie, congratulation', '2014-12-21 01:42:38', '0000-00-00 00:00:00'),
(2, 1, 'Nous ne sommes pas tous pareilles ...', 'Chacun a sa vision des choses . Seulement respecter le choix de chacun c''est le plus important pour moi !! Nâ€™Ãªtes vous pas d''accord avec moi ???', 'Noracisme, tolÃ©rance, respect, friends', '2014-12-21 01:44:53', '0000-00-00 00:00:00'),
(3, 2, 'Hello , NUMBER 2 =D', 'JE SUIS DANS LE TOP 5 DES PREMIER MEMBRES DE CE BLOGGGG !! #HANNA', 'hanna, montana, star, film, movie', '2014-12-21 01:47:32', '0000-00-00 00:00:00'),
(4, 2, 'WHATTTTT ???? ', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L''avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme ''Du texte. Du texte. Du texte.'' est qu''il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour ''Lorem Ipsum'' vous conduira vers de nombreux sites qui n''en sont encore qu''Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d''y rajouter de petits clins d''oeil, voire des phrases embarassantes).', 'voiture , violent, fast', '2014-12-21 01:48:24', '0000-00-00 00:00:00'),
(5, 3, 'La vida loca !!', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 'loca, fast, voiture, ', '2014-12-21 02:58:22', '0000-00-00 00:00:00'),
(6, 1, 'logo', '<img src="logo.png" />', 'image', '2014-12-21 03:06:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `blog_commentaires`
--

CREATE TABLE IF NOT EXISTS `blog_commentaires` (
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `id_membres` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `commentaires` text NOT NULL,
  `date_commentaires` datetime NOT NULL,
  PRIMARY KEY (`id_com`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `blog_commentaires`
--

INSERT INTO `blog_commentaires` (`id_com`, `id_article`, `id_membres`, `pseudo`, `commentaires`, `date_commentaires`) VALUES
(1, 2, 2, '', 'je suis completement daccord avec ce que tu dis @ess_key =)', '2014-12-21 01:49:22'),
(2, 4, 0, 'snake22', 'Sur quelle site a tu choper ce paragraphe @hanna stp ?', '2014-12-21 01:55:20'),
(3, 5, 0, 'georgekric', 'nice !! =S ... ', '2014-12-21 03:00:02'),
(4, 3, 0, 'georgekric', 'et moi dans le top 10 !!!', '2014-12-21 03:00:50'),
(5, 5, 2, '', 'je n''ai rien compris !!!!! ', '2014-12-21 03:01:17'),
(6, 2, 2, '', '???? ', '2014-12-21 03:01:31'),
(7, 5, 1, '', 'tu n''est pas la seule @hanna_montana', '2014-12-21 03:03:10'),
(8, 2, 1, '', 'je suis la je suis la tkt pas', '2014-12-21 03:03:30'),
(9, 3, 1, '', 'on s''en fou !! ', '2014-12-21 03:04:34');

-- --------------------------------------------------------

--
-- Structure de la table `blog_membres`
--

CREATE TABLE IF NOT EXISTS `blog_membres` (
  `id_membres` int(11) NOT NULL AUTO_INCREMENT,
  `admin` int(11) NOT NULL DEFAULT '0',
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adress` text NOT NULL,
  `date_naissance` date NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  `suspension` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_membres`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `blog_membres`
--

INSERT INTO `blog_membres` (`id_membres`, `admin`, `pseudo`, `pass`, `email`, `nom`, `prenom`, `adress`, `date_naissance`, `sexe`, `date_inscription`, `suspension`) VALUES
(1, 1, 'ess_key', 'ab286a4b61613f89fadf7a8aab71e12b0688b6e1', 'm.nair@live.fr', 'Mouhoussoune', 'Nair', '7 Rue des blanchisseur', '1994-02-10', 'homme', '2014-12-21', 1),
(2, 0, 'hanna_montana', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'hanna223@live.fr', 'Montana', 'Hanna', '21 RUE DE LYSLI BOURATRE', '1990-12-08', 'femme', '2014-12-21', 1),
(3, 0, 'maxmic', 'd10af466eca770ad5e129ca13a491a738fb29032', 'maxmic22@epitech.eu', 'Miclot', 'Maxime', '10 RUE COURS DOR', '1989-12-12', 'homme', '2014-12-21', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
