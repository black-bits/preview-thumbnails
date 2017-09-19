# Preview Thumbnails

Preview Thumbnail Builder for the Laravel Framework

## How to use

```php
// initialize test data
$files = [
        '1.jpg',
        '2.jpg',
        '3.jpg',
];

$timespan = 5; // in seconds
```

```php
// option 1
$previewThumbnails = new \BlackBits\PreviewThumbnails\PreviewThumbnails($timespan);
return $previewThumbnails->getVTT($files);
```

```php
// option 2
$previewThumbnails = new \BlackBits\PreviewThumbnails\PreviewThumbnails();
$previewThumbnails->setTimespan($timespan);
return $previewThumbnails->getVTT($files);
```

```php
// option 3
$previewThumbnails = new \BlackBits\PreviewThumbnails\PreviewThumbnails();
return $previewThumbnails->setTimespan($timespan)->getVTT($files);
```

```php
// option 4
return PreviewThumbnails::getVTT($files);
```

```php
// option 5
return PreviewThumbnails::setTimespan($timespan)->getVTT($files);
```