<?php

namespace Word;

use Peach\Util\ArrayMap;

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
    private $charList;
    
    /**
     *
     * @var array
     */
    private $consonantList;
    
    public function __construct()
    {
        $this->noteMap       = $this->createNoteMap();
        $this->charList      = $this->noteMap->values();
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
        $index    = array_search("", $noteList);
        unset($noteList[$index]);
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
     * 
     * @return array
     */
    public function getCharList()
    {
        return $this->charList;
    }
    
    /**
     * 
     * @return array
     */
    public function getConsonantList()
    {
        return $this->consonantList;
    }
}
