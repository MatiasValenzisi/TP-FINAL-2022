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

    .contact-form {

        margin-top: 10%;
        margin-bottom: 5%;
        width: 70%;
        background-color: #1b2a3a;
        color: white;

    }


    .contact-image {
        background-color: #1b2a3a;
        text-align: center;
    }

    .contact-image img {
        border-radius: 6rem;
        width: 11%;
        margin-top: -3%;
        transform: rotate(29deg);
    }

    .contact-form form {
        padding: 14%;
    }

    .contact-form form .row {
        margin-bottom: -7%;
    }

    .contact-form h3 {
        margin-bottom: 8%;
        margin-top: -10%;
        text-align: center;
        color: #fff;
        font-size: 3rem;
        font-weight: 800;
    }

    .contact-form .btnContact {
        margin-top: 34px;
        line-height: 50px;
        font-weight: 600;
        color: #fff;
        cursor: pointer;
    }

    .row {
        margin-top: 64px;


    }
    </style>
</head>

<body>

    <div class="home-container x_panel">



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
                <h4>Matias</h4>
            </div>
            <div class="member">
                <img src="../Views/profile/nicolas.jpg" alt="nicolas">
                <h4>Nicolas</h4>
            </div>
        </div>


        <h4 class="title">Contactanos!</h4>
        <div class="container contact-form">
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact" />
            </div>
            <form method="post">
                <h3>Drop Us a Message</h3>

                <div class="row sideways">
                    <div class="col-md-6 col-xs-12">
                        <label class="form-label" for="email">Correo electrónico:</label>
                        <input type="email" class="form-control" placeholder="Correo electrónico" name="email"
                            required />
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <label class="form-label" for="password">Contraseña:</label>
                        <input type="password" class="form-control" placeholder="Contraseña" name="password" required />
                    </div>
                </div>

                <div class="row sideways">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="form_message">Message *</label>
                            <textarea id="form_message" name="message" class="form-control"
                                placeholder="Write your message here." rows="4" required="required"
                                data-error="Please, leave us a message."></textarea>
                        </div>

                    </div>


                    <div class="col-md-12 col-xs-12">

                        <input type="submit" class="btn btn-success btn-send  btnContact btn-block
                            " value="Send Message">

                    </div>

                </div>
            </form>
        </div>
    </div>
</body>

</html>