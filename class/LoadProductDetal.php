<?php
    class LoadProductDetal{

        public $id_product;

        function __construct(){
           $this->id_product = isset($_GET['id']) ? $_GET['id'] : null;
        }

        function loadDataProductDetal(){
            if(isset($this->id_product ) && $this->id_product !=null){
                require('simple_html_dom.php');
            
                $id_produkt = $this->id_product ;
                $html = file_get_html('http://estoremedia.space/DataIT/product.php?id='.$id_produkt);
                $price = strval($html->find(".price",0));
                $product_name = strval($html->find("h3",0)->innertext);
                $price_promo = strval($html->find(".price-promo",0));
                $price_old = strval($html->find(".price-old",0));
                $image_src = strval($html->find(".card-img-top",0)->src);
                $stars_likes = strval($html->find(".text-muted",0));
              
                $script = $html->find('script[type="application/json"]',0);
                $script=$script->innertext;
                $filtr= array("\""," ","{","}");
                $script = str_replace($filtr,"",$script);
                $filtr = array(":",",");
                $script = str_replace($filtr," ",$script);
                $filtr = array("products ","variants ");
                $script = str_replace($filtr,"",$script);
                $script = explode(" ",$script );
                $product_code_name_space = $script[0];
                $product_code_number = $script[1];
            
                $product_info = [
                    "price" => $price,
                    "product_name" => $product_name,
                    "price_promo" => $price_promo,
                    "price_old" => $price_old,
                    "image_src" => $image_src,
                    "stars_likes" => $stars_likes,
                    "script_info" =>$script,
                    'product_code_name_space'=> $product_code_name_space,
                    'product_code_number'=> $product_code_number
                ];
                return $product_info;
            }
        }
        function showVariants($name,$product_info_array){
            $i = 1; 
            foreach($product_info_array as $param){
                $i = $i+5;
                    if(isset($product_info_array[$i])){
                        $wersion = $product_info_array[$i-4];
                        $price_promo_wersion = $product_info_array[$i-2];
                        $price_old_wersion = $product_info_array[$i];
        
                        echo "<li class='list-group-item'>$name #$wersion, $$price_promo_wersion";
                            if($price_old_wersion != 'null'){echo " <del style='color:red'>$$price_old_wersion</del>";}
                        echo "</li>";
                }
            }
        }
    }
?>