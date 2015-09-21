<?php

namespace Word;

class Sokuon implements Context
{
    /**
     *
     * @var Translator
     */
    private $translator;
    
    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }
    
    /**
     * 
     * @return string
     */
    public function getChar()
    {
        return "っ";
    }
    
    /**
     * 
     * @return Context
     */
    public function next()
    {
        $char = $this->getNextChar();
        return new Base($this->translator, $char);
    }
    
    /**
     * 
     * @return string
     */
    private function getNextChar()
    {
        $c    = $this->getNextConsonant();
        $v    = $this->getNextVowel();
        $char = $this->translator->translate($c . $v);
        return ($char === "") ? $this->getNextChar() : $char;
    }
    
    /**
     * 
     * @return string
     */
    private function getNextConsonant()
    {
        $ng     = ["", "n", "m", "y", "r", "w"];
        $cl     = $this->translator->getConsonantList();
        $key    = rand(0, count($cl) - 1);
        $result = $cl[$key];
        return in_array(substr($result, 0, 1), $ng) ? $this->getNextConsonant() : $result;
    }
    
    /**
     * 
     * @return string
     */
    private function getNextVowel()
    {
        $vowels = ["a", "i", "u", "e", "o"];
        $key    = rand(0, 4);
        return $vowels[$key];
    }
}
