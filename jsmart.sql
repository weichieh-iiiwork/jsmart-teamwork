-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-05-14 10:11:58
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `jsmart`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL COMMENT '流水號',
  `adminName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '管理員姓名',
  `adminAccount` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '管理員帳號',
  `adminPassword` char(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '管理員密碼',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`id`, `adminName`, `adminAccount`, `adminPassword`, `created_at`, `updated_at`) VALUES
(1, '方莉榕', 'moana', '7a0508e36cbbbd403bf8a97fa0343ed716f8d17b', '2021-05-07 00:33:53', '2021-05-07 00:33:53');

-- --------------------------------------------------------

--
-- 資料表結構 `article`
--

CREATE TABLE `article` (
  `id` int(100) NOT NULL COMMENT '流水號',
  `articleId` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文章編號',
  `articleName` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文章標題',
  `articleContent` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文章內容',
  `articleAuthor` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文章作者',
  `articleCategory` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文章分類',
  `articleTag` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文章標籤',
  `articleImg` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `article`
--

INSERT INTO `article` (`id`, `articleId`, `articleName`, `articleContent`, `articleAuthor`, `articleCategory`, `articleTag`, `articleImg`, `created_at`, `updated_at`) VALUES
(2, 'a0001', '女人生命中長時間相伴的「好朋友」，三種友善地球的永續生理期用品', '月經是女人生命中長時間相伴的「好朋友」，但妳想過嗎？若每個月生理期來，都使用拋棄式的衛生棉、衛生棉條等不可回收的用品，女性一生將產生這些生理期垃圾', '吳心萍、黃靖文（主婦聯盟環境保護基金會資深主任、專員）', '衛教資訊', '月55', '20210511083944.jpg', '2021-05-05 16:46:23', '2021-05-05 16:46:23'),
(23, 'a0002', '從意外到等待：台灣不同世代女性的初經經驗', '初經是大多數女人必經的歷程，既是身體的變化也是身分的轉變，是由女孩到女人的里程碑。「月經」是女性主義與性別研究關注的重要議題，西蒙．波娃在其名著《第二性》中的第一章提到「女人不是天生的，而是形成的」，她以女孩在初經前後的轉變為例，指出社會如何看待女人的身體。歷史學者Joan Brumberg則觀察到，19世紀美國女孩們在女性網絡的日常生活中，耳濡目染而得到關於身體的知識，理解初經來臨與成長的意義。', '王秀雲（成功大學醫學系、醫學科技與社會研究中心）', '性別故事', '初經', '20210511094835.jpg', '2021-05-11 15:48:35', '2021-05-11 15:48:35'),
(24, 'a0003', '給你的寵愛身體懶人包：第一次月亮杯就上手', '月經量杯，俗稱「月亮杯」，是一種用矽膠材質製作的軟杯，柔軟有彈性，可以捲起推入陰道之中，用以承接經血的女性生理用品。1937年美國人發明月亮杯之後，它很快成為歐美女性一種生理用品的選擇。凡妮莎在自己特製的月亮杯年鑑裡發現，2003年還只有兩個品牌的月亮杯，十幾年後，至今全球已有104個了！英國 Mooncup、美國 Keeper、德國 Meluna、芬蘭 Lunette⋯⋯等', '慢慢說', '衛教資訊', '月亮杯', '20210511095011.jpg', '2021-05-11 15:50:11', '2021-05-11 15:50:11'),
(25, 'a0004', '關於月亮杯你一定要知道的十件事！你也來一杯', '根據統計女人平均一生要用掉一萬片衛生棉，女人們消耗著大量的衛生棉，從23公分到42公分應有盡有， 無形中造成地球的負擔。此時衛生棉條帶著更容易被地球消化以及更體貼身體的設計出現了，但依然無法降低高單價及大量產出的問題。\r\n\r\n近年有項生理期產品的發明被研究證明有效降低地球負荷，台灣人叫它月亮杯（Diva Cup、Menstrual cup）。月亮杯的材質多為醫用矽膠、外觀呈現柔軟鐘型。你看著月亮杯的外形可能很難想像將它放入體內，此時你不禁皺眉：「這東西真的能放進陰道嗎？」', '臉紅紅', '衛教資訊', '月亮杯', '20210511095057.jpg', '2021-05-11 15:50:57', '2021-05-11 15:50:57'),
(26, 'a0006', '560', 'asdfdd', 'asf', '衛教資訊', 'df', '20210511100605.jpg', '2021-05-11 16:06:05', '2021-05-11 16:06:05'),
(28, 'a0008', 'sdfhdgfhhd', 'asdf', 'asdf', '衛教資訊', 'asfd', '20210512035658.jpg', '2021-05-12 09:56:49', '2021-05-12 09:56:49');

-- --------------------------------------------------------

--
-- 資料表結構 `article_category`
--

CREATE TABLE `article_category` (
  `id` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `article_tag`
--

CREATE TABLE `article_tag` (
  `id` int(11) NOT NULL,
  `tagId` int(11) NOT NULL,
  `tagName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(11) NOT NULL COMMENT '商品類別號',
  `categoryName` varchar(100) NOT NULL COMMENT '商品類別名稱',
  `categoryParentId` int(11) NOT NULL COMMENT '商品層級',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`, `categoryParentId`, `created_at`, `updated_at`) VALUES
(1, '衛生棉', 0, '2021-05-10 08:30:41', '2021-05-10 08:30:41'),
(2, '布衛生棉', 0, '2021-05-10 08:37:30', '2021-05-10 08:37:30'),
(3, '棉條', 0, '2021-05-10 08:37:30', '2021-05-10 08:37:30'),
(4, '月亮杯', 0, '2021-05-10 08:38:07', '2021-05-10 08:38:07'),
(5, '月亮褲', 0, '2021-05-10 08:38:07', '2021-05-10 08:38:07'),
(7, '日用衛生棉', 1, '2021-05-12 08:16:08', '2021-05-13 16:41:06'),
(8, '夜用衛生棉', 1, '2021-05-12 08:16:19', '2021-05-12 08:18:33'),
(9, '護墊', 7, '2021-05-12 08:18:44', '2021-05-12 08:18:44'),
(10, '一般（18-21cm）', 7, '2021-05-12 08:18:57', '2021-05-12 08:18:57'),
(11, '量多（22-27cm）', 7, '2021-05-12 08:19:28', '2021-05-12 08:19:28'),
(12, '一般（28-30cm）', 8, '2021-05-12 08:19:45', '2021-05-12 08:19:45'),
(13, '量多（32-38cm）', 8, '2021-05-12 08:19:55', '2021-05-12 08:19:55'),
(14, '超長安心（40-42cm）', 8, '2021-05-12 08:20:03', '2021-05-12 08:20:03'),
(15, '護墊（16cm）', 2, '2021-05-12 08:20:15', '2021-05-12 08:20:15'),
(16, '一般（19-24cm）', 2, '2021-05-12 08:20:23', '2021-05-12 08:20:23'),
(17, '量多（28-45cm）', 2, '2021-05-12 08:20:31', '2021-05-12 08:20:31'),
(18, '額外吸收層', 2, '2021-05-12 08:20:40', '2021-05-12 08:20:40'),
(19, '量少（6-9g）', 3, '2021-05-12 08:20:58', '2021-05-12 08:20:58'),
(20, '一般（9-12g）', 3, '2021-05-12 08:21:06', '2021-05-12 08:21:06'),
(21, '量多(12-18g)', 3, '2021-05-12 08:21:14', '2021-05-12 08:21:14'),
(22, '教學杯（10ml）', 4, '2021-05-12 08:21:33', '2021-05-12 08:21:33'),
(23, '標準杯（20ml）', 4, '2021-05-12 08:21:40', '2021-05-12 08:21:40'),
(24, '滿月杯（30ml）', 4, '2021-05-12 08:21:49', '2021-05-12 08:21:49'),
(25, '攜帶盒', 4, '2021-05-12 08:21:57', '2021-05-12 08:21:57'),
(26, '一般', 5, '2021-05-12 08:22:09', '2021-05-12 08:22:09'),
(27, '運動型', 5, '2021-05-12 08:22:40', '2021-05-12 08:22:40'),
(29, '2222', 28, '2021-05-13 16:38:54', '2021-05-13 16:38:54'),
(32, '222', 31, '2021-05-14 10:10:57', '2021-05-14 10:10:57');

-- --------------------------------------------------------

--
-- 資料表結構 `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `eventId` int(11) NOT NULL,
  `eventName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventDate` date NOT NULL,
  `eventDescription` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventLocation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventImg` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventPrice` smallint(6) NOT NULL,
  `eventCategory` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `event`
--

INSERT INTO `event` (`id`, `eventId`, `eventName`, `eventDate`, `eventDescription`, `eventLocation`, `eventImg`, `eventPrice`, `eventCategory`, `created_at`, `updated_at`) VALUES
(2, 9, '花草系自然甜母女──蛋糕花藝創作', '2021-05-08', '主廚事先完成蛋糕體製作，提供給每位學員，課程中口述蛋糕體的製作方式，並提供完整食譜。 學員經由主廚指導完成火龍果內餡堆疊，並於外層抹上蔬果鮮奶油霜至整顆蛋糕完整，學員以食用花自由創作裝飾蔬果蛋糕。課程', '台灣台北市中山北路二段30號The One中山食藝店位於台北捷運淡水線【中山站】3號出口往前步行左轉中山北路 (晶華酒店正對面)', '20210511090301.jpg', 1000, '3', '2021-05-05 18:59:56', '2021-05-11 15:52:56'),
(3, 6, '女聲-關於「她」、「土地」和「聆聽」', '2021-05-14', '這是一群女生，包括生物聲學科學家、野地錄音師、音樂家、聲音藝術家、AI電腦音樂設計師、電台主持人…… 以所受的訓練與感官能力去聆聽這個世界，並且用獨特的方式與實踐，展演她們的「聽見」，進而找到 -- ', '台灣台北市新生南路三段56巷7號2樓(女書店)', '20210511090057.jpg', 250, '1', '2021-05-05 19:03:17', '2021-05-11 15:52:35'),
(4, 7, '女神盃 Girls Surf Boardriders Taiwan', '2021-05-08', '女神盃 Girls Surf Boardriders Taiwan 活動賽事 Only Girls 一場專屬於女孩們的衝浪活動賽事。 結合了衝浪賽事，衝浪體驗，瑜珈，健身體適能等... 推廣台灣女孩衝', '台灣宜蘭縣頭城鎮濱海路二段6號外澳沙灘', '20210513160003.jpg', 890, '1', '2021-05-05 19:05:21', '2021-05-13 16:00:03'),
(6, 1, '523我愛森(限女)[白色系瑜珈自然森呼吸]APP Women台北-第57場', '2021-05-22', '523我愛森，在5月23日當天，我們一起走入大安森林公園，呼吸芬多精擁抱大地，舒展肢體樂玩戶外瑜珈，進行假日光合作用。 在溫暖的五月天裡，穿著白色體驗戶外活動，認識和妳一樣具備純淨質感的大地系夥伴，串', '台灣台北市大安森林公園五號出口集合', '20210512031432.jpg', 801, '1', '2021-05-06 16:49:29', '2021-05-13 16:02:41');

-- --------------------------------------------------------

--
-- 資料表結構 `items`
--

CREATE TABLE `items` (
  `itemId` int(11) NOT NULL COMMENT '商品流水號',
  `itemName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品名稱',
  `itemImg` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '商品圖片路徑',
  `itemPrice` int(11) NOT NULL COMMENT '商品價格',
  `itemQty` tinyint(3) NOT NULL COMMENT '商品數量',
  `itemDescription` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品描述',
  `itemCategoryId` int(11) NOT NULL COMMENT '商品種類編號',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `items`
--

INSERT INTO `items` (`itemId`, `itemName`, `itemImg`, `itemPrice`, `itemQty`, `itemDescription`, `itemCategoryId`, `created_at`, `updated_at`) VALUES
(2, '弦月柔棉 日用薄型衛生棉 15片', 'item_20210511144727.png', 60, 100, '親膚少刺激\r\n嚴選天然無漂白素材\r\n6大無添加\r\n新升級波紋瞬潔層', 7, '2021-05-14 09:15:17', '2021-05-14 09:15:17'),
(3, '弦月柔棉 日用量多衛生棉 12片', 'item_20210511144744.png', 70, 100, '親膚少刺激\r\n嚴選天然無漂白素材\r\n6大無添加\r\n新升級波紋瞬潔層', 7, '2021-05-14 09:15:20', '2021-05-14 09:15:20'),
(4, '滿月柔棉 夜用薄型衛生棉 9片', 'item_20210511144757.png', 60, 100, '親膚少刺激\r\n嚴選天然無漂白素材\r\n6大無添加\r\n新升級波紋瞬潔層', 8, '2021-05-14 09:15:28', '2021-05-14 09:15:28'),
(5, '滿月柔棉 夜用加長衛生棉 7片', 'item_20210511144812.png', 80, 100, '親膚少刺激\r\n嚴選天然無漂白素材\r\n6大無添加\r\n新升級波紋瞬潔層', 8, '2021-05-14 09:15:36', '2021-05-14 09:15:36'),
(6, '新月柔棉 量少型衛生棉 16片', 'item_20210511145044.png', 60, 100, '親膚少刺激\r\n嚴選天然無漂白素材\r\n6大無添加\r\n新升級波紋瞬潔層', 7, '2021-05-14 09:15:41', '2021-05-14 09:15:41'),
(7, '朔月柔棉 超薄護墊 40片', 'item_20210511145100.png', 60, 100, '親膚少刺激\r\n嚴選天然無漂白素材\r\n6大無添加\r\n新升級波紋瞬潔層', 9, '2021-05-14 09:15:44', '2021-05-14 09:15:44'),
(8, '衛生棉條 一般型 10入', 'item_20210511145203.png', 150, 100, '花苞型導管、好推不沾手\r\n第1時間瞬吸 360度動作變安心不漏\r\n長達8小時吸收力\r\n一般流量適用', 20, '2021-05-14 09:15:52', '2021-05-14 09:15:52'),
(9, '衛生棉條 量少型 10入', 'item_20210511145230.png', 150, 100, '花苞型導管、好推不沾手\r\n第1時間瞬吸 360度動作變安心不漏\r\n長達8小時吸收力\r\n一般流量適用', 19, '2021-05-14 09:15:56', '2021-05-14 09:15:56'),
(10, '衛生棉條 量多型 9入', 'item_20210511145235.png', 150, 100, '花苞型導管、好推不沾手\r\n第1時間瞬吸 360度動作變安心不漏\r\n長達8小時吸收力\r\n一般流量適用', 21, '2021-05-14 09:16:00', '2021-05-14 09:16:00'),
(11, '盈月杯 一般型', 'item_20210511145312.png', 1500, 100, '可容納20ml經血\r\n台灣製造\r\n100%醫療級矽膠', 23, '2021-05-14 09:16:03', '2021-05-14 09:16:03'),
(12, '盈月杯 入門型', 'item_20210511145335.png', 1500, 100, '可容納10ml經血\r\n台灣製造\r\n100%醫療級矽膠', 22, '2021-05-14 09:17:28', '2021-05-14 09:17:28'),
(13, '盈月杯 量多型', 'item_20210511145339.png', 1500, 100, '可容納30ml經血\r\n台灣製造\r\n100%醫療級矽膠', 24, '2021-05-14 09:17:31', '2021-05-14 09:17:31'),
(14, '月暈小褲', 'item_20210511145344.png', 800, 100, '取代悶熱護墊及衛生棉\r\nMIT材質抑菌防漏、快速吸收\r\n可重覆使用，手洗機洗皆可', 26, '2021-05-14 09:16:29', '2021-05-14 09:16:29'),
(15, '盈月杯 入門型', 'item_20210511153225.png', 123, 12, '123456', 22, '2021-05-14 09:18:09', '2021-05-14 09:18:09'),
(16, '盈月杯 入門型', 'item_20210511153245.png', 123, 12, '123456', 22, '2021-05-14 09:18:15', '2021-05-14 09:18:15'),
(17, '盈月杯 入門型', 'item_20210511153249.png', 123, 12, '123456', 22, '2021-05-14 09:18:34', '2021-05-14 09:18:34'),
(28, '盈月杯 入門型', 'item_20210512091800.png', 180, 10, '123456', 22, '2021-05-14 09:18:48', '2021-05-14 09:18:48');

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL COMMENT '訂單編號(流水號)',
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '使用者帳號',
  `orderPrice` int(11) NOT NULL COMMENT '訂單金額',
  `paymentTypeId` int(11) NOT NULL COMMENT '付款方式',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='結帳';

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`orderId`, `username`, `orderPrice`, `paymentTypeId`, `created_at`, `updated_at`) VALUES
(1, 'tanya', 120, 0, '2021-05-14 09:17:50', '2021-05-14 09:17:50'),
(2, 'tanya', 4600, 0, '2021-05-14 09:19:24', '2021-05-14 09:19:24');

-- --------------------------------------------------------

--
-- 資料表結構 `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL COMMENT '訂單明細編號(流水號)',
  `orderId` int(11) NOT NULL COMMENT '訂單編號',
  `orderItemsId` int(11) NOT NULL COMMENT '商品編號',
  `checkPrice` int(11) NOT NULL COMMENT '結帳時單價',
  `checkQty` tinyint(3) NOT NULL COMMENT '結帳時數量',
  `checkSubtotal` int(11) NOT NULL COMMENT '結帳時小計',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='訂單中的商品列(訂單明細)';

--
-- 傾印資料表的資料 `order_items`
--

INSERT INTO `order_items` (`id`, `orderId`, `orderItemsId`, `checkPrice`, `checkQty`, `checkSubtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 60, 2, 120, '2021-05-14 09:17:50', '2021-05-14 09:17:50'),
(2, 2, 12, 1500, 2, 3000, '2021-05-14 09:19:24', '2021-05-14 09:19:24'),
(3, 2, 14, 800, 2, 1600, '2021-05-14 09:19:24', '2021-05-14 09:19:24');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT '流水號',
  `userAccount` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '使用者帳號',
  `userPassword` char(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '使用者密碼',
  `userName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '使用者名稱',
  `birthday` date NOT NULL COMMENT '生日',
  `phoneNumber` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '電話號碼',
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '信箱',
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '地址',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `userAccount`, `userPassword`, `userName`, `birthday`, `phoneNumber`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'tanya', '8aca103eae125bb908422862b88e0bde2ae947b5', '洪莉軒', '1992-01-01', '0911111111', 'tanya@gmail.com', '106台北市大安區復興南路一段390號2樓', '2021-05-07 00:35:57', '2021-05-07 00:35:57'),
(2, 'wei', '8fa8838ab83387ae867845f542b9fe9ca04873f0', '黃薇倢', '1992-02-02', '0922222222', 'WEI-JIE@gmail.com', '106台北市大安區復興南路一段390號2樓', '2021-05-07 00:37:37', '2021-05-07 00:37:37'),
(3, 'apple', 'd0be2dc421be4fcd0172e5afceea3970e2f3d940', '林思妤', '1992-03-03', '0933333333', 'apple@gmail.com', '106台北市大安區復興南路一段390號2樓', '2021-05-07 00:39:48', '2021-05-07 00:39:48'),
(4, 'SHI-QING', 'febb8412abadaf4f05846d31b2c862e659093fab', '黃詩晴', '1992-04-04', '0944444444', 'SHI-QING@gmail.com', '106台北市大安區復興南路一段390號2樓', '2021-05-07 00:41:35', '2021-05-07 00:41:35'),
(28, '222', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '222', '2021-04-23', '222', '222', '333', '2021-05-13 16:25:28', '2021-05-13 16:25:28'),
(31, '666', 'cd3f0c85b158c08a2b113464991810cf2cdfc387', '666', '0000-00-00', '666', '666', '666', '2021-05-13 16:35:06', '2021-05-13 16:35:06'),
(34, 'aaaa', '70c881d4a26984ddce795f6f71817c9cf4480e79', 'sss', '0000-00-00', 'sss', 'sss', 'sss', '2021-05-14 10:03:42', '2021-05-14 10:03:42');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `article_tag`
--
ALTER TABLE `article_tag`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- 資料表索引 `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemId`) USING BTREE;

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- 資料表索引 `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `article`
--
ALTER TABLE `article`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=32;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `article_category`
--
ALTER TABLE `article_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `article_tag`
--
ALTER TABLE `article_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品類別號', AUTO_INCREMENT=33;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `items`
--
ALTER TABLE `items`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品流水號', AUTO_INCREMENT=31;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT COMMENT '訂單編號(流水號)', AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '訂單明細編號(流水號)', AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
