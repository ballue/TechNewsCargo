<?php
namespace Application\Models\Configuration;

/**
 * Les traits sont un mécanisme de réutilisation de code dans un langage 
 * à héritage simple tel que PHP. Un trait tente de réduire certaines limites 
 * de l'héritage simple, en autorisant le développeur à réutiliser un certain 
 * nombre de méthodes dans des classes indépendantes. 
 * 
 * La sémantique entre les classes et les traits réduit la complexité et 
 * évite les problèmes typiques de l'héritage multiple et des Mixins
 * 
 * Un trait est semblable à une classe, mais il ne sert qu'à grouper 
 * des fonctionnalités d'une manière intéressante. 
 * Il n'est pas possible d'instancier un Trait en lui-même. 
 * C'est un ajout à l'héritage traditionnel, qui autorise la composition 
 * horizontale de comportements, c'est à dire l'utilisation de méthodes 
 * de classe sans besoin d'héritage.
 * 
 * @author Hugo LIEGEARD
 *
 */

trait Shortcut
{
    /**
     * Créer un SLUG à partir du Titre d'un Article
     * http://stackoverflow.com/questions/2955251/php-function-to-make-slug-url-string
     */
    public function generateSlug($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        
        // trim
        $text = trim($text, '-');
        
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        
        // lowercase
        $text = strtolower($text);
        
        if (empty($text)) {
            return 'n-a';
        }
        
        return $text;
    }
}

