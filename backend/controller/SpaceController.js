const space = require('../model/space');

const SpaceController = {
    getAllSpace: async (req, res) => {
        const spaces = await space.find().populate('createdBy members');
        return res.status(200).json({success: true, data: spaces });
    },
    getOneSpace: async (req, res) => {
        const spaceID = req.params.spaceID;
        const existSpace = await space.findOne({spaceID: spaceID}).populate('createdBy members');
        if (existSpace) {
            return res.status(200).json({
                success: true,
                space: existSpace
            })
        } else {
            return res.status(403).json({
                success: false,
                message: "Space not found"
            })
        }
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
                members: members
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
    },
    updateSpace: async (req, res) => {
        const spaceID = req.params.spaceID;
        const existSpace = await space.findOne({spaceID: spaceID});
        if (existSpace) {
            const checkSpaceID = await space.findOne({spaceID: req.body.spaceID});
            if (req.body.spaceID == spaceID || !checkSpaceID) {
                const editedSpace = await space.findOneAndUpdate({spaceID: spaceID}, req.body);
                return res.status(200).json({
                    success: true,
                    message: "Update space success"
                })
            } else {
                return res.status(400).json({
                    success: false,
                    message: "Space ID has been existed"
                })
            }           
        } else {
            return res.status(403).json({
                success: false,
                message: "Space not found"
            })
        }
    },
    deleteSpace: async (req, res) => {
        const spaceID = req.params.spaceID;
        const existSpace = await space.findOne({spaceID: spaceID});
        if (existSpace) {
            const deletedSpace = await space.findOneAndDelete({spaceID: spaceID});
            return res.status(200).json({
                success: true,
                message: "Delete space success"
            })
        } else {
            return res.status(403).json({
                success: false,
                message: "Delete fail"
            })
        }
    }
}

module.exports = SpaceController;