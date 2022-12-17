const handlegetid = (event) => {
  document.getElementById(event.target.id).innerHTML = "";
  var ul = document.getElementById("listuser");
  var li = document.createElement("li");
  li.appendChild(
    document.createTextNode(document.getElementById(event.target.id).id)
  );
  li.classList.add("cssforitemuser");
  li.setAttribute("id", document.getElementById(event.target.id).id + " ");
  li.setAttribute("onclick", "handlegetid2(event)");
  ul.appendChild(li);
};
const handlegetid2 = (event) => {
  console.log("doc", document.getElementById(event.target.id));
  document.getElementById(event.target.id).innerHTML = "";

  var ul = document.getElementById("listusernone");
  var li = document.createElement("li");
  li.appendChild(
    document.createTextNode(document.getElementById(event.target.id).id)
  );
  li.classList.add("cssforitemuser");
  li.setAttribute("id", document.getElementById(event.target.id).id);
  li.setAttribute("onclick", "handlegetid(event)");
  ul.appendChild(li);
};
