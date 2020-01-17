<?php


namespace SimplePHPYoutubeDownloader\Model;


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
     * @return array
     */
    public function getVideoWithSound(): array {
        $videos = $this->getVideos();

        return array_filter($videos, function (Video $item){
           return !is_null($item->getAudioQuality());
        });
    }

    /**
     * @return Video
     */
    public function getMostQualityVideoWithSound(): Video {
        /**
         * @var Video $videoMaxRes
         */
        $videoMaxRes = null;

        foreach ($this->getVideos() as $video) {
            $videoRes = $video->getHeight();

            if (!is_null($videoMaxRes)) {
                if ($videoMaxRes->getHeight() < $videoRes) {
                    $videoMaxRes = $video;
                }
            } else {
                $videoMaxRes = $video;
            }
        }

        return $videoMaxRes;
    }

}
