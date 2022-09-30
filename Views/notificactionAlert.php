<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>

    <?php /* esto es para activar la alerta desde otra vista */
   require_once("notificationAlert.php");
    echo "<script>sweet('TESDT','TWWET','error')</script>"
    ?>

    <script type='text/javascript'>
    function sweet(title,description,type) {
        swal(title, description, type);
    }    function normal() {
        alert('Normal Alert');
    }
    </script>
