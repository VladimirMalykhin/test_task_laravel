<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Interval;
use Symfony\Component\Console\Input\InputArgument;

class IntervalsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'intervals:list {--left= : Левая граница} {--right= : Правая граница}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Вывести список интервалов';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $left = $this->option('left');
        $right = $this->option('right');

        if (is_null($left) || is_null($right)) {
            $this->error('Параметы --left и --right обязательны');
            return;
        }

        if (!is_numeric($left) || !is_numeric($right)) {
            $this->error('Параметы --left и --right должны быть числовыми');
            return;
        }

        $model = new Interval();
        $intervals = $model->getIntervals($left, $right);

        if ($intervals->isEmpty()) {
            $this->info('Нет подходящих значений');
            return;
        }

        $tableData = $intervals->map(function ($interval) {
            return [
                'ID' => $interval->id,
                'Start' => $interval->start,
                'End' => $interval->end,
            ];
        })->toArray();

        $this->info(PHP_EOL . 'По выбранным значениям найдены следующие записи:' . PHP_EOL);
        $this->table(['ID', 'Start', 'End'], $tableData);
    }
}
