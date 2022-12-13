    <script type="text/javascript">
        function ajax(){
            var req = new XMLHttpRequest();

            req.onreadystatechange = function(){
                if (req.readyState == 4 && req.status == 200) {
                    document.getElementById('chat').innerHTML = req.responseText;
                }
            }

            req.open('GET', '<?php echo FRONT_ROOT ?>/guardian/chatAPP/<?php echo $tokenGuardian."/".$tokenOwner ?>', true);
            req.send();
        }

        setInterval(function(){ajax();}, 1000);

    </script>

    <div id="contenedor">
        <div id="caja-chat">
            <div id="chat"></div>
        </div>
    </div>

