<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Food Truck - P3G1</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Voltaire&display=swap" rel="stylesheet">
<link href="css/styles.css" type="text/css" rel="stylesheet">

<script src="js/jquery-1.12.4.js"></script>
<script src="js/jquery-ui.js"></script>
</head>
<?php
    include 'FoodItem.php';

    $SelectMaxCnt = 20;   
    // Set the value of food
    $myitems[] = new FoodItem('1','Gyro', 9.25, 'It\'s a Gyro', 'gyro1.jpg');
    $myitems[] = new FoodItem('2','Spanakopita', 8.63, 'It\'s Spanakopita', 'spanakopita.jpg');
    $myitems[] = new FoodItem('3','Garlic Fries', 4.00, 'It\'s Garlic Fries', 'garlicFries.jpg');
    $myitems[] = new FoodItem('4','Falafel', 8.52, 'It\'s Falafel', 'falafel.jpg');
    $myitems[] = new FoodItem('5','Baklava', 3.35, 'It\'s Baklava', 'baklava.jpg');
    $myitems[] = new FoodItem('6','Greek Salad', 7.95, 'It\'s Greek Salad', 'greekSalad.jpg'); 

    //get select option. 0 ~ $SelectMaxCnt;
    function get_option($SelectMaxCnt, $sltItem){
        $str = "";
        for ($x = 0; $x <= $SelectMaxCnt; $x+=1) {
            $str .= '<option value="'.$x.'"';
            if (isset($_POST[$sltItem]) && $_POST[$sltItem] == $x) {
                $str .=' selected="selected"'; 
            }
            $str .='>'.$x.'</option>';                                                  
        }  
        return $str;                
    }
?>

<script>
    // set select option event.
    $(document).ready(function() {        
        $("select").change(function() {
            var aryid = $(this).attr("id").split('_');    
            if($(this).find(":selected").text() != '0'){
                var d = $("#hid_price_"+ aryid[1]).val();
                var name = $("#hid_name_"+ aryid[1]).val();
                var total = eval($(this).find(":selected").text() * d).toFixed(2);            
                $('#Sp'+ aryid[1]).html('Total price of ' + name + ' = $' + total + '');  
            }else{
                $('#Sp'+ aryid[1]).html('');
            }   
        });
    });  

</script>

<body>
    <h1 class="title">It's Da Foodtruck</h1>
    <hr>

    <div id="wrapper">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="food" method="POST">
        <fieldset id="menu">
        <?
            for ($i = 0; $i <= count($myitems) - 1; $i++) {  
                echo '<div class="food-card">';
                echo    '<img class="food-image" src="'.$myitems[$i]->get_photo().'" alt="'.$myitems[$i]->get_name().'"/>';
                echo    '<p>';
                echo    '<p class="food-name margin-bot">'.$myitems[$i]->get_name().'</p>';
                echo    '<p class="food-description margin-bot">'.$myitems[$i]->get_description().'</p>';
                echo    '<p class="food-description margin-bot">$'.$myitems[$i]->get_price().'</p>';

                echo        '<select class="margin-bot select-box" name="sltItem_'.$i.'" id="sltItem_'.$i.'">'; 
                echo            get_option($SelectMaxCnt, 'sltItem_'.$i.'');  
                echo        '</select>';  
                              
                echo        '<input type="hidden" id="hid_name_'.$i.'" value="'.$myitems[$i]->get_name().'">';
                echo        '<input type="hidden" id="hid_price_'.$i.'" value="'.$myitems[$i]->get_price().'">';
                echo    '</p>';
                echo    '<span id="Sp'.$i.'" class="food-price text-red"></span>';
                echo '</div>';
            }        
        ?>    
        </fieldset>    
    </form>  

    <!-- Calculate Button Submit: Calculate the final price and list what was ordered.-->
    <div class="checkout">
        <h1 class="title">Checkout</h1>
        <div class="total-amount">
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $myTotal = 0;
                $tmpVal = 0;
                for ($i = 0; $i <= count($myitems) - 1; $i++) {
                    $myitems[$i]->set_count($_POST['sltItem_'.$i.'']);
                    if($myitems[$i]->get_count() != 0){
                        $tmpVal = number_format($myitems[$i]->get_count() * $myitems[$i]->get_price(), 2 );
                        echo '
                            <p class="margin-bot">'.$myitems[$i]->get_count().' x '.$myitems[$i]->get_name().' = <b>$'.$tmpVal.'</b></p>
                            ';
                        $myTotal += $tmpVal;
                    }
                }

                if( $myTotal > 0){
                    echo '<p class="margin-bot">Subtotal: $<b>'.number_format($myTotal,2).'</b></p>';
                    $tax = $myTotal * 0.06;
                    $grandTotal = $myTotal + $tax;
                    echo '<p class="margin-bot">Tax: $<b>'.number_format($tax, 2).'</b></p>';
                    echo '<p class=""><b>Grand total: $'.number_format($grandTotal, 2).'</b></p>';
                }
            }
        ?>
        </div> <!-- end of total amount div -->
            
        <div class="button">
                <p><input class="calculate" type="submit" form="food" value="Calculate"></p>
                <p><div class="calculate"><a class="reset" href="">Reset</a></div></p>
            </div>
        </div> <!-- end of checkout -->

    </div> <!-- end of wrapper -->
    
    <hr>
    <footer>
        <ul>
            <li>Copyright &copy;
                <?php
                $date_current = date('Y');
                $date_created = 2022;
                if ($date_current == $date_created) {
                    echo $date_current;
                } else {
                    echo '' . $date_created . ' - ' . $date_current . '';
                }
                ?>
            <li>All Rights Reserved</li>
            <li><a href="https://github.com/krayzieeddi " target="_blank">Edwin Ho</a></li>
            <li><a href="https://github.com/WChihWen" target="_blank">Chih Wen Wang</a></li>
            <li><a href="https://github.com/ted-miller92" target="_blank">Ted Miller</a></li>
            <li><a href="https://github.com/sea-hank" target="_blank">Yingheng he</a></li>
        </ul>
    </footer>

</body>
</html>

