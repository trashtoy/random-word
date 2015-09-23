<?php

namespace Word;

/**
 * 長音 (ー) をあらわす Context です.
 * "ー" の後ろには "ー", "っ" を除く任意の文字が後に続きます. ("ん" を含みます)
 */
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
     * 文字列 "ー" を返します.
     * 
     * @return string
     */
    public function getChar()
    {
        return "ー";
    }
    
    /**
     * N または Base を返します.
     * 
     * @return Context
     */
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
