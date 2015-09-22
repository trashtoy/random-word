<?php

namespace Word;

class Generator
{
    private $length;
    
    public function __construct($length)
    {
        $this->length = $length;
    }
    
    public function generate()
    {
        $result   = "";
        $bytes    = 0;
        $tr       = new Translator();
        $context  = new Start($tr);
        $max      = $this->length * 3;
        while ($bytes < $max) {
            $context = $context->next();
            $next    = $context->getChar();
            
            $bytes += strlen($next);
            $result .= $next;
        }
        return $result;
    }
}
