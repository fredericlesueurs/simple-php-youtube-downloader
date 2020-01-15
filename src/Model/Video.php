<?php


namespace SimplePHPYoutubeDownloader\Model;


class Video
{

    /**
     * @var int
     */
    private $itag;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $mimeType;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @var string
     */
    private $contentLenght;

    /**
     * @var string
     */
    private $lastModified;

    /**
     * @var string
     */
    private $quality;

    /**
     * @var int
     */
    private $fps;

    /**
     * @var string
     */
    private $qualityLabel;

    /**
     * @var string
     */
    private $projectionType;

    /**
     * @var string
     */
    private $approxDurationMs;

    /**
     * @var string
     */
    private $audioQuality;

    /**
     * @var int
     */
    private $audioChannels;

    /**
     * @var string
     */
    private $indicativeFormat;

    /**
     * @return int
     */
    public function getItag(): int
    {
        return $this->itag;
    }

    /**
     * @param int $itag
     * @return Video
     */
    public function setItag(int $itag): Video
    {
        $this->itag = $itag;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Video
     */
    public function setUrl(string $url): Video
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    /**
     * @param string $mimeType
     * @return Video
     */
    public function setMimeType(string $mimeType): Video
    {
        $this->mimeType = $mimeType;
        return $this;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return Video
     */
    public function setWidth(int $width): Video
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return Video
     */
    public function setHeight(int $height): Video
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return string
     */
    public function getContentLenght(): string
    {
        return $this->contentLenght;
    }

    /**
     * @param string $contentLenght
     * @return Video
     */
    public function setContentLenght(string $contentLenght): Video
    {
        $this->contentLenght = $contentLenght;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastModified(): string
    {
        return $this->lastModified;
    }

    /**
     * @param string $lastModified
     * @return Video
     */
    public function setLastModified(string $lastModified): Video
    {
        $this->lastModified = $lastModified;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuality(): string
    {
        return $this->quality;
    }

    /**
     * @param string $quality
     * @return Video
     */
    public function setQuality(string $quality): Video
    {
        $this->quality = $quality;
        return $this;
    }

    /**
     * @return int
     */
    public function getFps(): int
    {
        return $this->fps;
    }

    /**
     * @param int $fps
     * @return Video
     */
    public function setFps(int $fps): Video
    {
        $this->fps = $fps;
        return $this;
    }

    /**
     * @return string
     */
    public function getQualityLabel(): string
    {
        return $this->qualityLabel;
    }

    /**
     * @param string $qualityLabel
     * @return Video
     */
    public function setQualityLabel(string $qualityLabel): Video
    {
        $this->qualityLabel = $qualityLabel;
        return $this;
    }

    /**
     * @return string
     */
    public function getProjectionType(): string
    {
        return $this->projectionType;
    }

    /**
     * @param string $projectionType
     * @return Video
     */
    public function setProjectionType(string $projectionType): Video
    {
        $this->projectionType = $projectionType;
        return $this;
    }

    /**
     * @return string
     */
    public function getApproxDurationMs(): string
    {
        return $this->approxDurationMs;
    }

    /**
     * @param string $approxDurationMs
     * @return Video
     */
    public function setApproxDurationMs(string $approxDurationMs): Video
    {
        $this->approxDurationMs = $approxDurationMs;
        return $this;
    }

    /**
     * @return string
     */
    public function getAudioQuality(): string
    {
        return $this->audioQuality;
    }

    /**
     * @param string $audioQuality
     * @return Video
     */
    public function setAudioQuality(string $audioQuality): Video
    {
        $this->audioQuality = $audioQuality;
        return $this;
    }

    /**
     * @return int
     */
    public function getAudioChannels(): int
    {
        return $this->audioChannels;
    }

    /**
     * @param int $audioChannels
     * @return Video
     */
    public function setAudioChannels(int $audioChannels): Video
    {
        $this->audioChannels = $audioChannels;
        return $this;
    }

}
