const axios = require('axios');
const cheerio = require('cheerio');

const url = 'https://www.example.com';

axios.get(url)
    .then(response => {
        const $ = cheerio.load(response.data);

        const title = $('title').text();

        console.log(title)
    }).catch(error => {
        console.log(error);
    });