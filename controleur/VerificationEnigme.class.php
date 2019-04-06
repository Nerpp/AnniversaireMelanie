<?php

namespace controleur;

class VerificationEnigme
{

    public function verificationEnigme(string $reponse){
        if ($reponse === "test") {
            return true;
        }
    }
    
}
