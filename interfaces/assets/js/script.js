document.querySelectorAll('.delete-btn').forEach(item => {
    item.addEventListener('click', event => {
        $('#data_id').val(item.value)
    })
})