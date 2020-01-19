<?php


namespace SimplePHPYoutubeDownloader\Model;


use ReflectionException;
use SimplePHPYoutubeDownloader\Utils\Serializer;
use function foo\func;

class VideoPackage
{

    /**
     * @var VideoDetails
     */
    private $videoDetails;

    /**
     * @var array
     * @type SimplePHPYoutubeDownloader\Model\Video
     */
    private $videos;

    /**
     * @return VideoDetails
     */
    public function getVideoDetails(): VideoDetails
    {
        return $this->videoDetails;
    }

    /**
     * @param VideoDetails $videoDetails
     * @return VideoPackage
     */
    public function setVideoDetails(VideoDetails $videoDetails): VideoPackage
    {
        $this->videoDetails = $videoDetails;
        return $this;
    }

    /**
     * @return array
     */
    public function getVideos(): array
    {
        return $this->videos;
    }

    /**
     * @param array $videos
     * @return VideoPackage
     */
    public function setVideos(array $videos): VideoPackage
    {
        $this->videos = $videos;
        return $this;
    }

    /**
     * @throws ReflectionException
     */
    public function getArrayOfVideos() {
        $arrayVideos = [];
        $videos = $this->getVideos();

        foreach ($videos as $video) {
            $arrayVideos[] = Serializer::toArray($video, Video::class);
        }

        return $arrayVideos;
    }

}
