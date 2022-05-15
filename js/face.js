(function () {

    function showViewLiveResultButton() {
        if (window.self !== window.top) {

            document.querySelector(".contenedor").remove();
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
        canvas1 = document.getElementById('canvas1');
        boton = document.getElementById('boton');

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
                canvas1.setAttribute('width', width);
                canvas1.setAttribute('height', height);
                streaming = true;
            }
        }, false);

        boton.addEventListener("click", function() {

            //Pausar reproducción
            video.pause();
        
            //Obtener contexto del canvas y dibujar sobre él
            let contexto = canvas1.getContext("2d");
            canvas1.width = video.videoWidth;
            canvas1.height = video.videoHeight;
            contexto.drawImage(video, 0, 0, canvas1.width, canvas1.height);
        
            let foto = canvas1.toDataURL('image/jpg', 1); //Esta es la foto, en base 64
        
            let enlace = document.createElement('a'); // Crear un <a>
            enlace.download = "foto_01.jpg";
            enlace.href = foto;
            enlace.click();
            //Reanudar reproducción
            video.play();
        });
    }

    window.addEventListener('load', startup, false);

})();

const imageUpload = document.getElementById('imageUpload')

Promise.all([
  faceapi.nets.faceRecognitionNet.loadFromUri('js/models'),
  faceapi.nets.faceLandmark68Net.loadFromUri('js/models'),
  faceapi.nets.ssdMobilenetv1.loadFromUri('js/models')
]).then(start)

async function start() {
  const container = document.createElement('div')
  container.style.position = 'relative'
 // container.style.display = 'flex'
 // container.style.justifyContent = 'center'
  //container.style.alignItems = 'center'
  //container.style.flexDirection = 'column'
  
  document.body.append(container)
  const labeledFaceDescriptors = await loadLabeledImages()
  const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.6)
  let image
  let canvas
  document.body.append('Loaded')
  imageUpload.addEventListener('change', async () => {
    if (image) image.remove()
    if (canvas) canvas.remove()
    image = await faceapi.bufferToImage(imageUpload.files[0])
    container.append(image)
    canvas = faceapi.createCanvasFromMedia(image)
    container.append(canvas)
    const displaySize = { width: image.width, height: image.height }
    faceapi.matchDimensions(canvas, displaySize)
    const detections = await faceapi.detectAllFaces(image).withFaceLandmarks().withFaceDescriptors()
    const resizedDetections = faceapi.resizeResults(detections, displaySize)
    const results = resizedDetections.map(d => faceMatcher.findBestMatch(d.descriptor))
    results.forEach((result, i) => {
      const box = resizedDetections[i].detection.box
      const drawBox = new faceapi.draw.DrawBox(box, { label: result.toString() })
      drawBox.draw(canvas)
   //   const html = document.createElement('div');
   //   html.style.position = 'absolute'
  
   // let name = result.toString()
 //   if(name.includes('unknow')){
   //     document.body.append('NO TIENES ACCESO')
    //} else {
     //   document.body.append('SI TIENES ACCESO')
   // }
         
   //   <h6>Nombre: ${result[i].toString} buenas </h6>;
   //   if(result.toString()==='%Captain America%'){
    //    document.body.append('Hola')
    //  }
    } )   
  })
}

function loadLabeledImages() {
  const labels = ['Capitan America', 'Edwin', 'Freddy','Hawkeye', 'Jhonatan', 'Leonardo', 'Thor']
  return Promise.all(
    labels.map(async label => {
      const descriptions = []
      for (let i = 1; i <= 2; i++) {
        const img = await faceapi.fetchImage(`images/labeled_images/${label}/${i}.jpg`)
        const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()
        descriptions.push(detections.descriptor)
      }
      return new faceapi.LabeledFaceDescriptors(label, descriptions)
    })
  )
}

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
