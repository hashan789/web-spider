<?php
function crawl_page($url,$depth=2)
{
    if($depth>0)
    {
        $html = file_get_contents($url);
        preg_match_all('~<a.*?href="(.*?)".*?>~',$html,$matches);
        foreach($matches[1] as $newurl)
        {
            if($newurl == 'https://express.co.uk'){
                crawl_page($newurl,$depth-1);
                file_put_contents('index.html',"\n\n".$html."\n\n",FILE_APPEND);
                echo "your page has been crawled successfully.Now you can go to <a href='localhost/wolfoo2022/iframe.html'>Web crawled page</a>.";
            }
        }
    }
}
crawl_page('https://express.co.uk/',2);