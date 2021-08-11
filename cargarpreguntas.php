<!DOCTYPE html>
<html>

<head>
    <title>Read Text File</title>
</head>

<body>


    <!-- Firebase  -->
    <script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-app.js"></script>

    <!-- Firebase analytics y database -->
    <script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-database.js"></script>
    <!-- firestore -->
    <script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-firestore.js"></script>

    <input type="file" name="inputfile" id="inputfile">
    <br>

    <pre id="output"></pre>

    <script type="text/javascript">
        var firebaseConfig = {
            apiKey: "AIzaSyAa4MnDZMCgyHtn8u5I2xFpJQCtnPnLMo0",
            authDomain: "chatprueba-b6c18.firebaseapp.com",
            projectId: "chatprueba-b6c18",
            storageBucket: "chatprueba-b6c18.appspot.com",
            messagingSenderId: "844396539663",
            appId: "1:844396539663:web:6e198521fa14284888987a",
            measurementId: "G-RLRMMVLDCB"
        };
        firebase.initializeApp(firebaseConfig);
        var db = firebase.firestore();

        document.getElementById('inputfile')
            .addEventListener('change', function () {

                var fr = new FileReader();
                fr.onload = function () {
                    document.getElementById('output')
                        .textContent = fr.result;
                    var lines = fr.result.split('\n');
                    for (var line = 0; line < lines.length; line++) {
                        var lines_separet = lines[line].split('.');
                        var id_numero = lines_separet[0];
                        var pregunta_ = lines_separet[1] + ".";
                        
                        var pregunta = db.collection('BFQ').doc(id_numero);
                        var setWithMerge = pregunta.set({
                            pregunta: pregunta_,
                            opciones: {
                                0: "1", 1: "2", 3: "3", 4: "4", 5: "5"
                            },
                            tipo: "seleccion"
                        }
                            , { merge: false });
                        console.log(lines_separet);
                    }
                }
                fr.readAsText(this.files[0]);
            })
    </script>
</body>

</html>