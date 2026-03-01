-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 01, 2026 at 07:51 PM
-- Server version: 11.4.10-MariaDB
-- PHP Version: 8.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qbitbmsstore_lwm`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `video_thumb` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `about_points` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `description`, `video_thumb`, `video_link`, `image`, `about_points`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to the World of Sultana\'s Dream', '<span class=\"about-nine__content__text\"><p data-start=\"167\" data-end=\"414\"><b data-path-to-node=\"3\" data-index-in-node=\"0\">LWM</b> is a premier creative hub dedicated to nurturing the art of visual storytelling. Led by the celebrated actress and visionary <b data-path-to-node=\"3\" data-index-in-node=\"129\">Toma Mirza</b>, our organization serves as a bridge between aspiring creators and the global cinematic stage. We believe that every moment has a story, and our mission is to provide the tools, platform, and community needed to bring those stories to life.</p></span>', 'uploads/about/video_thumb/697ce7064f95b.jpg', 'https://drive.google.com/file/d/11XfzlIY5jF1act6bG1eNEON7tMdJK2Ek/view?usp=drive_link', 'uploads/about/image/697ce70650cbb.jpg', '[\"50+ Short Film Exhibition\",\"15+ Specialized Workshops\",\"Expert Real Estate Consultancy\",\"Talent Development & Networking\"]', 1, '2025-08-27 05:35:48', '2026-01-30 17:18:36');

-- --------------------------------------------------------

--
-- Table structure for table `about_keypoints`
--

CREATE TABLE `about_keypoints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_id` bigint(20) UNSIGNED NOT NULL,
  `keypoint` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `cover_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `date`, `cover_image`, `status`, `created_at`, `updated_at`) VALUES
(7, 'A Dialogue with Isabel Herguera', '2025-12-08', 'uploads/albums/697cf2da5ffd0.jpg', 1, '2026-01-27 15:52:21', '2026-01-30 18:19:46'),
(8, 'A Creative Journey with Isabel Herguera', '2025-12-13', 'uploads/album_covers/697cf2f59155e.jpg', 1, '2026-01-30 18:05:41', '2026-01-30 18:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `album_image_videos`
--

CREATE TABLE `album_image_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `type` enum('image','video') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `album_image_videos`
--

INSERT INTO `album_image_videos` (`id`, `album_id`, `file_path`, `type`, `created_at`, `updated_at`) VALUES
(38, 7, 'uploads/albums/697cf373b2ee0.jpg', 'image', '2026-01-30 18:07:47', '2026-01-30 18:07:47'),
(39, 7, 'uploads/albums/697cf373be67e.jpg', 'image', '2026-01-30 18:07:47', '2026-01-30 18:07:47'),
(40, 7, 'uploads/albums/697cf373c1747.jpg', 'image', '2026-01-30 18:07:47', '2026-01-30 18:07:47'),
(41, 7, 'uploads/albums/697cf373c4117.jpg', 'image', '2026-01-30 18:07:47', '2026-01-30 18:07:47'),
(42, 7, 'uploads/albums/697cf373c6464.jpg', 'image', '2026-01-30 18:07:47', '2026-01-30 18:07:47'),
(43, 8, 'uploads/albums/697cf38899d1b.jpg', 'image', '2026-01-30 18:08:08', '2026-01-30 18:08:08'),
(44, 8, 'uploads/albums/697cf388a12b5.jpg', 'image', '2026-01-30 18:08:08', '2026-01-30 18:08:08'),
(45, 8, 'uploads/albums/697cf388a3484.jpg', 'image', '2026-01-30 18:08:08', '2026-01-30 18:08:08'),
(46, 8, 'uploads/albums/697cf388a6123.jpg', 'image', '2026-01-30 18:08:08', '2026-01-30 18:08:08'),
(47, 8, 'uploads/albums/697cf388a8f89.jpg', 'image', '2026-01-30 18:08:08', '2026-01-30 18:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `show_url` tinyint(1) NOT NULL DEFAULT 0,
  `icon` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `blog_url` varchar(255) DEFAULT NULL,
  `blog_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `blog_url`, `blog_category_id`, `slug`, `description`, `image`, `date`, `author`, `tags`, `status`, `created_at`, `updated_at`) VALUES
(1, 'International Mother Language Day 1952: A Legacy Written in Blood', NULL, 1, 'international-mother-language-day-1952-a-legacy-written-in-blood', '<p data-start=\"70\" data-end=\"383\"></p><h3 data-start=\"480\" data-end=\"522\">The Background: Why the Movement Began</h3><p data-start=\"524\" data-end=\"777\">After the creation of <span class=\"hover:entity-accent entity-underline inline cursor-pointer align-baseline\">Pakistan</span> in 1947, the government declared <strong data-start=\"617\" data-end=\"625\">Urdu</strong> as the only state language, even though the majority of the population spoke Bangla. This decision sparked widespread dissatisfaction in East Pakistan.</p><p data-start=\"779\" data-end=\"958\">Language is more than communication—it is culture, history, and identity. The people of East Pakistan strongly believed that Bangla deserved equal recognition as a state language.</p><p data-start=\"960\" data-end=\"1115\">The demand for Bangla grew stronger through protests, political movements, and student activism, particularly at the <span class=\"hover:entity-accent entity-underline inline cursor-pointer align-baseline\">University of Dhaka</span>.</p><hr data-start=\"1117\" data-end=\"1120\"><h3 data-start=\"1122\" data-end=\"1165\">February 21, 1952: The Day of Sacrifice</h3><p data-start=\"1167\" data-end=\"1397\">On <strong data-start=\"1170\" data-end=\"1191\">February 21, 1952</strong>, students gathered in Dhaka to protest against the government\'s decision and demand recognition of Bangla as a state language. Despite Section 144 (which banned public gatherings), they marched peacefully.</p><p data-start=\"1399\" data-end=\"1436\">Police opened fire on the protesters.</p><p data-start=\"1438\" data-end=\"1478\">Several students were killed, including:</p><ul data-start=\"1480\" data-end=\"1689\">\r\n<li data-start=\"1480\" data-end=\"1521\">\r\n<p data-start=\"1482\" data-end=\"1521\"><span class=\"hover:entity-accent entity-underline inline cursor-pointer align-baseline\">Abdul Jabbar</span></p>\r\n</li>\r\n<li data-start=\"1522\" data-end=\"1563\">\r\n<p data-start=\"1524\" data-end=\"1563\"><span class=\"hover:entity-accent entity-underline inline cursor-pointer align-baseline\">Abul Barkat</span></p>\r\n</li>\r\n<li data-start=\"1564\" data-end=\"1605\">\r\n<p data-start=\"1566\" data-end=\"1605\"><span class=\"hover:entity-accent entity-underline inline cursor-pointer align-baseline\">Rafiq Uddin Ahmed</span></p>\r\n</li>\r\n<li data-start=\"1606\" data-end=\"1647\">\r\n<p data-start=\"1608\" data-end=\"1647\"><span class=\"hover:entity-accent entity-underline inline cursor-pointer align-baseline\">Abdus Salam</span></p>\r\n</li>\r\n<li data-start=\"1648\" data-end=\"1689\">\r\n<p data-start=\"1650\" data-end=\"1689\"><span class=\"hover:entity-accent entity-underline inline cursor-pointer align-baseline\">Shafiur Rahman</span></p>\r\n</li>\r\n</ul><p data-start=\"1691\" data-end=\"1760\">Their sacrifice deeply moved the nation and intensified the movement.</p><hr data-start=\"1762\" data-end=\"1765\"><h3 data-start=\"1767\" data-end=\"1792\">Recognition of Bangla</h3><p data-start=\"1794\" data-end=\"2067\">The protests continued, and in <strong data-start=\"1825\" data-end=\"1833\">1956</strong>, Bangla was finally recognized as one of the state languages of Pakistan. The Language Movement became a foundation for future resistance movements, eventually leading to the Liberation War of 1971 and the independence of Bangladesh.</p><hr data-start=\"2069\" data-end=\"2072\"><h3 data-start=\"2074\" data-end=\"2122\">From National Mourning to Global Recognition</h3><p data-start=\"2124\" data-end=\"2318\">In Bangladesh, February 21 is observed as <strong data-start=\"2166\" data-end=\"2199\">Shaheed Dibosh (Martyrs’ Day)</strong>. People visit the <span class=\"hover:entity-accent entity-underline inline cursor-pointer align-baseline\">Shaheed Minar</span> to pay tribute to the martyrs with flowers and silent respect.</p><p data-start=\"2320\" data-end=\"2560\">The significance of this day crossed national borders when, in 1999, <span class=\"hover:entity-accent entity-underline inline cursor-pointer align-baseline\">UNESCO</span> officially declared February 21 as <strong data-start=\"2462\" data-end=\"2499\">International Mother Language Day</strong>. Since 2000, the day has been observed worldwide to promote:</p><ul data-start=\"2562\" data-end=\"2675\">\r\n<li data-start=\"2562\" data-end=\"2586\">\r\n<p data-start=\"2564\" data-end=\"2586\">Linguistic diversity</p>\r\n</li>\r\n<li data-start=\"2587\" data-end=\"2613\">\r\n<p data-start=\"2589\" data-end=\"2613\">Multilingual education</p>\r\n</li>\r\n<li data-start=\"2614\" data-end=\"2654\">\r\n<p data-start=\"2616\" data-end=\"2654\">Preservation of endangered languages</p>\r\n</li>\r\n<li data-start=\"2655\" data-end=\"2675\">\r\n<p data-start=\"2657\" data-end=\"2675\">Cultural harmony</p>\r\n</li>\r\n</ul><hr data-start=\"2677\" data-end=\"2680\"><h3 data-start=\"2682\" data-end=\"2737\">Why International Mother Language Day Matters Today</h3><p data-start=\"2739\" data-end=\"2887\">Today, thousands of languages around the world are at risk of disappearing. When a language dies, a part of culture and heritage disappears with it.</p><p data-start=\"2889\" data-end=\"2934\">International Mother Language Day reminds us:</p><ul data-start=\"2936\" data-end=\"3106\">\r\n<li data-start=\"2936\" data-end=\"2984\">\r\n<p data-start=\"2938\" data-end=\"2984\">To respect and preserve our native languages</p>\r\n</li>\r\n<li data-start=\"2985\" data-end=\"3016\">\r\n<p data-start=\"2987\" data-end=\"3016\">To value cultural diversity</p>\r\n</li>\r\n<li data-start=\"3017\" data-end=\"3059\">\r\n<p data-start=\"3019\" data-end=\"3059\">To promote education in mother tongues</p>\r\n</li>\r\n<li data-start=\"3060\" data-end=\"3106\">\r\n<p data-start=\"3062\" data-end=\"3106\">To stand against linguistic discrimination</p>\r\n</li>\r\n</ul><hr data-start=\"3108\" data-end=\"3111\"><h3 data-start=\"3113\" data-end=\"3127\">Conclusion</h3><p data-start=\"3129\" data-end=\"3366\">The events of February 21, 1952, prove that language is not just words—it is identity, pride, and freedom. The brave students who sacrificed their lives did more than protect Bangla; they inspired a global movement for linguistic rights.</p><p data-start=\"87\" data-end=\"396\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p data-start=\"3368\" data-end=\"3542\">International Mother Language Day is not only a tribute to the martyrs of 1952 but also a reminder to the world: <strong data-start=\"3481\" data-end=\"3542\">Every language matters. Every voice deserves to be heard.</strong></p>', 'uploads/blog/images/69a48662e8404.jpg', '2025-08-04', 'Admin', NULL, 1, '2025-08-28 12:55:59', '2026-03-02 00:33:06'),
(8, 'ARCHIVES & EVENTS', 'https://www.liberationwarmuseumbd.org/single/26', 1, 'archives-events', '<h2>The Liberation War of 1971: Birth of a Nation</h2><p>The <strong>Liberation War of 1971</strong> stands as one of the most defining and emotional chapters in the history of Bangladesh. It was not merely a war for territory—it was a struggle for identity, language, democracy, and dignity. The nine-month conflict ultimately led to the emergence of Bangladesh as an independent nation on December 16, 1971.</p><hr><h3>Historical Background</h3><p>To understand the Liberation War, we must go back to <strong>1947</strong>, when the Indian subcontinent was partitioned into India and Pakistan. Pakistan was created in two geographically separate parts: <strong>West Pakistan</strong> (present-day Pakistan) and <strong>East Pakistan</strong> (present-day Bangladesh), separated by more than 1,600 kilometers of Indian territory.</p><p>Despite having a larger population, East Pakistan faced:</p><ul><li><p>Political marginalization</p></li><li><p>Economic exploitation</p></li><li><p>Cultural and linguistic suppression</p></li></ul><p>The first major spark came with the <strong>Language Movement of 1952</strong>, when the people of East Pakistan demanded recognition of Bangla as a state language.</p><hr><h3>The Road to War</h3><p>Tensions escalated after the <strong>1970 general election</strong>, in which the Awami League led by Sheikh Mujibur Rahman won an overwhelming majority. However, the ruling authorities in West Pakistan refused to transfer power.</p><p>On the night of <strong>March 25, 1971</strong>, the Pakistan Army launched <strong>Operation Searchlight</strong>, a brutal military crackdown in East Pakistan. Thousands of civilians, students, and intellectuals were killed.</p><p>In the early hours of <strong>March 26, 1971</strong>, Sheikh Mujibur Rahman declared the independence of Bangladesh, marking the formal beginning of the Liberation War.</p><hr><h3>The War and Resistance</h3><p>The people of Bangladesh rose in resistance. The freedom fighters, known as the <strong>Mukti Bahini</strong>, organized guerrilla warfare against the Pakistani military. Ordinary citizens—farmers, students, workers, and women—joined the struggle.</p><p>Key features of the war included:</p><ul><li><p>Guerrilla attacks by Mukti Bahini</p></li><li><p>Mass displacement and refugee crisis</p></li><li><p>Widespread atrocities against civilians</p></li><li><p>Growing international attention</p></li></ul><p>Neighboring India provided crucial support to the Bangladeshi resistance. Eventually, in December 1971, India formally entered the war against Pakistan.</p><hr><h3>Victory and Independence</h3><p>The war reached its climax on <strong>December 16, 1971</strong>, when the Pakistani forces in East Pakistan surrendered to the joint command of the Indian Army and Mukti Bahini in Dhaka.</p><p>This historic victory resulted in:</p><ul><li><p>The birth of <strong>Bangladesh</strong> as an independent state</p></li><li><p>The end of Pakistani rule in the eastern region</p></li><li><p>International recognition of the new nation</p></li></ul><p>December 16 is now celebrated as <strong>Victory Day</strong> in Bangladesh.</p><hr><h3>Human Cost and Legacy</h3><p>The Liberation War came at an enormous human cost. Millions were displaced, and countless lives were lost. The conflict left deep scars but also forged a strong national identity rooted in sacrifice and resilience.</p><p>Today, the war remains central to Bangladesh’s national consciousness. It symbolizes:</p><ul><li><p>The triumph of justice over oppression</p></li><li><p>The power of unity and cultural identity</p></li><li><p>The enduring spirit of freedom</p></li></ul><hr><h3>Conclusion</h3><p>The Liberation War of 1971 was more than a military conflict—it was a people’s revolution. Through immense sacrifice and unwavering determination, the people of Bangladesh secured their right to self-determination.</p><p>As generations pass, remembering the events of 1971 is essential—not only to honor the martyrs but also to preserve the values of freedom, democracy, and national pride that gave birth to Bangladesh.</p><hr><p><br></p>', 'uploads/blog/images/69a485b3add7d.jpg', '2024-11-05', NULL, NULL, 1, '2026-03-02 00:30:11', '2026-03-02 00:30:11'),
(9, 'December 16, 1971: Victory Day and the Birth of a Nation', NULL, 1, 'december-16-1971-victory-day-and-the-birth-of-a-nation', '<p data-start=\"61\" data-end=\"337\"><strong data-start=\"61\" data-end=\"82\">December 16, 1971</strong> is one of the most glorious and emotional days in the history of <span class=\"hover:entity-accent entity-underline inline cursor-pointer align-baseline\">Bangladesh</span>. Known as <strong data-start=\"196\" data-end=\"211\">Victory Day</strong>, this date marks the triumphant end of the Liberation War and the official emergence of Bangladesh as an independent country.</p><p data-start=\"339\" data-end=\"439\">It is a day of pride, remembrance, and deep gratitude for the sacrifices that made freedom possible.</p><hr data-start=\"441\" data-end=\"444\"><h3 data-start=\"446\" data-end=\"485\">The Background: A Nation’s Struggle</h3><p data-start=\"487\" data-end=\"717\">The road to December 16 was paved with struggle and sacrifice. After years of political, economic, and cultural discrimination by <span class=\"hover:entity-accent entity-underline inline cursor-pointer align-baseline\">Pakistan</span>, the people of East Pakistan demanded their democratic rights.</p><p data-start=\"719\" data-end=\"964\">When the <span class=\"hover:entity-accent entity-underline inline cursor-pointer align-baseline\">Awami League</span>, led by <span class=\"hover:entity-accent entity-underline inline cursor-pointer align-baseline\">Sheikh Mujibur Rahman</span>, won a majority in the 1970 general election, power was not transferred. Instead, on March 25, 1971, the Pakistani military launched a brutal crackdown.</p><p data-start=\"966\" data-end=\"1037\">This marked the beginning of the nine-month <strong data-start=\"1010\" data-end=\"1036\">Liberation War of 1971</strong>.</p><hr data-start=\"1039\" data-end=\"1042\"><h3 data-start=\"1044\" data-end=\"1073\">The Final Days of the War</h3><p data-start=\"1075\" data-end=\"1358\">Throughout 1971, the brave freedom fighters known as the Mukti Bahini, along with ordinary citizens, fought courageously against the occupying forces. Millions of refugees fled to neighboring <span class=\"hover:entity-accent entity-underline inline cursor-pointer align-baseline\">India</span>, which later joined the war in support of Bangladesh.</p><p data-start=\"1360\" data-end=\"1555\">By December, the Pakistani forces were surrounded and defeated. On <strong data-start=\"1427\" data-end=\"1448\">December 16, 1971</strong>, the Pakistani army formally surrendered in Dhaka to the joint forces of the Indian Army and Mukti Bahini.</p><p data-start=\"1557\" data-end=\"1668\">The surrender took place at the historic <span class=\"hover:entity-accent entity-underline inline cursor-pointer align-baseline\">Ramna Race Course</span> (now known as Suhrawardy Udyan).</p><p data-start=\"1670\" data-end=\"1692\">This moment signified:</p><ul data-start=\"1694\" data-end=\"1822\">\r\n<li data-start=\"1694\" data-end=\"1740\">\r\n<p data-start=\"1696\" data-end=\"1740\">The end of Pakistani rule in East Pakistan</p>\r\n</li>\r\n<li data-start=\"1741\" data-end=\"1782\">\r\n<p data-start=\"1743\" data-end=\"1782\">The victory of the Bangladeshi people</p>\r\n</li>\r\n<li data-start=\"1783\" data-end=\"1822\">\r\n<p data-start=\"1785\" data-end=\"1822\">The birth of a new sovereign nation</p>\r\n</li>\r\n</ul><hr data-start=\"1824\" data-end=\"1827\"><h3 data-start=\"1829\" data-end=\"1858\">The Human Cost of Freedom</h3><p data-start=\"1860\" data-end=\"2060\">Victory came at a heartbreaking price. Millions of people were displaced, and countless civilians lost their lives. Intellectuals, students, women, and freedom fighters endured unimaginable suffering.</p><p data-start=\"2062\" data-end=\"2185\">December 16 is not only a celebration—it is also a day to remember the martyrs whose sacrifices made independence possible.</p><hr data-start=\"2187\" data-end=\"2190\"><h3 data-start=\"2192\" data-end=\"2225\">How Victory Day Is Celebrated</h3><p data-start=\"2227\" data-end=\"2252\">Every year in Bangladesh:</p><ul data-start=\"2254\" data-end=\"2490\">\r\n<li data-start=\"2254\" data-end=\"2304\">\r\n<p data-start=\"2256\" data-end=\"2304\">The national flag is raised across the country</p>\r\n</li>\r\n<li data-start=\"2305\" data-end=\"2379\">\r\n<p data-start=\"2307\" data-end=\"2379\">Wreaths are laid at the <span class=\"hover:entity-accent entity-underline inline cursor-pointer align-baseline\">National Martyrs\' Memorial</span> in Savar</p>\r\n</li>\r\n<li data-start=\"2380\" data-end=\"2427\">\r\n<p data-start=\"2382\" data-end=\"2427\">Parades and cultural programs are organized</p>\r\n</li>\r\n<li data-start=\"2428\" data-end=\"2490\">\r\n<p data-start=\"2430\" data-end=\"2490\">The nation observes moments of silence to honor the fallen</p>\r\n</li>\r\n</ul><p data-start=\"2492\" data-end=\"2562\">The spirit of Victory Day fills the country with patriotism and unity.</p><hr data-start=\"2564\" data-end=\"2567\"><h3 data-start=\"2569\" data-end=\"2598\">The Legacy of December 16</h3><p data-start=\"2600\" data-end=\"2630\">December 16, 1971, symbolizes:</p><ul data-start=\"2632\" data-end=\"2775\">\r\n<li data-start=\"2632\" data-end=\"2674\">\r\n<p data-start=\"2634\" data-end=\"2674\">The triumph of justice over oppression</p>\r\n</li>\r\n<li data-start=\"2675\" data-end=\"2712\">\r\n<p data-start=\"2677\" data-end=\"2712\">The power of unity and resilience</p>\r\n</li>\r\n<li data-start=\"2713\" data-end=\"2775\">\r\n<p data-start=\"2715\" data-end=\"2775\">The determination of a people to control their own destiny</p>\r\n</li>\r\n</ul><p data-start=\"2777\" data-end=\"2860\">It reminds future generations that freedom is earned through courage and sacrifice.</p><hr data-start=\"2862\" data-end=\"2865\"><h3 data-start=\"2867\" data-end=\"2881\">Conclusion</h3><p data-start=\"2883\" data-end=\"3084\">Victory Day is more than a historical event—it is the heartbeat of Bangladesh. The red and green flag that flies high each December 16 represents the blood of the martyrs and the hope of a free nation.</p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p data-start=\"3086\" data-end=\"3246\">As Bangladesh moves forward, remembering the spirit of 1971 ensures that the values of independence, democracy, and national pride continue to guide the nation.</p>', 'uploads/blog/images/69a486d632fff.jpg', '2022-12-16', NULL, NULL, 1, '2026-03-02 00:35:02', '2026-03-02 00:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Historic', 1, '2025-08-28 12:54:28', '2026-03-02 00:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `call_to_actions`
--

CREATE TABLE `call_to_actions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `data_count` varchar(255) DEFAULT NULL,
  `counter_symbol` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_url` varchar(255) DEFAULT NULL,
  `main_icon` varchar(255) DEFAULT NULL,
  `call_button_text` varchar(255) DEFAULT NULL,
  `call_button_url` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `call_button_icon` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `call_to_actions`
--

INSERT INTO `call_to_actions` (`id`, `title`, `sub_title`, `data_count`, `counter_symbol`, `short_description`, `button_text`, `button_url`, `main_icon`, `call_button_text`, `call_button_url`, `contact_no`, `call_button_icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Excellence Delivered Across Industries', 'Trusted by Industries nationwide.', '680', '+', 'Completed Project', 'Call to Get Your Free Consultation', 'tel:+8801886335682', NULL, NULL, NULL, NULL, NULL, 0, '2025-08-27 05:35:48', '2026-01-11 07:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `vacancy` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `responsibilities` text DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `show_url` tinyint(1) NOT NULL DEFAULT 0,
  `logo` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `map` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `film_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `film_id`, `name`, `phone`, `email`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(2, NULL, 'Sumon', NULL, 'hasansumonm1@gmail.com', 'Missed Interview – Civil Engineer Position', 'Hello Sir/Madam,\nI’m sorry I missed your interview email for the Civil Engineer position. I’m still very interested in working with your company. Please keep me in mind for any future vacancies related to my field.\n\nThank you for your understanding.\n\nBest regards,\nSumon Hasan\nCivil Engineer\n📞 01860668965', 1, '2025-10-09 09:06:09', '2025-11-04 13:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `cover_images`
--

CREATE TABLE `cover_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cover_images`
--

INSERT INTO `cover_images` (`id`, `page_name`, `cover_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'about', 'uploads/cover_images/68e74d8a4009f.jpg', 1, '2025-08-31 12:17:02', '2025-10-09 11:52:10'),
(2, 'service', 'uploads/cover_images/68e3a2b0e2104.jpg', 1, '2025-08-31 12:17:02', '2025-10-06 17:06:24'),
(3, 'product', 'uploads/cover_images/68b43e020139e.jpg', 1, '2025-08-31 12:17:02', '2025-08-31 12:20:18'),
(4, 'project', 'uploads/cover_images/68e3a4d2c84c2.jpg', 1, '2025-08-31 12:17:02', '2025-10-06 17:15:30'),
(5, 'gallery', 'uploads/cover_images/68e3a45316ae2.jpg', 1, '2025-08-31 12:17:02', '2025-10-06 17:13:23'),
(6, 'news', 'uploads/cover_images/68e3a4411c00e.jpg', 1, '2025-08-31 12:17:02', '2025-10-06 17:13:05'),
(7, 'contact', 'uploads/cover_images/68e3a42ff0912.jpg', 1, '2025-08-31 12:17:02', '2025-10-06 17:12:47'),
(8, 'why_choose', 'uploads/cover_images/68ee43cad6d65.png', 1, NULL, '2025-10-14 18:36:26'),
(9, 'team', NULL, 1, NULL, NULL),
(10, 'career', NULL, 1, NULL, NULL),
(12, 'estimate', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `bn_name` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `long` varchar(255) NOT NULL,
  `zone_charge` decimal(10,0) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `long`, `zone_charge`, `created_at`, `updated_at`) VALUES
(1, 3, 'Dhaka', 'ঢাকা', '23.7115253', '90.4111451', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(2, 3, 'Faridpur', 'ফরিদপুর', '23.6070822', '89.8429406', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(3, 3, 'Gazipur', 'গাজীপুর', '24.0022858', '90.4264283', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(4, 3, 'Gopalganj', 'গোপালগঞ্জ', '23.0050857', '89.8266059', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(5, 8, 'Jamalpur', 'জামালপুর', '24.937533', '89.937775', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(6, 3, 'Kishoreganj', 'কিশোরগঞ্জ', '24.444937', '90.776575', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(7, 3, 'Madaripur', 'মাদারীপুর', '23.164102', '90.1896805', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(8, 3, 'Manikganj', 'মানিকগঞ্জ', '23.8644', '90.0047', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(9, 3, 'Munshiganj', 'মুন্সিগঞ্জ', '23.5422', '90.5305', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(10, 8, 'Mymensingh', 'ময়মনসিংহ', '24.7471', '90.4203', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(11, 3, 'Narayanganj', 'নারায়াণগঞ্জ', '23.63366', '90.496482', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(12, 3, 'Narsingdi', 'নরসিংদী', '23.932233', '90.71541', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(13, 8, 'Netrokona', 'নেত্রকোণা', '24.870955', '90.727887', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(14, 3, 'Rajbari', 'রাজবাড়ি', '23.7574305', '89.6444665', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(15, 3, 'Shariatpur', 'শরীয়তপুর', '23.2423', '90.4348', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(16, 8, 'Sherpur', 'শেরপুর', '25.0204933', '90.0152966', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(17, 3, 'Tangail', 'টাঙ্গাইল', '24.2513', '89.9167', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(18, 5, 'Bogura', 'বগুড়া', '24.8465228', '89.377755', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(19, 5, 'Joypurhat', 'জয়পুরহাট', '25.0968', '89.0227', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(20, 5, 'Naogaon', 'নওগাঁ', '24.7936', '88.9318', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(21, 5, 'Natore', 'নাটোর', '24.420556', '89.000282', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(22, 5, 'Chapai Nawabganj', 'চাঁপাইনবাবগঞ্জ', '24.5965034', '88.2775122', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(23, 5, 'Pabna', 'পাবনা', '23.998524', '89.233645', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(24, 5, 'Rajshahi', 'রাজশাহী', '24.3745', '88.6042', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(25, 5, 'Sirajgonj', 'সিরাজগঞ্জ', '24.4533978', '89.7006815', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(26, 6, 'Dinajpur', 'দিনাজপুর', '25.6217061', '88.6354504', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(27, 6, 'Gaibandha', 'গাইবান্ধা', '25.328751', '89.528088', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(28, 6, 'Kurigram', 'কুড়িগ্রাম', '25.805445', '89.636174', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(29, 6, 'Lalmonirhat', 'লালমনিরহাট', '25.9923', '89.2847', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(30, 6, 'Nilphamari', 'নীলফামারী', '25.931794', '88.856006', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(31, 6, 'Panchagarh', 'পঞ্চগড়', '26.3411', '88.5541606', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(32, 6, 'Rangpur', 'রংপুর', '25.7558096', '89.244462', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(33, 6, 'Thakurgaon', 'ঠাকুরগাঁও', '26.0336945', '88.4616834', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(34, 1, 'Barguna', 'বরগুনা', '22.0953', '90.1121', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(35, 1, 'Barishal', 'বরিশাল', '22.7010', '90.3535', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(36, 1, 'Bhola', 'ভোলা', '22.685923', '90.648179', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(37, 1, 'Jhalokati', 'ঝালকাঠি', '22.6406', '90.1987', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(38, 1, 'Patuakhali', 'পটুয়াখালী', '22.3596316', '90.3298712', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(39, 1, 'Pirojpur', 'পিরোজপুর', '22.5841', '89.9720', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(40, 2, 'Bandarban', 'বান্দরবান', '22.1953275', '92.2183773', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(41, 2, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '23.9570904', '91.1119286', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(42, 2, 'Chandpur', 'চাঁদপুর', '23.2332585', '90.6712912', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(43, 2, 'Chattogram', 'চট্টগ্রাম', '22.335109', '91.834073', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(44, 2, 'Cumilla', 'কুমিল্লা', '23.4682747', '91.1788135', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(45, 2, 'Cox\'s Bazar', 'কক্স বাজার', '21.4272', '92.0058', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(46, 2, 'Feni', 'ফেনী', '23.0159', '91.3976', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(47, 2, 'Khagrachari', 'খাগড়াছড়ি', '23.119285', '91.984663', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(48, 2, 'Lakshmipur', 'লক্ষ্মীপুর', '22.942477', '90.841184', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(49, 2, 'Noakhali', 'নোয়াখালী', '22.869563', '91.099398', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(50, 2, 'Rangamati', 'রাঙ্গামাটি', '22.7324', '92.2985', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(51, 7, 'Habiganj', 'হবিগঞ্জ', '24.374945', '91.41553', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(52, 7, 'Maulvibazar', 'মৌলভীবাজার', '24.482934', '91.777417', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(53, 7, 'Sunamganj', 'সুনামগঞ্জ', '25.0658042', '91.3950115', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(54, 7, 'Sylhet', 'সিলেট', '24.8897956', '91.8697894', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(55, 4, 'Bagerhat', 'বাগেরহাট', '22.651568', '89.785938', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(56, 4, 'Chuadanga', 'চুয়াডাঙ্গা', '23.6401961', '88.841841', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(57, 4, 'Jashore', 'যশোর', '23.16643', '89.2081126', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(58, 4, 'Jhenaidah', 'ঝিনাইদহ', '23.5448176', '89.1539213', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(59, 4, 'Khulna', 'খুলনা', '22.815774', '89.568679', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(60, 4, 'Kushtia', 'কুষ্টিয়া', '23.901258', '89.120482', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(61, 4, 'Magura', 'মাগুরা', '23.487337', '89.419956', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(62, 4, 'Meherpur', 'মেহেরপুর', '23.762213', '88.631821', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(63, 4, 'Narail', 'নড়াইল', '23.172534', '89.512672', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(64, 4, 'Satkhira', 'সাতক্ষীরা', '22.7185', '89.0705', 0, '2025-08-27 05:35:48', '2025-08-27 05:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `bn_name` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `long` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `lat`, `long`, `created_at`, `updated_at`) VALUES
(1, 'Barishal', 'বরিশাল', '22.701002', '90.353451', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(2, 'Chattogram', 'চট্টগ্রাম', '22.356851', '91.783182', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(3, 'Dhaka', 'ঢাকা', '23.810332', '90.412518', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(4, 'Khulna', 'খুলনা', '22.845641', '89.540328', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(5, 'Rajshahi', 'রাজশাহী', '24.363589', '88.624135', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(6, 'Rangpur', 'রংপুর', '25.743892', '89.275227', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(7, 'Sylhet', 'সিলেট', '24.894929', '91.868706', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(8, 'Mymensingh', 'ময়মনসিংহ', '24.747149', '90.420273', '2025-08-27 05:35:48', '2025-08-27 05:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `estimations`
--

CREATE TABLE `estimations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `film_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `film_type` varchar(255) DEFAULT NULL,
  `price_per_sft` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exhibitions`
--

CREATE TABLE `exhibitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exhibition_title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `director_name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `synopsis` text DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exhibitions`
--

INSERT INTO `exhibitions` (`id`, `exhibition_title`, `slug`, `image`, `director_name`, `status`, `created_at`, `updated_at`, `synopsis`, `video`) VALUES
(5016, 'Library Initiatives, Creative  Displays & Pitha Utsab', 'library-initiatives-creative-displays-pitha-utsab-69a47c4b007b1', NULL, 'Liberation War  Museum', 1, '2026-03-01 23:50:03', '2026-03-01 23:50:03', '<p>Participatory exhibitions during the first phase of the \r\nSultana’s Dream Reading Campaign&nbsp;</p>', NULL),
(5017, 'Street Children’s Creative Art  Workshops', 'street-childrens-creative-art-workshops-69a47dbc49033', NULL, 'LEEDO Happy Home', 1, '2026-03-01 23:56:12', '2026-03-01 23:56:12', '<p>Art workshops with street children inspired by Sultana’s \r\nDream&nbsp;</p>', NULL),
(5018, 'Photography Exhibition on  Sultana’s Dream: A Journey  through Perspectives and  Collaboration', 'photography-exhibition-on-sultanas-dream-a-journey-through-perspectives-and-collaboration-69a47e335b071', NULL, 'University of Liberal  Arts Bangladesh  (ULAB)', 1, '2026-03-01 23:58:11', '2026-03-01 23:58:11', '<p>Visual exhibition alongside academic discussions.&nbsp;</p>', NULL),
(5019, 'Reimagining Sultana’s Dream  Exhibition', 'reimagining-sultanas-dream-exhibition-69a47f5d1ccb9', NULL, 'Liberation War  Museum', 1, '2026-03-02 00:03:09', '2026-03-02 00:03:09', '<p>Major thematic exhibition with 19 artists of Kalakendra&nbsp;&nbsp;<span style=\"font-size: 1.07rem;\">inspired by Sultana’s Dream.&nbsp;</span></p><div><br></div>', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exhibition_categories`
--

CREATE TABLE `exhibition_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exhibition_images`
--

CREATE TABLE `exhibition_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exhibition_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exhibition_images`
--

INSERT INTO `exhibition_images` (`id`, `exhibition_id`, `image`, `created_at`, `updated_at`) VALUES
(7, 4, 'uploads/project_images/68e356e4396b1.jpg', '2025-10-06 11:43:00', '2025-10-06 11:43:00'),
(8, 4, 'uploads/project_images/68e356e43b344.jpg', '2025-10-06 11:43:00', '2025-10-06 11:43:00'),
(9, 4, 'uploads/project_images/68e356e43b95f.jpg', '2025-10-06 11:43:00', '2025-10-06 11:43:00'),
(10, 5, 'uploads/project_images/68e3586cbe984.jpg', '2025-10-06 11:49:32', '2025-10-06 11:49:32'),
(11, 5, 'uploads/project_images/68e3586cc07b1.jpg', '2025-10-06 11:49:32', '2025-10-06 11:49:32'),
(12, 5, 'uploads/project_images/68e3586cc0e27.jpg', '2025-10-06 11:49:32', '2025-10-06 11:49:32'),
(13, 6, 'uploads/project_images/68e359272bf3e.jpg', '2025-10-06 11:52:39', '2025-10-06 11:52:39'),
(14, 6, 'uploads/project_images/68e359272dc62.jpg', '2025-10-06 11:52:39', '2025-10-06 11:52:39'),
(15, 6, 'uploads/project_images/68e359272e1ab.jpg', '2025-10-06 11:52:39', '2025-10-06 11:52:39'),
(16, 7, 'uploads/project_images/68e35a147d27a.jpg', '2025-10-06 11:56:36', '2025-10-06 11:56:36'),
(17, 7, 'uploads/project_images/68e35a147fb6f.jpg', '2025-10-06 11:56:36', '2025-10-06 11:56:36'),
(18, 7, 'uploads/project_images/68e35a148012e.jpg', '2025-10-06 11:56:36', '2025-10-06 11:56:36'),
(19, 7, 'uploads/project_images/68e35a1480dce.jpg', '2025-10-06 11:56:36', '2025-10-06 11:56:36'),
(20, 8, 'uploads/project_images/68e35addc45a4.jpg', '2025-10-06 11:59:57', '2025-10-06 11:59:57'),
(21, 8, 'uploads/project_images/68e35addc6291.jpg', '2025-10-06 11:59:57', '2025-10-06 11:59:57'),
(22, 8, 'uploads/project_images/68e35addc69ac.jpg', '2025-10-06 11:59:57', '2025-10-06 11:59:57'),
(23, 8, 'uploads/project_images/68e35addc71ba.jpg', '2025-10-06 11:59:57', '2025-10-06 11:59:57'),
(24, 9, 'uploads/project_images/68e35b830a37d.jpg', '2025-10-06 12:02:43', '2025-10-06 12:02:43'),
(25, 9, 'uploads/project_images/68e35b830ca80.jpg', '2025-10-06 12:02:43', '2025-10-06 12:02:43'),
(26, 9, 'uploads/project_images/68e35b830d0e9.jpg', '2025-10-06 12:02:43', '2025-10-06 12:02:43'),
(27, 9, 'uploads/project_images/68e35b830d849.jpg', '2025-10-06 12:02:43', '2025-10-06 12:02:43'),
(2281, 5010, 'uploads/project_images/6978dffd35f5f.png', '2026-01-27 15:55:41', '2026-01-27 15:55:41'),
(2282, 5011, 'uploads/project_images/69799dccdf1ee.jpeg', '2026-01-28 05:25:32', '2026-01-28 05:25:32'),
(2283, 5012, 'uploads/project_images/69799dd643b2a.jpeg', '2026-01-28 05:25:42', '2026-01-28 05:25:42'),
(2284, 5013, 'uploads/project_images/69799de32caea.jpeg', '2026-01-28 05:25:55', '2026-01-28 05:25:55'),
(2285, 5014, 'uploads/project_images/69799defc44c7.JPG', '2026-01-28 05:26:07', '2026-01-28 05:26:07'),
(2286, 5015, 'uploads/project_images/69799df8e1f2c.jpeg', '2026-01-28 05:26:16', '2026-01-28 05:26:16'),
(2287, 5016, 'uploads/exhibition_images/69a47c4b01f6a.jpg', '2026-03-01 23:50:03', '2026-03-01 23:50:03'),
(2288, 5017, 'uploads/exhibition_images/69a47dbc49688.jpg', '2026-03-01 23:56:12', '2026-03-01 23:56:12'),
(2289, 5018, 'uploads/exhibition_images/69a47e335b646.jpeg', '2026-03-01 23:58:11', '2026-03-01 23:58:11'),
(2290, 5019, 'uploads/exhibition_images/69a47f5d1d272.jpg', '2026-03-02 00:03:09', '2026-03-02 00:03:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(7, 'How does GoldenEye help me secure my \"dream plot\"?', 'We provide end-to-end support, from identifying prime locations to handling legal verification. Our team uses deep market expertise to ensure the plot you choose aligns perfectly with your vision and investment goals.', 1, '2026-01-11 07:29:56', '2026-01-11 07:29:56'),
(8, 'What makes your process \"transparent\"?', 'We believe in a \"no-surprises\" policy. This means providing clear breakdowns of all costs, sharing honest property evaluations, and giving you real-time updates so you are never left in the dark during a transaction.', 1, '2026-01-11 07:30:10', '2026-01-11 07:30:10'),
(9, 'Are there any hidden fees when working with GoldenEye?', 'None at all. Professionalism and integrity are our core values. All service fees and project costs are discussed and documented upfront before any agreements are signed.', 1, '2026-01-11 07:30:31', '2026-01-11 07:30:31'),
(10, 'How do you ensure the professionalism of your team?', 'Every GoldenEye consultant undergoes rigorous training in industry standards and ethics. We prioritize clear communication, punctuality, and detailed documentation to provide a seamless experience for our clients.', 1, '2026-01-11 07:30:49', '2026-01-11 07:30:49'),
(11, 'How do I get started with GoldenEye?', 'Simply reach out via our contact form or phone. We’ll begin with a one-on-one consultation to understand your specific requirements and start the journey toward securing your ideal plot.', 1, '2026-01-11 07:31:05', '2026-01-11 07:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `faq_mains`
--

CREATE TABLE `faq_mains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_url` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_mains`
--

INSERT INTO `faq_mains` (`id`, `title`, `description`, `button_text`, `button_url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Frequently Asked Questions', 'GoldenEye is committed to making the process of finding your dream plot simple and secure. We help you discover the finest land through in-depth real estate market analysis and transparent legal verification. With professionalism and integrity, we stand by you at every step to ensure your investment is safe and your future is secure.', 'Contact Us', 'http://127.0.0.1:8000/contact-us', 1, '2025-08-27 11:49:57', '2026-01-11 07:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `film_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `synopsis` longtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `film_type` text DEFAULT NULL,
  `director_name` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `film_name`, `slug`, `synopsis`, `status`, `created_at`, `updated_at`, `film_type`, `director_name`, `video`) VALUES
(16, 'Docu-Report Sultana’s Dream', 'docu-report-sultanas-dream', '<p style=\"text-align: justify; \">Documentary by Enigma TV on the Sultana’s Dream \r\nreading campaign.&nbsp;&nbsp;</p>', 1, '2026-01-27 19:17:01', '2026-03-01 23:37:10', NULL, 'Liberation War  Museum', NULL),
(17, 'Filmmaking Workshop on  Styles, Perspectives, and  Aspirations of Sultana’s  Dream', 'filmmaking-workshop-on-styles-perspectives-and-aspirations-of-sultanas-dream', '<p style=\"text-align: justify; \">Extended hands-on filmmaking workshop exploring \r\nnarrative, visual language, and feminist imagination \r\ninspired by Sultana’s Dream</p>', 1, '2026-01-27 19:17:01', '2026-03-01 23:36:56', NULL, 'Liberation War  Museum (Film Center)', NULL),
(18, 'A Dialogue with Isabel  Herguera', 'a-dialogue-with-isabel-herguera', '<p style=\"text-align: justify; \">Public dialogue on documentary practice, memory, and \r\nfeminist visual storytelling.</p>', 1, '2026-01-27 19:17:01', '2026-03-01 23:37:37', NULL, '6th Liberation Doc  Community, Liberation  War Museum', NULL),
(19, 'Screening of Five Short Films  by Young Filmmakers', 'screening-of-five-short-films-by-young-filmmakers', '<p style=\"text-align: justify; \">Film workshop outputs reviewed by Isabel Herguera \r\nand team.</p>', 1, '2026-01-27 19:17:01', '2026-03-01 23:38:16', NULL, 'Liberation War  Museum', NULL),
(20, 'MASTERCLASS: Animating  Memory – A Creative Journey  with Isabel Herguera', 'masterclass-animating-memory-a-creative-journey-with-isabel-herguera', '<p style=\"text-align: justify; \">Masterclass on animation, memory, and creative \r\nprocesses.</p>', 1, '2026-01-27 19:17:01', '2026-03-01 23:38:51', NULL, 'Liberation War  Museum', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `film_images`
--

CREATE TABLE `film_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `film_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `film_images`
--

INSERT INTO `film_images` (`id`, `film_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(32, 16, 'uploads/service_images/69790f2da1a29.png', 1, '2026-01-27 19:17:01', '2026-01-27 19:17:01'),
(33, 17, 'uploads/service_images/697997310f903.JPG', 1, '2026-01-28 04:57:21', '2026-01-28 04:57:21'),
(34, 18, 'uploads/service_images/6979974485ff8.JPG', 1, '2026-01-28 04:57:40', '2026-01-28 04:57:40'),
(35, 19, 'uploads/service_images/69799751da093.JPG', 1, '2026-01-28 04:57:53', '2026-01-28 04:57:53'),
(37, 20, 'uploads/service_images/69799b90eef50.jpeg', 1, '2026-01-28 05:16:00', '2026-01-28 05:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `career_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `cover_letter` text DEFAULT NULL,
  `cv` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keypoints`
--

CREATE TABLE `keypoints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keypoints`
--

INSERT INTO `keypoints` (`id`, `title`, `description`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, '50+ Short Film Exhibition', 'A grand showcase featuring over 50 selected short films, providing a platform for diverse storytelling and cinematic creativity from various genres and filmmakers.', 'uploads/keypoint/696fbe3e6e163.png', 1, '2025-08-28 05:32:47', '2026-01-20 23:41:18'),
(2, '15+  Workshops', 'An educational series consisting of more than 15 interactive workshops designed to enhance skills in scriptwriting, direction, cinematography, and post-production for aspiring creators.', 'uploads/keypoint/68c015ad47e3e.png', 1, '2025-08-28 05:44:06', '2026-01-20 23:40:03'),
(3, '200 + Short Film Collection', 'An extensive archive and curation of over 200 short films, representing a wide array of cultures, themes, and artistic expressions for enthusiasts to explore.', 'uploads/keypoint/68c015e816e79.png', 1, '2025-08-28 05:44:55', '2026-01-20 23:40:22');

-- --------------------------------------------------------

--
-- Table structure for table `login_activities`
--

CREATE TABLE `login_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `guard` varchar(255) NOT NULL,
  `login_ip` varchar(45) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_activities`
--

INSERT INTO `login_activities` (`id`, `user_id`, `guard`, `login_ip`, `date_time`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '127.0.0.1', '2025-08-27 05:36:08', '2025-08-27 05:36:08', '2025-08-27 05:36:08'),
(2, 1, 'admin', '127.0.0.1', '2025-08-27 05:50:15', '2025-08-27 05:50:15', '2025-08-27 05:50:15'),
(3, 1, 'admin', '127.0.0.1', '2025-08-27 06:40:43', '2025-08-27 06:40:43', '2025-08-27 06:40:43'),
(4, 1, 'admin', '127.0.0.1', '2025-08-27 11:42:41', '2025-08-27 11:42:41', '2025-08-27 11:42:41'),
(5, 1, 'admin', '127.0.0.1', '2025-08-28 05:20:36', '2025-08-28 05:20:36', '2025-08-28 05:20:36'),
(6, 1, 'admin', '127.0.0.1', '2025-08-28 06:36:23', '2025-08-28 06:36:23', '2025-08-28 06:36:23'),
(7, 1, 'admin', '127.0.0.1', '2025-08-28 10:29:13', '2025-08-28 10:29:13', '2025-08-28 10:29:13'),
(8, 1, 'admin', '127.0.0.1', '2025-08-31 05:08:22', '2025-08-31 05:08:22', '2025-08-31 05:08:22'),
(9, 1, 'admin', '127.0.0.1', '2025-09-01 04:39:48', '2025-09-01 04:39:48', '2025-09-01 04:39:48'),
(10, 1, 'admin', '103.112.52.112', '2025-09-01 18:01:02', '2025-09-01 18:01:02', '2025-09-01 18:01:02'),
(11, 1, 'admin', '103.112.52.112', '2025-09-01 18:09:01', '2025-09-01 18:09:01', '2025-09-01 18:09:01'),
(12, 1, 'admin', '103.112.52.112', '2025-09-01 18:10:27', '2025-09-01 18:10:27', '2025-09-01 18:10:27'),
(13, 1, 'admin', '103.153.28.30', '2025-09-01 18:50:40', '2025-09-01 18:50:40', '2025-09-01 18:50:40'),
(14, 1, 'admin', '103.112.52.112', '2025-09-01 19:58:10', '2025-09-01 19:58:10', '2025-09-01 19:58:10'),
(15, 1, 'admin', '103.112.52.112', '2025-09-01 20:15:46', '2025-09-01 20:15:46', '2025-09-01 20:15:46'),
(16, 1, 'admin', '103.112.52.112', '2025-09-01 20:20:50', '2025-09-01 20:20:50', '2025-09-01 20:20:50'),
(17, 1, 'admin', '27.147.169.131', '2025-09-01 21:09:57', '2025-09-01 21:09:57', '2025-09-01 21:09:57'),
(18, 1, 'admin', '27.147.169.131', '2025-09-02 00:16:23', '2025-09-02 00:16:23', '2025-09-02 00:16:23'),
(19, 1, 'admin', '27.147.169.131', '2025-09-02 00:49:03', '2025-09-02 00:49:03', '2025-09-02 00:49:03'),
(20, 1, 'admin', '27.147.169.131', '2025-09-02 00:59:09', '2025-09-02 00:59:09', '2025-09-02 00:59:09'),
(21, 1, 'admin', '103.112.52.112', '2025-09-02 10:16:24', '2025-09-02 10:16:24', '2025-09-02 10:16:24'),
(22, 1, 'admin', '103.112.52.112', '2025-09-02 11:20:17', '2025-09-02 11:20:17', '2025-09-02 11:20:17'),
(23, 1, 'admin', '103.112.52.112', '2025-09-02 11:50:57', '2025-09-02 11:50:57', '2025-09-02 11:50:57'),
(24, 1, 'admin', '103.112.52.112', '2025-09-02 11:52:37', '2025-09-02 11:52:37', '2025-09-02 11:52:37'),
(25, 1, 'admin', '103.112.52.112', '2025-09-02 12:03:54', '2025-09-02 12:03:54', '2025-09-02 12:03:54'),
(26, 1, 'admin', '103.112.52.112', '2025-09-02 12:30:07', '2025-09-02 12:30:07', '2025-09-02 12:30:07'),
(27, 1, 'admin', '103.153.28.31', '2025-09-02 12:31:14', '2025-09-02 12:31:14', '2025-09-02 12:31:14'),
(28, 1, 'admin', '103.153.28.31', '2025-09-02 14:25:01', '2025-09-02 14:25:01', '2025-09-02 14:25:01'),
(29, 1, 'admin', '103.112.52.112', '2025-09-03 15:25:20', '2025-09-03 15:25:20', '2025-09-03 15:25:20'),
(30, 1, 'admin', '103.112.52.112', '2025-09-07 15:22:27', '2025-09-07 15:22:27', '2025-09-07 15:22:27'),
(31, 1, 'admin', '103.112.52.112', '2025-09-07 15:34:41', '2025-09-07 15:34:41', '2025-09-07 15:34:41'),
(32, 1, 'admin', '103.112.52.112', '2025-09-07 16:57:24', '2025-09-07 16:57:24', '2025-09-07 16:57:24'),
(33, 1, 'admin', '103.112.52.112', '2025-09-07 17:34:32', '2025-09-07 17:34:32', '2025-09-07 17:34:32'),
(34, 1, 'admin', '103.112.52.112', '2025-09-07 17:44:56', '2025-09-07 17:44:56', '2025-09-07 17:44:56'),
(35, 1, 'admin', '103.112.52.112', '2025-09-07 18:26:37', '2025-09-07 18:26:37', '2025-09-07 18:26:37'),
(36, 1, 'admin', '103.112.52.112', '2025-09-07 18:45:16', '2025-09-07 18:45:16', '2025-09-07 18:45:16'),
(37, 1, 'admin', '103.153.28.28', '2025-09-09 12:04:01', '2025-09-09 12:04:01', '2025-09-09 12:04:01'),
(38, 1, 'admin', '103.153.28.30', '2025-09-09 15:11:51', '2025-09-09 15:11:51', '2025-09-09 15:11:51'),
(39, 1, 'admin', '103.153.28.24', '2025-09-09 16:31:34', '2025-09-09 16:31:34', '2025-09-09 16:31:34'),
(40, 1, 'admin', '103.153.28.30', '2025-09-09 22:04:21', '2025-09-09 22:04:21', '2025-09-09 22:04:21'),
(41, 1, 'admin', '103.153.28.30', '2025-09-09 22:45:10', '2025-09-09 22:45:10', '2025-09-09 22:45:10'),
(42, 1, 'admin', '103.153.28.30', '2025-09-09 23:20:47', '2025-09-09 23:20:47', '2025-09-09 23:20:47'),
(43, 1, 'admin', '103.153.28.31', '2025-09-10 21:32:55', '2025-09-10 21:32:55', '2025-09-10 21:32:55'),
(44, 1, 'admin', '103.153.28.26', '2025-09-12 13:52:41', '2025-09-12 13:52:41', '2025-09-12 13:52:41'),
(45, 1, 'admin', '103.153.28.26', '2025-09-12 20:54:18', '2025-09-12 20:54:18', '2025-09-12 20:54:18'),
(46, 1, 'admin', '103.153.28.27', '2025-09-14 12:47:46', '2025-09-14 12:47:46', '2025-09-14 12:47:46'),
(47, 1, 'admin', '103.157.92.133', '2025-09-14 18:17:27', '2025-09-14 18:17:27', '2025-09-14 18:17:27'),
(48, 1, 'admin', '103.153.28.30', '2025-09-17 01:15:45', '2025-09-17 01:15:45', '2025-09-17 01:15:45'),
(49, 1, 'admin', '103.153.28.26', '2025-09-21 13:10:35', '2025-09-21 13:10:35', '2025-09-21 13:10:35'),
(50, 1, 'admin', '103.153.28.26', '2025-09-21 19:07:33', '2025-09-21 19:07:33', '2025-09-21 19:07:33'),
(51, 1, 'admin', '103.112.52.112', '2025-09-22 12:28:40', '2025-09-22 12:28:40', '2025-09-22 12:28:40'),
(52, 1, 'admin', '103.153.28.30', '2025-09-22 18:46:46', '2025-09-22 18:46:46', '2025-09-22 18:46:46'),
(53, 1, 'admin', '103.153.28.26', '2025-09-24 11:39:00', '2025-09-24 11:39:00', '2025-09-24 11:39:00'),
(54, 1, 'admin', '103.112.52.112', '2025-09-24 12:06:21', '2025-09-24 12:06:21', '2025-09-24 12:06:21'),
(55, 1, 'admin', '103.112.52.112', '2025-09-24 12:47:37', '2025-09-24 12:47:37', '2025-09-24 12:47:37'),
(56, 1, 'admin', '103.153.28.26', '2025-09-24 13:49:50', '2025-09-24 13:49:50', '2025-09-24 13:49:50'),
(57, 1, 'admin', '42.0.7.212', '2025-09-27 13:11:19', '2025-09-27 13:11:19', '2025-09-27 13:11:19'),
(58, 1, 'admin', '103.153.28.31', '2025-10-05 11:03:33', '2025-10-05 11:03:33', '2025-10-05 11:03:33'),
(59, 1, 'admin', '103.112.52.112', '2025-10-05 11:04:10', '2025-10-05 11:04:10', '2025-10-05 11:04:10'),
(60, 1, 'admin', '103.112.52.112', '2025-10-05 11:19:30', '2025-10-05 11:19:30', '2025-10-05 11:19:30'),
(61, 1, 'admin', '103.112.52.112', '2025-10-05 12:24:22', '2025-10-05 12:24:22', '2025-10-05 12:24:22'),
(62, 1, 'admin', '103.153.28.31', '2025-10-05 21:10:28', '2025-10-05 21:10:28', '2025-10-05 21:10:28'),
(63, 1, 'admin', '103.112.52.112', '2025-10-06 10:45:32', '2025-10-06 10:45:32', '2025-10-06 10:45:32'),
(64, 1, 'admin', '103.112.52.112', '2025-10-06 11:00:11', '2025-10-06 11:00:11', '2025-10-06 11:00:11'),
(65, 1, 'admin', '103.157.92.213', '2025-10-06 11:06:20', '2025-10-06 11:06:20', '2025-10-06 11:06:20'),
(66, 1, 'admin', '103.112.52.112', '2025-10-06 11:18:35', '2025-10-06 11:18:35', '2025-10-06 11:18:35'),
(67, 1, 'admin', '103.157.92.213', '2025-10-06 11:46:18', '2025-10-06 11:46:18', '2025-10-06 11:46:18'),
(68, 1, 'admin', '103.157.92.213', '2025-10-06 15:31:05', '2025-10-06 15:31:05', '2025-10-06 15:31:05'),
(69, 1, 'admin', '103.112.52.112', '2025-10-06 15:35:13', '2025-10-06 15:35:13', '2025-10-06 15:35:13'),
(70, 1, 'admin', '103.25.250.248', '2025-10-06 16:56:59', '2025-10-06 16:56:59', '2025-10-06 16:56:59'),
(71, 1, 'admin', '103.112.52.112', '2025-10-06 17:23:50', '2025-10-06 17:23:50', '2025-10-06 17:23:50'),
(72, 1, 'admin', '103.157.92.213', '2025-10-06 18:37:12', '2025-10-06 18:37:12', '2025-10-06 18:37:12'),
(73, 1, 'admin', '103.157.92.213', '2025-10-06 18:42:52', '2025-10-06 18:42:52', '2025-10-06 18:42:52'),
(74, 1, 'admin', '103.112.52.112', '2025-10-07 12:33:44', '2025-10-07 12:33:44', '2025-10-07 12:33:44'),
(75, 1, 'admin', '103.112.52.112', '2025-10-07 14:34:42', '2025-10-07 14:34:42', '2025-10-07 14:34:42'),
(76, 1, 'admin', '103.112.52.112', '2025-10-07 17:26:51', '2025-10-07 17:26:51', '2025-10-07 17:26:51'),
(77, 1, 'admin', '103.153.28.26', '2025-10-07 18:54:32', '2025-10-07 18:54:32', '2025-10-07 18:54:32'),
(78, 1, 'admin', '103.157.92.213', '2025-10-08 09:37:05', '2025-10-08 09:37:05', '2025-10-08 09:37:05'),
(79, 1, 'admin', '103.157.92.213', '2025-10-08 11:50:48', '2025-10-08 11:50:48', '2025-10-08 11:50:48'),
(80, 1, 'admin', '103.112.52.112', '2025-10-08 14:48:11', '2025-10-08 14:48:11', '2025-10-08 14:48:11'),
(81, 1, 'admin', '103.112.52.112', '2025-10-08 15:09:58', '2025-10-08 15:09:58', '2025-10-08 15:09:58'),
(82, 1, 'admin', '103.112.52.112', '2025-10-08 15:28:28', '2025-10-08 15:28:28', '2025-10-08 15:28:28'),
(83, 1, 'admin', '103.112.52.112', '2025-10-08 15:29:45', '2025-10-08 15:29:45', '2025-10-08 15:29:45'),
(84, 1, 'admin', '103.112.52.112', '2025-10-08 15:41:48', '2025-10-08 15:41:48', '2025-10-08 15:41:48'),
(85, 1, 'admin', '103.157.92.213', '2025-10-08 16:20:28', '2025-10-08 16:20:28', '2025-10-08 16:20:28'),
(86, 1, 'admin', '103.112.52.112', '2025-10-08 16:35:56', '2025-10-08 16:35:56', '2025-10-08 16:35:56'),
(87, 1, 'admin', '103.112.52.112', '2025-10-08 16:37:29', '2025-10-08 16:37:29', '2025-10-08 16:37:29'),
(88, 1, 'admin', '103.153.28.26', '2025-10-08 21:44:33', '2025-10-08 21:44:33', '2025-10-08 21:44:33'),
(89, 1, 'admin', '103.153.28.26', '2025-10-08 21:49:43', '2025-10-08 21:49:43', '2025-10-08 21:49:43'),
(90, 1, 'admin', '103.112.52.112', '2025-10-09 11:15:01', '2025-10-09 11:15:01', '2025-10-09 11:15:01'),
(91, 1, 'admin', '103.112.52.112', '2025-10-09 11:51:33', '2025-10-09 11:51:33', '2025-10-09 11:51:33'),
(92, 1, 'admin', '103.112.52.112', '2025-10-09 18:21:53', '2025-10-09 18:21:53', '2025-10-09 18:21:53'),
(93, 1, 'admin', '42.0.7.217', '2025-10-09 23:42:39', '2025-10-09 23:42:39', '2025-10-09 23:42:39'),
(94, 1, 'admin', '103.153.28.27', '2025-10-10 17:31:25', '2025-10-10 17:31:25', '2025-10-10 17:31:25'),
(95, 1, 'admin', '103.153.28.27', '2025-10-10 21:45:46', '2025-10-10 21:45:46', '2025-10-10 21:45:46'),
(96, 1, 'admin', '103.112.52.112', '2025-10-12 11:24:49', '2025-10-12 11:24:49', '2025-10-12 11:24:49'),
(97, 1, 'admin', '103.112.52.112', '2025-10-13 12:05:34', '2025-10-13 12:05:34', '2025-10-13 12:05:34'),
(98, 1, 'admin', '103.112.52.112', '2025-10-13 12:20:07', '2025-10-13 12:20:07', '2025-10-13 12:20:07'),
(99, 1, 'admin', '103.112.52.112', '2025-10-13 12:31:25', '2025-10-13 12:31:25', '2025-10-13 12:31:25'),
(100, 1, 'admin', '103.73.46.233', '2025-10-13 13:11:35', '2025-10-13 13:11:35', '2025-10-13 13:11:35'),
(101, 1, 'admin', '103.112.52.112', '2025-10-13 14:08:17', '2025-10-13 14:08:17', '2025-10-13 14:08:17'),
(102, 1, 'admin', '103.112.52.112', '2025-10-13 17:20:00', '2025-10-13 17:20:00', '2025-10-13 17:20:00'),
(103, 1, 'admin', '103.153.28.25', '2025-10-13 17:20:12', '2025-10-13 17:20:12', '2025-10-13 17:20:12'),
(104, 1, 'admin', '103.112.52.112', '2025-10-14 11:35:17', '2025-10-14 11:35:17', '2025-10-14 11:35:17'),
(105, 1, 'admin', '103.153.28.28', '2025-10-14 15:11:43', '2025-10-14 15:11:43', '2025-10-14 15:11:43'),
(106, 1, 'admin', '103.112.52.112', '2025-10-14 16:28:02', '2025-10-14 16:28:02', '2025-10-14 16:28:02'),
(107, 1, 'admin', '103.153.28.28', '2025-10-14 18:09:32', '2025-10-14 18:09:32', '2025-10-14 18:09:32'),
(108, 1, 'admin', '103.153.28.28', '2025-10-14 18:38:03', '2025-10-14 18:38:03', '2025-10-14 18:38:03'),
(109, 1, 'admin', '103.112.52.112', '2025-10-15 11:51:45', '2025-10-15 11:51:45', '2025-10-15 11:51:45'),
(110, 1, 'admin', '103.153.28.26', '2025-10-15 15:38:37', '2025-10-15 15:38:37', '2025-10-15 15:38:37'),
(111, 1, 'admin', '103.153.28.26', '2025-10-15 17:29:12', '2025-10-15 17:29:12', '2025-10-15 17:29:12'),
(112, 1, 'admin', '103.112.52.112', '2025-10-16 10:55:58', '2025-10-16 10:55:58', '2025-10-16 10:55:58'),
(113, 1, 'admin', '103.112.52.112', '2025-10-16 12:00:47', '2025-10-16 12:00:47', '2025-10-16 12:00:47'),
(114, 1, 'admin', '103.153.28.32', '2025-10-16 13:35:00', '2025-10-16 13:35:00', '2025-10-16 13:35:00'),
(115, 1, 'admin', '103.153.28.32', '2025-10-16 17:03:56', '2025-10-16 17:03:56', '2025-10-16 17:03:56'),
(116, 1, 'admin', '103.153.28.32', '2025-10-16 17:56:46', '2025-10-16 17:56:46', '2025-10-16 17:56:46'),
(117, 1, 'admin', '103.153.28.32', '2025-10-16 18:20:29', '2025-10-16 18:20:29', '2025-10-16 18:20:29'),
(118, 1, 'admin', '103.112.52.112', '2025-10-19 12:23:19', '2025-10-19 12:23:19', '2025-10-19 12:23:19'),
(119, 1, 'admin', '103.112.52.112', '2025-10-19 13:43:17', '2025-10-19 13:43:17', '2025-10-19 13:43:17'),
(120, 1, 'admin', '103.112.52.112', '2025-10-19 16:46:35', '2025-10-19 16:46:35', '2025-10-19 16:46:35'),
(121, 1, 'admin', '103.112.52.112', '2025-10-21 12:16:01', '2025-10-21 12:16:01', '2025-10-21 12:16:01'),
(122, 1, 'admin', '103.112.52.112', '2025-10-21 13:28:41', '2025-10-21 13:28:41', '2025-10-21 13:28:41'),
(123, 1, 'admin', '103.153.28.35', '2025-10-21 13:54:07', '2025-10-21 13:54:07', '2025-10-21 13:54:07'),
(124, 1, 'admin', '103.112.52.112', '2025-10-28 10:18:10', '2025-10-28 10:18:10', '2025-10-28 10:18:10'),
(125, 1, 'admin', '103.153.66.219', '2025-10-30 10:28:31', '2025-10-30 10:28:31', '2025-10-30 10:28:31'),
(126, 1, 'admin', '103.153.66.219', '2025-10-30 12:06:10', '2025-10-30 12:06:10', '2025-10-30 12:06:10'),
(127, 1, 'admin', '103.112.52.112', '2025-11-03 11:46:19', '2025-11-03 11:46:19', '2025-11-03 11:46:19'),
(128, 1, 'admin', '103.112.52.112', '2025-11-04 13:15:51', '2025-11-04 13:15:51', '2025-11-04 13:15:51'),
(129, 1, 'admin', '103.153.28.35', '2025-11-05 21:43:02', '2025-11-05 21:43:02', '2025-11-05 21:43:02'),
(130, 1, 'admin', '103.112.52.112', '2025-11-09 13:50:21', '2025-11-09 13:50:21', '2025-11-09 13:50:21'),
(131, 1, 'admin', '103.25.250.228', '2025-11-10 10:04:36', '2025-11-10 10:04:36', '2025-11-10 10:04:36'),
(132, 1, 'admin', '103.112.52.112', '2025-11-10 11:51:49', '2025-11-10 11:51:49', '2025-11-10 11:51:49'),
(133, 1, 'admin', '103.153.28.32', '2025-11-10 12:27:18', '2025-11-10 12:27:18', '2025-11-10 12:27:18'),
(134, 1, 'admin', '103.112.52.112', '2025-11-10 14:21:53', '2025-11-10 14:21:53', '2025-11-10 14:21:53'),
(135, 1, 'admin', '103.153.28.32', '2025-11-10 15:28:34', '2025-11-10 15:28:34', '2025-11-10 15:28:34'),
(136, 1, 'admin', '103.25.250.228', '2025-11-10 15:30:38', '2025-11-10 15:30:38', '2025-11-10 15:30:38'),
(137, 1, 'admin', '103.153.28.32', '2025-11-10 19:25:17', '2025-11-10 19:25:17', '2025-11-10 19:25:17'),
(138, 1, 'admin', '103.153.66.217', '2025-11-11 22:21:49', '2025-11-11 22:21:49', '2025-11-11 22:21:49'),
(139, 1, 'admin', '103.153.28.35', '2025-11-14 20:15:03', '2025-11-14 20:15:03', '2025-11-14 20:15:03'),
(140, 1, 'admin', '103.153.28.35', '2025-11-20 10:05:32', '2025-11-20 10:05:32', '2025-11-20 10:05:32'),
(141, 1, 'admin', '103.153.28.35', '2025-11-20 11:36:22', '2025-11-20 11:36:22', '2025-11-20 11:36:22'),
(142, 1, 'admin', '103.153.28.35', '2025-11-23 19:00:52', '2025-11-23 19:00:52', '2025-11-23 19:00:52'),
(143, 1, 'admin', '103.153.28.35', '2025-11-23 19:12:41', '2025-11-23 19:12:41', '2025-11-23 19:12:41'),
(144, 1, 'admin', '103.153.28.35', '2025-12-14 12:34:01', '2025-12-14 12:34:01', '2025-12-14 12:34:01'),
(145, 1, 'admin', '103.153.28.32', '2025-12-19 00:09:13', '2025-12-19 00:09:13', '2025-12-19 00:09:13'),
(146, 1, 'admin', '103.153.28.32', '2025-12-19 01:26:40', '2025-12-19 01:26:40', '2025-12-19 01:26:40'),
(147, 1, 'admin', '103.153.28.32', '2025-12-20 11:21:21', '2025-12-20 11:21:21', '2025-12-20 11:21:21'),
(148, 1, 'admin', '103.153.28.32', '2025-12-20 17:00:45', '2025-12-20 17:00:45', '2025-12-20 17:00:45'),
(149, 1, 'admin', '103.153.28.32', '2025-12-21 12:47:47', '2025-12-21 12:47:47', '2025-12-21 12:47:47'),
(150, 1, 'admin', '103.153.28.32', '2025-12-21 16:56:14', '2025-12-21 16:56:14', '2025-12-21 16:56:14'),
(151, 1, 'admin', '127.0.0.1', '2026-01-11 06:06:11', '2026-01-11 06:06:11', '2026-01-11 06:06:11'),
(152, 1, 'admin', '103.112.52.112', '2026-01-20 14:56:10', '2026-01-20 14:56:10', '2026-01-20 14:56:10'),
(153, 1, 'admin', '103.112.52.112', '2026-01-20 22:48:49', '2026-01-20 22:48:49', '2026-01-20 22:48:49'),
(154, 1, 'admin', '103.112.52.112', '2026-01-23 22:45:09', '2026-01-23 22:45:09', '2026-01-23 22:45:09'),
(155, 1, 'admin', '127.0.0.1', '2026-01-27 14:54:48', '2026-01-27 14:54:48', '2026-01-27 14:54:48'),
(156, 1, 'admin', '127.0.0.1', '2026-01-27 15:48:06', '2026-01-27 15:48:06', '2026-01-27 15:48:06'),
(157, 1, 'admin', '127.0.0.1', '2026-01-28 04:02:59', '2026-01-28 04:02:59', '2026-01-28 04:02:59'),
(158, 1, 'admin', '127.0.0.1', '2026-01-30 16:34:27', '2026-01-30 16:34:27', '2026-01-30 16:34:27'),
(159, 1, 'admin', '127.0.0.1', '2026-01-30 17:10:01', '2026-01-30 17:10:01', '2026-01-30 17:10:01'),
(160, 1, 'admin', '103.112.52.112', '2026-02-01 12:47:57', '2026-02-01 12:47:57', '2026-02-01 12:47:57'),
(161, 1, 'admin', '103.112.52.112', '2026-02-02 13:22:18', '2026-02-02 13:22:18', '2026-02-02 13:22:18'),
(162, 1, 'admin', '103.112.52.112', '2026-02-03 11:30:55', '2026-02-03 11:30:55', '2026-02-03 11:30:55'),
(163, 1, 'admin', '103.112.52.112', '2026-03-01 23:32:38', '2026-03-01 23:32:38', '2026-03-01 23:32:38'),
(164, 1, 'admin', '104.28.159.46', '2026-03-02 01:47:22', '2026-03-02 01:47:22', '2026-03-02 01:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `main_counters`
--

CREATE TABLE `main_counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `counter_title` varchar(255) DEFAULT NULL,
  `counter_icon` varchar(255) DEFAULT NULL,
  `data_count` int(11) DEFAULT NULL,
  `counter_symbol` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_counters`
--

INSERT INTO `main_counters` (`id`, `counter_title`, `counter_icon`, `data_count`, `counter_symbol`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Film Production', 'uploads/counter-icon/68bd6f6aa062d.png', 18, '+', 1, '2025-08-27 05:50:48', '2026-01-30 17:24:52'),
(2, 'Lecture', 'uploads/counter-icon/68bd6f8412d0f.png', 4, '+', 1, '2025-08-27 05:51:16', '2026-01-30 17:25:12'),
(3, 'Publication', 'uploads/counter-icon/68b5ec5e49b04.png', 4, '+', 1, '2025-08-28 06:08:50', '2026-01-30 17:25:56'),
(4, 'Art Exibition', 'uploads/counter-icon/68bd6faa0969a.png', 20, '+', 1, '2025-08-28 06:09:08', '2026-01-30 17:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `member_code` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `about` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `serial`, `name`, `member_code`, `department`, `designation`, `dob`, `joining_date`, `gender`, `blood_group`, `phone`, `email`, `whatsapp`, `facebook`, `linkedin`, `github`, `address`, `about`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 1, 'Toma Mirza', 'EMP-10', 'Management', 'CEO', '2002-01-10', '2022-10-10', 'Female', 'O+', '0171201302712', 'saikatchowdhury444@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'uploads/member/image/696fc87469517.jpg', 1, '2026-01-21 00:24:52', '2026-01-21 00:24:52', NULL),
(11, 2, 'Antor Ahsan', 'MM-12', 'Management', 'Cinematographer', NULL, NULL, 'Male', NULL, '0140757137711', 'antor.design@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'uploads/member/image/696fc8afb0b17.jpg', 1, '2026-01-21 00:25:51', '2026-01-21 00:25:51', NULL),
(12, 4, 'Limon Khan', 'EM14', 'Management', 'Video Editor', NULL, NULL, NULL, NULL, '01303638635', 'limon@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'uploads/member/image/696fc915454cf.jpg', 1, '2026-01-21 00:26:40', '2026-01-21 00:27:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(109, '2014_10_12_000000_create_users_table', 1),
(110, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(111, '2019_08_19_000000_create_failed_jobs_table', 1),
(112, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(113, '2024_02_01_094219_create_divisions_table', 1),
(114, '2024_02_01_094354_create_districts_table', 1),
(115, '2024_02_03_050109_create_upazilas_table', 1),
(116, '2025_03_12_123445_create_login_activities_table', 1),
(117, '2025_03_13_100048_create_permission_tables', 1),
(118, '2025_04_26_120738_create_sliders_table', 1),
(119, '2025_04_26_134611_create_abouts_table', 1),
(120, '2025_04_26_160413_create_clients_table', 1),
(121, '2025_04_27_111152_create_testimonials_table', 1),
(122, '2025_04_27_115728_create_faqs_table', 1),
(123, '2025_04_27_121526_create_contacts_table', 1),
(124, '2025_04_29_141201_create_blog_categories_table', 1),
(125, '2025_04_29_141207_create_blogs_table', 1),
(126, '2025_05_03_125139_create_slider_counters_table', 1),
(127, '2025_05_03_125432_create_main_counters_table', 1),
(128, '2025_05_03_142736_create_call_to_actions_table', 1),
(129, '2025_05_03_162448_create_applications_table', 1),
(130, '2025_05_03_170756_create_why_works_table', 1),
(132, '2025_05_04_112801_create_about_keypoints_table', 1),
(140, '2025_07_09_131022_create_members_table', 1),
(141, '2025_07_17_133739_create_cover_images_table', 1),
(142, '2025_07_17_153026_create_settings_table', 1),
(143, '2025_07_23_105735_create_contact_messages_table', 1),
(144, '2025_08_26_172359_create_keypoints_table', 1),
(145, '2025_08_27_122854_create_project_categories_table', 2),
(146, '2025_08_27_122948_create_projects_table', 2),
(147, '2025_08_27_172404_create_faq_mains_table', 3),
(148, '2025_07_08_133939_create_albums_table', 4),
(149, '2025_07_09_122507_create_album_image_videos_table', 4),
(150, '2025_08_28_175350_create_testimonialmains_table', 5),
(151, '2025_08_31_114133_create_products_table', 6),
(152, '2025_08_31_113036_create_services_table', 7),
(153, '2025_08_31_114517_create_service_images_table', 8),
(154, '2025_07_01_143839_create_news_blog_comments_table', 9),
(155, '2025_08_25_120531_create_policies_table', 10),
(156, '2025_09_01_103228_create_careers_table', 11),
(157, '2025_09_01_151956_create_job_applications_table', 12),
(158, '2025_09_22_134052_create_project_images_table', 13),
(159, '2026_01_08_120000_rename_projects_to_social_posts', 14),
(160, '2026_01_08_130500_rename_products_to_projects', 14),
(161, '2026_01_27_191326_add_project_number_to_projects_table', 15),
(162, '2026_01_27_221833_remove_fields_from_projects_table', 16),
(164, '2026_01_27_230000_update_social_posts_table', 17),
(165, '2026_01_27_235439_update_services_table_rename_and_add_columns', 18),
(166, '2026_01_28_011402_remove_key_features_from_services_table', 19),
(167, '2026_01_30_223646_rename_services_to_films_table', 20),
(168, '2026_01_30_224509_rename_service_id_to_film_id_in_related_tables', 21),
(170, '2026_01_30_232637_fix_tables_renaming', 22),
(171, '2026_01_30_234000_rename_project_category_id_to_exhibition_category_id', 23),
(172, '2026_01_31_000117_rename_projects_table_to_products_table', 24),
(173, '2026_01_31_000514_add_date_to_albums_table', 25),
(174, '2026_01_31_000932_rename_service_id_to_film_id_in_film_images_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_blog_comments`
--

CREATE TABLE `news_blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_blog_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `comment_like` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_blog_comments`
--

INSERT INTO `news_blog_comments` (`id`, `news_blog_id`, `name`, `email`, `message`, `comment_like`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test', 'qbittech.dev3@gmail.com', 'Test comment', 1, '2025-09-01 07:24:17', '2025-09-01 07:30:22'),
(2, 1, 'AUdFtIpRgOkXgeqYwx', 'cuzuwofifeno22@gmail.com', 'qLGMrHzmrbivMQqMZO', 0, '2025-10-23 16:15:18', '2025-10-23 16:15:18'),
(3, 1, 'gjuljuynCaWEvpYZqSJOhB', 'caguziqaju968@gmail.com', 'YiWzbcyeIZagOkTJX', 0, '2025-10-31 22:19:18', '2025-10-31 22:19:18'),
(4, 1, 'dwaGVjnHeOnTCzCj', 'solisoliviy2001@gmail.com', 'iLQcEfxmXRipTaitOHcs', 0, '2025-11-02 01:03:10', '2025-11-02 01:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Create Employee', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(2, 'View Employee', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(3, 'Update Employee', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(4, 'Delete Employee', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(5, 'ShowSideBar Employee', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(6, 'Create Attendance', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(7, 'View Attendance', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(8, 'ShowSideBar Attendance', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(9, 'Create OfficialLetters', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(10, 'View OfficialLetters', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(11, 'Update OfficialLetters', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(12, 'Delete OfficialLetters', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(13, 'ShowSideBar OfficialLetters', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(14, 'Create Announcement', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(15, 'View Announcement', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(16, 'Update Announcement', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(17, 'Delete Announcement', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(18, 'ShowSideBar Announcement', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(19, 'Create Notice', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(20, 'View Notice', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(21, 'Update Notice', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(22, 'Delete Notice', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(23, 'ShowSideBar Notice', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(24, 'Create LeaveApplication', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(25, 'View LeaveApplication', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(26, 'Update LeaveApplication', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(27, 'Delete LeaveApplication', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(28, 'ShowSideBar LeaveApplication', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(29, 'Create Shift', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(30, 'View Shift', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(31, 'Update Shift', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(32, 'Delete Shift', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(33, 'ShowSideBar Shift', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(34, 'Create Department', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(35, 'View Department', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(36, 'Update Department', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(37, 'Delete Department', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(38, 'ShowSideBar Department', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(39, 'Create Designation', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(40, 'View Designation', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(41, 'Update Designation', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(42, 'Delete Designation', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(43, 'ShowSideBar Designation', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(44, 'Create LeaveType', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(45, 'View LeaveType', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(46, 'Update LeaveType', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(47, 'Delete LeaveType', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(48, 'ShowSideBar LeaveType', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(49, 'Create Holiday', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(50, 'View Holiday', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(51, 'Update Holiday', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(52, 'Delete Holiday', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(53, 'ShowSideBar Holiday', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(54, 'Create DocumentTemplate', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(55, 'View DocumentTemplate', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(56, 'Update DocumentTemplate', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(57, 'Delete DocumentTemplate', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(58, 'ShowSideBar DocumentTemplate', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(59, 'Create User', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(60, 'View User', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(61, 'Update User', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(62, 'ShowSideBar User', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(63, 'Create Role', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(64, 'View Role', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(65, 'Update Role', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(66, 'Delete Role', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(67, 'ShowSideBar Role', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(68, 'Create Permission', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(69, 'View Permission', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(70, 'Update Permission', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(71, 'Delete Permission', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(72, 'ShowSideBar Permission', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(73, 'Create Branch', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(74, 'View Branch', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(75, 'Update Branch', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(76, 'Delete Branch', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(77, 'ShowSideBar Branch', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(78, 'ShowSideBar AdditionalSetup', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(79, 'ShowSideBar CompanySetup', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(80, 'ShowSideBar Maintenance', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('terms_and_condition','privacy_and_policy') NOT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'terms_and_condition', '<span style=\"font-weight: bold;\">Terms and conditions</span>\r\n<p>GBDB</p>', '2025-09-01 08:01:17', '2025-09-01 08:13:03'),
(2, 'privacy_and_policy', '<p><b><span style=\"font-family: &quot;Arial Black&quot;;\">Policy and policy test</span></b></p><p><br></p><p>1. policy 1</p>', '2025-09-01 08:01:35', '2025-09-01 08:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `applications` text DEFAULT NULL,
  `benefits` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`benefits`)),
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `price` decimal(10,0) DEFAULT NULL,
  `text_before_price` varchar(255) DEFAULT NULL,
  `text_after_price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `subtitle`, `applications`, `benefits`, `features`, `image`, `status`, `price`, `text_before_price`, `text_after_price`, `created_at`, `updated_at`) VALUES
(28, 'Cine-Spectrum: National Short Film Gala', 'LWM Main Auditorium, Dhaka.', NULL, '[]', '[]', 'uploads/products/696fc42026c9c.jpg', 1, NULL, NULL, NULL, '2026-01-20 23:51:53', '2026-01-21 00:06:24'),
(31, 'The Global Archive Showcase', 'LWM Digital Theater.', NULL, '[]', '[]', 'uploads/products/696fc403b90a5.jpg', 1, NULL, NULL, NULL, '2026-01-21 00:02:24', '2026-01-21 00:05:55'),
(32, 'Filmmakers\' Mixer', 'Rooftop Lounge, LWM Hub.', NULL, '[]', '[]', 'uploads/products/696fc3fa29a6b.jpg', 1, NULL, NULL, NULL, '2026-01-21 00:02:58', '2026-01-21 00:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(2, 'Manager', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(3, 'User', 'admin', '2025-08-27 05:35:48', '2025-08-27 05:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `copyright_text` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `registration_number` varchar(255) DEFAULT NULL,
  `trade_license` varchar(255) DEFAULT NULL,
  `vat_number` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `whatsapp_number` varchar(255) DEFAULT NULL,
  `hotline_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alt_email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `landing_page` varchar(255) DEFAULT NULL,
  `google_map` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `logo_dark` varchar(255) DEFAULT NULL,
  `logo_light` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `copyright_text`, `description`, `registration_number`, `trade_license`, `vat_number`, `contact_number`, `whatsapp_number`, `hotline_number`, `email`, `alt_email`, `website`, `linkedin`, `facebook`, `landing_page`, `google_map`, `address`, `logo_dark`, `logo_light`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 'LWM', '© 2025 Qbit Tech Ltd. All Rights Reserved.', 'LWM  Under the visionary leadership of Toma Mirza, LWM is a creative hub dedicated to nurturing the art of short filmmaking. From world-class exhibitions to professional workshops, we empower the next generation of storytellers.', NULL, NULL, NULL, '09639959595', NULL, '09639959595', 'info@wlm.com', NULL, 'wlm.com', 'https://www.linkedin.com/home', 'http://facebook.com/', NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d488.9560195315196!2d90.34921393498861!3d23.995249463536467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755dd002fd19715%3A0xb77bacc9f2db9b45!2sIEET%20Factory!5e0!3m2!1sen!2sbd!4v1756798457814!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Lotus kamal Tower - 2 (Level - 11) 59-61, Gulshan South Avenue, Gulshan-1, Dhaka - 1212', 'settings/logo_dark-1769793123.png', 'settings/logo_light-1769793123.png', 'settings/favicon-1769793123.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_url` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `sub_title`, `button_text`, `button_url`, `image`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Films', 'Visual stories, crafted beautifully.', 'Explore Now', NULL, 'uploads/slider/69a481dcd6e4c.jpg', 1, '2025-09-07 15:24:44', '2026-03-02 00:13:48'),
(15, 'Exibition', 'A visual journey of art and expression', 'Explore Now', NULL, 'uploads/slider/69a482d176cc4.jpg', 1, '2025-09-07 15:24:44', '2026-03-02 00:17:53'),
(16, 'Performance', 'Bringing performances to life.', 'Explore Now', NULL, 'uploads/slider/69798b65c223a.jpg', 1, '2025-09-07 15:24:44', '2026-03-02 00:17:22'),
(17, 'Archives', 'A legacy of creative milestones.', 'Explore Now', NULL, 'uploads/slider/69a483d12dd64.jpeg', 1, '2025-09-07 15:24:44', '2026-03-02 00:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `slider_counters`
--

CREATE TABLE `slider_counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `counter_title` varchar(255) DEFAULT NULL,
  `counter_icon` varchar(255) DEFAULT NULL,
  `data_count` int(11) DEFAULT NULL,
  `counter_symbol` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_counters`
--

INSERT INTO `slider_counters` (`id`, `counter_title`, `counter_icon`, `data_count`, `counter_symbol`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sunt quia molestiae quam id ut.', NULL, 440, NULL, 1, '2025-08-27 05:35:48', '2025-08-27 05:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `testimonialmains`
--

CREATE TABLE `testimonialmains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonialmains`
--

INSERT INTO `testimonialmains` (`id`, `title`, `sub_title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Testimonial', 'User Feedback', 'Our clients\' satisfaction is our top priority. We are proud to have partnered with leading organizations across various industries, delivering high-quality flooring and waterproofing solutions that stand the test of time.', 1, '2025-08-28 12:07:55', '2026-01-30 17:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `client_name`, `designation`, `organization`, `review`, `image`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Riyazul Islam Khan', 'CEO', NULL, 'I highly recommend GoldenEye! They were instrumental in fulfilling my dream plot. Throughout the process, the team remained extremely professional and transparent. If you want a team that delivers with true integrity, GoldenEye is the best!\"', 'uploads/testimonial-image/696355c247a22.jpg', 1, '2026-01-11 07:48:18', '2026-01-30 17:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `zone_charge` decimal(10,0) NOT NULL DEFAULT 0,
  `url` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `name`, `bn_name`, `zone_charge`, `url`, `created_at`, `updated_at`) VALUES
(1, 34, 'Amtali', 'আমতলী', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(2, 34, 'Bamna', 'বামনা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(3, 34, 'Barguna Sadar', 'বরগুনা সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(4, 34, 'Betagi', 'বেতাগি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(5, 34, 'Patharghata', 'পাথরঘাটা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(6, 34, 'Taltali', 'তালতলী', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(7, 35, 'Muladi', 'মুলাদি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(8, 35, 'Babuganj', 'বাবুগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(9, 35, 'Agailjhara', 'আগাইলঝরা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(10, 35, 'Barisal Sadar', 'বরিশাল সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(11, 35, 'Bakerganj', 'বাকেরগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(12, 35, 'Banaripara', 'বানাড়িপারা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(13, 35, 'Gaurnadi', 'গৌরনদী', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(14, 35, 'Hizla', 'হিজলা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(15, 35, 'Mehendiganj', 'মেহেদিগঞ্জ ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(16, 35, 'Wazirpur', 'ওয়াজিরপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(17, 36, 'Bhola Sadar', 'ভোলা সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(18, 36, 'Burhanuddin', 'বুরহানউদ্দিন', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(19, 36, 'Char Fasson', 'চর ফ্যাশন', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(20, 36, 'Daulatkhan', 'দৌলতখান', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(21, 36, 'Lalmohan', 'লালমোহন', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(22, 36, 'Manpura', 'মনপুরা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(23, 36, 'Tazumuddin', 'তাজুমুদ্দিন', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(24, 37, 'Jhalokati Sadar', 'ঝালকাঠি সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(25, 37, 'Kathalia', 'কাঁঠালিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(26, 37, 'Nalchity', 'নালচিতি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(27, 37, 'Rajapur', 'রাজাপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(28, 38, 'Bauphal', 'বাউফল', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(29, 38, 'Dashmina', 'দশমিনা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(30, 38, 'Galachipa', 'গলাচিপা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(31, 38, 'Kalapara', 'কালাপারা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(32, 38, 'Mirzaganj', 'মির্জাগঞ্জ ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(33, 38, 'Patuakhali Sadar', 'পটুয়াখালী সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(34, 38, 'Dumki', 'ডুমকি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(35, 38, 'Rangabali', 'রাঙ্গাবালি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(36, 39, 'Bhandaria', 'ভ্যান্ডারিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(37, 39, 'Kaukhali', 'কাউখালি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(38, 39, 'Mathbaria', 'মাঠবাড়িয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(39, 39, 'Nazirpur', 'নাজিরপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(40, 39, 'Nesarabad', 'নেসারাবাদ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(41, 39, 'Pirojpur Sadar', 'পিরোজপুর সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(42, 39, 'Zianagar', 'জিয়ানগর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(43, 40, 'Bandarban Sadar', 'বান্দরবন সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(44, 40, 'Thanchi', 'থানচি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(45, 40, 'Lama', 'লামা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(46, 40, 'Naikhongchhari', 'নাইখংছড়ি ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(47, 40, 'Ali kadam', 'আলী কদম', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(48, 40, 'Rowangchhari', 'রউয়াংছড়ি ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(49, 40, 'Ruma', 'রুমা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(50, 41, 'Brahmanbaria Sadar', 'ব্রাহ্মণবাড়িয়া সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(51, 41, 'Ashuganj', 'আশুগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(52, 41, 'Nasirnagar', 'নাসির নগর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(53, 41, 'Nabinagar', 'নবীনগর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(54, 41, 'Sarail', 'সরাইল', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(55, 41, 'Shahbazpur Town', 'শাহবাজপুর টাউন', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(56, 41, 'Kasba', 'কসবা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(57, 41, 'Akhaura', 'আখাউরা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(58, 41, 'Bancharampur', 'বাঞ্ছারামপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(59, 41, 'Bijoynagar', 'বিজয় নগর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(60, 42, 'Chandpur Sadar', 'চাঁদপুর সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(61, 42, 'Faridganj', 'ফরিদগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(62, 42, 'Haimchar', 'হাইমচর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(63, 42, 'Haziganj', 'হাজীগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(64, 42, 'Kachua', 'কচুয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(65, 42, 'Matlab Uttar', 'মতলব উত্তর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(66, 42, 'Matlab Dakkhin', 'মতলব দক্ষিণ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(67, 42, 'Shahrasti', 'শাহরাস্তি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(68, 43, 'Anwara', 'আনোয়ারা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(69, 43, 'Banshkhali', 'বাশখালি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(70, 43, 'Boalkhali', 'বোয়ালখালি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(71, 43, 'Chandanaish', 'চন্দনাইশ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(72, 43, 'Fatikchhari', 'ফটিকছড়ি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(73, 43, 'Hathazari', 'হাঠহাজারী', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(74, 43, 'Lohagara', 'লোহাগারা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(75, 43, 'Mirsharai', 'মিরসরাই', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(76, 43, 'Patiya', 'পটিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(77, 43, 'Rangunia', 'রাঙ্গুনিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(78, 43, 'Raozan', 'রাউজান', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(79, 43, 'Sandwip', 'সন্দ্বীপ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(80, 43, 'Satkania', 'সাতকানিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(81, 43, 'Sitakunda', 'সীতাকুণ্ড', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(82, 44, 'Barura', 'বড়ুরা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(83, 44, 'Brahmanpara', 'ব্রাহ্মণপাড়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(84, 44, 'Burichong', 'বুড়িচং', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(85, 44, 'Chandina', 'চান্দিনা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(86, 44, 'Chauddagram', 'চৌদ্দগ্রাম', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(87, 44, 'Daudkandi', 'দাউদকান্দি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(88, 44, 'Debidwar', 'দেবীদ্বার', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(89, 44, 'Homna', 'হোমনা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(90, 44, 'Comilla Sadar', 'কুমিল্লা সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(91, 44, 'Laksam', 'লাকসাম', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(92, 44, 'Monohorgonj', 'মনোহরগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(93, 44, 'Meghna', 'মেঘনা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(94, 44, 'Muradnagar', 'মুরাদনগর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(95, 44, 'Nangalkot', 'নাঙ্গালকোট', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(96, 44, 'Comilla Sadar South', 'কুমিল্লা সদর দক্ষিণ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(97, 44, 'Titas', 'তিতাস', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(98, 45, 'Chakaria', 'চকরিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(100, 45, 'Cox\'s Bazar', 'কক্স বাজার সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(101, 45, 'Kutubdia', 'কুতুবদিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(102, 45, 'Maheshkhali', 'মহেশখালী', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(103, 45, 'Ramu', 'রামু', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(104, 45, 'Teknaf', 'টেকনাফ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(105, 45, 'Ukhia', 'উখিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(106, 45, 'Pekua', 'পেকুয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(107, 46, 'Feni Sadar', 'ফেনী সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(108, 46, 'Chagalnaiya', 'ছাগল নাইয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(109, 46, 'Daganbhyan', 'দাগানভিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(110, 46, 'Parshuram', 'পরশুরাম', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(111, 46, 'Fhulgazi', 'ফুলগাজি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(112, 46, 'Sonagazi', 'সোনাগাজি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(113, 47, 'Dighinala', 'দিঘিনালা ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(114, 47, 'Khagrachhari', 'খাগড়াছড়ি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(115, 47, 'Lakshmichhari', 'লক্ষ্মীছড়ি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(116, 47, 'Mahalchhari', 'মহলছড়ি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(117, 47, 'Manikchhari', 'মানিকছড়ি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(118, 47, 'Matiranga', 'মাটিরাঙ্গা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(119, 47, 'Panchhari', 'পানছড়ি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(120, 47, 'Ramgarh', 'রামগড়', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(121, 48, 'Lakshmipur Sadar', 'লক্ষ্মীপুর সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(122, 48, 'Raipur', 'রায়পুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(123, 48, 'Ramganj', 'রামগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(124, 48, 'Ramgati', 'রামগতি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(125, 48, 'Komol Nagar', 'কমল নগর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(126, 49, 'Noakhali Sadar', 'নোয়াখালী সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(127, 49, 'Begumganj', 'বেগমগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(128, 49, 'Chatkhil', 'চাটখিল', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(129, 49, 'Companyganj', 'কোম্পানীগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(130, 49, 'Shenbag', 'শেনবাগ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(131, 49, 'Hatia', 'হাতিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(132, 49, 'Kobirhat', 'কবিরহাট ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(133, 49, 'Sonaimuri', 'সোনাইমুরি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(134, 49, 'Suborno Char', 'সুবর্ণ চর ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(135, 50, 'Rangamati Sadar', 'রাঙ্গামাটি সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(136, 50, 'Belaichhari', 'বেলাইছড়ি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(137, 50, 'Bagaichhari', 'বাঘাইছড়ি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(138, 50, 'Barkal', 'বরকল', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(139, 50, 'Juraichhari', 'জুরাইছড়ি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(140, 50, 'Rajasthali', 'রাজাস্থলি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(141, 50, 'Kaptai', 'কাপ্তাই', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(142, 50, 'Langadu', 'লাঙ্গাডু', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(143, 50, 'Nannerchar', 'নান্নেরচর ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(144, 50, 'Kaukhali', 'কাউখালি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(145, 1, 'Dhamrai', 'ধামরাই', 80, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(146, 1, 'Dohar', 'দোহার', 80, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(147, 1, 'Keraniganj', 'কেরানীগঞ্জ', 80, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(148, 1, 'Nawabganj', 'নবাবগঞ্জ', 80, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(149, 1, 'Savar', 'সাভার', 80, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(150, 2, 'Faridpur Sadar', 'ফরিদপুর সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(151, 2, 'Boalmari', 'বোয়ালমারী', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(152, 2, 'Alfadanga', 'আলফাডাঙ্গা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(153, 2, 'Madhukhali', 'মধুখালি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(154, 2, 'Bhanga', 'ভাঙ্গা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(155, 2, 'Nagarkanda', 'নগরকান্ড', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(156, 2, 'Charbhadrasan', 'চরভদ্রাসন ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(157, 2, 'Sadarpur', 'সদরপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(158, 2, 'Shaltha', 'শালথা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(159, 3, 'Gazipur Sadar-Joydebpur', 'গাজীপুর সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(160, 3, 'Kaliakior', 'কালিয়াকৈর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(161, 3, 'Kapasia', 'কাপাসিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(162, 3, 'Sripur', 'শ্রীপুর', 50, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(163, 3, 'Kaliganj', 'কালীগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(164, 3, 'Tongi', 'টঙ্গি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(165, 4, 'Gopalganj Sadar', 'গোপালগঞ্জ সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(166, 4, 'Kashiani', 'কাশিয়ানি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(167, 4, 'Kotalipara', 'কোটালিপাড়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(168, 4, 'Muksudpur', 'মুকসুদপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(169, 4, 'Tungipara', 'টুঙ্গিপাড়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(170, 5, 'Dewanganj', 'দেওয়ানগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(171, 5, 'Baksiganj', 'বকসিগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(172, 5, 'Islampur', 'ইসলামপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(173, 5, 'Jamalpur Sadar', 'জামালপুর সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(174, 5, 'Madarganj', 'মাদারগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(175, 5, 'Melandaha', 'মেলানদাহা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(176, 5, 'Sarishabari', 'সরিষাবাড়ি ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(177, 5, 'Narundi Police I.C', 'নারুন্দি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(178, 6, 'Astagram', 'অষ্টগ্রাম', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(179, 6, 'Bajitpur', 'বাজিতপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(180, 6, 'Bhairab', 'ভৈরব', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(181, 6, 'Hossainpur', 'হোসেনপুর ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(182, 6, 'Itna', 'ইটনা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(183, 6, 'Karimganj', 'করিমগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(184, 6, 'Katiadi', 'কতিয়াদি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(185, 6, 'Kishoreganj Sadar', 'কিশোরগঞ্জ সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(186, 6, 'Kuliarchar', 'কুলিয়ারচর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(187, 6, 'Mithamain', 'মিঠামাইন', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(188, 6, 'Nikli', 'নিকলি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(189, 6, 'Pakundia', 'পাকুন্ডা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(190, 6, 'Tarail', 'তাড়াইল', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(191, 7, 'Madaripur Sadar', 'মাদারীপুর সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(192, 7, 'Kalkini', 'কালকিনি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(193, 7, 'Rajoir', 'রাজইর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(194, 7, 'Shibchar', 'শিবচর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(195, 8, 'Manikganj Sadar', 'মানিকগঞ্জ সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(196, 8, 'Singair', 'সিঙ্গাইর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(197, 8, 'Shibalaya', 'শিবালয়', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(198, 8, 'Saturia', 'সাটুরিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(199, 8, 'Harirampur', 'হরিরামপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(200, 8, 'Ghior', 'ঘিওর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(201, 8, 'Daulatpur', 'দৌলতপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(202, 9, 'Lohajang', 'লোহাজং', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(203, 9, 'Sreenagar', 'শ্রীনগর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(204, 9, 'Munshiganj Sadar', 'মুন্সিগঞ্জ সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(205, 9, 'Sirajdikhan', 'সিরাজদিখান', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(206, 9, 'Tongibari', 'টঙ্গিবাড়ি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(207, 9, 'Gazaria', 'গজারিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(208, 10, 'Bhaluka', 'ভালুকা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(209, 10, 'Trishal', 'ত্রিশাল', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(210, 10, 'Haluaghat', 'হালুয়াঘাট', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(211, 10, 'Muktagachha', 'মুক্তাগাছা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(212, 10, 'Dhobaura', 'ধবারুয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(213, 10, 'Fulbaria', 'ফুলবাড়িয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(214, 10, 'Gaffargaon', 'গফরগাঁও', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(215, 10, 'Gauripur', 'গৌরিপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(216, 10, 'Ishwarganj', 'ঈশ্বরগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(217, 10, 'Mymensingh Sadar', 'ময়মনসিং সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(218, 10, 'Nandail', 'নন্দাইল', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(219, 10, 'Phulpur', 'ফুলপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(220, 11, 'Araihazar', 'আড়াইহাজার', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(221, 11, 'Sonargaon', 'সোনারগাঁও', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(222, 11, 'Bandar', 'বান্দার', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(223, 11, 'Naryanganj Sadar', 'নারায়ানগঞ্জ সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(224, 11, 'Rupganj', 'রূপগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(225, 11, 'Siddirgonj', 'সিদ্ধিরগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(226, 12, 'Belabo', 'বেলাবো', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(227, 12, 'Monohardi', 'মনোহরদি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(228, 12, 'Narsingdi Sadar', 'নরসিংদী সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(229, 12, 'Palash', 'পলাশ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(230, 12, 'Raipura, Narsingdi', 'রায়পুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(231, 12, 'Shibpur', 'শিবপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(232, 13, 'Kendua Upazilla', 'কেন্দুয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(233, 13, 'Atpara Upazilla', 'আটপাড়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(234, 13, 'Barhatta Upazilla', 'বরহাট্টা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(235, 13, 'Durgapur Upazilla', 'দুর্গাপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(236, 13, 'Kalmakanda Upazilla', 'কলমাকান্দা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(237, 13, 'Madan Upazilla', 'মদন', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(238, 13, 'Mohanganj Upazilla', 'মোহনগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(239, 13, 'Netrakona-S Upazilla', 'নেত্রকোনা সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(240, 13, 'Purbadhala Upazilla', 'পূর্বধলা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(241, 13, 'Khaliajuri Upazilla', 'খালিয়াজুরি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(242, 14, 'Baliakandi', 'বালিয়াকান্দি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(243, 14, 'Goalandaghat', 'গোয়ালন্দ ঘাট', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(244, 14, 'Pangsha', 'পাংশা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(245, 14, 'Kalukhali', 'কালুখালি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(246, 14, 'Rajbari Sadar', 'রাজবাড়ি সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(247, 15, 'Shariatpur Sadar -Palong', 'শরীয়তপুর সদর ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(248, 15, 'Damudya', 'দামুদিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(249, 15, 'Naria', 'নড়িয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(250, 15, 'Jajira', 'জাজিরা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(251, 15, 'Bhedarganj', 'ভেদারগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(252, 15, 'Gosairhat', 'গোসাইর হাট ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(253, 16, 'Jhenaigati', 'ঝিনাইগাতি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(254, 16, 'Nakla', 'নাকলা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(255, 16, 'Nalitabari', 'নালিতাবাড়ি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(256, 16, 'Sherpur Sadar', 'শেরপুর সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(257, 16, 'Sreebardi', 'শ্রীবরদি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(258, 17, 'Tangail Sadar', 'টাঙ্গাইল সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(259, 17, 'Sakhipur', 'সখিপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(260, 17, 'Basail', 'বসাইল', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(261, 17, 'Madhupur', 'মধুপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(262, 17, 'Ghatail', 'ঘাটাইল', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(263, 17, 'Kalihati', 'কালিহাতি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(264, 17, 'Nagarpur', 'নগরপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(265, 17, 'Mirzapur', 'মির্জাপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(266, 17, 'Gopalpur', 'গোপালপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(267, 17, 'Delduar', 'দেলদুয়ার', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(268, 17, 'Bhuapur', 'ভুয়াপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(269, 17, 'Dhanbari', 'ধানবাড়ি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(270, 55, 'Bagerhat Sadar', 'বাগেরহাট সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(271, 55, 'Chitalmari', 'চিতলমাড়ি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(272, 55, 'Fakirhat', 'ফকিরহাট', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(273, 55, 'Kachua', 'কচুয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(274, 55, 'Mollahat', 'মোল্লাহাট ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(275, 55, 'Mongla', 'মংলা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(276, 55, 'Morrelganj', 'মরেলগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(277, 55, 'Rampal', 'রামপাল', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(278, 55, 'Sarankhola', 'স্মরণখোলা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(279, 56, 'Damurhuda', 'দামুরহুদা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(280, 56, 'Chuadanga-S', 'চুয়াডাঙ্গা সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(281, 56, 'Jibannagar', 'জীবন নগর ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(282, 56, 'Alamdanga', 'আলমডাঙ্গা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(283, 57, 'Abhaynagar', 'অভয়নগর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(284, 57, 'Keshabpur', 'কেশবপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(285, 57, 'Bagherpara', 'বাঘের পাড়া ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(286, 57, 'Jessore Sadar', 'যশোর সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(287, 57, 'Chaugachha', 'চৌগাছা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(288, 57, 'Manirampur', 'মনিরামপুর ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(289, 57, 'Jhikargachha', 'ঝিকরগাছা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(290, 57, 'Sharsha', 'সারশা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(291, 58, 'Jhenaidah Sadar', 'ঝিনাইদহ সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(292, 58, 'Maheshpur', 'মহেশপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(293, 58, 'Kaliganj', 'কালীগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(294, 58, 'Kotchandpur', 'কোট চাঁদপুর ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(295, 58, 'Shailkupa', 'শৈলকুপা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(296, 58, 'Harinakunda', 'হাড়িনাকুন্দা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(297, 59, 'Terokhada', 'তেরোখাদা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(298, 59, 'Batiaghata', 'বাটিয়াঘাটা ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(299, 59, 'Dacope', 'ডাকপে', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(300, 59, 'Dumuria', 'ডুমুরিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(301, 59, 'Dighalia', 'দিঘলিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(302, 59, 'Koyra', 'কয়ড়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(303, 59, 'Paikgachha', 'পাইকগাছা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(304, 59, 'Phultala', 'ফুলতলা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(305, 59, 'Rupsa', 'রূপসা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(306, 60, 'Kushtia Sadar', 'কুষ্টিয়া সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(307, 60, 'Kumarkhali', 'কুমারখালি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(308, 60, 'Daulatpur', 'দৌলতপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(309, 60, 'Mirpur', 'মিরপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(310, 60, 'Bheramara', 'ভেরামারা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(311, 60, 'Khoksa', 'খোকসা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(312, 61, 'Magura Sadar', 'মাগুরা সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(313, 61, 'Mohammadpur', 'মোহাম্মাদপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(314, 61, 'Shalikha', 'শালিখা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(315, 61, 'Sreepur', 'শ্রীপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(316, 62, 'angni', 'আংনি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(317, 62, 'Mujib Nagar', 'মুজিব নগর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(318, 62, 'Meherpur-S', 'মেহেরপুর সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(319, 63, 'Narail-S Upazilla', 'নড়াইল সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(320, 63, 'Lohagara Upazilla', 'লোহাগাড়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(321, 63, 'Kalia Upazilla', 'কালিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(322, 64, 'Satkhira Sadar', 'সাতক্ষীরা সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(323, 64, 'Assasuni', 'আসসাশুনি ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(324, 64, 'Debhata', 'দেভাটা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(325, 64, 'Tala', 'তালা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(326, 64, 'Kalaroa', 'কলরোয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(327, 64, 'Kaliganj', 'কালীগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(328, 64, 'Shyamnagar', 'শ্যামনগর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(329, 18, 'Adamdighi', 'আদমদিঘী', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(330, 18, 'Bogra Sadar', 'বগুড়া সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(331, 18, 'Sherpur', 'শেরপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(332, 18, 'Dhunat', 'ধুনট', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(333, 18, 'Dhupchanchia', 'দুপচাচিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(334, 18, 'Gabtali', 'গাবতলি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(335, 18, 'Kahaloo', 'কাহালু', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(336, 18, 'Nandigram', 'নন্দিগ্রাম', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(337, 18, 'Sahajanpur', 'শাহজাহানপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(338, 18, 'Sariakandi', 'সারিয়াকান্দি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(339, 18, 'Shibganj', 'শিবগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(340, 18, 'Sonatala', 'সোনাতলা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(341, 19, 'Joypurhat S', 'জয়পুরহাট সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(342, 19, 'Akkelpur', 'আক্কেলপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(343, 19, 'Kalai', 'কালাই', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(344, 19, 'Khetlal', 'খেতলাল', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(345, 19, 'Panchbibi', 'পাঁচবিবি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(346, 20, 'Naogaon Sadar', 'নওগাঁ সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(347, 20, 'Mohadevpur', 'মহাদেবপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(348, 20, 'Manda', 'মান্দা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(349, 20, 'Niamatpur', 'নিয়ামতপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(350, 20, 'Atrai', 'আত্রাই', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(351, 20, 'Raninagar', 'রাণীনগর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(352, 20, 'Patnitala', 'পত্নীতলা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(353, 20, 'Dhamoirhat', 'ধামইরহাট ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(354, 20, 'Sapahar', 'সাপাহার', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(355, 20, 'Porsha', 'পোরশা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(356, 20, 'Badalgachhi', 'বদলগাছি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(357, 21, 'Natore Sadar', 'নাটোর সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(358, 21, 'Baraigram', 'বড়াইগ্রাম', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(359, 21, 'Bagatipara', 'বাগাতিপাড়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(360, 21, 'Lalpur', 'লালপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(361, 21, 'Natore Sadar', 'নাটোর সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(362, 21, 'Baraigram', 'বড়াই গ্রাম', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(363, 22, 'Bholahat', 'ভোলাহাট', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(364, 22, 'Gomastapur', 'গোমস্তাপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(365, 22, 'Nachole', 'নাচোল', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(366, 22, 'Nawabganj Sadar', 'নবাবগঞ্জ সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(367, 22, 'Shibganj', 'শিবগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(368, 23, 'Atgharia', 'আটঘরিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(369, 23, 'Bera', 'বেড়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(370, 23, 'Bhangura', 'ভাঙ্গুরা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(371, 23, 'Chatmohar', 'চাটমোহর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(372, 23, 'Faridpur', 'ফরিদপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(373, 23, 'Ishwardi', 'ঈশ্বরদী', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(374, 23, 'Pabna Sadar', 'পাবনা সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(375, 23, 'Santhia', 'সাথিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(376, 23, 'Sujanagar', 'সুজানগর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(377, 24, 'Bagha', 'বাঘা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(378, 24, 'Bagmara', 'বাগমারা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(379, 24, 'Charghat', 'চারঘাট', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(380, 24, 'Durgapur', 'দুর্গাপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(381, 24, 'Godagari', 'গোদাগারি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(382, 24, 'Mohanpur', 'মোহনপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(383, 24, 'Paba', 'পবা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(384, 24, 'Puthia', 'পুঠিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(385, 24, 'Tanore', 'তানোর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(386, 25, 'Sirajganj Sadar', 'সিরাজগঞ্জ সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(387, 25, 'Belkuchi', 'বেলকুচি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(388, 25, 'Chauhali', 'চৌহালি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(389, 25, 'Kamarkhanda', 'কামারখান্দা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(390, 25, 'Kazipur', 'কাজীপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(391, 25, 'Raiganj', 'রায়গঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(392, 25, 'Shahjadpur', 'শাহজাদপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(393, 25, 'Tarash', 'তারাশ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(394, 25, 'Ullahpara', 'উল্লাপাড়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(395, 26, 'Birampur', 'বিরামপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(396, 26, 'Birganj', 'বীরগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(397, 26, 'Biral', 'বিড়াল', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(398, 26, 'Bochaganj', 'বোচাগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(399, 26, 'Chirirbandar', 'চিরিরবন্দর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(400, 26, 'Phulbari', 'ফুলবাড়ি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(401, 26, 'Ghoraghat', 'ঘোড়াঘাট', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(402, 26, 'Hakimpur', 'হাকিমপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(403, 26, 'Kaharole', 'কাহারোল', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(404, 26, 'Khansama', 'খানসামা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(405, 26, 'Dinajpur Sadar', 'দিনাজপুর সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(406, 26, 'Nawabganj', 'নবাবগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(407, 26, 'Parbatipur', 'পার্বতীপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(408, 27, 'Fulchhari', 'ফুলছড়ি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(409, 27, 'Gaibandha sadar', 'গাইবান্ধা সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(410, 27, 'Gobindaganj', 'গোবিন্দগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(411, 27, 'Palashbari', 'পলাশবাড়ী', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(412, 27, 'Sadullapur', 'সাদুল্যাপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(413, 27, 'Saghata', 'সাঘাটা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(414, 27, 'Sundarganj', 'সুন্দরগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(415, 28, 'Kurigram Sadar', 'কুড়িগ্রাম সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(416, 28, 'Nageshwari', 'নাগেশ্বরী', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(417, 28, 'Bhurungamari', 'ভুরুঙ্গামারি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(418, 28, 'Phulbari', 'ফুলবাড়ি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(419, 28, 'Rajarhat', 'রাজারহাট', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(420, 28, 'Ulipur', 'উলিপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(421, 28, 'Chilmari', 'চিলমারি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(422, 28, 'Rowmari', 'রউমারি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(423, 28, 'Char Rajibpur', 'চর রাজিবপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(424, 29, 'Lalmanirhat Sadar', 'লালমনিরহাট সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(425, 29, 'Aditmari', 'আদিতমারি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(426, 29, 'Kaliganj', 'কালীগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(427, 29, 'Hatibandha', 'হাতিবান্ধা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(428, 29, 'Patgram', 'পাটগ্রাম', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(429, 30, 'Nilphamari Sadar', 'নীলফামারী সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(430, 30, 'Saidpur', 'সৈয়দপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(431, 30, 'Jaldhaka', 'জলঢাকা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(432, 30, 'Kishoreganj', 'কিশোরগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(433, 30, 'Domar', 'ডোমার', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(434, 30, 'Dimla', 'ডিমলা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(435, 31, 'Panchagarh Sadar', 'পঞ্চগড় সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(436, 31, 'Debiganj', 'দেবীগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(437, 31, 'Boda', 'বোদা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(438, 31, 'Atwari', 'আটোয়ারি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(439, 31, 'Tetulia', 'তেঁতুলিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(440, 32, 'Badarganj', 'বদরগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(441, 32, 'Mithapukur', 'মিঠাপুকুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(442, 32, 'Gangachara', 'গঙ্গাচরা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(443, 32, 'Kaunia', 'কাউনিয়া', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(444, 32, 'Rangpur Sadar', 'রংপুর সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(445, 32, 'Pirgachha', 'পীরগাছা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(446, 32, 'Pirganj', 'পীরগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(447, 32, 'Taraganj', 'তারাগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(448, 33, 'Thakurgaon Sadar', 'ঠাকুরগাঁও সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(449, 33, 'Pirganj', 'পীরগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(450, 33, 'Baliadangi', 'বালিয়াডাঙ্গি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(451, 33, 'Haripur', 'হরিপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(452, 33, 'Ranisankail', 'রাণীসংকইল', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(453, 51, 'Ajmiriganj', 'আজমিরিগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(454, 51, 'Baniachang', 'বানিয়াচং', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(455, 51, 'Bahubal', 'বাহুবল', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(456, 51, 'Chunarughat', 'চুনারুঘাট', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(457, 51, 'Habiganj Sadar', 'হবিগঞ্জ সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(458, 51, 'Lakhai', 'লাক্ষাই', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(459, 51, 'Madhabpur', 'মাধবপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(460, 51, 'Nabiganj', 'নবীগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(461, 51, 'Shaistagonj', 'শায়েস্তাগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(462, 52, 'Moulvibazar Sadar', 'মৌলভীবাজার', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(463, 52, 'Barlekha', 'বড়লেখা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(464, 52, 'Juri', 'জুড়ি', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(465, 52, 'Kamalganj', 'কামালগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(466, 52, 'Kulaura', 'কুলাউরা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(467, 52, 'Rajnagar', 'রাজনগর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(468, 52, 'Sreemangal', 'শ্রীমঙ্গল', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(469, 53, 'Bishwamvarpur', 'বিসশম্ভারপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(470, 53, 'Chhatak', 'ছাতক', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(471, 53, 'Derai', 'দেড়াই', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(472, 53, 'Dharampasha', 'ধরমপাশা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(473, 53, 'Dowarabazar', 'দোয়ারাবাজার', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(474, 53, 'Jagannathpur', 'জগন্নাথপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(475, 53, 'Jamalganj', 'জামালগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(476, 53, 'Sulla', 'সুল্লা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(477, 53, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(478, 53, 'Shanthiganj', 'শান্তিগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(479, 53, 'Tahirpur', 'তাহিরপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(480, 54, 'Sylhet Sadar', 'সিলেট সদর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(481, 54, 'Beanibazar', 'বেয়ানিবাজার', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(482, 54, 'Bishwanath', 'বিশ্বনাথ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(483, 54, 'Dakshin Surma', 'দক্ষিণ সুরমা', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(484, 54, 'Balaganj', 'বালাগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(485, 54, 'Companiganj', 'কোম্পানিগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(486, 54, 'Fenchuganj', 'ফেঞ্চুগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(487, 54, 'Golapganj', 'গোলাপগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(488, 54, 'Gowainghat', 'গোয়াইনঘাট', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(489, 54, 'Jointapur', 'জৈন্তাপুর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(490, 54, 'Kanaighat', 'কানাইঘাট', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(491, 54, 'Zakiganj', 'জাকিগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(492, 54, 'Nobigonj', 'নবীগঞ্জ', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(493, 45, 'Eidgaon', 'ঈদগাঁও', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(494, 53, 'Modhyanagar', 'মধ্যনগর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(495, 7, 'Dasar', 'দশর', 130, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(496, 1, 'Dhaka North', 'ঢাকা উত্তর', 60, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48'),
(497, 1, 'Dhaka South', 'ঢাকা দক্ষিন', 60, '', '2025-08-27 05:35:48', '2025-08-27 05:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_superadmin` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `is_superadmin`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Masud Ahmed', 'superadmin', NULL, '$2y$10$rFXwMnnpC/2ZvOaqdM0fE.9c7cp9EQsJbbUNTbMpiK/D/MYV.RjHC', 1, 1, NULL, '2025-08-27 05:35:48', '2025-08-27 05:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `why_works`
--

CREATE TABLE `why_works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_keypoints`
--
ALTER TABLE `about_keypoints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_keypoints_about_id_foreign` (`about_id`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album_image_videos`
--
ALTER TABLE `album_image_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_image_videos_album_id_foreign` (`album_id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_blog_category_id_foreign` (`blog_category_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_name_unique` (`name`);

--
-- Indexes for table `call_to_actions`
--
ALTER TABLE `call_to_actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_messages_service_id_foreign` (`film_id`);

--
-- Indexes for table `cover_images`
--
ALTER TABLE `cover_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_division_id_foreign` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimations`
--
ALTER TABLE `estimations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estimations_product_id_foreign` (`product_id`),
  ADD KEY `estimations_service_id_foreign` (`film_id`);

--
-- Indexes for table `exhibitions`
--
ALTER TABLE `exhibitions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_slug_unique` (`slug`);

--
-- Indexes for table `exhibition_categories`
--
ALTER TABLE `exhibition_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exhibition_images`
--
ALTER TABLE `exhibition_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_images_project_id_foreign` (`exhibition_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_mains`
--
ALTER TABLE `faq_mains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`);

--
-- Indexes for table `film_images`
--
ALTER TABLE `film_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_images_service_id_foreign` (`film_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_career_id_foreign` (`career_id`);

--
-- Indexes for table `keypoints`
--
ALTER TABLE `keypoints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_activities`
--
ALTER TABLE `login_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_counters`
--
ALTER TABLE `main_counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_member_code_unique` (`member_code`),
  ADD UNIQUE KEY `members_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `news_blog_comments`
--
ALTER TABLE `news_blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_blog_comments_news_blog_id_foreign` (`news_blog_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `policies_type_unique` (`type`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_counters`
--
ALTER TABLE `slider_counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonialmains`
--
ALTER TABLE `testimonialmains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upazilas_district_id_foreign` (`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `why_works`
--
ALTER TABLE `why_works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_keypoints`
--
ALTER TABLE `about_keypoints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `album_image_videos`
--
ALTER TABLE `album_image_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `call_to_actions`
--
ALTER TABLE `call_to_actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cover_images`
--
ALTER TABLE `cover_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `estimations`
--
ALTER TABLE `estimations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `exhibitions`
--
ALTER TABLE `exhibitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5020;

--
-- AUTO_INCREMENT for table `exhibition_categories`
--
ALTER TABLE `exhibition_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exhibition_images`
--
ALTER TABLE `exhibition_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2291;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faq_mains`
--
ALTER TABLE `faq_mains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `film_images`
--
ALTER TABLE `film_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `keypoints`
--
ALTER TABLE `keypoints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_activities`
--
ALTER TABLE `login_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `main_counters`
--
ALTER TABLE `main_counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `news_blog_comments`
--
ALTER TABLE `news_blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `slider_counters`
--
ALTER TABLE `slider_counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonialmains`
--
ALTER TABLE `testimonialmains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=498;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `why_works`
--
ALTER TABLE `why_works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_keypoints`
--
ALTER TABLE `about_keypoints`
  ADD CONSTRAINT `about_keypoints_about_id_foreign` FOREIGN KEY (`about_id`) REFERENCES `abouts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `album_image_videos`
--
ALTER TABLE `album_image_videos`
  ADD CONSTRAINT `album_image_videos_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_blog_category_id_foreign` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD CONSTRAINT `contact_messages_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`);

--
-- Constraints for table `estimations`
--
ALTER TABLE `estimations`
  ADD CONSTRAINT `estimations_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `film_images`
--
ALTER TABLE `film_images`
  ADD CONSTRAINT `service_images_service_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_career_id_foreign` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news_blog_comments`
--
ALTER TABLE `news_blog_comments`
  ADD CONSTRAINT `news_blog_comments_news_blog_id_foreign` FOREIGN KEY (`news_blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD CONSTRAINT `upazilas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
