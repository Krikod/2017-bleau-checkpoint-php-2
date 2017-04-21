<?php

namespace CommitStripBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($nbcard)
    {
        // Connexion BDD
        $em = $this->getDoctrine()->getManager();

        // On récupère la card selectionné
        $selectedCard = $em->getRepository('CommitStripBundle:Card')->findOneBy(array(
            'nbcard' => $nbcard
        ));

        // On récupère la card précédente
        $previousCard = $em->getRepository('CommitStripBundle:Card')->findOneBy(array(
            'nbcard' => $nbcard - 1
        ));

        // On récupère la card suivante
        $nextCard = $em->getRepository('CommitStripBundle:Card')->findOneBy(array(
            'nbcard' => $nbcard + 1
        ));

        // On revoie tout à la vue
        return $this->render('CommitStripBundle:Default:index.html.twig', array(
            'selectedCard' => $selectedCard,
            'previousCard' => $previousCard,
            'nextCard' => $nextCard,
        ));
    }
}
