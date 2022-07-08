<?php 
    class LoadProductsInfo{

        public $file_name; 

        function __construct(){
            $this->file_name = "lista.csv";
        }

        function loadProductsInfo(){
            if(file_exists($this->file_name)){
                if (($open = fopen($this->file_name, "r")) !== FALSE) 
                {
                    while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
                    {        
                        $products[] = $data; 
                    }
                fclose($open);
                }
                return $products;
            }else{
                throw new Exception('File dont exist');
            }
        }
        function viewProductTable($products){
            if(isset($products)){
            echo '<table class="table">
                    <thead class="table-dark">
                        <tr class="text-center">';
                            echo "<th>".$products[0][0]."</th>";
                            echo "<th>".$products[0][1]."</th>";
                            echo "<th>".$products[0][2]."</th>";
                            echo "<th>".$products[0][3]."</th>";
                            echo "<th>".$products[0][4]."</th>";
                            echo "<th>".$products[0][5]."</th>";
                            echo "<th>".$products[0][6]."</th>";
                            echo "<th></th>";
            echo '      </tr>
                    </thead>
                <tbody>';
                $i=1;
                foreach($products as $product){ 
                    if(isset($products[$i]) && $products[$i]!=null){
                    echo '<tr class="text-center">';
                        echo "<td>".$products[$i][0]."</td>";
                        echo "<td>".$products[$i][1]."</td>";
                        echo "<td>".$products[$i][2]."</td>";
                        echo "<td>".$products[$i][3]."</td>";
                        echo "<td>".$products[$i][4]."</td>";
                        echo "<td>".$products[$i][5]."</td>";
                        echo "<td>".$products[$i][6]."</td>";
                        echo '<td><a class="btn btn-dark" href="./'.$products[$i][2].'">Show</a></td>';
                    echo '</tr>';
                    }
                    $i++;
                }
            echo "</tbody>
            </table>";
            }else{
                throw new Exception(' ERROR');
            }
        }
    }
?>