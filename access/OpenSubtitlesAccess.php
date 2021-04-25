<?php


final class OpenSubtitlesAccess
{

    private $url = "http://rest.opensubtitles.org/search/episode-20/imdbid-4145054/moviebytesize-750005572/moviehash-319b23c54e9cf314/season-2/sublanguageid-eng";
    private $agent = 'TemporaryUserAgent';

    public function getSubs()
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, $this->agent);
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

        if(curl_exec($ch) === false)
        {
            echo 'Curl error: ' . curl_error($ch);
        }
        else
        {
            echo "Operation completed without any errors\n";
        }

        curl_close($ch);

        $formattedResults = $this->prettify($result);
        echo $formattedResults;
    }

    private function prettify($json)
    {
        $array = json_decode($json, true);
        return json_encode($array, JSON_PRETTY_PRINT);
    }
}