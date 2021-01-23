var express = require('express');
var router = express.Router();
var usersHandler = require('./handler/users')

router.post('/register',usersHandler.register);
router.post('/login', usersHandler.login);
router.put('/:id', usersHandler.update);
router.get('/:id', usersHandler.getUser);
router.get('/',usersHandler.getListUser);
router.post('/logout', usersHandler.logout);

module.exports = router;
