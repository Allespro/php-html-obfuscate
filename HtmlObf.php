<?php
namespace HidedHtml;
class Obfuscator {
    protected string $encoding;
    function __construct($encoding = 'UTF-8') {
	   $this->encoding = $encoding;
    }
    private static function __refreshRandom() {
        srand(random_int(0, 9999999) % time());
    }
    private function __splitAtRandom($str)  {
        $this::__refreshRandom();
        $length = mb_strlen($str, encoding: $this->encoding);
        $randomIndex = rand(0, $length - 1);
        $firstPart = mb_substr($str, 0, $randomIndex, encoding: $this->encoding);
        $secondPart = mb_substr($str, $randomIndex, encoding: $this->encoding);
        return [$firstPart, $secondPart];
    }
    private function __randomString($length = 10) {
        $this::__refreshRandom();
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = mb_strlen($characters, encoding: $this->encoding);
        $randomString = '';
        for ($i = 0; $i < $length; $i++)
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        return $randomString;
    }
    private function __splitStringRandomLength($string) {
        $this::__refreshRandom();
        $array = mb_str_split($string, encoding: $this->encoding);
        $result = [];
        while (count($array) > 0) {
            $this::__refreshRandom();
            $length = rand(1, count($array));
            $result[] = implode(array_splice($array, 0, $length));
        }
        return $result;
    }
    private function __randomCss($firstPart, $secondPart) {
        $class = $this->__randomString();
        $template = "<style>.$class::before {content:\"$firstPart\"} .$class::after {content:\"$secondPart\"}</style>";
        return "$template<span class=\"$class\"></span>";
    }
    public function obf($text) {
        $ret = "";
        $splitted = $this->__splitStringRandomLength($text);
        foreach ($splitted as $text_part) {
            $ret .= $this->__randomCss(...$this->__splitAtRandom($text_part));
        }
        return $ret;
    }
}