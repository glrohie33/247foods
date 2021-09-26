-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2020 at 08:50 AM
-- Server version: 5.7.14
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `affiliate_settings`
--

CREATE TABLE `affiliate_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `affialiateType` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `api_tokens`
--

CREATE TABLE `api_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `permissions` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_tokens`
--

INSERT INTO `api_tokens` (`id`, `title`, `user_id`, `permissions`, `token`, `created_at`, `updated_at`) VALUES
(1, 'test', 1, 'read', 'pXO5K877NfE0ynOKFABISBpcPjBv5SonazrmFPPAaIS53eecrNx7vterA3hq', '2020-06-08 06:22:19', '2020-06-08 06:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(10) UNSIGNED NOT NULL,
  `object_id` int(10) UNSIGNED NOT NULL,
  `target` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_currency_values`
--

CREATE TABLE `custom_currency_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `currency_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_value` double(11,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_areas`
--

CREATE TABLE `delivery_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_zone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone_areas` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sameday_delivery` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weekend_delivery` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_days` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_hour` time NOT NULL,
  `end_hour` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_areas`
--

INSERT INTO `delivery_areas` (`id`, `delivery_zone`, `zone_areas`, `sameday_delivery`, `weekend_delivery`, `min_days`, `start_hour`, `end_hour`, `created_at`, `updated_at`) VALUES
(1, 'Main Land', 'ikeja,ogba,agege', 'yes', 'yes', '2', '07:00:00', '17:00:00', NULL, '2020-06-23 11:39:43'),
(2, 'Lagos island', 'lekki,yaba', 'yes', 'yes', '3', '07:00:00', '20:07:00', '2020-06-23 09:24:31', '2020-06-23 09:24:31'),
(3, 'Lagos Island 2', 'victoria island', 'no', 'yes', '2', '07:00:00', '16:30:00', '2020-06-23 09:54:41', '2020-06-23 11:41:18'),
(4, 'Ogun', 'ikorodu,ogijo', 'yes', 'yes', '4', '07:00:00', '03:00:00', '2020-06-23 09:56:27', '2020-06-23 09:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `download_extras`
--

CREATE TABLE `download_extras` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manage_languages`
--

CREATE TABLE `manage_languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_sample_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `default_lang` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manage_languages`
--

INSERT INTO `manage_languages` (`id`, `lang_name`, `lang_code`, `lang_sample_img`, `status`, `default_lang`, `created_at`, `updated_at`) VALUES
(1, 'english', 'en', 'en_lang_sample_img.png', 1, 1, '2019-11-03 23:03:55', '2019-11-03 23:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_000036_create_api_tokens_table', 1),
(3, '2014_10_12_263536_create_order_products_table', 1),
(4, '2015_12_05_184931_create_roles_table', 1),
(5, '2015_12_05_185011_create_role_user_table', 1),
(6, '2015_12_05_190659_create_options_table', 1),
(7, '2016_01_01_022900_create_posts_table', 1),
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
(29, '2018_01_01_172638_create_vendor_totals_table', 1),
(30, '2020_06_16_175618_create_affiliate_settings_table', 2),
(32, '2014_10_12_000000_create_users_table', 3),
(33, '2020_06_16_182202_create_delivery_areas_table', 4),
(34, '2016_01_01_022900_create_products_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `object_relationships`
--

CREATE TABLE `object_relationships` (
  `term_id` int(10) UNSIGNED NOT NULL,
  `object_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `object_relationships`
--

INSERT INTO `object_relationships` (`term_id`, `object_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-06-28 02:24:53', '2020-06-28 02:24:53'),
(2, 6, '2020-06-30 10:24:23', '2020-06-30 10:24:23'),
(3, 1, '2020-06-28 02:24:53', '2020-06-28 02:24:53'),
(3, 2, '2020-06-28 02:24:23', '2020-06-28 02:24:23'),
(3, 4, '2020-06-28 02:21:29', '2020-06-28 02:21:29'),
(3, 5, '2020-06-28 02:02:20', '2020-06-28 02:02:20'),
(3, 6, '2020-06-30 10:24:23', '2020-06-30 10:24:23'),
(9, 6, '2020-06-30 10:24:23', '2020-06-30 10:24:23'),
(13, 3, '2020-06-28 02:23:49', '2020-06-28 02:23:49'),
(14, 5, '2020-06-28 02:02:20', '2020-06-28 02:02:20'),
(15, 5, '2020-06-28 02:02:20', '2020-06-28 02:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `option_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `option_name`, `option_value`, `created_at`, `updated_at`) VALUES
(1, '_shipping_method_data', 'a:4:{s:15:"shipping_option";a:2:{s:15:"enable_shipping";b:1;s:12:"display_mode";s:8:"dropdown";}s:9:"flat_rate";a:3:{s:13:"enable_option";b:1;s:12:"method_title";s:9:"Flat Rate";s:11:"method_cost";N;}s:13:"free_shipping";a:3:{s:13:"enable_option";s:0:"";s:12:"method_title";s:13:"Free Shipping";s:12:"order_amount";s:0:"";}s:14:"local_delivery";a:4:{s:13:"enable_option";b:1;s:12:"method_title";s:14:"Local Delivery";s:8:"fee_type";s:10:"per_weight";s:12:"delivery_fee";s:3:"500";}}', '2019-11-03 23:03:55', '2020-06-28 02:25:51'),
(2, '_settings_data', 'a:1:{s:16:"general_settings";a:10:{s:15:"general_options";a:5:{s:10:"site_title";s:13:"247FoodMarket";s:13:"email_address";s:20:"yourEmail@domain.com";s:9:"site_logo";s:58:"/public/uploads/1593166275-h-40-247_Final_Logo_RGB_png.png";s:31:"allow_registration_for_frontend";b:1;s:26:"default_role_slug_for_site";s:9:"site-user";}s:13:"taxes_options";a:3:{s:13:"enable_status";s:1:"0";s:13:"apply_tax_for";s:11:"per_product";s:10:"tax_amount";N;}s:16:"checkout_options";a:2:{s:17:"enable_guest_user";b:1;s:17:"enable_login_user";b:1;}s:29:"downloadable_products_options";a:3:{s:17:"login_restriction";b:0;s:31:"grant_access_from_thankyou_page";b:1;s:23:"grant_access_from_email";b:0;}s:17:"recaptcha_options";a:7:{s:32:"enable_recaptcha_for_admin_login";b:0;s:31:"enable_recaptcha_for_user_login";b:0;s:38:"enable_recaptcha_for_user_registration";b:0;s:33:"enable_recaptcha_for_vendor_login";b:0;s:40:"enable_recaptcha_for_vendor_registration";b:0;s:20:"recaptcha_secret_key";N;s:18:"recaptcha_site_key";N;}s:19:"nexmo_config_option";a:6:{s:19:"enable_nexmo_option";b:0;s:9:"nexmo_key";N;s:12:"nexmo_secret";N;s:9:"number_to";N;s:11:"number_from";N;s:7:"message";N;}s:19:"fixer_config_option";a:1:{s:20:"fixer_api_access_key";N;}s:16:"currency_options";a:7:{s:13:"currency_name";s:3:"NGN";s:17:"currency_position";s:4:"left";s:18:"thousand_separator";s:1:",";s:17:"decimal_separator";s:1:".";s:18:"number_of_decimals";s:1:"2";s:26:"currency_conversion_method";N;s:17:"frontend_currency";a:1:{i:0;s:3:"NGN";}}s:19:"date_format_options";a:1:{s:11:"date_format";N;}s:25:"default_frontend_currency";a:1:{i:0;s:3:"NGN";}}}', '2019-11-03 23:03:55', '2020-06-26 09:11:27'),
(3, '_custom_designer_settings_data', 'a:1:{s:16:"general_settings";a:1:{s:16:"canvas_dimension";a:3:{s:13:"small_devices";a:2:{s:5:"width";i:280;s:6:"height";i:300;}s:14:"medium_devices";a:2:{s:5:"width";i:480;s:6:"height";i:480;}s:13:"large_devices";a:2:{s:5:"width";i:500;s:6:"height";i:550;}}}}', '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(4, '_payment_method_data', 'a:6:{s:14:"payment_option";a:1:{s:21:"enable_payment_method";s:3:"yes";}s:4:"bacs";a:5:{s:13:"enable_option";s:0:"";s:12:"method_title";s:20:"Direct Bank Transfer";s:18:"method_description";s:173:"Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won\'t be shipped until the funds have cleared in our account.";s:19:"method_instructions";s:173:"Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won\'t be shipped until the funds have cleared in our account.";s:15:"account_details";a:6:{s:12:"account_name";s:0:"";s:14:"account_number";s:0:"";s:9:"bank_name";s:0:"";s:10:"short_code";s:0:"";s:4:"iban";s:0:"";s:5:"swift";s:0:"";}}s:3:"cod";a:4:{s:13:"enable_option";s:3:"yes";s:12:"method_title";s:16:"Cash on Delivery";s:18:"method_description";s:28:"Pay with cash upon delivery.";s:19:"method_instructions";s:28:"Pay with cash upon delivery.";}s:6:"paypal";a:6:{s:13:"enable_option";s:0:"";s:12:"method_title";s:6:"Paypal";s:16:"paypal_client_id";s:0:"";s:13:"paypal_secret";s:0:"";s:28:"paypal_sandbox_enable_option";s:3:"yes";s:18:"method_description";s:85:"Pay via PayPal; you can pay with your credit card if you don\'t have a PayPal account.";}s:6:"stripe";a:8:{s:13:"enable_option";s:0:"";s:12:"method_title";s:6:"Stripe";s:15:"test_secret_key";s:0:"";s:20:"test_publishable_key";s:0:"";s:15:"live_secret_key";s:0:"";s:20:"live_publishable_key";s:0:"";s:25:"stripe_test_enable_option";s:3:"yes";s:18:"method_description";s:49:"Stripe is a simple way to accept payments online.";}s:9:"2checkout";a:7:{s:13:"enable_option";s:0:"";s:12:"method_title";s:9:"2Checkout";s:8:"sellerId";s:0:"";s:14:"publishableKey";s:0:"";s:10:"privateKey";s:0:"";s:21:"sandbox_enable_option";s:3:"yes";s:18:"method_description";s:52:"2Checkout is a simple way to accept payments online.";}}', '2019-11-03 23:03:55', '2020-06-23 17:13:20'),
(5, '_appearance_tab_data', 'a:7:{s:8:"settings";s:458:"{"header_slider_images_and_text":{"slider_images":[{"id":"13D8C382-EC31-4EA5-C889-87300F6706E1","url":"/public/uploads/01593214745w-1920-h-800-food-healthy-nature-red-46174.jpg"},{"id":"0B238FDC-1763-4AD1-AA73-213A27F8A19F","url":"/public/uploads/01593214919w-1920-h-800-background-2277_1280.jpg"},{"id":"0C379AA3-2FB8-4DFB-C097-B4B6D04D6287","url":"/public/uploads/01593214964w-1920-h-800-circle-citrus-citrus-fruit-close-up-216572.jpg"}],"slider_text":[]}}";s:16:"settings_details";a:4:{s:7:"general";a:20:{s:10:"custom_css";b:0;s:13:"body_bg_color";s:6:"D2D6DE";s:16:"filter_price_min";s:1:"0";s:16:"filter_price_max";s:4:"1000";s:22:"sidebar_panel_bg_color";s:6:"F2F0F1";s:30:"sidebar_panel_title_text_color";s:6:"333333";s:44:"sidebar_panel_title_text_bottom_border_color";s:6:"1FC0A0";s:34:"sidebar_panel_title_text_font_size";s:2:"14";s:32:"sidebar_panel_content_text_color";s:6:"333333";s:36:"sidebar_panel_content_text_font_size";s:2:"12";s:20:"product_box_bg_color";s:6:"F2F0F1";s:24:"product_box_border_color";s:6:"E1E1E1";s:22:"product_box_text_color";s:6:"333333";s:26:"product_box_text_font_size";s:2:"13";s:24:"product_box_btn_bg_color";s:6:"1FC0A0";s:27:"product_box_btn_hover_color";s:6:"E1E1E1";s:14:"btn_text_color";s:6:"FFFFFF";s:20:"btn_hover_text_color";s:6:"444444";s:26:"selected_menu_border_color";s:6:"1FC0A0";s:32:"pages_content_title_border_color";s:6:"1FC0A0";}s:14:"header_details";a:12:{s:17:"slider_visibility";b:1;s:10:"custom_css";b:0;s:31:"header_top_gradient_start_color";s:6:"272727";s:29:"header_top_gradient_end_color";s:6:"272727";s:34:"header_bottom_gradient_start_color";N;s:32:"header_bottom_gradient_end_color";N;s:17:"header_text_color";s:6:"B4B1AB";s:16:"header_text_size";s:2:"14";s:23:"header_text_hover_color";s:6:"D2404D";s:29:"header_selected_menu_bg_color";s:6:"C0C0C0";s:31:"header_selected_menu_text_color";s:6:"D2404D";s:13:"header_slogan";N;}s:12:"home_details";a:2:{s:19:"cat_list_to_display";a:1:{i:0;s:1:"3";}s:30:"cat_collection_list_to_display";a:4:{i:0;s:1:"4";i:1;s:1:"5";i:2;s:1:"6";i:3;s:1:"7";}}s:14:"footer_details";a:2:{s:27:"footer_about_us_description";s:21:"Your description here";s:13:"follow_us_url";a:7:{s:2:"fb";N;s:7:"twitter";N;s:8:"linkedin";N;s:8:"dribbble";N;s:11:"google_plus";N;s:9:"instagram";N;s:7:"youtube";N;}}}s:6:"header";s:9:"ice-cream";s:4:"home";s:7:"awesome";s:8:"products";s:5:"crazy";s:14:"single_product";s:5:"crazy";s:5:"blogs";s:5:"crazy";}', '2019-11-03 23:03:55', '2020-06-27 10:21:54'),
(6, '_permissions_files_list', 'a:38:{s:17:"pages_list_access";s:17:"Pages list access";s:21:"add_edit_delete_pages";s:21:"Add/edit/delete pages";s:17:"list_blogs_access";s:16:"Blog list access";s:20:"add_edit_delete_blog";s:20:"Add/edit/delete blog";s:18:"blog_comments_list";s:20:"Blog comments access";s:22:"blog_categories_access";s:31:"Add/edit/delete blog categories";s:23:"testimonial_list_access";s:23:"Testimonial list access";s:27:"add_edit_delete_testimonial";s:27:"Add/edit/delete testimonial";s:18:"brands_list_access";s:25:"Manufacturers list access";s:22:"add_edit_delete_brands";s:29:"Add/edit/delete manufacturers";s:15:"manage_seo_full";s:22:"Manage SEO full access";s:20:"products_list_access";s:20:"Products list access";s:23:"add_edit_delete_product";s:23:"Add/edit/delete product";s:25:"product_categories_access";s:35:"Add/edit/delete products categories";s:19:"product_tags_access";s:29:"Add/edit/delete products tags";s:25:"product_attributes_access";s:35:"Add/edit/delete products attributes";s:21:"product_colors_access";s:31:"Add/edit/delete products colors";s:20:"product_sizes_access";s:30:"Add/edit/delete products sizes";s:29:"products_comments_list_access";s:29:"Products comments list access";s:18:"manage_orders_list";s:25:"Manage orders list access";s:19:"manage_reports_list";s:26:"Manage reports list access";s:19:"vendors_list_access";s:19:"Vendors list access";s:23:"vendors_withdraw_access";s:23:"Vendors withdraw access";s:29:"vendors_refund_request_access";s:29:"Vendors refund request access";s:30:"vendors_earning_reports_access";s:30:"Vendors earning reports access";s:27:"vendors_announcement_access";s:27:"Vendors announcement access";s:15:"vendor_settings";s:8:"settings";s:28:"vendors_packages_full_access";s:33:"Vendors packages menu full access";s:28:"vendors_packages_list_access";s:28:"Vendors packages list access";s:30:"vendors_packages_create_access";s:30:"Vendors packages create access";s:34:"manage_shipping_method_menu_access";s:34:"Manage shipping method full access";s:33:"manage_payment_method_menu_access";s:33:"Manage payment method full access";s:36:"manage_designer_elements_menu_access";s:43:"Manage custom designer elements full access";s:25:"manage_coupon_menu_access";s:33:"Manage coupon manager full access";s:27:"manage_settings_menu_access";s:27:"Manage settings full access";s:36:"manage_requested_product_menu_access";s:35:"Manage request products full access";s:31:"manage_subscription_menu_access";s:31:"Manage subscription full access";s:28:"manage_extra_features_access";s:33:"Manage extra features full access";}', '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(7, '_seo_data', 'a:1:{s:8:"meta_tag";a:2:{s:13:"meta_keywords";s:0:"";s:16:"meta_description";s:0:"";}}', '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(8, '_subscription_data', 'a:1:{s:9:"mailchimp";a:2:{s:7:"api_key";s:0:"";s:7:"list_id";s:0:"";}}', '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(9, '_subscription_settings_data', 'a:9:{s:23:"subscription_visibility";b:1;s:14:"subscribe_type";s:9:"mailchimp";s:17:"subscribe_options";s:10:"name_email";s:14:"popup_bg_color";s:6:"f5f5f5";s:13:"popup_content";s:0:"";s:18:"popup_display_page";a:2:{i:0;s:4:"home";i:1;s:4:"shop";}s:18:"subscribe_btn_text";s:13:"Subscribe Now";s:37:"subscribe_popup_cookie_set_visibility";b:1;s:31:"subscribe_popup_cookie_set_text";s:31:"No thanks, i am not interested!";}', '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(10, '_vendor_settings_data', 'a:1:{s:17:"term_n_conditions";s:222:"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.";}', '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(11, '_emails_notification_data', 'a:10:{s:9:"new_order";a:5:{s:14:"enable_disable";b:1;s:7:"subject";s:36:"Your order receipt from #date_place#";s:13:"email_heading";s:24:"Thank you for your order";s:13:"body_bg_color";s:7:"#f5f5f5";s:17:"selected_template";s:10:"template-3";}s:15:"cancelled_order";a:4:{s:14:"enable_disable";b:1;s:7:"subject";s:15:"Cancelled order";s:13:"email_heading";s:15:"Cancelled order";s:13:"body_bg_color";s:7:"#f5f5f5";}s:15:"processed_order";a:4:{s:14:"enable_disable";b:1;s:7:"subject";s:35:"Order #order_id# has been Processed";s:13:"email_heading";s:15:"Processed order";s:13:"body_bg_color";s:7:"#f5f5f5";}s:15:"completed_order";a:4:{s:14:"enable_disable";b:1;s:7:"subject";s:33:"Your Order #order_id# is complete";s:13:"email_heading";s:22:"Your order is complete";s:13:"body_bg_color";s:7:"#f5f5f5";}s:20:"new_customer_account";a:4:{s:14:"enable_disable";b:1;s:7:"subject";s:28:"Successfully created account";s:13:"email_heading";s:24:"Customer account created";s:13:"body_bg_color";s:7:"#f5f5f5";}s:18:"vendor_new_account";a:4:{s:14:"enable_disable";b:1;s:7:"subject";s:28:"Successfully created account";s:13:"email_heading";s:22:"Vendor account created";s:13:"body_bg_color";s:7:"#f5f5f5";}s:25:"vendor_account_activation";a:4:{s:14:"enable_disable";b:1;s:7:"subject";s:14:"account status";s:13:"email_heading";s:25:"Vendor account activation";s:13:"body_bg_color";s:7:"#f5f5f5";}s:23:"vendor_withdraw_request";a:4:{s:14:"enable_disable";b:1;s:7:"subject";s:40:"Your Request for Withdrawal was Received";s:13:"email_heading";s:16:"Withdraw request";s:13:"body_bg_color";s:7:"#f5f5f5";}s:33:"vendor_withdraw_request_cancelled";a:4:{s:14:"enable_disable";b:1;s:7:"subject";s:35:"Withdraw request has been cancelled";s:13:"email_heading";s:0:"";s:13:"body_bg_color";s:7:"#f5f5f5";}s:33:"vendor_withdraw_request_completed";a:4:{s:14:"enable_disable";b:1;s:7:"subject";s:35:"Withdraw request has been completed";s:13:"email_heading";s:0:"";s:13:"body_bg_color";s:7:"#f5f5f5";}}', '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(12, '_menu_data', '[{"status":"enable","label":"home|simple##0"},{"status":"enable","label":"collection|simple##0"},{"status":"enable","label":"products|simple##0"},{"status":"enable","label":"checkout|simple##0"},{"status":"enable","label":"cart|simple##0"},{"status":"enable","label":"blog|simple##0"},{"status":"enable","label":"store_list|simple##0"},{"status":"enable","label":"pages|simple##0"}]', '2019-11-03 23:03:55', '2019-11-03 23:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE `orders_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_items`
--

INSERT INTO `orders_items` (`id`, `order_id`, `order_data`, `created_at`, `updated_at`) VALUES
(1, 1, '{"1":{"id":1,"product_id":1,"name":"BRABUS WEEKENDER NIGHTBLUE\\/PORCELAIN","quantity":1,"price":"15000","order_price":"15000","img_src":"\\/public\\/uploads\\/1591812065-h-250-BRABUS-bags_0011_WhatsApp-Image-2019-09-12-at-6.57.21-AM-(3).png","variation_id":null,"options":[],"tax":false,"product_type":"simple_product","acces_token":"","designer_data":"\\"\\"","download_data":{"downloadable_product_download_limit":"","downloadable_product_download_expiry":""}}}', '2020-06-24 23:55:06', '2020-06-24 23:55:06'),
(2, 2, '{"2":{"id":2,"product_id":2,"name":"Red oranges","quantity":"1","price":"2977","order_price":"2977","img_src":"\\/public\\/uploads\\/1593218765-h-250-coconut-filled-with-slice-of-fruits-1030973.jpg","variation_id":null,"options":[],"tax":false,"product_type":"simple_product","acces_token":"","designer_data":"\\"\\"","product_weight":"0.5","download_data":{"downloadable_product_download_limit":"","downloadable_product_download_expiry":""}}}', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(3, 3, '{"3":{"id":3,"product_id":3,"name":"green grapes","quantity":1,"price":"2000","order_price":"2000","img_src":"\\/public\\/uploads\\/1593219976-h-250-green-grapes-on-marble-table-3987275.jpg","variation_id":null,"options":[],"tax":false,"product_type":"simple_product","acces_token":"","designer_data":"\\"\\"","product_weight":"1","download_data":{"downloadable_product_download_limit":"","downloadable_product_download_expiry":""}}}', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(4, 4, '{"1":{"id":1,"product_id":1,"name":"Pomeganate","quantity":"2","price":"15000","order_price":"15000","img_src":"\\/public\\/uploads\\/1593219589-h-250-round-yellow-and-red-fruits-1028598.jpg","variation_id":null,"options":[],"tax":false,"product_type":"simple_product","acces_token":"","designer_data":"\\"\\"","product_weight":"1","download_data":{"downloadable_product_download_limit":"","downloadable_product_download_expiry":""}}}', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(5, 5, '{"2":{"id":2,"product_id":2,"name":"Red oranges","quantity":1,"price":"2977","order_price":"2977","img_src":"\\/public\\/uploads\\/1593218765-h-250-coconut-filled-with-slice-of-fruits-1030973.jpg","variation_id":null,"options":[],"tax":false,"product_type":"simple_product","acces_token":"","designer_data":"\\"\\"","product_weight":"0.5","download_data":{"downloadable_product_download_limit":"","downloadable_product_download_expiry":""}}}', '2020-06-30 14:55:05', '2020-06-30 14:55:05'),
(6, 6, '{"3":{"id":3,"product_id":3,"name":"green grapes","quantity":1,"price":"2000","order_price":"2000","img_src":"\\/public\\/uploads\\/1593219976-h-250-green-grapes-on-marble-table-3987275.jpg","variation_id":null,"options":[],"tax":false,"product_type":"simple_product","acces_token":"","designer_data":"\\"\\"","product_weight":"1","download_data":{"downloadable_product_download_limit":"","downloadable_product_download_expiry":""}}}', '2020-06-30 21:37:20', '2020-06-30 21:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-06-24 23:55:06', '2020-06-24 23:55:06'),
(2, 2, 2, '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(3, 3, 3, '2020-06-30 06:55:47', '2020-06-30 06:55:47'),
(4, 4, 1, '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(5, 5, 2, '2020-06-30 14:55:05', '2020-06-30 14:55:05'),
(6, 6, 3, '2020-06-30 21:37:20', '2020-06-30 21:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_author_id` int(10) UNSIGNED NOT NULL,
  `post_content` longtext COLLATE utf8mb4_unicode_ci,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `post_status` int(10) UNSIGNED NOT NULL,
  `post_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_author_id`, `post_content`, `post_title`, `post_slug`, `parent_id`, `post_status`, `post_type`, `created_at`, `updated_at`) VALUES
(1, 1, 'Customer Shop Order', 'shop order', 'shop-order', 0, 1, 'shop_order', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(2, 1, 'Customer Shop Order', 'shop order', 'shop-order', 0, 1, 'shop_order', '2020-06-30 05:54:46', '2020-06-30 05:54:46'),
(3, 1, 'Customer Shop Order', 'shop order', 'shop-order', 0, 1, 'shop_order', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(4, 1, 'Customer Shop Order', 'shop order', 'shop-order', 0, 1, 'shop_order', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(5, 1, 'Customer Shop Order', 'shop order', 'shop-order', 0, 1, 'shop_order', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(6, 2, 'Customer Shop Order', 'shop order', 'shop-order', 0, 1, 'shop_order', '2020-06-30 21:37:19', '2020-06-30 21:37:19');

-- --------------------------------------------------------

--
-- Table structure for table `post_extras`
--

CREATE TABLE `post_extras` (
  `post_extra_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `key_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_extras`
--

INSERT INTO `post_extras` (`post_extra_id`, `post_id`, `key_name`, `key_value`, `created_at`, `updated_at`) VALUES
(1, 1, '_order_currency', 'NGN', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(2, 1, '_customer_ip_address', '::1', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(3, 1, '_customer_user_agent', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36 Edg/83.0.478.45', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(4, 1, '_customer_user', 'a:2:{s:9:"user_mode";s:5:"guest";s:7:"user_id";i:1;}', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(5, 1, '_order_shipping_cost', '0', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(6, 1, '_final_order_shipping_cost', '0', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(7, 1, '_order_shipping_method', '', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(8, 1, '_payment_method', 'cod', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(9, 1, '_payment_method_title', 'cod', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(10, 1, '_order_tax', '0', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(11, 1, '_final_order_tax', '0', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(12, 1, '_order_total', '15000', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(13, 1, '_final_order_total', '15000', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(14, 1, '_order_notes', NULL, '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(15, 1, '_order_status', 'on-hold', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(16, 1, '_order_discount', '0', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(17, 1, '_final_order_discount', '0', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(18, 1, '_order_coupon_code', '', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(19, 1, '_is_order_coupon_applyed', '0', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(20, 1, '_order_process_key', '15930465051546650146125223911', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(21, 1, '_billing_title', NULL, '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(22, 1, '_billing_first_name', 'owolabi', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(23, 1, '_billing_last_name', 'emmanuel', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(24, 1, '_billing_company', 'my company', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(25, 1, '_billing_email', 'opomulero@gmail.com', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(26, 1, '_billing_phone', '07086295741', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(27, 1, '_billing_fax', NULL, '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(28, 1, '_billing_country', 'NG', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(29, 1, '_billing_address_1', 'my address\r\nmy address', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(30, 1, '_billing_address_2', 'my address\r\nmy address', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(31, 1, '_billing_city', 'ilorin', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(32, 1, '_billing_postcode', '32443', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(33, 1, '_shipping_title', NULL, '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(34, 1, '_shipping_first_name', 'owolabi', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(35, 1, '_shipping_last_name', 'emmanuel', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(36, 1, '_shipping_company', 'my company', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(37, 1, '_shipping_email', 'opomulero@gmail.com', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(38, 1, '_shipping_phone', '07086295741', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(39, 1, '_shipping_fax', NULL, '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(40, 1, '_shipping_country', 'NG', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(41, 1, '_shipping_address_1', 'my address\r\nmy address', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(42, 1, '_shipping_address_2', 'my address\r\nmy address', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(43, 1, '_shipping_city', 'ilorin', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(44, 1, '_shipping_postcode', '32443', '2020-06-24 23:55:05', '2020-06-24 23:55:05'),
(45, 5, '_attribute_post_data', '[{"id":"D86B5E38-871B-4D04-E741-523AF95FE6DB","attr_name":"size","attr_val":"small,large"},{"id":"043DBD54-0F4C-41F1-9E78-B87ADAD92240","attr_name":"size ","attr_val":"large,small,medium"}]', '2020-06-27 21:10:32', '2020-06-27 21:23:05'),
(46, 2, '_order_currency', 'NGN', '2020-06-30 05:54:46', '2020-06-30 05:54:46'),
(47, 2, '_customer_ip_address', '::1', '2020-06-30 05:54:46', '2020-06-30 05:54:46'),
(48, 2, '_customer_user_agent', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36 Edg/83.0.478.56', '2020-06-30 05:54:46', '2020-06-30 05:54:46'),
(49, 2, '_customer_user', 'a:2:{s:9:"user_mode";s:5:"guest";s:7:"user_id";i:1;}', '2020-06-30 05:54:46', '2020-06-30 05:54:46'),
(50, 2, '_order_shipping_cost', '9000', '2020-06-30 05:54:46', '2020-06-30 05:54:46'),
(51, 2, '_final_order_shipping_cost', '9000', '2020-06-30 05:54:46', '2020-06-30 05:54:46'),
(52, 2, '_order_shipping_method', 'local_delivery', '2020-06-30 05:54:46', '2020-06-30 05:54:46'),
(53, 2, '_payment_method', 'cod', '2020-06-30 05:54:46', '2020-06-30 05:54:46'),
(54, 2, '_payment_method_title', 'cod', '2020-06-30 05:54:46', '2020-06-30 05:54:46'),
(55, 2, '_order_tax', '0', '2020-06-30 05:54:46', '2020-06-30 05:54:46'),
(56, 2, '_final_order_tax', '0', '2020-06-30 05:54:46', '2020-06-30 05:54:46'),
(57, 2, '_order_total', '11977', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(58, 2, '_final_order_total', '11977', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(59, 2, '_order_notes', NULL, '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(60, 2, '_order_status', 'on-hold', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(61, 2, '_order_discount', '0', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(62, 2, '_final_order_discount', '0', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(63, 2, '_order_coupon_code', '', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(64, 2, '_is_order_coupon_applyed', '0', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(65, 2, '_order_process_key', '15935000861170500921885812091', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(66, 2, '_billing_title', NULL, '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(67, 2, '_billing_first_name', 'owolabi', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(68, 2, '_billing_last_name', 'emmanuel', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(69, 2, '_billing_company', 'my company', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(70, 2, '_billing_email', 'opomulero@gmail.com', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(71, 2, '_billing_phone', '07086295741', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(72, 2, '_billing_fax', NULL, '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(73, 2, '_billing_country', 'NG', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(74, 2, '_billing_address_1', 'my address\r\nmy address', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(75, 2, '_billing_address_2', 'my address\r\nmy address', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(76, 2, '_billing_city', 'ilorin', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(77, 2, '_billing_postcode', '32443', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(78, 2, '_shipping_title', NULL, '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(79, 2, '_shipping_first_name', 'owolabi', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(80, 2, '_shipping_last_name', 'emmanuel', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(81, 2, '_shipping_company', 'my company', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(82, 2, '_shipping_email', 'opomulero@gmail.com', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(83, 2, '_shipping_phone', '07086295741', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(84, 2, '_shipping_fax', NULL, '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(85, 2, '_shipping_country', 'NG', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(86, 2, '_shipping_address_1', 'my address\r\nmy address', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(87, 2, '_shipping_address_2', 'my address\r\nmy address', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(88, 2, '_shipping_city', 'ilorin', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(89, 2, '_shipping_postcode', '32443', '2020-06-30 05:54:47', '2020-06-30 05:54:47'),
(90, 3, '_order_currency', 'NGN', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(91, 3, '_customer_ip_address', '::1', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(92, 3, '_customer_user_agent', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36 Edg/83.0.478.56', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(93, 3, '_customer_user', 'a:2:{s:9:"user_mode";s:5:"guest";s:7:"user_id";i:1;}', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(94, 3, '_order_shipping_cost', '500', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(95, 3, '_final_order_shipping_cost', '500', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(96, 3, '_order_shipping_method', 'local_delivery', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(97, 3, '_payment_method', 'cod', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(98, 3, '_payment_method_title', 'cod', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(99, 3, '_order_tax', '0', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(100, 3, '_final_order_tax', '0', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(101, 3, '_order_total', '2500', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(102, 3, '_final_order_total', '2500', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(103, 3, '_order_notes', NULL, '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(104, 3, '_order_status', 'on-hold', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(105, 3, '_order_discount', '0', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(106, 3, '_final_order_discount', '0', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(107, 3, '_order_coupon_code', '', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(108, 3, '_is_order_coupon_applyed', '0', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(109, 3, '_order_process_key', '159350374615373213501505950628', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(110, 3, '_billing_title', NULL, '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(111, 3, '_billing_first_name', 'owolabi', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(112, 3, '_billing_last_name', 'emmanuel', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(113, 3, '_billing_company', 'my company', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(114, 3, '_billing_email', 'glory@gmail.com', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(115, 3, '_billing_phone', '07086295741', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(116, 3, '_billing_fax', NULL, '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(117, 3, '_billing_country', 'NG', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(118, 3, '_billing_address_1', 'my address\r\nmy address', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(119, 3, '_billing_address_2', 'my address\r\nmy address', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(120, 3, '_billing_city', 'ilorin', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(121, 3, '_billing_postcode', '32443', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(122, 3, '_shipping_title', NULL, '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(123, 3, '_shipping_first_name', 'owolabi', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(124, 3, '_shipping_last_name', 'emmanuel', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(125, 3, '_shipping_company', 'my company', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(126, 3, '_shipping_email', 'glory@gmail.com', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(127, 3, '_shipping_phone', '07086295741', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(128, 3, '_shipping_fax', NULL, '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(129, 3, '_shipping_country', 'NG', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(130, 3, '_shipping_address_1', 'my address\r\nmy address', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(131, 3, '_shipping_address_2', 'my address\r\nmy address', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(132, 3, '_shipping_city', 'ilorin', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(133, 3, '_shipping_postcode', '32443', '2020-06-30 06:55:46', '2020-06-30 06:55:46'),
(134, 4, '_order_currency', 'NGN', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(135, 4, '_customer_ip_address', '::1', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(136, 4, '_customer_user_agent', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36 Edg/83.0.478.56', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(137, 4, '_customer_user', 'a:2:{s:9:"user_mode";s:5:"guest";s:7:"user_id";i:1;}', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(138, 4, '_order_shipping_cost', '1000', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(139, 4, '_final_order_shipping_cost', '1000', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(140, 4, '_order_shipping_method', 'local_delivery', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(141, 4, '_payment_method', 'cod', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(142, 4, '_payment_method_title', 'cod', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(143, 4, '_order_tax', '0', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(144, 4, '_final_order_tax', '0', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(145, 4, '_order_total', '31000', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(146, 4, '_final_order_total', '31000', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(147, 4, '_order_notes', NULL, '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(148, 4, '_order_status', 'on-hold', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(149, 4, '_order_discount', '0', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(150, 4, '_final_order_discount', '0', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(151, 4, '_order_coupon_code', '', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(152, 4, '_is_order_coupon_applyed', '0', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(153, 4, '_order_process_key', '159350842111587049711895340621', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(154, 4, '_billing_title', NULL, '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(155, 4, '_billing_first_name', 'owolabi', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(156, 4, '_billing_last_name', 'emmanuel', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(157, 4, '_billing_company', 'my company', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(158, 4, '_billing_email', 'aremuo@gmail.com', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(159, 4, '_billing_phone', '07086295741', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(160, 4, '_billing_fax', NULL, '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(161, 4, '_billing_country', 'NG', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(162, 4, '_billing_address_1', 'my address\r\nmy address', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(163, 4, '_billing_address_2', 'my address\r\nmy address', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(164, 4, '_billing_city', 'ilorin', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(165, 4, '_billing_postcode', '32443', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(166, 4, '_shipping_title', NULL, '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(167, 4, '_shipping_first_name', 'owolabi', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(168, 4, '_shipping_last_name', 'emmanuel', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(169, 4, '_shipping_company', 'my company', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(170, 4, '_shipping_email', 'aremuo@gmail.com', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(171, 4, '_shipping_phone', '07086295741', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(172, 4, '_shipping_fax', NULL, '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(173, 4, '_shipping_country', 'NG', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(174, 4, '_shipping_address_1', 'my address\r\nmy address', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(175, 4, '_shipping_address_2', 'my address\r\nmy address', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(176, 4, '_shipping_city', 'ilorin', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(177, 4, '_shipping_postcode', '32443', '2020-06-30 08:13:41', '2020-06-30 08:13:41'),
(178, 5, '_order_currency', 'NGN', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(179, 5, '_customer_ip_address', '::1', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(180, 5, '_customer_user_agent', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36 Edg/83.0.478.56', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(181, 5, '_customer_user', 'a:2:{s:9:"user_mode";s:5:"guest";s:7:"user_id";i:1;}', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(182, 5, '_order_shipping_cost', '250', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(183, 5, '_final_order_shipping_cost', '250', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(184, 5, '_order_shipping_method', 'local_delivery', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(185, 5, '_payment_method', 'paystack', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(186, 5, '_payment_method_title', 'paystack', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(187, 5, '_order_tax', '0', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(188, 5, '_final_order_tax', '0', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(189, 5, '_order_total', '3227', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(190, 5, '_final_order_total', '3227', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(191, 5, '_order_notes', NULL, '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(192, 5, '_delivery_area', 'ikeja', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(193, 5, '_delivery_zone', 'Main Land', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(194, 5, '_delivery_time', '16:42', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(195, 5, '_delivery_date', '2020-07-02', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(196, 5, '_order_status', 'on-hold', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(197, 5, '_order_discount', '0', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(198, 5, '_final_order_discount', '0', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(199, 5, '_order_coupon_code', '', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(200, 5, '_is_order_coupon_applyed', '0', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(201, 5, '_order_process_key', '15935325047416018311219237921', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(202, 5, '_billing_title', NULL, '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(203, 5, '_billing_first_name', 'owolabi', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(204, 5, '_billing_last_name', 'emmanuel', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(205, 5, '_billing_company', 'my company', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(206, 5, '_billing_email', 'aremuo@gmail.com', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(207, 5, '_billing_phone', '07086295741', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(208, 5, '_billing_fax', NULL, '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(209, 5, '_billing_country', 'NG', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(210, 5, '_billing_address_1', 'my address\r\nmy address', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(211, 5, '_billing_address_2', 'my address\r\nmy address', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(212, 5, '_billing_city', 'ilorin', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(213, 5, '_billing_postcode', '32443', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(214, 5, '_shipping_title', NULL, '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(215, 5, '_shipping_first_name', 'owolabi', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(216, 5, '_shipping_last_name', 'emmanuel', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(217, 5, '_shipping_company', 'my company', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(218, 5, '_shipping_email', 'aremuo@gmail.com', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(219, 5, '_shipping_phone', '07086295741', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(220, 5, '_shipping_fax', NULL, '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(221, 5, '_shipping_country', 'NG', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(222, 5, '_shipping_address_1', 'my address\r\nmy address', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(223, 5, '_shipping_address_2', 'my address\r\nmy address', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(224, 5, '_shipping_city', 'ilorin', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(225, 5, '_shipping_postcode', '32443', '2020-06-30 14:55:04', '2020-06-30 14:55:04'),
(226, 6, '_order_currency', 'NGN', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(227, 6, '_customer_ip_address', '::1', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(228, 6, '_customer_user_agent', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36 Edg/83.0.478.56', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(229, 6, '_customer_user', 'a:2:{s:9:"user_mode";s:5:"login";s:7:"user_id";i:2;}', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(230, 6, '_order_shipping_cost', '500', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(231, 6, '_final_order_shipping_cost', '500', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(232, 6, '_order_shipping_method', 'local_delivery', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(233, 6, '_payment_method', 'paystack', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(234, 6, '_payment_method_title', 'paystack', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(235, 6, '_order_tax', '0', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(236, 6, '_final_order_tax', '0', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(237, 6, '_order_total', '2500', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(238, 6, '_final_order_total', '2500', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(239, 6, '_order_notes', NULL, '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(240, 6, '_delivery_area', 'ikeja', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(241, 6, '_delivery_zone', 'Main Land', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(242, 6, '_delivery_time', '13:38', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(243, 6, '_delivery_date', '2020-07-02', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(244, 6, '_order_status', 'on-hold', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(245, 6, '_order_discount', '0', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(246, 6, '_final_order_discount', '0', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(247, 6, '_order_coupon_code', '', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(248, 6, '_is_order_coupon_applyed', '0', '2020-06-30 21:37:20', '2020-06-30 21:37:20'),
(249, 6, '_order_process_key', '159355663914114742631915974059', '2020-06-30 21:37:20', '2020-06-30 21:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `sku` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regular_price` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_weight` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_type` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_qty` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_availability` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `author_id`, `content`, `title`, `slug`, `status`, `sku`, `regular_price`, `sale_price`, `product_weight`, `product_type`, `price`, `stock_qty`, `stock_availability`, `type`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 1, '&lt;p&gt;The perfect travel companion&lt;/p&gt;&lt;p&gt;High Quality processed classic Weekender made of particularly high-quality BRABUS Mastik leather with contrast stitching.&lt;/p&gt;&lt;p&gt;Solid Trolley linkage retractable sideward&lt;/p&gt;&lt;p&gt;Removable shoulder strap, adjustable with extra padding&lt;/p&gt;&lt;p&gt;Practical inside pockets, lockable with zip fastening for stowing valuable items fast and safe&lt;/p&gt;&lt;p&gt;Handmade in Germany exclusive for BRABUS.&lt;/p&gt;', 'Pomeganate', 'brabus-weekender-nightblueporcelain', 1, '', '15000', '', '1', NULL, '15000', '7', 'in_stock', 'simple_product', '/public/uploads/1593219589-h-250-round-yellow-and-red-fruits-1028598.jpg', '2020-06-10 17:05:04', '2020-06-30 08:13:41'),
(2, 1, '&lt;p&gt;this is a red tomato it is awsome and it is good&lt;/p&gt;', 'Red oranges', 'red-tomato', 1, '', '2977', '', '0.5', NULL, '2977', '0', 'in_stock', 'simple_product', '/public/uploads/1593218765-h-250-coconut-filled-with-slice-of-fruits-1030973.jpg', '2020-06-25 18:20:40', '2020-06-28 02:24:20'),
(3, 1, '&lt;p&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;Lorem Ipsum&lt;/strong&gt;&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 'green grapes', 'green-grapes', 1, '', '2000', '', '1', NULL, '2000', '0', 'in_stock', 'simple_product', '/public/uploads/1593219976-h-250-green-grapes-on-marble-table-3987275.jpg', '2020-06-25 19:05:20', '2020-06-28 02:23:46'),
(4, 1, '', 'fresh grapes', 'fresh-grapes', 1, '', '2499', '', '2', NULL, '2499', '0', 'in_stock', 'simple_product', '/public/uploads/1593219693-h-250-fruits-in-a-plastic-bag-3645504.jpg', '2020-06-25 19:07:13', '2020-06-28 02:21:26'),
(5, 1, '', 'winw grapes', 'winw-grapes', 1, '', '500', '', '0', 'vendor', '500', '0', 'in_stock', 'simple_product', '/public/uploads/1593219807-h-250-sliced-orange-fruits-2090900.jpg', '2020-06-25 19:10:03', '2020-06-28 02:02:17'),
(6, 1, '&lt;p&gt;nice oranges&lt;/p&gt;', 'Oranges', 'oranges', 1, '', '3000', '2000', '0.8', 'local market', '2000', '0', 'in_stock', 'simple_product', '/public/uploads/1593220061-h-250-photo-of-pile-of-oranges-2294477.jpg', '2020-06-27 00:06:49', '2020-06-30 10:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_extras`
--

CREATE TABLE `product_extras` (
  `product_extra_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `key_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_extras`
--

INSERT INTO `product_extras` (`product_extra_id`, `product_id`, `key_name`, `key_value`, `created_at`, `updated_at`) VALUES
(1, 1, '_product_related_images_url', '{"product_image":"/public/uploads/1593219589-h-250-round-yellow-and-red-fruits-1028598.jpg","product_gallery_images":[],"shop_banner_image":""}', '2020-06-10 17:05:04', '2020-06-28 02:24:50'),
(2, 1, '_product_sale_price_start_date', '', '2020-06-10 17:05:04', '2020-06-28 02:24:50'),
(3, 1, '_product_sale_price_end_date', '', '2020-06-10 17:05:04', '2020-06-28 02:24:50'),
(4, 1, '_product_manage_stock', 'yes', '2020-06-10 17:05:04', '2020-06-28 02:24:50'),
(5, 1, '_product_manage_stock_back_to_order', 'not_allow', '2020-06-10 17:05:04', '2020-06-28 02:24:50'),
(6, 1, '_product_extra_features', '', '2020-06-10 17:05:04', '2020-06-28 02:24:50'),
(7, 1, '_product_enable_as_recommended', 'yes', '2020-06-10 17:05:04', '2020-06-28 02:24:50'),
(8, 1, '_product_enable_as_features', 'yes', '2020-06-10 17:05:04', '2020-06-28 02:24:50'),
(9, 1, '_product_enable_as_latest', 'yes', '2020-06-10 17:05:04', '2020-06-28 02:24:50'),
(10, 1, '_product_enable_as_related', 'yes', '2020-06-10 17:05:04', '2020-06-28 02:24:50'),
(11, 1, '_product_enable_as_custom_design', 'yes', '2020-06-10 17:05:04', '2020-06-28 02:24:50'),
(12, 1, '_product_enable_as_selected_cat', 'yes', '2020-06-10 17:05:04', '2020-06-28 02:24:50'),
(13, 1, '_product_enable_taxes', 'no', '2020-06-10 17:05:04', '2020-06-28 02:24:50'),
(14, 1, '_product_custom_designer_settings', 'a:3:{s:16:"canvas_dimension";a:3:{s:13:"small_devices";a:2:{s:5:"width";i:280;s:6:"height";i:300;}s:14:"medium_devices";a:2:{s:5:"width";i:480;s:6:"height";i:480;}s:13:"large_devices";a:2:{s:5:"width";i:500;s:6:"height";i:550;}}s:25:"enable_layout_at_frontend";s:2:"no";s:22:"enable_global_settings";s:2:"no";}', '2020-06-10 17:05:04', '2020-06-28 02:24:51'),
(15, 1, '_product_custom_designer_data', NULL, '2020-06-10 17:05:04', '2020-06-28 02:24:51'),
(16, 1, '_product_enable_reviews', 'yes', '2020-06-10 17:05:04', '2020-06-28 02:24:51'),
(17, 1, '_product_enable_reviews_add_link_to_product_page', 'yes', '2020-06-10 17:05:04', '2020-06-28 02:24:51'),
(18, 1, '_product_enable_reviews_add_link_to_details_page', 'yes', '2020-06-10 17:05:04', '2020-06-28 02:24:51'),
(19, 1, '_product_enable_video_feature', 'no', '2020-06-10 17:05:04', '2020-06-28 02:24:51'),
(20, 1, '_product_video_feature_display_mode', 'content', '2020-06-10 17:05:04', '2020-06-28 02:24:51'),
(21, 1, '_product_video_feature_title', NULL, '2020-06-10 17:05:04', '2020-06-28 02:24:51'),
(22, 1, '_product_video_feature_panel_size', 'a:2:{s:5:"width";N;s:6:"height";N;}', '2020-06-10 17:05:04', '2020-06-28 02:24:51'),
(23, 1, '_product_video_feature_source', '', '2020-06-10 17:05:04', '2020-06-28 02:24:51'),
(24, 1, '_product_video_feature_source_embedded_code', NULL, '2020-06-10 17:05:04', '2020-06-28 02:24:51'),
(25, 1, '_product_video_feature_source_online_url', NULL, '2020-06-10 17:05:04', '2020-06-28 02:24:51'),
(26, 1, '_product_enable_manufacturer', 'no', '2020-06-10 17:05:04', '2020-06-28 02:24:51'),
(27, 1, '_product_enable_visibility_schedule', 'no', '2020-06-10 17:05:04', '2020-06-28 02:24:52'),
(28, 1, '_product_seo_title', 'BRABUS WEEKENDER NIGHTBLUE/PORCELAIN', '2020-06-10 17:05:04', '2020-06-28 02:24:52'),
(29, 1, '_product_seo_description', '', '2020-06-10 17:05:04', '2020-06-28 02:24:52'),
(30, 1, '_product_seo_keywords', '', '2020-06-10 17:05:04', '2020-06-28 02:24:52'),
(31, 1, '_product_compare_data', 'N;', '2020-06-10 17:05:04', '2020-06-28 02:24:52'),
(32, 1, '_is_role_based_pricing_enable', 'no', '2020-06-10 17:05:04', '2020-06-28 02:24:52'),
(33, 1, '_role_based_pricing', 'a:3:{s:13:"administrator";a:2:{s:13:"regular_price";N;s:10:"sale_price";s:0:"";}s:9:"site-user";a:2:{s:13:"regular_price";N;s:10:"sale_price";s:0:"";}s:6:"vendor";a:2:{s:13:"regular_price";N;s:10:"sale_price";s:0:"";}}', '2020-06-10 17:05:04', '2020-06-28 02:24:52'),
(34, 1, '_downloadable_product_files', 'a:0:{}', '2020-06-10 17:05:04', '2020-06-28 02:24:52'),
(35, 1, '_downloadable_product_download_limit', '', '2020-06-10 17:05:04', '2020-06-28 02:24:52'),
(36, 1, '_downloadable_product_download_expiry', '', '2020-06-10 17:05:04', '2020-06-28 02:24:52'),
(37, 1, '_upsell_products', 'a:0:{}', '2020-06-10 17:05:04', '2020-06-28 02:24:52'),
(38, 1, '_crosssell_products', 'a:0:{}', '2020-06-10 17:05:04', '2020-06-28 02:24:52'),
(39, 1, '_selected_vendor', '1', '2020-06-10 17:05:04', '2020-06-28 02:24:52'),
(40, 1, '_total_sales', '2', '2020-06-24 23:55:05', '2020-06-30 08:13:40'),
(41, 2, '_product_related_images_url', '{"product_image":"/public/uploads/1593218765-h-250-coconut-filled-with-slice-of-fruits-1030973.jpg","product_gallery_images":[],"shop_banner_image":""}', '2020-06-25 18:20:40', '2020-06-28 02:24:20'),
(42, 2, '_product_sale_price_start_date', '', '2020-06-25 18:20:40', '2020-06-28 02:24:20'),
(43, 2, '_product_sale_price_end_date', '', '2020-06-25 18:20:40', '2020-06-28 02:24:20'),
(44, 2, '_product_manage_stock', 'no', '2020-06-25 18:20:40', '2020-06-28 02:24:20'),
(45, 2, '_product_manage_stock_back_to_order', 'not_allow', '2020-06-25 18:20:40', '2020-06-28 02:24:20'),
(46, 2, '_product_extra_features', '', '2020-06-25 18:20:40', '2020-06-28 02:24:21'),
(47, 2, '_product_enable_as_recommended', 'no', '2020-06-25 18:20:40', '2020-06-28 02:24:21'),
(48, 2, '_product_enable_as_features', 'yes', '2020-06-25 18:20:40', '2020-06-28 02:24:21'),
(49, 2, '_product_enable_as_latest', 'yes', '2020-06-25 18:20:40', '2020-06-28 02:24:21'),
(50, 2, '_product_enable_as_related', 'yes', '2020-06-25 18:20:40', '2020-06-28 02:24:21'),
(51, 2, '_product_enable_as_custom_design', 'yes', '2020-06-25 18:20:40', '2020-06-28 02:24:21'),
(52, 2, '_product_enable_as_selected_cat', 'no', '2020-06-25 18:20:40', '2020-06-28 02:24:21'),
(53, 2, '_product_enable_taxes', 'no', '2020-06-25 18:20:40', '2020-06-28 02:24:21'),
(54, 2, '_product_custom_designer_settings', 'a:3:{s:16:"canvas_dimension";a:3:{s:13:"small_devices";a:2:{s:5:"width";i:280;s:6:"height";i:300;}s:14:"medium_devices";a:2:{s:5:"width";i:480;s:6:"height";i:480;}s:13:"large_devices";a:2:{s:5:"width";i:500;s:6:"height";i:550;}}s:25:"enable_layout_at_frontend";s:2:"no";s:22:"enable_global_settings";s:2:"no";}', '2020-06-25 18:20:40', '2020-06-28 02:24:21'),
(55, 2, '_product_custom_designer_data', NULL, '2020-06-25 18:20:40', '2020-06-28 02:24:21'),
(56, 2, '_product_enable_reviews', 'yes', '2020-06-25 18:20:40', '2020-06-28 02:24:21'),
(57, 2, '_product_enable_reviews_add_link_to_product_page', 'yes', '2020-06-25 18:20:40', '2020-06-28 02:24:21'),
(58, 2, '_product_enable_reviews_add_link_to_details_page', 'yes', '2020-06-25 18:20:40', '2020-06-28 02:24:21'),
(59, 2, '_product_enable_video_feature', 'no', '2020-06-25 18:20:40', '2020-06-28 02:24:21'),
(60, 2, '_product_video_feature_display_mode', 'content', '2020-06-25 18:20:40', '2020-06-28 02:24:21'),
(61, 2, '_product_video_feature_title', NULL, '2020-06-25 18:20:40', '2020-06-28 02:24:21'),
(62, 2, '_product_video_feature_panel_size', 'a:2:{s:5:"width";N;s:6:"height";N;}', '2020-06-25 18:20:40', '2020-06-28 02:24:21'),
(63, 2, '_product_video_feature_source', '', '2020-06-25 18:20:40', '2020-06-28 02:24:22'),
(64, 2, '_product_video_feature_source_embedded_code', NULL, '2020-06-25 18:20:40', '2020-06-28 02:24:22'),
(65, 2, '_product_video_feature_source_online_url', NULL, '2020-06-25 18:20:40', '2020-06-28 02:24:22'),
(66, 2, '_product_enable_manufacturer', 'no', '2020-06-25 18:20:40', '2020-06-28 02:24:22'),
(67, 2, '_product_enable_visibility_schedule', 'no', '2020-06-25 18:20:40', '2020-06-28 02:24:22'),
(68, 2, '_product_seo_title', 'Red tomato', '2020-06-25 18:20:40', '2020-06-28 02:24:22'),
(69, 2, '_product_seo_description', '', '2020-06-25 18:20:40', '2020-06-28 02:24:22'),
(70, 2, '_product_seo_keywords', '', '2020-06-25 18:20:40', '2020-06-28 02:24:22'),
(71, 2, '_product_compare_data', 'N;', '2020-06-25 18:20:40', '2020-06-28 02:24:22'),
(72, 2, '_is_role_based_pricing_enable', 'no', '2020-06-25 18:20:40', '2020-06-28 02:24:22'),
(73, 2, '_role_based_pricing', 'a:3:{s:13:"administrator";a:2:{s:13:"regular_price";N;s:10:"sale_price";s:0:"";}s:9:"site-user";a:2:{s:13:"regular_price";N;s:10:"sale_price";s:0:"";}s:6:"vendor";a:2:{s:13:"regular_price";N;s:10:"sale_price";s:0:"";}}', '2020-06-25 18:20:40', '2020-06-28 02:24:22'),
(74, 2, '_downloadable_product_files', 'a:0:{}', '2020-06-25 18:20:40', '2020-06-28 02:24:22'),
(75, 2, '_downloadable_product_download_limit', '', '2020-06-25 18:20:40', '2020-06-28 02:24:22'),
(76, 2, '_downloadable_product_download_expiry', '', '2020-06-25 18:20:40', '2020-06-28 02:24:22'),
(77, 2, '_upsell_products', 'a:0:{}', '2020-06-25 18:20:40', '2020-06-28 02:24:22'),
(78, 2, '_crosssell_products', 'a:0:{}', '2020-06-25 18:20:40', '2020-06-28 02:24:22'),
(79, 2, '_selected_vendor', '1', '2020-06-25 18:20:40', '2020-06-28 02:24:22'),
(80, 3, '_product_related_images_url', '{"product_image":"/public/uploads/1593219976-h-250-green-grapes-on-marble-table-3987275.jpg","product_gallery_images":[],"shop_banner_image":""}', '2020-06-25 19:05:20', '2020-06-28 02:23:46'),
(81, 3, '_product_sale_price_start_date', '', '2020-06-25 19:05:20', '2020-06-28 02:23:47'),
(82, 3, '_product_sale_price_end_date', '', '2020-06-25 19:05:20', '2020-06-28 02:23:47'),
(83, 3, '_product_manage_stock', 'no', '2020-06-25 19:05:20', '2020-06-28 02:23:47'),
(84, 3, '_product_manage_stock_back_to_order', 'not_allow', '2020-06-25 19:05:20', '2020-06-28 02:23:47'),
(85, 3, '_product_extra_features', '', '2020-06-25 19:05:20', '2020-06-28 02:23:47'),
(86, 3, '_product_enable_as_recommended', 'no', '2020-06-25 19:05:20', '2020-06-28 02:23:47'),
(87, 3, '_product_enable_as_features', 'yes', '2020-06-25 19:05:20', '2020-06-28 02:23:47'),
(88, 3, '_product_enable_as_latest', 'yes', '2020-06-25 19:05:20', '2020-06-28 02:23:47'),
(89, 3, '_product_enable_as_related', 'yes', '2020-06-25 19:05:20', '2020-06-28 02:23:47'),
(90, 3, '_product_enable_as_custom_design', 'yes', '2020-06-25 19:05:20', '2020-06-28 02:23:47'),
(91, 3, '_product_enable_as_selected_cat', 'no', '2020-06-25 19:05:20', '2020-06-28 02:23:47'),
(92, 3, '_product_enable_taxes', 'no', '2020-06-25 19:05:20', '2020-06-28 02:23:47'),
(93, 3, '_product_custom_designer_settings', 'a:3:{s:16:"canvas_dimension";a:3:{s:13:"small_devices";a:2:{s:5:"width";i:280;s:6:"height";i:300;}s:14:"medium_devices";a:2:{s:5:"width";i:480;s:6:"height";i:480;}s:13:"large_devices";a:2:{s:5:"width";i:500;s:6:"height";i:550;}}s:25:"enable_layout_at_frontend";s:2:"no";s:22:"enable_global_settings";s:2:"no";}', '2020-06-25 19:05:20', '2020-06-28 02:23:47'),
(94, 3, '_product_custom_designer_data', NULL, '2020-06-25 19:05:20', '2020-06-28 02:23:48'),
(95, 3, '_product_enable_reviews', 'yes', '2020-06-25 19:05:20', '2020-06-28 02:23:48'),
(96, 3, '_product_enable_reviews_add_link_to_product_page', 'yes', '2020-06-25 19:05:20', '2020-06-28 02:23:48'),
(97, 3, '_product_enable_reviews_add_link_to_details_page', 'yes', '2020-06-25 19:05:20', '2020-06-28 02:23:48'),
(98, 3, '_product_enable_video_feature', 'no', '2020-06-25 19:05:20', '2020-06-28 02:23:48'),
(99, 3, '_product_video_feature_display_mode', 'content', '2020-06-25 19:05:20', '2020-06-28 02:23:48'),
(100, 3, '_product_video_feature_title', NULL, '2020-06-25 19:05:20', '2020-06-28 02:23:48'),
(101, 3, '_product_video_feature_panel_size', 'a:2:{s:5:"width";N;s:6:"height";N;}', '2020-06-25 19:05:20', '2020-06-28 02:23:48'),
(102, 3, '_product_video_feature_source', '', '2020-06-25 19:05:20', '2020-06-28 02:23:48'),
(103, 3, '_product_video_feature_source_embedded_code', NULL, '2020-06-25 19:05:20', '2020-06-28 02:23:48'),
(104, 3, '_product_video_feature_source_online_url', NULL, '2020-06-25 19:05:20', '2020-06-28 02:23:48'),
(105, 3, '_product_enable_manufacturer', 'no', '2020-06-25 19:05:20', '2020-06-28 02:23:48'),
(106, 3, '_product_enable_visibility_schedule', 'no', '2020-06-25 19:05:20', '2020-06-28 02:23:48'),
(107, 3, '_product_seo_title', 'green grapes', '2020-06-25 19:05:20', '2020-06-28 02:23:48'),
(108, 3, '_product_seo_description', '', '2020-06-25 19:05:20', '2020-06-28 02:23:48'),
(109, 3, '_product_seo_keywords', '', '2020-06-25 19:05:20', '2020-06-28 02:23:49'),
(110, 3, '_product_compare_data', 'N;', '2020-06-25 19:05:20', '2020-06-28 02:23:49'),
(111, 3, '_is_role_based_pricing_enable', 'no', '2020-06-25 19:05:20', '2020-06-28 02:23:49'),
(112, 3, '_role_based_pricing', 'a:3:{s:13:"administrator";a:2:{s:13:"regular_price";N;s:10:"sale_price";s:0:"";}s:9:"site-user";a:2:{s:13:"regular_price";N;s:10:"sale_price";s:0:"";}s:6:"vendor";a:2:{s:13:"regular_price";N;s:10:"sale_price";s:0:"";}}', '2020-06-25 19:05:20', '2020-06-28 02:23:49'),
(113, 3, '_downloadable_product_files', 'a:0:{}', '2020-06-25 19:05:20', '2020-06-28 02:23:49'),
(114, 3, '_downloadable_product_download_limit', '', '2020-06-25 19:05:20', '2020-06-28 02:23:49'),
(115, 3, '_downloadable_product_download_expiry', '', '2020-06-25 19:05:20', '2020-06-28 02:23:49'),
(116, 3, '_upsell_products', 'a:0:{}', '2020-06-25 19:05:20', '2020-06-28 02:23:49'),
(117, 3, '_crosssell_products', 'a:0:{}', '2020-06-25 19:05:20', '2020-06-28 02:23:49'),
(118, 3, '_selected_vendor', '1', '2020-06-25 19:05:20', '2020-06-28 02:23:49'),
(119, 4, '_product_related_images_url', '{"product_image":"/public/uploads/1593219693-h-250-fruits-in-a-plastic-bag-3645504.jpg","product_gallery_images":[],"shop_banner_image":""}', '2020-06-25 19:07:13', '2020-06-28 02:21:26'),
(120, 4, '_product_sale_price_start_date', '', '2020-06-25 19:07:13', '2020-06-28 02:21:27'),
(121, 4, '_product_sale_price_end_date', '', '2020-06-25 19:07:13', '2020-06-28 02:21:27'),
(122, 4, '_product_manage_stock', 'no', '2020-06-25 19:07:13', '2020-06-28 02:21:27'),
(123, 4, '_product_manage_stock_back_to_order', 'not_allow', '2020-06-25 19:07:13', '2020-06-28 02:21:27'),
(124, 4, '_product_extra_features', '', '2020-06-25 19:07:13', '2020-06-28 02:21:27'),
(125, 4, '_product_enable_as_recommended', 'no', '2020-06-25 19:07:13', '2020-06-28 02:21:27'),
(126, 4, '_product_enable_as_features', 'yes', '2020-06-25 19:07:13', '2020-06-28 02:21:27'),
(127, 4, '_product_enable_as_latest', 'yes', '2020-06-25 19:07:13', '2020-06-28 02:21:27'),
(128, 4, '_product_enable_as_related', 'yes', '2020-06-25 19:07:13', '2020-06-28 02:21:27'),
(129, 4, '_product_enable_as_custom_design', 'yes', '2020-06-25 19:07:13', '2020-06-28 02:21:27'),
(130, 4, '_product_enable_as_selected_cat', 'no', '2020-06-25 19:07:13', '2020-06-28 02:21:27'),
(131, 4, '_product_enable_taxes', 'no', '2020-06-25 19:07:13', '2020-06-28 02:21:27'),
(132, 4, '_product_custom_designer_settings', 'a:3:{s:16:"canvas_dimension";a:3:{s:13:"small_devices";a:2:{s:5:"width";i:280;s:6:"height";i:300;}s:14:"medium_devices";a:2:{s:5:"width";i:480;s:6:"height";i:480;}s:13:"large_devices";a:2:{s:5:"width";i:500;s:6:"height";i:550;}}s:25:"enable_layout_at_frontend";s:2:"no";s:22:"enable_global_settings";s:2:"no";}', '2020-06-25 19:07:13', '2020-06-28 02:21:27'),
(133, 4, '_product_custom_designer_data', NULL, '2020-06-25 19:07:13', '2020-06-28 02:21:27'),
(134, 4, '_product_enable_reviews', 'yes', '2020-06-25 19:07:13', '2020-06-28 02:21:27'),
(135, 4, '_product_enable_reviews_add_link_to_product_page', 'yes', '2020-06-25 19:07:13', '2020-06-28 02:21:27'),
(136, 4, '_product_enable_reviews_add_link_to_details_page', 'yes', '2020-06-25 19:07:13', '2020-06-28 02:21:27'),
(137, 4, '_product_enable_video_feature', 'no', '2020-06-25 19:07:13', '2020-06-28 02:21:28'),
(138, 4, '_product_video_feature_display_mode', 'content', '2020-06-25 19:07:13', '2020-06-28 02:21:28'),
(139, 4, '_product_video_feature_title', NULL, '2020-06-25 19:07:13', '2020-06-28 02:21:28'),
(140, 4, '_product_video_feature_panel_size', 'a:2:{s:5:"width";N;s:6:"height";N;}', '2020-06-25 19:07:13', '2020-06-28 02:21:28'),
(141, 4, '_product_video_feature_source', '', '2020-06-25 19:07:13', '2020-06-28 02:21:28'),
(142, 4, '_product_video_feature_source_embedded_code', NULL, '2020-06-25 19:07:13', '2020-06-28 02:21:28'),
(143, 4, '_product_video_feature_source_online_url', NULL, '2020-06-25 19:07:13', '2020-06-28 02:21:28'),
(144, 4, '_product_enable_manufacturer', 'no', '2020-06-25 19:07:13', '2020-06-28 02:21:28'),
(145, 4, '_product_enable_visibility_schedule', 'no', '2020-06-25 19:07:13', '2020-06-28 02:21:28'),
(146, 4, '_product_seo_title', 'fresh grapes', '2020-06-25 19:07:13', '2020-06-28 02:21:28'),
(147, 4, '_product_seo_description', '', '2020-06-25 19:07:13', '2020-06-28 02:21:28'),
(148, 4, '_product_seo_keywords', '', '2020-06-25 19:07:13', '2020-06-28 02:21:28'),
(149, 4, '_product_compare_data', 'N;', '2020-06-25 19:07:13', '2020-06-28 02:21:28'),
(150, 4, '_is_role_based_pricing_enable', 'no', '2020-06-25 19:07:13', '2020-06-28 02:21:28'),
(151, 4, '_role_based_pricing', 'a:3:{s:13:"administrator";a:2:{s:13:"regular_price";N;s:10:"sale_price";s:0:"";}s:9:"site-user";a:2:{s:13:"regular_price";N;s:10:"sale_price";s:0:"";}s:6:"vendor";a:2:{s:13:"regular_price";N;s:10:"sale_price";s:0:"";}}', '2020-06-25 19:07:13', '2020-06-28 02:21:28'),
(152, 4, '_downloadable_product_files', 'a:0:{}', '2020-06-25 19:07:13', '2020-06-28 02:21:29'),
(153, 4, '_downloadable_product_download_limit', '', '2020-06-25 19:07:13', '2020-06-28 02:21:29'),
(154, 4, '_downloadable_product_download_expiry', '', '2020-06-25 19:07:13', '2020-06-28 02:21:29'),
(155, 4, '_upsell_products', 'a:0:{}', '2020-06-25 19:07:13', '2020-06-28 02:21:29'),
(156, 4, '_crosssell_products', 'a:0:{}', '2020-06-25 19:07:13', '2020-06-28 02:21:29'),
(157, 4, '_selected_vendor', '1', '2020-06-25 19:07:13', '2020-06-28 02:21:29'),
(158, 5, '_product_related_images_url', '{"product_image":"/public/uploads/1593219807-h-250-sliced-orange-fruits-2090900.jpg","product_gallery_images":[{"id":"0CAA518C-E0B1-42D8-94F3-C35D01ACF3D7","url":"/public/uploads/01593296087-h-250-fruits-in-a-plastic-bag-3645504.jpg"},{"id":"90401729-B7D0-4198-930E-8997E59AEE8A","url":"/public/uploads/11593296087-h-250-green-grapes-on-marble-table-3987275.jpg"}],"shop_banner_image":""}', '2020-06-25 19:10:03', '2020-06-28 02:02:17'),
(159, 5, '_product_sale_price_start_date', '', '2020-06-25 19:10:03', '2020-06-28 02:02:17'),
(160, 5, '_product_sale_price_end_date', '', '2020-06-25 19:10:03', '2020-06-28 02:02:17'),
(161, 5, '_product_manage_stock', 'no', '2020-06-25 19:10:03', '2020-06-28 02:02:17'),
(162, 5, '_product_manage_stock_back_to_order', 'not_allow', '2020-06-25 19:10:03', '2020-06-28 02:02:18'),
(163, 5, '_product_extra_features', '', '2020-06-25 19:10:03', '2020-06-28 02:02:18'),
(164, 5, '_product_enable_as_recommended', 'yes', '2020-06-25 19:10:03', '2020-06-28 02:02:18'),
(165, 5, '_product_enable_as_features', 'yes', '2020-06-25 19:10:03', '2020-06-28 02:02:18'),
(166, 5, '_product_enable_as_latest', 'no', '2020-06-25 19:10:03', '2020-06-28 02:02:18'),
(167, 5, '_product_enable_as_related', 'yes', '2020-06-25 19:10:03', '2020-06-28 02:02:18'),
(168, 5, '_product_enable_as_custom_design', 'yes', '2020-06-25 19:10:03', '2020-06-28 02:02:18'),
(169, 5, '_product_enable_as_selected_cat', 'no', '2020-06-25 19:10:03', '2020-06-28 02:02:18'),
(170, 5, '_product_enable_taxes', 'no', '2020-06-25 19:10:03', '2020-06-28 02:02:18'),
(171, 5, '_product_custom_designer_settings', 'a:3:{s:16:"canvas_dimension";a:3:{s:13:"small_devices";a:2:{s:5:"width";i:280;s:6:"height";i:300;}s:14:"medium_devices";a:2:{s:5:"width";i:480;s:6:"height";i:480;}s:13:"large_devices";a:2:{s:5:"width";i:500;s:6:"height";i:550;}}s:25:"enable_layout_at_frontend";s:2:"no";s:22:"enable_global_settings";s:2:"no";}', '2020-06-25 19:10:03', '2020-06-28 02:02:18'),
(172, 5, '_product_custom_designer_data', NULL, '2020-06-25 19:10:03', '2020-06-28 02:02:18'),
(173, 5, '_product_enable_reviews', 'yes', '2020-06-25 19:10:03', '2020-06-28 02:02:18'),
(174, 5, '_product_enable_reviews_add_link_to_product_page', 'yes', '2020-06-25 19:10:03', '2020-06-28 02:02:18'),
(175, 5, '_product_enable_reviews_add_link_to_details_page', 'yes', '2020-06-25 19:10:03', '2020-06-28 02:02:18'),
(176, 5, '_product_enable_video_feature', 'no', '2020-06-25 19:10:03', '2020-06-28 02:02:18'),
(177, 5, '_product_video_feature_display_mode', 'content', '2020-06-25 19:10:03', '2020-06-28 02:02:18'),
(178, 5, '_product_video_feature_title', NULL, '2020-06-25 19:10:03', '2020-06-28 02:02:19'),
(179, 5, '_product_video_feature_panel_size', 'a:2:{s:5:"width";N;s:6:"height";N;}', '2020-06-25 19:10:03', '2020-06-28 02:02:19'),
(180, 5, '_product_video_feature_source', '', '2020-06-25 19:10:03', '2020-06-28 02:02:19'),
(181, 5, '_product_video_feature_source_embedded_code', NULL, '2020-06-25 19:10:03', '2020-06-28 02:02:19'),
(182, 5, '_product_video_feature_source_online_url', NULL, '2020-06-25 19:10:03', '2020-06-28 02:02:19'),
(183, 5, '_product_enable_manufacturer', 'no', '2020-06-25 19:10:03', '2020-06-28 02:02:19'),
(184, 5, '_product_enable_visibility_schedule', 'no', '2020-06-25 19:10:03', '2020-06-28 02:02:19'),
(185, 5, '_product_seo_title', 'winw grapes', '2020-06-25 19:10:03', '2020-06-28 02:02:19'),
(186, 5, '_product_seo_description', '', '2020-06-25 19:10:03', '2020-06-28 02:02:19'),
(187, 5, '_product_seo_keywords', '', '2020-06-25 19:10:03', '2020-06-28 02:02:19'),
(188, 5, '_product_compare_data', 'N;', '2020-06-25 19:10:03', '2020-06-28 02:02:19'),
(189, 5, '_is_role_based_pricing_enable', 'no', '2020-06-25 19:10:03', '2020-06-28 02:02:19'),
(190, 5, '_role_based_pricing', 'a:3:{s:13:"administrator";a:2:{s:13:"regular_price";N;s:10:"sale_price";s:0:"";}s:9:"site-user";a:2:{s:13:"regular_price";N;s:10:"sale_price";s:0:"";}s:6:"vendor";a:2:{s:13:"regular_price";N;s:10:"sale_price";s:0:"";}}', '2020-06-25 19:10:03', '2020-06-28 02:02:19'),
(191, 5, '_downloadable_product_files', 'a:0:{}', '2020-06-25 19:10:03', '2020-06-28 02:02:19'),
(192, 5, '_downloadable_product_download_limit', '', '2020-06-25 19:10:03', '2020-06-28 02:02:19'),
(193, 5, '_downloadable_product_download_expiry', '', '2020-06-25 19:10:03', '2020-06-28 02:02:20'),
(194, 5, '_upsell_products', 'a:0:{}', '2020-06-25 19:10:03', '2020-06-28 02:02:20'),
(195, 5, '_crosssell_products', 'a:0:{}', '2020-06-25 19:10:03', '2020-06-28 02:02:20'),
(196, 5, '_selected_vendor', '1', '2020-06-25 19:10:03', '2020-06-28 02:02:20'),
(197, 6, '_product_related_images_url', '{"product_image":"/public/uploads/1593220061-h-250-photo-of-pile-of-oranges-2294477.jpg","product_gallery_images":[],"shop_banner_image":""}', '2020-06-27 00:06:49', '2020-06-30 10:24:21'),
(198, 6, '_product_sale_price_start_date', '', '2020-06-27 00:06:49', '2020-06-30 10:24:21'),
(199, 6, '_product_sale_price_end_date', '2020-07-03', '2020-06-27 00:06:49', '2020-06-30 10:24:21'),
(200, 6, '_product_manage_stock', 'no', '2020-06-27 00:06:49', '2020-06-30 10:24:21'),
(201, 6, '_product_manage_stock_back_to_order', 'not_allow', '2020-06-27 00:06:49', '2020-06-30 10:24:21'),
(202, 6, '_product_extra_features', '', '2020-06-27 00:06:49', '2020-06-30 10:24:21'),
(203, 6, '_product_enable_as_recommended', 'yes', '2020-06-27 00:06:49', '2020-06-30 10:24:21'),
(204, 6, '_product_enable_as_features', 'no', '2020-06-27 00:06:49', '2020-06-30 10:24:21'),
(205, 6, '_product_enable_as_latest', 'yes', '2020-06-27 00:06:49', '2020-06-30 10:24:21'),
(206, 6, '_product_enable_as_related', 'no', '2020-06-27 00:06:49', '2020-06-30 10:24:21'),
(207, 6, '_product_enable_as_custom_design', 'yes', '2020-06-27 00:06:49', '2020-06-30 10:24:21'),
(208, 6, '_product_enable_as_selected_cat', 'yes', '2020-06-27 00:06:49', '2020-06-30 10:24:21'),
(209, 6, '_product_enable_taxes', 'no', '2020-06-27 00:06:49', '2020-06-30 10:24:21'),
(210, 6, '_product_custom_designer_settings', 'a:3:{s:16:"canvas_dimension";a:3:{s:13:"small_devices";a:2:{s:5:"width";i:280;s:6:"height";i:300;}s:14:"medium_devices";a:2:{s:5:"width";i:480;s:6:"height";i:480;}s:13:"large_devices";a:2:{s:5:"width";i:500;s:6:"height";i:550;}}s:25:"enable_layout_at_frontend";s:2:"no";s:22:"enable_global_settings";s:2:"no";}', '2020-06-27 00:06:49', '2020-06-30 10:24:21'),
(211, 6, '_product_custom_designer_data', NULL, '2020-06-27 00:06:49', '2020-06-30 10:24:21'),
(212, 6, '_product_enable_reviews', 'yes', '2020-06-27 00:06:49', '2020-06-30 10:24:21'),
(213, 6, '_product_enable_reviews_add_link_to_product_page', 'yes', '2020-06-27 00:06:49', '2020-06-30 10:24:21'),
(214, 6, '_product_enable_reviews_add_link_to_details_page', 'yes', '2020-06-27 00:06:49', '2020-06-30 10:24:22'),
(215, 6, '_product_enable_video_feature', 'no', '2020-06-27 00:06:49', '2020-06-30 10:24:22'),
(216, 6, '_product_video_feature_display_mode', 'content', '2020-06-27 00:06:49', '2020-06-30 10:24:22'),
(217, 6, '_product_video_feature_title', NULL, '2020-06-27 00:06:49', '2020-06-30 10:24:22'),
(218, 6, '_product_video_feature_panel_size', 'a:2:{s:5:"width";N;s:6:"height";N;}', '2020-06-27 00:06:49', '2020-06-30 10:24:22'),
(219, 6, '_product_video_feature_source', '', '2020-06-27 00:06:49', '2020-06-30 10:24:22'),
(220, 6, '_product_video_feature_source_embedded_code', NULL, '2020-06-27 00:06:49', '2020-06-30 10:24:22'),
(221, 6, '_product_video_feature_source_online_url', NULL, '2020-06-27 00:06:49', '2020-06-30 10:24:22'),
(222, 6, '_product_enable_manufacturer', 'no', '2020-06-27 00:06:49', '2020-06-30 10:24:22'),
(223, 6, '_product_enable_visibility_schedule', 'no', '2020-06-27 00:06:49', '2020-06-30 10:24:22'),
(224, 6, '_product_seo_title', 'Oranges', '2020-06-27 00:06:49', '2020-06-30 10:24:22'),
(225, 6, '_product_seo_description', '', '2020-06-27 00:06:49', '2020-06-30 10:24:22'),
(226, 6, '_product_seo_keywords', '', '2020-06-27 00:06:49', '2020-06-30 10:24:22'),
(227, 6, '_product_compare_data', 'N;', '2020-06-27 00:06:49', '2020-06-30 10:24:22'),
(228, 6, '_is_role_based_pricing_enable', 'no', '2020-06-27 00:06:49', '2020-06-30 10:24:22'),
(229, 6, '_role_based_pricing', 'a:3:{s:13:"administrator";a:2:{s:13:"regular_price";N;s:10:"sale_price";s:0:"";}s:9:"site-user";a:2:{s:13:"regular_price";N;s:10:"sale_price";s:0:"";}s:6:"vendor";a:2:{s:13:"regular_price";N;s:10:"sale_price";s:0:"";}}', '2020-06-27 00:06:49', '2020-06-30 10:24:22'),
(230, 6, '_downloadable_product_files', 'a:0:{}', '2020-06-27 00:06:49', '2020-06-30 10:24:22'),
(231, 6, '_downloadable_product_download_limit', '', '2020-06-27 00:06:49', '2020-06-30 10:24:23'),
(232, 6, '_downloadable_product_download_expiry', '', '2020-06-27 00:06:49', '2020-06-30 10:24:23'),
(233, 6, '_upsell_products', 'a:0:{}', '2020-06-27 00:06:49', '2020-06-30 10:24:23'),
(234, 6, '_crosssell_products', 'a:0:{}', '2020-06-27 00:06:49', '2020-06-30 10:24:23'),
(235, 6, '_selected_vendor', '1', '2020-06-27 00:06:49', '2020-06-30 10:24:23'),
(236, 2, '_total_sales', '2', '2020-06-30 05:54:46', '2020-06-30 14:55:04'),
(237, 3, '_total_sales', '2', '2020-06-30 06:55:46', '2020-06-30 21:37:19');

-- --------------------------------------------------------

--
-- Table structure for table `request_products`
--

CREATE TABLE `request_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(2, 2, 2, '2020-06-21 18:36:49', '2020-06-21 18:36:49'),
(3, 3, 2, '2020-06-22 12:10:05', '2020-06-22 12:10:05'),
(4, 4, 3, '2020-06-22 14:26:16', '2020-06-22 14:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `save_custom_designs`
--

CREATE TABLE `save_custom_designs` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `design_data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `name`, `slug`, `type`, `parent`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Brabus', 'brabus', 'product_brands', 0, 1, '2020-06-10 16:49:23', '2020-06-10 16:49:23'),
(2, 'Fashion', 'fashion', 'product_cat', 0, 1, '2020-06-10 16:51:10', '2020-06-10 16:51:10'),
(3, 'Fresh Fruits', 'fresh-fruits', 'product_cat', 0, 1, '2020-06-15 17:37:23', '2020-06-27 10:21:22'),
(4, 'Electronics', 'electronics', 'product_cat', 0, 1, '2020-06-26 23:00:23', '2020-06-27 10:19:48'),
(5, 'Home & Accessories', 'home-and-accesories', 'product_cat', 0, 1, '2020-06-26 23:00:55', '2020-06-27 10:12:35'),
(6, 'Phones & Gadgets', 'phones-and-gadgets', 'product_cat', 0, 1, '2020-06-26 23:01:34', '2020-06-27 10:13:50'),
(7, 'Personal Care', 'personal-care', 'product_cat', 0, 1, '2020-06-26 23:02:21', '2020-06-27 10:12:57'),
(8, 'Baby Care', 'baby-care', 'product_cat', 0, 1, '2020-06-26 23:02:50', '2020-06-26 23:02:50'),
(9, 'Beverages', 'beverages', 'product_cat', 0, 1, '2020-06-26 23:03:06', '2020-06-26 23:03:06'),
(10, 'Fresh Vegetables', 'fresh-vegetables', 'product_cat', 0, 1, '2020-06-26 23:03:33', '2020-06-26 23:03:33'),
(11, 'Personal Care', 'personal-care-10', 'product_cat', 0, 1, '2020-06-26 23:04:48', '2020-06-26 23:04:48'),
(12, 'Cleaning & Houseold', 'hosehold', 'product_cat', 0, 1, '2020-06-26 23:05:32', '2020-06-26 23:05:57'),
(13, 'Oil & Spices', 'oil-and-spices', 'product_cat', 0, 1, '2020-06-26 23:06:22', '2020-06-27 08:23:23'),
(14, 'medium', 'medium', 'product_sizes', 0, 1, '2020-06-27 21:06:19', '2020-06-27 21:06:19'),
(15, 'small', 'small', 'product_sizes', 0, 1, '2020-06-27 21:06:28', '2020-06-27 21:06:28'),
(16, 'size', 'size', 'product_attr', 0, 1, '2020-06-27 21:08:34', '2020-06-27 21:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `term_extras`
--

CREATE TABLE `term_extras` (
  `term_extra_id` int(10) UNSIGNED NOT NULL,
  `term_id` int(10) UNSIGNED NOT NULL,
  `key_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `term_extras`
--

INSERT INTO `term_extras` (`term_extra_id`, `term_id`, `key_name`, `key_value`, `created_at`, `updated_at`) VALUES
(1, 1, '_brand_country_name', 'USA', '2020-06-10 16:49:23', '2020-06-10 16:49:23'),
(2, 1, '_brand_short_description', '&lt;p&gt;This is a brabus content&lt;/p&gt;', '2020-06-10 16:49:23', '2020-06-10 16:49:23'),
(3, 1, '_brand_logo_img_url', '/public/uploads/1591811356-h-80-banner 01 v2 (1).jpg', '2020-06-10 16:49:23', '2020-06-10 16:49:23'),
(4, 2, '_category_description', 'This is the fashion category', '2020-06-10 16:51:10', '2020-06-10 16:51:10'),
(5, 2, '_category_img_url', '/public/uploads/1591811460-h-150-banner.jpg', '2020-06-10 16:51:10', '2020-06-10 16:51:10'),
(6, 3, '_category_description', 'This is a test', '2020-06-15 17:37:23', '2020-06-27 10:21:22'),
(7, 3, '_category_img_url', '/public/uploads/1593256877-h-150-top-view-photo-of-food-dessert-1099680.jpg', '2020-06-15 17:37:23', '2020-06-27 10:21:22'),
(8, 4, '_category_description', '', '2020-06-26 23:00:24', '2020-06-27 10:19:48'),
(9, 4, '_category_img_url', '/public/uploads/1593256785-h-150-black-crt-tv-showing-gray-screen-704555.jpg', '2020-06-26 23:00:24', '2020-06-27 10:19:48'),
(10, 5, '_category_description', '', '2020-06-26 23:00:55', '2020-06-27 10:12:35'),
(11, 5, '_category_img_url', '/public/uploads/1593256351-h-150-apartment-chair-clean-contemporary-279719.jpg', '2020-06-26 23:00:55', '2020-06-27 10:12:35'),
(12, 6, '_category_description', '', '2020-06-26 23:01:34', '2020-06-27 10:13:50'),
(13, 6, '_category_img_url', '/public/uploads/1593256427-h-150-apple-device-cellphone-communication-device-594452.jpg', '2020-06-26 23:01:34', '2020-06-27 10:13:50'),
(14, 7, '_category_description', '', '2020-06-26 23:02:21', '2020-06-27 10:12:57'),
(15, 7, '_category_img_url', '/public/uploads/1593256373-h-150-white-organic-toothpaste-tube-and-bamboo-toothbrush-on-green-4465814.jpg', '2020-06-26 23:02:21', '2020-06-27 10:12:57'),
(16, 8, '_category_description', '', '2020-06-26 23:02:50', '2020-06-26 23:02:50'),
(17, 8, '_category_img_url', NULL, '2020-06-26 23:02:50', '2020-06-26 23:02:50'),
(18, 9, '_category_description', '', '2020-06-26 23:03:06', '2020-06-26 23:03:06'),
(19, 9, '_category_img_url', NULL, '2020-06-26 23:03:06', '2020-06-26 23:03:06'),
(20, 10, '_category_description', '', '2020-06-26 23:03:33', '2020-06-26 23:03:33'),
(21, 10, '_category_img_url', NULL, '2020-06-26 23:03:33', '2020-06-26 23:03:33'),
(22, 11, '_category_description', '', '2020-06-26 23:04:48', '2020-06-26 23:04:48'),
(23, 11, '_category_img_url', NULL, '2020-06-26 23:04:48', '2020-06-26 23:04:48'),
(24, 12, '_category_description', '', '2020-06-26 23:05:32', '2020-06-26 23:05:57'),
(25, 12, '_category_img_url', NULL, '2020-06-26 23:05:32', '2020-06-26 23:05:57'),
(26, 13, '_category_description', '', '2020-06-26 23:06:22', '2020-06-27 08:23:23'),
(27, 13, '_category_img_url', NULL, '2020-06-26 23:06:22', '2020-06-27 08:23:23'),
(28, 16, '_product_attr_values', 'small,large,small', '2020-06-27 21:08:34', '2020-06-27 21:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_photo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_status` int(10) UNSIGNED NOT NULL,
  `secret_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referee` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `display_name`, `name`, `email`, `password`, `user_photo_url`, `user_status`, `secret_key`, `referee`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '$2y$10$FKv.9CUljNS/8GkbYfwGoeW4k0DBT9N8dnATVXVMZIAu5JGKVFSKK', '', 1, '$2y$10$xW53MN8gc4td4lkT1vNbGe1/5ldF6hJC7oUWTwVH6qTiBHdpXYMAq', NULL, '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(2, 'owolabi emmanuel', 'glorhie33', 'aremuopomulero@gmail.com', '$2y$10$hinFnPTn9O/hpyZ/NGoLPenMV7KTE6Nen0leA3YlYwuw/M6xlOpXi', '/public/uploads/1593279898-h-100-28055674_347428412426054_2031142145520973063_n.jpg', 1, '$2y$10$zCbB6dTtEpnmIu8TcVwNKuPAn9se5uJqigTwFuoAwUcr8bFN.5BjO', NULL, '2020-06-21 18:36:49', '2020-06-27 16:45:01'),
(3, 'owolabi glory', 'glorhie44', 'owolabi@gmail.com', '$2y$10$pVX0pKp8ofy9oVfikQWti.Soe9fzhGCiHB6s6.CGfzeDGefDSa9p2', '', 1, '$2y$10$OOafpoj7ZhtRaOx3QYUIve3mbExKFL3fJeTnUzHBWxDNgQpkSYOFC', '2', '2020-06-22 12:10:05', '2020-06-22 12:10:05'),
(4, 'owolabi', 'emmanuel', 'owolabie76@yahoo.com', '$2y$10$6S2x536V7jK93Dg8qrN5/OTPy5iSSSroaI94IRJ9BaCax7SPyyjze', '', 1, '$2y$10$Kwq6kGqrMuyFURBPGbWS6OCQ8.Q0041BB2kMqCBZs6VPRQyRqkbWi', NULL, '2020-06-22 14:26:16', '2020-06-22 14:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `users_custom_designs`
--

CREATE TABLE `users_custom_designs` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `access_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `design_images` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `design_data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE `users_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_details`
--

INSERT INTO `users_details` (`id`, `user_id`, `details`, `created_at`, `updated_at`) VALUES
(1, 1, '{"profile_details":{"store_name":"admin","address_line_1":"address 1","address_line_2":"address 2","city":"city","state":"state","country":"country","zip_postal_code":2210,"phone":123456},"general_details":{"cover_img":"","vendor_home_page_cats":"","google_map_app_key":"","latitude":"-25.363","longitude":"131.044"},"social_media":{"fb_follow_us_url":"","twitter_follow_us_url":"","linkedin_follow_us_url":"","dribbble_follow_us_url":"","google_plus_follow_us_url":"","instagram_follow_us_url":"","youtube_follow_us_url":""}}', '2019-11-03 23:03:55', '2019-11-03 23:03:55'),
(2, 4, '{"profile_details":{"store_name":"glory","address_line_1":"my address","address_line_2":"my address","city":"lagos","state":"kwara","country":"nigeria","zip_postal_code":"234","phone":"08098279772"},"general_details":{"cover_img":"","vendor_home_page_cats":"","google_map_app_key":"","latitude":"-25.363","longitude":"131.044"},"social_media":{"fb_follow_us_url":"","twitter_follow_us_url":"","linkedin_follow_us_url":"","dribbble_follow_us_url":"","google_plus_follow_us_url":"","instagram_follow_us_url":"","youtube_follow_us_url":""},"seo":{"meta_keywords":"","meta_decription":""},"shipping_method":{"shipping_option":{"enable_shipping":false,"display_mode":""},"flat_rate":{"enable_option":false,"method_title":"","method_cost":0},"free_shipping":{"enable_option":false,"method_title":"","order_amount":""},"local_delivery":{"enable_option":false,"method_title":"","fee_type":"","delivery_fee":""}},"payment_method":{"payment_option":"","dbt":{"status":false,"title":"","description":"","instructions":"","account_name":"","account_number":"","bank_name":"","short_code":"","IBAN":"","SWIFT":""},"cod":{"status":false,"title":"","description":"","instructions":""},"paypal":{"status":false,"title":"","email_id":"","description":""},"stripe":{"status":false,"title":"","email_id":"","card_number":"","cvc":"","expiration_month":"","expiration_year":"","description":""},"twocheckout":{"status":false,"title":"","card_number":"","cvc":"","expiration_month":"","expiration_year":"","description":""}},"package":{"package_name":1}}', '2020-06-22 14:26:16', '2020-06-22 14:26:16'),
(3, 2, '{"address_details":{"account_bill_title":"mr","account_bill_company_name":"my company","account_bill_first_name":"owolabi","account_bill_last_name":"emmanuel","account_bill_email_address":"aremuopomulero@gmail.com","account_bill_phone_number":"07086295741","account_bill_select_country":"NG","account_bill_adddress_line_1":"my address","account_bill_adddress_line_2":"my address","account_bill_town_or_city":"ilorin","account_bill_zip_or_postal_code":"32443","account_bill_fax_number":null,"account_shipping_title":"mr","account_shipping_company_name":"my company","account_shipping_first_name":"owolabi","account_shipping_last_name":"emmanuel","account_shipping_email_address":"glory@gmail.com","account_shipping_phone_number":"07086295741","account_shipping_select_country":"NG","account_shipping_adddress_line_1":"my address","account_shipping_adddress_line_2":"my address","account_shipping_town_or_city":"ilorin","account_shipping_zip_or_postal_code":"32443","account_shipping_fax_number":null},"wishlists_details":""}', '2020-06-24 22:28:05', '2020-06-24 22:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_permissions`
--

CREATE TABLE `user_role_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `permissions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role_permissions`
--

INSERT INTO `user_role_permissions` (`id`, `role_id`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 1, 'a:45:{i:0;s:17:"manage_pages_full";i:1;s:17:"pages_list_access";i:2;s:21:"add_edit_delete_pages";i:3;s:24:"manage_blog_manager_full";i:4;s:17:"list_blogs_access";i:5;s:20:"add_edit_delete_blog";i:6;s:18:"blog_comments_list";i:7;s:22:"blog_categories_access";i:8;s:23:"manage_testimonial_full";i:9;s:23:"testimonial_list_access";i:10;s:27:"add_edit_delete_testimonial";i:11;s:18:"manage_brands_full";i:12;s:18:"brands_list_access";i:13;s:22:"add_edit_delete_brands";i:14;s:15:"manage_seo_full";i:15;s:20:"manage_products_full";i:16;s:20:"products_list_access";i:17;s:23:"add_edit_delete_product";i:18;s:25:"product_categories_access";i:19;s:19:"product_tags_access";i:20;s:25:"product_attributes_access";i:21;s:21:"product_colors_access";i:22;s:20:"product_sizes_access";i:23;s:29:"products_comments_list_access";i:24;s:18:"manage_orders_list";i:25;s:19:"manage_reports_list";i:26;s:19:"vendors_access_full";i:27;s:19:"vendors_list_access";i:28;s:23:"vendors_withdraw_access";i:29;s:29:"vendors_refund_request_access";i:30;s:30:"vendors_earning_reports_access";i:31;s:27:"vendors_announcement_access";i:32;s:15:"vendor_settings";i:33;s:28:"vendors_packages_full_access";i:34;s:28:"vendors_packages_list_access";i:35;s:30:"vendors_packages_create_access";i:36;s:34:"manage_shipping_method_menu_access";i:37;s:33:"manage_payment_method_menu_access";i:38;s:36:"manage_designer_elements_menu_access";i:39;s:25:"manage_coupon_menu_access";i:40;s:27:"manage_settings_menu_access";i:41;s:36:"manage_requested_product_menu_access";i:42;s:31:"manage_subscription_menu_access";i:43;s:27:"manage_delivery_area_access";i:44;s:28:"manage_extra_features_access";}', '2019-11-03 23:03:56', '2019-11-03 23:03:56'),
(2, 3, 'a:13:{i:0;s:15:"manage_seo_full";i:1;s:20:"manage_products_full";i:2;s:20:"products_list_access";i:3;s:23:"add_edit_delete_product";i:4;s:29:"products_comments_list_access";i:5;s:18:"manage_orders_list";i:6;s:19:"manage_reports_list";i:7;s:34:"manage_shipping_method_menu_access";i:8;s:33:"manage_payment_method_menu_access";i:9;s:25:"manage_coupon_menu_access";i:10;s:23:"vendors_withdraw_access";i:11;s:36:"manage_requested_product_menu_access";i:12;s:28:"manage_extra_features_access";}', '2019-11-03 23:03:56', '2019-11-03 23:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_announcements`
--

CREATE TABLE `vendor_announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_orders`
--

CREATE TABLE `vendor_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `order_total` double(11,2) NOT NULL,
  `net_amount` double(11,2) NOT NULL,
  `order_status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_packages`
--

CREATE TABLE `vendor_packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_type` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_packages`
--

INSERT INTO `vendor_packages` (`id`, `package_type`, `options`, `created_at`, `updated_at`) VALUES
(1, 'Default', '{"max_number_product":100,"show_map_on_store_page":true,"show_social_media_follow_btn_on_store_page":true,"show_social_media_share_btn_on_store_page":true,"show_contact_form_on_store_page":true,"vendor_expired_date_type":"lifetime","vendor_custom_expired_date":"","vendor_commission":20,"min_withdraw_amount":50}', '2019-11-03 23:03:55', '2019-11-03 23:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_totals`
--

CREATE TABLE `vendor_totals` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `totals` double(11,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_withdraws`
--

CREATE TABLE `vendor_withdraws` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `custom_amount` double(8,2) NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affiliate_settings`
--
ALTER TABLE `affiliate_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_tokens`
--
ALTER TABLE `api_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_currency_values`
--
ALTER TABLE `custom_currency_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_areas`
--
ALTER TABLE `delivery_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `download_extras`
--
ALTER TABLE `download_extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_languages`
--
ALTER TABLE `manage_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `object_relationships`
--
ALTER TABLE `object_relationships`
  ADD PRIMARY KEY (`term_id`,`object_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_extras`
--
ALTER TABLE `post_extras`
  ADD PRIMARY KEY (`post_extra_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_extras`
--
ALTER TABLE `product_extras`
  ADD PRIMARY KEY (`product_extra_id`);

--
-- Indexes for table `request_products`
--
ALTER TABLE `request_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `save_custom_designs`
--
ALTER TABLE `save_custom_designs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `term_extras`
--
ALTER TABLE `term_extras`
  ADD PRIMARY KEY (`term_extra_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_custom_designs`
--
ALTER TABLE `users_custom_designs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_details`
--
ALTER TABLE `users_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role_permissions`
--
ALTER TABLE `user_role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_announcements`
--
ALTER TABLE `vendor_announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_orders`
--
ALTER TABLE `vendor_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_packages`
--
ALTER TABLE `vendor_packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendor_packages_package_type_unique` (`package_type`);

--
-- Indexes for table `vendor_totals`
--
ALTER TABLE `vendor_totals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_withdraws`
--
ALTER TABLE `vendor_withdraws`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affiliate_settings`
--
ALTER TABLE `affiliate_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `api_tokens`
--
ALTER TABLE `api_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `custom_currency_values`
--
ALTER TABLE `custom_currency_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `delivery_areas`
--
ALTER TABLE `delivery_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `download_extras`
--
ALTER TABLE `download_extras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `manage_languages`
--
ALTER TABLE `manage_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `post_extras`
--
ALTER TABLE `post_extras`
  MODIFY `post_extra_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product_extras`
--
ALTER TABLE `product_extras`
  MODIFY `product_extra_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;
--
-- AUTO_INCREMENT for table `request_products`
--
ALTER TABLE `request_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `save_custom_designs`
--
ALTER TABLE `save_custom_designs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `term_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `term_extras`
--
ALTER TABLE `term_extras`
  MODIFY `term_extra_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users_custom_designs`
--
ALTER TABLE `users_custom_designs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_details`
--
ALTER TABLE `users_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_role_permissions`
--
ALTER TABLE `user_role_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vendor_announcements`
--
ALTER TABLE `vendor_announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vendor_orders`
--
ALTER TABLE `vendor_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vendor_packages`
--
ALTER TABLE `vendor_packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vendor_totals`
--
ALTER TABLE `vendor_totals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vendor_withdraws`
--
ALTER TABLE `vendor_withdraws`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
