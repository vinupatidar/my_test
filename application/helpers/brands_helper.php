<?php
 function replace_characters($chaine)
    {
        // On va formater la chaine de caractère
        // On remplace pour ne plus avoir d'accents
        $accents = array('À','�?','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','�?','Î','�?','Ò','Ó','Ô','Õ','Ö','Ù','Ú','Û','Ü','�?','à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ð','ò','ó','ô','õ','ö','ù','ú','û','ü','ý','ÿ','-','œ','Œ');
        $sans = array('A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','O','O','O','O','O','U','U','U','U','Y','a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','o','o','o','o','o','o','u','u','u','u','y','y',' ','oe','Oe');
        $chaine = str_replace($accents, $sans, $chaine); 

         return $chaine;
    }
