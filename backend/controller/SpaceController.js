const space = require('../model/space');

const SpaceController = {
    getAllSpace: async (req, res) => {
        const spaces = await space.find();
        return res.status(200).json({data: spaces});
    }
}

module.exports = SpaceController;