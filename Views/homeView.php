<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .home-container {
        margin-top: 10px;
        width: 100%;

        color: #1b2a3a;
    }

    .utn-logo {

        position: absolute;
        top: 0;
        right: 0;

        width: 150px;
        height: 50px;
        object-fit: contain;
    }

    .title {
        text-align: center;
        font-size: 50px;
        margin-bottom: 20px;
        font-weight: 800;
        line-height: 150px;
    }

    .subtitle {
        text-align: center;
        font-size: 30px;
        margin-bottom: 20px;
        font-weight: 500;
    }

    p {
        font-size: 25px;
        font-weight: 400;
    }

    .images {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        flex-wrap: wrap;
        margin: 50px;

    }

    .images img {
        object-fit: cover;
        width: 350px;
        height: 350px;
    }

    .members {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;
        align-items: center;
        text-align: center;
    }

    .members .member {
        display: flex;
        justify-content: center;
        flex-direction: column;

    }

    .members .member img {
        object-fit: cover;
        object-fit: center;
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }
    </style>
</head>

<body>

    <div class="home-container x_panel">

        <img src="../Temporal-pruebas/utn.png" alt="utn" class="utn-logo">

        <div>
            <h1 class="title x_title">Pet Hero</h1>
            <div class="clearfix"></div>
            <h3 class="subtitle ">Slogan</h3>
        </div>


        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse, autem quidem quam atque sint assumenda Lorem
            ipsum dolor sit amet consectetur, adipisicing elit. Fugit, voluptatum laudantium? Esse suscipit, dicta
            quibusdam
            blanditiis vel debitis omnis, ad reprehenderit quas rerum, in quis odio aut numquam. Praesentium, eveniet?
            repudiandae dolorem reiciendis sapiente, veritatis asperiores doloribus ducimus optio dolorum saepe qui eius
            eaque id!</p>

        <div class="images">
            <img src="../Temporal-pruebas/home2.jpeg" alt="animal">
            <img src="../Temporal-pruebas/home1.jpeg" alt="animal">
        </div>
        <h2 class="title">Integrantes</h2>
        <div class="members">

            <div class="member">
                <img src="../Views/profile/tobias.jpg" alt="tobias">
                <h4>Tobias</h4>
            </div>
            <div class="member">
                <img src="../Views/profile/matias.jpg" alt="matias">
                <h4>Tobias</h4>
            </div>
            <div class="member">
                <img src="../Views/profile/nicolas.jpg" alt="nicolas">
                <h4>Tobias</h4>
            </div>
        </div>


        <h4 class="title">Contactanos!</h4>
    </div>
</body>

</html>