<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style4.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Estilos para campos editables */
        [contenteditable] {
            border: 1px dashed #ccc;
            padding: 2px;
            cursor: text;
        }

        /* Ocultar elementos al imprimir */
        @media print {
            [contenteditable] {
                border: none;       
                padding: 0;
                outline: none;
                cursor: default;
            }

            .no-print {
                display: none !important; /* Oculta por completo */
            }
        }
    </style>
</head>

<body>
<br>
    <img src="sep-dgeti.png" alt="" height="50">

    <hr>
    <h6 style="font-size:50%; line-height:0.1;" align="right">Subsecretaria de educacion media superior</h6>
    <h6 style="font-size:50%; line-height:0.1;" align="right">direccion general de educacion tecnologica industrial y servicios</h6>
    <h6 style="font-size:50%; line-height:0.1;" align="right">oficinas responsables de la D.G.E.T.I. en el estado de chiapas</h6>
    <h6 style="font-size:50%; line-height:0.1;" align="right">centro de bachillerato tecnologico industrial y de servicio No.169</h6>
    <h6 style="font-size:50%; line-height:0.1;" align="right">"Jose Maria Morelos"</h6>
    <h6 style="font-size:50%; line-height:0.1;" align="right">servicios docentes</h6>
    <h6 style="font-size:50%; line-height:0.1;" align="right">C.C.T.07DCT0003Y</h6>

    <h4 align="right">ASUNTO: <span contenteditable="true">CONSTANCIA</span></h4>
    <h4 align="right">C.C.T.07DCT0003Y</h4>

    <h3>A QUIEN CORRESPONDA</h3>
    <h5>EL QUE SUSCRIBE, JEFE DE DEPARTAMENTO DE SERVICIOS DOCENTES DEL CENTRO DE BACHILLERATO TECNOLOGICO Industrial y de Servicios No.169, DE CINTALAPA, CHIAPAS</h5>
    <h3>HACE CONSTAR QUE EL (LA) C. <br></h3>
    <h2 align="center"><span id="nombre-docente"></span></h2> <!-- Aquí irá el nombre -->

    <?php
        $nombreDocente = $_GET['nombre'] ?? 'Docente desconocido';
        $nombrePlantilla = $_GET['plantilla'] ?? 'Plantilla no especificada';

        echo "<h4>$nombrePlantilla Realizado el día: <span contenteditable='true'>(Especificar fecha)</span>, del periodo: <span contenteditable='true'>(Especificar periodo)</span></h4>";
    ?>

    <h5>SE EXTIENDE LA PRESENTE CONSTANCIA EN LA CIUDAD DE CINTALAPA DE FIGUEROA, CHIAPAS, A <span contenteditable="true">(Especificar meses)</span>.</h5>
    <h6 align="center">ATENTAMENTE</h6>
    <br><br><br>

    <div class="firma-container"> 
        <div class="firma">
            <hr>
            <span contenteditable="true">(Especificar nombre)</span><br>
            <span contenteditable="true">(Especificar cargo)</span>
        </div>
        <div class="firma">
            <hr>
            <span contenteditable="true">(Especificar nombre)</span><br>
            <span contenteditable="true">(Especificar cargo)</span>
        </div>
        <div class="firma">
            <hr>
            <span contenteditable="true">Lic. Pedro Salinas Figueroa</span><br>
            <span contenteditable="true">Director del Plantel</span>
        </div>
    </div>
<br><br><br>
    <hr>

    <img src="felipe carrillo 2024.jpeg" 
     alt="" 
     style="width: 200px; height: 80px; display: block; margin: 0 auto; 
            filter: opacity(1) drop-shadow(0 0 10px rgba(0, 0, 0, 0.3));
            mask-image: linear-gradient(to top, transparent, black 80%);
            -webkit-mask-image: linear-gradient(to top, transparent, black 80%);" align="right">


   
    <h6 style="font-size:60%; line-height:0.1;" align="left">Carretera Panamericana km 1006, Cintalapa de Figueroa, Chiapas, C.P.30400</h6>
    <h6 style="font-size:60%; line-height:0.1;" align="left">Teléfono: 968 690 4053</h6>
    <h6 style="font-size:60%; line-height:0.1;" align="left">Correo electrónico: cbtis169.dir@dgti.sems.gob.mx</h6>

    
    <!-- Botón de impresión -->
    <button class="no-print" onclick="window.print()" style="display: block; margin: 20px auto; padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
        Imprimir Documento
    </button>

    <script>
        // Función para obtener el valor de un parámetro de la URL
        function getQueryVariable(variable) {
            const query = window.location.search.substring(1); // Obtiene la parte después del '?'
            const variables = query.split("&"); // Divide los parámetros
            for (let i = 0; i < variables.length; i++) {
                const pair = variables[i].split("="); // Separa clave=valor
                if (pair[0] === variable) {
                    return decodeURIComponent(pair[1]); // Decodifica el valor
                }
            }
            return null;
        }

        // Obtén el nombre del docente de la URL
        const nombreDocente = getQueryVariable("nombre") || "Docente desconocido";

        // Inserta el nombre en el documento
        document.getElementById("nombre-docente").innerText = nombreDocente;
    </script>
</body>

</html>
