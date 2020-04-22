<?php require_once dirname(__FILE__) . "/templates/header.php"; 

?>

<div class="col-sm-6">
        <h3 class="m-b-xs text-black">Water Level Check</h3>  
    </div>
    <br>
    <br>
    <br>
    <br>

<div class="row">
    <div class="col-md-12">
        <section class="panel b-a">

            <div class="panel-heading b-b">  
                <a href="https://www.nodemcu.com/index_en.html" target="_blank" class="font-bold">NodeMCU (ESP32)</a> 
            </div>

            <div class="panel-body"> 
            <!-- MAIN CODE GOES HERE  -->
            <table class="table table-striped table-hover">
                <thead class="thead-dark font-bold">
                    <tr class="font-bold">
                        <th>Sl</th>
                        <th>Location</th>
                        <th>Water Sensor</th>
                        <th>Water Level</th>
                        <th>Walking Limit: 25</th>
                        <th>Vehicle Movement Limit: 50</th>
                        
                    </tr>
                </thead>
                <tbody>


                <?php  

                    $sql = "SELECT * FROM sensor_datas";
                    $data = $conn -> query($sql);
                    $i =  1;
                    //while( $sensor_datas = $data -> fetch_assoc() ) : //UNCOMMENT TO MAKE ALL ROW DATAS VISIBLE
                    $sensor_datas = $data -> fetch_assoc(); 

                ?>


                  <tr>
                    <td><?php echo $i ; $i++;  ?></td>
                    <td><?php echo $sensor_datas['location']; ?></td>
                    <td><?php echo $sensor_datas['water_sensor']; ?></td>
                    <td><?php echo $sensor_datas['water_level']; ?></td>
                    <td><?php
                    //Walking 
                    if($sensor_datas['water_sensor']=="Active"){    
                        if ($sensor_datas['water_level']>=25){
                            echo "Not possible";
                        }
                        else{
                            echo "Yes";
                        }
                    }
                    else{
                        echo "Water Sensor Off";
                    }                        
                    ?>                        
                    </td>
                    
                    <td><?php 
                    //Vehicle
                    if($sensor_datas['water_sensor']=="Active"){    
                        if ($sensor_datas['water_level']>=50){
                            echo "Not possible";
                        }
                        else{
                            echo "Yes";
                        }
                    }
                    else{
                        echo "Water Sensor Off";
                    }                        
                    ?>   
                    </td>
                    
                  </tr>

                <!--<?php//  endwhile;  ?>  UNCOMMENT TO MAKE ALL ROWS DATA VISIBLE--> 
                 




                </tbody>
            </table>
            



                 


            </div>

            <div class="clearfix panel-footer"> 

            </div>
        </section>
    </div>
</div>

<?php require_once dirname(__FILE__) . "/templates/footer.php"; ?>



