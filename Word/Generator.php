<?php

namespace Word;

class Generator
{
    public function generate()
    {
        $charList = $this->getCharList();
        $count    = count($charList);
        $result   = "";
        $bytes    = 0;
        while ($bytes <= 900) {
            $key  = rand(0, $count - 1);
            $next = $charList[$key];
            $bytes += strlen($next);
            $result .= $next;
        }
        return $result;
    }
    
    /**
     * 
     * @return array
     */
    private function getCharList()
    {
        $result = [];
        $ini    = file(__DIR__ . "/char.ini");
        foreach ($ini as $line) {
            $parts = explode("=", $line);
            if (count($parts) < 2) {
                continue;
            }
            $value    = trim($parts[1]);
            $result[] = $value;
        }
        return $result;
    }
}
