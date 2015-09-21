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
        $v    = $this->translator->getRandomVowel();
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
        $result = $this->translator->getRandomConsonant();
        return in_array(substr($result, 0, 1), $ng) ? $this->getNextConsonant() : $result;
    }
}
