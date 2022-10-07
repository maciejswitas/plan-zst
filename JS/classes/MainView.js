/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

class MainView {
    constructor(id) {
        let element = document.getElementById(id);
        this.element = element;
    }
    
    addClassSelect(responseText, classSelect) {
        const classesArray = responseText.split("|");
        let element = document.getElementById(classSelect);
        let option;
        classesArray.sort();
        for(let i=1; i < classesArray.length; i++) {
            option = document.createElement("option");
            option.text = classesArray[i];
            option.value = classesArray[i];
            element.add(option);
        }
        document.getElementById("mainForm").className = "d-flex";
        this.element.innerHTML = "";        
    }
    
    addPlan(responseText) {
       this.element.innerHTML = responseText;
       document.getElementById("footer").className = "p-5 mt-5 bg-secondary text-white text-center";
    }
}
