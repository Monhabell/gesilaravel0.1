const receptionsTable = document.getElementById('tableReceptions');
const checkboxesTable = receptionsTable.querySelectorAll('input[type="checkbox');
const idActiveChecboxes = [];

checkboxesTable.forEach(checkbox => {
    checkbox.addEventListener('change', function(){
        console.log("Botón cambió");
        if (checkbox.checked) {
            idActiveChecboxes.push(checkbox.value);    
            console.log(idActiveChecboxes)
        }else{
            
        }
    })
    
});