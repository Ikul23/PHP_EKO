<?php

namespace App\Commands;

use App\Application;

use App\Database\SQLite;

use App\EventSender\EventSender;

use App\Models\Event;

use App\Models\EventDto;

use App\Telegram\TelegramApiImpl;

class HandleEventsCommand extends Command

{

  protected Application $app;

  public function __construct(Application $app)

  {

    $this->app = $app;
  }

  public function run(array $options = []): void

  {

    $event = new Event(new SQLite($this->app));

    $events = $event->select();

    $eventSender = new EventSender(new TelegramApiImpl($this->app->env('TELEGRAM_TOKEN')));

    foreach ($events as $event) {

      if ($this->shouldEventBeRan($event)) {

        $eventSender->sendMessage($event['receiver_id'], $event['text']);
      }
    }
  }

  public function shouldEventBeRan(array $event): bool

  {
    $currentMinute = date("i");

    $currentHour = date("H");

    $currentDay = date("d");

    $currentMonth = date("m");

    $currentWeekday = date("w");

    // var_dump((int)$event['minute'], (int)$event['hour'], (int)$event['day'], (int)$event['month'], (int)$event['day_of_week'], '/end/');
    // var_dump((int)$currentMinute, (int)$currentHour, (int)$currentDay, (int)$currentMonth, ((int)$currentWeekday));

    // die(var_dump(((int)$event['minute'] === (int)$currentMinute &&

    // (int)$event['hour'] === (int)$currentHour &&

    // (int)$event['day'] === (int)$currentDay &&

    // (int)$event['month'] === (int)$currentMonth &&

    // (int)$event['day_of_week'] === (int)$currentWeekday)));

    return ((int)$event['minute'] === (int)$currentMinute &&

      (int)$event['hour'] === (int)$currentHour &&

      (int)$event['day'] === (int)$currentDay &&

      (int)$event['month'] === (int)$currentMonth &&

      (int)$event['day_of_week'] === (int)$currentWeekday);
  }
}
