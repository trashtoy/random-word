<?php

namespace Word;

use Peach\Util\ArrayMap;

/**
 * 発音 (ローマ字) をひらがなに変換するクラスです.
 * ランダムな文字, 子音, 母音を生成する機能も持ちます.
 */
class Translator
{
    /**
     *
     * @var ArrayMap
     */
    private $noteMap;
    
    /**
     *
     * @var array
     */
    private $consonantList;
    
    public function __construct()
    {
        $this->noteMap       = $this->createNoteMap();
        $this->consonantList = $this->createConsonantList($this->noteMap);
    }
    
    /**
     * 
     * @return ArrayMap
     */
    private function createNoteMap()
    {
        $result = new ArrayMap();
        $ini    = file(__DIR__ . "/char.ini");
        foreach ($ini as $line) {
            $parts = explode("=", $line);
            if (count($parts) < 2) {
                continue;
            }
            $key      = trim($parts[0]);
            $value    = trim($parts[1]);
            $result->put($key, $value);
        }
        return $result;
    }
    
    /**
     * 子音の一覧を返します.
     * 
     * @return array
     */
    private function createConsonantList(ArrayMap $noteMap)
    {
        $func = function ($note) {
            return preg_replace("/a|i|u|e|o/", "", $note);
        };
        $noteList = array_unique(array_map($func, $noteMap->keys()));
        return array_values($noteList);
    }
    
    /**
     * 指定された発音 (アルファベット) をひらがなに変換します.
     * 存在しない場合は空文字列を返します.
     * 
     * @param string $note
     */
    public function translate($note)
    {
        return $this->noteMap->get($note, "");
    }
    
    /**
     * "っ", "ん", "ー" 以外のランダム文字を返します.
     * 
     * @return string
     */
    public function getRandomChar()
    {
        $note  = $this->getRandomConsonant() . $this->getRandomVowel();
        $map   = $this->noteMap;
        return $map->containsKey($note) ? $map->get($note) : $this->getRandomChar();
    }
    
    /**
     * ランダムな母音 ("a", "i", "u", "e", "o") を返します.
     */
    public function getRandomVowel()
    {
        $vowels = ["a", "i", "u", "e", "o"];
        $key    = rand(0, 4);
        return $vowels[$key];
    }
    
    /**
     * ランダムな子音 ("s", "k" など) を返します.
     */
    public function getRandomConsonant()
    {
        $cl    = $this->consonantList;
        $count = count($cl);
        $key   = rand(0, $count - 1);
        $cons  = $cl[$key];
        
        $isMinor = in_array(substr($cons, 1, 1), ["y", "w"], true);
        if ($isMinor) {
            return (rand(0, 9) === 0) ? $cons : substr($cons, 0, 1);
        } else {
            return $cons;
        }
    }
}
