// const axios = require('axios');
// const cheerio = require('cheerio');
// const express = require('express');


// const app = express();
// const PORT = 3000;

// const url = 'https://example.com/';

// axios.get(url)
//     .then(response => {
//         const html = response.data;
//         const $ = cheerio.load(html);

//         const title = $('title').text();
//         const p = $('p').text();
//         const h1 = $('h1').text();
//     //     const div = document.getElementById('content')
//     //     div.innerHTML = `
//     //     <h2>${title}</h2>
//     //     <h3>${h1}</h3>
//     //     <p>${p}</p>
//     // `;


//         console.log(title)
//         // app.get('/', (req, res) => {
//         //     res.send(`
//         //         <html>
//         //         <head>
//         //             <title>${title}</title>
//         //         </head>
//         //         <body>
//         //             <h1>${h1}</h1>
//         //             <p>${p}</p>
//         //         </body>
//         //         </html>
//         //     `);
//         // });

//     }).catch(error => {
//         console.log(error);
//     });

//     app.listen(PORT, () =>{
//         console.log(`http://localhost:${PORT}`);
//     })
    
    