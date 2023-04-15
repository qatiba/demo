<?php 
$url = "https://ensany.com/ar";
$contents = file_get_contents($url,true);

// $contents = Strip_tags($contents);
$str = explode('التصنيفات',$contents);
$contents = NULL ;//for memorys
$str = str_replace('<','',$str); // from $str[1] we can get http url by ahref
$str[1] = explode('h2',$str[1]);
$cata = array();
$link_cata =array();
$url_key = array();


    $cata[0] =  str_replace(['>','/'],'',$str[1][2]) ;
    $cata[1] =  str_replace(['>','/'],'',$str[1][8]) ;
    $cata[2] =  str_replace(['>','/'],'',$str[1][12]) ;
    $cata[3] =  str_replace(['>','/'],'',$str[1][16]) ;
    $cata[4] =  str_replace(['>','/'],'',$str[1][20]) ;
    $cata[5] =  str_replace(['>','/'],'',$str[1][24]) ;

$link_cata[0] = explode('f="',str_replace('>','',$str[1][5])) ;
$link_cata[0] = explode('class',$link_cata[0][1]) ;
$url_key[0]=str_replace('"','',$link_cata[0][0]); //health catagory link url

$link_cata[1] = explode('f="',str_replace('>','',$str[1][9])) ;
$link_cata[1] = explode('class',$link_cata[1][1]) ;
$url_key[1]=str_replace('"','',$link_cata[1][0]); // orphans1 catagory link url 

$link_cata[2] = explode('f="',str_replace('>','',$str[1][13])) ;
$link_cata[2] = explode('class',$link_cata[2][1]) ;
$url_key[2]=str_replace('"','',$link_cata[2][0]); // food-water catagory link url

$link_cata[3] = explode('f="',str_replace('>','',$str[1][17])) ;
$link_cata[3] = explode('class',$link_cata[3][1]) ;
$url_key[3]=str_replace('"','',$link_cata[3][0]); // education catagory link url

$link_cata[4] = explode('f="',str_replace('>','',$str[1][21])) ;
$link_cata[4] = explode('class',$link_cata[4][1]) ;
$url_key[4]=str_replace('"','',$link_cata[4][0]); // /waqf-quran-project  catagory link url

$link_cata[5] = explode('f="',str_replace('>','',$str[1][25])) ;
$link_cata[5] = explode('class',$link_cata[5][1]) ;
$url_key[5]=str_replace('"','',$link_cata[5][0]); // /ramadan-zakat-916  catagory link url

    #here the main values 
    # $url_key for urls 
    # $cata for name catagoryes 
    // echo '<pre>';
    // var_dump($url_key);
    // echo '</pre>';

// ################ take main info done here 

    //##################################### other part of slases ###########

    function slice_catagory($url){
        #$name_comp = the name of campan
        #$per_comp = the peresint of compan
        #gol_comp = the total of campan get and need
        $name_comp = array();
        $per_comp = array();
        $gol_comp = array();
        $url_comp = array();
        $temp;
        $content = file_get_contents($url,true);
        $content_n = explode('prt-link-detail',$content);
        for ($i=0; $i <32 ; $i++) { 
               $ajaxs[$i] = str_replace(['<','>'],'',$content_n[$i+1]); // this is the key [index]
        $temp[$i] = explode('/a',$ajaxs[$i]);
        $name_comp[$i] = $temp[$i][0];
        }

        $content_per = explode('tool-per',$content);
        for ($i=0; $i <32 ; $i++) { 
            $ajaxs[$i] = str_replace(['<','>'],'',$content_per[$i+1]); // this is the key [index]
     $temp[$i] = explode('/p',$ajaxs[$i]);
     $per_comp[$i] = $temp[$i][0];
     }
     $temp_gol = str_replace('strong','#',$content);
     $content_gol = explode('<#>',$temp_gol);
     
     for ($i=0; $i <64 ; $i++) { 
        $ajaxs[$i] = str_replace(['<','>'],'',$content_gol[$i+1]); // this is the key [index]
 $temp[$i] = explode('/#',$ajaxs[$i]);
 $gol_comp[$i] = $temp[$i][0];
    }

 $content_url = explode('prt_saveed_12lk',$content);

for ($i=1; $i <64 ; $i++) { 

    $ajaxs = str_replace(['<','>'],'',$content_url[$i]);
 $a2 = explode('f=',$ajaxs);
 $f2 = explode('data-toggle',$a2[1]);
 $url_comp[$i-1] = str_replace(['"',' '],'',$f2[0]);

}
 
//  for ($i=0; $i <33 ; $i++) { 
//      $ajaxs[$i] = str_replace(['<','>'],'',$content_url[$i+1]); // this is the key [index]
// $temp[$i] = explode('a',$ajaxs[$i]);
// $url_comp[$i] = $temp[$i][0];
// }
        // $ajaxs[0] = str_replace(['<','>',],'',$content[1]); // this is the key [index]
        // $temp[0] = explode('/a',$ajaxs[0]);
        // $name_comp[0] = $temp[0][0];

        // $ajaxs[1] = str_replace(['<','>',],'',$content[2]); // this is the key [index]
        // $temp[1] = explode('/a',$ajaxs[1]);
        // $name_comp[1] = $temp[1][0];

        
        // $ajaxs[1] = str_replace(['<','>',],'',$content[2]); // this is the key [index]
        // $temp[1] = explode('/a',$ajaxs[1]);
        // $name_comp[1] = $temp[1][0];

        echo '<pre>';
        var_dump($name_comp);
        var_dump($url_comp);
        // var_dump( $per_comp );
        // var_dump( $gol_comp );
        echo '</pre>';
    //    echo $_REQUEST['challenge'];

    }
    slice_catagory($url_key[2]);
?>