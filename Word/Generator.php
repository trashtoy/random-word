<?php

namespace Word;

class Generator
{
    public function generate()
    {
        $result   = "";
        $bytes    = 0;
        $tr       = new Translator();
        $context  = new Start($tr);
        while ($bytes <= 900) {
            $context = $context->next();
            $next    = $context->getChar();
            
            $bytes += strlen($next);
            $result .= $next;
        }
        return $result;
    }
}
