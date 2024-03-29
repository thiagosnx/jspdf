// const url = 'https://wesleiigor.com/';

// fetch(url)
//     .then(response => response.text())
//     .then(html =>{
//         const parser = new DOMParser();
//         const doc = parser.parseFromString(html, 'text/html');

//         const title = doc.querySelector('title').textContent;

//         console.log(title);
//         }).catch(error =>{
//             console.log(error)
//         });

function scraping(){
    fetch('https://localhost:3000/webscraping') // Atualizado para corresponder à rota no servidor
        .then(response => response.json())
        .then(data => {
            console.log(data)
        })
        .catch(error => {
            console.error(error);
        })
}


function abrirJanela() {
    window.open("https://www.example.com", "NomeDaJanela", "width=600,height=400");
}

window.jsPDF = window.jspdf.jsPDF;

var imageBase64;

function convertImage(){
    var file = document.getElementById('image').files;
    console.log(file);

    if(file.length > 0){
        var loadFile = file[0];//recebendo o arquivo q esta na posição 0 (console)
        console.log(loadFile); 

        var readFile = new FileReader();

        readFile.onload = function(loadedFile){
            imageBase64 = loadedFile.target.result;
             //criando tag <img> com o src da img 64
            var newImage = document.createElement('img');

            newImage.src = imageBase64;

            document.getElementById('show-image').innerHTML = newImage.outerHTML;
            console.log(document.getElementById('show-image').innerHTML)
        }
       readFile.readAsDataURL(loadFile);

    }
}

function generatePDF() {
    const doc = new jsPDF('p', 'pt', 'a4');
    
    const name = document.getElementById('name').textContent;
    const email = document.getElementById('email').textContent;
    const description = document.getElementById('description').textContent;

    
    doc.text(`Nome: ${name}`, 40, 40);
    doc.text(`Email: ${email}`, 40, 60);
    doc.text(`Mensagem: ${description}`, 40, 80);
    // doc.addImage(imageBase64, 20, 20, 50, 50);
    
    doc.save(name + '.pdf');
}
