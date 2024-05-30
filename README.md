# Laravel 10 寄送 PDF 測驗結果檔案

凡應考且合乎規定者，無論成績通過與否應用程式一律提供使用者選擇是否寄發測驗結果。

## 使用方式
- 打開 php.ini 檔案，啟用 PHP 擴充模組 sodium，並重啟服務器。
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移，並執行資料庫填充（如果要測試的話）。
```sh
$ php artisan migrate --seed
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以登入經由 `/quiz` 來進行測驗。
- 你可以以系統管理員身分登入經由 `/admin` 來進行測驗管理，預設的電子郵件和密碼分別為 __admin@admin.com__ 和 __password__ 。

----

## 畫面截圖
![](https://i.imgur.com/duL6oc6.png)
> 可以在家中或辦公室舒適地透過進行迅速的線上測驗

![](https://i.imgur.com/3G5RTmD.png)
> 登入後即可進行測驗，選出適當答案

![](https://i.imgur.com/p0HLfwg.png)
> 可選擇是否寄送測驗結果通知，註冊時請輸入使用者親自收信之電子郵件信箱

![](https://i.imgur.com/wZbDMKm.png)
> 即時得知重要測驗訊息
