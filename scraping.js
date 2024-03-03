const axios = require('axios');
const cheerio = require('cheerio');
const express = require('express');


const app = express();
const PORT = 3000;

app.get('/', (req, res) => {
    res.send('Server is up and running!');
});

app.get('/webscraping', async(req, res)=>{
    try{
        const url = 'http://localhost/to-do/';
        const response = await axios.get(url);
        const $ = cheerio.load(response.data);
        const title = $('title').text();
        res.json({
            title: title
        });
    }catch(error){
        console.error(error);
        res.status(500).json({
            error: 'deu ruim'
        });
    }
});

app.listen(PORT, () =>{
    console.log(`${PORT}`);
})



// const url = 'https://wesleiigor.com/';

// axios.get(url)
//     .then(response => {
//         const $ = cheerio.load(response.data);

//         const title = $('title').text();

//         console.log(title)
//     }).catch(error => {
//         console.log(error);
//     });