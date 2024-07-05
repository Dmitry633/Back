<?php
declare(strict_types=1);

// $x = 21;
// // $x = 1233321;
// // $x = 12321;
// $text = (string)$x;
// // echo $text[1];
// for($i = 0; $i < strlen($text); $i++){
//     echo 'Массив равен '.$text. "\n";
// echo 'длина массива ' . strlen($text). "\n";
// echo '$i = ' . $i ."\n";
   

//     while ((strlen($text)-1-$i) > $i){//[3-1-0 = 2] > [0]
//                                          //[3-1-1 = 1] > [1]   
//             echo 'для внешнего while ' . strlen($text)-1-$i . "\n";
//             echo 'для внешнего while ' .$i . "\n";
//             var_dump((strlen($text)-1-$i) > $i) . "\n";
//         while ($text[$i] == $text[strlen($text)-1-$i]){
//             // echo $text[strlen($text)-1-$i] . "\n";
//             // echo $text[$i] . "\n";
//             echo strlen($text)-1-$i . "\n";
//             echo $i . "\n";
//             var_dump((strlen($text)-1-$i) > $i) . "\n";
//             if((strlen($text)-1-$i == $i+1) || (strlen($text)-1-$i == $i)) {
//                 echo 'Это полиндром';
//                 return true;
//             continue 2 ;
//             } 
            
//             if ((strlen($text)-1-$i) > $i){ //ПОМЕНЯТЬ УСЛОВИЯ ИФ МЕСТАМИ
//                 $i++;
//                 continue;
//             } 
//             // else {
//             //         echo 'Это не полиндром';
    
//             //         return false;
//             //     continue 2 ;
//             //     }
// /*           
            
//              switch(true){
//                 case (strlen($text)-1-$i == $i+1):
//                     echo 'Это полиндром';
//                     return true;
//                 case (strlen($text)-1-$i) > $i:
//                     $i++;
//                     continue;
//             }
// */
//         }
       
//         echo 'Это не полиндром';
//         return false;
//         $i++;
//         // return false;
        
//         // else{
//         //     echo 'Это не полиндром!';
//         //     $i++;
//         // }
//     }
// }
//     // while((strlen($text)-1-$i) >= $i){
//     //     if ($text[$i] !== $text[strlen($text)-1-$i]){
//     //         // echo 'Это полиндром!';
//     //         $i++;
//     //         continue 2;
//     //     }
//     //     echo 'Goodbye';
//     //     $i++;
//     //     return true;
//     // }

// }

function isPalindrome($x) {
    $text = (string)$x;
    for($i = 0; $i < strlen($text); $i++){
        if (strlen($text) == 1){
            return true;
        }
        while ((strlen($text)-1-$i) > $i){ 
            while ($text[$i] == $text[strlen($text)-1-$i]){
                if((strlen($text)-1-$i == $i+1) || (strlen($text)-1-$i == $i)) {
                    return true;
                    continue 2 ;
                } 
                if ((strlen($text)-1-$i) > $i){
                     $i++;
                    continue;
            } 
        }
        return false;
        $i++;
    }
}

}
echo isPalindrome(12343621);



// function isPalindrome($x) {
//     $text = (string)$x;
//     for($i = 0; $i < strlen($text); $i++){
//         while((strlen($text)-1-$i) >= $i){
//             if ($text[$i] == $text[strlen($text)-1-$i]){
//                 echo 'Это полиндром!';
//                 $i++;
//             }else{
//                 echo 'Это не полиндром!';
//                 $i++;
//             }
            
//         }

// }
// }

// echo isPalindrome(12343321);

// for( $i = 0; $i < 3; ++ $i )
//     {
//         echo ' [', $i, '] ';
//         switch( $i )
//         {
//             case 0: echo 'zero'; break;
//             case 1: echo 'one' ; break 2;
//             case 2: echo 'two' ; break;
//         }
//         echo ' <' , $i, '> ';
//     }
//$x = 1;

// for($i = 0; $i<=2; $i++){
//     echo 'After for '. $i . "\n";
//     while ($i++ < 4){
//         // $i++;

//         if ($x == 1) {
//             // $i++;
//             echo 'Start'. "\n";
//             echo $i. "\n";
//             continue 2;
//             echo 'Finish'. "\n";
            
//         }
       
//         echo 'Out of if'. "\n";
//         // $i++;
//     }
//     echo 'Out of while'. "\n";

//     // $i++;
// }


// for($i = 0; $i<=2; $i++){
//     echo 'After for '. $i . "\n";
//     if ($x == 1) {
//         // $i++;

//         while ($i++ < 4) {
//             // $i++;
//             echo 'Start'. "\n";
//             echo $i. "\n";
//             continue ;
//             echo 'Finish'. "\n";
            
//         }
       
//         echo 'Out of if'. "\n";
//         // $i++;
//     }
//     echo 'Out of while'. "\n";

//     // $i++;
// }
