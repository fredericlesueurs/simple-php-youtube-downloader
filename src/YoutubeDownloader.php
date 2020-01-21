<?php
namespace SimplePHPYoutubeDownloader;

use ReflectionException;
use SimplePHPYoutubeDownloader\Exception\UrlMalformedException;
use SimplePHPYoutubeDownloader\Model\Video;
use SimplePHPYoutubeDownloader\Model\VideoDetails;
use SimplePHPYoutubeDownloader\Model\VideoPackage;
use SimplePHPYoutubeDownloader\Utils\Browser;
use SimplePHPYoutubeDownloader\Utils\Serializer;
use SimplePHPYoutubeDownloader\Utils\SignatureDecoder;

require '../vendor/autoload.php';

class YoutubeDownloader {

    private $client;

    public function __construct()
    {
        $this->client = new Browser();
    }

    /**
     * @param string $url
     * @return VideoPackage
     * @throws UrlMalformedException
     * @throws ReflectionException
     */
    public function getYoutubeVideo(string $url): VideoPackage {
        $html = $this->getHtmlPage($url);

        $videoDataDetails = $this->getPlayerResponseAndVideoDetails($html);

        $playerUrl = $this->getPlayerUrl($html);
        $jsCode = $this->getPlayerCode($playerUrl);

        $videoData = $this->parseYoutubeVideoInformations($videoDataDetails, $jsCode);

        $videosDataObject = [];

        foreach ($videoData as $videoArray) {
            $videosDataObject[] = Serializer::arrayToObject($videoArray, Video::class);
        }

        $videoPackage = new VideoPackage();
        $videoPackage->setVideoDetails(
            Serializer::arrayToObject(
                $this->simplifyThumbnailArray($videoDataDetails['details']),
                VideoDetails::class)
        );
        $videoPackage->setVideos($videosDataObject);

        return $videoPackage;
    }

    public function parseYoutubeVideoInformations(array $dataVideo, $jsCode): array {

        $dataVideoParsed = [];

        $formats = $dataVideo['data']['formats'];
        $adaptiveFormats = $dataVideo['data']['adaptiveFormats'];

        if (!is_array($formats)) {
            $formats = array();
        }

        if (!is_array($adaptiveFormats)) {
            $adaptiveFormats = array();
        }

        $combinedFormats = array_merge($formats, $adaptiveFormats);

        foreach ($combinedFormats as $item) {

            // some videos do not need to be decrypted!
            if (!isset($item['url'])) {
                $item['url'] = $this->decodeUrl($item, $jsCode);
                unset($item['cipher']);
            }

            $dataVideoParsed[] = $item;
        }

        return $dataVideoParsed;

    }

    /**
     * @param string $html
     * @return array
     */
    public function getPlayerResponseAndVideoDetails(string $html): array {
        preg_match('/"streamingData":(?<jsonData>{.*}),"playerAds":.*"videoDetails":(?<details>{.*}),"annotations"/', stripcslashes($html), $matches);

        $videoData['data'] = json_decode($matches['jsonData'], true);
        $videoData['details'] = json_decode($matches['details'], true);

        return $videoData;
    }

    /**
     * @param $url
     * @return string|null
     * @throws UrlMalformedException
     */
    public function getHtmlPage(string $url): ?string {
        $videoId = $this->extractVideoId($url);

        return $this->client->get(sprintf('https://www.youtube.com/watch?v=%s', $videoId));
    }

    /**
     * @param $url
     * @return mixed
     * @throws UrlMalformedException
     */
    public function extractVideoId(string $url): string {

        preg_match('/^https:\/\/www\.youtube\.com\/watch\?v=(.{11}).*$/', $url, $matches);

        if (count($matches) == 2) {
            return $matches[1];
        } else {
            throw new UrlMalformedException('The video I.D. couldn\'t be extracted.', 1);
        }
    }

    /**
     * @param string $html
     * @return string
     */
    public function getPlayerUrl(string $html): string {
        $playerUrl = null;

        // check what player version that video is using
        if (preg_match('@<script\s*src="([^"]+player[^"]+js)@', $html, $matches)) {
            $playerUrl = $matches[1];

            // relative protocol?
            if (strpos($playerUrl, '//') === 0) {
                $playerUrl = 'http://' . substr($playerUrl, 2);
            } elseif (strpos($playerUrl, '/') === 0) {
                // relative path?
                $playerUrl = 'http://www.youtube.com' . $playerUrl;
            }
        }

        return $playerUrl;
    }

    /**
     * @param string $player_url
     * @return string
     */
    public function getPlayerCode(string $player_url): string {
        return $this->client->getCached($player_url);
    }

    /**
     * @param array $item
     * @param string $jsCode
     * @return string
     */
    public function decodeUrl(array $item, string $jsCode): string {

        $cipher = isset($item['cipher']) ? $item['cipher'] : '';

        parse_str($cipher, $result);


        $url = $result['url'];
        $sp = $result['sp']; // typically 'sig'
        $signature = $result['s'];

        $signatureDecoder = new SignatureDecoder();
        $signatureDecoded = $signatureDecoder->decode($signature, $jsCode);

        return $url . '&' . $sp . '=' . $signatureDecoded;
    }

    public function simplifyThumbnailArray(array $arrayDetails): array {
        if (isset($arrayDetails['thumbnail']) && isset($arrayDetails['thumbnail']['thumbnails']) && count($arrayDetails['thumbnail']['thumbnails']) > 0) {
            $thumbnails = $arrayDetails['thumbnail']['thumbnails'];
            unset($arrayDetails['thumbnail']);
            $arrayDetails['thumbnails'] = $thumbnails;

            return $arrayDetails;
        } else {
            unset($arrayDetails['thumbnail']);
            return $arrayDetails;
        }
    }

}
