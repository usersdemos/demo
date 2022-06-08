CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) DEFAULT 'default.jpg',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_admin` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `is_confirmed` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;


CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


----product----

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_ids` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


----attribute----
CREATE TABLE `attribute` (
  `id` int(11) NOT NULL,
  `attribute_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `attribute` (`id`, `attribute_name`, `created_at`) VALUES
(1, 'Color', '2022-06-02 11:21:58'),
(2, 'Size', '2022-06-02 11:21:58'),
(3, 'Height', '2022-06-02 11:21:58'),
(4, 'Width', '2022-06-02 11:21:58');

ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

----sub attribute----

CREATE TABLE `sub_attribute` (
  `id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `sub_attribute_name` varchar(255) NOT NULL,
  `value` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `sub_attribute` (`id`, `attribute_id`, `sub_attribute_name`, `value`, `created_at`) VALUES
(1, 1, 'Red', '10', '2022-06-02 11:23:50'),
(2, 1, 'Green', '11', '2022-06-02 11:23:50'),
(3, 1, 'Blue', '12', '2022-06-02 11:23:50'),
(4, 2, 'S', '13', '2022-06-02 11:24:38'),
(5, 2, 'M', '14', '2022-06-02 11:24:41'),
(6, 2, 'L', '15', '2022-06-02 11:24:45'),
(7, 3, '1 ft', '16', '2022-06-02 11:25:28'),
(8, 3, '2 ft', '17', '2022-06-02 11:25:31'),
(9, 3, '3 ft', '18', '2022-06-02 11:25:34'),
(10, 4, '1 mtr', '19', '2022-06-02 11:26:13'),
(11, 4, '2 mtr', '20', '2022-06-02 11:26:16'),
(12, 4, '3 mtr', '21', '2022-06-02 11:26:16');

ALTER TABLE `sub_attribute`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `sub_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;



---------------product attribute -----------------------
CREATE TABLE `product_attribute` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `sub_attribute_id` int(11) NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `product_attribute`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `product_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;