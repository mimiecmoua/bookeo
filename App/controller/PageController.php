<?php

namespace App\Controller;

class PageController extends Controller
{
    public function route(): void
    {
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'about':
                    //appeler la méthode about ()
                    $this->about();
                    break;
                case 'home':
                    //charger controller home
                    var_dump('On appel la méthode home');
                    break;
                default:
                    //Erreur
                    break;
            }
        } else {
            //Charger la page d'accueil
        }
    }

    protected function about()
    {

        $this->render('page/about', [
            'test' => 'abc',
            'test2' => 'abc2',
        ]);
    }
}
