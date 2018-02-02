$(document).on('change', '[name$="per-page"]', function() {
    let name = $(this).attr('name');
    let value = $(this).val();
    $('[name="' + name + '"]').val(value);
});
