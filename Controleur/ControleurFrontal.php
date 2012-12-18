<?php

require 'Controleur/ControleurNews.php';

/**
 * Description of ControleurFrontal
 *
 * @author
 */
class ControleurFrontal extends Controleur {

    private $ctrlNews;

    public function __construct()
    {
        $this->ctrlNews = new ControleurNews();
    }

    public function routerRequete()
    {
        try {
            if (!empty($_GET)) {
                $this->routerRequeteGet();
            }
            else {
                $this->ctrlNews->listerNews();  // action par défaut
            }
        }
        catch (Exception $e) {
            $this->afficherErreur($e->getMessage());
        }
    }

    private function routerRequeteGet()
    {
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'afficherNews') {
                if (isset($_GET['id'])) {
                    $idNews = intval($_GET['id']);
                    if ($idNews != 0)
                        $this->ctrlNews->afficherNews($idNews);
                    else {
                        $id = strip_tags($_GET['id']);
                        throw new Exception("Identifiant de la news '$id' non valide");
                    }
                }
                else
                    throw new Exception("Identifiant de la news non défini");
            }
            else {
                $action = strip_tags($_GET['action']);
                throw new Exception("Action '$action' non valide");
            }
        }
        else
            throw new Exception("Aucune action définie");
    }
}

