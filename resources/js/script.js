    function init() {
        let count = localStorage.getItem('counter');
        if(count === null){
            count = 0;
            localStorage.setItem('counter', count);
        }
        count = parseInt(count);
        updateCount(count);
    }
    function incrementCounter() {
        let count = parseInt(localStorage.getItem('counter'));
        count = count + 1;
        localStorage.setItem('counter', count);
        updateCount(count);
        return true;
    }
    function updateCount(count) {
        document.getElementById("count").innerHTML = "Clicked "+count+" times!";
    }
