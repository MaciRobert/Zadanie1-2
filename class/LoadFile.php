<?php
class LoadFile {
    function renderFile(){
        require('simple_html_dom.php');
        
        $y = 1;
        $ilosc = 0;
        $product_list = null;
        $filename = "lista.csv";
        if (file_exists($filename)) {
            unlink('./lista.csv');
        }
            do{
            $html = file_get_html('http://estoremedia.space/DataIT/index.php?page='.$y);
                $i=0;
                do{
                    $title = "";
                    if(isset( $html->find(".title",$i)->plaintext )){
                    $title = $html->find(".title",$i)->plaintext;    
                    }   
                    if(isset($title) && $title!=null){

                        $title_href = strval($html->find(".title",$i)->href);

                        $image_src = strval($html->find(".card-img-top",$i)->src);

                        $price_product = strval($html->find(".card-body h5",$i)->plaintext);

                        $stars_likes = $html->find("small",$i)->innertext;

                        $text = explode(" ",$stars_likes );
                        $text[0];
                        $stars = $text[0];

                        $text[1];
                        $number_like = str_replace("(","",$text[1]);
                        $number_like = str_replace(")","",$number_like);

                        $ilosc++;
                        $product_add_to_list = [

                            "title" => $title,
                            "title_href" => $title_href,
                            "image_src" => $image_src,
                            "price" => $price_product,
                            "stars" => $stars,
                            "like_number" => $number_like
                        ];
                        $product_list[] = $product_add_to_list;
                    }
                    $i++;
                }while($html->find(".title",$i) != null);
            $y++;
            }while($html->find(".title",0)!= null);

            $file_open = fopen("lista.csv", "a");
            $delimiter=",";
            $heders = array ("produkt_id","title","title_href","image_src","price","stars","like_number");
            fputcsv($file_open,$heders,$delimiter);
            $i = 1;

        foreach($product_list as $product){
            $row = array($i,$product['title'],$product['title_href'],$product['image_src'],$product['price'],$product['stars'],$product['like_number']);
            fputcsv($file_open,$row,$delimiter);   
            $i++;
         }
        
    }
}
?>