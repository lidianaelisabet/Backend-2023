// import data
const fruits = require("./data.js");

// menampilakan semua
const index = () => {
  for (const fruit of fruits) {
    console.log(fruit);
  }
};

// menambahkan data
const store = (name) => {
  fruits.push(name);

  console.log(`Menambhakan data ${name}`);
  index();
};

store("Alpukat");

//exprot method
module.exports = {index, store};
