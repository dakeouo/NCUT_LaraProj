![image](https://imgur.com/c9O2ujc.png)
> 更多 [學生作業管理系統](https://imgur.com/a/c0068LH) 圖片 

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

## Default User
#### 學生端
> 帳號:3A432100@ncut.edu.tw 密碼:123456

#### TA端
> 帳號:3A123400@ncut.edu.tw 密碼:654321

### Designer
- [Liang Jyun Hong](https://github.com/3A417012)
- [Jin Yuan Liu](https://github.com/3A417141)