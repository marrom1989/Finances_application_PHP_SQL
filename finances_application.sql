
-- users table

CREATE TABLE `users` 
(
user_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
name varchar(50) NOT NULL,
password varchar(255) NOT NULL,
email varchar(50) NOT NULL
);

-- incomes_category_assigned_to_users

CREATE TABLE `incomes_category_assigned_to_user` 
(
id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
user_id int(11) NOT NULL,
CONSTRAINT users_user_id_fk
FOREIGN KEY (user_id)
REFERENCES users (user_id),
name varchar(50) NOT NULL
);

-- incomes_category_default

CREATE TABLE `incomes_category_default`
(
id int(11) NOT NULL,
name varchar(50) NOT NULL
);

-- add default categories

INSERT INTO `incomes_category_default` (`id`, `name`) VALUES
(1,'Payment'),
(2, 'Bank_Interest'),
(3, 'Sales_on_Allegro');

-- incomes

CREATE TABLE `incomes` 
(
id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
user_id int(11) NOT NULL,
CONSTRAINT `incomes_category_users_user_id_fk`
FOREIGN KEY (user_id)
REFERENCES `users` (user_id),
income_category_assigned_to_user_id int(11) NOT NULL,
CONSTRAINT `incomes_category_assigned_to_user_id_fk`
FOREIGN KEY (income_category_assigned_to_user_id)
REFERENCES `incomes_category_assigned_to_user` (id),
amount decimal(8,2) NOT NULL,
date_of_income date NOT NULL,
income_comment varchar(100) NOT NULL
);

-- expenses_category_assigned_to_users

CREATE TABLE `expenses_category_assigned_to_user` 
(
id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
user_id int(11) NOT NULL,
CONSTRAINT `expenses_users_user_id_fk`
FOREIGN KEY (user_id)
REFERENCES `users` (user_id),
name varchar(50) NOT NULL
);

-- expenses_category_default

CREATE TABLE `expenses_category_default`
(
id int(11) NOT NULL,
name varchar(50) NOT NULL
);

INSERT INTO `expenses_category_default` (`id`, `name`) VALUES
(1,'Food'),
(2, 'House'),
(3, 'Transport'),
(4, 'Telecomunication'),
(5, 'Healthcare'),
(6, 'Cloth'),
(7, 'Hygiene'),
(8, 'Kids'),
(9, 'Entertainment'),
(10, 'Trip'),
(11, 'Trainings'),
(12, 'Books'),
(13, 'Savings'),
(14, 'Pension'),
(15, 'Repaymen'),
(16, 'Donation');

-- payment_method_assigned_to_user

CREATE TABLE `payment_method_assigned_to_user` 
(
id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
user_id int(11) NOT NULL,
CONSTRAINT `payment_users_user_id_fk`
FOREIGN KEY (user_id)
REFERENCES `users` (user_id),
name varchar(50) NOT NULL
);

-- payment_methods_default

CREATE TABLE `payment_methods_default`
(
id int(11) NOT NULL,
name varchar(50) NOT NULL
);

-- add payment_methods_default

INSERT INTO `payment_methods_default` (`id`, `name`) VALUES
(1,'Cash'),
(2, 'Debit_card'),
(3, 'Credit_card');

-- expenses

CREATE TABLE `expenses` 
(
id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
user_id int(11) NOT NULL,
CONSTRAINT `expenses_key_users_user_id_fk`
FOREIGN KEY (user_id)
REFERENCES `users` (user_id),
expenses_category_assigned_to_user_id int(11) NOT NULL,
CONSTRAINT `expenses_category_assigned_to_user_id_fk`
FOREIGN KEY (expenses_category_assigned_to_user_id)
REFERENCES `expenses_category_assigned_to_user` (id),
payment_method_assigned_to_user_id int(11) NOT NULL,
CONSTRAINT `payment_method_assigned_to_user_id_fk`
FOREIGN KEY (payment_method_assigned_to_user_id)
REFERENCES `payment_method_assigned_to_user` (id),
amount decimal(8,2) NOT NULL,
date_of_expense date NOT NULL,
expense_comment varchar(100) NOT NULL
);

