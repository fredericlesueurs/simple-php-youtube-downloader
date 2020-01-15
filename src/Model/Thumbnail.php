<?php


namespace SimplePHPYoutubeDownloader\Model;


class Thumbnail
{

    /**
     * @var string
     */
    private $url;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Thumbnail
     */
    public function setUrl(string $url): Thumbnail
    {
        $this->url = $url;
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
     * @return Thumbnail
     */
    public function setWidth(int $width): Thumbnail
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
     * @return Thumbnail
     */
    public function setHeight(int $height): Thumbnail
    {
        $this->height = $height;
        return $this;
    }

}
