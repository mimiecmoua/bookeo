<?php

namespace App\Controller;

class Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['controller'])) {
                switch ($_GET['controller']) {
                    case 'page':
                        //charger controleur page
                        $pageController = new PageController();
                        $pageController->route();
                        break;
                    case 'book':
                        //charger controller book
                        $pageController = new BookController();
                        $pageController->route();
                        break;
                    default:
                        throw new \Exception("Le controleur n'existe pas");
                        break;
                }
            } else {
                //Chargement de la page si pas de controleur dans l'url
                $pageController = new PageController();
                $pageController->home();
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }
    protected function render(string $path, array $params = []): void
    {
        $filePath = _ROOTPATH_ . '/templates/' . $path . '.php';
        try {
            if (!file_exists($filePath)) {
                throw new \Exception("Fichier non introuvé" . $filePath);
            } else {
                extract($params);
                require_once $filePath;
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }

        //require_once _ROOTPATH_ . '/templates/page/about.php';
    }
}
