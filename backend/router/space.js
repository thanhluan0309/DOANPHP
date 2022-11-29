const spaceController = require('../controller/SpaceController');

const router = require('express').Router();

router.get('/', spaceController.getAllSpace);

module.exports = router;
