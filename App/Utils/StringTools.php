<?php

namespace App\Utils;

class StringTools
{
    /**
     * Méthode pour Supprimer les balises + les caractères spéciaux, suppression des espaces
     * @param string $value la chaine à nettoyer
     * @return string chaine néttoyer 
     */
    public static function sanitize(string $value): string
    {

        return htmlspecialchars(strip_tags(trim($value)), ENT_NOQUOTES);
    }

    /**
     * Méthode pour sanitize un tableau
     * @param array $data 
     * @return array $data retourne le tableau sanitize
     */
    public static function sanitize_array(array $data): array
    {
        //Boucle pour itérer sur le tableau $data
        foreach ($data as $key => $value) {
            //Test si la valeur est de type string
            if (gettype($value) == "string") {
                $data[$key] = self::sanitize($value);
            }
            //Test si $value est un tableau
            if (gettype($value) == "array") {
                //nettoyage du sous tableau
                foreach ($value as $cle => $contenu) {
                    $data[$key][$cle] = self::sanitize($contenu);
                }
            }
        }
        return $data;
    }
    /**
     * Méthode qui retourne l'extension d'un fichier
     * @param string $file nom du fichier
     * @return string extension du fichier
     */
    public static function getFileExtension($file)
    {
        return substr(strrchr($file, '.'), 1);
    }

    /**
     * Méthode qui convertie une chaine de caractéres en UTF-8
     * @param string $str chaine à encoder en UTF8
     * @return string $str chaine encodée en UTF8
    * */
    public static function utf8Encode(string $str): string
    {

        return mb_convert_encoding(
            $str,
            "UTF-8",
            mb_detect_encoding($str)
        );
    }
}
