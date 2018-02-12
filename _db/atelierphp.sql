-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 16 Avril 2015 à 18:27
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `atelierphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `IdArticle` int(11) NOT NULL AUTO_INCREMENT,
  `TitleArticle` varchar(200) NOT NULL,
  `IntroArticle` text NOT NULL,
  `ContentArticle` text NOT NULL,
  PRIMARY KEY (`IdArticle`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`IdArticle`, `TitleArticle`, `IntroArticle`, `ContentArticle`) VALUES
(1, 'Premier article', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in sem non eros elementum porta. Donec porttitor, dui et tincidunt finibus, mauris mi mattis risus, ut euismod ex velit sed metus. ', 'Ut facilisis mi vestibulum vehicula dictum. Donec rhoncus tortor lorem, a volutpat purus cursus eget. In aliquet bibendum ultricies. Quisque commodo nulla a arcu sodales, sed facilisis turpis semper. Aliquam at velit congue, hendrerit erat non, interdum dolor. Vivamus posuere vestibulum urna eu pellentesque. Donec malesuada, tortor non iaculis tincidunt, nulla mauris ornare lorem, in efficitur sapien odio et ligula. Sed non ligula neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tincidunt dui quam, ac semper sapien scelerisque id. In non blandit est, sit amet aliquam sapien. Donec a pretium erat. Nunc tempor turpis ligula, et finibus lectus vestibulum a.'),
(2, 'Second article', 'Morbi porta interdum ligula quis sollicitudin. Vivamus nec ligula auctor massa fermentum ultrices. Vestibulum at semper sem. Phasellus sollicitudin placerat sollicitudin. ', 'Suspendisse vitae odio bibendum, rutrum lorem vel, tincidunt nisi. Maecenas vitae metus pretium, aliquet mi in, faucibus turpis. Donec tristique tempor nisl sed pulvinar. Pellentesque a malesuada turpis. Pellentesque fermentum eget augue at aliquet. Fusce maximus quam lacus, et tincidunt dui fringilla in. Aliquam erat volutpat.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
