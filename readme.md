# Simple PHP Youtube Downloader

This library is based on the Athlon1600 library, it allows you to download Youtube videos in several formats.
You will get an easy to use object containing the details of the video and several links to download the video.

## Installation

Pour installer cette library, il suffit d'utiliser la commande suivante :

```bash
composer require fredericlesueurs/youtube-downloader
```

## Usage

```php
use SimplePHPYoutubeDownloader\Model\Video;
use SimplePHPYoutubeDownloader\Model\VideoDetails;
use SimplePHPYoutubeDownloader\Model\VideoPackage;
use SimplePHPYoutubeDownloader\YoutubeDownloader;

$youtubeDownloader = new YoutubeDownloader();
$videoPackage = $youtubeDownloader->getYoutubeVideo('url');

$videoTitle = $videoPackage->getVideoDetails()->getTitle();
$videos = $videoPackage->getVideos();

foreach($videos as $video) {
  $video->getUrl();
}

```

## License
MIT : see license file.
