<?php

require_once 'Modele/ModeleNews.php';

require_once 'Controleur/Controleur.php';

/**
 * Contrôleur des actions liées aux news
 *
 * @author Baptiste
 */
class ControleurNews extends Controleur
{
    private $modeleNews;
    
    public function __construct()
    {
        $this->modeleNews = new ModeleNews();
    }
    
    public function listerNews()
    {
        $news = $this->modeleNews->lireTout();
        $this->genererVue('listeNews', array('news' => $news));
    }
}

