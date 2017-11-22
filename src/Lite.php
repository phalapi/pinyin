<?php
namespace PhalApi\Pinyin;

/**
 * 拼音扩展，基于overtrue/pinyin实现
 *
 * @see https://github.com/phalapi/pinyin
 * @author: dogstar 2017-11-22
 */

use Overtrue\Pinyin\Pinyin;

class Lite {

    protected $pinyin;

    public function __construct() {
        $this->pinyin = new Pinyin();
    }

    public function convert($string, $option = Pinyin::NONE) {
        return $this->pinyin->convert($string, $option);
    }

    public function name($stringName, $option = Pinyin::NONE) {
        return $this->pinyin->name($stringName, $option);
    }

    public function permalink($string, $delimiter = '-') {
        return $this->pinyin->permalink($string, $delimiter);
    }

    public function abbr($string, $delimiter = '') {
        return $this->pinyin->abbr($string, $delimiter);
    }

    public function phrase($string, $delimiter = ' ', $option = Pinyin::NONE) {
        return $this->pinyin->phrase($string, $delimiter, $option);
    }

    public function sentence($sentence, $withTone = false) {
        return $this->pinyin->sentence($sentence, $withTone);
    }
}
