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
        for(let i=0; i < classesArray.length; i++) {
            option = document.createElement("option");
            option.text = classesArray[i];
            option.value = classesArray[i];
            element.add(option);
        }
    }
    
    addPlan(responseText) {
       const dayArray = responseText.split("&");
       const planArray = [];
       for (let i = 0; i < dayArray.length; i++) {
           planArray[i] = dayArray[i].split("|");
       }
       this.element.innerHTML = planArray[0][4];
       
    }
}
