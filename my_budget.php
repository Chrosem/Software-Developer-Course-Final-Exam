<?php

    require "header.php";

    $user = new User();

    $msg="";

    //Tranzakciók
        if(isset($_POST['add_transaction'])){
            if($_POST['type'] == '+'){

            $msg = $user->add_transaction($_POST['category'],$_POST['type'],$_POST['method'],$_POST['comment'],$_POST['value']);
            }
            else if($_POST['type'] == '-'){
            $msg = $user->add_transaction($_POST['category1'],$_POST['type'],$_POST['method'],$_POST['comment'],$_POST['value']);
            }
            echo"
            <script>

            $( document ).ready(function() {
                $('#add_transaction').modal('show')
                var error = ' $msg ';
                document.getElementById('error').innerHTML = error;
            });
            </script>";

        }

        if(isset($_POST['delete_transaction'])){
            $msg = $user->user_deleteTransactions($_POST['delete_transaction']);
            echo"
            <script>

            $( document ).ready(function() {
                $('#delete_transaction').modal('show')
                var error = ' $msg ';
                document.getElementById('error6').innerHTML = error;
            });
            </script>";
        }

        if(isset($_POST['delete_alltransaction'])){
            $msg = $user->user_deleteAllTransactions();
        }

        //Fix Tranzakciók
        if(isset($_POST['add_fixtransaction'])){
            if($_POST['type'] == '+'){
            $msg = $user->add_Fixtransaction($_POST['category'],$_POST['type'],$_POST['method'],$_POST['day'],$_POST['comment'],$_POST['value']);

        }
        else if($_POST['type'] == '-'){
            $msg = $user->add_Fixtransaction($_POST['category1'],$_POST['type'],$_POST['method'],$_POST['day'],$_POST['comment'],$_POST['value']);

        }
        echo"
            <script>

            $( document ).ready(function() {
                $('#add_fixtransaction').modal('show')
                var error = ' $msg ';
                document.getElementById('error1').innerHTML = error;
            });
            </script>";
    }

        if(isset($_POST['delete_fixtransaction'])){
            $msg = $user->user_deleteFixTransactions($_POST['delete_fixtransaction']);
            echo"
            <script>
            $( document ).ready(function() {
                $('#delete_fixtransaction').modal('show')
            });
            </script>";
        }

        if(isset($_POST['delete_allfixtransaction'])){
            $msg = $user->user_deleteAllFixTransactions();
        }

        //Spórolási cél
        if(isset($_POST['add_goal'])){
            $msg = $user->user_AddGoal($_POST['goal'],$_POST['store_of_money'],$_POST['saving_for']);
            echo"
            <script>
            $( document ).ready(function() {
                $('#add_goal').modal('show')
                var error = ' $msg ';
                document.getElementById('error2').innerHTML = error;
            });
            </script>";
        }

        if(isset($_POST['delete_goal'])){
            $msg = $user->user_deleteSaving();
        }

        //Események
        if(isset($_POST['add_event'])){
            $date = date('Y-m-d', strtotime($_POST['date']));
            $msg = $user->user_AddEvent($_POST['event_name'],$date,$_POST['comment']);
            echo"
            <script>

            $( document ).ready(function() {
                $('#add_event').modal('show')
                var error = ' $msg ';
                document.getElementById('error3').innerHTML = error;
            });
            </script>";
        }

        if(isset($_POST['delete_event'])){
            $msg = $user->user_deleteEvent($_POST['delete_event']);
            echo"
            <script>
            $( document ).ready(function() {
                $('#delete_event').modal('show')
            });
            </script>";
        }

        if(isset($_POST['delete_allevent'])){
            $msg = $user->user_deleteAllEvent();
        }

        //Tiltólista
        if(isset($_POST['add_banned'])){
            $msg = $user->user_AddBanned($_POST['product'],$_POST['comment'],$_POST['price']);
            echo"
            <script>

            $( document ).ready(function() {
                $('#add_banned').modal('show')
                var error = ' $msg ';
                document.getElementById('error4').innerHTML = error;
            });
            </script>";

        }

        if(isset($_POST['delete_banned'])){
             $msg = $user->user_delete_Banned($_POST['delete_banned']);
             echo"
             <script>
             $( document ).ready(function() {
                 $('#delete_banned').modal('show')
             });
             </script>";
        }

        if(isset($_POST['delete_allbanned'])){
            $msg = $user->user_delete_AllBanned();
       }

       //Fix Tranzakciók másolása

        if(isset($_POST['copy_fixtransaction'])){
            $msg = $user->user_copyFixTransactions($_POST['copy_fixtransaction']);
            echo"
            <script>
            $( document ).ready(function() {
                $('#copy_fixtransaction').modal('show')
            });
            </script>";
        }

        if(isset($_POST['copy_allfixtransaction'])){
            $msg = $user->user_copyAllFixTransactions();

        }

        if(isset($_POST['update_goalvalue1'])){
            $msg = $user->user_UpdateGoal1($_POST['value']);
            echo"
            <script>

            $( document ).ready(function() {
                $('#update_goalvalue').modal('show')
                var error = ' $msg ';
                document.getElementById('error5').innerHTML = error;
            });
            </script>";

        }

        if(isset($_POST['update_goalvalue2'])){
            $msg = $user->user_UpdateGoal2($_POST['value']);
            echo"
            <script>

            $( document ).ready(function() {
                $('#update_goalvalue').modal('show')
                var error = ' $msg ';
                document.getElementById('error5').innerHTML = error;
            });
            </script>";

        }

?>

    <div id="nav_menu">
        <?php  require "nav_menu.php";  ?>
    </div>

      <title>My Budget</title>

</head>

<body>

<div id="content" class="container-fluid h-100">

    <div class="row">

        <!-- Első oszlop -->
        <div class="col col-md-4">

            <!-- Első box -->
            <div class="box bg-dark text-white m-2 p-3" >
            <h4 class="text-center"><p><span id="actual_month" text-white ></span> havi Tranzakciók</p></h4>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_transaction">
                    Hozzáad
                    </button>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#delete_transaction">
                    Törlés
                    </button>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#old_transaction">
                    Előző hónapok
                    </button>
                    <p></p>

          <!-- Modal -->
          <div class="modal fade" data-backdrop="static" data-keyboard="false" id="add_transaction">
                    <div class="modal-dialog modal-lg" >
                        <div class="modal-content bg-dark text-white">

                <!-- Modal Header -->
                            <div class="modal-header bg-dark text-white">
                            <h4 class="modal-title">Tranzakció</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body bg-dark text-white">
                                <form action="" method="post"  class="form-group bg-dark text-white text-center p-2">
                                <span id="error" class="d-block"></span>
                                    <div class="form-group col-12 mb-3 mt-3">
                                        <div id="radio" class="form-check-inline">
                                                <label class="form-check-label">

                                                    <!--Ez a bevétel-->
                                                    <input type="radio"  class="form-check-input" name="type" value="+">Bevétel</input>
                                                    <input type="radio"  class="form-check-input" name="type" value="-">Kiadás</input>

                                                    <div class="Box" style="display:none">
                                                    <select class="form-control"  name="category" >
                                                    <?php $row = $user->categories_incoming();  ?>
                                                        <?php foreach ((array)$row as $categories_incoming){ ?>
                                                        <option value="<?php print_r ($categories_incoming['category']);?>">
                                                        <?php print_r ($categories_incoming["category"]);?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                    </div>

                                                    <!--Ez a kiadás -->

                                                    <div class="Box1" style="display:none">
                                                    <select class="form-control"  name="category1" >
                                                        <?php $row = $user->categories_outgoing();  ?>
                                                            <?php foreach ((array)$row as $categories_outgoing){ ?>
                                                            <option value="<?php print_r ($categories_outgoing["category"]);?>">
                                                            <?php print_r ($categories_outgoing["category"]);?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                    </div>

                                                </label>

                                            </div>

                                           <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="method" value="Bank">Bank
                                                    <input type="radio" class="form-check-input" name="method" value="Készpénz">Készpénz
                                              </label>
                                            </div>

                                            <div class="form-group col-12 mb-3 mt-3">
                                                <label for=""><b>Megjegyzés</b></label>
                                                <input type="text" name="comment"  class="form-control ">
                                            </div>

                                            <div class="form-group col-12 mb-3 mt-3">
                                                <label for=""><b>Érték</b></label>
                                                <input type="number" name="value"  class="form-control" placeholder="Kérjük számot adjon meg!">
                                            </div>

                                            </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                            <button type="submit"  name="add_transaction" class="btn btn-secondary" >Hozzáad</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            <!-- Modal End -->

             <!-- Modal Töröl-->
             <div class="modal fade" data-backdrop="static" data-keyboard="false" id="delete_transaction">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content bg-dark text-white">

                <!-- Modal Header -->
                            <div class="modal-header">
                            <h4 class="modal-title">Tranzakció</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="" method="post"  class="form-group  text-center p-2 bg-dark text-white">
                                <span id="error6" class="d-block"></span>

                                <div class="" style="height:270px; overflow:auto; ">
                                    <table id="table_res" class="table table-responsive-md" style="cellspacing:0; cellpadding:0; border:0;" >
                                    <?php $row = $user->user_transactions();
                                         foreach ((array)$row as $transactions){
                                            $new_date=date_create($transactions["date"]);
                                            ?>
                                        <tr>
                                                <td><button type="submit" name="delete_transaction"
                                                value="<?php echo ($transactions['id']);?>"
                                                class="btn btn-secondary">Törlés</button></td>
                                                <td><?php print_r ($transactions["category"]);?></td>
                                                <td><?php print_r ($transactions["type"]);?></td>
                                                <td><?php print_r ($transactions["method"]);?></td>
                                                <td><?php print_r ($transactions["comment"]);?></td>
                                                <td><?php print_r (number_format($transactions["value"]));?> Ft</td>
                                                <td><?php print_r (date_format($new_date,"Y/m/d"));?></td>
                                        </tr>
                                        <?php
                                        } ?>
                                </table>
                                </div>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                            <button type="submit" name="delete_alltransaction" class="btn btn-secondary">Minden tétel törlése</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            <!-- Modal End -->

            <!-- Modal előző hónapok-->
            <div class="modal fade" data-backdrop="static" data-keyboard="false" id="old_transaction">
                    <div class="modal-dialog modal-lg ">
                        <div class="modal-content bg-dark text-white">

                <!-- Modal Header -->
                            <div class="modal-header">
                            <h4 class="modal-title">Tranzakció</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="" method="post"  class="form-group  text-center p-2 bg-dark text-white">

                                <div class="" style="height:270px; overflow:auto; ">
                                    <table id="table_res" class="table table-responsive-md" style="cellspacing:0; cellpadding:0; border:0;" >
                                    <?php $row = $user->user_OldTransactions();
                                         foreach ((array)$row as $oldtransactions){ ?>
                                        <tr>

                                                <td><?php print_r ($oldtransactions["date"]);?></td>
                                                <td><?php print_r ($oldtransactions["category"]);?></td>
                                                <td><?php print_r ($oldtransactions["type"]);?></td>
                                                <td><?php print_r ($oldtransactions["method"]);?></td>
                                                <td><?php print_r ($oldtransactions["comment"]);?></td>
                                                <td><?php print_r (number_format($oldtransactions["value"]));?> Ft</td>
                                        </tr>
                                        <?php
                                        } ?>
                                </table>
                                </div>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            <!-- Modal End -->

            <div class="" style="height:270px; overflow:auto; ">
                <table id="table_res" class="table table-responsive-md" style="cellspacing:0; cellpadding:0; border:0;" >
                <?php $row = $user->user_transactions();
                     foreach ((array)$row as $transactions){ ?>
                    <tr>
                    <td><?php print_r ($transactions["category"]);?></td>
                            <?php if($transactions["type"]=="-"){$color="red";}else{$color="green";};?>
                            <td style="color:<?php echo $color ?>; font-size:25px "><?php print_r ($transactions["type"]);?></td>
                            <td><?php print_r ($transactions["method"]);?></td>
                            <td><?php print_r ($transactions["comment"]);?></td>
                            <td><?php print_r (number_format($transactions["value"]));?> Ft</td>
                            <td><?php print_r (date_format(date_create($transactions["date"]),"Y/m/d"));?></td>
                    </tr>
                    </tr>
                    <?php

                     } ?>
            </table>
            </div>

        </div>

             <!-- első box vége-->

            <!-- második box -->
            <div class="box bg-dark text-white m-2 p-3">
            <h4 class="text-center"><p>Havonta Ismétlődő Tranzakciók</p></h4>


            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_fixtransaction">
                    Hozzáad
            </button>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#delete_fixtransaction">
                    Törlés
            </button>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#copy_fixtransaction">
                    Másolás
            </button>

            <p></p>

            <div class="" style="height:290px; overflow:auto; ">
                <table id="table_res" class="table table-responsive-md" style="cellspacing:0; cellpadding:0; border:0;" >
                <?php $row = $user->user_fixtransactions();
                     foreach ((array)$row as $fix_transactions){ ?>
                    <tr style="color:white">
                            <td><?php print_r ($fix_transactions["category"]);?></td>
                            <?php if($fix_transactions["type"]=="-"){$color="red";}else{$color="green";};?>
                            <td style="color:<?php echo $color ?>; font-size:25px "><?php print_r ($fix_transactions["type"]);?></td>
                            <td><?php print_r ($fix_transactions["method"]);?></td>
                            <td><?php print_r ($fix_transactions["comment"]);?></td>
                            <td><?php print_r (number_format($fix_transactions["value"]));?> Ft</td>
                            <td>Ismétlés a hónap <?php print_r ($fix_transactions["day"]);?>. napján</td>
                    </tr>
                    </tr>
                    <?php if($fix_transactions["day"] == date('d')){
                        /*Itt egyszer írja ki az alertet csak, ellenőrzi hogy volt-emár!  */
                        echo"<script type = 'text/javascript'>
                        var alerted = localStorage.getItem('alerted') || '';
                        if (alerted != 'yes') {
                        alert('Esedékes havi tranzakció! Kérem el ne felejtse hozzáadni a tranzakcióihoz!');
                        localStorage.setItem('alerted','yes');
                        }
                        </script>";
                    }

                     } ?>
            </table>
            </div>

       <!-- Modal -->
       <div class="modal fade" data-backdrop="static" data-keyboard="false" id="add_fixtransaction">
                    <div class="modal-dialog modal-lg" >
                        <div class="modal-content bg-dark text-white">

                <!-- Modal Header -->
                            <div class="modal-header bg-dark text-white">
                            <h4 class="modal-title">Havonta ismétlődő tranzakció</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body bg-dark text-white">
                                <form action="" method="post"  class="form-group bg-dark text-white text-center p-2">
                                <span id="error1" class="d-block"></span>
                                    <div class="form-group col-12 mb-3 mt-3">
                                        <div id="fix" class="form-check-inline">
                                                <label class="form-check-label">

                                                    <!--Ez a bevétel-->
                                                    <input type="radio"  class="form-check-input" name="type" value="+">Bevétel</input>
                                                    <input type="radio"  class="form-check-input" name="type" value="-">Kiadás</input>

                                                    <div class="Box2" style="display:none">
                                                    <select class="form-control"  name="category" >
                                                    <?php $row = $user->categories_incoming();  ?>
                                                        <?php foreach ((array)$row as $categories_incoming){ ?>
                                                        <option value="<?php print_r ($categories_incoming['category']);?>">
                                                        <?php print_r ($categories_incoming["category"]);?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                    </div>

                                                    <!--Ez a kiadás -->

                                                    <div class="Box3" style="display:none">
                                                    <select class="form-control"  name="category1" >
                                                        <?php $row = $user->categories_outgoing();  ?>
                                                            <?php foreach ((array)$row as $categories_outgoing){ ?>
                                                            <option value="<?php print_r ($categories_outgoing['category']);?>">
                                                            <?php print_r ($categories_outgoing["category"]);?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                    </div>

                                                </label>

                                            </div>

                                           <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="method" value="Bank">Bank
                                                    <input type="radio" class="form-check-input" name="method" value="Készpénz">Készpénz
                                              </label>
                                            </div>

                                            <div class="form-group col-12 mb-3 mt-3">
                                                <label for=""><b>Megjegyzés</b></label>
                                                <input type="text" name="comment"  class="form-control ">
                                            </div>

                                            <div class="form-group col-12 mb-3 mt-3">
                                                <label for=""><b>Melyik napon ismétlődik a hónapban?</b></label>
                                                <input type="number" name="day"  class="form-control" placeholder="Kérjük 1 és 31 közötti számot adjon meg!">
                                            </div>

                                            <div class="form-group col-12 mb-3 mt-3">
                                                <label for=""><b>Érték</b></label>
                                                <input type="number" name="value"  class="form-control" placeholder="Kérjük számot adjon meg!">
                                            </div>

                                            </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                            <button type="submit" name="add_fixtransaction" class="btn btn-secondary">Hozzáad</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            <!-- Modal End -->

            <!-- Modal Töröl-->
            <div class="modal fade" data-backdrop="static" data-keyboard="false" id="delete_fixtransaction">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content bg-dark text-white">

                <!-- Modal Header -->
                            <div class="modal-header">
                            <h4 class="modal-title">Havonta ismétlődő tranzakció törlés</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="" method="post"  class="form-group  text-center p-2 bg-dark text-white">
                                <span class="d-block"><?php if(!empty($msg)){ echo $msg;} ?></span>


                                <div class="" style="height:270px; overflow:auto; ">
                                    <table id="table_res" class="table table-responsive-md" style="cellspacing:0; cellpadding:0; border:0;" >
                                        <?php $row = $user->user_fixtransactions();  ?>
                                        <?php foreach ((array)$row as $fix_transactions){ ?>
                                        <tr>

                                            <td><button type="submit" name="delete_fixtransaction"
                                            value="<?php echo ($fix_transactions['id']);?>" class="btn btn-secondary">Törlés</button></td>
                                            <td><?php print_r ($fix_transactions["category"]);?></td>
                                            <td><?php print_r ($fix_transactions["type"]);?></td>
                                            <td><?php print_r ($fix_transactions["method"]);?></td>
                                            <td><?php print_r ($fix_transactions["comment"]);?></td>
                                            <td><?php print_r (number_format($fix_transactions["value"]));?> Ft</td>
                                            <td><?php print_r ($fix_transactions["day"]);?></td>
                                        </tr>
                                        <?php
                                        } ?>
                                </table>
                                </div>


                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                            <button type="submit" name="delete_allfixtransaction" class="btn btn-secondary">Minden tétel törlése</button>

                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            <!-- Modal End -->

             <!-- Modal Másol-->
             <div class="modal fade" data-backdrop="static" data-keyboard="false" id="copy_fixtransaction">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content bg-dark text-white">

                <!-- Modal Header -->
                            <div class="modal-header">
                            <h4 class="modal-title">Havonta ismétlődő tranzakció másolása</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="" method="post"  class="form-group  text-center p-2 bg-dark text-white">
                                <span class="d-block"><?php if(!empty($msg)){ echo $msg;} ?></span>


                                <div class="" style="height:270px; overflow:auto; ">
                                    <table id="table_res" class="table table-responsive-md" style="cellspacing:0; cellpadding:0; border:0;" >
                                        <?php $row = $user->user_fixtransactions();  ?>
                                        <?php foreach ((array)$row as $fix_transactions){ ?>
                                        <tr>

                                            <td><button type="submit" name="copy_fixtransaction"
                                            value="<?php echo ($fix_transactions['id']);?>" class="btn btn-secondary">Másol
                                            </button></td>
                                            <td><?php print_r ($fix_transactions["category"]);?></td>
                                            <td><?php print_r ($fix_transactions["type"]);?></td>
                                            <td><?php print_r ($fix_transactions["method"]);?></td>
                                            <td><?php print_r ($fix_transactions["comment"]);?></td>
                                            <td><?php print_r (number_format($fix_transactions["value"]));?> Ft</td>
                                            <td><?php print_r ($fix_transactions["day"]);?></td>
                                        </tr>
                                        <?php
                                        } ?>
                                </table>
                                </div>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                            <button type="submit" name="copy_allfixtransaction" class="btn btn-secondary">Minden tétel másolása</button>

                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            <!-- Modal End -->

            </div>

            <!-- második box vége-->

        </div>
        <!--Első oszlop vége -->

        <!--Második oszlop -->

        <div class="col col-md-4">
            <div class="box bg-dark text-white m-2 p-3" id="">

            <h4 class="text-center"><p><span id="actual_month1" text-white></span> havi összes pénzmozgás</p></h4>

                <?php
                    $row = $user->user_MontlyBudget();
                        foreach( $row as $incoming)
                            { ?>
                    <p>Bevétel</p>
                    <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar"
                    aria-valuenow="<?php print_r ($incoming['total']); ?>" aria-valuemin="0"
                    aria-valuemax="<?php echo ($incoming['total0']);?>"
                    style="width: <?php echo (($incoming['total'])/($incoming['total0']))*100;?>%"><?php print_r (number_format($incoming['total'])); ?> Ft</div>
                </div>
                <p></p>
                <p>Kiadás</p>

                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar"
                    aria-valuenow="<?php print_r ($incoming['total1']); ?>" aria-valuemin="0"
                    aria-valuemax="<?php echo ($incoming['total0']);?>"
                    style="width: <?php echo (($incoming['total1'])/($incoming['total0']))*100;?>%"><?php print_r (number_format($incoming['total1']));?> Ft</div>
                </div>
                <?php } ?>
                <p></p>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#old_montlybudget">
                Előző hónapok
            </button>
            </div>

                <!-- Modal előző hónapok-->
                <div class="modal fade" data-backdrop="static" data-keyboard="false" id="old_montlybudget">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content bg-dark text-white">

                        <!-- Modal Header -->
                            <div class="modal-header">
                            <h4 class="modal-title">Előző hónapok</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="" method="post"  class="form-group  text-center p-2 bg-dark text-white">
                                <span class="d-block"><?php if(!empty($msg)){ echo $msg;} ?></span>


                                <div class="" style="height:270px; overflow:auto; ">
                                    <table id="table_res" class="table table-responsive-md" style="cellspacing:0; cellpadding:0; border:0;" >
                                    <?php
                                            $row = $user->user_OldMontlyBudget();
                                                foreach( $row as $oldincoming)
                                                    {
                                                    $new_date=date_create($oldincoming["date"]);
                                                ?>
                                        <tr>

                                        <td><?php print_r (date_format($new_date,"Y/m"));?></td>
                                                <td>Összes bevétel: <?php print_r (number_format($oldincoming['total']));?> Ft</td>
                                                <td>Összes kiadás: <?php print_r (number_format($oldincoming['total1']));?> Ft</td>
                                        </tr>
                                        <?php
                                        } ?>
                                </table>
                                </div>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            <!-- Modal End -->

            <!-- Spórolási cél doboz -->
            <div class="box bg-dark text-white m-2 p-3" id="">
            <h4 class="text-center">Spórolási Cél</h4>
                <?php $row = $user->sql_UserSaving();  ?>
                <?php foreach ($row as $saving){ ?>
                    <h5 class="text-center"><?php echo ($saving['saving_for']);?></h5>
                    <p>Célösszeg: <?php echo '<span style="font-size:15px; font-weight:bold;">'; echo (number_format($saving['goal']));?> Ft</p>
                    <p><?php if( (number_format(($saving['goal'])-($saving['store_of_money']))) < 0 ){
                    echo '<span style="font-size:15px; font-weight:bold; color:rgb(0, 255, 0);">Elérted a célod!</span>';
                     } else{echo 'Kell még: '; echo (number_format(($saving['goal'])-($saving['store_of_money']))); echo 'Ft'
                    ;};?></p>

            <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                    role="progressbar" aria-valuenow="<?php echo (($saving['store_of_money'])/($saving['goal']))*100;?> Ft" aria-valuemin="0"
                    aria-valuemax="<?php echo ($saving['goal']);?>"
                    style="width:<?php echo (($saving['store_of_money'])/($saving['goal']))*100;?>%" ><?php echo (number_format($saving['store_of_money']))?> Ft
                    </div>
            </div>

            <?php } ?>
            <p></p>
            <?php
            $row = $user->sql_UserSaving();
                    if(!empty($row)){
                        $button='disabled';
                    }
                    else{
                        $button='';
                }
            ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_goal" <?php echo $button ?> >
            Hozzáad
            </button>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#update_goalvalue">
                Módosít
            </button>

             <!-- Modal hozzáad összeg -->
             <div class="modal fade" data-backdrop="static" data-keyboard="false" id="update_goalvalue">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content bg-dark text-white">

                <!-- Modal Header -->
                            <div class="modal-header bg-dark text-white">
                            <h4 class="modal-title">Összeg hozzáadása</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body bg-dark text-white">
                                <form action="" method="post"  class="form-group bg-dark text-white text-center p-2">
                                <span id="error5" class="d-block"></span>


                                            <div class="form-group col-12 mb-3 mt-3">
                                                <label for=""><b>Összeg:</b></label>
                                                <input type="number" name="value"  class="form-control" placeholder="Kérjük számot adjon meg!">
                                            </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                            <button type="submit" name="update_goalvalue1" class="btn btn-secondary">Hozzáad</button>
                            <button type="submit" name="update_goalvalue2" class="btn btn-secondary">Kivon</button>
                            <button type="submit" name="delete_goal" class="btn btn-secondary">Cél törlése</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            <!-- Modal End -->

                 <!-- Modal -->
                <div class="modal fade" data-backdrop="static" data-keyboard="false" id="add_goal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content bg-dark text-white">

                <!-- Modal Header -->
                            <div class="modal-header bg-dark text-white">
                            <h4 class="modal-title">Spórolási cél</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body bg-dark text-white">
                                <form action="" method="post"  class="form-group bg-dark text-white text-center p-2">
                                <span id="error2" class="d-block"></span>


                                            <div class="form-group col-12 mb-3 mt-3">
                                                <label for=""><b>Cél összeg:</b></label>
                                                <input type="number" name="goal"  class="form-control" placeholder="Kérjük számot adjon meg!">
                                            </div>

                                            <div class="form-group col-12 mb-3 mt-3">
                                                <label for=""><b>Eddig összegyült:</b></label>
                                                <input type="number" name="store_of_money"  class="form-control" placeholder="Kérjük számot adjon meg!">
                                            </div>

                                            <div class="form-group col-12 mb-3 mt-3">
                                                <label for=""><b>Mire gyűjtök:</b></label>
                                                <input type="text" name="saving_for"  class="form-control" >
                                            </div>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                            <button type="submit" name="add_goal" class="btn btn-secondary">Hozzáad</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            <!-- Modal End -->

        </div>

            <div class="box bg-dark text-white m-2 p-3" id="">
            <h4 class="text-center"><p>Események</p></h4>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_event">
                    Hozzáad
                </button>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#delete_event">
                   Törlés
                </button>

                <!-- Modal -->
                <div class="modal fade" data-backdrop="static" data-keyboard="false" id="add_event">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content bg-dark">

                <!-- Modal Header -->
                            <div class="modal-header bg-dark">
                            <h4 class="modal-title">Esemény</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body bg-dark">
                                <form action="" method="post"  class="form-group bg-dark text-center p-2">
                                <span id="error3" class="d-block"></span>

                                            <div class="form-group col-12 mb-3 mt-3 text-white">
                                                <label for="" ><b>Esemény</b></label>
                                                <input type="text" name="event_name"  class="form-control ">
                                            </div>

                                            <div class="form-group col-12 mb-3 mt-3">
                                            <label for=""><b>Dátum</b></label>
                                            <div class="input-group date">
                                            <input type="date" name="date">

                                            </div>

                                            </div>

                                            <div class="form-group col-12 mb-3 mt-3 text-white">
                                                <label for=""><b>Megjegyzés</b></label>
                                                <input type="text" name="comment"  class="form-control ">
                                            </div>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                            <button type="submit" name="add_event" class="btn btn-secondary">Hozzáad</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            <!-- Modal End -->

             <!-- Modal Töröl-->
             <div class="modal fade" data-backdrop="static" data-keyboard="false" id="delete_event">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content bg-dark text-white">

                <!-- Modal Header -->
                            <div class="modal-header">
                            <h4 class="modal-title">Események</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="" method="post"  class="form-group  text-center p-2 bg-dark text-white">
                                <span class="d-block"><?php if(!empty($msg)){ echo $msg;} ?></span>

                                <div class="" style="height:270px; overflow:auto; ">
                                    <table id="table_res" class="table table-responsive-md" style="cellspacing:0; cellpadding:0; border:0;" >
                                    <?php $row = $user->user_Event();  ?>
                                        <?php foreach ((array)$row as $event){ ?>
                                        <tr>

                                            <td> <button type="submit" name="delete_event"
                                            value="<?php echo ($event['id']);?>" class="btn btn-secondary">Törlés</button>
                                            </td>
                                            <td><?php print_r ($event["event_name"]);?></td>
                                            <td><?php print_r (date_format(date_create($event["date"]),"/m/d"));?></td>
                                            <td><?php print_r ($event["comment"]);?></td>
                                        </tr>
                                        <?php
                                        } ?>
                                </table>
                                </div>


                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                            <button type="submit" name="delete_allevent" class="btn btn-secondary">Töröl mind</button>

                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            <!-- Modal End -->
            <p></p>

            <div class="" style="height:170px; overflow:auto; ">
                <table id="table_res" class="table table-responsive-md" style="cellspacing:0; cellpadding:0; border:0;" >
                <?php $row = $user->user_Event();
                     foreach ((array)$row as $event){
                        $new_date=date_create($event["date"]);
                        ?>
                    <tr style="color:white">
                        <td><?php print_r ($event["event_name"]);?></td>
                        <td><?php echo 'Dátum: '; print_r (date_format($new_date,"m/d"));?></td>
                        <td><?php print_r ($event["comment"]);?></td>
                    </tr>
                <?php } ?>
            </table>
            </div>

        </div>

    </div>

    <!--Második oszlop vége -->

    <div class="col col-md-4">
        <div class="box bg-dark text-white m-2 p-3">

            <div id="donutchart">
            <?php
                $row = $user->user_balance();
                    foreach( (array)$row as $balance)
                        { ?>
            <script>

            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Pénzem', 'Bank és készpénz'],
                    ['Készpénz: '+parseInt('<?php print_r($balance["cash"]); ?>')+ ' Ft', parseInt('<?php print_r($balance["cash"]); ?>')],
                    ['Bank: '+parseInt('<?php print_r($balance["bank"]); ?>')+ ' Ft', parseInt('<?php print_r($balance["bank"]); ?>')]
                ]);

                var options = {
                    title:  'Összesen: <?php print_r(number_format((int)$balance["balance"])); ?> Ft',
                    titleTextStyle: {color:'white', fontName: 'Roboto', fontSize: '18'},
                legend: {position: 'bottom', alignment: 'center', textStyle: {color:'white', fontName: 'Roboto', fontSize: '15'} },
                colors: ["#3f51b5","#2196f3","#03a9f4","#00bcd4","#009688","#4caf50","#8bc34a","#cddc39"], 
                areaOpacity: 0.2,
                lineWidth: 1,
                backgroundColor: 'transparent',
                chartArea: {
                    backgroundColor: "transparent",
                    top: "20%",
                    height: "70%",
                    width: "80%"
                },
                    height:'350',
                    backgroundColor: '#E4E4E4',
                    pieSliceBorderColor: '#263238',
                    pieSliceTextStyle:  {color:'white' },
                    pieHole: 0.6,

                    colorAxis: {colors: ["#3f51b5","#2196f3","#03a9f4","#00bcd4"] },
                    backgroundColor: 'transparent',
                    datalessRegionColor: '#37474f',
                    displayMode: 'regions',
                };
                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                chart.draw(data, options);
            }
            $(window).resize(function(){drawChart();
            }
            );

        </script>

            <?php } ?>
            </div>

        </div>

        <!--3.oszlop 2. doboz -->

        <div class="box bg-dark text-white m-2 p-3"  id="">
        <h4 class="text-center"><p>Ne vedd meg!</p></h4>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_banned">
            Hozzáad
            </button>

            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#delete_banned">
                Törlés
            </button>

             <!-- Modal Hozzáad-->
             <div class="modal fade" data-backdrop="static" data-keyboard="false" id="add_banned">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content bg-dark text-white">

                <!-- Modal Header -->
                            <div class="modal-header">
                            <h4 class="modal-title">Ne vedd meg!</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="" method="post"  class="form-group  text-center p-2 bg-dark text-white">
                                <span id="error4" class="d-block"></span>
                                    <div class="form-group col-12 mb-3 mt-3">
                                        <label for=""><b>Termék/Szolgáltatás</b></label>
                                        <input type="text" name="product"  class="form-control ">
                                    </div>

                                    <div class="form-group col-12 mb-3 mt-3">
                                        <label for=""><b>Megjegyzés</b></label>
                                        <input type="text" name="comment"  class="form-control ">
                                    </div>

                                    <div class="form-group col-12 mb-3 mt-3">
                                        <label for=""><b>Érték</b></label>
                                        <input type="number" name="price"  class="form-control" placeholder="Kérjük számot adjon meg!">
                                    </div>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                            <button type="submit" name="add_banned" class="btn btn-secondary">Hozzáad</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            <!-- Modal End -->

           <!-- Modal Töröl-->
           <div class="modal fade" data-backdrop="static" data-keyboard="false" id="delete_banned">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content bg-dark text-white">

                <!-- Modal Header -->
                            <div class="modal-header">
                            <h4 class="modal-title">Ne vedd mge! Törlés</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="" method="post"  class="form-group  text-center p-2 bg-dark text-white">
                                <span class="d-block"><?php if(!empty($msg)){ echo $msg;} ?></span>


                                <div class="" style="height:270px; overflow:auto; ">
                                    <table id="table_res" class="table table-responsive-md" style="cellspacing:0; cellpadding:0; border:0;" >
                                    <?php $row1 = $user->user_banned();  ?>
                                        <?php foreach ((array)$row1 as $banned){ ?>
                                        <tr>

                                            <td> <button type="submit" name="delete_banned"
                                            value="<?php echo ($banned['id']);?>" class="btn btn-secondary">Törlés</button>
                                            </td>
                                            <td><?php print_r ($banned['product']);?></td>
                                                <td><?php print_r ($banned['comment']);?></td>
                                                <td><?php print_r (number_format($banned['price']));?> Ft</td>
                                        </tr>
                                        <?php
                                        } ?>
                                </table>
                                </div>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                            <button type="submit" name="delete_allbanned" class="btn btn-secondary">Minden törlés</button>

                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            <!-- Modal End -->

            <p></p>

            <div class="" style="height:310px; overflow:auto; ">
                <table id="table_res" class="table table-responsive-md" style="cellspacing:0; cellpadding:0; border:0;" >
                <?php $row1 = $user->user_banned();
                 foreach ($row1 as $banned){ ?>
                    <tr>
                    <td><?php print_r ($banned['product']);?></td>
                    <td><?php print_r ($banned['comment']);?></td>
                    <td><?php print_r (number_format($banned['price']));?> Ft</td>
                    </tr>
                <?php } ?>
            </table>
            </div>

        </div>

    </div>

</div>
</div>


<div id="footer">
        <?php require "footer.php"; ?>
</div>

</body>
</html>

<script>

    $('#radio input[type="radio"]').click(function(){
        if($(this).attr("value")=="+"){
            $(".Box").show('slow');
            $(".Box1").hide('slow');
        }

        if($(this).attr("value")=="-"){
            $(".Box1").show('slow');
            $(".Box").hide('slow');
        }
    });
    $('#radio input[type="radio"]').trigger('click');


    $('#fix input[type="radio"]').click(function(){
        if($(this).attr("value")=="+"){
            $(".Box2").show('slow');
            $(".Box3").hide('slow');
        }

        if($(this).attr("value")=="-"){
            $(".Box3").show('slow');
            $(".Box2").hide('slow');
        }
    });
    $('#fix input[type="radio"]').trigger('click');

</script>

<script>

    var month = new Array();
        month[0] = "Január";
        month[1] = "Február";
        month[2] = "Március";
        month[3] = "Április";
        month[4] = "Május";
        month[5] = "Június";
        month[6] = "Július";
        month[7] = "Augusztus";
        month[8] = "Szeptember";
        month[9] = "Október";
        month[10] = "November";
        month[11] = "December";

</script>

<script>
    var d = new Date();
    var n = month[d.getMonth()];
    document.getElementById("actual_month").innerHTML = n;
    document.getElementById("actual_month1").innerHTML = n;
</script>

<script>
    [type="date"]::-webkit-calendar-picker-indicator {
    opacity: 0;
    }

</script>
