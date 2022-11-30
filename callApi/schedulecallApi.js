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
        const fetchResponse = await fetch(`http://localhost:6969/schedule/`, config);
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