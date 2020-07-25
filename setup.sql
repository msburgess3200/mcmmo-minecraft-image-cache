CREATE TABLE `mcmmo_images` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `date_created` text NOT NULL,
  `cache` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `mcmmo_images` (`id`, `username`, `date_created`, `cache`) VALUES (1, 'default', '0', NULL);