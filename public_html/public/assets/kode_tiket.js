function randomString() {
    var length = 16;
    // var chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var result = '';
    for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
    return result;
}

$('input[type="number"]').on('keypress', function(e) {
    var maxlength = $(this).prop('maxlength');
    if (maxlength !== -1) { // Prevent execute statement for non-set maxlength prop inputs
        var length = $(this).val().trim().length;
        if (length + 1 > maxlength) e.preventDefault();
    }
});

function check_alphabet(char) {
  return /^[a-zA-Z( )]+$/i.test(char);
}

function check_alphabet_dot_comma(char) {
  return /^[a-zA-Z,.( )]+$/i.test(char);
}

function check_space(char) {
  return !char.replace(/\s/g, '').length;
}

function set_date(char) {
  var today = new Date().toISOString().split('T')[0];
  $('#'+char).attr('min', today);
}

function set_datetime(char) {
  var today = new Date().toISOString().slice(0, 16);
  $('#'+char).attr('min', today);
}