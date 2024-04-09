-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2024 at 07:59 AM
-- Server version: 10.6.17-MariaDB-cll-lve
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intepkvx_recipetwodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` char(30) NOT NULL,
  `email` char(50) NOT NULL,
  `username` char(30) NOT NULL,
  `role` char(20) NOT NULL DEFAULT 'CEO',
  `password` char(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Tastebite', 'tastebite@gmail.com', 'Tastebite Admin', 'C.E.O', 'tastebite123', '2023-12-15 11:42:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `chef_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `chef_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pasta', '1712567950_4768.png', '2024-04-08 04:49:27', '0000-00-00 00:00:00'),
(2, 5, 'Vegan', '1712562489_5778.png', '2024-04-08 07:48:09', '0000-00-00 00:00:00'),
(3, 1, 'Desserts', '1712573772_6518.png', '2024-04-08 10:56:12', '0000-00-00 00:00:00'),
(4, 1, 'Smoothies', '1712583761_3352.png', '2024-04-08 13:42:41', '0000-00-00 00:00:00'),
(8, 1, 'Pizza', '1712584089_7952.png', '2024-04-08 13:48:09', '0000-00-00 00:00:00'),
(9, 8, 'Sample Recipe', '1712596390_1971.png', '2024-04-08 17:13:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `chefs`
--

CREATE TABLE `chefs` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chefs`
--

INSERT INTO `chefs` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Lesley Mejia', 'qoxa@mailinator.com', 'password', '2024-04-07 08:58:50', '0000-00-00 00:00:00'),
(5, 'dev afo', 'afo@mail.com', 'xoqpa3-wivwam-tahTin', '2024-04-08 07:19:42', '0000-00-00 00:00:00'),
(6, 'Rhonda Burch', 'qifadet@mailinator.com', 'Pa$$w0rd!', '2024-04-08 17:04:40', '0000-00-00 00:00:00'),
(7, 'Palmer Hammond', 'nopaguva@mailinator.com', 'Pa$$w0rd!', '2024-04-08 17:08:58', '0000-00-00 00:00:00'),
(8, 'Kelsie Middleton', 'cajycisu@mailinator.com', 'Pa$$w0rd!', '2024-04-08 17:12:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text NOT NULL,
  `preparation_time` text NOT NULL,
  `servings` text DEFAULT NULL,
  `instructions` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ingredients` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `user_id`, `category_id`, `name`, `description`, `image`, `preparation_time`, `servings`, `instructions`, `created_at`, `updated_at`, `ingredients`) VALUES
(1, 1, 4, 'Cream Cake', '<h5><span style=\"font-family: Inter, sans-serif; font-size: 20px;\">One thing I learned living in the Canarsie section of Brooklyn, NY was how to cook a good Italian meal. Here is a recipe I created after having this dish in a restaurant. Enjoy!</span></h5>', 'r33.jpeg', '12hrs', '23', '<ul class=\"instruction-list list-unstyled\">\r\n                <li style=\"text-align: left;\">\r\n                  <span>1</span>\r\n                  To prepare crust add graham crackers to a food processor and process until you reach fine crumbs. Add melted butter and pulse 3-4 times to coat crumbs with butter.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>2</span>\r\n                  Pour mixture into a 20cm (8â€) tart tin. Use the back of a spoon to firmly press the mixture out across the bottom and sides of the tart tin. Chill for 30 min.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>3</span>\r\n                  Begin by adding the marshmallows and melted butter into a microwave safe bowl. Microwave for 30 seconds and mix to combine. Set aside.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>4</span>\r\n                  Next, add the gelatine and water to a small mixing bowl and mix to combine. Microwave for 30 seconds.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>5</span>\r\n                  Add the cream cheese to the marshmallow mixture and use a hand mixer or stand mixer fitted with a paddle attachment to mix until smooth.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>6</span>\r\n                  Add the warm cream and melted gelatin mixture and mix until well combined.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>7</span>\r\n                  Add 1/3 of the mixture to a mixing bowl, add purple food gel and mix until well combined. Colour 1/3 of the mixture blue. Split the remaining mixture into two mixing bowls, colour one pink and leave the other white.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>8</span>\r\n                  Pour half the purple cheesecake mixture into the chill tart crust. Add half the blue and then add the remaining purple and blue in the tart tin. Use a spoon to drizzle some pink cheesecake on top. Use a skewer or the end of a spoon to swirl the pink. Add some small dots of the plain cheesecake mixture to create stars and then sprinkle some more starts on top before chilling for 2 hours.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>9</span>\r\n                  Slice with a knife to serve.</li><li style=\"text-align: left;\">10 Bring it down and enjoy</li></ul><p style=\"text-align: left;\"><br></p><table class=\"table table-bordered\"><tbody><tr><td>name</td><td>ingredent</td></tr><tr><td>dckdkj</td><td>dckjdkj</td></tr><tr><td>dchjkdfkhjdf</td><td>dfsjkdfkjdfjkdfkj</td></tr></tbody></table><p style=\"text-align: left;\"><br></p><ul class=\"instruction-list list-unstyled\"><li>\r\n                </li>\r\n              </ul>', '2024-04-08 10:29:12', '0000-00-00 00:00:00', '<div class=\"checklist pb-4\">\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"crackers\" name=\"crackers\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"crackers\">400g graham crackers</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"unsalted\" name=\"unsalted\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"unsalted\">150g unsalted butters, melted</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"marshmallows\" name=\"marshmallows\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"marshmallows\">300g marshmallows</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"melted\" name=\"melted\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"melted\">175g unsalted butter, melted</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"Philadelphia\" name=\"Philadelphia\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"Philadelphia\">500g Philadelphia cream cheese, softened</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"thickened\" name=\"thickened\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"thickened\">250ml thickened/whipping cream, warm</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"tbsppowdered\" name=\"tbsppowdered\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"tbsppowdered\">3 tbsp powdered gelatin + 3 tbsp water</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"dropspurple\" name=\"dropspurple\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"dropspurple\">5 drops purple food gel</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"dropsblue\" name=\"dropsblue\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"dropsblue\">6 drops blue food gel&nbsp;</label></div><div class=\"form-check form-check-rounded recipe-checkbox\"><label class=\"form-check-label\" for=\"dropsblue\"><br></label>\r\n                </div>\r\n              </div>'),
(2, 1, 3, 'Sponge Cake', '<h5><span style=\"font-family: Inter, sans-serif; font-size: 20px;\">One thing I learned living in the Canarsie section of Brooklyn, NY was how to cook a good Italian meal. Here is a recipe I created after having this dish in a restaurant. Enjoy!</span></h5>', 'r11.jpeg', '7hrs', '40', '<ul class=\"instruction-list list-unstyled\">\r\n                <li style=\"text-align: left;\">\r\n                  <span>1</span>\r\n                  To prepare crust add graham crackers to a food processor and process until you reach fine crumbs. Add melted butter and pulse 3-4 times to coat crumbs with butter.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>2</span>\r\n                  Pour mixture into a 20cm (8â€) tart tin. Use the back of a spoon to firmly press the mixture out across the bottom and sides of the tart tin. Chill for 30 min.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>3</span>\r\n                  Begin by adding the marshmallows and melted butter into a microwave safe bowl. Microwave for 30 seconds and mix to combine. Set aside.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>4</span>\r\n                  Next, add the gelatine and water to a small mixing bowl and mix to combine. Microwave for 30 seconds.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>5</span>\r\n                  Add the cream cheese to the marshmallow mixture and use a hand mixer or stand mixer fitted with a paddle attachment to mix until smooth.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>6</span>\r\n                  Add the warm cream and melted gelatin mixture and mix until well combined.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>7</span>\r\n                  Add 1/3 of the mixture to a mixing bowl, add purple food gel and mix until well combined. Colour 1/3 of the mixture blue. Split the remaining mixture into two mixing bowls, colour one pink and leave the other white.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>8</span>\r\n                  Pour half the purple cheesecake mixture into the chill tart crust. Add half the blue and then add the remaining purple and blue in the tart tin. Use a spoon to drizzle some pink cheesecake on top. Use a skewer or the end of a spoon to swirl the pink. Add some small dots of the plain cheesecake mixture to create stars and then sprinkle some more starts on top before chilling for 2 hours.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>9</span>\r\n                  Slice with a knife to serve.</li><li style=\"text-align: left;\">10 Bring it down and enjoy</li></ul><p style=\"text-align: left;\"><br></p><table class=\"table table-bordered\"><tbody><tr><td>name</td><td>ingredent</td></tr><tr><td>dckdkj</td><td>dckjdkj</td></tr><tr><td>dchjkdfkhjdf</td><td>dfsjkdfkjdfjkdfkj</td></tr></tbody></table><p style=\"text-align: left;\"><br></p><ul class=\"instruction-list list-unstyled\"><li>\r\n                </li>\r\n              </ul>', '2024-04-08 10:29:12', '0000-00-00 00:00:00', '<div class=\"checklist pb-4\">\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"crackers\" name=\"crackers\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"crackers\">400g graham crackers</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"unsalted\" name=\"unsalted\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"unsalted\">150g unsalted butters, melted</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"marshmallows\" name=\"marshmallows\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"marshmallows\">300g marshmallows</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"melted\" name=\"melted\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"melted\">175g unsalted butter, melted</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"Philadelphia\" name=\"Philadelphia\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"Philadelphia\">500g Philadelphia cream cheese, softened</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"thickened\" name=\"thickened\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"thickened\">250ml thickened/whipping cream, warm</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"tbsppowdered\" name=\"tbsppowdered\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"tbsppowdered\">3 tbsp powdered gelatin + 3 tbsp water</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"dropspurple\" name=\"dropspurple\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"dropspurple\">5 drops purple food gel</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"dropsblue\" name=\"dropsblue\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"dropsblue\">3 drops blue food gel</label>\r\n                </div>\r\n              </div>'),
(3, 1, 4, 'Mousse Cake', '<h5><span style=\"font-family: Inter, sans-serif; font-size: 20px;\">One thing I learned living in the Canarsie section of Brooklyn, NY was how to cook a good Italian meal. Here is a recipe I created after having this dish in a restaurant. Enjoy!</span></h5>', 'r22.jpeg', '2hrs', '30', '<ul class=\"instruction-list list-unstyled\">\r\n                <li style=\"text-align: left;\">\r\n                  <span>1</span>\r\n                  To prepare crust add graham crackers to a food processor and process until you reach fine crumbs. Add melted butter and pulse 3-4 times to coat crumbs with butter.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>2</span>\r\n                  Pour mixture into a 20cm (8â€) tart tin. Use the back of a spoon to firmly press the mixture out across the bottom and sides of the tart tin. Chill for 30 min.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>3</span>\r\n                  Begin by adding the marshmallows and melted butter into a microwave safe bowl. Microwave for 30 seconds and mix to combine. Set aside.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>4</span>\r\n                  Next, add the gelatine and water to a small mixing bowl and mix to combine. Microwave for 30 seconds.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>5</span>\r\n                  Add the cream cheese to the marshmallow mixture and use a hand mixer or stand mixer fitted with a paddle attachment to mix until smooth.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>6</span>\r\n                  Add the warm cream and melted gelatin mixture and mix until well combined.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>7</span>\r\n                  Add 1/3 of the mixture to a mixing bowl, add purple food gel and mix until well combined. Colour 1/3 of the mixture blue. Split the remaining mixture into two mixing bowls, colour one pink and leave the other white.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>8</span>\r\n                  Pour half the purple cheesecake mixture into the chill tart crust. Add half the blue and then add the remaining purple and blue in the tart tin. Use a spoon to drizzle some pink cheesecake on top. Use a skewer or the end of a spoon to swirl the pink. Add some small dots of the plain cheesecake mixture to create stars and then sprinkle some more starts on top before chilling for 2 hours.\r\n                </li>\r\n                <li style=\"text-align: left;\">\r\n                  <span>9</span>\r\n                  Slice with a knife to serve.</li><li style=\"text-align: left;\">10 Bring it down and enjoy</li></ul><p style=\"text-align: left;\"><br></p><table class=\"table table-bordered\"><tbody><tr><td>name</td><td>ingredent</td></tr><tr><td>dckdkj</td><td>dckjdkj</td></tr><tr><td>dchjkdfkhjdf</td><td>dfsjkdfkjdfjkdfkj</td></tr></tbody></table><p style=\"text-align: left;\"><br></p><ul class=\"instruction-list list-unstyled\"><li>\r\n                </li>\r\n              </ul>', '2024-04-08 10:29:12', '0000-00-00 00:00:00', '<div class=\"checklist pb-4\">\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"crackers\" name=\"crackers\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"crackers\">400g graham crackers</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"unsalted\" name=\"unsalted\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"unsalted\">150g unsalted butters, melted</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"marshmallows\" name=\"marshmallows\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"marshmallows\">300g marshmallows</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"melted\" name=\"melted\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"melted\">175g unsalted butter, melted</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"Philadelphia\" name=\"Philadelphia\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"Philadelphia\">500g Philadelphia cream cheese, softened</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"thickened\" name=\"thickened\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"thickened\">250ml thickened/whipping cream, warm</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"tbsppowdered\" name=\"tbsppowdered\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"tbsppowdered\">3 tbsp powdered gelatin + 3 tbsp water</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"dropspurple\" name=\"dropspurple\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"dropspurple\">5 drops purple food gel</label>\r\n                </div>\r\n                <div class=\"form-check form-check-rounded recipe-checkbox\">\r\n                  <input type=\"checkbox\" id=\"dropsblue\" name=\"dropsblue\" class=\"form-check-input\">\r\n                  <label class=\"form-check-label\" for=\"dropsblue\">3 drops blue food gel</label>\r\n                </div>\r\n              </div>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chefs`
--
ALTER TABLE `chefs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chefs`
--
ALTER TABLE `chefs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
