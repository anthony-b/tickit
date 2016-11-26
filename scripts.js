function fill(Value) {
    if ($('#assigned_to').val() == "") {
        $('#assigned_to').val(Value);
    } else {
        $('#assigned_to').val($('#assigned_to').val() + "," + Value);
    }
    $('#display_ajax').hide();
    $('#assigned_to_search').val("");
}
$(document).ready(function() {
    function ajax_get_assigned_to() {
        var assigned_to = $('#assigned_to_search').val();
        $.ajax({
            type: "POST",
            url: "../ajax_suggested_search.php",
            data: "name=" + assigned_to,
            success: function(html) {
                $("#display_ajax").html(html).show();
            }
        });
    }
    $('#assigned_to_search').keyup(ajax_get_assigned_to);

    function set_ticket_status() {
        event.preventDefault();
        var status = $('#ticketstatus').find('option:selected').val();
        var ticketid = $('#ticketid').val();
        $.ajax({
            type: "POST",
            url: "../tickets/set_status_ajax.php?ticketid=" + ticketid + "&status=" + status,
            success: function(html) {
                $('#statusupdate').html(html);
            }
        });
    }
    $('#ticketstatus_button').click(set_ticket_status);

    function add_new_department(){
        event.preventDefault();
        var department_name = $('#department_name').val();
        var department_email = $('#department_emailaddress').val();
        var department_password = $('#department_password').val();
        $.ajax({
            type: "POST",
            url: "../departments/new_ajax.php",
            data: {
                    department_name:department_name,
                    department_email:department_email,
                    department_password:department_password
                },
            success: function(html) {
                $('#confirm_alerts').html(html);
            }
        });
    }
$('#add_department').click(add_new_department);


});