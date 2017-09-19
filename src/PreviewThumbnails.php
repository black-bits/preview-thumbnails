<?php

namespace BlackBits\PreviewThumbnails;

use Illuminate\Support\Collection;


class PreviewThumbnails
{
    protected $timespan;
    protected $files;

    public function __construct($timespan = 5)
    {
        $this->setTimespan($timespan);
    }

    public function setTimespan($timespan)
    {
        $this->timespan = intval($timespan);

        return $this;
    }

    public function getVTT($files)
    {
        $this->setFiles($files);

        if (!$this->timespan || !$this->files)
            return "Timespan or Files missing";

        return $this->createVTT();
    }

    protected function setFiles($files)
    {
        if (! $files instanceof Collection)
            $files = collect($files);

        $this->files = $files;

        return $this;
    }

    protected function createVTT()
    {
        $vtt = "WEBVTT" . PHP_EOL. PHP_EOL;

        $this->files->each(function ($item, $key) use (&$vtt) {
            $vtt .= "{$this->getTimeString($key)} --> {$this->getTimeString($key + 1)}" . PHP_EOL;
            $vtt .= $item . PHP_EOL . PHP_EOL;
        });

        return $vtt;
    }

    protected function getTimeString($position)
    {
        return gmdate("H:i:s.000", $position * $this->timespan);
    }
}