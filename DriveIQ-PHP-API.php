<?php



$url = "https://api.publicapis.org/entries" ; 

//Call API to get data
$data=json_decode(file_get_contents($url),false);



//Create function doing task 
/*
    Input : Category and Limit argv[1] argv[2] ; 
    Algo : Loop by filter and return valid value
    Output: Print the result with match Category an amount = limit  
*/

    $counter = 0 ; 
    $filteredData = [] ; 

    for ($i=0; $i < count($data->entries); $i++) { 
        if($counter <= $argv[2]) {
            if(strcmp($data->entries[$i]->Category,$argv[1]) == 0)
            {   
                array_push($filteredData , $data->entries[$i]);    
                print_r($counter);
            }
        }   
    }
    usort($filteredData , function($a, $b) {return strcmp($a->API, $b->API);});
    print_r($filteredData);
 
    // $filteredItems = array_filter($data->entries, function($item) use($counter , $limit , $category ) {
    //     print_r($counter);
    //     if($counter <= $limit) {
    //         print_r($counter);
    //         if(strcmp($item->Category,$category) == 0)
    //         {       
    //             $counter++ ; 
    //             return $item ;
    //         }
    //     }   
    // });
    // print_r(count($filteredItems));



// print_r($argv) ;
    

?>