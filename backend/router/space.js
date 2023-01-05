const spaceController = require('../controller/SpaceController');
const verifyToken = require('../midleware/user');

const router = require('express').Router();

router.get('/', verifyToken, spaceController.getAllSpace)
    .post('/', verifyToken, spaceController.createSpace)
    .put('/:spaceID', verifyToken, spaceController.updateSpace)
    .delete('/:spaceID', verifyToken, spaceController.deleteSpace)
    .get('/:spaceID', verifyToken, spaceController.getOneSpace);

module.exports = router;
