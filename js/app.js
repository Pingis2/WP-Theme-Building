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
        const response = await axios.get('http://localhost:8000/wp-json/wp/v2/posts', { auth});
        res.json(response.data);
    } catch (error) {
        res.status(500).json({ error: error.message });

    }
})

app.listen(PORT, () => console.log(`Server is running on port ${PORT}`));