<?php

namespace Word;

class N implements Context
{
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
        return "ん";
    }
    
    /**
     * 
     * @return Context
     */
    public function next()
    {
        $tr   = $this->translator;
        $char = $tr->getRandomChar();
        return new Base($tr, $char);
    }
}