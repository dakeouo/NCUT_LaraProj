-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

INSERT INTO `lara2019_choices` (`id`, `chapter`, `topic`, `ans`, `question`, `option1`, `option2`, `option3`, `option4`) VALUES
(1,	1,	1,	3,	'下列何者是構成網頁的基本要素?',	'PHP1',	'JSP2',	'HTML3',	'ASP4'),
(2,	1,	1,	4,	'網頁是由許多標籤所組成，一個簡單的網頁包含以下那些標籤?',	'&lt;HTML&gt;',	'&lt;META&gt;',	'&lt;BODY&gt;',	'以上皆是'),
(3,	1,	1,	4,	'下列何者是宣告網頁的開始與結束?',	'&lt;HEAD&gt;&lt;/HEAD&gt;',	'&lt;BODY&gt;&lt;/BODY&gt;',	'&lt;FORM&gt;&lt;/FORM&gt;',	'&lt;HTML&gt;&lt;/HTML&gt;'),
(4,	1,	1,	4,	'網頁語系、關鍵字……等相關資訊，是使用哪一標籤來定義的?',	'&lt;TITLE&gt;',	'&lt;BODY&gt;',	'&lt;HEAD&gt;',	'&lt;META&gt;'),
(5,	1,	1,	1,	'網頁文字、圖片、表格存放於哪一標籤之中?',	'&lt;BODY&gt;&lt;/BODY&gt;',	'&lt;HTML&gt;&lt;/HTML&gt;',	'&lt;HEAD&gt;&lt;/HEAD&gt;',	'&lt;FORM&gt;&lt;/FORM&gt;'),
(6,	1,	1,	1,	'設定瀏覽器標題要使用哪一標籤?',	'&lt;TITLE&gt;',	'&lt;HEAD&gt;',	'&lt;META&gt;',	'&lt;TABLE&gt;'),
(7,	1,	1,	3,	'網頁檔名之命名，下列何者正確?',	'建議使用中文和數字組合即可當作檔案名稱。',	'建議使用中文和英文組合即可當作檔案名稱。',	'建議使用英文即可當作檔案名稱。',	'以上皆是'),
(8,	1,	1,	4,	'有關於標籤的使用，下列何者正確?',	'標籤有區分大小寫的差別。',	'&lt;TITLE&gt;&lt;/TITLE&gt;與&lt;title&gt;&lt;/title&gt;效果是不同的。',	'&lt;HEAD&gt;&lt;/HEAD&gt;是設定網頁標題的標籤。',	'&lt;BODY&gt;&lt;/BODY&gt;是存放網頁內容的標籤。'),
(9,	1,	1,	2,	'網頁中讓文字斷行或換行的 HTML 語法，下列何者正確?',	'&lt;HR&gt;',	'&lt;BR&gt;或&lt;P&gt;',	'&lt;A&gt;',	'&lt;TR&gt;或&lt;TD&gt;'),
(10,	1,	1,	1,	'網頁中欲使用註解，其語法為?',	'&lt;!--註解文字--&gt;',	'網頁無註解語法',	'&lt;!%%註解文字%%&gt;',	'&lt;!&&註解文字&&&gt;'),
(11,	2,	1,	4,	'PHP 的特點是什麼 ?',	'是伺服器端程式語言',	'是內嵌式的程式語言',	'具有跨平台的能力',	'以上皆是'),
(12,	2,	1,	2,	'PHP 程式、網頁需放於何處才能執行 ?',	'直接開啟檔案即可執行',	'若無更改安裝路徑， 網頁存放於 C:/AppServ/www 資料夾內即可執行',	'若無更改安裝路徑，網頁存放於 C:/AppServ 資料夾內即可執行',	'以上皆可執行 PHP 程式'),
(13,	2,	1,	3,	'有關於 PHP 程式的開始與結束，下列何者錯誤 ?',	'&lt;echo \"第一個 PHP 程式\"; &gt;',	'&lt;?echo \"第一個 PHP 程式\"; ?&gt;',	'&lt;?PHP echo \"第一個 PHP 程式\"; ?&gt;',	'以上皆錯誤'),
(14,	2,	1,	3,	'有關於 PHP 的敘述句 ，下列何者正確 ?',	'&lt;? echo  輸出字串 !!;?&gt;',	'&lt;? echo \" 輸出字串 \" ?&gt;',	'&lt;? echo \" 輸出字串 \";?  &gt;',	'以上皆正確'),
(15,	2,	1,	2,	'下列何者為「拖曳字元」 ?',	'\"\\\\\"',	'\"\\\"',	'\"%\"',	'\"&\"'),
(16,	2,	1,	1,	'有關於 \" \\ n \" 敘述 ，下列何者正確 ?',	'與 &lt;br&gt; 相同 ，皆為畫面上之換行',	'與 &lt;p&gt; 相同 ，皆為畫面上之換行',	'為原始碼上之換行',	'在畫面上顯示 n 的意思'),
(17,	2,	1,	1,	'在 PHP 中我們如何定義變數 ?',	'在變數名稱 前 加上 \" $ \" 符號',	'在變數名稱前加上 \" % \" 符號',	'在變數名稱前加上 \" & \" 符號',	'在變數名稱前加上 \" # \" 符號'),
(18,	2,	1,	2,	'有關於變數 ，下列何者正確 ?',	'變數名稱無大小寫差異',	'變數名稱可以是英文 、 數字 、 底線組成',	'變數名稱可以是數字開頭',	'變數使用 \" &gt; \" 大於符號表示變數內容'),
(19,	2,	1,	2,	'下列何者為錯誤控制運算子符號 ?',	'\" ! \"',	'\" @ \"',	'\" ^ \"',	'\" * \"'),
(20,	2,	1,	3,	'有關於 PHP 的程式註解 ，下列何者正確 ?',	'「 &lt; ?// 註解文字 ?&gt; 」此為多行註解',	'「 &lt;?/* 註解文字 */?&gt; 」此為單行註解',	'「 &lt;?// 註解文字 ?&gt; 」此為單行註解',	'PHP 程式註解與 HTML 註解皆為 「 &lt;! -- 註解文字 -- &gt; 」'),
(21,	3,	1,	2,	'下列哪一個符號是用來連接字串與變數 ?',	'“\'”',	'“.”',	'“&”',	'“/”'),
(22,	3,	1,	2,	'關於 include 和 include _ once 敘述，下列何者正確 ?',	'include _ once 會重複引入同樣的內容',	'include _ once 若網頁已經有相同內容，就不會重複引入同樣的內容',	'當網頁讀到 include 的時候，會重複讀進來',	'以上皆非'),
(23,	3,	1,	2,	'關於 include 、 require 和 require_once 敘述，下列何者正確',	'若該網頁『一定』會將檔案引入，通常都會使用 include',	'若該網頁『一定』會將檔案引入，通常都會使用 require',	'require_once 若網頁已經有相同內容，會重複引入同樣的內容',	'以上皆非'),
(24,	3,	1,	2,	'下列何者為表單的起始與結束?',	'&lt;BODY&gt;&lt;/BODY&gt;',	'&lt;FORM&gt;&lt;/BODY&gt;',	'&lt;HEAD&gt;&lt;/HEAD&gt;',	'&lt;HTML&gt;&lt;/HTML&gt;'),
(25,	3,	1,	1,	'何者傳送方式，會將表單資料傳送時顯示於網址列?',	'GET',	'POST',	'兩者皆可以',	'以上皆非'),
(26,	3,	1,	2,	'關於表單元件敘述，下列何者正確?',	' radio 為複選按鈕',	'checkbox 為複選按鈕',	'一般輸入姓名都使用 select 字元',	'text 為下拉式選單'),
(27,	3,	1,	1,	'下列何者可用來計算陣列元素多寡?',	'count 函數',	'header 函式',	'rsort 函數',	'sort 函數'),
(28,	3,	1,	4,	'以下敘述何者正確?',	'&lt;FORM&gt;標籤中的 METHOD 屬性，指的是接受表單資料頁面路徑與檔名',	'&lt;FORM&gt;標籤中的 ACTION 屬性，指的是表單的傳遞方式',	'&lt;TEXTAREA&gt;標籤是密碼輸入框的語法',	'表單資料的傳遞方式有 POST 與 GET 兩種'),
(29,	3,	1,	3,	'有關於 if 判斷是，下列敘述何者正確？',	'僅能做單一條件的判斷',	'判斷式裡不能有第二個判斷式',	'判斷式裡可以有多個判斷式',	'以上皆非'),
(30,	4,	1,	3,	'有關於 COOKIE 的限制，下列何者為非?',	'檔案最大只能到 4K Bytes 容量',	'使用者若將瀏覽器的 cookie 功能關閉，則無法使用 cookie 功能',	'瀏覽器最多只能存取 500 個 cookie',	' 以上皆非'),
(31,	4,	1,	1,	'關於 setcookie()函數，下列何者正確?',	'setcookie 函數最多可以設定 6 個參數',	'使用 setcookie 函數之前，可輸入任何資料',	'瀏覽器關閉後，cookie 檔案就會自動消失',	'建議將 setcookie 函數放在程式最後面'),
(32,	4,	1,	1,	' cookie 的有效時間敘述，何者錯誤?',	'有設定 cookie 的有效時間，當瀏覽器關閉後，cookie 一樣會自動消失',	'設定 cookie 有效時間的格式為「time()+秒數」',	'設定 cookie 的有效時間，若瀏覽器關閉，cookie 檔案仍存在',	'time()函數，是以秒為單位'),
(33,	4,	1,	3,	'如何刪除 cookie?',	'使用 setcookie 函數並設定第一個參數即可刪除 cookie',	'使用 delete 函數',	'等待有效時間到就好',	'使用 setcookie_delete 函數'),
(34,	4,	1,	1,	' 如何啟動 session？',	'宣告語法為：session_start()',	'瀏覽器會自動啟動',	'宣告語法為：session_register()',	'宣告語法為：session_save_path()'),
(35,	4,	1,	3,	'刪除 session 下列何者有誤?',	'session_unregister(“變數名稱”)',	'session_destroy()',	'session_delete()',	'以上皆是'),
(36,	4,	1,	1,	'下列敘述何者正確?',	'cookie 是存放在客戶端',	'cookie 是存放在伺服器端',	'cookie 和 session 皆存放於伺服器端',	'cookie 和 session 皆存放於客戶端'),
(37,	4,	1,	1,	'下列敘述何者正確?',	'session 的安全性比 cookie 佳',	'session 是存放於使用者端的，所以使用者可以修改其內容',	'目前常見的購物網站會員登入系統，都只能使用 cookie 製作',	' session 存放伺服器端，是不會造成任何負擔的'),
(38,	4,	1,	3,	'session 的存放位置，下列何者正確?',	'存放位置都是固定的，無法改變',	'若要改變存放位置，必須請專人修改，自己無法做變更',	'若要改變存放位置，必須找出 php.ini 檔案進行修改',	'若改變存放位置，一定要重新開機才能正常運作'),
(39,	3,	1,	1,	'表單元件中，隱藏式欄位的語法為?',	'&lt;input type=”hidden”&gt;',	'&lt;input type=”password”&gt;',	'&lt;input type=”text”&gt;',	'&lt;input type=”button”&gt;'),
(40,	4,	1,	4,	'session 的敘述，下列何者錯誤?',	'session 的檔案名稱開頭為”sess_”',	'每個瀏覽器都對應一個獨立 session',	'檔案開頭後面接著 64 位元的數字和字母組合',	'以上皆是'),
(41,	5,	1,	4,	'有關主鍵設定，下列何者正確?',	'可重複',	'可為空值',	'愈複雜愈好',	'永遠不會改變'),
(42,	5,	1,	2,	'有關外鍵設定，下列何者錯誤?',	' 一定參考其他資料表的主鍵',	'在資料表內不一定是主鍵',	'不可以是空值',	'可以參考同一個資料表的主鍵'),
(43,	5,	1,	1,	'建立資料表的時候，必須將主鍵的附加設為?',	'Auto_increment',	'UNSIGNED',	'UNSIGNED ZEROFILL',	'NULL'),
(44,	5,	1,	1,	'查詢資料的 SQL 語法為?',	'SELECT',	'INSERT',	'DELETE',	'UPDATE'),
(45,	5,	1,	2,	'使用 INSERT 語法新增資料時，下列何者正確?',	'一次只能新增一筆資料',	'一次只能新增多筆資料',	'此語法為查詢語法，非新增語法',	'以上皆正確'),
(46,	5,	1,	2,	'下列敘述何者錯誤?',	'“mysqlshow”是秀出資料庫、資料表、欄位的指令',	'“mysqldump”是將資料庫的資料、架構匯出成文字檔',	'“mysql”是進入資料庫的文字作業環境，可以操作所有資料庫功能',	'“mysqladmin”是秀出資料庫設定的指令'),
(47,	5,	1,	4,	'下列敘述何者正確?',	'資料庫中，每個資料表都是獨立無任何關聯的',	'外鍵只能有單一欄位組成',	'主鍵有可能重複',	'以上皆非'),
(48,	5,	1,	2,	'有關於欄位的資料型態，下列何者正確?',	'姓名、住址…欄位只能使用 CHAR(M)資料型態存放',	'日期、時間…屬於特殊資料型態',	'NOT NULL 資料型態，通常配合預設值來運用',	'每個欄位的附加型態都須設為 AUTO_INCREMENT'),
(49,	5,	1,	1,	'有關於查詢 SQL 語法，下列何者正確?',	'格式為「select 查詢內容 from 資料表名稱」',	'格式為「select 資料表名稱 from 查詢內容」',	'格式為「select from 查詢內容」',	'格式為「select from 資料庫名稱」'),
(50,	5,	1,	3,	'有關於附加篩選條件，以下何者正確?',	'附加篩選條件只能用在查詢',	'where 附加篩選條件，只能用於新增',	'order by 附加篩選條件可用來做排序動作',	' between A and B 附加篩選條件必須符合 A 到 B 之外，才顯示資料');

INSERT INTO `lara2019_homeworks` (`type`, `id`, `contect`, `weight`, `start_at`, `finish_at`) VALUES
('0',	1,	'<div>繳交時間：10/2(四)10:00 – 10/10(二)17:00</div><ul><li>選擇題答案請打在WORD檔裡</li><li>網頁請用資料夾包起來</li><li>製作自我介紹的頁面(至少兩頁)</li></ul><div>完成後以自己的學號為檔名打包上傳</div>',	100,	'2018-10-02 13:00:00',	'2018-10-10 22:00:00'),
('0',	2,	'無說明',	100,	'2018-10-18 08:00:00',	'2019-01-31 22:00:00'),
('0',	3,	'<div>繳交時間：10/25(四)10:00 – 11/6(二)17:00</div><ul><li>選擇題採線上填答(不用再上傳選擇題)</li><li>網頁請用資料夾包起來</li><li>99乘法表檔案請命名為9x9.php</li></ul><div>完成後以自己的學號為檔名打包上傳</div>',	100,	'2018-10-25 10:00:00',	'2019-02-28 17:00:00'),
('0',	4,	'<div><b>繳交時間：</b>12/4 (二)13:30–12/12(三)22:00</div><div><b>選擇題</b>採線上填答(不用上傳選擇題)</div><div><b>網頁</b>請用資料夾包起來</div><div><b>會員系統</b>請務必要有以下的帳號(這樣比較好打分數，不管你裡面有幾個帳號)：</div><div><ul><li><b>帳號：</b>Andy</li><li><b>密碼：</b>1234</li></ul></div><div>完成後以自己的學號為檔名打包上傳</div><div><br></div>',	100,	'2018-12-25 12:00:00',	'2019-03-11 13:00:00'),
('1',	11,	'補交測試',	100,	'2018-12-04 12:30:00',	'2018-12-07 12:30:00');

INSERT INTO `lara2019_scores` (`id`, `userId`, `hwId`, `hwScore`, `hwComment`) VALUES
(1,	'3A517044',	'1',	90,	NULL),
(2,	'3A617001',	'1',	0,	NULL),
(3,	'3A617003',	'1',	0,	NULL),
(4,	'3A617004',	'1',	0,	NULL),
(5,	'3A617006',	'1',	0,	NULL),
(6,	'3A617007',	'1',	0,	NULL),
(7,	'3A617008',	'1',	0,	NULL),
(8,	'3A617009',	'1',	0,	NULL),
(9,	'3A617010',	'1',	0,	NULL),
(10,	'3A432100',	'1',	0,	NULL);

INSERT INTO `lara2019_submits` (`id`, `userId`, `hwId`, `choice`, `practice`, `created_at`, `updated_at`) VALUES
(1,	'3A432100',	'2',	9,	1,	'2019-01-08 18:44:45',	'2019-01-08 18:47:27');

INSERT INTO `lara2019_users` (`id`, `uid`, `type`, `path`, `name`, `password`, `email`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'3A517044',	'正式生',	'null.png',	'學生姓名',	'$2y$10$r9JoQbjj4rz53pSI2LpDeeZAPuomKsirp4VGQRUH9YPfhrIGfT17W',	's3A517044@student.ncut.edu.tw',	NULL,	NULL,	'2018-12-17 06:36:15',	'2019-01-09 06:31:06'),
(2,	'3A617001',	'正式生',	'null.jpg',	'學生姓名',	'$2y$10$bQdJv6E/bAQvX3tWm.NomO7CoLgto65rq6E7bgv4Fmy/FlVUExPxy',	's3A617001@student.ncut.edu.tw',	NULL,	NULL,	'2018-12-17 06:36:15',	'2019-01-09 06:31:20'),
(3,	'3A617003',	'正式生',	'null.jpg',	'學生姓名',	'$2y$10$Zd/BVngqaB0jiafrA3Sc.OxWM.7/cEab9K7X4WXi5voF.af6vBp3a',	's3A617003@student.ncut.edu.tw',	NULL,	NULL,	'2018-12-17 06:36:15',	'2019-01-09 06:31:25'),
(4,	'3A617004',	'正式生',	'null.jpg',	'學生姓名',	'$2y$10$ozb2VF2MuEOOHarVePZ6O.gcOX7nG6HJiEZT2/kZlnAz4BfxZxzMu',	's3A617004@student.ncut.edu.tw',	NULL,	NULL,	'2018-12-17 06:36:15',	'2019-01-09 06:31:42'),
(5,	'3A617006',	'正式生',	'null.jpg',	'學生姓名',	'$2y$10$8wlytHfkk4T4UQRH37qiX.bXuLL2fMfBvCx3QCAXBfeJ4z38gNlTu',	's3A617006@student.ncut.edu.tw',	NULL,	NULL,	'2018-12-17 06:36:15',	'2019-01-09 06:31:57'),
(6,	'3A617007',	'正式生',	'null.png',	'學生姓名',	'$2y$10$ARMTJHjSj0oIYtrgjLgl2.EvKx10tWZHNIU6bdgOti18HUdYOJ7pW',	's3A617007@student.ncut.edu.tw',	NULL,	NULL,	'2018-12-17 06:36:15',	'2019-01-09 06:32:23'),
(7,	'3A617008',	'正式生',	'null.png',	'學生姓名',	'$2y$10$t9Q00SxCmPbesowvB.XAY.648wt3hxHTzCdhet1DOPDVv1zI9FSo6',	's3A617008@student.ncut.edu.tw',	NULL,	NULL,	'2018-12-17 06:36:15',	'2019-01-09 06:32:44'),
(8,	'3A617009',	'正式生',	'null.jpg',	'學生姓名',	'$2y$10$/lRGE/PXmoACSRoJPhAWz.xQhJ3I0.Nseo9WrgqnLzvJE9px.uQyW',	's3A617009@student.ncut.edu.tw',	NULL,	NULL,	'2018-12-17 06:36:15',	'2019-01-09 06:33:00'),
(9,	'3A617010',	'正式生',	'null.jpg',	'學生姓名',	'$2y$10$Pxnf6ZS1R7PRjTn7Edj1TOTsbtbjvdd/uz2cFyacr1HGwf9OeQqHS',	's3A617010@student.ncut.edu.tw',	NULL,	NULL,	'2018-12-17 06:36:15',	'2019-01-09 06:33:19'),
(10,	'3A432100',	'正式生',	'null.png',	'測試者',	'$2y$10$8eq2Ktbl/gy7w/OopgXFPONx7S.NFJOZlKWcsAS36h0Img4PrgYhG',	's3A432100@ncut.edu.tw',	NULL,	NULL,	'2019-01-08 22:03:38',	'2019-01-09 06:49:36'),
(11,	'3A123400',	'助教',	'null.png',	'管理者',	'$2y$10$b9FiQiX31N19fIK0BHz.juTkSQhHYbQnaz53i3JWpRuNxUiHXsQya',	's3A123400@ncut.edu.tw',	NULL,	NULL,	'2019-01-08 22:05:05',	'2019-01-09 06:34:59');

-- 2019-01-09 07:14:31
