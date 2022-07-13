<?php 
function crop($perhase,$cstring){
    for($i=0;$i<=strlen($cstring)-1;$i++){
       
        for($j=0;$j<=strlen($perhase)-1;$j++){
            if($cstring[$i]==$perhase[$j]){
                    echo "i:-".$i;
                    echo "j:-".$j;

            }


        }
    }




}




crop('abdoredaeid','eid');
