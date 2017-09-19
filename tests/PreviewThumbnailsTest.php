<?php

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTest;
use BlackBits\PreviewThumbnails\PreviewThumbnailsFacade;
use BlackBits\PreviewThumbnails\PreviewThumbnailsServiceProvider;
use BlackBits\PreviewThumbnails\PreviewThumbnails;


class TestCase extends BaseTest
{
    protected $timespan;
    protected $files;
    protected $vtt;

    protected function getPackageProviders($app)
    {
        return [PreviewThumbnailsServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'PreviewThumbnails' => PreviewThumbnailsFacade::class,
        ];
    }

    protected function createTestData()
    {
        $this->timespan = 5;

        $this->files = [
            '1.jpg',
            '2.jpg',
            '3.jpg'
        ];

        $this->vtt = "WEBVTT"                        . PHP_EOL . PHP_EOL
                   . "00:00:00.000 --> 00:00:05.000" . PHP_EOL
                   . "1.jpg"                         . PHP_EOL . PHP_EOL
                   . "00:00:05.000 --> 00:00:10.000" . PHP_EOL
                   . "2.jpg"                         . PHP_EOL . PHP_EOL
                   . "00:00:10.000 --> 00:00:15.000" . PHP_EOL
                   . "3.jpg"                         . PHP_EOL . PHP_EOL;
    }


    public function test_it_returns_vtt_1()
    {
        $this->createTestData();

        $previewThumbnail = new PreviewThumbnails($this->timespan);
        $vtt = $previewThumbnail->getVTT($this->files);

        $this->assertEquals($this->vtt, $vtt);
    }

    public function test_it_returns_vtt_2()
    {
        $this->createTestData();

        $previewThumbnail = new PreviewThumbnails();
        $previewThumbnail->setTimespan($this->timespan);
        $vtt = $previewThumbnail->getVTT($this->files);

        $this->assertEquals($this->vtt, $vtt);
    }

    public function test_it_returns_vtt_3()
    {
        $this->createTestData();

        $previewThumbnail = new PreviewThumbnails();
        $vtt = $previewThumbnail->setTimespan($this->timespan)->getVTT($this->files);

        $this->assertEquals($this->vtt, $vtt);
    }

    public function test_it_returns_vtt_4()
    {
        $this->createTestData();

        $vtt = \PreviewThumbnails::getVTT($this->files);

        $this->assertEquals($this->vtt, $vtt);
    }

    public function test_it_returns_vtt_5()
    {
        $this->createTestData();

        $vtt = \PreviewThumbnails::setTimespan($this->timespan)->getVTT($this->files);

        $this->assertEquals($this->vtt, $vtt);
    }

}
