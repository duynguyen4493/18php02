SELECT `name` FROM `users` WHERE `phone` LIKE '098%'
SELECT `name` FROM `users` WHERE `email` LIKE '%@gmail%'
SELECT `name` FROM `users` WHERE `name` LIKE '%o%' AND `name` LIKE '%a%'
SELECT `name` FROM `users` WHERE `phone` LIKE '098%' AND `name` LIKE '%a%'
SELECT `name` FROM `users` WHERE `phone` LIKE '_8%'

SELECT * FROM `users`
	INNER JOIN `cities` ON `users`.`id_cities` = `cities`.`id`
	WHERE `cities`.`id` = 'Đà Nẵng'


SELECT * FROM `products`
	INNER JOIN `categories` ON `products`.`categoryID` = `categories`.`categoryID`
	WHERE `categories`.`categoryID` = '1'
	AND `products`.`listPrice` > '500'

SELECT * FROM `products`
	WHERE `products`.`discountPercent` > '30'
	AND `products`.`dateAdded` LIKE '2014-02%'

SELECT `city` FROM `addresses`
	INNER JOIN `customers` ON `addresses`.`customerID` = `customers`.`customerID`
	WHERE `customers`.`emailAddress` LIKE '%@gmail%'

SELECT `productName` FROM `products`
	INNER JOIN `orderitems` ON `orderitems`.`productID` = `products`.`productID`
	INNER JOIN `orders` ON `orders`.`orderID` = `orderitems`.`orderID`
	INNER JOIN `customers` ON `customers`.`customerID` = `orders`.`customerID`
	WHERE `customers`.`emailAddress` = 'allan.sherwood@yahoo.com'
