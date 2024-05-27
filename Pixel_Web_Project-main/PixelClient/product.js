const decreaseButton = document.getElementById('decrease');
const increaseButton = document.getElementById('increase');
const countInput = document.getElementById('count');
const getCounter = document.getElementById('getcounter');
const stock = document.getElementById('stock').innerHTML;
decreaseButton.addEventListener('click', () => {
    let count = parseInt(countInput.value);
    if (count > 1) {
        count--;
        countInput.value = count;
        getCounter.value = count;
    }
});

increaseButton.addEventListener('click', () => {
    let count = parseInt(countInput.value);
    if(count < stock)
        {
    count++;
    countInput.value = count;
    getCounter.value = count;}
    else
    {  let existingWarning = document.getElementById('warningMessage');
    if (!existingWarning) {
        const warningMessage = document.createElement('div');
        warningMessage.textContent = "You cannot add more items than the stock limit.";
        warningMessage.style.color = "red";
        warningMessage.id = "warningMessage"; 
        document.getElementById('warningContainer').appendChild(warningMessage);
    }}
});


