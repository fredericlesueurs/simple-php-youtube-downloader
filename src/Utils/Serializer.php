<?php


namespace SimplePHPYoutubeDownloader\Utils;


use DocBlockReader\Reader;
use ReflectionClass;
use ReflectionException;
use SimplePHPYoutubeDownloader\Model\VideoDetails;

class Serializer
{

    /**
     * @param array $array
     * @param string $classname
     * @return mixed
     * @throws ReflectionException
     * @throws \Exception
     */
    public static function arrayToObject(array $array, string $classname)
    {
        $object = new $classname();
        try {
            $class = new ReflectionClass($classname);
        } catch (ReflectionException $e) {
            throw new ReflectionException('Error when unsterilized the class: ' . $classname, 1, $e);
        }
        foreach ($array as $key => $champ) {
            if (preg_match_all('/_([a-zA-Z])/', $key, $matches)) {
                foreach ($matches as $result) {
                    $key = preg_replace('/(_[a-zA-Z])/', strtoupper($result[0]), $key);
                }
            }

            if (method_exists($object, 'set' . ucfirst($key))) {
                if (is_array($champ) && self::isAssoc($champ)) {
                    $reader = new Reader($classname, $key, 'property');
                    $classnameWithNamespace = $reader->getParameter('type');
                    $classnameChamp = ucfirst($key);
                    $childObject = self::arrayToObject($champ, $classnameWithNamespace);
                    $methodToInvoke = $class->getMethod('set' . $classnameChamp);
                    $methodToInvoke->invoke($object, $childObject);
                } else if (is_array($champ)) {
                    $arrayOfChamp = array();
                    $reader = new Reader($classname, $key, 'property');
                    $classnameWithNamespace = $reader->getParameter('type');
                    foreach ($champ as $valueofChamp) {
                        if (is_array($valueofChamp)) {
                            array_push($arrayOfChamp, self::arrayToObject($valueofChamp, $classnameWithNamespace));
                        } else {
                            array_push($arrayOfChamp, $valueofChamp);
                        }
                    }
                    $classnameChamp = ucfirst($key);
                    $methodToInvoke = $class->getMethod('set' . $classnameChamp);
                    $methodToInvoke->invoke($object, $arrayOfChamp);
                } else {
                    $methodChamp = ucfirst($key);
                    $methodToInvoke = $class->getMethod('set' . $methodChamp);
                    $methodToInvoke->invoke($object, $champ);
                }
            }
        }
        return $object;
    }

    private static function isAssoc(array $array): bool
    {
        return array_keys($array) !== range(0, count($array) - 1);
    }

}
