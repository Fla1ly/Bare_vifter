const express = require('express');
const app = express();
const port = 3000; 

app.get('/index', (req, res) => {
    res.send('This is the index page!');
});

app.listen(port, () => {
    console.log(`Server is running on http://20.93.38.189:${port}`);
});
