/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

/*function getClasses() {
    // Create an XMLHttpRequest object
    const xhttp = new XMLHttpRequest();

    // Define a callback function
    xhttp.onload = function() {
        let str = this.responseText;
        const classesArray = str.split("|");
        let element = document.getElementById("classSelect");
        let option;
        classesArray.sort();
        for(let i=0; i < classesArray.length; i++) {
            option = document.createElement("option");
            option.text = classesArray[i];
            option.value = classesArray[i];
            element.add(option);  
        }
    }

    // Send a request
    xhttp.open("GET", "./API/index.php?type=getClasses");
    xhttp.send(); 
}*/

function getClasses() {
    // Create an XMLHttpRequest object
    const xhttp = new XMLHttpRequest();
    // Define a callback function
    xhttp.onload = function() {
        const view = new MainView("mainView");
        view.addClassSelect(this.responseText, "classSelect"); 
    }

    // Send a request
    xhttp.open("GET", "./API/index.php?type=getClasses");
    xhttp.send(); 
}

/*function getPlan() {
    let value;
    value = document.getElementById('classSelect').value;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById('mainView').innerHTML = this.responseText;
    }
    xhttp.open("GET", "./API/index.php?type=getPlan&name=" + value);
    xhttp.send();
}*/

function getPlan() {
    let value;
    value = document.getElementById('classSelect').value;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        const view = new MainView("mainView");
        view.addPlan(this.responseText);
    }
    xhttp.open("GET", "./API/index.php?type=getPlan&name=" + value);
    xhttp.send();
}
    


