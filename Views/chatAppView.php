                        <div class="form-group" style="padding-left: 20px; padding-right: 20px;">

                            <div style="overflow-y: scroll; height: 300px; padding: 20px; background: white;">   

                            </span>                                         
                            

                                <table class="table">

                                    <tbody>

                                        <?php foreach ($chatList as $key => $chat) { ?>

                                            <tr>
                                                <td style="width: 150px;">
                                                    
                                                <?php 

                                                    if ($chat->getTrasmitter() == $trasmitter->getToken()){

                                                        echo $trasmitter->getFirstName()." ".$trasmitter->getLastName().":";

                                                    } else {

                                                        echo $receiver->getFirstName()." ".$receiver->getLastName().":";
                                                    }
                                                ?>

                                                </td>                                                

                                                <td><?php echo $chat->getMessage(); ?></td>                                         

                                                <td style="width: 150px;"><?php echo $chat->getDate(); ?></td>
                                            </tr>


                                        <?php } ?>  

                                        <tr>
                                            <td colspan="3"></td>
                                        </tr>

                                    </tbody>
                                </table> 
                            </div>
                        </div>