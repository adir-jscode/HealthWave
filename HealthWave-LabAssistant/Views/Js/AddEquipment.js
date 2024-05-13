function validateForm() {
    var equipmentName = document.getElementById('equipmentName').value.trim();
    var category = document.getElementById('category').value.trim();
    var quantity = document.getElementById('quantity').value.trim();
    var errorMessages = [];

    if (equipmentName === '') {
        errorMessages.push('Equipment Name is required');
    }

    if (category === '') {
        errorMessages.push('Category is required');
    }

    if (quantity === '' || isNaN(quantity) || parseInt(quantity) <= 0) {
        errorMessages.push('Quantity must be a positive number');
    }

    if (errorMessages.length > 0) {
        var errorMessageContainer = document.createElement('div');
        errorMessageContainer.classList.add('error-message');
        errorMessageContainer.innerHTML = errorMessages.join('<br>');
        var form = document.getElementById('addEquipmentForm');
        form.appendChild(errorMessageContainer);
        return false;
    }

    return true;
}
