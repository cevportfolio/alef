// Задание 1
// Дан массив [[399, 9160, 144, 3230, 407, 8875, 1597, 9835], [2093, 3279, 21, 9038, 918, 9238, 2592, 7467], [3531, 1597, 3225, 153, 9970, 2937, 8, 807],
//             [7010, 662, 6005, 4181, 3, 4606, 5, 3980], [6367, 2098, 89, 13, 337, 9196, 9950, 5424], [7204, 9393, 7149, 8, 89, 6765, 8579, 55], 
//             [1597, 4360, 8625, 34, 4409, 8034, 2584, 2], [920, 3172, 2400, 2326, 3413, 4756, 6453, 8], [4914, 21, 4923, 4012, 7960, 2254, 4448, 1]]. 
// Среди его ячеек некоторые числа явлвяются простыми числами. Найдите сумму простых чисел в этом массиве.
// 
// Описание решения
// http://mech.math.msu.su
// 
let sum = 0;
const arr = [[399, 9160, 144, 3230, 407, 8875, 1597, 9835], [2093, 3279, 21, 9038, 918, 9238, 2592, 7467], [3531, 1597, 3225, 153, 9970, 2937, 8, 807],
            [7010, 662, 6005, 4181, 3, 4606, 5, 3980], [6367, 2098, 89, 13, 337, 9196, 9950, 5424], [7204, 9393, 7149, 8, 89, 6765, 8579, 55], 
            [1597, 4360, 8625, 34, 4409, 8034, 2584, 2], [920, 3172, 2400, 2326, 3413, 4756, 6453, 8], [4914, 21, 4923, 4012, 7960, 2254, 4448, 1]];

for (const row of arr) {
    outer: for (const el of row) {
        if (el == 2) {
            sum += el;
            console.log(el);
        } else {            
            for (let i = 3; i <= Math.sqrt(el); i + 2){
                if (el%2==0){
                    console.log(el);
                    continue outer;
                } else if (el%i==0){                    
                    console.log(el + " " + i);
                    continue outer;
                } else {
                    // console.log(el + " " + i + " -- ура!")
                }
            }
            // sum += el;
            console.log(1111);
            continue outer;
        }
    }
}
// console.log(Math.sqrt(2));
// console.log(12 % 2);
// arr.forEach((item, index, array) => {
//     console.log(`${item} имеет позицию ${index} в ${array}`);
// });