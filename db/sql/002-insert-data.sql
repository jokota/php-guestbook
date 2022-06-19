USE guestbook;

SET CHARACTER_SET_CLIENT = utf8;
SET CHARACTER_SET_CONNECTION = utf8;

/* Insert Sample Guest Data */
INSERT INTO `guest` (`name`, `mail`, `address`) VALUES ('山田花子', 'yamada@example.com', '東京都港区六本木');
INSERT INTO `guest` (`name`, `mail`, `address`) VALUES ('田中一郎', 'tanaka@example.com', '東京都品川区高輪');
