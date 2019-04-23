<?php
namespace module;

class Routeur
{

    //attributs
    private $_Parametres = [];
    private $_ValeursVue = [];
    private $_Vue = 'accueil';


    private $_Routes = [
        'accueil' => [
            'page'  => 'accueil',
            'vue'   => 'accueil'
        ],
        'verificationReponse'=>[
            'page' => 'verificationReponse',
            'vue'  => 'reponse'
        ]
    ];

    //J'initialise la construction du tableau dont ma classe va avoir besoin
    public function __construct(array $tabParametres = null)
    {
        // Si des paramètres ont été transmis
        if (!is_null($tabParametres)) {
            $this->_Parametres = $tabParametres;
        }
    }

    // je récupére les parametres 
    public function getParametre($nomParametre)
    {
        return isset($this->_Parametres[$nomParametre]) ? $this->_Parametres[$nomParametre] : null;
    }

    // les parametres ont été construit dans le tableau
    public function getParametres()
    {
        return $this->_Parametres;
    }
    
    // je construit les routes
    public function getRoute($page)
    {
        return (!is_null($page) && isset($this->_Routes[$page])) ? $this->_Routes[$page] : null;
    }

    // je reagit aux tableau en 2D cobstruit
    public function resolutionRoute()
    {
        
            $tabRoute = [
                'vue'     => $this->_Vue,
                'valeurs' => $this->_ValeursVue
            ];

           

            $route = $this->getRoute($this->getParametre('page'));
            switch ($route['page']) {

                case 'accueil':
                $tabRoute['vue'] = $route['vue'];
                        break;

                case 'verificationReponse':
                $verification = new \controleur\VerificationEnigme();
                // je recupere le parametre du formulaire par le this parametre
                if($verification->verificationEnigme($this->getParametre('tentativeReponse'))){
                    $tabRoute['vue'] = 'reponse';
                }else{
                    $tabRoute['valeurs']['EnigmeErr'] = $verification->getverificationEnigmeErr();
                }
               
                    break;

            }
            return $tabRoute;

       
    }
}//fin de la classe
