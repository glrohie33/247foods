-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 19, 2020 at 12:40 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_tokens`
--

DROP TABLE IF EXISTS `api_tokens`;
CREATE TABLE IF NOT EXISTS `api_tokens` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `permissions` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_tokens`
--

INSERT INTO `api_tokens` (`id`, `title`, `user_id`, `permissions`, `token`, `created_at`, `updated_at`) VALUES
(1, 'test', 1, 'read', 'pXO5K877NfE0ynOKFABISBpcPjBv5SonazrmFPPAaIS53eecrNx7vterA3hq', '2020-06-08 06:22:19', '2020-06-08 06:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(10) UNSIGNED NOT NULL,
  `object_id` int(10) UNSIGNED NOT NULL,
  `target` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_currency_values`
--

DROP TABLE IF EXISTS `custom_currency_values`;
CREATE TABLE IF NOT EXISTS `custom_currency_values` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_value` double(11,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `download_extras`
--

DROP TABLE IF EXISTS `download_extras`;
CREATE TABLE IF NOT EXISTS `download_extras` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manage_languages`
--

DROP TABLE IF EXISTS `manage_languages`;
CREATE TABLE IF NOT EXISTS `manage_languages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_sample_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `default_lang` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manage_languages`
--

INSERT INTO `manage_languages` (`id`, `lang_name`, `lang_code`, `lang_sample_img`, `status`, `default_lang`, `created_at`, `updated_at`) VALUES
(1, 'english', 'en', 'en_lang_sample_img.png', 1, 1, '2019-11-03 23:03:55', '2019-11-03 23:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_000036_create_api_tokens_table', 1),
(3, '2014_10_12_263536_create_order_products_table', 1),
(4, '2015_12_05_184931_create_roles_table', 1),
(5, '2015_12_05_185011_create_role_user_table', 1),
(6, '2015_12_05_190659_create_options_table', 1),
(7, '2016_01_01_022900_create_posts_table', 1),
(8, '2016_01_01_022900_create_products_table', 1),
(9, '2016_01_01_022956_create_post_extras_table', 1),
(10, '2016_01_01_022956_create_product_extras_table', 1),
(11, '2016_01_17_181505_create_object_relationships_table', 1),
(12, '2016_05_12_015250_create_orders_items_table', 1),
(13, '2016_06_04_053757_create_save_custom_designs_table', 1),
(14, '2016_06_15_182116_create_users_custom_designs_table', 1),
(15, '2016_10_02_061320_create_users_details_table', 1),
(16, '2016_10_07_023527_create_manage_languages_table', 1),
(17, '2016_11_28_173526_create_user_role_permissions_table', 1),
(18, '2017_01_06_185011_create_vendor_announcements_table', 1),
(19, '2017_02_07_173536_create_comments_table', 1),
(20, '2017_02_09_173636_create_subscriptions_table', 1),
(21, '2017_02_09_173736_create_request_products_table', 1),
(22, '2017_05_23_153636_create_term_extras_table', 1),
(23, '2017_05_23_173636_create_terms_table', 1),
(24, '2017_09_22_172636_create_download_extras_table', 1),
(25, '2017_11_18_1726459_create_vendor_withdraws_table', 1),
(26, '2017_12_03_172638_create_vendor_packages_table', 1),
(27, '2017_12_26_172638_create_vendor_orders_table', 1),
(28, '2018_01_01_172638_create_custom_currency_values_table', 1),
(29, '2018_01_01_172638_create_vendor_totals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `object_relationships`
--

DROP TABLE IF EXISTS `object_relationships`;
CREATE TABLE IF NOT EXISTS `object_relationships` (
  `term_id` int(10) UNSIGNED NOT NULL,
  `object_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`term_id`,`object_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `object_relationships`
--

INSERT INTO `object_relationships` (`term_id`, `object_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(2, 1, '2020-06-10 17:05:04', '2020-06-10 17:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `option_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `option_name`, `option_value`, `created_at`, `updated_at`) VALUES
(1, '_shipping_method_data', 'a:4:{s:15:\"shipping_option\";a:2:{s:15:\"enable_shipping\";s:0:\"\";s:12:\"display_mode\";s:13:\"radio_buttons\";}s:9:\"flat_rate\";a:3:{s:13:\"enable_option\";s:0:\"\";s:12:\"method_title\";s:9:\"Flat Rate\";s:11:\"method_cost\";s:0:\"\";}s:13:\"free_shipping\";a:3:{s:13:\"enable_option\";s:0:\"\";s:12:\"method_title\";s:13:\"Free Shipping\";s:12:\"order_amount\";s:0:\"\";}s:14:\"local_delivery\";a:4:{s:13:\"enable_option\";s:0:\"\";s:12:\"method_title\";s:14:\"Local Delivery\";s:8:\"fee_type\";s:0:\"\";s:12:\"delivery_fee\";s:0:\"\";}}', '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(2, '_settings_data', 'a:1:{s:16:\"general_settings\";a:10:{s:15:\"general_options\";a:5:{s:10:\"site_title\";s:13:\"247FoodMarket\";s:13:\"email_address\";s:20:\"yourEmail@domain.com\";s:9:\"site_logo\";s:80:\"/public/uploads/1591772884-h-40-0fa2849c-1c39-46d0-ac79-7c5625cad370_200x200.png\";s:31:\"allow_registration_for_frontend\";b:1;s:26:\"default_role_slug_for_site\";s:9:\"site-user\";}s:13:\"taxes_options\";a:3:{s:13:\"enable_status\";s:1:\"0\";s:13:\"apply_tax_for\";s:11:\"per_product\";s:10:\"tax_amount\";N;}s:16:\"checkout_options\";a:2:{s:17:\"enable_guest_user\";b:1;s:17:\"enable_login_user\";b:1;}s:29:\"downloadable_products_options\";a:3:{s:17:\"login_restriction\";b:0;s:31:\"grant_access_from_thankyou_page\";b:1;s:23:\"grant_access_from_email\";b:0;}s:17:\"recaptcha_options\";a:7:{s:32:\"enable_recaptcha_for_admin_login\";b:0;s:31:\"enable_recaptcha_for_user_login\";b:0;s:38:\"enable_recaptcha_for_user_registration\";b:0;s:33:\"enable_recaptcha_for_vendor_login\";b:0;s:40:\"enable_recaptcha_for_vendor_registration\";b:0;s:20:\"recaptcha_secret_key\";N;s:18:\"recaptcha_site_key\";N;}s:19:\"nexmo_config_option\";a:6:{s:19:\"enable_nexmo_option\";b:0;s:9:\"nexmo_key\";N;s:12:\"nexmo_secret\";N;s:9:\"number_to\";N;s:11:\"number_from\";N;s:7:\"message\";N;}s:19:\"fixer_config_option\";a:1:{s:20:\"fixer_api_access_key\";N;}s:16:\"currency_options\";a:7:{s:13:\"currency_name\";s:3:\"USD\";s:17:\"currency_position\";s:4:\"left\";s:18:\"thousand_separator\";s:1:\",\";s:17:\"decimal_separator\";s:1:\".\";s:18:\"number_of_decimals\";s:1:\"2\";s:26:\"currency_conversion_method\";N;s:17:\"frontend_currency\";a:1:{i:0;s:3:\"NGN\";}}s:19:\"date_format_options\";a:1:{s:11:\"date_format\";N;}s:25:\"default_frontend_currency\";a:1:{i:0;s:3:\"NGN\";}}}', '2019-11-03 23:03:55', '2020-06-10 06:08:29'),
(3, '_custom_designer_settings_data', 'a:1:{s:16:\"general_settings\";a:1:{s:16:\"canvas_dimension\";a:3:{s:13:\"small_devices\";a:2:{s:5:\"width\";i:280;s:6:\"height\";i:300;}s:14:\"medium_devices\";a:2:{s:5:\"width\";i:480;s:6:\"height\";i:480;}s:13:\"large_devices\";a:2:{s:5:\"width\";i:500;s:6:\"height\";i:550;}}}}', '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(4, '_payment_method_data', 'a:6:{s:14:\"payment_option\";a:1:{s:21:\"enable_payment_method\";s:0:\"\";}s:4:\"bacs\";a:5:{s:13:\"enable_option\";s:0:\"\";s:12:\"method_title\";s:20:\"Direct Bank Transfer\";s:18:\"method_description\";s:173:\"Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won\'t be shipped until the funds have cleared in our account.\";s:19:\"method_instructions\";s:173:\"Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won\'t be shipped until the funds have cleared in our account.\";s:15:\"account_details\";a:6:{s:12:\"account_name\";s:0:\"\";s:14:\"account_number\";s:0:\"\";s:9:\"bank_name\";s:0:\"\";s:10:\"short_code\";s:0:\"\";s:4:\"iban\";s:0:\"\";s:5:\"swift\";s:0:\"\";}}s:3:\"cod\";a:4:{s:13:\"enable_option\";s:0:\"\";s:12:\"method_title\";s:16:\"Cash on Delivery\";s:18:\"method_description\";s:28:\"Pay with cash upon delivery.\";s:19:\"method_instructions\";s:28:\"Pay with cash upon delivery.\";}s:6:\"paypal\";a:6:{s:13:\"enable_option\";s:0:\"\";s:12:\"method_title\";s:6:\"Paypal\";s:16:\"paypal_client_id\";s:0:\"\";s:13:\"paypal_secret\";s:0:\"\";s:28:\"paypal_sandbox_enable_option\";s:3:\"yes\";s:18:\"method_description\";s:85:\"Pay via PayPal; you can pay with your credit card if you don\'t have a PayPal account.\";}s:6:\"stripe\";a:8:{s:13:\"enable_option\";s:0:\"\";s:12:\"method_title\";s:6:\"Stripe\";s:15:\"test_secret_key\";s:0:\"\";s:20:\"test_publishable_key\";s:0:\"\";s:15:\"live_secret_key\";s:0:\"\";s:20:\"live_publishable_key\";s:0:\"\";s:25:\"stripe_test_enable_option\";s:3:\"yes\";s:18:\"method_description\";s:49:\"Stripe is a simple way to accept payments online.\";}s:9:\"2checkout\";a:7:{s:13:\"enable_option\";s:0:\"\";s:12:\"method_title\";s:9:\"2Checkout\";s:8:\"sellerId\";s:0:\"\";s:14:\"publishableKey\";s:0:\"\";s:10:\"privateKey\";s:0:\"\";s:21:\"sandbox_enable_option\";s:3:\"yes\";s:18:\"method_description\";s:52:\"2Checkout is a simple way to accept payments online.\";}}', '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(5, '_appearance_tab_data', 'a:7:{s:8:\"settings\";s:71:\"{\"header_slider_images_and_text\":{\"slider_images\":[],\"slider_text\":[]}}\";s:16:\"settings_details\";a:4:{s:7:\"general\";a:20:{s:10:\"custom_css\";b:0;s:13:\"body_bg_color\";s:6:\"d2d6de\";s:16:\"filter_price_min\";i:0;s:16:\"filter_price_max\";i:1000;s:22:\"sidebar_panel_bg_color\";s:6:\"f2f0f1\";s:30:\"sidebar_panel_title_text_color\";s:6:\"333333\";s:44:\"sidebar_panel_title_text_bottom_border_color\";s:6:\"1fc0a0\";s:34:\"sidebar_panel_title_text_font_size\";i:14;s:32:\"sidebar_panel_content_text_color\";s:6:\"333333\";s:36:\"sidebar_panel_content_text_font_size\";i:12;s:20:\"product_box_bg_color\";s:6:\"f2f0f1\";s:24:\"product_box_border_color\";s:6:\"e1e1e1\";s:22:\"product_box_text_color\";s:6:\"333333\";s:26:\"product_box_text_font_size\";i:13;s:24:\"product_box_btn_bg_color\";s:6:\"1fc0a0\";s:27:\"product_box_btn_hover_color\";s:6:\"e1e1e1\";s:14:\"btn_text_color\";s:6:\"FFFFFF\";s:20:\"btn_hover_text_color\";s:6:\"444444\";s:26:\"selected_menu_border_color\";s:6:\"1fc0a0\";s:32:\"pages_content_title_border_color\";s:6:\"1fc0a0\";}s:14:\"header_details\";a:12:{s:17:\"slider_visibility\";b:1;s:10:\"custom_css\";b:0;s:31:\"header_top_gradient_start_color\";s:6:\"272727\";s:29:\"header_top_gradient_end_color\";s:6:\"272727\";s:34:\"header_bottom_gradient_start_color\";s:6:\"1e1e1e\";s:32:\"header_bottom_gradient_end_color\";s:6:\"1e1e1e\";s:17:\"header_text_color\";s:6:\"B4B1AB\";s:16:\"header_text_size\";s:2:\"14\";s:23:\"header_text_hover_color\";s:6:\"d2404d\";s:29:\"header_selected_menu_bg_color\";s:6:\"C0C0C0\";s:31:\"header_selected_menu_text_color\";s:6:\"d2404d\";s:13:\"header_slogan\";s:23:\"Default welcome message\";}s:12:\"home_details\";a:2:{s:19:\"cat_list_to_display\";a:0:{}s:30:\"cat_collection_list_to_display\";a:0:{}}s:14:\"footer_details\";a:2:{s:27:\"footer_about_us_description\";s:21:\"Your description here\";s:13:\"follow_us_url\";a:7:{s:2:\"fb\";s:0:\"\";s:7:\"twitter\";s:0:\"\";s:8:\"linkedin\";s:0:\"\";s:8:\"dribbble\";s:0:\"\";s:11:\"google_plus\";s:0:\"\";s:9:\"instagram\";s:0:\"\";s:7:\"youtube\";s:0:\"\";}}}s:6:\"header\";s:9:\"ice-cream\";s:4:\"home\";s:8:\"customfy\";s:8:\"products\";s:5:\"crazy\";s:14:\"single_product\";s:5:\"crazy\";s:5:\"blogs\";s:5:\"crazy\";}', '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(6, '_permissions_files_list', 'a:38:{s:17:\"pages_list_access\";s:17:\"Pages list access\";s:21:\"add_edit_delete_pages\";s:21:\"Add/edit/delete pages\";s:17:\"list_blogs_access\";s:16:\"Blog list access\";s:20:\"add_edit_delete_blog\";s:20:\"Add/edit/delete blog\";s:18:\"blog_comments_list\";s:20:\"Blog comments access\";s:22:\"blog_categories_access\";s:31:\"Add/edit/delete blog categories\";s:23:\"testimonial_list_access\";s:23:\"Testimonial list access\";s:27:\"add_edit_delete_testimonial\";s:27:\"Add/edit/delete testimonial\";s:18:\"brands_list_access\";s:25:\"Manufacturers list access\";s:22:\"add_edit_delete_brands\";s:29:\"Add/edit/delete manufacturers\";s:15:\"manage_seo_full\";s:22:\"Manage SEO full access\";s:20:\"products_list_access\";s:20:\"Products list access\";s:23:\"add_edit_delete_product\";s:23:\"Add/edit/delete product\";s:25:\"product_categories_access\";s:35:\"Add/edit/delete products categories\";s:19:\"product_tags_access\";s:29:\"Add/edit/delete products tags\";s:25:\"product_attributes_access\";s:35:\"Add/edit/delete products attributes\";s:21:\"product_colors_access\";s:31:\"Add/edit/delete products colors\";s:20:\"product_sizes_access\";s:30:\"Add/edit/delete products sizes\";s:29:\"products_comments_list_access\";s:29:\"Products comments list access\";s:18:\"manage_orders_list\";s:25:\"Manage orders list access\";s:19:\"manage_reports_list\";s:26:\"Manage reports list access\";s:19:\"vendors_list_access\";s:19:\"Vendors list access\";s:23:\"vendors_withdraw_access\";s:23:\"Vendors withdraw access\";s:29:\"vendors_refund_request_access\";s:29:\"Vendors refund request access\";s:30:\"vendors_earning_reports_access\";s:30:\"Vendors earning reports access\";s:27:\"vendors_announcement_access\";s:27:\"Vendors announcement access\";s:15:\"vendor_settings\";s:8:\"settings\";s:28:\"vendors_packages_full_access\";s:33:\"Vendors packages menu full access\";s:28:\"vendors_packages_list_access\";s:28:\"Vendors packages list access\";s:30:\"vendors_packages_create_access\";s:30:\"Vendors packages create access\";s:34:\"manage_shipping_method_menu_access\";s:34:\"Manage shipping method full access\";s:33:\"manage_payment_method_menu_access\";s:33:\"Manage payment method full access\";s:36:\"manage_designer_elements_menu_access\";s:43:\"Manage custom designer elements full access\";s:25:\"manage_coupon_menu_access\";s:33:\"Manage coupon manager full access\";s:27:\"manage_settings_menu_access\";s:27:\"Manage settings full access\";s:36:\"manage_requested_product_menu_access\";s:35:\"Manage request products full access\";s:31:\"manage_subscription_menu_access\";s:31:\"Manage subscription full access\";s:28:\"manage_extra_features_access\";s:33:\"Manage extra features full access\";}', '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(7, '_seo_data', 'a:1:{s:8:\"meta_tag\";a:2:{s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";}}', '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(8, '_subscription_data', 'a:1:{s:9:\"mailchimp\";a:2:{s:7:\"api_key\";s:0:\"\";s:7:\"list_id\";s:0:\"\";}}', '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(9, '_subscription_settings_data', 'a:9:{s:23:\"subscription_visibility\";b:1;s:14:\"subscribe_type\";s:9:\"mailchimp\";s:17:\"subscribe_options\";s:10:\"name_email\";s:14:\"popup_bg_color\";s:6:\"f5f5f5\";s:13:\"popup_content\";s:0:\"\";s:18:\"popup_display_page\";a:2:{i:0;s:4:\"home\";i:1;s:4:\"shop\";}s:18:\"subscribe_btn_text\";s:13:\"Subscribe Now\";s:37:\"subscribe_popup_cookie_set_visibility\";b:1;s:31:\"subscribe_popup_cookie_set_text\";s:31:\"No thanks, i am not interested!\";}', '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(10, '_vendor_settings_data', 'a:1:{s:17:\"term_n_conditions\";s:222:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.\";}', '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(11, '_emails_notification_data', 'a:10:{s:9:\"new_order\";a:5:{s:14:\"enable_disable\";b:1;s:7:\"subject\";s:36:\"Your order receipt from #date_place#\";s:13:\"email_heading\";s:24:\"Thank you for your order\";s:13:\"body_bg_color\";s:7:\"#f5f5f5\";s:17:\"selected_template\";s:10:\"template-3\";}s:15:\"cancelled_order\";a:4:{s:14:\"enable_disable\";b:1;s:7:\"subject\";s:15:\"Cancelled order\";s:13:\"email_heading\";s:15:\"Cancelled order\";s:13:\"body_bg_color\";s:7:\"#f5f5f5\";}s:15:\"processed_order\";a:4:{s:14:\"enable_disable\";b:1;s:7:\"subject\";s:35:\"Order #order_id# has been Processed\";s:13:\"email_heading\";s:15:\"Processed order\";s:13:\"body_bg_color\";s:7:\"#f5f5f5\";}s:15:\"completed_order\";a:4:{s:14:\"enable_disable\";b:1;s:7:\"subject\";s:33:\"Your Order #order_id# is complete\";s:13:\"email_heading\";s:22:\"Your order is complete\";s:13:\"body_bg_color\";s:7:\"#f5f5f5\";}s:20:\"new_customer_account\";a:4:{s:14:\"enable_disable\";b:1;s:7:\"subject\";s:28:\"Successfully created account\";s:13:\"email_heading\";s:24:\"Customer account created\";s:13:\"body_bg_color\";s:7:\"#f5f5f5\";}s:18:\"vendor_new_account\";a:4:{s:14:\"enable_disable\";b:1;s:7:\"subject\";s:28:\"Successfully created account\";s:13:\"email_heading\";s:22:\"Vendor account created\";s:13:\"body_bg_color\";s:7:\"#f5f5f5\";}s:25:\"vendor_account_activation\";a:4:{s:14:\"enable_disable\";b:1;s:7:\"subject\";s:14:\"account status\";s:13:\"email_heading\";s:25:\"Vendor account activation\";s:13:\"body_bg_color\";s:7:\"#f5f5f5\";}s:23:\"vendor_withdraw_request\";a:4:{s:14:\"enable_disable\";b:1;s:7:\"subject\";s:40:\"Your Request for Withdrawal was Received\";s:13:\"email_heading\";s:16:\"Withdraw request\";s:13:\"body_bg_color\";s:7:\"#f5f5f5\";}s:33:\"vendor_withdraw_request_cancelled\";a:4:{s:14:\"enable_disable\";b:1;s:7:\"subject\";s:35:\"Withdraw request has been cancelled\";s:13:\"email_heading\";s:0:\"\";s:13:\"body_bg_color\";s:7:\"#f5f5f5\";}s:33:\"vendor_withdraw_request_completed\";a:4:{s:14:\"enable_disable\";b:1;s:7:\"subject\";s:35:\"Withdraw request has been completed\";s:13:\"email_heading\";s:0:\"\";s:13:\"body_bg_color\";s:7:\"#f5f5f5\";}}', '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(12, '_menu_data', '[{\"status\":\"enable\",\"label\":\"home|simple##0\"},{\"status\":\"enable\",\"label\":\"collection|simple##0\"},{\"status\":\"enable\",\"label\":\"products|simple##0\"},{\"status\":\"enable\",\"label\":\"checkout|simple##0\"},{\"status\":\"enable\",\"label\":\"cart|simple##0\"},{\"status\":\"enable\",\"label\":\"blog|simple##0\"},{\"status\":\"enable\",\"label\":\"store_list|simple##0\"},{\"status\":\"enable\",\"label\":\"pages|simple##0\"}]', '2019-11-03 23:03:55', '2019-11-03 23:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

DROP TABLE IF EXISTS `orders_items`;
CREATE TABLE IF NOT EXISTS `orders_items` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
CREATE TABLE IF NOT EXISTS `order_products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_author_id` int(10) UNSIGNED NOT NULL,
  `post_content` longtext COLLATE utf8mb4_unicode_ci,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `post_status` int(10) UNSIGNED NOT NULL,
  `post_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_extras`
--

DROP TABLE IF EXISTS `post_extras`;
CREATE TABLE IF NOT EXISTS `post_extras` (
  `post_extra_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(10) UNSIGNED NOT NULL,
  `key_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_extra_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `author_id` int(10) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `sku` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regular_price` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_qty` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_availability` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `author_id`, `content`, `title`, `slug`, `status`, `sku`, `regular_price`, `sale_price`, `price`, `stock_qty`, `stock_availability`, `type`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 1, '&lt;p&gt;The perfect travel companion&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;High Quality processed classic Weekender made of particularly high-quality BRABUS Mastik leather with contrast stitching.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;Solid Trolley linkage retractable sideward&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;Removable shoulder strap, adjustable with extra padding&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;Practical inside pockets, lockable with zip fastening for stowing valuable items fast and safe&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;Handmade in Germany exclusive for BRABUS.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;', 'BRABUS WEEKENDER NIGHTBLUE/PORCELAIN', 'brabus-weekender-nightblueporcelain', 1, '', '', '', NULL, '10', 'in_stock', 'simple_product', '/public/uploads/1591812065-h-250-BRABUS-bags_0011_WhatsApp-Image-2019-09-12-at-6.57.21-AM-(3).png', '2020-06-10 17:05:04', '2020-06-10 17:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_extras`
--

DROP TABLE IF EXISTS `product_extras`;
CREATE TABLE IF NOT EXISTS `product_extras` (
  `product_extra_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED NOT NULL,
  `key_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_extra_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_extras`
--

INSERT INTO `product_extras` (`product_extra_id`, `product_id`, `key_name`, `key_value`, `created_at`, `updated_at`) VALUES
(1, 1, '_product_related_images_url', '{\"product_image\":\"/public/uploads/1591812065-h-250-BRABUS-bags_0011_WhatsApp-Image-2019-09-12-at-6.57.21-AM-(3).png\",\"product_gallery_images\":[{\"id\":\"73AEFBA3-E4EB-4C8C-9477-3929499C03B0\",\"url\":\"/public/uploads/01591812078-h-250-BRABUS-bags_0016_WhatsApp-Image-2019-09-12-at-6.57.18-AM.png\"}],\"shop_banner_image\":\"\"}', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(2, 1, '_product_sale_price_start_date', '', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(3, 1, '_product_sale_price_end_date', '', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(4, 1, '_product_manage_stock', 'yes', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(5, 1, '_product_manage_stock_back_to_order', 'not_allow', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(6, 1, '_product_extra_features', '', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(7, 1, '_product_enable_as_recommended', 'yes', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(8, 1, '_product_enable_as_features', 'yes', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(9, 1, '_product_enable_as_latest', 'yes', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(10, 1, '_product_enable_as_related', 'yes', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(11, 1, '_product_enable_as_custom_design', 'yes', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(12, 1, '_product_enable_as_selected_cat', 'yes', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(13, 1, '_product_enable_taxes', 'no', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(14, 1, '_product_custom_designer_settings', 'a:3:{s:16:\"canvas_dimension\";a:3:{s:13:\"small_devices\";a:2:{s:5:\"width\";i:280;s:6:\"height\";i:300;}s:14:\"medium_devices\";a:2:{s:5:\"width\";i:480;s:6:\"height\";i:480;}s:13:\"large_devices\";a:2:{s:5:\"width\";i:500;s:6:\"height\";i:550;}}s:25:\"enable_layout_at_frontend\";s:2:\"no\";s:22:\"enable_global_settings\";s:2:\"no\";}', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(15, 1, '_product_custom_designer_data', NULL, '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(16, 1, '_product_enable_reviews', 'yes', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(17, 1, '_product_enable_reviews_add_link_to_product_page', 'yes', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(18, 1, '_product_enable_reviews_add_link_to_details_page', 'yes', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(19, 1, '_product_enable_video_feature', 'no', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(20, 1, '_product_video_feature_display_mode', 'content', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(21, 1, '_product_video_feature_title', NULL, '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(22, 1, '_product_video_feature_panel_size', 'a:2:{s:5:\"width\";N;s:6:\"height\";N;}', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(23, 1, '_product_video_feature_source', '', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(24, 1, '_product_video_feature_source_embedded_code', NULL, '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(25, 1, '_product_video_feature_source_online_url', NULL, '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(26, 1, '_product_enable_manufacturer', 'no', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(27, 1, '_product_enable_visibility_schedule', 'no', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(28, 1, '_product_seo_title', 'BRABUS WEEKENDER NIGHTBLUE/PORCELAIN', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(29, 1, '_product_seo_description', '', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(30, 1, '_product_seo_keywords', '', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(31, 1, '_product_compare_data', 'N;', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(32, 1, '_is_role_based_pricing_enable', 'no', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(33, 1, '_role_based_pricing', 'a:3:{s:13:\"administrator\";a:2:{s:13:\"regular_price\";N;s:10:\"sale_price\";s:0:\"\";}s:9:\"site-user\";a:2:{s:13:\"regular_price\";N;s:10:\"sale_price\";s:0:\"\";}s:6:\"vendor\";a:2:{s:13:\"regular_price\";N;s:10:\"sale_price\";s:0:\"\";}}', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(34, 1, '_downloadable_product_files', 'a:0:{}', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(35, 1, '_downloadable_product_download_limit', '', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(36, 1, '_downloadable_product_download_expiry', '', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(37, 1, '_upsell_products', 'a:0:{}', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(38, 1, '_crosssell_products', 'a:0:{}', '2020-06-10 17:05:04', '2020-06-10 17:05:04'),
(39, 1, '_selected_vendor', '1', '2020-06-10 17:05:04', '2020-06-10 17:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `request_products`
--

DROP TABLE IF EXISTS `request_products`;
CREATE TABLE IF NOT EXISTS `request_products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator', '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(2, 'Site User', 'site-user', '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(3, 'Vendor', 'vendor', '2019-11-03 23:03:55', '2019-11-03 23:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-11-03 23:03:55', '2019-11-03 23:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `save_custom_designs`
--

DROP TABLE IF EXISTS `save_custom_designs`;
CREATE TABLE IF NOT EXISTS `save_custom_designs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED NOT NULL,
  `design_data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

DROP TABLE IF EXISTS `terms`;
CREATE TABLE IF NOT EXISTS `terms` (
  `term_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`term_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `name`, `slug`, `type`, `parent`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Brabus', 'brabus', 'product_brands', 0, 1, '2020-06-10 16:49:23', '2020-06-10 16:49:23'),
(2, 'Fashion', 'fashion', 'product_cat', 0, 1, '2020-06-10 16:51:10', '2020-06-10 16:51:10'),
(3, 'Fresh Fruits', 'fresh-fruits', 'product_cat', 0, 1, '2020-06-15 17:37:23', '2020-06-15 17:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `term_extras`
--

DROP TABLE IF EXISTS `term_extras`;
CREATE TABLE IF NOT EXISTS `term_extras` (
  `term_extra_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `term_id` int(10) UNSIGNED NOT NULL,
  `key_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`term_extra_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `term_extras`
--

INSERT INTO `term_extras` (`term_extra_id`, `term_id`, `key_name`, `key_value`, `created_at`, `updated_at`) VALUES
(1, 1, '_brand_country_name', 'USA', '2020-06-10 16:49:23', '2020-06-10 16:49:23'),
(2, 1, '_brand_short_description', '&lt;p&gt;This is a brabus content&lt;/p&gt;', '2020-06-10 16:49:23', '2020-06-10 16:49:23'),
(3, 1, '_brand_logo_img_url', '/public/uploads/1591811356-h-80-banner 01 v2 (1).jpg', '2020-06-10 16:49:23', '2020-06-10 16:49:23'),
(4, 2, '_category_description', 'This is the fashion category', '2020-06-10 16:51:10', '2020-06-10 16:51:10'),
(5, 2, '_category_img_url', '/public/uploads/1591811460-h-150-banner.jpg', '2020-06-10 16:51:10', '2020-06-10 16:51:10'),
(6, 3, '_category_description', 'This is a test', '2020-06-15 17:37:23', '2020-06-15 17:37:23'),
(7, 3, '_category_img_url', '/public/uploads/1592246238-h-150-CBN 01_.png', '2020-06-15 17:37:23', '2020-06-15 17:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_photo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_status` int(10) UNSIGNED NOT NULL,
  `secret_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `display_name`, `name`, `email`, `password`, `user_photo_url`, `user_status`, `secret_key`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '$2y$10$FKv.9CUljNS/8GkbYfwGoeW4k0DBT9N8dnATVXVMZIAu5JGKVFSKK', '', 1, '$2y$10$xW53MN8gc4td4lkT1vNbGe1/5ldF6hJC7oUWTwVH6qTiBHdpXYMAq', '2019-11-03 23:03:55', '2019-11-03 23:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `users_custom_designs`
--

DROP TABLE IF EXISTS `users_custom_designs`;
CREATE TABLE IF NOT EXISTS `users_custom_designs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `access_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `design_images` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `design_data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

DROP TABLE IF EXISTS `users_details`;
CREATE TABLE IF NOT EXISTS `users_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_details`
--

INSERT INTO `users_details` (`id`, `user_id`, `details`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"profile_details\":{\"store_name\":\"admin\",\"address_line_1\":\"address 1\",\"address_line_2\":\"address 2\",\"city\":\"city\",\"state\":\"state\",\"country\":\"country\",\"zip_postal_code\":2210,\"phone\":123456},\"general_details\":{\"cover_img\":\"\",\"vendor_home_page_cats\":\"\",\"google_map_app_key\":\"\",\"latitude\":\"-25.363\",\"longitude\":\"131.044\"},\"social_media\":{\"fb_follow_us_url\":\"\",\"twitter_follow_us_url\":\"\",\"linkedin_follow_us_url\":\"\",\"dribbble_follow_us_url\":\"\",\"google_plus_follow_us_url\":\"\",\"instagram_follow_us_url\":\"\",\"youtube_follow_us_url\":\"\"}}', '2019-11-03 23:03:55', '2019-11-03 23:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_permissions`
--

DROP TABLE IF EXISTS `user_role_permissions`;
CREATE TABLE IF NOT EXISTS `user_role_permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(10) UNSIGNED NOT NULL,
  `permissions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role_permissions`
--

INSERT INTO `user_role_permissions` (`id`, `role_id`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 1, 'a:44:{i:0;s:17:\"manage_pages_full\";i:1;s:17:\"pages_list_access\";i:2;s:21:\"add_edit_delete_pages\";i:3;s:24:\"manage_blog_manager_full\";i:4;s:17:\"list_blogs_access\";i:5;s:20:\"add_edit_delete_blog\";i:6;s:18:\"blog_comments_list\";i:7;s:22:\"blog_categories_access\";i:8;s:23:\"manage_testimonial_full\";i:9;s:23:\"testimonial_list_access\";i:10;s:27:\"add_edit_delete_testimonial\";i:11;s:18:\"manage_brands_full\";i:12;s:18:\"brands_list_access\";i:13;s:22:\"add_edit_delete_brands\";i:14;s:15:\"manage_seo_full\";i:15;s:20:\"manage_products_full\";i:16;s:20:\"products_list_access\";i:17;s:23:\"add_edit_delete_product\";i:18;s:25:\"product_categories_access\";i:19;s:19:\"product_tags_access\";i:20;s:25:\"product_attributes_access\";i:21;s:21:\"product_colors_access\";i:22;s:20:\"product_sizes_access\";i:23;s:29:\"products_comments_list_access\";i:24;s:18:\"manage_orders_list\";i:25;s:19:\"manage_reports_list\";i:26;s:19:\"vendors_access_full\";i:27;s:19:\"vendors_list_access\";i:28;s:23:\"vendors_withdraw_access\";i:29;s:29:\"vendors_refund_request_access\";i:30;s:30:\"vendors_earning_reports_access\";i:31;s:27:\"vendors_announcement_access\";i:32;s:15:\"vendor_settings\";i:33;s:28:\"vendors_packages_full_access\";i:34;s:28:\"vendors_packages_list_access\";i:35;s:30:\"vendors_packages_create_access\";i:36;s:34:\"manage_shipping_method_menu_access\";i:37;s:33:\"manage_payment_method_menu_access\";i:38;s:36:\"manage_designer_elements_menu_access\";i:39;s:25:\"manage_coupon_menu_access\";i:40;s:27:\"manage_settings_menu_access\";i:41;s:36:\"manage_requested_product_menu_access\";i:42;s:31:\"manage_subscription_menu_access\";i:43;s:28:\"manage_extra_features_access\";}', '2019-11-03 23:03:56', '2019-11-03 23:03:56'),
(2, 3, 'a:13:{i:0;s:15:\"manage_seo_full\";i:1;s:20:\"manage_products_full\";i:2;s:20:\"products_list_access\";i:3;s:23:\"add_edit_delete_product\";i:4;s:29:\"products_comments_list_access\";i:5;s:18:\"manage_orders_list\";i:6;s:19:\"manage_reports_list\";i:7;s:34:\"manage_shipping_method_menu_access\";i:8;s:33:\"manage_payment_method_menu_access\";i:9;s:25:\"manage_coupon_menu_access\";i:10;s:23:\"vendors_withdraw_access\";i:11;s:36:\"manage_requested_product_menu_access\";i:12;s:28:\"manage_extra_features_access\";}', '2019-11-03 23:03:56', '2019-11-03 23:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_announcements`
--

DROP TABLE IF EXISTS `vendor_announcements`;
CREATE TABLE IF NOT EXISTS `vendor_announcements` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_orders`
--

DROP TABLE IF EXISTS `vendor_orders`;
CREATE TABLE IF NOT EXISTS `vendor_orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `order_total` double(11,2) NOT NULL,
  `net_amount` double(11,2) NOT NULL,
  `order_status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_packages`
--

DROP TABLE IF EXISTS `vendor_packages`;
CREATE TABLE IF NOT EXISTS `vendor_packages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `package_type` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vendor_packages_package_type_unique` (`package_type`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_packages`
--

INSERT INTO `vendor_packages` (`id`, `package_type`, `options`, `created_at`, `updated_at`) VALUES
(1, 'Default', '{\"max_number_product\":100,\"show_map_on_store_page\":true,\"show_social_media_follow_btn_on_store_page\":true,\"show_social_media_share_btn_on_store_page\":true,\"show_contact_form_on_store_page\":true,\"vendor_expired_date_type\":\"lifetime\",\"vendor_custom_expired_date\":\"\",\"vendor_commission\":20,\"min_withdraw_amount\":50}', '2019-11-03 23:03:55', '2019-11-03 23:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_totals`
--

DROP TABLE IF EXISTS `vendor_totals`;
CREATE TABLE IF NOT EXISTS `vendor_totals` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `totals` double(11,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_withdraws`
--

DROP TABLE IF EXISTS `vendor_withdraws`;
CREATE TABLE IF NOT EXISTS `vendor_withdraws` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `custom_amount` double(8,2) NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
