const myName = 'Sitthisak'
let height = 176;
let isMale = false;
let city = "null";
let bigNumber = 10n;
console.log(myName, height, isMale, city, bigNumber);

const person = {
    name: 'Sitthisak',
    height: 176,
    city: 'BKK' 
};

console.log(person.city);

person.height = 180;
person.weight =  93;

console.log(person)

const numbers = [5, 10, 15, 20];
console.log(numbers[2]);

numbers.push(25);//เพิ่มเลขด้านหลัง

console.log(numbers);

numbers.pop();//ลบเลขด้านหลัง
console.log(numbers);

numbers.unshift(1);//เพิ่มเลขด้านหน้า
console.log(numbers);

numbers.shift(numbers);//ลบเลขด้านหน้า
console.log(numbers);

let result = ((10+5)*2)/2;
console.log(result);

const age = 25;
if(age > 18){
    console.log('Age is more than 18');
}else{
    console.log('Age is less than or equal to 18');
}

let password = '';
if(password===''){
    console.log('Password is required')
}else if(password.length >= 8 && password.length <= 12){
    console.log("Password is valid");
}else{
    console.log("Password is invalid");
}

function calculateVat(money, vat){
    return "เสีย vat"+money * vat / 100 + " "+"Bath";
}


const totalVat = calculateVat(8000, 7);
console.log(totalVat);

const totalVat10 = calculateVat(100, 10);
console.log(totalVat10);

for(let counter=0; counter < 10; counter++){
    if(counter === 5){
        break;       
    }
    console.log(counter);    
}



//DOM

function appenImageElem(keyword, index){
    const imgElem = document.createElement('img');
    imgElem.src = `https://source.unsplash.com/400x225/?${keyword}&sig=${index}`;

    const galleryELem = document.querySelector('.gallery');
    galleryELem.appendChild(imgElem);
}

function removePhotos(){
    const galleryElem = document.querySelector('.gallery')
    galleryElem.innerHTML = '';
}

function searchPhoto(event){
    const keyword = event.target.value;
    if(event.key === 'Enter' && keyword ){
        removePhotos();
            for(let i=1; i<= 9; i++){
            appenImageElem(keyword, i);
        }
    }
    
}

function run(){
    const inputElem = document.querySelector('input');
    inputElem.addEventListener('keydown', searchPhoto);
}
run();

