<?php

namespace module;

class Securite
{
    public function securiteUrl(string $url)
    {
        if ($url) {
            # code...
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return $url;
        }
           
    }
    
}

