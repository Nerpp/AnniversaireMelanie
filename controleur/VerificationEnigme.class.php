<?php

namespace controleur;

class VerificationEnigme
{
    private $_sVerificationEnigmeErr       = '';

    public function getverificationEnigmeErr()
    {
        return $this->_sVerificationEnigmeErr;
    }


    public function verificationEnigme(string $reponse){

        if (empty($reponse)) {
            $this->_sVerificationEnigmeErr = 'Si tu dis rien je vais y laisser des poils';
            return;
        }

        if ( strtolower($reponse) === "royalcanin") {
            return true;
        }else{
            $this->_sVerificationEnigmeErr = 'Tu peux mieux faire !!!!';
        }
    }
    
}
