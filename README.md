# Faal Telegram Bot

This is a Telegram bot that provides random fortune telling to users using an online API. The project is built with PHP and the NanoTel library.

This bot is **faalbot**. It is a simple bot that fetches fortune results from an API (Daradege) and shares them with users. It is intended as an example of how to use the **NanoTel** library to build Telegram bots.

## Features

- Sends random fortune messages when the user sends the "faal" command.
- Retrieves a fortune image from the online **Daradege API**.
- Supports both private chats and group chats.
- Easy to set up with no additional configuration files required (uses environment variables).

## Developer Information

- **Developer Name**: Ehsan Fazli
- **Description**: This bot is a basic Telegram bot example for those interested in fortune telling using Telegram bots. It is a simple implementation to demonstrate the functionality of the NanoTel library.
- **Email**: ehsanfazlinejad@gmail.com
- **GitHub**: [Ehsan Fazli GitHub](https://github.com/Devehsany)

## How to Use

### Prerequisites

1. **PHP**: Version 8 or higher.
2. **Composer**: To install dependencies.
3. **Telegram Bot Token**: You need to get a token from [BotFather](https://core.telegram.org/bots#botfather).
4. **API Access**: You need an account on [API Daradege](https://daradege.ir) to retrieve fortunes (this API is publicly available).

### Installation Steps

1. **Clone the Project**:
   First, clone the project from GitHub using the following command:

   ```bash
   git clone https://github.com/yourusername/faal-telegram-bot.git
   cd faal-telegram-bot
