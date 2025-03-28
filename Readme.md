# Reminger TG BOT

├── PHP_EXO
├── app
│ ├── Commands
│ │ ├── Command.php
│ │ ├── HandleEventsCommand.php
│ │ ├── HandleEventsDaemonCommand.php
│ │ ├── SaveEventCommand.php
│ │ └── TgMessagesCommand.php
│ ├── Database
│ │ ├── Db.php
│ │ └── SQLite.php
│ ├── EventSender
│ │ └── EventSender.php
│ ├── Events
│ ├── CommandNotFound.php
│ ├── Helpers
│ │ ├── Str.php
│ │ └── wr_su.php
│ ├── Models
│ │ ├── Event.php
│ │ └── Model.php
│ └── Telegram
│ ├── Application.php
│ ├── TelegramApi.php
│ └── TelegramApiImpl.php
├── tests
│ ├── HandleDaemonCommandTest
│ ├── HandleEventsCommandTest.php
│ └── SaveEventCommandTest.php
├── .gitignore
├── composer.json
├── composer.lock
├── composer.phar
├── Readme.md
├── runner.php
├── systemctl-working.conf
├── bootstrap.php
├── ConsoleKernel.php
└── Environment.php
