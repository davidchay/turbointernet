 /* 
  	3. Init Header Search
  	*/
 
const search = document.querySelector('.searchBTN');
const HSC = document.querySelector('.header_search_container');
const closeSH = document.querySelector('#close_search_header');

search.addEventListener("click", (e) => {
    e.preventDefault();
    HSC.classList.toggle('active');
});

closeSH.addEventListener("click", (e) => {
    e.preventDefault();
    HSC.classList.remove("active");
});