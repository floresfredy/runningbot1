
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
            //Reanudar reproducción del video
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
  container.style.display = 'flex'
  container.style.justifyContent = 'center'
  container.style.alignItems = 'center'
  
  document.body.append(container)
  const labeledFaceDescriptors = await loadLabeledImages()
  const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.6)
  let image
  let canvas
  document.body.append('---')
  imageUpload.addEventListener('change', async () => {
    if (image) image.remove()
    if (canvas) canvas.remove()
    image = await faceapi.bufferToImage(imageUpload.files[0])

    container.append(image)

    canvas = faceapi.createCanvasFromMedia(image)
    canvas.style.position = 'absolute'
   // canvas.style.paddingLeft = '740px'

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
  
      let name = result.toString()
       if(name.includes('unknown')){
 //      document.body.append('USTED NO TIENE ACCESO')
       
    } else {

       let a = document.createElement("a") // Crear un <a>
       a.setAttribute("href", "ganadores.php")
       a.style.marginLeft = '900px'
       a.style.marginRight = '900px'
       a.style.backgroundColor = '#1883ba'
       a.style.border = '2px solid #0016b0'
       a.style.color = '#ffffff'
       a.style.position = 'relative'
       a.style.display = 'flex'
       a.style.justifyContent = 'center'
       a.style.alignItems = 'center'
       let aTexto = document.createTextNode("ACCESO PERMITIDO")
       a.appendChild(aTexto)
       document.body.appendChild(a)
       //if (name) name.remove()
    }  

    } )   
    
  })
}

function loadLabeledImages() {
  const labels = ['Arnold', 'Edwin', 'Freddy','Giancarlo', 'Ing. Norma', 'Jhonatan', 'Luis', 'Yaraliz']
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
    const Imagen = document.getElementById('imageUpload');
  
    document.getElementById('imageUpload').value = "";

    let cabecera = new Headers({
        'Content-Type': 'application/json',
        'Ocp-Apim-Subscription-Key': '1ae5fabd74f8425ba21c56820b35a3d9'
    });

    let objetoInit = {
        method: 'POST',
        body: JSON.stringify({Imagen}),
        headers: cabecera
    };

    let request = new Request('https://eastus.api.cognitive.microsoft.com/face/v1.0/detect?returnFaceId=true&returnFaceLandmarks=false&returnFaceAttributes=age', objetoInit);

    fetch(request).then(descriptor => {
        console.log(request);
        if (response.ok) {
            return descriptor.json();
        }
        else {
            return Promise.reject(new Error(descriptor.statusText));
        }
    
    }).catch(error => {
        console.log(error);
    });
}
