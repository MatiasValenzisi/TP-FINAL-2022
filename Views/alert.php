<?php 

echo "
<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>

    <script type='text/javascript'>
    function sweet(title,description,type) {
        swal(title, description, type);
    }    function normal() {
        alert('Normal Alert');
    }
    </script>"
?>