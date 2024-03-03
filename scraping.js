const axios = require('axios');
const cheerio = require('cheerio');
const express = require('express');
const https = require('https');
const fs = require('fs');
const cors = require('cors');

const app = express();
const PORT = 3000;

// Configurações de HTTPS
const privateKey = fs.readFileSync('c:/xampp/apache/conf/ssl.key/server.key', 'utf8');
const certificate = fs.readFileSync('c:/xampp/apache/conf/ssl.crt/server.crt', 'utf8');
const credentials = { key: privateKey, cert: certificate };

app.use(cors());

app.get('/', (req, res) => {
    res.send('Server is up and running!');
});

app.get('/webscraping', async (req, res) => {
    try {
        const url = 'https://www.example.com/';
        const response = await axios.get(url);
        const $ = cheerio.load(response.data);
        const title = $('title').text();
        res.json({
            title: title
        });
    } catch (error) {
        console.error(error);
        res.status(500).json({
            error: 'deu ruim'
        });
    }
});

// Cria um servidor HTTPS
const httpsServer = https.createServer(credentials, app);

httpsServer.listen(PORT, () => {
    console.log(`Server running on https://localhost:${PORT}`);
});
