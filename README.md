#preview-thumbnails

Preview Thumbnail Builder for the Laravel Framework

## How to use

```php
$files = [
        '1.jpg',
        '2.jpg',
        '3.jpg',
];

$timespan = 5; // in seconds

$previewThumbnails = new \BlackBits\PreviewThumbnails\PreviewThumbnails($timespan);
return $previewThumbnails->getVTT($files);

$previewThumbnails = new \BlackBits\PreviewThumbnails\PreviewThumbnails();
$previewThumbnails->setTimespan($timespan);
return $previewThumbnails->getVTT($files);

$previewThumbnails = new \BlackBits\PreviewThumbnails\PreviewThumbnails();
return $previewThumbnails->setTimespan($timespan)->getVTT($files);

return PreviewThumbnails::getVTT($files);

return PreviewThumbnails::setTimespan($timespan)->getVTT($files);
```