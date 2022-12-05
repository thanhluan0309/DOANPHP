const spaceController = require('../controller/SpaceController');
const verifyToken = require('../midleware/user');

const router = require('express').Router();

router.get('/', verifyToken, spaceController.getAllSpace)
    .post('/', verifyToken, spaceController.createSpace)
    .put('/:spaceID', spaceController.updateSpace)
    .delete('/:spaceID', spaceController.deleteSpace)
    .get('/:spaceID', spaceController.getOneSpace);

module.exports = router;
