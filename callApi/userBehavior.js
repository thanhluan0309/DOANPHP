const temp = async (req, res) => {
  try {
    const data = await fetchResponse.json(req);
    const fetchResponse = await fetch(
      `http://localhost:6969/user/login`,
      settings,
      data
    );

    console.log(fetchResponse);
    return fetchResponse;
  } catch (e) {
    console.log(e);
    return e;
  }
};

// const temp2 = (url) => {
//   return console.log("hahah", url);
// };
