
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- Baza danych: `bibliotekarz`

-- --------------------------------------------------------
-- Struktura tabeli `ksiazka` 
CREATE TABLE IF NOT EXISTS `ksiazka` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autor` text NOT NULL, 
  `ilosc` text NOT NULL,
  `obecna_ilosc` text NOT NULL,
  `tytul` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
-- --------------------------------------------------------
-- Struktura tabeli `wypozyczenie`		
CREATE TABLE IF NOT EXISTS `wypozyczenie` (
  `c_id` int(11) NOT NULL,
  `k_id` int(11) NOT NULL,
  `date` text NOT NULL,
  `wartosc` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------
-- Struktura tabeli `czytelnik`
CREATE TABLE IF NOT EXISTS `czytelnik` (
  `id` int(11) NOT NULL,
  `imie_nazwisko` text NOT NULL,
  `adres` text NOT NULL,
  `telefon` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
