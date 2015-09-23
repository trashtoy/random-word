<?php

namespace Word;

/**
 * "ん" をあらわす Context です.
 * "ん" の後ろには "ん", "っ", "ー" を除く任意の文字が続きます.
 */
class N implements Context
{
    private $translator;
    
    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }
    
    /**
     * 文字列 "ん" を返します.
     * 
     * @return string
     */
    public function getChar()
    {
        return "ん";
    }
    
    /**
     * Base オブジェクトを返します.
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