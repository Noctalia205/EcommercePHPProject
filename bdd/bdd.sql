create table `users` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `first_name` varchar(255) NOT NULL,
    `last_name` varchar(255) NOT NULL,
    `mail` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (id),
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table `articles` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `price` int(11) NOT NULL,
    `stock` int(11) NOT NULL,
    PRIMARY KEY (id),
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table `reviews` (
    `title` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `number_stars` int(5) NOT NULL,
    `author_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    FOREIGN KEY (author_id) REFERENCES users(id)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


create table `orders` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `customer_id` int UNSIGNED ,
    `articles_quantity` int(3) NOT NULL,
    `purchase_date` datetime NOT NULL DEFAULT current_timestamp(),
    `total_price` float(11) NOT NULL,
    `address` varchar(255) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (customer_id) REFERENCES users(id)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;