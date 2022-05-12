const btnAnalizar = document.getElementById('btnAnalizar');
const resultado = document.getElementById('resultado');

btnAnalizar.addEventListener('click', analizar);

function analizar() {
    const url = document.getElementById('url').value;
    const urlImagen = document.getElementById('urlImagen');
    urlImagen.src = url;

    document.getElementById('url').value = "";

    let cabecera = new Headers({
        'Content-Type': 'application/json',
        'Ocp-Apim-Subscription-Key': '1ae5fabd74f8425ba21c56820b35a3d9'
    });

    let objetoInit = {
        method: 'POST',
        body: JSON.stringify({ url: url }),
        headers: cabecera
    };

    let request = new Request('https://eastus.api.cognitive.microsoft.com/face/v1.0/detect?returnFaceId=true&returnFaceLandmarks=false&returnFaceAttributes=age, gender', objetoInit);

    fetch(request).then(response => {
        console.log(response);
        if (response.ok) {
            return response.json();
        }
        else {
            return Promise.reject(new Error(response.statusText));
        }

    }).then(response => {
        let resultadoAnterior = resultado.children[0];
        if (resultadoAnterior) {
            resultadoAnterior.remove();
        }
        const html = document.createElement('div');
        html.innerHTML += `
        <h6>Edad : ${response[0].faceAttributes.age} años </h6>`;
        if (response[0].faceAttributes.gender === "female") {
            html.innerHTML += `
            <h6>Genero : Femenino </h6>
            `;
        } else {
            html.innerHTML += `
            <h6>Genero : Masculino </h6>
            `;
        }
        //   <h6>Genero : ${response[0].faceAttributes.gender}</h6>;
        resultado.appendChild(html);
    }).catch(error => {
        console.log(error);
    });
}

(function () {

    var width = 320;    // We will scale the photo width to this
    var height = 0;     // This will be computed based on the input stream

    var streaming = false;

    var video = null;
    var canvas = null;
    var photo = null;
    var startbutton = null;

    function showViewLiveResultButton() {
        if (window.self !== window.top) {

            document.querySelector(".contentarea").remove();
            const button = document.createElement("button");
            button.textContent = "View live result of the example code above";
            document.body.append(button);
            button.addEventListener('click', () => window.open(location.href));
            return true;
        }
        return false;
    }

    function startup() {
        if (showViewLiveResultButton()) { return; }
        video = document.getElementById('video');
        canvas = document.getElementById('canvas');
        photo = document.getElementById('photo');
        startbutton = document.getElementById('startbutton');

        navigator.mediaDevices.getUserMedia({ video: true, audio: false })
            .then(function (stream) {
                video.srcObject = stream;
                video.play();
            })
            .catch(function (err) {
                console.log("An error occurred: " + err);
            });

        video.addEventListener('canplay', function (ev) {
            if (!streaming) {
                height = video.videoHeight / (video.videoWidth / width);

                if (isNaN(height)) {
                    height = width / (4 / 3);
                }

                video.setAttribute('width', width);
                video.setAttribute('height', height);
                canvas.setAttribute('width', width);
                canvas.setAttribute('height', height);
                streaming = true;
            }
        }, false);

        startbutton.addEventListener('click', function (ev) {
            takepicture();
            ev.preventDefault();
        }, false);

        clearphoto();
    }

    function clearphoto() {
        var context = canvas.getContext('2d');
        context.fillStyle = "#AAA";
        context.fillRect(0, 0, canvas.width, canvas.height);

        var data = canvas.toDataURL('image/png');
        photo.setAttribute('src', data);
    }

    function takepicture() {
        var context = canvas.getContext('2d');
        if (width && height) {
            canvas.width = width;
            canvas.height = height;
            context.drawImage(video, 0, 0, width, height);

            var data = canvas.toDataURL('image/png');
            photo.setAttribute('src', data);
        } else {
            clearphoto();
        }
    }

    window.addEventListener('load', startup, false);

})();