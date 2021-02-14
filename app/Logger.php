<?php

namespace App;

use Illuminate\Http\Request;
use Monolog\Formatter\LineFormatter;

class Logger{

    protected $request;
    protected $exception;

    public function __construct(Request $request = null, \Exception $exception = null){
        $this->request = $request;
        $this->exception = $exception;
    }
    public function __invoke($logger){

        foreach ($logger->getHandlers() as $handler) {
            $handler->setFormatter(new LineFormatter(
                '[%datetime%]'.PHP_EOL."%message%".PHP_EOL."%context%".PHP_EOL."%extra%".PHP_EOL.PHP_EOL,
                'Y-m-d H:i',
                false,
                true
            ));
            $handler->pushProcessor([$this, 'processLogRecord']);
        }
    }

    public function processLogRecord(array $record): array{
        $record['extra'] += [
            'user' => $this->request->user()->name  ?? 'guest',
            'url' => $this->request->getRequestUri(),
        ];
        if($this->request->post()){
            $record['extra'] += [
                'post' => $this->request->post(),
            ];
        }

        return $record;
    }

}
