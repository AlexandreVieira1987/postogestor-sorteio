<?php

/**
 * @var \omnilight\scheduling\Schedule $schedule
 *
 * Comando no servidor
 * /usr/bin/php -f/home/u170078369/domains/revenda.esy.es/public_html/yii schedule/run --scheduleFile=commands/schedule.php
 */

$schedule->command('cliente/execute')->everyMinute();
