<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style4.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diploma</title>
    <style>
        /* Estilos para campos editables */
        [contenteditable] {
            border: 1px dashed #ccc;
            padding: 2px;
            cursor: text;
        }

        /* Configuración para impresión */
        @media print {
            /* Para Diplomas: configuración de página horizontal */
            @page {
                size: landscape; /* Modo horizontal */
                margin: 20mm; /* Ajuste de márgenes */
            }

            [contenteditable] {
                border: none;
                padding: 0;
                outline: none;
                cursor: default;
            }

            .no-print {
                display: none !important; /* Oculta el botón de impresión */
            }
        }
    </style>
</head>

<body>
    <img src="sep-dgeti.png" alt="" height="50">

    <hr>
    <h3 align="center">EL CENTRO DE BACHILLERATO TECNOLÓGICO INDUSTRIAL Y DE SERVICIOS No. 169</h3>
    <h4 align="center">Otorga la presente</h4 >
    <h1 style="font-size:200%;" align="center">Constancia</h1>
    <h5 align="center">a</h5>
    <h2 align="center">
        <span id="nombre-docente"></span> <!-- Aquí irá el nombre -->
    </h2>

    <script>
        // Función para obtener el valor de un parámetro de la URL
        function getQueryVariable(variable) {
            const query = window.location.search.substring(1); // Obtiene la parte después del '?'
            const variables = query.split("&"); // Divide los parámetros
            for (let i = 0; i < variables.length; i++) {
                const pair = variables[i].split("="); // Separa nombre=valor
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

    <h3 align="center">Por haber participado en:</h3>
    <?php
        $nombrePlantilla = $_GET['plantilla'] ?? 'Plantilla no especificada';

        echo "<h4 align='center'>$nombrePlantilla</h4>";
    ?>
    <h4 align="center">Realizado el día: <span contenteditable="true">(Especificar fecha)</span>.</h4>
    <h5 align="center">Cintalapa de Figueroa, Chiapas, <span contenteditable="true">(Especificar fecha)</span></h5>
    <h6 align="center">ATENTAMENTE</h6>
    <br>
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

    <img src="felipe carrillo 2024.jpeg" 
     alt="" 
     style="width: 200px; height: 50px; display: block; margin: 0 auto; 
            filter: opacity(1) drop-shadow(0 0 10px rgba(0, 0, 0, 0.3));
            mask-image: linear-gradient(to top, transparent, black 80%);
            -webkit-mask-image: linear-gradient(to top, transparent, black 80%);" align="right">

    <!-- Botón de impresión -->
    <button class="no-print" onclick="window.print()" style="display: block; margin: 20px auto; padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
        Imprimir Documento
    </button>

</body>

</html>
