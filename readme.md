網站瀏覽：[學生作業管理系統](https://dake.work/laraweb2019/)
(因技術性問題，目前**網頁註冊功能**與**作業批改**功能不能使用)

![image](https://imgur.com/c9O2ujc.png)
> 更多 [學生作業管理系統](https://imgur.com/a/fLTvBIH) 圖片 

# 學生作業管理系統

一套簡易型的師生作業管理平台

## 網站功能

#### 共同功能
- 使用者登入
- 修改個人資料

#### 學生端 
- 選擇題作答
- 上傳實作題檔案
- 觀看作業繳交資訊、成績、評語

#### TA端
- 觀看學生作業成績總表
- 選擇題題庫管理
- 學生作業管理
1. 新增作業繳交資訊
2. 輸入作業成績、評語
3. 下載學生作業實作檔案


## 網站安裝
#### 1. 還原專案

```sh
$ git clone https://github.com/WISD-2018/final07.git
$ composer install --no-script
$ cp .env.example .env
$ php artisan migrate
```

#### 2.匯入資料

1. 編輯 .env 檔
2. 新增資料庫
3. 將 final07.sql 匯入至該資料庫

## 資料庫
![image](https://i.imgur.com/vbkSwh9.png)
在Laravel建立時，預設會建立三個資料表：(以灰色底表示)
- migrations：遷移資料表用。內部記載需使用**database/migrations/**底下的那個PHP檔，來建立你的資料表
- password_reset：使用者重置密碼用
- users：使用者資料。預設會有以下欄位：
  - id：使用編號，自動遞增
  - name：使用者姓名
  - email：電子信箱，唯一
  - email_verified_at：電子信箱驗證時間，時戳，可為空值(NULL)
  - password：密碼
  - remember_token："記得我"的token，有勾就有token
  - created_at/updated_at：紀錄建立與更新時間

而與本專案有相關的共有5個資料表：
- users：使用者資料。除了上述預設的欄位，還新增了：
  - uid：學生/助教學號，唯一。為本專案採用的"userID"
  - type：使用者類型(正式生/助教)，預設為"正式生"
  - path：使用者圖片檔案路徑，預設為"null.png"
- homework：作業資訊資料。包含作業類型(type, 正式/補交)、作業ID(id)、說明內容(contect)等
- scores：紀錄作業評分結果。包含作業ID(hwId)、分數(hwScore)、評語(hwComment)等
- choices：選擇題資料。包含作業ID(hwId)、四個選項(option1-4)、選擇題答案(ans)等
- submits：學生作答狀況。包含使用者ID(userId)、作業ID(hwId)等

## Default User
#### 學生端
> 帳號:s3A432100@ncut.edu.tw 密碼:123456

#### TA端
> 帳號:s3A123400@ncut.edu.tw 密碼:654321

### Designer
- [Liang Jyun Hong](https://github.com/3A417012)
- [Jin Yuan Liu](https://github.com/3A417141)
