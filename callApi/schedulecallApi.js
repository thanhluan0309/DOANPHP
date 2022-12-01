//add schedule
const addschedule = async (req, res) => {
  try {
    const config = {
      method: "POST",
      headers: {
        Authorization: `Bearer ${localStorage.getItem("token")}`,
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify(req),
    };
    try {
      const fetchResponse = await fetch(
        `http://localhost:6969/schedule/`,
        config
      );
      const data = await fetchResponse.json();
      console.log("data", data);
      return data;
    } catch (e) {
      return e;
    }
  } catch (error) {
    console.log(error);
  }
};
//add update schedule
const updateSchedule = async (req, res) => {
  console.log("req", req);
  try {
    const config = {
      method: "PUT",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify(req),
    };
    try {
      const fetchResponse = await fetch(
        `http://localhost:6969/schedule/${req.id}`,
        config
      );
      const data = await fetchResponse.json();

      return data;
    } catch (e) {
      return e;
    }
  } catch (error) {
    console.log(error);
  }
};
//add schedule
const deletedSchedule = async (req, res) => {
  try {
    const config = {
      method: "DELETE",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
    };
    try {
      const fetchResponse = await fetch(
        `http://localhost:6969/schedule/${req}`,
        config
      );
      const data = await fetchResponse.json();

      return data;
    } catch (e) {
      return e;
    }
  } catch (error) {
    console.log(error);
  }
};
