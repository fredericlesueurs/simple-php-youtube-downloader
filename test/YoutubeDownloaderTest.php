<?php


use PHPUnit\Framework\TestCase;
use SimplePHPYoutubeDownloader\Model\VideoPackage;
use SimplePHPYoutubeDownloader\YoutubeDownloader;

class YoutubeDownloaderTest extends TestCase
{

    public function test_simplify_thumbnail_array() {
        $youtubeDownloader = new YoutubeDownloader();

        $thumbnailArray = [
            'thumbnail' => [
                'thumbnails' => [
                    ['url' => 'url'],
                    ['url' => 'test'],
                    ['url' => 'fred']
                ]]];

        $thumbnailArraySimplyfied = $youtubeDownloader->simplifyThumbnailArray($thumbnailArray);

        $this->assertEquals(['thumbnails' => [
            ['url' => 'url'],
            ['url' => 'test'],
            ['url' => 'fred']
        ]], $thumbnailArraySimplyfied);
    }

    public function test_decode_url() {
        $youtubeDownloader = new YoutubeDownloader();

        $item = [  'itag'=> 43,
            'mimeType'=> 'video/webm; codecs="vp8.0, vorbis"',
            'bitrate'=> 2147483647,
            'width'=> 640,
            'height'=> 360,
            'lastModified'=> '1558120418494619',
            'contentLength'=> '53128069',
            'quality'=> 'medium',
            'qualityLabel'=> '360p',
            'projectionType'=> 'RECTANGULAR',
            'audioQuality'=> 'AUDIO_QUALITY_MEDIUM',
            'cipher'=> 'url=https%3A%2F%2Fr3---sn-aigl6ney.googlevideo.com%2Fvideoplayback%3Fexpire%3D1579665064%26ei%3DSHInXtK8GoKhV46ao5AP%26ip%3D185.125.226.44%26id%3Dcd90bf2ca9fd1bfe%26itag%3D43%26source%3Dyoutube%26requiressl%3Dyes%26mm%3D31%252C29%26mn%3Dsn-aigl6ney%252Csn-aigzrn7s%26ms%3Dau%252Crdu%26mv%3Dm%26mvi%3D2%26pl%3D24%26initcwndbps%3D6981250%26vprv%3D1%26mime%3Dvideo%252Fwebm%26gir%3Dyes%26clen%3D53128069%26ratebypass%3Dyes%26dur%3D0.000%26lmt%3D1558120418494619%26mt%3D1579643379%26fvip%3D3%26fexp%3D23842630%26c%3DWEB%26txp%3D5411222%26sparams%3Dexpire%252Cei%252Cip%252Cid%252Citag%252Csource%252Crequiressl%252Cvprv%252Cmime%252Cgir%252Cclen%252Cratebypass%252Cdur%252Clmt%26lsparams%3Dmm%252Cmn%252Cms%252Cmv%252Cmvi%252Cpl%252Cinitcwndbps%26lsig%3DAHylml4wRgIhANaQdUwkezmgtN1_VLz19oP-0QSmL6knDZEo-3LiFji2AiEA9CyAyr0y5Bkj1Rp4A9M6b8ldMXzkPMxLJCy3FLHqp_0%253D&sp=sig&s=ALgALgxI2wwRgIhALYHpEduEOfgOGjujK40lLL7Ou6UrHB8DhJZEIKTFAhrAiEAxjmUi7WYYk4Te1333BNt2_2EI%3DiPv4Dnwrvqc-UogDo%3DUo%3DS',
        ];

        $url = $youtubeDownloader->decodeUrl($item, file_get_contents('assets/js_code'));

        $this->assertEquals(
            'https://r3---sn-aigl6ney.googlevideo.com/videoplayback?expire=1579665064&ei=SHInXtK8GoKhV46ao5AP&ip=185.125.226.44&id=cd90bf2ca9fd1bfe&itag=43&source=youtube&requiressl=yes&mm=31%2C29&mn=sn-aigl6ney%2Csn-aigzrn7s&ms=au%2Crdu&mv=m&mvi=2&pl=24&initcwndbps=6981250&vprv=1&mime=video%2Fwebm&gir=yes&clen=53128069&ratebypass=yes&dur=0.000&lmt=1558120418494619&mt=1579643379&fvip=3&fexp=23842630&c=WEB&txp=5411222&sparams=expire%2Cei%2Cip%2Cid%2Citag%2Csource%2Crequiressl%2Cvprv%2Cmime%2Cgir%2Cclen%2Cratebypass%2Cdur%2Clmt&lsparams=mm%2Cmn%2Cms%2Cmv%2Cmvi%2Cpl%2Cinitcwndbps&lsig=AHylml4wRgIhANaQdUwkezmgtN1_VLz19oP-0QSmL6knDZEo-3LiFji2AiEA9CyAyr0y5Bkj1Rp4A9M6b8ldMXzkPMxLJCy3FLHqp_0%3D&sig=ALgxI2wwRgIhALYHpEduEOfgOGjujK40lLL7Ou6IrHB8DhJZEIKTFAhrAiEAxjmUi7WYYk4Te1333BNt2_2ESUiPv4Dnwrvqc-UogDo=',
            $url);
    }

    public function test_get_youtube_video() {
        $youtubedownloader= new YoutubeDownloader();

        $this->assertInstanceOf(
            VideoPackage::class,
            $youtubedownloader->getYoutubeVideo('https://www.youtube.com/watch?v=zZC_LKn9G_4'));
    }
}
