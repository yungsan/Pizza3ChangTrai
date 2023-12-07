const url = 'https://provinces.open-api.vn/api/?depth=2';

fetch(url)
  .then(response => response.json())
  .then(data => {
    console.log(data);
  })