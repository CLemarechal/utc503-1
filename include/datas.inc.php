<?php
/**
 * Ouvre un fichier JSON et retourne un tableau
 */
function jsonFileToArray(string $filename){
	$str=file_get_contents($filename);
	return json_decode($str,true);
}
/**
 * Affiche le tableau de données $values
 */
function arrayDump(array $values,?string $title=null):void{
	if($title!=null){
		echo "\n$title\n";
		echo "-----------------------\n";
	}
	foreach($values as $element){
		foreach($element as $name=>$value){
				echo "$name : $value\t";
		}
		echo "\n";
	}
}
/**
 * Ouvre un fichier JSON et retourne un tableau
 * Affiche le tableau de données $values
 */
function loadAndDump(string $filename):array{
	$values=jsonFileToArray($filename);
	arrayDump($values,basename($filename));
	return $values;
}

function getEmployeesByService(array $employees,string $service):array{
	return array_filter($employees,function($emp)use($service) {
		return $emp['service']==$service;}
	);
}


/**
 * Retourne un tableau d'élement filtré satisfaisant une condition $key=$value
 * @param array $array Tableau à filtrer
 * @param string $key nom du champ
 * @param mixed $value valeur de recherche
 * @return array
 */
function where(array $array, string $key, $value):array{
    $result = [];
            foreach ($array as $element) {
                if($element[$key]=== $value){
                    $result[]=$element;
                }
                
            }
            return $result;
}

/**
 * Tableau retournant uniquement $selectFields
 * @param array $array Tableau initial
 * @param array $selectFields Liste des champs selectionner
 * @return array
 */
function select(array $array, array $selectFields):array{
    $result = [];
    foreach ($array as $index=>$element) {
        
       $result[$index]=[];
       foreach ($selectFields as $fieldKey){
           $result[$index][$fieldKey]=$element[$fieldKey];
       }
    }
    return $result;
}

/**
 * @param array $array
 * @param array $selectFields
 * @param array $where
 * @return array
 */
function selectWhere(array $array, array $selectFields, array $where):array{
    
    return select(where($array, $where[0], $where[1]),$selectFields);
}



