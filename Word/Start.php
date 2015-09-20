<?php

namespace Word;

class Start implements Context
{
    /**
     *
     * @var Translator
     */
    private $translator;
    
    /**
     * 
     * @param Translator $translator
     */
    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }
    
    public function getChar()
    {
        return "";
    }

    public function next()
    {
        $tr   = $this->translator;
        $char = $tr->getRandomChar();
        return new Base($tr, $char);
    }
}
