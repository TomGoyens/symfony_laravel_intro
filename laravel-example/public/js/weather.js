var colors = ['#6b28c1', '#c12828', '#070f68', '#60a51a', '#ba9f05', '#00b536'];

let i = Math.floor(Math.random()*colors.length);

document.querySelector('.text').style.backgroundColor = colors[i];
console.log(i);
