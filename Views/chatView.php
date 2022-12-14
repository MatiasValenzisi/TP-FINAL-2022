    <div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Chat online</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content"><br>
     
                        <div id="chat">
                                
                            <!-- ACA SE GENERA LA VISTA AJAX --->

                        </div>   

                        <form class="form-horizontal form-label-left" action="<?php echo FRONT_ROOT?>/chat/messageAction" method="POST" enctype="multipart/form-data">

                            <input type="hidden" name="receiver" value="<?php echo $receiverToken ?>">
                            <input type="hidden" name="trasmitter" value="<?php echo $trasmitterToken ?>">


                        <div class="form-group" style="padding: 40px;">

                                <input style="resize:none; width: 100%;" name="message" placeholder=" Escriba un mensaje ..."></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" style="padding-bottom: 40px;">

                                <button type="submit" class="btn btn-success" style="width:100%;">Enviar</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    <script type="text/javascript">
        function ajax(){
            var req = new XMLHttpRequest();

            req.onreadystatechange = function(){
                if (req.readyState == 4 && req.status == 200) {
                    document.getElementById('chat').innerHTML = req.responseText;
                }
            }

            req.open('GET', '<?php echo FRONT_ROOT ?>/chat/AppAction/<?php echo $tokenGuardian."/".$tokenOwner ?>', true);
            req.send();
        }

        setInterval(function(){ajax();}, 1000);

    </script>
