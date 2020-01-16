<?php


namespace SimplePHPYoutubeDownloader\Model;


class VideoDetails
{
    /**
     * @var string
     */
    private $videoId;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $lengthSeconds;

    /**
     * @var array
     */
    private $keywords;

    /**
     * @var string
     */
    private $channelId;

    /**
     * @var bool
     */
    private $isOwnerViewing;

    /**
     * @var string
     */
    private $shortDescription;

    /**
     * @var bool
     */
    private $isCrawlable;

    /**
     * @var array
     * @type SimplePHPYoutubeDownloader\Model\Thumbnail
     */
    private $thumbnails;

    /**
     * @var float
     */
    private $averageRating;

    /**
     * @var bool
     */
    private $allowRating;

    /**
     * @var string
     */
    private $viewCount;

    /**
     * @var string
     */
    private $author;

    /**
     * @var bool
     */
    private $isPrivate;

    /**
     * @var bool
     */
    private $isUnpluggedCorpus;

    /**
     * @var bool
     */
    private $isLiveContent;

    /**
     * @return string
     */
    public function getVideoId(): string
    {
        return $this->videoId;
    }

    /**
     * @param string $videoId
     * @return VideoDetails
     */
    public function setVideoId(?string $videoId): VideoDetails
    {
        $this->videoId = $videoId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return VideoDetails
     */
    public function setTitle(?string $title): VideoDetails
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getLengthSeconds(): string
    {
        return $this->lengthSeconds;
    }

    /**
     * @param string $lengthSeconds
     * @return VideoDetails
     */
    public function setLengthSeconds(?string $lengthSeconds): VideoDetails
    {
        $this->lengthSeconds = $lengthSeconds;
        return $this;
    }

    /**
     * @return array
     */
    public function getKeywords(): array
    {
        return $this->keywords;
    }

    /**
     * @param array $keywords
     * @return VideoDetails
     */
    public function setKeywords(?array $keywords): VideoDetails
    {
        $this->keywords = $keywords;
        return $this;
    }

    /**
     * @return string
     */
    public function getChannelId(): string
    {
        return $this->channelId;
    }

    /**
     * @param string $channelId
     * @return VideoDetails
     */
    public function setChannelId(?string $channelId): VideoDetails
    {
        $this->channelId = $channelId;
        return $this;
    }

    /**
     * @return bool
     */
    public function isOwnerViewing(): bool
    {
        return $this->isOwnerViewing;
    }

    /**
     * @param bool $isOwnerViewing
     * @return VideoDetails
     */
    public function setIsOwnerViewing(?bool $isOwnerViewing): VideoDetails
    {
        $this->isOwnerViewing = $isOwnerViewing;
        return $this;
    }

    /**
     * @return string
     */
    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

    /**
     * @param string $shortDescription
     * @return VideoDetails
     */
    public function setShortDescription(?string $shortDescription): VideoDetails
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCrawlable(): bool
    {
        return $this->isCrawlable;
    }

    /**
     * @param bool $isCrawlable
     * @return VideoDetails
     */
    public function setIsCrawlable(?bool $isCrawlable): VideoDetails
    {
        $this->isCrawlable = $isCrawlable;
        return $this;
    }

    /**
     * @return array
     */
    public function getThumbnails(): array
    {
        return $this->thumbnails;
    }

    /**
     * @param array $thumbnails
     * @return VideoDetails
     */
    public function setThumbnails(?array $thumbnails): VideoDetails
    {
        $this->thumbnails = $thumbnails;
        return $this;
    }

    /**
     * @return float
     */
    public function getAverageRating(): float
    {
        return $this->averageRating;
    }

    /**
     * @param float $averageRating
     * @return VideoDetails
     */
    public function setAverageRating(?float $averageRating): VideoDetails
    {
        $this->averageRating = $averageRating;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAllowRating(): bool
    {
        return $this->allowRating;
    }

    /**
     * @param bool $allowRating
     * @return VideoDetails
     */
    public function setAllowRating(?bool $allowRating): VideoDetails
    {
        $this->allowRating = $allowRating;
        return $this;
    }

    /**
     * @return string
     */
    public function getViewCount(): string
    {
        return $this->viewCount;
    }

    /**
     * @param string $viewCount
     * @return VideoDetails
     */
    public function setViewCount(?string $viewCount): VideoDetails
    {
        $this->viewCount = $viewCount;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return VideoDetails
     */
    public function setAuthor(?string $author): VideoDetails
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPrivate(): bool
    {
        return $this->isPrivate;
    }

    /**
     * @param bool $isPrivate
     * @return VideoDetails
     */
    public function setIsPrivate(?bool $isPrivate): VideoDetails
    {
        $this->isPrivate = $isPrivate;
        return $this;
    }

    /**
     * @return bool
     */
    public function isUnpluggedCorpus(): bool
    {
        return $this->isUnpluggedCorpus;
    }

    /**
     * @param bool $isUnpluggedCorpus
     * @return VideoDetails
     */
    public function setIsUnpluggedCorpus(?bool $isUnpluggedCorpus): VideoDetails
    {
        $this->isUnpluggedCorpus = $isUnpluggedCorpus;
        return $this;
    }

    /**
     * @return bool
     */
    public function isLiveContent(): bool
    {
        return $this->isLiveContent;
    }

    /**
     * @param bool $isLiveContent
     * @return VideoDetails
     */
    public function setIsLiveContent(?bool $isLiveContent): VideoDetails
    {
        $this->isLiveContent = $isLiveContent;
        return $this;
    }

}
