<p align="center"><a href="https://github.com/ibrahimsayar/telegram-translator" target="_blank"><img src="https://raw.githubusercontent.com/ibrahimsayar/telegram-translator/main/public/images/needy-bot-api-logo.png" width="200"></a></p>

## About Needy Telegram Translator

If you are constantly using telegram and want to translate words into different languages, this library is for you.

## Quick Use

**You can use it directly by adding it to the group on telegram without dealing with any code.**

<br>

<p align="center">1. First you have to click on add people in your group</p>

<p align="center"><img src="https://raw.githubusercontent.com/ibrahimsayar/telegram-translator/main/public/images/readme-files/quick-step-1.png" width="300"></p>

<p align="center">2. You have to search for the bot by username and add it to your group. - <a href="https://t.me/TranslatorTelegramISayar_bot" target="_blank"> Needy Telegram Bot</a></p>

<p align="center"><img src="https://raw.githubusercontent.com/ibrahimsayar/telegram-translator/main/public/images/readme-files/quick-step-2.png" width="350"></p>

<p align="center">3. Then you need to open your group settings.</p></p>

<p align="center"><img src="https://raw.githubusercontent.com/ibrahimsayar/telegram-translator/main/public/images/readme-files/quick-step-3.png" width="350"></p>

<p align="center">4. Open the Administrators section.</p>

<p align="center"><img src="https://raw.githubusercontent.com/ibrahimsayar/telegram-translator/main/public/images/readme-files/quick-step-4.png" width="350"></p>

<p align="center">5. You should add the needy telegram translator as admin.</p>

<p align="center"><img src="https://raw.githubusercontent.com/ibrahimsayar/telegram-translator/main/public/images/readme-files/quick-step-5.png" width="350"></p>

<p align="center">6. Finish</p>

<p align="center"><img src="https://raw.githubusercontent.com/ibrahimsayar/telegram-translator/main/public/images/readme-files/quick-step-6.png" width="400"></p>

## Normal Use

### Dependencies
- PHP v7.4+
- PostgreSQL v11.16+
- Composer

### Information

| File | Comment |
| ------ | ------ |
| .env | contains environment variables. |

### Installation

```sh
# Downloading the repo.
git clone https://github.com/ibrahimsayar/telegram-translator.git
cd telegram-translator

# We install the necessary packages.
composer install

# We create the environment variable.
cp .env.example .env
php artisan key:generate
```

> **Warning**
> Parameters you need to define after the .env file is created.

| Parameter | Comment |
| ------ | ------ |
| DB_CONNECTION | Database connection type. |
| DB_HOST | contains environment variables. |
| DB_PORT | Database server address. |
| DB_DATABASE | Database name. |
| DB_USERNAME | Database username. |
| DB_PASSWORD | Database password |
| TELEGRAM_API_KEY | The id of the bot you created in Telegram. |
| TELEGRAM_CHAT_ID | The id of the group you added the bot to. |

```sh
# We start the application.
# http://127.0.0.1:8000/
php artisan serve
```

> **License**
> The Telegram Translator is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

