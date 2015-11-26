<?php

/**
 * Class ExtendTextUtil
 */
class etu
{

    /**
     * Автозамена email
     * @param $text
     * @return mixed
     */
    public static function replaceEmail($text)
    {
        return preg_replace("/([a-z0-9_\.\-])+\@(([a-z0-9\-])+\.)+([a-z0-9]{2,4})+/i",
            '<a href="mailto:$0">$0</a>', $text);
    }

    /**
     * Автозамена URL
     * @param $text
     * @return mixed
     */
    public static function replaceUrl($text)
    {
        return preg_replace("#http://([A-z0-9./-]+)#", '<a href="$0">$0</a>', $text);
    }


    /**
     * Обрещаем текст по длине
     * @param $text
     * @param int $length
     * @param string $end
     * @return string
     */
    public static function truncateText($text,  $length=100, $end='...')
    {
        if(strlen($text)>$length) {
            $text = substr($text,0,$length).$end;
        }
        return $text;
    }


    /**
     * Вырезаем картинки
     * @param $text
     * @return mixed
     */
    public static function stripImages($text)
    {
        $text = preg_replace('/(<a[^>]*>)(<img[^>]+alt=")([^"]*)("[^>]*>)(<\/a>)/i', '$1$3$5<br />', $text);
        $text = preg_replace('/(<img[^>]+alt=")([^"]*)("[^>]*>)/i', '$2<br />', $text);
        $text = preg_replace('/<img[^>]*>/i', '', $text);
        return $text;
    }


    /**
     * Вырезаем скрипты
     * @param $text
     * @return mixed
     */
    public static function stripScripts($text)
    {
        return preg_replace('/(<link[^>]+rel="[^"]*stylesheet"[^>]*>|<img[^>]*>|style="[^"]*")|<script[^>]*>.*?<\/script>|<style[^>]*>.*?<\/style>|<!--.*?-->/i', '', $text);
    }



    /**
     * Преобразуем строку в slug
     * @param $text
     * @return string
     */
    public static function toSlug($text)
    {
        $text = strtolower($text);
        $text = trim($text);
        $text = str_replace(array('-', ' ', '&'), array('_', '-', 'and'), $text);
        return urlencode($text);
    }


    /**
     * Убираем теги конструкции <X></X>
     * @param $text
     * @param $tags
     * @return mixed
     */
    public static function stripTags($text,$tags)
    {
        if(!is_array($tags)){
            $tags = array($tags);
        }

        foreach($tags as $tag) {
            $text = preg_replace('/<' . $tag. '\b[^>]*>/i', '', $text);
            $text = preg_replace('/<\/' . $tag . '[^>]*>/i', '', $text);
        }

        return $text;
    }

    /**
     * Преобразуем теги для отображения на странице
     * @param $text
     * @return mixed
     */
    public function html($text)
    {
        $patterns = array("/\&/", "/%/", "/</", "/>/", '/"/', "/'/", "/\(/", "/\)/", "/\+/", "/-/");
        $replacements = array("&amp;", "&#37;", "&lt;", "&gt;", "&quot;", "&#39;", "&#40;", "&#41;", "&#43;", "&#45;");
        $string = preg_replace($patterns, $replacements, $text);
        return $string;
    }

}

