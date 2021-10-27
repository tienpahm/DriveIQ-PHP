<?php
/*
Creator : Tien Pham
Purpose : Display the items that match the category and limit
Version : 1.0.0 
*/




//Try to catch error
if($argc != 3 ) {
    exit("Please enter category and limit") ; 
} ;


if(intval($argv[2]) == 0) {
    exit("limit must be a number greater than 0");
}
//Create category list 
$categoryList = array("Animals" , "Anime" , "Blockchain", "Books", "Business","Calendar","Weather","Transportation","Health","Jobs","Music");

function isCategory() {
    global $categoryList;
    global $argv;
    foreach($categoryList as $item){
        if(strcmp(strtolower($item) ,strtolower($argv[1]) ) == 0) {
            return true ;
        }
    }
    return false ; 
}

if(!isCategory()){
    exit("No result");
}




//If input accepted
print_r("Application is running...");

try{

    //Call API to get data
    $url = "https://api.publicapis.org/entries" ; 
    $data=json_decode(file_get_contents($url),false);

}catch(Exception $e){
    print_r($e->getMessage());
    exit();
}




//Create function doing task 
/*
    Input : Category and Limit argv[1] argv[2] ; 
    Algo : Loop by filter and return valid value
    Output: Print the result with match Category an amount = limit  
*/
function getFilterData(){
    $counter = 0 ; 
    $filteredData = [] ;
    global $data ; 
    global $argv ;
    for ($i=0; $i < count($data->entries); $i++) { 
        if($counter <= $argv[2] ) {
            if(strcmp(strtolower($data->entries[$i]->Category),strtolower($argv[1])) == 0)
            {   
                array_push($filteredData , $data->entries[$i]);    
                $counter++ ;
            }
        }   
    }
    return $filteredData;
}

    $filteredData = getFilterData() ; 

    if(count($filteredData) == 0) {
        print_r("No result");
    } else {
        usort($filteredData , function($a, $b) {return strcmp(strtolower($a->API), strtolower($b->API));});
        print_r($filteredData);
    }
    
    

?>