const taskController = require('../controller/TaskController');
const verifyToken = require('../midleware/user');

const router = require('express').Router();

router.post('/', taskController.addATask)
    .put('/:taskID', taskController.updateATask)
    .delete('/:taskID', taskController.deleteATask)
    .get('/:taskID', taskController.getATask);

module.exports = router;
