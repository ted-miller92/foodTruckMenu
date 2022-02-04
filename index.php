<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Food Truck - P3G1</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Voltaire&display=swap" rel="stylesheet">
<link href="css/styles.css?003" type="text/css" rel="stylesheet">

<script src="js/jquery-1.12.4.js"></script>
<script src="js/jquery-ui.js"></script>
</head>
<?php
    include 'FoodItem.php';

    $SelectMaxCnt = 20;

    // Set the value of food
    $myitem1 = new FoodItem('item1', 9.25, 'This is Item one!');
    $myitem2 = new FoodItem('item2', 8.63, 'This is Item two!');
    $myitem3 = new FoodItem('item3', 4.00, 'This is Item three!');
    $myitem4 = new FoodItem('item4', 8.52, 'This is Item four!');
    $myitem5 = new FoodItem('item5', 3.35, 'This is Item five!');
    $myitem6 = new FoodItem('item6', 1.95, 'This is Item six!');
    
?>

<script>
    // set select option event.
    $(document).ready(function() {        
        $("#slt_Item1").change(function() {
            if($(this).find(":selected").text() != '0'){
                var d = <?php echo $myitem1->get_price();?>;
                var name = '<?php echo $myitem1->get_name();?>';
                var total = eval($(this).find(":selected").text() * d ).toFixed(2);            
                $('#Sp1').html('Total price of ' + name + ' are ' + total + ' dollars!');  
            }else{
                $('#Sp1').html('');
            }                         
        });
        $("#slt_Item2").change(function() {
            if($(this).find(":selected").text() != '0'){
                var d = <?php echo $myitem2->get_price();?>;
                var name = '<?php echo $myitem2->get_name();?>';
                var total = eval($(this).find(":selected").text() * d ).toFixed(2);            
                $('#Sp2').html('Total price of ' + name + ' are ' + total + ' dollars!');  
            }else{
                $('#Sp2').html('');
            }           
        });
        $("#slt_Item3").change(function() {
            if($(this).find(":selected").text() != '0'){
                var d = <?php echo $myitem3->get_price();?>;
                var name = '<?php echo $myitem3->get_name();?>';
                var total = eval($(this).find(":selected").text() * d ).toFixed(2);            
                $('#Sp3').html('Total price of ' + name + ' are ' + total + ' dollars!');  
            }else{
                $('#Sp1').html('');
            }           
        });
        $("#slt_Item4").change(function() {
            if($(this).find(":selected").text() != '0'){
                var d = <?php echo $myitem4->get_price();?>;
                var name = '<?php echo $myitem4->get_name();?>';
                var total = eval($(this).find(":selected").text() * d ).toFixed(2);            
                $('#Sp4').html('Total price of ' + name + ' are ' + total + ' dollars!');  
            }else{
                $('#Sp4').html('');
            }             
        });
        $("#slt_Item5").change(function() {
            if($(this).find(":selected").text() != '0'){
                var d = <?php echo $myitem5->get_price();?>;
                var name = '<?php echo $myitem5->get_name();?>';
                var total = eval($(this).find(":selected").text() * d ).toFixed(2);            
                $('#Sp5').html('Total price of ' + name + ' are ' + total + ' dollars!');  
            }else{
                $('#Sp5').html('');
            }             
        });
        $("#slt_Item6").change(function() {
            if($(this).find(":selected").text() != '0'){
                var d = <?php echo $myitem6->get_price();?>;
                var name = '<?php echo $myitem6->get_name();?>';
                var total = eval($(this).find(":selected").text() * d ).toFixed(2);            
                $('#Sp6').html('Total price of ' + name + ' are ' + total + ' dollars!');  
            }else{
                $('#Sp6').html('');
            }             
        });
    });  

</script>
<body>
    <p>Food Truck</p>
    <hr>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div>
            <p>Product Name: <?php  echo $myitem1->get_name(); ?></p>
            <p>Description: <?php  echo $myitem1->get_description(); ?></p>
            <p>Per Price: $<?php  echo $myitem1->get_price(); ?></p>
            <p>
                <select name="slt_Item1" id="slt_Item1"> 
                    <?php                      
                        for ($x = 0; $x <= $SelectMaxCnt; $x+=1) {
                            echo '<option value="'.$x.'"';
                            if (isset($_POST['slt_Item2']) && $_POST['slt_Item1'] == $x) {
                                echo ' selected="selected"'; 
                            }
                            echo '>'.$x.'</option>';                                                  
                        }                  
                    ?>
                </select>
                <span id= "Sp1" class="text-red"></span> 
            </p>
        </div>
        <div>
            <p>Product Name: <?php  echo $myitem2->get_name(); ?></p>
            <p>Description: <?php  echo $myitem2->get_description(); ?></p>
            <p>Per Price: $<?php  echo $myitem2->get_price(); ?></p>
            <p>
                <select name="slt_Item2" id="slt_Item2"> 
                    <?php                      
                        for ($x = 0; $x <= $SelectMaxCnt; $x+=1) {
                            echo '<option value="'.$x.'"';
                            if (isset($_POST['slt_Item2']) && $_POST['slt_Item2'] == $x) echo 'selected="selected"'; 
                            echo '>'.$x.'</option>';
                        }                    
                    ?>   
                </select>
                <span id= "Sp2" class="text-red"></span> 
            </p>
        </div>
        <div>
            <p>Product Name: <?php  echo $myitem3->get_name(); ?></p>
            <p>Description: <?php  echo $myitem3->get_description(); ?></p>
            <p>Per Price: $<?php  echo $myitem3->get_price(); ?></p>
            <p>
                <select name="slt_Item3" id="slt_Item3"> 
                    <?php                      
                        for ($x = 0; $x <= $SelectMaxCnt; $x+=1) {
                            echo '<option value="'.$x.'"';
                            if (isset($_POST['slt_Item3']) && $_POST['slt_Item3'] == $x) echo 'selected="selected"'; 
                            echo '>'.$x.'</option>';
                        }                    
                    ?>   
                </select>
                <span id= "Sp3" class="text-red"></span> 
            </p>
        </div>
        <div>
            <p>Product Name: <?php  echo $myitem4->get_name(); ?></p>
            <p>Description: <?php  echo $myitem4->get_description(); ?></p>
            <p>Per Price: $<?php  echo $myitem4->get_price(); ?></p>
            <p>
                <select name="slt_Item4" id="slt_Item4"> 
                    <?php                      
                        for ($x = 0; $x <= $SelectMaxCnt; $x+=1) {
                            echo '<option value="'.$x.'"';
                            if (isset($_POST['slt_Item4']) && $_POST['slt_Item4'] == $x) echo 'selected="selected"'; 
                            echo '>'.$x.'</option>';
                        }                    
                    ?>   
                </select>
                <span id= "Sp4" class="text-red"></span> 
            </p>
        </div>
        <div>
            <p>Product Name: <?php  echo $myitem5->get_name(); ?></p>
            <p>Description: <?php  echo $myitem5->get_description(); ?></p>
            <p>Per Price: $<?php  echo $myitem5->get_price(); ?></p>
            <p>
                <select name="slt_Item5" id="slt_Item5"> 
                    <?php                      
                        for ($x = 0; $x <= $SelectMaxCnt; $x+=1) {
                            echo '<option value="'.$x.'"';
                            if (isset($_POST['slt_Item5']) && $_POST['slt_Item5'] == $x) echo 'selected="selected"'; 
                            echo '>'.$x.'</option>';
                        }                    
                    ?>   
                </select>
                <span id= "Sp5" class="text-red"></span> 
            </p>
        </div>
        <div>
            <p>Product Name: <?php  echo $myitem6->get_name(); ?></p>
            <p>Description: <?php  echo $myitem6->get_description(); ?></p>
            <p>Per Price: $<?php  echo $myitem6->get_price(); ?></p>
            <p>
                <select name="slt_Item6" id="slt_Item6"> 
                    <?php                      
                        for ($x = 0; $x <= $SelectMaxCnt; $x+=1) {
                            echo '<option value="'.$x.'"';
                            if (isset($_POST['slt_Item6']) && $_POST['slt_Item6'] == $x) echo 'selected="selected"'; 
                            echo '>'.$x.'</option>';
                        }                    
                    ?>   
                </select>
                <span id= "Sp6" class="text-red"></span> 
            </p>
        </div>  

        <p>
            <div class="button">
                <p><input class="calculate" type="submit" value="Calculate"></p>
                <p><a class="reset" href="">Reset</a></p>
            </div>
        </p>

    </form>  
    <!-- Calculate Button Submit: Calculate the final price and list what was ordered.-->
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $myitem1->set_count($_POST['slt_Item1']);
            $myitem2->set_count($_POST['slt_Item2']);
            $myitem3->set_count($_POST['slt_Item3']);
            $myitem4->set_count($_POST['slt_Item4']);
            $myitem5->set_count($_POST['slt_Item5']);
            $myitem6->set_count($_POST['slt_Item6']);
            $myTotal = 0;
            $tmpVal = 0;
            if($myitem1->get_count() != 0){
                $tmpVal = number_format($myitem1->get_count() * $myitem1->get_price(), 2 );
                echo '<p class="text-red">You ordered '.$myitem1->get_count().' '.$myitem1->get_name().' and this total price are <b>$'.$tmpVal.'</b></p>';
                $myTotal += $tmpVal;
            }
            if($myitem2->get_count() != 0){
                $tmpVal = number_format($myitem2->get_count() * $myitem2->get_price(), 2 );
                echo '<p class="text-red">You ordered '.$myitem2->get_count().' '.$myitem2->get_name().' and this total price are <b>$'.$tmpVal.'</b></p>';
                $myTotal += $tmpVal;
            }
            if($myitem3->get_count() != 0){
                $tmpVal = number_format($myitem3->get_count() * $myitem3->get_price(), 2 );
                echo '<p class="text-red">You ordered '.$myitem3->get_count().' '.$myitem3->get_name().' and this total price are <b>$'.$tmpVal.'</b></p>';
                $myTotal += $tmpVal;
            }
            if($myitem4->get_count() != 0){
                $tmpVal = number_format($myitem4->get_count() * $myitem4->get_price(), 2 );
                echo '<p class="text-red">You ordered '.$myitem4->get_count().' '.$myitem4->get_name().' and this total price are <b>$'.$tmpVal.'</b></p>';
                $myTotal += $tmpVal;
            }
            if($myitem5->get_count() != 0){
                $tmpVal = number_format($myitem5->get_count() * $myitem5->get_price(), 2 );
                echo '<p class="text-red">You ordered '.$myitem5->get_count().' '.$myitem5->get_name().' and this total price are <b>$'.$tmpVal.'</b></p>';
                $myTotal += $tmpVal;
            }
            if($myitem6->get_count() != 0){
                $tmpVal = number_format($myitem6->get_count() * $myitem6->get_price(), 2 );
                echo '<p class="text-red">You ordered '.$myitem6->get_count().' '.$myitem6->get_name().' and this total price are <b>$'.$tmpVal.'</b></p>';
                $myTotal += $tmpVal;
            }
           
            if( $myTotal > 0){
                echo '<p class="text-red"><b>Your final price are $'.number_format($myTotal,2).'</b></p>';
            }
        }
    ?>


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

