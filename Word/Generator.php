<?php

namespace Word;

class Generator
{
    public function generate()
    {
        $result   = "";
        $bytes    = 0;
        $context  = new Base(new Translator());
        while ($bytes <= 900) {
            $context = $context->next();
            $next    = $context->getChar();
            
            $bytes += strlen($next);
            $result .= $next;
        }
        return $result;
    }
}
