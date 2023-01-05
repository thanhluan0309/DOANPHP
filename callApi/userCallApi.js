const login = async (req, res) => {
  try {
    const config = {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify(req),
    };
    try {
      const fetchResponse = await fetch(
        `http://localhost:6969/user/login`,
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
const changepassword = async(req, res)=>{
  try {
    const config = {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify(req),
    };
    try {
      const fetchResponse = await fetch(
        `http://localhost:6969/user/changepassword`,
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
//register
const register = async (req, res) => {
  try {
    const config = {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify(req),
    };
    try {
      const fetchResponse = await fetch(`http://localhost:6969/user/`, config);
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
const getAlluser = async (req, res) => {
  try {
    const config = {
      method: "GET",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
    };
    try {
      const fetchResponse = await fetch(`http://localhost:6969/user/`, config);
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
