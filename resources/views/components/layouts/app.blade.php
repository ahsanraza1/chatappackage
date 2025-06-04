<!DOCTYPE html>
<html>
<head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/js/app.js'])

    @livewireStyles
</head>
<body>
    {{ $slot }}
    @livewireScripts

    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        async function translateText(text, sourceLang = "auto", targetLang = "en") {
            const url = `https://translate.googleapis.com/translate_a/single?client=gtx&sl=${sourceLang}&tl=${targetLang}&dt=t&q=${encodeURIComponent(text)}`;

            try {
                const response = await fetch(url);
                const data = await response.json();
                let txt = '';
                for( let y=0; y< data[0].length; y++){
                    txt+=data[0][y][0];
                }
                return txt;
                return data[0][0][0]; // Extracted translated text
            } catch (error) {
                console.error("Translation error:", error);
                throw new Error("Translation failed");
            }
        }

        $(document).on('click', '.translatebtn', function(e){
            // if( $(this).hasClass("translateable") ){
                let txt = $(this).parent().find(".txt:first").text();
                let sl = $("#selectsl").val();// $(this).attr("data-sl");
                let dl = $("#selectdl").val();// $(this).attr("data-dl");
                if( dl!=sl){
                    translateText(txt, sl, dl).then(translated => {
                        $(this).parent().find(".txt:first").text(translated)
                        $(this).attr("data-sl", dl);
                        $(this).attr("data-dl", sl);

                    });
                }
            // }
        });

    </script>

    
</body>
</html>