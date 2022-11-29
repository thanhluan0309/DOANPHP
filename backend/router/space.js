const spaceController = require('../controller/SpaceController');
const verifyToken = require('../midleware/user');

const router = require('express').Router();

router.get('/', verifyToken, spaceController.getAllSpace).post('/', verifyToken, spaceController.createSpace);

module.exports = router;
