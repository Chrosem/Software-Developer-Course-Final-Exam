-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Feb 03. 12:52
-- Kiszolgáló verziója: 10.4.17-MariaDB
-- PHP verzió: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `sswl`
--
CREATE DATABASE IF NOT EXISTS `sswl` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sswl`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `account`
--

CREATE TABLE `account` (
  `id` int(10) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `email` varchar(64) NOT NULL,
  `pwd` varchar(128) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `account`
--

INSERT INTO `account` (`id`, `f_name`, `l_name`, `email`, `pwd`, `reg_date`) VALUES
(1, 'Elek', 'Teszt', 'teszt@gmail.com', '606fa911191ee7ceccdd4f5d9cbc5041c9ef871972cdb395f97fa95d034587ad771c8852fb4f8ff2c46a14c9adcd8fee58f2c1c200eb231044589d5be12feae9', '2021-01-29');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `articles`
--

CREATE TABLE `articles` (
  `id` int(10) NOT NULL,
  `author` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(60) NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `articles`
--

INSERT INTO `articles` (`id`, `author`, `date`, `title`, `content`) VALUES
(1, 'Teszt Elek', '2021-01-29', 'Havi költségvetés készítése', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quam vulputate dignissim suspendisse in est ante in nibh. Enim diam vulputate ut pharetra sit amet. Non enim praesent elementum facilisis. Quis auctor elit sed vulputate mi sit. Venenatis tellus in metus vulputate eu scelerisque felis imperdiet. Eu volutpat odio facilisis mauris sit amet massa vitae tortor. At ultrices mi tempus imperdiet nulla. Est sit amet facilisis magna etiam tempor. Morbi leo urna molestie at elementum eu. Mi proin sed libero enim sed faucibus. Enim praesent elementum facilisis leo vel fringilla est ullamcorper. Faucibus pulvinar elementum integer enim neque volutpat ac tincidunt vitae. Consectetur libero id faucibus nisl tincidunt eget nullam non. Adipiscing elit duis tristique sollicitudin. At tellus at urna condimentum mattis pellentesque id nibh. Quisque sagittis purus sit amet volutpat. Felis eget velit aliquet sagittis id consectetur.\r\n\r\nHabitant morbi tristique senectus et netus et malesuada fames. Diam sollicitudin tempor id eu nisl. Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque. Pretium vulputate sapien nec sagittis aliquam. Sagittis id consectetur purus ut faucibus pulvinar elementum integer enim. Tellus molestie nunc non blandit massa. Diam vel quam elementum pulvinar etiam non quam lacus suspendisse. Facilisi cras fermentum odio eu feugiat pretium nibh. Nibh praesent tristique magna sit. Vehicula ipsum a arcu cursus. Eget aliquet nibh praesent tristique magna sit amet. Ipsum suspendisse ultrices gravida dictum fusce ut placerat. Enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Nulla facilisi etiam dignissim diam quis enim lobortis scelerisque. Adipiscing tristique risus nec feugiat. Nam aliquam sem et tortor consequat id porta nibh venenatis. Viverra suspendisse potenti nullam ac tortor vitae purus. Neque egestas congue quisque egestas. Arcu dictum varius duis at. Etiam tempor orci eu lobortis elementum nibh tellus.\r\n\r\nMi ipsum faucibus vitae aliquet nec. Urna nec tincidunt praesent semper feugiat nibh sed pulvinar proin. Et ligula ullamcorper malesuada proin libero. Libero justo laoreet sit amet cursus sit amet. Nulla posuere sollicitudin aliquam ultrices. Odio euismod lacinia at quis risus sed. Amet massa vitae tortor condimentum lacinia quis vel eros. Pulvinar etiam non quam lacus suspendisse. Nisl purus in mollis nunc sed id semper. Vulputate ut pharetra sit amet. Molestie nunc non blandit massa enim nec. Purus ut faucibus pulvinar elementum integer. Mauris commodo quis imperdiet massa tincidunt. Faucibus in ornare quam viverra. Sit amet consectetur adipiscing elit ut aliquam purus. Cursus sit amet dictum sit amet justo donec enim. Ornare arcu odio ut sem nulla. Odio morbi quis commodo odio. Adipiscing tristique risus nec feugiat in fermentum posuere urna nec.\r\n\r\nNisl purus in mollis nunc sed id semper risus in. Neque convallis a cras semper auctor. Risus ultricies tristique nulla aliquet enim tortor. In mollis nunc sed id semper risus in hendrerit. Velit aliquet sagittis id consectetur purus ut faucibus. Pellentesque dignissim enim sit amet venenatis urna cursus eget nunc. Pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus et. Cras ornare arcu dui vivamus arcu felis bibendum ut tristique. Consequat id porta nibh venenatis cras sed felis. Id volutpat lacus laoreet non.\r\n\r\nDiam donec adipiscing tristique risus nec feugiat in. Tristique nulla aliquet enim tortor at auctor urna nunc id. Elit eget gravida cum sociis natoque. Turpis cursus in hac habitasse platea dictumst quisque sagittis. Viverra accumsan in nisl nisi scelerisque eu ultrices vitae auctor. Pretium nibh ipsum consequat nisl. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Facilisi morbi tempus iaculis urna id volutpat lacus laoreet non. Lectus magna fringilla urna porttitor rhoncus dolor purus non. Ornare lectus sit amet est placerat in. Diam vulputate ut pharetra sit amet aliquam id. Enim nulla aliquet porttitor lacus luctus accumsan tortor posuere. Id volutpat lacus laoreet non curabitur. Mauris augue neque gravida in fermentum et.'),
(2, 'Példa Béla', '2021-01-29', 'Hogyan készíts okos bevásárlólistát', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tincidunt vitae semper quis lectus nulla at. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. Convallis a cras semper auctor neque vitae tempus quam. Felis imperdiet proin fermentum leo. Arcu dictum varius duis at consectetur lorem donec massa. Quis vel eros donec ac odio tempor orci dapibus ultrices. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Egestas fringilla phasellus faucibus scelerisque. Urna nunc id cursus metus aliquam eleifend mi. Id interdum velit laoreet id donec. Sit amet consectetur adipiscing elit duis tristique sollicitudin. Etiam dignissim diam quis enim. Natoque penatibus et magnis dis. Orci nulla pellentesque dignissim enim sit amet. Odio eu feugiat pretium nibh ipsum consequat nisl. Egestas integer eget aliquet nibh. Amet facilisis magna etiam tempor orci eu. Semper risus in hendrerit gravida rutrum. Accumsan sit amet nulla facilisi morbi.\r\n\r\nRutrum tellus pellentesque eu tincidunt tortor aliquam. Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Ipsum a arcu cursus vitae congue mauris rhoncus. Sit amet tellus cras adipiscing. Fermentum iaculis eu non diam phasellus vestibulum lorem. Malesuada fames ac turpis egestas sed tempus urna et. Ultrices gravida dictum fusce ut placerat. Volutpat consequat mauris nunc congue nisi vitae suscipit. Malesuada nunc vel risus commodo viverra maecenas accumsan. Ultricies mi eget mauris pharetra et ultrices neque ornare. Nec ullamcorper sit amet risus nullam eget felis eget. Nisl nisi scelerisque eu ultrices vitae. Justo donec enim diam vulputate ut pharetra sit. Velit aliquet sagittis id consectetur purus ut. Ut placerat orci nulla pellentesque dignissim enim sit. Dictumst quisque sagittis purus sit. Volutpat diam ut venenatis tellus in. Vestibulum lectus mauris ultrices eros in cursus. Faucibus scelerisque eleifend donec pretium vulputate sapien nec sagittis.\r\n\r\nSed ullamcorper morbi tincidunt ornare massa eget egestas. At elementum eu facilisis sed odio morbi quis commodo. Malesuada nunc vel risus commodo viverra maecenas accumsan lacus. Pharetra diam sit amet nisl suscipit adipiscing bibendum est. Aliquam sem fringilla ut morbi tincidunt augue interdum velit euismod. Sed euismod nisi porta lorem mollis aliquam ut porttitor leo. Eget dolor morbi non arcu. Tortor at risus viverra adipiscing. Sed velit dignissim sodales ut eu sem integer vitae justo. Erat nam at lectus urna duis. Morbi tristique senectus et netus et malesuada fames ac turpis. Leo duis ut diam quam nulla porttitor. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Nisi porta lorem mollis aliquam ut.'),
(3, 'Példa Béla', '2021-01-29', 'Idénygyümölcsök - Nyár', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tincidunt vitae semper quis lectus nulla at. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. Convallis a cras semper auctor neque vitae tempus quam. Felis imperdiet proin fermentum leo. Arcu dictum varius duis at consectetur lorem donec massa. Quis vel eros donec ac odio tempor orci dapibus ultrices. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Egestas fringilla phasellus faucibus scelerisque. Urna nunc id cursus metus aliquam eleifend mi. Id interdum velit laoreet id donec. Sit amet consectetur adipiscing elit duis tristique sollicitudin. Etiam dignissim diam quis enim. Natoque penatibus et magnis dis. Orci nulla pellentesque dignissim enim sit amet. Odio eu feugiat pretium nibh ipsum consequat nisl. Egestas integer eget aliquet nibh. Amet facilisis magna etiam tempor orci eu. Semper risus in hendrerit gravida rutrum. Accumsan sit amet nulla facilisi morbi.\r\n\r\nRutrum tellus pellentesque eu tincidunt tortor aliquam. Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Ipsum a arcu cursus vitae congue mauris rhoncus. Sit amet tellus cras adipiscing. Fermentum iaculis eu non diam phasellus vestibulum lorem. Malesuada fames ac turpis egestas sed tempus urna et. Ultrices gravida dictum fusce ut placerat. Volutpat consequat mauris nunc congue nisi vitae suscipit. Malesuada nunc vel risus commodo viverra maecenas accumsan. Ultricies mi eget mauris pharetra et ultrices neque ornare. Nec ullamcorper sit amet risus nullam eget felis eget. Nisl nisi scelerisque eu ultrices vitae. Justo donec enim diam vulputate ut pharetra sit. Velit aliquet sagittis id consectetur purus ut. Ut placerat orci nulla pellentesque dignissim enim sit. Dictumst quisque sagittis purus sit. Volutpat diam ut venenatis tellus in. Vestibulum lectus mauris ultrices eros in cursus. Faucibus scelerisque eleifend donec pretium vulputate sapien nec sagittis.\r\n\r\nSed ullamcorper morbi tincidunt ornare massa eget egestas. At elementum eu facilisis sed odio morbi quis commodo. Malesuada nunc vel risus commodo viverra maecenas accumsan lacus. Pharetra diam sit amet nisl suscipit adipiscing bibendum est. Aliquam sem fringilla ut morbi tincidunt augue interdum velit euismod. Sed euismod nisi porta lorem mollis aliquam ut porttitor leo. Eget dolor morbi non arcu. Tortor at risus viverra adipiscing. Sed velit dignissim sodales ut eu sem integer vitae justo. Erat nam at lectus urna duis. Morbi tristique senectus et netus et malesuada fames ac turpis. Leo duis ut diam quam nulla porttitor. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Nisi porta lorem mollis aliquam ut.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tincidunt vitae semper quis lectus nulla at. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. Convallis a cras semper auctor neque vitae tempus quam. Felis imperdiet proin fermentum leo. Arcu dictum varius duis at consectetur lorem donec massa. Quis vel eros donec ac odio tempor orci dapibus ultrices. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Egestas fringilla phasellus faucibus scelerisque. Urna nunc id cursus metus aliquam eleifend mi. Id interdum velit laoreet id donec. Sit amet consectetur adipiscing elit duis tristique sollicitudin. Etiam dignissim diam quis enim. Natoque penatibus et magnis dis. Orci nulla pellentesque dignissim enim sit amet. Odio eu feugiat pretium nibh ipsum consequat nisl. Egestas integer eget aliquet nibh. Amet facilisis magna etiam tempor orci eu. Semper risus in hendrerit gravida rutrum. Accumsan sit amet nulla facilisi morbi.\r\n\r\nRutrum tellus pellentesque eu tincidunt tortor aliquam. Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Ipsum a arcu cursus vitae congue mauris rhoncus. Sit amet tellus cras adipiscing. Fermentum iaculis eu non diam phasellus vestibulum lorem. Malesuada fames ac turpis egestas sed tempus urna et. Ultrices gravida dictum fusce ut placerat. Volutpat consequat mauris nunc congue nisi vitae suscipit. Malesuada nunc vel risus commodo viverra maecenas accumsan. Ultricies mi eget mauris pharetra et ultrices neque ornare. Nec ullamcorper sit amet risus nullam eget felis eget. Nisl nisi scelerisque eu ultrices vitae. Justo donec enim diam vulputate ut pharetra sit. Velit aliquet sagittis id consectetur purus ut. Ut placerat orci nulla pellentesque dignissim enim sit. Dictumst quisque sagittis purus sit. Volutpat diam ut venenatis tellus in. Vestibulum lectus mauris ultrices eros in cursus. Faucibus scelerisque eleifend donec pretium vulputate sapien nec sagittis.\r\n\r\nSed ullamcorper morbi tincidunt ornare massa eget egestas. At elementum eu facilisis sed odio morbi quis commodo. Malesuada nunc vel risus commodo viverra maecenas accumsan lacus. Pharetra diam sit amet nisl suscipit adipiscing bibendum est. Aliquam sem fringilla ut morbi tincidunt augue interdum velit euismod. Sed euismod nisi porta lorem mollis aliquam ut porttitor leo. Eget dolor morbi non arcu. Tortor at risus viverra adipiscing. Sed velit dignissim sodales ut eu sem integer vitae justo. Erat nam at lectus urna duis. Morbi tristique senectus et netus et malesuada fames ac turpis. Leo duis ut diam quam nulla porttitor. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Nisi porta lorem mollis aliquam ut.'),
(4, 'John Doe', '2021-01-29', 'Energiatakarékos otthon', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tincidunt vitae semper quis lectus nulla at. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. Convallis a cras semper auctor neque vitae tempus quam. Felis imperdiet proin fermentum leo. Arcu dictum varius duis at consectetur lorem donec massa. Quis vel eros donec ac odio tempor orci dapibus ultrices. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Egestas fringilla phasellus faucibus scelerisque. Urna nunc id cursus metus aliquam eleifend mi. Id interdum velit laoreet id donec. Sit amet consectetur adipiscing elit duis tristique sollicitudin. Etiam dignissim diam quis enim. Natoque penatibus et magnis dis. Orci nulla pellentesque dignissim enim sit amet. Odio eu feugiat pretium nibh ipsum consequat nisl. Egestas integer eget aliquet nibh. Amet facilisis magna etiam tempor orci eu. Semper risus in hendrerit gravida rutrum. Accumsan sit amet nulla facilisi morbi.\r\n\r\nRutrum tellus pellentesque eu tincidunt tortor aliquam. Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Ipsum a arcu cursus vitae congue mauris rhoncus. Sit amet tellus cras adipiscing. Fermentum iaculis eu non diam phasellus vestibulum lorem. Malesuada fames ac turpis egestas sed tempus urna et. Ultrices gravida dictum fusce ut placerat. Volutpat consequat mauris nunc congue nisi vitae suscipit. Malesuada nunc vel risus commodo viverra maecenas accumsan. Ultricies mi eget mauris pharetra et ultrices neque ornare. Nec ullamcorper sit amet risus nullam eget felis eget. Nisl nisi scelerisque eu ultrices vitae. Justo donec enim diam vulputate ut pharetra sit. Velit aliquet sagittis id consectetur purus ut. Ut placerat orci nulla pellentesque dignissim enim sit. Dictumst quisque sagittis purus sit. Volutpat diam ut venenatis tellus in. Vestibulum lectus mauris ultrices eros in cursus. Faucibus scelerisque eleifend donec pretium vulputate sapien nec sagittis.\r\n\r\nSed ullamcorper morbi tincidunt ornare massa eget egestas. At elementum eu facilisis sed odio morbi quis commodo. Malesuada nunc vel risus commodo viverra maecenas accumsan lacus. Pharetra diam sit amet nisl suscipit adipiscing bibendum est. Aliquam sem fringilla ut morbi tincidunt augue interdum velit euismod. Sed euismod nisi porta lorem mollis aliquam ut porttitor leo. Eget dolor morbi non arcu. Tortor at risus viverra adipiscing. Sed velit dignissim sodales ut eu sem integer vitae justo. Erat nam at lectus urna duis. Morbi tristique senectus et netus et malesuada fames ac turpis. Leo duis ut diam quam nulla porttitor. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Nisi porta lorem mollis aliquam ut.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tincidunt vitae semper quis lectus nulla at. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. Convallis a cras semper auctor neque vitae tempus quam. Felis imperdiet proin fermentum leo. Arcu dictum varius duis at consectetur lorem donec massa. Quis vel eros donec ac odio tempor orci dapibus ultrices. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Egestas fringilla phasellus faucibus scelerisque. Urna nunc id cursus metus aliquam eleifend mi. Id interdum velit laoreet id donec. Sit amet consectetur adipiscing elit duis tristique sollicitudin. Etiam dignissim diam quis enim. Natoque penatibus et magnis dis. Orci nulla pellentesque dignissim enim sit amet. Odio eu feugiat pretium nibh ipsum consequat nisl. Egestas integer eget aliquet nibh. Amet facilisis magna etiam tempor orci eu. Semper risus in hendrerit gravida rutrum. Accumsan sit amet nulla facilisi morbi.\r\n\r\nRutrum tellus pellentesque eu tincidunt tortor aliquam. Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Ipsum a arcu cursus vitae congue mauris rhoncus. Sit amet tellus cras adipiscing. Fermentum iaculis eu non diam phasellus vestibulum lorem. Malesuada fames ac turpis egestas sed tempus urna et. Ultrices gravida dictum fusce ut placerat. Volutpat consequat mauris nunc congue nisi vitae suscipit. Malesuada nunc vel risus commodo viverra maecenas accumsan. Ultricies mi eget mauris pharetra et ultrices neque ornare. Nec ullamcorper sit amet risus nullam eget felis eget. Nisl nisi scelerisque eu ultrices vitae. Justo donec enim diam vulputate ut pharetra sit. Velit aliquet sagittis id consectetur purus ut. Ut placerat orci nulla pellentesque dignissim enim sit. Dictumst quisque sagittis purus sit. Volutpat diam ut venenatis tellus in. Vestibulum lectus mauris ultrices eros in cursus. Faucibus scelerisque eleifend donec pretium vulputate sapien nec sagittis.\r\n\r\nSed ullamcorper morbi tincidunt ornare massa eget egestas. At elementum eu facilisis sed odio morbi quis commodo. Malesuada nunc vel risus commodo viverra maecenas accumsan lacus. Pharetra diam sit amet nisl suscipit adipiscing bibendum est. Aliquam sem fringilla ut morbi tincidunt augue interdum velit euismod. Sed euismod nisi porta lorem mollis aliquam ut porttitor leo. Eget dolor morbi non arcu. Tortor at risus viverra adipiscing. Sed velit dignissim sodales ut eu sem integer vitae justo. Erat nam at lectus urna duis. Morbi tristique senectus et netus et malesuada fames ac turpis. Leo duis ut diam quam nulla porttitor. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Nisi porta lorem mollis aliquam ut.'),
(5, 'John Doe', '2021-01-29', 'Klíma fogyasztása lakásban', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tincidunt vitae semper quis lectus nulla at. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. Convallis a cras semper auctor neque vitae tempus quam. Felis imperdiet proin fermentum leo. Arcu dictum varius duis at consectetur lorem donec massa. Quis vel eros donec ac odio tempor orci dapibus ultrices. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Egestas fringilla phasellus faucibus scelerisque. Urna nunc id cursus metus aliquam eleifend mi. Id interdum velit laoreet id donec. Sit amet consectetur adipiscing elit duis tristique sollicitudin. Etiam dignissim diam quis enim. Natoque penatibus et magnis dis. Orci nulla pellentesque dignissim enim sit amet. Odio eu feugiat pretium nibh ipsum consequat nisl. Egestas integer eget aliquet nibh. Amet facilisis magna etiam tempor orci eu. Semper risus in hendrerit gravida rutrum. Accumsan sit amet nulla facilisi morbi.\r\n\r\nRutrum tellus pellentesque eu tincidunt tortor aliquam. Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Ipsum a arcu cursus vitae congue mauris rhoncus. Sit amet tellus cras adipiscing. Fermentum iaculis eu non diam phasellus vestibulum lorem. Malesuada fames ac turpis egestas sed tempus urna et. Ultrices gravida dictum fusce ut placerat. Volutpat consequat mauris nunc congue nisi vitae suscipit. Malesuada nunc vel risus commodo viverra maecenas accumsan. Ultricies mi eget mauris pharetra et ultrices neque ornare. Nec ullamcorper sit amet risus nullam eget felis eget. Nisl nisi scelerisque eu ultrices vitae. Justo donec enim diam vulputate ut pharetra sit. Velit aliquet sagittis id consectetur purus ut. Ut placerat orci nulla pellentesque dignissim enim sit. Dictumst quisque sagittis purus sit. Volutpat diam ut venenatis tellus in. Vestibulum lectus mauris ultrices eros in cursus. Faucibus scelerisque eleifend donec pretium vulputate sapien nec sagittis.\r\n\r\nSed ullamcorper morbi tincidunt ornare massa eget egestas. At elementum eu facilisis sed odio morbi quis commodo. Malesuada nunc vel risus commodo viverra maecenas accumsan lacus. Pharetra diam sit amet nisl suscipit adipiscing bibendum est. Aliquam sem fringilla ut morbi tincidunt augue interdum velit euismod. Sed euismod nisi porta lorem mollis aliquam ut porttitor leo. Eget dolor morbi non arcu. Tortor at risus viverra adipiscing. Sed velit dignissim sodales ut eu sem integer vitae justo. Erat nam at lectus urna duis. Morbi tristique senectus et netus et malesuada fames ac turpis. Leo duis ut diam quam nulla porttitor. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Nisi porta lorem mollis aliquam ut.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tincidunt vitae semper quis lectus nulla at. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. Convallis a cras semper auctor neque vitae tempus quam. Felis imperdiet proin fermentum leo. Arcu dictum varius duis at consectetur lorem donec massa. Quis vel eros donec ac odio tempor orci dapibus ultrices. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Egestas fringilla phasellus faucibus scelerisque. Urna nunc id cursus metus aliquam eleifend mi. Id interdum velit laoreet id donec. Sit amet consectetur adipiscing elit duis tristique sollicitudin. Etiam dignissim diam quis enim. Natoque penatibus et magnis dis. Orci nulla pellentesque dignissim enim sit amet. Odio eu feugiat pretium nibh ipsum consequat nisl. Egestas integer eget aliquet nibh. Amet facilisis magna etiam tempor orci eu. Semper risus in hendrerit gravida rutrum. Accumsan sit amet nulla facilisi morbi.\r\n\r\nRutrum tellus pellentesque eu tincidunt tortor aliquam. Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Ipsum a arcu cursus vitae congue mauris rhoncus. Sit amet tellus cras adipiscing. Fermentum iaculis eu non diam phasellus vestibulum lorem. Malesuada fames ac turpis egestas sed tempus urna et. Ultrices gravida dictum fusce ut placerat. Volutpat consequat mauris nunc congue nisi vitae suscipit. Malesuada nunc vel risus commodo viverra maecenas accumsan. Ultricies mi eget mauris pharetra et ultrices neque ornare. Nec ullamcorper sit amet risus nullam eget felis eget. Nisl nisi scelerisque eu ultrices vitae. Justo donec enim diam vulputate ut pharetra sit. Velit aliquet sagittis id consectetur purus ut. Ut placerat orci nulla pellentesque dignissim enim sit. Dictumst quisque sagittis purus sit. Volutpat diam ut venenatis tellus in. Vestibulum lectus mauris ultrices eros in cursus. Faucibus scelerisque eleifend donec pretium vulputate sapien nec sagittis.\r\n\r\nSed ullamcorper morbi tincidunt ornare massa eget egestas. At elementum eu facilisis sed odio morbi quis commodo. Malesuada nunc vel risus commodo viverra maecenas accumsan lacus. Pharetra diam sit amet nisl suscipit adipiscing bibendum est. Aliquam sem fringilla ut morbi tincidunt augue interdum velit euismod. Sed euismod nisi porta lorem mollis aliquam ut porttitor leo. Eget dolor morbi non arcu. Tortor at risus viverra adipiscing. Sed velit dignissim sodales ut eu sem integer vitae justo. Erat nam at lectus urna duis. Morbi tristique senectus et netus et malesuada fames ac turpis. Leo duis ut diam quam nulla porttitor. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Nisi porta lorem mollis aliquam ut.'),
(6, 'Példa Béla', '2021-01-29', 'Vásárlás nélküli nap beiktatása a hetedbe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tincidunt vitae semper quis lectus nulla at. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. Convallis a cras semper auctor neque vitae tempus quam. Felis imperdiet proin fermentum leo. Arcu dictum varius duis at consectetur lorem donec massa. Quis vel eros donec ac odio tempor orci dapibus ultrices. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Egestas fringilla phasellus faucibus scelerisque. Urna nunc id cursus metus aliquam eleifend mi. Id interdum velit laoreet id donec. Sit amet consectetur adipiscing elit duis tristique sollicitudin. Etiam dignissim diam quis enim. Natoque penatibus et magnis dis. Orci nulla pellentesque dignissim enim sit amet. Odio eu feugiat pretium nibh ipsum consequat nisl. Egestas integer eget aliquet nibh. Amet facilisis magna etiam tempor orci eu. Semper risus in hendrerit gravida rutrum. Accumsan sit amet nulla facilisi morbi.\r\n\r\nRutrum tellus pellentesque eu tincidunt tortor aliquam. Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Ipsum a arcu cursus vitae congue mauris rhoncus. Sit amet tellus cras adipiscing. Fermentum iaculis eu non diam phasellus vestibulum lorem. Malesuada fames ac turpis egestas sed tempus urna et. Ultrices gravida dictum fusce ut placerat. Volutpat consequat mauris nunc congue nisi vitae suscipit. Malesuada nunc vel risus commodo viverra maecenas accumsan. Ultricies mi eget mauris pharetra et ultrices neque ornare. Nec ullamcorper sit amet risus nullam eget felis eget. Nisl nisi scelerisque eu ultrices vitae. Justo donec enim diam vulputate ut pharetra sit. Velit aliquet sagittis id consectetur purus ut. Ut placerat orci nulla pellentesque dignissim enim sit. Dictumst quisque sagittis purus sit. Volutpat diam ut venenatis tellus in. Vestibulum lectus mauris ultrices eros in cursus. Faucibus scelerisque eleifend donec pretium vulputate sapien nec sagittis.\r\n\r\nSed ullamcorper morbi tincidunt ornare massa eget egestas. At elementum eu facilisis sed odio morbi quis commodo. Malesuada nunc vel risus commodo viverra maecenas accumsan lacus. Pharetra diam sit amet nisl suscipit adipiscing bibendum est. Aliquam sem fringilla ut morbi tincidunt augue interdum velit euismod. Sed euismod nisi porta lorem mollis aliquam ut porttitor leo. Eget dolor morbi non arcu. Tortor at risus viverra adipiscing. Sed velit dignissim sodales ut eu sem integer vitae justo. Erat nam at lectus urna duis. Morbi tristique senectus et netus et malesuada fames ac turpis. Leo duis ut diam quam nulla porttitor. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Nisi porta lorem mollis aliquam ut.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tincidunt vitae semper quis lectus nulla at. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. Convallis a cras semper auctor neque vitae tempus quam. Felis imperdiet proin fermentum leo. Arcu dictum varius duis at consectetur lorem donec massa. Quis vel eros donec ac odio tempor orci dapibus ultrices. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Egestas fringilla phasellus faucibus scelerisque. Urna nunc id cursus metus aliquam eleifend mi. Id interdum velit laoreet id donec. Sit amet consectetur adipiscing elit duis tristique sollicitudin. Etiam dignissim diam quis enim. Natoque penatibus et magnis dis. Orci nulla pellentesque dignissim enim sit amet. Odio eu feugiat pretium nibh ipsum consequat nisl. Egestas integer eget aliquet nibh. Amet facilisis magna etiam tempor orci eu. Semper risus in hendrerit gravida rutrum. Accumsan sit amet nulla facilisi morbi.\r\n\r\nRutrum tellus pellentesque eu tincidunt tortor aliquam. Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Ipsum a arcu cursus vitae congue mauris rhoncus. Sit amet tellus cras adipiscing. Fermentum iaculis eu non diam phasellus vestibulum lorem. Malesuada fames ac turpis egestas sed tempus urna et. Ultrices gravida dictum fusce ut placerat. Volutpat consequat mauris nunc congue nisi vitae suscipit. Malesuada nunc vel risus commodo viverra maecenas accumsan. Ultricies mi eget mauris pharetra et ultrices neque ornare. Nec ullamcorper sit amet risus nullam eget felis eget. Nisl nisi scelerisque eu ultrices vitae. Justo donec enim diam vulputate ut pharetra sit. Velit aliquet sagittis id consectetur purus ut. Ut placerat orci nulla pellentesque dignissim enim sit. Dictumst quisque sagittis purus sit. Volutpat diam ut venenatis tellus in. Vestibulum lectus mauris ultrices eros in cursus. Faucibus scelerisque eleifend donec pretium vulputate sapien nec sagittis.\r\n\r\nSed ullamcorper morbi tincidunt ornare massa eget egestas. At elementum eu facilisis sed odio morbi quis commodo. Malesuada nunc vel risus commodo viverra maecenas accumsan lacus. Pharetra diam sit amet nisl suscipit adipiscing bibendum est. Aliquam sem fringilla ut morbi tincidunt augue interdum velit euismod. Sed euismod nisi porta lorem mollis aliquam ut porttitor leo. Eget dolor morbi non arcu. Tortor at risus viverra adipiscing. Sed velit dignissim sodales ut eu sem integer vitae justo. Erat nam at lectus urna duis. Morbi tristique senectus et netus et malesuada fames ac turpis. Leo duis ut diam quam nulla porttitor. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Nisi porta lorem mollis aliquam ut.'),
(7, 'Példa Béla', '2021-01-29', 'Keresd meg a kilógramm árát, nagy kiszerelés sokszor gazdasá', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tincidunt vitae semper quis lectus nulla at. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. Convallis a cras semper auctor neque vitae tempus quam. Felis imperdiet proin fermentum leo. Arcu dictum varius duis at consectetur lorem donec massa. Quis vel eros donec ac odio tempor orci dapibus ultrices. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Egestas fringilla phasellus faucibus scelerisque. Urna nunc id cursus metus aliquam eleifend mi. Id interdum velit laoreet id donec. Sit amet consectetur adipiscing elit duis tristique sollicitudin. Etiam dignissim diam quis enim. Natoque penatibus et magnis dis. Orci nulla pellentesque dignissim enim sit amet. Odio eu feugiat pretium nibh ipsum consequat nisl. Egestas integer eget aliquet nibh. Amet facilisis magna etiam tempor orci eu. Semper risus in hendrerit gravida rutrum. Accumsan sit amet nulla facilisi morbi.\r\n\r\nRutrum tellus pellentesque eu tincidunt tortor aliquam. Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Ipsum a arcu cursus vitae congue mauris rhoncus. Sit amet tellus cras adipiscing. Fermentum iaculis eu non diam phasellus vestibulum lorem. Malesuada fames ac turpis egestas sed tempus urna et. Ultrices gravida dictum fusce ut placerat. Volutpat consequat mauris nunc congue nisi vitae suscipit. Malesuada nunc vel risus commodo viverra maecenas accumsan. Ultricies mi eget mauris pharetra et ultrices neque ornare. Nec ullamcorper sit amet risus nullam eget felis eget. Nisl nisi scelerisque eu ultrices vitae. Justo donec enim diam vulputate ut pharetra sit. Velit aliquet sagittis id consectetur purus ut. Ut placerat orci nulla pellentesque dignissim enim sit. Dictumst quisque sagittis purus sit. Volutpat diam ut venenatis tellus in. Vestibulum lectus mauris ultrices eros in cursus. Faucibus scelerisque eleifend donec pretium vulputate sapien nec sagittis.\r\n\r\nSed ullamcorper morbi tincidunt ornare massa eget egestas. At elementum eu facilisis sed odio morbi quis commodo. Malesuada nunc vel risus commodo viverra maecenas accumsan lacus. Pharetra diam sit amet nisl suscipit adipiscing bibendum est. Aliquam sem fringilla ut morbi tincidunt augue interdum velit euismod. Sed euismod nisi porta lorem mollis aliquam ut porttitor leo. Eget dolor morbi non arcu. Tortor at risus viverra adipiscing. Sed velit dignissim sodales ut eu sem integer vitae justo. Erat nam at lectus urna duis. Morbi tristique senectus et netus et malesuada fames ac turpis. Leo duis ut diam quam nulla porttitor. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Nisi porta lorem mollis aliquam ut.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tincidunt vitae semper quis lectus nulla at. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. Convallis a cras semper auctor neque vitae tempus quam. Felis imperdiet proin fermentum leo. Arcu dictum varius duis at consectetur lorem donec massa. Quis vel eros donec ac odio tempor orci dapibus ultrices. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Egestas fringilla phasellus faucibus scelerisque. Urna nunc id cursus metus aliquam eleifend mi. Id interdum velit laoreet id donec. Sit amet consectetur adipiscing elit duis tristique sollicitudin. Etiam dignissim diam quis enim. Natoque penatibus et magnis dis. Orci nulla pellentesque dignissim enim sit amet. Odio eu feugiat pretium nibh ipsum consequat nisl. Egestas integer eget aliquet nibh. Amet facilisis magna etiam tempor orci eu. Semper risus in hendrerit gravida rutrum. Accumsan sit amet nulla facilisi morbi.\r\n\r\nSed ullamcorper morbi tincidunt ornare massa eget egestas. At elementum eu facilisis sed odio morbi quis commodo. Malesuada nunc vel risus commodo viverra maecenas accumsan lacus. Pharetra diam sit amet nisl suscipit adipiscing bibendum est. Aliquam sem fringilla ut morbi tincidunt augue interdum velit euismod. Sed euismod nisi porta lorem mollis aliquam ut porttitor leo. Eget dolor morbi non arcu. Tortor at risus viverra adipiscing. Sed velit dignissim sodales ut eu sem integer vitae justo. Erat nam at lectus urna duis. Morbi tristique senectus et netus et malesuada fames ac turpis. Leo duis ut diam quam nulla porttitor. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Nisi porta lorem mollis aliquam ut.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `balance`
--

CREATE TABLE `balance` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `bank` double(13,2) NOT NULL,
  `cash` double(13,2) NOT NULL,
  `up_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `balance`
--

INSERT INTO `balance` (`id`, `user_id`, `bank`, `cash`, `up_date`) VALUES
(1, 1, 965000.00, 100000.00, '2021-02-02');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `banned`
--

CREATE TABLE `banned` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product` varchar(30) NOT NULL,
  `comment` varchar(30) NOT NULL,
  `price` double(13,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `banned`
--

INSERT INTO `banned` (`id`, `user_id`, `product`, `comment`, `price`, `date`) VALUES
(1, 1, 'Kóla', 'Inkább gyülömcslé', 400.00, '2021-01-29');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `categories`
--

CREATE TABLE `categories` (
  `id` tinyint(2) NOT NULL,
  `category` varchar(20) NOT NULL,
  `type` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `categories`
--

INSERT INTO `categories` (`id`, `category`, `type`) VALUES
(1, 'Otthon', '-'),
(2, 'Vásárlás', '-'),
(3, 'Jármű', '-'),
(4, 'Magán', '-'),
(5, 'Egyéb', '-'),
(6, 'Fizetés', '+'),
(7, 'Ajándék', '+'),
(8, 'Vállakozás', '+'),
(9, 'Egyéb', '+'),
(10, 'Számlák', '-');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `events`
--

CREATE TABLE `events` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `event_name` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `comment` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `events`
--

INSERT INTO `events` (`id`, `user_id`, `event_name`, `date`, `comment`) VALUES
(1, 1, 'Születésnap Anya', '2021-01-29', 'Virág'),
(2, 1, 'Nyaralás', '2021-08-31', 'Hawaii'),
(3, 1, 'Születésnpa Apa', '2021-04-15', '??'),
(5, 1, 'Konferencia', '2021-03-23', 'Utazni kell'),
(6, 1, 'Összejövetel', '2021-02-03', 'Nálunk, előtte bevásárolni');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `fixed_transactions`
--

CREATE TABLE `fixed_transactions` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `type` varchar(1) NOT NULL,
  `method` varchar(8) NOT NULL,
  `day` tinyint(2) NOT NULL,
  `comment` varchar(30) NOT NULL,
  `value` double(13,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `fixed_transactions`
--

INSERT INTO `fixed_transactions` (`id`, `user_id`, `category`, `type`, `method`, `day`, `comment`, `value`, `date`) VALUES
(1, 1, 'Otthon', '-', 'Készpénz', 5, 'Rezsi', 100000.00, '2021-01-29'),
(2, 1, 'Fizetés', '+', 'Bank', 10, 'Fizetés', 250000.00, '2021-01-29');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `information`
--

CREATE TABLE `information` (
  `id` int(2) NOT NULL,
  `title` varchar(60) NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `information`
--

INSERT INTO `information` (`id`, `title`, `content`) VALUES
(1, 'Adatvédelmi nyilatkozat', '<h3>A. Bevezetés</h3>\r\n<p>\r\n1.	Nagyon fontos számunkra a weboldalunk látogatói személyes adatainak védelme, és elkötelezettek vagyunk ennek megfelelő biztosítása mellett. Ez az adatvédelmi nyilatkozat tájékoztatást nyújt arról, hogy hogyan kezeljük az Ön személyes adatait.</p><p>\r\n2.	Ha hozzájárul a sütik használatához a jelen adatvédelmi nyilatkozat feltételeinek megfelelően, amikor először látogatja meg weboldalunkat, azzal engedélyezi számunkra a sütik használatát minden egyes alkalommal, amikor Ön meglátogatja weboldalunkat. </p><br>\r\n<h3>B. Forrás</h3>\r\n<p>Ez a dokumentum a SEQ Legal (seqlegal.com) sablonján alapszik. </p><br>\r\n<h3>C. A személyes adatok gyűjtése</h3>\r\n<p>A következő típusú személyes adatokat gyűjthetjük, tárolhatjuk és felhasználhatjuk: </p><p>\r\n1.	a számítógépével kapcsolatos információkat, beleértve az Ön IP-címét, a földrajzi tartózkodási helyét, a böngészője típusát és verzióját, valamint az operációs rendszerét; </p><p>\r\n2.	információkat a weboldalunk meglátogatásáról és annak használatáról, ideértve a küldő hivatkozás adatait, a látogatás hosszát, az oldalmegtekintéseket és a weboldalon a navigáció adatait; </p><p>\r\n3.	a weboldalunkon a regisztrációkor megadott információkat, például az e-mail címét; </p><p>\r\n4.	a weboldalunkon a profil létrehozásakor megadott információkat — például: a neve, profilképe, neme, születésnapja, kapcsolata állapota, érdeklődési körei és hobbijai, oktatási és foglalkoztatási adatai; </p><p>\r\n5.	a weboldalunkon az e-mailes levelezőlistára és/vagy hírleveleinkre feliratkozáskor megadott információkat, például: a neve, e-mail címe; </p><p>\r\n6.	a weboldalunkon a szolgáltatásaink igénybevételekor megadott információkat; </p><p>\r\n7.	a weboldalunk használata közben keletkező információkat, többek között, hogy mikor, milyen gyakran és milyen körülmények között használja weboldalunkat; </p><p>\r\n8.	az Ön által vásárolt szolgáltatásokkal, az Ön által használt szolgáltatásokkal vagy a weboldalunkon keresztül végzett tranzakciókkal kapcsolatos információkat, többek között: a neve, címe, telefonszáma, e-mail címe és a bankkártyája adatai; </p><p>\r\n9.	az interneten való közzététel céljából a weboldalunk számára elküldött információkat, többek között: a felhasználóneve, a profilképei és az üzenetei tartalma; </p><p>\r\n10.	az e-mailben vagy a weboldalunkon keresztül az Ön által elküldött információkat, beleértve azok tartalmát és metaadatait; </p><p>\r\n11.	minden egyéb személyes információt, amelyet elküldött számunkra.\r\nMielőtt valamely másik személy személyes adatait feltárná előttünk, Önnek kötelező az adott személy hozzájárulásával rendelkeznie a személyes adatok megosztását valamint a személyes adatoknak a jelen adatvédelmi nyilatkozat előírásaival összhangban történő feldolgozását illetően. </p><br>\r\n<h3>D. Az Ön személyes adatainak felhasználása</h3>\r\n<p>A weboldalunkon keresztül számunkra elküldött személyes adatokat a jelen adatvédelmi nyilatkozatban vagy a weboldal vonatkozó oldalain meghatározott célokra használjuk fel. Az Ön személyes adatait a következő célokra használhatjuk fel: </p><p>\r\n1.	a weboldalunk és a vállalkozásunk adminisztrálása; </p><p>\r\n2.	a weboldalunk testreszabása az Ön számára; </p><p>\r\n3.	a weboldalunkon található szolgáltatások elérhetővé tétele az Ön számára</p><p>\r\n4.	a weboldalunkon keresztül megvásárolt áruk postázása az Ön részére; </p><p>\r\n5.	a weboldalunkon keresztül megvásárolt szolgáltatások nyújtása az Ön részére; </p><p>\r\n6.	számlák és fizetési emlékeztetők küldése, és Öntől a befizetések begyűjtése; </p><p>\r\n7.	nem marketing célú kereskedelmi kommunikáció küldése az Ön részére; </p><p>\r\n8.	olyan e-mail értesítések küldése Önnek, amelyeket Ön kifejezetten kért; </p><p>\r\n9.	e-mail hírlevelünk küldése Önnek, ha azt igényelte (bármikor értesíthet minket, ha már nem kéri a hírlevelet); </p><p>\r\n10.	üzleti vállalkozásunkkal vagy vállalkozásainkkal illetve gondosan kiválasztott harmadik felek vállalkozásaival kapcsolatos marketingkommunikációk küldése az Ön részére, postai úton vagy – ha ehhez Ön kifejezetten hozzájárult – e-mailben vagy hasonló technológia alkalmazásával (bármikor értesíthet minket, ha már nem kéri a hírlevelet); </p><p>\r\n11.	harmadik felek számára statisztikai információk szolgáltatása felhasználóinkról (azonban ezek a harmadik felek nem azonosíthatnak egyetlen felhasználót sem ezen információk alapján); </p><p>\r\n12.	a weboldalunkkal kapcsolatos, az Ön által vagy az Önről tett tudakozódások és panaszok kezelése; </p><p>\r\n13.	a weboldalunk biztonságának megőrzése és a csalások megelőzése; </p><p>\r\n14.	a weboldalunk használatát szabályozó feltételek betartásának ellenőrzése (ideértve a weboldal privát üzenetküldő szolgáltatásán keresztül küldött privát üzenetek nyomon követését is); valamint</p><p>\r\n15.	egyéb felhasználások. </p><p>\r\nHa Ön személyes információkat küld nekünk a weboldalunkon való közzététel céljából, ezeket az információkat mi közzétesszük és egyéb módon felhasználjuk az Ön által nekünk megadott engedély alapján.\r\nAz Ön adatvédelmi beállításai korlátozhatják az adataira vonatkozóan a közzétételt a weboldalunkon, ezek a beállítások pedig módosíthatók a weboldalon az adatvédelmi beállítási lehetőségek használatával.\r\nAz Ön kifejezett hozzájárulása nélkül nem adjuk át az Ön személyes adatait harmadik feleknek ezen harmadik felek vagy más harmadik felek által folytatott közvetlen marketing céljából. </p><br>\r\n<h3>E. A személyes adatok közzététele</h3><p>\r\nA személyes adatait bármilyen alkalmazottunkkal, tisztségviselőnkkel, biztosító társasággal, szakmai tanácsadókkal, ügynökökkel, beszállítókkal vagy alvállalkozókkal közölhetjük, amennyiben ez ésszerű és szükséges a jelen adatvédelmi nyilatkozatban meghatározott célok biztosításához.\r\nA személyes adatait közölhetjük a cégcsoportunk bármelyik tagjával (azaz leányvállalatainkkal, a holdingtársaságunkkal és annak minden leányvállalataival), amennyiben ez ésszerű és szükséges a jelen adatvédelmi nyilatkozatban meghatározott célok biztosításához.\r\nA személyes adatait közzétehetjük: </p><p>\r\n1.	olyan mértékben, amennyire a törvény ezt megköveteli; </p><p>\r\n2.	a folyamatban lévő vagy jövőbeni bírósági eljárásokkal kapcsolatban; </p><p>\r\n3.	a törvényes jogaink megállapítása, gyakorlása vagy védelme érdekében (többek között: a csalások megelőzése és a hitelkockázat csökkentése céljából történő információszolgáltatás mások számára); </p><p>\r\n4.	az általunk eladott (vagy a jövőben eladott) minden vállalkozás vagy vagyontárgy vevője számára; és</p><p>\r\n5.	bármely olyan személy számára, akinek az esetében ésszerűen feltételezhetjük, hogy bírósághoz vagy más illetékes hatósághoz fordulhat a személyes információ közzététele érdekében, amennyiben ésszerű véleményünk szerint az ilyen bíróság vagy hatóság valószínűleg elrendelné az említett személyes információ közzétételét. </p><p>\r\nA jelen adatvédelmi nyilatkozatban foglalt esetek kivételével az Ön személyes adatait nem adjuk át harmadik feleknek. </p><br>\r\n<h3>F. Nemzetközi adattovábbítás</h3><p>\r\n1.	Az általunk összegyűjtött információkat tárolhatjuk, feldolgozhatjuk és továbbíthatjuk bármely olyan országok között, ahol üzleti tevékenységet folytatunk, annak érdekében, hogy az információkat ezen adatvédelmi nyilatkozatnak megfelelően felhasználhassuk. </p><p>\r\n2.	Az általunk összegyűjtött információkat továbbadhatjuk a következő országoknak, amelyek nem rendelkeznek az Európai Gazdasági Térségben hatályos adatvédelmi törvényekkel egyenértékű törvényekkel: Amerikai Egyesült Államok, Oroszország, Japán, Kína és India. </p><p>\r\n3.	Az Ön által a weboldalunkon közzétett vagy a weboldalunkon közzétételre az Ön által benyújtott személyes adatok az interneten keresztül elérhetők lehetnek az egész világon. Nem akadályozhatjuk meg az ilyen információk mások általi felhasználását vagy az ilyen információkkal történő visszaélést mások által. </p><p>\r\n4.	Ön kifejezetten hozzájárul a személyes adatainak továbbításához a jelen F. szakaszban leírtak szerint. </p><br>\r\n<h3>G. A személyes adatok megőrzése</h3><p>\r\n1.	A jelen G. szakasz tájékoztat az adatmegőrzési irányelveinkről és eljárásainkról, amelyek célja annak biztosítása, hogy a személyes adatok megőrzésére és törlésére vonatkozó jogi kötelezettségeinknek megfelelően járjunk el. </p><p>\r\n2.	A személyes adatokat, amelyeket bármilyen célból vagy célokból feldolgozunk, tilos annál hosszabb ideig megőrizni, mint amennyi ideig szükséges a tárolásuk ehhez a célhoz vagy célokhoz. </p><p>\r\n3.	A G-2. cikkely sérelme nélkül, általában az alábbiakban meghatározott kategóriákba tartozó személyes adatokat töröljük az alábbiakban megadott dátumban/időpontban: </p><p><ul>\r\n1.	a személyes adattípus törlése ekkor történik meg: {DÁTUM/IDŐPONT}; valamint</ul></p><p><ul>\r\n2.	{TOVÁBBI DÁTUMOK/IDŐPONTOK}.</p></ul><p>\r\n4.	A G. szakasz egyéb rendelkezéseinek sérelme nélkül, a személyes adatokat tartalmazó dokumentumokat (beleértve az elektronikus dokumentumokat is) az alábbiaknak megfelelően megőrizzük: </p><p><ul>\r\n1.	olyan mértékben, amennyire a törvény ezt megköveteli; </ul></p><p><ul>\r\n2.	amennyiben a dokumentumok relevánsak lehetnek bármilyen folyamatban lévő vagy jövőbeni bírósági eljárásban; és</ul></p><p><ul>\r\n3.	törvényes jogaink megállapítása, gyakorlása vagy védelme érdekében (többek között: a csalások megelőzése és a hitelkockázat csökkentése céljából történő információszolgáltatás mások számára). </ul></p><br>\r\n<h3>H. Az Ön személyes adatainak biztonsága</h3><p>\r\n1.	Megtesszük a megfelelő technikai és szervezeti óvintézkedéseket annak érdekében, hogy megakadályozzuk a személyes adatai elvesztését, a velük való visszaélést vagy a módosításukat. </p><p>\r\n2.	Minden, az Ön által megadott személyes információt biztonságos (jelszóval és tűzfallal védett) szervereinken tároljuk. </p><p>\r\n3.	A weboldalunkon keresztül lebonyolított összes elektronikus pénzügyi tranzakciót titkosítással védjük. </p><p>\r\n4.	Ön tudomásul veszi, hogy az információ továbbítása az interneten keresztül alapvetően bizonytalan jellegű, és nem garantálhatjuk az interneten keresztül továbbított adatok biztonságát. </p><p>\r\n5.	Ön felelős a weboldalunk eléréséhez használt jelszava bizalmas kezeléséért; nem kérjük el a jelszavát (kivéve, amikor bejelentkezik weboldalunkra).</p><br>\r\n<h3>I. Módosítások</h3><p>\r\nIdőnként frissíthetjük ezt az adatvédelmi nyilatkozatot azáltal, hogy közzétesszük az új verzióját a weboldalunkon. Időnként ellenőrizze ezt az oldalt annak érdekében, hogy megismerje az adatvédelmi nyilatkozat módosításait. Önt az adatvédelmi nyilatkozat változásairól e-mailben vagy a weboldalunkon található privát üzenetküldő rendszeren keresztül értesíthetjük. </p><br>\r\n<h3>J. Az Ön jogai</h3><p>\r\nFelszólíthat minket arra, hogy bocsássunk rendelkezésére minden személyes információt, amely nálunk elérhető Önről; az ilyen információk szolgáltatása a következő feltételek mellett történik: </p><p>\r\n1.	a szükséges díj befizetése ({DÍJ ÖSSZEGE, HA RELEVÁNS}); és</p><p>\r\n2.	az Ön személyazonosságának a megfelelő módon történő igazolása ({ÍRJA ÁT A SZÖVEGET A MEGFELELŐ MÓDON ebből a célból; általában elfogadjuk útlevelének fénymásolatát, amelyet közjegyző hitelesít, közüzemi számla olyan eredeti példányával együtt, amely tartalmazza az Ön jelenlegi lakcímét}).</p><p><br>\r\nA törvény által megengedett mértékben visszatarthatjuk az Ön által kért személyes információkat.<br>\r\nBármikor felszólíthat bennünket arra, hogy marketing célból ne dolgozzuk fel személyes adatait.<br>\r\nA gyakorlatban Ön általában előzőleg kifejezetten egyetért azzal, hogy személyes adatait felhasználhatjuk marketing célokra, vagy pedig lehetőséget biztosítunk az Ön számára azt illetően, hogy visszautasíthassa a személyes adatai marketing célokra történő felhasználását. </p><p><br>\r\n<h3>K. Harmadik felek weboldalai</h3><p>\r\nWeboldalunk hivatkozásokat és részleteket tartalmaz harmadik felek weboldalait illetően. Nem áll módunkban a harmadik felek adatvédelmi irányelveit és gyakorlatait ellenőrizni, valamint azokért nem vagyunk felelősek. </p><br>\r\n<h3>L. Az adatok frissítése</h3><p>\r\nKérjük, tudassa velünk, ha javítani vagy frissíteni kell az Önnel kapcsolatosan általunk tárolt személyes adatokat.</p><br>\r\n<h3>M. Sütik</h3><p>\r\nWeboldalunk sütiket alkalmaz. A süti egy azonosítót (betűket és számokat) tartalmazó fájlnak felel meg, amelyet a webszerver küld a webböngészőnek, és amelyet a böngésző eltárol. Ezután megtörténik az azonosító visszaküldése a szerverhez minden alkalommal, amikor a böngésző lekér egy adott oldalt a szerverről. A sütik lehetnek „tartós” vagy „munkamenet” sütik: a tartós sütiket a böngésző tárolja, és a megadott lejárati időpontig érvényben maradnak, kivéve, ha a felhasználó a lejárati idő előtt törli őket; a munkamenet süti ezzel szemben lejár a felhasználói munkamenet végén, amikor a böngészőt bezárja a felhasználó. A sütik általában nem tartalmaznak olyan információt, amely által személyesen azonosítható lenne a felhasználó, azonban az Önről általunk tárolt személyes adatok kapcsolódhatnak a sütikben tárolt illetve a sütikből kiolvasható információkhoz. {VÁLASSZA KI A MEGFELELŐ KIFEJEZÉST Weboldalunkon kizárólag munkamenet sütiket / kizárólag tartós sütiket / munkamenet sütiket és tartós sütiket is használunk.} </p><p>\r\n1.	Az általunk a weboldalunkon alkalmazott sütik nevét, valamint azok felhasználási céljait az alábbiakban ismertetjük: </p><p><ul>\r\n1.	a weboldalunkon a Google Analytics és az Adwords szoftverek segítségével a számítógép felismerése, amikor egy felhasználó {ADJA HOZZÁ AZ ÖSSZES FELHASZNÁLÁSI CÉLT meglátogatja a weboldalt / a felhasználók nyomon követése, miközben navigálnak a weboldalon / a kosár használatának lehetősége a weboldalon / a weboldal használhatóságának javítása / a weboldal használatának elemzése / a weboldal adminisztrálása / a csalások megakadályozása és a weboldal biztonságának javítása / a weboldal testreszabása minden egyes felhasználó számára / a célzott reklámok használata, amelyek adott felhasználók számára különösen érdekesek lehetnek, / további célok leírása};</ul></p><p>\r\n2.	A legtöbb böngészőben beállítható a sütik elfogadásának megtagadása — például: </p><p><ul>\r\n1.	az Internet Explorer böngészőben (10. verziószám) letilthatja a sütiket a sütikezelés felülbírálását érintő beállításokban, ehhez kattintson a következőkre: „Eszközök”, „Internetbeállítások”, „Adatvédelem”, végül pedig a „Speciális” opcióra; </ul></p><p><ul>\r\n2.	A Firefox böngészőben (24. verziószám) az összes süti letiltásához kattintson a következőkre: „Eszközök”, „Opciók”, „Adatvédelem”, ezután a legördülő menüből válassza az „Egyéni beállítások használata előzményekhez” opciót, és törölje a pipát a „Sütik elfogadása” opciónál; valamint</ul></p><p><ul>\r\n3.	A Chrome böngészőben (29. verziószám) az összes süti letiltásához válassza a „Testreszabás és vezérlés” menüt, ezután kattintson a következőkre: „Beállítások”, „Speciális beállítások megjelenítése”, „Tartalombeállítások”, végül válassza ki a „Adatmentés tiltása a webhelyeken” opciót a „Cookie-k” résznél. </ul></p><p>\r\nHa letiltja az összes süti használatát, akkor sok weboldal használhatósága romlani fog. A weboldalunkon pedig egyes funkciók nem lesznek elérhetők az Ön számára. </p><p>\r\n3.	Törölheti a számítógépén már tárolt sütiket is — például: </p><p><ul>\r\n1.	az Internet Explorer böngészőben (10. verziószám) manuálisan kell törölnie a süti-fájlokat (ehhez a http://support.microsoft.com/kb/278835 címen talál leírást); </ul></p><p><ul>\r\n2.	A Firefox böngészőben (24. verziószám) a sütik törléséhez kattintson a következőkre: „Eszközök”, „Opciók”, „Adatvédelem”, ezután válassza az „Egyéni beállításokat használ az előzményekhez” opciót, majd kattintson a „Sütik megjelenítése” opcióra, végül az „Összes eltávolítása” elemre; valamint</ul></p><p><ul>\r\n3.	A Chrome böngészőben (29. verziószám) az összes süti törléséhez válassza a „Testreszabás és vezérlés” menüt, ezután kattintson a következőkre: „Beállítások”, „Speciális beállítások megjelenítése”, „Böngészési adatok törlése”, utóbbinál pedig válassza az „Összes cookie és webhelyadat” lehetőséget, mielőtt a „ Böngészési adatok törlése” elemre kattint. </ul></p><p>\r\n4.	Ha törli a sütiket, akkor sok weboldal használhatósága romlani fog. </p><p>\r\nAz SSWL nem vállal felelősséget, és a jogi szakértőkkel való konzultációt javasolja, amennyiben a fenti sablont alkalmazza weboldalán. </p>\r\n\r\n\r\n\r\n');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `saving_goal`
--

CREATE TABLE `saving_goal` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `goal` double(13,2) NOT NULL,
  `store_of_money` double(13,2) NOT NULL,
  `saving_for` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `saving_goal`
--

INSERT INTO `saving_goal` (`id`, `user_id`, `goal`, `store_of_money`, `saving_for`) VALUES
(2, 1, 5000000.00, 1256000.00, 'Autó');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `transaction`
--

CREATE TABLE `transaction` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `type` varchar(1) NOT NULL,
  `method` varchar(8) NOT NULL,
  `comment` varchar(30) NOT NULL,
  `value` double(13,2) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `category`, `type`, `method`, `comment`, `value`, `date`) VALUES
(1, 1, 'Fizetés', '+', 'Bank', 'Fizetés', 250000.00, '2021-01-29'),
(2, 1, 'Egyéb', '+', 'Készpénz', 'Eladott ágy', 50000.00, '2021-01-29'),
(3, 1, 'Otthon', '-', 'Készpénz', 'Rezsi', 100000.00, '2021-01-29'),
(4, 1, 'Jármű', '-', 'Bank', 'Tankolás', 20000.00, '2021-01-29'),
(5, 1, 'Fizetés', '+', 'Bank', 'Fizetés', 250000.00, '2021-02-02'),
(6, 1, 'Otthon', '-', 'Készpénz', 'Rezsi', 100000.00, '2021-02-02'),
(9, 1, 'Jármű', '-', 'Bank', 'Tankolás', 15000.00, '2021-02-02');

--
-- Eseményindítók `transaction`
--
DELIMITER $$
CREATE TRIGGER `update_balance` AFTER INSERT ON `transaction` FOR EACH ROW BEGIN
UPDATE balance
SET
 up_date = now(),
bank = IF (NEW.method = 'Bank' AND NEW.type = '+', bank + NEW.value , IF (NEW.method = 'Bank' AND NEW.type = '-', bank - NEW.value , bank)),
cash = IF (NEW.method = 'Készpénz' AND NEW.type = '+', cash + NEW.value , IF (NEW.method = 'Készpénz' AND NEW.type = '-', cash - NEW.value , cash))
WHERE user_id = NEW.user_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_balance_when_delete` BEFORE DELETE ON `transaction` FOR EACH ROW BEGIN
UPDATE balance
SET
up_date = now(),
bank = IF (OLD.method = 'bank' AND OLD.type = '+', bank - OLD.value , IF (OLD.method = 'bank' AND OLD.type = '-', bank + OLD.value , bank)),
cash = IF (OLD.method = 'cash' AND OLD.type = '+', cash - OLD.value , IF (OLD.method = 'cash' AND OLD.type = '-', cash + OLD.value , cash))
WHERE user_id = OLD.user_id;
END
$$
DELIMITER ;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK4` (`user_id`);

--
-- A tábla indexei `banned`
--
ALTER TABLE `banned`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK3` (`user_id`);

--
-- A tábla indexei `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK7` (`user_id`);

--
-- A tábla indexei `fixed_transactions`
--
ALTER TABLE `fixed_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK29` (`user_id`);

--
-- A tábla indexei `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `saving_goal`
--
ALTER TABLE `saving_goal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK10` (`user_id`);

--
-- A tábla indexei `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK1` (`user_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `banned`
--
ALTER TABLE `banned`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `categories`
--
ALTER TABLE `categories`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT a táblához `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `fixed_transactions`
--
ALTER TABLE `fixed_transactions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `information`
--
ALTER TABLE `information`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `saving_goal`
--
ALTER TABLE `saving_goal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `balance`
--
ALTER TABLE `balance`
  ADD CONSTRAINT `FK4` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`);

--
-- Megkötések a táblához `banned`
--
ALTER TABLE `banned`
  ADD CONSTRAINT `FK3` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`);

--
-- Megkötések a táblához `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `FK7` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`);

--
-- Megkötések a táblához `fixed_transactions`
--
ALTER TABLE `fixed_transactions`
  ADD CONSTRAINT `FK29` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`);

--
-- Megkötések a táblához `saving_goal`
--
ALTER TABLE `saving_goal`
  ADD CONSTRAINT `FK10` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`);

--
-- Megkötések a táblához `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
