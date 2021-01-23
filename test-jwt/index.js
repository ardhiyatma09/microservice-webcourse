const jwt = require('jsonwebtoken');

const JWT_SECRET = 'bwamicro123';

//create basic token dengan proses syncronous
// const token = jwt.sign({ 
//     data: { kelas: 'bwamicro' }}, 
//     JWT_SECRET,
//     {expiresIn: 3600});
// console.log(token);

// asyncronous - create token
// jwt.sign({ data: { kelas: 'bwamicro'} },JWT_SECRET, {expiresIn: '1h'}, (err,token) => {
//     console.log(token);
// })

const token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJkYXRhIjp7ImtlbGFzIjoiYndhbWljcm8ifSwiaWF0IjoxNjEwNjg3MTM4LCJleHAiOjE2MTA2ODcxOTh9.QRJEupn8sqWcbNgpRe4VnQQAyMpkPPpJn3RSSQbno-Y'

//verify cara 1
// jwt.verify(token, JWT_SECRET, (err,decode) => {
//     if(err) {
//         console.log(err.message);
//         return;
//     }

//     console.log(decode)
// });

//verify cara 2
try {
    const decode = jwt.verify(token,JWT_SECRET)
    console.log(decode)
} catch (error) {
    console.log(error.message);
}