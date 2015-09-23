<?php

namespace Word;

/**
 * "ん", "っ", "ー" を除く任意のひらがなをあらわすクラスです.
 */
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
    public function __construct(Translator $translator, $char)
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
        $tr = $this->translator;
        switch (rand(0, 11)) {
            case 9:
                return new Sokuon($tr);
            case 10:
                return new LongVowel($tr);
            case 11:
                return new N($tr);
            default:
                $char = $tr->getRandomChar();
                return new Base($tr, $char);
        }
    }
}
