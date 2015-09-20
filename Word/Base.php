<?php

namespace Word;

class Base implements Context
{
    /**
     *
     * @var string
     */
    private $char;
    
    /**
     *
     * @var Translator
     */
    private $translator;
    
    /**
     * 
     * @param Translator $translator
     * @param string $char
     */
    public function __construct(Translator $translator, $char = "")
    {
        $this->translator = $translator;
        $this->char       = $char;
    }
    
    /**
     * 
     * @return string
     */
    public function getChar()
    {
        return $this->char;
    }
    
    /**
     * 
     * @return Context
     */
    public function next()
    {
        switch (rand(0, 11)) {
            case 9:
            case 10:
            case 11:
            default:
                return new Base($this->translator, $this->getNextChar());
        }
    }
    
    /**
     * 
     * @return string
     */
    private function getNextChar()
    {
        $charList = $this->translator->getCharList();
        $count    = count($charList);
        $key      = rand(0, $count - 1);
        return $charList[$key];
    }
}
