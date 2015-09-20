<?php

namespace Word;

class LongVowel implements Context
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
        return "ー";
    }

    public function next()
    {
        $tr = $this->translator;
        switch (rand(0, 7)) {
            case 7:
                return new N($tr);
            default:
                $char = $tr->getRandomChar();
                return new Base($tr, $char);
        }
    }
}
