var express = require('express');
var path = require('path');
var cookieParser = require('cookie-parser');
var logger = require('morgan');
var axios = require('axios');

var indexRouter = require('./routes/index');
var usersRouter = require('./routes/users');

var app = express();
const PORT = 3001;

app.use(logger('dev'));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

app.use('/', indexRouter);
app.use('/users', usersRouter);

module.exports = app;

const auth = {
    username: 'admin',
    password: '12345678'
}

app.get('/posts', async (req, res) => {
    try {

        const { language } = req.query;

        let apiUrl = 'http://localhost:8000/wp-json/wp/v2/projects';
        if (language) {
            apiUrl += `?lang=${language}`;
        }

        const response = await axios.get(apiUrl, { auth });
        res.json(response.data);
    } catch (error) {
        res.status(500).json({ error: error.message });

    }
})

app.get('/posts/category', async (req, res) => {
    try {
       
        const { category } = req.query; // Get the language from the query parameter

        // Base API URL for fetching posts
        let apiUrl = 'http://localhost:8000/wp-json/wp/v2/projects';

        // Add the language filter if provided
        if (category) {
            apiUrl += `?categories=${category}`; // Use the taxonomy slug as the query parameter
        }

        // Make the API call to WordPress
        const response = await axios.get(apiUrl, { auth });

        // Return the filtered posts
        res.json(response.data);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
})

app.get('/posts/language', async (req, res) => {
    try {
       
        const { language } = req.query; // Get the language from the query parameter

        // Base API URL for fetching posts
        let apiUrl = 'http://localhost:8000/wp-json/wp/v2/projects';

        // Add the language filter if provided
        if (language) {
            apiUrl += `?language=${language}`; // Use the taxonomy slug as the query parameter
        }

        // Make the API call to WordPress
        const response = await axios.get(apiUrl, { auth });

        // Return the filtered posts
        res.json(response.data);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
})

app.listen(PORT, () => console.log(`Server is running on port ${PORT}`));