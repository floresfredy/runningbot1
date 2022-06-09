<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Uso de Fetch</title>

    <style>
      body{
        background-color: cornflowerblue;
      }
      table thead {
            background:#302b63;
            color:white;
        }
    </style>
</head>
<body>
  <div class="container mt-4 shadow-lg p-3 mb-5 bg-body rounded">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody id="data">
      </tbody>
    </table>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script>
      let url = 'https://f3e85e45.us-south.apigw.appdomain.cloud/api-leer-docs/action-leer-docs';
        fetch(url)
            .then( response => response.json() )
            .then( data => mostrarData(data) )
            .catch( error => console.log(error) )

        const mostrarData = (data) => {
            console.log(data)
            let body = ""
            for (var i = 0; i < data.length; i++) {      
               body+=`<tr><td>offset/rows/${data[i].id}</td><td>${data[i].key}</td><td>${data[i].key}</td></tr>`
            }
            document.getElementById('data').innerHTML = body
            //console.log(body)
        }
    </script>
</body>
</html>