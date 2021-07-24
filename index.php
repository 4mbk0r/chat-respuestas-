<php?

>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link href='/css/stylo.css' rel='stylesheet'>
    
    
    <!-- Bootstrap 5  -->
    <script src="./js/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- Ajax 5  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <!-- Firebase  -->
    <script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-app.js"></script>

    <!-- Firebase analytics y database -->
    <script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-database.js"></script>
    <!-- firestore -->
    <script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-firestore.js"></script>

    <script src="./js/conexion-firebase.js"></script>


    <title>Chatbot</title>
</head>

<body id="body" class='snippet-body'>

    <!-- awp -->
    <script>
        if (navigator.serviceWorker) {
            console.log("el servicio esta corriendo");
        }
    </script>

    <div class="container">
        <div id="chatbox" class=" cambiar" class="ps-container ps-theme-default ps-active-y" id="chat-content"
            style="overflow-y: scroll !important;">
        </div>
    </div>

    <form>
        <div id="userInput" class="container bg-transparent fixed-bottom  justify-content-center">
            <div class="row">
                <div class="col d-flex justify-content-around">
                    <label id="ele_opciones" class="btn active">

                    </label>
                </div>
            </div>
            <div class="row d-flex justify-content-around">
                <div class="col-sm-1 col-2 bg-success  d-flex justify-content-around">
                    <img class="avatar avatar-xs" src="https://img.icons8.com/color/36/000000/administrator-male.png"
                        alt="...">
                </div>
                <div class="col-sm-7 col-6 bg-white  d-flex justify-content-around">
                    <input class="form-control" type="text" id="escribir_text" placeholder="Escribir aquí">
                </div>
                <div class="col-sm-4  col-4 bg-warning d-flex justify-content-around">
                    <div class="center d-grid gap-2 mx-auto">
                        <button type="submit" id="send" class="btn btn-primary btn-lg">Enviar</button>
                    </div>

                </div>
            </div>
        </div>
    </form>


</body>


<script>
    $(document).ready(function () {
        $("form").on("submit", function (event) {
            var rawText = $("#text").val();
            if (!(!rawText || rawText.length === 0)) {
                var mesajeinicio = '<div class="media media-chat media-chat-reverse">' + '<div class="media-body float-end">';
                var mensagefinal = '</div>' + '</div><br>';
                var userHtml = '<p>' + rawText + "</p>";
                var userHtml = mesajeinicio + userHtml + mensagefinal;
                $("#text").val("");
                $("#chatbox").append(userHtml);
                document.getElementById("userInput").scrollIntoView({
                    block: "start",
                    behavior: "smooth",
                });
                var objDiv = document.getElementById("body");
                objDiv.scrollTop = objDiv.scrollHeight;

            } else {
                const rbs = document.querySelectorAll('input[name="options"]');
                let selectedValue;
                for (const rb of rbs) {
                    if (rb.checked) {
                        selecid = rb.id.split("-")[0];
                        selectedValue = rb.value;
                        break;
                    }
                }
                if (selectedValue >= 0) {
                    var data = fb.escribir(selecid, selectedValue);
                    fb.respuesta(parseInt(selecid)+1);
                }
            }
            event.preventDefault();

        });
    });
</script>

</html>