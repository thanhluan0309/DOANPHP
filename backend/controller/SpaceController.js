const space = require('../model/space');

const SpaceController = {
    getAllSpace: async (req, res) => {
        const spaces = await space.find().populate('createdBy');
        return res.status(200).json({ data: spaces });
    },
    createSpace: async (req, res) => {
        let spaceID = req.body.spaceID;
        let spaceName = req.body.spaceName;
        let title = req.body.title ? req.body.title : "";
        let private = req.body.private;
        let createdBy = req.userExist;
        let members = req.body.members;
        if (!spaceID || !spaceName || !private) {
            return res.status(400).json({
                success: false,
                message: "All fields need required"
            })
        }
        const existSpaceID = await space.findOne({spaceID: spaceID});
        if (!existSpaceID) {
            let spaceObj = {
                spaceID: spaceID,
                spaceName: spaceName,
                title: title,
                private: private,
                createdBy: createdBy,
                //members: members
            }
            const newSpace = await space.create(spaceObj);
            return res.status(200).json({
                success: true,
                space: newSpace
            })
        } else {
            return res.status(403).json({
                success: false,
                message: "This Space ID have already existed"
            })
        }
    }
}

module.exports = SpaceController;